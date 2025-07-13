<?php
class BrandSFilter{
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
  
   $name = "%$name%";
   $query = "select * from brand where name like ?;";
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

function printTableHeader(){
    echo "
    <th scope='col'>#</th>
      <th scope='col'>Name</th>
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
        $updateBrand__URL = $urlresolver->addCustomURLParameter("form","brand","update","brand",$row['id']);
			echo "<tr>";
			echo "<th scope='row'>".($index+1)."</th>";
			echo "<td scope='row'>".$row['name']."</td>";
			echo "<td scope='row'><a href='../php/delete_brand.php?brand=".$row['id']."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateBrand__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='brandsl[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
			echo "</tr>";

}

}

?>