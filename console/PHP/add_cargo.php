<?php
session_start();
$shipper_no = strtoupper($_POST['shipper_no']);
$UM = strtoupper($_POST['UM']);
$amount = $_POST['amount'];
$unit_value = $_POST['unit_value'];
$total_value = $_POST['total_value'];
$UMW = strtoupper($_POST['UMW']);
$weight = $_POST['weight'];
$type = strtoupper($_POST['type']);
$merchandise = $_POST['merchandise'];
$material_type = strtoupper($_POST['material']);


include ('CARGO.php');
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$cargo__URL = $urlresolver->generateUrl("grid","cargo","records");

$cargo_manager = new Cargo();
$statusResult = $cargo_manager->addCargo($UM,$amount,$unit_value,$total_value,$weight,$UMW,$shipper_no,$type,$merchandise,$material_type);

if($statusResult == 0){
    $_SESSION['alert'] = "Record Created Successfully";

}else{
    $_SESSION['alert'] = "Failed creating record";
}

header('Location: '.$cargo__URL);


?>