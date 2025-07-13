<?php
class CargoFilter{

function filterByShipperno($shipperNo){
    $records= $this->filterByShippernoAux($shipperNo);
    $this->printRecords(0,$records);

}

function filterByShippernoAux($shipperNo){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from cargo where shipper_no=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$shipperNo);
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
  

   $query = "select * from cargo where type=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$type);
   $stmt->execute();
   $result = $stmt->get_result();
   $index = 0;
   $rows = array();

   $urlresolver = new UrlResolver();
     while($row = $result->fetch_assoc()){
        $rows[$index] = $row;
        $index = $index+1;
        //echo $index;
     }

     return $rows;


}

function printTableHeader(){
    echo "
    <th scope='col'>#</th>
      <th scope='col'>Shipper No</th>
          <th scope='col'>Unit of Measure</th>
          <th scope='col'>Amount</th>
          <th scope='col'>Unit Value</th>
          <th scope='col'>Total Value</th>
          <th scope='col'>Unit of Measure(Weight)</th>
          <th scope='col'>Weight</th>
          <th scope='col'>Type</th>
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
        $updateCargo__URL = $urlresolver->addCustomURLParameter("form","cargo","update","cargo",$row['id']);
		
			echo "<tr>";
			echo "<th scope='row'>".($index+1)."</th>";
			echo "<td scope='row'>".$row['shipper_no']."</td>";
			echo "<td scope='row'>".$row['UM']."</td>";
			echo "<td scope='row'>".$row['amount']."</td>";
			echo "<td scope='row'>".$row['unit_value']."</td>";
			echo "<td scope='row'>".$row['total_value']."</td>";
			echo "<td scope='row'>".$row['UMW']."</td>";
			echo "<td scope='row'>".$row['weight']."</td>";
			echo "<td scope='row'>".$row['type']."</td>";
			echo "<td scope='row'><a href='../php/delete_cargo.php?cargo=".$row['id']."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateCargo__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='cargol[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
			
			echo "</tr>";


            return $this->printRecords($index+1,$records);


}

}


?>