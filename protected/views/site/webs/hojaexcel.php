<?php 
/** Error reporting */

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

//$conn = pg_connect("host='localhost' port='5432' user='web' password='web' dbname='iberpotash2'");

require_once 'c:\\MS4W/ms4w/Apache/htdocs/PlanSierra/PHPExcel_1.8.0/Classes/PHPExcel.php';

//
$incrementoC = 20;
$inputFileName = "c:\\datos/salidas/plantillas/Facturas_v03.xlsx";
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);


$objReader->setIncludeCharts(TRUE);
$objPHPExcel = $objReader->load($inputFileName);
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);

$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");
/*$SQL = "SELECT 
		    
			codigo_plantacion,
			codigo_control,
			codigo_cliente,
			apellido,
			nombre,
			ceda,
			nombre_cuenca,
			nombre_microcuenca,
			cs_destino,
			fecha::date,
			plantas,
			tareas,
			inversion_plantas,
			
			codigo_factura
			
  
		FROM 
			public.\"15_Plantacion_completa_sin_geo_facturas_plus\" 
	
		WHERE 
			".$_GET['criterio']."
			
		ORDER BY fecha::date DESC;";*/
		
	$SQL= "SELECT 

			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_plantacion,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_control,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_cliente,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".apellido,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".cedula,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_cuenca,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_microcuenca,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".cs_destino,
			
			TO_CHAR (\"15_Plantacion_completa_sin_geo_facturas_plus\".fecha::date, 'dd/mm/yyyy') as fecha,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".plantas,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".tareas,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".inversion_plantas,
			fac_labores_codigo_factura.coste_labores,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_municipio,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".tp_descripcion_tipo_plantacion,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".tp_descripcio_tipo_actividad,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_proyecto,
			 sig_tipo_de_plantacion.fase,
			 \"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_paraje,
			 \"15_Plantacion_completa_sin_geo_facturas_plus\".pr_sector
			 
			
		FROM public.sig_tipo_de_plantacion,
			(public.\"15_Plantacion_completa_sin_geo_facturas_plus\" left join 
			public.fac_labores_codigo_factura
		on
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura = fac_labores_codigo_factura.codigo_factura)
	WHERE 		\"15_Plantacion_completa_sin_geo_facturas_plus\".tp_codigo_tipo_plantacion = sig_tipo_de_plantacion.codigo_tipo_de_plantacion and 


			".$_GET['criterio']."
ORDER BY \"15_Plantacion_completa_sin_geo_facturas_plus\".fecha::date DESC, \"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_plantacion::int,\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura::int;";
		
$k=0;
$objWorksheet = $objPHPExcel->setActiveSheetIndex($k);


		$username = Yii::app()->user->id;
		$fecha =date("d-m-Y");
		$objPHPExcel->getActiveSheet()->setCellValueExplicit("B8", $fecha);
		$objPHPExcel->getActiveSheet()->setCellValue("F8", $username);
		//$objPHPExcel->getActiveSheet()->setCellValue("D10", $_GET['criterio']);
		
		
		
		
		
		
		$base1=strpos($_GET['criterio'],"AND");
		if (!$base1) {
			$text = substr($_GET['criterio'],0,1000);
			$objPHPExcel->getActiveSheet()->setCellValue("D11", $text);
			$text="";
			$text1="";
		}else {
		$text1 = substr($_GET['criterio'],0,$base1);
		$text = substr($_GET['criterio'],$base1+3,1000);
		$objPHPExcel->getActiveSheet()->setCellValue("D11", $text1);
		}
		
		$base1=strpos($text,"AND");
		if (!$base1) {
			$text = substr($text,0,1000);
			$objPHPExcel->getActiveSheet()->setCellValue("D12", $text);
			$text="";
			$text1="";
		}else {
		$text1 = substr($text,0,$base1);
		$text = substr($text,$base1+3,1000);
		$objPHPExcel->getActiveSheet()->setCellValue("D12", $text1);
		//$objPHPExcel->getActiveSheet()->setCellValue("E12", $text);
		}
		
		$base1=strpos($text,"AND");
		if (!$base1) {
			$text2 = substr($text,0,1000);
			$objPHPExcel->getActiveSheet()->setCellValue("D13", $text2);
			$text="";
			$text1="";
		} else{
		$text1 = substr($text,0,$base1);
		$text = substr($text,$base1+3,1000);
		$objPHPExcel->getActiveSheet()->setCellValue("D13", $text1);
		//$objPHPExcel->getActiveSheet()->setCellValue("E13", $text);
		}
		$base1=strpos($text,"AND");
		if (!$base1) {
			$text2 = substr($text,0,1000);
			$objPHPExcel->getActiveSheet()->setCellValue("D14", $text2);
			$text="";
			$text1="";
		} else{
		$text1 = substr($text,0,$base1);
		$text = substr($text,$base1+3,1000);
		$objPHPExcel->getActiveSheet()->setCellValue("D14", $text1);
		//$objPHPExcel->getActiveSheet()->setCellValue("E14", $text);
		}
		$base1=strpos($text,"AND");
		if (!$base1) {
			$text2 = substr($text,0,1000);
			$objPHPExcel->getActiveSheet()->setCellValue("D15", $text2);
			$text="";
			$text1="";
		}else {
		$text1 = substr($text,0,$base1);
		$text = substr($text,$base1+3,1000);
		$objPHPExcel->getActiveSheet()->setCellValue("D15", $text1);
		//$objPHPExcel->getActiveSheet()->setCellValue("E15", $text);
		}
		$base1=strpos($text,"AND");
		if (!$base1) {
			$text2 = substr($text,0,1000);
			$objPHPExcel->getActiveSheet()->setCellValue("D16", $text2);
			$text="";
			$text1="";
		}else {
		$text1 = substr($text,0,$base1);
		$text = substr($text,$base1+3,1000);
		$objPHPExcel->getActiveSheet()->setCellValue("D16", $text1);
		//$objPHPExcel->getActiveSheet()->setCellValue("E15", $text);
		}
		$base1=strpos($text,"AND");
		if (!$base1) {
			$text2 = substr($text,0,1000);
			$objPHPExcel->getActiveSheet()->setCellValue("D17", $text2);
			$text="";
			$text1="";
		}else {
		$text1 = substr($text,0,$base1);
		$text = substr($text,$base1+3,1000);
		$objPHPExcel->getActiveSheet()->setCellValue("D17", $text1);
		//$objPHPExcel->getActiveSheet()->setCellValue("E17", $text);
		}
		
		$base1=strpos($text,"AND");
		if (!$base1) {
			$text2 = substr($text,0,1000);
			$objPHPExcel->getActiveSheet()->setCellValue("D18", $text2);
			$text="";
			$text1="";
		}else {
		$text1 = substr($text,0,$base1);
		$text = substr($text,$base1+3,1000);
		$objPHPExcel->getActiveSheet()->setCellValue("D15", $text1);
		//$objPHPExcel->getActiveSheet()->setCellValue("E18", $text);
		}
		$base1=strpos($text,"AND");
		if (!$base1) {
			$text2 = substr($text,0,1000);
			$objPHPExcel->getActiveSheet()->setCellValue("D19", $text2);
			$text="";
			$text1="";
		}else {
		$text1 = substr($text,0,$base1);
		$text = substr($text,$base1+3,1000);
		$objPHPExcel->getActiveSheet()->setCellValue("D19", $text1);
		//$objPHPExcel->getActiveSheet()->setCellValue("E15", $text);
		}
		
$result  = pg_query($conn, $SQL);

$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation (PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.5);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.5);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.5);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.5);
//$row = pg_fetch_array($result);

