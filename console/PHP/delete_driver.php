<?php


$driver_id = $_GET['driver'];


include ('DRIVERS.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$drivers__URL = $urlresolver->generateUrl("grid","drivers","records");


$driver_manager = new Driver();
$statusResult = $driver_manager->deleteDriver($driver_id);

if($statusResult == 0){
    $_SESSION['alert'] = "Record deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting record";
}



header('Location: '.$drivers__URL);


?>