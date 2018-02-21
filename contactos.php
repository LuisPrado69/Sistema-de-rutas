<script>
window.onload = function(){killerSession();}
function killerSession()
{
	setTimeout("window.open('cerrarSesion.php','_top');",300000);
}
</script>
<?php
	session_start();
	if((!isset($_SESSION["nombre"]) ) ){		
		header("Location: sesion.php");
	}
	include_once('conn.php');
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contactos</title>   
		<link rel="shortcut icon" href="images/icono.png">     
		<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/chat.css">
		<script src="js/funciones.js"></script>
    	<script src="js/estadoUsuario.js"></script>
        <script src="js/estadoContacto.js"></script>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
	<body>
	<?php include_once("menu.php") ?>

		<!-- slider de fotos -->
		<div id="page">
			<div id="content-other">
			<div>					
				<p class="text-right text-capitalize">bienvenido: <strong><?php echo $_SESSION['nombre']; ?></strong></p>
			</div>
			<h2 id="otro" align="center">Contactos Activos</h2>
    	<div class="contenedorPrincipal">
            	<?php
            		require_once("header/header.php");
				?>
				<div class="contenedorTablaResultados centrarDiv">
                	<table class="table table-hover" >
                    	<tr>
                    		<th style="width: 200px" class="table"></th>
                    		<th colspan="2" style="width: 400px" bgcolor="#3ED850"><center>Contactos Activos:</center></th>
                    		<th style="width: 200px" class="table"></th>
                    	</tr>
			<?php
				require_once('funciones/funciones.php');
				require_once('funciones/conexion.php');
            	$numContactos1=0;
				$numContactos2=0;
				$sql1="select contacto,contactos.usuario as contactosUsuario, usuarios.id as usuarioId, usuarios.usuario as usuario, online from contactos inner join usuarios on usuarios.id=contactos.contacto where contactos.usuario=$_SESSION[id] and online=1";
				$error1="<div class='error'>Error al seleccionar los contactos</div>";		
				$contactos1=consulta($con,$sql1,$error1);
				$numContactos1=mysqli_num_rows($contactos1);
				if($numContactos1!=0){
					while($contacto1=mysqli_fetch_assoc($contactos1)){
						if($contacto1['online']==1){
							$fondo='fondoVerde-1';
						}else{
							$fondo='fondo-rojo';
						}
						echo"<tr>
								<td><a href='chat.php?id=$contacto1[usuarioId]'>$contacto1[usuario]</a>
								</td>
								<td>
									<div class='actividadContacto alinear-horizontal $fondo $contacto1[usuarioId]' id='actividad'>
									</div>
								</td>
							</tr>";
					}
				}
				$sql2="select contacto,contactos.usuario as contactosUsuario, usuarios.id as usuarioId, usuarios.usuario as usuario,online from contactos inner join usuarios on usuarios.id=contactos.usuario where contacto=$_SESSION[id] and online=1";
				$error2="<div class='error'>Error al seleccionar los contactos</div>";
				$contactos2=consulta($con,$sql2,$error2);
				$numContactos2=mysqli_num_rows($contactos2);
				if($numContactos2!=0){
					while($contacto2=mysqli_fetch_assoc($contactos2)){
						if($contacto2['online']==1){
							$fondo='fondoVerde-1';
						}else{
							$fondo='fondo-rojo';
						}
						echo"<tr>
								<td style='width: 400px' class='table'></td>
								<td style='width: 375px'><center>
									<a href='chat.php?id=$contacto2[usuarioId]'>$contacto2[usuario]</a>
								</td>
								<td style='width: 25px' ><center>
									<div class='actividadContacto alinear-horizontal $fondo $contacto2[usuarioId]' id='actividad'></div>
								</td>
								<td style='width: 400px' class='table'></td>
							</tr>";
					}
				}
				$_SESSION['numContactos2']=$numContactos2;
				$_SESSION['preguntar']=true;
				if($numContactos1==0 && $numContactos2==0){
					echo"<center><div class='mensajeAviso'>Ningun contacto Activo</div></center>";	
				}
			?>
            	</table>
        	</div><!--tablaResultados-->
        </div>
                </div>
            </div>
        </div>

        <!--Pie de página-->
        <?php include_once("footer.php") ?>

    </body>
</html>

