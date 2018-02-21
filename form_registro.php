
<?php

$con=mysql_connect("localhost","root","");
mysql_select_db("integrador",$con);

if (isset($_POST["btnguardar"])) 
{
        $empleado_nombre        =  $_POST["nombre_empleado"];
        $usuarios               = $_POST["usuario_empleado"];
        $correo                 = $_POST["correo"];
        $contrasena             = $_POST["contrasena_empleado"];
        $rcontrasena            = $_POST["contrasena_empleado2"];
        date_default_timezone_set('America/Bogota');
        $Fecha = date('Y-m-d H:i');

    $rSQLCampov = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuarios' or correo= '$correo'");
    if(mysql_num_rows($rSQLCampov) > 0)
    {        
        echo '<div class="alert alert-warning alert-dismissable">
                <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Alerta no se registro este Usuario </b> Ya Existe...';
        echo '</div>';
    }
    else if(mysql_query("INSERT INTO usuarios VALUES ('', upper('$empleado_nombre'), '$usuarios', md5('$contrasena'), '2', '$correo',0,0,'1')"))
    {        
        echo '<div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Usuario Registrado </b> Exitosamente';
        echo '   </div>';
    } 
    else
    {
        echo '<div class="alert alert-warning alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Alerta Else</b> Ya Existe... ';
        echo '   </div>';die(print_r(mysql_error(),true));
    }
}

?>

<?php
	include_once('conn.php');	
?>

<!--validacion numeros-->
<script type="text/javascript"> function controltag(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        else if (tecla==0||tecla==9)  return true;
       // patron =/[0-9\s]/;// -> solo letras
        patron =/[0-9\s]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }
</script>
<!--validacion letras-->
<script type="text/javascript">
function validar(e) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[A-Za-z\s]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
}
</script>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Registro Usuario</title>
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
        
        <?php include_once("menu2.html") ?>
	       
        <!-- slider de fotos -->
	    <div id="page">
		    <div id="content-other">
                <h3 id="otro" align="center">Registro Usuario</h3>
                <hr>
			    <div class="datagrid">
				    <form method='post' class="form-horizontal form-label-left" action="" enctype="multipart/form-data">
                        <span class="section">
						    <?php
						        if (isset($msg["alerta"])) { ?>
						            <label class="alerta"><?php echo $msg["alerta"];?></label>
						            <?php unset($msg["alerta"]);
						        } ?>
						</span>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_empleado">Nombre Completo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nombre_empleado" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" data-validate-words="1" name="nombre_empleado" placeholder="Escriba su Nombre y Apellido" title="Escriba su Nombre y Apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,} [a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]{2,}"  onkeypress="return validar(event)" required="required" type="text">
                            </div>
                        </div>
										
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apaterno_empleado">Usuario <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="usuario_empleado" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" data-validate-words="1" name="usuario_empleado" placeholder="Escriba su Nombre de Usuario" title="Escriba su Nombre de Usuario" placeholder="" required="required" type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amaterno_empleado">Contraseña <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="contrasena_empleado"  title="minimo 6 caracteres" pattern=".{6,}" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" placeholder="Escriba su Contraseña" title="Escriba su Contraseña" name="contrasena_empleado" placeholder="" required="required" type="password">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amaterno_empleado">Repite Contraseña <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="contrasena_empleado2" pattern=".{6,}" title="minimo 6 caracteres" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" placeholder="Repita su Contraseña" title="Repita su Contraseña" name="contrasena_empleado2" placeholder="" required="required" type="password">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apaterno_empleado">Correo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="correo" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" data-validate-words="1" pattern="^[a-zA-Z0-9.!#$%'*+/=?^_`-]+@[
                                a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="Escriba su Correo Electrónico" title="Escriba su Correo Electrónico" name="correo" placeholder="" required="required" type="text">
                            </div>
                        </div>
                                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <!--<button type="submit" class="btn btn-primary">Cancelar</button>-->
                                <center>
                                <button id="send" type="submit" name="btnguardar" class="btn btn-success">Guardar</button>
                                <a href="rusuarios.php" class="btn btn-danger">Cancelar</a>
                                </center>
                            </div>
                        </div>
                    </form>
		        </div>
	        </div>
        </div>

        <?php include_once("footer.php") ?>

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
