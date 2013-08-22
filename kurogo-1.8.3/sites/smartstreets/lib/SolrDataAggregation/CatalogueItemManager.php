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
      $feeds = $this->_retrieve($source["url"], $source["name"]);
      
      /*Log the retrieved feed to a file
      $jsonUpdateString = '['. implode(',', $feeds). ']';
      $file = './log.json';
      file_put_contents($file, $jsonUpdateString);*/ 
      
      //write to solr
      // $this->catalogueItemSolrController->persistFeedItems($feeds);
    }
  }

  private function _retrieve($root_url, $datahub){
  
    $data = $this->interopController->retrieveSource($root_url);
    //check if returned json is a data feed
    if ($data ["items"]!=null && $data["item-metadata"]!=null){
      //IS a valid data feed, create new catalogue item
      //hack to get sensor data in:
      // $root_url = "http://smartstreets.sensetecnic.com/cat/sensors"; //HACK for adding sensors data form local env
      $jsonFeeds= $this->_parseResultsToCatalogueItems($data, $root_url, $datahub);
      $this->catalogueItemSolrController->persistFeedItems($jsonFeeds);
    }else{
      print "The response is not a valid sourcefeed, output: ".json_encode($data)."\n";
    }
    return $jsonFeeds;
  }

  private function _parseResultsToCatalogueItems($feed, $feed_url, $datahub){
    
    $feed_array = array();

    if ($feed["items"]){
        foreach ($feed["items"] as $item){

          $isCatalogue=false;

          foreach ($item["i-object-metadata"] as $pair){
            $rel=$pair["rel"];
            $val=$pair["val"];

            if ($rel == "urn:X-tsbiot:rels:isContentType"){
              if (strpos($val, "vnd.tsbiot.catalogue") !==false){
                //is Catalogue
                print "\n This is a catalog, val= ".$val;
                $isCatalogue=true;

                //check if url is full
                if (strpos($item["href"], "http") !==false){
                  $childrenUrl = $item["href"];
                }else{
                  $tPos = strpos($feed_url, "/cat");
                  $tUrl = substr_replace ($feed_url, $item["href"], $tPos);
                  $childrenUrl = $tUrl;
                }

                print "\nchildren url = ".$childrenUrl;
                $childrenFeeds = $this->_retrieve($childrenUrl,$datahub);

                //merge two arrays
                foreach ($childrenFeeds as $child){
                  $feed_array[]= $child;
                }
              }else{
                print "\n This is a resource, val= ".$val;
                $isCatalogue=false;
              }
            }
          }
          $parentUrl = $feed_url;
          $newCatalogueItem = CatalogueItem::createCatalogueItem();
          $this->_populateCatalogueItem($newCatalogueItem, $item, $parentUrl, $datahub, $isCatalogue);
          $json = $newCatalogueItem->getSolrUpdateJson();
          $feed_array[]= $newCatalogueItem;
        }
    }

    return $feed_array;
  }

  private function _populateCatalogueItem(&$newCatalogueItem, $jsonFeedItem, $parentUrl, $datahub, $isCatalogue){
      
    //set href as full url 
    $href = $jsonFeedItem["href"];
    if ($isCatalogue){
      //search for /cat in base url and replace with $href
      $base = $this->base_url;
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
    if ($newCatalogueItem->getDatamapValue("hasid")==null){
      //create id
      $id=$datahub.$description.$itemId;
      $id = sha1($id);
    }else{
      $id = $newCatalogueItem->getDatamapValue("hasid");
    }
    
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