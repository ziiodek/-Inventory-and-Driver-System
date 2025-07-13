/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

// Wait for the deviceready event before using any of Cordova's device APIs.
// See https://cordova.apache.org/docs/en/latest/cordova/events/events.html#deviceready
document.addEventListener('deviceready', onDeviceReady, false);


function getCurrentGeoLocation(){
    	
	
	var queryString = window.location.search;
	var urlParams = new URLSearchParams(queryString);
	var driver_id = urlParams.get('driver');
	
	
	var onSuccess = function(position) {
		
		
		
		
		$.ajax({
			url: 'https://www.ziiodek.com/HOUND/console/PHP/AJAXHANDLERS/geolocationHandler.php',
			type: "POST",
			data: {
				'class':'Geolocation','function':'updateLocation','driver_id':driver_id,'latitude':position.coords.latitude,'longitude':position.coords.longitude
				
			},
			success: function(data){
				//alert(data);
				
				
				
				}
				
		});
		
		
       /** alert('Latitude: '          + position.coords.latitude          + '\n' +
              'Longitude: '         + position.coords.longitude         + '\n' +
              'Altitude: '          + position.coords.altitude          + '\n' +
              'Accuracy: '          + position.coords.accuracy          + '\n' +
              'Altitude Accuracy: ' + position.coords.altitudeAccuracy  + '\n' +
              'Heading: '           + position.coords.heading           + '\n' +
              'Speed: '             + position.coords.speed             + '\n' +
              'Timestamp: '         + position.timestamp                + '\n');**/
    };

    // onError Callback receives a PositionError object
    //
    function onError(error) {
        alert('code: '    + error.code    + '\n' +
              'message: ' + error.message + '\n');
    }
	
	
	var geoPosition = navigator.geolocation.getCurrentPosition(onSuccess, onError);
	
	

    setTimeout(getCurrentGeoLocation, 5000);
}

function onDeviceReady() {
    // Cordova is now initialized. Have fun!
	
	var loginBtn = document.getElementById('loginBtn');
	loginBtn.addEventListener("click",function (){
		
		
		
		
		var driverId = document.getElementsByName('driver_id')[0].value;
		
		$.ajax({
			url: 'https://www.ziiodek.com/HOUND/console/PHP/loginDriver.php',
			type: "POST",
			data: {
				'driver_id':driverId
				
			},
			success: function(data){
				if(data == 0){
					alert('INCORRECT DRIVER ID');
				}else if(data == 1){
					window.location.href='MYTRIPS.php?driver='+driverId;
					
				}
				
			
				
			}
				
		});
		
	});
	
	
	getCurrentGeoLocation();
    console.log('Running cordova-' + cordova.platformId + '@' + cordova.version);
    document.getElementById('deviceready').classList.add('ready');
}
