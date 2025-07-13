<?php
class Address{
	
function addAddress($place_id,$country,$state,$city,$street,$zip_code,$countryId){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into address(place_id,country,countryId,state,city,street,zip_code) values(?,?,?,?,?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('isissss',$place_id,$country,$countryId,$state,$city,$street,$zip_code);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		return 0;
		

	
}	
	

function updateAddress($place_id,$country,$state,$city,$street,$zip_code,$countryId){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update address set country=?,countryId=?,state=?,city=?,street=?,zip_code=? where place_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('sissssi',$country,$countryId,$state,$city,$street,$zip_code,$place_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close();
	 return 0; 
}

function deleteAddress($place_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from address where place_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$place_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	 	
}

function deleteAllAddress(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from address;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	return 0;
}


function printAddressView($place_id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from address where place_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$place_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){
	echo "<div class='row'>";
    echo "<div class='col'>";
	echo "<select name='country' class='form-control' disabled>";
	echo "<option value='".$row['country']."'>";
	echo $row['country'];
	echo "</option>";
	echo "</select>";
    echo "</div>";
	echo "<div class='col'>";
	echo "<select name='state' class='form-control' disabled>";
	echo "<option value='".$row['state']."'>";
	echo $row['state'];
	echo "</option>";
	echo "</select>";
	echo "</div>";
	echo "</div>";

	echo "<div class='row'>";
	echo "<div class='col'>";
	echo "<input name='street' type='text' value='".$row['street']."' class='form-control' disabled>";
	
	echo "</div>";
	echo "<div class='col'>";
	echo "<input name='city' type='text' value='".$row['city']."' class='form-control' disabled>";
	echo "</div>";
	echo "</div>";
	
	echo "<div class='row'>";
	echo "<div class='col-sm-6'>";
	echo "<input name='zip' type='text' value='".$row['zip_code']."' class='form-control' disabled>";
	echo "</div>";
	
	echo "</div>";
	
		}
	  
	
	$conn->close();
	return 0;
	
}

function printAddressRow($place_id){
		include ('utilities.php');
		

	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from address where place_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$place_id);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		 while($row = $result->fetch_assoc()){
			
			echo "<td scope='row'>".$row['country']."</td>";
			echo "<td scope='row'>".$row['state']."</td>";
			echo "<td scope='row'>".$row['city']."</td>";
		    echo "<td scope='row'>".$row['street']."</td>";
			echo "<td scope='row'>".$row['zip_code']."</td>";
			}
		  
		  
	  

	
	
}


function printAddress($place_id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from address where place_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$place_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){


	echo "<input type='hidden' name='selectedCountryId' value='".$row['countryId']."' id='selectedCountryId'>";
	echo "<input type='hidden' name='selectedCountryName' id='selectedCountryName'>";
	echo "<div class='row'>";
    echo "<div class='col'>";
	echo "<label>Country:</label>";
	echo "<select name='country' class='form-control' id='country' required>";
	echo "<option value='".$row['countryId']."'>";
	echo $row['country'];
	echo "</option>";
	echo "</select>";
    echo "</div>";
	echo "<div class='col'>";
	echo "<label>State:</label>";
	echo "<select name='state' class='form-control' id='state' required>";
	echo "<option value='".$row['state']."'>";
	echo $row['state'];
	echo "</option>";
	echo "</select>";
	echo "</div>";
	echo "</div>";
	echo "<br>";

	echo "<div class='row'>";
	echo "<div class='col'>";
	echo "<label>Street:</label>";
	echo "<input name='city' type='text' value='".$row['city']."' class='form-control' required>";
	echo "</div>";
	echo "<div class='col'>";
	echo "<label>City:</label>";
	echo "<input name='street' type='text' value='".$row['street']."'class='form-control' required>";
	echo "</div>";
	echo "</div>";
	echo "<br>";
	echo "<div class='row'>";
	echo "<div class='col-sm-6'>";
	echo "<label>Zip Code:</label>";
	echo "<input name='zip' type='text' value='".$row['zip_code']."' class='form-control' required>";
	echo "</div>";
	echo "</div>";

 
		
		}
	  
	
	
	
}


}
?>