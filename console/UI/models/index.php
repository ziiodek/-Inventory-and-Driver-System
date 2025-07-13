<?php
session_start();

if(!isset($_SESSION['user'])){
echo "<script>alert('PLEASE LOG INTO YOUR ACCOUNT');
window.location.href='../../LOGIN.php';
</script>";	
}else{

include 'HEAD.php';
include 'MENU.php';
include 'COMPANY_VIEW.php';
include 'FOOT.php';
}
?>