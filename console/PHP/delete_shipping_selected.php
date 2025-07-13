<?php

if(isset($_POST['shippingsl'])){
	
	


include ('SHIPPING.php');
$shipping = $_POST['shippingsl'];

foreach($shipping as $shipping_id=>$id){
	$shipping_manager = new Shipping();
$statusResult = $shipping_manager->deleteShipping($id);
if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}


	
}

}

include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$shipping__URL = $urlresolver->generateUrl("grid","shipping","records");


header('Location: '.$shipping__URL);


?>