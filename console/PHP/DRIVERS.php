<?php
include "CRYPTO.php";

class Driver{
	
private $Crypto;
function __construct(){
	$this->Crypto = new Crypto();
}

function addDriver($driver_id,$name,$lastname,$driver_license,$passport,$phone_number,$license_type){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);

	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into driver(driver_id,name,lastname,driver_license,passport,phone_number,license_type) values(?,?,?,?,?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('issssss',$driver_id,$name,$lastname,$driver_license,$passport,$phone_number,$license_type);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		return 0;
		

	
}	
	

function updateDriver($driver_id,$name,$lastname,$driver_license,$passport,$phone_number,$license_type){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update driver set name=?,lastname=?,driver_license=?,passport=?,phone_number=?,license_type=? where driver_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('ssssssi',$name,$lastname,$driver_license,$passport,$phone_number,$license_type,$driver_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
}

function deleteDriver($driver_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from driver where driver_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$driver_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	 	
}

function deleteAllDriver(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from driver;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
	 	
}

function printDriverList(){
		include ('utilities.php');

		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from driver;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		$urlresolver = new UrlResolver();

		 while($row = $result->fetch_assoc()){
			$updateDriver__URL = $urlresolver->addCustomURLParameter("form","driver","update","driver",$row['driver_id']);
			$viewDriver__URL = $urlresolver->addCustomURLParameter("form","driver","view","driver",$row['driver_id']);
			$deleteDriver__URL = $urlresolver->generateActionURL("delete","driver","driver",$row['driver_id']);

			$fields = "{'name':'".$row['name']."','lastname':'".$row['lastname']."','phone':'".$row['phone_number']."','license':'".$row['driver_license']."','license_type':'".$row['license_type']."','passport':'".$row['passport']."'}";
			$resultDecrypted = $this->Crypto->decryptData($fields);
		
			
			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['driver_id']."</td>";
			echo "<td scope='row'>".$resultDecrypted['data']['name']."</td>";
			echo "<td scope='row'>".$resultDecrypted['data']['lastname']."</td>";
			echo "<td scope='row'>".$resultDecrypted['data']['license']."</td>";
			echo "<td scope='row'>".$resultDecrypted['data']['license_type']."</td>";
			echo "<td scope='row'>".$resultDecrypted['data']['passport']."</td>";
			echo "<td scope='row'>".$resultDecrypted['data']['phone']."</td>";
			echo "<td scope='row'><a href='".$deleteDriver__URL."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateDriver__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><a href='".$viewDriver__URL."&status=view'><i class='fas fa-eye'></i></a></td>";
			echo "<td scope='row'><input name='driversl[]' class='form-check-input' type='checkbox' value='".$row['driver_id']."' ></td>";
			
			echo "</tr>";
			$counter++;
				

				
				
				
				
		 }
		  
		  
	  

	
	
}



function printDriver($driver_id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from driver where driver_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$driver_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){
		$fields = "{'name':'".$row['name']."','lastname':'".$row['lastname']."','phone':'".$row['phone_number']."','license':'".$row['driver_license']."','license_type':'".$row['license_type']."','passport':'".$row['passport']."'}";
		$resultDecrypted = $this->Crypto->decryptData($fields);

	echo "<div class='row'>";
    echo "<div class='col'>";
	echo "<label>Name:</label>";
    echo "<input type='text' name='name' class='form-control' value='".$resultDecrypted['data']['name']."' required>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<label>Last Name:</label>";
    echo "<input type='text' name='lastname' class='form-control' value='".$resultDecrypted['data']['lastname']."' required>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
   echo "<div class='row'>";
   echo "<div class='col'>";
   echo "<label>Phone Number:</label>";
    echo "<input type='text' name='phone' class='form-control' value='".$resultDecrypted['data']['phone']."' required>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<label>License Number:</label>";
	 echo "<input type='text' name='license' class='form-control' value='".$resultDecrypted['data']['license']."' required>";
	echo "</div>";
echo "</div>";
echo "<br>";

echo "<div class='row'>";
echo "<div class='col'>";
echo "<label>License Type:</label>";
echo " <select name='license_type' class='form-control' required>";
echo "<option value='".$resultDecrypted['data']['license_type']."'>".$resultDecrypted['data']['license_type']."</option>";
echo "<option value='Class M'>Class M</option>";
echo "<option value='Class C'>Class C</option>";
echo "<option value='Class B'>Class B</option>";
echo "<option value='Class A'>Class A</option>";
echo "<option value='Class C CDL'>Class C CDL</option>";
echo "<option value='Class B CDL'>Class B CDL</option>";
echo "<option value='Class A CDL'>Class A CDL</option>";
echo "</select>";
echo "</div>";
echo "<div class='col'>";
echo "<label>Passport:</label>";
echo "<input type='text' name='passport' class='form-control' value='".$resultDecrypted['data']['passport']."' required>";
echo "</div>";



echo "</div>";



		
			 
		
		}
	  
	
	
	
}


function printDriverView($driver_id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from driver where driver_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$driver_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){


		echo "<div class='row'>";
    echo "<div class='col-sm-6'>";
	echo "<label style='color:white;'>Driver Id:</label><br>";
    echo "<input type='text' name='name' class='form-control' value='".$row['driver_id']."' disabled>";
    echo "</div>";
  echo "</div>";
  echo "<br>";

	echo "<div class='row'>";
    echo "<div class='col'>";
	echo "<label style='color:white;'>Name:</label><br>";
    echo "<input type='text' name='name' class='form-control' value='".$row['name']."' disabled>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<label style='color:white;'>Lastname:</label><br>";
    echo "<input type='text' name='lastname' class='form-control' value='".$row['lastname']."' disabled>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
   echo "<div class='row'>";
   echo "<div class='col'>";
   echo "<label style='color:white;'>Phone:</label><br>";
    echo "<input type='text' name='phone' class='form-control' value='".$row['phone_number']."' disabled>";
    echo "</div>";
    echo "<div class='col'>";
	 echo "<label style='color:white;'>Driver License:</label><br>";
	 echo "<input type='text' name='license' class='form-control' value='".$row['driver_license']."' disabled>";
	echo "</div>";
echo "</div>";
echo "<br>";

echo "<div class='row'>";
echo "<div class='col'>";
echo "<label style='color:white;'>License Type:</label><br>";
echo " <select name='license_type' class='form-control' disabled>";
echo "<option value='".$row['license_type']."'>".$row['license_type']."</option>";
echo "</select>";
echo "</div>";
echo "<div class='col'>";
echo "<label style='color:white;'>Passport:</label><br>";
echo "<input type='text' name='passport' class='form-control' value='".$row['passport']."' disabled>";
echo "</div>";



echo "</div>";
		}	
}


