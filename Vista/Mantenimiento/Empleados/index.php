<?php include ('../../header.php') ?>
<?php include ('../../../Modelo/DAO/Cls.DAO.Combos.php'); //incluimos Clase  DAO de Usuarios ?>
<input type="hidden" id="navegacion" value="Usuarios">
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <input type="hidden" id="identificador" name="identificador">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id="eliminarEmpleado" type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
	<div class="row">
		<div class="col-md-12">
	    	<div class="page-header" style="text-align:center;">
			  <h1>Empleados <small>Mantenimiento</small></h1>
			</div>
	    </div>
	</div>
	<div>
		<div class="col-md-12">
			<div class="form-group col-md-3">
			    <div class="col-sm-10">
			      <button id="nuevoEmpleado" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
			    </div>
			 </div>
			 <div class="form-group col-md-3">
			    <div class="col-sm-10">
			      <button id="buscarEmpleado" class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
			    </div>
			 </div>
		</div>
	</div>
	<div class="row">
	   	<div class="col-md-12 panel panel-default">
	   	    <div class="panel-heading">
                 Registros de Empleados
            </div>
            <!-- /.panel-heading -->
		   	<div class="panel-body">
		   		<div class="table-responsive" id="resultados-busqueda" style="max-width:600px;">
			      <table class="table table-responsive table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>E<br>M<br>P<br>_<br>ID</th>
                                            <th>C<br>O<br>M<br>_<br>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Teléfono</th>
                                            <th>Celular</th>
                                            <th>Pais</th>
                                            <th>Provincia/Estado</th>
                                            <th>Ciudad</th>
                                            <th>Dirección</th>
                                            <th>Cargo</th>
                                            <th>Telefax</th>
                                            <th>Opcion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php 
                                     $consulta=array();
                                      $bd=Db::getInstance();
								      $sql="SELECT `EMP_ID`, `COM_ID`, `EMP_NOMBRE`, `EMP_APELLIDO`, `EMP_TELEFONO`, `EMP_CELULAR` , `EMP_PAIS` , `EMP_PROVINCIA_ESTADO` , `EMP_CIUDAD` , `EMP_DIRECCION`, `EMP_CARGO`, `EMP_TELEFAX`  FROM `emp_empleados`";
								      $res=$bd->ejecutar($sql);
								      //mysql_fetch_assoc se utiliza para trabajar con array multidimensional
								      while($reg=mysql_fetch_assoc($res))
								      {
								         //recibe cada uno de los registros que tiene la tabla tipo_equipo
								         $consulta[]=$reg;   
								      }   
                                      for($i=0; $i<count($consulta); $i++) { ?>    
                                        <tr class="odd gradeX">
                                            <td class="center">
                                            	<?php echo $consulta[$i]["EMP_ID"];?>
                                            	<input type="hidden" id="EMP_ID<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_ID"];?>">
                                            </td>
                                            <td>
                                            	<?php echo $consulta[$i]["COM_ID"];?>
                                            	<input type="hidden" id="COM_ID<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["COM_ID"];?>">
                                            </td>
                                            <td>
                                            	<?php echo $consulta[$i]["EMP_NOMBRE"];?>
                                            	<input type="hidden" id="EMP_NOMBRE<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_NOMBRE"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["EMP_APELLIDO"];?>
                                            	<input type="hidden" id="EMP_APELLIDO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_APELLIDO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["EMP_TELEFONO"];?>
                                            	<input type="hidden" id="EMP_TELEFONO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_TELEFONO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["EMP_CELULAR"];?>
                                            	<input type="hidden" id="EMP_CELULAR<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_CELULAR"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["EMP_PAIS"];?>
                                            	<input type="hidden" id="EMP_PAIS<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_PAIS"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["EMP_PROVINCIA_ESTADO"];?>
                                            	<input type="hidden" id="EMP_PROVINCIA_ESTADO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_PROVINCIA_ESTADO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["EMP_CIUDAD"];?>
                                            	<input type="hidden" id="EMP_CIUDAD<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_CIUDAD"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["EMP_DIRECCION"];?>
                                            	<input type="hidden" id="EMP_DIRECCION<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_DIRECCION"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["EMP_CARGO"];?>
                                            	<input type="hidden" id="EMP_CARGO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_CARGO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["EMP_TELEFAX"];?>
                                            	<input type="hidden" id="EMP_TELEFAX<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["EMP_TELEFAX"];?>">
                                            </td>
                                            <td>
								            	<button id="EditarEmpleado<?php echo $i+1; ?>" class="btn btn-info btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Editar Registro">
								            		<span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
								            	</button> 
								            	<button id="EliminarEmpleado<?php echo $i+1; ?>" class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" data-target="#myModal">
								            		<span class="glyphicon glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span>
								            	</button>
								            </td>
                                        </tr>
                                  <?php } ?>
                                    </tbody>
                                </table>
                               <input type="hidden" id="totalregistrosEmpleado" value="<?php echo count($consulta); ?>">
			    </div>	   	
				<form class="form-horizontal" id="empleados" name="empleados" style="display:none;">
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
				    <label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputPassword3" class="col-sm-4 control-label">Apellido</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Teléfono</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="telefono">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Celular</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="celular" name="celular" placeholder="Celular">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">País</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="pais" name="pais" placeholder="País">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Provincia / Estado</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Ciudad</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Dirección</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Cargo</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Telefax</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="telefax" name="telefax" placeholder="Telefax">
				    </div>
				  </div>
		    	</div>
		    	<div class="form-group"></div>
		    	<div  class="col-md-12">
		    	  <div id="div-agregar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="agregarEmpleado" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</a>
				    </div>
				  </div>
				  <div id="div-modificar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="modificarEmpleado" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Registro</a>
				    </div>
				  </div>
				  <div id="div-limpiar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="limpiarEmpleado" type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpiar</a>
				    </div>
				  </div>
				  <div id="div-cancelar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="cancelarEmpleado" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</a>
				    </div>
				  </div>	
		    	</div>
				
				</form>
		   	</div>
	</div>
	
<?php include ('../../footer.php') ?>