<?php include ('../header.php') ?>
<?php include ('../../Modelo/DAO/Cls.DAO.Combos.php'); //incluimos Clase  DAO de Usuarios ?>
<input type="hidden" id="navegacion" value="ActualizaCliente">
	<div class="row">
		<div class="col-md-12 alert alert-warning">
	    	<div style="text-align:center;">
			  <h1><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>Actualización de Datos</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-info">
			<form class="form-inline">
				<div class="form-group">
				  <label class="control-label" for="buscarcliente"><h4>Buscar Cliente a Actualizar:</h4> </label>
				  <input type="text" name="buscarcliente" class="form-control" id="buscarcliente" placeholder="Pasaporte, Cedula ó Email">
				</div>
				  <button  class="btn btn-primary" id="BusquedaParticipante">Buscar <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		    </form>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">Datos para Actualizar</div>
			<div class="panel-body">
				<form class="form-horizontal" id="actualizaparticipantes" name="actualizaparticipantes">
		    	<div class="col-md-12">
		    	  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">ID</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="id" name="id" placeholder="ID">
				    </div>
				  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Compania</label>
                    <div class="col-sm-8">
                    <select id="compania" name="compania" class="form-control">
                    <?php
                    $compania = new ClsDAO_Combos();
                    $reg = $compania->Get_Compania();
                     for($i=0; $i<count($reg); $i++) { ?>
                    <option value="<?php echo $reg[$i]["COM_ID"];?>"><?php echo $reg[$i]["COM_NOMBRE"];?></option>
                     <?php } ?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Fecha</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="fecha" name="fecha"  value="<?php echo date('y/m/d h:m:s'); ?>" readonly="readonly">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Fecha Inicio</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="fecha" name="fechainicio">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Fecha Fin</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Apellido</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputPassword3" class="col-sm-4 control-label">Género</label>
				    <div class="col-sm-8">
				      <select class="form-control" id="genero" name="genero">
                          <option value="M">Masculino</option>
                          <option value="F">Femenino</option>
                      </select>
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Fecha de Nacimiento</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control date-picker" id="fechana" name="fechana" placeholder="<?php echo date("Y-m-d"); ?>">
				        <label for="date-picker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Pasarporte</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="pasarporte" name="pasarporte" placeholder="Pasarporte">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Nacionalidad</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad">
				    </div>
		    	  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Direccion</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">País</label>
                    <div class="col-sm-8">
                      <select id="pais" name="pais" class="form-control">
                    <?php
                    $pais = new ClsDAO_Combos();
                    $reg = $pais->Get_Pais();
                     for($i=0; $i<count($reg); $i++) { ?>
                    <option value="<?php echo $reg[$i]["PA_NOMBRE"];?>"><?php echo $reg[$i]["PA_NOMBRE"];?></option>
                     <?php } ?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Ciudad</label>
                    <div class="col-sm-8">
                       <input type="text" name="ciudad" id="ciudad" class="form-control">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Provincia / Estado</label>
                    <div class="col-sm-8">
                      <input type="text" name="provincia" id="provincia" class="form-control">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Codigo zip</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="zip" name="zip" placeholder="zip">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Telefono</label>
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
                    <label for="inputEmail3" class="col-sm-4 control-label">Estado</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="estado" name="estado">
                          <option value="A">Activo</option>
                          <option value="P">Pendiente</option>
                          <option value="C">En Confirmación</option>
                          <option value="F">Finalizado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Agente</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="agente" name="agente">
                          <option value="Elizabeth Gallardo">Elizabeth Gallardo</option>
                          <option value="Santiago Benavides">Santiago Benavides</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Información de Vuelo</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="infovuelo" name="infovuelo" placeholder="Infovuelo">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Asentamiento</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="asentamiento" name="asentamiento" >
                          <option value="Hotel Andino">Hotel Andino</option>
                          <option value="Hotel Vista Amazonas">Hotel Vista Amazonas</option>
                          <option value="Hotel Plaza">Hotel Plaza</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="inputEmail3" class="col-sm-4 control-label">Comentarios</label>
                    <div class="col-sm-8">
                      <textarea rows="5"  type="text" class="form-control" id="comentario" name="comentario" placeholder="Comentarios"></textarea>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="inputEmail3" class="col-sm-4 control-label">Seguro de Viaje</label>
                    <div class="col-sm-8">
                      <select name="segurodeviaje" id="segurodeviaje">
                          <option value="SI">SI</option>
                          <option value="NO">NO</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="inputEmail3" class="col-sm-4 control-label">Ticket Aéreo</label>
                    <div class="col-sm-8">
                      <select name="ticketaereo" id="ticketaereo">
                          <option value="SI">SI</option>
                          <option value="NO">NO</option>
                      </select>
                    </div>
                  </div>
		    	<div class="form-group"></div>
		    	<div  class="col-md-12">
		    	  <div id="div-agregar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="agregarParticipante" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</a>
				    </div>
				  </div>
				  <div id="div-modificar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="modificarParticipante" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Registro</a>
				    </div>
				  </div>
				  <div id="div-limpiar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="limpiarParticipante" type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpiar</a>
				    </div>
				  </div>
				  <div id="div-cancelar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="cancelarParticipante" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</a>
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