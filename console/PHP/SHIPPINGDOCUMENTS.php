<?php
class ShippingDocuments{
	
function addShippingDocuments($shipper_no,$file_name,$file_location){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into shipping_documents(shipper_no,file_name,file_location) values(?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('sss',$shipper_no,$file_name,$file_location);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		return 0;
		

	
}	
	

function deleteShippingDocument($id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from shipping_documents where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	return 0;
}

function deleteAllShippingDocuments($shipper_no){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from shipping_documents where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shipper_no);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	return 0;
}

function getFileLocation($id){
	echo $id;
	include ('utilities.php');
	$conn = mysqli_connect($host,$user,$pass);
	if(! $conn ){
		die('Could not connect: ' . mysqli_error());
	 }
  mysqli_select_db($conn,$database);
  $query = "select * from shipping_documents where id=?;";
 $stmt = $conn->prepare($query);
 $stmt->bind_param('i',$id);
  $stmt->execute();
   $result = $stmt->get_result();
	 while($row = $result->fetch_assoc()){
		return $row['file_location']."/".$row['file_name'];
							
	 }
}

function getShipperNo($id){
	include ('utilities.php');
	$conn = mysqli_connect($host,$user,$pass);
	if(! $conn ){
		die('Could not connect: ' . mysqli_error());
	 }
  mysqli_select_db($conn,$database);
  $query = "select shipper_no from shipping_documents where id=?;";
 $stmt = $conn->prepare($query);
 $stmt->bind_param('i',$id);
  $stmt->execute();
   $result = $stmt->get_result();
	 if($row = $result->fetch_assoc() != null){
		return $row['shipper_no'];
							
	 }
}

function printShippingDocumentsList($shipper_no,$action){
		include ('utilities.php');
	
		


		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from shipping_documents where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shipper_no);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		
		 while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['file_name']."</td>";
			echo "<td scope='row'><a href='../shipperDocuments/".$row['shipper_no']."/".$row['file_name']."'><i class='fas fa-eye'></i></a></td>";
			echo "<td scope='row'><a href='../php/delete_shippingDocuments.php?action=".$action."&file=".$row['id']."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><input name='filel[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
			
			echo "</tr>";
			$counter++;
								
		 }
		  
		  
	  

	
	
}

}
?>