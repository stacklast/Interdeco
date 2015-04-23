$(document).ready(function(){
	$('#cancelarFactura').click(function(){
		$('.panel').hide();
		$('.botones').hide();
		$('#buscarclienteFactura').val("");
	});

	$('#busquedaClienteFactura').click(function() {
		var accion = "ConsultarParticipante";
		var cliente = $('#buscarclienteFactura').val();
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
										                        $("#totalDescuento").val("0");
										                        /*var precioUnitario = $("#precioUnitario").val();
										                        var descuento = $("#descuento").val();
										                        var total = precioUnitario;*/
										                        $("#precioTotalSinImpuesto").val(miArray2[5]);

															$('.panel').show();
															$('.botones').show();
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
		var accion = "Facturacion";
		var id = $("#id").val();
		var razonSocial = $("#razonSocial").val();
		var nombreComercial = $("#nombreComercial").val();
		var ruc = $("#ruc").val();
		var dirMatriz = $("#dirMatriz").val();
		var obligadoContabilidad = $("#obligadoContabilidad").val();
		var datosString = $("#generafactura").serialize();
		var dato = '&accion=' + accion+'&id=' + id+'&razonSocial=' + razonSocial+'&nombreComercial=' + nombreComercial+'&ruc=' + ruc+'&dirMatriz=' + dirMatriz+'&obligadoContabilidad=' + obligadoContabilidad;
			datos = datosString+dato;
			alert(datos);
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Facturacion.php",
			    data: datos,
			    success: function(response) {
			    	//alert(response);
			    	$('.panel').hide();
			    	$('.botones').hide();
			    	if(response == 1){
			    		alert("No se ha podido Generar la Factura");
			    	}
			    	else{
			    		$('#myModalLabel1').html('Mensaje !');
						$('.modal-body').html('<div class="alert alert-info" role="alert">'+response+'</div>');
						$('#myModal1').modal('show');
			    		$('.panel').hide();
			    	}
			    },
			    error: function(response) {
			    }
			});
			return false;
		
	});
});