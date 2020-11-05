<?php


session_start();
date_default_timezone_set("America/Guatemala");
$fecha = date("d") . '-' . date("m") . '-' . date("Y");
$_SESSION["FechaTrabajo"] = date("d") . '-' . date("m") . '-' . date("Y");
$_SESSION["HoraTrabajo"] = date("H") . ':' . date("i") . ':' . date("s");
$_SESSION["Area"] = $_GET["Area"];
$_SESSION["TipoArea"] = $_GET["TipoArea"];

//Variables de Semaforo
$Semaforo = 'src="imagenes/Semaforo_Negro.png"';

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');
} else {
}

include 'Auth.php';
include 'LQS_EUQ/RegistrosAreas.php';
$timestamp = date("Y-m-d H:i:s");
$error = "";
$mensajeExito = '';
$Accion ="";
//Accion a ejecutar
if(!empty($_POST['Validar'])){
    $RFIDRegistro = $_POST['RFIDLog'];
    //Validacion Distribucion Binomial de Semaforo
    $Validador = rand(0,9);

    // Creamos la conexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexion: " . $conn->connect_error);
    } else {


        /*Logica de registro
1. Validar si el RFID Existe y si es Operador de distribucion
2. Validar si tiene Guias Activas
2.1 Obtener la guia Activa
3. Registrar la validacion y el paso por el area
    */

        $QRYUsuario = "select Roll_Usuario,
        case 
        when Roll_Usuario = '4' then true
        when Roll_Usuario != '4' then false
        end as Valor
        from traker_mole.trkml_usuarios where RFID = '" . $RFIDRegistro . "';";

        $EsUsuarioPiloto = $conn->query($QRYUsuario);
        try {

            while ($rowPiloto = $EsUsuarioPiloto->fetch_assoc()) {

                if ($rowPiloto['Valor']) {

                    //Obtener Guia Activa
                    $QryGuiaActiva = "select * from traker_mole.trck_mle_guias where RFID = '" . $RFIDRegistro . "' and Estatus = 'Iniciada' || Estatus = 'Carga' || Estatus = 'Verificado' ";
                    $GuiaActivada = $conn->query($QryGuiaActiva);
                    $Lineas = $GuiaActivada->num_rows;
                    $rowGuaActiva = $GuiaActivada->fetch_assoc();

                    if ($Lineas <= 0) {
                        $error = '<div class="alert alert-danger" role="alert"><p><strong>El piloto no tiene ninguna Guía Activa</div>';
                    } else {
                        //Obtener Guia y Actualizar Estatus
                        $ActualizarGuiaProceso = "insert into traker_mole.trck_mle_reg_guias values (0,'" . $rowGuaActiva['GuiaSAP'] . "','" . $RFIDRegistro . "','" . $rowGuaActiva['Piloto'] . "','" . $_SESSION["Area"] . "','" . $_SESSION['Usuario'] . "','" . $_SESSION["FechaTrabajo"] . " " . $_SESSION["HoraTrabajo"] . "',0,0, '" . $Accion . "' )";

                        if ($conn->query($ActualizarGuiaProceso) === TRUE) {

                            switch ($_SESSION["TipoArea"]) {

                                case 'Verificado' :

                                    if($Validador == 5){
                                        //Tipo de Semaforo
                                        $Semaforo = 'src="imagenes/Semaforo_Rojo.png"';
                                        $VerificacionGuia = "Rojo";
                                        //Guardar Datos en Estatus Guia y Registros
                                        $mensajeExito = '<div class="alert alert-danger" role="alert"><p><strong>El Marchamo requiere revisión</div>';

                                    }else{
                                        //Tipo de Semaforo
                                        $Semaforo = 'src="imagenes/Semaforo_Verde.png"';
                                        $VerificacionGuia = "Verde";
                                        //Guardar Datos en Estatus Guia y Registros

                                    }

                                    $ActualizarGuia = "update traker_mole.trck_mle_guias set Estatus = 'Verificado', Verificador = ' ".$VerificacionGuia." 'where GuiaSAP = '" . $rowGuaActiva['GuiaSAP'] . "' ";
                                    if ($conn->query($ActualizarGuia) === TRUE) {
                                        // Validar Semaforo

                                        $error = '<div class="alert alert-success" role="alert"><p><strong>Registrado Correctamente</div>';
                                    }
                                    break;
                            }

                        } else {

                            echo "Error: " . $ActualizarGuiaProceso . "<br>" . $conn->error;
                            $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                            $Semaforo = 'src="imagenes/Semaforo_Negro.png"';
                        }
                    }

                } else {

                    //Mensaje de Error
                    $error = '<div class="alert alert-danger" role="alert"><p><strong>Usuario no existe o no es Piloto</div>';
                    $Semaforo = 'src="imagenes/Semaforo_Negro.png"';
                }
            }

        } catch (Exception $ex) {
            echo $ex;
        }
    }


}


