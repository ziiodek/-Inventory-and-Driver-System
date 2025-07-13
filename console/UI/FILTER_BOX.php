<?php
$filterUrl = "index.php?layout=grid&model=".$_GET['model']."&action=filter";
$resetFilterUrl = "index.php?layout=grid&model=".$_GET['model']."&action=records";

?>

<div class="filter-box">
   <form action="<?php echo $filterUrl;?>" method="post" id="filterForm">
<?php
include "models/".strtoupper($_GET['model'])."_FILTER.php";
?>
<br>
<div class="row">
<button type="action" class="btn purple-button">
    Apply Filter
</button>
&nbsp;&nbsp;
<a href='<?php echo $resetFilterUrl; ?>'><button type="button" class="btn purple-button">
    Reset Filter
</button></a>
</div>
</form>
</div>
