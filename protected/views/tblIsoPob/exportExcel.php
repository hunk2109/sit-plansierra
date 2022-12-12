<?php 

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');


require_once '/var/www/PHPExcel_1.8.0/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);

$model = new GeoIsopolygon();
$Criteria = new CDbCriteria();
$Criteria->condition = "gid IN (".$_GET['id'].")";
$Criteria->order = "iso";
$isos = $model->findAll($Criteria);
$i = 1;
foreach($isos as $iso){
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($iso->iso, $i, "Isocrona " . $iso->iso);
	
	
	
}
		
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Zonas de influencia.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

?>