<?php
session_start();
$name = strtoupper($_POST['name']);
$brand = strtoupper($_POST['brand']);
$description = strtoupper($_POST['description']);

include ('MERCHANDISE.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$merchandise__URL = $urlresolver->generateUrl("grid","merchandise","records");

$merchandise_manager = new Merchandise();
$statusResult = $merchandise_manager->addMerchandise($name,$description,$brand);

if($statusResult == 0){
    $_SESSION['alert'] = "Record Created Successfully";

}else{
    $_SESSION['alert'] = "Failed creating record";
}

header('Location: '.$merchandise__URL);


?>