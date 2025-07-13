

<div class="black-box" style="width:30%;">
<center>
<a href='../PHP/export_all_shipping_status.php?file=shippingStatus'>
<button type='button' class='transparent-button'>
	<i class="fas fa-file-export icon"></i>
</button></a>
</center>
</div>
<table class="table table-dark">
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
$shipping_manager = new ShippingStatus();
$shipping_manager->printShippingStatusList();


?>


  </tbody>
</table>
