<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerCargo__URL = $urlresolver->generateUrl("form","cargo","register");
?>


<form action='../PHP/delete_cargo_selected.php' method='post'>
<div class="black-box" style="width:30%;">
<center>
<a href=<?php  echo $registerCargo__URL; ?>>
<i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
<button type='submit' class='transparent-button'>
	<i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
	<a href='../PHP/export_all_cargo.php?file=cargo'>
		<button type='button' class='transparent-button'>
			<i class="fas fa-file-export icon"></i>
		</button>
	</a>
</center>
</div>
<center>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Shipper No</th>
	    <th scope="col">Unit of Measure</th>
	  <th scope="col">Amount</th>
		  <th scope="col">Unit Value</th>
		  <th scope="col">Total Value</th>
		  <th scope="col">Unit of Measure (Weight)</th>
		  <th scope="col">Weight</th>
		  <th scope="col">Type</th>
		  <th scope="col">Material Type</th>
		  <th scope="col">
		<a href='../PHP/delete_cargo_all.php'>
		<button type='button' class='btn purple-button'>Delete All</button>
	</a>
</th>
	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/CARGO.php';
$cargo_manager = new Cargo();
$cargo_manager->printCargoList();
?>


  </tbody>
</table>
</center>
</form>
