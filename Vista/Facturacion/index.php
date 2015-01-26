<?php include ('../header.php') ?>
	<div class="row">
		<div class="col-md-12">
	    	<div class="page-header" style="text-align:center;">
			  <h1>Facturación</small></h1>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="<?php echo $domain; ?>/Vista/Facturacion/XML">EJEMPLO GENERACION XML</a>
		</div>
		<div class="col-md-12">
			<form class="form-horizontal" id="companias" name="companias" style="display:block;">
		    	<div class="col-md-12">
		    	  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">ID</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="id" name="id" placeholder="ID">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">RUC</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="ruc" name="ruc" placeholder="RUC">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputPassword3" class="col-sm-4 control-label">Dirección</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Teléfono</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">WEB</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="web" name="web" placeholder="URL WEB">
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