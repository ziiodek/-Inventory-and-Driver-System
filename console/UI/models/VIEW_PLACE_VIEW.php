
<form action='../PHP/update_place.php' method='post'>
<button type="button" class="btn purple-button" id="editButton"><i class='fas fa-edit'></i></button>
<fieldset disabled>
<div class='black-box'>
<?php
include '../PHP/PLACE.php';
echo "<input type='hidden' value='".$_GET['place']."' name='id'>";


$place_manager = new Place();
$place_manager->printPlace($_GET['place']);

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
const place_id = urlParams.get('place');   
let selectField = document.getElementById('state');
let geoName = new GeoName();
geoName.getCountries();
onChangeEvent__handler(geoName);
const urlResolver = new UrlResolver();
const placesUrl = urlResolver.generateUrl("grid","places","records");
const updatePlaceUrl = urlResolver.addCustomURLParameter("form","place","update","place",place_id);
const cancelButton = document.getElementById("cancelButton");
ButtonClickEvent("editButton",updatePlaceUrl);
CancelButton(cancelButton,placesUrl);
</script>