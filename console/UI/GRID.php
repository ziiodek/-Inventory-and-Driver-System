<div>
<?php
include "TITLE.php";
?> 

<?php
include "SEPARATOR.php";
?>

<?php

if($_GET['model'] != "dashboard"){
    include "FILTER_BOX.php"; 
}



?>
</div>
<div>
<?php
include "SEPARATOR.php";
include "SEPARATOR.php";
?>
</div>
<div style="overflow-x:scroll;">
<?php
if($_GET['action'] == 'records'){
    include "models/".strtoupper($_GET['model'])."_VIEW.php";
}else if($_GET['action'] == 'filter'){
    include "models/FILTER_RESULTS.php";
}

?>
</div>