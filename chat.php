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
    
/*  date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d H:i');
    $sql1="Insert into sentencias values ('','$_SESSION[id]','SELECT * FROM','ESTADO','$fecha','')";
    $st1=mysql_query($sql1);*/  
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Chat</title>
        <link rel="shortcut icon" href="images/icono.png">
        <link rel="stylesheet" type="text/css" href="css/chat.css">
        <script src="js/funciones.js"></script>
        <script src="js/estadoConversacion.js"></script>
        <script src="js/chat.js"></script>
        <script src="js/estadoUsuario.js"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/main.css">
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
            <h2 id="otro" align="center">Sala de Chat</h2>
                <?php
                    if (isset($_SESSION["alerta"])) { ?>
                        <label class="alerta"><?php echo $_SESSION["alerta"];?></label>
                        <?php unset($_SESSION["alerta"]);
                    }
                ?>
    	<div class="contenedorPrincipal">
            	<?php
                	require_once("header/header.php");
					require_once('funciones/funciones.php');
					require_once('funciones/conexion.php');
				?>
                <br>
            <div class="btn btn-primary"><a href="contactos.php" style="color:white;">Contactos</a></div>
            
            <div class="contenedorMensajes alinear-horizontal borderBox centrarDiv">            
                <div id="mensajesAjax" class="centrarDiv mensajesAjax"></div>
            </div>
            <div class="contenedorChat borde-5" style="text-align:center;"  >
                <?php
					$id=limpiar($con,$_GET['id']);
                	$sql="select usuario from usuarios where id=$id";
					$error="<div class='error borde-5'>Error al mostrar el nombre del contacto</div>";
					$usuario=consulta($con,$sql,$error);
					$usuario=mysqli_fetch_assoc($usuario);
                	echo "<div class='centrarTexto'>Tiene una convensacion con: <strong>".$usuario['usuario'].'</strong></div>';
				?>
                <div  style="width:90%; text-align:center; height:300px; overflow:auto; margin:auto; margin-top:5%; border:solid 1px #7B7B7B; overflow-x:hidden; background-color:#4E4E4E;" id="conversacion">
                    <span id="src"></span>
                </div>
            	<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="formChat centrarDiv centrarTexto">
                <center>
                    <input style="text-align:center;" type="text" name="mensaje" id="mensaje" placeholder="Ingrese su mensaje aqui" class="mensaje">
                	<input type="submit" name="enviar" id="enviar" class="enviar" value="Enviar">
                    <input type="hidden" name="idContacto" id="idContacto" value="<?php $id=limpiar($con,$_GET['id']); echo $id;?>">
                </center>
                </form>
            </div>
            <div id="mensajesAjax2" class="centrarDiv alinear-horizontal mensajesAjax2"></div>
        </div>
    </div>
</div>
        <!--Pie de página-->
        <?php include_once("footer.php") ?>

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/main.js"></script>
	</body>
</html>