<?php include ('../header.php') ?>
<input type="hidden" id="navegacion" value="Pago">
	<div class="row">
		<div class="col-md-12 alert alert-warning">
	    	<div style="text-align:center;">
			  <h1><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>Pago de Clientes</h1>
			</div>
		</div>
	</div>
	<div class="row">

		<div class="alert alert-info">
			<form class="form-inline">
				<div class="form-group">
				  <label class="control-label" for="buscarcliente"><h4>Buscar Cliente:</h4> </label>
				  <input type="email" name="buscarcliente" class="form-control" id="buscarcliente" placeholder="Pasaporte, Cedula ó Email">
				</div>
				  <button type="submit" class="btn btn-primary">Buscar <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		    </form>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">Datos para ingresar el pago</div>
			<div class="panel-body">
				<form class="form-horizontal" id="companias" name="companias" style="display:block;">
		    	<div class="col-md-12">
		    	  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">ID</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="id" name="id" placeholder="ID" readonly="readonly">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Cliente</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="participante" name="participante" placeholder="Participante" readonly="readonly">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Forma de Pago</label>
				    <div class="col-sm-8">
				      <select name="fpago" id="fpago" class="form-control">
				      	<option value="Dep. Bancario">Dep. Bancario</option>
				      	<option value="Paypal">Paypal</option>
				      	<option value="Trans. Bancaria">Trans. Bancaria</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Nro. Transacción</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="transaccion" name="transaccion" placeholder="Nro.">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputPassword3" class="col-sm-4 control-label">Descuento</label>
				    <div class="col-sm-8">
				      <select name="descuento" id="descuento" class="form-control">
				      	<option value="Ninguno">Ninguno</option>
				      	<option value="5">Estudiantes 5%</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Valor</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="valor" name="valor" placeholder="0000">
				    </div>
				  </div>
				  </div>
				  <div class="col-md-12">
					  <div class="form-group col-md-4">
					    <label for="inputEmail3" class="col-sm-4 control-label">Fecha</label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
					    </div>
					  </div>
					  <div class="form-group col-md-4">
					    <label for="inputEmail3" class="col-sm-4 control-label">Observación</label>
					    <div class="col-sm-8">
						     <textarea name="observacion" id="observacion" cols="25" rows="5">
						     </textarea>
					 	 </div>
			    	  </div>
		    		<div class="form-group col-md-4">
				    	<label for="inputEmail3" class="col-sm-4 control-label">Estado</label>
				    	<div class="col-sm-8">
				      		<select name="estado" id="estado" class="form-control">
				      			<option value="Cancelado">Cancelado</option>
				      			<option value="Pendiente">Pendiente</option>
				      		</select>
				 	 	</div>
		    		</div>
				  </div>
				</form>
			</div>
			<div class="alert alert-info col-md-12">
			<div class="form-group">
		    	  <div id="div-agregar" class="form-group col-md-2">
				    <div class="col-sm-10">
				      <a id="agregarCompania" type="botton" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Agregar Pago</a>
				    </div>
				  </div>
				  <div id="div-limpiar" class="form-group col-md-2">
				    <div class="col-sm-10">
				      <a id="limpiarCompania" type="reset" class="btn btn-info"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpiar</a>
				    </div>
				  </div>
				  <div id="div-cancelar" class="form-group col-md-2">
				    <div class="col-sm-10">
				      <a id="cancelarCompania" type="botton" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</a>
				    </div>
				  </div>
		    </div>
		</div>
		</div>
	</div>
<?php include ('../footer.php') ?>