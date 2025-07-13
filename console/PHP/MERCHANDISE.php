<?php
class Merchandise{
	
function addMerchandise($name,$description,$brand){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into merchandise(name,description,brand) values(?,?,?);";
	  $stmt = $conn->prepare($query);
	  $stmt->bind_param('ssi',$name,$description,$brand);
	  $stmt->execute();
	  $stmt->close();
	  $conn->close();
	   return 0;
		

	
}	
	

function updateMerchandise($id,$name,$description,$brand){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update merchandise set name=?,description=?,brand=? where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('sssi',$name,$description,$brand,$id);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
}

function deleteMerchandise($id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from merchandise where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
	 	
}

function deleteAllMerchandise(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from merchandise;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close();
	 return 0; 
	 	
}


function printMerchandiseList(){
		include ('utilities.php');
		//include 'BRAND.php';
		


		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from merchandise;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		 $brand_manager = new Brand();
		 
		
		 $urlresolver = new UrlResolver();
		 while($row = $result->fetch_assoc()){
			$updateMerchandise__URL = $urlresolver->addCustomURLParameter("form","merchandise","update","merchandise",$row['id']);
			$deleteMerchandise__URL = $urlresolver->generateActionURL("delete","merchandise","merchandise",$row['id']);
			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['name']."</td>";
			echo "<td scope='row'>".$brand = $brand_manager->getBrand($row['brand'])."</td>";
			echo "<td scope='row'>".$row['description']."</td>";
			echo "<td scope='row'><a href='".$deleteMerchandise__URL."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateMerchandise__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='merchandisel[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
			
			echo "</tr>";
			$counter++;
				

				
				
				
				
		 }
		  
		  
	  

	
	
}


function printMerchandiseView($id){
	include ('utilities.php');
	include ('BRAND.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from merchandise where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 $brand_manager = new Brand();
		 
		 
		 if($row != null){
	echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<input type='text' name='name' class='form-control' value='".$row['name']."' disabled>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<select name='brand' class='form-control' disabled>";
	echo "<option value='".$row['brand']."'>";
	$brand_manager->getBrand($row['brand']);
	echo "</option>";
	$brand_manager->printBrands();
	echo "</select>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
   echo "<div class='row'>";
   echo "<div class='col'>";
   
   echo "<textarea name='description' rows='4' cols='50' name='comments' class='form-control' disabled>";
	echo $row['description'];
	echo "</textarea>";
    echo "</div>";

echo "</div>";

		
			 
		
		}
	  
	
	
	
}





function printMerchandise($id){
	include ('utilities.php');
	include 'BRAND.php';
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from merchandise where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 
		 if($row != null){
			 
			 $brand_manager = new Brand();
			 
			 
			echo "<div class='row'>";
    echo "<div class='col'>";
	echo "<label>Merchandise Name:</label>";
    echo "<input type='text' name='name' class='form-control' value='".$row['name']."' required>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<label>Brand Name:</label>";
	echo "<select name='brand' class='form-control' required>";
	echo "<option value='".$row['brand']."'>";
	echo $brand_manager->getBrand($row['brand']);
	echo "</option>";
	$brand_manager->printBrands();
	echo "</select>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
   echo "<div class='row'>";
   echo "<div class='col-sm-6'>";
   echo "<label>Description:</label>";
   echo "<textarea name='description' rows='4' cols='50' name='comments' class='form-control' required>";
	echo $row['description'];
	echo "</textarea>";
    echo "</div>";

echo "</div>";
			 
		
		}
	  
	
	
	
}




function printMerchandiseOptions(){
		include ('utilities.php');


	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select id,name from merchandise;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		
		 
		 while($row = $result->fetch_assoc()){
			
			echo "<option value='".$row['id']."'>".$row['name']."</option>";
				

				
				
				
				
		 }
		 
		  
	  

	
	
}



function getMerchandise($id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "select name from merchandise where id=?;";
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