<?php
class ShippingStatus{
	
function addShippingStatus($shipper_no,$date,$origin,$destiny){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  
	  $arrive_hour = '00:00';
	  $departour_hour = '00:00';
	  $status = 'Processing';
	  
	  $query = "insert into shipping_status(shipper_no,date,arrive_hour,origin,destiny,departour_hour,status) values(?,?,?,?,?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('sssssss',$shipper_no,$date,$arrive_hour,$origin,$destiny,$departour_hour,$status);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		return 0;
		

	
}	
	

function updateShippingStatus($shipper_no,$date,$origin,$destiny){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update shipping_status set date=?,origin=?,destiny=? where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('ssss',$date,$origin,$destiny,$shipper_no);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close();
	 return 0; 
}


function printShipping($shipper_no){
	include ('utilities.php');
	include ('PLACE.php');

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from shipping_status where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shipper_no);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		  
		 if($row != null){
			 	
	echo "<div class='row'>";
	echo "<div class='col-sm-6'>";
	echo "<label>Date:</label>";
	echo "<input type='date' name='date' class='form-control' value='".$row['date']."' required>";
	echo "</div>";
	echo "</div>";

	echo "<br>";	
	echo "<div class='row'>";
	echo "<div class='col'>";
	echo "<label>Origin:</label>";
	echo "<select name='origin' class='form-control' required>";
	echo "<option value='".$row['origin']."'>".$row['origin']."</option>";
	$place_manager = new Place();
	$place_manager->printPlaces();
	echo "</select>";

	echo "</div>";

	echo "<div class='col'>";
	echo "<label>Destiny:</label>";
	echo "<select name='destiny' class='form-control' required>";

	echo "<option value='".$row['destiny']."'>".$row['destiny']."</option>";
	$place_manager->printPlaces();
	echo "</select>";

echo "</div>";
echo "</div>";

	}
	
	
	
}

function deleteShippingStatus($shipping_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from shipping_status where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$shipping_id);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
	 	
}

function deleteAllShippingStatus(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from shipping_status;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close();
	 return 0; 
	 	
}


function printShippingStatusList(){
		include ('utilities.php');
		include ('UI/URLRESOLVER.php');
		
		
		
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	
	   $query = "select * from shipping_status;";
	   $stmt = $conn->prepare($query);
	   $stmt->execute();
	   $result = $stmt->get_result();
	   $counter = 1;
		 

		  $urlresolver = new UrlResolver();
		 while($row = $result->fetch_assoc()){
			 
			$updateShipping__URL = $urlresolver->addCustomURLParameter("form","shipping","update","shipper_no",$row['shipper_no']);
			echo "<tr>";
			echo "<td scope='row'>".$counter."</td>";
			echo "<th scope='row'><a href='".$updateShipping__URL."'>".$row['shipper_no']."</a></th>";
			echo "<td scope='row'>".$row['date']."</td>";
			echo "<td scope='row'>".$row['origin']."</td>";
			echo "<td scope='row'>".$row['destiny']."</td>";
			echo "<td scope='row'>".$row['departour_hour']."</td>";
			echo "<td scope='row'>".$row['arrive_hour']."</td>";
			echo "<td scope='row'>".$row['status']."</td>";
			echo "<td scope='row'>".$row['delivered']."</td>";
			echo "<td scope='row'>".$row['CBP']."</td>";
			
			
			echo "</tr>";
			$counter++;
				

				
				
				
				
		 }
		  
		  
	  

	
	
}


function printTodayShippingStatusList(){
	include ('utilities.php');
	include ('UI/URLRESOLVER.php');
	$conn = mysqli_connect($host,$user,$pass);


	if(! $conn ){
		die('Could not connect: ' . mysqli_error());
	 }
  mysqli_select_db($conn,$database);
  
   $todayDate =  date("Y-m-d");
   //echo $todayDate;
   $query = "select * from shipping_status where date=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$todayDate);
   $stmt->execute();
   $result = $stmt->get_result();
   $counter = 1;
   //$row = $result->fetch_assoc();
 
   //if($row != null){
	$urlresolver = new UrlResolver();
	while($row = $result->fetch_assoc()){
	   $updateShipping__URL = $urlresolver->addCustomURLParameter("form","shipping","update","shipper_no",$row['shipper_no']);
	   echo "<tr>";
	   echo "<td scope='row'>".$counter."</td>";
	   echo "<th scope='row'><a href='".$updateShipping__URL."'>".$row['shipper_no']."</a></th>";
	   echo "<td scope='row'>".$row['date']."</td>";
	   echo "<td scope='row'>".$row['origin']."</td>";
	   echo "<td scope='row'>".$row['destiny']."</td>";
	   echo "<td scope='row'>".$row['departour_hour']."</td>";
	   echo "<td scope='row'>".$row['arrive_hour']."</td>";
	   echo "<td scope='row'>".$row['status']."</td>";
	   echo "<td scope='row'>".$row['delivered']."</td>";
	   echo "<td scope='row'>".$row['CBP']."</td>";
	   echo "</tr>";
	   $counter++;
		   
   
	}
   //}else{
	//echo "Not Records for Today";

   //}

	  
}

function getTodayShippingsShippersNo(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);

	if(! $conn ){
		die('Could not connect: ' . mysqli_error());
	 }
  mysqli_select_db($conn,$database);
  
   $todayDate =  date("Y-m-d");
   $counter=0;
   $shippersNo = array();
   $query = "select shipper_no from shipping_status where date=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$todayDate);
   $stmt->execute();
   $result = $stmt->get_result();
	$urlresolver = new UrlResolver();
	while($row = $result->fetch_assoc()){
		$shippersNo[$counter] = $row['shipper_no'];
		 $counter++;
	 }

	 return $shippersNo;
}

function setDepartourHour($shipping_id,$departour_hour){
	
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  		 
		
		$query = "update shipping_status set departour_hour=? where id=?;";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('si',$departour_hour,$shipping_id);
		$stmt->execute();
		$stmt->close();
			 
				
		
			 
		 
	  
	
	
	
}


function setStatus($shipping_id,$status){
	
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  		 
		
		$query = "update shipping_status set status=? where id=?;";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('si',$status,$shipping_id);
		$stmt->execute();
		$stmt->close();
			 
	}


function setArriveHour($shipping_id,$arrive_hour){
	
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  		 
		
		$delivered = 1;
		
		$query = "update shipping_status set arrive_hour=?,delivered=? where id=?;";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('sii',$arrive_hour,$delivered,$shipping_id);
		$stmt->execute();
		$stmt->close();
			 
				
		
			
}


}
?>