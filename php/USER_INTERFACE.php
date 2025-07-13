<?php
class UserInterface{
	
function printPorfile($user_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $exists = 0;
	  
	  $query = "select name,lastname,user_id,email,phone from user where email=?;";
	   $stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$user_id);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 
		
		while($row = $result->fetch_assoc()){
			echo "<div class='info-section'>";
			echo "<label>Name:</label><br>";
			echo "<input type='text' name='city' value='".$row['name']."' class='form-control' disabled>";
			echo "<label>Lastname:</label><br>";
			echo "<input type='text' name='name' value='".$row['lastname']."' class='form-control' disabled>";
			echo "<label>Phone Number:</label><br>";
			echo "<input type='text' name='name' value='".$row['phone']."' class='form-control' disabled>";
			echo "<label>Email Address:</label><br>";
			echo "<input type='text' name='name' value='".$row['email']."' class='form-control' disabled>";
			echo "</div>";
				
		}
}


function printProfilesPanel(){
		include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $exists = 0;
	  
	  $query = "select name,lastname,user_id,email,phone from user;";
	   $stmt = $conn->prepare($query);
	   //$stmt->bind_param('s',$user_id);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 
		
		while($row = $result->fetch_assoc()){
			echo "<div class='info-section'>";
			echo "<label>Name:</label><br>";
			echo "<input type='text' name='city' value='".$row['name']."' class='form-control' disabled>";
			echo "<label>Lastname:</label><br>";
			echo "<input type='text' name='name' value='".$row['lastname']."' class='form-control' disabled>";
			echo "<label>Phone Number:</label><br>";
			echo "<input type='text' name='name' value='".$row['phone']."' class='form-control' disabled>";
			echo "<label>Email Address:</label><br>";
			echo "<input type='text' name='name' value='".$row['email']."' class='form-control' disabled>";
			echo "</div>";
				
		}
	
	
}	
	
function getName($user_id){
			include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $exists = 0;
	  
	  $query = "select name from user where user_id=?;";
	   $stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$user_id);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 
		
		while($row = $result->fetch_assoc()){
			return $row['name'];
			
			
			
		}
	
	
}	

function getLastName($user_id){
			include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $exists = 0;
	  
	  $query = "select lastname from user where user_id=?;";
	   $stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$user_id);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 
		
		while($row = $result->fetch_assoc()){
			return $row['lastname'];
			
			
			
		}
	
	
}	

function getPhone($user_id){
		include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $exists = 0;
	  
	  $query = "select phone from user where user_id=?;";
	   $stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$user_id);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 
		
		while($row = $result->fetch_assoc()){
			return $row['phone'];
			
			
			
		}
	
}
	
function searchByEmail($email){
include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $exists = 0;
	  $email = strtoupper($email);
	  $query = "select name,lastname,user_id,email,phone from user where email=?;";
	   $stmt = $conn->prepare($query);
	   $stmt->bind_param('s',$email);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 
		while($row = $result->fetch_assoc()){
			echo "<div class='info-section'>";
			echo "<label>Name:</label><br>";
			echo "<input type='text' name='city' value='".$row['name']."' class='form-control' disabled>";
			echo "<label>Lastname:</label><br>";
			echo "<input type='text' name='name' value='".$row['lastname']."' class='form-control' disabled>";
			echo "<label>Phone Number:</label><br>";
			echo "<input type='text' name='name' value='".$row['phone']."' class='form-control' disabled>";
			echo "<label>Email Address:</label><br>";
			echo "<input type='text' name='name' value='".$row['email']."' class='form-control' disabled>";
			echo "</div>";
				
		}
		
	
	
	
	
}	
	
function getEmailAddress($user_id){
		include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $exists = 0;
	  
	  $query = "select email from user where user_id=?;";
	   $stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$user_id);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 
		
		while($row = $result->fetch_assoc()){
			return $row['email'];
			
			
			
		}
	
}
	
}
?>