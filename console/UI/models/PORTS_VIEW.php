<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerPort__URL = $urlresolver->generateUrl("form","port","register");
?>

<form action='../PHP/delete_ports_selected.php' method='post'>
<div class="black-box" style="width:30%;">
<center> 
<a href=<?php echo $registerPort__URL;?>>
  <i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
  <button type='submit' class='transparent-button'>
  <i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
  <a href='../PHP/export_all_ports.php?file=ports'>
  <button type='button' class='transparent-button'>
  <i class="fas fa-file-export icon"></i></button></a>
</center>
</div>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Port Name</th>
      <th scope="col">Street</th>
      <th scope="col">City</th>
	   <th scope="col">State</th>
     <th scope="col">Country</th>
		 <th scope="col">Zip Code</th>
		 <th scope="col">Delete</th>
		 <th scope="col">Edit</th>
		   <th scope="col"><a href='../PHP/delete_ports_all.php'><button type='button' class='btn purple-button'>Delete All</button></a></th>
	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/PORTS.php';
$port_manager = new Port();
$port_manager->printPortList();


?>


  </tbody>
</table>
</form>
