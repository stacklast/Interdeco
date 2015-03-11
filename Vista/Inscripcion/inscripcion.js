$(document).ready(function () {
	$('#envioaplicacion').click(function(){
		var datosString = $("#aplicationform").serialize();
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