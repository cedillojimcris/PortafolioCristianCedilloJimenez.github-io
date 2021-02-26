<?php

require 'Classes/PHPExcel.php';
	require 'funts/conexionBD.php';
	//Consulta
	$sql = "SELECT numero_cuenta,nombreA,apellido_maternoA,apellido_paternoA,correo_personalA, celularA, facultad_origenA, semestreA, tipoProblemaA,descripcionProblemaA, estadoCita,estadoAlumno, diaCita, horaCita FROM alumno INNER JOIN cita WHERE id_alumno = id_alumnoFK ";
	//$resultado = $mysqli->query($query);
	$resultado = $mysqli->query($sql);
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('images/un.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("SEGIT")->setDescription("Reporte de Alumnos");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Alumnos");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);

	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:E4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:M6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE ALUMNOS');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');


		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'NUMERO CUENTA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'NOMBRE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'APELLIDO PATERNO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'APELLIDO MATERNO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'CORREO PERSONAL');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('F6', 'CELULAR');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('G6', 'FACULTAD ORIGEN');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('H6', 'SEMESTRE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('I6', 'TIPO PROBLEMA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('J6', 'DESCRIPCION PROBLEMA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('K6', 'ESTADO CITA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('L6', 'ESTADO ALUMNO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
		$objPHPExcel->getActiveSheet()->setCellValue('M6', 'HORARIO');
//	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
	
	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){


		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['numero_cuenta']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['nombreA']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['apellido_paternoA']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['apellido_maternoA']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['correo_personalA']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['celularA']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['facultad_origenA']);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['semestreA']);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['tipoProblemaA']);
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $rows['descripcionProblemaA']);
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $rows['estadoCita']);
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $rows['estadoAlumno']);
		$objPHPExcel->getActiveSheet()->setCellValue('M'.$fila, $rows['horaCita']." ".$rows['diaCita']);
	

	//	$objPHPExcel->getActiveSheet()->setCellValue('N'.$fila, '=C'.$fila.'*D'.$fila);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:E".$fila);
	
	$filaGrafica = $fila+2;
	
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Productos!$D$7:$D$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'Productos!$B$7:$B$'.$fila);
	
	// definir  gráfico
	$series = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_BARCHART, // tipo de gráfico
	PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,
	array(0),
	array(),
	array($categories), // rótulos das columnas
	array($values) // valores
	);
	$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);
	
	// inicializar gráfico
	$layout = new PHPExcel_Chart_Layout();
	$plotarea = new PHPExcel_Chart_PlotArea($layout, array($series));
	
	// inicializar o gráfico
	$chart = new PHPExcel_Chart('exemplo', null, null, $plotarea);
	
	// definir título do gráfico
	$title = new PHPExcel_Chart_Title(null, $layout);
	$title->setCaption('Gráfico PHPExcel Chart Class');
	
	// definir posiciondo gráfico y título
	$chart->setTopLeftPosition('B'.$filaGrafica);
	$filaFinal = $filaGrafica + 10;
	$chart->setBottomRightPosition('E'.$filaFinal);
	$chart->setTitle($title);
	
	// adicionar o gráfico à folha
	$objPHPExcel->getActiveSheet()->addChart($chart);
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// incluir gráfico
//	$writer->setIncludeCharts(TRUE);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Reporte.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');


	?>