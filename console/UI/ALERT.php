<?php
session_start();
if(isset($_SESSION['alert'])){
echo "<div class='alert-box ".$_SESSION['type']."'><center>".$_SESSION['alert_message']."</center></div>";
}

?>