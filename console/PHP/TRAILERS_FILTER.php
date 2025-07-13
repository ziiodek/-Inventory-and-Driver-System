<?php
class TrailersFilter{

function filterByTrailerId($trailerId){
    $records= $this->filterByTrailerIdAux($trailerId);
    $this->printRecords(0,$records);
}
function filterByTrailerIdAux($trailerId){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from trailer where trailer_id=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('i',$trailerId);
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

function filterByType($type){
    $records= $this->filterByTypeAux($type);
    $this->printRecords(0,$records);

}

function filterByTypeAux($type){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from trailer where type=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$type);
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
   $query = "select * from trailer where plate_number like ?;";
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
  

   $query = "select * from trailer where state=?;";
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
  

   $query = "select * from trailer where countryId=?;";
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

function printTableHeader(){
    echo "
    <th scope='col'>#</th>
      <th scope='col'>Trailer Id</th>
		  <th scope='col'>Type</th>
		  <th scope='col'>Capacity</th>
          <th scope='col'>Dimensions</th>
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
             $updateTrailer__URL = $urlresolver->addCustomURLParameter("form","trailer","update","trailer",$row['trailer_id']);
           
			echo "<tr>";
			echo "<th scope='row'>".$index."</th>";
			echo "<td scope='row'>".$row['trailer_id']."</td>";
			echo "<td scope='row'>".$row['type']."</td>";
			echo "<td scope='row'>".$row['capacity']."</td>";
			echo "<td scope='row'>".$row['dimensions']."</td>";
			echo "<td scope='row'>".$row['plate_number']."</td>";
			echo "<td scope='row'>".$row['country']."</td>";
			echo "<td scope='row'>".$row['state']."</td>";
			echo "<td scope='row'><a href='../php/delete_trailer.php?trailer=".$row['trailer_id']."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateTrailer__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='trailersl[]' class='form-check-input' type='checkbox' value='".$row['trailer_id']."' ></td>";
			
			echo "</tr>";

            return $this->printRecords($index+1,$records);


}

}


?>