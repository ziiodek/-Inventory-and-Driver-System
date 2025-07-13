<form action='../PHP/update_driver.php' method='post' id="inputForm">
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
<br>
    <div class="row">
    <div class="col-sm-6">
  <button type="submit" class="btn purple-button">Save</button>
  <button type="button" class="btn purple-button" id="cancelButton">Cancel</button>
  </div>
  </div>
</div>

</form>

<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js"></script>
<script src="../js/DisableEnableForm.js"></script>
<script>
const urlResolver = new UrlResolver();
const brandsUrl = urlResolver.generateUrl("grid","drivers","records");
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,brandsUrl);
disableEnableForm();

  </script>

