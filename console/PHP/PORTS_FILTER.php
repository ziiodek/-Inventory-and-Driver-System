<?php
class PortsFilter{

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
   $query = "select * from ports where name like ?;";
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
  

   $query = "select * from ports where countryId=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('i',$country);
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
  

   $query = "select * from ports where state=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$state);
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
      <th scope='col'>Port Name</th>
          <th scope='col'>Street</th>
          <th scope='col'>City</th>
          <th scope='col'>State</th>
          <th scope='col'>Country</th>
          <th scope='col'>Zip Code</th>
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
    $updatePort__URL = $urlresolver->addCustomURLParameter("form","port","update","port",$row['id']);
    echo "<tr>";
    echo "<th scope='row'>".($index+1)."</th>";
    echo "<td scope='row'>".$row['name']."</td>";
    echo "<td scope='row'>".$row['street']."</td>";
    echo "<td scope='row'>".$row['city']."</td>";
    echo "<td scope='row'>".$row['state']."</td>";
    echo "<td scope='row'>".$row['country']."</td>";
    echo "<td scope='row'>".$row['zip']."</td>";
    echo "<td scope='row'><a href='../php/delete_port.php?driver=".$row['id']."'><i class='fas fa-trash'></i></a></td>";
    echo "<td scope='row'><a href='".$updatePort__URL."'><i class='fas fa-edit'></i></a></td>";
    echo "<td scope='row'><input name='portsl[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
    echo "</tr>";


return $this->printRecords($index+1,$records);


}
}

?>