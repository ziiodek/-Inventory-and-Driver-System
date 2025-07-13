<?php
class Brand{
	
function addBrand($name){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into brand(name) values(?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('s',$name);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		return 0;

	
}	
	

function updateBrand($id,$name){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update brand set name=? where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('si',$name,$id);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
}

function deleteBrand($id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from brand where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	 	
}

function deleteAllBrand(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from brand;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;	
}


function printBrandList(){
		include ('utilities.php');
		
		
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from brand;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		$urlresolver = new UrlResolver();
	
		 while($row = $result->fetch_assoc()){
			$updateBrand__URL = $urlresolver->addCustomURLParameter("form","brand","update","brand",$row['id']);
			$deleteBrand__URL = $urlresolver->generateActionURL("delete","brand","brand",$row['id']);
			$viewBrand__URL = $urlresolver->addCustomURLParameter("form","brand","view","brand",$row['id']);
			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['name']."</td>";
			echo "<td scope='row'><a href='".$deleteBrand__URL."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateBrand__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><a href='".$viewBrand__URL."&status=view'><i class='fas fa-eye'></i></a></td>";
			echo "<td scope='row'><input name='brandsl[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
			
			echo "</tr>";
			$counter++;
				

				
				
				
				
		 }
		  
		  
	  

	
	
}


function printBrandView($id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from brand where id=?;";
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

		
		}
	  
	
	
	
}





function printBrand($id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from brand where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){
	echo "<div class='row'>";
    echo "<div class='col'>";
	
	echo "<label>Brand Name:</label>";
    echo "<input type='text' name='name' class='form-control' value='".$row['name']."' required>";
    echo "</div>";
  echo "</div>";
 
		
		}
	  
	
	
	
}




function printBrands(){
		include ('utilities.php');


	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from brand;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		
		 
		 while($row = $result->fetch_assoc()){
			
			echo "<option value='".$row['id']."'>".$row['name']."</option>";
				

				
				
				
				
		 }
		 
		  
	  

	
	
}



function getBrand($id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "select name from brand where id=?;";
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