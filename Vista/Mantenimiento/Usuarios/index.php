<?php include ('../../header.php') ?>
<?php include ('../../../Modelo/DAO/Cls.DAO.Combos.php'); //incluimos Clase  DAO de Usuarios ?>
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
			      <button id="nuevo" type="button" class="btn btn-success"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Nuevo</button>
			    </div>
			 </div>
			 <div class="col-md-6">
			    <div class="input-group">
			      <input type="text" class="form-control" placeholder="Buscar Usuario...">
			      <span class="input-group-btn">
			        <button id="buscar" class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
			      </span>
			    </div><!-- /input-group -->
		   </div><!-- /.col-lg-6 -->
		</div>
	</div>
	<div class="row">
	   	<div class="col-md-12 panel panel-default">
		   	<div class="panel-body">
		   		<div class="table-responsive" id="resultados-busqueda">
			      <table class="table table-hover">
			        <thead>
			          <tr>
			            <th>ID</th>
			            <th>Empleado</th>
			            <th>Alias</th>
			            <th>Password</th>
			            <th>Email</th>
			            <th>Fecha</th>
			          </tr>
			        </thead>
			        <tbody>
			          <tr class="active">
			            <th scope="row">1</th>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td><button class="btn btn-info btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Editar Campo"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span></button> <button class="btn btn-danger btn-sm" type="button"><span class="glyphicon glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
			          </tr>
			          <tr class="success">
			            <th scope="row">2</th>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td><button class="btn btn-info btn-sm" type="button"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span></button> <button class="btn btn-danger btn-sm" type="button"><span class="glyphicon glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
			          </tr>
			          <tr>
			            <th scope="row">3</th>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td>Table cell</td>
			            <td><button class="btn btn-info btn-sm" type="button"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span></button> <button class="btn btn-danger btn-sm" type="button"><span class="glyphicon glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
			          </tr>
			        </tbody>
			      </table>
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
		    	<div class="col-md-12">
		    	  <div class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="agregar" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</a>
				    </div>
				  </div>
				  <div class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="limpiar" type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Limpiar</a>
				    </div>
				  </div>
				  <div class="form-group col-md-3">
				    <div class="col-sm-10">
				      <a id="cancelar" type="botton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span> Cancelar</a>
				    </div>
				  </div>	
		    	</div>
				
				</form>
		   	</div>
	    	
    	</div>
	</div>
<?php include ('../../footer.php') ?>