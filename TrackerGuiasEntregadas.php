<?php


session_start();

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');
} else {
}

sleep(2);
include 'Auth.php';
include 'LQS_EUQ/GuiasTraker.php';


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mole Tracker / Tracker </title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <script src="https://kit.fontawesome.com/0589e46b1a.js" crossorigin="anonymous"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/adminContainer.css" rel="stylesheet" type="text/css" />
    <link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="plugins/kalendar/kalendar.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/scroll/nanoscroller.css">
    <link href="plugins/morris/morris.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/EstiloTablas.css">
    <link rel="stylesheet" href="css/custom2.css">
    <link rel="icon" href="imagenes/LOGOTKM.PNG">


    <style>
        body {
            background: url("imagenes/Registro.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-attachment: fixed;
            overflow: scroll;
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
                                    <li> <a href="login.php"><i class="fa fa-power-off"></i> LogOut</a> </li>
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

        <div class="inner sticky-top ">
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
                                    <a href="DashboardTraker.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i> <b>DashBoard</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerGuiasEntregadas.php"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b class="theme_color">Guias Entregadas</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerTiempos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Tiempos</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerAtrasos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guias Retrasadas</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerGuiaActiva.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guia Activa</b> </a>
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
                        <h1>Guias Entregadas...</h1>
                        <h2 class="">Panel de Configuración...</h2>
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

                <!-- Contenido -->
                <div class="hide" id="Contenido">
                    <!-- Se Ingresan Los Mantenimientos -->
                    <!-- Inicia La seccion de usuarios -->
                    <div class="container" id="listausuarios">
                        <div class="myform-all Color_Claro" style="font-size: 15px;">
                            <!-- Inicia Tabla de Usuarios; -->
                            <br>
                            <h1 class="Titulos">Guias Entregadas</h1>
                            <form role="form" action="" method="post" class="">
                                <table>
                                    <tr>
                                        <th>No. Guia</th>
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
                                        for ($i = 0; $i < $lista_Guias; $i++) {
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $lista_Guias['ID_GUIA'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Piloto'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Placa_Camion'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Camion_Capacidad'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Rampa'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Destino'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Fecha_Carga'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Fecha_Entrega'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['PesoBruto'];
                                            echo "</td>";
                                            echo "<td>";
                                            echo $lista_Guias['Estatus'];
                                            echo "</td>";
                                            echo "</tr>";
                                            $lista_Guias = $ejecutar_sentencia->fetch_array();
                                        }
                                        ?>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <!-- Finaliza Tabla de Usuarios;  -->
                </div>
                <!-- Fin Se Ingresan los mantenimientos -->

                <div class="demo"><span id="demo-setting"><i class="fa fa-cog txt-color-blueDark"></i></span>
                    <form>
                        <legend class="no-padding margin-bottom-10" style="color:#6e778c;">Layout Options</legend>
                        <section><label><input type="checkbox" class="checkbox style-0" id="smart-fixed-header" name="subscription"><span>Fixed Header</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-fixed-navigation" name="terms"><span>Fixed Navigation</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-rigth-navigation" name="terms"><span>Right Navigation</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-boxed-layout" name="terms"><span>Boxed Layout</span></label>
                            <span id="smart-bgimages" style="display: none;"></span>
                        </section>
                        <section>
                            <h6 class="margin-top-10 semi-bold margin-bottom-5">Clear Localstorage</h6><a id="reset-smart-widget" class="btn btn-xs btn-block btn-primary" href="javascript:void(0);"><i class="fa fa-refresh"></i> Factory Reset</a>
                        </section>
                        <h6 class="margin-top-10 semi-bold margin-bottom-5">Ultimo Skins</h6>
                        <section id="smart-styles"><a style="background-color:#23262F;" class="btn btn-block btn-xs txt-color-white margin-right-5" id="dark_theme" href="javascript:void(0);"><i id="skin-checked" class="fa fa-check fa-fw"></i> Dark Theme</a><a style="background:#E35154;" class="btn btn-block btn-xs txt-color-white" id="red_thm" href="javascript:void(0);">Red Theme</a><a style="background:#34B077;" class="btn btn-xs btn-block txt-color-darken margin-top-5" id="green_thm" href="javascript:void(0);">Green Theme</a><a style="background:#56A5DB" class="btn btn-xs btn-block txt-color-white margin-top-5" data-skinlogo="img/logo-pale.png" id="blue_thm" href="javascript:void(0);">Blue Theme</a><a style="background:#9C6BAD" class="btn btn-xs btn-block txt-color-white margin-top-5" id="magento_thm" href="javascript:void(0);">Magento Theme</a>
                            <a style="background:#FFFFFF" class="btn btn-xs btn-block txt-color-black margin-top-5" id="light_theme" href="javascript:void(0);">Light Theme</a>
                        </section>
                    </form>
                </div>
            </div>
            <!-- Final Contenido -->




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