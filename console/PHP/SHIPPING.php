<?php
class Shipping{
	
function addShipping($driver,$truck,$trailer,$customer,$port,$type,$weight,$shipper_no,$seal,$comments,$UM){
	include ('utilities.php');
	
echo $shipper_no."<br>";
echo $customer."<br>";
echo $port."<br>";
echo $trailer."<br>";
echo $driver."<br>";
echo $truck."<br>";
echo $type."<br>";
echo $UM."<br>";
echo $weight."<br>";
echo $seal."<br>";
echo $comments."<br>";

	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  $query = "insert into shipping(driver,truck,trailer,customer,port,type,weight,shipper_no,seal,comments,UM) values(?,?,?,?,?,?,?,?,?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('iiisissssss',$driver,$truck,$trailer,$customer,$port,$type,$weight,$shipper_no,$seal,$comments,$UM);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		return 0;
		

	
}	
	

function updateShipping($shipper_no,$driver,$truck,$trailer,$customer,$port,$type,$weight,$seal,$comments,$UM){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update shipping set driver=?,truck=?,trailer=?,customer=?,port=?,type=?,weight=?,seal=?,comments=?,UM=? where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('iiisisissss',$driver,$truck,$trailer,$customer,$port,$type,$weight,$seal,$comments,$UM,$shipper_no);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close();
	 return 0; 
}

function deleteShipping($shipping_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  
	  if($this->isAssigned($shipping_id) == true){
		  $this->deleteAssignedShipping($shipping_id);
		  
		  
	  }
	  
	 $query = "delete from shipping where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$shipping_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	  
	 	
}

function deleteAllShipping(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $this->deleteAllAssignedShipping();
	  
	 $query = "delete from shipping;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	 	
}

function getShippingId($shipping_no){
	include ('utilities.php');
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select id from shipping where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shipping_no);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 if($row != null){
			 
			 return $row['id'];
		 }
		 
		 
		 return 0;
	
	
}

function deleteAllAssignedShipping(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from assigned_shipping;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close(); 
	 $conn->close();
	 return 0;
	 	
}

function isAssigned($shipping_id){
		include ('utilities.php');
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select shipping_id from assigned_shipping where shipping_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$shipping_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 if($row != null){
			 
			 return true;
		 }
		 
		 
		 return false;
	
	
	
}

function deleteAssignedShipping($shipping_id){
	
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from assigned_shipping where shipping_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$shipping_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	
	
}

function printShippingList(){
		include ('utilities.php');
		include ('CUSTOMERS.php');
		include ('PORTS.php');
		include ('DRIVERS.php');
		
		
		
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	
		$customer_manager = new Customer();
		$driver_manager = new Driver();
		$port_manager = new Port();

   
	   $query = "select * from shipping;";
	   $stmt = $conn->prepare($query);
	   $stmt->execute();
	   $result = $stmt->get_result();
	   $counter = 1;
		 
	   $urlresolver = new UrlResolver();
		 while($row = $result->fetch_assoc()){
			$port_name = $port_manager->getPort($row['port']);
			$customer_name = $customer_manager->getCustomer($row['customer']);
			$driver_name = $driver_manager->getDriver($row['driver']);
			$updateShipping__URL = $urlresolver->addCustomURLParameter("form","shipping","update","shipper_no",$row['shipper_no']);
			$deleteShipping__URL = $urlresolver->generateActionURL("delete","shipping","shipping",$row['id']);
			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['shipper_no']."</td>";
			echo "<td scope='row'>".$row['seal']."</td>";
			echo "<td scope='row'><a href='PORT_VIEW.php?port=".$row['port']."'>".$port_name."</a></td>";
			echo "<td scope='row'><a href='CUSTOMER_VIEW.php?customer=".$row['customer']."'>".$customer_name."</a></td>";
			echo "<td scope='row'><a href='DRIVER_VIEW.php?driver=".$row['driver']."'>".$driver_name."</a></td>";
			echo "<td scope='row'><a href='TRUCK_VIEW.php?truck=".$row['truck']."'>".$row['truck']."</a></td>";
			echo "<td scope='row'><a href='TRAILER_VIEW.php?trailer=".$row['trailer']."'>".$row['trailer']."</a></td>";
			echo "<td scope='row'>".$row['type']."</td>";
			echo "<td scope='row'>".$row['weight']."</td>";
			
			if($this->isAssigned($row['id'])){
				echo "<td scope='row'>";
				echo "Assigned to Driver";
				echo "</td>";
			}else{
			
			echo "<td scope='row'><a href='../php/assignShipping.php?shipping=".$row['id']."&driver=".$row['driver']."'><button type='button' class='btn btn-primary purple-btn'>Assign</button></a></td>";
			}
			echo "<td scope='row'><a href='".$deleteShipping__URL."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateShipping__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='shippingsl[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
			
			echo "</tr>";
			$counter++;
				

				
				
				
				
		 }
		  
		  
	  

	
	
}

