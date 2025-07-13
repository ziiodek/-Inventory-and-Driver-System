<?php
session_start();

$shipping = $_GET['shipping'];
$driver = $_GET['driver'];


echo $shipping;

//echo $license_type;
include ('SHIPPING.php');
include ('GEOLOCATION.php');

$latitude = '0';
$longitude = '0';
$altitude = '0';
$accuracy = '0';
$altitude_accuracy = '0';
$heading = '0';
$speed = '0';
$timestamp = '0';


include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$shipping__URL = $urlresolver->generateUrl("grid","shipping","records");

$shipping_manager = new Shipping();
$geolocation_manager = new Geolocation();
if($shipping_manager->assignShipping($shipping,$driver) == 0){
	
$geolocation_manager->updateLocation($driver,$latitude,$longitude,$altitude,$accuracy,$altitude_accuracy,$heading,$speed,$timestamp);	

$_SESSION['alert'] = "Shipping assigned";

	
	
}else {
	
$_SESSION['alert'] = "Shipping already assigned";		
}

header('Location: '.$shipping__URL);



?>