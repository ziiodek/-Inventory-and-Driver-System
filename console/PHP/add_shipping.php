<?php
session_start();
//BASIC SHIPPING STATUS
$shipper_no = strtoupper($_POST['shipper_no']);
$customer = $_POST['customer'];
$port = $_POST['port'];
$trailer = $_POST['trailer'];
$driver = $_POST['driver'];
$truck = $_POST['truck'];
$type = strtoupper($_POST['type']);
$UM = strtoupper($_POST['UM']);
$weight = $_POST['weight'];
$seal = strtoupper($_POST['seal']);
$comments = strtoupper($_POST['comments']);



//SHIPPING STATUS INFORMATION
$date = strtoupper($_POST['date']);
$origin = strtoupper($_POST['origin']);
$destiny = strtoupper($_POST['destiny']);

include ('SHIPPING.php');
include ('SHIPPING_STATUS.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$shipping__URL = $urlresolver->generateUrl("grid","shipping","records");

$shipping_manager = new Shipping();
$shipping_status = new ShippingStatus();
$statusResult__status = $shipping_status->addShippingStatus($shipper_no,$date,$origin,$destiny);
$statusResult = $shipping_manager->addShipping($driver,$truck,$trailer,$customer,$port,$type,$weight,$shipper_no,$seal,$comments,$UM);

if($statusResult == 0 && $statusResult__status == 0){
    $_SESSION['alert'] = "Record Created Successfully";

}else{
    $_SESSION['alert'] = "Failed creating record";
}



header('Location: '.$shipping__URL);


?>