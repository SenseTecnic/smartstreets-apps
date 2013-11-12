<?php


abstract class SolrDataRetriever extends URLDataRetriever {
  protected $DEFAULT_PARSER_CLASS = "JSONDataParser";
  protected $DEFAULT_CACHE_LIFETIME = 300; // 5 min

  protected $cacheGroup = 'Solr';

  abstract protected function getSolrBaseUrl();

  // internal function to retrieve query
  public function query(SearchQuery $searchQuery, $type) {
    $this->setBaseURL($this->getSolrBaseUrl(). "select");
    $queryParams = $searchQuery->getQueryParams($type);
    //print_r($queryParams);
    foreach ($queryParams as $key => $value) {
      $this->addParameter($key, $value);
    }

    $this->addParameter("wt", "json");
    $this->setMethod("GET");
    $data = $this->getData();

    $this->_checkResponseQuery($data);
    return $data;
  }

  /**
   * Persists an already formatted json to solr
   * @param string Valid Json that can be used to update solr
   */
  public function persist($jsonData) {
    if (!isset($jsonData)) {
      throw new KurogoDataException("Data to persist is null");
    }

    $this->setBaseURL($this->getSolrBaseUrl(). "update/json");
    $this->addHeader("Content-type", "application/json");
    // immediately make data searchable
    $this->addParameter("commit", "true");
    $this->setData($jsonData);
    $this->setMethod("POST");
    $this->setCacheRequest(false);
    $data = $this->getData();
    $this->setCacheRequest(true);

    $this->_checkResponseUpdate($data);
  }

  private function _checkResponseHeader($data) {

    if ($data == null) {
      throw new KurogoDataException("Entire response is null");
    }
    if (isset($data["responseHeader"])) {
      if ($data["responseHeader"]["status"] !== 0) {
        throw new KurogoDataException("Error in solr response");
      }
    }
  }

  private function _checkResponseQuery($data) {
    $this->_checkResponseHeader($data);
    if (!isset($data["response"])) {
      throw new KurogoDataException("No query response found although header returned");
    }
    if (!isset($data["response"]["numFound"])) {
      throw new KurogoDataException("Not a proper response, numFound is not there");
    }
  }

  private function _checkResponseUpdate($data) {
    $this->_checkResponseHeader($data);
  }

  public function deleteAll($query = "*:*") {
    $jsonQuery = '{"delete":{"query":"'. $query. '"}}';
    $this->persist($jsonQuery);
  }

  public function deleteDocuments($query) {
    $jsonQuery = '{"delete":{"query":"'. $query. '"}}';
    $this->persist($jsonQuery);
  }
}