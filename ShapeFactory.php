<?php
require_once('./Circle.php');
require_once('./Rectangle.php');

//The Shape factory.  Input the type of shape you want, and it will give it to you.
class ShapeFactory {
   
    //Different types of shapes.
    const CIRCLE = "circle";
    const RECTANGLE = "rectangle";
   


/**
 * Creates a specified shape object 
 * depending on the shape specification passed in
 * @param $args An array for storing a collection of shape properties including shape type, shape id, etc
*/
    public static function createShape($args){
		//print_r($args);
		//exit();
		$shape_id = array_shift($args);
		$shape_type = trim(strtolower(array_shift($args))) . '';
		//echo " \n Constant: " . self::CIRCLE . "< \n ";
		//echo " \n entered: " , $shape_type . "< \n ";
		
			//echo " \n EQUIVALENT \n ";
		//exit();
        if(self::CIRCLE == $shape_type) {
			    $radius = array_shift($args);
                $shape = new Circle($shape_id, $radius);
        }
        else if(self::RECTANGLE == $shape_type) {
			    $width = array_shift($args);
			    $height = array_shift($args);
                $shape = new Rectangle($shape_id, $width, $height);
        }
		else {

            die("Shape isn't recognized.");
        }
        return $shape;
    }
   
}

