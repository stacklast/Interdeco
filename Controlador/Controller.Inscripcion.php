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
@$fecha 	  	= date('Y-m-d');
@$fechainicio 	= NoInjection($_POST['fechainicio']);
@$fechafin 	  	= NoInjection($_POST['fechafinalizacion']);
@$nombre 	  	= NoInjection($_POST['nombre']);
@$apellido    	= NoInjection($_POST['apellido']);
@$genero      	= NoInjection($_POST['genero']);
@$fechana	  	= NoInjection($_POST['fechana']);
@$pasaporte  	= NoInjection($_POST['pasaporte']);
@$nacionalidad  = NoInjection($_POST['nacionalidad']);
@$direccion     = NoInjection($_POST['direccion']);
@$pais  		= NoInjection($_POST['pais']);
@$provincia     = NoInjection($_POST['provincia']);
@$ciudad        = NoInjection($_POST['ciudad']);
@$zip  			= NoInjection($_POST['postal']);
@$telefono      = NoInjection($_POST['telefono']);
@$email  		= NoInjection($_POST['email']);
@$estado  		= "I";
@$agente  		= "Sin Asignar";
@$infovuelo  	= "Contactar Cliente";
@$hospedaje     = NoInjection($_POST['hospedaje']);
@$comentario  	= "No existen comentarios";
@$segurodeviaje = NoInjection($_POST['insurence']);
@$ticketaereo  	= NoInjection($_POST['ticketaereo']);

//Tabla Intermedia Paquetes por Participantes
@$paquete  	    = NoInjection($_POST['paquete']);
@$paquete2  	= NoInjection($_POST['paquete2']);

//Tabla Transporte
@$transferencia      = NoInjection($_POST['transferencia']);
@$cantidadtransporte = NoInjection($_POST['cantidadtransporte']);
@$desdetransporte  	 = NoInjection($_POST['desdetransporte']);
@$hastatransporte  	 = NoInjection($_POST['hastatransporte']);

//Tabla Noches Extras
@$extranoche  	= NoInjection($_POST['extranoche']);
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

		 $InsertarParticipante = array("1","".$fecha."","".$fechainicio."",
		 	"".$fechafin."","".$nombre."","".$apellido."","".$genero."","".$fechana."",
		 	"".$pasaporte."","".$nacionalidad."","".$direccion."","".$pais."","".$provincia."",
		 	"".$ciudad."","".$zip."","".$telefono."","".$email."","".$estado."","".$agente."",
		 	"".$infovuelo."","".$hospedaje."","".$comentario."","".$segurodeviaje."",
		 	"".$ticketaereo."");
		@$idparticipante =  $InscripcionDAO->InsertarParticipante($InsertarParticipante,$email,$pasaporte);
		echo "idparticipante = "+$idparticipante;
		$InsertarPar_Paq = array("".$idparticipante."","".$paquete."");
		echo "paquete = "+$InscripcionDAO->InsertarPar_Paq($InsertarPar_Paq);

		if($condicionmedica != " " or $nombrecontacto != " " or $apellidocontacto != " "
			or $telefonocontacto != " " or $emailcontacto != " "){
			$InsertarContactoEmergencia = array("".$idparticipante."","".$condicionmedica."",
				"".$nombrecontacto."","".$apellidocontacto."","".$telefonocontacto."",
				"".$emailcontacto."");
			$InscripcionDAO->InsertarContactoEmergencia($InsertarContactoEmergencia);
		}
		if($ocupacion != " " or $intereses != " " or $estudios != " "or $nombre_escuela != " "
		 or $trabajo != " " or $redessociales != " " or $encuentro != " " or $comparacion != " " or $trip != " "){
			$InsertarDetallesPersonales = array("".$idparticipante."","".$ocupacion."","".$intereses."",
				"".$estudios."","".$nombre_escuela."","".$trabajo."","".$redessociales."","".$encuentro."",
				"".$comparacion."","".$trip."");
			$InscripcionDAO->InsertarDetallesPersonales($InsertarDetallesPersonales);
		}

		if($paquete2 != "SelectProgram2"){
			$InsertarPar_Paq2 = array("".$idparticipante."","".$paquete2."");
			$InscripcionDAO->InsertarPar_Paq($InsertarPar_Paq2);
		}
		if($transferencia == "si"){
			$InsertarTransporte = array("".$idparticipante."","".$cantidadtransporte."",
				"".$desdetransporte."","".$hastatransporte."");
			$InscripcionDAO->InsertarTransporte($InsertarTransporte);
		}
		if($extranoche == "si"){
			$InsertarNochesExtras = array("".$idparticipante."","".$lugar."","".$cantidad."",
				"".$hospedaje."","".$desde."","".$hasta."");
			$InscripcionDAO->InsertarNochesExtras($InsertarNochesExtras);
		}
		echo "Datos Ingresados";
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Participantes.php";
}
?>