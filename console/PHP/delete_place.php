<?php


$id = $_GET['place'];


include ('PLACE.php');
include ('ADDRESS.php');

include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$places__URL = $urlresolver->generateUrl("grid","places","records");

$place_manager = new Place();
$address_manager = new Address();
$statusResult = $address_manager->deleteAddress($id);
$statusResult__place = $place_manager->deletePlace($id);

if($statusResult == 0 && $statusResult__place == 0){
    $_SESSION['alert'] = "Record deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting record";
}




header('Location: '.$places__URL);


?>