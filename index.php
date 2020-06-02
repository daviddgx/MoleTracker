<?php
session_start();

include 'LQS_EUQ/Auth.php';

// FuncionLogin
sleep(3);
if (!empty($_POST['Entrar'])) {
    $LUser = $_POST['UserLog'];
    $LClave = $_POST['ClaveLog'];
    // Creamos la conexion
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Error en la conexion: ' . $conn->connect_error);
    } else {
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
                    if ($row['T_Usuario'] === 'Administrador de Guias') {
                        $_SESSION['Usuario'] = $row['Usuario'];
                        //echo "Usuario: ".$row["RFID"]."Clave: ".$row["Pass"]."Usuario: ".$row["Usuario"];
                        header('Location: DashboardAdministradorGuias.php');
                    } elseif ($row['T_Usuario'] === 'Area Generica ') {
                        $_SESSION['Usuario'] = $row['Usuario'];
                        // echo "Usuario: ".$row["RFID"]."Clave: ".$row["Pass"];
                        header('Location: DashboardAreaGenerica.php');
                    } elseif ($row['T_Usuario'] === 'Traker') {
                        $_SESSION['Usuario'] = $row['Usuario'];
                        // echo "Usuario: ".$row["RFID"]."Clave: ".$row["Pass"];
                        header('Location: DashboardTraker.php');
                    }
                }
            } else {
                $error =
                    '<div class="alert alert-danger" role="alert"><p><strong>Sus datos son incorrectos!!</div>';
                // $row = $result->fetch_assoc();
            }
        } catch (Exception $ex) {
        }
        //comprovacion de dadtos
        //fin comprovacion de datos
    }
    // Fin de la conexion
}

// FinFuncionLogIN
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Requiered meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-whidth, initial-sace=1, shrink-to-fit=no">
    <title>Mole Tracker</title>
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="FountAuson/css/font-awesome.css">
        <link href="https://fonts.googleapis.com/css?family-Ralweay:100,300,400,500">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/PreLoaderStyle.css">
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="imagenes/LOGOTKM2.PNG">
        <link href="css/admin.css" rel="stylesheet" type="text/css" />
        <!-- Estilos en Css -->
    <style>
        body {
            background: url("imagenes/Mole Tracker.png");
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-attachment: fixed;
            overflow: scroll;
        }
    </style>
</head>

