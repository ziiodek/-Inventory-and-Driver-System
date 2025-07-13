<?php
include 'MERCHANDISE.php';
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$merchandise__URL = $urlresolver->generateUrl("grid","merchandise","records");

$merchandise_manager = new Merchandise();
$statusResult = $merchandise_manager->deleteAllMerchandise();

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}


header('Location: '.$merchandise__URL);
?>