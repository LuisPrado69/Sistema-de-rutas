<script>
window.onload = killerSession();
function killerSession()
{
	setTimeout("window.open('sesion.php','_top');",30000);
}
</script>


<!doctype html>

<html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bloqueo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body onload="inicio();">
      <!--[if lt IE 8]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <div id="page">
        <div id="content-other"><center>
          <h3 class="text-center text-capitalize">Sesion Bloqueada</h3>  
          </center>
          <hr>
    <div class="row">
		<center>Sesion bloqueada por 3 minutos...<br/><br/>
		<img style="float: center; margin: 20px" src="images/images/uno.gif" /></center>
	</div>
	<div class="row">
		<center>Tiempo :<br/><br/>
	</div>
	<div id="contenedor">

		<div class="reloj" id="Horas">00</div>
		<div class="reloj" id="Minutos">:00</div>
		<div class="reloj" id="Segundos">:00</div>
		<div class="reloj" id="Centesimas">:00</div>

		<!-- <input type="button"  class="boton" id="inicio" value="Start &#9658;" ">
		<input type="button" class="boton" id="parar" value="Stop &#8718;" onclick="parar();" disabled>
		<input type="button" class="boton" id="continuar" value="Resume &#8634;" onclick="inicio();" disabled>
		<input type="button" class="boton" id="reinicio" value="Reset &#8635;" onclick="reinicio();" disabled> -->
	</div>
  </div>
      </div>

              <?php include_once("footer.php") ?>      

      <script src="js/vendor/jquery-1.11.2.min.js"></script>
      <script src="js/main.js"></script>
    </body>
</html>

<style>
*{
	margin: 0;
	padding: 0;
}
#contenedor{
	margin: 10px auto;
	width: 540px;
	height: 115px;
}
.reloj{
	float: left;
	font-size: 80px;
	font-family: Courier,sans-serif;
	color: #363431;
}
.boton{
	outline: none;
	border: 1px solid #363431;
	color: white;
	width: 128px;
	height: 30px;
	text-shadow: 0px -1px 1px black;
	font-size: 20px;
	border-radius: 5px;
	font-family: Helvetica;
	cursor: pointer;
	background-image: linear-gradient(#3aad02,#2c6f05);
}
.boton:active{
	background-image: linear-gradient(#2c6f05,#3aad02);
}
.boton:hover{
	box-shadow: 0px 0px 14px #3aad02;
}
</style>

<script>
var centesimas = 0;
var segundos = 0;
var minutos = 0;
var horas = 0;
function inicio () {
	control = setInterval(cronometro,10);
	document.getElementById("inicio").disabled = true;
	document.getElementById("parar").disabled = false;
	document.getElementById("continuar").disabled = true;
	document.getElementById("reinicio").disabled = false;
}
function parar () {
	clearInterval(control);
	document.getElementById("parar").disabled = true;
	document.getElementById("continuar").disabled = false;
}
function reinicio () {
	clearInterval(control);
	centesimas = 0;
	segundos = 0;
	minutos = 0;
	horas = 0;
	Centesimas.innerHTML = ":00";
	Segundos.innerHTML = ":00";
	Minutos.innerHTML = ":00";
	Horas.innerHTML = "00";
	document.getElementById("inicio").disabled = false;
	document.getElementById("parar").disabled = true;
	document.getElementById("continuar").disabled = true;
	document.getElementById("reinicio").disabled = true;
}
function cronometro () {
	if (centesimas < 99) {
		centesimas++;
		if (centesimas < 10) { centesimas = "0"+centesimas }
		Centesimas.innerHTML = ":"+centesimas;
	}
	if (centesimas == 99) {
		centesimas = -1;
	}
	if (centesimas == 0) {
		segundos ++;
		if (segundos < 10) { segundos = "0"+segundos }
		Segundos.innerHTML = ":"+segundos;
	}
	if (segundos == 59) {
		segundos = -1;
	}
	if ( (centesimas == 0)&&(segundos == 0) ) {
		minutos++;
		if (minutos < 10) { minutos = "0"+minutos }
		Minutos.innerHTML = ":"+minutos;
	}
	if (minutos == 59) {
		minutos = -1;
	}
	if ( (centesimas == 0)&&(segundos == 0)&&(minutos == 0) ) {
		horas ++;
		if (horas < 10) { horas = "0"+horas }
		Horas.innerHTML = horas;
	}
}
</script>