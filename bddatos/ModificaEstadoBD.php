<?php
//validación de sesión
	session_start();
	include_once('../conn.php');
	
		$fechaMovimiento = date("Y-m-d");
		$horaMovimiento = date("H:i:s");

		$id			=	$_POST["id"];
		$descripccion		=	$_POST["descripccion"];
		
		$rSQLequipov = mysql_query("SELECT descripccion FROM estado WHERE descripccion = '$descripccion'");
		if(mysql_num_rows($rSQLequipov) > 0){
			$_SESSION["alerta"] = "El Estado ".$descripccion." ya esta registrado";
		}	
		
		else if(mysql_query("update estado set descripccion='$descripccion' where id=$id"))
		{			

			date_default_timezone_set('America/Bogota');
			$fecha = date('Y-m-d H:i');
			$sql1="INSERT into sentencias values ('','$_SESSION[id]','UPDATE','ESTADO SET DESCRIPCCION=','$fecha','$descripccion, WHERE ID = ,$id')";
			$st1=mysql_query($sql1);
			
			$_SESSION["alerta"]="Estado modificado exitosamente.";
			header("Location: ../restado.php");
			exit();
		}
		else
		{			
			$_SESSION["alerta"]="Ocurrió un error modificando el equipo.";			
		}
		
		header('Location:../restado.php');		
?> 