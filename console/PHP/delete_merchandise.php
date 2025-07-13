<?php


$id = $_GET['merchandise'];


include ('MERCHANDISE.php');

include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$merchandise__URL = $urlresolver->generateUrl("grid","merchandise","records");


$merchandise_manager = new Merchandise();
$statusResult = $merchandise_manager->deleteMerchandise($id);
if($statusResult == 0){
    $_SESSION['alert'] = "Record deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting record";
}



header('Location: '.$merchandise__URL);


?>