<?php
$tmpEmail = "reyes.yahaira.a@gmail.com";

$output = shell_exec("/env/env3.11/bin/python ./registerUser.py '".''.$tmpEmail.''."'");
echo $output;


$output = shell_exec("/env/env3.11/bin/python ./getUser.py '".''.$tmpEmail.''."'");
echo $output;

//structure for python json

$jsonData = '"name":"somename"';
$myJSON ='{"name":"somename"}';
$output = shell_exec("/env/env3.11/bin/python ./encryptData.py '{".$jsonData."}' '".'"'.$tmpEmail.'"'."'");
echo $output;





//echo $myJSON;


?>