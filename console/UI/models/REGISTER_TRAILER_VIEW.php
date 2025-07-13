
<form action='../PHP/add_trailer.php' method='post'>
<input type="hidden" name="selectedCountryId" id="selectedCountryId">
<input type="hidden" name="selectedCountryName" id="selectedCountryName">
<div class='black-box'>
 <?php
 if($_GET['type'] == 'auto'){
	 
	 
 
 
 ?>
 
 
   <div class="row">
    <div class="col-sm-4">
      <label>Trailer ID:</label>
     <?php
require_once '../PHP/TRAILER_ID_GENERATOR.php';

$trailer_id_generator = new TrailerIdGenerator();
$trailer_id = $trailer_id_generator->generateId();

echo '<input type="hidden" value="'.$trailer_id.'" name="trailer_id">';


echo '<input type="number" value="'.$trailer_id.'" class="form-control" disabled required>';

?>	
	 
	 
	 
    </div>
  </div>
 
  <?php

	 }else if($_GET['type'] == 'custom'){
		 
?>		 
		 
	
 
   <div class="row">
    <div class="col-sm-4">
    <label>Trailer ID:</label>
      <input type="number" name='trailer_id' class="form-control" required>
    </div>
  </div>
 
 <?php




 }
 
 ?>
 


 <br>
  <div class="row">
    <div class="col">
    <label>Dimensions:</label>
      <input type="text" name='dimensions' class="form-control" required>
    </div>
    <div class="col">
    <label>Capacity:</label>
      <input type="number" name='capacity' class="form-control" required>
    </div>
  </div>
  <br>
    <div class="row">
    <div class="col">
    <label>Trailer Type:</label>
        <select name='type' class='form-control' required>
	  <option value='Straight Truck'>Straight Truck</option>
	   <option value='Dry Van'>Dry Van</option>
	    <option value='Flatbed'>Flatbed</option>
		 <option value='Step Deck'>Step Deck</option>
		  <option value='Canestoga'>Canestoga</option>
		   <option value='Removable Gooseneck'>Removable Gooseneck (RGN)</option>
		    <option value='Stretch RGN'>Stretch RGN</option>
			<option value='Lowboy'>Lowboy</option>
			<option value='Refrigerated'>Refrigerated</option>
			<option value='Specialized'>Specialized</option>
	 </select>
	  
    </div>
    <div class="col">
    <label>Plate Number:</label>
 <input type="text" name='plates' class="form-control" placeholder="Plate No." required>
 
    </div>
  </div>
  <br>
      <div class="row">
      <div class="col">
      <label>Country:</label>
      <select name='country' class='form-control' id='country' required>
</select> 
    </div>
    <div class="col">
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
const placesUrl = urlResolver.generateUrl("grid","trailers","records");

const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,placesUrl);
  </script>