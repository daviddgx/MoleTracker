<?php
session_start();

if ($_SESSION['Usuario'] == '') {
    header('Location: 505.html');


} else {


}
include 'Auth.php';
include 'LQS_EUQ/GuiasTraker.php';

$IDArea =  $_GET["Area"];
$NombreArea ="";
$TipoArea ="";
$EsInicialArea ="";
$EsFinalArea ="";
$AreaAnteriorArea ="";
$AreaSiguienteArea ="";
$DescripcionArea ="";
$MinutosMinimosArea ="";
$MinutosMaximosArea ="";

// obener datos del area
try {

 $conn  = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);


    //paso 3 hacer la sentencia sql y ejecutarla
            $sqlDatos = "SELECT * FROM traker_mole.trck_mle_areas where id_Area =$IDArea;";
            $AreasRegistrada = $conn->query($sqlDatos);
            if(!$AreasRegistrada)
            {
                echo 'Hay un error en la sentencia de SQL: '.$sqlDatos;
            }else{
                //paso 4 trer los datos en forma de un arreglo
                $lista_Area =$AreasRegistrada->fetch(PDO::FETCH_ASSOC);
                //la variable Lista_Usuaios es la que contiene el resultado de los usuarios
            }


}catch(Exception $ex){
    echo $ex;
}

for ($i = 0; $i < $lista_Area; $i++) {
    $NombreArea = $lista_Area['NOMBRE'];

    $TipoArea =$lista_Area['TIPO_AREA'];
    $EsInicialArea =$lista_Area['ES_INICIAL'];
    $EsFinalArea =$lista_Area['ES_FINAL'];
    $AreaAnteriorArea =$lista_Area['AREA_SIGUIENTE'];
    $AreaSiguienteArea =$lista_Area['AREA_ANTERIOR'];
    $DescripcionArea =$lista_Area['DESCRIPCION'];
    $MinutosMinimosArea =$lista_Area['MINUTOS_MINIMOS'];
    $MinutosMaximosArea =$lista_Area['MINUTOS_MAXIMOS'];


    $lista_Area = $AreasRegistrada->fetch(PDO::FETCH_ASSOC);

}



//Inicio accones de los botones

