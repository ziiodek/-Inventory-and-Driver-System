<br>
<br>

<div class='container-fluid'>

<?php
include 'php/GEOLOCATION.php';
$geolocation_manager = new Geolocation();
$geolocation_manager->initCoordinatesFile();

?>
 <div id="map" style="width: 100%; height: 800px;"></div>

 <div id="popup" class="ol-popup">
     <a href="#" id="popup-closer" class="ol-popup-closer"></a>
     <div id="popup-content"></div>
 </div>




<!--<iframe style='width:100%;' height="800" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-106.24867200851442%2C31.808910258383627%2C-106.2285876274109%2C31.82087161764483&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/>
<small><a href="https://www.openstreetmap.org/#map=16/31.8149/-106.2386">View Larger Map</a>
</small> -->
</div>





 
</div>

<script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="../bootstrap/js/bootstrap.bundle.min.js" ></script>

  <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
  <script src='js/coordinates.js'></script>
  <script src='js/initMap.js'></script>
<script src='js/updateLocations.js'></script>
<script>

updateCoordinates(coordinates);

setInterval(updateCoordinates(coordinates),6000);
 
 
 
 
 




</script>
</body>
</html>