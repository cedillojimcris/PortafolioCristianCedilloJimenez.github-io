<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logo.jpg', 5, 5, 60 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(130,33, 'Reporte De Alumnos ',0,0,'C');
			$this->Ln(28);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}	

	}

?>