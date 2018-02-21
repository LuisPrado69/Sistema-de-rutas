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
		header("Location: rcontrol.php");
	else
		$id=$_GET["id"];
	$eamq=mysql_query("select * from sentencias where id=$id");
	if (mysql_num_rows($eamq)>0)
		$eamf=mysql_fetch_assoc($eamq);
	else
		header("Location: rcontrol.php");
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
        <title>Muestra Control</title>
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
            <p class="browserupgrade">You are using an outdated< browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <?php include_once("menu.php") ?>

		<!-- slider de fotos -->
		<div id="page">
            <div id="content-other">
                <div class="datagrid">
                    <div class="row">
                      <div class="col-md-6 col-md-offset-3">
                        <div class="thumbnail">
                          <h2 class="text-center text-capitalize">Usuario:<strong> <?php echo get_campo("nombre", "usuarios", "id", $eamf["usuario"]) ?> </strong></h2> 
                          <div class="caption">
                            <h2 class="text-center text-capitalize">Sentencia: <?php echo $eamf["sentencia"]," ",$eamf["tabla"]," ",$eamf["datos"] ?></h2> <br>
                            <h2 class="text-center text-capitalize">Fecha: <?php echo $eamf["fecha"] ?></h2>               
                          </div>
                        </div>
                        <center>
                            <a href="rcontrol.php" class="btn btn-danger">Cancelar</a>
                        </center>
                      </div>
                    </div>      
                </div>
            </div>
        </div>

      	<?php include_once("footer.php") ?>

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
