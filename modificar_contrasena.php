<script>
window.onload = function(){killerSession();}
function killerSession()
{
	setTimeout("window.open('cerrarSesion.php','_top');",300000);
}
</script>
<?php
	session_start();	
	if((!isset($_SESSION["nombre"]) && !isset($_SESSION["privilegio"])) OR ($_SESSION["privilegio"] == 2) ){        
        header("Location: sesion.php");
	}
	include_once('conn.php');
	
	if(!isset($_GET["id"]))
		header("Location: rusuarios.php");
	else
	$id=base64_decode($_GET["id"]);
	$eamq=mysql_query("select * from usuarios where id=$id");
	if (mysql_num_rows($eamq)>0)
		$eamf=mysql_fetch_assoc($eamq);
	else
		header("Location: rusuarios.php");	
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Cambio Contraseña</title>
        <link rel="shortcut icon" href="images/icono.png">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/main.css">
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <?php include_once("menu.php") ?>


		<!-- slider de fotos -->
		<div id="page">
			<div id="content-other">
				<div class="datagrid">
					<h2 class="text-center text-capitalize">Modificar Contraseña</h2>
					<hr>
					<form method='post' class="form-horizontal form-label-left" action="bddatos/ModificaContrasenaBD.php" enctype="multipart/form-data">

	                    <span class="section">
							<?php
								if (isset($_SESSION["alerta"])) { ?>
									<label class="alerta"><?php echo $_SESSION["alerta"];?></label>
									<?php unset($_SESSION["alerta"]);
								}
							?>
						</span>

						<div class="item form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_empleado">Contraseña <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                            <input pattern=".{6,}" title="minimo 6 caracteres" id="contrasena_empleado" class="form-control col-md-7 col-xs-12" name="contrasena_empleado" required="required" type="password">
	                        </div>
	                    </div>

	                    <div class="item form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_empleado">Repite Contraseña <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                            <input pattern=".{6,}" title="minimo 6 caracteres" id="contrasena_empleado2" class="form-control col-md-7 col-xs-12" name="contrasena_empleado2" required="required" type="password">
	                        </div>
	                    </div>			

						<input type="hidden" value="<?php echo $id ?>" id="id_empleado" name="id_empleado">
		
	                                        
	                    <div class="form-group">
	                        <div class="col-md-6 col-md-offset-3">
							<center>
	                            <button id="send" type="submit" class="btn btn-success">Modificar</button>
	                            <a href="rusuarios.php" class="btn btn-danger">Cancelar</a>
	                        </center>
	                        </div>
	                    </div>
	                </form>	
				</div>
            </div>
        </div>

      	<div id="footer">
		  <p>2016. All rights reserved. Design by <a href="http://detecsa-consultores.com" rel="nofollow">DETECSA</a>.</p>
		</div>

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
