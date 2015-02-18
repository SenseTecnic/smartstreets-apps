<?php
	class RoadworkFloodingWebModule extends WebModule {
		protected $id = 'RoadworkFlooding';
		protected function initializeForPage(){
			
			//Load JQuery into the system
			$this->addExternalJavascript('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
			$this->addExternalJavascript('http://code.jquery.com/ui/1.10.3/jquery-ui.js');

			//Load leaflet.js
        	$this->addExternalCSS("http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css");
        	$this->addExternalJavascript("http://cdn.leafletjs.com/leaflet-0.5.1/leaflet-src.js");

        	//$this->addExternalCSS("https://api.tiles.mapbox.com/mapbox.js/v1.6.2/mapbox.css");
        	$this->addExternalJavascript("http://maps.google.com/maps/api/js?sensor=false");
        	
        	//Load local js files
        	$this->addInternalJavascript("/modules/RoadworkFlooding/javascript/heatmap.js");
			$this->addInternalJavascript("/modules/RoadworkFlooding/javascript/heatmap-leaflet.js");
			//$this->addInternalJavascript("/modules/RoadworkFlooding/javascript/heatmap-gmaps.js");
			$this->addInternalJavascript("/modules/RoadworkFlooding/javascript/QuadTree.js");

			$this->addExternalCSS("http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css");
			$this->addExternalJavascript("http://code.jquery.com/ui/1.10.4/jquery-ui.js");

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