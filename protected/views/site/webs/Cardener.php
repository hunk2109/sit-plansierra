<?php 

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

$conn = pg_connect("host='localhost' port='5432' user='web' password='web' dbname='iberpotash2'");
require_once '/var/www/PHPExcel_1.8.0/Classes/PHPExcel.php';


//PUNTO CARDENER (1) CLORUROS (PARAM 5)
$incrementoC = 20;
$inputFileName = "/var/datos/iberpotash/templates/Inf_01_Cardener.xlsx";
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setIncludeCharts(TRUE);
$objPHPExcel = $objReader->load($inputFileName);
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);


//CARACTERÍSTICAS DEL PUNTO

$SQL = "SELECT 
  puntos.nom_curt, 
  puntos.nom_llarg, 
  puntos.id_tipopunto, 
  puntos.naturaleza, 
  puntos.id_origen, 
  puntos.x, 
  puntos.y, 
  puntos.cota, 
  puntos.toponimia, 
  puntos.observaciones
FROM 
  public.puntos
WHERE id = 1;";
$result  = pg_query($conn, $SQL);
$row = pg_fetch_row($result);

for($k=0;$k<2;$k++){
	$objWorksheet = $objPHPExcel->setActiveSheetIndex($k);
	$objPHPExcel->getActiveSheet()->setCellValue("D2", $row[0]);
	$objPHPExcel->getActiveSheet()->setCellValue("D3", $row[1]);
	$objPHPExcel->getActiveSheet()->setCellValue("D5", $row[3]);
	$objPHPExcel->getActiveSheet()->setCellValue("D6", "BBDD Puntos Agua 2007. Plan de Vigilancia");
	$objPHPExcel->getActiveSheet()->setCellValue("D7", $row[5]);
	$objPHPExcel->getActiveSheet()->setCellValue("D8", $row[6]);
	$objPHPExcel->getActiveSheet()->setCellValue("D9", $row[7]);
	$objPHPExcel->getActiveSheet()->setCellValue("D10", $row[8]);
	$objPHPExcel->getActiveSheet()->setCellValue("D11", $row[9]);
	
}

$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
for($year = 2007; $year < date("Y"); $year++){
	$zeile = $objPHPExcel->getActiveSheet()->rangetoArray('A13:AK30', null, true, true, true);
	$objPHPExcel->getActiveSheet()->fromArray($zeile, null, 'A'.(13+$incrementoC));
	
	$incrementoC = $incrementoC+20;
}

