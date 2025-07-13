<?php  
class ShippingstatusFilter{

function filterByDate($date){
    include ('CUSTOMERS.php');
include ('PORTS.php');
include ('DRIVERS.php');
include ('SHIPPING.php');
    $records = $this->filterByDateAux($date);
    $this->printRecords(0,$records);


}

function filterByDateAux($date){
	include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from shipping_status where date=?;";
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
   $query = "select * from shipping_status where shipper_no like ?;";
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
    $this->printRecords(0,$records);
}


function filterByStatusAux($status){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from shipping_status where status=?;";
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

function filterByDestiny($destiny){
    include ('CUSTOMERS.php');
include ('PORTS.php');
include ('DRIVERS.php');
include ('SHIPPING.php');
    $records= $this->filterByDestinyAux($destiny);
    $this->printRecords(0,$records);

}



function filterByDestinyAux($destiny){

    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from shipping_status where destiny=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$destiny);
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

function filterByOrigin($origin){
    include ('CUSTOMERS.php');
include ('PORTS.php');
include ('DRIVERS.php');
include ('SHIPPING.php');
    $records= $this->filterByOriginAux($origin);
    $this->printRecords(0,$records);

}


function filterByOriginAux($origin){

    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from shipping_status where origin=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$origin);
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
    $this->printRecords(0,$records);

}

function filterByDeliveredAux($delivered){

    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from shipping_status where delivered=?;";
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
    $shipper_no = $records[$i]['shipper_no'];
    $shipper_no = "%$shipper_no%";
   $query = "select * from shipping where shipper_no like ?;";
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
          <th scope='col'>Date</th>
          <th scope='col'>Origin</th>
          <th scope='col'>Destiny</th>
          <th scope='col'>Departure Hour</th>
          <th scope='col'>Arrive Hour</th>
          <th scope='col'>Status</th>
          <th scope='col'>Delivered</th>
          <th scope='col'>CBP</th>
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

$urlresolver = new UrlResolver();
$updateShipping__URL = $urlresolver->addCustomURLParameter("form","shipping_status","view","shipping",$row['id']);

     echo "<tr>";
     echo "<td scope='row'>".$index."</td>";
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
                  
return $this->printRecords($index+1,$records);


}

}

?>