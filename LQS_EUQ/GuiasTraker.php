<?php
    //paso 1 conectar con el servidor
    include 'Auth.php';

 

    $link = new mysqli($servername,$username,$password,$dbname);
    if(!$link){
        echo 'No Se pudo establecer conexion: '.mysql_error();
    }else{
            //paso 3 hacer la sentencia sql y ejecutarla
            $sqlDatos = "SELECT ID_GUIA,GuiaSAP,Piloto,Placa_Camion,Camion_Capacidad,Rampa,Destino,Fecha_Carga,Fecha_Entrega,PesoBruto,Estatus FROM traker_mole.trck_mle_guias where Estatus = 'Entregado' or  Estatus = 'Activa';"; 
            $ejecutar_sentencia = $link->query($sqlDatos);
            if(!$ejecutar_sentencia)
            {
                echo 'Hay un error en la sentencia de SQL: '.$sqlDatos;
            }else{
                //paso 4 trer los datos en forma de un arreglo
                $lista_Guias =$ejecutar_sentencia->fetch_array(); 
                //la variable Lista_Usuaios es la que contiene el resultado de los usuarios
            }
        
    }

?>