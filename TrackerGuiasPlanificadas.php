<?php
session_start();
include_once 'LQS_EUQ/GuiasTraker.php';
include 'Auth.php';
$fecha = date("d") . '-' . date("m") . '-' . date("Y");

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');
} else {
}
$error = "";
$mensajeExito = "";

if (!empty($_POST['RegistrarInicio'])) {

// Creamos la conexion
    $conn = new mysqli($servername, $username, $password, $dbname);
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $_SESSION["GuiaSAPActiva"] = $txtID;
    if ($conn->connect_error) {
        die("Error en la conexion: " . $conn->connect_error);
    } else {

        //Logica del Negocio
        // 01 Valida si existen Guias activas

        // QRY UsuarioUnidad
        $GuiasIniciadas = "select Count(*) as registros from  traker_mole.trck_mle_guias where Usuario_Piloto = '" . $_SESSION['Usuario'] . "' and Estatus = 'Iniciada'";
        $resultuiasIniciadas = $conn->query($GuiasIniciadas);
        try {
            while ($rowdato = $resultuiasIniciadas->fetch_assoc()) {

                if (!$rowdato["registros"] == '0') {
                    //Mensaje de Error
                    $error = '<div class="alert alert-danger" role="alert"><p><strong>Solo puede tener 1 Guía Activa</div>';
                }else{

                    $sql = "update traker_mole.trck_mle_guias set estatus = 'Iniciada' where GuiaSap = '".$txtID."';";
                    if ($conn->query($sql) === TRUE) {

                        //Mensaje Exito
                        $error = '<div class="alert alert-success" role="alert"><p><strong>Guía '.$txtID.' Iniciada Correctamente</div>';
                    } else {

                        echo "Error: " . $sql . "<br>" . $conn->error;
                        $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                    }

                }
            }

        }catch (Exception $ex){
            echo $ex;
        }

        // 02 Activa la guia seleccionada si no Hay activas






    }


}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Mole Tracker / Tracker </title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <!--     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >-->
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
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
                            TRACKER <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span>
                        </a>
                        <ul class="opened" style="display:block">
                            <li>
                                <a href="DashboardTraker.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i> <b>DashBoard</b>
                                </a>
                            </li>
                            <li>
                                <a href="TrackerGuiasEntregadas.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i>
                                    <b>Guias Entregadas</b> </a>
                            </li>
                            <li>
                                <a href="TrackerGuiasPlanificadas.php"> <span>&nbsp;</span> <i
                                            class="fa fa-circle  theme_color"></i> <b class="theme_color">Guias
                                        Planificadas</b> </a>
                            </li>
                            <li>
                                <a href="TrackerAtrasos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guias
                                        Retrasadas</b> </a>
                            </li>
                            <li>
                                <a href="TrackerGuiaActiva.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guia
                                        Activa</b> </a>
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
                    <h1>Tiempos del Piloto...</h1>
                    <h2 class="">Panel Informativo...</h2>
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
                <div class="container" id="listausuarios">
                    <div class="myform-all Color_Claro">
                        <div class="col">
                            <div class="kalendar"></div>
                            <!--/calendar end-->
                        </div>
                        <br>
                        <h1 class="Titulos">Guias Planificadas para <?php echo $_SESSION['Usuario']; ?></h1>
                        <div class="saltito"><h1></h1></div>
                        <div> <?php echo $error . $mensajeExito; ?></div>
                        <br>
                        <form role="form" action="" method="post" class="">
                            <table id="example" class="table table-striped  " cellspacing="0" width="90%">
                                <thead>


                                <th>No. Guia SAP</th>
                                <th>Piloto</th>
                                <th>Placa del Camion</th>
                                <th>Capacidad de Carga</th>
                                <th>Rampa</th>
                                <th>Destino</th>
                                <th>Fecha de Carga</th>
                                <th>Fecha de Entrega</th>
                                <th>cantidad Cargada</th>
                                <th>Estatus</th>
                                <th>Iniciar</th>

                                </thead>
                                <tbody>
                                <?php
                                for ($i = 0; $i < $lista_GuiasPlanificadas; $i++) {
                                    echo "<tr>";

                                    echo "<td>";
                                    echo $lista_GuiasPlanificadas['GuiaSap'];
                                    echo "</td>";

                                    echo "<td>";
                                    echo $lista_GuiasPlanificadas['Piloto'];
                                    echo "</td>";

                                    echo "<td>";
                                    echo $lista_GuiasPlanificadas['Placa_Camion'];
                                    echo "</td>";

                                    echo "<td>";
                                    echo $lista_GuiasPlanificadas['Camion_Capacidad'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $lista_GuiasPlanificadas['Rampa'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $lista_GuiasPlanificadas['Destino'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $lista_GuiasPlanificadas['Fecha_Carga'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $lista_GuiasPlanificadas['Fecha_Entrega'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $lista_GuiasPlanificadas['PesoBruto'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $lista_GuiasPlanificadas['Estatus'];
                                    echo "</td>";
                                    echo '<input type="hidden" name="txtID" Value="' . $lista_GuiasPlanificadas['GuiaSap'] . '">';
                                    echo "<td>";
//                            echo '<a  type="submit" name="RegistrarInicio" value="RegistrarInicios" class="fa fa-dashboard btn btn-primary data-togle="modal" data-target="#myModal"></a>';

                                    echo '<div class=""><input type="submit" name="RegistrarInicio" value="I" class="effect-button fa fa-dashboard btn btn-primary"></input></div>';
                                    echo "</td>";

                                    echo "</tr>";
                                    $lista_GuiasPlanificadas = $ejecutar_GuiasPlanificadas->fetch(PDO::FETCH_ASSOC);


                                }
                                ?>
                                </tbody>
                            </table>
                        </form>
                        <!--/col-md-4 end-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Se Ingresan los mantenimientos -->


    </div>
    <!-- Fin Contenido -->

    <script src="js/FuncionesInternas.js"></script>
    <!-- MDBootstrap Datatables  -->
    <script>
        window.addEventListener('load', () => {
            carga();
        })
    </script>

    <script src="plugins/kalendar/kalendar.js" type="text/javascript"></script>
    <script src="plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>

    <script src="js/FuncionesInternas.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <script>
        window.addEventListener('load', () => {
            carga();
        })
    </script>


</body>

</html>