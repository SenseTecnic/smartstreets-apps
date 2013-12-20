<?php

includePackage ('SolrDataAggregation');

class SolrAggregationShellModule extends ShellModule {

  protected $id='SolrAggregation';

  protected function initializeForCommand(){
    // Load all data sources from feeds.json file.
    $sourceConfig= $this->_loadDatahubConfig();
    $CatalogueItemSolrController = DataRetriever::factory('CatalogueItemSolrDataRetriever', array());
    $manager = new CatalogueItemManager($sourceConfig, $CatalogueItemSolrController);

    switch ($this->command){

      case "retrieveAll":
        print "\n Retrieving all data from dathubs...\n";
        try {
          $manager->retrieveAndPersistAll();
          print "Finished retrieving and persisting all\n";
        } catch (Exception $e){
          print "Error in retrieving and persisting, ".$e->getMessage()."\n";
        }
        break;

      case "deleteDocuments":
        print "Deleting solr documents by hub name.\n";
        $CatalogueItemSolrController->deleteDocuments("datahub:smartstreets"); // replace datahub name
        break;

      case "deleteAllFeeds":
        print "Deleting everything in solr\n";
        $CatalogueItemSolrController->deleteAll();
        break;

      default:
        print "The command {$this->command} does not exist. Commands include: \n\tretrieveAll \n\tdeleteDocuments \n\tdeleteAllFeeds \n";
    }
  }

  private function _loadDatahubConfig () {
    $sourceConfig = file_get_contents(SITE_DIR."/config/SolrAggregation/feeds.json");
    if ($sourceConfig === FALSE){
      print "Failed to open feeds.json file \n";
    }
    return $sourceConfig; //convert to associative array
  }
}