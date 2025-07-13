<?php


$shipper_no = $_POST['shipper_no'];
$customer = strtoupper($_POST['customer']);
$port = $_POST['port'];
$trailer = $_POST['trailer'];
$driver = $_POST['driver'];
$truck = $_POST['truck'];
$driver = $_POST['driver'];
$type = strtoupper($_POST['type']);
$UM = strtoupper($_POST['UM']);
$weight = strtoupper($_POST['weight']);
$seal = strtoupper($_POST['seal']);
$comments = strtoupper($_POST['comments']);

//SHIPPING STATUS INFORMATION
$date = strtoupper($_POST['date']);
$origin = strtoupper($_POST['origin']);
$destiny = strtoupper($_POST['destiny']);

echo $date;


include ('SHIPPING.php');
include ('SHIPPING_STATUS.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$shippingUpdate__URL = $urlresolver->addCustomURLParameter("form","shipping","update","shipper_no",$shipper_no);


$shipping_manager = new Shipping();
$id = $shipping_manager->getShippingId($shipper_no);
$shipping_status = new ShippingStatus();
$statusResult__status = $shipping_status->updateShippingStatus($shipper_no,$date,$origin,$destiny);
$statusResult = $shipping_manager->updateShipping($id,$driver,$truck,$trailer,$customer,$port,$type,$weight,$seal,$comments,$UM);

if($statusResult == 0 && $statusResult__status){
    $_SESSION['alert'] = "Record updated Successfully";

}else{
    $_SESSION['alert'] = "Failed updating record";
}



header('Location: '.$shippingUpdate__URL);



?>