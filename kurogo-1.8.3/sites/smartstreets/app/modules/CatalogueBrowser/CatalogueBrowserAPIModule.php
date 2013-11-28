<?php 
includePackage ('SolrDataAggregation');
class CatalogueBrowserAPIModule extends APIModule
{
    protected $id='CatalogueBrowser';

    //datahubs url
    protected function initializeForCommand() {
        //instantiate controller 
        $this->controller = DataRetriever::factory('InteropDataRetriever', array());
        $CatalogueItemSolrController = DataRetriever::factory('CatalogueItemSolrDataRetriever', array());
        switch ($this->command) 
        { 
            case 'viewItemDetails': 
                //TODO: get item details for private stuff
                // $header ="x-api-key";
                // $key = "f9c0e0b7-8c4a-4f32-bf9c-7a7fac849659";
                $header = $this->getArg('header');
                $key = $this->getArg('key');
                $baseURL = $this->getArg('part1')."&val=".$this->getArg('part2');
                $details = $this->controller->getItemDetails($baseURL, $header, $key);

                $this->setResponse($details);
                $this->setResponseVersion(1);
                break; 
            case 'viewItemResource': 
                //TODO: get item details for private stuff
                // $header ="x-api-key";
                // $key = "f9c0e0b7-8c4a-4f32-bf9c-7a7fac849659";
                $header = $this->getArg('header');
                $key = $this->getArg('key');
                $baseURL = $this->getArg('url');
                $details = $this->controller->retrieveSourceWithAuthentication($baseURL, $header, $key);

                $this->setResponse($details);
                $this->setResponseVersion(1);
                break; 
            case 'getDatahubCatalogues':
                $baseURL = $this->getArg('baseURL');
                $catalogues = $this->controller -> getCatalogues($baseURL);

                $this->setResponse($catalogues);
                $this->setResponseVersion(1);
                break;
            case 'loadMoreItems':
                $params['parentUrl']= $this->getArg('parentUrl');
                $index = $this->getArg('index');
                $sort=$this->getArg('sort');
                //TODO
                $items = SolrSearchResponse::getKeywordSearchResponse($CatalogueItemSolrController, $params, $sort, $index);

                $this->setResponse($items);
                $this->setResponseVersion(1);
                break;
            case 'loadMoreResults':
                $params= $this->getArg('searchParam');
                $index = $this->getArg('index');
                $sort=$this->getArg('sort');
                $items = SolrSearchResponse::getKeywordSearchResponse($CatalogueItemSolrController, json_decode($params), $sort, $index);
                $this->setResponse($items);
                $this->setResponseVersion(1);
                break;
        } 
    }
}