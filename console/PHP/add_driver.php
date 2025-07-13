<?php
session_start();
$email = "reyes.yahaira.a@gmail.com";

$driver_id = $_POST['driver_id'];
$name = strtoupper($_POST['name']);
$lastname = strtoupper($_POST['lastname']);
$phone = $_POST['phone'];
$license = strtoupper($_POST['license']);
$license_type = strtoupper($_POST['license_type']);
$passport = strtoupper($_POST['passport']);

include ('DRIVERS.php');
include "UI/URLRESOLVER.php";
//include('CRYPTO.php');

$Crypto = new Crypto();
$urlresolver = new UrlResolver();
$drivers__URL = $urlresolver->generateUrl("grid","drivers","records");

$fields = "{'driverId':'".$driver_id."','name':'".$name."','lastname':'".$lastname."','phone':'".$phone."','license':'".$license."','license_type':'".$license_type."','passport':'".$passport."'}";

$driver_manager = new Driver();
$result = $Crypto->encryptData($fields);
$name = $result['data']['name'];
$lastname = $result['data']['lastname'];
$phone = $result['data']['phone'];
$license = $result['data']['license'];
$license_type = $result['data']['license_type'];
$passport = $result['data']['passport'];
print_r($result);

$statusResult = $driver_manager->addDriver($driver_id,$name,$lastname,$license,$passport,$phone,$license_type);

if($statusResult == 0){
    $_SESSION['alert_message'] = "Record Created Successfully";

}else{
    $_SESSION['alert_message'] = "Failed creating record";
}


header('Location: '.$drivers__URL);


?>
