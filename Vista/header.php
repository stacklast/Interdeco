<?php
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['usuario']) !='')
if (!isset($_SESSION['password']) && !isset($_SESSION['password']) !='')
{
  echo '<script>location.href = "/GitHub/Interdeco/Vista/Login/";</script>';
}
$domain = "http://".$_SERVER['SERVER_NAME']."/github/Interdeco";

$path = $_SERVER['PHP_SELF'];
$file = dirname($path);
if ( strpos($file, '/') !== FALSE )
 $file = array_pop(explode('/', $file));
//echo $file;
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Interdeco</title>
        <!-- The main CSS file -->
        <link href="<?php echo $domain; ?>/assets/css/style.css" rel="stylesheet" />

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $domain; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $domain; ?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo $domain; ?>/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo $domain; ?>/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $domain; ?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $domain; ?>/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $domain; ?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<noscript>
    <h2>Para ver esta pagina web se requiere JavaScript.<br>Se aborto la carga de la pagina.</h2>
</noscript>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $domain; ?>/">Sistema de Planes Turistcos |</a>
                <div class="navbar-brand">Bienvenido: <small><?php echo $_SESSION['usuario']; ?></small></div>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Registros Nuevos 1</strong>
                                        <span class="pull-right text-muted">40% Aprox.</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Registros Actualizados</strong>
                                        <span class="pull-right text-muted">20% Aprox.</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Registros Modificados</strong>
                                        <span class="pull-right text-muted">60% Aprox.</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Registros Eliminados</strong>
                                        <span class="pull-right text-muted">80% Aprox.</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Ver log de Registros</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil de Usuarios</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Configuracion</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $domain; ?>/Vista/Login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Cesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a id="menu-inicio" class="active" href="<?php echo $domain; ?>/"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        <li>
                            <a id="menu-inscripcion" href="<?php echo $domain; ?>/Vista/Inscripcion/" target="_blank"><i class="fa fa-edit fa-fw"></i>Inscripción</a>
                        </li>
                        <li>
                            <a id="menu-pago" href="<?php echo $domain; ?>/Vista/Pago/"><i class="glyphicon glyphicon-usd"> </i>Pago de Clientes</a>
                        </li>
                        <li>
                            <a id="menu-facturacion" href="<?php echo $domain; ?>/Vista/Facturacion/"><i class="fa fa-edit fa-fw"></i>Facturación</a>
                        </li>
                        <li id="menu-mantenimientos">
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Mantenimientos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a id="menu-usuarios" href="<?php echo $domain; ?>/Vista/Mantenimiento/Usuarios/">Usuarios</a>
                                </li>
                                <li>
                                    <a id="menu-companias" href="<?php echo $domain; ?>/Vista/Mantenimiento/Companias/">Companias</a>
                                </li>
                                <li>
                                    <a id="menu-empleados" href="<?php echo $domain; ?>/Vista/Mantenimiento/Empleados/">Empleados</a>
                                </li>
                                <li>
                                    <a id="menu-participantes" href="<?php echo $domain; ?>/Vista/Mantenimiento/Participantes/">Participantes</a>
                                </li>
                                <li>
                                    <a id="menu-programas" href="<?php echo $domain; ?>/Vista/Mantenimiento/Programas/">Planes y Programas</a>
                                </li>
                                <li>
                                    <a id="menu-extras" href="#">Extras</a>
                                </li>
                                <li>
                                    <a id="menu-perfiles" href="#">Perfiles</a>
                                </li>
                                <li>
                                    <a id="menu-recursos" href="#">Recursos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li id="menu-comprobantes">
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Comprobantes Electrónicos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a id="menu-factura" href="<?php echo $domain; ?>/Vista/Mantenimiento/Facturacion/">Facturacion</a>
                                </li>
                                <li>
                                    <a id="menu-companias" href="<?php echo $domain; ?>/Vista/Mantenimiento/Companias/">Nota de Crédito</a>
                                </li>
                                <li>
                                    <a id="menu-empleados" href="<?php echo $domain; ?>/Vista/Mantenimiento/Empleados/">Nota de Débito</a>
                                </li>
                                <li>
                                    <a id="menu-participantes" href="<?php echo $domain; ?>/Vista/Mantenimiento/Participantes/">Guía de Remisión</a>
                                </li>
                                <li>
                                    <a id="menu-programas" href="<?php echo $domain; ?>/Vista/Mantenimiento/Programas/">Comprobante de Retención</a>
                                </li>
                                <li>
                                    <a id="menu-extras" href="#">Extras</a>
                                </li>
                                <li>
                                    <a id="menu-perfiles" href="#">Perfiles</a>
                                </li>
                                <li>
                                    <a id="menu-recursos" href="#">Recursos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a id="menu-reportes" href="#"><i class="fa fa-files-o fa-fw"></i>Reportes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a id="menu-reportes-facturas"href="#">Facturas</a>
                                </li>
                                <li>
                                    <a id="menu-reportes-participates" href="#">Participantes</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
