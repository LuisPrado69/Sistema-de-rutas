<?php
	session_start();
    if((!isset($_SESSION["nombre"]) && !isset($_SESSION["privilegio"])) OR ($_SESSION["privilegio"] == 2) ){        
        header("Location: sesion.php");
    }
	include_once('conn.php');	
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
        <title>Agregar Usuarios</title>
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
                <h3 id="otro" align="center">Alta Usuarios</h3>
                <hr>
			    <div class="datagrid">
				    <form method='post' class="form-horizontal form-label-left" action="bddatos/AltaUsuariosBD.php" enctype="multipart/form-data">
                        <span class="section">
						    <?php
						        if (isset($_SESSION["alerta"])) { ?>
						            <label class="alerta"><?php echo $_SESSION["alerta"];?></label>
						            <?php unset($_SESSION["alerta"]);
						        } ?>
						</span>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_empleado">Nombre Completo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nombre_empleado" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" data-validate-words="1" name="nombre_empleado" placeholder="" required="required" type="text">
                            </div>
                        </div>
										
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apaterno_empleado">Usuario <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="usuario_empleado" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" data-validate-words="1" name="usuario_empleado" placeholder="" required="required" type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amaterno_empleado">Contraseña <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input pattern=".{6,}" title="minimo 6 caracteres" id="contrasena_empleado" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" name="contrasena_empleado" placeholder="" required="required" type="password">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amaterno_empleado">Repite Contraseña <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input pattern=".{6,}" title="minimo 6 caracteres" id="contrasena_empleado2" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" name="contrasena_empleado2" placeholder="" required="required" type="password">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apaterno_empleado">Correo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input pattern="^[a-zA-Z0-9.!#$%'*+/=?^_`-]+@[
                                a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="correo" class="form-control col-md-7 col-xs-12" data-validate-length-range="5" data-validate-words="1" name="correo" placeholder="" required="required" type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amaterno_empleado">Privilegio <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="privilegio" id="privilegio" class="form-control">
                                    <option value="0">Selecciona un Privilegio</option>
                                    <?php
                                        $rSQL = mysql_query("SELECT id, descripccion FROM roles where estado=1");
                                        if (mysql_num_rows($rSQL) > 0) {
                                            while($filaEquipo = mysql_fetch_array($rSQL)){ ?>
                                                <option value="<?php echo $filaEquipo["id"] ?>"><?php echo $filaEquipo["descripccion"] ?></option>
                                            <?php }
                                        }
                                        else{ ?>
                                            <option value="0">No hay Privilegio</option>
                                        <?php }
                                    ?>

                                </select>                                
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amaterno_empleado">Estado <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="estado" id="estado" class="form-control">
                                    <option value="0">Selecciona un Estado</option>
                                    <?php
                                        $rSQL = mysql_query("SELECT id, descripccion FROM estado");
                                        if (mysql_num_rows($rSQL) > 0) {
                                            while($filaEquipo = mysql_fetch_array($rSQL)){ ?>
                                                <option value="<?php echo $filaEquipo["id"] ?>"><?php echo $filaEquipo["descripccion"] ?></option>
                                            <?php }
                                        }
                                        else{ ?>
                                            <option value="0">No hay Estado</option>
                                        <?php }
                                    ?>

                                </select>                                
                            </div>
                        </div>
                                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <!--<button type="submit" class="btn btn-primary">Cancelar</button>-->
                                <center>
                                <button id="send" type="submit" class="btn btn-success">Guardar</button>
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
