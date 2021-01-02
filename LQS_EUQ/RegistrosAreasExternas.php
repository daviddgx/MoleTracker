<?php
    //paso 1 conectar con el servidor
    include 'Auth.php';


try{
    $conn  = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);


            //paso 3 hacer la sentencia sql y ejecutarla
            $sqlDatos = "SELECT * FROM traker_mole.trck_mle_reg_externos where fecha = '".$_SESSION['FechaTrabajo']."' and Area = '".$_SESSION['Area']."'" ;

            $ejecutar_sentenciaRegistrosExternos = $conn->query($sqlDatos);
            if(!$ejecutar_sentenciaRegistrosExternos)
            {
                echo 'Hay un error en la sentencia de SQL: '.$sqlDatos;
            }else{
                //paso 4 trer los datos en forma de un arreglo
                $listaRegistros =$ejecutar_sentenciaRegistrosExternos->fetch(PDO::FETCH_ASSOC);
                //la variable Lista_Usuaios es la que contiene el resultado de los usuarios
            }

}catch(Exception $ex){
    echo $ex;

}

try{

    //paso 3 hacer la sentencia sql y ejecutarla
    $sqlDatos = "SELECT * FROM traker_mole.trck_mle_reg_externos where Area = '".$_SESSION['Area']."'" ;

    $ejecutar_sentenciaRegistrosExternos_His = $conn->query($sqlDatos);
    if(!$ejecutar_sentenciaRegistrosExternos_His)
    {
        echo 'Hay un error en la sentencia de SQL: '.$sqlDatos;
    }else{
        //paso 4 trer los datos en forma de un arreglo
        $listaRegistros =$ejecutar_sentenciaRegistrosExternos_His->fetch(PDO::FETCH_ASSOC);
        //la variable Lista_Usuaios es la que contiene el resultado de los usuarios
    }

}catch(Exception $ex){
    echo $ex;

}
?>