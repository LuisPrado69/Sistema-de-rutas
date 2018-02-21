<?php 
header('Content-Type: text/xml'); 
echo '<markers>';
include ("conexion.php");

$sql1=mysqli_query($con,"SELECT COUNT(id_usuario) as usu from puntos;");
while($row1=mysqli_fetch_array($sql1))
{
	$num=$row1['usu'];
}
echo "string".$num;
$sql=mysqli_query($con,"SELECT IdPunto as IdPunto,cx,cy,id_usuario FROM puntos order by IdPunto desc limit $num");
while($row=mysqli_fetch_array($sql))
{
	echo "<marker id ='".$row['IdPunto']."' lat='".$row['cx']."' lng='".$row['cy']."'>\n";
	echo "</marker>\n";
}
mysql_close($bd);
echo "</markers>\n";
?>
<!-- SELECT * FROM puntos order by IdPunto desc limit 5

-0.255598  -78.5539881 -->