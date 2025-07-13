<?php
$name=$_POST['name'];
include "BRAND_FILTER.php";
$brandFilter = new BrandFilter();
$brandFilter->filterByName($name);

?>