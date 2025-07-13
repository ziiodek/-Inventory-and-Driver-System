<?php
require_once '../SHIPPING.php';
if(isset($_POST['class'])){
	
	$function = $_POST['function'];
	$className = $_POST['class'];
	$variable = $_POST['variable'];
	
	$class = new $className();
	$result = $class->$function($variable);
	
	if(is_array($result)){
		print_r($result);
		
	}else if(is_string($result) && is_array(json_decode($result,true))){
	print_r(json_decode($string,true));	
		
	}else{
		
		echo $result;
		
	}
	
	
	
}


?>