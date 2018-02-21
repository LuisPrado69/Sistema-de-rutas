<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logo.png', 5, 5, 50 );
			$this->SetFont('Arial','B',15);
			$this->Cell(40);
			$this->Cell(120,10, 'Sistema de Rutas de Transporte',0,0,'C');
		
			$this->Ln(20);
		}

		function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Este es el pie de página creado con el método Footer() de la clase creada PDF que hereda de FPDF','T',0,'C');
    }	
	}
?>