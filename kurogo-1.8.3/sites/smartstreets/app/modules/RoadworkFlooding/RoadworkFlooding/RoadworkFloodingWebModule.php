<?php
	class RoadworkFloodingWebModule extends WebModule {
		protected $id = 'RoadworkFlooding';
		protected function initializeForPage(){
			
			//Load JQuery into the system
			$this->addExternalJavascript('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
			$this->addExternalJavascript('http://code.jquery.com/ui/1.10.3/jquery-ui.js');

			//Load leaflet.js
			//$this->addExternalCSS("http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css");
        	//$this->addExternalJavascript("http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js");
        	$this->addExternalCSS("http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css");
        	$this->addExternalJavascript("http://cdn.leafletjs.com/leaflet-0.5.1/leaflet-src.js");

        	/*$this->addExternalJavascript("http://beta.mapquestapi.com/sdk/leaflet/v0.1/mq-map.js?key=Fmjtd%7Cluur29012d%2C2n%3Do5-90zxdf");
        	$this->addExternalJavascript("http://beta.mapquestapi.com/sdk/leaflet/v0.1/mq-routing.js?key=Fmjtd%7Cluur29012d%2C2n%3Do5-90zxdf");
			*/
        	//Load local js files
        	$this->addInternalJavascript("/modules/RoadworkFlooding/javascript/heatmap.js");
			$this->addInternalJavascript("/modules/RoadworkFlooding/javascript/heatmap-leaflet.js");
			$this->addInternalJavascript("/modules/RoadworkFlooding/javascript/QuadTree.js");

			$this->addExternalCSS("http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css");
			$this->addExternalCSS("");
			$this->addExternalJavascript("http://code.jquery.com/ui/1.10.4/jquery-ui.js");
			$this->addExternalJavascript("");

	        //instantiate controller
	        /*$this->controller = DataRetriever::factory('InteropDataRetriever', array());
	        
	        switch ($this->page) 
	        { 
	            case 'index': 
	                break; 
	        } */
		}
	}
?>