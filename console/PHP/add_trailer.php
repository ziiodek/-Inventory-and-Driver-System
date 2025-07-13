<?php
session_start();
$trailer_id = $_POST['trailer_id'];
$dimensions = strtoupper($_POST['dimensions']);
$capacity = strtoupper($_POST['capacity']);
$type = $_POST['type'];
$plates = strtoupper($_POST['plates']);
$state = strtoupper($_POST['state']);
$country = strtoupper($_POST['selectedCountryName']);
$countryId = strtoupper($_POST['selectedCountryId']);



include ('TRAILERS.php');
include "UI/URLRESOLVER.php";
//include('CRYPTO.php');

//$Crypto = new Crypto();

$urlresolver = new UrlResolver();
$trailers__URL = $urlresolver->generateUrl("grid","trailers","records");

$fields = "{'type':'".$type."','capacity':'".$capacity."','dimensions':'".$dimensions."','plate_number':'".$plates."','country':'".$country."','state':'".$state."'}";
/**FOR NEXT VERSION
/$result = $Crypto->encryptData($fields);

$dimensions = $result['data']['dimensions'];
$capacity = $result['data']['capacity'];
$type = $result['data']['capacity'];
$plates = $result['data']['plate_number'];
$state = $result['data']['state'];
$country = $result['data']['country'];
**/

$trailer_manager = new Trailer();
$statusResult = $trailer_manager->addTrailer($trailer_id,$type,$capacity,$plates,$dimensions,$state,$country,$countryId);
if($statusResult == 0){
    $_SESSION['alert_message'] = "Record Created Successfully";

}else{
    $_SESSION['alert_message'] = "Failed creating record";
}



header('Location: '.$trailers__URL);


?>
