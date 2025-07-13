<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerPlace__URL = $urlresolver->generateUrl("form","place","register");
?>

<form action='../PHP/delete_place_selected.php' method='post'>
<div class="black-box" style="width:30%;">
<center>
<a href=<?php echo $registerPlace__URL; ?>>
	<i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
	<button type='submit' class='transparent-button'>
	<i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
	<a href='../PHP/export_all_places.php?file=places'>
	<button type='button' class='transparent-button'>
	<i class="fas fa-file-export icon"></i></button></a>
</center>
</div>
<center>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
	  <th scope="col">Country</th>
	  <th scope="col">State</th>
	  <th scope="col">City</th>
	  <th scope="col">Street</th>
	  <th scope="col">Zip Code</th>
		  <th scope="col">Delete</th>
		  <th scope="col">Edit</th>
		  <th scope="col"><a href='./PHP/delete_place_all.php'><button type='button' class='btn purple-button'>Delete All</button></a></th>
	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/PLACE.php';

$place_manager = new Place();
$place_manager->printPlaceList();
?>
  </tbody>
</table>
</center>
</form>
