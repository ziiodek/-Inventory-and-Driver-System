<?php
require_once '../SHIPPING.php';
if(isset($_POST['class'])){
	
	$function = $_POST['function'];
	$className = $_POST['class'];
	$variable = $_POST['variable'];
	$variable2 = $_POST['variable2'];
	
	$class = new $className();
	$result = $class->$function($variable,$variable2);
	
	if(is_array($result)){
		print_r($result);
		
	}else if(is_string($result) && is_array(json_decode($result,true))){
	print_r(json_decode($string,true));	
		
	}else{
		
		echo $result;
		
	}
	
	
	
}


?>