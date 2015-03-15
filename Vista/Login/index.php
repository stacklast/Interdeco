<?php 
$domain = "http://".$_SERVER['SERVER_NAME']."/github/Interdeco";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="robots" content="noindex">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de Facturación Electrónica de Planes Turísticos">
    <meta name="author" content="Edwin Benalcázar Espín <softwareywebsoluciones@gmail.com>">

    <title>Autentificación Sistema Interdeco</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $domain; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $domain; ?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $domain; ?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $domain; ?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .cargando {
    width: 100%;height: 100%;
    overflow: hidden; 
    top: 0px;
    left: 0px;
    z-index: 10000;
    text-align: center;
    position:absolute; 
    background-color: #000000;
    opacity:0.6;
    filter:alpha(opacity=40);
    }
    .cargando img{
        margin: 15em auto;
    }
    </style>
</head>

<body style="background:url('<?php echo $domain; ?>/img/bg.jpg');background-size:cover; background-repeat:no-repeat;">
    <div id="bloquea" class="cargando hide">
        <img src="images/cargando.gif">
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Advertencia!</h4>
          </div>
          <div class="modal-body">
            Los 2 Datos ingresados son Incorrectos      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="container" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <img src="<?php echo $domain; ?>/img/logo.png" alt="">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Autentificación</h1>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input id="email" class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="password" class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="overflowMe">
                                    <div id="refresh">
                                        <img id="captcha" alt="" src="images/refreshIcon.png" />
                                    </div>
                                    <img id="captchaImg" alt="" src="get_captcha.php" />
                                    <input id="code" type="text" name="code" required="required" class="form-control" placeholder="Insertar Captcha"/>      
                                </div>
                                <div>
                                    <button id="cap" class="btn btn-info" type="botton">Validar Captcha</button>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Recordarme">Recordarme
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button id="login" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo $domain; ?>/js/jquery-1.11.0.js"></script>
    
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <!-- jQuery usuarios.ajax -->
    <script src="<?php echo $domain; ?>/js/ajax.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $domain; ?>/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $domain; ?>/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $domain; ?>/js/sb-admin-2.js"></script>

</body>

</html>
    
