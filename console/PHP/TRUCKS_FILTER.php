<?php
class TrucksFilter{
function filterByTruckId($truckId){
    $records= $this->filterByTruckIdAux($truckId);
    $this->printRecords(0,$records);

}

function filterByTruckIdAux($truckId){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from truck where truck_id=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('i',$truckId);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
     }

     return $rows;


}

function filterByState($state){
    $records= $this->filterByStateAux($state);
    $this->printRecords(0,$records);

}

function filterByStateAux($state){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from truck where state=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$state);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
     }

     return $rows;


}

function filterByCountry($country){
    $records= $this->filterByCountryAux($country);
    $this->printRecords(0,$records);

}

function filterByCountryAux($country){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from truck where countryId=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$country);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
     }

     return $rows;


}

function filterByPlateNo($plateNo){
    $records= $this->filterByPlateNoAux($plateNo);
    $this->printRecords(0,$records);

}

function filterByPlateNoAux($plateNo){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  
     $plateNo = "%$plateNo%";
   $query = "select * from truck where plate_number like ?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$plateNo);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
     }

     return $rows;


}

function filterByVinNo($vin){
    $records= $this->filterByVinNoAux($vin);
    $this->printRecords(0,$records);
}

function filterByVinNoAux($vin){

    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  
     $vin = "%$vin%";
   $query = "select * from truck where vin_number like ?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$vin);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
     }

     return $rows;

}

function filterByModel($model){
    $records= $this->filterByModelAux($model);
    $this->printRecords(0,$records);

}

function filterByModelAux($model){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  
     $model = "%$model%";
   $query = "select * from truck where model like ?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$model);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
     }

     return $rows;

}

function printTableHeader(){
    echo "
    <th scope='col'>#</th>
      <th scope='col'>Truck Id</th>
		  <th scope='col'>Model</th>
		  <th scope='col'>Vin Number</th>
          <th scope='col'>Plate Number</th>
          <th scope='col'>Country</th>
          <th scope='col'>State</th>
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
        $urlresolver = new UrlResolver();
        $updateTruck__URL = $urlresolver->addCustomURLParameter("form","truck","update","truck",$row['truck_id']);
			echo "<tr>";
			echo "<th scope='row'>".$index."</th>";
			echo "<td scope='row'>".$row['truck_id']."</td>";
            echo "<td scope='row'>".$row['model']."</td>";
            echo "<td scope='row'>".$row['vin_number']."</td>";
			echo "<td scope='row'>".$row['plate_number']."</td>";
			echo "<td scope='row'>".$row['country']."</td>";
			echo "<td scope='row'>".$row['state']."</td>";
			echo "<td scope='row'>".$row['vin_number']."</td>";
			echo "<td scope='row'><a href='../php/delete_truck.php?truck=".$row['truck_id']."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateTruck__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='trucksl[]' class='form-check-input' type='checkbox' value='".$row['truck_id']."' ></td>";
			
			echo "</tr>";


            return $this->printRecords($index+1,$records);


}

}


?>