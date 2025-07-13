<?php

include 'XMLGENERATOR.php';

$xml_generator_manager = new XMLGenerator();
$xml_generator_manager->exportAllShippingStatusXML();


header('Location: downloadFile.php?file='.$_GET['file']);


?>