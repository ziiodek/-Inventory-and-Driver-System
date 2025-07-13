<?php
if($_GET['action'] != 'register'){


?>

<form action=<?php echo '../PHP/delete_shippingdocuments_selected.php?shipper_no='.$_GET['shipper_no'].'&action='.$_GET['action']; ?> method='post'>
<div class="black-box" style="width:30%;">
<center>
  <button type='submit' class='transparent-button'>
    <i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
</center>
</div>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">File Name</th>
	<th scope="col">
		<a href=<?php echo '../PHP/delete_shippingDocuments_all.php?shipper_no='.$_GET['shipper_no'].'&action='.$_GET['action']; ?>>
		<button type='button' class='btn purple-button'>Delete All</button>
	</a>
</th>
	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/SHIPPINGDOCUMENTS.php';
$shippingDocuments_manager = new ShippingDocuments();
$shippingDocuments_manager->printShippingDocumentsList($_GET['shipper_no'],$_GET['action']);
?>


  </tbody>
</table>
</form>

<?php
}

?>