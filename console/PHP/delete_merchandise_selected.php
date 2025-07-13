<?php

if(isset($_POST['merchandisel'])){
	
	
include ('MERCHANDISE.php');
$merchandise = $_POST['merchandisel'];

foreach($merchandise as $merchandise_id=>$id){
	$merchandise_manager = new Merchandise();
$statusResult = $merchandise_manager->deleteMerchandise($id);

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}

	
}

}


include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$merchandise__URL = $urlresolver->generateUrl("grid","merchandise","records");
header('Location: '.$merchandise__URL);


?>