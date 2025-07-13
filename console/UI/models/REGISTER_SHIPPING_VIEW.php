<?php
include "DOCUMENTS_GRID.php";
?>
<br>

<?php
include "UPLOAD_DOCUMENTS.php";
?>


<form method='post' action='../PHP/add_shipping.php' class='form-container'>
<div class='row'>
<div class='col'>
<div class='black-box'>
<label>Shipper No:</label>
	<input type="text" name='shipper_no' class="form-control" placeholder="Shipper No." required>
  <br>
  <label>Customer:</label>
	   <select name='customer' class='form-control' required>
	   <?php
	   
	   include '../PHP/CUSTOMERS.php';
	   
	   $customer_manager = new Customer();
	   $customer_manager->printCustomers();
	    
 ?>
 
 </select>
<br>
</div>
</div>

<div class='col'>
<div class='black-box'>
  <div class='row'>
  <div class='col-sm-6'>
  <label>Date:</label>
  <input type='date' name='date' class='form-control' required>
  </div>

  </div>
  <br>
  <div class='row'>
  <div class='col'>
  <label>Origin:</label>
  <select class='form-control' name='origin'>
	    <?php
		include '../PHP/PLACE.php';
		$place_manager = new Place();
		$place_manager->printPlaces();
		?>
  </select>
  </div>
    <div class='col'>
  <label>Destiny:</label>
  <select class='form-control' name='destiny'>
    <?php
	$place_manager->printPlaces();
  ?>
  </select>
  <br>
  </div>
  </div>
</div>
</div>
</div>
</div>

<div class='black-box'>
<div class="row">
<div class="col">
<label>Driver:</label>
	   <select name='driver' class='form-control' required>
	    	 	<?php
	   
	   include '../PHP/DRIVERS.php';
	   
	   $driver_manager = new Driver();
	   $driver_manager->printDrivers();
	    
 ?>
 
 </select>
</div>
<div class="col">
<label>Port of Entry:</label>
	 <select name='port' class='form-control' required>
	 
	 	<?php
	   
	   include '../PHP/PORTS.php';
	   
	   $port_manager = new Port();
	   $port_manager->printPorts();
	    
 ?>
	 </select>
</div>
<div class="col">
  <label>Weight Unit of Measure:</label>
  <select name='UM' class='form-control' required>
<option value='KG'>KG</option>
<option value='LB'>LB</option>
<option value='LB'>TON</option>
</select>
</div>
</div>
<br>
<div class="row">
<div class="col">
<label>Trailer Number:</label>
		<select name='trailer' class='form-control' required>
	<?php
	   
	   include '../PHP/TRAILERS.php';
	   
	   $trailer_manager = new Trailer();
	   $trailer_manager->printTrailers();
	    
 ?>
 
 </select>
</div>
<div class="col">
<label>Type of Service:</label>
		<select name='type' class='form-control' required>
<option value='EXPORTATION'>EXPORTATION</option>
<option value='IMPORTATION'>IMPORTATION</option>
<option value='RAMP'>RAMP</option>
<option value='LC'>LC</option>
<option value='LV'>LV</option>
</select>
</div>
<div class="col">
<label>Weight:</label>
<input type='text' name='weight' class='form-control' required>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-4">
<label>Truck Number:</label>
	<select name='truck' class='form-control' required>
	
		   <?php
	   
	   include '../PHP/TRUCKS.php';
	   
	   $truck_manager = new Truck();
	   $truck_manager->printTrucks();
	    
 ?>
 
	
	  </select>
</div>
<div class="col-sm-4">
<label>Seal:</label>
   <input type='text' name='seal' class='form-control' required>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-6">
<label>Comments:</label>
  <textarea name="comments" rows="4" cols="50" name="comments" class="form-control" required>
</textarea>
</div>
</div>
</div>

<button type="submit" class="btn btn-primary purple-btn">Register</button>
  <button type="button" class="btn btn-primary purple-btn" id="cancelButton">Cancel</button>

</form>



<script src="../js/DisplayUM.js"></script>
<script src="../js/DisplayUMW.js"></script>
<script src="../js/DisplayOperationTypes.js"></script>
<script src="../js/CancelButton.js"></script>
<script src="../js/ShipperNo.js"></script>
<script>
  const cancelButton = document.getElementById("cancelButton");
  CancelButton(cancelButton,"SHIPPINGS.php");
  const shipperField = document.getElementsByName("shipper_no")[0];
  const uploadField = document.getElementsByName("file[]")[0];
  const shipperNo_files = document.getElementsByName("shipperNo_files")[0];
  onChange__ShiperNo(shipperField,uploadField,shipperNo_files);
  </script>

