<?php
session_start();
$driver_id = $_POST['driver_id'];
$name = strtoupper($_POST['name']);
$lastname = strtoupper($_POST['lastname']);
$phone = $_POST['phone'];
$license = strtoupper($_POST['license']);
$license_type = strtoupper($_POST['license_type']);
$passport = strtoupper($_POST['passport']);

include ('DRIVERS.php');


$Crypto = new Crypto();
$fields = "{'name':'".$name."','lastname':'".$lastname."','phone':'".$phone."','license':'".$license."','license_type':'".$license_type."','passport':'".$passport."'}";
$driver_manager = new Driver();
$result = $Crypto->encryptData($fields);
$name = $result['data']['name'];
$lastname = $result['data']['lastname'];
$phone = $result['data']['phone'];
$license = $result['data']['license'];
$license_type = $result['data']['license_type'];
$passport = $result['data']['passport'];


include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$driverUpdate__URL = $urlresolver->addCustomURLParameter("form","driver","update","driver",$driver_id);
$statusResult = $driver_manager->updateDriver($driver_id,$name,$lastname,$license,$passport,$phone,$license_type);

if($statusResult == 0){
    $_SESSION['alert_message'] = "Record updated Successfully";

}else{
    $_SESSION['alert_message'] = "Failed updating record";
}

header('Location: '.$driverUpdate__URL);



?>
