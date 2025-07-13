<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerBrand__URL = $urlresolver->generateUrl("form","brand","register");
?>


<form action='../PHP/delete_brand_selected.php' method='post'>
<div class="black-box" style="width:30%;">
<center>
<a href=<?php echo $registerBrand__URL; ?>>
  <i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
  <button type='submit' class='transparent-button'>
    <i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
    <a href='../PHP/export_all_brands.php?file=brands'>
    <button type='button' class='transparent-button'>
      <i class="fas fa-file-export icon"></i>
    </button></a>
</center>
</div>
<center>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
		  <th scope="col">Delete</th>
		  <th scope="col">Edit</th>
		  <th scope="col">
        <a href='../PHP/delete_brand_all.php'>
          <button type='button' class='btn purple-button'>Delete All</button></a></th>
	</tr>
  </thead>
  <tbody>

<?php
require_once '../PHP/BRAND.php';
$brand_manager = new Brand();
$brand_manager->printBrandList();
?>


  </tbody>
</table>
</center>
</form>

