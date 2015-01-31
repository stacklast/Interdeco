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
@$detalle 	  = NoInjection($_POST['detalle']);
@$participante= NoInjection($_POST['participante']);
@$nombre 	  = NoInjection($_POST['nombre']);
@$dias        = NoInjection($_POST['dias']);
@$semanas     = NoInjection($_POST['semanas']);
@$fechainicio = NoInjection($_POST['fechainicio']);
@$fechafinal  = NoInjection($_POST['fechafinal']);
@$tarifa      = NoInjection($_POST['tarifa']);
@$recordar 	  = $_POST['recordar'];
/**
 * $procesar Para realizar accion
 * @var string Valor 
 */
@$procesar 	= NoInjection($_POST['accion']);
if(isset($procesar)){
	if($procesar == "InsertarPrograma"){
		 $insertar= array("".$detalle."","".$participante."","".$nombre."","".$dias."","".$semanas."","".$fechainicio."","".$fechafinal."","".$tarifa."");
		echo $ProgramasDAO->InsertarPrograma($insertar);
	}
	if($procesar == "ModificarPrograma"){
		$modificar= array("".$detalle."","".$participante."","".$nombre."","".$dias."","".$semanas."","".$fechainicio."","".$fechafinal."","".$tarifa."");
		echo $ProgramasDAO->ModificarPrograma($id,$modificar);
	}
	if($procesar == "EliminarPrograma"){
		echo $ProgramasDAO->EliminarPrograma($id);
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Programas.php";
}
?>