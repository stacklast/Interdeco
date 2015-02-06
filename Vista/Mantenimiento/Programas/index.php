<?php include ('../../header.php') ?>
<?php include ('../../../Modelo/DAO/Cls.DAO.Combos.php'); //incluimos Clase  DAO de Usuarios ?>
<input type="hidden" id="navegacion" value="Programas">
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
        <button id="eliminarPrograma" type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
	<div class="row">
		<div class="col-md-12">
	    	<div class="page-header" style="text-align:center;">
			  <h1>Programas <small>Mantenimiento</small></h1>
			</div>
	    </div>
	</div>
	<div>
		<div class="col-md-12">
			<div class="form-group col-md-3">
			    <div class="col-sm-10">
			      <button id="nuevoPrograma" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</button>
			    </div>
			 </div>
			 <div class="form-group col-md-3">
			    <div class="col-sm-10">
			      <button id="buscarPrograma" class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
			    </div>
			 </div>
		</div>
	</div>
	<div class="row">
	   	<div class="col-md-12 panel panel-default">
	   	    <div class="panel-heading">
                 Registros de Programas
            </div>
            <!-- /.panel-heading -->
		   	<div class="panel-body">
		   		<div class="table-responsive" id="resultados-busqueda">
			      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>PRO_ID</th>
                                            <th>PAR_ID</th>
                                            <th>Nombre</th>
                                            <th>Dias</th>
                                            <th>Semanas</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Final</th>
                                            <th>Tarifa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php 
                                     $consulta=array();
                                      $bd=Db::getInstance();
								      $sql="SELECT `PRO_ID`, `PAR_ID`, `PRO_NOMBRE`, `PRO_DIAS`, `PRO_SEMANAS`, `PRO_FECHA_INICIO`, `PRO_FECHA_FINALIZACION`, `PRO_TARIFA` FROM `pro_programas`";
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
                                            	<?php echo $consulta[$i]["PRO_ID"];?>
                                            	<input type="hidden" id="PRO_ID<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PRO_ID"];?>">
                                            </td>
                                            <td>
                                            	<?php echo $consulta[$i]["PAR_ID"];?>
                                            	<input type="hidden" id="PAR_ID<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PAR_ID"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PRO_NOMBRE"];?>
                                            	<input type="hidden" id="PRO_NOMBRE<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PRO_NOMBRE"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PRO_DIAS"];?>
                                            	<input type="hidden" id="PRO_DIAS<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PRO_DIAS"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PRO_SEMANAS"];?>
                                            	<input type="hidden" id="PRO_SEMANAS<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PRO_SEMANAS"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PRO_FECHA_INICIO"];?>
                                            	<input type="hidden" id="PRO_FECHA_INICIO<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PRO_FECHA_INICIO"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PRO_FECHA_FINALIZACION"];?>
                                            	<input type="hidden" id="PRO_FECHA_FINALIZACION<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PRO_FECHA_FINALIZACION"];?>">
                                            </td>
                                            <td class="center">
                                            	<?php echo $consulta[$i]["PRO_TARIFA"];?>
                                            	<input type="hidden" id="PRO_TARIFA<?php echo $i+1; ?>" value="<?php echo $consulta[$i]["PRO_TARIFA"];?>">
                                            </td>
                                            <td>
								            	<button id="EditarPrograma<?php echo $i+1; ?>" class="btn btn-info btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Editar Registro">
								            		<span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span>
								            	</button> 
								            	<button id="EliminarPrograma<?php echo $i+1; ?>" class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" data-target="#myModal">
								            		<span class="glyphicon glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span>
								            	</button>
								            </td>
                                        </tr>
                                  <?php } ?>
                                    </tbody>
                                </table>
                               <input type="hidden" id="totalregistrosPrograma" value="<?php echo count($consulta); ?>">
			    </div>	   	
				<form class="form-horizontal" id="programas" name="programas" style="display:none;">
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
				      <select id="participante" name="participante" class="form-control">
                    <?php
                    $participante = new ClsDAO_Combos();
                    $reg = $participante->Get_Participante();
                     for($i=0; $i<count($reg); $i++) { ?>    
                    <option value="<?php echo $reg[$i]["PAR_ID"];?>"><?php echo $reg[$i]["PAR_NOMBRE"];?></option>
                     <?php } ?>
                    </select>
				    </div>
				  </div>
				  <div class="form-group col-md-4">
				    <label for="inputPassword3" class="col-sm-4 control-label">Nombre</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
				    </div>
				 </div>
				 <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Dias</label>
				    <div class="col-sm-8">
				      <input type="tel" class="form-control" id="dias" name="dias" placeholder="Dias">
				    </div>
				 </div>
				 <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Semanas</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="semanas" name="semanas" placeholder="Semanas">
				    </div>
				 </div>
				 <div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Fecha Inicio</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="fechainicio" name="fechainicio" placeholder="Fecha Inicio">
				  </div>
		    	</div>
		    	<div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Fecha Finalización</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="fechafinal" name="fechafinal" placeholder="Fecha Finalización">
				  </div>
		    	</div>
		    	<div class="form-group col-md-4">
				    <label for="inputEmail3" class="col-sm-4 control-label">Tarifa</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="tarifa" name="tarifa" placeholder="Tarifa">
				  </div>
		    	</div>
		    	<div class="form-group"></div>
		    	<div  class="col-md-12">
		    	  <div id="div-agregar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="agregarPrograma" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</a>
				    </div>
				  </div>
				  <div id="div-modificar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="modificarPrograma" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Registro</a>
				    </div>
				  </div>
				  <div id="div-limpiar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="limpiarPrograma" type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpiar</a>
				    </div>
				  </div>
				  <div id="div-cancelar" class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="cancelarPrograma" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</a>
				    </div>
				  </div>	
		    	</div>
				
				</form>
		   	</div>
	</div>
	
<?php include ('../../footer.php') ?>