<?php 
/**
 *	@package Interdeco
 *	@subpackage Controlador
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file  : Controller.Participantes.php
 * 	#DATOS : Provienen del archivo Jquery (..js/ajax.js)
 */
include ('../Modelo/DAO/Cls.DAO.Participantes.php'); //incluimos Clase  DAO de Usuarios
include ('funciones.php');
/**
 * $ParticipantesDAO variable para instanciar clase
 * @var ClsDAO_Participantes
 */
@$ParticipantesDAO = new ClsDAO_Participantes();

@$id 	      	= NoInjection($_POST['id']);
@$compania 	  	= NoInjection($_POST['compania']);
@$fecha 	  	= NoInjection($_POST['fecha']);
@$nombre 	  	= NoInjection($_POST['nombre']);
@$apellido    	= NoInjection($_POST['apellido']);
@$genero      	= NoInjection($_POST['genero']);
@$fechana	  	= NoInjection($_POST['fechana']);
@$pasarporte  	= NoInjection($_POST['pasarporte']);
@$nacionalidad  = NoInjection($_POST['nacionalidad']);
@$direccion     = NoInjection($_POST['direccion']);
@$pais  		= NoInjection($_POST['pais']);
@$provincia     = NoInjection($_POST['provincia']);
@$ciudad        = NoInjection($_POST['ciudad']);
@$zip  			= NoInjection($_POST['zip']);
@$telefono      = NoInjection($_POST['telefono']);
@$email  		= NoInjection($_POST['email']);
@$estado  		= NoInjection($_POST['estado']);
@$agente  		= NoInjection($_POST['agente']);
@$infovuelo  	= NoInjection($_POST['infovuelo']);
@$hospedaje     = NoInjection($_POST['hospedaje']);
@$comentario  	= NoInjection($_POST['comentario']);
/**
 * $procesar Para realizar accion
 * @var string Valor 
 */
@$procesar 	= NoInjection($_POST['accion']);
if(isset($procesar)){
	if($procesar == "InsertarParticipante"){
		 $insertar= array("".$compania."","".$fecha."","".$nombre."","".$apellido."","".$genero."","".$fechana."",
		 	"".$pasarporte."","".$nacionalidad."","".$direccion."","".$pais."","".$provincia."",
		 	"".$ciudad."","".$zip."","".$telefono."","".$email."","".$estado."","".$agente."",
		 	"".$infovuelo."","".$hospedaje."","".$comentario."");
		echo $ParticipantesDAO->InsertarParticipante($insertar);
	}
	if($procesar == "ModificarParticipante"){
		$modificar= array("".$compania."","".$fecha."","".$nombre."","".$apellido."","".$genero."","".$fechana."",
		 	"".$pasarporte."","".$nacionalidad."","".$direccion."","".$pais."","".$provincia."",
		 	"".$ciudad."","".$zip."","".$telefono."","".$email."","".$estado."","".$agente."",
		 	"".$infovuelo."","".$hospedaje."","".$comentario."");
		echo $ParticipantesDAO->ModificarParticipante($id,$modificar);
	}
	if($procesar == "EliminarParticipante"){
		echo $ParticipantesDAO->EliminarParticipante($id);
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Participantes.php";
}
?>