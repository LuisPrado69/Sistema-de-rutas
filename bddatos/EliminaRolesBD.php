<?php
//validación de sesión
	session_start();
	include_once('../conn.php');
	
		$fechaMovimiento = date("Y-m-d");
		$horaMovimiento = date("H:i:s");

		$id					=	$_POST["id"];
		$descripccion		=	$_POST["descripccion"];
		$estado				=	$_POST["estado"];
		
		$rSQLequipov = mysql_query("SELECT estado FROM roles WHERE  estado = '$estado'");
		if(mysql_num_rows($rSQLequipov) > 0){
			$_SESSION["alerta"] = "El Estado ".$descripccion." ya esta registrado";
		}	
		
		else if(mysql_query("update roles set estado = '$estado' where id='$id'"))
		{			
			$_SESSION["alerta"]="Estado Desactivado exitosamente.";
			header("Location: ../rroles.php");
			exit();
		}
		else
		{			
			$_SESSION["alerta"]="Ocurrió un error modificando el equipo.";			
		}
		
		header('Location:../rroles.php');		
?> 