<?php
session_start();
$trailer_id = $_POST['trailer_id'];
$dimensions = strtoupper($_POST['dimensions']);
$capacity = $_POST['capacity'];
$type = strtoupper($_POST['type']);
$plates = strtoupper($_POST['plates']);
$state = strtoupper($_POST['state']);
$country = strtoupper($_POST['selectedCountryName']);
$countryId = strtoupper($_POST['selectedCountryId']);

include ('TRAILERS.php');
include "UI/URLRESOLVER.php";

//$Crypto = new Crypto();
$urlresolver = new UrlResolver();
$trailerUpdate__URL = $urlresolver->addCustomURLParameter("form","trailer","update","trailer",$trailer_id);
/* 
$fields = "{'type':'".$row['type']."','capacity':'".$row['capacity']."','dimensions':'".$row['dimensions']."','plate_number':'".$row['plate_number']."','country':'".$row['country']."','state':'".$row['state']."'}";
$result = $Crypto->encryptData($fields);

$dimensions = $result['data']['dimensions'];
$capacity = $result['data']['capacity'];
$type = $result['data']['capacity'];
$plates = $result['data']['plate_number'];
$state = $result['data']['state'];
$country = $result['data']['country'];
*/

$trailer_manager = new Trailer();
$statusResult = $trailer_manager->updateTrailer($trailer_id,$type,$capacity,$plates,$dimensions,$state,$country,$countryId);
if($statusResult == 0){
    $_SESSION['alert_message'] = "Record Updated Successfully";

}else{
    $_SESSION['alert_message'] = "Failed updating record";
}

header('Location: '.$trailerUpdate__URL);



?>
