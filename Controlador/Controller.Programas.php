<?php 
/**
 *	@package Interdeco
 *	@subpackage Controlador
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file  : Controller.Programas.php
 * 	#DATOS : Provienen del archivo Jquery (..js/ajax.js)
 */
include ('../Modelo/DAO/Cls.DAO.Programas.php'); //incluimos Clase  DAO de Programas
include ('funciones.php');
/**
 * $UsuariosDao variable para instanciar clase
 * @var ClsDAO_Programas
 */
@$ProgramasDAO = new ClsDAO_Programas();
@$id 	      = NoInjection($_POST['id']);
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
	if($procesar == "InsertarPrograma"){
		 $insertar= array("".$empleado."","".$alias."","".$password."","".$email."","".$fecha."");
		echo $ProgramasDAO->InsertarPrograma($insertar);
	}
	if($procesar == "ModificarPrograma"){
		$modificar= array("".$empleado."","".$alias."","".$password."","".$email."","".$fecha."");
		echo $ProgramasDAO->ModificarPrograma($id,$modificar);
	}
	if($procesar == "EliminarPrograma"){
		echo $ProgramasDAO->EliminarPrograma($id);
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Usuarios.php";
}
?>