<?php
session_start();
$truck_id = $_POST['truck_id'];
$vin = strtoupper($_POST['vin']);
$model = strtoupper($_POST['model']);
$plates = strtoupper($_POST['plates']);
$state = strtoupper($_POST['state']);
$country = strtoupper($_POST['selectedCountryName']);
$countryId = strtoupper($_POST['selectedCountryId']);

include ('TRUCKS.php');
include "UI/URLRESOLVER.php";


$Crypto = new Crypto();
$fields = "{'model':'".$row['model']."','vin_number':'".$row['vin_number']."','plate_number':'".$row['plate_number']."','country':'".$row['country']."','state':'".$row['state']."'}";
$result = $Crypto->encryptData($fields);
$vin = $result['data']['vin_number'];
$model = $result['data']['model'];
$plates = $result['data']['plate_number'];
$state = $result['data']['state'];
$country = $result['data']['vin_number'];


$urlresolver = new UrlResolver();
$truckUpdate__URL = $urlresolver->addCustomURLParameter("form","truck","update","truck",$truck_id);
$truck_manager = new Truck();
$statusResult = $truck_manager->updateTruck($truck_id,$plates,$state,$model,$vin,$country,$countryId);

if($statusResult == 0){
    $_SESSION['alert_message'] = "Record updated Successfully";

}else{
    $_SESSION['alert_message'] = "Failed updating record";
}


header('Location: '.$truckUpdate__URL);



?>