function printShippingShipperNoCustomer($shipper_no){
	include ('utilities.php');
	include ('CUSTOMERS.php');

	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select shipper_no,customer from shipping where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shipper_no);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();

		 $customer_manager = new Customer();
		 if($row != null){
			$customer_name = $customer_manager->getCustomer($row['customer']);
			echo "<label>Shipper No:</label>";
			echo "<input type='text' name='shipper_no' class='form-control' value='".$row['shipper_no']."' disabled>";
			echo "<br>";
			echo "<label>Customer:</label>";
			echo "<select name='customer' class='form-control' required>";
			echo "<option value='".$row['customer']."'>".$customer_name."</option>";
			$customer_manager->printCustomers();
			echo "</select>";

		 }

}

function printShippingComments($shipper_no){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select comments from shipping where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shipper_no);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();

		 if($row != null){
			echo "<label>Comments:</label><br>";
			echo "<textarea name='comments' rows='4' cols='50'>";
			echo $row['comments'];
			echo "</textarea>";

		 }


}

function printShipping($shipper_no){
	include ('utilities.php');
	include ('PORTS.php');
	include ('DRIVERS.php');
	include ('TRUCKS.php');
	include ('TRAILERS.php');

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from shipping where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shipper_no);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		$driver_manager = new Driver();
		$port_manager = new Port();
		$trailer_manager = new Trailer();
		$truck_manager = new Truck();

		 
		 
		 if($row != null){
			 
	$port_name = $port_manager->getPort($row['port']);
	$driver_name = $driver_manager->getDriver($row['driver']);		 
			
	echo "<div class='row'>";
	echo "<div class='col'>";
	echo "<label>Driver:</label>";
	echo "<select name='driver' class='form-control' required>";
	echo "<option value='".$row['driver']."'>".$driver_name."</option>";
	 $driver_manager->printDrivers();
	 echo "</select>";
	echo "</div>";
	echo "<div class='col'>";
	echo "<label>Port of Entry:</label>";
	echo "<select name='port' class='form-control' required>";
	echo "<option value='".$row['port']."'>".$port_name."</option>";
 	$port_manager->printPorts();
 	echo "</select>";
	echo "</div>";
	echo "<div class='col'>";
	echo "<label>Weight Unit of Measure:</label>";
	echo "<select name='UM' class='form-control' required>";
	echo "<option value='".$row['UM']."'>".$row['UM']."</option>";
	echo "<option value='KG'>KG</option>";
	echo "<option value='LB'>LB</option>";
	echo "</select>";
	echo "</div>";
	echo "</div>";
	echo "<br>";
	echo "<div class='row'>";
	echo "<div class='col'>";
	echo "<label>Trailer Number:</label>";
	echo "<select name='trailer' class='form-control' required>";
	echo "<option value='".$row['trailer']."'>".$row['trailer']."</option>";
	$trailer_manager->printTrailers();
	 echo "</select>";
	echo "</div>";
	echo "<div class='col'>";
	echo "<label>Service Type:</label>";
	echo "<select name='type' class='form-control' required>";
	echo "<option value='".$row['type']."'>".$row['type']."</option>";
	echo "<option value='opt1'>opt1</option>";
	echo "<option value='opt2'>opt2</option>";
	echo "</select>";
	echo "</div>";
	echo "<div class='col'>";
	echo "<label>Weight:</label>";
	echo "<input type='text' name='weight' class='form-control' value='".$row['weight']."'>";
	echo "</div>";
	echo "</div>";
	echo "<br>";
	echo "<div class='row'>";
	echo "<div class='col-sm-4'>";
	echo "<label>Truck Number:</label>";
	echo "<select name='truck' class='form-control' required>";
	echo "<option value='".$row['truck']."'>".$row['truck']."</option>";
	$truck_manager->printTrucks();
	echo "</select>";
	echo "</div>";
	echo "<div class='col-sm-4'>";
	echo "<label>Seal:</label>";
	echo "<input type='text' name='seal' class='form-control' value='".$row['seal']."'>";
	echo "</div>";
	echo "</div>";


	}
	  	
}


