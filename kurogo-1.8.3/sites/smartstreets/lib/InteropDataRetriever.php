<?php
class InteropDataRetriever extends URLDataRetriever 
{ 
    protected $DEFAULT_PARSER_CLASS = 'JSONDataParser'; 
 
 	//base urls of datahubs
 	

 	public function getCatalogues($datahubURL) { 
        $this->setBaseURL($datahubURL."/cat"); 
        $data = $this->getData($response); 
        return $data; 
    } 

    public function getCatalogueItems($datahubURL, $href){
    	$queryURL = $datahubURL.$href;
    	$this->setBaseURL($queryURL); 
    	$data = $this-> getData ($response);
    	return $data;
    }

    public function getItemDetails($fetchURL, $header, $key) { 
    	$this->setBaseURL($fetchURL); 
        $this->addHeader($header, $key);
        $data = $this->getData($response); 
        return $data; 
    }  

    public function searchByParameters($searchURL) { 

        //Get search results by providing search URL
        $this-> setBaseURL($searchURL);
        $results = $this-> getData($response);

        return $results;
    } 

    /*
        * test function to search by tags
    */
    public function getSensorData($tags) { 
        $this->setBaseURL('http://smartstreets.sensetecnic.com/cat/sensors'); 
        $this->addParameter('rel', "urn:X-smartstreets:rels:tags"); 
        $this->addParameter('val', $tags); 
        $data = $this->getData($response); 
        return $data; 
    } 

    /******** Functions below are for retrieving sources to populate Solr ********/
    public function retrieveSource($url){
        $base_url = $url;
        //print $base_url."\n";
        $this->setBaseURL ($base_url);
        $data = $this->getData($response);
        return $data;
    }
    public function retrieveSourceWithAuthentication($url, $header,$key){
        $base_url = $url;
        $this->setBaseURL ($base_url);
        if ($header=="Authorization"){
            $data = $this->curl($url, $header, $key);
        }else{
            $this->addHeader($header, $key);
            $data = $this->getData($response);
        }
        return $data;
    }

    public function curl($url, $header,$key){
        $ch = curl_init();
        $options = array(CURLOPT_URL => $url,
            CURLOPT_USERPWD => $key.":",
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_RETURNTRANSFER => TRUE
        );
        //Set options against curl object
        curl_setopt_array($ch, $options);

        //Assign execution of curl object to a variable
        $data = curl_exec($ch);

        //Close curl object
        curl_close($ch);
        return $data;
    }
}