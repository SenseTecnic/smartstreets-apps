<?php

includePackage ('SolrDataAggregation');


class SolrAggregationShellModule extends ShellModule {

  protected $id='SolrAggregation';


  protected function initializeForCommand(){
    // Load all data sources from file.
    //$dataSourceConfigsDecoded = $this->loadConfig();

    // Initialize everything necessary for data retrieval and aggregation
    $sourceConfig= $this->_loadDatahubConfig();
    $CatalogueItemSolrController = DataRetriever::factory('CatalogueItemSolrDataRetriever', array());
    $manager = new CatalogueItemManager($sourceConfig, $CatalogueItemSolrController);

    switch ($this->command){

      case "retrieveAll":
        //populate solr with feed items from all sources
        print "\n Retrieving all data from dathubs...\n";

        try {
          $manager->retrieveAndPersistAll();
          print "Finished retrieving and persisting all\n";
        } catch (Exception $e){
          print "Error in retrieving and persisting, ".$e->getMessage()."\n";
        }
        break;

      case "deleteDocuments":
        print "Deleting some documents in solr\n";
        $CatalogueItemSolrController->deleteDocuments("datahub:distance");
        break;

      case "deleteAllFeeds":
        print "Deleting all documents in solr\n";
        $CatalogueItemSolrController->deleteAll();
        break;

      default:
        print "The command {$this->command} does not exist. Commands include: \n\tretrieveAll \n\tdeleteAllFeeds \n";
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