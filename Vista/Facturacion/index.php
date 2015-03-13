<?php include ('../header.php') ?>
<input type="hidden" id="navegacion" value="Facturacion">
	<div class="row">
		<div class="col-md-12" style="background:#ED7E00;color:#ffffff;">
	    	<div class="page-header" style="text-align:center;">
			  <h1>Emisión de Facturas</h1>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="<?php echo $domain; ?>/Vista/Facturacion/XML">GENERACION XML</a>
		</div>
		<div class="col-md-12">	
			<form class="form-horizontal" id="companias" name="companias" style="display:block;">
				<h2>Cabecera</h2>
		    	<div class="col-md-12">
		    	  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">ID</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="id" name="id" placeholder="ID">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Participante</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="participante" name="participante" placeholder="Participante">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Compania</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="compania" name="compania" placeholder="Compania">
				    </div>
				  </div>
				  </div>
				  <div class="col-md-12">
				  <div class="form-group col-md-4">
				    <label for="inputPassword3" class="col-sm-4 control-label">Factura Nro.</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Factura Nro.">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Aut. SRI.</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Aut. SRI.">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Fecha</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
				    </div>
				  </div>
				  </div>
				  <div class="col-md-12">
				  <div class="form-group col-md-4">
				    	<label for="inputEmail3" class="col-sm-4 control-label">Fecha Limite</label>
				    	<div class="col-sm-8">
				      	<input type="text" class="form-control" id="fechalim" name="fechalim" placeholder="Fecha Limite">
				 	 	</div>
		    	   </div>
					<div class="form-group col-md-4">
				    	<label for="inputEmail3" class="col-sm-4 control-label">Descuento</label>
				    	<div class="col-sm-8">
				      	<input type="text" class="form-control" id="descuento" name="descuento" placeholder="Descuento">
				 	 	</div>
		    		</div>
		    		<div class="form-group col-md-4">
				    	<label for="inputEmail3" class="col-sm-4 control-label">Observaciones</label>
				    	<div class="col-sm-8">
				      	<input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones">
				 	 	</div>
		    		</div>
		    		</div>
		    		<div class="col-md-12">
		    			<div class="form-group col-md-4">
				    		<label for="inputEmail3" class="col-sm-4 control-label">Estado</label>
				    		<div class="col-sm-8">
				      			<input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
				 	 		</div>
		    			</div>
		    		</div>
		    		<h2>Detalle</h2>
		    		<div class="col-md-12">
		    			  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">ID</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="id" name="id" placeholder="ID">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Factura</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="factura" name="factura" placeholder="Factura">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
						    </div>
						  </div>
		    		</div>
		    		<div class="col-md-12">
		    			<div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Apellido</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">DET_QTY</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="DET_QTY" name="DET_QTY" placeholder="DET_QTY">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Descripcion</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
						    </div>
						  </div>
		    		</div>
		    		<div class="col-md-12">
		    			<div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Total</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="total" name="total" placeholder="Total">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Comentarios</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="comentario" name="comentario" placeholder="Comentarios">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Extras</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="extras" name="extras" placeholder="Extras">
						    </div>
						  </div>
		    		</div>
		    		<div class="col-md-12">
		    			<div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Subtotal</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal">
						    </div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="inputEmail3" class="col-sm-4 control-label">Paypal</label>
						    <div class="col-sm-8">
						      <input type="tel" class="form-control" id="paypal" name="paypal" placeholder="Paypal">
						    </div>
						  </div>
		    		</div>
		    	</div>
		    	<div class="form-group"></div>
		    	<div  class="col-md-12">
		    	  <div id="div-agregar" class="form-group col-md-2">
				    <div class="col-sm-10">
				      <a id="agregarCompania" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</a>
				    </div>
				  </div>
				  <div id="div-modificar" class="form-group col-md-4">
				    <div class="col-sm-10">
				      <a id="modificarCompania" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Guardar y Generar Factura</a>
				    </div>
				  </div>
				  <div id="div-limpiar" class="form-group col-md-2">
				    <div class="col-sm-10">
				      <a id="limpiarCompania" type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpiar</a>
				    </div>
				  </div>
				  <div id="div-cancelar" class="form-group col-md-2">
				    <div class="col-sm-10">
				      <a id="cancelarCompania" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</a>
				    </div>
				  </div>	
		    	</div>
				
				</form>
		</div>
	</div>
<?php include ('../footer.php') ?>