<?php 
/**
 *	@package Transporte
 *	@subpackage Controlador
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file  : Controller.Usuarios.php
 * 	#DATOS : Provienen del archivo Jquery (..js/ajax.js)
 */
include ('../Modelo/DAO/Cls.DAO.Usuarios.php'); //incluimos Clase  DAO de Usuarios
include ('funciones.php');
/**
 * $UsuariosDao variable para instanciar clase
 * @var ClsDAO_Usuarios
 */
@$UsuariosDAO = new ClsDAO_Usuarios();
@$empleado 	  = NoInjection($_POST['empleado']);
@$alias 	  = NoInjection($_POST['alias']);
@$password 	  = EncriptarMD5_SALT($_POST['password']);
@$email 	  = NoInjection($_POST['email']);
@$fecha       = NoInjection($_POST['fecha']);
@$recordar 	  = $_POST['recordar'];

/**
 * $procesar Para realizar accion
 * @var string Valor 
 */
@$procesar 	= NoInjection($_POST['accion']);
if(isset($procesar)){
 	if($procesar == "login"){
	 	echo $UsuariosDAO->ValidarUsuario($email,$password,$recordar);
	}
	if($procesar == "InsertarUsuario"){
		 $insertar= array("".$empleado."","".$alias."","".$password."","".$email."","".$fecha."");
		echo $UsuariosDAO->InsertarUsuario($insertar);
	}
	if($procesar == "ModificarUsuario"){
		
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Usuarios.php";
}
?>