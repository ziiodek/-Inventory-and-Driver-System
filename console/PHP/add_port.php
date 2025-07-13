<?php
session_start();
$name = strtoupper($_POST['name']);
$street = strtoupper($_POST['street']);
$city = strtoupper($_POST['city']);
$state = strtoupper($_POST['state']);
$country = strtoupper($_POST['selectedCountryName']);
$countryId = strtoupper($_POST['selectedCountryId']);
$zip = $_POST['zip'];

include ('PORTS.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$ports__URL = $urlresolver->generateUrl("grid","ports","records");


$port_manager = new Port();
$statusResult = $port_manager->addPort($name,$street,$city,$state,$zip,$country,$countryId);

if($statusResult == 0){
    $_SESSION['alert'] = "Record Created Successfully";

}else{
    $_SESSION['alert'] = "Failed creating record";
}



header('Location: '.$ports__URL);


?>