<div class="dark-gray-box">
<?php
include "TITLE.php";
?>

<?php
include "SEPARATOR.php";
?>
<div>
<?php
include "models/".strtoupper($_GET['action'])."_".strtoupper($_GET['model'])."_VIEW.php";
?>
</div>

</div>