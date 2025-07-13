<?php


$email = strtoupper($_POST['email']);
$password = strtoupper($_POST['password']);

include ('USER.php');

$register_manager = new User();

$status = $register_manager->logIn($email,$password);

if($status == 0){
echo "<script>
				alert('Incorrect Password');
				window.location.href='../UI/index.php?layout=login&action=authentication';
				</script>";	
	
}else if($status == 1){
echo "<script>
				alert('Email address does not exists');
				window.location.href='../UI/index.php?layout=login&action=authentication';
				</script>";	
	
	
}else if($status == 2){
	
	header('Location: ../console/UI/index.php?layout=grid&model=dashboard&action=records');
}

?>