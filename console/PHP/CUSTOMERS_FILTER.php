<?php
class CustomersFilter{

function filterByCustomerid($customerId){
    $records= $this->filterByCustomeridAux($customerId);
    $this->printRecords(0,$records);


}

function filterByCustomeridAux($customerId){

    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  
   $query = "select * from customers where customer_id=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('i',$customerId);
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
     

   $name = "%$name%";
   $query = "select * from customers where name like ?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('s',$name);
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

function filterByCountryId($countryId){
    $records= $this->filterByCountryIdAux($countryId);
    $this->printRecords(0,$records);

}

function filterByCountryIdAux($countryId){
    include ('utilities.php');

    $conn = mysqli_connect($host,$user,$pass);
	
	
    if(! $conn ){
        die('Could not connect: ' . mysqli_error());
     }
  mysqli_select_db($conn,$database);
  

   $query = "select * from customers where countryId=?;";
   $stmt = $conn->prepare($query);
   $stmt->bind_param('i',$countryId);
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
  

   $query = "select * from customers where state=?;";
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
        $updateCustomer__URL = $urlresolver->addCustomURLParameter("form","customer","update","customer",$row['customer_id']);
		
			echo "<tr>";
			echo "<th scope='row'>".($index+1)."</th>";
			echo "<td scope='row'>".$row['customer_id']."</td>";
			echo "<td scope='row'>".$row['name']."</td>";
			echo "<td scope='row'>".$row['country']."</td>";
			echo "<td scope='row'>".$row['state']."</td>";
			echo "<td scope='row'>".$row['city']."</td>";
			echo "<td scope='row'>".$row['street']."</td>";
			echo "<td scope='row'>".$row['zip']."</td>";
			echo "<td scope='row'><a href='../php/delete_customer.php?customer=".$row['customer_id']."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateCustomer__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='customersl[]' class='form-check-input' type='checkbox' value='".$row['customer_id']."' ></td>";
			
			echo "</tr>";


            return $this->printRecords($index+1,$records);

}


}

?>