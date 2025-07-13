<?php
class File{

function createDirectory($shipperNo){
    $directory_root='../../shipperDocuments/';
    if(!file_exists($directory_root.$shipperNo)){
        mkdir($directory_root.$shipperNo,0755);
    }    

}


}


?>