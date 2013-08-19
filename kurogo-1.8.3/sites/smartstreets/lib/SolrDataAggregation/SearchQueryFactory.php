<?php

/**
 * Functions to create Solr Search Queries. 
 */
class SearchQueryFactory {

  public static function createSearchByIdQuery($id) {
    $searchQuery = new SearchQuery();
    $searchQuery->addFilter(new FieldQueryFilter("id", $id));
    return $searchQuery;
  }


  public static function createKeywordSearchQuery($params){

    $searchQuery = new SearchQuery();
    foreach ($params as $key => $value){
      //add keywords to search query
      if ($value!=""){
        $searchQuery->addKeyword($value, null, $key);
      }
    }
    return $searchQuery;
  }


}