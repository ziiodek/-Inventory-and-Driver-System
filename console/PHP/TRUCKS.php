<?php
//include('CRYPTO.php');

class Truck{

	//private $Crypto;
	function __construct(){
		//$this->Crypto = new Crypto();
	}	
	
function addTruck($truck_id,$plates,$state,$model,$vin,$country,$countryId){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into truck(truck_id,plate_number,state,model,vin_number,country,countryId) values(?,?,?,?,?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('isssssi',$truck_id,$plates,$state,$model,$vin,$country,$countryId);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		return 0;

	
}	
	

function updateTruck($truck_id,$plates,$state,$model,$vin,$country,$countryId){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update truck set plate_number=?,state=?,model=?,vin_number=?,country=?,countryId=? where truck_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('sssssii',$plates,$state,$model,$vin,$country,$countryId,$truck_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close();
	 return 0; 
}

function deleteTruck($truck_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from truck where truck_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$truck_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	 	
}

function deleteAllTruck(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from truck;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close();
	 return 0; 
	 	
}


function printTruckList(){
		include ('utilities.php');
		
		
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from truck;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		$urlresolver = new UrlResolver();
		 while($row = $result->fetch_assoc()){
			$updateTruck__URL = $urlresolver->addCustomURLParameter("form","truck","update","truck",$row['truck_id']);
			$deleteTruck__URL = $urlresolver->generateActionURL("delete","truck","truck",$row['truck_id']);
			//$fields = "{'model':'".$row['model']."','vin_number':'".$row['vin_number']."','plate_number':'".$row['plate_number']."','country':'".$row['country']."','state':'".$row['state']."'}";
			//$resultDecrypted = $this->Crypto->decryptData($fields);

			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['truck_id']."</td>";
			echo "<td scope='row'>".$row['model']."</td>";
			echo "<td scope='row'>".$row['vin_number']."</td>";
			echo "<td scope='row'>".$row['plate_number']."</td>";
			echo "<td scope='row'>".$row['country']."</td>";
			echo "<td scope='row'>".$row['state']."</td>";
			echo "<td scope='row'><a href='".$deleteTruck__URL."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateTruck__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='trucksl[]' class='form-check-input' type='checkbox' value='".$row['truck_id']."' ></td>";
			
			echo "</tr>";
			$counter++;
				

				
				
				
				
		 }
		  $conn->close();
		  return 0;
	  

	
	
}


function printTruckView($truck_id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from truck where truck_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$truck_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){


	echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<input type='text' name='vin' class='form-control' value='".$row['vin_number']."' disabled>";
    echo "</div>";
    echo "<div class='col'>";
    echo "<input type='text' name='model' class='form-control' value='".$row['model']."' disabled>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
   echo "<div class='row'>";
     echo "<div class='col'>";
	 echo "<input type='text' name='plates' class='form-control' value='".$row['plate_number']."' disabled>";
	echo "</div>";

echo "<div class='col-sm'>";
echo "<select name='state' class='form-control' disabled>";
echo "<option value='".$row['state']."'>".$row['state']."</option>";
echo "</select>";
echo "</div>";
   

  
echo "</div>";




		
			 
		
		}
	  
	
	
	
}


function printTruck($truck_id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from truck where truck_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$truck_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){
			//$fields = "{'model':'".$row['model']."','vin_number':'".$row['vin_number']."','plate_number':'".$row['plate_number']."','country':'".$row['country']."','state':'".$row['state']."'}";
			//$resultDecrypted = $this->Crypto->decryptData($fields);

	echo "<div class='row'>";
    echo "<div class='col'>";
	echo "<label>VIN Number:</label>";
	echo "<input type='hidden' name='selectedCountryId' value='".$row['countryId']."' id='selectedCountryId'>";
	echo "<input type='hidden' name='selectedCountryName' id='selectedCountryName'>";
    echo "<input type='text' name='vin' class='form-control' value='".$row['vin_number']."' required>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<label>Model:</label>";
    echo "<input type='text' name='model' class='form-control' value='".$row['model']."' required>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
   echo "<div class='row'>";
     echo "<div class='col'>";
	 echo "<label>Plate No:</label>";
	 echo "<input type='text' name='plates' class='form-control' value='".$row['plate_number']."' required>";
	echo "</div>";
echo "<div class='col'>";
echo "<label>Country:</label>";
echo "<select name='country' class='form-control' id='country' required>";
echo "</select>";
echo "</div>";
echo "</div>";
echo "<br>";
echo "<div class='row'>";
echo "<div class='col-sm-6'>";
echo "<label>State:</label>";
echo "<select name='state' class='form-control' id='state' required>";
echo "<option value='".$row['state']."'>";
echo $row['state'];
echo "</option>";
echo "</select>";
echo "</div>";
echo "</div>";
		}
	  
	$conn->close();
	return 0;
	
	
}


function printTrucks(){
		include ('utilities.php');


	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select truck_id from truck;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		 
		 
		 while($row = $result->fetch_assoc()){
			
			echo "<option value='".$row['truck_id']."'>".$row['truck_id']."</option>";
				

				
				
				
				
		 }
		  
		  
	  

	
	
}





}
?>