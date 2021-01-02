<?php
include 'Auth.php';


session_start();
date_default_timezone_set("America/Guatemala");
$fecha = date("d") . '-' . date("m") . '-' . date("Y");
$_SESSION["FechaTrabajo"] = date("d") . '-' . date("m") . '-' . date("Y");
$_SESSION["HoraTrabajo"] = date("H") . ':' . date("i") . ':' . date("s");

//long="+iLongitud+"'&lat='"+iLatitud+"'";
$Latitud =  $_GET["lat"];
$Longitud =  $_GET["long"];

$conn = new mysqli($servername, $username, $password, $dbname);
$error = '<div class="alert alert-success" role="alert"><p><strong> Ya existe el registro, por favor validar</div>';
if ($conn->connect_error) {
    die("Error en la conexion: " . $conn->connect_error);
} else {


    $QryGuiaActiva = "SELECT * FROM traker_mole.trck_mle_guias where GuiaSAP ='" . $_SESSION["GuiaSAPActiva"] . "' and Estatus <> 'Salida'";

    $EsUsuarioPiloto = $conn->query($QryGuiaActiva);
    try {

        while ($rowPiloto = $EsUsuarioPiloto->fetch_assoc()!== null) {

            echo $rowPiloto['GuiaSAP'];


            //Inserter Guia y Actualizar Estatus
            $ActualizarGuiaProceso = "insert into traker_mole.trck_mle_reg_guias values (0,'" . $_SESSION["GuiaSAPActiva"] . "','','" . $rowPiloto['Piloto'] . "','Salida Entrega','" . $_SESSION['Usuario'] . "','" . $_SESSION["FechaTrabajo"] . " " . $_SESSION["HoraTrabajo"] . "',0,0, 'Inicio Entrega' )";

            if ($conn->query($ActualizarGuiaProceso) === TRUE) {

                $ActualizarGuia = "update traker_mole.trck_mle_guias set Estatus='Salida', Traker_Inicio = '" . $Latitud . ", " . $Longitud . "' where GuiaSAP = '" . $_SESSION["GuiaSAPActiva"] . "' ";
                if ($conn->query($ActualizarGuia) === TRUE) {


                    $error = '<div class="alert alert-success" role="alert"><p><strong>Registrado Correctamente</div>';

                }

            }
        }
        echo $error;
    } catch (Exception $e) {

    }
}


?>