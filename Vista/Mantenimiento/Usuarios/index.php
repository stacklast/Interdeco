<?php include ('../../header.php') ?>
<?php include ('../../../Modelo/DAO/Cls.DAO.Combos.php'); //incluimos Clase  DAO de Usuarios ?>
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
        <button id="eliminar" type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
	<div class="row">
		<div class="col-md-12">
	    	<div class="page-header" style="text-align:center;">
			  <h1>Usuarios <small>Mantenimiento</small></h1>
			</div>
	    </div>
	</div>
	<div>
		<div class="col-md-12">
			<div class="form-group col-md-3">
			    <div class="col-sm-10">
			      <button id="nuevo" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
			    </div>
			 </div>
			 <div class="form-group col-md-3">
			    <div class="col-sm-10">
			      <button id="buscar" class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
			    </div>
			 </div>
		</div>
	</div>
	<div class="row">
	   	<div class="col-md-12 panel panel-default">
	   	    <div class="panel-heading">
                 Registros de Usuarios
            </div>
            <!-- /.panel-heading -->
		   	<div class="panel-body">
		   		<div class="table-responsive" id="resultados-busqueda">
			      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>USU_ID</th>
                                            <th>EMP_ID</th>
                                            <th>Alias</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th>Fecha de Registro</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php 
                                     $usuario=array();
                                      $bd=Db::getInstance();
								      $sql="SELECT `USU_ID`, `EMP_ID`, `USU_ALIAS`, `USU_PASSWORD`, `USU_EMAIL`, `USU_FECHA_REGISTRO` FROM `usu_usuario`";
								      $res=$bd->ejecutar($sql);
								      //mysql_fetch_assoc se utiliza para trabajar con array multidimensional
								      while($reg=mysql_fetch_assoc($res))
								      {
								         //recibe cada uno de los registros que tiene la tabla tipo_equipo
								         $usuario[]=$reg;   
								      }   

                                      for($i=0; $i<count($usuario); $i++) { ?>    

                                        <tr class="odd gradeX">
                                            <td class="center">
                                            	<?php echo $usuario[$i]["USU_ID"];?>
                                            	<input type="hidden" id="USU_ID<?php echo $i+1; ?>" value="<?php echo $usuario[$i]["USU_ID"];?>">
                                            </td>
                                            <td>
                                            	<?php echo $usuario[$i]["EMP_ID"];?>
                                            	<input type="hidden" id="EMP_ID<?php echo $i+1; ?>" value="<?php echo $usuario[$i]["EMP_ID"];?>">
                                            </td>
                                            <td>
                                            	<?php echo $usuario[$i]["USU_ALIAS"];?>
                                            	<input type="hidden" id="USU_ALIAS<?php echo $i+1; ?>" value="<?php echo $usuario[$i]["USU_ALIAS"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $usuario[$i]["USU_PASSWORD"];?>
                                            	<input type="hidden" id="USU_PASSWORD<?php echo $i+1; ?>" value="<?php echo $usuario[$i]["USU_PASSWORD"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $usuario[$i]["USU_EMAIL"];?>
                                            	<input type="hidden" id="USU_EMAIL<?php echo $i+1; ?>" value="<?php echo $usuario[$i]["USU_EMAIL"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $usuario[$i]["USU_FECHA_REGISTRO"];?>
                                            	<input type="hidden" id="USU_FECHA_REGISTRO<?php echo $i+1; ?>" value="<?php echo $usuario[$i]["USU_FECHA_REGISTRO"];?>">
                                            </td>
                                            <td>
								            	<button id="EditarUsuario<?php echo $i+1; ?>" class="btn btn-info btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Editar Registro">
								            		<span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
								            	</button> 
								            	<button id="EliminarUsuario<?php echo $i+1; ?>" class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" data-target="#myModal">
								            		<span class="glyphicon glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span>
								            	</button>
								            </td>
                                        </tr>
                                  <?php } ?>
                                    </tbody>
                                </table>
                               <input type="hidden" id="totalregistros" value="<?php echo count($usuario); ?>">
			    </div>	   	
				<form class="form-horizontal" id="usuarios" name="usuarios" style="display:none;">
		    	<div class="col-md-12">
		    		<div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">ID</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="id" name="id" placeholder="ID">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Empleado</label>
				    <div class="col-sm-8">
				    <select id="empleado" name="empleado" class="form-control">
					<?php
					$empleado = new ClsDAO_Combos();
					$reg = $empleado->Get_Empleado();
					 for($i=0; $i<count($reg); $i++) { ?>    
					<option value="<?php echo $reg[$i]["EMP_ID"];?>"><?php echo $reg[$i]["EMP_NOMBRE"]." ".$reg[$i]["EMP_APELLIDO"];?></option>
					 <?php } ?>
					</select>
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Alias</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="alias" name="alias" placeholder="Alias">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Fecha</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="<?php echo date('y/m/d h:m:s'); ?>" readonly="readonly">
				    </div>
				  </div>
		    	</div>
		    	<div class="form-group"></div>
		    	<div  class="col-md-12">
		    	  <div id="div-agregar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="agregar" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</a>
				    </div>
				  </div>
				  <div id="div-modificar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="modificar" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Registro</a>
				    </div>
				  </div>
				  <div id="div-limpiar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="limpiar" type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpiar</a>
				    </div>
				  </div>
				  <div id="div-cancelar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="cancelar" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</a>
				    </div>
				  </div>	
		    	</div>
				
				</form>
		   	</div>
	</div>
	
<?php include ('../../footer.php') ?>