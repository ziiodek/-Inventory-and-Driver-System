<?php
include 'DRIVERS.php';
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$drivers__URL = $urlresolver->generateUrl("grid","drivers","records");

$driver_manager = new Driver();
$statusResult = $driver_manager->deleteAllDriver();

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}


header('Location: '.$drivers__URL);
?>