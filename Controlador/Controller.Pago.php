<?php 
/**
 *	@package Interdeco
 *	@subpackage Controlador
 * 	@author Edwin Benalcácar Espín <softwareywebsoluciones@gmail.com>
 * 	@version 1.0
 * 	#file  : Controller.Pago.php
 * 	#DATOS : Provienen del archivo Jquery (..js/ajax.js)
 */
include ('../Modelo/DAO/Cls.DAO.Pago.php'); //incluimos Clase  DAO de Pago
include ('seguridad.php');
/**
 * $PagoDAO variable para instanciar clase
 * @var ClsDAO_Pago
 */
@$PagoDAO = new ClsDAO_Pago();

@$id 	      = NoInjection($_POST['id']);
@$fpago 	  = NoInjection($_POST['fpago']);
@$transaccion = NoInjection($_POST['transaccion']);
@$descuento   = NoInjection($_POST['descuento']);
@$valor 	  = NoInjection($_POST['valor']);
@$fecha       = NoInjection($_POST['fecha']);
@$observacion = NoInjection($_POST['observacion']);
@$estado 	  = NoInjection($_POST['estado']);

/**
 * $procesar Para realizar accion
 * @var string Valor
 */

sleep(1);//2segundos
@$procesar 	= NoInjection($_POST['accion']);
if(isset($procesar)){
 	if($procesar == "registroPago"){
 		 $insertar= array("".$id."","".$fpago."","".$transaccion."","".$descuento."","".$valor."",
 		 				  "".$fecha."","".$observacion."","".$estado."");
	 	echo $PagoDAO->InsertarPago($insertar);
	}
	if($procesar == "consultaPago"){
		
	 	echo json_encode($PagoDAO->ConsultarPago($id));
	}
}
else{
	echo "Se ha Enviado una petición Errónea: Controller.Usuarios.php";
}
?>