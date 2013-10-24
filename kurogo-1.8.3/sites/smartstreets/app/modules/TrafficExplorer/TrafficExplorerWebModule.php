<?php 
includePackage ('SolrDataAggregation');
class TrafficExplorerWebModule extends WebModule
{
    protected $id='TrafficExplorer';

    protected function initialize(){
    	
    }

    protected function initializeForPage() {
        $this->addInternalJavascript("/modules/TrafficExplorer/javascript/common.js"); //FIREFOX does not recognize MAKEAPICALL
        //JS
    	$this->addExternalJavascript('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    	$this->addExternalJavascript('http://code.jquery.com/ui/1.10.3/jquery-ui.js');

        //D3.JS
        $this->addExternalJavascript("http://d3js.org/d3.v3.min.js");
        $this->addExternalJavascript("http://d3js.org/topojson.v1.min.js");

        //NVD3.JS
        $this->addInternalJavascript("/modules/TrafficExplorer/javascript/nv.d3.min.js");
        $this->addInternalCSS("/modules/TrafficExplorer/css/nv.d3.css");

        //leaflet.js
        $this->addExternalCSS("http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css");
        $this->addExternalJavascript("http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js");

        //heatmap.js
        $this->addInternalJavascript("/modules/TrafficExplorer/javascript/heatmap-leaflet.js");
        $this->addInternalJavascript("/modules/TrafficExplorer/javascript/heatmap.js");
        $this->addInternalJavascript("/modules/TrafficExplorer/javascript/QuadTree.js");

        //cross filter.js
        $this->addInternalJavascript("/modules/TrafficExplorer/javascript/crossfilter.min.js");

        $this->addInternalJavascript("/modules/TrafficExplorer/javascript/jQDateRangeSlider-withRuler-min.js");
        $this->addInternalCSS("/modules/TrafficExplorer/css/iThing.css");

        //CSS
    	$this->addExternalCSS('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');


        $this->assign('message', 'TrafficExplorer!');

        //instantiate controller
        $this->controller = DataRetriever::factory('InteropDataRetriever', array());
        
        switch ($this->page) 
        { 
            case 'index': 
                break;
        } 
    }
}
