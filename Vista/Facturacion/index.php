<?php include ('../header.php') ?>
<?php include ('../../Modelo/DAO/Cls.DAO.Combos.php'); //incluimos Clase  DAO de Usuarios ?>
<?php
	$consulta=array();
    $bd=Db::getInstance();
	$sql="SELECT `COM_ID`, `COM_NOMBRE`, `COM_RUC`, `COM_DIRECCION`, `COM_TELEFONO`, `COM_EMAIL`, `COM_WEB` FROM `com_compania`";
	$res=$bd->ejecutar($sql);
	//mysql_fetch_assoc se utiliza para trabajar con array multidimensional
	while($reg=mysql_fetch_assoc($res))
	{
		//recibe cada uno de los registros que tiene la tabla com_compania
		$consulta[]=$reg;
	}
	$rs = mysql_query("SELECT MAX(FAC_ID) AS FAC_ID FROM fac_cabecera");
	if ($row = mysql_fetch_row($rs)) {
	 $id = trim($row[0]);
	}
 ?>
 <!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel1"></h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <input type="hidden" id="identificador" name="identificador">
        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="navegacion" value="Facturacion">
	<div class="row">
		<div class="col-md-12 alert alert-warning">
	    	<div style="text-align:center;">
			  <h1><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Emisión de Facturas</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="">
			<a href="<?php echo $domain; ?>/Vista/Facturacion/XML">GENERACION XML</a>
		</div>

		<div class="alert alert-success">
			<h3>Datos de la Empresa:</h3>
			<?php
			for($i=0; $i<count($consulta); $i++){
				?>
				<strong>Razon Social:</strong> INTERDECO NEGOCIOS Y DESARROLLO INTERNACIONAL CIA. LTDA. <br>
				<input type="hidden" name="razonSocial" id="razonSocial" value="INTERDECO NEGOCIOS Y DESARROLLO INTERNACIONAL CIA. LTDA.">
                <strong>Nombre Comercial:</strong><?php echo $consulta[$i]["COM_NOMBRE"]; ?> 
                - <strong>R.U.C.</strong><?php echo $consulta[$i]["COM_RUC"]; ?> 
                - <strong>Teléfono:</strong><?php echo $consulta[$i]["COM_TELEFONO"]; ?><br>
                <input type="hidden" name="nombreComercial" id="nombreComercial" value="<?php echo $consulta[$i]["COM_NOMBRE"]; ?>">
                <input type="hidden" name="ruc" id="ruc" value="<?php echo $consulta[$i]["COM_RUC"]; ?>">
                <strong>Dirección Matriz:</strong><?php echo $consulta[$i]["COM_DIRECCION"];?><br>
                <input type="hidden" name="dirMatriz" id="dirMatriz" value="<?php echo $consulta[$i]["COM_DIRECCION"];?>">
                <strong>Dirección Sucursal:</strong> NA <br> 
                <strong>Contribuyente Especial Nro</strong> <br>
                <strong>OBLIGADO A LLEVAR CONTABILIDAD</strong> SI
                <input type="hidden" name="obligadoContabilidad" id="obligadoContabilidad" value="SI">
		 <?php  } ?>
		</div>

		<div class="alert alert-info">
			<form class="form-inline">
				<div class="form-group">
				  <label class="control-label" for="buscarcliente"><h4>Asignar Cliente:</h4> </label>
				  <input type="text" name="buscarclienteFactura" class="form-control" id="buscarclienteFactura" placeholder="Pasaporte, Cedula ó Email">
				</div>
				  <button type="submit" class="btn btn-primary" id="busquedaClienteFactura">Buscar <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		    </form>
		</div>

		<div class="panel panel-primary" style="display:none;">
			<div class="panel-heading">Comprobación de Datos para la Factura</div>
			<div class="panel-body">
				<form class="form-horizontal" id="generafactura" name="generafactura" style="display:block;">
		    	<div class="col-md-12">
		    		<div class="form-group col-md-4">
					    <label for="inputPassword3" class="col-sm-4 control-label">Factura Nro.</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="secuencial" name="secuencial" value="00000000<?php echo $id+1; ?>" readonly="readonly">
					      <input type="hidden" class="form-control" id="codigoNum" name="codigoNum" value="0000000<?php echo $id+1; ?>" readonly="readonly">
					      <input type="hidden" name="id" id="id">
					    </div>
					  </div>
					  <div class="form-group col-md-4">
					    <label for="inputEmail3" class="col-sm-4 control-label">Fecha</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?php echo date('d/m/Y'); ?>" readonly="readonly">
					      <input type="hidden" name="fechaemisionclave" id="fechaemisionclave" value="<?php echo date('dmY'); ?>">
					    </div>
					  </div>
					  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="nombre" name="nombre" placeholder="Nombre" readonly="readonly">
						    </div>
						  </div>

				  </div>
				  <div class="col-md-12">
				  		<div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Apellido</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="apellido" name="apellido" placeholder="Apellido" readonly="readonly">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">CI./RUC./PASP.</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="pasarporte" name="pasarporte" placeholder="pasaporte" readonly="readonly">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Dirección</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" readonly="readonly">
						    </div>
						  </div>
				  </div>
				  <div class="col-md-12">
				  		<div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
						    <div class="col-sm-8">
						      <input type="email" class="form-control" id="email" name="email" placeholder="email" readonly="readonly">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Teléfono</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="telefono" readonly="readonly">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Paquete</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" readonly="readonly">
						      <input type="hidden" class="form-control" id="codigoPrincipal" name="codigoPrincipal" placeholder="codigoPrincipal">
						      <input type="hidden" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" value="1">
						    </div>
						  </div>
		    		</div>
		    		<div class="col-md-12">
		    			<div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Precio</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="precioUnitario" name="precioUnitario" placeholder="precioUnitario" readonly="readonly">
						    </div>
						  </div>
		    			<div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Descuento</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="totalDescuento" name="totalDescuento" placeholder="Descuento" readonly="readonly">
						 	 </div>
				    	</div>
				    	<div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Total</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="precioTotalSinImpuesto" name="precioTotalSinImpuesto" placeholder="precioTotalSinImpuesto" readonly="readonly">
						    </div>
						  </div>
		    		</div>
		    	</div>
				</form>
			</div>
			<div class="alert alert-info col-md-12 botones" style="display:none;">
			<div class="form-group">
				  <div id="div-modificar" class="form-group col-md-4">
				    <div class="col-sm-10">
				      <a id="generarFactura" type="botton" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Generar Factura</a>
				    </div>
				  </div>
				  <div id="div-cancelar" class="form-group col-md-2">
				    <div class="col-sm-10">
				      <a id="cancelarFactura" type="botton" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</a>
				    </div>
				  </div>
		    </div>
		</div>
		</div>
	</div>
<?php include ('../footer.php') ?>