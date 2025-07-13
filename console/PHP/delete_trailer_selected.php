<?php

if(isset($_POST['trailersl'])){
	
	


include ('TRAILERS.php');
$trailers = $_POST['trailersl'];

foreach($trailers as $trailer_id=>$id){
	$trailer_manager = new Trailer();
$statusResult = $trailer_manager->deleteTrailer($id);

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}

	
}

}


include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$trailers__URL = $urlresolver->generateUrl("grid","trailers","records");



header('Location: '.$trailers__URL);


?>