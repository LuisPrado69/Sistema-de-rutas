<?php
//validación de sesión
	session_start();
	include_once('../conn.php');
	
		$fechaMovimiento = date("Y-m-d");
		$horaMovimiento = date("H:i:s");

		$id					=	$_POST["id"];
		$descripccion		=	$_POST["descripccion"];
		$estado				=	$_POST["estado"];
		
		if(mysql_query("update noticia set estado='$estado' where id='$id'"))
		{			

			date_default_timezone_set('America/Bogota');
			$fecha = date('Y-m-d H:i');
			$sql1="INSERT into sentencias values ('','$_SESSION[id]','UPDATE','NOTICIA SET ESTADO=','$fecha','$descripccion, WHERE ID = ,$id')";
			$st1=mysql_query($sql1);

			$_SESSION["alerta"]="Estado modificado exitosamente.";
			header("Location: ../rnoticia.php");
			exit();
		}
		else
		{			
			$_SESSION["alerta"]="Ocurrió un error modificando la Noticia.";			
		}
		
		header('Location:../rnoticia.php');		
?> 