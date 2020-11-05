<?php
session_start();

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');


} else {


}
include 'Auth.php';
include 'LQS_EUQ/GuiasTraker.php';


$IDUsuario =  $_GET["Usuario"];

$NombreUsuario ="";
$ApellidoUsuario ="";
$UsuariUsuario ="";

// obener datos del Usuario
try {

    $conn  = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
    //paso 3 hacer la sentencia sql y ejecutarla
    $sqlDatos = "SELECT * FROM traker_mole.trkml_usuarios where rfid = '".$IDUsuario."';";
    $PiltoRegistrado = $conn->query($sqlDatos);
    if(!$PiltoRegistrado)
    {
        echo 'Hay un error en la sentencia de SQL: '.$sqlDatos;
    }else{
        //paso 4 trer los datos en forma de un arreglo
        $lista_Piloto =$PiltoRegistrado->fetch(PDO::FETCH_ASSOC);
        //la variable Lista_Usuaios es la que contiene el resultado de los usuarios
    }


}catch(Exception $ex){
    echo $ex;
}

for ($i = 0; $i < $lista_Piloto; $i++) {


    $NombreUsuario = $lista_Piloto['Nombre'];
    $ApellidoUsuario = $lista_Piloto['Apellido'];
    $UsuariUsuario = $lista_Piloto['Usuario'];
    $AreaUsuario = $lista_Piloto['Id_Area'];

    $lista_Piloto = $PiltoRegistrado->fetch(PDO::FETCH_ASSOC);
}


//Inicio accones de los botones

if (!empty($_POST['Programar'])) {
    $RFID = $_POST['form-RFID'];
    $Usuario = $_POST['form-Usuario'];
    $Pass = $_POST['form-Pass'];
    $PassVal = $_POST['form-PassVal'];
    $Nombre = $_POST['form-Nombre'];
    $Apellido = $_POST['form-Apellido'];
    $Estatus = $_POST['form-Estatus'];
    $Areasignada = $_POST['form-Area'];


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexion: " . $conn->connect_error);
    }

    if (!$Pass == $PassVal) {
        $error = '<div class="alert alert-danger" role="alert"><p><strong>Las contraseñas no son iguales </div>';
    } else {


        $sql = " update traker_mole.trkml_usuarios set Id_Area = '".$Areasignada."', Nombre = '".$Nombre."', Apellido  = '".$Apellido."', Pass = '".md5($Pass)."', RFID = '".$RFID."'  where rfid = '".$IDUsuario."';";

        if ($conn->query($sql) === TRUE) {
            $mensajeExito = '<div class="alert alert-success" role="alert">El registro fue actualizado correctamente</div>';
        } else {

            $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos, valide e intente de nuevo </div>';
        }
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
                                <a href="Admin_Guias.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i>
                                    <b class="">Guias</b> </a>
                            </li>
                            <li>
                                <a href="Admin_Unidades.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i> <b>Unidades</b>
                                </a>
                            </li>
                            <li>
                                <a href="Admin_Areas.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Areas</b>
                                </a>
                            </li>
                            <li>
                                <a href="Admin_Pilotos.php"> <span>&nbsp;</span> <i
                                            class="fa fa-circle"></i>
                                    <b >Pilotos</b> </a>
                            </li>
                            <li>
                                <a href="Admin_Usuarios.php"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b class="theme_color">Usuarios</b>
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
                    <h1>Registro de Usuarios</h1>
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
                                <h1><strong>Modificar</strong> Usuario </h1>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12   myform-cont justify-content-center">
                                <div class="myform-top">
                                    <div class="myform-top-left">
                                        <h3>Registro Online</h3>
                                        <p>Ingrese la información del usuario:</p>
                                    </div>
                                    <div class="myform-top-rigth">
                                        <i class="fa fa-user"></i>

                                    </div>

                                </div>
                                <div class="myform-botton">
                                    <form role="form" action="" method="post" class="">

                                        <!-- Division en columnas -->
                                        <div class="row">
                                            <div class="col-lg">
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input required type="text" name="form-Nombre"
                                                           value="<?php echo $NombreUsuario;?>"
                                                           placeholder="Ingrese el Nombre..."
                                                           class=" form-control" id="form-Nombre">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input required type="text" name="form-Apellido"
                                                           value="<?php echo $ApellidoUsuario;?>"
                                                           placeholder="Ingrese el Apellido..." class=" form-control"
                                                           id="form-Apellido">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input required type="text" name="form-Usuario"
                                                           value="<?php echo $UsuariUsuario;?>"
                                                           placeholder="Ingrese nombre de Usuario..."
                                                           class=" form-control"
                                                           id="form-Usuario">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                            </div>

                                            <div class="col-lg">

                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input required type="password" name="form-Pass"
                                                           placeholder="Ingrese la Contraseña..." class=" form-control"
                                                           id="form-Pass">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input required type="password" name="form-PassVal"
                                                           placeholder="Repita la Contraseña..." class=" form-control"
                                                           id="form-PassVal">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div>
                                                    <select required
                                                            class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched"
                                                            name="form-Estatus" id="form-Estatus"
                                                            ng-model="properties.value"
                                                            ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues"
                                                            ng-required="properties.required"
                                                            ng-disabled="properties.disabled">
                                                        <option style="display:none; height:60px;" value=""
                                                                class="ng-binding">
                                                            Estatus del Usuario...
                                                        </option>
                                                        <option value="Activo" label="Activo">
                                                        </option>
                                                        <option value="Desactivado" label="Desavtivado">
                                                        </option>
                                                    </select>
                                                </div>

                                                <!-- Fin Division en columnas -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                            </div>
                                            <div class="col-lg">
                                                <div>
                                                    <select required
                                                            class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched"
                                                            name="form-Estatus" id="form-Estatus"
                                                            ng-model="properties.value"
                                                            ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues"
                                                            ng-required="properties.required"
                                                            ng-disabled="properties.disabled">
                                                        <option style="display:none; height:60px;" value=""
                                                                class="ng-binding">
                                                            Roll...
                                                        </option>
                                                        <option value="2" label="Administrador">
                                                        </option>
                                                        <option value="3" label="Supervisor de Area">
                                                        </option>

                                                    </select>
                                                </div>

                                                <!-- Fin Division en columnas -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->

                                                <div class="form-grup">
                                                    <input required type="text" name="form-Area"
                                                           value="<?php echo $AreaUsuario;?>"
                                                           placeholder="Area..." class=" form-control"
                                                           id="form-PassVal">
                                                </div>
                                                <div class="saltito"><h1></h1></div>

                                            <div>
                                                <input required type="text" name="form-RFID"
                                                       value="<?php echo $IDUsuario;?>"
                                                       placeholder="RFID..." class=" form-control"
                                                       id="form-RFID">
                                            </div>
                                            <!-- Fin Componente de Formulario -->
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
                    location.href = "http://localhost:63342/MoleTracker/Admin_Usuarios.php";
                }
            </script>


</body>

</html>