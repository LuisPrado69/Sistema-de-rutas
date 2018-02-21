<?php
//validación de sesión
	session_start();
	include_once('../conn.php');
	
		
		$id_empleado			=	$_POST["id_empleado"];
		$contrasena = $_POST["contrasena_empleado"];
		$contrasena2 = $_POST["contrasena_empleado2"];

		$encriptada = md5($contrasena);
		
		if($contrasena == $contrasena2){
			if(mysql_query("update usuarios set password = '$encriptada' where id = '$id_empleado'")){

				date_default_timezone_set('America/Bogota');
				$fecha = date('Y-m-d H:i');
				$sql1="INSERT into sentencias values ('','$_SESSION[id]','UPDATE','USUARIOS SET PASSWORD=','$fecha','--, WHERE ID = ,$id_empleado')";
				$st1=mysql_query($sql1);

				$_SESSION["alerta"] = "La contraseña a sido cambiado correctamente";
				header("Location: ../rusuarios.php");
				exit();
			}
			else{
				$_SESSION["alerta"] = "Error la contraseña no puedo ser actualizada";
			}
		}
		else{
			$_SESSION["alerta"] = "Las contraseñas no son iguales";			
		}
		header("Location: ../modificar_contrasena.php?id=".$id_empleado);
		
?> 