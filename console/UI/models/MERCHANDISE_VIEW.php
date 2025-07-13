<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerMerchandise__URL = $urlresolver->generateUrl("form","merchandise","register");
?>

<form action='../PHP/delete_merchandise_selected.php' method='post'>
<div class="black-box" style="width:30%;">
<center>
<a href=<?php echo $registerMerchandise__URL; ?>>
  <i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
  <button type='submit' class='transparent-button'>
    <i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
  <a href='../PHP/export_all_merchandise.php?file=brands'>
    <button type='button' class='transparent-button'>
      <i class="fas fa-file-export icon"></i>
    </button>
  </a>
</center>
</div>
<center>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
	    <th scope="col">Brand</th>
	  <th scope="col">Description</th>
		  <th scope="col">Delete</th>
		  <th scope="col">Edit</th>
		  <th scope="col"><a href='../PHP/delete_merchandise_all.php'><button type='button' class='btn purple-button'>Delete All</button></a></th>
	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/MERCHANDISE.php';
$merchandise_manager = new Merchandise();
$merchandise_manager->printMerchandiseList();
?>
  </tbody>
</table>
</center>
</form>
