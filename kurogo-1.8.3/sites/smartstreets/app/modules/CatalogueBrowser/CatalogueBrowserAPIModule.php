<?php 
include 'chromephp-master/ChromePhp.php';
class CatalogueBrowserAPIModule extends APIModule
{
    protected $id='CatalogueBrowser';

    //datahubs url
    //protected $SMARTSTREETS_URL='http://smartstreets.sensetecnic.com';


    protected function initializeForCommand() {
        //instantiate controller 
        $this->controller = DataRetriever::factory('InteropDataRetriever', array());

        switch ($this->command) 
        { 
            case 'viewItemDetails': 
                $baseURL = $this->getArg('searchUrl');
                $details = $this->controller->getItemDetails($baseURL);

                $this->setResponse($details);
                $this->setResponseVersion(1);
                break; 

            case 'getDatahubCatalogues':
                $baseURL = $this->getArg('baseURL');
                $catalogues = $this->controller -> getCatalogues($baseURL);

                $this->setResponse($catalogues);
                $this->setResponseVersion(1);
                break;
        } 
    }
}