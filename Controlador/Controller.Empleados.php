<?php 
/**
 *	@package Interdeco
 *	@subpackage Controlador
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file  : Controller.Empleados.php
 * 	#DATOS : Provienen del archivo Jquery (..js/ajax.js)
 */
include ('../Modelo/DAO/Cls.DAO.Empleados.php'); //incluimos Clase  DAO de Usuarios
include ('funciones.php');
/**
 * $EmpleadosDAO variable para instanciar clase
 * @var ClsDAO_Empleados
 */
@$EmpleadosDAO = new ClsDAO_Empleados();

@$id 	      = NoInjection($_POST['id']);
@$compania 	  = NoInjection($_POST['compania']);
@$nombre 	  = NoInjection($_POST['nombre']);
@$apellido    = NoInjection($_POST['apellido']);
@$telefono    = NoInjection($_POST['telefono']);
@$celular 	  = NoInjection($_POST['celular']);
@$pais        = NoInjection($_POST['pais']);
@$provincia   = NoInjection($_POST['provincia']);
@$ciudad      = NoInjection($_POST['ciudad']);
@$direccion   = NoInjection($_POST['direccion']);
@$cargo       = NoInjection($_POST['cargo']);
@$telefax     = NoInjection($_POST['telefax']);
/**
 * $procesar Para realizar accion
 * @var string Valor 
 */
@$procesar 	= NoInjection($_POST['accion']);
if(isset($procesar)){
	if($procesar == "InsertarEmpleado"){
		 $insertar= array("".$compania."","".$nombre."","".$apellido."","".$telefono."","".$celular."","".$pais."","".$provincia."","".$ciudad."","".$direccion."","".$cargo."","".$telefax."");
		echo $EmpleadosDAO->InsertarEmpleado($insertar);
	}
	if($procesar == "ModificarEmpleado"){
		$modificar= array("".$compania."","".$nombre."","".$apellido."","".$telefono."","".$celular."","".$pais."","".$provincia."","".$ciudad."","".$direccion."","".$cargo."","".$telefax."");
		echo $EmpleadosDAO->ModificarEmpleado($id,$modificar);
	}
	if($procesar == "EliminarEmpleado"){
		echo $EmpleadosDAO->EliminarEmpleado($id);
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Usuarios.php";
}
?>