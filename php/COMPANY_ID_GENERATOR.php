<?php
class CompanyIdGenerator{
	
	function generateCompanyId(){
		
		 $characters = 'ABCDEFGHIJKLMNOPQRSTUVXYZ0123456789abcdefghijklmnopqrstuvxyz'; 
    $randomString = ''; 
  
    for ($i = 0; $i < 8; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
		
		
	}


}
?>