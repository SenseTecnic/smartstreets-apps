<?php

class SearchQuery {

  protected $keywordMap = array();
  protected $filters = array();
  protected $returnFields = array();
  protected $rows;
  protected $startIndex;
  protected $sorts = array();

  /**
   * Code copied from http://e-mats.org/2010/01/escaping-characters-in-a-solr-query-solr-url/
   * Escapes a solr string.
   */

  static public function escapeSolrValue($string)
  {
    $match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
    $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
    $string = str_replace($match, $replace, $string);
    return $string;
  }

  public function addFilter($filter) {
    // Due to problem specific to geospatial queries separating them.
    if ($filter instanceof GeoRadiusSearchFilter ||
        $filter instanceof BoundingBoxSearchFilter) {
      array_push($this->geoFilters, $filter);
    } else {
      array_push($this->filters, $filter);
    }
  }

  public function addReturnField($field) {
    array_push($this->returnFields, $field);
  }

  public function addSort(SearchSort $sort) {
    $this->sorts[] = $sort;
  }

  public function addCategory($category) {
    $this->categories[] = $category;
  }

  /**
   * Add a query keyword
   */
  public function addKeyword($keyword, $boost = null, $field = "text") {
    // False booleans print out as "", we don't want that
    $escapedKeyword = self::escapeSolrValue($keyword);
    if (isset($boost)) {
      $escapedKeyword .= "^". $boost;
    }
    $this->keywordMap[] = array($field, $escapedKeyword);
  }

  public function setStartIndex($index) {
    $this->startIndex = $index;
  }

  public function setMaxItems($max) {
    $this->rows = $max;
  }

  // Return query parameters as an associative array of key to value
  public function getQueryParams($type) {
    $searchParams  = array();

    $keywords = array();
    foreach ($this->keywordMap as $pair) {
      $searchField = $pair[0];
      $keyword = $pair[1];
      $keywords[] = "{$searchField}:{$keyword}";
    }

    // if no keywords, the default is to search for anything
    if (empty($keywords)) {
      $keywords[] = "*:*";
    }

    if ($type=='AND'){
      $searchParams["q"] = implode(" AND ", $keywords);
    }else{
      // Do a OR search of label keywords
      $searchParams["q"] = implode(" OR ", $keywords);
    }
    

    if ($this->returnFields != null) {
      $searchParams["fl"] = implode(',', $this->returnFields);
    }

    // set number of max items to return
    if ($this->rows !== null) {
      $searchParams["rows"] = $this->rows;
    }

    // set startindex
    if ($this->startIndex !== null) {
      $searchParams["start"] = $this->startIndex;
    }


    // Add filters
    $fq = array();
    foreach ($this->filters as $filter) {
      $fq[] = $filter->getQueryString();
    }

    // Although solr allows multiple fields such as fq, Kurogo's representation uses a PHP array
    // So cannot have multiple fields. To workaround we combine all fq's with logical and
    if (!empty($fq)) {
      if (isset($searchParams["fq"])) {
        $searchParams["fq"] .= " AND ";
      } else {
        $searchParams["fq"] = "";
      }
      $searchParams["fq"] .= implode(" AND ", $fq);
    }

    // Add sort of the query
    $sortParams = array();
    foreach ($this->sorts as $sort) {
      $sortParams[] = $sort->getQueryString();
    }

    if (!empty($sortParams)) {
      $searchParams["sort"] = implode(", ", $sortParams);
    }

    Kurogo::log(1, "Search params: ". print_r($searchParams, true), "data");
    return $searchParams;
  }
}