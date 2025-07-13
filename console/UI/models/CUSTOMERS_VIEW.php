<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerCustomer__URL = $urlresolver->generateUrl("form","customer","register");
?>

<form action='../PHP/delete_customer_selected.php' method='post'>
<div class="black-box" style="width:30%;">
<center>
<a href=<?php echo $registerCustomer__URL; ?>>
  <i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
  <button type='submit' class='transparent-button'>
    <i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
    <a href='../PHP/export_all_customers.php?file=customers'>
      <button type='button' class='transparent-button'>
        <i class="fas fa-file-export icon"></i></button></a>
</center>
</div>
<center>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Id</th>
      <th scope="col">Company Name</th>
     <th scope="col">Country</th>
     <th scope="col">State</th>
     <th scope="col">City</th>
     <th scope="col">Street Name</th>
		  <th scope="col">Zip Code</th>
		  <th scope="col">Delete</th>
		  <th scope="col">Edit</th>
		  <th scope="col"><a href='../PHP/delete_customer_all.php'><button type='button' class='btn purple-button'>Delete All</button></a></th>
	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/CUSTOMERS.php';
$customer_manager = new Customer();
$customer_manager->printCustomerList();
?>
  </tbody>
</table>
</center>
</form>
