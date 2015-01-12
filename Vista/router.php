<?php 
$rutear = $_POST['route'];
if($rutear == "usuarios")
{
	include('Mantenimiento/Usuarios/index.php');
}
?>