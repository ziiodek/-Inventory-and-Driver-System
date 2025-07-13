<?php
require_once '../GEOLOCATION.php';
if(isset($_POST['class'])){
	
	$function = $_POST['function'];
	$className = $_POST['class'];
	$driver_id = $_POST['driver_id'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	
	
	$class = new $className();
	$result = $class->$function($driver_id,$latitude,$longitude);
	
	if(is_array($result)){
		print_r($result);
		
	}else if(is_string($result) && is_array(json_decode($result,true))){
	print_r(json_decode($string,true));	
		
	}else{
		
		echo $result;
		
	}
	
	
	
}


?>