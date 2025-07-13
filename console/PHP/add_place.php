<?php
session_start();

$name = strtoupper($_POST['name']);
$country = strtoupper($_POST['country']);
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
$places__URL = $urlresolver->generateUrl("grid","places","records");

$place_manager = new Place();
$address_manager = new Address();
$place_manager->addPlace($name);
$place_id = $place_manager->getLastInsertedPlace();

echo $place_id;
$statusResult = $address_manager->addAddress($place_id,$country,$state,$city,$street,$zip_code,$countryId);

if($statusResult == 0){
    $_SESSION['alert'] = "Record Created Successfully";

}else{
    $_SESSION['alert'] = "Failed creating record";
}


header('Location: '.$places__URL);


?>