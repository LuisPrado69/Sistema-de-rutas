<!--bootstrap-->
<link rel="stylesheet" href="css/bootstrap.css">

<!--Font awesome-->
<link rel="stylesheet" href="style.css">


	<div id="logo">
		<h1 ><img src="images/icono.png" width="50" height="50">
		<a href="index.html">Sistema de optimizacion de rutas</a>
		</h1>
	</div>

	<ul id="menu">
		<?php
			if($_SESSION["privilegio"] == 2 OR $_SESSION["privilegio"] == 1){ ?>
			<li><a href="rnoticia.php">Noticias</a></li>
			<li><a href="rrutas.php">Rutas</a></li>
		    <li><a href="usuario.php">Chat</a>
			    <ul>
				    <li><a href="contactos.php">Contactos</a></li>
			    </ul>
		    </li>				
			<?php }
		?>
		<?php
			if($_SESSION["privilegio"] == 2 ){ ?>
			<li><a href="#">Perfil</a>
			    <ul>
				    <li><a href="rusuarion_indv.php">Usuario</a></li>
			    </ul>
			</li>
				<li><a href="agregarUbicacion.php">Ubicación</a></li>
			<?php }
		?>
		
		<?php
			if($_SESSION["privilegio"] == 1){?>
			<li><a href="#">Mantenimientos</a>
			    <ul>
			    	<li><a href="restado.php">Estado</a></li>
			    	<li><a href="rroles.php">Roles</a></li>
			    </ul>
		    </li>
		    <li><a href="#">Ubicación</a>
			    <ul>
				    <li><a href="agregarUbicacion.php">Registro</a></li>
				    <li><a href="mostrarUbicacion.php">Listado</a></li>
				    <li><a href="rrutas_total.php">Recorridos</a></li>
			    </ul>
		    </li>
		    <li><a href="#">Usuarios</a>
			    <ul>
				    <li><a href="rusuarios.php">Listado</a></li>
				    <li><a href="rcontrol.php">Control</a></li>
			    </ul>
			</li>
				
			<?php }
		?>
		<!-- <li><a href="#">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</a></li> -->
		<li><a href="cerrarSesion.php">Cerrar Sesion</a></li>
			
	</ul>
<!-- fin del menu -->