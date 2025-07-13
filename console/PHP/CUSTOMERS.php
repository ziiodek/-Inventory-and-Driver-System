<?php
class Customer{
	
function addCustomer($customer_id,$name,$street,$city,$state,$zip,$country,$countryId){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into customers(customer_id,name,street,city,state,zip,country,countryId) values(?,?,?,?,?,?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('sssssisi',$customer_id,$name,$street,$city,$state,$zip,$country,$countryId);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		return 0;
		

	
}	
	

function updateCustomer($customer_id,$name,$street,$city,$state,$zip,$country,$countryId){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update customers set name=?,street=?,city=?,state=?,zip=?,country=?,countryId=? where customer_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('ssssisis',$name,$street,$city,$state,$zip,$country,$countryId,$customer_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
}

function deleteCustomer($customer_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from customers where customer_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$customer_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close();
	 return 0; 
	 	
}

function deleteAllCustomers(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from customers;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	 	
}


function printCustomerList(){
		include ('utilities.php');
		


	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from customers;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		$urlresolver = new UrlResolver();

		 while($row = $result->fetch_assoc()){
			$updateCustomer__URL = $urlresolver->addCustomURLParameter("form","customer","update","customer",$row['customer_id']);
		
			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['customer_id']."</td>";
			echo "<td scope='row'>".$row['name']."</td>";
			echo "<td scope='row'>".$row['country']."</td>";
			echo "<td scope='row'>".$row['state']."</td>";
			echo "<td scope='row'>".$row['city']."</td>";
			echo "<td scope='row'>".$row['street']."</td>";
			echo "<td scope='row'>".$row['zip']."</td>";
			echo "<td scope='row'><a href='../php/delete_customer.php?customer=".$row['customer_id']."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateCustomer__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='customersl[]' class='form-check-input' type='checkbox' value='".$row['customer_id']."' ></td>";
			
			echo "</tr>";
			$counter++;
				

				
				
				
				
		 }
		  
		  
	  

	
	
}


function printCustomerView($customer_id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from customers where customer_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$customer_id);
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





function printCustomer($customer_id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from customers where customer_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$customer_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){
	echo "<div class='row'>";
    echo "<div class='col-sm-6'>";
	echo "<input type='hidden' name='selectedCountryId' id='selectedCountryId'>";
	echo "<input type='hidden' name='selectedCountryName' id='selectedCountryName'>";
	echo "<label>Company Name:</label>";
    echo "<input type='text' name='name' class='form-control' value='".$row['name']."' required>";
    echo "</div>";
	echo "</div>";
	echo "<br>";
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
   echo "<label>City:</label>";
   echo "<input type='text' name='city' class='form-control' value='".$row['city']."' required>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<label>Street Name:</label>";
	echo "<input type='text' name='street' class='form-control' value='".$row['street']."' required>";
echo "</div>";
echo "</div>";
echo "<br>";
echo "<div class='row'>";
echo "<div class='col-sm-6'>";
echo "<label>Zip Code:</label>";
echo "<input type='number' name='zip' class='form-control' value='".$row['zip']."' required>";
echo "</div>";
echo "</div>";
		
			 
		
		}
	  
	
	
	
}




function printCustomers(){
		include ('utilities.php');


	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select customer_id,name from customers;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		
		 
		 while($row = $result->fetch_assoc()){
			
			echo "<option value='".$row['customer_id']."'>".$row['name']."</option>";
				

				
				
				
				
		 }
		 
		  
	  

	
	
}



function getCustomer($customer_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "select name from customers where customer_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$customer_id);
	 $stmt->execute();
	 
	 $result = $stmt->get_result();
		
		while($row = $result->fetch_assoc()){
			
			return $row['name'];
			 
			 
		 }
	 
	 
	 $stmt->close(); 
	 	
}


}
?>