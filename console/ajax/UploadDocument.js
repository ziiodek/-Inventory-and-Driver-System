const uploadFile =(files,shipperNo) =>{

for(var i=0;i<files.length;i++){

$.ajax({
	url: "../PHP/upload_file.php",
    type: "POST",
	 data: {
      'shipperNo':shipperNo,'file':files[i]
    },
    success: function(data) {
      
        alert(data);
		 	
    }
  });
}
}