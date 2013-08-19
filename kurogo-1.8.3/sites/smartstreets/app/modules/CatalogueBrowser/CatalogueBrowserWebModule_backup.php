<?php 
include 'chromephp-master/ChromePhp.php';
class CatalogueBrowserWebModule extends WebModule
{
    protected $id='CatalogueBrowser';

    //datahubs url
    protected $SMARTSTREETS_URL='http://smartstreets.sensetecnic.com';
    // protected $SELECTED_DATAHUB = "";

    protected function initialize(){
    	//set up data structures and js libs
    }

    protected function initializeForPage() {

    	$this->addExternalJavascript('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    	$this->addExternalJavascript('http://code.jquery.com/ui/1.10.3/jquery-ui.js');
    	$this->addExternalCSS('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
    	
        $this->assign('message', 'Catalogue Browser');

        //instantiate controller 
        $this->controller = DataRetriever::factory('InteropDataRetriever', array());

        switch ($this->page) 
        { 
            case 'index': 

                //TODO: make a page for selecting datahubs
                $SELECTED_DATAHUB = "Smartstreets";
                $baseURL= $this->getModuleVar('BASE_URL', $SELECTED_DATAHUB,"datahub");

                
                 //get the  catalogues 
                 $catalogues = $this->controller->getCatalogues($baseURL);

                 //prepare the list of catalogues
                 $catalogueList = array();

                 foreach ($catalogues["items"] as $catalogueItem){
                 	//each item has "i-object-metadata", and "href"
                 	$href = $catalogueItem["href"];
                 	// $metadata = json_encode($catalogueItem["i-object-metadata"], true);
                  //   ChromePhp::log ("test: ".$metadata);

                 	//check if catalog supports search and has description
                 	$description= ""; 
                 	$isSearchable = false;
                 	foreach ($catalogueItem["i-object-metadata"] as $metaItem){
                        

                 		if ($metaItem["rel"]== $this->getModuleVar('Description', $SELECTED_DATAHUB.":catalogue:rel","datahub")){
                 			$description = $metaItem["val"];
                 		}
                 		if ($metaItem["rel"]== $this->getModuleVar('Support_Search', $SELECTED_DATAHUB.":catalogue:rel","datahub") && $metaItem["val"]== "urn:X-tsbiot:search:simple"){
                 			$isSearchable=true;
                 		}
                 	}
                 	//build view catalogue redirect URL and args to pass 
                 	$args = array(
                 		'href' => $href,
                        'hub' => $SELECTED_DATAHUB
                 	);

                 	// create navlist item
                 	$catalogue = array (
                 		'label'=> $this->getModuleVar($SELECTED_DATAHUB, "datahubs", "datahub")." Hub",
                 		'boldLabels'=> true,
                 		'title'=> $href,
                 		'subtitle' => $description,
                 		'url' => $this->buildBreadcrumbURL("viewCatalogue", $args, true)
                 	);
             
                 	$catalogueList[]= $catalogue;
                 	//KurogoDebug::debug($catalogueItem["href"], $halt=false);
                 }
                 $this->assign('catalogueList', $catalogueList);

                 break; 

            case 'viewCatalogue':
            	$parent_href = $this->getArg('href');
                $SELECTED_DATAHUB = $this->getArg('hub');
            	//set page title
            	$this -> setPageTitle ($parent_href);
            	//query data from smartstreets
                ChromePhp::log ("section id: ".$this->getArg('hub'));
                $baseURL= $this->getModuleVar('BASE_URL', $this->getArg('hub'),"datahub");
                $catItems = $this->controller->getCatalogueItems($baseURL, $parent_href);

                //prepare the list of catalogues
                $itemList = array();
                $json= json_encode($catItems, true);

                if ($catItems["item-metadata"]){

                 	//it is a catalogue 
                 	// dispaly catalogue metadata details
                 	$catMetadata = array();
	                foreach ($catItems["item-metadata"] as $metadata){

	                	$rel = $metadata["rel"];
	                	$val = $metadata["val"];

                        $rel_array = $this->getModuleSection($SELECTED_DATAHUB.":catalogue:rel", "datahub");
                        foreach ($rel_array as $key => $meta_val){                    
                            if ($rel == $meta_val){
                                $key = str_replace ("_", " ", $key);//replace '_' with space
                                $catMetadata[] = $key.": ".$val;
                            }
                        }

	                	// switch ($rel)
	                	// { 	
	                	// 	case "urn:X-smartstreets:rels:hasId":
	                	// 		$catMetadata[]= "ID: ".$val;
	                	// 		break;
	                	// 	case "urn:X-smartstreets:rels:hasName:en":
	                	// 		$catMetadata[]= "Name: ".$val;
	                	// 		break;
	                	// 	case "urn:X-tsbiot:rels:hasDescription:en":
	                	// 		$catMetadata[]= "Description: ".$val;
	                	// 		break;
	                	// 	case "urn:X-smartstreets:rels:lastUpdate":
	                	// 		$catMetadata[]= "Last Updated: ".$val;
	                	// 		break;
	                	// 	case "urn:X-smartstreets:rels:hasLicense":
	                	// 		$catMetadata[]= "License: ".$val;
	                	// 		break;
	                	// 	case "urn:X-smartstreets:rels:hasOrganization":
	                	// 		$catMetadata[]= "Organization: ".$val;
	                	// 		break;
	                	// 	case "urn:X-smartstreets:rels:hasVisibility":
	                	// 		$catMetadata[]= "Visibility: ".$val;
	                	// 		break;
	                	// 	case "urn:X-tsbiot:rels:isContentType":
	                	// 		$catMetadata[]= "Content Type: ".$val;
	                	// 		break;
	                	// 	case "urn:X-tsbiot:rels:containsContentType":
	                	// 		$catMetadata[]= "Contains Content Type: ".$val;
	                	// 		break;
	                	// 	case "urn:X-smartstreets:rels:tags":
	                	// 		$catMetadata[]= "Tags: ".$val;
	                	// 		break;
	                	// 	case "urn:X-tsbiot:rels:supportsSearch":
	                	// 		$catMetadata[]= "Supports Search: ".$val;
	                	// 		break;
	                	// 	default:
	                	// 		ChromePhp::log('Untracked metadata rel: '.$metadata["rel"]);
	                	// }	           
	                }  
	                ChromePhp::log('Cat info: '.implode("\n", $catMetadata));
	                $this->assign('catalogueInfo', $catMetadata);
                }

                
                foreach ($catItems["items"] as $item){
                	//each item has "i-object-metadata", and "href"
                 	$href = $item["href"];
                 	$metadata = json_encode($item["i-object-metadata"], TRUE);


                 	//check if catalog supports search and has description
                 	$description= "No Description"; 
                 	$id="";
                 	$name = "No Name";
                 	$title = "";
                 	$maintainer = "";
                 	$isSearchable = 0;
                 	$isCatalogue = 0;
                 

                 	$url="";
                 	$resourceURL="";
                 	$itemSearchURL="";

                 	foreach ($item["i-object-metadata"] as $metaItem){


                        $rel = $metaItem["rel"];
                        $val = $metaItem["val"];

                        // $item_rel_array = $this->getModuleSection($SELECTED_DATAHUB.":item:rel", "datahub");
                        // foreach ($item_rel_array as $key => $meta_val){                    
                        //     if ($rel == $meta_val){
                        //         $catMetadata[] = $key.": ".$val;
                        //     }
                        // }

                        switch ($rel){
                            case $this->getModuleVar('Description', $SELECTED_DATAHUB.":item:rel", 'datahub'):
                                if ($val !="")
                                    $description = $val;
                                break;
                            case $this->getModuleVar('Support_Search', $SELECTED_DATAHUB.":item:rel", 'datahub'):
                                if ($val =="urn:X-tsbiot:search:simple")
                                    $isSearchable=1;
                                break;
                            case $this->getModuleVar('ID', $SELECTED_DATAHUB.":item:rel", 'datahub'):
                                if ($val !=""){
                                    $id = $val;
                                    $itemSearchURL =$baseURL.$parent_href."?rel=".$rel."&val=".$id;
                                }
                                break;
                            case $this->getModuleVar('Name', $SELECTED_DATAHUB.":item:rel", 'datahub'):
                                if ($val !="")
                                    $name = $val;
                                break;
                            case $this->getModuleVar('Title', $SELECTED_DATAHUB.":item:rel", 'datahub'):
                                if ($val !="")
                                    $title = $val;
                                break;
                            case $this->getModuleVar('Maintainer', $SELECTED_DATAHUB.":item:rel", 'datahub'):
                                if ($val !="")
                                    $maintainer = $val;
                                break;
                            case $this->getModuleVar('Content_Type', $SELECTED_DATAHUB.":item:rel", 'datahub'):
                                if ($val =="application/vnd.tsbiot.catalogue+json")
                                    $isCatalogue=1;
                                break;
                        }

                 		// if ($metaItem["rel"]== "urn:X-tsbiot:rels:hasDescription:en"){
                 		// 	if ($metaItem["val"]!="")
                 		// 		$description = $metaItem["val"];
                 		// }
                 		// if ($metaItem["rel"]== "urn:X-tsbiot:rels:supportsSearch" && $metaItem["val"]== "urn:X-tsbiot:search:simple"){
                 		// 	$isSearchable=1;
                 		// }
                 		// if ($metaItem["rel"]== "urn:X-smartstreets:rels:hasId"){
                 		// 	$id = $metaItem["val"];
                 		// 	//create search URL
                 		// 	$itemSearchURL =$this->SMARTSTREETS_URL.$parent_href."?rel=".$metaItem["rel"]."&val=".$id;
                 		// }
                 		// if ($metaItem["rel"]== "urn:X-smartstreets:rels:hasName:en"){
                 		// 	$name = $metaItem["val"];
                 		// }
                 		// if ($metaItem["rel"]== "urn:X-smartstreets:rels:hasTitle:en"){
                 		// 	$title = $metaItem["val"];
                 		// }
                 		// if ($metaItem["rel"]== "urn:X-smartstreets:rels:hasMaintainer"){
                 		// 	$maintainer = $metaItem["val"];
                 		// }
                 		// if ($metaItem["rel"]== "urn:X-tsbiot:rels:isContentType" && $metaItem["val"]=="application/vnd.tsbiot.catalogue+json"){
                 		// 	$isCatalogue= 1;
                 		// }

                        ChromePhp::log('metaItem: '.json_encode($metaItem));
                 	}

                 	
                 	//build view catalogue redirect URL and args to pass 
                 	$args = array(
                 		'id' => $id,
                 		'href' => $href,
                        'hub' => $SELECTED_DATAHUB
                 	);

                 	
                 	//check if it is an item or catalogue

                 	if ($isCatalogue){
                 		// open to another view catalogue page 
                 		$url = $this->buildBreadcrumbURL("viewCatalogue", $args, true);
                 		// ChromePhp::log('DRILL DOWN');
                 	}else{
                 		//create resource download url
                 		$resourceURL = $href;
                 	}

                 	// create navlist item
                 	$itemData = array (
                 		'label'=> $name,
                 		'boldLabels'=> true,
                 		'title'=> $title,
                 		'subtitle' => $description,
                 		'url' => $url,
                 		'resourceURL' => $resourceURL,
                 		'itemSearchURL'=> $itemSearchURL
                 	);
             
                 	$itemList[]= $itemData;
                }

                $this->assign('itemList', $itemList);

            	 break;

            case 'search':

                $datahub_array = $this -> getModuleSection ("datahubs", "datahub");

                $select_options_array = array();
                $select_options_array [""]= "None";
                foreach ($datahub_array as $key => $val){     
                    $hub = $key;              
                    $hub_url = $this-> getModuleVar('BASE_URL', $key ,"datahub");   //get base url from datahub.ini file using $key as section
                    $hub_name = $val;   // assign $val as select's option name

                    $select_options_array[$hub_url] = $hub;
                }
                ChromePhp::log ($select_options_array);
                $this->assign('select_options_array', $select_options_array);
                $this->assign('mySelect', "");
                break;

           	case 'searchResults':
                //set page title
                $this -> setPageTitle ("Search Results");
           		//handles user simple searches
                $datahub = $this->getArg('datahub');
                $datahub_name = $this->getArg('hub_selected');
                $catalogue_href = $this->getArg('catalogue');
                $content_type = $this->getArg('content_type');
                $id = $this->getArg('id');
                $description = $this->getArg('description');
                $name = $this->getArg('name');
                $tags = $this->getArg('tags');
                $maintainer = $this->getArg('maintainer');


                $results= SimpleSearchResponse::getSimpleSearchResponse($this->controller, $datahub, $catalogue_href, $content_type, $maintainer, $id, $description, $name, $tags );
                
                $results_json= json_encode($results, true);
                ChromePhp::log ("results:  ".$results_json);

                //process json and create nav list data
                $resultList = array();

                $resultCount=0;
                // TODO: check that the json returned is not NULL .
                if ($results ["items"] ==null){
                    ChromePhp::log ("There is no result");
                }else{


                foreach ($results["items"] as $resultItem){
                    //each item has "i-object-metadata", and "href"
                    $resultCount++;
                    $href = $resultItem["href"];

                    $description= "No Description"; 
                    $id="";
                    $name = "No Name";
                    $title = "";
                    $maintainer = "";
                    $isSearchable = 0;
                    $isCatalogue = 0;
                 

                    $url="";
                    $resourceURL="";
                    $itemSearchURL="";

                    foreach ($resultItem["i-object-metadata"] as $metaItem){

                        // urn:X-smartstreets:rels:lastUpdate
                        // urn:X-tsbiot:rels:hasDescription:en
                        // urn:X-smartstreets:rels:hasId
                        // urn:X-smartstreets:rels:hasName:en
                        // urn:X-tsbiot:rels:isContentType
                        // urn:X-smartstreets:rels:hasParentPackage

                        if ($metaItem["rel"]== "urn:X-tsbiot:rels:hasDescription:en"){
                            if ($metaItem["val"]!="")
                                $description = $metaItem["val"];
                        }
                        if ($metaItem["rel"]== "urn:X-tsbiot:rels:supportsSearch" && $metaItem["val"]== "urn:X-tsbiot:search:simple"){
                            $isSearchable=1;
                        }
                        if ($metaItem["rel"]== "urn:X-smartstreets:rels:hasId"){
                            $id = $metaItem["val"];
                            //create search URL
                            $itemSearchURL =$this->SMARTSTREETS_URL.$catalogue_href."?rel=".$metaItem["rel"]."&val=".$id;
                        }
                        if ($metaItem["rel"]== "urn:X-smartstreets:rels:hasName:en"){
                            $name = $metaItem["val"];
                            ChromePhp::log('name: '.$name);
                        }
                        if ($metaItem["rel"]== "urn:X-smartstreets:rels:hasTitle:en"){
                            $title = $metaItem["val"];
                        }
                        if ($metaItem["rel"]== "urn:X-smartstreets:rels:hasMaintainer"){
                            $maintainer = $metaItem["val"];
                        }
                        if ($metaItem["rel"]== "urn:X-tsbiot:rels:isContentType" && $metaItem["val"]=="application/vnd.tsbiot.catalogue+json"){
                            $isCatalogue= 1;
                        }
                    }
                    //build view catalogue redirect URL and args to pass 
                    $args = array(
                        'id' => $id,
                        'href' => $href,
                        'hub' => $datahub_name
                    );

                    //check if it is an item or catalogue

                    if ($isCatalogue){
                        // open to another view catalogue page 
                        $url = $this->buildBreadcrumbURL("viewCatalogue", $args, true);
                    }else{

                        //create resource download url
                        $resourceURL = $href;
                    }

                    // create navlist item
                    $itemData = array (
                        'label'=> $name,
                        'boldLabels'=> true,
                        'title'=> $title,
                        'subtitle' => $description,
                        'url' => $url,
                        'resourceURL' => $resourceURL,
                        'itemSearchURL'=> $itemSearchURL
                    );
             
                    $resultList[]= $itemData;
                }//end of foreach

                }

                $this->assign('itemList', $resultList);
                $this->assign ('resultCount', $resultCount);
                ChromePhp::log ("url: ".$url);
                //Case 1: No results, when item's href = href/data or href/sensor

                //Case 2: Returns catalogues

                break;

        } 
    }
}