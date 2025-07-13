<?php

if(isset($_POST['filel'])){
	
	


include ('SHIPPINGDOCUMENTS.php');
$files = $_POST['filel'];
$shipperNo = $_GET['shipper_no'];

foreach($files as $file_id=>$id){
	$file_manager = new ShippingDocuments();
    $file_location = $file_manager->getFileLocation($id);
    $file_manager->deleteShippingDocument($id);
  
    if(file_exists('../..'.$file_location)){
        unlink('../..'.$file_location);
    }

   
	
}

}


include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$shipper__URL = $urlresolver->addCustomURLParameter("form","shipping",$_GET['action'],"shipper_no",$shipperNo);



header('Location: '.$shipper__URL);


?>