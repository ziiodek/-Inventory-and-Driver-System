<?php
$id = strtoupper($_POST['id']);
$shipper_no = strtoupper($_POST['shipper_no']);
$UM = strtoupper($_POST['UM']);
$amount = $_POST['amount'];
$unit_value = $_POST['unit_value'];
$total_value = $_POST['total_value'];
$UMW = strtoupper($_POST['UMW']);
$weight = $_POST['weight'];
$type = strtoupper($_POST['type']);
$material_type = strtoupper($_POST['material']);
$merchandise = $_POST['merchandise'];


include ('CARGO.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$cargoUpdate__URL = $urlresolver->addCustomURLParameter("form","cargo","update","cargo",$id);
$cargo_manager = new Cargo();
$statusResult = $cargo_manager->updateCargo($id,$UM,$amount,$unit_value,$total_value,$weight,$UMW,$shipper_no,$type,$merchandise,$material_type);

if($statusResult == 0){
    $_SESSION['alert'] = "Record updated Successfully";

}else{
    $_SESSION['alert'] = "Failed updating record";
}


header('Location: '.$cargoUpdate__URL);


?>