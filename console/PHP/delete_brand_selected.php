<?php
session_start();
if(isset($_POST['brandsl'])){
	
include ('BRAND.php');
$brands = $_POST['brandsl'];

foreach($brands as $brand_id=>$id){
	$brand_manager = new Brand();
	$statusResult = $brand_manager->deleteBrand($id);
if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}


	
}

}

include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$brands__URL = $urlresolver->generateUrl("grid","brands","records");





header('Location: '.$brands__URL);


?>