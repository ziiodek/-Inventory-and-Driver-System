<?php

if(isset($_POST['placesl'])){
	
	


include ('PLACE.php');
include ('ADDRESS.php');
$places = $_POST['placesl'];
$place_manager = new Place();
$address_manager = new Address();

foreach($places as $place_id=>$id){	
$statusResult__place = $place_manager->deletePlace($id);
$statusResult = $address_manager->deleteAddress($id);

if($statusResult == 0 && $statusResult__place == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}



}

}


include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$places__URL = $urlresolver->generateUrl("grid","places","records");



header('Location: '.$places__URL);


?>