function printShippingInfo($shipper_no){
	
	include ('utilities.php');
	include ('CUSTOMERS.php');
	include ('PORTS.php');
	include ('DRIVERS.php');
	include ('TRUCKS.php');
	include ('TRAILERS.php');

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from shipping where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shipper_no);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 $customer_manager = new Customer();
		$driver_manager = new Driver();
		$port_manager = new Port();
		$trailer_manager = new Trailer();
		$truck_manager = new Truck();

		 
		 
		 if($row != null){
			 
	$port_name = $port_manager->getPort($row['port']);
	$customer_name = $customer_manager->getCustomer($row['customer']);
	$driver_name = $driver_manager->getDriver($row['driver']);	




	echo "<div class='form-group row'>";

	echo "<label>Date:</label>";

	echo "<div class='col'>";
	echo "<input type='text' class='form-control' value='".$row['date']."' disabled>";
	echo "</div>";

	echo "</div>";

	echo "<div class='form-group row'>";

	echo "<label>Origin:</label>";

	echo "<div class='col'>";
	echo "<input type='text' class='form-control' value='".$row['origin']."' disabled>";
	echo "</div>";

	echo "</div>";
	
	echo "<div class='form-group row'>";

	echo "<label>Destiny:</label>";

	echo "<div class='col'>";
	echo "<input type='text' class='form-control' value='".$row['destiny']."' disabled>";
	echo "</div>";

	echo "</div>";

	echo "<div class='form-group row'>";

	echo "<label>Customer:</label>";

	echo "<div class='col'>";
	echo "<input type='text' class='form-control' value='".$customer_name."' disabled>";
	echo "</div>";

	echo "</div>";

	echo "<div class='form-group row'>";

	echo "<label>Type of cargo:</label>";

	echo "<div class='col'>";
	echo "<input type='text' class='form-control' value='".$row['type']."' disabled>";
	echo "</div>";

	echo "</div>";

	echo "<div class='form-group row'>";

	echo "<label>Weight:</label>";

	echo "<div class='col'>";
	echo "<input type='text' class='form-control' value='".$row['weight']." lb' disabled>";
	echo "</div>";

	echo "</div>";
	echo "<div class='form-group row'>";

	echo "<label>Driver:</label>";

	echo "<div class='col'>";
	echo "<input type='text' class='form-control' value='".$driver_name."' disabled>";
	echo "</div>";

	echo "</div>";
	echo "<div class='form-group row'>";

	echo "<label>Truck:</label>";

	echo "<div class='col'>";
	echo "<input type='text' class='form-control' value='".$row['truck']."' disabled>";
	echo "</div>";

	echo "</div>";
	echo "<div class='form-group row'>";

	echo "<label>Trailer:</label>";

	echo "<div class='col'>";
	echo "<input type='text' class='form-control' value='".$row['trailer']."' disabled>";
	echo "</div>";
	echo "</div>";
	
			 
		
		}
	
		
	
}

