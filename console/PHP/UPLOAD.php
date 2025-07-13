<?php

include "ALERT.php";

class Upload{

    function uploadFile($upload_dir,$model,$file,$allowed_types,$maxsize){
        $this->upload($upload_dir,$file,$allowed_types,$maxsize);

    }



    function upload($upload_dir,$file,$allowed_types,$maxsize){

        $alert = new Alert();
        
        $file_tmpname = $file['tmp_name'];
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $filepath = $upload_dir.$file_name;

        if(in_array(strtolower($file_ext), $allowed_types)) {
        
            if ($file_size > $maxsize){
                $alert->status = "danger";
                $alert->message = "File size is larger than the allowed limit";
                

            if(file_exists($filepath)) {
                $filepath = $upload_dir.time().$file_name;
                if( move_uploaded_file($file_tmpname, $filepath)) {
                    $alert->status = "success";
                    $alert->message = "{$file_name} successfully uploaded ";
                    
                    }
                else {
                    $alert->status = "danger";
                    $alert->message = "Error uploading {$file_name}";
                    
                    }
            
            
            }else{
                if( move_uploaded_file($file_tmpname, $filepath)) {
                    $alert->status = "success";
                    $alert->message = "{$file_name} successfully uploaded ";
                    }
                    else {
                    $alert->status = "danger";
                    $alert->message = "Error uploading {$file_name}";
                    }

            }
            

        }else{



        }
               

    }

    return $alert;

}

}



?>