<div class="black-container" style="color:#FA00FF;">
<?php
include "../PHP/UI/DESCRIPTION.php";

?>
<span style="font-size:16pt;"><?php echo $app_name; ?></span>
<span class="float-right">
<?php 
if($_GET['action'] == "authentication"){
echo "Register"; 
}else{

echo "Login";

}
?>
</span>
</div>