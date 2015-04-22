<?php include ('../header.php') ?>
<input type="hidden" id="navegacion" value="Pago">

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel2"></h4>
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

	<div class="row">
		<div class="col-md-12 alert alert-warning">
	    	<div style="text-align:center;">
			  <h1><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>Registro de Pagos</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-info">
			<form class="form-inline">
				<div class="form-group">
				  <label class="control-label" for="buscarcliente"><h4>Buscar Cliente:</h4> </label>
				  <input type="email" name="buscarcliente" class="form-control" id="buscarclientepago" placeholder="Pasaporte, Cedula ó Email">
				</div>
				  <button type="submit" class="btn btn-primary" id="BusquedaParticipantePago">Buscar <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		    </form>
		</div>
		<div class="panel panel-primary" style="display:none;">
			<div class="panel-heading">Datos para ingresar el pago</div>
			<div class="panel-body">
				<form class="form-horizontal" id="registrodepagos" name="registrodepagos" >
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
				      	<option value="Dep. Bancario">Bank of American</option>
				      	<option value="Paypal">Paypal</option>
				      	<option value="Trans. Bancaria">Banco Internacional</option>
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
				      <input type="text" class="form-control" id="valor" name="valor" placeholder="0000">
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
				      <a id="registrarPago" type="botton" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Agregar Pago</a>
				    </div>
				  </div>
				  <div id="div-limpiar" class="form-group col-md-2">
				    <div class="col-sm-10">
				      <a id="limpiarPago" type="reset" class="btn btn-info"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpiar</a>
				    </div>
				  </div>
				  <div id="div-cancelar" class="form-group col-md-2">
				    <div class="col-sm-10">
				      <a id="cancelarPago" type="botton" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</a>
				    </div>
				  </div>
		    </div>
		</div>
		</div>
	</div>
<?php include ('../footer.php') ?>