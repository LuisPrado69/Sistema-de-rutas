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
?>

<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/main.css">
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script> 

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;key=AIzaSyAcDXCVTJK6_0ml5AbsVbEnQjSmXrhn6sg">
    </script>
    <script type="text/javascript">
  var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;
  var origin = null;
  var destination = null;
  var waypoints = [];
  var markers = [];
  var directionsVisible = false;

  function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    var chicago = new google.maps.LatLng(-0.2298500, -78.5249500);
    var myOptions = {
      zoom:15,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: chicago
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("directionsPanel"));

    google.maps.event.addListener(map, 'click', function(event) {
      if (origin == null) {
        origin = event.latLng;
        addMarker(origin);
      } else if (destination == null) {
        destination = event.latLng;
        addMarker(destination);
      } else {
        if (waypoints.length < 5) {
          waypoints.push({ location: destination, stopover: true });
          destination = event.latLng;
          addMarker(destination);
        } else {
          alert("Numero Maximo de marcadores");
        }
      }
    });
  }

  function addMarker(latlng) {
    markers.push(new google.maps.Marker({
      position: latlng,
      map: map,
      icon: "http://maps.google.com/mapfiles/marker" + String.fromCharCode(markers.length + 65) + ".png"
    }));
  }

  function calcRoute() {
    if (origin == null) {
      alert("Click on the map to add a start point");
      return;
    }

    if (destination == null) {
      alert("Click on the map to add an end point");
      return;
    }

    var mode;
    switch (document.getElementById("mode").value) {
      case "bicycling":
        mode = google.maps.DirectionsTravelMode.TRANSIT;
        break;
      case "driving":
        mode = google.maps.DirectionsTravelMode.DRIVING;
        break;
      case "walking":
        mode = google.maps.DirectionsTravelMode.WALKING;
        break;
    }

    var request = {
        origin: origin,
        destination: destination,
        waypoints: waypoints,
        travelMode: mode,
        optimizeWaypoints: document.getElementById('optimize').checked,
        avoidHighways: document.getElementById('highways').checked,
        avoidTolls: document.getElementById('tolls').checked
    };

    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      }
    });

    clearMarkers();
    directionsVisible = true;
  }

  function updateMode() {
    if (directionsVisible) {
      calcRoute();
    }
  }

  function clearMarkers() {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(null);
    }
  }

  function clearWaypoints() {
    markers = [];
    origin = null;
    destination = null;
    waypoints = [];
    directionsVisible = false;
  }

  function reset() {
    clearMarkers();
    clearWaypoints();
    directionsDisplay.setMap(null);
    directionsDisplay.setPanel(null);
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById("directionsPanel"));
  }
    </script>
</head>
<body onload="initialize()" style="font-family: sans-serif;">

    <?php include_once("menu.php") ?>
         
        <!-- slider de fotos -->
      <div id="page">
        <div id="content-other">
                <h3 id="otro" align="center">Alta Roles</h3>
                <hr>
          <div class="datagrid">
            <form method='post' class="form-horizontal form-label-left" action="bddatos/AltaRolesBD.php" enctype="multipart/form-data">
                        <span class="section">
                <?php
                    if (isset($_SESSION["alerta"])) { ?>
                        <label class="alerta"><?php echo $_SESSION["alerta"];?></label>
                        <?php unset($_SESSION["alerta"]);
                    } ?>
            </span>
    <table style="width: 600px;" >
        <tr>
            <td><input type="checkbox" id="optimize" checked />Optimizado</td>
            <td>Tipo de Viaje:
                <select id="mode" onchange="updateMode()">
                    <option value="bicycling">Transito</option>
                    <option value="driving">Manejando</option>
                    <option value="walking">Caminando</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="checkbox" id="highways" checked />Evitar Autopistas</td>
            <td><input type="button" value="Reiniciar" onclick="reset()" /></td>
        </tr>
        <tr>
            <td><input type="checkbox" id="tolls" checked />Evitar Peajes</td>
            <td><input type="button" value="Buscar Ruta" onclick="calcRoute()" /></td>
            <td></td>
        </tr>
    </table>
    <div style="position:relative; border: 1px; width: 600px; height: 600px;">
        <div id="map_canvas" style="border: 1px solid black; position:absolute; width:698px; height:548px"></div>
        <div id="directionsPanel" style="position:absolute; left: 710px; width:400px; height:548px; overflow: auto"></div>
    </div>
</body>
</html>