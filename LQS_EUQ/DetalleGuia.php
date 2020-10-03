<?php
//paso 1 conectar con el servidor
include 'Auth.php';


try {
    $conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);

    //paso 3 hacer la sentencia sql y ejecutarla
    $sqlDatos = "SELECT ID_GUIA,GuiaSAP,Piloto,Placa_Camion,Camion_Capacidad,Rampa,Destino,Fecha_Carga,Fecha_Entrega,PesoBruto,Estatus,Verificador,Traker_Inicio,Tracker_Final FROM traker_mole.trck_mle_guias where GuiaSAP = '".$_SESSION['GuiaDetalle']."'";
    $ejecutar_sentencia = $conn->query($sqlDatos);
    if (!$ejecutar_sentencia) {
        echo 'Hay un error en la sentencia de SQL: ' . $sqlDatos;
    } else {
        //paso 4 trer los datos en forma de un arreglo
        $Detalle_Guia = $ejecutar_sentencia->fetch(PDO::FETCH_ASSOC);
        //la variable Lista_Usuaios es la que contiene el resultado de los usuarios
    }

} catch (Exception $ex) {
    echo $ex;

}

try {
    $conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
    //paso 3 hacer la sentencia sql y ejecutarla
    $sqlDatos = "SELECT NoProceso,Area,Registrador,HoraRegistro,Estatus,Accion FROM traker_mole.trck_mle_reg_guias where GuiaSap ='" . $_SESSION['GuiaDetalle'] . "'";
    $ejecutar_sentenciaGuias = $conn->query($sqlDatos);
    if (!$ejecutar_sentenciaGuias) {
        echo 'Hay un error en la sentencia de SQL: ' . $sqlDatos;
    } else {
        //paso 4 trer los datos en forma de un arreglo
        $lista_ProcesoGuias = $ejecutar_sentenciaGuias->fetch(PDO::FETCH_ASSOC);
        //la variable Lista_Usuaios es la que contiene el resultado de los usuarios
    }

} catch (Exception $ex) {
    echo $ex;

}


?>