$incrementoC = 0;
$anopar=TRUE;
for($year = 2007; $year <= date("Y"); $year++){
	$SQL = "SELECT date_part('day', fecha_muestreo),  date_part('month', fecha_muestreo), valor 
	FROM muestras, analisis 
	WHERE muestras.id_muestra = analisis.id_muestra AND id_parametro = 5 AND id_punto = 1 AND date_part('year', fecha_muestreo) = ".$year." 
	ORDER BY fecha_muestreo";

	$result  = pg_query($conn, $SQL);
	$objPHPExcel->getActiveSheet()->setCellValue("B".(13+$incrementoC), $year);
	
	while ($row = pg_fetch_row($result)){
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($row[0], (16+$incrementoC)+$row[1], $row[2]);
		
	}
	$objPHPExcel->getActiveSheet()->getStyle("B".(17+$incrementoC).":AF".(28+$incrementoC))->getFont()->setSize(8);
	$objPHPExcel->getActiveSheet()->getStyle("B".(16+$incrementoC).":AK".(16+$incrementoC))->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle("B".(15+$incrementoC).":AF".(15+$incrementoC))->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle("B".(13+$incrementoC).":C".(13+$incrementoC))->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle("AF".(30+$incrementoC).":AF".(30+$incrementoC))->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->mergeCells("B".(15+$incrementoC).":AF".(15+$incrementoC));
	$objPHPExcel->getActiveSheet()->mergeCells("B".(13+$incrementoC).":C".(13+$incrementoC));
	$objPHPExcel->getActiveSheet()->mergeCells("AH".(30+$incrementoC).":AI".(30+$incrementoC));
	
	$styleArray = array(
		  'borders' => array(
			  'allborders' => array(
				  'style' => PHPExcel_Style_Border::BORDER_THIN
			  )
		  ),
		  'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
	  );
	$objPHPExcel->getActiveSheet()->getStyle("A".(16+$incrementoC).":AF".(28+$incrementoC))->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle("B".(15+$incrementoC).":AF".(15+$incrementoC))->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle("AH".(16+$incrementoC).":AK".(28+$incrementoC))->applyFromArray($styleArray);
	
	$styleArray = array(
		  'borders' => array(
			  'allborders' => array(
				  'style' => PHPExcel_Style_Border::BORDER_MEDIUM
			  )
		  )
	  );
	  
	$objPHPExcel->getActiveSheet()->getStyle("AH".(30+$incrementoC).":AI".(30+$incrementoC))->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle("AH".(30+$incrementoC).":AI".(30+$incrementoC))->getFont()->setBold(true);
	
	$styleArray = array(
		 'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
        )
	  );
	  $objPHPExcel->getActiveSheet()->getStyle("AF".(30+$incrementoC).":AF".(30+$incrementoC))->applyFromArray($styleArray);
	

	if ($anopar){
		$objPHPExcel->getActiveSheet()->getRowDimension(34+$incrementoC)->setRowHeight(3);
		$objPHPExcel->getActiveSheet()->getRowDimension(49+$incrementoC)->setRowHeight(3);
		$objPHPExcel->getActiveSheet()->getRowDimension(51+$incrementoC)->setRowHeight(3);
		$objPHPExcel->getActiveSheet()->getRowDimension(52+$incrementoC)->setRowHeight(3);
		$objPHPExcel->getActiveSheet()->getRowDimension(54+$incrementoC)->setRowHeight(3);
		$objPHPExcel->getActiveSheet()->getRowDimension(69+$incrementoC)->setRowHeight(3);
		$objPHPExcel->getActiveSheet()->getRowDimension(71+$incrementoC)->setRowHeight(3);
		$objPHPExcel->getActiveSheet()->getRowDimension(72+$incrementoC)->setRowHeight(3);
	}	
	$anopar=!$anopar;
	
	
	//FORMULAS
	for($k=17;$k<29;$k++){
		$objPHPExcel->getActiveSheet()->setCellValue('AH'.($k+$incrementoC), '=COUNT(B'.($k+$incrementoC).':AF'.($k+$incrementoC).')');
		$objPHPExcel->getActiveSheet()->setCellValue('AI'.($k+$incrementoC), '=AVERAGE(B'.($k+$incrementoC).':AF'.($k+$incrementoC).')');	
		$objPHPExcel->getActiveSheet()->setCellValue('AJ'.($k+$incrementoC), '=MAX(B'.($k+$incrementoC).':AF'.($k+$incrementoC).')');
		$objPHPExcel->getActiveSheet()->setCellValue('AK'.($k+$incrementoC), '=MIN(B'.($k+$incrementoC).':AF'.($k+$incrementoC).')');
	}
	$objPHPExcel->getActiveSheet()->setCellValue('AH'.(30+$incrementoC), '=AVERAGE(AI'.(17+$incrementoC).':AI'.(28+$incrementoC).')');
	$objPHPExcel->getActiveSheet()->getStyle('AH'.(30+$incrementoC))->getNumberFormat()->setFormatCode('#0');
	
	$incrementoC=$incrementoC+20;
}

	$objPHPExcel->getActiveSheet()->getRowDimension(12)->setRowHeight(31);

	
	//GRAFICO
	/*
$dataseriesLabels = array(
	//new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$10', NULL, 1),	//	2010
	new PHPExcel_Chart_DataSeriesValues('String', '\'Formato antiguo\'!$A$'.($fila+2), NULL, 1),	//	Media
	new PHPExcel_Chart_DataSeriesValues('String', '\'Formato antiguo\'!$A$'.($fila+3), NULL, 1),	//	Maximo
	new PHPExcel_Chart_DataSeriesValues('String', '\'Formato antiguo\'!$A$'.($fila+4), NULL, 1),	//	Minimo
);

$xAxisTickValues = array(
	new PHPExcel_Chart_DataSeriesValues('String', '$B$4!$B$'.$i, NULL, 4),	//	Q1 to Q4
);

$dataSeriesValues = array(
	new PHPExcel_Chart_DataSeriesValues('Number', '\''.$row[0].'\'!$N$11:$N$'.($i-1), NULL, 4),
	new PHPExcel_Chart_DataSeriesValues('Number', '\''.$row[0].'\'!$O$11:$O$'.($i-1), NULL, 4),
	new PHPExcel_Chart_DataSeriesValues('Number', '\''.$row[0].'\'!$P$11:$P$'.($i-1), NULL, 4),
	new PHPExcel_Chart_DataSeriesValues('Number', '\''.$row[0].'\'!$Q$11:$Q$'.($i-1), NULL, 4),
	new PHPExcel_Chart_DataSeriesValues('Number', '\''.$row[0].'\'!$R$11:$R$'.($i-1), NULL, 4),
	new PHPExcel_Chart_DataSeriesValues('Number', '\''.$row[0].'\'!$S$11:$S$'.($i-1), NULL, 4),
	//new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$D$2:$D$5', NULL, 4),
);

//	Build the dataseries
$series = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_LINECHART,		// plotType
	PHPExcel_Chart_DataSeries::GROUPING_STACKED,	// plotGrouping
	range(0, count($dataSeriesValues)-1),			// plotOrder
	$dataseriesLabels,								// plotLabel
	$xAxisTickValues,								// plotCategory
	$dataSeriesValues								// plotValues
);

//	Set the series in the plot area
$plotarea = new PHPExcel_Chart_PlotArea(NULL, array($series));
//	Set the chart legend
$legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_TOPRIGHT, NULL, false);

$title = new PHPExcel_Chart_Title('Ions (mg/L)/data');
$yAxisLabel = new PHPExcel_Chart_Title('');

//	Create the chart
$chart = new PHPExcel_Chart(
	'chart1',		// name
	$title,			// title
	$legend,		// legend
	$plotarea,		// plotArea
	true,			// plotVisibleOnly
	0,				// displayBlanksAs
	NULL,			// xAxisLabel
	$yAxisLabel		// yAxisLabel
);

//	Set the position where the chart should appear in the worksheet
$chart->setTopLeftPosition('A'.($i+8));
$chart->setBottomRightPosition('G'.($i+30));

//	Add the chart to the worksheet
$objPHPExcel->getActiveSheet()->addChart($chart);
	*/
	

