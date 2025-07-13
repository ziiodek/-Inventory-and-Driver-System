<?php

if(isset($_POST['portsl'])){
	
	


include ('PORTS.php');
$ports = $_POST['portsl'];

foreach($ports as $port_id=>$id){
	$port_manager = new Port();
$statusResult = $port_manager->deletePort($id);
if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}



	
}

}

include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$ports__URL = $urlresolver->generateUrl("grid","ports","records");




header('Location: '.$ports__URL);


?>