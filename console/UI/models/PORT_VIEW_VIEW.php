<br>
<br>
<div class='container jumbotron bg-black'>
<form action='php/update_port.php' method='post'>
  <div class="row">
    <div class="col-sm-6 text-light">
      <h4>Por of Entry</h4>
    </div>
	
	  <div class="col-sm-6 text-light text-right">
      <?php
	  echo "<a href='UPDATE_PORT.php?port=".$_GET['port']."'>";
	  ?>
	  <i class="fas fa-edit purple-icon"></i>
	  </a>
    </div>
	
  </div>
<br>
 <br>
<?php
include 'php/PORTS.php';

$port_manager = new Port();
$port_manager->printPortView($_GET['port']);
?>


</form>
</div>