<body>

    <!-- Preloader  -->
    <div id="PreLoaderCont">

        <div class="preloader">
            <br></br>
            <div class="logo">
                <img src="imagenes/LOGOTKM2.PNG" width="100px" height="auto">
                Mole<span style="color:orange">Tracker</span>
            </div>
            <div class="loader-frame">
                <div class="loader1" id="loader1"></div>
                <div class="loader2" id="loader2"></div>
            </div>
        </div>
    </div>
    <!-- Fin Preloader -->

    <!-- Contenido de la pagina -->


    <!-- Fin Contenido  -->
    <div class="hide" id="Contenido">
              <!--menu de navegacion-->
              <nav class="navbar navbar-inverse bg-inverse navbar-toggleable-sm sticky-top formulario">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.html">
             <img src="imagenes/LOGOTKM2.PNG" width="30" height="30" class="d-inline-block align-top" alt="Logo GDX">
             Mole Tracker
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01 ">
            <div class="navbar-nav mr-auto ml-auto text-center ">

            </div>
            <div class="d-flex flex-row justify-content-center">
                <a  href="https://sertero.com/"><span class="badge badge-primary">sertero</span></a>
                <a  href="https://qbit-labs.com/"><span class="badge badge-danger">qbit-labs</span></a>

            </div>
            </div>

        </nav>
        <!--Fin Menu de Navegacion-->

        <!--Inicia Formulario Login-->
        <div class="my-content formulario">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 offset-3 myform-all">
                        <h1><strong>Control de Logistica de </strong> Distribución</h1>
                        <div class="mydescription ">
                            <p class="">Formulario de Ingreso al sistema</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6 offset-3  myform-cont">
                        <div class="myform-top">
                            <div class="myform-top-left">
                                <h3>Ingresa con tu número de RFID y tu Pass</h3>
                                <p>Digita tu usuario y Pass:</p>
                            </div>
                            <div class="myform-top-rigth">
                                <i class="fa fa-key"> </i>
                            </div>
                        </div>
                        <div class="myform-botton">
                            <form role="form" action="" method="post" class="">
                                <div class="form-grup">
                                    <input type="text" name="UserLog" placeholder="RFID..." class="form-control" id="form-username">
                                </div>
                                <div class="saltito">
                                    <h1></h1>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="ClaveLog" placeholder="Contaseña..." class="form-control" id="form-password">
                                </div>
                                <div> <?php echo $error .
                                    $mensajeExito; ?></div>
                                <div data-effect="flip" class="effect-button"><input type="submit" name="Entrar" value="Entrar" class="effect-button"></input></div>
                                <!--<div  data-effect="flip" class="effect-button"><a class="nav-item nav-link formulario" href="DashboardAdministrador.php">Entrar </a></div>-->
                                <!-- <input  type="submit" name="Entrar" class="mybtn "></input> -->
                                <!-- Hacer que el boton nos diriga a la pagina de administracion -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Finaliza Formulario LogIn-->
        <!--       Inicia Footer-->
        <!-- <footer class="container-fluid bg-inverse formulariocontainer-fluid bg-inverse formulario">
            <div class="row rext-white py-4 text-white">
                <div class="col-md-3">
                    <img src="imagenes/LOGOTKM.PNG" alt="" width="200px" height="auto" class="float-left mr-3">
                    <h4 class="lead" Mole Tracker></h4>
                    <footer class="blockquote-footer">Proyecto de Graduación <cite title="Source Title">David Orantes<br>0910-14-1052</cite></footer>
                </div>
                <div class="col-md-3">
                    <h4 class="lead">Tecnologias</h4>
                    <p>Lectura de datos con RFID<br>Geo localización por GPS<br>Seguimiento por GIS</p>
                </div>
                <div class="col-md-3">
                    <h4 class="lead">Herramientas</h4>
                    <p>Base de Datos: MySQL<br>Lenguajes: PHP, Java, JakartaEE</p>
                </div>
                <div class="col-md-3">
                    <h4 class="lead ">Siguenos</h4>
                </div>
            </div>
        </footer> -->
        <!--       Finaliza Footer-->
    </div>


    <!-- Script para Loader  -->
    <script src="js/materialize.js"></script>

    <script>
        window.addEventListener('load', () => {

            carga();

            function carga() {
                document.getElementById('PreLoaderCont').className = 'hide';
                document.getElementById('Contenido').className = 'center animated pulse ';
            }
        })
    </script>
    <!-- Fin Script de Loader -->

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonimus"></script>
    <script src="https://cdnj.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUHKKDx6Qin1DkWx51bBrb" crossorigin="anonimus"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-2.1.0.js"></script>
    <script src="js/common-script.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/script.min.js"></script>
    <script src="js/animated.js" type="text/javascript"></script>
    <script>
        // (function(i, s, o, g, r, a, m) {
        //     i['GoogleAnalyticsObject'] = r;
        //     i[r] = i[r] || function() {
        //         (i[r].q = i[r].q || []).push(arguments)
        //     }, i[r].l = 1 * new Date();
        //     a = s.createElement(o),
        //         m = s.getElementsByTagName(o)[0];
        //     a.async = 1;
        //     a.src = g;
        //     m.parentNode.insertBefore(a, m)
        // })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        // ga('create', 'UA-48105801-1', 'creativico.com');
        // ga('send', 'pageview');
    </script>

    <script src="js/jPushMenu.js"></script>
    <script src="js/side-chats.js"></script>
</body>

</html>