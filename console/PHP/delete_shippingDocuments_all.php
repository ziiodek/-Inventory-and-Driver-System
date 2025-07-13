<?php
include ('SHIPPINGDOCUMENTS.php');
include "UI/URLRESOLVER.php";
$shipperNo = $_GET['shipper_no'];
$urlresolver = new UrlResolver();
$shipper__URL = $urlresolver->addCustomURLParameter("form","shipping",$_GET['action'],"shipper_no",$shipperNo);

$shippingDocuments_manager = new ShippingDocuments();
$shippingDocuments_manager->deleteAllShippingDocuments($shipperNo);
$dirname = '../../shipperDocuments/'.$shipperNo;
array_map('unlink', glob("$dirname/*.*"));
rmdir($dirname);

header('Location: '.$shipper__URL);
?>