if (!empty($_POST['Programar'])) {
    $Nombre = $_POST['form-Nombre'];
    $TipoArea = $_POST['form-TipoArea'];
    $EsFinal = $_POST['form-Final'];
    $EsInicial = $_POST['form-Inicial'];
    $AreaSiguente = $_POST['form-AreaSiguente'];
    $AreaAnterior = $_POST['form-AreaAnterior'];
    $Descripcion = $_POST['form-Descripcion'];
    $MinutosMinimos = $_POST['form-MinutosMinimos'];
    $MinutosMaximos = $_POST['form-MinutosMaximos'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexion: " . $conn->connect_error);
    }

    $sql = "update traker_mole.trck_mle_areas set Nombre = '".$Nombre."', Tipo_Area ='".$TipoArea."', Es_final = '".$EsFinal."', Es_inicial = '".$EsInicial."', Area_Siguiente = '".$AreaSiguente."', Area_Anterior = '".$AreaAnterior."', Descripcion = '".$Descripcion."', Minutos_Minimos = '".$MinutosMinimos."', Minutos_maximos = '".$MinutosMaximos."' where ID_AREA = '".$IDArea."'";

    if ($conn->query($sql) === TRUE) {
        $mensajeExito = '<div class="alert alert-success" role="alert">se modifico correctamente</div>';
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
                                <a href="Admin_Guias.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i>
                                    <b class="">Guias</b> </a>
                            </li>
                            <li>
                                <a href="Admin_Unidades.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Unidades</b>
                                </a>
                            </li>
                            <li>
                                <a href="Admin_Areas.php"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b class="theme_color">Areas</b>
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
                    <h1>Registro de Áreas</h1>
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
                                <h1><strong>Modificar</strong> área </h1>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12   myform-cont justify-content-center">
                                <div class="myform-top">
                                    <div class="myform-top-left">
                                        <h3>Registro Online</h3>
                                        <p>Ingrese la información del área:</p>
                                    </div>
                                    <div class="myform-top-rigth">
                                        <i class="fa fa-meteor"></i>


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
                                                           value="<?php echo $NombreArea;?>"
                                                           placeholder="Nombre del área..."
                                                           class=" form-control" id="form-Nombre">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div>
                                                    <select required
                                                            class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched"
                                                            name="form-TipoArea" id="form-TipoArea"

                                                            ng-model="properties.value"
                                                            ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues"
                                                            ng-required="properties.required"
                                                            ng-disabled="properties.disabled">
                                                        <option style="display:none; height:60px;"
                                                                class="ng-binding">
                                                            Tipo de Área...
                                                        </option>
                                                        <option value="Registro" label="Área de Registro">
                                                        </option>
                                                        <option value="Carga" label="Área de Carga">
                                                        </option>
                                                        <option value="Verificado" label="Área de verificación de Marchamo">
                                                        </option>

                                                    </select>
                                                    </div>

                                                    <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div>
                                                    <select required
                                                            class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched"
                                                            name="form-Inicial" id="form-Inicial"
                                                            ng-model="properties.value"
                                                            ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues"
                                                            ng-required="properties.required"
                                                            ng-disabled="properties.disabled">
                                                        <option style="display:none; height:60px;" value=""
                                                                class="ng-binding">
                                                            Es Inicial...
                                                        </option>
                                                        <option value="Si" label="Si">
                                                        </option>
                                                        <option value="No" label="No">
                                                    </select>
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div>
                                                    <select required
                                                            class="funy form-control ng-pristine ng-valid ng-valid-required ng-touched"
                                                            name="form-Final" id="form-Final"
                                                            ng-model="properties.value"
                                                            ng-options="ctrl.getValue(option) as (ctrl.getLabel(option) | uiTranslate) for option in properties.availableValues"
                                                            ng-required="properties.required"
                                                            ng-disabled="properties.disabled">
                                                        <option style="display:none; height:60px;" value=""
                                                                class="ng-binding">
                                                            Es Final...
                                                        </option>
                                                        <option value="Si" label="Si">
                                                        </option>
                                                        <option value="No" label="No">
                                                    </select>
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                    <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input required type="text" name="form-AreaAnterior"
                                                           value="<?php echo $AreaAnteriorArea;?>"
                                                           placeholder="Área Antereor..." class=" form-control"
                                                           id="form-AreaAnterior">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>
                                            </div>

                                            <div class="col-lg">

                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input required type="text" name="form-AreaSiguente"
                                                           value="<?php echo $AreaSiguienteArea;?>"
                                                           placeholder="Área Siguente..." class=" form-control"
                                                           id="form-AreaSiguente">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>

                                                    <!-- Componente de Formulario -->
                                                    <div class="form-grup">
                                                        <input required type="text" name="form-Descripcion"
                                                               value="<?php echo $DescripcionArea;?>"
                                                               placeholder="Descripción del área..."
                                                               class=" form-control" id="form-Descripcion">
                                                    </div>
                                                    <!-- Fin Componente de Formulario -->
                                                    <div class="saltito"><h1></h1></div>
                                                    <!-- Componente de Formulario -->
                                                    <div class="form-grup">
                                                        <input required input type="text" name="form-MinutosMinimos"
                                                               value="<?php echo $MinutosMinimosArea;?>"
                                                               placeholder="Minutos Minimos..." class=" form-control"
                                                               id="form-MinutosMinimos">
                                                    </div>
                                                    <!-- Fin Componente de Formulario -->
                                                    <div class="saltito"><h1></h1></div>
                                                <!-- Componente de Formulario -->
                                                <div class="form-grup">
                                                    <input required input type="text" name="form-MinutosMaximos"
                                                           value="<?php echo $MinutosMaximosArea;?>"
                                                           placeholder="Minutos Máximos..." class=" form-control"
                                                           id="form-MinutosMaximos">
                                                </div>
                                                <!-- Fin Componente de Formulario -->
                                                <div class="saltito"><h1></h1></div>

                                                </div>
                                            </div>
                                            <!-- Fin Division en columnas -->

                                            <div class="saltito"><h1></h1></div>
                                            <div data-effect="flip" class="effect-button"><input type="submit"
                                                                                                 name="Programar"
                                                                                                 value="Registrar"
                                                                                                 class="effect-button">
                                            </div>

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
                    location.href = "http://localhost:63342/MoleTracker/Admin_Areas.php";
                }
            </script>


</body>

</html>