$(document).ready(function () {
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
		//tabla cem_contactos_emergencia
		var condicionmedica = $("#condicionmedica").val();
		var nombrecontacto = $("#nombrecontacto").val();
		var apellidocontacto = $("#apellidocontacto").val();
		var emailcontacto = $("#emailcontacto").val();

		
		var paquete = $("#paquete").val();
		var semanas = $("#semanas").val();
		var paquete2 = $("#paquete2").val();
		var semanas2 = $("#semanas2").val();
		var telefonocontacto = $("#telefonocontacto").val();
		var telefonocontacto = $("#telefonocontacto").val();
		var telefonocontacto = $("#telefonocontacto").val();
		var telefonocontacto = $("#telefonocontacto").val();
		var telefonocontacto = $("#telefonocontacto").val();
		var telefonocontacto = $("#telefonocontacto").val();
		datos = datosString;
		alert(datos);
        $.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Vista/Inscripcion/mailsuscripcion.php",
			    data: datos,
			    success: function(response) {
		
			    },
			    error: function(response) {
			    	
			    }
			});
		return false;
	});
});