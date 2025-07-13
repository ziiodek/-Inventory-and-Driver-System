<?php


$id = $_POST['id'];
$name = strtoupper($_POST['name']);
$state = strtoupper($_POST['state']);
$city = strtoupper($_POST['city']);
$street = strtoupper($_POST['street']);
$country = strtoupper($_POST['selectedCountryName']);
$countryId = strtoupper($_POST['selectedCountryId']);
$zip_code = strtoupper($_POST['zip']);

include ('PLACE.php');
include ('ADDRESS.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$placeUpdate__URL = $urlresolver->addCustomURLParameter("form","place","update","place",$id);

$place_manager = new Place();
$address_manager = new Address();
$statusResult__place = $place_manager->updatePlace($id,$name);
$statusResult = $address_manager->updateAddress($id,$country,$state,$city,$street,$zip_code,$countryId);

if($statusResult == 0 && $statusResult__place == 0){
    $_SESSION['alert'] = "Record updated Successfully";

}else{
    $_SESSION['alert'] = "Failed updating record";
}


header('Location: '.$placeUpdate__URL);



?>