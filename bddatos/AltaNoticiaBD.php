<?php
//validación de sesión
	session_start();
	include_once('../conn.php');
	
		$fechaMovimiento = date("Y-m-d");
		$horaMovimiento = date("H:i:s");

		$descripccion	=	$_POST["descripccion"];
		date_default_timezone_set('America/Bogota');
		$Fecha = date('Y-m-d H:i');

		if (mysql_query("insert into noticia values('','$Fecha',upper('$descripccion'),'$_SESSION[id]','1')"))
					{
						
						$fecha = date('Y-m-d H:i');
						$sql1="INSERT into sentencias values ('','$_SESSION[id]','INSERT NOTICIA','--','$fecha','$descripccion,1')";
						$st1=mysql_query($sql1);

						$_SESSION["alerta"] = "Rol Registrado";
						header('Location: ../rnoticia.php');
						exit();
					}
					else
					{
						$_SESSION["alerta"] = "Error al registar los datos";
					}
		
		header('Location:../form_noticia.php');
?> 