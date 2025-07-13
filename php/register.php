<?php

$name = strtoupper($_POST['name']);
$lastname = strtoupper($_POST['lastname']);
$password = strtoupper($_POST['password']);
$user_id = strtoupper($_POST['email']);
$email = strtoupper($_POST['email']);
$phone = strtoupper($_POST['phone']);
$company = strtoupper($_POST['company']);
$dot = strtoupper($_POST['dot']);

include ('USER.php');
include ('COMPANY_ID_GENERATOR.php');


$register_manager = new User();
$company_manager = new CompanyIdGenerator();

$company_id = $company_manager->generateCompanyId();

$status = $register_manager->register_user($name,$lastname,$password,$user_id,$email,$phone,$company_id);


if($status == 0){
echo "<script>
	alert('Email already exists');
	window.location.href='../REGISTER.php';
	</script>";	
	
}else if($status == 1){
	echo "<script>
				alert('User id already exists');
				window.location.href='../../REGISTER.php';
				</script>";
	
}else if($status == 2){
	  echo "<script>
		  alert('Your account has been created');
		  window.location.href='../LOGIN.php';
		  </script>";
	
}

?>