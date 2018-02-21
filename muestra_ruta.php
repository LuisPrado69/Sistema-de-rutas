<?php
	session_start();
    if((!isset($_SESSION["nombre"]) && !isset($_SESSION["privilegio"])) OR ($_SESSION["privilegio"] == 2) ){        
        header("Location: sesion.php");
    }
	include_once('conn.php');
	if(!isset($_GET["id"]))
		header("Location: rrutas_total.php");
	else
	$id=$_GET["id"];
	$eamq=mysql_query("select * from ruta where id=$id");
	
    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d H:i');
    $sql1="INSERT into sentencias values ('','$_SESSION[id]','SELECT * FROM ','RUTA WHERE ID=','$fecha','$id')";
    $st1=mysql_query($sql1);

    if (mysql_num_rows($eamq)>0)
		$eamf=mysql_fetch_assoc($eamq);
	else
		header("Location: rrutas_total.php");
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
        <title>Muestra Ruta</title>
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
					<div class="row">
                      <div class="col-md-6 col-md-offset-3">
                      
                        <div class="thumbnail">
                        <h1 class="text-center text-capitalize"><strong>Usuario: <?php echo get_campo("nombre", "usuarios", "id", $eamf["id_usu"]) ?></strong></h1>
                          <div class="caption">
                            <h3 class="text-center text-capitalize">Origen: <strong><?php echo $eamf["origen"] ?></strong></h3>
                            <h3 class="text-center text-capitalize">Destino: <strong><?php echo $eamf["destino"] ?></strong></h3>
                            <p class="text-center text-capitalize">Fecha: <?php echo $eamf["fecha"] ?></p>                            
                          </div>
                        </div>
                        <center>
                <a href="rrutas_total.php" class="btn btn-danger">Cancelar</a>
            </center>
                      </div>
                    </div>		
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
