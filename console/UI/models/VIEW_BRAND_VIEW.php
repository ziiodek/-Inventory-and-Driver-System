<form action='../PHP/update_brand.php' method='post'>
<button type="button" class="btn purple-button" id="editButton"><i class='fas fa-edit'></i></button>
<fieldset disabled>
<div class='black-box'>
<?php
include '../PHP/BRAND.php';
echo "<input type='hidden' value='".$_GET['brand']."' name='id'>";


$brand_manager = new Brand();
$brand_manager->printBrand($_GET['brand']);
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
const brand_id = urlParams.get('brand');

const urlResolver = new UrlResolver();
const brandsUrl = urlResolver.generateUrl("grid","brands","records");
const updateBrandUrl = urlResolver.addCustomURLParameter("form","brand","update","brand",brand_id);
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,brandsUrl);
ButtonClickEvent("editButton",updateBrandUrl);
  </script>
