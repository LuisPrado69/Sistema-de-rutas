<script>
window.onload = function(){killerSession();}
function killerSession()
{
  setTimeout("window.open('cerrarSesion.php','_top');",300000);
}
</script>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('conexion.php');
?>
<?php
  session_start();
    if((!isset($_SESSION["nombre"]) ) ){        
        header("Location: sesion.php");
    }
  include_once('conn.php'); 
?>
<link href="styles.css" rel="stylesheet">
<!-- Se determina y escribe la localizacion -->
<center>
<div id='ubicacion'></div>
<script type="text/javascript">
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(mostrarUbicacion);
	} else {alert("¡Error! Este navegador no soporta la Geolocalización.");}
function mostrarUbicacion(position) {
  var times = position.timestamp;
  document.formulario_01.tim.value = times; 
	var latitud = position.coords.latitude;
  document.formulario_01.lat.value = latitud; 
	var longitud = position.coords.longitude;
  document.formulario_01.lon.value = longitud; 
  document.formulario_01.lati.value = latitud;
  document.formulario_01.loni.value = longitud; 
  var altitud = position.coords.altitude;	
	var exactitud = position.coords.accuracy;	
	var div = document.getElementById("ubicacion");
}

function refrescarUbicacion() {	
	navigator.geolocation.watchPosition(mostrarUbicacion);}	
</script>

<!-- Se escribe un mapa con la localizacion anterior-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;key=AIzaSyAcDXCVTJK6_0ml5AbsVbEnQjSmXrhn6sg">
</script>
</center>
<script type="text/javascript">
var x=document.getElementById("demo");
function cargarmap(){
navigator.geolocation.getCurrentPosition(showPosition,showError);
function showPosition(position)
  {
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  latlon=new google.maps.LatLng(lat, lon)
  mapholder=document.getElementById('mapholder')
  mapholder.style.height='500px';
  mapholder.style.width='1000px';
  var myOptions={
  center:latlon,zoom:10,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
  }
function showError(error)
  {
  switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="La información de la localización no esta disponible."
      break;
    case error.TIMEOUT:
      x.innerHTML="El tiempo de petición ha expirado."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="Ha ocurrido un error desconocido."
      break;
    }
  }}

</script>

<?php 
$con=mysql_connect("localhost","root","Sistemas12.");
mysql_select_db("integrador",$con);

if (isset($_POST["btnguardar"])) 
{
  date_default_timezone_set('America/Bogota');
    $id_usu=$_SESSION['id'];
    $lat=$_POST["lat"];
    $lon=$_POST["lon"];
    echo "".$lat;
    $Fecha = date('Y-m-d H:i');
    if (mysql_query("insert into puntos (IdPunto,cx,cy,id_usuario) values('','$lat','$lon','$id_usu')"))
    {
        
        $fecha = date('Y-m-d H:i');
        $sql1="INSERT into sentencias values ('','$_SESSION[id]','INSERT INTO','PUNTOS','$fecha','$lat,$lon')";
        $st1=mysql_query($sql1);

        $_SESSION["alerta"] = "Ubicación Registrada";
            header('Location: agregarUbicacion.php');
            exit();
    }
    else
          {
            $_SESSION["alerta"] = "Error al registar los datos";
          }  
    header('Location:agregarUbicacion.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registro Ubicación</title>
  <link rel="shortcut icon" href="images/icono.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/main.css">
  <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
  <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body onload="cargarmap()">
<?php 
include_once("menu.php");
require 'encriptar.php'; 
$id_usu=$_SESSION['id'];
?>
    <!-- slider de fotos -->
    <div id="page">
      <div id="content-other">
        <div>         
          <p class="text-right text-capitalize">bienvenido: <strong><?php echo $_SESSION['nombre']; ?></strong></p>
        </div>
      <h2 id="otro" align="center">Registro Ubicaciones</h2>
        <div class="text-right">
          <a href="Pdf/reporte_ubi_indv.php?id=<?php echo "".encoded($id_usu); ?>" class="btn btn-warning">Reporte Ubicaciones</a>
        </div>  
        <?php
          if (isset($_SESSION["alerta"])) { ?>
            <label class="alerta"><?php echo $_SESSION["alerta"];?></label>
            <?php unset($_SESSION["alerta"]);
          }
        ?>

<div id="demo"></div>
<div id="mapholder"></div>
<form action="" name="formulario_01" method="post">
  <center><table>
    <tr>
      <td > Timestamp: </td>
      <td><input type="text" name="tim" disabled ></td>
    </tr>
    <tr>
      <td>Latitud: </td>
     <input  type="text" name ="lat" style="display: none;" >
      <td><input disabled="disabled"  x-webkit-speech="true" type="text" name ="lati" ></td>
    </tr>
    <tr>
      <td>Longitud: </td>
      <input  type="text" name ="lon" style="display: none;" >
      <td><input disabled="disabled" x-webkit-speech="true" type="text" name ="loni" ></td>
    </tr>
    <tr>
      <td colspan="2">
      <center><input type="submit" name="btnguardar" value="Guardar" class="btn btn-success"></center>
      </td>
    </tr>
  </center></table>
</form>
</div>
      </div>
    </div>

      <!--Pie de página-->
      <?php include_once("footer.php") ?>
</body>
</html>