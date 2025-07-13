<form action='../PHP/update_cargo.php' method='post'>
<div class='black-box'>
<?php
include '../PHP/CARGO.php';
echo "<input type='hidden' value='".$_GET['cargo']."' name='id'>";


$cargo_manager = new Cargo();
$cargo_manager->printCargo($_GET['cargo']);
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


<script src='../js/CargoOperations.js' ></script>
<script src='../js/CargoOutput.js' ></script>
<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js">
  </script>
<script>
    unitValueChange();
  amountChange();
const urlResolver = new UrlResolver();
const brandsUrl = urlResolver.generateUrl("grid","cargo","records");
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,brandsUrl);
  </script>