function getDestinyType($shipping_id){
	
	include ('utilities.php');
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  
		 
		 
		 //if($row != null){
		
			
			$query = "select destiny,type from shipping where id=?;";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('i',$shipping_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_shipping = $result->fetch_assoc();
			
			if($row_shipping != null){
				
				return $row_shipping['destiny'].', '.$row_shipping['type'];
				
			}else{
				
				return 'SHIPPINGS DO NOT ASSIGNED';
				
			}
			
			
		
		//}	
	
	
	
	
}


function printDriverShippingsDelivered($driver_id){
	
	include ('utilities.php');
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  
	  $deliver = 1;
	  
	  $query = "select shipping_id from assigned_shipping where driver_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$driver_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 
		 
		 
		 while($row = $result->fetch_assoc()){
		
			
			$query = "select destiny,type,delivered from shipping where id=?;";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('i',$row['shipping_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_shipping = $result->fetch_assoc();
			
			
			
			if($row_shipping != null){
				
				if($row_shipping['delivered'] == 1){
				
				echo "<button type='button' class='btn btn-secondary' onclick='viewShipping(".$row['shipping_id'].")'>".$row_shipping['destiny'].", ".$row_shipping['type']."</button><br>";
				}
			}
			
			
		
		}
		
}


function printDriverShippings($driver_id){
	
	include ('utilities.php');
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select shipping_id from assigned_shipping where driver_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$driver_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 
		 
		 
		 while($row = $result->fetch_assoc()){
		
			
			$query = "select destiny,type from shipping where id=?;";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('i',$row['shipping_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_shipping = $result->fetch_assoc();
			
			if($row_shipping != null){
				
				echo "<button type='button' class='btn btn-secondary' onclick='viewShipping(".$row['shipping_id'].")'>".$row_shipping['destiny'].", ".$row_shipping['type']."</button><br>";
				
			}
			
			
		
		}
	
	
	
	
}

function setDepartourHour($shipping_id,$departour_hour){
	
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  		 
		
		$query = "update shipping set departour_hour=? where id=?;";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('si',$departour_hour,$shipping_id);
		$stmt->execute();
		$stmt->close();
			 
				
		
			 
		 
	  
	
	
	
}


function printShippingsList(){
		include ('utilities.php');
	
		
		
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  

   
	   $query = "select shipper_no from shipping;";
	   $stmt = $conn->prepare($query);
	   $stmt->execute();
	   $result = $stmt->get_result();
	  
		 
		 while($row = $result->fetch_assoc()){
			 		
			
			echo "<option value='".$row['shipper_no']."'>".$row['shipper_no']."</option>";

				
				
				
				
		 }
	
	
	
}


function setStatus($shipping_id,$status){
	
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  		 
		
		$query = "update shipping set status=? where id=?;";
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
		
		$query = "update shipping set arrive_hour=?,delivered=? where id=?;";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('sii',$arrive_hour,$delivered,$shipping_id);
		$stmt->execute();
		$stmt->close();
			 
				
		
			 
		 
	  
	
	
	
}

function getDriversAssigned(){
	include ('utilities.php');
	$shippingStatus_manager = new ShippingStatus();
	$shippersNo = $shippingStatus_manager->getTodayShippingsShippersNo();
	$drivers = array();
	$counter = 0;
	
	for($i=0;$i<count($shippersNo);$i++){
		$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	    $query = "select id from shipping where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shippersNo[$i]);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 
		 while($row = $result->fetch_assoc()){
			echo $row['id'];
			$queryDriver = "select driver_id from assigned_shipping where shipping_id=?;";
			$stmtDriver = $conn->prepare($queryDriver);
			$stmtDriver->bind_param('i',$row['id']);
			 $stmtDriver->execute();
			$resultDriver = $stmtDriver->get_result();
				while($rowDriver = $resultDriver->fetch_assoc()){
					echo $rowDriver['driver_id'];
					$drivers[$rowDriver['driver_id']] = $shippersNo[$i];
					$counter+=1;
				}

			
		 }
	}

	return $drivers;
}

function getTrucksAssigned(){
	include ('utilities.php');
	$shippingStatus_manager = new ShippingStatus();
	$shippersNo = $shippingStatus_manager->getTodayShippingsShippersNo();
	$trucks = array();
	for($i=0;$i<count($shippersNo);$i++){
		$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	    $query = "select truck from shipping where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shippersNo[$i]);
	  $stmt->execute();
		 $result = $stmt->get_result();

		 if($row = $result->fetch_assoc()){
			$trucks[$row['truck']] = $shippersNo[$i];	
		 }
	}

	return $trucks;
}

function getTrailersAssigned(){
	include ('utilities.php');
	$shippingStatus_manager = new ShippingStatus();
	$shippersNo = $shippingStatus_manager->getTodayShippingsShippersNo();
	$trailers = array();
	for($i=0;$i<count($shippersNo);$i++){
		$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	    $query = "select trailer from shipping where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shippersNo[$i]);
	  $stmt->execute();
		 $result = $stmt->get_result();

		 if($row = $result->fetch_assoc()){
			$trailers[$row['trailer']] = $shippersNo[$i];	
		 }
	}

	return $trailers;
}

function getCargoAssigned(){
	include ('utilities.php');
	$shippingStatus_manager = new ShippingStatus();
	$shippersNo = $shippingStatus_manager->getTodayShippingsShippersNo();
	$merchandise = array();
	for($i=0;$i<count($shippersNo);$i++){
		$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "select id,merchandise_id from cargo where shipper_no=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('s',$shippersNo[$i]);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 while( $row = $result->fetch_assoc()){
			$merchandise[$row['id']] = $row['merchandise_id'];	
		 }
	}
	return $merchandise;
}

function getMerchandiseAssigned(){
	include ('utilities.php');
	$merchandiseName = array();
	$merchandiseId = $this->getCargoAssigned();
	$counter = 0;
	foreach($merchandiseId as $id => $value){
		$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	 $query = "select name from merchandise where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$value);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 while( $row = $result->fetch_assoc()){
			$merchandiseName[$id] = $row['name'];	
			$counter++;
		 }
	}

	return $merchandiseName;
}

function printTodayDrivers(){
	include ('utilities.php');
	$drivers = $this->getDriversAssigned();
	$counter = 1;
	$urlresolver = new UrlResolver();
	foreach($drivers as $driver_id => $value){
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
			$updateDriver__URL = $urlresolver->addCustomURLParameter("form","driver","update","driver",$driver_id);
			echo "<tr>";
			echo "<td scope='row'>".$counter."</td>";
			echo "<td scope='row'>".$row['name']." ".$row['lastname']."</td>";
			echo "<th scope='row'><a href='".$updateDriver__URL."'>".$driver_id."</a></th>";
			echo "<td scope='row'>".$value."</td>";
			echo "</tr>";
			$counter++;
		 }

	}
}

function printTodayMerchandise(){
	include ('utilities.php');
	$merchandiseAssigned = $this->getMerchandiseAssigned();
	$counter = 1;
	foreach($merchandiseAssigned as $id => $value){
		$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	$query = "select shipper_no from cargo where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td scope='row'>".$counter."</td>";
			echo "<td scope='row'>".$value."</td>";
			echo "<td scope='row'>".$row['shipper_no']."</td>";
			echo "</tr>";
				$counter++;
		 }

	}
}

function printTodayTrucks(){
	include ('utilities.php');
	$trucks = $this->getTrucksAssigned();
	$counter = 1;
	$urlresolver = new UrlResolver();
	foreach($trucks as $truck_id => $value){
		$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	$query = "select plate_number from truck where truck_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$truck_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 while( $row = $result->fetch_assoc()){
			$updateTruck__URL = $urlresolver->addCustomURLParameter("form","truck","update","truck",$truck_id);
			echo "<tr>";
			echo "<td scope='row'>".$counter."</td>";
			echo "<td scope='row'>".$row['plate_number']."</td>";
			echo "<th scope='row'><a href='".$updateTruck__URL."'>".$truck_id."</a></th>";
			echo "<td scope='row'>".$value."</td>";
			echo "</tr>";
			$counter++;
		 }
	}
}

