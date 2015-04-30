<?php
$pasaporte=$_GET['val1'];
$fechaEmisionClave=$_GET['val2'];
$secuencial=$_GET['val3'];
$fn = $pasaporte.$fechaEmisionClave.$secuencial.".xml"; 
header("Content-Disposition: attachment; filename=$fn");
header('Content-Type: text/xml');
header ("Content-Length: ".filesize($fn));
readfile($fn);
?>