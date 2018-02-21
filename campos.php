<?php
	include_once("conn.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="https://developers.google.com/maps/web/"></script>
		<script type="text/javascript" src="https://maps.google.com/maps/api/js"></script> 


		
		<!-- titulo de la pestaña -->
		<title>Hora</title>
		<link rel="shortcut icon" href="images/icono.png">
		<!-- scripots y csss -->
		<link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
		<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
	<!-- CUERPO DE LA PAGINA -->
	<body onload="mostrarGoogleMaps()" >
		<!-- div principal de toda la pagina -->

		<?php include_once("menu2.html") ?>

		<!-- slider de fotos -->
		<div id="page">
			<div id="content-other"><center>
				<h3 class="text-center text-capitalize">campos </h3>
				<hr>

				<div style="text-align:center;width:400px;padding:1em 0;"> <h2><a style="text-decoration:none;" href="http://www.zeitverschiebung.net/es/city/3652462"><span style="color:gray;">Hora actual en</span><br />Quito, Ecuador</a></h2> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&timezone=America%2FGuayaquil" width="100%" height="150" frameborder="0" seamless></iframe> <small style="color:gray;">&copy; <a href="http://www.zeitverschiebung.net/es/" style="color: gray;">Diferencia horaria</a></small> </div>

			</div>
		</div>

		<!-- pie de pagina -->
		<?php include_once("footer.php") ?>
		<!-- FIN DEL PIE -->
	</body>
</html>