function printTodayTrailers(){
	include ('utilities.php');
	$trailers = $this->getTrailersAssigned();
	$counter = 1;
	$urlresolver = new UrlResolver();
	foreach($trailers as $trailer_id => $value){
		$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	$query = "select plate_number from trailer where trailer_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$trailer_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 while( $row = $result->fetch_assoc()){
			$updateTrailer__URL = $urlresolver->addCustomURLParameter("form","trailer","update","trailer",$trailer_id);
			echo "<tr>";
			echo "<td scope='row'>".$counter."</td>";
			echo "<td scope='row'>".$row['plate_number']."</td>";
			echo "<th scope='row'><a href='".$updateTrailer__URL."'>".$trailer_id."</a></th>";
			echo "<td scope='row'>".$value."</td>";
			echo "</tr>";
			$counter++;
		 }

	}
}


function assignShipping($shipping,$driver){
		include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  
	  
	    $query = "select driver_id from assigned_shipping where shipping_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$shipping);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row == null){
			  $query = "insert into assigned_shipping(shipping_id,driver_id) values(?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('ii',$shipping,$driver);
		$stmt->execute();
		$stmt->close();
			 
			 
			return 0; 
			 
		 }else{
			 
			 return 1;
			 
			 
			 
		 }
	  
	 
	  
	  
	 
	



}





}
?>