//PESTAÑA MENSUAL

$SQL ="select date_part('year', fecha_muestreo), date_part('month', fecha_muestreo), avg(valor) 
from muestras, analisis 
where muestras.id_muestra = analisis.id_muestra and id_parametro = 5 and id_punto = 1 
GROUP BY  date_part('year', fecha_muestreo),  date_part('month', fecha_muestreo)
ORDER BY  date_part('year', fecha_muestreo),  date_part('month', fecha_muestreo)";
$result  = pg_query($conn, $SQL);
$objWorksheet = $objPHPExcel->setActiveSheetIndex(1);

$year = -1;
$fila = 16;
while ($row = pg_fetch_row($result)){
	
	if($year!=-1 && $year != $row[0]){
		$year = $row[0];		
		$objPHPExcel->getActiveSheet()->setCellValue('N'.($fila), '=AVERAGE(B'.$fila.':M'.($fila).')');
		$fila = $fila+1;
	}
	if($year ==-1){
		$year = $row[0];
	}
	$objPHPExcel->getActiveSheet()->setCellValue("A".$fila, $row[0]);
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($row[1], $fila, $row[2]);
	
}

$objPHPExcel->getActiveSheet()->setCellValue("A".($fila+2), "Mitjana");
$objPHPExcel->getActiveSheet()->setCellValue("A".($fila+3), "Màxim");
$objPHPExcel->getActiveSheet()->setCellValue("A".($fila+4), "Mínim");

for($k=1; $k<13;$k++){
	$col = getNameFromNumber($k);
	$objPHPExcel->getActiveSheet()->setCellValue($col.($fila+2), '=AVERAGE('.$col.(16).':'.$col.($fila).')');
	$objPHPExcel->getActiveSheet()->setCellValue($col.($fila+3), '=MAX('.$col.(16).':'.$col.($fila).')');
	$objPHPExcel->getActiveSheet()->setCellValue($col.($fila+4), '=MIN('.$col.(16).':'.$col.($fila).')');
	
	$objPHPExcel->getActiveSheet()->getStyle($col.($fila+2))->getNumberFormat()->setFormatCode('#0');
	$objPHPExcel->getActiveSheet()->getStyle($col.($fila+3))->getNumberFormat()->setFormatCode('#0');
	$objPHPExcel->getActiveSheet()->getStyle($col.($fila+4))->getNumberFormat()->setFormatCode('#0');
}

//FORMATO 
$styleArray = array(
  'borders' => array(
	  'allborders' => array(
		  'style' => PHPExcel_Style_Border::BORDER_THIN
	  )
  )
);
$objPHPExcel->getActiveSheet()->getStyle("A".($fila+2).":M".($fila+4))->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle("A16:N".($fila))->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle("B14:B14")->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->getStyle("B16:M".($fila))->getNumberFormat()->setFormatCode('#0');	
$objPHPExcel->getActiveSheet()->getStyle("N16:N".($fila))->getNumberFormat()->setFormatCode('#0');	




// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Cardener.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->setIncludeCharts(TRUE);
$objWriter->save('php://output');
exit;

function getNameFromNumber($num) {
    $numeric = $num % 26;
    $letter = chr(65 + $numeric);
    $num2 = intval($num / 26);
    if ($num2 > 0) {
        return getNameFromNumber($num2 - 1) . $letter;
    } else {
        return $letter;
    }
}
?>