<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerTruck__URL = $urlresolver->generateUrl("form","truck","select_id");
?>

<form action='../PHP/delete_truck_selected.php' method='post'>
<div class="black-box" style="width:30%;">
<center>
<a href=<?php echo $registerTruck__URL; ?>>
  <i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
  <button type='submit' class='transparent-button'>
    <i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
    <a href='..//PHP/export_all_trucks.php?file=trucks'>
      <button type='button' class='transparent-button'>
        <i class="fas fa-file-export icon"></i></button></a>

</center>
</div>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Truck Id</th>
      <th scope="col">Model</th>
      <th scope="col">Vin Number</th>
	   <th scope="col">Plate Number</th>
     <th scope="col">Country</th>
		 <th scope="col">State</th>
		  	<th scope="col">Delete</th>
			<th scope="col">Edit</th>
			<th scope="col"><a href='../PHP/delete_truck_all.php'><button type='button' class='btn purple-button'>Delete All</button></a></th>
		 
		 
	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/TRUCKS.php';
$truck_manager = new Truck();
$truck_manager->printTruckList();


?>

  </tbody>
</table>
</form>
