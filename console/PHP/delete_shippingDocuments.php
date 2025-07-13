<?php


$file_id = $_GET['file'];
include ('SHIPPINGDOCUMENTS.php');
include "UI/URLRESOLVER.php";

$shippingDocuments_manager = new ShippingDocuments();
$urlresolver = new UrlResolver();
$shipperNo = $shippingDocuments_manager->getShipperNo($file_id);

$shipper__URL = $urlresolver->addCustomURLParameter("form","shipping",$_GET['action'],"shipper_no",$shipperNo);


$shippingDocuments_manager->deleteShippingDocument($file_id);
$file_location = $shippingDocuments_manager->getFileLocation($file_id);
$file_location="../../".$file_location;
chmod($file_location, 755);
if(file_exists($file_location)){
    unlink($file_location);
}


header('Location: '.$shipping__URL);


?>