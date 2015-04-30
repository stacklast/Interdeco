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
@$serie = $estab.$ptoEmi;
@$secuencial 	   = NoInjection($_POST['secuencial']);#13
@$dirMatriz		   = NoInjection($_POST['dirMatriz']);//PICHINCHA / QUITO / JUAN LEON MERA 1574 Y LA PINTA
/**
 * <!=====================
 *  					    Info Factura
 *      				   					==================>
 */
@$fechaEmision 	  	    = date('d/m/Y');
@$dirEstablecimiento    = $dirMatriz;//PICHINCHA / QUITO / JUAN LEON MERA 1574 Y LA PINTA
@$contribuyenteEspecial = ""; //vacio ya que no lo es
@$obligadoContabilidad = NoInjection($_POST['obligadoContabilidad']); // Si caso contrario NA
@$tipoIdentificadorComprador = "06"; // 04=ruc 05=cedula 06=pasaporte 07=venta consumidor final 08=identificacion del exterior 09=placa
@$nombre      	= NoInjection($_POST['nombre']);
@$apellido	  	= NoInjection($_POST['apellido']);
@$razonSocialComprador = $nombre." ".$apellido;
@$pasaporte  	= NoInjection($_POST['pasarporte']);
@$identificacionComprador  = $pasaporte;
@$totalSinImpuestos  	= NoInjection($_POST['precioTotalSinImpuesto']);
@$totalDescuento  	= NoInjection($_POST['totalDescuento']);
//totalConImpuestos
@$codigo  	          = "2";// 2=IVA  3=ICE 5=IRBPNR{Impuesto Redimible a las Botellas Plásticas no retornables}
@$codigoPorcentaje  	= "0"; //0=0%  2=12%  6=No Ojeto de Impuesto 7=Excento de Iva
@$descuentoAdicional  	= $descuento;//5% estudiantes
@$baseImponible  	    = NoInjection($_POST['baseImponible']); // subtotal - descuento o solo subtotal si esque no hay descuento.
@$valor  	            = NoInjection($_POST['valor']);//el iva cuanto de  $ para iva

@$propina  	= "0.00";
@$importeTotal  	= $totalSinImpuestos-$totalDescuento;
@$moneda = "DOLAR";
@$fechaEmisionClave 	  	    = NoInjection($_POST['fechaemisionclave']);
@$codigoNum = NoInjection($_POST['codigoNum']);
@$codigoverificador = $fechaEmisionClave.$codDoc.$ruc.$ambiente.$serie.$secuencial.$codigoNum.$tipoEmision;
@$modulo11 = $FacturacionDAO->Modulo11($codigoverificador);
@$claveAcceso	   = $codigoverificador.$modulo11;
//echo $claveAcceso;
/**
 * <!=====================
 *  					    Detalle
 *      				   					==================>
 */
@$codigoPrincipal  	= NoInjection($_POST['codigoPrincipal']);
@$descripcion  	    = NoInjection($_POST['descripcion']);
@$cantidad  	    = NoInjection($_POST['cantidad']);
@$precioUnitario  	= NoInjection($_POST['precioUnitario']);
@$descuento  	            = $totalDescuento ;
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
		include ('xml.php');
		echo "<h4>Factura Generada Correctamente y sin errores!</h4> 
			  <strong>Cliente</strong>".$razonSocialComprador."<br><br>
			  <strong>CI/RUC/PASP:</strong>".$pasaporte."<br><br>
				<a  target='_blank' href='/GitHub/Interdeco/Controlador/xml/".$pasaporte.$fechaEmisionClave.$secuencial.".xml'>VER XML</a><br><br>
				 <a  target='_blank' href='/GitHub/Interdeco/Controlador/xml/descarga.php?val1=".$pasaporte."&val2=".$fechaEmisionClave."&val3=".$secuencial."'>DESCARGAR XML</a>";
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