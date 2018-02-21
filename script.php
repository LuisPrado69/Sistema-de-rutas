<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("integrador",$con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		fieldset{-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;}
		fieldset legend { background: #666; color:#fff; padding: 6px;  font-weight: bold; }
	</style>
	<script>
		function TraeDatosCliente(id,origen,destino,id_usu){
			var Id     	    = document.getElementById('txtId');
			var Nombre      = document.getElementById('txtNombre');
			var Cedula      = document.getElementById('txtCedula');
			var Telefono    = document.getElementById('txtTelefono');
			Id.value		= id;
			Nombre.value	= origen;
			Cedula.value	= destino;
			Telefono.value	= id_usu;
		}
	</script>
</head>
<body style="background-color: white" onload="document.getElementById('loader').style.display='none';">
<div id="loader" style="position:absolute; width:100%; height:100%; background-color:#ffffff; z-index:1005; text-align:center; padding-top:100px; font-size:20px; font-family:Arial; color:#000000;">
Cargando la Página...<br/><br/>
<img height="75" width="75" src="../../public/imagenes/cargando.gif" />
</div>
	<center>
		<h1>hola</h1>
	</center>
	<center>
		<table style="width: 70%">
			<tr>
				<td>
					mapa
   				</td>
   				<td>
					<fieldset>
					<legend><strong>Datos del Cliente</strong></legend>
					<center>
					<table border=0>
					<tr>
					<td colspan=2><input type="hidden" name="txtId" id="txtId"/></td>
					</tr>
					<tr>
					<td>Nombre: </td><td><input type="text" disabled name="txtNombre" id="txtNombre" class="CajaTexto" size="40" x-webkit-speech="true"/></td>
					</tr>
					<tr>
					<td>Cedula: </td><td><input type="text" disabled name="txtCedula" id="txtCedula" class="CajaTexto" size="40" x-webkit-speech="true"/></td>
					</tr>
					<tr>
					<td>Telefono: </td><td><textarea disabled name="txtTelefono" id="txtTelefono" class="CajaTexto" rows="3" cols="30"></textarea></td>
					</tr>
					</table>
					</center>

					</fieldset>
   				</td>
   				<td>
   					<div class="col-xs-12 col-sm-12 col-md-12">
					    <div id="delete-ok"></div>
					        <div class="box">
					            <div class="box-header">
					                 <center><h1 class="box-title" style="font: oblique bold 120% cursive; ">Lista de Clientes:</h3></center>
					            </div><!-- /.box-header -->
					                <div class="box-body">    
					                    <table  id="example1" class="table table-striped table-hover"  >
					                    <thead>
					                    <tr style="background-color: #EEBD19">
					                    <th style="width: 10%">CEDULA</th>
					                    <th style="width: 50%">NOMBRE</th>
					                    <th style="width: 20%">ESTADO</th>
					                    <th style="width: 20%">Fecha</th>
					                    <th style="width: 20%">OPCIONES</th>

					                    </tr>
					                    </thead>
					                    <tbody id="tbody">
					                    <?php
					                    $sql      = "SELECT * FROM ruta";
					                    $rs       = mysql_query($sql, $con);
					                    if (mysql_num_rows($rs) != 0) {
					                        while ($rows = mysql_fetch_assoc($rs)) {
					                           
					                           //$var=base64_encode($rows['PRO_IMG']);
					                           
					                            echo '<tr>';
					                            echo '<td>'.$rows['id'].'</td>';
					                            echo '<td>' . $rows['origen'] .'  '.$rows['destino']. '</td>';
					                            if ($rows['estado']==1) {
					                                echo '<td><label for="" style="color:green">Activo</label></td> ';
					                            }else{
					                                  echo '<td><label for="" style="color:orange">Inactivo</label></td> ';
					                            }
					                            echo '<td>'.$rows['fecha'].'</td>';
					                           /*  echo '<td><img width="30px" height="30px" src="data:image/jpeg;base64,'.$var.'" /></td>';*/
					                           echo '<td>
					                           <a href onclick="TraeDatosCliente(' . $rows['id'].';,'.$rows['origen'].';,'.$rows['destino'].';,'.$rows['id_usu'] . ')">Modificar<a/>
					                           </td>';
					                                                   
					                            echo '</tr>';
					                            echo '<span id="loader_grabar" class=""></span>';
					                        }

					                    } else {
					                        echo "<tr><td colspan='8'><center><img src='../../public/imagenes/error.png'/> No Hay Registros</center></td></tr>";
					                    }

					                    ?>
					                    </tbody>
					                    </table>
					            </div><!-- /.box-body -->
					        </div><!-- /.box -->
					    </div>
   				</td>
			</tr>
			
		</table>
	</center>
</body>
<script type="text/javascript">
            $("#example1").dataTable({
                "oLanguage": {
                    "sSearch": "Buscar Datos:  ",
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Mostrando _START_ a _END_ de entradas _TOTAL_",
                    "oPaginate": {
                        "sNext": "",
                        "sPrevious": ""
                    }
                }
             } );
        </script>
</html>