$(document).ready(function(){


         $('#pag').click(function() {
         	$('#pag').addClass('active');
         	$('.nav-second-level').addClass('colapse in');
             });
	$('#cap').click(function() {
                    
                    validarCaptcha();
                });
                function validarCaptcha() {
                   alert('Captcha');
                    var code = $('#code').val();
                    var param = 'code=' + code;
                    $.ajax({
                        type: "POST",
                        url: "validate_captcha.php",
                        data: param,
                        success: function(msg) {
                            alert(msg);
                            if (msg == '1') {
                                alert('Captcha correcto');
                            } else {
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
	
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
	});
	function HabilitarCampos(){
		$("#id").prop('disabled', true);
		$("#cooperativa").prop('disabled', false);
		$("#rol").prop('disabled', false);
		$("#nombre").prop('disabled', false);
		$("#alias").prop('disabled', false);
		$("#apellido").prop('disabled', false);
		$("#email").prop('disabled', false);
		$("#password").prop('disabled', false);
	}
	function limpiar(){
		
		$("#id").val('');
		$("#nombre").val('');
		$("#alias").val('');
		$("#apellido").val('');
		$("#email").val('');
		$("#password").val('');
	}
	$("#nuevo").click(function(){
		$("#usuarios").show();
		HabilitarCampos();
		$("#resultados-busqueda").hide();
	});

	$("#buscar").click(function(){
		$("#usuarios").hide();
		$("#resultados-busqueda").show();
	});
	$("#cancelar").click(function(){
		$("#usuarios").hide();
		$("#resultados-busqueda").show();
	});
	$("#limpiar").click(function(){
		limpiar();
	});
	$("#agregar").click(function(){
		var accion = "InsertarUsuario";
		var id = $("#id").val();
		var cooperativa =$("#cooperativa").val();
		var rol = $("#rol").val();
		var nombre = $("#nombre").val();
		var alias = $("#alias").val();
		var apellido = $("#apellido").val();
		var email = $("#email").val();
		var password = $("#password").val();
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
		if(cooperativa == ""){
			$("#cooperativa").focus();
			alert('(*)Campo Obligatorio: Ingrese cooperativa');
			return false;
		}
		else 
		if(rol == ""){
			$("#rol").focus();
			alert('(*)Campo Obligatorio: Ingrese rol');
			return false;
		}
		else 
		if(nombre == ""){
			$("#nombre").focus();
			alert('(*)Campo Obligatorio: Ingrese nombre');
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
			    	limpiar();
			    	//alert(response);
			    	if(response == 1){
			    		alert("No se ha podido Agregar el Usuario");
			    	}
			    	else if (response == "Exito"){
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
			alert(datos);
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

});