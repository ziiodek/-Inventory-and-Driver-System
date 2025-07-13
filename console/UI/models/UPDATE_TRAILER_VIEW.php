
<form action='../PHP/update_trailer.php' method='post'>
<div class='black-box'>
  <div class="row">
    <div class="col-sm-4">
    <label>Trailer ID:</label>
<?php

echo '<input type="hidden" value="'.$_GET['trailer'].'" name="trailer_id">';


echo '<input type="number" value="'.$_GET['trailer'].'" class="form-control" value="'.$_GET['trailer'].'" disabled required>';

?>	
	
     
    </div>
 
  </div>
 <br>
<?php

include '../PHP/TRAILERS.php';
$trailer_manager = new Trailer();
$trailer_manager->printTrailer($_GET['trailer']);


?>
<br>
    <div class="row">
    <div class="col-sm-6">
  <button type="submit" class="btn btn-primary purple-btn">Save</button>
  <button type="button" class="btn btn-primary purple-btn" id="cancelButton">Cancel</button>
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
<script type="text/javascript" src="../../node_modules/validator/validator.min.js"></script>
<script type="text/javascript"  src="../../js/ValidateInput.js"></script>
<script>
let selectField = document.getElementById('state');
let geoName = new GeoName();
geoName.getCountries();
onChangeEvent__handler(geoName);

const urlResolver = new UrlResolver();
const placesUrl = urlResolver.generateUrl("grid","trailers","records");

const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,placesUrl);

ValidateInput();

</script>