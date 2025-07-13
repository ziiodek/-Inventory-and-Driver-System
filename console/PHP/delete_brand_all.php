<?php
session_start();
include 'BRAND.php';
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$brands__URL = $urlresolver->generateUrl("grid","brands","records");


$brand_manager = new Brand();
$statusResult  = $brand_manager->deleteAllBrand();

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}

header('Location: '.$brands__URL);
?>