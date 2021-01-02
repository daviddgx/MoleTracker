<?php
session_start();
include 'Auth.php';
include 'LQS_EUQ/GuiaActiva.php';
$fecha = date("d") . '-' . date("m") . '-' . date("Y");

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');
} else {
}


// Agregar a la variable se sesion el numero de Guia Activa




$_SESSION['GuiaSAPActiva']= $lista_Guias['GuiaSAP'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mole Tracker / Tracker </title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <script src="https://kit.fontawesome.com/0589e46b1a.js" crossorigin="anonymous"></script>
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/adminContainer.css" rel="stylesheet" type="text/css" />
    <link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="plugins/kalendar/kalendar.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/scroll/nanoscroller.css">
    <link href="plugins/morris/morris.css" rel="stylesheet" />
    <link rel="icon" href="imagenes/LOGOTKM2.PNG" width="auto" height="30">
    <!-- MDBootstrap Datatables  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/custom2.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


    <style>
        body {
            background: url("imagenes/StaticF4.svg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-attachment: fixed;
            overflow: scroll;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

</head>

<body class="dark_theme  fixed_header left_nav_fixed light_theme green_thm">

        <!--\\\\\\\ wrapper Start \\\\\\-->
        <div class="header_bar">
            <!--\\\\\\\ header Start \\\\\\-->
            <div class="brand">
                <!--\\\\\\\ brand Start \\\\\\-->
                <div class="logo" style="display:block">
                    <img src="imagenes/LOGOTKM2.PNG" width="auto" height="30" class="d-inline-block align-top" alt="Logo GDX">
                    <span class="theme_color">Mole</span> Tracker</div>
            </div>
            <!--\\\\\\\ brand end \\\\\\-->
            <div class="header_top_bar ">
                <!--\\\\\\\ header top bar start \\\\\\-->
                <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
                <div class="top_left">
                    <div class="top_left_menu">
                        <ul>
                            <li> <a href="javascript:ReloadPage();"><i class="fa fa-repeat"></i></a> </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="javascript:Salir();"> <i class="fa fa-sign-out-alt"></i> </a>
                                <ul class="drop_down_task dropdown-menu" style="margin-top:50px">
                                    <div class="top_left_pointer"></div>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember">
                                                Recordarme </label>
                                        </div>
                                    </li>
                                    <li> <a href="help.html"><i class="fa fa-question-circle"></i> Ayuda</a> </li>
                                    <li> <a href="settings.html"><i class="fa fa-cog"></i> Configuración </a></li>
                                    <li> <a href="logout.php"><i class="fa fa-power-off"></i> LogOut</a> </li>
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
                            <li> <a href="profile.html"><i class="fa fa-user"></i> Perfil</a> </li>
                            <li> <a href="help.html"><i class="fa fa-question-circle"></i> Ayuda</a> </li>
                            <li> <a href="settings.html"><i class="fa fa-cog"></i> Configuracion </a></li>
                            <li> <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--\\\\\\\ header top bar end \\\\\\-->
        </div>
        <!--\\\\\\\ header end \\\\\\-->


            <!--\\\\\\\ inner start \\\\\\-->
            <div class="left_nav">
                <!--\\\\\\\left_nav start \\\\\\-->
                <div class="search_bar"> <i class="fa fa-search"></i>
                    <input name="" type="text" class="search" placeholder="Buscar..." />
                </div>
                <div class="left_nav_slidebar">
                    <ul>
                        <li class="left_nav_active theme_border"><a href="javascript:void(0);"><i class="fa fa-home"></i> TRACKER <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span> </a>
                            <ul class="opened" style="display:block">
                                <li>
                                    <a href="DashboardTraker.php"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b class="theme_color">DashBoard</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerGuiasEntregadas.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guías Entregadas</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerGuiasPlanificadas.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guías Planificadas</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerAtrasos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guías Retrasadas</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerGuiaActiva.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guía Activa</b> </a>
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
                        <h1>Bienvenido...</h1>
                        <h2 class="">Panel de Configuración...</h2>
                    </div>
                    <div class="pull-right">
                        <ol class="breadcrumb">
                            <li><a>Sertero</a></li>
                            <li><a>AplicacionesWeb</a></li>
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

                <!-- Conenido -->
                <div class="hide" id="Contenido">

                    <div class="container clear_both padding_fix">
                        <!--\\\\\\\ container  start \\\\\\-->
                        <div class="row">
                            <!-- Primer Componente   -->
                            <div class="col-sm-3 col-sm-6">
                                <div class="information green_info">
                                    <div class="information_inner">
                                        <div class="info green_symbols"><i class="fa fa-anchor icon"></i></div>
                                        <span>Guias Despachadas </span>
                                        <?php
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        $consulta = "SELECT count(*) FROM traker_mole.trck_mle_areas;";
                                        $result = $conn->query($consulta);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<h1 class="bolded">' . $row['count(*)'] . '</h1>';
                                            }
                                        }
                                        ?>
                                        <div class="infoprogress_green">
                                            <div class="greenprogress"></div>
                                        </div>
                                        <div class="pull-right" id="work-progress1">
                                            <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Primer Componente -->

                            <!-- Segundo Elementeo -->
                            <div class="col-sm-3 col-sm-6">
                                <div class="information blue_info">
                                    <div class="information_inner">
                                        <div class="info blue_symbols"><i class="fa  fa-clock-o icon"></i></div>
                                        <span>Horas en Andenes </span>
                                        <!-- //Consulta con los ciudadanos regustrados y devolver valor -->

                                        <?php

                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        $consulta = "SELECT count(*) FROM traker_mole.trck_mle_vehiculos;";
                                        $result = $conn->query($consulta);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<h1 class="bolded">' . $row['count(*)'] . '</h1>';
                                            }
                                        }
                                        ?>
                                        <div class="infoprogress_blue">
                                            <div class="blueprogress"></div>
                                        </div>
                                        <div class="pull-right" id="work-progress2">
                                            <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Segundo Elemento -->

                            <!-- Tercer Elemento -->
                            <div class="col-sm-3 col-sm-6">
                                <div class="information red_info">
                                    <div class="information_inner">
                                        <div class="info red_symbols"><i class="fa  fa-files-o icon"></i></div>
                                        <span>Guías Entregadas</span>
                                        <!-- Consulta de Votos y muestra el valor -->
                                        <?php

                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        $consulta = "SELECT count(*)  FROM traker_mole.trck_mle_guias where Estatus = 'Entregada';";
                                        $result = $conn->query($consulta);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<h1 class="bolded">' . $row['count(*)'] . '</h1>';
                                            }
                                        }
                                        ?>
                                        <div class="infoprogress_red">
                                            <div class="redprogress"></div>
                                        </div>
                                        <div class="pull-right" id="work-progress3">
                                            <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Tercer Elemento -->

                            <!-- Cuarto Elemento -->
                            <div class="col-sm-3 col-sm-6">
                                <div class="information red_info">
                                    <div class="information_inner">
                                        <div class="info red_symbols"><i class="fa  fa-file icon"></i></div>
                                        <span> Guias en Transito </span>
                                        <!-- //conteo de candidoas totales para mostra -->
                                        <?php

                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        $consulta = "SELECT count(*) FROM traker_mole.trck_mle_guias where Estatus = 'En Proceso';";
                                        $result = $conn->query($consulta);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<h1 class="bolded">' . $row['count(*)'] . '</h1>';
                                            }
                                        }
                                        ?>
                                        <div class="infoprogress_red">
                                            <div class="redprogress"></div>
                                        </div>
                                        <div class="pull-right" id="work-progress4">
                                            <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Termina Cuarto Elemento -->

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="block-web">
                                    <div class="header">
                                        <h3 class="content-header">Rendimiento Diario en Horas de carga promedio</h3>
                                    </div>
                                    <div class="porlets-content">
                                        <div id="graph"></div>
                                        <br>
                                    </div>
                                    <!--/porlets-content-->
                                </div>
                                <!--/block-web-->
                            </div>
                            <!--/col-md-12-->
                        </div>
                        <!--/row-->

                <!-- FIN Conenido -->


                <script src="js/jquery-2.1.0.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/common-script.js"></script>
                <script src="js/jquery.slimscroll.min.js"></script>
                <script src="js/jquery.sparkline.js"></script>
                <script src="js/sparkline-chart.js"></script>
                <script src="js/graph.js"></script>
                <script src="js/edit-graph.js"></script>
                <script src="plugins/kalendar/kalendar.js" type="text/javascript"></script>
                <script src="plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>
                <script src="plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
                <script src="plugins/sparkline/jquery.customSelect.min.js"></script>
                <script src="plugins/sparkline/sparkline-chart.js"></script>
                <script src="plugins/sparkline/easy-pie-chart.js"></script>
                <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
                <script src="plugins/morris/raphael-min.js" type="text/javascript"></script>
                <script src="plugins/morris/morris-script.js"></script>
                <script src="plugins/demo-slider/demo-slider.js"></script>
                <script src="plugins/knob/jquery.knob.min.js"></script>
                <script src="js/jPushMenu.js"></script>
                <script src="js/side-chats.js"></script>
                <script src="js/jquery.slimscroll.min.js"></script>
                <script src="plugins/scroll/jquery.nanoscroller.js"></script>
                <script src="js/FuncionesInternas.js"></script>
                <script>
                    window.addEventListener('load', () => {
                        carga();
                    })
                </script>
</body>

</html>