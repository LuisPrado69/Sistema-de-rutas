<?php
//validación de sesión
	session_start();
	include_once('../conn.php');
	
		$fechaMovimiento = date("Y-m-d");
		$horaMovimiento = date("H:i:s");

		$descripccion		=	$_POST["descripccion"];
		date_default_timezone_set('America/Bogota');
		$Fecha = date('Y-m-d H:i');

		

		$rSQLequipov = mysql_query("SELECT descripccion FROM estado WHERE descripccion = '$descripccion'");
		if(mysql_num_rows($rSQLequipov) > 0)
		{
			$_SESSION["alerta"] = "El Estado ".$descripccion." ya esta registrado";
		}
		else if (mysql_query("insert into estado values('',UPPER('$descripccion'),'$Fecha')")) 
					{

						$fecha = date('Y-m-d H:i');
						$sql1="INSERT into sentencias values ('','$_SESSION[id]','INSERT INTO','ESTADO','$fecha','$descripccion')";
						$st1=mysql_query($sql1);

						$_SESSION["alerta"] = "Estado Registrado";
						header('Location: ../restado.php');
						exit();
					}
					else
					{
						$_SESSION["alerta"] = "Error al registar los datos";
					}


		
header('Location:../form_estado.php');
?> 