<?php


$customer_id = $_GET['customer'];


include ('CUSTOMERS.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$customers__URL = $urlresolver->generateUrl("grid","customers","records");


$customer_manager = new Customer();
$statusResult = $customer_manager->deleteCustomer($customer_id);

if($statusResult == 0){
    $_SESSION['alert'] = "Record deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting record";
}



header('Location: '.$customers__URL);


?>