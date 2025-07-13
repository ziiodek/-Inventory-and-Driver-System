<?php
class User{
	
function checkEmail($email){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $exists = 0;
	  
	  $query = "select email from user where email=?;";
	   $stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$email);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		
		 if($row == null){
			  $stmt->close();
			  $exists = 0;
		 
		 }else {
			 
			 $exists = 1;
		 }
	
	
		return $exists; 

	
}	
	
function checkUser($user_id){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
	  mysqli_select_db($conn,$database);
	  
	  $exists = 0;
	  
	  $query = "select user_id from user where user_id=?;";
	   $stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$user_id);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		
		 if($row == null){
			  $stmt->close();
			  $exists = 0;
		 
		 }else {
			 
			 $exists = 1;
		 }
	
	
		return $exists; 

	
}	


function update_user($email,$password){
	
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
		 
		mysqli_select_db($conn,$database);
		 
			if($this->checkEmail($email) == 1){
				
				
		
			require 'PasswordHash.php';
		 $t_hasher = new PasswordHash(8, FALSE);
		 $salt = $t_hasher->get_random_bytes(10);
		 $salt = $t_hasher->gensalt_private($salt);
		 $hashed_password = $t_hasher->HashPassword($password.$salt);
		
		  $query = "update salt set salt=? where user_id=?;";
		  $stmt = $conn->prepare($query);
		 echo $stmt->bind_param('ss',$salt,$email);
		 $stmt->execute();
		 $stmt->close();
		
		//echo $email;
		  $query = "update user set password=? where user_id=?;";
		  $stmt = $conn->prepare($query);
		 $stmt->bind_param('ss', $hashed_password,$email);
		 $stmt->execute();
		 $stmt->close();
		 
		  $query = "delete from temporary where email=?;";
		  $stmt = $conn->prepare($query);
		 $stmt->bind_param('s', $email);
		 $stmt->execute();
		 $stmt->close();
		 
		  echo "<script>
		  alert('Password reseted');
		  window.location.href='../../LOGIN_VIEW.php';
		  </script>";
		 
		
				
				
			}
	
	
	
}
	
function register_user($name,$lastname,$password,$user_id,$email,$phone,$company_id){
	
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	
	
	    if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
		 
		
		 
			if($this->checkEmail($email) == 1){
				return 0;
				
				
			}else if($this->checkUser($user_id) == 1){
				
				return 1;
				
				
			}else{	


		mysqli_select_db($conn,$database);
		
			
			require 'PasswordHash.php';
		
		
		 $t_hasher = new PasswordHash(8, FALSE);
		 $salt = $t_hasher->get_random_bytes(10);
		 $salt = $t_hasher->gensalt_private($salt);
		 $hashed_password = $t_hasher->HashPassword($password.$salt);
		
		  $query = "insert into salt(user_id,salt) values(?,?);";
		  $stmt = $conn->prepare($query);
		 $stmt->bind_param('ss', $email,$salt);
		 $stmt->execute();
		 $stmt->close();
		
		
		  $query = "insert into user(name,lastname,email,password,company_id,user_id,phone) values(?,?,?,?,?,?,?);";
		  $stmt = $conn->prepare($query);
		 $stmt->bind_param('sssssss', $name,$lastname,$email,$hashed_password,$company_id,$user_id,$phone);
		 $stmt->execute();
		 $stmt->close();
		 
		 return 2;
		
		 
		
			}
	
	
	
	
}
function activateAccount($email){
	include ('utilities.php');
	
	$conn = mysqli_connect($host,$user,$pass);
	  if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
		 
	mysqli_select_db($conn,$database);
	
	$active = 1;
	
	$query = "select email from user where email=?;";
	   $stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$email);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		
		 if($row == null){
			 $stmt->close();
				echo "<script>
				alert('Invalid Email, could not verify');
				</script>";
		 
		 }else {
			 
			$query = "update user set active=? where email=?;";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("is",$active,$email);
			$stmt->execute();
			$stmt->close();
		 }
	
	
		
	
	
	
	
}


function logIn($email,$password){
	include ('utilities.php');
	require 'PasswordHash.php';
	$conn = mysqli_connect($host,$user,$pass);
	  if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
		 
	mysqli_select_db($conn,$database);
	
	
	$query = "select email from user where email=?;";
	   $stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$email);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
	
		if($row != null){
			$stmt->close();
			
			$query = "select user_id,password from user where email=?;";
			$stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$email);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 $row_tmp = $result->fetch_assoc();
		
		$tmp_pass = $row_tmp['password'];
		$user_id = $row_tmp['user_id'];
		$stmt->close();
		
		$query = "select salt from salt where user_id=?;";
		$stmt = $conn->prepare($query);
		 $stmt->bind_param('s',$user_id);
		 $stmt->execute();
		 $result = $stmt->get_result();
		 $row_tmp = $result->fetch_assoc();
		
			$salt = $row_tmp['salt'];
			
			//echo $salt.'<br>';
			//echo $tmp_pass."<br>";
			$stmt->close();
			$t_hasher = new PasswordHash(8, FALSE);
			
			if($t_hasher->CheckPassword($password.$salt,$tmp_pass)){
				
				session_start();
				$_SESSION['user'] = $email;
				
				return 2;
				
				
				
			}else{
				return 0;
				
				
			}
			
			
			
			
		}else{
			$stmt->close();
			
			return 1;
			
			
		}
		
	
	
}

function GenerateUserId(){
		
		
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < 8; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
		
		
	
	
}



}
?>