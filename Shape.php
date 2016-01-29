<?php

abstract class Shape  {
  private $id;
  protected $area;

  public function setID($id) {
	  
	  $this->id = $id + 0;
  }

  public function getID() {
	  
	  return $this->id;
  }

}
