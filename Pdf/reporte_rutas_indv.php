<?php
	require '../encriptar.php';
	include 'plantilla.php';
	require 'conexion.php';
	$codigo=$_GET['id'];
	$query = "SELECT `id`,`origen`,`destino`,`fecha` from `ruta` where `id_usu` = $codigo order by fecha asc";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	//texto

	$pdf->MultiCell(190,6,'Reporte de Privilegios',0,'C');
	$pdf->MultiCell(190,6,'',0,'C');
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'ID',		1,0,'C',1);
	$pdf->Cell(60,6,'Origen',	1,0,'C',1);
	$pdf->Cell(60,6,'Destino',	1,0,'C',1);
	$pdf->Cell(40,6,'Fecha',	1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_decode($row['id']),	1,0,'C');
		$pdf->Cell(60,6,$row['origen'],				1,0,'C');
		$pdf->Cell(60,6,$row['destino'],			1,0,'C');
		$pdf->Cell(40,6,$row['fecha'],				1,1,'C');

	}

	$pdf->Output();
?>