<?php
include 'TRUCKS.php';
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$trucks__URL = $urlresolver->generateUrl("grid","trucks","records");


$truck_manager = new Truck();
$statusResult = $truck_manager->deleteAllTruck();

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}

header('Location: '.$trucks__URL);
?>
?>