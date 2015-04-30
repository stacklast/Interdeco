$(document).ready(function(){
	$('#cancelarActualizar').click(function(){
		$('.panel').hide();
		$('#buscarclientepago').val("");
	});

	$('#BusquedaParticipantePago').click(function() {
		var accion = "ConsultarParticipante";
		var cliente = $('#buscarclientepago').val();
		//alert(cliente);
		$.ajax({
				type: "POST",
				url: "/Github/Interdeco/Controlador/Controller.Participantes.php",
				data: 'cliente=' + cliente +'&accion='+ accion,
				success: function(response) {
					//alert(response);
					var miArray = new Array()
					var json = $.parseJSON(''+response+'');
						$(json).each(function(i,val){
						var j = 0;
							$.each(val,function(k,v){
							    miArray[j]= v;
							    j++;
							});
						});
                        $("#id").val(miArray[0]);
						$("#participante").val(miArray[5]);
						$('.panel').show();
							},
				error: function(response) {
				}
		});
		return false;
	});
	 /**
	 *  Mantenimiento de la tabla par_participantes
	 *  MODIFICAR
	 */
	$("#registrarPago").click(function(){
		var accion = "registroPago";
		var id = $("#id").val();
		var fpago = $("#fpago option:selected").html();
		var transaccion = $("#transaccion").val();
		var descuento = $("descuento option:selected").html();
		var valor = $("#valor").val();
		var fecha = $("#fecha").val();
		var observacion = $("#observacion").val();
		var estado = $("#estado option:selected").html();
		var datosString = $("#registrodepagos").serialize();
		var dato = '&accion=' + accion+'&id=' + id;

		if(fpago == ""){
			$("#fpago").focus();
			alert('(*)Campo Obligatorio: Ingrese Forma de Pago');
			return false;
		}
		else
		if(transaccion == ""){
			$("#transaccion").focus();
			alert('(*)Campo Obligatorio: Ingrese Nro. Transacción');
			return false;
		}
		else
		if(valor == ""){
			$("#valor").focus();
			alert('(*)Campo Obligatorio: Ingrese valor');
			return false;
		}
		else{
			datos = datosString+dato;
			//alert(datos);
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Pago.php",
			    data: datos,
			    success: function(response) {
			    	$('.panel').hide();
			    	if(response == 1){
			    		alert("No se ha podido Registrar el Pago");
			    	}
			    	else if (response == "Exito"){
			    		$('#myModalLabel2').html('Mensaje !');
						$('.modal-body').html('<div class="alert alert-info" role="alert">El Pago Ha sido registrado con Exito.</div>');
						$('#myModal2').modal('show');
			    		$('.panel').hide();
			    	}
			    	else{
			    		alert(response);
			    	}
			    },
			    error: function(response) {
			    }
			});
			return false;
		}
	});
});