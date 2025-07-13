<?php


$truck_id = $_GET['truck'];


include ('TRUCKS.php');

include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$trucks__URL = $urlresolver->generateUrl("grid","trucks","records");


$truck_manager = new Truck();
$statusResult = $truck_manager->deleteTruck($truck_id);
if($statusResult == 0){
    $_SESSION['alert'] = "Record deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting record";
}




header('Location: '.$trucks__URL);


?>