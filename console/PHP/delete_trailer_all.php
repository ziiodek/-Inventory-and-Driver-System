<?php
include 'TRAILERS.php';
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$trailers__URL = $urlresolver->generateUrl("grid","trailers","records");

$trailer_manager = new Trailer();
$statusResult = $trailer_manager->deleteAllTrailer();

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}


header('Location: '.$trailers__URL);
?>