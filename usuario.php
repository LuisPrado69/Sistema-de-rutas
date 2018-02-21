<script>
window.onload = function(){killerSession();}
function killerSession()
{
	setTimeout("window.open('cerrarSesion.php','_top');",300000);
}
</script>
<?php
	session_start();
	if((!isset($_SESSION["nombre"]))){		
		header("Location: sesion.php");
	}
	include_once('conn.php');
	require_once('funciones/funciones.php');
	require_once('funciones/conexion.php');
/*	date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d H:i');
	$sql1="Insert into sentencias values ('','$_SESSION[id]','SELECT * FROM','ESTADO','$fecha','')";
	$st1=mysql_query($sql1);*/	
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $_SESSION['usuario'];?></title>
		<link rel="shortcut icon" href="images/icono.png">	
        <link rel="stylesheet" type="text/css" href="css/chat.css">
		<script src="js/funciones.js"></script>
    	<script src="js/estadoUsuario.js"></script>        
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">

    </head>
	<body>
	<?php include_once("menu.php") ?>

		<!-- slider de fotos -->
		<div id="page">
			<div id="content-other">
			<div>					
				<p class="text-right text-capitalize">bienvenido: <strong><?php echo $_SESSION['nombre']; ?></strong></p>
			</div>
			<h2 id="otro" align="center">Chat Interno</h2>
		<div >       	
            	<?php
                	require_once("header/header.php");
				?>
            <div class="espacioUsuario centrarDiv borde-5 borderBox">
        		<?php
					require_once('funciones/funciones.php');
					if(isset($_POST['confirmarSolicitud'])){
						$id=limpiar($con,$_POST['id']);
						$fecha=date("Y/m/d H:i:s");
						$sql="select * from contactos where usuario=$_SESSION[id] and contacto=$id	";
						$error="<div class='error'>Error al verificar el contacto</div>";
						$contactos=consulta($con,$sql,$error);
						$numContactos=mysqli_num_rows($contactos);
						if($numContactos==0){
							$sql="insert into contactos (usuario,contacto,fecha) values ($_SESSION[id],$id,'$fecha')";
							$error="<div class='error'>Error al registrar el contacto</div>";
							$registrar=consulta($con,$sql,$error);
							if(!$registrar){
								echo"<div class='error'>Error al registrar el usuario</div>";
							}else{
								$sql="delete from solicitudes where usuario=$id and solicitud=$_SESSION[id]";
								$error="<div class='error'>Error al verificar el contacto</div>";
								$contactos=consulta($con,$sql,$error);
								echo"<span class='label label-success'>Contacto agregado correctamente</span> </br>";
							}
						}else{
							echo"<span class='label label-danger'>Contacto ya registrado</span> </br>";
						}
					}//confimar solicitud
					$sql="select * from contactos where usuario=$_SESSION[id] or contacto=$_SESSION[id]";
					$error="<div class='error'>Error al seleccionar las solicitudes</div>";
					$contactos=consulta($con,$sql,$error);
					$numContactos=mysqli_num_rows($contactos);
				?>
				<table >
					<tr>
						<td style="width: 520px" class="noContactos alinear-horizontal borde-5 borderBox"><center>				
                <div >
                	<a href='contactos.php'>Contactos:<?php echo $numContactos;?></a>
            	</div>
				<div class="noSolicitudes alinear-horizontal borde-5 borderBox">
				<?php
					$sql="select usuarios.id as usuariosId, usuarios.usuario as usuario, solicitudes.id as solicitudesId, solicitudes.usuario as solicitudesUsuario from solicitudes inner join usuarios on solicitudes.usuario=usuarios.id where solicitud='$_SESSION[id]'";
					$error="<div class='error'>Error al seleccionar las solicitudes</div>";
					$solicitudes=consulta($con,$sql,$error);
					$numSolicitudes=mysqli_num_rows($solicitudes);
					if($numSolicitudes>0){
						$fondo='fondoVerde-1';
					}else{
						$fondo='';
					}
					echo '</td>
						<td style="width: 520px" class="formConfirmar borde-5"><center>
					<div class="divSolicitudes alinear-horizontal "> Solicitudes: '.$numSolicitudes.'</div>';
					if($numSolicitudes>0){
						echo 'Estos usuarios te enviaron solicitud:<br>';
					}
					while($solicitud=mysqli_fetch_assoc($solicitudes)){
						echo  '<form action="'.$_SERVER['PHP_SELF'].'" method="post" name="formConfirmar" id="formConfirmar" ><input type="hidden" name="id" value="'.$solicitud['solicitudesUsuario'].'"><div class="labelFormConfirmar  alinear-horizontal"><label>'.$solicitud['usuario'],'</label></div><div class="botonFormConfirmar alinear-horizontal"><input type="submit" name="confirmarSolicitud" id="confirmarSolicitud" value="Confirmar" class="btn btn-primary"></div></form>';
					}
				?>
				</td>
					</tr>
				</table>
                </div><!--noSolicitudes-->
            </div><!--espacioUsuario-->
        </div><!--contenedorPrincipal-->

                </div>
            </div>
        </div>

        <!--Pie de página-->
        <?php include_once("footer.php") ?>

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/main.js"></script>
	</body>
</html>
