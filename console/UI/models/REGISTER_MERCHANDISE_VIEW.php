<form action='../PHP/add_merchandise.php' method='post'>
<div class='black-box'>
  <div class="row">
    <div class="col">
	<label>Merchandise Name:</label>
      <input type="text" name='name' class="form-control" placeholder="Merchandise Name" required>
    </div>
	<div class="col">
	<label>Brand Name:</label>
	<select name='brand' class='form-control' required>
	<?php
	include '../PHP/BRAND.php';
	$brand_manager = new Brand();
	$brand_manager->printBrands();
	?>
	</select>
     
    </div>
	
	
  </div>
  <br>
  <div class='row'>
  <div class='col-sm-6'>
  <label>Description:</label>
  <textarea name="description" rows="4" cols="50" name="comments" class="form-control" required>
	
	</textarea>
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
<script src="../js/URLRESOLVER.js"></script>
<script src="../js/CancelButton.js">
  </script>
<script>
  const urlResolver = new UrlResolver();
const brandsUrl = urlResolver.generateUrl("grid","merchandise","records");
const cancelButton = document.getElementById("cancelButton");
CancelButton(cancelButton,brandsUrl);
  
  </script>