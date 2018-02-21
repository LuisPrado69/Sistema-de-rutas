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
        <title>Control Usuarios</title>
        <link rel="shortcut icon" href="images/icono.png">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/main.css">
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

		<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <link type="text/css" href="css/jquery.dataTables_themeroller.css" rel="stylesheet"/>

        <script>			
			function opciones(val)
			{
				var opcion=document.getElementById("opciones"+val).value;
				if(opcion==1)
				{
					window.location= "muestra_control.php?id="+val;
				}
				//window.location= "d_productos.php?b="+document.getElementById(val).value;		
			}
		</script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <?php include_once("menu.php") ?>

		<!-- slider de fotos -->
		<div id="page">
			<div id="content-other">
			<div>					
				<p class="text-right text-capitalize">bienvenido: <strong><?php echo $_SESSION['nombre']; ?></strong></p>
			</div>
			<h2 id="otro" align="center">Control Usuarios</h2>
				<div class="text-right">
					<a href="Pdf/reporte_control.php" class="btn btn-warning" target="_blank">Reporte Control</a>
				</div>	
				<?php
					if (isset($_SESSION["alerta"])) { ?>
						<label class="alerta"><?php echo $_SESSION["alerta"];?></label>
						<?php unset($_SESSION["alerta"]);
					}
				?>
				<div class="datagrid"><br>
						<table class="table table-bordered table-striped" id="example1">
			                <thead>
			                    <tr class="headings">                        
			                        <th class="column-title">Usuario </th>
			                        <th class="column-title">Sentencia </th>
			                        <th class="column-title">Tabla </th>
			                        <th class="column-title">Datos </th>
			                        <th class="column-title">Fecha </th>
			                        <th class="column-title no-link last"><span class="nobr">Acciones</span></th>
								</tr>
							</thead>

			                <tbody>
								<?php									
									$productosq=mysql_query("select * from sentencias");								
									if(mysql_num_rows($productosq)>0)
										while($productosf=mysql_fetch_assoc($productosq)) { ?>
			                    			<tr>
			                        			<td><?php echo get_campo("nombre", "usuarios", "id", $productosf['usuario']) ?></td>
			                        			<td class=" "><?php echo $productosf['sentencia'];?></td>
			                        			<td class=" "><?php echo $productosf['tabla'];?></td>
			                        			<td class=" "><?php echo $productosf['datos'];?></td>
			                        			<td class=" "><?php echo $productosf['fecha'];?></td>	                        
												<td>
													<select class="form-control" onchange="opciones(<?php echo $productosf['id'];?>)" id="opciones<?php echo $productosf['id'];?>">
														<option value="">Selecciona...</option>
														<option value="1">Ver</option>
													</select>
												</td>
			                    			</tr>									
									<?php }
									else { ?>
			                            <tr>
											<td colspan="4" class="text-center">No hay Controles registrados.</td>
										</tr>	
									<?php } 
								?>
							</tbody>			
						</table>
				</div>
			</div>
		</div>

	  	<!--Pie de página-->
	  	<?php include_once("footer.php") ?>

	  	<script type="text/javascript">
            $("#example1").dataTable(
            {
                "oLanguage": 
                {
                    "sSearch": "Filtrar Datos:",
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Mostrando _START_ a _END_ de entradas _TOTAL_",
                    "oPaginate": 
                    {
                        "sNext": "",
                        "sPrevious": ""
                    }
                }
             } );   
        </script>

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
