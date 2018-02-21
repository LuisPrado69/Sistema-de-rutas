
<?php
	include 'plantilla.php';
	require 'conexion.php';
	$query = "	SELECT 
				max(p.cx) as cx,max(p.cy) as cy,max(p.fecha)as fecha,u.nombre 
				FROM 
				puntos p, usuarios u 
				WHERE 
				p.id_usuario=u.id  GROUP by p.id_usuario order by fecha desc limit 5";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	//texto

	$pdf->MultiCell(190,6,'Reporte de Ubicaciones',0,'C');
	$pdf->MultiCell(190,6,'',0,'C');
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(50,6,'Fecha',		1,0,'C',1);
	$pdf->Cell(50,6,'Usuario',	1,0,'C',1);
	$pdf->Cell(50,6,'Latitud',	1,0,'C',1);
	$pdf->Cell(40,6,'Longitud',	1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(50,6,$row['fecha'],			1,0,'C');
		$pdf->Cell(50,6,$row['nombre'],			1,0,'C');
		$pdf->Cell(50,6,$row['cx'],				1,0,'C');
		$pdf->Cell(40,6,$row['cy'],				1,1,'C');

	}

	$pdf->Output();
?>