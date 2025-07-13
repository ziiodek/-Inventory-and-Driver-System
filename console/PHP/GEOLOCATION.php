<?php
class Geolocation{
	
function addLocation($driver_id,$latitude,$longitude,$altitude,$accuracy,$altitude_accuracy,$heading,$speed,$timestamp){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  
	  $query = "insert into geolocation(driver_id,latitude,longitude,altitude,accuracy,altitude_accuracy,heading,speed,timestamp) values(?,?,?,?,?,?,?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('isssssss',$driver_id,$latitude,$longitude,$altitude,$accuracy,$altitude_accuracy,$heading,$speed,$timestamp);
		$stmt->execute();
		$stmt->close();
		

	
}	
	


function updateLocation($driver_id,$latitude,$longitude){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  
	  $query = "update geolocation set latitude=?,longitude=? where driver_id=?;";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('ssi',$latitude,$longitude,$driver_id);
		$stmt->execute();
		$stmt->close();
		

	
}



function initCoordinatesFile(){
	
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  
	  $query = "select driver_id,latitude,longitude from geolocation;";
	   $stmt = $conn->prepare($query);
	
		 $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		 $src = 'C:/xampp/htdocs/ZIIODEK/HOUND/console/js/coordinates.js';
		 
		 $string  = 'var coordinates = [';	

		
		 
		 
		 while($row = $result->fetch_assoc()){
			
			$query = "select name,lastname from driver where driver_id=?;";
	   $stmt = $conn->prepare($query);
	$stmt->bind_param('i',$row['driver_id']);
		 $stmt->execute();
	   $result2 = $stmt->get_result();
			$row2 = $result2->fetch_assoc();
			
			$name = $row2['name'].' '.$row2['lastname'];
			
			$string = $string.'["'.$name.'",'.$row['longitude'].','.$row['latitude'].'],';
			
		 }
	
		$string = $string.'];';
	
		
	
	file_put_contents($src, $string);	
}

function setInterval($f, $milliseconds){
       $seconds=(int)$milliseconds/1000;
       while(true)
       {
           $f();
           sleep($seconds);
       }
}

}




?>