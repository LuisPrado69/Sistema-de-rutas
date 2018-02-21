<?php
//validación de sesión
	session_start();
	include_once('../conn.php');

		$empleado_nombre		= $_POST["nombre_empleado"];
		$usuarios 				= $_POST["usuario_empleado"];
		$estado 				= $_POST["estado"];
		$correo 				= $_POST["correo"];
		$contrasena 			= $_POST["contrasena_empleado"];
		$rcontrasena 			= $_POST["contrasena_empleado2"];
		$privilegio 			= $_POST["privilegio"];
		date_default_timezone_set('America/Bogota');
		$Fecha = date('Y-m-d H:i');

		

		if($contrasena == $rcontrasena){
			if($privilegio != 0)
			{
				$rSQLequipov = mysql_query("SELECT usuario,correo FROM usuarios WHERE usuario = '$usuarios' or correo = '$correo'");
				if(mysql_num_rows($rSQLequipov) > 0)
				{
					$_SESSION["alerta"] = "El Usuario :".$usuarios." o correo ".$correo." ya esta registrado";
					header("Location: ../rusuarios.php");
					exit();
				}
				else if(mysql_query("INSERT INTO usuarios VALUES ('', UPPER('$empleado_nombre'), '$usuarios', md5('$contrasena'), '$privilegio', '$correo',0,0, '$estado','$Fecha','')")){

					$fecha = date('Y-m-d H:i');
					$sql1="INSERT into sentencias values ('','$_SESSION[id]','INSERT INTO','USUARIOS','$fecha','$empleado_nombre,$usuarios,$privilegio,$correo,$estado')";
					$st1=mysql_query($sql1);
					$_SESSION["alerta"] = "Usuario registrado correctamente";
					header("Location: ../rusuarios.php");
					exit();
				}
				else{
					$_SESSION["alerta"] = "Error al registrar al usuario";
				}
			}
			else{
				$_SESSION["alerta"] = "Selecciona un privilegio";
			}			
		}
		else{
			$_SESSION["alerta"] = "Las contraseñas no son iguales";
		}

		header('Location:../form_usuarios.php');
?> 