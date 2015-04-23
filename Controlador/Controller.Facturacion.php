<?php
/**
 *	@package Interdeco
 *	@subpackage Controlador
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file  : Controller.Inscripcion.php
 * 	#DATOS : Provienen del archivo Jquery (..js/ajax.js)
 */
include ('../Modelo/DAO/Cls.DAO.Facturacion.php'); //incluimos Clase  DAO de Facturacion
include ('seguridad.php');
/**
 * $ParticipantesDAO variable para instanciar clase
 * @var ClsDAO_Inscripcion
 */
@$FacturacionDAO = new ClsDAO_Facturacion();
@$id = NoInjection($_POST['id']);
// Tabla Participantes
/**
 * <!=====================
 *  					    Info tributaria
 *      				   					==================>
 */
@$ambiente         = "1";// 1=pruebas 2=produccion
@$tipoEmision      = "1";// 1=emision normal  2=emision por indisponibilidad del sistema
@$razonSocial 	   = NoInjection($_POST['razonSocial']); //INTERDECO NEGOCIOS Y DESARROLLO INTERNACIONAL CIA. LTDA. -- Alfanumérico Max. 300
@$nombreComercial  = NoInjection($_POST['nombreComercial']);//INTERDECO CIA. LTDA. -- Alfanumérico Max. 300
@$ruc 	           = NoInjection($_POST['ruc']);#13
@$codDoc		   = "01"; // 01 = Factura  04 = Nota de Credito 05= nota de debito 06= guia de remision 07= comprobante de retencion
@$estab			   ="001"; 
@$ptoEmi		   ="001"; // mismo numero de establecimiento donde se va a emitir
@$secuencial 	   = NoInjection($_POST['secuencial']);#13
@$dirMatriz		   = NoInjection($_POST['dirMatriz']);//PICHINCHA / QUITO / JUAN LEON MERA 1574 Y LA PINTA
/**
 * <!=====================
 *  					    Info Factura
 *      				   					==================>
 */
@$fechaEmision 	  	    = date('d/m/y');
@$dirEstablecimiento    = $dirMatriz;//PICHINCHA / QUITO / JUAN LEON MERA 1574 Y LA PINTA
@$contribuyenteEspecial = ""; //vacio ya que no lo es
@$obligadoContabilidad = NoInjection($_POST['obligadoContabilidad']); // Si caso contrario NA
@$tipoIdentificadorComprador = "06"; // 04=ruc 05=cedula 06=pasaporte 07=venta consumidor final 08=identificacion del exterior 09=placa
@$nombre      	= NoInjection($_POST['nombre']);
@$apellido	  	= NoInjection($_POST['apellido']);
@$razonSocialComprador = $nombre." ".$apellido;
@$pasaporte  	= NoInjection($_POST['pasarporte']);
@$identificacionComprador  = $pasaporte;
@$totalSinImpuestos  	= NoInjection($_POST['totalSinImpuestos']);
@$totalDescuento  	= NoInjection($_POST['totalDescuento']);
//totalConImpuestos
@$codigo  	          = "2";// 2=IVA  3=ICE 5=IRBPNR{Impuesto Redimible a las Botellas Plásticas no retornables}
@$codigoPorcentaje  	= "0"; //0=0%  2=12%  6=No Ojeto de Impuesto 7=Excento de Iva
@$descuentoAdicional  	= NoInjection($_POST['descuentoAdicional']);//5% estudiantes
@$baseImponible  	    = NoInjection($_POST['baseImponible']); // subtotal - descuento o solo subtotal si esque no hay descuento.
@$valor  	            = NoInjection($_POST['valor']);//el iva cuanto de  $ para iva

@$descuentoAdicional  	= NoInjection($_POST['descuentoAdicional']);
@$propina  	= "0.00";
@$importeTotal  	= $totalSinImpuestos-$totalDescuento;
@$moneda = "DOLAR";

@$codigoverificador = $fechaEmision.$codDoc.$ruc.$ambiente.$serie.$secuencial.$codigoNum.$tipoEmision;
@$claveAcceso	   = '';
/**
 * <!=====================
 *  					    Detalle
 *      				   					==================>
 */
@$codigoPrincipal  	= NoInjection($_POST['codigoPrincipal']);
@$descripcion  	    = NoInjection($_POST['descripcion']);
@$cantidad  	    = NoInjection($_POST['cantidad']);
@$precioUnitario  	= NoInjection($_POST['precioUnitario']);
@$descuento  	            = NoInjection($_POST['descuento']);
@$precioTotalSinImpuesto  	= NoInjection($_POST['precioTotalSinImpuesto']);
@$precioUnitario  	= NoInjection($_POST['precioUnitario']);
/**
 * <!=====================
 *  					    Adicionales
 *      				   					==================>
 */
@$direccion     = NoInjection($_POST['direccion']);
@$email  		= NoInjection($_POST['email']);
@$telefono      = NoInjection($_POST['telefono']);

/**
 * $procesar Para realizar accion
 * @var string Valor
 */
@$procesar 	= NoInjection($_POST['accion']);
if(isset($procesar)){
	if($procesar == "Facturacion"){

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
	if($procesar == "ObtenerPaquete")
	{
		echo $FacturacionDAO->ObtenerPaquete($id);
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Participantes.php";
}
?>