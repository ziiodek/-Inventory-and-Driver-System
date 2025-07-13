<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerDriver__URL = $urlresolver->generateUrl("form","driver","register");
?>

<form action='../PHP/delete_driver_selected.php' method='post'>
<div class="black-box" style="width:30%;">
<center>
<a href=<?php echo $registerDriver__URL; ?>>
  <i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
  <button type='submit' class='transparent-button'>
    <i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
  <a href='../PHP/export_all_drivers.php?file=drivers'>
    <button type='button' class='transparent-button'>
    <i class="fas fa-file-export icon"></i>
  </button></a>
</center>
</div>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Driver Id</th>
      <th scope="col">Name</th>
      <th scope="col">Last Name</th>
	   <th scope="col">Driver License</th>
		 <th scope="col">License Type</th>
		  <th scope="col">Passport No</th>
		   <th scope="col">Phone Number</th>
			<th scope="col">Delete</th>
			<th scope="col">Edit</th>
      <th scope="col">View</th>
			<th scope="col"><a href='../PHP/delete_driver_all.php'>
        <button type='button' class='btn purple-button'>Delete All</button></a></th>
		 
	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/DRIVERS.php';
$driver_manager = new Driver();
$driver_manager->printDriverList();


?>


  </tbody>
</table>
</form>
