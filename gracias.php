<?php

session_start();
include 'Auth.php';
    
    // FuncionLogin
    sleep(2);
    if(!empty($_POST['Entrar'])){
        $LUser = $_POST['UserLog'];
        $LClave = $_POST['ClaveLog'];

        // Creamos la conexion
        $conn = new mysqli($servername,$username,$password,$dbname);

        if ($conn->connect_error){
            die("Error en la conexion: ".$conn->connect_error);
        }else{
            // Obtencion de datos
            $LClave=md5($LClave);
            $sql ="SELECT RFID,pass, Estado FROM db706267167.ciudadanos where RFID = '$LUser' AND pass = '$LClave'";
            $result = $conn->query($sql);
            // Fin Obtencion de datos

            if ($result->num_rows > 0) {
                
                //Salida de datos del query
                     while($row = $result->fetch_assoc()){
                         if($row["Estado"] === '0'){
                            $_SESSION['user'] = $row["RFID"];
                            // echo "Usuario: ".$row["RFID"]."Clave: ".$row["pass"];
                            header("Location: DashboardAdministrador.php");
                         }else if($row["Estado"] === '1'){

                            $_SESSION['user'] = $row["RFID"];
                            // echo "Usuario: ".$row["RFID"]."Clave: ".$row["pass"];
                            header("Location: DashboardUsuario.php");
                         }else if($row["Estado"] === '2'){
                            
                            $_SESSION['user'] = $row["RFID"];
                            // echo "Usuario: ".$row["RFID"]."Clave: ".$row["pass"];
                            header("Location: DashboardEstadisticas.php");
                            }
                        
                     }
             }
             else{
                 
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Sus datos son incorrectos </div>';
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
        <title>Votaciones Guatemala</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="FountAuson/css/font-awesome.css">
        <link  href="https://fonts.googleapis.com/css?family-Ralweay:100,300,400,500">
        <link rel="stylesheet" href="css/custom.css">
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/admin.css" rel="stylesheet" type="text/css" />
        <!-- Estilos en Css -->
        <style>
            .slider{
               
                height: 100vh;
                background-size: cover;
                background-position: center;
            } 

            body{
                background: url("imagenes/Palacio.jpg") no-repeat center top;
                background-attachment: fixed;
                overflow: scroll;
            }

               
        </style>
</head>
<body>
               <!--menu de navegacion-->
        <nav class="navbar navbar-inverse bg-inverse navbar-toggleable-sm sticky-top formulario">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.html">
             <img src="imagenes/Logo.svg" width="30" height="30" class="d-inline-block align-top" alt="Logo GDX">
             Sistema de Votaciones De Guatemala
            </a> 
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01 ">
            <div class="navbar-nav mr-auto ml-auto text-center ">
               <a class="nav-item nav-link active formulario" href="login.php">Inicio </a>
                <a class="nav-item nav-link formulario" href="Registro.php">Registro </a>
                

            </div>
            <div class="d-flex flex-row justify-content-center">
                <a  href="https://facebook.com/"><span class="badge badge-primary">Facebook</span></a>
                <a  href="https://youtube.com/"><span class="badge badge-danger">Youtube</span></a>

            </div>
            </div>

        </nav>
        <!--Fin Menu de Navegacion-->
<br>
            <div>
            <br>
            </div>
    <div><h1 class="my-content formulario myform-all">Gracias por su voto</h1></div>





<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonimus"></script>
        <script src="https://cdnj.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUHKKDx6Qin1DkWx51bBrb" crossorigin="anonimus"></script>
        <script src="js/bootstrap.min.js" ></script>
        <script src="js/jquery-2.1.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
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