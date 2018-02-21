<?

 $hora =  $_SESSION["ultimoAcceso_mc"];

   $ahora = date("Y-n-j H:i:s");

    $tiempo_transcurrido = (strtotime($ahora)-strtotime($hora));

 

    //comparamos el tiempo transcurrido 

     if($tiempo_transcurrido >= 900) {

 

       // destruyo la sesión 

      unset($_SESSION);

      header("Location:../sesion.php"); //envío al usuario a la pag. de autenticación 

      //sino, actualizo la fecha de la sesión 

   } else {

    $_SESSION["ultimoAcceso_mc"] = $ahora;

   }

?>