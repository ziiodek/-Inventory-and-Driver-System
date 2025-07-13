<?php
//include('CRYPTO.php');

class Trailer{

//private $Crypto;
function __construct(){
	//$this->Crypto = new Crypto();
}
	
function addTrailer($trailer_id,$type,$capacity,$plate_number,$dimensions,$state,$country,$countryId){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
		}
	  mysqli_select_db($conn,$database);
	  
	  $query = "insert into trailer(trailer_id,type,capacity,plate_number,dimensions,state,country,countryId) values(?,?,?,?,?,?,?,?);";
	   $stmt = $conn->prepare($query);
	  $stmt->bind_param('isissssi',$trailer_id,$type,$capacity,$plate_number,$dimensions,$state,$country,$countryId);
		$stmt->execute();
		$stmt->close();
		$conn->close();
	return 0;
}	
	

function updateTrailer($trailer_id,$type,$capacity,$plate_number,$dimensions,$state,$country,$countryId){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "update trailer set type=?,capacity=?,plate_number=?,dimensions=?,state=?,country=?,countryId=? where trailer_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('sissssii',$type,$capacity,$plate_number,$dimensions,$state,$country,$countryId,$trailer_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	 return 0;
}

function deleteTrailer($trailer_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from trailer where trailer_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$trailer_id);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close(); 
	return 0;
}

function deleteAllTrailer(){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	 $query = "delete from trailer;";
	 $stmt = $conn->prepare($query);
	 $stmt->execute();
	 $stmt->close();
	 $conn->close();
	 return 0; 
	 	
}


function printTrailerList(){
		include ('utilities.php');
		

		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select * from trailer;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
		$counter = 1;
		$urlresolver = new UrlResolver();
		 while($row = $result->fetch_assoc()){
			$updateTrailer__URL = $urlresolver->addCustomURLParameter("form","trailer","update","trailer",$row['trailer_id']);
			$deleteTrailer__URL= $urlresolver->generateActionURL("delete","trailer","trailer",$row['trailer_id']);
			//$fields = "{'type':'".$row['type']."','capacity':'".$row['capacity']."','dimensions':'".$row['dimensions']."','plate_number':'".$row['plate_number']."','country':'".$row['country']."','state':'".$row['state']."'}";
			//$resultDecrypted = $this->Crypto->decryptData($fields);

			
			echo "<tr>";
			echo "<th scope='row'>".$counter."</th>";
			echo "<td scope='row'>".$row['trailer_id']."</td>";
			echo "<td scope='row'>".$row['type']."</td>";
			echo "<td scope='row'>".$row['capacity']."</td>";
			echo "<td scope='row'>".$row['dimensions']."</td>";
			echo "<td scope='row'>".$row['plate_number']."</td>";
			echo "<td scope='row'>".$row['country']."</td>";
			echo "<td scope='row'>".$row['state']."</td>";
			echo "<td scope='row'><a href='".$deleteTrailer__URL."'><i class='fas fa-trash'></i></a></td>";
			echo "<td scope='row'><a href='".$updateTrailer__URL."'><i class='fas fa-edit'></i></a></td>";
			echo "<td scope='row'><input name='trailersl[]' class='form-check-input' type='checkbox' value='".$row['trailer_id']."' ></td>";
			
			echo "</tr>";
			$counter++;
					
		 }
		  $conn->close();
		  return 0;
}


function printTrailerView($trailer_id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from trailer where trailer_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$trailer_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){


	echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<input type='text' name='dimensions' class='form-control' value='".$row['dimensions']."' disabled>";
    echo "</div>";
    echo "<div class='col'>";
    echo "<input type='number' name='capacity' class='form-control' value='".$row['capacity']."' disabled>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
   echo "<div class='row'>";
   echo "<div class='col'>";
   echo " <select name='type' class='form-control' disabled>";
echo "<option value='".$row['type']."'>".$row['type']."</option>";
echo "</select>";
    echo "</div>";
    echo "<div class='col'>";
	 echo "<input type='text' name='plates' class='form-control' value='".$row['plate_number']."' disabled>";
	echo "</div>";
echo "</div>";
echo "<br>";

echo "<div class='row'>";
echo "<div class='col-sm-6'>";
echo "<select name='state' class='form-control' disabled>";
echo "<option value='".$row['state']."'>".$row['state']."</option>";
echo "</select>";
echo "</div>";
echo "</div>";



		
			 
		
		}
	  
	
	
	
}


