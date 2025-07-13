<form action='../PHP/update_customer.php' method='post'>
<button type="button" class="btn purple-button" id="editButton"><i class='fas fa-edit'></i></button>
<fieldset disabled>
<div class='black-box'>
  <div class="row">
    <div class="col-sm-4">
    <label>Customer ID:</label>
<?php

echo '<input type="hidden" value="'.$_GET['customer'].'" name="customer_id">';


echo '<input type="number" value="'.$_GET['customer'].'" class="form-control" value="'.$_GET['customer'].'" disabled required>';

?>	
	 
    </div>
  </div>
 <br>
<?php

include '../PHP/CUSTOMERS.php';
$customer_manager = new Customer();
$customer_manager->printCustomer($_GET['customer']);


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
  </script>
<script>
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const customer_id = urlParams.get('customer');
let selectField = document.getElementById('state');
let geoName = new GeoName();
geoName.getCountries();
onChangeEvent__handler(geoName);
const urlResolver = new UrlResolver();
const customersUrl = urlResolver.generateUrl("grid","customers","records");
const cancelButton = document.getElementById("cancelButton");
const updateCustomerUrl = urlResolver.addCustomURLParameter("form","customer","update","customer",customer_id);
CancelButton(cancelButton, customersUrl);
ButtonClickEvent("editButton",updateCustomerUrl);
  </script>


