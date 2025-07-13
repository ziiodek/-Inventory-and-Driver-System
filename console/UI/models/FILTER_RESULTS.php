
<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerBrand__URL = $urlresolver->generateUrl("form",str_replace("s","",$_GET['model']),"register");
?>


<form action=<?php echo "../PHP/delete_".str_replace("s","",$_GET['model'])."_selected.php" ?>method='post'>
<div class="black-box" style="width:30%;">
<center>
<a href=<?php echo $registerBrand__URL; ?>>
  <i class="fas fa-plus-circle icon"></i></a>&nbsp;&nbsp;&nbsp;
  <button type='submit' class='transparent-button'>
    <i class="fas fa-trash icon"></i></button>&nbsp;&nbsp;&nbsp;
    <a href=<?php echo '../PHP/export_all_'.$_GET['model'].'.php?file='.$_GET['model'].'' ?>>
    <button type='button' class='transparent-button'>
      <i class="fas fa-file-export icon"></i>
    </button></a>
</center>
</div>
<center>
<table class="table table-dark">

<?php
if(isset($_POST['filter'])){
echo $_POST['filter'];
include "../PHP/".strtoupper($_GET['model'])."_FILTER.php";
$model = ucfirst($_GET['model']);
$model = preg_replace('/[^A-Za-z]/', '', $model);
$filter =$_POST['filter'];
echo $_POST[$filter];
$className = $model."Filter";
$filterManager = new $className();
$filterFunction = "filterBy".ucfirst($filter);
}
?>


  <thead>
    <tr>
      <?php
      $filterManager->printTableHeader();

      ?>

		  <th scope="col">
        <a href=<?php echo '../PHP/delete_'.str_replace("s","",$_GET['model'])."_selected.php".'_all.php' ?>>
          <button type='button' class='btn purple-button'>Delete All</button></a></th>
	</tr>
  </thead>
  <tbody>

<?php
$filterManager->$filterFunction(strtoupper($_POST[$filter]));

?>



  </tbody>
</table>
</center>
</form>