function printDrivers(){
		include ('utilities.php');


	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select driver_id,name,lastname from driver;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		
		 while($row = $result->fetch_assoc()){
			$fields = "{'name':'".$row['name']."','lastname':'".$row['lastname']."'}";
			$resultDecrypted = $this->Crypto->decryptData($fields);
			print_r($resultDecrypted);
			echo "<option value='".$row['driver_id']."'>".$resultDecrypted['data']['name']." ".$resultDecrypted['data']['lastname']."</option>";
				

				
				
				
				
		 }
		  
		  
	  

	
	
}




function getDriver($driver_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "select name,lastname from driver where driver_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$driver_id);
	 $stmt->execute();
	 
	 $result = $stmt->get_result();
		
	while($row = $result->fetch_assoc()){
		$fields = "{'name':'".$row['name']."','lastname':'".$row['lastname']."'}";
		$resultDecrypted = $this->Crypto->decryptData($fields);
		return $resultDecrypted['data']['name']." ".$resultDecrypted['data']['lastname'];
			 
			 
	}
	 
	 $stmt->close(); 
	 	
}



function checkDriverId($driver_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $exists = 0;
	  
	  $query = "select driver_id from driver where driver_id=?;";
	   $stmt = $conn->prepare($query);
		 $stmt->bind_param('i',$driver_id);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		
		 if($row == null){
			  $stmt->close();
			  $exists = 0;
		 
		 }else {
			 
			 $exists = 1;
		 }
	
	
		return $exists; 

	
}



}
?>
