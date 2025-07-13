<?php
include ('SHIPPING.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$shipping__URL = $urlresolver->generateUrl("grid","shipping","records");

$shipping_manager = new Shipping();
$statusResult = $shipping_manager->deleteAllShipping();
if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}



header('Location: '.$shipping__URL);
?>