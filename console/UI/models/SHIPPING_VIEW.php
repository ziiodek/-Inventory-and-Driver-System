<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerShipping__URL = $urlresolver->generateUrl("form","shipping","register");

$shippingStatus__URL = $urlresolver->generateUrl("grid","shipping_status","records");
?>

<form action='../PHP/delete_shipping_selected.php' method='post'>
<div class="black-box" style="width:30%;">
<center>
<a href=<?php echo $registerShipping__URL;?>>
<i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
<button type='submit' class='transparent-button'>
<i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
<a href='../PHP/export_all_shippings.php?file=shippings'>
<button type='button' class='transparent-button'>
<i class="fas fa-file-export icon"></i>
</button>
</a>
<a href=<?php echo $shippingStatus__URL; ?>>
<button type='button' class='transparent-button'>
<i class="fas fa-clock icon"></i>
</button>
</a>
</center>
</div>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
   
		
		   <th scope="col">Shipper No.</th>
		    <th scope="col">Seal</th>
			 <th scope="col">Port of Entry</th>
		   <th scope="col">Customer</th>
		  <th scope="col">Driver</th>
		  <th scope="col">Truck</th>
		  <th scope="col">Trailer</th>
		  <th scope="col">Type</th>
		  <th scope="col">Weight</th>
		  <th scope="col">Assign Trip</th>
		  <th scope="col">Delete</th>
			<th scope="col">Edit</th>
			<th scope="col"><a href='../PHP/delete_shipping_all.php'><button type='button' class='btn purple-button'>Delete All</button></a></th>
		  
	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/SHIPPING.php';
$shipping_manager = new Shipping();
$shipping_manager->printShippingList();


?>


  </tbody>
</table>
</form>
