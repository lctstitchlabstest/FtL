<?php

require_once('./ShapeFactory.php');

  //  variable storing the entered index value of the object in the array read from the file
  $index = null;

  //  variable storing the entered id value of the object in the array read from the file
  $id = null;
  //  array of objects read from the file specified on the command line
  $shapes = array();

/**
 * Sorts the list of shapes by area 
 * Using the Quicksort algorithm
 * @param Shape[] $shapes Collection of shapes
*/
function sortByArea($shapes) {
	if(is_array($shapes)){
		if( count($shapes) < 2 ) {
			return $shapes;
		}
		$left = $right = array( );
		reset( $shapes );
		$pivot_key  = key( $shapes );
		$pivot_object = array_shift($shapes);
		//echo " \n Pivot Object \n ";
		//print_r($pivot_object);
		$pivot = $pivot_object->getArea();
		foreach( $shapes as $k => $shape ) {
			if( $shape->getArea() < $pivot )
				$left[$k] = $shape;
			else
				$right[$k] = $shape;
		}
		return array_merge(sortByArea($left), array($pivot_key => $pivot_object), sortByArea($right));
	}
	else
	{
		echo " \n Error:  Value to be sorted is not an array  \n ";
		exit(1);
		
	}
}

/**  Backup Sorting Routine
 * Sorts the list of shapes by area 
 * Using the Quicksort algorithm
 * @param Shape[] $shapes Collection of shapes
*/
function sortByArea2($shapes) {
	if(is_array($shapes)){
		if(count($shapes) < 2) {
			return $shapes;
		}
    $pivot= $shapes[0];
    $low = $high = array();
    $length = count($shapes);
    for($i=1; $i < $length; $i++) {
		///print_r($shapes[$i]);
		//print_r($pivot);

		//echo " \n Comparison  Shapes Area: " . $shapes[$i]->getArea() . " tp Pivot Area: " . $pivot->getArea() . " \n ";
		//exit();
        if($shapes[$i]->getArea() <= $pivot->getArea()) {
            $low[] = $shapes[$i];
        } else {
            $high[] = $shapes[$i];
        }
    }
    return array_merge(sortByArea($low), array($pivot), sortByArea($high));
  }
  else
  {
    echo " \n Error:  Value to be sorted is not an array  \n ";
	exit(1);
		
  }
}

/**
 * Returns the array index of the instance in the list to the caller.
 * This method takes in the shape instance to compare it with the
 * shapes in the $shapes array and to find the index of that shape
 * within the array. 
 *
 * @param Shape $instance Individual Shape Instance
 * @param Shape[] $shapes All Shapes
 * @return int Shapes array index
 */
function findShapeIndex($id, $shapes) {

	if(is_array($shapes)){
     // implementation
	    foreach ($shapes as $index => $shape) {
			if($shape->getID() == $id)
			  return $index;
		}
		return " \n The index couldn't be found! \n ";
	}
	else
	{
		echo " \n Error:  Value to be searched is not an array  \n ";
		exit(1);
		
	}
	 
}


/**
 * Reads from a file  
 * Using the Quicksort algorithm
 * @param $file the path to a file   $shapes An array for storing a collection of shapes
*/
function createShapeArray($file, &$shapes) {
	$filedata = file_get_contents($file, true);
	$filearray = explode("\n", $filedata);
	//  Get rid of first line
	$headers = array_shift($filearray);
	$wordarray = array();
    $filearray = array_filter( $filearray );
	foreach($filearray as $filetext)
	{
		$shape_array = explode(',', $filetext);
		$shapes[] = ShapeFactory::createShape($shape_array);	
	}

}


/* Read file and a create an object array of shapes */
//echo "Are you sure you want to do this?  Type 'yes' to continue: ";
$handle = fopen ("php://stdin","r");

if (defined('STDIN')) {
	//print_r($argv);
	//exit(1);
  $file_name = $argv[1];
} 

// format of input expected
// data.csv 5

createShapeArray($file_name, $shapes);
/* Get the array index of the shape with ID that was passed in and write to screen */
$id = trim($argv[2]);
$index = findShapeIndex($id, $shapes);
echo " \n First Index :  " . $index . " \n ";
/* Sort the shapes by area and write the results to the screen */
//print_r($shapes);

$shapes = sortByArea($shapes);	

//print_r($shapes);
//exit();
do  {
	$id = $id + 0;
	/* Get the new array index of the shape with ID that was passed in and write to screen */
	$index = findShapeIndex($id, $shapes);
	echo " \n Next Index :  " . $index . " \n ";
	sleep(5);
	echo " \n please enter another shape id to search for: ";
	$id = fgets($handle);	
} while(trim($id) != 'abort');
fclose($handle);

echo "\n"; 
echo "Thank you, ABORTING...\n";

echo "aborted!\n";


  
