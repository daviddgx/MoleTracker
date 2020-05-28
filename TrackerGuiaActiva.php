<?php 


session_start();

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
$QRYAreaUsuario = "SELECT T_Usuario,concat_ws(' ',nombre,apellido) as Quien FROM traker_mole.trkml_usuarios where RFID = '".$RFIDRegistro."';";

$AreaUsuario; 
$resultAreaUsuario = $conn->query($QRYAreaUsuario);


try{
    if ($resultAreaUsuario->num_rows > 0) {
        while ($rowdato = $resultAreaUsuario->fetch_assoc()) {
            $AreaUsuario =  $rowdato["T_Usuario"];
            //echo $AreaUsuario;
            //Aqui van los Ifs para saber de que area son y hace el incert segun el Area.
            
            if($AreaUsuario == 'Supervisor Garita Colmenta'){
                $sql ="INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('".$_SESSION['GuiaSAPActiva']."','".$AreaUsuario."','".$rowdato["Quien"]."','".$timestamp."','0','0');";    
                //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                    if ($conn->query($sql) === TRUE) {
                        
                        //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                    }
                    else{
                        
                        echo "Error: " .$sql."<br>".$conn->error;
                        $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                    }
            } else if($AreaUsuario == 'Supervisor Garita Fabrica'){
                $sql ="INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('".$_SESSION['GuiaSAPActiva']."','".$AreaUsuario."','".$rowdato["Quien"]."','".$timestamp."','0','0');";    
                //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                    if ($conn->query($sql) === TRUE) {
                        
                        //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                    }
                    else{
                        
                        echo "Error: " .$sql."<br>".$conn->error;
                        $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                    }
            }  else if($AreaUsuario == 'Supervisor de Andenes de Carga'){
                $sql ="INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('".$_SESSION['GuiaSAPActiva']."','".$AreaUsuario."','".$rowdato["Quien"]."','".$timestamp."','0','0');";    
                //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                    if ($conn->query($sql) === TRUE) {
                        
                        //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                    }
                    else{
                        
                        echo "Error: " .$sql."<br>".$conn->error;
                        $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                    }
            } else if($AreaUsuario == 'Validador de Marchamos'){
                $sql ="INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('".$_SESSION['GuiaSAPActiva']."','".$AreaUsuario."','".$rowdato["Quien"]."','".$timestamp."','0','0');";    
                //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                    if ($conn->query($sql) === TRUE) {
                        
                        //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                    }
                    else{
                        
                        echo "Error: " .$sql."<br>".$conn->error;
                        $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                    }
            }

            else if($AreaUsuario == 'Tracker'){
                $sql ="INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('".$_SESSION['GuiaSAPActiva']."','".$AreaUsuario."','".$rowdato["Quien"]."','".$timestamp."','0','0');";    
                //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                    if ($conn->query($sql) === TRUE) {
                        
                        //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                    }
                    else{
                        
                        echo "Error: " .$sql."<br>".$conn->error;
                        $error = '<div class="alert alert-danger" role="alert"><p><strong>No se guardaron los datos </div>';
                    }
            }
            else if($AreaUsuario == 'Administrador de Guias'){
                $sql ="INSERT INTO `traker_mole`.`trck_mle_reg_guias` (`GuiaSap`,`Area`,`Registrador`,`HoraRegistro`,`bandera`,`Estatus`) VALUES('".$_SESSION['GuiaSAPActiva']."','".$AreaUsuario."','".$rowdato["Quien"]."','".$timestamp."','0','0');";    
                //INSERT INTO `traker_mole`.`trck_mle_guias` (`Piloto`, `DPI_Piloto`, `Placa_Camion`, `Camion_Capacidad`, `Rampa`, `Destino`, `Fecha_Carga`, `Fecha_Entrega`, `PesoBruto`, `RFID`, `Estatus`) VALUES ('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

                    if ($conn->query($sql) === TRUE) {
                        
                        //$mensajeExito = '<div class="alert alert-success" role="alert">Registrado en Garita Correctamente.</div>';
                    }
                    else{
                        
                        echo "Error: " .$sql."<br>".$conn->error;
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
        
        
    }else{
        $error = '<div class="alert alert-danger" role="alert"><p><strong>El RFID no esta registrado como supervisor de Area</div>';
    }
}catch (Exception $ex) {


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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mole Tracker / Tracker </title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/admin.css" rel="stylesheet" type="text/css" />
    <link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="plugins/kalendar/kalendar.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/scroll/nanoscroller.css">
    <link href="plugins/morris/morris.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/EstiloTablas.css">
    <link rel="stylesheet" href="css/custom2.css">
    <link rel="icon" href="imagenes/LOGOTKM.PNG">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
 

<style>
            

            body{
                background: url("imagenes/Registro.jpg")  no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                overflow: scroll;
                color: #ca8a43;
            }

             #map {
                height: 100%;
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
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      .slimbuton{
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
                                    <li> <a href="login.php"><i class="fa fa-power-off"></i> LogOut</a> </li>
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
                                    <a href="DashboardTraker.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i> <b >DashBoard</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerGuiasEntregadas.php"> <span>&nbsp;</span> <i class="fa fa-circle "></i> <b>Guia Activa</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerTiempos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Tiempos</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerAtrasos.php"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Guias Retrasadas</b> </a>
                                </li>
                                <li>
                                    <a href="TrackerGuiaActiva.php"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i > <b class="theme_color">Guia Activa</b> </a>
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
                        <h1>Guia Activa...</h1>
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
               
                  <!-- Se Ingresan Los Mantenimientos -->
                    <!-- Finaliza Componente de Seguimiento -->

                    <br>
                        <div class="container" id="Mapa">                 
                            <!-- Inicia Componente Registro Actividad -->
                            <div class="myform-all Color_Claro">
                                
                                <div class="my-content formulario">
                                    <form role="form" action="" method="post"> 
                                    <h1 ><strong>Proceso de </strong> Registro</h1>   
                                        <div class="form-grup" >
                                            <input type="text" name="RFIDLog" placeholder="RFID..." class="form-control" id="form-username">
                                        </div>
                                        <br>
                                        <div> <?php echo $error . $mensajeExito; ?></div>
                                        <div   class=""><input  type="submit" name="Registrar" value="Registrar" class="effect-button"></input></div>
                                        </div>
                                    </form>

                            </div>
                        </div>
                        <!-- Finaliza Componente Registro actividad -->
                         
                  <br>
                   <!-- Inicia La seccion de usuarios -->
                        <div class="container" id="listausuarios">
                       <div class= "myform-all Color_Claro">
                        <!-- Inicia Tabla de Usuarios; -->
                        <br></br>
                        <h1 class="Titulos">Guia actualmente Activa</h1>
                        <form role="form" action="" method="post" class="">
                        <table>
                                    <tr>
                                        <th>No. Guia</th> 
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
                                            $_SESSION['GuiaSAPActiva'] = $lista_Guias['GuiaSAP'];
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
                        <table>
                                    <tr>
                                        <th>No. Proceso</th>
                                        <th>Area</th>
                                        <th>Registrado Por</th>
                                        <th>Hora de Registro</th>
                                        <th>Estatus</th>
                                        
                                        <?php
                                        for ($i = 0; $i < $lista_ProcesoGuias; $i++) {
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $lista_ProcesoGuias['NoProceso'];
                                            echo "</td>";

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
                                               echo "</tr>";       
                                            $lista_ProcesoGuias = $ejecutar_sentenciaGuias->fetch_array();
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
                                <button type="button" class="btn btn-secondary  btn-lg btn-block" onclick=" AbrirMapa()">Abrir Mapa</button>
                                <!-- Mapa -->
                            </div>
                        </div>
                        <!-- Finaliza Componente Abrir Mapa -->
                        


        </div>

                  
    <div class="demo"><span id="demo-setting"><i class="fa fa-cog txt-color-blueDark"></i></span>
        <form>
            <legend class="no-padding margin-bottom-10" style="color:#6e778c;">Layout Options</legend>
            <section><label><input type="checkbox" class="checkbox style-0" id="smart-fixed-header" name="subscription"><span>Fixed Header</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-fixed-navigation" name="terms"><span>Fixed Navigation</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-rigth-navigation" name="terms"><span>Right Navigation</span></label><label><input type="checkbox" class="checkbox style-0" id="smart-boxed-layout" name="terms"><span>Boxed Layout</span></label>
                <span id="smart-bgimages" style="display: none;"></span>
            </section>
            <section>
                <h6 class="margin-top-10 semi-bold margin-bottom-5">Clear Localstorage</h6><a id="reset-smart-widget" class="btn btn-xs btn-block btn-primary" href="javascript:void(0);"><i class="fa fa-refresh"></i> Factory Reset</a></section>
            <h6 class="margin-top-10 semi-bold margin-bottom-5">Ultimo Skins</h6>
            <section id="smart-styles"><a style="background-color:#23262F;" class="btn btn-block btn-xs txt-color-white margin-right-5" id="dark_theme" href="javascript:void(0);"><i id="skin-checked" class="fa fa-check fa-fw"></i> Dark Theme</a><a style="background:#E35154;" class="btn btn-block btn-xs txt-color-white"
                    id="red_thm" href="javascript:void(0);">Red Theme</a><a style="background:#34B077;" class="btn btn-xs btn-block txt-color-darken margin-top-5" id="green_thm" href="javascript:void(0);">Green Theme</a><a style="background:#56A5DB" class="btn btn-xs btn-block txt-color-white margin-top-5"
                    data-skinlogo="img/logo-pale.png" id="blue_thm" href="javascript:void(0);">Blue Theme</a><a style="background:#9C6BAD" class="btn btn-xs btn-block txt-color-white margin-top-5" id="magento_thm" href="javascript:void(0);">Magento Theme</a>
                <a style="background:#FFFFFF" class="btn btn-xs btn-block txt-color-black margin-top-5" id="light_theme" href="javascript:void(0);">Light Theme</a>
            </section>
        </form>
    </div>









    <script src="js/jquery-2.1.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/common-script.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/jquery.sparkline.js"></script>
    <script src="js/sparkline-chart.js"></script>
    <script src="js/graph.js"></script>
    <script src="js/edit-graph.js"></script>
    <script src="plugins/kalendar/kalendar.js" type="text/javascript"></script>
    <script src="plugins/kalendar/edit-kalendar.js" type="text/javascript"></script>

    <script src="plugins/sparkline/jquery.sparkline.js" type="text/javascript"></script>
    <script src="plugins/sparkline/jquery.customSelect.min.js"></script>
    <script src="plugins/sparkline/sparkline-chart.js"></script>
    <script src="plugins/sparkline/easy-pie-chart.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="plugins/morris/raphael-min.js" type="text/javascript"></script>
    <script src="plugins/morris/morris-script.js"></script>





    <script src="plugins/demo-slider/demo-slider.js"></script>
    <script src="plugins/knob/jquery.knob.min.js"></script>
    
    <script src="js/jPushMenu.js"></script>
    <script src="js/side-chats.js"></script>


    <script src="js/animated.js" type="text/javascript"></script>
    <script src="js/jPushMenu.js"></script>
    <script src="js/side-chats.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="plugins/scroll/jquery.nanoscroller.js"></script>

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
function AbrirMapa()
{
     location.href = "http://localhost/Projects/MoleTracker/MapTest.php";
} 
</script>

</body>

</html>