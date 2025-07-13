<?php


$id = $_GET['cargo'];


include ('CARGO.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$cargo__URL = $urlresolver->generateUrl("grid","cargo","records");

$cargo_manager = new Cargo();
$statusResult = $cargo_manager->deleteCargo($id);

if($statusResult == 0){
    $_SESSION['alert'] = "Record deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting record";
}


header('Location: '.$cargo__URL);


?>