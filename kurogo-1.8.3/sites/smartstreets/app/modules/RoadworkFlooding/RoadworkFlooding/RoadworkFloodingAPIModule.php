<?php
	ini_set("memory_limit", "-1");
	includePackage('SolrDataAggregation');
	class RoadworkFloodingAPIModule extends APIModule {
		protected $id = "RoadworkFlooding";

		protected function initializeForCommand() {
			$this->controller = DataRetriever::factory('InteropDataRetriever', array());

			switch ($this->command) {
				case 'getDataResponse':
					$baseURL = $this->getArg('url');
					if($this->getArg('x-api-key') != null) {
						$this->controller->setCustomHeader("x-api-key", $this->getArg('x-api-key'));
					}
					$details = $this->controller->getItemDetails($baseURL);

					$this->setResponse($details);
					$this->setResponseVersion(1);
					break;
			}
		}
	}
?>