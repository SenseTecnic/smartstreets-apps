<?php
/**
 * Contains methods that handle simple search queries
 */

includePackage ('SolrDataAggregation');

class SolrSearchResponse
{ 
 
    public static function getKeywordSearchResponse ($controller, $params, $sortField){

        $searchQuery = SearchQueryFactory::createKeywordSearchQuery($params);

        
        if ($sortField != null){
            $searchSort = new SearchSort($sortField, true);
            $searchQuery->addSort($searchSort);
        }

        $searchQuery->addReturnField("title");
        $searchQuery->addReturnField("id");
        $searchQuery->addReturnField("hasid");
        $searchQuery->addReturnField("hasdescription");
        $searchQuery->addReturnField("tags");
        $searchQuery->addReturnField("lastupdate");
        $searchQuery->addReturnField("isCatalogue");
        $searchQuery->addReturnField("href");
        $searchQuery->addReturnField("parentUrl");
        $searchQuery->addReturnField("datahub");
        $searchQuery->addReturnField("name");
        $searchQuery->addReturnField("iscontenttype");
        $searchQuery->addReturnField("maintainer");
        $data = $controller->query($searchQuery);

        if (!isset($data["response"])) {
          throw new KurogoDataException("Error, not a valid response.");
        }

        return json_encode ($data["response"]);
    } 	


}