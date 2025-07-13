<form action='../PHP/update_truck.php' method='post'>
<button type="button" class="btn purple-button" id="editButton"><i class='fas fa-edit'></i></button>
<fieldset disabled>
<div class='black-box'>
  <div class="row">
    <div class="col-sm-4">
    <label>Truck ID:</label>
<?php

echo '<input type="hidden" value="'.$_GET['truck'].'" name="truck_id">';


echo '<input type="number" value="'.$_GET['truck'].'" class="form-control" value="'.$_GET['truck'].'" disabled required>';

?>	
	
     
    </div>
 
  </div>
 <br>
<?php

include '../PHP/TRUCKS.php';
$truck_manager = new Truck();
$truck_manager->printTruck($_GET['truck']);


?>
</fieldset>
<br>
    <div class="row">
    <div class="col-sm-6">
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
<script src="../js/FormControls.js"></script>
<script>
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const truck_id = urlParams.get('truck');  
let selectField = document.getElementById('state');
let geoName = new GeoName();
geoName.getCountries();
onChangeEvent__handler(geoName);

const urlResolver = new UrlResolver();
const trucksUrl = urlResolver.generateUrl("grid","trucks","records");
const updateTruckUrl = urlResolver.addCustomURLParameter("form","truck","update","truck",truck_id);
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,trucksUrl);
ButtonClickEvent("editButton",updateTruckUrl);
</script>
