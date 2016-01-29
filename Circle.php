<?php
require_once('./Shape.php');

class Circle extends Shape {

  private $radius;
  
  public function __construct($id, $radius)  {
	  Shape::setID($id);
	  $this->setRadius($radius);
	  $this->setArea();
  }
  
  public function setRadius($radius) {
	  $this->radius = $radius;
	  
  }
    
  public function setArea() {
	  $this->area = pi() * pow($this->radius, 2);
	  
  }

  public function getArea() {
  //  This should have been defined in the base class but it had to be defined in the child classes to work	  
  //  It may be that you can only inherit methods when you inherit BOTH set and get methods unfortunately	  
	  return $this->area;
  }

}


