<?php
class Crypto{
    function __construct(){
        
    }
function encryptData($fields){
$email = "reyes.yahaira.a@gmail.com";
$url = 'https://houndapi.herumorilabs.com/encryptData/'.$email;
$headers= array('Accept: application/json','Content-Type: application/json'); 
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');        
$headers = array(
        "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$data = <<<EXP
{
"Model": "Driver",
"Data":"{$fields}"
}
EXP;
curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
$result=curl_exec($curl);
curl_close($curl);
$result = json_decode($result,true);
return $result;        
}
    
function decryptData($fields){
$email = "reyes.yahaira.a@gmail.com";
$url = 'https://houndapi.herumorilabs.com/decryptData/'.$email;
$headers= array('Accept: application/json','Content-Type: application/json'); 
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');            
$headers = array(
            "Content-Type: application/json",
            );
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$data = <<<EXP
{
"Model": "Driver",
"Data":"{$fields}"
}
EXP;
curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
$result=curl_exec($curl);
curl_close($curl);
$result=json_decode($result,true);
return $result;
    
}
}