function printTrailer($trailer_id){
	include ('utilities.php');
	

	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
			return 1;
         }
	  mysqli_select_db($conn,$database);
	  
	  $query = "select * from trailer where trailer_id=?;";
	 $stmt = $conn->prepare($query);
	 $stmt->bind_param('i',$trailer_id);
	  $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 
		 
		 if($row != null){
			//$fields = "{'type':'".$row['type']."','capacity':'".$row['capacity']."','dimensions':'".$row['dimensions']."','plate_number':'".$row['plate_number']."','country':'".$row['country']."','state':'".$row['state']."'}";
			//$resultDecrypted = $this->Crypto->decryptData($fields);

	echo "<div class='row'>";
    echo "<div class='col'>";
	echo "<label>Dimensions:</label>";
	echo "<input type='hidden' name='selectedCountryId' value='".$row['countryId']."' id='selectedCountryId'>";
	echo "<input type='hidden' name='selectedCountryName' id='selectedCountryName'>";
    echo "<input type='text' name='dimensions' class='form-control' value='".$row['dimensions']."' required>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<label>Capacity:</label>";
    echo "<input type='number' name='capacity' class='form-control' value='".$row['capacity']."' required>";
    echo "</div>";
  echo "</div>";
  echo "<br>";
   echo "<div class='row'>";
   echo "<div class='col'>";
   echo "Trailer Type";
   echo " <select name='type' class='form-control' required>";
echo "<option value='".$row['type']."'>".$row['type']."</option>";
echo "<option value='Straight Truck'>Straight Truck</option>";
echo "<option value='Dry Van'>Dry Van</option>";
echo "<option value='Flatbed'>Flatbed</option>";
echo "<option value='Step Deck'>Step Deck</option>";
echo "<option value='Canestoga'>Canestoga</option>";
echo "<option value='Removable Gooseneck'>Removable Gooseneck (RGN)</option>";
echo "<option value='Stretch RGN'>Stretch RGN</option>";
echo "<option value='Lowboy'>Lowboy</option>";
echo "<option value='Refrigerated'>Refrigerated</option>";
echo "<option value='Specialized'>Specialized</option>";
echo "</select>";
    echo "</div>";
    echo "<div class='col'>";
	echo "<label>Plate Number:</label>";
	 echo "<input type='text' name='plates' class='form-control' value='".$row['plate_number']."' required>";
	echo "</div>";
echo "</div>";
echo "<br>";

echo "<div class='row'>";
echo "<div class='col'>";
echo "<label>Country:</label>";
echo "<select name='country' class='form-control' id='country' required>";
echo "</select>";
echo "</div>";
echo "<div class='col'>";
echo "<label>State:</label>";
echo "<select name='state' class='form-control' id='state' required>";
echo "<option value='".$row['state']."'>";
echo $row['state'];
echo "</option>";
echo "</select>";
echo "</div>";
echo "</div>";

		}
$conn->close();	  
return 0;	
	
	
}


function printTrailers(){
		include ('utilities.php');


	
	
		$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
 
		   
	  $query = "select trailer_id from trailer;";
	 $stmt = $conn->prepare($query);
	  $stmt->execute();
	   $result = $stmt->get_result();
	
		 
		
		 
		 while($row = $result->fetch_assoc()){
			
			echo "<option value='".$row['trailer_id']."'>".$row['trailer_id']."</option>";
					
		 }
			
}

}
?>