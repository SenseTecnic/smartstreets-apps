<?php
ini_set("memory_limit","-1");
/**
 * Class that executes data retrieval from various data sources.
 */
class CatalogueItemManager {

  // Controller to access solr feed items index
  private $catalogueItemSolrController;
  private $source_array=array();
  private $interopController;

  private $base_url;
  private $header;
  private $key;
  private $private_catalogs = array();

  public function __construct($sourceConfig, $solrController){
    //Initialize controllers and source config json file
    $this->interopController = DataRetriever::factory('InteropDataRetriever', array());
    $this->catalogueItemSolrController= $solrController;
    $this->source_array= $this->_decodeConfig($sourceConfig);
  }

  public function retrieveAndPersistAll() {

    foreach ($this->source_array as $source){
      print "Retrieving data from ".$source["title"]." at ".$source["url"]."\n";
      $this->base_url = $source["url"];
      $this->header = $source["header"];
      $this->key = $source["general_key"];
      if (array_key_exists("private_catalogs",$source))
        $this->private_catalogs = $source["private_catalogs"];
      var_dump($this->private_catalogs);
      // sleep(5000);
      $feeds = $this->_retrieve($source["url"], $source["name"]);
      
      //Log the retrieved feed to a file
      // $jsonUpdateString = '['. implode(',', $feeds). ']';
      // $file = './log.json';
      // file_put_contents($file, $jsonUpdateString); 
      //write to solr
      // $this->catalogueItemSolrController->persistFeedItems($feeds);
    }
  }

  private function _retrieve($root_url, $datahub){
  
    // $data = $this->interopController->retrieveSource($root_url);
    $header = $this->header;
    $key = $this->key;
    if($this->private_catalogs !=null){
      if (array_key_exists($root_url, $this->private_catalogs)){
        $this->key = $this->private_catalogs[$root_url];
      }
    }
    print_r("\nheader: ".$this->header);
    print_r("\nkey: ".$this->key);
    print_r("\ndatahub: ".$datahub);

    $data =null;
    $offset=0;
    $limit=100;
    $isPaging=false;
    $temp_url=$root_url;
    do{
      // if smartstreet, use paging
      if($datahub =="smartstreets"){
        if(strpos($root_url,"/cat/sensors")!==false){

          $isPaging=true;
          $root_url = $this->_getPagingUrl($root_url, $limit, $offset);
          print_r("smartstreets new url: ".$root_url);
        }else{
          // sleep(5);
        }
        
      }
      $data = $this->interopController->retrieveSourceWithAuthentication($root_url, $this->header, $this->key);
      //check if returned json is a data feed
      if ($data ["items"]!=null && $data["item-metadata"]!=null){
        //IS a valid data feed, create new catalogue item
        $jsonFeeds= $this->_parseResultsToCatalogueItems($data, $temp_url, $datahub);
        $this->catalogueItemSolrController->persistFeedItems($jsonFeeds);
      }else{
        print "The response is not a valid sourcefeed, output: ".json_encode($data)."\n";
      }
      $offset+=$limit;
    }while($isPaging&&$data["items"]!=null);
    
    return $jsonFeeds;
  }

  private function _getPagingUrl($url, $limit, $offset){
    $pos = strpos($url,"?");
    if ($pos!==false){
      $url = substr($url, 0,$pos)."?"."offset=".$offset."&limit=".$limit;
    }else{
      $url = $url."?"."offset=".$offset."&limit=".$limit;
    }
    return $url;
    // http://smartstreets.sensetecnic.com/cat/sensors?rel=urn%3AX-smartstreets%3Arels%3Atags&val=Gully&offset=300&limit=10
  }

