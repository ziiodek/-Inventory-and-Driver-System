<?php  
class ShippingFilter{

function filterByDate($date){
    include ('CUSTOMERS.php');
include ('PORTS.php');
include ('DRIVERS.php');
include ('SHIPPING.php');
    $records = $this->filterByDateAux($date);
    $records = $this->getShippingRecords($records);
    $this->printRecords(0,$records);


}

function filterByDateAux($date){
	include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select shipper_no from shipping_status where date=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$date);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
        $index+=1;
     }

     return $rows;

}

function filterByCustomer($customer){
    include ('CUSTOMERS.php');
include ('PORTS.php');
include ('DRIVERS.php');
include ('SHIPPING.php');
    $records= $this->filterByCustomerAux($customer);
    $this->printRecords(0,$records);
}


function filterByCustomerAux($customer){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from shipping where customer=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('i',$customer);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
        $index+=1;
     }

     return $rows;

}

function filterByShipperNo($shipper_no){
    include ('CUSTOMERS.php');
include ('PORTS.php');
include ('DRIVERS.php');
include ('SHIPPING.php');
    $records= $this->filterByShipperNoAux($shipper_no);
    $this->printRecords(0,$records);

}


function filterByShipperNoAux($shipper_no){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  
     $shipper_no="%$shipper_no%";
   $query = "select * from shipping where shipper_no like ?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$shipper_no);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
        $index+=1;
     }

     return $rows;


}

function filterByStatus($status){
    include ('CUSTOMERS.php');
include ('PORTS.php');
include ('DRIVERS.php');
include ('SHIPPING.php');
    $records= $this->filterByStatusAux($status);
    $records=$this->getShippingRecords($records);
    $this->printRecords(0,$records);
}


function filterByStatusAux($status){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select shipper_no from shipping_status where status=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$status);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
        $index+=1;
     }

     return $rows;



}

function filterByDelivered($delivered){
    include ('CUSTOMERS.php');
include ('PORTS.php');
include ('DRIVERS.php');
include ('SHIPPING.php');
    $records= $this->filterByDeliveredAux($delivered);
    $records=$this->getShippingRecords($records);
    $this->printRecords(0,$records);

}

function filterByDeliveredAux($delivered){

    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select shipper_no from shipping_status where delivered=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('i',$delivered);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
        $index+=1;
     }

     return $rows;

}

function filterByType($type){
    include ('CUSTOMERS.php');
include ('PORTS.php');
include ('DRIVERS.php');
include ('SHIPPING.php');
    $records= $this->filterByServiceTypeAux($type);
    $records=$this->getShippingRecords($records);
    $this->printRecords(0,$records);

}


function filterByTypeAux($type){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from shipping where type=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$type);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
        $index+=1;
     }

     return $rows;

}



function getShippingRecords($records){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  $index = 0;
  $rows = array();
    for($i=0;$i<count($records);$i++){
   $query = "select * from shipping where shipper_no=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$records[$i]['shipper_no']);
   $stmt->execute();
   $result = $stmt->get_result();
   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
        $index+=1;
     }

    



    }

    return $rows;

}


function printTableHeader(){
    echo "
    <th scope='col'>#</th>
      <th scope='col'>Shipper No.</th>
          <th scope='col'>Seal</th>
          <th scope='col'>Port of Entry</th>
          <th scope='col'>Customer</th>
          <th scope='col'>Driver</th>
          <th scope='col'>Truck</th>
          <th scope='col'>Trailer</th>
          <th scope='col'>Type</th>
          <th scope='col'>Weight</th>
          <th scope='col'>Assign Trip</th>
          <th scope='col'>Delete</th>
          <th scope='col'>Edit</th>
          ";

}


function printRecords($index,$records){
if($records == null){
echo "RECORDS NOT FOUND";
return;
}

if($index>=count($records)){
return;
}

$row = $records[$index];
$customer_manager = new Customer();
$driver_manager = new Driver();
$port_manager = new Port();

$port_name = $port_manager->getPort($row['port']);
$customer_name = $customer_manager->getCustomer($row['customer']);
$driver_name = $driver_manager->getDriver($row['driver']);

$urlresolver = new UrlResolver();
$updateShipping__URL = $urlresolver->addCustomURLParameter("form","shipping","update","shipping",$row['id']);

$shipping = new Shipping();


echo "<tr>";
echo "<th scope='row'>".$index."</th>";
echo "<td scope='row'>".$row['shipper_no']."</td>";
echo "<td scope='row'>".$row['seal']."</td>";
echo "<td scope='row'><a href='PORT_VIEW.php?port=".$row['port']."'>".$port_name."</a></td>";
echo "<td scope='row'><a href='CUSTOMER_VIEW.php?customer=".$row['customer']."'>".$customer_name."</a></td>";
echo "<td scope='row'><a href='DRIVER_VIEW.php?driver=".$row['driver']."'>".$driver_name."</a></td>";
echo "<td scope='row'><a href='TRUCK_VIEW.php?truck=".$row['truck']."'>".$row['truck']."</a></td>";
echo "<td scope='row'><a href='TRAILER_VIEW.php?trailer=".$row['trailer']."'>".$row['trailer']."</a></td>";
echo "<td scope='row'>".$row['type']."</td>";
echo "<td scope='row'>".$row['weight']."</td>";

if($shipping->isAssigned($row['id'])){
    echo "<td scope='row'>";
    echo "Assigned to Driver";
    echo "</td>";
}else{

echo "<td scope='row'><a href='../php/assignShipping.php?shipping=".$row['id']."&driver=".$row['driver']."'><button type='button' class='btn btn-primary purple-btn'>Assign</button></a></td>";
}
echo "<td scope='row'><a href='../php/delete_shipping.php?shipping=".$row['id']."'><i class='fas fa-trash'></i></a></td>";
echo "<td scope='row'><a href='".$updateShipping__URL."'><i class='fas fa-edit'></i></a></td>";
echo "<td scope='row'><input name='shippingsl[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";

echo "</tr>";


return $this->printRecords($index+1,$records);


}

}

?>