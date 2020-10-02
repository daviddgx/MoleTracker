<?php
    //paso 1 conectar con el servidor
    include 'Auth.php';


try{
    $conn  = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);


            //paso 3 hacer la sentencia sql y ejecutarla
            $sqlDatos = "SELECT GuiaSap,Area,Registrador,HoraRegistro,Piloto FROM traker_mole.trck_mle_reg_guias where HoraRegistro like '".$_SESSION['FechaTrabajo']."'";

            $ejecutar_sentenciaRegistros = $conn->query($sqlDatos);
            if(!$ejecutar_sentenciaRegistros)
            {
                echo 'Hay un error en la sentencia de SQL: '.$sqlDatos;
            }else{
                //paso 4 trer los datos en forma de un arreglo
                $listaRegistros =$ejecutar_sentenciaRegistros->fetch(PDO::FETCH_ASSOC);
                //la variable Lista_Usuaios es la que contiene el resultado de los usuarios
            }

}catch(Exception $ex){
    echo $ex;

}
?>