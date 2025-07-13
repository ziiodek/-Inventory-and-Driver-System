<?php
session_start();
$id = $_GET['brand'];
include ('BRAND.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$brands__URL = $urlresolver->generateUrl("grid","brands","records");


$brand_manager = new Brand();
$statusResult = $brand_manager->deleteBrand($id);

if($statusResult == 0){
    $_SESSION['alert'] = "Record deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting record";
}


header('Location: '.$brands__URL);


?>