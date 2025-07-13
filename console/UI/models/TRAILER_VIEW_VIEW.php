<br>
<br>
<div class='container jumbotron bg-black'>
  <div class="row">
    <div class="col-sm-6 text-light">
      <h4>Trailer</h4>
    </div>
	
	  <div class="col-sm-6 text-light text-right">
      <?php
	  echo "<a href='UPDATE_TRAILER.php?trailer=".$_GET['trailer']."'>";
	  ?>
	  <i class="fas fa-edit purple-icon"></i>
	  </a>
    </div>
	
  </div>
<br>
 <br>
<?php
include 'php/TRAILERS.php';
$trailer_manager = new Trailer();
$trailer_manager->printTrailerView($_GET['trailer']);
?>


</div>