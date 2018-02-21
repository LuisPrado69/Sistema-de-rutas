<?php
//validación de sesión
	session_start();
	include_once('../conn.php');	
		
		$id						=	$_POST["id"];
		$empleado_nombre		=	$_POST["nombre_empleado"];
		$usuario_empleado		=	$_POST["usuario_empleado"];
		$estado					=	$_POST["estado"];
		$correo					=	$_POST["correo"];		

		$rSQLequipov = mysql_query("SELECT nombre,usuario,correo FROM usuarios WHERE nombre = '$empleado_nombre' and usuario = '$usuario_empleado' and correo = '$correo'");
		if(mysql_num_rows($rSQLequipov) > 0){
			$_SESSION["alerta"] = "No se realizo ningun cambio";
			header('Location: ../rusuarion_indv.php');
			exit();
		}	
		else if(mysql_query("update usuarios set nombre='$empleado_nombre', usuario ='$usuario_empleado', correo = '$correo' where id= '$id'"))
		{			

			date_default_timezone_set('America/Bogota');
			$fecha = date('Y-m-d H:i');
			$sql1="INSERT into sentencias values ('','$_SESSION[id]','UPDATE','USUARIOS SET NOMBRE=,USUARIO=,CORREO=,','$fecha','$empleado_nombre,$usuario_empleado,$correo WHERE ID=$id')";
			$st1=mysql_query($sql1);

			$_SESSION["alerta"]="Usuario modificado exitosamente.";
			header('Location: ../rusuarion_indv.php');
			exit();
		}
		else
		{			
			$_SESSION["alerta"]="Ocurrió un error modificando al usuario.";			
		}

		header('Location: ../modificar_usuario_ind.php?id='.$id_empleado);
?> 