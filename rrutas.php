<?php
    session_start();
    if((!isset($_SESSION["nombre"]) )){        
        header("Location: sesion.php");
    }
    include_once('conn.php');   
?>
<!DOCTYPE html>
    <head>
        
        <title>Rutas</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="images/icono.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/main.css">
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
        
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <link type="text/css" href="css/jquery.dataTables_themeroller.css" rel="stylesheet"/>


        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;key=AIzaSyAcDXCVTJK6_0ml5AbsVbEnQjSmXrhn6sg">
    </script>
    <script>
         $(document).ready(function() {
            $('#tabla').dataTable();
         })
      </script>
    <script>
         $(document).ready(function() {
            $('#tabla').dataTable({
               bJQueryUI : true
            });
         })
      </script>
    <script>
        function dato(nombre,CY) {
            alert(nombre);
            var cx = document.getElementById("frominput");
            var cy = document.getElementById("toinput");
            cx.value=nombre;
            cy.value=CY;
        }
    </script>
    <style>
        #map-container, #side-container, #side-container li {
            float: left;
        }
        #map-container {
            width: 500px;
            height: 600px;
        }
        #side-container {
            border: 1px solid #bbb;
            margin-right: 5px;
            padding: 2px 4px;
            text-align: right;
            width: 260px;
        }
        #side-container ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
        #side-container li input {
                font-size: 0.85em;
                width: 210px;
            }
        #side-container .dir-label {
                font-weight: bold;
                padding-right: 3px;
                text-align: right;
                width: 40px;
            }
        #dir-container {
            height: 525px;
            overflow: auto;
            padding: 2px 4px 2px 0;
        }
        #dir-container table {
                font-size: 1em;
                width: 100%;
            }
        .auto-style1 {
            left: 600px;
            width: 500px;
            overflow: auto;
            height: 580px;
        }
        .auto-style2 {

        }
    </style>
     </head>
<body>

<?php include_once("menu.php") ?>
<div id="page">
            <div id="content-other">
            <h2 id="otro" align="center">Pantalla Rutas</h2>
            <div>                   
                    <p class="text-right text-capitalize">bienvenido: <strong><?php echo $_SESSION['nombre']; ?></strong></p>

                </div>
                        <span class="section">
                            <?php
                                if (isset($_SESSION["alerta"])) { ?>
                                    <label class="alerta"><?php echo $_SESSION["alerta"];?></label>
                                    <?php unset($_SESSION["alerta"]);
                            } ?>
                        </span>

<?php

date_default_timezone_set('America/Bogota');
 
/*echo date('d-m-Y H:i:s');*/


$con=mysql_connect("localhost","root","Sistemas12.");
mysql_select_db("integrador",$con);

if (isset($_POST["btnguardar"])) {
    $id_usu=$_SESSION['id'];
    $ori=$_POST["frominput"];
    $des=$_POST["toinput"];
    $Fecha = date('Y-m-d H:i');

    $rSQLCampov = mysql_query("SELECT origen,destino,id_usu FROM ruta WHERE origen = '$ori' and destino = '$des' and id_usu = '$id_usu'");
    if(mysql_num_rows($rSQLCampov) > 0){
        
        echo '<div class="alert alert-warning alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    <b>Alerta no se registro esta Ruta </b> Ya Existe... <br> <center>
                                <a href="rrutas.php" class="btn btn-danger">Volver</a></center>';
        echo '   </div>';die(print_r(mysql_error(),true));
    }
    else if(mysql_query("insert into ruta (id,origen,destino,id_usu,fecha,estado) values('',UPPER('$ori'),UPPER('$des'),'$id_usu','$Fecha',1)"))
        {

            $sql2="INSERT into sentencias values ('','$_SESSION[id]','INSERT INTO','RUTA','$Fecha','$ori,$des')";
            $st2=mysql_query($sql2);

            echo '<div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    <b>Ruta Registrada </b> Exitosamente';
            echo '   </div>';
        }
        else
        {
            $_SESSION["alerta"] = "Error al registar la ruta";
        }
}

?>

<form action="" method="POST">
    <table >
        <tr>
            <td>
                <div id="map-container" style="border: 10px solid White;  width:580px; height:580px"></div>
            </td>
            <td>
                    <table style=" border-spacing: 5px;" class="auto-style1">
                        <tr>
                            <td>
                                <label style="width:50px">Origen:</label>              
                                <input Width="180px" ID="frominput" name="frominput"  value="Quito Prensa y Yacuambi">
                                <label style="width:50px">Destino:</label>
                                <input Width="180px" ID="toinput" name="toinput" value="Quito" >
                             </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="width:500px; height:500px overflow: auto; " class="auto-style2">
                                    <label >Modo Viaje:</label>
                                        <select style="width:100px" onchange="Demo.getDirections();" id="travel-mode-input">
                                            <option value="driving" selected="selected">Manejando</option>
                                            <option value="bicycling">Transito</option>
                                            <option value="walking">A Pie</option>
                                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label >Unidad:</label>
                                        <select style="width:100px" onchange="Demo.getDirections();" id="unit-input">
                                            <option value="imperial" selected="selected">Imperial</option>
                                            <option value="metric">Metrico</option>
                                        </select>
                                        <input onclick="Demo.getDirections();" class="btn btn-primary" type=button value="Generar Ruta!"/>
                                        <center><input type="submit" name="btnguardar" class="btn btn-success" value="GUARDAR"></center>
                                </div>
                                <div id="dir-container"></div>
                            </td>
                        </tr>
                    </table>
            </td>
        </tr>
    </table>
