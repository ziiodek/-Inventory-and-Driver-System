<?php

if(isset($_POST['cargol'])){

include ('CARGO.php');
$cargo = $_POST['cargol'];

foreach($cargo as $cargo_id=>$id){
	$cargo_manager = new Cargo();
	$statusResult  = $cargo_manager->deleteCargo($id);

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}
	
}

}

include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$cargo__URL = $urlresolver->generateUrl("grid","cargo","records");

header('Location: '.$cargo__URL);


?>