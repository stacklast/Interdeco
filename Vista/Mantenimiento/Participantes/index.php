<?php include ('../../header.php') ?>
<?php include ('../../../Modelo/DAO/Cls.DAO.Combos.php'); //incluimos Clase  DAO de Usuarios ?>
<input type="hidden" id="navegacion" value="Participantes">
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
        <button id="eliminarParticipante" type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
	<div class="row">
		<div class="col-md-12">
	    	<div class="page-header" style="text-align:center;">
			  <h1>Participantes <small>Mantenimiento</small></h1>
			</div>
	    </div>
	</div>
	<div>
		<div class="col-md-12">
			<div class="form-group col-md-3">
			    <div class="col-sm-10">
			      <button id="nuevoParticipante" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
			    </div>
			 </div>
			 <div class="form-group col-md-3">
			    <div class="col-sm-10">
			      <button id="buscarParticipante" class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
			    </div>
			 </div>
		</div>
	</div>
	<div class="row">
	   	<div class="col-md-12 panel panel-default">
	   	    <div class="panel-heading">
                 Registros de Participantes
            </div>
            <!-- /.panel-heading -->
		   	<div class="panel-body">
		   		<div class="table-responsive" id="resultados-busqueda">
			      <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="display: inline-block;overflow-x: auto;">
                                    <thead>
                                        <tr>
                                            <th>PAR_ID</th>
                                            <th>COM_ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Género</th>
                                            <th>Nacimiento</th>
                                            <th>Pasaporte</th>
                                            <th>Nacionalidad</th>
                                            <th>Dirección</th>
                                            <th>País</th>
                                            <th>Provincia</th>
                                            <th>Ciudad</th>
                                            <th>Zip</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
                                            <th>Estado</th>
                                            <th>Agente</th>
                                            <th>Info Vuelo</th>
                                            <th>Asentamiento</th>
                                            <th>Comentarios</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php 
                                     $consulta=array();
                                      $bd=Db::getInstance();
								      $sql="SELECT `PAR_ID`, `COM_ID`, `PAR_NOMBRE`, `PAR_APELLIDO`, `PAR_GENERO`, `PAR_FECHA_NACIMIENTO`, `PAR_NUMERO_PASAPORTE`, `PAR_NACIONALIDAD`, `PAR_DIRECCION`, `PAR_PAIS`, `PAR_PROVINCIA_ESTADO`, `PAR_CIUDAD`, `PAR_ZIP_POSTAL`, `PAR_TELEFONO`, `PAR_EMAIL`, `PAR_ESTADO`, `PAR_AGENTE`, `PAR_INFO_VUELO`, `PAR_ASENTAMIENTO`, `PAR_COMENTARIOS` FROM `par_participantes`";
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
                                            	<?php echo $consulta[$i]["PAR_ID"];?>
                                            	<input type="hidden" id="PAR_ID<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_ID"];?>">
                                            </td>
                                            <td>
                                            	<?php echo $consulta[$i]["COM_ID"];?>
                                            	<input type="hidden" id="COM_ID<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["COM_ID"];?>">
                                            </td>
                                            <td>
                                            	<?php echo $consulta[$i]["PAR_NOMBRE"];?>
                                            	<input type="hidden" id="PAR_NOMBRE<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_NOMBRE"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_APELLIDO"];?>
                                            	<input type="hidden" id="PAR_APELLIDO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_APELLIDO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_GENERO"];?>
                                            	<input type="hidden" id="PAR_GENERO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_GENERO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_FECHA_NACIMIENTO"];?>
                                            	<input type="hidden" id="PAR_FECHA_NACIMIENTO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_FECHA_NACIMIENTO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_NUMERO_PASAPORTE"];?>
                                            	<input type="hidden" id="PAR_NUMERO_PASAPORTE<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_NUMERO_PASAPORTE"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_NACIONALIDAD"];?>
                                            	<input type="hidden" id="PAR_NACIONALIDAD<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_NACIONALIDAD"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_DIRECCION"];?>
                                            	<input type="hidden" id="PAR_DIRECCION<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_DIRECCION"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_PAIS"];?>
                                            	<input type="hidden" id="PAR_PAIS<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_PAIS"];?>">
                                            </td>
                                            <td class="center">
                                                <?php echo $consulta[$i]["PAR_PROVINCIA_ESTADO"];?>
                                                <input type="hidden" id="PAR_PROVINCIA_ESTADO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_PROVINCIA_ESTADO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_CIUDAD"];?>
                                            	<input type="hidden" id="PAR_CIUDAD<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_CIUDAD"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_ZIP_POSTAL"];?>
                                            	<input type="hidden" id="PAR_ZIP_POSTAL<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_ZIP_POSTAL"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_TELEFONO"];?>
                                            	<input type="hidden" id="PAR_TELEFONO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_TELEFONO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_EMAIL"];?>
                                            	<input type="hidden" id="PAR_EMAIL<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_EMAIL"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_ESTADO"];?>
                                            	<input type="hidden" id="PAR_ESTADO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_ESTADO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_AGENTE"];?>
                                            	<input type="hidden" id="PAR_AGENTE<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_AGENTE"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_INFO_VUELO"];?>
                                            	<input type="hidden" id="PAR_INFO_VUELO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_INFO_VUELO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_ASENTAMIENTO"];?>
                                            	<input type="hidden" id="PAR_ASENTAMIENTO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_ASENTAMIENTO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PAR_COMENTARIOS"];?>
                                            	<input type="hidden" id="PAR_COMENTARIOS<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_COMENTARIOS"];?>">
                                            </td>
                                            <td>
								            	<button id="EditarParticipante<?php echo $i+1; ?>" class="btn btn-info btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Editar Registro">
								            		<span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
								            	</button> 
								            	<button id="EliminarParticipante<?php echo $i+1; ?>" class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" data-target="#myModal">
								            		<span class="glyphicon glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span>
								            	</button>
								            </td>
                                        </tr>
                                  <?php } ?>
                                    </tbody>
                                </table>
                               <input type="hidden" id="totalregistrosParticipante" value="<?php echo count($consulta); ?>">
			    </div>	   	
				<form class="form-horizontal" id="participantes" name="participantes" style="display:none;">
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
                    <option value="<?php echo $reg[$i]["PA_CODIGO"];?>"><?php echo $reg[$i]["PA_NOMBRE"];?></option>
                     <?php } ?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputEmail3" class="col-sm-4 control-label">Ciudad</label>
                    <div class="col-sm-8">
                       <select name="ciudad" id="ciudad" class="form-control">
                          
                      </select>
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
                      <input type="text" class="form-control" id="agente" name="agente" placeholder="Agente">
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
                      <input type="text" class="form-control" id="asentamiento" name="asentamiento" placeholder="Asentamiento">
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="inputEmail3" class="col-sm-4 control-label">Comentarios</label>
                    <div class="col-sm-8">
                      <textarea rows="5"  type="text" class="form-control" id="comentario" name="comentario" placeholder="Comentarios"></textarea>
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
	</div>
	
<?php include ('../../footer.php') ?>