<?php

if(isset($_POST['customersl'])){
	
	


include ('CUSTOMERS.php');
$customers = $_POST['customersl'];

foreach($customers as $customer_id=>$id){
	$customer_manager = new Customer();
$statusResult = $customer_manager->deleteCustomer($id);

if($statusResult == 0){
    $_SESSION['alert'] = "Records deleted Successfully";

}else{
    $_SESSION['alert'] = "Failed deleting records";
}


	
}

}
include "UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$customers__URL = $urlresolver->generateUrl("grid","customers","records");





header('Location: '.$customers__URL);


?>