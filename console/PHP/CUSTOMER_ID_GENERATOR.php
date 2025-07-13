<?php
class CustomerIdGenerator{
	
	function generateId(){
		
		 $characters = '0123456789'; 
    $randomString = ''; 
  
    for ($i = 0; $i < 8; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
		
		
	}


}
?>