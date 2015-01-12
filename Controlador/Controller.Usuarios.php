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
@$rol 		  = NoInjection($_POST['rol']);
@$nombre 	  = NoInjection($_POST['nombre']);
@$apellido 	  = NoInjection($_POST['apellido']);
@$alias 	  = NoInjection($_POST['alias']);
@$email 	  = NoInjection($_POST['email']);
@$cooperativa = NoInjection($_POST['cooperativa']);
@$recordar 	  = $_POST['recordar'];
@$password 	  = EncriptarMD5_SALT($_POST['password']);
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
		$insertar= array("".$cooperativa."","".$rol."","".$nombre."","".$apellido."","".$alias."","".$email."","".$password."");
		echo $UsuariosDAO->InsertarUsuario($insertar);
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Usuarios.php";
}
?>