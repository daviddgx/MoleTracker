<?php
session_start();
$fecha = date("d") . '-' . date("m") . '-' . date("Y");
if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');


} else {


}
include 'Auth.php';
include 'LQS_EUQ/UnidadesRegistradas.php';

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
    <!-- MDBootstrap Datatables  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/custom2.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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

        select,
        input[type="file"] {
            height: 20px !important;
            line-height: 10px;
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
                                <a href="Admin_Guias.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guias</b>
                                </a>
                            </li>
                            <li>
                                <a href="Admin_Unidades.php"> <span>&nbsp;</span> <i
                                            class="fa fa-circle  theme_color"></i> <b class="theme_color"> Unidades</b>
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
                    <h1>Administrador de Unidades</h1>
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
                <div class="container clear_both padding_fix">

                    <!-- Iicia Contenido -->

                    <!-- NavBar Mantenimiento -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <form class="form-inline my-2 my-lg-0">

                                <button class="fa fa-truck btn btn-success my-2 my-sm-0" type="button"
                                        onclick="CargarNuevaUnidad()"> Registrar nueva unidad
                                </button>

                            </form>
                        </div>
                    </nav>
                    <br>
                    <!-- Fin NavBar Mantenimiento -->

                    <!-- Se Ingresan Los Mantenimientos -->
                    <!-- Inicia La seccion de usuarios -->
                    <div class="container" id="listausuarios">
                        <div class="myform-all Color_Claro">
                            <!-- Inicia Tabla de Usuarios; -->
                            <br>
                            <h1 class="Titulos">Unidades Registradas</h1>
                            <form role="form" action="" method="post" class="">
                                <table id="example" class="table table-striped  " cellspacing="0" width="100%">
                                    <thead>

                                    <th>ID Vehiculo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Placa del Camion</th>
                                    <th>Linea</th>
                                    <th>Tipo</th>
                                    <th>Velocidad</th>
                                    <th>Capacidad</th>
                                    <thead>
                                    <tbody>
                                    <?php
                                    for ($i = 0; $i < $lista_Unidades; $i++) {
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $lista_Unidades['ID_GUIA'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $lista_Unidades['GuiaSAP'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $lista_Unidades['Piloto'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $lista_Unidades['Placa_Camion'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $lista_Unidades['Camion_Capacidad'];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $lista_Unidades['Rampa'];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $lista_Unidades['Destino'];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $lista_Unidades['Fecha_Carga'];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $lista_Unidades['Fecha_Entrega'];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $lista_Unidades['PesoBruto'];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $lista_Unidades['Estatus'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo '<a href="' . $lista_Unidades['ID_GUIA'] . '"  class="fa fa-dashboard btn btn-primary data-togle="modal" data-target="#myModal"></a>';
                                        echo "</td>";

                                        echo "<td>";
                                        echo '<a href="' . $lista_Unidades['ID_GUIA'] . '"  class="fa fa-search btn btn-info data-togle="modal" data-target="#myModal"></a>';
                                        echo "</td>";

                                        echo "</tr>";

                                        $lista_Unidades = $UnidadesRegistradas->fetch(PDO::FETCH_ASSOC);
                                    }
                                    ?>
                                    <tbody>
                                </table>
                            </form>

                        </div>
                    </div>
                    <!-- Finaliza Tabla de Usuarios;  -->

                </div>
            </div>

            <!-- Fin Se Ingresan los mantenimientos -->
            <!-- Finaliza Contenido -->

        </div>

        <script>
            function CargarNuevaUnidad() {
                location.href = "http://localhost:63342/MoleTracker/Admin_NuevaUnidad.php";
            }
        </script>
        <script src="js/FuncionesInternas.js"></script>
        <!-- MDBootstrap Datatables  -->
        <script>
            window.addEventListener('load', () => {
                carga();
            })
        </script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>


</body>

</html>