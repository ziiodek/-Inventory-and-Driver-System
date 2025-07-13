<?php


$id = $_POST['id'];
$name = strtoupper($_POST['name']);


include ('BRAND.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$brandUpdate__URL = $urlresolver->addCustomURLParameter("form","brand","update","brand",$id);

$brand_manager = new Brand();
$statusResult = $brand_manager->updateBrand($id,$name);

if($statusResult == 0){
    $_SESSION['alert'] = "Record updated Successfully";

}else{
    $_SESSION['alert'] = "Failed updating record";
}




header('Location: '.$brandUpdate__URL);



?>