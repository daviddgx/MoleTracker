<?php


session_start();
$fecha = date("d") . '-' . date("m") . '-' . date("Y");
$_SESSION['FechaTrabajo'] = date("d") . '-' . date("m") . '-' . date("Y");

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');
} else {
}

include 'Auth.php';
include 'LQS_EUQ/RegistrosAreasExternas.php';
$timestamp = date("Y-m-d H:i:s");


if (!empty($_POST['Registrar'])) {



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

$Nombre = $_POST['form-Nombre'];
$Apellido = $_POST['form-Apellido'];
$ID = $_POST['form-DPI'];
$Placa = $_POST['form-Placa'];
$Accion = $_POST['form-Accion'];

$Visita = $_POST['form-TipoVisita'];
$Comentarios = $_POST['form-Comentarios'];


        //Insertar el registro en la tabla de externos
        $QRYInsertarVisita ="insert into traker_mole.trck_mle_reg_externos values ('".$Nombre."','".$Apellido."','".$ID."','".$Placa."','".$Visita."','".$Comentarios."','".$_SESSION['Area']."','".$fecha."',(SELECT DATE_FORMAT(NOW( ), \"%H:%i:%S\" )),'".$Accion."');";

        if ($conn->query($QRYInsertarVisita) === TRUE) {
            $mensajeExito = '<div class="alert alert-success" role="alert">El registro fue agregado correctamente</div>';
        } else {

            $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos, valide e intente de nuevo </div>';
        }


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/custom2.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                                    <?php
                                    echo '<a href="DashboardSupervisorAreas.php?Area='.$_SESSION['Area'].'&TipoArea='.$_SESSION['TipoArea'].'">  <i class="fa fa-circle"></i> <b >Registro pilotos</b></a>';
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo '<a href="TrackerAreaHistorico.php?Area='.$_SESSION['Area'].'&TipoArea='.$_SESSION['TipoArea'].'">  <i class="fa fa-circle"></i> <b >Datos Historicos</b></a>';
                                    ?>
                                </li>

                                <?php if($_SESSION['TipoArea']  == "Registro"){echo '<li>
                                    <a href="TrackerAreaRegistro.php"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b class="theme_color">Registro Externos</b> </a>
                                </li>' ;}?>

                                <?php if($_SESSION['TipoArea']  == "Registro"){echo '<li>
                                    <a href="TrackerAreaRegistro_His.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i> <b >Historico Externos</b> </a>
                                </li>' ;}?>



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
                        <h1>Administrador de Area <?php echo $_SESSION['Area'];?></h1>
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
                    <div class="myform-all Color_Claro">

                        <div class="my-content formulario">
                            <form role="form" action="" method="post">
                                <h1><strong>Registro </strong> Externos a  <?php echo $_SESSION['Area'];?></h1>
                                <!-- Division en columnas -->
                                <div class="row">
                                    <div class="col-lg">
                                        <!-- Componente de Formulario -->
                                        <div class="form-grup">
                                            <input type="text" name="form-Nombre" placeholder="Nombre..."
                                                   class=" form-control" id="form-Nombre">
                                        </div>
                                        <!-- Fin Componente de Formulario -->
                                        <div class="saltito"><h1></h1></div>
                                        <!-- Componente de Formulario -->
                                        <div class="form-grup">
                                            <input type="text" name="form-Apellido"
                                                   placeholder="Apellido..." class=" form-control"
                                                   id="form-Apellido">
                                        </div>
                                        <!-- Fin Componente de Formulario -->
                                        <div class="saltito"><h1></h1></div>
                                        <!-- Componente de Formulario -->
                                        <div class="form-grup">
                                            <input type="text" name="form-DPI"
                                                   placeholder="DPI / Licencia..." class=" form-control"
                                                   id="form-DPIPiloto">
                                        </div>
                                        <!-- Fin Componente de Formulario -->
                                        <div class="saltito"><h1></h1></div>
                                        <!-- Componente de Formulario -->
                                        <div class="form-grup">
                                            <input type="text" name="form-Placa"
                                                   placeholder="Placa del vehículo..." class=" form-control"
                                                   id="form-Placa">
                                        </div>
                                        <!-- Fin Componente de Formulario -->
                                        <div class="saltito"><h1></h1></div>
                                        <!-- Componente de Formulario -->
                                        <div>
                                            <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" style="height: 50px !important; line-height: 50px;"
                                                    name="form-Accion" id="form-Accion"
                                                    ng-model="properties.value"
                                                    ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues"
                                                    ng-required="properties.required"
                                                    ng-disabled="properties.disabled">
                                                <option style="display:none; height:60px;"  value=""
                                                        class="ng-binding">
                                                    Acción...
                                                </option>
                                                <option value="Entrada" label="Entrada">Visita
                                                </option>
                                                <option value="Salida" label="Salida">Cita
                                                </option>


                                            </select>

                                        </div>
                                        <!-- Fin Componente de Formulario -->
                                        <div class="saltito"><h1></h1></div>
                                        <!-- Componente de Formulario -->
                                        <div>
                                            <select class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched" style="height: 50px !important; line-height: 50px;"
                                                    name="form-TipoVisita" id="form-TipoVisita"
                                                    ng-model="properties.value"
                                                    ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues"
                                                    ng-required="properties.required"
                                                    ng-disabled="properties.disabled">
                                                <option style="display:none; height:60px;"  value=""
                                                        class="ng-binding">
                                                    Motivo...
                                                </option>
                                                <option value="Visita" label="Visita">Visita
                                                </option>
                                                <option value="Cita" label="Cita">Cita
                                                </option>
                                                <option value="Compra" label="Compra">Comra
                                                </option>
                                                <option value="Proveedor" label="Proveedor">Proveedor

                                            </select>

                                        </div>
                                        <!-- Fin Componente de Formulario -->
                                        <div class="saltito"><h1></h1></div>
                                        <!-- Componente de Formulario -->
                                        <div class="form-grup">
                                            <input type="text" name="form-Comentarios"
                                                   placeholder="Comentarios..." class=" form-control"
                                                   id="form-Comentarios">
                                        </div>
                                        <!-- Fin Componente de Formulario -->
                                    </div>

                                </div>
                                <!-- Fin Division en columnas -->

                                <div class="saltito"><h1></h1></div>
                                <div> <?php echo $error . $mensajeExito; ?></div>
                                <div class=""><input type="submit" name="Registrar" value="Registrar" class="effect-button"></input></div>
                        </div>
                        </form>

                    </div>
                </div>
                <!-- Finaliza Componente Registro actividad -->

                <br>
                <!-- Inicia La seccion de usuarios -->
                <div class="container" id="listausuarios">
                    <div class="myform-all Color_Claro">
                        <!-- Inicia Tabla de Usuarios; -->
                        <br></br>
                        <h1 class="Titulos">Registros del dia <?php echo $fecha;?>  </h1>
                        <form role="form" action="" method="post" class="">
                            <table id="example" class="table table-striped  " cellspacing="0" width="100%">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>ID</th>
                                    <th>Placa</th>
                                    <th>Motivo</th>
                                    <th>Hora</th>
                                    <th>Fecha</th>

                                <thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < $listaRegistros; $i++) {
                                        echo "<tr>";

                                        echo "<td>";
                                        echo $listaRegistros['Nombre'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $listaRegistros['Apellido'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $listaRegistros['Id'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $listaRegistros['Placa'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $listaRegistros['Motivo'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $listaRegistros['Hora'];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $listaRegistros['Fecha'];
                                        echo "</td>";
                                        
                                        echo "</tr>";
                                        $listaRegistros = $ejecutar_sentenciaRegistrosExternos->fetch(PDO::FETCH_ASSOC);
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