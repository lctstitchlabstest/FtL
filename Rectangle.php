<?php
require_once('./Shape.php');

class Rectangle extends Shape {

  private $height;
  private $width;
  
  public function __construct($id, $width, $height)  {
	  Shape::setID($id);
	  $this->setHeight($height);
	  $this->setWidth($width);
	  $this->setArea();
  }
  
  public function setHeight($height) {
	  $this->height = $height;
	  
  }
  
  public function setWidth($width) {
	  $this->width = $width;
	  
  }
    
  public function setArea() {
	  $this->area = $this->height * $this->width;
	  
  }

  public function getArea() {
  //  This should have been defined in the base class but it had to be defined in the child classes to work	  
  //  It may be that you can only inherit methods when you inherit BOTH set and get methods unfortunately	  
	  return $this->area;
  }

}


