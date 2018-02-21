
<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "	SELECT c.id as id, c.fecha as fecha,c.sentencia as sen,c.tabla as tab,c.datos as dat,
				u.nombre as nombre
				FROM sentencias c , usuarios u
				where c.usuario=u.id order by id asc";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	//texto

	$pdf->MultiCell(190,6,'Reporte de Control de Usuarios',0,'C');
	$pdf->MultiCell(190,6,'',0,'C');
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(10,6,'ID',		1,0,'C',1);
	$pdf->Cell(40,6,'Fecha',	1,0,'C',1);
	$pdf->Cell(30,6,'Sentencia',	1,0,'C',1);
	$pdf->Cell(30,6,'Tablas',	1,0,'C',1);
	$pdf->Cell(50,6,'Datos',	1,0,'C',1);
	
	$pdf->Cell(30,6,'Usuario',		1,1,'C',1);
	

	$pdf->SetFont('Arial','',8);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(10,6,utf8_decode($row['id']),			1,0,'C');
		$pdf->Cell(40,6,$row['fecha'],						1,0,'C');
		$pdf->Cell(30,6,$row['sen'],						1,0,'C');
		$pdf->Cell(30,6,$row['tab'],						1,0,'C');
		$pdf->Cell(50,6,$row['dat'],						1,0,'C');

		$pdf->Cell(30,6,utf8_decode($row['nombre']),		1,1,'C');
	}
	$pdf->Output();
?>