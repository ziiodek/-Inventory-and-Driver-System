<?php
class DriversFilter{


function filterByDriverid($driverId){
    $records= $this->filterByDriveridAux($driverId);
    $this->printRecords(0,$records);
}

function filterByDriveridAux($driverId){

    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from driver where driver_id=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('i',$driverId);
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

function filterByDriverLicense($licenseNo){
    $records= $this->filterByDriverLicenseAux($licenseNo);
    $this->printRecords(0,$records);

}


function filterByDriverLicenseAux($licenseNo){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  
   $licenseNo="%$licenseNo%";
   $query = "select * from driver where driver_license like ?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$licenseNo);
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

function filterByName($name){
    $records= $this->filterByNameAux($name);
    $this->printRecords(0,$records);

}

function filterByNameAux($name){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  
    $name="%$name%";
   $query = "select * from driver where name like ?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$name);
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

function filterByLastname($lastname){
    $records= $this->filterByLastnameAux($lastname);
    $this->printRecords(0,$records);
}

function filterByLastnameAux($lastname){
include ('utilities.php');

$conn = mysqli_connect($host,$user,$pass);


if(! $conn ){
    die('Could not connect: ' . mysqli_error());
 }
mysqli_select_db($conn,$database);

$lastname="%$lastname%";
$query = "select * from driver where lastname like ?;";
$stmt = $conn->prepare($query);
$stmt->bind_param('s',$lastname);
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

function printTableHeader(){
    echo "
    <th scope='col'>#</th>
      <th scope='col'>Driver Id</th>
          <th scope='col'>Name</th>
          <th scope='col'>Last name</th>
          <th scope='col'>Driver License</th>
          <th scope='col'>License Type</th>
          <th scope='col'>Password No</th>
          <th scope='col'>Phone Number</th>
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
    $updateDriver__URL = $urlresolver->addCustomURLParameter("form","driver","update","driver",$row['driver_id']);
    echo "<tr>";
    echo "<th scope='row'>".($index+1)."</th>";
    echo "<td scope='row'>".$row['driver_id']."</td>";
    echo "<td scope='row'>".$row['name']."</td>";
    echo "<td scope='row'>".$row['lastname']."</td>";
    echo "<td scope='row'>".$row['driver_license']."</td>";
    echo "<td scope='row'>".$row['passport']."</td>";
    echo "<td scope='row'>".$row['phone_number']."</td>";
    echo "<td scope='row'>".$row['license_type']."</td>";
    echo "<td scope='row'><a href='../php/delete_driver.php?driver=".$row['driver_id']."'><i class='fas fa-trash'></i></a></td>";
    echo "<td scope='row'><a href='".$updateDriver__URL."'><i class='fas fa-edit'></i></a></td>";
    echo "<td scope='row'><input name='driversl[]' class='form-check-input' type='checkbox' value='".$row['driver_id']."' ></td>";
    echo "</tr>";


return $this->printRecords($index+1,$records);


}
}

?>