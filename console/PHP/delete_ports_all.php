<?php
include 'PORTS.php';
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$ports__URL = $urlresolver->generateUrl("grid","ports","records");

$port_manager = new Port();
$statusResult = $port_manager->deleteAllPorts();

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}



header('Location: '.$ports__URL);
?>