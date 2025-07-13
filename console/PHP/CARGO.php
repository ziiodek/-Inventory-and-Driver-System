<?php
class Cargo{
	
function addCargo($UM,$amount,$unit_value,$total_value,$weight,$UMW,$shipper_no,$type,$merchandise_id,$material_type){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into cargo(UM,amount,unit_value,total_value,weight,UMW,shipper_no,type,merchandise_id,material_type) values(?,?,?,?,?,?,?,?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('siiiisssis',$UM,$amount,$unit_value,$total_value,$weight,$UMW,$shipper_no,$type,$merchandise_id,$material_type);
	$stmt->execute();
	$stmt->close();
	$conn->close();	
	return 0;
		

	
}	
	

function updateCargo($id,$UM,$amount,$unit_value,$total_value,$weight,$UMW,$shipper_no,$type,$merchandise_id,$material_type){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update cargo set UM=?,amount=?,unit_value=?,total_value=?,weight=?,UMW=?,shipper_no=?,type=?,merchandise_id=?,material_type=? where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('siiiisssisi',$UM,$amount,$unit_value,$total_value,$weight,$UMW,$shipper_no,$type,$merchandise_id,$material_type,$id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
}

function deleteCargo($id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from cargo where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	 	
}

function deleteAllCargo(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from cargo;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
	 	
}


function printCargoList(){
		include ('utilities.php');
	
		


		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from cargo;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		 
		
		$urlresolver = new UrlResolver();
		
		 while($row = $result->fetch_assoc()){
			$updateCargo__URL = $urlresolver->addCustomURLParameter("form","cargo","update","cargo",$row['id']);
			$deleteCargo__URL = $urlresolver->generateActionURL("delete","cargo","cargo",$row['id']);
		
			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['shipper_no']."</td>";
			echo "<td scope='row'>".$row['UM']."</td>";
			echo "<td scope='row'>".$row['amount']."</td>";
			echo "<td scope='row'>".$row['unit_value']."</td>";
			echo "<td scope='row'>".$row['total_value']."</td>";
			echo "<td scope='row'>".$row['UMW']."</td>";
			echo "<td scope='row'>".$row['weight']."</td>";
			echo "<td scope='row'>".$row['type']."</td>";
			echo "<td scope='row'>".$row['material_type']."</td>";
			echo "<td scope='row'><a href='".$deleteCargo__URL."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateCargo__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='cargol[]' class='form-check-input' type='checkbox' value='".$row['id']."' ></td>";
			
			echo "</tr>";
			$counter++;
				

				
				
				
				
		 }
		  
		  
	  

	
	
}


function printCargoView($id){
	include ('utilities.php');
	
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from cargo where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 if($row != null){
		echo "<div class='row'>";
		echo "<div class='col-sm-6'>";
		echo "<input type='text' name='shipper_no' class='form-control' value='".$row['shipper_no']."' disabled>";
		echo "</div>";
		echo "</div>";		
		echo "<div class='row'>";
		echo "<div class='col'>";
		echo "<input type='text' name='UM' class='form-control' value='".$row['UM']."' disabled>";
		echo "</div>";
		echo "<div class='col'>";
		echo "<input type='text' name='unit_value' class='form-control' value='".$row['unit_value']."' disabled>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<div class='row'>";
		echo "<div class='col'>";
		echo "<input type='text' name='amount' class='form-control' value='".$row['amount']."' disabled>";
		echo "</div>";
		echo "<div class='col'>";
		echo "<input type='text' name='total_value' class='form-control' value='".$row['total_value']."' disabled>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<div class='row'>";
		echo "<div class='col'>";
		echo "<input type='text' name='UMW' class='form-control' value='".$row['UMW']."' disabled>";
		echo "</div>";
		echo "<div class='col'>";
		echo "<input type='text' name='weight' class='form-control' value='".$row['weight']."' disabled>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<div class='row'>";
		echo "<div class='col-sm-6'>";
		echo "<input type='text' name='type' class='form-control' value='".$row['type']."' disabled>";
		echo "</div>";
		echo "<div class='col-sm-6'>";
		echo "<input type='text' name='material' class='form-control' value='".$row['material_type']."' disabled>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<a href='CARGO_MERCHANDISE.php/cargo=".$row['id']."'><button type='button' class='btn btn-primary purple-btn'>Merchandise</button></a>";
				
		}	
}





function printCargo($id){
	include ('utilities.php');
	  include 'SHIPPING.php';
	  include 'MERCHANDISE.php';
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from cargo where id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){
			echo "<div class='row'>";
		echo "<div class='col-sm-6'>";
		echo "<label>Shipper No:</label>";
		echo "<select class='form-control' name='shipper_no'>";
	    $shipping_manager = new Shipping();
	    $shipping_manager->printShippingsList();
		echo "</select>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<div class='row'>";
		echo "<div class='col-sm-6'>";
		echo "<label>Merchandise:</label>";
		echo "<select class='form-control' name='merchandise'>";
		$merchandise_manager = new Merchandise();
		echo "<option value='".$row['merchandise_id']."'>".$merchandise_manager->getMerchandise($row['merchandise_id'])."</option>";
		
		$merchandise_manager->printMerchandiseOptions();
		echo "</select>";
		echo "</div>";
		echo "</div>";
		echo "<br>";		
		echo "<div class='row'>";
		echo "<div class='col'>";
		echo "<label>Unit of Measure:</label>";
		echo "<select name='UM' class='form-control' required>";
		echo "<option value='".$row['UM']."'>";
		echo $row['UM'];
		echo "</option>";
		echo "</select>";
		echo "</div>";
		echo "<br>";
		echo "<div class='col'>";
		echo "<label>Amount:</label>";
		echo "<input type='text' name='amount' id='amount' class='form-control' value='".$row['amount']."' required>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<div class='row'>";
		echo "<div class='col'>";
		echo "<label>Unit Value per Unit of Measure:</label>";
		echo "<input type='text' name='unit_value' id='unit_value' class='form-control' value='".$row['unit_value']."' required>";
		echo "</div>";
		echo "<div class='col'>";
		echo "<label>Total Value:</label>";
		echo "<input type='text' name='total_value' class='form-control' id='total_value' value='".$row['total_value']."' disabled>";
		echo "<input type='hidden' name='total_value' id='total_value__hidden' value='".$row['total_value']."'>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<div class='row'>";
		echo "<div class='col'>";
		echo "<label>UMW:</label>";
		echo "<select name='UMW' class='form-control' required>";
		echo "<option value='".$row['UMW']."'>";
		echo $row['UMW'];
		echo "</option>";
		echo "<option value='KG'>KG</option>";
		echo "<option value='LB'>LB</option>";
		echo "</select>";
		echo "</div>";
		echo "<div class='col'>";
		echo "<label>Weight:</label>";
		echo "<input type='text' name='weight' class='form-control' value='".$row['weight']."' required>";
		echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<div class='row'>";
		echo "<div class='col-sm-6'>";
		echo "Cargo Type:";
		echo "<select name='type' class='form-control' required>";
		echo "<option value='FTL'>";
		echo "FTL";
		echo "</option>";
		echo "<option value='LTL'>";
		echo "LTL";
		echo "</option>";
		echo "</select>";
		echo "</div>";
  		echo "<div class='col'>";
  		echo "<label>Material Type:</label>";
  		echo "<select name='material' class='form-control' required>";
		  echo "<option value='".$row['material_type']."'>";
		  echo $row['material_type'];
		  echo "</option>";
  		echo "<option value='CONTAINER'>";
  		echo "CONTAINER";
  		echo "</option>";
   		echo "<option value='LIQUID BULK'>";
  		echo "LIQUID BULK";
  		echo "</option>";
  		echo "<option value='DRY BULK'>";
  		echo "DRY BULK";
  		echo "</option>";
  		echo "<option value='BREAK BULK'>";
  		echo "BREAK BULK";
  		echo "</option>";  
  		echo "<option value='LIVESTOCK'>";
  		echo "LIVESTOCK";
  		echo "</option>";
  		echo "<option value='RO-RO'>";
  		echo "RO-RO";
  		echo "</option>";
  		echo "<option value='REFRIGERATED CARGO'>";
  		echo "REFRIGERATED CARGO";
  		echo "</option>";
  		echo "<option value='LIQUID BULK'>";
  		echo "HAZARDOUS MATERIAL";
  		echo "</option>";
		echo "</select>";
		echo "</div>";
		echo "</div>";
		
			 
		
		}
	  
	
	
	
}

}
?>