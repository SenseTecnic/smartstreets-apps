<?php
ini_set("memory_limit","-1");
includePackage ('SolrDataAggregation');


class TrafficExplorerShellModule extends ShellModule {

  protected $id='TrafficExplorer';


  protected function initializeForCommand(){

    //initialize controller 
    $this->controller = DataRetriever::factory('InteropDataRetriever', array());
    $this->solr_controller = DataRetriever::factory('CatalogueItemSolrDataRetriever', array());

    //Initialize Mongodb
    $dbhost = 'localhost';  
    $dbname = 'traffic';
    $db=$this->_initializeMongo($dbhost, $dbname);

    switch ($this->command){

      case "retrieveGully":
        $params= array("tags"=>"gully");
        $sort=null;
        $index=0;
        $total=0;
        do{
          $items = SolrSearchResponse::getKeywordSearchResponse($this->solr_controller, $params, $sort, $index);
          $json = json_decode($items, 1);
          $total= $json["numFound"];
          foreach ($json["docs"] as $gully_sensor){
            if ($gully_sensor["iscontenttype"]=="application/json"){
              //make api call to fetch data from url
              $url = "http://smartstreets.sensetecnic.com/wotkit/api/sensors/".$gully_sensor["hasid"]."/data";
              $response = $this->controller->getItemDetails($url);
              if($response!=null){
                $count=0;
                foreach ($response as $key => $value) {
                  if ($count==0){
                    $gully= array();
                    $gully["sensor_id"]=$response[$key]["id"];
                    $gully["recordedtime"]=$response[$key]["timestamp"];
                    $geojson["type"]="Point";
                    $geojson["coordinates"]=array((float)$response[$key]["lng"], (float)$response[$key]["lat"]);
                    $gully["geo"]= $geojson;
                    //check if it contains siltlevel, gullytype
                    $state=isset($response[$key]["gullystate(onarrival)"])? $response[$key]["gullystate(onarrival)"]:null;
                    if (strtolower($state) =="clean and running")
                      $gully["state"]= "Clean & Running";
                    else if (strtolower($state)=="blocked and cleaned")
                      $gully["state"]= "Blocked & Cleaned";
                    else if (strtolower($state)=="cleaned and not running")
                      $gully["state"]= "Cleaned & Not Running";
                    else if (strtolower($state)=="obstructed")
                      $gully["state"]= "Obstructed";
                    else
                      $gully["state"]= "No Info";

                    if (!isset($response[$key]["siltLevel"])){
                      $gully["silt"]= $response[$key]["siltlevel(onarrival)"];
                    }else{
                      $gully["silt"]= $response[$key]["siltLevel"];
                    }
                    $gully["type"]=isset($response[$key]["gullytype"])? $response[$key]["gullytype"]:null;
                    $db->gully->insert($gully);          
                  }
                  $count+=1;
                }
              }
            }
          $index+=10;
            }
        }while($index<$total);
        $db->gully->ensureIndex(array("geo" => "2dsphere"));
        break;

      case "retrieveRedcarRoadwork":
        $params= array("maintainer"=>"rcbc-carillion", "tags"=>"Work Order");
        $sort=null;
        $index=0;
        $total=0;
        do{
          $items = SolrSearchResponse::getAdvancedSearchResponse($this->solr_controller, $params, $sort, $index);
          $json = json_decode($items, 1);
          $total= $json["numFound"];
          $index+=10;
          foreach ($json["docs"] as $roadwork_sensor){
            if ($roadwork_sensor["iscontenttype"]=="application/json"){
              
              //make api call to fetch data from url
              $url = "http://smartstreets.sensetecnic.com/wotkit/api/sensors/".$roadwork_sensor["hasid"]."/data";
              $response = $this->controller->getItemDetails($url);
              if($response!=null){
                $count=0;
                $roadwork= array();
                foreach ($response as $key => $value) {
                  
                  if ($count==0){
                    if ((float)$response[$key]["lat"]<55 && (float)$response[$key]["lat"]>53){

                      
                      $roadwork["id"] = $response[$key]["sensor_id"];
                      $roadwork["location_desc"] = $response[$key]["locationDescription"]; //clean this field
                      $geojson["type"]="Point";
                      $geojson["coordinates"]=array((float)$response[$key]["lng"], (float)$response[$key]["lat"]);
                      $roadwork["geo"] = $geojson;
                      $roadwork["records"] = array();
                    }else{
                      break;
                    }
                  }
                  $record = array();
                  $record["recordedtime"] = $response[$key]["timestamp"];
                  $record["jobstatus"] = $response[$key]["jobStatus"];
                  $record["scheduleddate"]=isset($response[$key]["scheduledDate"])? $response[$key]["scheduledDate"]:null;
                  array_push($roadwork["records"], $record);
                  $count+=1;
                }
                if ($roadwork!=null)
                  $db->redcarRoadwork->insert($roadwork);
              }
            }
          }
        }while($index<$total);
        break;

//big table
      //1. trafficFlow:recordedtime, averagespeed, mediumflow, large flow, smallflow, longflow, geo 
      //2. trafficTime: recordedtime, idealtime, historictime, geo
      //3. roadwork: recordedtime, starttime, endtime, impact, geo 
      //4. airQuality: region, value, geo, recordedtime
      case "joinCorrelation":
        $collection = $db->correlation;
        $region_collection = $db->region; 
        $trafficTime_collection= $db->trafficTime;
        $trafficFlow_collection= $db->trafficFlow;
        $roadwork_collection= $db->roadwork;
        $airQuality_collection= $db->airQuality;

        $flow_records = $trafficFlow_collection->find();
        $count=0;
        foreach ($flow_records as $doc) {
          //filter criteria
          $tf_recordedtime= $doc["recordedtime"];
          $tf_region= $doc["region"];
          $tf_geo= $doc["geo"];
          $date= date('Y-m-d H:i:s', $tf_recordedtime->sec);
          print "original datetime: ".$date."\n";
          //match trafficTime (chuck data if not matched)
            //Conditions: with in 1 hour of time range and same region and sort by nearest
          $timeRangeArray=Array();
          $timeRangeArray['$gte']=new MongoDate(strtotime("- 10 mins", $tf_recordedtime->sec));
          $timeRangeArray['$lte']=new MongoDate(strtotime("+ 10 mins", $tf_recordedtime->sec));
          $geoRangeArray = array(
            '$geometry' => $tf_geo,
            '$maxDistance'=>100
          );
          $queryArray = array(
            'recordedtime' => $timeRangeArray,
            'region'=>$tf_region,
            'geo'=> Array('$near' => $geoRangeArray)
          );
          $cursor = $trafficTime_collection->find($queryArray)->limit(1);
          if ($trafficTime_collection->count($queryArray)>0){
            $item=array();
            $item["tf_id"]= $doc["id"];
            $item["tf_recordedtime"]= $tf_recordedtime;
            $item["region"]= $tf_region;
            $item["tf_geo"]= $tf_geo;
            $item["tf_avgspeed"]= $doc["averagespeed"];
            $item["tf_medflow"]= $doc["mediumflow"];
            $item["tf_largeflow"]= $doc["largeflow"];
            $item["tf_smallflow"]= $doc["smallflow"];
            $item["tf_longflow"]= $doc["longflow"];

            foreach($cursor as $record){
              $datetime= date('Y-m-d H:i:s', $record["recordedtime"]->sec);
              print "results time: ".$datetime."\n";
              print "region: ".$record["region"]."\n";
              $item["tt_recordedtime"]= $record["recordedtime"];
              $item["tt_idealtime"]= $record["idealtime"];
              $item["tt_historictime"]= $record["historictime"];
              $item["tt_geo"]= $record["geo"];
            }
            //get roadwork data
            $timeRangeArray=Array();
            $currentdate=new MongoDate(strtotime("- 0 mins", $tf_recordedtime->sec));
            $roadwork_queryArray = array(
              'starttime' => array('$lte'=>$currentdate),
              'endtime' => array('$gte'=>$currentdate),
              'region'=>$tf_region,
              'geo'=> Array('$near' => $geoRangeArray)
            );
            $roadwork_cursor = $roadwork_collection->find($roadwork_queryArray)->limit(1);
            if ($roadwork_collection->count($roadwork_queryArray)>0){
              foreach($roadwork_cursor as $rw_record){
                print "roadwork matched! \n";
                $item["rw_starttime"]= $rw_record["starttime"];
                $item["rw_endtime"]= $rw_record["endtime"];
                $item["rw_impact"]= $rw_record["impact"];
                $item["rw_geo"]= $rw_record["geo"];
                $item["rw_id"]= $rw_record["id"];
                $item["rw_delaytime"]= $rw_record["delaytime"];
                $item["rw_restrictedlanes"]= $rw_record["restrictedlanes"];
                $item["rw_comment"]= $rw_record["comment"];
              }
            }
            //insert to db
            $collection->insert($item);
            $count++;
          }
          // print $doc["region"]."\n";
          // print $doc["geo"]."\n";
          // $data["region"]=$doc["name"];
        }
        print $count." records inserted. \n";
        $collection->ensureIndex(array("geo" => "2dsphere"));
        break;
      

      case "loadLocations":

        //convert xml into json objects
        $xmlfile = file_get_contents(SITE_DIR."/config/TrafficExplorer/location_data/predefined_locations.xml");
        $ob = simplexml_load_string($xmlfile);
        $json = json_encode($ob);
        $array = json_decode($json, true);
        //load xml location data into db
        $collection = $db->locationData;
        foreach ($array["payloadPublication"]["predefinedLocationSet"] as $item){
          // var_dump ($item);
          print "item name: ".$item["predefinedLocationSetName"]["value"]."\n";
          foreach($item["predefinedLocation"] as $location){
            print "location id: ".$location["@attributes"]["id"]."\n";
            $collection->insert($location);
          }
        }
        break;

      case "retrieveRoadwork":
        $region_collection = $db->region;

        // TODO: upsert doc
        $baseURL= "http://smartstreets.sensetecnic.com/wotkit/api/sensors/";
        //read from feed file
        $json = file_get_contents(SITE_DIR."/config/TrafficExplorer/feeds.json");
        $array = json_decode($json, true);
        $reference_time=1000*strtotime('-1 month');
        foreach($array["feeds"] as $feed){
          if ($feed["name"]=="roadwork"){
            $time=  round(microtime(true) * 1000);  //get current time
            // $time= 1000 * strtotime('11-9-2013');
            $collection= $db->$feed["name"];
            $collection->ensureIndex(array("geo" => "2dsphere"));

            $total=0;
            do{
              $URL=$baseURL.$feed["id"]."/data?beforeE=".$feed["count"]."&start=".$time."&reverse=true";
              $response = $this->controller->getItemDetails($URL);
              if($response==null){
                break;
              }
              print "retrieving ".$feed["name"]." ... \n";
              $count=0;
              $checkDup=true;
              $len = count($response);
              foreach ($response as $item){
                if ($count == $len - 1) {
                    // last
                    $time= 1000*strtotime($item["timestamp"]);
                }
                //check duplicate
                $IdQuery= array("id"=> $item["id"]);
                if($collection->count($IdQuery)==0){
                  //NOT duplicate, INSERT DATA
                  $checkDup=false;
                  $data = array();
                  $data["id"]= $item["id"];
                  $data["recordedtime"]= new MongoDate(strtotime($item["recordedtime"]));
                  $data["starttime"]= new MongoDate(strtotime($item["starttime"]));
                  $data["endtime"]= new MongoDate(strtotime($item["endtime"]));
                  $data["impact"]= $item["impact"];
                  $data["delaytime"]= $item["delaytime"];
                  $data["restrictedlanes"]= $item["restrictedlanes"];
                  $data["occurrence"]= $item["occurrence"];
                  $data["comment"]= $item["comment"];
                  // lat lng to geoJSON
                  $geojson["type"]="Point";
                  $geojson["coordinates"]=array((float)$item["lng"], (float)$item["lat"]);
                  $data["geo"]= $geojson;
                  //search region table to assign region
                  $regionQueryArray = array(
                    '$geometry' => $geojson
                  );
                  $regions = $region_collection->find(Array('geo' => Array('$near' => $regionQueryArray)))->limit(1);
                  foreach ($regions as $doc) {
                    $data["region"]=$doc["name"];
                  }
                  $collection->insert($data);
                  $total++;
                  print $feed["name"]." : Inserted ".$total." items to DB\n".$time."\n";
                }else{
                    print("Found duplicate!");
                }
                $count++;
              }
            }while($time>=$reference_time);
          }
        }
        break;

      case "retrieveTrafficFlow":
        // TODO: upsert doc
        // TODO: upsert doc
        //create region table with the geolocations data 
        $region_collection = $db->region;

        // TODO: upsert doc
        $location_collection= $db->locationData;
        $baseURL= "http://smartstreets.sensetecnic.com/wotkit/api/sensors/";
        //read from feed file
        $json = file_get_contents(SITE_DIR."/config/TrafficExplorer/feeds.json");
        $array = json_decode($json, true);
        $reference_time=1000*strtotime('-1 month');
        foreach($array["feeds"] as $feed){
          if ($feed["name"]=="trafficFlow"){
            $time=  round(microtime(true) * 1000);  //get current time
            // $time= 1000 * strtotime('11-9-2013');
            $collection= $db->$feed["name"];
            $collection->ensureIndex(array("geo" => "2dsphere"));

            $total=0;
            do{
              $URL=$baseURL.$feed["id"]."/data?beforeE=".$feed["count"]."&start=".$time."&reverse=true";
              $response = $this->controller->getItemDetails($URL);
              if($response==null){
                break;
              }
              print "retrieving ".$feed["name"]." ... \n";
              $count=0;
              $checkDup=true;
              $len = count($response);
              foreach ($response as $item){
                if ($count == $len - 1) {
                    // last
                    $time= 1000*strtotime($item["timestamp"]);
                }
                //check duplicate
                $IdQuery= array("id"=> $item["id"]);
                if($collection->count($IdQuery)==0){
                  //NOT duplicate, INSERT DATA
                  $checkDup=false;
                  
                  if (isset($item["averagespeed"])&&isset($item["mediumflow"])){
                    $data = array();
                    $data["id"]= $item["id"];
                    $data["recordedtime"]= new MongoDate(strtotime($item["recordedtime"]));
                    $data["averagespeed"]= $item["averagespeed"];
                    $data["mediumflow"]= $item["mediumflow"];
                    $data["largeflow"]= $item["largeflow"];
                    $data["smallflow"]= $item["smallflow"];
                    $data["longflow"]= $item["longflow"];
                    // lat lng to geoJSON
                    $locationQuery= array("@attributes.id"=> $item["locationref"]);
                    $cursor = $location_collection->find($locationQuery);
                    foreach ($cursor as $doc) {
                      $loc= $doc["predefinedLocation"]["tpeglinearLocation"];
                      if (isset($loc["point"])){
                        $geojson["type"]="Point";
                        $geojson["coordinates"]=array((float)$loc["point"]["pointCoordinates"]["longitude"], (float)$loc["point"]["pointCoordinates"]["latitude"]);
                        $data["geo"]= $geojson;
                      }else{
                        //line segment
                        $geoline["type"]="LineString";
                        $to= array((float)$loc["to"]["pointCoordinates"]["longitude"], (float)$loc["to"]["pointCoordinates"]["latitude"]);
                        $from=array((float)$loc["from"]["pointCoordinates"]["longitude"], (float)$loc["from"]["pointCoordinates"]["latitude"]);
                        $geoline["coordinates"]=array($to,$from);
                        $data["line"]= $geoline;
                        //points
                        $geojson["type"]="Point";
                        $geojson["coordinates"]=$from;
                        $data["geo"]= $geojson;
                      }
                    }
                    //search region table to assign region
                    $regionQueryArray = array(
                      '$geometry' => $geojson
                      // ,'$maxDistance'=>1000
                    );
                    $regions = $region_collection->find(Array('geo' => Array('$near' => $regionQueryArray)))->limit(1);
                    foreach ($regions as $doc) {
                      $data["region"]=$doc["name"];
                    }
                    $collection->insert($data);
                    $total++;
                    print $feed["name"]." : Inserted ".$total." items to DB\n".$time."\n";
                  }else{
                    print "Missing data field: averagespeed!\n";
                  }
                  
                }else{
                    print("Found duplicate!");
                }
                $count++;
              }
            }while($time>=$reference_time);
          }
        }
        break;

      case "retrieveTrafficTime":
        // TODO: upsert doc
        // Data fields: id, timestamp, title, lng, lat, value 
        //create region table with the geolocations data 
        $region_collection = $db->region;

        // TODO: upsert doc
        $location_collection= $db->locationData;
        $baseURL= "http://smartstreets.sensetecnic.com/wotkit/api/sensors/";
        //read from feed file
        $json = file_get_contents(SITE_DIR."/config/TrafficExplorer/feeds.json");
        $array = json_decode($json, true);
        $reference_time=1000*strtotime('-1 month');
        foreach($array["feeds"] as $feed){
          if ($feed["name"]=="trafficTime"){
            $time=  round(microtime(true) * 1000);  //get current time
            // $time= 1000 * strtotime('11-9-2013');
            print "time: ".$time;
            $collection= $db->$feed["name"];
            $collection->ensureIndex(array("geo" => "2dsphere"));

            $total=0;
            do{
              $URL=$baseURL.$feed["id"]."/data?beforeE=".$feed["count"]."&start=".$time."&reverse=true";
              $response = $this->controller->getItemDetails($URL);
              if($response==null){
                break;
              }
              print "retrieving ".$feed["name"]." ... \n";
              $count=0;
              $checkDup=true;
              $len = count($response);
              foreach ($response as $item){
                if ($count == $len - 1) {
                    // last
                    $time= 1000*strtotime($item["timestamp"]);
                }
                //check duplicate
                $IdQuery= array("id"=> $item["id"]);
                if($collection->count($IdQuery)==0){
                  //NOT duplicate, INSERT DATA
                  $data = array();
                  $data["id"]= $item["id"];
                  $data["recordedtime"]= new MongoDate(strtotime($item["recordedtime"]));
                  $data["idealtime"]= $item["idealtime"];
                  $data["historictime"]= $item["historictime"];
                  $data["value"]= $item["value"]; 
                  // lat lng to geoJSON
                  $locationQuery= array("@attributes.id"=> $item["locationref"]);
                  $cursor = $location_collection->find($locationQuery);
                  foreach ($cursor as $doc) {
                    $loc= $doc["predefinedLocation"]["tpeglinearLocation"];
                    if (isset($loc["point"])){
                      $geojson["type"]="Point";
                      $geojson["coordinates"]=array((float)$loc["point"]["pointCoordinates"]["longitude"], (float)$loc["point"]["pointCoordinates"]["latitude"]);
                      $data["geo"]= $geojson;
                    }else{
                      //line segment
                      $geoline["type"]="LineString";
                      $to= array((float)$loc["to"]["pointCoordinates"]["longitude"], (float)$loc["to"]["pointCoordinates"]["latitude"]);
                      $from=array((float)$loc["from"]["pointCoordinates"]["longitude"], (float)$loc["from"]["pointCoordinates"]["latitude"]);
                      $geoline["coordinates"]=array($to,$from);
                      $data["line"]= $geoline;
                      //points
                      $geojson["type"]="Point";
                      $geojson["coordinates"]=$from;
                      $data["geo"]= $geojson;
                    }
                  }
                  //search region table to assign region
                  $regionQueryArray = array(
                    '$geometry' => $geojson
                    // ,'$maxDistance'=>1000
                  );
                  $regions = $region_collection->find(Array('geo' => Array('$near' => $regionQueryArray)))->limit(1);
                  foreach ($regions as $doc) {
                    $data["region"]=$doc["name"];
                  }
                  $collection->insert($data);
                  $total++;
                  $checkDup=false;
                  print $feed["name"]." : Inserted ".$total." items to DB\n".$time."\n";
                }else{
                    print("Found duplicate!");
                }
                $count++;
              }
            }while($time>=$reference_time);
          }
        }
        break;
      case "retrieveAirQuality":
        // Data fields: id, timestamp, title, lng, lat, value 
        //create region table with the geolocations data 
        $region_collection = $db->region;
        $region_collection->ensureIndex(array("geo" => "2dsphere"));

        // TODO: upsert doc
        $location_collection= $db->locationData;
        $baseURL= "http://smartstreets.sensetecnic.com/wotkit/api/sensors/";
        //read from feed file
        $json = file_get_contents(SITE_DIR."/config/TrafficExplorer/feeds.json");
        $array = json_decode($json, true);
        $reference_time=1000*strtotime('-1 month');
        foreach($array["feeds"] as $feed){
          if ($feed["name"]=="airQuality"){
            $time=  round(microtime(true) * 1000);  //get current time
            $collection= $db->$feed["name"];
            $collection->ensureIndex(array("geo" => "2dsphere"));

            $total=0;
            do{
              $URL=$baseURL.$feed["id"]."/data?beforeE=".$feed["count"]."&start=".$time."&reverse=true";
              $response = $this->controller->getItemDetails($URL);
              if($response==null){
                break;
              }
              print "retrieving ".$feed["name"]." ... \n";
              $count=0;
              $checkDup=true;
              $len = count($response);
              foreach ($response as $item){
                if ($count == $len - 1) {
                    // last
                    $time= 1000*strtotime($item["timestamp"]);
                }
                //check duplicate
                $IdQuery= array("id"=> $item["id"]);
                if($collection->count($IdQuery)==0){
                  //NOT duplicate, INSERT DATA
                  $data = array();
                  $data["id"]= $item["id"];
                  $data["region"]= $item["title"];
                  $data["value"]= $item["value"];
                  // lat lng to geoJSON
                  $geojson["type"]="Point";
                  $geojson["coordinates"]=array((float)$item["lng"], (float)$item["lat"]);
                  $data["geo"]=$geojson;
                  //timestamp into mongo time ()
                  // foreach($item as $key=>$attributes){
                  //   if ($key=="timestamp"){
                  //     $data["recordedtime"]= new MongoDate(strtotime($attributes));
                  //     break;
                  //   }
                  // }
                  $data["recordedtime"]= new MongoDate(strtotime($item["timestamp"]));

                  $collection->insert($data);
                  $total++;
                  $checkDup=false;
                  print $feed["name"]." : Inserted ".$total." items to DB\n".$time."\n";

                  //create item for region
                  $regionQuery= array("name"=> $item["title"]);
                  if ($region_collection->count($regionQuery)==0 && $region_collection->count()<129){
                    $region=array();
                    $region["name"]= $item["title"];
                    $region["geo"]= $geojson;
                    $region_collection->insert($region);
                  }
                }else{
                    print("Found duplicate!");
                }
                $count++;
              }
            }while($time>=$reference_time);
          }
        }
        break;

      case "retrieveAll":
        $location_collection= $db->locationData;
        $baseURL= "http://smartstreets.sensetecnic.com/wotkit/api/sensors/";
        //read from feed file
        $json = file_get_contents(SITE_DIR."/config/TrafficExplorer/feeds.json");
        $array = json_decode($json, true);
        $reference_time=1000*strtotime('-1 month');
        // $reference_time=1379314800000;//2013/01/01
        // $reference_time=1357027200000;//2013/01/01
        foreach($array["feeds"] as $feed){
          $time=  round(microtime(true) * 1000);//current time
          $collection= $db->$feed["name"];
          $total=0;
          do{
          $URL=$baseURL.$feed["id"]."/data?beforeE=".$feed["count"]."&start=".$time."&reverse=true";
          $response = $this->controller->getItemDetails($URL);
          if($response==null){
            break;
          }
          print "retrieving ".$feed["name"]." ... \n";
          $count=0;
          $checkDup=true;
          $len = count($response);
          foreach ($response as $item){
            if ($count == 0) {
                // first
            } else if ($count == $len - 1) {
                // last
                $time= 1000*strtotime($item["timestamp"]);
            }

            //check duplicate
            $IdQuery= array("id"=> $item["id"]);
            $cursor = $collection->count($IdQuery);
            if($cursor==0){
              if ($feed["name"]!="airQuality"){
                // var_dump ($item["recordedtime"]);
                $item["recordedtime"]= new MongoDate(strtotime($item["recordedtime"]));
                $locationQuery= array("@attributes.id"=> $item["locationref"]);
                $cursor = $location_collection->find($locationQuery);
                foreach ($cursor as $doc) {
                  $loc= $doc["predefinedLocation"]["tpeglinearLocation"];
                  if (isset($loc["point"])){
                    // var_dump($loc["point"]["pointCoordinates"]);
                    $geojson["type"]="Point";
                    $geojson["coordinates"]=array($loc["point"]["pointCoordinates"]["longitude"], $loc["point"]["pointCoordinates"]["latitude"]);
                    $item["geo"]= $geojson;
                  }else{
                    $geojson["type"]="LineString";
                    $to= array($loc["to"]["pointCoordinates"]["longitude"], $loc["to"]["pointCoordinates"]["latitude"]);
                    $from=array($loc["from"]["pointCoordinates"]["longitude"], $loc["from"]["pointCoordinates"]["latitude"]);
                    $geojson["coordinates"]=array($to,$from);
                    $item["geo"]= $geojson;
                  }
                }
              }else{
                $geojson["type"]="Point";
                $geojson["coordinates"]=array($item["lng"], $item["lat"]);
                $item["geo"]=$geojson;
              }

              $collection->insert($item);
              $total++;
              $checkDup=false;
              print "inserted ".$total." ".$feed["name"]." item to DB\n".$time."\n";
            }else{
                print("duplicate!");
            }



            // if($checkDup){
            //   //check duplicate
            //   $IdQuery= array("id"=> $item["id"]);
            //   $cursor = $collection->count($IdQuery);

            //   if($cursor==0){
            //     $collection->insert($item);
            //     $total++;
            //     $checkDup=false;
            //     print "inserted ".$total." ".$feed["name"]." item to DB\n".$time."\n";
            //   }else{
            //     print("duplicate!");
            //   }
            // }else{
            //   $collection->insert($item); //insert only if id doesn't exist already
            //   $total++;
            //   print "inserted ".$total." ".$feed["name"]." item to DB\n".$time."\n";
            // }

            $count++;
          }
          }while($time>=$reference_time);
        }
        
        //TODO: insert if id not exist
        
        break;

      case "deleteCorrelation":
        print "Deleting correlation Data...\n";
        $db->correlation->drop();
        break;

      case "deleteGully":
        print "Deleting Gully Data...\n";
        $db->gully->drop();
        break;

      case "deleteRegion":
        print "Deleting Region Data...\n";
        $db->region->drop();
        break;

      case "deleteAirQuality":
        print "Deleting Air Quality Data...\n";
        $db->airQuality->drop();
        break;

      case "deleteTrafficFlow":
        print "Deleting Traffic Flow Data...\n";
        $db->trafficFlow->drop();   
        break;

      case "deleteTrafficTime":
        print "Deleting Traffic Time Data...\n";
        $db->trafficTime->drop();      
        break;
      case "deleteRoadwork":
        print "Deleting Roadwork Data...\n";
        $db->roadwork->drop();      
        break;

      case "deleteRedcarRoadwork":
        print "Deleting Redcar Roadwork Data...\n";
        $db->redcarRoadwork->drop();      
        break;

      case "deleteData":
        print "Dropping All Data Feeds...\n";
        $json = file_get_contents(SITE_DIR."/config/TrafficExplorer/feeds.json");
        $array = json_decode($json, true);
        foreach($array["feeds"] as $feed){
          $db->$feed["name"]->drop();
        }
        break;

      case "deleteLocations":
        print "Dropping Location Data...\n";
        $db->locationData->drop();
        break;

      case "deleteAll":
        print "Dropping database...\n";
        $db->drop();
        break;

      default:
        print "The command {$this->command} does not exist. \n";
    }
  }

  private function _initializeMongo ($dbhost, $dbname) {
    // Connect to test database  
    $m = new Mongo("mongodb://$dbhost");  
    $db = $m->$dbname;  

    return $db;
  }
}