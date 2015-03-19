
<?php include ('../../Modelo/DAO/Cls.DAO.Combos.php'); //incluimos Clase  DAO de Usuarios ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background:url('../../img/bg.jpg');background-size:cover;background-repeat:no-repeat;">
<div class="container">
	<div class="row">
		<div class="col-md-12" style="background:rgba(162,162,168,0.7);">
			<img src="../../img/logo.png" alt="" class="img-responsive" style="margin:0 auto;">
			<br>
			<div class="center-block" style="max-width:700px;background: #ffffff;padding: 10px;  border-radius: 5px;  box-shadow: 3px 3px #E8E3E3;">
				<div class="page-header">
				 <h3 class="text-center"><strong>Congratulations!</strong></h3>
				 You are just steps away from being part of the experience of a Lifetime with Lead Adventures Ecuador & Galapagos!, we look forward to see you as part of our programs soon. Please fill out all the information that applies to the programs you have chosen, and any questions or doubts can be solved by your Lead travel advisor.
				</div>
				<form name="aplicationform" id="aplicationform" class="aplicationform" method="POST">
				<div class="col-md-12 bg-primary text-center" style="border-radius:8px;">
					 <h1>Participant Details</h1>
				</div>
				<div class="col-md-12">
				<br>
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="nombre">First Name</label>
					    <input type="text" class="form-control" id="nombre" placeholder="Name">
					  </div>
					</div>
					 <div class="col-md-6">
					 	<div class="form-group">
					    <label for="apellido">Last Name</label>
					    <input type="text" class="form-control" id="apellido" placeholder="Last Name">
					  </div>
					 </div>
				</div>
				
				<div class="col-md-12">
					<div class="col-md-6">
						<div class="form-group">
						  	<label for="genero">Genre</label>
						  	<div class="radio">
							    <label>
							      <input name="genero" type="radio" id="genero" value="M"> Male
							    </label>
							  </div>
							  <div class="radio">
							    <label>
							      <input name="genero" type="radio" id="genero" value="F"> Female
							    </label>
							  </div>
						  </div>
					</div>
					<div class="col-md-6">
						  <div class="form-group">
						  <label for="fechana">Date of Birth</label>
							   <input type="date" class="form-control date-picker" id="fechana" name="fechana" placeholder="year/month/day">
					        <label for="date-picker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>
						  </div>
					</div>
				</div>
				  
				<div class="col-md-12">
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="pasaporte">Passport Number</label>
					    <input type="tel" class="form-control" id="pasaporte" placeholder="">
					  </div>
					</div>
					 <div class="col-md-6">
					 	<div class="form-group">
					    <label for="nacionalidad">Nacionality</label>
					    <input type="text" class="form-control" id="nacionalidad" placeholder="">
					  </div>
					 </div>
				</div>

				<div class="col-md-12">
				    <div class="col-md-12">
					  <div class="form-group">
					    <label for="direccion">Home Address</label>
					    <input type="text" class="form-control form-group" id="direccion" placeholder="">
					    <div class="form-group col-md-10">
					    	 <select id="pais" name="pais" class="form-control">
		                    <?php
		                    $pais = new ClsDAO_Combos();
		                    $reg = $pais->Get_Pais();
		                     for($i=0; $i<count($reg); $i++) { ?>    
		                    <option value="<?php echo $reg[$i]["PA_CODIGO"];?>"><?php echo $reg[$i]["PA_NOMBRE"];?></option>
		                     <?php } ?>
		                    </select>
					    	<label for="">Country</label>
					    </div>
					    <div class="form-group col-md-4">
					    	<input type="tel" class="form-control" id="provincia" placeholder="">
					    	<label for="">State/Province</label>
					    </div>
					    <div class=" form-group col-md-4">
					    	<input type="tel" class="form-control" id="ciudad" placeholder="">
					    	<label for="">City</label>
					    </div>
					    <div class="form-group col-md-4">
					    	<input type="tel" class="form-control" id="postal" placeholder="">
					    	<label for="">Zip/Postal</label>
					    </div>
					  </div>
					  </div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="telefono">Contact Phone number</label>
					    <input type="tel" class="form-control" id="telefono" placeholder="">
					  </div>
					</div>
					 <div class="col-md-6">
					 	<div class="form-group">
					    	<label for="email">Email</label>
					    	<input type="text" class="form-control" id="email" placeholder="">
					    </div>
					 </div>
				</div>

				<div class="col-md-12 bg-primary text-center" style="border-radius:8px;">
					<h1>Emergency Contact Details</h1>
				</div>
				<div class="col-md-12">
				<br>
					<div class="form-group">
						<label for="condicionmedica">Medical Condition or Diet</label>
						<textarea class="form-control" name="" id="condicionmedica" rows="6">
							
						</textarea>
					</div>
				</div>
				<div class="col-md-12">
					<label for="apellido">Emergency Contact Name</label>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    	<input type="text" class="form-control" id="nombrecontacto" placeholder="">
					    	<label for="apellido">First Name</label>
					    </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    	<input type="text" class="form-control" id="apellidocontacto" placeholder="">
					    	<label for="apellido">Last Name</label>
					    </div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="nombre">Contact Phone number</label>
					    <input type="tel" class="form-control" id="telefonocontacto" placeholder="">
					  </div>
					</div>
					 <div class="col-md-6">
					 	<div class="form-group">
					    	<label for="apellido">Email</label>
					    	<input type="text" class="form-control" id="emailcontacto" placeholder="">
					    </div>
					 </div>
				</div>
				<div class="col-md-12 bg-primary text-center" style="border-radius:8px;">
					<h1>Program Details</h1>
				</div>
				<div class="col-md-12">
					<br>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					<label for="paquete">Program 1</label>
					    	 <select id="paquete" name="paquete" class="form-control">
		                    <?php
		                    $pais = new ClsDAO_Combos();
		                    $reg = $pais->Get_Paquete();
		                     for($i=0; $i<count($reg); $i++) { ?>    
		                    <option value="<?php echo $reg[$i]["PAQ_ID"];?>"><?php echo $reg[$i]["PAQ_NOMBRE"];?></option>
		                     <?php } ?>
		                    </select>
					    	
					    </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="semanas"># Days/Weeks for Program 1</label>
						<input type="text" class="form-control" id="semanas" placeholder="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="paquete2">Program 2</label>
					    	 <select id="paquete2" name="paquete2" class="form-control">
		                    <?php
		                    $pais = new ClsDAO_Combos();
		                    $reg = $pais->Get_Paquete();
		                     for($i=0; $i<count($reg); $i++) { ?>    
		                    <option value="<?php echo $reg[$i]["PAQ_ID"];?>"><?php echo $reg[$i]["PAQ_NOMBRE"];?></option>
		                     <?php } ?>
		                    </select>
					    	
					 </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="semanas2"># Days/Weeks for Program 2</label>
						<input type="text" class="form-control" id="semanas2" placeholder="">
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6">
						  <div class="form-group">
						  <label for="fechainicio">Intended Start Date</label>
							   <input type="date" class="form-control date-picker" id="fechainicio" name="fechainicio" placeholder="year/month/day">
					        <label for="date-picker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>
						  </div>
					</div>
					<div class="col-md-6">
						  <div class="form-group">
						  <label for="fechafinalizacion">Intended Finish Date</label>
							   <input type="date" class="form-control date-picker" id="fechafinalizacion" name="fechafinalizacion" placeholder="year/month/day">
					        <label for="date-picker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>
						  </div>
					</div>
				</div>
				<div class="col-md-12 bg-primary text-center" style="border-radius:8px;">
					<h1>Extras/Add Ons</h1>
				</div>
					<div class="col-md-12">
					<br>
						<label for="extranoche">Extra nights</label>
						
						  	<div class="col-md-12">
							  	<div class="form-group">
							  		<div class="radio-inline">
								    <label>
								      <input name="extranoche" type="radio" id="extranoche" value="si"> Yes
								    </label>
								  </div>
								  <div class="radio-inline">
								    <label>
								      <input name="extranoche" type="radio" id="extranoche" value="no"> No
								    </label>
								  </div>
							  	</div>
						  	</div>
						  	<div class="col-md-6">
							  	<div class="form-group">
							  		<label for="lugar">Where?</label>
							  		<select name="lugar" id="lugar" class="form-control">
							  			<option value="Quito">Quito</option>
							  			<option value="Galapagos Sta. Cruz">Galapagos Sta. Cruz</option>
							  			<option value="Galapagos Cristobal">Galapagos Cristobal</option>
							  			<option value="Galapagos Isabela">Galapagos Isabela</option>
							  		</select>
							  	</div>
							 </div>
							 <div class="col-md-6">
							  	<div class="form-group">
							  		<label for="cantidad">How Many?</label>
							  		<input type="text" id="cantidad" class="form-control">
							  	</div>
						  	</div>
						  	<div class="col-md-12">
						  		<div class="form-group">
						  			<label for="hospedaje">Place</label>
						  			<div class="radio-inline">
									  <label>
									    <input type="radio" name="hospedaje" id="hospedaje" value="Hostel" checked>Hostel
									  </label>
									</div>
									<div class="radio-inline">
									  <label>
									    <input type="radio" name="hospedaje" id="hospedaje" value="Hotel">Hotel
									  </label>
									</div>
									<div class="radio-inline">
									  <label>
									    <input type="radio" name="hospedaje" id="hospedaje" value="Host Family">Family
									  </label>
									</div>
						  		</div>
						  	</div>
						  	<div class="col-md-12">
						  	<div class="form-group">
						  		<label for="fechas">Dates When Needed</label>
						  	</div>
							  	<div class="col-md-6">
							  		<div class="form-group">
										<label for="desde">From</label>
											<input type="date" class="form-control date-picker" id="desde" name="desde" placeholder="year/month/day">
									    <label for="date-picker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>
						  			</div>
							  	</div>
							  	<div class="col-md-6">
							  		<div class="form-group">
										<label for="hasta">To</label>
											<input type="date" class="form-control date-picker" id="hasta" name="hasta" placeholder="year/month/day">
								    	<label for="date-picker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>
						  			</div>
							  	</div>
						  	</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="transferencia">Transfers That Are Not Included</label>
						</div>
						<div class="col-md-12">
							<div class="form-group">
						  	<div class="radio-inline">
							    <label>
							      <input type="radio" name="transferencia" name="transferencia" id="transferencia" value="si"> Yes
							    </label>
							  </div>
							  <div class="radio-inline">
							    <label>
							      <input type="radio" name="transferencia" name="transferencia" id="transferencia" value="no"> No
							    </label>
							  </div>
						  </div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="cantidadtransporte">How Many?</label>
								<input type="text" id="cantidadtransporte" class="form-control">
							</div>
							<div class="form-group">
								<label for="desdetransporte">From</label>
								<input type="text" id="desdetransporte" class="form-control">
							</div>
							<div class="form-group">
								<label for="hastatransporte">To</label>
								<input type="text" id="hastatransporte" class="form-control">
							</div>
						</div>
					</div>

				<div class="col-md-12">
					<div class="form-group">
						<label for="insurence">International Travel Insurance</label>
					</div>
				    <div class="col-md-12">
				    	<div class="form-group">
						  	<div class="radio-inline">
							    <label>
							      <input type="radio" name="insurence" id="insurence" value="si"> Yes
							    </label>
							  </div>
							  <div class="radio-inline">
							    <label>
							      <input type="radio" name="insurence" id="insurence" value="no"> No
							    </label>
							</div>
						</div>
				    </div>
				</div>
				<div class="col-md-12 bg-primary text-center">
					<h1>Personal Details</h1>
				</div>
				<div class="col-md-12">
				<br>
					<div class="col-md-10">
						<div class="form-group">
							<label for="ocupacion">What is your Occupation?</label>
							<input type="text" name="ocupacion" id="ocupacion" class="form-control">
						</div>	
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-10">
						<div class="form-group">
							<label for="intereses">What are your interests / Hobbies?</label>
							<input type="text" name="intereses" id="intereses" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-10">
						<div class="form-group">
							<label for="estudios">What is / was your major in University?</label>
							<input type="text" name="estudios" id="estudios" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-10">
						<div class="form-group">
							<label for="nombre_escuela">Name of School / University / College / Company</label>
							<input type="text" name="nombre_escuela" id="nombre_escuela" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-10">
						<div class="form-group">
							<label for="trabajo">Where do you work?</label>
							<input type="text" name="trabajo" id="trabajo" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6">
						<div class="form-group">
						  	<label for="apellido">Do you use?</label>
						  	<div class="checkbox">
							    <label>
							      <input type="checkbox" name="facebook" id="facebook"> Facebook
							    </label>
							  </div>
							  <div class="checkbox">
							    <label>
							      <input type="checkbox" name="twitter" id="twitter"> Twitter
							    </label>
							  </div>
							  <div class="checkbox">
							    <label>
							      <input type="checkbox" name="linkedIn" id="linkedIn"> LinkedIn
							    </label>
							  </div>
						  </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="otra_red">Another Social Network?</label>
							<input type="text" name="otra_red" id="otra_red" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-10">
						<div class="form-group">
							<label for="encuentro">In which website you found Lead Adventures? (If Google, do you remember the search terms?)?</label>
							<textarea class="form-control" rows="3" id="encuentro"></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-10">
						<div class="form-group">
							<label for="comparacion">Why did you choose Lead Adventures? Did you compare us first? With who?</label>
							<textarea class="form-control" rows="3" id="comparacion"></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-12">
						<div class="form-group">
						  	<label for="trip">How did you fund your trip?</label>
						  	<div class="radio">
							    <label>
							      <input type="radio" name="trip" id="trip" value="Parents"> Parents
							    </label>
							  </div>
							  <div class="radio">
							    <label>
							      <input type="radio" id="trip" name="trip" value="Own Savings"> Own Savings
							    </label>
							  </div>
							  <div class="radio">
							    <label>
							      <input type="radio" id="trip" name="trip" value="Other Organizations"> Other Organizations
							    </label>
							  </div>
						  </div>
					</div>
				</div>
				<div class="col-md-12 bg-primary text-center" style="border-radius:8px;">
					<h1>Terms & Conditions</h1>
					<small>Here you are our Terms & Conditions.</small>
				</div>
				  <div class="col-md-12">
					  <br>
					  <div class="form-group text-center">
					  	<a href="http://www.lead-adventures.com/forms/LEAD%20ADVENTURES%20Terms%20and%20Conditions.pdf"><h4>Read Terms & Conditions</h4></a>
					  </div>
					  <br>
					  <div class="form-group">
					    <label for="exampleInputEmail2">Please if you agree, click on the box below.</label>
					    <div class="checkbox">
							<label>
								<input type="checkbox" name="condiciones" id="condiciones"> I have read and agree with the terms and conditions sheet that is attached to this Form.
						    </label>
						</div>
					  </div>
				  </div>
				  <div class="text-center">
				  	<button type="submit" class="btn btn-info btn-lg" id="envioaplicacion">Submit Form</button>
				  </div>
				  <br>
				</form>
			</div>
			<br><br>
		</div>
	</div>
	Powered by <a href="mailto:softwareywebsoluciones@mail.com">Edwin Benalcázar E.</a>
</div>
	
	<!-- jQuery Version 1.11.0 -->
    <script src="/github/Interdeco/js/jquery-1.11.0.js"></script>
	<script src="/github/Interdeco/Vista/Inscripcion/inscripcion.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script>
		/**
	 * Manejo de Fecha cambio de idioma y rangos
	 */
	$.datepicker.regional['en'] = {
	 dateFormat: 'yy-mm-dd',
	 firstDay: 1,
	 isRTL: false,
	 changeYear: true, // para que se pueda escoger el año
	 yearRange: '-65:+0',//rango de fechas
	 showMonthAfterYear: false,
	 yearSuffix: ''
	 };
	$.datepicker.setDefaults($.datepicker.regional['en']);
	$(".date-picker").datepicker();
	$(".date-picker").on("change", function () {
	    var id = $(this).attr("id");
	    var val = $("label[for='" + id + "']").text();
	    $("#msg").text(val + " changed");
	});
	</script>
     <!-- Bootstrap Core JavaScript -->
    <script src="/github/Interdeco/js/bootstrap.min.js"></script>
</body>
</html>