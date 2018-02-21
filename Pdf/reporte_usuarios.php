
<?php
	include 'plantilla.php';
	require 'conexion.php';
	$query = "SELECT 
ad.usuario,ad.nombre,ad.correo,
r.descripccion as rdes,e.descripccion as edes
from 
usuarios ad , roles r, estado e
where 
ad.privilegio=r.id and ad.estado=e.id order by nombre";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	//texto

	$pdf->MultiCell(190,6,'Reporte de Usuarios',0,'C');
	$pdf->MultiCell(190,6,'',0,'C');
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'Usuario',	1,0,'C',1);
	$pdf->Cell(40,6,'Nombre',	1,0,'C',1);
	$pdf->Cell(60,6,'Correo',	1,0,'C',1);
	$pdf->Cell(40,6,'Estado',	1,0,'C',1);
	$pdf->Cell(30,6,'Privilegio',	1,1,'C',1);

	$pdf->SetFont('Arial','',8);
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,$row['usuario'],		1,0,'C');
		$pdf->Cell(40,6,$row['nombre'],			1,0,'C');
		$pdf->Cell(60,6,$row['correo'],		1,0,'C');
		$pdf->Cell(40,6,$row['rdes'],			1,0,'C');
		$pdf->Cell(30,6,$row['edes'],		1,1,'C');

	}

	$pdf->Output();
?>