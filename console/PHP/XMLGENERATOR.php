<?php
class XMLGenerator{
	
function exportAllDriversXML(){
	

		include ('utilities.php');
		include ('xlsxwriter.class.php');

	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from driver;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
	
		 
		$data = [];
		 $counter = 0;
		 
		 
		 while($row = $result->fetch_assoc()){
			
			$driver = [$row['driver_id'],$row['name'],$row['lastname'],$row['driver_license'],$row['passport'],$row['phone_number'],$row['license_type']];
				$data[$counter] = $driver;
		
			$counter++;
				

				
				
				
				
		 }
		  
	
$header = array(
  'Driver Id'=>'string',
  'Name'=>'string',
  'Lastname'=>'string',
  'Driver License'=>'string',
  'Passport'=>'string',
  'Phone Number'=>'string',
  'License Type'=>'string',
);
	

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $row)
	$writer->writeSheetRow('Sheet1', $row);

//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

$writer->writeToFile('../drivers/drivers.xlsx');
	
}




function exportAllTrucksXML(){
	

		include ('utilities.php');
		include ('xlsxwriter.class.php');

	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from truck;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
	
		 
		$data = [];
		 $counter = 0;
		 
		 
		 while($row = $result->fetch_assoc()){
			
			$truck = [$row['truck_id'],$row['plate_number'],$row['state'],$row['model'],$row['vin_number']];
				$data[$counter] = $truck;
		
			$counter++;
				

				
				
				
				
		 }
		  
	
$header = array(
  'Truck Id'=>'string',
  'Plate Number'=>'string',
  'State'=>'string',
  'Model'=>'string',
  'Vin Number'=>'string'
);
	

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $row)
	$writer->writeSheetRow('Sheet1', $row);

//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

$writer->writeToFile('../trailers/trailers.xlsx');
	
}

function exportAllTrailersXML(){
	

		include ('utilities.php');
		include ('xlsxwriter.class.php');

	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from trailer;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
	
		 
		$data = [];
		 $counter = 0;
		 
		 
		 while($row = $result->fetch_assoc()){
			
			$trailer = [$row['trailer_id'],$row['type'],$row['capacity'],$row['plate_number'],$row['dimensions'],$row['state']];
				$data[$counter] = $trailer;
		
			$counter++;
				

				
				
				
				
		 }
		  
	
$header = array(
  'Trailer Id'=>'string',
  'Type'=>'string',
  'Capacity'=>'string',
  'Plate Number'=>'string',
  'Dimensions'=>'string',
  'State'=>'string'
  
);
	

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $row)
	$writer->writeSheetRow('Sheet1', $row);

//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

$writer->writeToFile('../trailers/trailers.xlsx');
	
}


function exportAllShippingsXML(){
	

		include ('utilities.php');
		include ('xlsxwriter.class.php');

	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from shipping;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
	
		 
		$data = [];
		 $counter = 0;
		 
		 
		 while($row = $result->fetch_assoc()){
			
			$shipping = [$row['driver'],$row['truck'],$row['trailer'],$row['customer'],$row['port'],$row['type'],$row['weight'],$row['shipper_no'],$row['seal'],$row['comments'],$row['UM']];
				$data[$counter] = $shipping;
		
			$counter++;
				

				
				
				
				
		 }
		  
	
$header = array(
  'Driver'=>'string',
  'Truck'=>'string',
  'Trailer'=>'string',
  'Customer'=>'string',
  'Port'=>'string',
  'Type'=>'string',
  'Weight'=>'string',
  'Shipper No'=>'string',
  'Seal'=>'string',
  'Comments'=>'string',
  'UM'=>'string'
);
	

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $row)
	$writer->writeSheetRow('Sheet1', $row);

//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

$writer->writeToFile('../shippings/shippings.xlsx');
	
}


function exportAllShippingStatusXML(){
	

		include ('utilities.php');
		include ('xlsxwriter.class.php');

	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from shipping_status;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
	
		 
		$data = [];
		 $counter = 0;
		 
		 
		 while($row = $result->fetch_assoc()){
			
			$shipping = [$row['shipper_no'],$row['date'],$row['origin'],$row['destiny'],$row['departour_hour'],$row['arrive_hour'],$row['delivered'],$row['status'],$row['CBP']];
				$data[$counter] = $shipping;
		
			$counter++;
				

				
				
				
				
		 }
		  
	
$header = array(
  'Shipper No'=>'string',
  'Date'=>'string',
  'Origin'=>'string',
  'Destiny'=>'string',
  'Departure Hour'=>'string',
  'Arrive Hour'=>'string',
  'Delivered'=>'string',
  'Status'=>'string',
  'CBP'=>'string'
);
	

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $row)
	$writer->writeSheetRow('Sheet1', $row);

//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

$writer->writeToFile('../shippingStatus/shippingStatus.xlsx');
	
}



