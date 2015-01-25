$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();//Habilita tooltip
/**
 *  Mantenimiento de la tabla USU_USUARIO
 * 
 */
    var total = $("#totalregistros").val();
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
			    		alert("Los datos del  Usuario han sido Eliminados con Exito");
			    		var param = 'buscar = busqueda';
			    		$.ajax({
				                type: "POST",
				                url: "validate_captcha.php",
				                data: param,
				                success: function(msg) {
				                //alert(msg);
				                    if (msg == '1') {
				                    alert('Captcha correcto');
				                    } 
				                    else {
				                    alert('Captcha mal escrito');
				                    }
				                },
				                error: function() {
				                    alert('error al hacer la petición ajax');
				                }
				        });
				        return false;
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
		var cooperativa =$("#cooperativa").val();
		var rol = $("#rol").val();
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
		else 
		if(rol == ""){
			$("#rol").focus();
			alert('(*)Campo Obligatorio: Ingrese rol');
			return false;
		}
		else{
			$('#error').html('');
			$('.ajaxgif').removeClass('hide');
			datos = datosString+dato;
			//alert(datos);
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Usuarios.php",
			    data: datos,
			    success: function(response) {
			    	limpiarUsuario();
			    	//alert(response);
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
			    	//alert(response);
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
		var cooperativa =$("#cooperativa").val();
		var rol = $("#rol").val();
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
		else 
		if(rol == ""){
			$("#rol").focus();
			alert('(*)Campo Obligatorio: Ingrese rol');
			return false;
		}
		else{
			$('#error').html('');
			$('.ajaxgif').removeClass('hide');
			datos = datosString+dato;
			//alert(datos);
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Usuarios.php",
			    data: datos,
			    success: function(response) {
			    	limpiarUsuario();
			    	//alert(response);
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
		$("#empleado").val('');
		$("#alias").val('');
		$("#password").val('');
		$("#email").val('');
		//$("#fecha").val('');
	}
	$("#nuevo").click(function(){
		$("#usuarios").show();
		$("#div-limpiar").show();
		$("#div-modificar").hide();
		HabilitarCamposUsuario();
		$("#resultados-busqueda").hide();
	});

	$("#buscar").click(function(){
		$("#usuarios").hide();
		$("#resultados-busqueda").show();
	});
	$("#cancelarUsuario").click(function(){
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
		var accion = "login";
		var email = $("#email").val();
		var password = $("#password").val();
		var check = $("#recordar:checked").val();//:checked para recoger el valor solo si ha sido seleccionado
		var validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		if(email == "" || !validacion_email.test(email)){
			$("#email").focus();
			$('#error').html('(*)Campo Obligatorio: Ingrese su email');
			return false;
		}
		else 
		if(password == ""){
			$("#password").focus();
			$('#error').html('(*)Campo Obligatorio: Ingrese la contraseña');
			return false;
		}
		else{
			$('#error').html('');
			$('.ajaxgif').removeClass('hide');
			var datos = '&email=' + email + '&password=' + password + '&accion=' + accion + '&recordar='+check;
			//alert(datos);
			$.ajax({
			    type: "POST",
			    url: "/Github/Interdeco/Controlador/Controller.Usuarios.php",
			    data: datos,
			    success: function(response) {
			    	alert(response);
			    	if(response == 1){
			    		$('#error').html("su correo electrónico es incorrecto");
			    	}
			    	else if (response == 2){
			    		$('#error').html("su contraseña es incorrecta");
			    	}
			    	else if(response == 3){
			    		$('#error').html("su contraseña  y correo electrónico son  incorrectos");
			    	}
			    	else{
			    		location.href = "/Github/Interdeco/Vista/";
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
	$('#pag').click(function() {
         $('#pag').addClass('active');
         $('.nav-second-level').addClass('colapse in');
    });
	$('#cap').click(function() {
        validarCaptcha();
    });
    function validarCaptcha() {
        //alert('Captcha');
        var code = $('#code').val();
        var param = 'code=' + code;
        $.ajax({
                type: "POST",
                url: "validate_captcha.php",
                data: param,
                success: function(msg) {
                //alert(msg);
                    if (msg == '1') {
                    alert('Captcha correcto');
                    } 
                    else {
                    alert('Captcha mal escrito');
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

});