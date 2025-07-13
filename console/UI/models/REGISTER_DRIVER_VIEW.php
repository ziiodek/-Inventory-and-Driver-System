<form action='../PHP/add_driver.php' method='post'>
<div class='black-box'>
  <div class="row">
    <div class="col-sm-4">
      <label>Driver ID:</label>
     <?php
require_once '../PHP/DRIVER_ID_GENERATOR.php';

$driver_id_generator = new DriverIdGenerator();
$driver_id = $driver_id_generator->generateId();

echo '<input type="hidden" value="'.$driver_id.'" name="driver_id">';


echo '<input type="number" value="'.$driver_id.'" class="form-control" disabled required>';

?>	
	 
	 
	 
    </div>
  </div>
 <br>
  <div class="row">
    <div class="col">
    <label>First Name:</label>
      <input type="text" name='name' class="form-control" required>
    </div>
    <div class="col">
    <label>Last Name:</label>  
    <input type="text" name='lastname' class="form-control" required>
    </div>
  </div>
  <br>
    <div class="row">
    <div class="col">
    <label>Phone Number:</label>  
    <input type="tel" name='phone' class="form-control" id="phone" required>
    </div>
    <div class="col">
    <label>License Number:</label>
 <input type="tel" name='license' class="form-control" required>
 
    </div>
  </div>
  <br>
      <div class="row">
    <div class="col">
    <label>License Type:</label> 
    <select name='license_type' class='form-control' required>
	 <option value='none'>License Type</option>
	  <option value='Class M'>Class M</option>
	   <option value='Class C'>Class C</option>
	    <option value='Class B'>Class B</option>
		 <option value='Class A'>Class A</option>
		  <option value='Class C CDL'>Class C CDL</option>
		   <option value='Class B CDL'>Class B CDL</option>
		    <option value='Class A CDL'>Class A CDL</option>
	 </select>
    </div>
	<div class="col-sm-6">
  <label>Passport:</label>
      <input type="text" name='passport' class="form-control" required>
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

<script src="../js/CancelButton.js"></script>
<script src="../js/PhoneNumberFormatter.js"></script>
<script src="../js/URLRESOLVER.js"></script>
<script>
const urlResolver = new UrlResolver();
const driversUrl = urlResolver.generateUrl("grid","drivers","records");
  const cancelButton = document.getElementById("cancelButton");
  CancelButton(cancelButton, driversUrl);

  const inputPhoneNumber = document.getElementById("phone");
  onChangePhoneNumber(inputPhoneNumber);
  
  </script>