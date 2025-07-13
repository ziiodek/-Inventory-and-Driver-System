<br>
<br>
<div class='container jumbotron bg-black'>
  <div class="row">
    <div class="col-sm-6 text-light">
      <h4>Driver</h4>
    </div>
	
	  <div class="col-sm-6 text-light text-right">
      <?php
	  echo "<a href='UPDATE_DRIVER.php?driver=".$_GET['driver']."'>";
	  ?>
	  <i class="fas fa-edit purple-icon"></i>
	  </a>
    </div>
	
  </div>
<br>
 <br>
<?php
include 'php/DRIVERS.php';
$driver_manager = new Driver();
$driver_manager->printDriverView($_GET['driver']);
?>


</div>