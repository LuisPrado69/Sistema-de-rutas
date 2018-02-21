<?php
	include_once("../conn.php");
	session_start();
	$user = $_POST["txt_usuario"];
	$pass = md5($_POST["txt_contrasena"]);
	
	
	$rSQLsesion = mysql_query("SELECT * FROM usuarios WHERE BINARY usuario  = '$user' and password = '$pass' and estado='1'");
	if(mysql_num_rows($rSQLsesion) > 0)
	{
		while ($filasesion = mysql_fetch_array($rSQLsesion)) 
		{
			$_SESSION['nombre'] = $filasesion["nombre"];
			$_SESSION['usuario'] = $filasesion["usuario"];
			$_SESSION['id'] = $filasesion["id"];
			$_SESSION['equipo'] = $filasesion["equipo"];
			$_SESSION['privilegio'] = $filasesion["privilegio"];
			$_SESSION['fecha'] = $filasesion["fecha"];

			date_default_timezone_set('America/Bogota');
        	$fecha = date('Y-m-d H:i');

			$sql="update usuarios set online='1' where id='$_SESSION[id]'";
			$st=mysql_query($sql);

			$sql1="INSERT into sentencias values ('','$_SESSION[id]','INICIO SESION','--','$fecha','--')";
			$st1=mysql_query($sql1);

		}
		if($_SESSION["privilegio"] == 2){
			header("Location: ../rrutas.php");
		}
		else{
			header("Location: ../restado.php");
		}		
	}
	else
	{
		$_SESSION["alerta"] = "
    <div class='alert alert-warning alert-dismissable'>
        <i class='fa fa-check'></i>
        <b>Alerta </b>Usuario o contraseña erronea... 
    </div>";
    header("Location: ../sesion.php");
    return;
	}
?>
