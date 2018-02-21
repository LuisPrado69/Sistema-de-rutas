<?php
  include_once("conn.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  	<meta name="keywords" content="" />
  	<meta name="description" content="" />
  	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- titulo de la pestaña -->
  	<title>Clima</title>
    <link rel="shortcut icon" href="images/icono.png">
    <!-- scripots y csss -->
  	<link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
  	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
  	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  	<script type="text/javascript" src="jquery.slidertron-1.0.js"></script>
  </head>
<!-- CUERPO DE LA PAGINA -->
<body>
<!-- div principal de toda la pagina -->
<div id="wrapper">
	<!-- cabecera de la pagina -->
	<?php include_once("menu2.html") ?>

	<!-- slider de fotos -->
	<div id="page">
		<div id="content-other">
			<h3 id="otro"align="center">Clima </h3>
      <hr><center>
			<!-- www.tutiempo.net - Ancho:488px - Alto:165px -->
<div id="TT_FeC1EE1Ekdf92pwATfzjDDjjj3aATf22rYkdksi5KEzImIGIG">El tiempo - Tutiempo.net</div>
<script type="text/javascript" src="https://www.tutiempo.net/s-widget/l_FeC1EE1Ekdf92pwATfzjDDjjj3aATf22rYkdksi5KEzImIGIG"></script>
    </div>
  </div>

    <!-- pie de pagina -->
    <!--Pie de pagina-->
    <?php include_once("footer.php") ?>
    <!-- FIN DEL PIE -->
  </body>
</html>