</form>



    <script language="javascript" type="text/javascript">
        var Demo = {
            // HTML Nodes
            mapContainer: document.getElementById('map-container'),
            dirContainer: document.getElementById('dir-container'),
            fromInput: document.getElementById('frominput'),
            toInput: document.getElementById('toinput'),
            travelModeInput: document.getElementById('travel-mode-input'),
            unitInput: document.getElementById('unit-input'),

            // API Objects
            dirService: new google.maps.DirectionsService(),
            dirRenderer: new google.maps.DirectionsRenderer(),
            map: null,

            showDirections: function (dirResult, dirStatus) {
                if (dirStatus != google.maps.DirectionsStatus.OK) {
                    alert('Error Al buscar la Ruta: ' + dirStatus);
                    return;
                }

                // Show directions
                Demo.dirRenderer.setMap(Demo.map);
                Demo.dirRenderer.setPanel(Demo.dirContainer);
                Demo.dirRenderer.setDirections(dirResult);
            },

            getSelectedTravelMode: function () {
                var value =
                    Demo.travelModeInput.options[Demo.travelModeInput.selectedIndex].value;
                if (value == 'driving') {
                    value = google.maps.DirectionsTravelMode.DRIVING;
                } else if (value == 'bicycling') {
                    value = google.maps.DirectionsTravelMode.TRANSIT;
                } else if (value == 'walking') {
                    value = google.maps.DirectionsTravelMode.WALKING;
                } else {
                    alert('Tipo de Viaje no encontrado.');
                }
                return value;
            },

            getSelectedUnitSystem: function () {
                return Demo.unitInput.options[Demo.unitInput.selectedIndex].value == 'metric' ?
                    google.maps.DirectionsUnitSystem.METRIC :
                    google.maps.DirectionsUnitSystem.IMPERIAL;
            },

            getDirections: function () {
                var fromStr = Demo.fromInput.value;
                var toStr = Demo.toInput.value;
                var dirRequest = {
                    origin: fromStr,
                    destination: toStr,
                    travelMode: Demo.getSelectedTravelMode(),
                    unitSystem: Demo.getSelectedUnitSystem(),
                    provideRouteAlternatives: true
                };
                Demo.dirService.route(dirRequest, Demo.showDirections);
            },

            init: function () {
                var latLng = new google.maps.LatLng(-0.2298500, -78.5249500);
                Demo.map = new google.maps.Map(Demo.mapContainer, {
                    zoom: 13,
                    center: latLng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                // Show directions onload
                Demo.getDirections();
            }
        };

        // Onload handler to fire off the app.
        google.maps.event.addDomListener(window, 'load', Demo.init);
    </script>
    <!-- //Select -->

<?php

$con=mysql_connect("localhost","root","Sistemas12.");
mysql_select_db("integrador",$con);
$id_usu=$_SESSION['id'];
$sql ="select * from ruta where id_usu=".$id_usu."; ";

    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d H:i');
    $sql1="Insert into sentencias values ('','$_SESSION[id]','SELECT * FROM','RUTA','$fecha','')";
    $st1=mysql_query($sql1);

$sql1 ="select count(id) from ruta where id_usu=".$id_usu."; ";
$res=mysql_query($sql,$con);
$res1=mysql_query($sql1,$con);
require 'encriptar.php';
?>
            <form method="get" >
                            <div class="box-header">
                                    <h3 id="otro" align="center">Lista Rutas</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Origen</td>
                        <td>Destino</td>
                        <td>Fecha</td>
                    </tr>
                </thead>
                <?php

                while ($resultado=mysql_fetch_array($res))
                {
                    echo"<tr>"
                        ."<td>".$resultado['id']."</td>"
                        ."<td>".$resultado['origen']."</td>"
                        ."<td>".$resultado['destino']."</td>"
                        ."<td>".$resultado['fecha']."</td>"
                    ."</tr>";
                }

                ?>
            </table>
            <center>
            <a href="Pdf/reporte_rutas_indv.php?id=<?php echo "".encoded($id_usu); ?>">
            <input type="button" name="btn_enviar" value="Reporte" class="btn btn-info" style="float: center; text-align: center;">
            </a>
            </center>
<!--             <input type='button' class='btn btn-danger' onclick= 'dato(1, <?php addslashes("") ?>);' name=''>
     -->    </form>
   

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
                </div>
            </div>
        </div>

        <!--Pie de página-->
        <?php include_once("footer.php") ?>

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/main.js"></script>
</body>

