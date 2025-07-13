<?php


$id = $_POST['id'];
$name = strtoupper($_POST['name']);
$street = strtoupper($_POST['street']);
$city = strtoupper($_POST['city']);
$state = strtoupper($_POST['state']);
$country = strtoupper($_POST['selectedCountryName']);
$countryId = $_POST['selectedCountryId']; 
$zip = $_POST['zip'];

include ('PORTS.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$portUpdate__URL = $urlresolver->addCustomURLParameter("form","port","update","port",$id);

$port_manager = new Port();
$port_manager->updatePort($id,$name,$street,$city,$state,$zip,$country,$countryId);

header('Location: '.$portUpdate__URL);



?>