<script>
window.onload = function(){killerSession();}
function killerSession()
{
  setTimeout("window.open('cerrarSesion.php','_top');",300000);
}
</script>
<?php
  session_start();
    if (!isset($_SESSION["nombre"])) {
        header("Location: sesion.php");
    }
  include_once('conn.php');

  date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d H:i');
  $sql1="Insert into sentencias values ('','$_SESSION[id]','SELECT * FROM','PUNTOS','$fecha','')";
  $st1=mysql_query($sql1);

?>
<html lang="es">
<head>
  <title>Vista Ubicaciónes</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="images/icono.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/main.css">
  <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
  <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;key=AIzaSyAcDXCVTJK6_0ml5AbsVbEnQjSmXrhn6sg">
</script>
  <link href="styles.css" rel="stylesheet">
  <script type="text/javascript">
  function load() {
    var map = new google.maps.Map(document.getElementById("map"), {
      center: new google.maps.LatLng(-0.18065319999999999,-78.4678382),
      zoom: 12,
      mapTypeId: 'roadmap'
    });
    var infoWindow = new google.maps.InfoWindow;
    downloadUrl("markers.php", function(data) {
      var xml = data.responseXML;
      var markers = xml.documentElement.getElementsByTagName("marker");
      for (var i = 0; i < markers.length; i++) {
        var point = new google.maps.LatLng(
          parseFloat(markers[i].getAttribute("lat")),
          parseFloat(markers[i].getAttribute("lng")));
        var icon = 'marker.png';
        var marker = new google.maps.Marker({
          map: map,
          position: point,
          icon: icon
        });
      }
    });
  }
  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
    new ActiveXObject('Microsoft.XMLHTTP') :
    new XMLHttpRequest;
    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };
    request.open('GET', url, true);
    request.send(null);
  }
  function doNothing() {}
  </script>
</head>
  <body onload="load()">
  <?php include_once("menu.php") ?>

    <!-- slider de fotos -->
    <div id="page">
      <div id="content-other">
        <div>         
          <p class="text-right text-capitalize">bienvenido: <strong><?php echo $_SESSION['nombre']; ?></strong></p>
        </div>
      <h2 id="otro" align="center">Vista Ubicaciones</h2>
        <div class="text-right">
          <a href="Pdf/reporteUbicaciones.php" class="btn btn-warning" target="_blank">Reporte Ubicaciones</a>
        </div>  
        <?php
          if (isset($_SESSION["alerta"])) { ?>
            <label class="alerta"><?php echo $_SESSION["alerta"];?></label>
            <?php unset($_SESSION["alerta"]);
          }
        ?>
          <div id="map"></div>
            </div>
          </div>
        </div>

        <!--Pie de pagina-->
        <?php include_once("footer.php") ?>

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/main.js"></script>
  </body>
</html>