<?php


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
$customerUpdate__URL = $urlresolver->addCustomURLParameter("form","customer","update","customer",$customer_id);
$customer_manager = new Customer();
$statusResult = $customer_manager->updateCustomer($customer_id,$name,$street,$city,$state,$zip,$country,$countryId);

if($statusResult == 0){
    $_SESSION['alert'] = "Record updated Successfully";

}else{
    $_SESSION['alert'] = "Failed updating record";
}

header('Location: '.$customerUpdate__URL);



?>