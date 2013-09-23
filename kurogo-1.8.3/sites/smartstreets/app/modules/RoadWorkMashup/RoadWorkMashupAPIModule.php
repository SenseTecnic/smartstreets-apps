<?php 
ini_set("memory_limit","-1");
includePackage ('SolrDataAggregation');
class RoadWorkMashupAPIModule extends APIModule
{
    protected $id='RoadWorkMashup';

    //datahubs url
    protected function initializeForCommand() {

        //instantiate controller 
        $this->controller = DataRetriever::factory('InteropDataRetriever', array());
        // $this->mongo= DataRetriever::factory('MongoDataRetriever', array());
        // $this->db = new MongoManager("localhost", "traffic");

        switch ($this->command) 
        { 
            case 'getDataResponse': 
                $baseURL = $this->getArg('url');
                $details = $this->controller->getItemDetails($baseURL);

                $this->setResponse($details);
                $this->setResponseVersion(1);
                break;
        } 
    }

}