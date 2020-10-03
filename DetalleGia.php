<?php


session_start();
$fecha = date("d") . '-' . date("m") . '-' . date("Y");

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');

}
$_SESSION['GuiaDetalle'] = $_GET["Guia"];
include 'Auth.php';
include 'LQS_EUQ/DetalleGuia.php';
$timestamp = date("Y-m-d H:i:s");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Mole Tracker / Tracker </title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <script src="https://kit.fontawesome.com/0589e46b1a.js" crossorigin="anonymous"></script>
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="css/adminContainer.css" rel="stylesheet" type="text/css"/>
    <link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="plugins/kalendar/kalendar.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/scroll/nanoscroller.css">
    <link href="plugins/morris/morris.css" rel="stylesheet"/>
    <link rel="icon" href="imagenes/LOGOTKM2.PNG" width="auto" height="30">

    <script src="/js/xlsx.full.min.js"></script>
    <script src="./js/FileSaver.min.js"></script>
    <script src="./js/tableexport.min.js"></script>


    <!-- MDBootstrap Datatables  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/custom2.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/loading-bar.css"/>
    <script type="text/javascript" src="/js/loading-bar.js"></script>

    <style>

        body {
            background: url("imagenes/AdminFondo.svg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-attachment: fixed;
            overflow: scroll;
        }

        #map {
            height: 100%;
        }


        select,
        input[type="file"] {
            height: 20px !important;
            line-height: 10px;
        }

        .container {
            max-width: 2140px;
        }


        #centrador {
            position: relative;
            width: 400px;
            height: 400px;

        }

        #imagen {
            position: absolute;
            width: 500px;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }

        #imagen2 {
            position: absolute;
            width: auto;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }


    </style>

    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .slimbuton {
            margin: 0;
            padding: 1px 0px 1px 0px;
        }

        .elemento {
            margin-top: 5px;
            padding-bottom: 5px;
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>


</head>

<body class="dark_theme  fixed_header left_nav_fixed light_theme green_thm">
<div class="wrapper">
    <!--\\\\\\\ wrapper Start \\\\\\-->
    <div class="header_bar">
        <!--\\\\\\\ header Start \\\\\\-->
        <div class="brand">
            <!--\\\\\\\ brand Start \\\\\\-->
            <div class="logo" style="display:block">
                <img src="imagenes/LOGOTKM2.PNG" width="auto" height="30" class="d-inline-block align-top"
                     alt="Logo GDX">
                <span class="theme_color">Mole</span> Tracker
            </div>

        </div>
        <!--\\\\\\\ brand end \\\\\\-->
        <div class="header_top_bar ">
            <!--\\\\\\\ header top bar start \\\\\\-->
            <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
            <div class="top_left">
                <div class="top_left_menu">
                    <ul>
                        <li><a href="javascript:ReloadPage();"><i class="fa fa-repeat"></i></a></li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" href="javascript:Salir();"> <i class="fa fa-sign-out-alt"></i>
                            </a>
                            <ul class="drop_down_task dropdown-menu" style="margin-top:50px">
                                <div class="top_left_pointer"></div>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember">
                                            Recordarme </label>
                                    </div>
                                </li>
                                <li><a href="help.html"><i class="fa fa-question-circle"></i> Ayuda</a></li>
                                <li><a href="settings.html"><i class="fa fa-cog"></i> Configuración </a></li>
                                <li><a href="logout.php"><i class="fa fa-power-off"></i> LogOut</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="top_right_bar">
                <div class="top_right">
                    <div class="top_right_menu">
                    </div>
                </div>
                <div class="user_admin dropdown">
                    <?php
                    echo '<div class="user_admin dropdown"><span class="user_adminname">Usuario: ' . $_SESSION['Usuario'] . '</span></div>';
                    echo '<div class="user_admin dropdown"><span class="user_adminname">Fecha: ' . $fecha . '</span></div>';
                    ?>
                    <ul class="dropdown-menu">
                        <div class="top_pointer"></div>
                        <li><a href="profile.html"><i class="fa fa-user"></i> Perfil</a></li>
                        <li><a href="help.html"><i class="fa fa-question-circle"></i> Ayuda</a></li>
                        <li><a href="settings.html"><i class="fa fa-cog"></i> Configuracion </a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--\\\\\\\ header top bar end \\\\\\-->


    </div>
    <!--\\\\\\\ header end \\\\\\-->
    <div class="inner">
        <!--\\\\\\\ inner start \\\\\\-->
        <div class="left_nav">

            <!--\\\\\\\left_nav start \\\\\\-->
            <div class="search_bar"><i class="fa fa-search"></i>
                <input name="" type="text" class="search" placeholder="Buscar..."/>
            </div>
            <div class="left_nav_slidebar">
                <ul>
                    <li class="left_nav_active theme_border"><a href="javascript:void(0);"><i class="fa fa-home"></i>
                            ADMINISTRACION <span class="left_nav_pointer"></span> <span class="plus"><i
                                        class="fa fa-plus"></i></span> </a>
                        <ul class="opened" style="display:block">
                            <li>
                                <a href="DashboardAdministradorGuias.php"> <span>&nbsp;</span> <i
                                            class="fa fa-circle"></i> <b>ADMINISTRACION</b> </a>
                            </li>
                            <li>
                                <a href="Admin_Guias.php"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i>
                                    <b class="theme_color">Guias</b> </a>
                            </li>
                            <li>
                                <a href="Admin_Unidades.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Unidades</b>
                                </a>
                            </li>
                            <li>
                                <a href="Admin_Areas.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Areas</b>
                                </a>
                            </li>
                            <li>
                                <a href="Admin_Pilotos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                    <b>Pilotos</b> </a>
                            </li>
                            <li>
                                <a href="Admin_Usuarios.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Usuarios</b>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--\\\\\\\left_nav end \\\\\\-->
        <div class="contentpanel">
            <!--\\\\\\\ contentpanel start\\\\\\-->
            <!-- Inicia la barra de Tutulo en right -->
            <div class="pull-left breadcrumb_admin clear_both">
                <div class="pull-left page_title theme_color">
                    <h1>Administrador de Guias de Carga...</h1>
                    <h2 class="">Panel de Administración...</h2>
                </div>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="http://www.google.com">Sertero</a></li>
                        <li><a href="http://www.google.com">AplicacionesWeb</a></li>
                        <li class="active">Mole Tracker</li>
                    </ol>
                </div>
            </div>
            <!-- Finaliza Barra de Titulo en right -->
            <!-- PreLoader -->
            <div id="PreLoaderCont">
                <div class="d-flex justify-content-center">
                    <div class="spinner-grow text-dark" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-dark" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-dark" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-dark" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <!-- Fin Preloader -->
            <div class="hide" id="Contenido">
                <!-- Se Ingresan Los Mantenimientos -->


                <!-- Finaliza Componente de Seguimiento -->


                <br>
                <div class="container" id="Mapa">

                    <!-- NavBar Mantenimiento -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <form class="form-inline my-2 my-lg-0">

                                <button class="fa fa-passport btn btn-success my-2 my-sm-0" style="margin-right: 10px;"
                                        type="button" onclick="CargarNuevaGuia()"> Nueva Guia
                                </button>
                                <button class="fa fa-binoculars  btn btn-info my-2 my-sm-0" style="margin-right: 10px;"
                                        type="button" onclick="CargarGuia()"> Visualizar Todas las Guias
                                </button>
                            </form>
                        </div>
                    </nav>
                    <br>
                    <!-- Fin NavBar Mantenimiento -->
                    <!-- Inicia Componente Registro Actividad -->
                    <div class="myform-all Color_Claro">


                        <div class="my-content formulario" style="text-align: center">

                            <h1><strong>Detalles de </strong> Guia</h1>

                        </div>
                    </div>
                    <!-- Finaliza Componente Registro actividad -->

                    <br>

                    <!-- Inicia La seccion de usuarios -->
                    <div class="container" id="listausuarios" style="text-align: center">
                        <div class="myform-all Color_Claro">
                            <!-- Inicia Tabla de Usuarios; -->
                            <br></br>
                            <h1 class="Titulos">Resumen de la Guia</h1>

                            <table class="table table-hover table-bordered">
                                <tr>

                                    <th>Guia SAP</th>
                                    <th>Piloto</th>
                                    <th>Placa del Camion</th>
                                    <th>Capacidad de Carga</th>
                                    <th>Rampa</th>
                                    <th>Destino</th>
                                    <th>Fecha de Carga</th>
                                    <th>Fecha de Entrega</th>
                                    <th>cantidad Cargada</th>
                                    <th>Estatus</th>
                                    <?php

                                    echo "<tr>";


                                    echo "<td>";

                                    echo $Detalle_Guia['GuiaSAP'];
                                    echo "</td>";

                                    echo "<td>";
                                    echo $Detalle_Guia['Piloto'];
                                    echo "</td>";

                                    echo "<td>";
                                    echo $Detalle_Guia['Placa_Camion'];
                                    echo "</td>";

                                    echo "<td>";
                                    echo $Detalle_Guia['Camion_Capacidad'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $Detalle_Guia['Rampa'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $Detalle_Guia['Destino'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $Detalle_Guia['Fecha_Carga'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $Detalle_Guia['Fecha_Entrega'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $Detalle_Guia['PesoBruto'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $Detalle_Guia['Estatus'];
                                    echo "</td>";

                                    echo "</tr>";

                                    ?>
                                </tr>

                            </table>

                        </div>
                    </div>
                    <!-- Finaliza Tabla de Usuarios;  -->
                    <br>
                    <div class="container" id="Mapa">
                        <!-- Inicia Componente de Seguimiento -->
                        <div class="myform-all Color_Claro">
                            <br>
                            <!-- Inicia Tabla de seguimiento -->
                            <div class="container" style="text-align: center">
                                <div class="row" style="text-align: center">
                                    <?php

                                    switch ($Detalle_Guia['Estatus']) {
                                        case 'Planificada':
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Planificacion</div>';
                                            echo '<div class="col"><img src="imagenes/Pendiente.png"></br>Carga</div>';
                                            echo '<div class="col"><img src="imagenes/Pendiente.png" ></br>Verificacion</div>';
                                            echo '<div class="col"><img src="imagenes/Pendiente.png" ></br>Salida</div>';
                                            echo '<div class="col"><img src="imagenes/Pendiente.png" ></br>Entrega</div>';
                                            break;

                                        case 'Carga':
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Planificacion</div>';
                                            echo '<div class="col"><img src="imagenes/Realizado.png"></br>Carga</div>';
                                            echo '<div class="col"><img src="imagenes/Pendiente.png" ></br>Verificacion</div>';
                                            echo '<div class="col"><img src="imagenes/Pendiente.png" ></br>Salida</div>';
                                            echo '<div class="col"><img src="imagenes/Pendiente.png" ></br>Entrega</div>';
                                            break;

                                        case 'Verificado':
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Planificacion</div>';
                                            echo '<div class="col"><img src="imagenes/Realizado.png"></br>Carga</div>';
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Verificacion</div>';
                                            echo '<div class="col"><img src="imagenes/Pendiente.png" ></br>Salida</div>';
                                            echo '<div class="col"><img src="imagenes/Pendiente.png" ></br>Entrega</div>';
                                            break;

                                        case 'Salida':
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Planificacion</div>';
                                            echo '<div class="col"><img src="imagenes/Realizado.png"></br>Carga</div>';
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Verificacion</div>';
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Salida</div>';
                                            echo '<div class="col"><img src="imagenes/Pendiente.png" ></br>Entrega</div>';
                                            break;

                                        case 'Entregado':
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Planificacion</div>';
                                            echo '<div class="col"><img src="imagenes/Realizado.png"></br>Carga</div>';
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Verificacion</div>';
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Salida</div>';
                                            echo '<div class="col"><img src="imagenes/Realizado.png" ></br>Entrega</div>';
                                            break;
                                    }
                                    ?>

                                </div>
                            </div>
                            <br></br>
                            <h1 class="Titulos" style="text-align: center">Seguimiento del Proceso</h1>
                            <form role="form" action="" method="post" class="">
                                <table class="table">
                                    <tr>
                                        <th>No. Proceso</th>
                                        <th>Area</th>
                                        <th>Registrado Por</th>
                                        <th>Hora de Registro</th>
                                        <th>Marcado</th>


                                        <?php
                                        for ($i = 0; $i < $lista_ProcesoGuias; $i++) {
                                            echo "<tr>";

                                            echo "<td>";
                                            echo $lista_ProcesoGuias['Area'];
                                            echo "</td>";

                                            echo "<td>";
                                            echo $lista_ProcesoGuias['Registrador'];
                                            echo "</td>";

                                            echo "<td>";
                                            echo $lista_ProcesoGuias['HoraRegistro'];
                                            echo "</td>";

                                            echo "<td>";
                                            echo $lista_ProcesoGuias['Accion'];
                                            echo "</td>";

                                            echo "<td>";
                                            echo "</tr>";
                                            $lista_ProcesoGuias = $ejecutar_sentenciaGuias->fetch(PDO::FETCH_ASSOC);
                                        }
                                        ?>
                                    </tr>

                                </table>
                            </form>

                        </div>
                    </div>
                    <!-- Finaliza Tabla de  Seguimiento -->


                    <!-- Finaliza Componente de Seguimiento -->

                    <br>
                    <div class="container">
                        <div class="myform-all Color_Claro" style="text-align: center">
                            <br>
                            <div class="row">
                                <div class="col"><h1 class="Titulos" style="text-align: center">Mapa de
                                        Entrega</h1></br>

                                    <!--  Mapa AutoGenerado-->
                                    <div id="map" style="width: 700px; height: 450px;"></div>
                                    Salida: <?php echo $Detalle_Guia['Traker_Inicio']; ?>
                                    <br>
                                    Entrega: <?php echo $Detalle_Guia['Tracker_Final']; ?>


                                </div>
                                </br>
                                <div class="col"><h1 class="Titulos" style="text-align: center">Tipo de
                                        selectivo</h1></br>
                                    <img style="text-align: center"
                                         class="img-responsive" <?php if ($Detalle_Guia['Verificador'] == 'Verde') {
                                        echo 'src="imagenes/Semaforo_Verde.png"> <br> Selectivo Verde';
                                    } elseif ($Detalle_Guia['Verificador'] == 'Rojo') {
                                        echo 'src="imagenes/Semaforo_Rojo.png"> <br> Se Revisa la Carga';
                                    } else {
                                        echo 'src="imagenes/Semaforo_Negro.png"> <br> Sin evaluar aun';
                                    } ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Finaliza Componente Abrir Mapa -->

            </div>
            <script>
                function CargarGuia() {
                    location.href = "http://localhost:63342/MoleTracker/Admin_Guias.php";
                }
            </script>

            <!-- Script Mapa-->
            <script>
                var map;

                function initMap() {
                    map = new google.maps.Map(
                        document.getElementById('map'),
                        {center: new google.maps.LatLng(14.6002705, -90.5179598), zoom: 10});

                    var iconBase =
                        'imagenes/';

                    var icons = {
                        parking: {
                            icon: iconBase + 'parking_lot_maps.png'
                        },
                        library: {
                            icon: iconBase + 'Bodeguita.gif'
                        },
                        info: {
                            icon: iconBase + 'Camionsito.gif'
                        }
                    };

                    var features = [
                        {

                            position: new google.maps.LatLng(<?php echo $Detalle_Guia['Traker_Inicio'];?>),
                            type: 'library'
                        }, {
                            position: new google.maps.LatLng(<?php echo $Detalle_Guia['Tracker_Final'];?>),
                            type: 'info'
                        }
                    ];

                    // Create markers.
                    for (var i = 0; i < features.length; i++) {
                        var marker = new google.maps.Marker({
                            position: features[i].position,
                            icon: icons[features[i].type].icon,
                            map: map
                        });
                    }

                }
            </script>

            <script defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMS9Z53e5o37lHssInOqrhm3I87WpYxZg&callback=initMap&callback=initMap&libraries&callback=initMap">
            </script>

        <script src="js/FuncionesInternas.js"></script>
        <!-- MDBootstrap Datatables  -->
        <script>
            window.addEventListener('load', () => {
                carga();
            })
        </script>


</body>

</html>
