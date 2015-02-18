<?php 
includePackage ('SolrDataAggregation');
class RoadWorkMashupWebModule extends WebModule
{
    protected $id='RoadWorkMashup';

    protected function initialize(){
    	
    }

    protected function initializeForPage() {
         $this->addInternalJavascript("/modules/RoadWorkMashup/javascript/common.js"); //FIREFOX does not recognize MAKEAPICALL
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
	$this->addExternalJavascript("http://open.mapquestapi.com/sdk/leaflet/v1.0/mq-map.js?key=Fmjtd%7Cluur2g61nl%2Crw%3Do5-9az2h0");
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
                break; 
        } 
    }
}
