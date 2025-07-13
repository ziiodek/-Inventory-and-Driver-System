<form action='../PHP/update_cargo.php' method='post'>
<button type="button" class="btn purple-button" id="editButton"><i class='fas fa-edit'></i></button>
<fieldset disabled>
<div class='black-box'>
<?php
include '../PHP/CARGO.php';
echo "<input type='hidden' value='".$_GET['cargo']."' name='id'>";


$cargo_manager = new Cargo();
$cargo_manager->printCargo($_GET['cargo']);
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


<script src='../js/CargoOperations.js' ></script>
<script src='../js/CargoOutput.js' ></script>
<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js"></script>
<script src="../js/FormControls.js"></script>
<script>
unitValueChange();
amountChange();

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const cargo_id = urlParams.get('cargo');

const urlResolver = new UrlResolver();
const cargoUrl = urlResolver.generateUrl("grid","cargo","records");
const updateCargoUrl = urlResolver.addCustomURLParameter("form","cargo","update","cargo",cargo_id);
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,cargoUrl);
ButtonClickEvent("editButton",updateCargoUrl);
  </script>
