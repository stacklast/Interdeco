$(document).ready(function(){
	/**
	 * Menu de Navegación Lateral
	 * 
	 */
	var nav = $('#navegacion').val();
	if(nav == 'Usuarios'){
		$('#menu-inicio').removeClass('active');
		$('#menu-mantenimientos').addClass('active');
		$('#menu-usuarios').addClass('active');
        $('#menu-mantenimientos .nav-second-level').addClass('in');
	}   
	else 
	if(nav == 'Companias'){
		$('#menu-inicio').removeClass('active');
		$('#menu-mantenimientos').addClass('active');
		$('#menu-companias').addClass('active');
        $('#menu-mantenimientos .nav-second-level').addClass('in');
	}
	else 
	if(nav == 'Empleados'){
		$('#menu-inicio').removeClass('active');
		$('#menu-empleados').addClass('active');
		$('#menu-empleados').addClass('active');
        $('#menu-mantenimientos .nav-second-level').addClass('in');
	}
	else 
	if(nav == 'Participantes'){
		$('#menu-inicio').removeClass('active');
		$('#menu-participantes').addClass('active');
		$('#menu-participantes').addClass('active');
        $('#menu-mantenimientos .nav-second-level').addClass('in');
	}
	else 
	if(nav == 'Programas'){
		$('#menu-inicio').removeClass('active');
		$('#menu-programas').addClass('active');
		$('#menu-programas').addClass('active');
        $('#menu-mantenimientos .nav-second-level').addClass('in');
	}
	else 
	if(nav == 'Facturacion'){
		$('#menu-inicio').removeClass('active');
		$('#menu-facturacion').addClass('active');
	}
	else 
	if(nav == 'Pago'){
		$('#menu-inicio').removeClass('active');
		$('#menu-pago').addClass('active');
	}
	/**
	 * Manejo de Fecha cambio de idioma y rangos
	 */
	 $.datepicker.regional['es'] = {
	 closeText: 'Cerrar',
	 prevText: '<Ant',
	 nextText: 'Sig>',
	 currentText: 'Hoy',
	 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	 weekHeader: 'Sm',
	 dateFormat: 'yy-mm-dd',
	 firstDay: 1,
	 isRTL: false,
	 changeYear: true, // para que se pueda escoger el año
	 yearRange: '-65:+0',//rango de fechas
	 showMonthAfterYear: false,
	 yearSuffix: ''
	 };
	$.datepicker.setDefaults($.datepicker.regional['es']);
	$(".date-picker").datepicker();
	$(".date-picker").on("change", function () {
	    var id = $(this).attr("id");
	    var val = $("label[for='" + id + "']").text();
	    $("#msg").text(val + " changed");
	});
	/**
	 * Dinamico de Ciudad, Pais, Distrito o Provincia
	 * 
	 */
	$("#pais").change(function(){dependencia_ciudad();});
	$("#ciudad").change(function(){dependencia_provincia();});
	function dependencia_ciudad(){
		var code = $("#pais").val();
		var datos = "code="+code+"&combo=ciudad";
		$.ajax({
				type: "POST",
				url: "/Github/Interdeco/Modelo/DAO/Cls.DAO.Combos.php",
				data: datos,
				success: function(response) {
						//alert(response);
						$('#ciudad').append(response);
				},
				error: function(response) {
				}
		});
		return false;
	}
	function dependencia_provincia(){
		var code = $("#ciudad").val();
		var datos = "code="+code+"&combo=distrito";
		$.ajax({
				type: "POST",
				url: "/Github/Interdeco/Modelo/DAO/Cls.DAO.Combos.php",
			    data: datos,
				success: function(response) {
						$('#provincia').val(response);				
				},
				error: function(response) {
				    }
		});
				return false;
	}
	/**
	 * validacion de campos para solo números
	 */
	(function(a){a.fn.validCampoFranz=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);
	$('#ruc').validCampoFranz('0123456789');
	$('#telefono').validCampoFranz('0123456789');
	$('#celular').validCampoFranz('0123456789');
	$('#telefax').validCampoFranz('0123456789');
	$('#zip').validCampoFranz('0123456789');
	/**
	 *  Mantenimiento de la tabla pro_programas
	 *  EDITAR
	 */
    var total = $("#totalregistrosPrograma").val();
	for (var i = 1; i <= total; i++) {
		var aux = i;
		$('#EditarPrograma'+aux).click({param1: aux}, editarPrograma);
		function editarPrograma(event){
			id = $('#PRO_ID'+event.data.param1).val();
			participante = $('#PAR_ID'+event.data.param1).val();
			nombre = $('#PRO_NOMBRE'+event.data.param1).val();
			dias = $('#PRO_DIAS'+event.data.param1).val();
			semanas = $('#PRO_SEMANAS'+event.data.param1).val();
			fechainicio = $('#PRO_FECHA_INICIO'+event.data.param1).val();
			fechafinal = $('#PRO_FECHA_FINALIZACION'+event.data.param1).val();
			tarifa = $('#PRO_TARIFA'+event.data.param1).val();
			$("#id").val(id);
			$("#participante").val(participante);
			$("#nombre").val(nombre);
			$("#dias").val(dias);
			$("#semanas").val(semanas);
			$("#fechainicio").val(fechainicio);
			$("#fechafinal").val(fechafinal);
			$("#tarifa").val(tarifa);
			HabilitarCamposPrograma();
		}
		$('#EliminarPrograma'+aux).click({param1: aux}, eliminarPrograma);
		function eliminarPrograma(event){
			id = $('#PRO_ID'+event.data.param1).val();
			$("#identificador").val(id);
			$('#myModalLabel').html('Advertencia!');
			$('.modal-body').html('<div class="alert alert-warning" role="alert">Está seguro que desea eliminar el Registro?</div>');
			$('#myModal').modal('show');
		}
	};
	/**
	 *  Mantenimiento de la tabla pro_programas
	 *  ELIMINAR
	 */
	$('#eliminarPrograma').click(function() {
		var accion = "EliminarPrograma";
	 	var id = $("#identificador").val();
	 	var datos = 'id=' + id+'&accion=' + accion;
        $.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Programas.php",
			    data: datos,
			    success: function(response) {
			    	$('#myModal').modal('hide');
			    	limpiarCompania();
			    	if(response == 1){
			    		alert("No se ha podido Eliminar el registro del Programa");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		alert("Los datos del Programa han sido Eliminados con Exito");
			    	}
			    	else{
			    		alert(response);
			    	}
			    },
			    error: function(response) {
			    	$('#myModal').modal('hide');
			    	alert(response);
			    }
			});
		return false;
    });
    /**
	 *  Mantenimiento de la tabla pro_programas
	 *  MODIFICAR
	 */
	$("#modificarPrograma").click(function(){
		var accion = "ModificarPrograma";
		var id = $("#id").val();
		var participante = $("#participante  option:selected").html();
		var nombre = $("#nombre").val();
		var dias = $("#dias").val();
		var semanas = $("#semanas").val();
		var fechainicio = $("#fechainicio").val();
		var fechafinal = $("#fechafinal").val();
		var tarifa = $("#tarifa").val();
		var datosString = $("#programas").serialize();
		var dato = '&accion=' + accion+'&id=' + id+'&ciudad=' + ciudad;
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
		if(dias == ""){
			$("#dias").focus();
			alert('(*)Campo Obligatorio: Ingrese los dias');
			return false;
		}
		else
		if(semanas == ""){
			$("#semanas").focus();
			alert('(*)Campo Obligatorio: Ingrese semanas');
			return false;
		}
		else
		if(fechainicio == ""){
			$("#fechainicio").focus();
			alert('(*)Campo Obligatorio: Ingrese fechainicio');
			return false;
		}
		else
		if(fechafinal == ""){
			$("#fechafinal").focus();
			alert('(*)Campo Obligatorio: Ingrese fechafinal');
			return false;
		}
		else
		if(tarifa == ""){
			$("#tarifa").focus();
			alert('(*)Campo Obligatorio: Ingrese tarifa');
			return false;
		}
		else{
			datos = datosString+dato;
			alert(datos);
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Programas.php",
			    data: datos,
			    success: function(response) {
			    	limpiarParticipante();
			    	if(response == 1){
			    		alert("No se ha podido Modificar los datos del Programa");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		 alert("Los datos del Programa han sido Modificados con Exito");
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
	/**
	 *  Mantenimiento de la tabla pro_programas
	 *  AGREGAR
	 */
	$("#agregarPrograma").click(function(){
		var accion = "InsertarPrograma";
		var id = $("#id").val();
		var participante = $("#participante  option:selected").html();
		var nombre = $("#nombre").val();
		var dias = $("#dias").val();
		var semanas = $("#semanas").val();
		var fechainicio = $("#fechainicio").val();
		var fechafinal = $("#fechafinal").val();
		var tarifa = $("#tarifa").val();
		var datosString = $("#programas").serialize();
		var dato = '&accion=' + accion+'&id=' + id+'&ciudad=' + ciudad;
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
		if(dias == ""){
			$("#dias").focus();
			alert('(*)Campo Obligatorio: Ingrese los dias');
			return false;
		}
		else
		if(semanas == ""){
			$("#semanas").focus();
			alert('(*)Campo Obligatorio: Ingrese semanas');
			return false;
		}
		else
		if(fechainicio == ""){
			$("#fechainicio").focus();
			alert('(*)Campo Obligatorio: Ingrese fechainicio');
			return false;
		}
		else
		if(fechafinal == ""){
			$("#fechafinal").focus();
			alert('(*)Campo Obligatorio: Ingrese fechafinal');
			return false;
		}
		else
		if(tarifa == ""){
			$("#tarifa").focus();
			alert('(*)Campo Obligatorio: Ingrese tarifa');
			return false;
		}
		else{
			datos = datosString+dato;
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Programas.php",
			    data: datos,
			    success: function(response) {
			    	limpiarParticipante();
			    	if(response == 1){
			    		alert("No se ha podido Agregar los datos del Programa");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		 alert("Los datos del Programa han sido Agregado con Exito");
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
	/**
	 *  Mantenimiento de la tabla pro_programas
	 *  FUNCIONES
	 */
    function HabilitarCamposPrograma(){
		$("#id").prop('disabled', true);
		$("#participante").prop('disabled', false);
		$("#nombre").prop('disabled', false);
		$("#dias").prop('disabled', false);
		$("#semanas").prop('disabled', false);
		$("#fechainicio").prop('disabled', false);
		$("#fechafinal").prop('disabled', false);
		$("#tarifa").prop('disabled', false);
	}
	function limpiarPrograma(){
		$("#id").val('');
		$('#participante').prop('selectedIndex',0);
		$("#nombre").val('');
		$("#dias").val('');
		$("#semanas").val('');
		$("#fechainicio").val('');
		$("#fechafinal").val('');
		$("#tarifa").val('');
	}
	/**
	 *  Mantenimiento de la tabla pro_programas
	 *  EVENTOS BOTONES
	 */
	$("#nuevoPrograma").click(function(){
		$("#programas").show();
		$("#div-limpiar").show();
		$("#div-modificar").hide();
		limpiarPrograma();
		HabilitarCamposPrograma();
		$("#resultados-busqueda").hide();
	});
	$("#buscarPrograma").click(function(){
		$("#programas").hide();
		$("#resultados-busqueda").show();
	});
	$("#cancelarPrograma").click(function(){
		limpiarPrograma();
		$("#programas").hide();
		$("#resultados-busqueda").show();
	});
	$("#limpiarPrograma").click(function(){
		limpiarPrograma();
	});   	
	/**
	 *  Mantenimiento de la tabla par_participantes
	 *  EDITAR
	 */
    var total = $("#totalregistrosParticipante").val();
	for (var i = 1; i <= total; i++) {
		var aux = i;
		$('#EditarParticipante'+aux).click({param1: aux}, editarParticipante);
		function editarParticipante(event){
			id = $('#PAR_ID'+event.data.param1).val();
			compania = $('#COM_ID'+event.data.param1).val();
			fecha = $('#PAR_FECHA'+event.data.param1).val();
			fechainicio = $('#PAR_FECHAINICIO'+event.data.param1).val();
			fechafin = $('#PAR_FECHAFIN'+event.data.param1).val();
			nombre = $('#PAR_NOMBRE'+event.data.param1).val();
			apellido = $('#PAR_APELLIDO'+event.data.param1).val();
			genero = $('#PAR_GENERO'+event.data.param1).val();
			pasaporte = $('#PAR_NUMERO_PASAPORTE'+event.data.param1).val();
			fechana = $('#PAR_FECHA_NACIMIENTO'+event.data.param1).val();
			nacionalidad = $('#PAR_NACIONALIDAD'+event.data.param1).val();
			direccion = $('#PAR_DIRECCION'+event.data.param1).val();
			pais = $('#PAR_PAIS'+event.data.param1).val();
			provincia = $('#PAR_PROVINCIA_ESTADO'+event.data.param1).val();
			ciudad = $('#PAR_CIUDAD'+event.data.param1).val();
			zip = $('#PAR_ZIP_POSTAL'+event.data.param1).val();
			telefono = $('#PAR_TELEFONO'+event.data.param1).val();
			email = $('#PAR_EMAIL'+event.data.param1).val();
			estado = $('#PAR_ESTADO'+event.data.param1).val();
			agente = $('#PAR_AGENTE'+event.data.param1).val();
			infovuelo = $('#PAR_INFO_VUELO'+event.data.param1).val();
			asentamiento = $('#PAR_ASENTAMIENTO'+event.data.param1).val();
			comentario = $('#PAR_COMENTARIOS'+event.data.param1).val();
			segurodeviaje = $('#PAR_SEGURO_DE_VIAJE'+event.data.param1).val();
			ticketaereo = $('#PAR_TICKET_AEREO'+event.data.param1).val();
			$("#id").val(id);
			$("#compania").val(compania);
			$("#nombre").val(nombre);
			$("#apellido").val(apellido);
			$("#genero").val(genero);
			$("#pasaporte").val(pasaporte);
			$("#fechana").val(fechana);
			$("#fechainicio").val(fechainicio);
			$("#fechafin").val(fechafin);
			$("#nacionalidad").val(nacionalidad);
			$("#direccion").val(direccion);
			$("#pais").val(pais);
			$("#provincia").val(provincia);
			$("#ciudad").val(ciudad);
			$("#zip").val(zip);
			$("#telefono").val(telefono);
			$("#email").val(email);
			$("#estado").val(estado);
			$("#agente").val(agente);
			$("#infovuelo").val(infovuelo);
			$("#asentamiento").val(asentamiento);
			$("#comentario").val(comentario);
			$("#segurodeviaje").val(segurodeviaje);
			$("#ticketaereo").val(ticketaereo);
			$("#resultados-busqueda").hide();
			$("#div-agregar").hide();
			$("#div-limpiar").hide();
	    	$("#participantes").show();
	    	$("#div-modificar").show();
			HabilitarCamposCompania();
		}
		$('#EliminarParticipante'+aux).click({param1: aux}, eliminarParticipante);
		function eliminarParticipante(event){
			id = $('#PAR_ID'+event.data.param1).val();
			$("#identificador").val(id);
			$('#myModalLabel').html('Advertencia!');
			$('.modal-body').html('<div class="alert alert-warning" role="alert">Está seguro que desea eliminar el Registro?</div>');
			$('#myModal').modal('show');
		}
	};
	/**
	 *  Mantenimiento de la tabla par_participantes
	 *  ELIMINAR
	 */
	$('#eliminarParticipante').click(function() {
		var accion = "EliminarParticipante";
	 	var id = $("#identificador").val();
	 	var datos = 'id=' + id+'&accion=' + accion;
        $.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Participantes.php",
			    data: datos,
			    success: function(response) {
			    	$('#myModal').modal('hide');
			    	limpiarCompania();
			    	if(response == 1){
			    		alert("No se ha podido Eliminar el registro del Participante");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		alert("Los datos del Participante han sido Eliminados con Exito");
			    	}
			    	else{
			    		alert(response);
			    	}
			    },
			    error: function(response) {
			    	$('#myModal').modal('hide');
			    	alert(response);
			    }
			});
		return false;
    });
    /**
	 *  Mantenimiento de la tabla par_participantes
	 *  MODIFICAR
	 */
	$("#modificarParticipante").click(function(){
		var accion = "ModificarParticipante";
		var id = $("#id").val();
		var compania = $("#compania").val();
		var nombre = $("#nombre").val();
		var apellido = $("#apellido").val();
		var fechainicio = $("fechainicio").val();
		var fechafin = $("fechafin").val();
		var pasaporte = $("#pasaporte").val();
		var fechana = $("#fechana").val();
		var nacionalidad = $("#nacionalidad").val();
		var direccion = $("#direccion").val();
		var pais = $("#pais option:selected").html();
		var provincia = $("#provincia option:selected").html();
		var ciudad = $("#ciudad option:selected").html();
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
		var datosString = $("#participantes").serialize();
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
		if(pasaporte == ""){
			$("#pasaporte").focus();
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
			    	limpiarParticipante();
			    	if(response == 1){
			    		alert("No se ha podido Modificar los datos del Participante");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		 alert("Los datos del Participante han sido Modificados con Exito");
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
	/**
	 *  Mantenimiento de la tabla par_participantes
	 *  AGREGAR
	 */
	$("#agregarParticipante").click(function(){
		var accion = "InsertarParticipante";
		var id = $("#id").val();
		var compania = $("#compania").val();
		var fechainicio = $("fechainicio").val();
		var fechafin = $("fechafin").val();
		var nombre = $("#nombre").val();
		var apellido = $("#apellido").val();
		var pasaporte = $("#pasaporte").val();
		var fechana = $("#fechana").val();
		var nacionalidad = $("#nacionalidad").val();
		var direccion = $("#direccion").val();
		var pais = $("#pais").val();
		var provincia = $("#provincia").val();
		var ciudad = $("#ciudad option:selected").html();
		var zip = $("#zip").val();
		var telefono = $("#telefono").val();
		var email = $("#email").val();
		var estado = $("#estado").val();
		var agente = $("#agente").val();
		var infovuelo = $("#infovuelo").val();
		var asentamiento = $("#asentamiento").val();
		var comentarios = $("#comentario").val();
		var segurodeviaje = $("#segurodeviaje").val();
		var ticketaereo = $("#ticketaereo").val();
		var datosString = $("#participantes").serialize();
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
		if(pasaporte == ""){
			$("#pasaporte").focus();
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
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Participantes.php",
			    data: datos,
			    success: function(response) {
			    	limpiarParticipante();
			    	if(response == 1){
			    		alert("No se ha podido Agregar los datos del Participante");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		 alert("Los datos del Participante han sido Agregado con Exito");
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
	/**
	 *  Mantenimiento de la tabla par_participantes
	 *  FUNCIONES
	 */
    function HabilitarCamposParticipante(){
		$("#id").prop('disabled', true);
		$("#compania").prop('disabled', false);
		$("#nombre").prop('disabled', false);
		$("#apellido").prop('disabled', false);
		$("#genero").prop('disabled', false);
		$("#fechana").prop('disabled', false);
		$("#pasarporte").prop('disabled', false);
		$("#nacionalidad").prop('disabled', false);
		$("#direccion").prop('disabled', false);
		$("#pais").prop('disabled', false);
		$("#provincia").prop('disabled', false);
		$("#zip").prop('disabled', false);
		$("#telefono").prop('disabled', false);
		$("#email").prop('disabled', false);
		$("#estado").prop('disabled', false);
		$("#agente").prop('disabled', false);
		$("#infovuelo").prop('disabled', false);
		$("#asentamiento").prop('disabled', false);
		$("#comentario").prop('disabled', false);
	}
	function limpiarParticipante(){
		$("#id").val('');
		$('#compania').prop('selectedIndex',0);
		$("#nombre").val('');
		$("#apellido").val('');
		$("#genero").prop('selectedIndex',0);
		$("#fechana").val('');
		$("#pasarporte").val('');
		$("#nacionalidad").val('');
		$("#direccion").val('');
		$("#pais").val('');
		$("#provincia").val('');
		$("#zip").val('');
		$("#telefono").val('');
		$("#email").val('');
		$("#estado").prop('selectedIndex',0);
		$("#agente").val('');
		$("#infovuelo").val('');
		$("#asentamiento").val('');
		$("#comentario").val('');
	}
	/**
	 *  Mantenimiento de la tabla par_participantes
	 *  EVENTOS BOTONES
	 */
	$("#nuevoParticipante").click(function(){
		$("#participantes").show();
		$("#div-limpiar").show();
		$("#div-modificar").hide();
		limpiarCompania();
		HabilitarCamposCompania();
		$("#resultados-busqueda").hide();
	});
	$("#buscarParticipante").click(function(){
		$("#participantes").hide();
		$("#resultados-busqueda").show();
	});
	$("#cancelarParticipante").click(function(){
		limpiarParticipante();
		$("#participantes").hide();
		$("#resultados-busqueda").show();
	});
	$("#limpiarParticipante").click(function(){
		limpiarParticipante();
	});   
	/**
	 *  Mantenimiento de la tabla emp_empleados
	 * 
	 */
    var total = $("#totalregistrosEmpleado").val();
	for (var i = 1; i <= total; i++) {
		var aux = i;
		$('#EditarEmpleado'+aux).click({param1: aux}, editarEmpleado);
		function editarEmpleado(event){
			id = $('#EMP_ID'+event.data.param1).val();
			compania = $('#COM_ID'+event.data.param1).val();
			nombre = $('#EMP_NOMBRE'+event.data.param1).val();
			apellido = $('#EMP_APELLIDO'+event.data.param1).val();
			telefono = $('#EMP_TELEFONO'+event.data.param1).val();
			celular = $('#EMP_CELULAR'+event.data.param1).val();
			pais = $('#EMP_PAIS'+event.data.param1).val();
			provincia = $('#EMP_PROVINCIA_ESTADO'+event.data.param1).val();
			ciudad = $('#EMP_CIUDAD'+event.data.param1).val();
			direccion = $('#EMP_DIRECCION'+event.data.param1).val();
			cargo = $('#EMP_CARGO'+event.data.param1).val();
			telefax = $('#EMP_TELEFAX'+event.data.param1).val();
			$("#id").val(id);
			$("#compania").val(compania);
			$("#nombre").val(nombre);
			$("#apellido").val(apellido);
			$("#telefono").val(telefono);
			$("#celular").val(celular);
			$("#pais").val(pais);
			$("#provincia").val(provincia);
			$("#ciudad").val(ciudad);
			$("#direccion").val(direccion);
			$("#cargo").val(cargo);
			$("#telefax").val(telefax);
			$("#resultados-busqueda").hide();
			$("#div-agregar").hide();
			$("#div-limpiar").hide();
	    	$("#empleados").show();
	    	$("#div-modificar").show();
			HabilitarCamposCompania();
		}
		$('#EliminarEmpleado'+aux).click({param1: aux}, eliminarEmpleado);
		function eliminarEmpleado(event){
			id = $('#EMP_ID'+event.data.param1).val();
			$("#identificador").val(id);
			$('#myModalLabel').html('Advertencia!');
			$('.modal-body').html('<div class="alert alert-warning" role="alert">Está seguro que desea eliminar el Registro?</div>');
			$('#myModal').modal('show');
		}
	};
	$('#eliminarEmpleado').click(function() {
		var accion = "EliminarEmpleado";
	 	var id = $("#identificador").val();
	 	var datos = 'id=' + id+'&accion=' + accion;
        $.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Empleados.php",
			    data: datos,
			    success: function(response) {
			    	$('#myModal').modal('hide');
			    	limpiarEmpleado();
			    	//alert(response);
			    	if(response == 1){
			    		alert("No se ha podido Eliminar el registro del Empleado");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		alert("Los datos del Empleado han sido Eliminados con Exito");
			    	}
			    	else{
			    		alert(response);
			    	}
			    },
			    error: function(response) {
			    	$('#myModal').modal('hide');
			    	alert(response);
			    }
			});
			return false;
    });
	$("#modificarEmpleado").click(function(){
		var accion = "ModificarEmpleado";
		var id = $("#id").val();
		var compania = $("#compania").val();
		var nombre = $("#nombre").val();
		var apellido = $("#apellido").val();
		var telefono = $("#telefono").val();
		var celular = $("#celular").val();
		var pais = $("#pais").val();
		var provincia = $("#provincia").val();
		var ciudad = $("#ciudad").val();
		var direccion = $("#direccion").val();
		var cargo = $("#cargo").val();
		var telefax = $("#telefax").val();
		var datosString = $("#empleados").serialize();
		var dato = '&accion=' + accion+'&id=' + id;
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
		if(telefono == ""){
			$("#telefono").focus();
			alert('(*)Campo Obligatorio: Ingrese telefono');
			return false;
		}
		else
		if(celular == ""){
			$("#celular").focus();
			alert('(*)Campo Obligatorio: Ingrese celular');
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
		if(ciudad == ""){
			$("#ciudad").focus();
			alert('(*)Campo Obligatorio: Ingrese ciudad');
			return false;
		}
		else 
		if(direccion == ""){
			$("#direccion").focus();
			alert('(*)Campo Obligatorio: Ingrese la direccion');
			return false;
		}
		else 
		if(cargo == ""){
			$("#cargo").focus();
			alert('(*)Campo Obligatorio: Ingrese la cargo');
			return false;
		}
		else 
		if(telefax == ""){
			$("#telefax").focus();
			alert('(*)Campo Obligatorio: Ingrese la telefax');
			return false;
		}
		else{
			datos = datosString+dato;
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Empleados.php",
			    data: datos,
			    success: function(response) {
			    	limpiarEmpleado();
			    	if(response == 1){
			    		alert("No se ha podido Modificar los datos del Empleado");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		 alert("Los datos del Empleado han sido Modificados con Exito");
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
	$("#agregarEmpleado").click(function(){
		var accion = "InsertarEmpleado";
		var id = $("#id").val();
		var compania = $("#compania").val();
		var nombre = $("#nombre").val();
		var apellido = $("#apellido").val();
		var telefono = $("#telefono").val();
		var celular = $("#celular").val();
		var pais = $("#pais").val();
		var provincia = $("#provincia").val();
		var ciudad = $("#ciudad").val();
		var direccion = $("#direccion").val();
		var cargo = $("#cargo").val();
		var telefax = $("#telefax").val();
		var datosString = $("#empleados").serialize();
		var dato = '&accion=' + accion+'&id=' + id;
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
		if(telefono == ""){
			$("#telefono").focus();
			alert('(*)Campo Obligatorio: Ingrese telefono');
			return false;
		}
		else
		if(celular == ""){
			$("#celular").focus();
			alert('(*)Campo Obligatorio: Ingrese celular');
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
		if(ciudad == ""){
			$("#ciudad").focus();
			alert('(*)Campo Obligatorio: Ingrese ciudad');
			return false;
		}
		else 
		if(direccion == ""){
			$("#direccion").focus();
			alert('(*)Campo Obligatorio: Ingrese la direccion');
			return false;
		}
		else 
		if(cargo == ""){
			$("#cargo").focus();
			alert('(*)Campo Obligatorio: Ingrese la cargo');
			return false;
		}
		else 
		if(telefax == ""){
			$("#telefax").focus();
			alert('(*)Campo Obligatorio: Ingrese la telefax');
			return false;
		}
		else{
			datos = datosString+dato;
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Empleados.php",
			    data: datos,
			    success: function(response) {
			    	limpiarEmpleado();
			    	//alert(response);
			    	if(response == 1){
			    		alert("No se ha podido Agregar los datos del Empleado");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		 alert("Los datos del Empleado han sido Agregados con Exito");
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
    function HabilitarCamposEmpleado(){
		$("#id").prop('disabled', true);
		$("#nombre").prop('disabled', false);
		$("#apellido").prop('disabled', false);
		$("#telefono").prop('disabled', false);
		$("#celular").prop('disabled', false);
		$("#pais").prop('disabled', false);
		$("#provincia").prop('disabled', false);
		$("#ciudad").prop('disabled', false);
		$("#direccion").prop('disabled', false);
		$("#cargo").prop('disabled', false);
		$("#telefax").prop('disabled', false);
	}
	function limpiarEmpleado(){
		$("#id").val('');
		$('#compania').prop('selectedIndex',0);
		$("#nombre").val('');
		$("#apellido").val('');
		$("#telefono").val('');
		$("#celular").val('');
		$("#pais").val('');
		$("#provincia").val('');
		$("#ciudad").val('');
		$("#direccion").val('');
		$("#cargo").val('');
		$("#telefax").val('');
	}
	$("#nuevoEmpleado").click(function(){
		$("#empleados").show();
		$("#div-limpiar").show();
		$("#div-modificar").hide();
		limpiarCompania();
		HabilitarCamposCompania();
		$("#resultados-busqueda").hide();
	});
	$("#buscarEmpleado").click(function(){
		$("#empleados").hide();
		$("#resultados-busqueda").show();
	});
	$("#cancelarEmpleado").click(function(){
		limpiarEmpleado();
		$("#empleados").hide();
		$("#resultados-busqueda").show();
	});
	$("#limpiarEmpleado").click(function(){
		limpiarEmpleado();
	});   
/**
 *  Mantenimiento de la tabla com_compania
 * 
 */
    var total = $("#totalregistrosCompania").val();
	for (var i = 1; i <= total; i++) {
		var aux = i;
		$('#EditarCompania'+aux).click({param1: aux}, editarCompania);
		function editarCompania(event){
			id = $('#COM_ID'+event.data.param1).val();
			nombre = $('#COM_NOMBRE'+event.data.param1).val();
			ruc = $('#COM_RUC'+event.data.param1).val();
			direccion = $('#COM_DIRECCION'+event.data.param1).val();
			telefono = $('#COM_TELEFONO'+event.data.param1).val();
			email = $('#COM_EMAIL'+event.data.param1).val();
			web = $('#COM_WEB'+event.data.param1).val();
			$("#id").val(id);
			$("#nombre").val(nombre);
			$("#ruc").val(ruc);
			$("#direccion").val(direccion);
			$("#telefono").val(telefono);
			$("#email").val(email);
			$("#web").val(web);
			$("#resultados-busqueda").hide();
			$("#div-agregar").hide();
			$("#div-limpiar").hide();
	    	$("#companias").show();
	    	$("#div-modificar").show();
			HabilitarCamposCompania();
		}
		$('#EliminarCompania'+aux).click({param1: aux}, eliminarCompania);
		function eliminarCompania(event){
			id = $('#COM_ID'+event.data.param1).val();
			$("#identificador").val(id);
			$('#myModalLabel').html('Advertencia!');
			$('.modal-body').html('<div class="alert alert-warning" role="alert">Está seguro que desea eliminar el Registro?</div>');
			$('#myModal').modal('show');
		}
	};
	$('#eliminarCompania').click(function() {
		var accion = "EliminarCompania";
	 	var id = $("#identificador").val();
	 	var datos = 'id=' + id+'&accion=' + accion;
        $.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Companias.php",
			    data: datos,
			    success: function(response) {
			    	$('#myModal').modal('hide');
			    	limpiarCompania();
			    	if(response == 1){
			    		alert("No se ha podido Eliminar el registro de la Compania");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		alert("Los datos de la Compania han sido Eliminados con Exito");
			    	}
			    	else{
			    		alert(response);
			    	}
			        $('.ajaxgif').hide();
			        $('.msg').text('Mensaje enviado!').addClass('msg_ok').animate({ 'right' : '130px' }, 300);  
			    },
			    error: function(response) {
			    	$('#myModal').modal('hide');
			    	alert(response);
			        $('.ajaxgif').hide();
			        $('.msg').text('Hubo un error!').addClass('msg_error').animate({ 'right' : '130px' }, 300);                 
			    }
			});
			return false;
    });
	$("#modificarCompania").click(function(){
		var accion = "ModificarCompania";
		var id = $("#id").val();
		var nombre = $("#nombre").val();
		var ruc = $("#ruc").val();
		var direccion = $("#direccion").val();
		var telefono = $("#telefono").val();
		var email = $("#email").val();
		var web = $("#web").val();
		var datosString = $("#companias").serialize();
		var dato = '&accion=' + accion+'&id=' + id;
		var validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		if(nombre == ""){
			$("#nombre").focus();
			alert('(*)Campo Obligatorio: Ingrese nombre');
			return false;
		}
		else
		if(ruc == ""){
			$("#ruc").focus();
			alert('(*)Campo Obligatorio: Ingrese ruc');
			return false;
		}
		else
		if(direccion == ""){
			$("#ruc").focus();
			alert('(*)Campo Obligatorio: Ingrese direccion');
			return false;
		}
		else
		if(telefono == ""){
			$("#ruc").focus();
			alert('(*)Campo Obligatorio: Ingrese telefono');
			return false;
		}
		else
		if(email == "" || !validacion_email.test(email)){
			$("#email").focus();
			alert('(*)Campo Obligatorio: Ingrese su email');
			return false;
		}
		else 
		if(web == ""){
			$("#web").focus();
			alert('(*)Campo Obligatorio: Ingrese la web');
			return false;
		}
		else{
			$('#error').html('');
			$('.ajaxgif').removeClass('hide');
			datos = datosString+dato;
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Companias.php",
			    data: datos,
			    success: function(response) {
			    	limpiarUsuario();
			    	if(response == 1){
			    		alert("No se ha podido Modificar los datos de la Compania");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		 alert("Los datos de la COmpania han sido Modificados con Exito");
			    	}
			    	else{
			    		alert(response);
			    	}
			        $('.ajaxgif').hide();
			        $('.msg').text('Mensaje enviado!').addClass('msg_ok').animate({ 'right' : '130px' }, 300);  
			    },
			    error: function(response) {
			        $('.ajaxgif').hide();
			        $('.msg').text('Hubo un error!').addClass('msg_error').animate({ 'right' : '130px' }, 300);                 
			    }
			});
			return false;
		}
	});
	$("#agregarCompania").click(function(){
		var accion = "InsertarCompania";
		var id = $("#id").val();
		var nombre = $("#nombre").val();
		var ruc = $("#ruc").val();
		var direccion = $("#direccion").val();
		var telefono = $("#telefono").val();
		var email = $("#email").val();
		var web = $("#web").val();
		var datosString = $("#companias").serialize();
		var dato = '&accion=' + accion+'&id=' + id;
		var validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		if(nombre == ""){
			$("#nombre").focus();
			alert('(*)Campo Obligatorio: Ingrese nombre');
			return false;
		}
		else
		if(ruc == ""){
			$("#ruc").focus();
			alert('(*)Campo Obligatorio: Ingrese ruc');
			return false;
		}
		else
		if(direccion == ""){
			$("#ruc").focus();
			alert('(*)Campo Obligatorio: Ingrese direccion');
			return false;
		}
		else
		if(telefono == ""){
			$("#ruc").focus();
			alert('(*)Campo Obligatorio: Ingrese telefono');
			return false;
		}
		else
		if(email == "" || !validacion_email.test(email)){
			$("#email").focus();
			alert('(*)Campo Obligatorio: Ingrese su email');
			return false;
		}
		else 
		if(web == ""){
			$("#web").focus();
			alert('(*)Campo Obligatorio: Ingrese la web');
			return false;
		}
		else{
			datos = datosString+dato;
			alert(datos);
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Companias.php",
			    data: datos,
			    success: function(response) {
			    	limpiarCompania();
			    	if(response == 1){
			    		alert("No se ha podido Agregar los datos de la Compania");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		 alert("Los datos de la Compania han sido Agregados con Exito");
			    	}
			    	else{
			    		alert(response);
			    	}
			    },
			    error: function(response) {
			    	alert("error: "+response);
			    }
			});
			return false;
		}
	});
    function HabilitarCamposCompania(){
		$("#id").prop('disabled', true);
		$("#nombre").prop('disabled', false);
		$("#ruc").prop('disabled', false);
		$("#direccion").prop('disabled', false);
		$("#telefono").prop('disabled', false);
		$("#email").prop('disabled', false);
		$("#web").prop('disabled', false);
	}
	function limpiarCompania(){
		$("#id").val('');
		$("#nombre").val('');
		$("#ruc").val('');
		$("#direccion").val('');
		$("#telefono").val('');
		$("#email").val('');
		$("#web").val('');
	}
	$("#nuevoCompania").click(function(){
		$("#companias").show();
		$("#div-limpiar").show();
		$("#div-modificar").hide();
		limpiarCompania();
		HabilitarCamposCompania();
		$("#resultados-busqueda").hide();
	});

	$("#buscarCompania").click(function(){
		$("#companias").hide();
		$("#resultados-busqueda").show();
	});
	$("#cancelarCompania").click(function(){
		limpiarCompania();
		$("#companias").hide();
		$("#resultados-busqueda").show();
	});
	$("#limpiarCompania").click(function(){
		limpiarCompania();
	});   
/**
 *  Mantenimiento de la tabla usu_usuario
 * 
 */
    var total = $("#totalregistrosUsuario").val();
	for (var i = 1; i <= total; i++) {
		aux = i;
		$('#EditarUsuario'+aux).click({param1: aux}, editarUsuario);
		function editarUsuario(event){
			id = $('#USU_ID'+event.data.param1).val();
			empleado = $('#EMP_ID'+event.data.param1).val();
			alias = $('#USU_ALIAS'+event.data.param1).val();
			pass = $('#USU_PASSWORD'+event.data.param1).val();
			email = $('#USU_EMAIL'+event.data.param1).val();
			fecharegistro = $('#USU_FECHA_REGISTRO'+event.data.param1).val();
			$("#id").val(id);
			$("#empleado").val(empleado);
			$("#alias").val(alias);
			$("#password").val(pass);
			$("#email").val(email);
			$("#fecha").val(fecharegistro);
			$("#resultados-busqueda").hide();
			$("#div-agregar").hide();
			$("#div-limpiar").hide();
	    	$("#usuarios").show();
	    	$("#div-modificar").show();
			HabilitarCamposUsuario();
		}
		$('#EliminarUsuario'+aux).click({param1: aux}, eliminarUsuario);
		function eliminarUsuario(event){
			id = $('#USU_ID'+event.data.param1).val();
			$("#identificador").val(id);
			$('#myModalLabel').html('Advertencia!');
			$('.modal-body').html('<div class="alert alert-warning" role="alert">Está seguro que desea eliminar el Registro?</div>');
			$('#myModal').modal('show');
		}
	};
	$('#eliminarUsuario').click(function() {
		var accion = "EliminarUsuario";
	 	var id = $("#identificador").val();
	 	var datos = 'id=' + id+'&accion=' + accion;
        $.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Usuarios.php",
			    data: datos,
			    success: function(response) {
			    	$('#myModal').modal('hide');
			    	limpiarUsuario();
			    	//alert(response);
			    	if(response == 1){
			    		alert("No se ha podido Eliminar el registro del  Usuario");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		alert("Los datos del  Usuario han sido Eliminados con Exito");
			    	}
			    	else{
			    		alert(response);
			    	}
			        $('.ajaxgif').hide();
			        $('.msg').text('Mensaje enviado!').addClass('msg_ok').animate({ 'right' : '130px' }, 300);  
			    },
			    error: function(response) {
			    	$('#myModal').modal('hide');
			    	alert(response);
			        $('.ajaxgif').hide();
			        $('.msg').text('Hubo un error!').addClass('msg_error').animate({ 'right' : '130px' }, 300);                 
			    }
			});
			return false;
    });
	$("#modificarUsuario").click(function(){
		var accion = "ModificarUsuario";
		var id = $("#id").val();
		var empleado = $("#empleado").val();
		var alias = $("#alias").val();
		var password = $("#password").val();
		var email = $("#email").val();
		var fecha = $("#fecha").val();
		var datosString = $("#usuarios").serialize();
		var dato = '&accion=' + accion+'&id=' + id;
		var validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		if(email == "" || !validacion_email.test(email)){
			$("#email").focus();
			alert('(*)Campo Obligatorio: Ingrese su email');
			return false;
		}
		else 
		if(password == ""){
			$("#password").focus();
			alert('(*)Campo Obligatorio: Ingrese la contraseña');
			return false;
		}
		else 
		if(empleado == ""){
			$("#empleado").focus();
			alert('(*)Campo Obligatorio: Ingrese cooperativa');
			return false;
		}
		else{
			$('#error').html('');
			$('.ajaxgif').removeClass('hide');
			datos = datosString+dato;
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Usuarios.php",
			    data: datos,
			    success: function(response) {
			    	limpiarUsuario();
			    	if(response == 1){
			    		alert("No se ha podido Modificar los datos del Usuario");
			    	}
			    	else if (response == "Exito"){
			    		location.reload(true);
			    		 alert("Los datos del  Usuario han sido Modificados con Exito");
			    	}
			    	else{
			    		alert(response);
			    	}
			        $('.ajaxgif').hide();
			        $('.msg').text('Mensaje enviado!').addClass('msg_ok').animate({ 'right' : '130px' }, 300);  
			    },
			    error: function(response) {
			        $('.ajaxgif').hide();
			        $('.msg').text('Hubo un error!').addClass('msg_error').animate({ 'right' : '130px' }, 300);                 
			    }
			});
			return false;
		}
	});
	$("#agregarUsuario").click(function(){
		var accion = "InsertarUsuario";
		var id = $("#id").val();
		var empleado = $("#empleado").val();
		var alias = $("#alias").val();
		var password = $("#password").val();
		var email = $("#email").val();
		var fecha = $("#fecha").val();
		var datosString = $("#usuarios").serialize();
		var dato = '&accion=' + accion;
		var validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		 if(email == "" || !validacion_email.test(email)){
			$("#email").focus();
			alert('(*)Campo Obligatorio: Ingrese su email');
			return false;
		}
		else 
		if(password == ""){
			$("#password").focus();
			alert('(*)Campo Obligatorio: Ingrese la contraseña');
			return false;
		}
		else 
		if(empleado == ""){
			$("#empleado").focus();
			alert('(*)Campo Obligatorio: Ingrese cooperativa');
			return false;
		}
		else{
			$('#error').html('');
			$('.ajaxgif').removeClass('hide');
			datos = datosString+dato;
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Usuarios.php",
			    data: datos,
			    success: function(response) {
			    	limpiarUsuario();
			    	if(response == 1){
			    		alert("No se ha podido Agregar el Usuario");
			    	}
			    	else if (response == "Exito"){
			    		location.reload();
			    		alert("El Usuario ha sido agregado con Exito");
			    	}
			    	else{
			    		alert(response);
			    	}
			        $('.ajaxgif').hide();
			        $('.msg').text('Mensaje enviado!').addClass('msg_ok').animate({ 'right' : '130px' }, 300);  
			    },
			    error: function(response) {
			    	alert(response);
			        $('.ajaxgif').hide();
			        $('.msg').text('Hubo un error!').addClass('msg_error').animate({ 'right' : '130px' }, 300);                 
			    }
			});
			return false;
		}
	});
    function HabilitarCamposUsuario(){
		$("#id").prop('disabled', true);
		$("#empleado").prop('disabled', false);
		$("#alias").prop('disabled', false);
		$("#password").prop('disabled', false);
		$("#email").prop('disabled', false);
		$("#fecha").prop('disabled', false);
	}
	function limpiarUsuario(){
		$("#id").val('');
		$('#empleado').prop('selectedIndex',0);
		$("#alias").val('');
		$("#password").val('');
		$("#email").val('');
	}
	$("#nuevoUsuario").click(function(){
		$("#usuarios").show();
		$("#div-limpiar").show();
		$("#div-modificar").hide();
		limpiarUsuario();
		HabilitarCamposUsuario();
		$("#resultados-busqueda").hide();
	});
	$("#buscarUsuario").click(function(){
		$("#usuarios").hide();
		$("#resultados-busqueda").show();
	});
	$("#cancelarUsuario").click(function(){
		limpiarUsuario();
		$("#usuarios").hide();
		$("#resultados-busqueda").show();
	});
	$("#limpiarUsuario").click(function(){
		limpiarUsuario();
	});
/**
 *  Login de Usuarios
 * 
 * 
 */
	$("#login").click(function(){
		$('#bloquea').removeClass('hide');
		$(".alert").remove();
		var accion = "login";
		var capcha = $("#code").val();
		var email = $("#email").val();
		var password = $("#password").val();
		var check = $("#recordar:checked").val();//:checked para recoger el valor solo si ha sido seleccionado
		var validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		if(email == "" || !validacion_email.test(email)){
			$('#bloquea').addClass('hide');
			$("#email").focus().after("<div class='alert alert-warning' role='alert'><strong>(*)Campo Obligatorio!:</strong>Ingrese su correo electrónico</div>");
			return false;
		}
		else 
		if(password == ""){
			$('#bloquea').addClass('hide');
			$("#password").focus().after("<div class='alert alert-warning' role='alert'><strong>(*)Campo Obligatorio!:</strong>Ingrese la contraseña</div>");;
			return false;
		}
		else if(capcha == "")
		{
			$('#bloquea').addClass('hide');
			$("#code").focus().after("<div class='alert alert-warning' role='alert'><strong>(*)Campo Obligatorio!:</strong>Ingrese Captcha</div>");;
			return false;
		}
		else{
			$('#error').html('');
			var datos = '&email=' + email + '&password=' + password + '&accion=' + accion + '&recordar='+check;
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Usuarios.php",
			    data: datos,
			    success: function(response) {
			    	$('#bloquea').addClass('hide');
			    	//alert(response);
			    	if(response == 1){
			    		$("#email").focus().after("<div class='alert alert-warning' role='alert'>Su correo electrónico es inválido</div>");
			    	}
			    	else if (response == 2){
			    		$("#password").focus().after("<div class='alert alert-warning' role='alert'>Su contraseña es incorrecta</div>");;
			    	}
			    	else if(response == 3){//contraseña  y correo electrónico son  incorrectos
			    		$('#bloquea').addClass('hide');
			    		$('#myModal').modal();
			    		$('#myModal').modal('show');
			    	}
			    	else{
			    		$('#bloquea').addClass('hide');
			    		location.href = "/Github/Interdeco/Vista/";
			    	}
			    },
			    error: function(response) {
			    	//alert(response);
			    	$('#bloquea').addClass('hide');
			    	$('.modal-body').html(response);
			        $('#myModal').modal();
			    	$('#myModal').modal('show');
			    }
			});
			return false;
		}
	});      
	$('#cap').click(function() {
        validarCaptcha();
    });
    function validarCaptcha() {
        var code = $('#code').val();
        var param = 'code=' + code;
        $.ajax({
                type: "POST",
                url: "validate_captcha.php",
                data: param,
                success: function(msg) {
                    if (msg == '1') {
                    alert('Captcha correcto');
                    } 
                    else {
                    alert('Captcha mal escrito');
                    return false;
                    }
                },
                error: function() {
                    alert('error al hacer la petición ajax');
                }
        });
        return false;
    }
    $('#captcha').click(function() {
    //Utiliza el número aleatorio para no traer la imagen desde el caché del navegador.
       $('#captchaImg').attr('src', "get_captcha.php?rnd=" + Math.random());
    });
	$('[data-toggle="tooltip"]').tooltip();//Habilita tooltip
});