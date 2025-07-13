<form action='../PHP/add_customer.php' method='post'>
<input type="hidden" name="selectedCountryId" id="selectedCountryId">
<input type="hidden" name="selectedCountryName" id="selectedCountryName">
<div class='black-box'>
  <div class="row">
    <div class="col-sm-4">
      <label>Customer ID:</label>
<?php
require_once '../PHP/CUSTOMER_ID_GENERATOR.php';

$customer_id_generator = new CustomerIdGenerator();
$customer_id = $customer_id_generator->generateId();

echo '<input type="hidden" value="'.$customer_id.'" name="customer_id">';


echo '<input type="number" value="'.$customer_id.'" class="form-control" placeholder="Customer Id" disabled required>';

?>	
	
     
    </div>
 
  </div>
 <br>
  <div class="row">
    <div class="col-sm-6">
    <label>Company Name:</label>
      <input type="text" name='name' class="form-control" placeholder="Company name" required>
    </div>
  </div>
  <br>
<div class="row">
  <div class="col">
  <label>Country:</label>  
  <select name='country' class='form-control' id='country' required>
</select> 
    </div>
    <div class="col">
    <label>State:</label>
    <select name='state' class='form-control' id='state' required>
</select>
    </div>

</div>
  <br>
    <div class="row">
    <div class="col">
    <label>City:</label>  
    <input type="text" name='city' class="form-control" placeholder="City" required>
    </div>

    <div class="col">
    <label>Street Name:</label>
    <input type="text" name='street' class="form-control" placeholder="Street Name" required>
  </div>

  </div>
  <br>
      <div class="row">
    <div class="col-sm-6">
    <label>Zip Code:</label>  
    <input type="number" name='zip' class="form-control" placeholder="Zip Code" required>
    </div>
  </div>
  <br>
    <div class="row">
    <div class="col-sm-6">
  <button type="submit" class="btn purple-button">Register</button>
  <button type="button" class="btn purple-button" id="cancelButton">Cancel</button>
  </div>
  </div>
</div>
</form>

<script src="../js/GeoName.js"></script>
<script src="../../js/DisplayCountries.js"></script>
<script src="../../js/DisplayStates.js"></script>
<script src="../../js/ClearStates.js"></script>
<script src="../../js/CountriesEvents.js"></script>
<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js"></script>
  </script>
<script>
let selectField = document.getElementById('state');
let geoName = new GeoName();
geoName.getCountries();
onChangeEvent__handler(geoName);
const urlResolver = new UrlResolver();
const customersUrl = urlResolver.generateUrl("grid","customers","records");
  const cancelButton = document.getElementById("cancelButton");
  CancelButton(cancelButton, customersUrl);
  </script>