//fila $m donde se empieza a escribr
$m=5;
$k=1;
$objWorksheet = $objPHPExcel->setActiveSheetIndex($k);

//aqui ponemos las fechas entre las que se busca. si no se han puesto fecha se deja en blanco
$base1=strpos($_GET['criterio'],"fecha >=");
		if (!$base1) {
			
			$text1="";
			
		}else {
		$text1 = substr($_GET['criterio'],0,$base1);
		$text = substr($_GET['criterio'],$base1+12,10);
		//$objPHPExcel->getActiveSheet()->setCellValue("b3", $text);
		$time = strtotime($text);

		$newformat = date('d-m-Y',$time);
		$objPHPExcel->getActiveSheet()->setCellValue("b3", $newformat);
		}
$base1=strpos($_GET['criterio'],"fecha <=");
		
		
		
		if (!$base1) {
			
			$text1="";
		}else {
		$text1 = substr($_GET['criterio'],0,$base1);
		$text = substr($_GET['criterio'],$base1+10,10);
		//$objPHPExcel->getActiveSheet()->setCellValue("d3", $text);
		$time = strtotime($text);

		$newformat = date('d-m-Y',$time);
		$objPHPExcel->getActiveSheet()->setCellValue("d3", $newformat);
		}
$orden =0;
while ($row = pg_fetch_array($result)){
	$orden=$orden+1;
	$objPHPExcel->getActiveSheet()->setCellValue("A".$m, $orden);
	$objPHPExcel->getActiveSheet()->setCellValue("B".$m, $row[0]);
	$objPHPExcel->getActiveSheet()->setCellValue("C".$m, $row[1]);
	$objPHPExcel->getActiveSheet()->setCellValue("D".$m, $row[2]);
	$objPHPExcel->getActiveSheet()->setCellValue("E".$m, $row[3]);
	$objPHPExcel->getActiveSheet()->setCellValue("F".$m, $row[4]);
	$objPHPExcel->getActiveSheet()->setCellValueExplicit("G".$m, $row[5]);
	$objPHPExcel->getActiveSheet()->setCellValue("H".$m, $row[6]);
	$objPHPExcel->getActiveSheet()->setCellValue("I".$m, $row[7]);
	$objPHPExcel->getActiveSheet()->setCellValue("J".$m, $row[8]);
	
	$date = str_replace('/', '-', $row[9] );
	$time = strtotime($date);
	$newformat = date('d/m/Y',$time);
		
	
	//$objPHPExcel->getActiveSheet()->setCellValueExplicit("K".$m, $row[9] );
	$objPHPExcel->getActiveSheet()->setCellValue("K".$m, $newformat );
	$objPHPExcel->getActiveSheet()->setCellValueExplicit("L".$m, $row[14]);
	
	$objPHPExcel->getActiveSheet()->setCellValue("M".$m, $row[10]);
	$objPHPExcel->getActiveSheet()->setCellValue("N".$m, $row[11]);
	$objPHPExcel->getActiveSheet()->setCellValue("O".$m, $row[12]);
	$objPHPExcel->getActiveSheet()->setCellValue("P".$m, $row[13]);
	$objPHPExcel->getActiveSheet()->setCellValue("Q".$m, $row[13]+$row[12]);
	
	$objPHPExcel->getActiveSheet()->setCellValue("R".$m, $row[15]);
	$objPHPExcel->getActiveSheet()->setCellValue("S".$m, $row[16]);
	$objPHPExcel->getActiveSheet()->setCellValue("T".$m, $row[17]);
	$objPHPExcel->getActiveSheet()->setCellValue("U".$m, $row[18]);
	$objPHPExcel->getActiveSheet()->setCellValue("W".$m, $row[19]);
	$objPHPExcel->getActiveSheet()->setCellValue("X".$m, $row[20]);
	$objPHPExcel->getActiveSheet()->setCellValue("Y".$m, $row[21]);
	$m=$m+1;
	
	
	$sql2=" SELECT
	
		  pv_detalle_factura.codigo_factura, 
		  pv_articulos.descripcion, 
		  pv_detalle_factura.cantidad,
		   pv_detalle_factura.monto_total
		FROM 
		  public.pv_detalle_factura,
		  public.pv_articulos
Where pv_detalle_factura.codigo_articulo = pv_articulos.codigo_articulo 
		  
		and  pv_detalle_factura.codigo_factura::int=".$row[14].";";

	$resufact  = pg_query($conn, $sql2);
	while ($mat = pg_fetch_array($resufact)){
		$objPHPExcel->getActiveSheet()->getStyle("L".$m)->getFont()->setBold(false)
                                ->setName('Verdana')
                                ->setSize(7)
                                ->getColor()->setRGB('3F3F3F');
		$objPHPExcel->getActiveSheet()->getStyle("M".$m)->getFont()->setBold(false)
                                ->setName('Verdana')
                                ->setSize(7)
                                ->getColor()->setRGB('3F3F3F');	
		$objPHPExcel->getActiveSheet()->getStyle("O".$m)->getFont()->setBold(false)
                                ->setName('Verdana')
                                ->setSize(7)
                                ->getColor()->setRGB('3F3F3F');			
	//$objPHPExcel->getActiveSheet()->setCellValueExplicit("J".$m, $mat[0]);
	$objPHPExcel->getActiveSheet()->setCellValueExplicit("L".$m, $mat[1]);
	$objPHPExcel->getActiveSheet()->setCellValue("M".$m, $mat[2]);
	$objPHPExcel->getActiveSheet()->setCellValue("O".$m, $mat[3]);
	
	
    $objPHPExcel->getActiveSheet()
        ->getRowDimension($m)
            ->setOutlineLevel(1)
            ->setVisible(false)
            ->setCollapsed(true);
			$m=$m+1;
	}
	
	
}	

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Facturas.xlsx"');
header('Cache-Control: max-age=0');
$objPHPExcel->getActiveSheet()->getPageSetup()->setPrintArea ('A1:Q'.$m);
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation (PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.5);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.5);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.5);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.5);
$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1,4);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->setIncludeCharts(TRUE);

$objWriter->save('php://output');

?>	
	
