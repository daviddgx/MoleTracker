<?php
    //paso 1 conectar con el servidor
    include 'Auth.php';

    

    $link = new mysqli($servername,$username,$password,$dbname);
    if(!$link){
        echo 'No Se pudo establecer conexion: '.mysql_error();
    }else{
            //paso 3 hacer la sentencia sql y ejecutarla
            $sqlDatos = "SELECT NoProceso,Area,Registrador,HoraRegistro,Estatus FROM traker_mole.trck_mle_reg_guias where GuiaSap =  '".$_SESSION['GuiaSAPActiva']."'"; 
            $ejecutar_sentenciaGuias = $link->query($sqlDatos);
            if(!$ejecutar_sentenciaGuias)
            {
                echo 'Hay un error en la sentencia de SQL: '.$sqlDatos;
            }else{
                //paso 4 trer los datos en forma de un arreglo
                $lista_ProcesoGuias =$ejecutar_sentenciaGuias->fetch_array();
                //la variable Lista_Usuaios es la que contiene el resultado de los usuarios
            }
        
    }

?>