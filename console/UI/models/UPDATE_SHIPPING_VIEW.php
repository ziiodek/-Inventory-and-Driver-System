<?php
include "DOCUMENTS_GRID.php";
?>
<br>

<?php
include "UPLOAD_DOCUMENTS.php";
?>


<form action='../PHP/update_shipping.php' method='post' class='form-container'>
<div class='row'>
<div class='col'>
<div class='black-box'>
<?php

echo "<input type='hidden' name='shipper_no' value = '".$_GET['shipper_no']."'>";


include '../PHP/SHIPPING.php';
include '../PHP/SHIPPING_STATUS.php';
$shipping_manager = new Shipping();
$shipping_manager->printShippingShipperNoCustomer($_GET['shipper_no']);


?>
<br>

  </div>
  </div>
  
  <div class='col'>
<div class='black-box'>
<?php
$shipping_status = new ShippingStatus();
$shipping_status->printShipping($_GET['shipper_no']);
?>
<br>
</div>
</div>
  </div>
<br>
  <div class='row'>
<div class='col'>
<div class='black-box'>
<?php
$shipping_manager->printShipping($_GET['shipper_no']);
echo "<br>";
$shipping_manager->printShippingComments($_GET['shipper_no']);
?>
<br>
<br>
<?php
include "../PHP/UI/URLRESOLVER.php";
   $urlresolver = new UrlResolver();
   $uploadDocuments__URL = $urlresolver->generateUrl("grid","cargo","records");
?>
<p><a href="<?php echo $uploadDocuments__URL; ?>"><button type="button" class="btn btn-primary purple-btn" >Assign Cargo</button></a></p>

</div>
</div>



</div>
<button type="submit" class="btn btn-primary purple-btn">Save</button>
<button type="button" class="btn btn-primary purple-btn" id="cancelButton">Cancel</button>&nbsp;&nbsp;&nbsp;
</form>

<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js"></script>
<script src="../js/ShipperNo.js"></script>
<script>
const urlResolver = new UrlResolver();
const brandsUrl = urlResolver.generateUrl("grid","shipping","records");
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,brandsUrl);
const uploadField = document.getElementsByName("file[]")[0];
const shipperNo_files = document.getElementsByName("shipperNo_files")[0];
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const shipperNo = urlParams.get('shipper_no')
enabledUploadDocuments(shipperNo,uploadField,shipperNo_files);
  </script>
