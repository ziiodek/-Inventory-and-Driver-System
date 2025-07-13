<br>
<br>
<div class='container jumbotron bg-black'>
  <div class="row">
    <div class="col-sm-6 text-light">
      <h4>Customer</h4>
    </div>
	
	  <div class="col-sm-6 text-light text-right">
      <?php
	  echo "<a href='UPDATE_CUSTOMER.php?customer=".$_GET['customer']."'>";
	  ?>
	  <i class="fas fa-edit purple-icon"></i>
	  </a>
    </div>
	
  </div>
<br>
 <br>
<?php
include 'php/CUSTOMERS.php';

$customer_manager = new Customer();
$customer_manager->printCustomerView($_GET['customer']);
?>


</div>