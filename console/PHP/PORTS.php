<?php
class Port{
	
function addPort($name,$street,$city,$state,$zip,$country,$countryId){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into ports(name,street,city,state,country,countryId,zip) values(?,?,?,?,?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('sssssii',$name,$street,$city,$state,$country,$countryId,$zip);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		return 0;
			
}	
	

function updatePort($id,$name,$street,$city,$state,$zip,$country,$countryId){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update ports set name=?,street=?,city=?,state=?,country=?,countryId=?,zip=? where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('ssssssii',$name,$street,$city,$state,$country,$countryId,$zip,$id);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
}

function deletePort($id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from ports where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
	 	
}

function deleteAllPorts(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from ports;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	 	
}


function printPortList(){
		include ('utilities.php');
		
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from ports;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		$urlresolver = new UrlResolver();
		 while($row = $result->fetch_assoc()){
			$updatePort__URL = $urlresolver->addCustomURLParameter("form","port","update","port",$row['id']);
			$deletePort__URL = $urlresolver->generateActionURL("delete","port","port",$row['id']);

			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['name']."</td>";
			echo "<td scope='row'>".$row['street']."</td>";
			echo "<td scope='row'>".$row['city']."</td>";
			echo "<td scope='row'>".$row['state']."</td>";
			echo "<td scope='row'>".$row['country']."</td>";
			echo "<td scope='row'>".$row['zip']."</td>";
			echo "<td scope='row'><a href='".$deletePort__URL."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updatePort__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='portsl[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
			
			echo "</tr>";
			$counter++;
				

				
				
				
				
		 }
		  
}



function printPortView($id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from ports where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){
	echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<input type='text' name='name' class='form-control' value='".$row['name']."' disabled>";
    echo "</div>";
    echo "<div class='col'>";
    echo "<input type='text' name='street' class='form-control' value='".$row['street']."' disabled>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
   echo "<div class='row'>";
   echo "<div class='col'>";
    echo "<input type='text' name='city' class='form-control' value='".$row['city']."' disabled>";
    echo "</div>";
    echo "<div class='col'>";
    echo "<select name='state' class='form-control' disabled>";
	echo "<option value='".$row['state']."'>".$row['state']."</option>";
	echo "</select>";
	echo "</div>";
	echo "</div>";
	echo "<br>";
	echo "<div class='row'>";
	echo "<div class='col-sm-6'>";
	echo "<input type='number' name='zip' class='form-control' value='".$row['zip']."' disabled>";
	echo "</div>";
	echo "</div>";
		
			 
		
		}
	  
	
	
	
}



function printPort($id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from ports where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){
	echo "<input type='hidden' name='selectedCountryId' value='".$row['countryId']."' id='selectedCountryId'>";
	echo "<input type='hidden' name='selectedCountryName' id='selectedCountryName'>";		
	echo "<div class='row'>";
    echo "<div class='col'>";
	echo "<label>Port of Entry Name:</label>";
    echo "<input type='text' name='name' class='form-control' value='".$row['name']."' required>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<label>Country:</label>";
	echo "<select name='country' class='form-control' id='country' required>";
	echo "<option value='".$row['countryId']."'>".$row['country']."</option>";
	echo "</select>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
   echo "<div class='row'>";
   echo "<div class='col'>";
   echo "<label>State:</label>";
	echo "<select name='state' class='form-control' id='state' required>";
	echo "<option value='".$row['state']."'>".$row['state']."</option>";
	echo "</select>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<label>City:</label>";
	echo "<input type='text' name='city' class='form-control' value='".$row['city']."' required>";
	echo "</div>";
	echo "</div>";
	echo "<br>";
echo "<div class='row'>";
echo "<div class='col'>";
echo "<label>Street Name:</label>";
echo "<input type='text' name='street' class='form-control' value='".$row['street']."' required>";;
echo "</div>";
echo "<div class='col'>";
echo "<label>Zip Code:</label>";
echo "<input type='number' name='zip' class='form-control' value='".$row['zip']."' required>";
echo "</div>";
echo "</div>";
		
			 
		
		}
	  
	
	
	
}



function printPorts(){
		include ('utilities.php');


	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select id,name from ports;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 while($row = $result->fetch_assoc()){
			
			echo "<option value='".$row['id']."'>".$row['name']."</option>";
				

				
				
				
				
		 }
	
		  
	  

	
	
}


function getPort($id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  
	  
	  
	 $query = "select name from ports where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	 $stmt->execute();
	 
	 $result = $stmt->get_result();
		
		while($row = $result->fetch_assoc()){
			
			return $row['name'];
			 
			 
		 }
	 
	 
	 
	 $stmt->close(); 
	 
	 
	 
	 
	 	
}




}
?>