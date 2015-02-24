<?php 
/**
 *	@package Interdeco
 *	@subpackage Controlador
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file  : Controller.Companias.php
 * 	#DATOS : Provienen del archivo Jquery (..js/ajax.js)
 */
/include ('../Modelo/DAO/Cls.DAO.Companias.php'); //incluimos Clase  DAO de Usuarios
include ('funciones.php');
/**
 * $CompaniasDAO variable para instanciar clase
 * @var ClsDAO_Companias
 */
@$CompaniasDAO = new ClsDAO_Companias();

@$id 	      = NoInjection($_POST['id']);
@$nombre 	  = NoInjection($_POST['nombre']);
@$ruc 	      = NoInjection($_POST['ruc']);
@$direccion   = NoInjection($_POST['direccion']);
@$telefono    = NoInjection($_POST['telefono']);
@$email 	  = NoInjection($_POST['email']);
@$web         = NoInjection($_POST['web']);
/**
 * $procesar Para realizar accion
 * @var string Valor 
 */
@$procesar 	= NoInjection($_POST['accion']);
if(isset($procesar)){
	if($procesar == "InsertarCompania"){
		 $insertar= array("".$nombre."","".$ruc."","".$direccion."","".$telefono."","".$email."","".$web."");
		echo $CompaniasDAO->InsertarCompania($insertar);
	}
	if($procesar == "ModificarCompania"){
		$modificar= array("".$nombre."","".$ruc."","".$direccion."","".$telefono."","".$email."","".$web."");
		echo $CompaniasDAO->ModificarCompania($id,$modificar);
	}
	if($procesar == "EliminarCompania"){
		echo $CompaniasDAO->EliminarCompania($id);
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Usuarios.php";
}
?>