<div style="width:20rem;">
<div class="black-box">
<center>
<h2>
<strong>
<?php
$title = ucfirst($_GET['action'])." ".ucfirst($_GET['model']);
$title = preg_replace('/[^A-Za-z]/', ' ', $title);
echo $title;
?>
</strong>
</h2>
</center>
</div>
</div>