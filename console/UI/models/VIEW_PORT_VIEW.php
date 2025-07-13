
<form action='../PHP/update_port.php' method='post'>
<button type="button" class="btn purple-button" id="editButton"><i class='fas fa-edit'></i></button> 
<fieldset disabled>  
<div class='black-box'>
<?php
include '../PHP/PORTS.php';
echo "<input type='hidden' value='".$_GET['port']."' name='id'>";


$port_manager = new Port();
$port_manager->printPort($_GET['port']);
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
let selectField = document.getElementById('state');
let geoName = new GeoName();
geoName.getCountries();
onChangeEvent__handler(geoName);
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const port_id = urlParams.get('port');
const urlResolver = new UrlResolver();
const portsUrl = urlResolver.generateUrl("grid","ports","records");
const updatePortUrl = urlResolver.addCustomURLParameter("form","port","update","port",port_id);
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,portsUrl);
ButtonClickEvent("editButton",updatePortUrl);
</script>