<?php
class MerchandiseFilter{
function filterByBrand($brand){
    $records= $this->filterByBrandAux($brand);
    $this->printRecords(0,$records);
}

function filterByBrandAux($brand){

    include ('utilities.php');
   

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from merchandise where brand=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$brand);
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
          <th scope='col'>Brand</th>
          <th scope='col'>Description</th>
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
        $updateMerchandise__URL = $urlresolver->addCustomURLParameter("form","merchandise","update","brand",$row['id']);
        $brand_manager = new Brand();
        echo "<tr>";
        echo "<th scope='row'>".($index+1)."</th>";
        echo "<td scope='row'>".$row['name']."</td>";
        echo "<td scope='row'>".$brand = $brand_manager->getBrand($row['brand'])."</td>";
        echo "<td scope='row'>".$row['description']."</td>";
        echo "<td scope='row'><a href='../php/delete_merchandise.php?merchandise=".$row['id']."'><i class='fas fa-trash'></i></a></td>";
        echo "<td scope='row'><a href='".$updateMerchandise__URL."'><i class='fas fa-edit'></i></a></td>";
        echo "<td scope='row'><input name='merchandisel[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
        echo "</tr>";
        
        
           

}

}

?>