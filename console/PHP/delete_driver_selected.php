<?php

if(isset($_POST['driversl'])){
	
	


include ('DRIVERS.php');
$drivers = $_POST['driversl'];

foreach($drivers as $driver_id=>$id){
	$driver_manager = new Driver();
$statusResult = $driver_manager->deleteDriver($id);
if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}


	
}

}



include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$drivers__URL = $urlresolver->generateUrl("grid","drivers","records");


header('Location: '.$drivers__URL);


?>