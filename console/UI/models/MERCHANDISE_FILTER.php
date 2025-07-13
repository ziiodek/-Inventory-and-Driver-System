<div class='row'>
<div class="col-sm-6">
<input type='hidden' name='filter' value='brand'>
<label>Brand:</label>
<select name='brand' class='form-control' placeholder="Select Brand">
	<?php
	include '../PHP/BRAND.php';
	$brand_manager = new Brand();
	$brand_manager->printBrands();
	?>
	</select>
</div>
</div>