if (!empty($_POST['Registrar'])) {
    // Campos del formulario a variables

    $Accion = $_POST['form-Accion'];
    $RFIDRegistro = $_POST['RFIDLog'];


    // Creamos la conexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexion: " . $conn->connect_error);
    } else {


        /*Logica de registro
1. Validar si el RFID Existe y si es Operador de distribucion
2. Validar si tiene Guias Activas
2.1 Obtener la guia Activa
3. Registrar el paso por el area
    */

        $QRYUsuario = "select Roll_Usuario,
        case 
        when Roll_Usuario = '4' then true
        when Roll_Usuario != '4' then false
        end as Valor
        from traker_mole.trkml_usuarios where RFID = '" . $RFIDRegistro . "';";

        $EsUsuarioPiloto = $conn->query($QRYUsuario);
        try {

            while ($rowPiloto = $EsUsuarioPiloto->fetch_assoc()) {

                if ($rowPiloto['Valor']) {

                    //Obtener Guia Activa
                    $QryGuiaActiva = "select * from traker_mole.trck_mle_guias where RFID = '" . $RFIDRegistro . "' and Estatus = 'Iniciada' || Estatus = 'Carga' || Estatus = 'Verificado' ";
                    $GuiaActivada = $conn->query($QryGuiaActiva);
                    $Lineas = $GuiaActivada->num_rows;
                    $rowGuaActiva = $GuiaActivada->fetch_assoc();

                    if ($Lineas <= 0) {
                        $error = '<div class="alert alert-danger" role="alert"><p><strong>El piloto no tiene ninguna Guía Activa</div>';
                    } else {
                        //Obtener Guia y Actualizar Estatus
                        $ActualizarGuiaProceso = "insert into traker_mole.trck_mle_reg_guias values (0,'" . $rowGuaActiva['GuiaSAP'] . "','" . $RFIDRegistro . "','" . $rowGuaActiva['Piloto'] . "','" . $_SESSION["Area"] . "','" . $_SESSION['Usuario'] . "','" . $_SESSION["FechaTrabajo"] . " " . $_SESSION["HoraTrabajo"] . "',0,0, '" . $Accion . "' )";

                        if ($conn->query($ActualizarGuiaProceso) === TRUE) {

                            switch ($_SESSION["TipoArea"]) {
                                case 'Registro' :
                                    //Mensaje Exito
                                    $error = '<div class="alert alert-success" role="alert"><p><strong>Registrado Correctamente</div>';
                                    break;
                                case 'Carga' :
                                    $ActualizarGuia = "update traker_mole.trck_mle_guias set Estatus = 'Carga' where GuiaSAP = '" . $rowGuaActiva['GuiaSAP'] . "' ";
                                    if ($conn->query($ActualizarGuia) === TRUE) {
                                        //Mensaje Exito
                                        $error = '<div class="alert alert-success" role="alert"><p><strong>Registrado Correctamente</div>';
                                    }

                                    break;
                                case 'Verificado' :
                                    $ActualizarGuia = "update traker_mole.trck_mle_guias set Estatus = 'Verificado' where GuiaSAP = '" . $rowGuaActiva['GuiaSAP'] . "' ";
                                    if ($conn->query($ActualizarGuia) === TRUE) {
                                        //Mensaje Exito
                                        $error = '<div class="alert alert-success" role="alert"><p><strong>Registrado Correctamente</div>';
                                    }
                                    break;
                            }

                        } else {

                            echo "Error: " . $ActualizarGuiaProceso . "<br>" . $conn->error;
                            $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                        }
                    }

                } else {
                    echo "s";
                    //Mensaje de Error
                    $error = '<div class="alert alert-danger" role="alert"><p><strong>Usuario no existe o no es Piloto</div>';
                }
            }

        } catch (Exception $ex) {
            echo $ex;
        }
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

        .texto-centrado {
            text-align: center
        }

        .hide {
            display: none !important;
        }

        select,
        input[type="file"] {
            height: 20px !important;
            line-height: 10px;
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
        html,
        body {
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
                            TRACKER <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span>
                        </a>
                        <ul class="opened" style="display:block">
                            <li>
                                <a href="DashboardSupervisorAreas.php"> <span>&nbsp;</span> <i
                                            class="fa fa-circle class=" theme_color""></i> <b class="theme_color">Registro
                                        pilotos</b> </a>
                            </li>
                            <li>
                                <?php
                                echo '<a href="TrackerAreaHistorico.php?Area=' . $_SESSION['Area'] . '&TipoArea=' . $_SESSION['TipoArea'] . '">  <i class="fa fa-circle"></i> <b >Datos Historicos</b></a>';
                                ?>
                            </li>

                            <?php if ($_SESSION['TipoArea'] == "Registro") {
                                echo '<li>
                                    <a href="TrackerAreaRegistro.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Registro Externos</b> </a>
                                </li>';
                            } ?>

                            <?php if ($_SESSION['TipoArea'] == "Registro") {
                                echo '<li>
                                    <a href="TrackerAreaRegistro_His.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i> <b >Historico Externos</b> </a>
                                </li>';
                            } ?>


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
                    <h1>Administrador de Area <?php echo $_SESSION['Area']; ?></h1>
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
            <!-- Se Ingresan Los Mantenimientos -->
            <!-- Finaliza Componente de Seguimiento -->
            <div class="hide" id="Contenido">
                <br>
                <div class="container" id="Mapa">
                    <!-- Inicia Componente Registro Actividad -->
                    <div id="Registro" class="<?php if ($_SESSION["TipoArea"] == 'Verificado') {
                        echo "hide";
                    } ?>">
                        <div class="myform-all Color_Claro">

                            <div class="my-content formulario">
                                <form role="form" action="" method="post">
                                    <h1><strong>Proceso de </strong> Registro <?php echo $_SESSION['Area']; ?></h1>
                                    <div> <?php echo $error . $mensajeExito; ?></div>
                                    <!-- Componente de Formulario -->
                                    <div>
                                        <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched"
                                                style="height: 50px !important; line-height: 50px;"
                                                name="form-Accion" id="form-Accion"
                                                required
                                                ng-model="properties.value"
                                                ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues"
                                                ng-required="properties.required"
                                                ng-disabled="properties.disabled">
                                            <option style="display:none; height:60px;" value=""
                                                    class="ng-binding">
                                                Acción...
                                            </option>
                                            <option value="Entrada / Inicio" label="Entrada / Inicio">Visita
                                            </option>
                                            <option value="Salida / Final" label="Salida / Final">Cita
                                            </option>


                                        </select>

                                    </div>
                                    <!-- Fin Componente de Formulario -->
                                    <div class="saltito"><h1></h1></div>

                                    <div class="form-grup" style="display: flex; justify-content: center;align-items: center;">
                                        <input style="margin-left: 15px; margin-right: 15px;" type="text" name="RFIDLog" placeholder="RFID del piloto..."
                                               class="form-control" id="form-username" required>
                                    </div>
                                    <br>

                                    <div class=""><input type="submit" name="Registrar" value="Registrar"
                                                         class="effect-button"></input></div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- Finaliza Componente Registro actividad -->
                <div class="container" id="Mapa">
                    <!-- Inicia Componente Registro Actividad -->
                    <div id="Registro" class="<?php if($_SESSION["TipoArea"] != 'Verificado') {
                        echo "hide";
                    } ?>">
                        <div class="myform-all Color_Claro">

                            <div class="my-content formulario">
                                <form role="form" action="" method="post">
                                    <h1><strong>Proceso de </strong> Validacion de Marchamos</h1>
                                    <div> <?php echo $error . $mensajeExito; ?></div>

                                    <div class="saltito"><h1></h1></div>

                                    <div class="form-grup" style="display: flex; justify-content: center;align-items: center;">
                                        <input type="text" style="margin-left: 15px; margin-right: 15px; width: 90%" name="RFIDLog" placeholder="RFID del piloto..."
                                               class="form-control texto-centrado" id="form-username" required>
                                    </div>
                                    <br>

                                    <div class=""><input type="submit" name="Validar" value="Validar"
                                                         class="effect-button"></input>
                                    </div>
                                    <br>
                                    <div class="container">
                                        <div class="myform-all Color_Claro" style="text-align: center">
                                            <br>
                                            <div class="row">

                                                </br>
                                                <div class="col">
                                                    <h1 class="Titulos" style="text-align: center">Tipo de
                                                        selectivo
                                                    </h1>
                                                    </br>
                                                    <img style="text-align: center"
                                                         class="img-responsive" <?php echo $Semaforo ?> >
                                                    </br>
                                                    <div class="saltito"><h1></h1></div>
                                                </div>
                                                </br>
                                            </div>
                                            <div class="saltito"><h1></h1></div>
                                        </div>
                                        <div class="saltito"><h1></h1></div>
                                    </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>

                <!-- Inicia seccion de Validacion de Marchamos -->
                <!-- Finaliza seccion de validacion de Marchamos -->

                <br>
                <!-- Inicia La seccion de usuarios -->
                <div class="container" id="listausuarios">
                    <div class="myform-all Color_Claro">
                        <!-- Inicia Tabla de Usuarios; -->
                        <br></br>
                        <h1 class="Titulos">Registros del dia <?php echo $fecha; ?>  </h1>
                        <form role="form" action="" method="post" class="">
                            <table id="example" class="table table-striped  " cellspacing="0" width="100%">
                                <thead>
                                <th>Guia Sap</th>
                                <th>Area</th>
                                <th>Quien Valido</th>
                                <th>Fecha y Hora</th>
                                <th>Piloto</th>
                                <th>Registro</th>
                                <thead>
                                <tbody>
                                <?php
                                for ($i = 0; $i < $listaRegistros; $i++) {
                                    echo "<tr>";

                                    echo "<td>";
                                    echo $listaRegistros['GuiaSap'];
                                    echo "</td>";

                                    echo "<td>";
                                    echo $listaRegistros['Area'];
                                    echo "</td>";

                                    echo "<td>";
                                    echo $listaRegistros['Registrador'];
                                    echo "</td>";

                                    echo "<td>";
                                    echo $listaRegistros['HoraRegistro'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $listaRegistros['Piloto'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $listaRegistros['Accion'];
                                    echo "</td>";
                                    echo "</tr>";
                                    $listaRegistros = $ejecutar_sentenciaRegistros->fetch(PDO::FETCH_ASSOC);
                                }

                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <!-- Finaliza Tabla de Usuarios;  -->
                <br>
                <div class="container" id="Mapa">
                    <!-- Inicia Componente de Seguimiento -->
                    <div class="myform-all Color_Claro">


                    </div>
                </div>
                <!-- Prueba de mapa en modal-->
                <!-- Finaliza Componente Abrir Mapa -->
            </div>
        </div>

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