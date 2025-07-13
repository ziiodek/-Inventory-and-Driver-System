<br>
<br>
<div class='container jumbotron bg-black'>
  <div class="row">
    <div class="col-sm-6 text-light">
      <h4>Truck</h4>
    </div>
	
	  <div class="col-sm-6 text-light text-right">
      <?php
	  echo "<a href='UPDATE_TRUCK.php?truck=".$_GET['truck']."'>";
	  ?>
	  <i class="fas fa-edit purple-icon"></i>
	  </a>
    </div>
	
  </div>
<br>
 <br>
<?php
include 'php/TRUCKS.php';
$truck_manager = new Truck();
$truck_manager->printTruckView($_GET['truck']);
?>


</div>