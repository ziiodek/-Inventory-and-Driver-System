<div class="black-box">

<table class="table table-dark">
<h3>
Today Shippings
</h3>
<br>
  <thead>
    <tr>
      <th scope="col">#</th>
   
		
		   <th scope="col">Shipper No.</th>
		    <th scope="col">Date</th>
			 <th scope="col">Origin</th>
		   <th scope="col">Destiny</th>
		  <th scope="col">Departure Hour</th>
		  <th scope="col">Arrive Hour</th>
		  <th scope="col">Status</th>
		  <th scope="col">Delivered</th>
		  <th scope="col">CBP</th>

	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/SHIPPING_STATUS.php';
require_once '../PHP/SHIPPING.php';
$shippingStatus_manager = new ShippingStatus();
$shipping_manager = new Shipping();
$shippingStatus_manager->printTodayShippingStatusList();


?>


  </tbody>
</table>
</div>
<br>
<br>
<div class='row'>
<div class='col'>
<div class="black-box">
<h5>
Merchandise Being Deliver
</h5>
<br>
<table class="table table-dark">
<thead>
    <tr>
      <th scope="col">#</th>	
		   <th scope="col">Name</th>
		    <th scope="col">Shipper No.</th>
	</tr>
  </thead>
  <tbody>
<?php
$shipping_manager->printTodayMerchandise();
?>
  </tbody>
</table>	
</div>
</div>
<div class='col'>
<div class="black-box">
<h5>
Drivers on Field
</h5>
<br>
<table class="table table-dark">
<thead>
    <tr>
      <th scope="col">#</th>	
		   <th scope="col">Name</th>
		   <th scope="col">Driver Id</th>
		    <th scope="col">Shipper No.</th>
	</tr>
  </thead>
  <tbody>
<?php
$shipping_manager->printTodayDrivers();
?>	
</tbody>
</table>
</div>
</div>

</div>
<br>
<br>
<div class='row'>
<div class='col'>
<div class="black-box">
<h5>
Trailers on Field
</h5>
<br>
<table class="table table-dark">
<thead>
    <tr>
      <th scope="col">#</th>	
		   <th scope="col">Plate Number</th>
		   <th scope="col">Trailer Id</th>
		    <th scope="col">Shipper No.</th>
	</tr>
  </thead>
  <tbody>
<?php
$shipping_manager->printTodayTrailers();
?>
</tbody>
</table>
</div>
</div>
<div class='col'>
<div class="black-box">
<h5>
Trucks on Field
</h5>
<br>
<table class="table table-dark">
<thead>
    <tr>
      <th scope="col">#</th>	
		   <th scope="col">Plate Number</th>
		   <th scope="col">Truck Id</th>
		    <th scope="col">Shipper No.</th>
	</tr>
  </thead>
  <tbody>
<?php
$shipping_manager->printTodayTrucks();
?>
</tbody>
</table>
</div>
</div>
</div>
