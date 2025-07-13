
<form action='../PHP/update_merchandise.php' method='post'>
<div class='black-box'>
<?php
include '../PHP/MERCHANDISE.php';
echo "<input type='hidden' value='".$_GET['merchandise']."' name='id'>";


$merchandise_manager = new Merchandise();
$merchandise_manager->printMerchandise($_GET['merchandise']);
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
<script src="../js/CancelButton.js">
  </script>
<script>
const urlResolver = new UrlResolver();
const brandsUrl = urlResolver.generateUrl("grid","merchandise","records");
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,brandsUrl);
  </script>
