<?php


	include 'plantilla2.php';
	require 'funts/conexionBD.php';


	$sql = "SELECT nombreT, apellido_maternoT,apellido_paternoT, correo_personalT, celularT FROM terapeuta  ";
	//$resultado = $mysqli->query($query);
	$resultado = $mysqli->query($sql);



	$pdf = new PDF('L','mm','A4');

	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,132);
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(45,10,'NOMBRE',1,0,'C',1);
	$pdf->Cell(45,10,'APELLIDO MATERNO',1,0,'C',1);
	$pdf->Cell(45,10,'APELLIDO PATERNO',1,0,'C',1);
	$pdf->Cell(45,10,'CORREO',1,0,'C',1);
	$pdf->Cell(45,10,'CELULAR',1,1,'C',1);
	
	
	$pdf->SetFont('Arial','',10);
	
   
	
	while($row =  $resultado->fetch_array(MYSQLI_ASSOC)){
  

		//return [
  		
		$pdf->Cell(45,10,utf8_decode($row['nombreT']),1,0,'C');
		$pdf->Cell(45,10,utf8_decode($row['apellido_maternoT']),1,0,'C');
		$pdf->Cell(45,10,utf8_decode($row['apellido_paternoT']),1,0,'C');
		$pdf->Cell(45,10,utf8_decode($row['correo_personalT']),1,0,'C');
		$pdf->Cell(45,10,utf8_decode($row['celularT']),1,1,'C');
		//];
		 //]
	}   
	
	$pdf->Output();


?>