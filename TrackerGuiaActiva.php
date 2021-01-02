<?php


session_start();
$fecha = date("d") . '-' . date("m") . '-' . date("Y");

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');
} else {
}

include 'Auth.php';
include 'LQS_EUQ/GuiaActiva.php';
include 'LQS_EUQ/GuiaActivaProcesos.php';
$timestamp = date("Y-m-d H:i:s");


if (!empty($_POST['Registrar'])) {
    $RFIDRegistro = $_POST['RFIDLog'];


    // Creamos la conexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexion: " . $conn->connect_error);
    } else {


        /*Logica de registro
1. Ir a traer el area de la que pertenece el Usuario
2. ir a traer de la tabla traker_mole.trck_mle_reg_guias el estatus de bandera, si existe y es 0 insertar como salida y actualizar estaus a Procesado
3. ir a traer de la tabla traker_mole.trck_mle_reg_guias el valor del campo Estatus, esto por que al marcar la salida y se marca de nuevo, no debe dejar
registrar duplipados
4. insertar el registro en la tabla traker_mole.trck_mle_reg_guias
*/



        // QRY AreaUsuario
        $QRYAreaUsuario = "SELECT T_Usuario,concat_ws(' ',nombre,apellido) as Quien FROM traker_mole.trkml_usuarios where RFID = '" . $RFIDRegistro . "';";

        $AreaUsuario;
        $resultAreaUsuario = $conn->query($QRYAreaUsuario);


        try {
            if ($resultAreaUsuario->num_rows > 0) {
                while ($rowdato = $resultAreaUsuario->fetch_assoc()) {
                    $AreaUsuario =  $rowdato["T_Usuario"];
                    //echo $AreaUsuario;
                    //Aqui van los Ifs para saber de que area son y hace el incert segun el Area.

                    if ($AreaUsuario == 'Supervisor Garita Colmenta') {
                        $sql = "INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('" . $_SESSION['GuiaSAPActiva'] . "','" . $AreaUsuario . "','" . $rowdato["Quien"] . "','" . $timestamp . "','0','0');";
                        //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                        if ($conn->query($sql) === TRUE) {

                            //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                        } else {

                            echo "Error: " . $sql . "<br>" . $conn->error;
                            $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                        }
                    } else if ($AreaUsuario == 'Supervisor Garita Fabrica') {
                        $sql = "INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('" . $_SESSION['GuiaSAPActiva'] . "','" . $AreaUsuario . "','" . $rowdato["Quien"] . "','" . $timestamp . "','0','0');";
                        //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                        if ($conn->query($sql) === TRUE) {

                            //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                        } else {

                            echo "Error: " . $sql . "<br>" . $conn->error;
                            $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                        }
                    } else if ($AreaUsuario == 'Supervisor de Andenes de Carga') {
                        $sql = "INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('" . $_SESSION['GuiaSAPActiva'] . "','" . $AreaUsuario . "','" . $rowdato["Quien"] . "','" . $timestamp . "','0','0');";
                        //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                        if ($conn->query($sql) === TRUE) {

                            //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                        } else {

                            echo "Error: " . $sql . "<br>" . $conn->error;
                            $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                        }
                    } else if ($AreaUsuario == 'Validador de Marchamos') {
                        $sql = "INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('" . $_SESSION['GuiaSAPActiva'] . "','" . $AreaUsuario . "','" . $rowdato["Quien"] . "','" . $timestamp . "','0','0');";
                        //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                        if ($conn->query($sql) === TRUE) {

                            //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                        } else {

                            echo "Error: " . $sql . "<br>" . $conn->error;
                            $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                        }
                    } else if ($AreaUsuario == 'Tracker') {
                        $sql = "INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('" . $_SESSION['GuiaSAPActiva'] . "','" . $AreaUsuario . "','" . $rowdato["Quien"] . "','" . $timestamp . "','0','0');";
                        //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                        if ($conn->query($sql) === TRUE) {

                            //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                        } else {

                            echo "Error: " . $sql . "<br>" . $conn->error;
                            $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                        }
                    } else if ($AreaUsuario == 'Administrador de Guias') {
                        $sql = "INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('" . $_SESSION['GuiaSAPActiva'] . "','" . $AreaUsuario . "','" . $rowdato["Quien"] . "','" . $timestamp . "','0','0');";
                        //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                        if ($conn->query($sql) === TRUE) {

                            //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                        } else {

                            echo "Error: " . $sql . "<br>" . $conn->error;
                            $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                        }
                    }

                    //Segun el Area hay que insertar con lo siguente

                    // QRY BanderaGuia
                    $QRYBanderaUsuario = "";
                    $BanderaGuia;
                    //No existe = insertar con estatus 0
                    //estatus 0 insertar con estatus 1 u actualizar entrada a 1 
                    // si el estatus es 1 no dejar insertar


                }
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>El RFID no esta registrado como supervisor de Area</div>';
            }
        } catch (Exception $ex) {
        }

        /* inicia codigo de referencia
            // Obtencion de datos
        $LClave = md5($LClave);
            //echo $LUser;
            //echo $LClave;
        $sql = "SELECT RFID,Pass,T_Usuario,Usuario FROM trkml_usuarios where RFID = '$LUser' AND Pass = '$LClave'";

        $result = $conn->query($sql);
            // Fin Obtencion de datos

        try {
            if ($result->num_rows > 0) {
                
                    //Salida de datos del query
                while ($row = $result->fetch_assoc()) {
                    if ($row["T_Usuario"] === 'Administrador de Guias') {
                        
                        $_SESSION['Usuario'] = $row["Usuario"];
                                //echo "Usuario: ".$row["RFID"]."Clave: ".$row["Pass"]."Usuario: ".$row["Usuario"];
                        header("Location: DashboardAdministradorGuias.php");
                    } else if ($row["T_Usuario"] === 'Area Generica ') {
                        
                        $_SESSION['Usuario'] = $row["Usuario"];
                                // echo "Usuario: ".$row["RFID"]."Clave: ".$row["Pass"];
                        header("Location: DashboardAreaGenerica.php");
                    } else if ($row["T_Usuario"] === 'Traker') {
                        
                        $_SESSION['Usuario'] = $row["Usuario"];
                                // echo "Usuario: ".$row["RFID"]."Clave: ".$row["Pass"];
                        header("Location: DashboardTraker.php");
                    }

                }
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Sus datos son incorrectos!!</div>';
                       // $row = $result->fetch_assoc();

            }
        } catch (Exception $ex) {


        }fin Codigo de referencia */



        //comprovacion de dadtos



        //fin comprovacion de datos
    }

    // Fin de la conexion

}

