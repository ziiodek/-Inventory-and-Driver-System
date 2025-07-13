<form>
<button type="button" class="btn purple-button" id="editButton"><i class='fas fa-edit'></i></button>
<fieldset disabled>
<div class='black-box'>
  <div class="row">
    <div class="col-sm-4">
    <label>Driver ID:</label>
<?php
echo '<input type="hidden" value="'.$_GET['driver'].'" name="driver_id">';
echo '<input type="number" value="'.$_GET['driver'].'" class="form-control" value="'.$_GET['driver'].'" disabled required>';
?>	    
    </div>
  </div>
 <br>
<?php

include '../PHP/DRIVERS.php';
$driver_manager = new Driver();
$driver_manager->printDriver($_GET['driver']);


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

<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js"></script>
<script src="../js/FormControls.js"></script>
<script src="../js/DisableEnableForm.js"></script>
<script>
const urlResolver = new UrlResolver();
const driversUrl = urlResolver.generateUrl("grid","drivers","records");
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const driver_id = urlParams.get('driver');

const updateDriverUrl = urlResolver.addCustomURLParameter("form","driver","update","driver",driver_id);
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,driversUrl);
ButtonClickEvent("editButton",updateDriverUrl);
disableEnableForm();
  </script>

