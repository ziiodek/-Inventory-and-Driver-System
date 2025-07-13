<?php


$trailer_id = $_GET['trailer'];


include ('TRAILERS.php');
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$trailers__URL = $urlresolver->generateUrl("grid","trailers","records");


$trailer_manager = new Trailer();
$statusResult = $trailer_manager->deleteTrailer($trailer_id);

if($statusResult == 0){
    $_SESSION['alert'] = "Record deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting record";
}



header('Location: '.$trailers__URL);


?>