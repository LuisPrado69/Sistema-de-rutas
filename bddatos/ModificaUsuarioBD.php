<?php
//validación de sesión
	session_start();
	include_once('../conn.php');	
		
		$id						=	$_POST["id"];
		$empleado_nombre		=	$_POST["nombre_empleado"];
		$usuario_empleado		=	$_POST["usuario_empleado"];
		$estado					=	$_POST["estado"];		
		$privilegio				=	$_POST["privilegio"];
		$correo					=	$_POST["correo"];

		$rSQLequipov = mysql_query("SELECT nombre,usuario,estado,privilegio,correo FROM usuarios WHERE nombre = '$empleado_nombre' and usuario = '$usuario_empleado' and estado = '$estado' and privilegio = '$privilegio' and correo = '$correo'");
		if(mysql_num_rows($rSQLequipov) > 0){
			$_SESSION["alerta"] = "No se realizo ningun cambio";
			header('Location: ../rusuarios.php');
			exit();
		}	
		else if(mysql_query("update usuarios set nombre='$empleado_nombre', usuario ='$usuario_empleado', estado = '$estado', privilegio = '$privilegio' , correo = '$correo' where id= '$id'"))
		{	

			date_default_timezone_set('America/Bogota');
			$fecha = date('Y-m-d H:i');
			$sql1="INSERT into sentencias values ('','$_SESSION[id]','UPDATE','USUARIOS SET NOMBRE=,USUARIO=,ESTADO=,PRIVILEGIO=,CORREO=,','$fecha','$empleado_nombre,$usuario_empleado,$estado,$privilegio,$correo WHERE ID=$id')";
			$st1=mysql_query($sql1);

			$_SESSION["alerta"]="Usuario modificado exitosamente.";
			header('Location: ../rusuarios.php');
			exit();
		}
		else
		{			
			$_SESSION["alerta"]="Ocurrió un error modificando al usuario.";			
		}

		header('Location: ../modificar_usuario.php?id='.$id_empleado);
?> 