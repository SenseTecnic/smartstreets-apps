<?php

/**
 * Solr data retriever to query and persist catalogue items.
 */
class CatalogueItemSolrDataRetriever extends SolrDataRetriever {

  protected function getSolrBaseUrl() {
    return "http://localhost:8983/solr/CatalogueItems/";
  }

  public function query(SearchQuery $searchQuery, $type) {
    // Add testing filter
    //$searchQuery->addFilter(new FieldQueryFilter("testing", Tester::isTesting() ? "1" : "0"));
    return parent::query($searchQuery, $type);
  }

  /**
   * Query Solr for FeedItems according to searchQuery
   * @return array of FeedItems returned from Solr
   */
  public function queryFeedItem(SearchQuery $searchQuery) {
    $response = $this->query($searchQuery);
    //print "response\n";
    //print_r($response);
    if ($response["response"]["numFound"] === 0) {
      return array();
    }

    $feedItems = array();
    foreach ($response["response"]["docs"] as $feedItemData) {
      try {
        $feedItem = CatalogueItem::createFromSolr($feedItemData);
        array_push($feedItems, $feedItem);
      } catch (Exception $e) {
        print "Invalid feedItem returned from solr: ". $e->getMessage(). "\n";
        print_r($feedItemData);
      }
    }
    return $feedItems;
  }

  /**
   * Helper function to retrieve a Feed Item by its ID from solr
   * @param ID of feed item
   * @return FeedItem or null if it does not exist in Solr
   */
  public function queryById($id) {
    $searchQuery = new SearchQuery();
    $searchQuery->addKeyword($id, null, "id");
    $this->setCacheRequest(false);
    $returnedFeedItems = $this->queryFeedItem($searchQuery);
    $this->setCacheRequest(true);
    if (count($returnedFeedItems) == 0 ) {
      return null;
    }

    if (count($returnedFeedItems) > 1) {
      print "More than one feed item found for id: {$id}\n";
      print_r($feedItem);
      print "Solr return:\n";
      print_r($returnedFeedItems);
      return null;
    }

    return $returnedFeedItems[0];
  }


  /**
   * Insert an array of FeedItems into solr
   * @param FeedItem[] Items to persist to database
   * @param bool if false, will only exist if unique (no duplicate entries already exist)
   * @return number of items persisted
   */
  public function persistFeedItems($feedItems, $overwrite = false) {
    $skippedDuplicates = array();
    $jsonUpdate = array();
    foreach ($feedItems as $feedItem) {
      // Create a query which searches by ID and returns if it hit or not
      // Does not return the items itself
      if (!$overwrite) {
        $id = $feedItem->getLabel('id');
        $existingItem = $this->queryById($id);

        if (isset($existingItem)) {
          print "Item already exists, skipping ". $id. "\n";;
          $feedItem->setDuplicate();
          $skippedDuplicates[] = $existingItem;
          continue;
        }
      } else {
        print "Updating item in database, id: ". $id. "\n";
      }
      // Add valid item to persist list
      $jsonUpdate[] = $feedItem->getSolrUpdateJson();
    }

    print "Updating Solr FeedItems: ". count($jsonUpdate). " / ". count($feedItems). " after removing duplicates.\n";
    // trim trailing comma and add closing bracket
    $jsonUpdateString = '['. implode(',', $jsonUpdate). ']';
    $this->persist($jsonUpdateString);
    return $skippedDuplicates;
  }
}