function exportAllCustomersXML(){
	

		include ('utilities.php');
		include ('xlsxwriter.class.php');

	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from customers;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
	
		 
		$data = [];
		 $counter = 0;
		 
		 
		 while($row = $result->fetch_assoc()){
			
			$customer = [$row['customer_id'],$row['name'],$row['street'],$row['city'],$row['state'],$row['zip']];
				$data[$counter] = $customer;
		
			$counter++;
				

				
				
				
				
		 }
		  
	
$header = array(
  'Customer Id'=>'string',
  'Name'=>'string',
  'Street'=>'string',
  'City'=>'string',
  'State'=>'string',
  'Zip'=>'string'
);
	

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $row)
	$writer->writeSheetRow('Sheet1', $row);

//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

$writer->writeToFile('../customers/customers.xlsx');
	
}


function exportAllPortsXML(){
	

		include ('utilities.php');
		include ('xlsxwriter.class.php');

	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from ports;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
	
		 
		$data = [];
		 $counter = 0;
		 
		 
		 while($row = $result->fetch_assoc()){
			
			$port = [$row['name'],$row['street'],$row['city'],$row['state'],$row['zip']];
				$data[$counter] = $port;
		
			$counter++;
				

				
				
				
				
		 }
		  
	
$header = array(
  'Name'=>'string',
  'Street'=>'string',
  'City'=>'string',
  'State'=>'string',
  'Zip'=>'string'
);
	

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $row)
	$writer->writeSheetRow('Sheet1', $row);

//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

$writer->writeToFile('../ports/ports.xlsx');
	
}


function exportAllBrandsXML(){
	

		include ('utilities.php');
		include ('xlsxwriter.class.php');

	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from brand;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
	
		 
		$data = [];
		 $counter = 0;
		 
		 
		 while($row = $result->fetch_assoc()){
			
			$brand = [$row['name']];
				$data[$counter] = $brand;
		
			$counter++;
				

				
				
				
				
		 }
		  
	
$header = array(
  'Name'=>'string'
  
);
	

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $row)
	$writer->writeSheetRow('Sheet1', $row);

//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

$writer->writeToFile('../brands/brands.xlsx');
	
}



function exportAllPlacesXML(){
	

		include ('utilities.php');
		include ('xlsxwriter.class.php');

	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from place;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
	
		 
		$data = [];
		 $counter = 0;
		 
		 
		 while($row = $result->fetch_assoc()){
			 
			 
			 
			$query = "select * from address where place_id=?;";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('i',$row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowAddress = $result->fetch_assoc();
			
			if($rowAddress != null){
				$place = [$row['name'],$rowAddress['country'],$rowAddress['state'],$rowAddress['city'],$rowAddress['street'],$rowAddress['zip_code']];
			}
			
			
				$data[$counter] = $place;
		
		
		
		
			$counter++;
				

				
				
				
				
		 }
		  
	
$header = array(
  'Name'=>'string',
  'Country' => 'string',
  'State' => 'string',
  'City' =>'string',
  'Street' => 'string',
  'Zip Code' => 'string'
  
);
	

$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $row)
	$writer->writeSheetRow('Sheet1', $row);

//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

$writer->writeToFile('../places/places.xlsx');
	
}


function exportAllCargoXML(){
	

	include ('utilities.php');
	include ('xlsxwriter.class.php');
	include 'MERCHANDISE.php';



	$conn = mysqli_connect($host,$user,$pass);


	if(! $conn ){
		die('Could not connect: ' . mysqli_error());
	 }
  mysqli_select_db($conn,$database);
  

	   
  $query = "select * from cargo;";
 $stmt = $conn->prepare($query);
  $stmt->execute();
   $result = $stmt->get_result();

	 
	$data = [];
	 $counter = 0;
	 
	 $merchandise_manager = new Merchandise();
	 while($row = $result->fetch_assoc()){
		$merchandise = $merchandise_manager->getMerchandise($row['merchandise_id']);

		$cargo = [$row['shipper_no'],$row['type'],$row['UM'],$row['amount'],$row['unit_value'],$row['total_value'],$row['UMW'],$row['weight'],$merchandise];
			$data[$counter] = $cargo;
	
		$counter++;
			

			
			
			
			
	 }
	  

$header = array(
'Shipper NO'=>'string',
'Type'=>'string',
'UM'=>'string',
'Amount'=>'string',
'Unit Value'=>'string',
'Total Value'=>'string',
'UMW'=>'string',
'Weight'=>'string',
'Merchandise'=>'string',
);


$writer = new XLSXWriter();

$writer->writeSheetHeader('Sheet1', $header);
foreach($data as $row)
$writer->writeSheetRow('Sheet1', $row);

//$writer->writeSheet($rows,'Sheet1', $header);//or write the whole sheet in 1 call

$writer->writeToFile('../cargo/cargo.xlsx');

}



	
}
?>