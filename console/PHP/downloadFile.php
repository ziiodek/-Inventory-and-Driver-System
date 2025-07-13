<?php
$file = $_GET['file'];

$file_path = '../'.$file.'/'.$file.'.xlsx';

header("Cache-Control: public");
header("Content-Description: File Transfer");
header('Content-Type: application/vnd.android.package-archive');
header("Content-Transfer-Encoding: binary");    
header("Content-length: " . filesize($file_path));
header('Content-Disposition: attachment; filename="'.$file.'.xlsx"');
//ob_end_flush();
readfile($file_path);

return true;
  

?>


