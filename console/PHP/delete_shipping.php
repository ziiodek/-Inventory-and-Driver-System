<?php


$shipping_id = $_GET['shipping'];
include ('SHIPPING.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$shipping__URL = $urlresolver->generateUrl("grid","shipping","records");


$shipping_manager = new Shipping();
$statusResult = $shipping_manager->deleteShipping($shipping_id);

if($statusResult == 0){
    $_SESSION['alert'] = "Record deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting record";
}



header('Location: '.$shipping__URL);


?>