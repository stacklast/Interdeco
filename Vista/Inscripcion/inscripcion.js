$(document).ready(function () {
	
	(function(a){a.fn.validCampoFranz=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
	/**
	 * validacion de campos para solo números
	 */
	$('#telefonocontacto').validCampoFranz('0123456789');
	$('#telefono').validCampoFranz('0123456789');
	$('#semanas').validCampoFranz('0123456789');
	$('#semanas2').validCampoFranz('0123456789');
	$('#cantidad').validCampoFranz('0123456789');
	$('#postal').validCampoFranz('0123456789');
	/**
	 * validacion de campos para solo letras
	 */
	$('#nombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#apellido').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#nacionalidad').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#provincia').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#ciudad').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#condicionmedica').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#nombrecontacto').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#apellidocontacto').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#ocupacion').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#intereses').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#estudios').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#nombre_escuela').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#trabajo').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#otra_red').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#encuentro').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#comparacion').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');

	/**
	 * Proceso de Inscripción
	 */
	$('#envioaplicacion').click(function(){
		var datosString = $("#aplicationform").serialize();
		//tabla par_participantes
		var nombre = $("#nombre").val();
		var apellido = $("#apellido").val();
		var genero = $('input[name="genero"]:checked').val();
		var fechana = $("#fechana").val();
		var pasaporte = $("#pasaporte").val();
		var nacionalidad = $("#nacionalidad").val();
		var direccion = $("#direccion").val();
		var pais = $("#pais").val();
		var provincia = $("#provincia").val();
		var ciudad = $("#ciudad").val();
		var postal = $("#postal").val();
		var telefono = $("#telefono").val();
		var email = $("#email").val();
		var segurodeviaje = $('input[name="insurence"]:checked').val();

		//tabla cem_contactos_emergencia
		var condicionmedica = $("#condicionmedica").val();
		var nombrecontacto = $("#nombrecontacto").val();
		var telefonocontacto = $("#telefonocontacto").val();
		var apellidocontacto = $("#apellidocontacto").val();
		var emailcontacto = $("#emailcontacto").val();

		//paquetes x participantes
		var paquete = $("#paquete").val();
		var semanas = $("#semanas").val();
		var paquete2 = $("#paquete2").val();
		var semanas2 = $("#semanas2").val();
		
		//tabla par_participantes
		var fechainicio = $("#fechainicio").val();
		var fechafinalizacion = $("#fechafinalizacion").val();

		//ext_noches_extras
		var extranoche = $('input[name="extranoche"]:checked').val();//si o no
		var lugar = $("#lugar").val();
		var cantidad = $("#cantidad").val();
		var hospedaje = $("#hospedaje").val();
		var desde = $("#desde").val();
		var hasta = $("#hasta").val();

		//ext_transporte
		var transferencia = $('input[name="transferencia"]:checked').val();//si o no
		if(transferencia!= " ")
		{
			var cantidadtransporte = $("#cantidadtransporte").val();
			var desdetransporte = $("#desdetransporte").val();
			var hastatransporte = $("#hastatransporte").val();
		}

		//dep_detalles_personales
		var ocupacion = $("#ocupacion").val();
		var intereses = $("#intereses").val();
		var estudios = $("#estudios").val();
		var nombre_escuela = $("#nombre_escuela").val();
		var trabajo = $("#trabajo").val();
			var facebook = $('input[name="facebook"]:checked').val();
			var twitter = $('input[name="twitter"]:checked').val();
			var linkedIn = $('input[name="linkedIn"]:checked').val();
			var otra_red = $("#otra_red").val();
		var redessociales = facebook +" "+twitter+" "+linkedIn+" "+otra_red;
		var encuentro = $("#encuentro").val();
		var comparacion = $("#comparacion").val();
		var trip = $('input[name="trip"]:checked').val();
		var condiciones = $('input[name="condiciones"]:checked').val();
		var validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		datos = datosString;
		alert(datos);
		if(nombre == ""){
			$("#nombre").focus();
			alert('(*)Campo Obligatorio: Ingrese nombre');
			return false;
		}
		else if(apellido == ""){
			$("#apellido").focus();
			alert('(*)Campo Obligatorio: Ingrese nombre');
			return false;
		}
		else if(email == "" || !validacion_email.test(email)){
			$("#email").focus();
			alert('(*)Campo Obligatorio: Ingrese su email');
			return false;
		}
		else{
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Inscripción.php",
			    data: datos,
			    success: function(response) {
				   alert(response);
			    },
			    error: function(response) {
			    	alert(response);
			    }
			});
			return false;
		}
	});
});