
<form action='../PHP/update_merchandise.php' method='post'>
<button type="button" class="btn purple-button" id="editButton"><i class='fas fa-edit'></i></button>
<fieldset disabled>
<div class='black-box'>
<?php
include '../PHP/MERCHANDISE.php';
echo "<input type='hidden' value='".$_GET['merchandise']."' name='id'>";


$merchandise_manager = new Merchandise();
$merchandise_manager->printMerchandise($_GET['merchandise']);
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
<script>
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const merchandise_id = urlParams.get('merchandise');

const urlResolver = new UrlResolver();
const merchandiseUrl = urlResolver.generateUrl("grid","merchandise","records");
const cancelButton = document.getElementById("cancelButton");
const updateMerchandiseUrl = urlResolver.addCustomURLParameter("form","merchandise","update","merchandise",merchandise_id);
CancelButton(cancelButton,merchandiseUrl);
ButtonClickEvent("editButton",updateMerchandiseUrl);
  </script>
