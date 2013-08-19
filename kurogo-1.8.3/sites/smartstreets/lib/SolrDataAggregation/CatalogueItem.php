<?php


// Represents a catalogue item
class CatalogueItem
{
  protected $dataMap = array();
  protected $config;
  protected $createdFrom;

  private $duplicate = false;

  protected function __construct() {}

  public static $CatalogueParams =
    array(
          //"id" => array("string"), // sha1 hash of "datahub" . "itemId" . "description"
          "hasid" => array("string"),
          //"datahub" => array("string"),
          //"isCatalogue" => array("boolean"),
          //"itemCount" =>array ("int"),
          //"parentCatalogueId" => array("string"),
          //"parentUrl" => array("string"),
          "title" => array("string"),
          "maintainer" => array("string"),
          "fields" => array("string"),
          "data" => array("string"),
          "lat" => array("string"),
          "long" => array("string"),
          //"locationGeo" => array("string"),
          "lastupdate" => array(null, "string", "DateTime"),
          "hasdescription" => array("string"),
          "iscontenttype" => array("string"),
          "hasparentpackage" => array("string"),
          "license" => array("string"),
          "name" => array("string"),
          "tags" => array("array"),
          "visibility" => array("string"),
          "supportssearch" => array("string"),
          "containscontenttype" => array("array"),
          "organization" => array("string"),
          "owner" => array("string")
          //"href" => array("string")
          );
  
  // Factory method to create from config file
  public static function createCatalogueItem() {
    $CatalogueItem = new CatalogueItem();
    // $CatalogueItem->config = $config;
    // $CatalogueItem->createdFrom = "config";
    return $CatalogueItem;
  }

  public function addAndValidateString($key, $value, $errorMessage) {
    if (is_string($value)) {
      $this->dataMap[$key] = $value;
    } else {
      throw new KurogoDataException($errorMessage);
    }
  }

  public function addAndValidateOptionalString($key, $value, $errorMessage) {
    if ($value == null) {
      $this->dataMap[$key] = null;
    } else {
      $this->addAndValidateString($key, $value, $errorMessage);
    }
  }

  public function addAndValidateBoolean($key, $value, $errorMessage) {
    if (is_bool($value)) {
      $this->dataMap[$key] = $value;
    } else {
      throw new KurogoDataException($errorMessage);
    }
  }

  public function getDatamapValue($key){
    return $this->dataMap[$key];
  }

  /*
   * return json feed
  */
  public function getSolrUpdateJson() {
    //TODO: write isValid() method to validate feeds 

    $json = json_encode($this->dataMap);
    //print_r($json);
    return $json;
  }

  public function getLabel($key) {
    return (isset($this->dataMap[$key])) ? $this->dataMap[$key] : null;
  }

  public function addLabel($key, $value) {
    // trim whitespace
    if (is_string($value)) {
      $value = trim($value, ' ');
    }
    $this->dataMap[$key] = $value;
  }

}



