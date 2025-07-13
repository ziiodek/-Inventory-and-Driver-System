<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerTrailer__AutoId__URL = $urlresolver->addCustomURLParameter("form","trailer","register","type","auto");
$registerTrailer__AutoCustom__URL = $urlresolver->addCustomURLParameter("form","trailer","register","type","custom");
?>

<div class="col">
  <center>
  <a href=<?php echo $registerTrailer__AutoId__URL; ?>><button type="button" class="btn btn-primary purple-btn">Auto Generated Id</button></a>
  <br>
  <br>
    <a href=<?php echo $registerTrailer__AutoCustom__URL; ?>><button type="button" class="btn btn-primary purple-btn">Custom Id</button></a>

   </center>
  </div>
  


  
