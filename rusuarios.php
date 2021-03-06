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

	date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d H:i');
	$sql1="Insert into sentencias values ('','$_SESSION[id]','SELECT * FROM','USUARIOS','$fecha','')";
	$st1=mysql_query($sql1);

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
        <title>Usuarios</title>
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
				val = window.btoa(val);				
				if (opcion==1)
				{
					window.location= "modificar_contrasena.php?id="+val;
				}
				else if (opcion==2)
				{
					window.location= "modificar_usuario.php?id="+val;
				}				
				else if (opcion==3)
				{
					window.open("Pdf/report_usu_ind.php?id="+val);
				}
			}
		</script>
    </head>
    <body>
        
        <?php include_once("menu.php") ?>

		<!-- Lista de Arbitros -->
		<div id="page">
			<div id="content-other">
				<div>					
					<p class="text-right text-capitalize">bienvenido: <strong><?php echo $_SESSION['nombre']; ?></strong></p>
				</div>
				<h2 id="otro" align="center">Lista Usuarios</h2>
				<div class="text-right">
				<a href="Pdf/reporte_usuarios.php" class="btn btn-warning" target="_blank">Reporte Usuarios</a>
					<a href="form_usuarios.php" class="btn btn-primary">Agregar usuario</a>
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
		                        <th class="column-title">Nombre </th>
		                        <th class="column-title">Usuario </th>
		                        <th class="column-title">Privilegio </th>
		                        <th class="column-title">Correo </th>
		                        <th class="column-title">Estado </th>
		                        <th class="column-title no-link last"><span class="nobr">Acciones</span></th>                        
							</tr>
						</thead>
                        <tbody>
							<?php
								$productosq=mysql_query("select * from usuarios");								
							
								if(mysql_num_rows($productosq)>0)
									while($productosf=mysql_fetch_assoc($productosq)) { ?>
                            			<tr>
                                			<td class=" "><?php echo $productosf['nombre']?></td>
                                			<td><?php echo $productosf['usuario'];?></td>
                                			<td><?php echo get_campo('descripccion', 'roles', 'id', $productosf['privilegio']);?></td>
                                			<td><?php echo $productosf['correo'] ?></td>
                                			<td><?php echo get_campo('descripccion', 'estado', 'id', $productosf['estado']);?></td>
                                			<td class=" last">
                                				<select class="form-control" onchange="opciones(<?php echo $productosf['id'];?>)" id="opciones<?php echo $productosf['id'];?>">
													<option value="">Selecciona...</option>
													<option value="1">Contraseña</option>
													<option value="2">Modificar</option>
													<option value="3">Reporte de Rutas</option>
												</select>
											</td>
										</tr>									
									<?php }
								else { ?>
	                                <tr>
										<td colspan="4" class="text-center">No hay Usuarios registrados.</td>
									</tr>	
								<?php } 
							?>          
                        </tbody>
					</table>
                </div>
			</div>
        </div>

      	<!--Pie de pagina-->
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
