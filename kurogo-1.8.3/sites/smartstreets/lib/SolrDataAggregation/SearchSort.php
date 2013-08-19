<?php

class SearchSort {

  private $field;
  private $sortOrder;

  public function __construct($field, $ascending = true) {
    $this->field = $field;
    $this->sortOrder = ($ascending) ? "asc" : "desc";
  }

  public function getQueryString() {
    return $this->field. " ". $this->sortOrder;
  }

}