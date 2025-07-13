<?php
include 'FILE.php';
include "UI/URLRESOLVER.php";
include "SHIPPINGDOCUMENTS.php";


$shipperNo = $_POST['shipperNo_files'];
$file_url = '../../shipperDocuments/'.$shipperNo."/";
$file_location = '/shipperDocuments/'.$shipperNo.'/';


$fileManager = new File();
$fileManager->createDirectory($shipperNo);
$shipppingDocuments_manager = new ShippingDocuments();


	 $countfiles = count($_FILES['file']['name']);
 for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['file']['name'][$i];
   move_uploaded_file($_FILES['file']['tmp_name'][$i],$file_url.$filename);

   $shipppingDocuments_manager->addShippingDocuments($shipperNo,$filename,$file_location);
 }

 $urlresolver = new UrlResolver();
 $shipperUpdate__URL = $urlresolver->addCustomURLParameter("form","shipping",$_POST['action'],"shipper_no",$shipperNo);
 
header('Location: '.$shipperUpdate__URL);

?>