  private function _parseResultsToCatalogueItems($feed, $feed_url, $datahub){
    
    $pos = strpos($feed_url, "/cat");
    $root_url = substr ($feed_url, 0, $pos);

    $feed_array = array();

    if ($feed["items"]){
        foreach ($feed["items"] as $item){
          $isCatalogue=null;
          foreach ($item["i-object-metadata"] as $pair){
            $rel=$pair["rel"];
            $val=$pair["val"];

            if ($rel == "urn:X-tsbiot:rels:isContentType"){
              if (strpos($val, "vnd.tsbiot.catalogue") !==false){
                //is Catalogue
                print "\n This is a catalog, val= ".$val."\n";
                $isCatalogue=true;
              }else{
                print "\n This is a resource, val= ".$val."\n";
                $isCatalogue=false;
              }
            }
          }
          if ($isCatalogue===null){
            //no isContentType... need to go into sub url to check item-metadata
            $targetUrl="";
            if (strpos($item["href"], "http")!==false ||strpos($item["href"], "https")!==false){
              $targetUrl = $item["href"];
            }else{
              $tPos = strpos($feed_url, "/cat");
              $tUrl = substr_replace ($feed_url, $item["href"], $tPos);
              $targetUrl = $tUrl;
              print_r("target url: ".$targetUrl);
            }
            print_r("Retrieving from target url: ".$targetUrl);
            // $result = $this->interopController->retrieveSource($targetUrl);

            $header = $this->header;
            $key = $this->key;
            if (array_key_exists($targetUrl, $this->private_catalogs)){

              $key = $this->private_catalogs[$targetUrl];
              print_r("Key exists: ".$key."\n");
            }
            $result = $this->interopController->retrieveSourceWithAuthentication($targetUrl, $header, $key);
            
            
            if (array_key_exists("item-metadata", $result)){
            // if ($result["item-metadata"]!=null){
              print_r("results: ".$result["item-metadata"]);
              foreach ($result["item-metadata"] as $pair){
                $rel=$pair["rel"];
                $val=$pair["val"];
                if ($rel == "urn:X-tsbiot:rels:isContentType"){
                  if (strpos($val, "vnd.tsbiot.catalogue") !==false){
                    print "\n This is a catalog, val= ".$val;
                    $isCatalogue=true;
                  }
                }
              }
            }else{
              $isCatalogue=false;
            }
            // sleep(5);
          }

          if ($isCatalogue){
                //check if url is full
                if (strpos($item["href"], "http") !==false||strpos($item["href"], "https")!==false){
                  $childrenUrl = $item["href"];
                }else{
                  $tPos = strpos($feed_url, "/cat");
                  $tUrl = substr_replace ($feed_url, $item["href"], $tPos);
                  $childrenUrl = $tUrl;
                }

                print "\nchildren url = ".$childrenUrl;
                $childrenFeeds = $this->_retrieve($childrenUrl,$datahub);
                var_dump($childrenFeeds);


                //merge two arrays
                foreach ($childrenFeeds as $child){
                  $feed_array[]= $child;
                }
          }
          $parentUrl = $feed_url;
          $newCatalogueItem = CatalogueItem::createCatalogueItem();
          $this->_populateCatalogueItem($newCatalogueItem, $item, $parentUrl, $datahub, $isCatalogue, $root_url);
          $json = $newCatalogueItem->getSolrUpdateJson();
          $feed_array[]= $newCatalogueItem;
        }
    }

    return $feed_array;
  }

  private function _populateCatalogueItem(&$newCatalogueItem, $jsonFeedItem, $parentUrl, $datahub, $isCatalogue,$root_url){
      
    //set href as full url 
    $href = $jsonFeedItem["href"];
    if ($isCatalogue){
      //search for /cat in base url and replace with $href
      // $base = $this->base_url;
      $base = $root_url;
      $pos= strpos($base, "/cat");
      $href = substr_replace ($base, $href, $pos);
    }
    
    //TODO: call _retrieve recursively to drill down to retrieve more items... work for data only

    $class = "CatalogueItem";
    $schema_keys = array_keys($class::$CatalogueParams);
    $description="";
    $itemId="";
    //get metadata
    print "\n json feed item feed = ".$jsonFeedItem;
    foreach ($jsonFeedItem["i-object-metadata"] as $attr){

      $lower = strtolower($attr["rel"]);
      foreach($schema_keys as $key)
      {
        if(strpos($lower,$key) !== false) 
        {
          if ($key=="hasdescription"&&$attr["val"]!=null){
            $description=$attr["val"];
          }
          if ($key=="hasid"&&$attr["val"]!=null){
            $itemId=$attr["val"];
          }
          if ($key=="lastupdate"&&$attr["val"]!=null){ // convert date to solr format
            $attr["val"]=$this->convertToSolrDateTimeFormat($attr["val"]);
          }
          //set the value of key as $attr[val]
          $newCatalogueItem->addAndValidateOptionalString($key, $attr["val"], "The value is not a string");
          break;
        }
      }
    }
    //TODO: fix unique ID generation
    if ($newCatalogueItem->getDatamapValue("hasid")==null){
      //create id
      $id=$datahub.$description.$parentUrl.$itemId;
      // $id=$datahub.$description.$itemId;
      $id = sha1($id);
    }else{
      $id = $parentUrl.$newCatalogueItem->getDatamapValue("hasid");
    }
    print "\n \n \n ID ID ID ID ID ID = ".$id;
    //set other metadata
    $newCatalogueItem->addAndValidateOptionalString("id", $id, "The value is not a string");
    $newCatalogueItem->addAndValidateOptionalString("datahub", $datahub, "The value is not a string");
    $newCatalogueItem->addAndValidateOptionalString("href", $href, "The value is not a string");
    $newCatalogueItem->addAndValidateOptionalString("parentUrl", $parentUrl, "The value is not a string");
    $newCatalogueItem->addAndValidateBoolean("isCatalogue", $isCatalogue, "The value is not a boolean");
    //TODO: set itemCount(?), locationGeo (Sensor data only)
  }

  private function _decodeConfig($sourceConfig){
    $decodedConfig = json_decode($sourceConfig,true);
    if ($decodedConfig==null){
      throw new KurogoConfigurationException("Invalid JSON file");
    }
    if (!is_array($decodedConfig)) {
      throw new KurogoConfigurationException("Json config is not an array");
    }
    return $decodedConfig["feeds"];
  }

  public function convertToSolrDateTimeFormat($date){
    print "\n date: ".$date;
    //convert date string to solr accepted format
    return gmdate('Y-m-d\TH:i:s\Z', strtotime($date)); 
  }

}