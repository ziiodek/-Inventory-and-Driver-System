<?php
class Place{
	
function addPlace($name){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into place(name) values(?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('s',$name);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		return 0;
		

	
}	
	

function updatePlace($id,$name){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update place set name=? where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('si',$name,$id);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
}

function deletePlace($id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from place where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
	 	
}

function deleteAllPlace(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from place;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
	 	
}


function printPlaceList(){
		include ('utilities.php');
		include ('ADDRESS.php');
		

		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
		$address_manager = new Address();
		
		   
	  $query = "select * from place;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		$urlresolver = new UrlResolver();
		 while($row = $result->fetch_assoc()){
			$updatePlace__URL = $urlresolver->addCustomURLParameter("form","place","update","place",$row['id']);
			$deletePlace__URL = $urlresolver->generateActionURL("delete","place","place",$row['id']);
			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['name']."</td>";
			$address_manager->printAddressRow($row['id']);
			
			echo "<td scope='row'><a href='".$deletePlace__URL."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updatePlace__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='placesl[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
			
			echo "</tr>";
			$counter++;
				

				
				
				
				
		 }
		  
		  
	  

	
	
}


function printPlaceView($id){
	include ('utilities.php');
	include ('ADDRESS.php');


	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $address_manager = new Address();
	  
	  
	  $query = "select * from place where id=?;";
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
  echo "</div>";
	$address_manager->printAddressView($row['place_id']);
		
		}
	  
	
	
	
}

function getLastInsertedPlace(){
		include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  
	  
	  $query = "select id from place ORDER BY id DESC LIMIT 1;";
	 $stmt = $conn->prepare($query);
	
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){
				return $row['id'];
			 		 
		 }
		 
		 return null;
		
}



function printPlace($id){
	include ('utilities.php');
	include ('ADDRESS.php');

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  
	  
	  $query = "select * from place where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		$address_manager = new Address(); 
		 
		 if($row != null){
	echo "<div class='row'>";
    echo "<div class='col-sm-6'>";
	
	echo "<label>Name:</label>";
    echo "<input type='text' name='name' class='form-control' value='".$row['name']."' required>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
  $address_manager->printAddress($row['id']);
		}
	  	
}


function printPlaces(){
		include ('utilities.php');


	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select name from place;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		
		 
		 while($row = $result->fetch_assoc()){
			
			echo "<option value='".$row['name']."'>".$row['name']."</option>";		
		 }
	
}

}
?>