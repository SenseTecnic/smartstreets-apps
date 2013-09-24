<?php 
includePackage ('SolrDataAggregation');
class RoadWorkMashupWebModule extends WebModule
{
    protected $id='RoadWorkMashup';

    protected function initialize(){
    	
    }

    protected function initializeForPage() {

        //JS
    	$this->addExternalJavascript('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    	$this->addExternalJavascript('http://code.jquery.com/ui/1.10.3/jquery-ui.js');

        //D3.JS
        $this->addExternalJavascript("http://d3js.org/d3.v3.min.js");
        $this->addExternalJavascript("http://d3js.org/topojson.v1.min.js");

        //NVD3.JS
        $this->addInternalJavascript("/modules/RoadWorkMashup/javascript/nv.d3.min.js");
        $this->addInternalCSS("/modules/RoadWorkMashup/css/nv.d3.css");

        //leaflet.js
        $this->addExternalCSS("http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css");
        $this->addExternalJavascript("http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js");

        //cross filter.js
        $this->addInternalJavascript("/modules/RoadWorkMashup/javascript/crossfilter.min.js");

        $this->addInternalJavascript("/modules/RoadWorkMashup/javascript/jQDateRangeSlider-withRuler-min.js");
        $this->addInternalCSS("/modules/RoadWorkMashup/css/iThing.css");

        //CSS
    	$this->addExternalCSS('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');



        //instantiate controller
        $this->controller = DataRetriever::factory('InteropDataRetriever', array());
        
        switch ($this->page) 
        { 
            case 'index': 

                //test on getting air quality data
                // $url = "http://guiness.magic.ubc.ca/wotkit/api/sensors/58024/data?beforeE=1000";
                // $response = $this->controller->getItemDetails($url);
                // $json= json_decode($response, 1);
                // ChromePhp::log ("response: ".$json[0]["id"]);
                break; 
        } 
    }
}
