<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerTrailer__URL = $urlresolver->generateUrl("form","trailer","select_id");
?>


<form action='../PHP/delete_trailer_selected.php' method='post'>
<div class="black-box" style="width:30%;">
<center>
<a href=<?php echo $registerTrailer__URL; ?>>
  <i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
  <button type='submit' class='transparent-button'>
    <i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
    <a href='../PHP/export_all_trailers.php?file=trailers'>
      <button type='button' class='transparent-button'>
        <i class="fas fa-file-export icon"></i></button></a>
</center>
</div>   
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Trailer Id</th>
      <th scope="col">Type</th>
      <th scope="col">Capacity</th>
	   <th scope="col">Dimensions</th>
		 <th scope="col">Plate Number</th>
     <th scope="col">Country</th>
		  <th scope="col">State</th>
		  	<th scope="col">Delete</th>
			<th scope="col">Edit</th>
			<th scope="col"><a href='../PHP/delete_trailer_all.php'><button type='button' class='btn purple-button'>Delete All</button></a></th>
		  
		 
	</tr>
  </thead>
  <tbody>


<?php
require_once '../PHP/TRAILERS.php';
$trailer_manager = new Trailer();
$trailer_manager->printTrailerList();


?>

  </tbody>
</table>
</form>
