<?php
    //paso 1 conectar con el servidor
    include 'Auth.php';



try{
    $conn  = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

            //paso 3 hacer la sentencia sql y ejecutarla
            $sqlDatos = "SELECT ID_GUIA,GuiaSAP,Piloto,Placa_Camion,Camion_Capacidad,Rampa,Destino,Fecha_Carga,Fecha_Entrega,PesoBruto,Estatus FROM traker_mole.trck_mle_guias where Estatus = 'Activa' and Usuario_Piloto = '".$_SESSION['Usuario']."'";
            $ejecutar_sentencia = $conn->query($sqlDatos);
            if(!$ejecutar_sentencia)
            {
                echo 'Hay un error en la sentencia de SQL: '.$sqlDatos;
            }else{
                //paso 4 trer los datos en forma de un arreglo
                $lista_Guias =$ejecutar_sentencia->fetch(PDO::FETCH_ASSOC);
                //la variable Lista_Usuaios es la que contiene el resultado de los usuarios
            }

}catch(Exception $ex){
    echo $ex;

}

?>