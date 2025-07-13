<?php

if(isset($_POST['trucksl'])){
	
	


include ('TRUCKS.php');
$trucks = $_POST['trucksl'];

foreach($trucks as $truck_id=>$id){
	$truck_manager = new Truck();
$statusResult = $truck_manager->deleteTruck($id);

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}

	
}

}

include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$trucks__URL = $urlresolver->generateUrl("grid","trucks","records");




header('Location: '.$trucks__URL);


?>