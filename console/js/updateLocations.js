
function updateCoordinates(coordinates){

for(var i=0;i<coordinates.length;i++){
	
	var coordinate = coordinates[i];
	var name = coordinate[0];
	
	var layer = new ol.layer.Vector({
	
	
	
	source: new ol.source.Vector({
		features:[
		new ol.Feature({
			geometry: new ol.geom.Point(ol.proj.fromLonLat([coordinate[1],coordinate[2]]))
		})
		]
		
	})
	
}); 
map.addLayer(layer);
	


 var container = document.getElementById('popup');
 var content = document.getElementById('popup-content');
 var closer = document.getElementById('popup-closer');

 var overlay = new ol.Overlay({
     element: container,
     autoPan: true,
     autoPanAnimation: {
         duration: 250
     }
 });
 map.addOverlay(overlay);
  content.innerHTML = "<b>"+name+"</b>";
 overlay.setPosition(ol.proj.fromLonLat([coordinate[1],coordinate[2]]));



}

}
