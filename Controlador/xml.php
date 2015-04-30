<?php
// Creamos el fichero XML y su estructura
$dom = new DomDocument("1.0", "UTF-8");
//creating an xslt adding processing line
//$xslt = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="base.xsl"');
//adding it to the xml
//$dom->appendChild($xslt);
$dom->xmlStandalone = true;
// Defiminos el nodo persona
$factura = $dom->createElement('factura');
// Definimos el atributo de persona 'fecha', llamaremos a una función
// PHP que obtiene la fecha actual en un formato específico
$factura->setAttribute('id', 'comprobante');
$factura->setAttribute('version','1.1.0');

$infoTributaria = $dom->createElement('infoTributaria');
// Campos o nodos de persona
$infoTributaria->appendChild( $dom->createElement('ambiente', $ambiente) );
$infoTributaria->appendChild( $dom->createElement('tipoEmision', $tipoEmision) );
$infoTributaria->appendChild( $dom->createElement('razonSocial', $razonSocial) );
$infoTributaria->appendChild( $dom->createElement('nombreComercial', $nombreComercial) );
$infoTributaria->appendChild( $dom->createElement('ruc', $ruc) );
$infoTributaria->appendChild( $dom->createElement('claveAcceso', $claveAcceso) );
$infoTributaria->appendChild( $dom->createElement('codDoc', $codDoc) );
$infoTributaria->appendChild( $dom->createElement('estab', $estab) );
$infoTributaria->appendChild( $dom->createElement('ptoEmi', $ptoEmi) );
$infoTributaria->appendChild( $dom->createElement('secuencial', $secuencial) );
$infoTributaria->appendChild( $dom->createElement('dirMatriz', $dirMatriz) );
$factura->appendChild($infoTributaria);

$infoFactura = $dom->createElement('infoFactura');
// Campos o nodos de persona
$infoFactura->appendChild( $dom->createElement('fechaEmision', $fechaEmision) );
$infoFactura->appendChild( $dom->createElement('dirEstablecimiento', $dirEstablecimiento) );
$infoFactura->appendChild( $dom->createElement('contribuyenteEspecial', $contribuyenteEspecial) );
$infoFactura->appendChild( $dom->createElement('obligadoContabilidad', $obligadoContabilidad) );
$infoFactura->appendChild( $dom->createElement('tipoIdentificadorComprador', $tipoIdentificadorComprador) );
$infoFactura->appendChild( $dom->createElement('razonSocialComprador', $razonSocialComprador) );
$infoFactura->appendChild( $dom->createElement('identificacionComprador', $identificacionComprador) );
$infoFactura->appendChild( $dom->createElement('totalSinImpuestos', $totalSinImpuestos.'.00' ) );
$infoFactura->appendChild( $dom->createElement('totalDescuento', $totalDescuento.'.00' ));
	$totalConImpuestos= $dom->createElement('totalConImpuestos');
		$totalImpuesto= $dom->createElement('totalImpuesto');
		$totalImpuesto->appendChild( $dom->createElement('codigo', $codigo) );
		$totalImpuesto->appendChild( $dom->createElement('codigoPorcentaje', $codigoPorcentaje) );
		$totalImpuesto->appendChild( $dom->createElement('descuentoAdicional',$totalDescuento.'.00' ));
		$totalImpuesto->appendChild( $dom->createElement('baseImponible', $totalSinImpuestos.'.00' ) );
		$totalImpuesto->appendChild( $dom->createElement('valor', $totalDescuento.'.00' ) );
		$totalConImpuestos->appendChild($totalImpuesto);
	$infoFactura->appendChild($totalConImpuestos);
$infoFactura->appendChild( $dom->createElement('propina', $propina ));
$infoFactura->appendChild( $dom->createElement('importeTotal', $importeTotal.'.00' ));
$infoFactura->appendChild( $dom->createElement('moneda', $moneda ));
// Insertamos el elemento persona en la raiz
$factura->appendChild($infoFactura);

$detalles = $dom->createElement('detalles');
$detalles->appendChild( $dom->createElement('codigoPrincipal', '00'.$id) );
$detalles->appendChild( $dom->createElement('descripcion', $descripcion) );
$detalles->appendChild( $dom->createElement('cantidad', $cantidad) );
$detalles->appendChild( $dom->createElement('precioUnitario', $precioUnitario) );
$detalles->appendChild( $dom->createElement('descuento', $descuento ) );
$detalles->appendChild( $dom->createElement('precioTotalSinImpuesto', $precioTotalSinImpuesto) );
	$impuestos= $dom->createElement('impuestos');
		$impuesto= $dom->createElement('impuesto');
		$impuesto->appendChild( $dom->createElement('codigo', $codigo) );
		$impuesto->appendChild( $dom->createElement('codigoPorcentaje', $codigoPorcentaje) );
		$impuesto->appendChild( $dom->createElement('descuentoAdicional',$totalDescuento.'.00' ));
		$impuesto->appendChild( $dom->createElement('baseImponible', $totalSinImpuestos.'.00' ) );
		$impuesto->appendChild( $dom->createElement('valor', $totalDescuento.'.00' ) );
		$impuestos->appendChild($impuesto);
	$detalles->appendChild($impuestos);
$factura->appendChild($detalles);

$infoAdicional = $dom->createElement('infoAdicional');
$campo = $infoAdicional->appendChild( $dom->createElement('campoAdicional', $direccion) );
$campo->setAttribute('nombre', 'Direccion');
$campo1 = $infoAdicional->appendChild( $dom->createElement('campoAdicional', $email) );
$campo1->setAttribute('nombre', 'Email');
$campo2 = $infoAdicional->appendChild( $dom->createElement('campoAdicional', $telefono) );
$campo2->setAttribute('nombre', 'Telefono');
$factura->appendChild($infoAdicional);
$dom->appendChild($factura);

// Cerramos el fichero
$xmlData = $dom->saveXML();
 
// Le damos formato (para que no lo muestre todo seguido
// sin saltos de línea)
$dom->formatOutput = true;
 
// Guardar el xml como String...
$strings_xml = $dom->saveXML();
 
// ... e indicamos dónde queremos guardarlo (ruta)
$dom->save('xml/'.$pasaporte.$fechaEmisionClave.$secuencial.'.xml'); 
?>