// FinFuncionLogIN


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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/custom2.css">



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

        #map {
            height: 100%;
        }
        .table {
            color: #fff;
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
                        echo '<div class="user_admin dropdown"><span class="user_adminname">Usuario: ' . $_SESSION["Usuario"] . '</span></div>';
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
        <div class="inner">
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
                                    <a href="TrackerGuiasEntregadas.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i> <b>Guías Entregadas</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerGuiasPlanificadas.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guías Planificadas</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerAtrasos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guías Retrasadas</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerGuiaActiva.php"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b class="theme_color">Guía Activa</b> </a>
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
                        <h1>Guía Activa...</h1>
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
               <!--      Inicia Componente Registro Actividad
                    <div class="myform-all Color_Claro">

                        <div class="my-content formulario">
                            <form role="form" action="" method="post">
                                <h1><strong>Proceso de </strong> Registro</h1>
                                <div class="form-grup">
                                    <input type="text" name="RFIDLog" placeholder="RFID..." class="form-control" id="form-username">
                                </div>
                                <br>
                                <div> <?php echo $error . $mensajeExito; ?></div>
                                <div class=""><input type="submit" name="Registrar" value="Registrar" class="effect-button"></input></div>
                        </div>
                        </form>

                    </div>
                </div>
                 Finaliza Componente Registro actividad -->

                <br>
                <!-- Inicia La seccion de usuarios -->
                <div class="container" id="listausuarios">
                    <div class="myform-all Color_Claro">
                        <!-- Inicia Tabla de Usuarios; -->
                        <br></br>
                        <h1 class="Titulos">Guia actualmente Activa : <?php if($_SESSION["GuiaSAPActiva"] == '' ){echo 'Ningúna Guía activa'; }else{ echo $_SESSION["GuiaSAPActiva"]; } ?> </h1>
                        <form role="form" action="" method="post" class="">
                            <table class="table  table-bordered">
                                <tr>
                                    <th>No. Guía</th>
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
                                    echo $lista_Guias['ID_GUIA'];
                                    echo "</td>";

                                    echo "<td>";

                                    echo $lista_Guias['GuiaSAP'];
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

                                    ?>
                                </tr>

                            </table>
                        </form>

                    </div>
                </div>
                <!-- Finaliza Tabla de Usuarios;  -->
                <br>
                <div class="container" id="Mapa">
                    <!-- Inicia Componente de Seguimiento -->
                    <div class="myform-all Color_Claro">
                        <br>
                        <!-- Inicia Tabla de seguimiento -->
                        <br></br>
                        <h1 class="Titulos">Seguimiento del Proceso</h1>
                        <form role="form" action="" method="post" class="">
                            <table class="table  table-bordered">
                                <tr>

                                    <th>Area</th>
                                    <th>Registrado Por</th>
                                    <th>Hora de Registro</th>
                                    <th>Estatus</th>
                                    <th>Registro</th>
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
                                        echo $lista_ProcesoGuias['Estatus'];
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
                <div class="container" id="Mapa">
                    <!-- Inicia Componente Abrir Mapa -->
                    <div class="myform-all Color_Claro">
                        <!-- Mapa -->
                        <br>

                        <!-- Button trigger modal -->
                        <button type="button " class="btn btn-secondary btn-lg btn-block"data-dismiss="modal" data-backdrop="false" data-toggle="modal" data-target="#exampleModalCenter">
                            Abrir Mapa
                        </button>


                        <!-- Modal -->
                        <div class="modal " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalTrackerMole">Tracker</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe src="http://localhost:63342/MoleTracker/MapTest.php"
                                                marginwidth="0" marginheight="0" name="ventana_iframe"  border="0"
                                                frameborder="0" width="100%" height="700">
                                        </iframe>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button btn-lg btn-block" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin de prueba Mapa en Modal -->
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
                var customLabel = {
                    restaurant: {
                        label: 'R'
                    },
                    bar: {
                        label: 'B'
                    }
                };

                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: new google.maps.LatLng(-33.863276, 151.207977),
                        zoom: 12
                    });
                    var infoWindow = new google.maps.InfoWindow;

                    // Change this depending on the name of your PHP or XML file
                    downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
                        var xml = data.responseXML;
                        var markers = xml.documentElement.getElementsByTagName('marker');
                        Array.prototype.forEach.call(markers, function(markerElem) {
                            var id = markerElem.getAttribute('id');
                            var name = markerElem.getAttribute('name');
                            var address = markerElem.getAttribute('address');
                            var type = markerElem.getAttribute('type');
                            var point = new google.maps.LatLng(
                                parseFloat(markerElem.getAttribute('lat')),
                                parseFloat(markerElem.getAttribute('lng')));

                            var infowincontent = document.createElement('div');
                            var strong = document.createElement('strong');
                            strong.textContent = name
                            infowincontent.appendChild(strong);
                            infowincontent.appendChild(document.createElement('br'));

                            var text = document.createElement('text');
                            text.textContent = address
                            infowincontent.appendChild(text);
                            var icon = customLabel[type] || {};
                            var marker = new google.maps.Marker({
                                map: map,
                                position: point,
                                label: icon.label
                            });
                            marker.addListener('click', function() {
                                infoWindow.setContent(infowincontent);
                                infoWindow.open(map, marker);
                            });
                        });
                    });
                }



                function downloadUrl(url, callback) {
                    var request = window.ActiveXObject ?
                        new ActiveXObject('Microsoft.XMLHTTP') :
                        new XMLHttpRequest;

                    request.onreadystatechange = function() {
                        if (request.readyState == 4) {
                            request.onreadystatechange = doNothing;
                            callback(request, request.status);
                        }
                    };

                    request.open('GET', url, true);
                    request.send(null);
                }

                function doNothing() {}
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMS9Z53e5o37lHssInOqrhm3I87WpYxZg"></script>


            <script>
                function AbrirMapa() {
                    var ifrm = document.createElement('iframe');
                    ifrm.setAttribute('id', 'ifrm');

                    var el = document.getElementById('marker');
                    el.parentNode.insertBefore(ifrm, el);


                    ifrm.setAttribute('src', 'http://localhost:63342/Projects/MoleTracker/MapTest.php');

                   // location.href = "http://localhost:63342/Projects/MoleTracker/MapTest.php";
                }
            </script>

</body>

</html>