<?php
include 'CUSTOMERS.php';
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$customers__URL = $urlresolver->generateUrl("grid","customers","records");

$customer_manager = new Customer();
$statusResult = $customer_manager->deleteAllCustomers();

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}

header('Location: '.$customers__URL);
?>