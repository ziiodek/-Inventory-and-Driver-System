<?php
include 'CARGO.php';
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$cargo__URL = $urlresolver->generateUrl("grid","cargo","records");

$cargo_manager = new Cargo();
$statusResult = $cargo_manager->deleteAllCargo();

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}

header('Location: '.$cargo__URL);
?>