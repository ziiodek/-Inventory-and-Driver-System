<?php
include "../PHP/UI/URLRESOLVER.php";
$urlresolver = new UrlResolver();
$registerTruck__AutoId__URL = $urlresolver->addCustomURLParameter("form","truck","register","type","auto");
$registerTruck__AutoCustom__URL = $urlresolver->addCustomURLParameter("form","truck","register","type","custom");
?>
    <div class="col">
   <center>
   <a href=<?php echo $registerTruck__AutoId__URL; ?>><button type="button" class="btn btn-primary purple-btn">Auto Generated Id</button></a>
   <br>
   <br>
     <a href=<?php echo $registerTruck__AutoCustom__URL; ?>><button type="button" class="btn btn-primary purple-btn">Custom Id</button></a>
   
   
   </center>
  </div>
  


  

