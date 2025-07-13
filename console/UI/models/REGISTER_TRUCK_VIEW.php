<form action='../PHP/add_truck.php' method='post'>
<input type="hidden" name="selectedCountryId" id="selectedCountryId">
<input type="hidden" name="selectedCountryName" id="selectedCountryName">
<div class='black-box'>
 
  <?php
 if($_GET['type'] == 'auto'){
	 
	 
 
 
 ?>
 
 
   <div class="row">
    <div class="col-sm-4">
      <label>Truck ID:</label>
     <?php
require_once '../PHP/TRUCK_ID_GENERATOR.php';

$truck_id_generator = new TruckIdGenerator();
$truck_id = $truck_id_generator->generateId();

echo '<input type="hidden" value="'.$truck_id.'" name="truck_id">';


echo '<input type="number" value="'.$truck_id.'" class="form-control" placeholder="Truck Id" disabled required>';

?>	
	 
	 
	 
    </div>
  </div>
 
  <?php

	 }else if($_GET['type'] == 'custom'){
		 
?>		 
		 
	
 
   <div class="row">
    <div class="col-sm-6">
    <label>Truck ID:</label>
    <input type="number" name='truck_id' class="form-control" placeholder="Trailer Id" required>
    </div>
  </div>
 
 <?php




 }
 
 ?>
 
 <br>
  <div class="row">
    <div class="col">
    <label>VIN Number:</label>
      <input type="text" name='vin' class="form-control" required>
    </div>
    <div class="col">
    <label>Model:</label>
      <input type="text" name='model' class="form-control" required>
    </div>
  </div>
  <br>
    <div class="row">
	   <div class="col">
     <label>Plate Number:</label>
 <input type="text" name='plates' class="form-control" required>
 
    </div>
	
    <div class="col">
    <label>Country:</label>
      <select name='country' class='form-control' id='country' required>
</select> 
    </div>
  </div>
  <br>
<div class="row">
  <div class="col-sm-6">
  <label>State:</label>
  <select name='state' class='form-control' id='state' required>
</select>
</div>
</div>
  <br>
    <div class="row">
    <div class="col-sm-6">
  <button type="submit" class="btn purple-button">Register</button>
  <button type="button" class="btn purple-button" id="cancelButton">Cancel</button>
  </div>
  </div>
</div>
</form>

<script src="../../js/GeoName.js"></script>
<script src="../../js/DisplayCountries.js"></script>
<script src="../../js/DisplayStates.js"></script>
<script src="../../js/ClearStates.js"></script>
<script src="../../js/CountriesEvents.js"></script>
<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js"></script>
<script>
  let selectField = document.getElementById('state');
let geoName = new GeoName();
geoName.getCountries();
onChangeEvent__handler(geoName);

const urlResolver = new UrlResolver();
const placesUrl = urlResolver.generateUrl("grid","trucks","records");

const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,placesUrl);
  </script>