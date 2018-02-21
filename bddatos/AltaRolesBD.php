<?php
//validación de sesión
	session_start();
	include_once('../conn.php');
	
	$fechaMovimiento = date("Y-m-d");
		$horaMovimiento = date("H:i:s");

		$descripccion	=	$_POST["descripccion"];
		$estado			=	$_POST["estado"];
		date_default_timezone_set('America/Bogota');
		$Fecha = date('Y-m-d H:i');

		

		$rSQLequipov = mysql_query("SELECT descripccion,estado FROM roles WHERE descripccion = '$descripccion' and estado = '$estado'");
		if(mysql_num_rows($rSQLequipov) > 0)
		{
			$_SESSION["alerta"] = "El Rol ".$descripccion." ya esta registrado";
		}
		else if (mysql_query("insert into roles values('',upper('$descripccion'),'$estado','$Fecha')"))
					{
						
						$fecha = date('Y-m-d H:i');
						$sql1="INSERT into sentencias values ('','$_SESSION[id]','INSERT INTO','ROLES','$fecha','$descripccion,$estado')";
						$st1=mysql_query($sql1);

						$_SESSION["alerta"] = "Rol Registrado";
						header('Location: ../rroles.php');
						exit();
					}
					else
					{
						$_SESSION["alerta"] = "Error al registar los datos";
					}
		
		header('Location:../form_roles.php');
?> 