<?php
session_start();

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');


} else {


}
include 'Auth.php';
include 'LQS_EUQ/GuiasTraker.php';


//Inicio accones de los botones

if (!empty($_POST['Programar'])) {
    $GuiaSAP = $_POST['form-GUIASAP'];
    $Piloto = $_POST['form-Piloto'];
    $DPIPiloto = $_POST['form-DPIPiloto'];
    $PlacaCamion = $_POST['form-PlacaDelCamion'];
    $TipoCamion = $_POST['form-TipoCamion'];
    $Rampa = $_POST['form-NoRampa'];
    $Destino = $_POST['form-Destino'];
    $FechaCarga = $_POST['form-FechaCarga'];
    $FechaEntrega = $_POST['form-FechaEntrega'];
    $PesoBruto = $_POST['form-PesoBruto'];
    $RFID = $_POST['form-RFID'];


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexion: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `traker_mole`.`trck_mle_guias` (`GuiaSAP`, `Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('" . $GuiaSAP . "','" . $Piloto . "','" . $DPIPiloto . "','" . $PlacaCamion . "','" . $TipoCamion . "','" . $Rampa . "','" . $Destino . "','" . $FechaCarga . "','" . $FechaEntrega . "','" . $PesoBruto . "','" . $RFID . "','Planificada')";
    //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

    if ($conn->query($sql) === TRUE) {
        $mensajeExito = '<div class="alert alert-success" role="alert">El registro fue agregado correctamente</div>';
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
        $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
    }

}


//Fin  accones de los botones

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            height: 50px !important;
            line-height: 50px;
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
                                <li><a href="login.php"><i class="fa fa-power-off"></i> LogOut</a></li>
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

                    <ul class="dropdown-menu">
                        <?php
                        session_start();
                        echo '<div class="user_admin dropdown"><span class="user_adminname">Usuario: ' . $_SESSION['Usuario'] . '</span></div>';
                        ?>
                        <div class="top_pointer"></div>
                        <li><a href="profile.html"><i class="fa fa-barcode"></i> Perfil</a></li>
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
                                <a href="Registro.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Registro</b>
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
                    <h1>Programación de Guias de Carga</h1>
                    <h2 class="">Ingrese los datos requeridos</h2>
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
            <div class="container clear_both padding_fix">

                <!-- Iicia Contenido -->

                <!-- NavBar Mantenimiento -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <form class="form-inline my-2 my-lg-0">
                        <button class="fa fa-undo btn btn-danger my-2 my-sm-0" type="button" onclick="RegresarGuias()">
                            Regresar
                        </button>
                    </form>

                </nav>
                <br>
                <!-- Fin NavBar Mantenimiento -->


                <!--Inicia Formulario Login-->
                <div> <?php echo $error . $mensajeExito; ?></div>

                <div class="my-content formulario formulario">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12  myform-all" justify-content-center>
                                <h1><strong>Programación</strong> Guias de Carga</h1>

                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12   myform-cont justify-content-center">
                                <div class="myform-top">
                                    <div class="myform-top-left">
                                        <h3>Programación Online</h3>
                                        <p>Ingrese la información correspondiente a la guia de carga:</p>
                                    </div>
                                    <div class="myform-top-rigth">
                                        <i class="fa fa-passport"></i>


                                    </div>

                                </div>
                                <div class="myform-botton">
                                    <form role="form" action="" method="post" class="">

                                        <!-- Division en columnas -->
                                        <div class="row">
                                            <div class="col-lg">
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input type="text" name="form-GUIASAP" placeholder="No Guia SAP..."
                                                           class=" form-control" id="form-GUIASAP">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input type="text" name="form-Piloto"
                                                           placeholder="Nombre del Pilto..." class=" form-control"
                                                           id="form-Piloto">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input type="text" name="form-DPIPiloto"
                                                           placeholder="DPI del Pilto..." class=" form-control"
                                                           id="form-DPIPiloto">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input type="text" name="form-PlacaDelCamion"
                                                           placeholder="Placa del Camion..." class=" form-control"
                                                           id="form-PlacaDelCamion">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div>
                                                    <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched"
                                                            name="form-TipoCamion" id="form-TipoCamion"
                                                            ng-model="properties.value"
                                                            ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues"
                                                            ng-required="properties.required"
                                                            ng-disabled="properties.disabled">
                                                        <option style="display:none; height:60px;" value=""
                                                                class="ng-binding">
                                                            Capacidad del Camion...
                                                        </option>
                                                        <option value="3 Toneladas" label="3 Toneladas">3 Toneladas
                                                        </option>
                                                        <option value="5 Toneladas" label="5 Toneladas">5 Toneladas
                                                        </option>
                                                        <option value="10 Toneladas" label="10 Toneladas">10 Toneladas
                                                        </option>
                                                        <option value="20 Toneladas" label="20 Toneladas">20 Toneladas
                                                        </option>
                                                        <option value="25 Toneladas" label="25 Toneladas">25 Toneladas
                                                        </option>

                                                    </select>

                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                            </div>
                                            <div class="col-lg">
                                                <!-- Componente de Formulario -->
                                                <div>
                                                    <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched"
                                                            name="form-NoRampa" id="form-NoRampa"
                                                            ng-model="properties.value"
                                                            ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues"
                                                            ng-required="properties.required"
                                                            ng-disabled="properties.disabled">
                                                        <option style="display:none; height:60px;" value=""
                                                                class="ng-binding">
                                                            Rampa para Cargar...
                                                        </option>
                                                        <option value="Rampa No. 1" label="Rampa No. 1">Rampa No. 1
                                                        </option>
                                                        <option value="Rampa No. 2" label="Rampa No. 2">Rampa No. 2
                                                        </option>
                                                        <option value="Rampa No. 3" label="Rampa No. 3">Rampa No. 3
                                                        </option>
                                                        <option value="Rampa No. 4" label="Rampa No. 4">Rampa No. 4
                                                        </option>
                                                        <option value="Rampa No. 5" label="Rampa No. 5">Rampa No. 5
                                                        </option>
                                                        <option value="Area No. 1" label="Area No. 1">Area No. 1
                                                        </option>
                                                        <option value="Area No. 2" label="Area No. 2">Area No. 2
                                                        </option>
                                                        <option value="Area No. 3" label="Area No. 3">Area No. 3
                                                        </option>
                                                        <option value="Area No. 4" label="Area No. 4">Area No. 4
                                                        </option>
                                                        <option value="Area No. 5" label="Area No. 5">Area No. 5
                                                        </option>


                                                    </select>

                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input type="text" name="form-Destino" placeholder="Destino..."
                                                           class=" form-control" id="form-Destino">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input type="text" name="form-FechaCarga"
                                                           placeholder="Fecha de Carga..." class=" form-control"
                                                           id="form-FechaCarga">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input type="text" name="form-FechaEntrega"
                                                           placeholder="Fecha de Entrega..." class=" form-control"
                                                           id="form-FechaEntrega">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input type="text" name="form-PesoBruto" placeholder="Peso Bruto..."
                                                           class=" form-control" id="form-PesoBruto">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input type="text" name="form-RFID" placeholder="RFID..."
                                                           class=" form-control" id="form-RFID">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                            </div>
                                        </div>
                                        <!-- Fin Division en columnas -->

                                        <div class="saltito"><h1></h1></div>
                                        <div data-effect="flip" class="effect-button"><input type="submit"
                                                                                             name="Programar"
                                                                                             value="Programar"
                                                                                             class="effect-button">
                                        </div>
                                        <!-- <input type="submit" name="submit" class="mybtn" value="Registrar"></input> -->

                                    </form>


                                </div>


                            </div>


                        </div>


                    </div>

                </div>

                <!--Finaliza Formulario LogIn-->

                <!-- Finaliza Contenido -->

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

            <script>
                function RegresarGuias() {
                    location.href = "http://localhost:63342/MoleTracker/Admin_Guias.php";
                }
            </script>



</body>

</html>