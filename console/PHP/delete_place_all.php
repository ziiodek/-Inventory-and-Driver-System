<?php
include 'PLACE.php';
include 'ADDRESS.php';
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$places__URL = $urlresolver->generateUrl("grid","places","records");

$place_manager = new Place();
$address_manager = new Address();
$statusResult__place = $place_manager->deleteAllPlace();
$statusResult = $address_manager->deleteAllAddress();

if($statusResult == 0 && $statusResult__place == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}



header('Location: '.$places__URL);
?>