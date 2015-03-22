<?php 
/**
 *	@package Interdeco
 *	@subpackage Controlador
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file  : Controller.Inscripcion.php
 * 	#DATOS : Provienen del archivo Jquery (..js/ajax.js)
 */
include ('../Modelo/DAO/Cls.DAO.Inscripcion.php'); //incluimos Clase  DAO de Usuarios
include ('seguridad.php');
/**
 * $ParticipantesDAO variable para instanciar clase
 * @var ClsDAO_Inscripcion
 */
@$InscripcionDAO = new ClsDAO_Inscripcion();

// Tabla Participantes
@$compania 	  	= NoInjection($_POST['compania']);
@$fecha 	  	= NoInjection($_POST['fecha']);
@$fechainicio 	= NoInjection($_POST['fechainicio']);
@$fechafin 	  	= NoInjection($_POST['fechafin']);
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
@$segurodeviaje = NoInjection($_POST['segurodeviaje']);
@$ticketaereo  	= NoInjection($_POST['ticketaereo']);

//Tabla Intermedia Paquetes por Participantes
@$paquete  	    = NoInjection($_POST['paquete']);
@$paquete2  	= NoInjection($_POST['paquete2']);

//Tabla Transporte
@$cantidadtransporte = NoInjection($_POST['cantidadtransporte']);
@$desdetransporte  	 = NoInjection($_POST['desdetransporte']);
@$hastatransporte  	 = NoInjection($_POST['hastatransporte']);

//Tabla Noches Extras
@$lugar  	    = NoInjection($_POST['lugar']);
@$cantidad  	= NoInjection($_POST['cantidad']);
@$hospedaje  	= NoInjection($_POST['hospedaje']);
@$desde  	    = NoInjection($_POST['desde']);
@$hasta  	    = NoInjection($_POST['hasta']);

//Tabla Contactos Emergencia
@$condicionmedica  	= NoInjection($_POST['condicionmedica']);
@$nombrecontacto  	= NoInjection($_POST['nombrecontacto']);
@$apellidocontacto  = NoInjection($_POST['apellidocontacto']);
@$telefonocontacto  = NoInjection($_POST['telefonocontacto']);
@$emailcontacto  	= NoInjection($_POST['emailcontacto']);

//Tabla Detalles Personales
@$ocupacion  	    = NoInjection($_POST['ocupacion']);
@$intereses  	    = NoInjection($_POST['intereses']);
@$estudios  	    = NoInjection($_POST['estudios']);
@$nombre_escuela  	= NoInjection($_POST['nombre_escuela']);
@$trabajo  	        = NoInjection($_POST['trabajo']);
@$redessociales  	= NoInjection($_POST['redessociales']);
@$encuentro  	    = NoInjection($_POST['encuentro']);
@$comparacion  	    = NoInjection($_POST['comparacion']);
@$trip  	        = NoInjection($_POST['trip']);

/**
 * $procesar Para realizar accion
 * @var string Valor 
 */
@$procesar 	= NoInjection($_POST['accion']);
if(isset($procesar)){
	if($procesar == "Inscripcion"){
		 $InsertarParticipante = array("".$compania."","".$fecha."",,"".$fechainicio."","".$fechafin."""".$nombre."","".$apellido."","".$genero."","".$fechana."",
		 	"".$pasarporte."","".$nacionalidad."","".$direccion."","".$pais."","".$provincia."",
		 	"".$ciudad."","".$zip."","".$telefono."","".$email."","".$estado."","".$agente."",
		 	"".$infovuelo."","".$hospedaje."","".$comentario."","".$segurodeviaje."","".$ticketaereo."");
		echo $InscripcionDAO->InsertarParticipante($InsertarParticipante);
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Participantes.php";
}
?>