<?php


$driver_id = strtoupper($_POST['driver_id']);


include ('DRIVERS.php');

$driver_manager = new Driver();

$status = $driver_manager->checkDriverId($driver_id);

if($status == 0){
echo 0;	
	
}else if($status == 1){
	
	echo 1;
}

?>