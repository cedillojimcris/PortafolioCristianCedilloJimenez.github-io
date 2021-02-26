<?php


	include 'plantilla.php';
	require 'funts/conexionBD.php';


	$sql = "SELECT numero_cuenta,nombreA,apellido_maternoA,apellido_paternoA,estadoCita,estadoAlumno  FROM alumno INNER JOIN cita WHERE id_alumno = id_alumnoFK " ;
	//$resultado = $mysqli->query($query);
	$resultado = $mysqli->query($sql);


	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,132);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(45,10,'NUMERO DE CUENTA',1,0,'C',1);
	$pdf->Cell(45,10,'NOMBRE',1,0,'C',1);
	$pdf->Cell(45,10,'APELLIDO MATERNO',1,0,'C',1);
	$pdf->Cell(45,10,'APELLIDO PATERNO',1,0,'C',1);
	$pdf->Cell(45,10,'ESTADO CITA',1,0,'C',1);
	$pdf->Cell(45,10,'ESTADO ALUMNO',1,1,'C',1);
	

	$pdf->SetFont('Arial','',10);
	
   
	
	while($row =  $resultado->fetch_array(MYSQLI_ASSOC)){
  

		//return [
  		$pdf->Cell(45,10,utf8_decode($row['numero_cuenta']),1,0,'C');
		$pdf->Cell(45,10,utf8_decode($row['nombreA']),1,0,'C');
		$pdf->Cell(45,10,utf8_decode($row['apellido_maternoA']),1,0,'C');
		$pdf->Cell(45,10,utf8_decode($row['apellido_paternoA']),1,0,'C');
		$pdf->Cell(45,10,utf8_decode($row['estadoCita']),1,0,'C');
		$pdf->Cell(45,10,utf8_decode($row['estadoAlumno']),1,1,'C');
		//];
		 //]
	}   
	
	$pdf->Output();


?>