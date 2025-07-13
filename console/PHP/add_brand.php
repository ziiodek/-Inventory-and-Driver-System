<?php
session_start();
$name = strtoupper($_POST['name']);

include ('BRAND.php');
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$brands__URL = $urlresolver->generateUrl("grid","brands","records");


$brand_manager = new Brand();
$statusResult = $brand_manager->addBrand($name);

if($statusResult == 0){
    $_SESSION['alert'] = "Record Created Successfully";

}else{
    $_SESSION['alert'] = "Failed creating record";
}

header('Location: '.$brands__URL);


?>