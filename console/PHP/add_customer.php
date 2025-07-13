<?php
session_start();
$customer_id = $_POST['customer_id'];
$name = strtoupper($_POST['name']);
$street = strtoupper($_POST['street']);
$city = strtoupper($_POST['city']);
$state = strtoupper($_POST['state']);
$zip = $_POST['zip'];
$country = strtoupper($_POST['selectedCountryName']);
$countryId = strtoupper($_POST['selectedCountryId']);

include ('CUSTOMERS.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$customers__URL = $urlresolver->generateUrl("grid","customers","records");

$customer_manager = new Customer();
$statusResult = $customer_manager->addCustomer($customer_id,$name,$street,$city,$state,$zip,$country,$countryId);

if($statusResult == 0){
    $_SESSION['alert'] = "Record Created Successfully";

}else{
    $_SESSION['alert'] = "Failed creating record";
}

header('Location: '.$customers__URL);


?>