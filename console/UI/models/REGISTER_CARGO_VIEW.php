
<form action='../PHP/add_cargo.php' method='post'>
<div class='black-box'>
  <div class="row">
    <div class="col-sm-6">
	<label>Shipper No:</label>
	<select class='form-control' name='shipper_no'>
	<?php
      include '../PHP/SHIPPING.php';
      include '../PHP/MERCHANDISE.php';
	  $shipping_manager = new Shipping();
	  $shipping_manager->printShippingsList();
    ?>
	</select>
	</div>
	
	
  </div>
  <br>
  <div class="row">
  <div class="col-sm-6">
    <label>Merchandise:</label>
    <select class='form-control' name='merchandise'>
    <?php 
	  $merchandise_manager = new Merchandise();
	  $merchandise_manager->printMerchandiseOptions();
    ?>
</select>
</div>
  </div>
  <br>
  
    <div class="row">
    <div class="col">
	<label>Unit of Measure:</label>
	<select name='UM' class='form-control' required>
	<option value='KG'>
		KG
	</option>
	<option value='LB'>
		LB
	</option>
	</select>
	
    </div>
	   <div class="col">
	<label>Amount:</label>
	<input type='text' name='amount' id='amount' class='form-control' required>
    </div>
	
  </div>
  <br>
      <div class="row">
    <div class="col">
	<label>Unit Value per Unit of Measure:</label>
	  <input type="text" name='unit_value' id="unit_value" class="form-control" placeholder="Unit Value" required>
     
    </div>
	   <div class="col">
	<label>Total Value:</label>
  <input type="text" class="form-control" id="total_value" placeholder="Total Value" disabled>
  <?php
  echo "<input type='hidden' value=0 name='total_value' id='total_value__hidden'>";
  ?>
    </div>
	
  </div>
  <br>
        <div class="row">
    <div class="col">
	<label>UMW:</label>
	  	<select name='UMW' class='form-control' required>
	<option value='KG'>
		KG
	</option>
	<option value='LB'>
		LB
	</option>
	</select>
     
    </div>
	   <div class="col">
	<label>Weight:</label>
  <input type="text" name='weight' class="form-control" placeholder="Weight" required>
    </div>
	
  </div>
  <br>
  <div class='row'>
  <div class='col'>
  <label>Cargo Type:</label>
  <select name='type' class='form-control' required>
  <option value='FTL'>
  FTL
  </option>
   <option value='LTL'>
  LTL
  </option>
  </select>
</div>
  <div class='col'>
  <label>Material Type:</label>
  <select name='material' class='form-control' required>
  <option value='CONTAINER'>
  CONTAINER
  </option>
   <option value='LIQUID BULK'>
  LIQUID BULK
  </option>
  <option value='DRY BULK'>
  DRY BULK
  </option>
  <option value='BREAK BULK'>
  BREAK BULK
  </option>  
  <option value='LIVESTOCK'>
  LIVESTOCK
  </option>
  <option value='RO-RO'>
  RO-RO
  </option>
  <option value='REFRIGERATED CARGO'>
  REFRIGERATED CARGO
  </option>
  <option value='LIQUID BULK'>
  HAZARDOUS MATERIAL
  </option>
</select>
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
<script src='../js/CargoOperations.js' ></script>
<script src='../js/CargoOutput.js' ></script>
<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js"></script>

<script>
  unitValueChange();
  amountChange();
const urlResolver = new UrlResolver();
const cargoUrl = urlResolver.generateUrl("grid","cargo","records");
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,cargoUrl);
</script>

