$(document).ready(function(){
	$('#cancelarActualizar').click(function(){
		$('.panel').hide();
		$('#buscarclienteFactura').val("");
	});

	$('#busquedaClienteFactura').click(function() {
		var accion = "ConsultarParticipante";
		var cliente = $('#buscarclienteFactura').val();
		alert(cliente);
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
							$("#nombre").val(miArray[5]);
							$("#apellido").val(miArray[6]);
							$("#pasarporte").val(miArray[9]);
							$("#direccion").val(miArray[11]);
							$("#telefono").val(miArray[16]);
							$("#email").val(miArray[17]);
							$("#estado  option[value="+ miArray[18] +"]").attr("selected",true);
							var id = $("#id").val();
							var accion1 = "ObtenerPaquete";
							$.ajax({
									type: "POST",
									url: "/Github/Interdeco/Controlador/Controller.Facturacion.php",
									data: 'id=' + id +'&accion='+ accion1,
									success: function(response) {
											$("#descripcion").val(response);
											var accion2 = "consultaPago";
											var id = $("#id").val();
											//alert(accion2);
											$.ajax({
													type: "POST",
													url: "/Github/Interdeco/Controlador/Controller.Pago.php",
													data: 'id=' + id +'&accion='+ accion2,
													success: function(response) {
															var miArray2 = new Array();
															var json = $.parseJSON(''+response+'');
																$(json).each(function(i,val){
																var j = 0;
																	$.each(val,function(k,v){
																	    miArray2[j]= v;
																	    j++;
																	});
																});
										                        $("#precioUnitario").val(miArray2[5]);
										                        $("#descuento").val("0");
										                        /*var precioUnitario = $("#precioUnitario").val();
										                        var descuento = $("#descuento").val();
										                        var total = precioUnitario;*/
										                        $("#precioTotalSinImpuesto").val(miArray2[5]);

															$('.panel').show();
													},
													error: function(response) {
													}
											});
											$('.panel').show();
									}
								});
					}
		});
		return false;
	});
	 /**
	 *  Mantenimiento de la tabla par_participantes
	 *  MODIFICAR
	 */
	$("#generarFactura").click(function(){
		var accion = "generarFactura";
		var id = $("#id").val();
		var compania = "1";
		var nombre = $("#nombre").val();
		var apellido = $("#apellido").val();
		var fechainicio = $("fechainicio").val();
		var fechafin = $("fechafin").val();
		var pasarporte = $("#pasarporte").val();
		var fechana = $("#fechana").val();
		var nacionalidad = $("#nacionalidad").val();
		var direccion = $("#direccion").val();
		var pais = $("#pais option:selected").html();
		var provincia = $("#provincia").val();
		var ciudad = $("#ciudad").val();
		var zip = $("#zip").val();
		var telefono = $("#telefono").val();
		var email = $("#email").val();
		var estado = $("#estado").val();
		var agente = $("#agente option:selected").html();
		var infovuelo = $("#infovuelo").val();
		var asentamiento = $("#asentamiento option:selected").html();
		var comentarios = $("#comentario").val();
		var segurodeviaje = $("#segurodeviaje").val();
		var ticketaereo = $("#ticketaereo").val();
		var datosString = $("#actualizaparticipantes").serialize();
		var dato = '&accion=' + accion+'&id=' + id+'&ciudad=' + ciudad;

		if(fechainicio == ""){
			$("#fechainicio").focus();
			alert('(*)Campo Obligatorio: Ingrese fechana');
			return false;
		}
		else
		if(fechafin == ""){
			$("#fechafin").focus();
			alert('(*)Campo Obligatorio: Ingrese fechana');
			return false;
		}
		else
		if(nombre == ""){
			$("#nombre").focus();
			alert('(*)Campo Obligatorio: Ingrese nombre');
			return false;
		}
		else
		if(apellido == ""){
			$("#apellido").focus();
			alert('(*)Campo Obligatorio: Ingrese apellido');
			return false;
		}
		else
		if(pasarporte == ""){
			$("#pasarporte").focus();
			alert('(*)Campo Obligatorio: Ingrese pasaporte');
			return false;
		}
		else
		if(fechana == ""){
			$("#fechana").focus();
			alert('(*)Campo Obligatorio: Ingrese fechana');
			return false;
		}
		else
		if(nacionalidad == ""){
			$("#nacionalidad").focus();
			alert('(*)Campo Obligatorio: Ingrese nacionalidad');
			return false;
		}
		else
		if(direccion == ""){
			$("#direccion").focus();
			alert('(*)Campo Obligatorio: Ingrese direccion');
			return false;
		}
		else
		if(pais == ""){
			$("#pais").focus();
			alert('(*)Campo Obligatorio: Ingrese pais');
			return false;
		}
		else
		if(provincia == ""){
			$("#provincia").focus();
			alert('(*)Campo Obligatorio: Ingrese provincia');
			return false;
		}
		else
		if(zip == ""){
			$("#zip").focus();
			alert('(*)Campo Obligatorio: Ingrese zip');
			return false;
		}
		else
		if(telefono == ""){
			$("#telefono").focus();
			alert('(*)Campo Obligatorio: Ingrese telefono');
			return false;
		}
		else
		if(email == ""){
			$("#email").focus();
			alert('(*)Campo Obligatorio: Ingrese email');
			return false;
		}
		else 
		if(estado == ""){
			$("#estado").focus();
			alert('(*)Campo Obligatorio: Ingrese la estado');
			return false;
		}
		else 
		if(agente == ""){
			$("#agente").focus();
			alert('(*)Campo Obligatorio: Ingrese la agente');
			return false;
		}
		else 
		if(infovuelo == ""){
			$("#infovuelo").focus();
			alert('(*)Campo Obligatorio: Ingrese la infovuelo');
			return false;
		}
		else 
		if(asentamiento == ""){
			$("#asentamiento").focus();
			alert('(*)Campo Obligatorio: Ingrese la asentamiento');
			return false;
		}
		else 
		if(comentarios == ""){
			$("#comentario").focus();
			alert('(*)Campo Obligatorio: Ingrese la comentarios');
			return false;
		}
		else 
		if(segurodeviaje == ""){
			$("#segurodeviaje").focus();
			alert('(*)Campo Obligatorio: Ingrese la comentarios');
			return false;
		}
		else 
		if(ticketaereo == ""){
			$("#ticketaereo").focus();
			alert('(*)Campo Obligatorio: Ingrese la comentarios');
			return false;
		}
		else{
			datos = datosString+dato;
			alert(datos);
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Participantes.php",
			    data: datos,
			    success: function(response) {
			    	$('.panel').hide();
			    	if(response == 1){
			    		alert("No se ha podido Modificar los datos del Participante");
			    	}
			    	else if (response == "Exito"){
			    		$('#myModalLabel1').html('Mensaje !');
						$('.modal-body').html('<div class="alert alert-info" role="alert">Los datos del Participante han sido Modificados con Exito</div>');
						$('#myModal1').modal('show');
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