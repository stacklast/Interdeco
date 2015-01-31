<?php include ('../../header.php') ?>
<?php include ('../../../Modelo/DAO/Cls.DAO.Combos.php'); //incluimos Clase  DAO de Usuarios ?>
<input type="hidden" id="navegacion" value="Companias">
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
        <button id="eliminarCompania" type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
	<div class="row">
		<div class="col-md-12">
	    	<div class="page-header" style="text-align:center;">
			  <h1>Companias <small>Mantenimiento</small></h1>
			</div>
	    </div>
	</div>
	<div>
		<div class="col-md-12">
			<div class="form-group col-md-3">
			    <div class="col-sm-10">
			      <button id="nuevoCompania" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
			    </div>
			 </div>
			 <div class="form-group col-md-3">
			    <div class="col-sm-10">
			      <button id="buscarCompania" class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
			    </div>
			 </div>
		</div>
	</div>
	<div class="row">
	   	<div class="col-md-12 panel panel-default">
	   	    <div class="panel-heading">
                 Registros de Companias
            </div>
            <!-- /.panel-heading -->
		   	<div class="panel-body">
		   		<div class="table-responsive" id="resultados-busqueda">
			      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>COM_ID</th>
                                            <th>Nombre</th>
                                            <th>RUC</th>
                                            <th>Direccion</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
                                            <th>Web</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php 
                                     $consulta=array();
                                      $bd=Db::getInstance();
								      $sql="SELECT `COM_ID`, `COM_NOMBRE`, `COM_RUC`, `COM_DIRECCION`, `COM_TELEFONO`, `COM_EMAIL`, `COM_WEB` FROM `com_compania`";
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
                                            	<?php echo $consulta[$i]["COM_ID"];?>
                                            	<input type="hidden" id="COM_ID<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["COM_ID"];?>">
                                            </td>
                                            <td>
                                            	<?php echo $consulta[$i]["COM_NOMBRE"];?>
                                            	<input type="hidden" id="COM_NOMBRE<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["COM_NOMBRE"];?>">
                                            </td>
                                            <td>
                                            	<?php echo $consulta[$i]["COM_RUC"];?>
                                            	<input type="hidden" id="COM_RUC<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["COM_RUC"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["COM_DIRECCION"];?>
                                            	<input type="hidden" id="COM_DIRECCION<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["COM_DIRECCION"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["COM_TELEFONO"];?>
                                            	<input type="hidden" id="COM_TELEFONO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["COM_TELEFONO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["COM_EMAIL"];?>
                                            	<input type="hidden" id="COM_EMAIL<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["COM_EMAIL"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["COM_WEB"];?>
                                            	<input type="hidden" id="COM_WEB<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["COM_WEB"];?>">
                                            </td>
                                            <td>
								            	<button id="EditarCompania<?php echo $i+1; ?>" class="btn btn-info btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Editar Registro">
								            		<span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
								            	</button> 
								            	<button id="EliminarCompania<?php echo $i+1; ?>" class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" data-target="#myModal">
								            		<span class="glyphicon glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span>
								            	</button>
								            </td>
                                        </tr>
                                  <?php } ?>
                                    </tbody>
                                </table>
                               <input type="hidden" id="totalregistrosCompania" value="<?php echo count($consulta); ?>">
			    </div>	   	
				<form class="form-horizontal" id="companias" name="companias" style="display:none;">
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
		    	  <div id="div-agregar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="agregarCompania" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</a>
				    </div>
				  </div>
				  <div id="div-modificar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="modificarCompania" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Registro</a>
				    </div>
				  </div>
				  <div id="div-limpiar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="limpiarCompania" type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpiar</a>
				    </div>
				  </div>
				  <div id="div-cancelar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="cancelarCompania" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</a>
				    </div>
				  </div>	
		    	</div>
				
				</form>
		   	</div>
	</div>
	
<?php include ('../../footer.php') ?>