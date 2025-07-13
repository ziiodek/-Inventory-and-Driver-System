<?php

include 'XMLGENERATOR.php';

$xml_generator_manager = new XMLGenerator();
$xml_generator_manager->exportAllPortsXML();
//echo $license_type;

header('Location: downloadFile.php?file='.$_GET['file']);


?>