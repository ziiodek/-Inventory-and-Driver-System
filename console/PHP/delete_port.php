<?php


$id = $_GET['port'];


include ('PORTS.php');

include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$ports__URL = $urlresolver->generateUrl("grid","ports","records");


$port_manager = new Port();
$statusResult = $port_manager->deletePort($id);

if($statusResult == 0){
    $_SESSION['alert'] = "Record deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting record";
}




header('Location: '.$ports__URL);


?>