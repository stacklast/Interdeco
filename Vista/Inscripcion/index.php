
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
			<img src="../../img/logo.png" alt="" class="img-responsive">
			<div class="center-block" style="max-width:700px;background: #ffffff;padding: 15px;">
				<div class="page-header">
				 Congratulations!

					You are just steps away from being part of the experience of a Lifetime with Lead Adventures Ecuador & Galapagos!, we look forward to see you as part of our programs soon. Please fill out all the information that applies to the programs you have chosen, and any questions or doubts can be solved by your Lead travel advisor.
				</div>
				<form>
				<div class="col-md-12 bg-primary text-center">
					 <h1>Participant Details</h1>
				</div>
				<div class="col-md-12">
				<br>
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="nombre">First Name</label>
					    <input type="text" class="form-control" id="nombre" placeholder="Jane Doe">
					  </div>
					</div>
					 <div class="col-md-6">
					 	<div class="form-group">
					    <label for="apellido">Last Name</label>
					    <input type="text" class="form-control" id="apellido" placeholder="Jane Doe">
					  </div>
					 </div>
				</div>
				
				<div class="col-md-12">
					<div class="col-md-6">
						<div class="form-group">
						  	<label for="apellido">Genre</label>
						  	<div class="checkbox">
							    <label>
							      <input type="checkbox" id="genero"> Male
							    </label>
							  </div>
							  <div class="checkbox">
							    <label>
							      <input type="checkbox" id="genero"> Female
							    </label>
							  </div>
						  </div>
					</div>
					<div class="col-md-6">
						  <div class="form-group">
						  <label for="apellido">Date of Birth</label>
							   <input type="date" class="form-control date-picker" id="fechana" name="fechana" placeholder="year/month/day">
					        <label for="date-picker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>
						  </div>
					</div>
				</div>
				  
				<div class="col-md-12">
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="nombre">Passport Number</label>
					    <input type="tel" class="form-control" id="pasaporte" placeholder="">
					  </div>
					</div>
					 <div class="col-md-6">
					 	<div class="form-group">
					    <label for="apellido">Nacionality</label>
					    <input type="text" class="form-control" id="nacionalidad" placeholder="">
					  </div>
					 </div>
				</div>

				<div class="col-md-12">
				    <div class="col-md-12">
					  <div class="form-group">
					    <label for="nombre">Home Address</label>
					    <input type="tel" class="form-control form-group" id="pasaporte" placeholder="">
					    <input type="tel" class="form-control form-group" id="pasaporte" placeholder="">
					    <div class=" form-group col-md-4">
					    	<input type="tel" class="form-control" id="pasaporte" placeholder="">
					    	<label for="">City</label>
					    </div>
					    <div class="form-group col-md-4">
					    	<input type="tel" class="form-control" id="pasaporte" placeholder="">
					    	<label for="">State/Province</label>
					    </div>
					    <div class="form-group col-md-4">
					    	<input type="tel" class="form-control" id="pasaporte" placeholder="">
					    	<label for="">Zip/Postal</label>
					    </div>
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
					  </div>
					  </div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="nombre">Contact Phone number</label>
					    <input type="tel" class="form-control" id="telefono" placeholder="">
					  </div>
					</div>
					 <div class="col-md-6">
					 	<div class="form-group">
					    	<label for="apellido">Email</label>
					    	<input type="text" class="form-control" id="email" placeholder="">
					    </div>
					 </div>
				</div>

				<div class="col-md-12 bg-primary text-center">
					<h1>Emergency Contact Details</h1>
				</div>
				<div class="col-md-12">
				<br>
					<div class="form-group">
						<label for="">Medical Condition or Diet</label>
						<textarea class="form-control" name="" id="condicion-medica" rows="6">
							
						</textarea>
					</div>
				</div>
				<div class="col-md-12">
					<label for="apellido">Emergency Contact Name</label>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    	<input type="text" class="form-control" id="email" placeholder="">
					    	<label for="apellido">First Name</label>
					    </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    	<input type="text" class="form-control" id="email" placeholder="">
					    	<label for="apellido">Last Name</label>
					    </div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6">
					  <div class="form-group">
					    <label for="nombre">Contact Phone number</label>
					    <input type="tel" class="form-control" id="telefono" placeholder="">
					  </div>
					</div>
					 <div class="col-md-6">
					 	<div class="form-group">
					    	<label for="apellido">Email</label>
					    	<input type="text" class="form-control" id="email" placeholder="">
					    </div>
					 </div>
				</div>
				<div class="col-md-12 bg-primary text-center">
					<h1>Program Details</h1>
				</div>
				
				<div class="col-md-12 bg-primary text-center">
					<h1>Extras/Add Ons</h1>
				</div>
				<div class="col-md-12 bg-primary text-center">
					<h1>Personal Details</h1>
				</div>
				<div class="col-md-12 bg-primary text-center">
					<h1>Terms & Conditions</h1>
				</div>
				  
				  <div class="form-group">
				    <label for="exampleInputEmail2">Email</label>
				    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
				  </div>
				  <button type="submit" class="btn btn-info btn-lg">Submit Form</button>
				</form>
			</div>
		</div>
	</div>
	
</div>
	
	<!-- jQuery Version 1.11.0 -->
    <script src="/github/Interdeco/js/jquery-1.11.0.js"></script>

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