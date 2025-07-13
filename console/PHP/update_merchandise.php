<?php


$id = $_POST['id'];
$name = strtoupper($_POST['name']);
$brand = strtoupper($_POST['brand']);
$description = strtoupper($_POST['description']);


include ('MERCHANDISE.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$merchandiseUpdate__URL = $urlresolver->addCustomURLParameter("form","merchandise","update","merchandise",$id);

$merchandise_manager = new Merchandise();
$statusResult = $merchandise_manager->updateMerchandise($id,$name,$description,$brand);

if($statusResult == 0){
    $_SESSION['alert'] = "Record updated Successfully";

}else{
    $_SESSION['alert'] = "Failed updating record";
}

header('Location: '.$merchandiseUpdate__URL);



?>