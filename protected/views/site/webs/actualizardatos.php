<?php 
//LEE LA HOJA EXCEL DE DATOS METEOROLOGICOS DE UNA ESTACION Y LA GUARDA EN BASE DE DATOS
//SOLO INCORPORA A LA BASE DE DATOS LAS MEDIDAS POSTERIORES A  LA FECHA MAS TARDIA DE L ABASE DE DATOS DE PARTIDA:

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');


//***********************************************************************************************************************************************************
//***********************************************************************************************************************************************************
//
// DATOS DE METEOROLOGIA
//
//***********************************************************************************************************************************************************
//***********************************************************************************************************************************************************



$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");

echo "</br>";
//echo $conn;
//Include PHPExcel 
//require_once '/var/www/PHPExcel_1.8.0/Classes/PHPExcel.php';
require_once 'c:\\MS4W/ms4w/Apache/htdocs/PlanSierra/PHPExcel_1.8.0/Classes/PHPExcel.php';
//$uploadfile = $argv[1];
$uploadfile = 'c:\\datos/sierra/Plan_Sierra_server/xls/pluviometria.xlsx';

$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($uploadfile);


$SQL_fecha = "SELECT   max(meteo.fecha)FROM   public.meteo ;";
$result  = pg_query($conn, $SQL_fecha);
$row_muestreo = pg_fetch_array($result);
$fecha_max = $row_muestreo[0];
$todayh=getdate();
$d = $todayh['mday'];
$m = $todayh['mon'];
$y = $todayh['year'];
$fecha_hoy ="$y-$m-$d"; //getdate converted day
//echo $fecha_hoy;
//echo $fecha_max;
//echo "</br>";




$sheet = $objPHPExcel->getSheet(0); 

$highestRow = $sheet->getHighestRow();

// ESATCION LA BRENA




$estacion ='La Brena';

$SQL_fecha = "SELECT   max(meteo.fecha) FROM   public.meteo WHERE estacion= '".$estacion."'; ";
$result  = pg_query($conn, $SQL_fecha);
$row_muestreo = pg_fetch_array($result);
$fecha_max = $row_muestreo[0];
$todayh=getdate();
$d = $todayh['mday'];
$m = $todayh['mon'];
$y = $todayh['year'];
$fecha_hoy ="$y-$m-$d"; //getdate converted day
//echo $fecha_hoy;
//echo $todayh;
//echo "</br>";
//echo $fecha_max;
//echo "</br>";



for($i = 9; $i<=$highestRow; $i++){
	//$fecha = PHPExcel_Style_NumberFormat::toFormattedString($sheet->getCell('A'.$i)->getCalculatedValue(), 'yyyy-mm-dd');	
	$ano=$sheet->getCell('B'.$i)->getCalculatedValue();
	$control=$sheet->getCell('A'.$i)->getCalculatedValue();
	
	
	if ($control !='') {
	$precip=$sheet->getCell('C'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'01-31';
	
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
    $precip=$sheet->getCell('D'.$i)->getCalculatedValue();
	
	$fecha=$ano.'-'.'02-27';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('E'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'03-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}

$precip=$sheet->getCell('F'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'04-30';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('G'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'05-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}

$precip=$sheet->getCell('H'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'06-30';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('I'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'07-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('J'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'08-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('K'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'09-30';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('L'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'10-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('M'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'11-30';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}

$precip=$sheet->getCell('N'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'12-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
 


}
}
echo "ACTUALIZADA ESTACION : ";
echo $estacion;
 echo "</br>";
 echo "</br>";

$sheet = $objPHPExcel->getSheet(1); 

$highestRow = $sheet->getHighestRow();

$estacion ='Los Montones';
$SQL_fecha = "SELECT   max(meteo.fecha)FROM   public.meteo WHERE estacion= '".$estacion."'; ";
$result  = pg_query($conn, $SQL_fecha);
$row_muestreo = pg_fetch_array($result);
$fecha_max = $row_muestreo[0];
$todayh=getdate();
$d = $todayh['mday'];
$m = $todayh['mon'];
$y = $todayh['year'];
$fecha_hoy ="$y-$m-$d"; //getdate converted day
echo $fecha_hoy;
echo $todayh;
echo "</br>";
echo $fecha_max;
echo "</br>";

for($i = 9; $i<=$highestRow; $i++){
	//$fecha = PHPExcel_Style_NumberFormat::toFormattedString($sheet->getCell('A'.$i)->getCalculatedValue(), 'yyyy-mm-dd');	
	$ano=$sheet->getCell('B'.$i)->getCalculatedValue();
	$control=$sheet->getCell('A'.$i)->getCalculatedValue();
	
	
	if ($control !='') {
	$precip=$sheet->getCell('C'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'01-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('D'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'02-27';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('E'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'03-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}

$precip=$sheet->getCell('F'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'04-30';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('G'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'05-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}

$precip=$sheet->getCell('H'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'06-30';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('I'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'07-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('J'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'08-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('K'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'09-30';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('L'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'10-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('M'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'11-30';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}

$precip=$sheet->getCell('N'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'12-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}



}
}
echo "ACTUALIZADA ESTACION : ";
 echo $estacion;
 echo "</br>";
 echo "</br>";

$sheet = $objPHPExcel->getSheet(2); 

$highestRow = $sheet->getHighestRow();

$estacion ='Sajoma';

$SQL_fecha = "SELECT   max(meteo.fecha)FROM   public.meteo WHERE estacion= '".$estacion."'; ";
$result  = pg_query($conn, $SQL_fecha);
$row_muestreo = pg_fetch_array($result);
$fecha_max = $row_muestreo[0];
$todayh=getdate();
$d = $todayh['mday'];
$m = $todayh['mon'];
$y = $todayh['year'];
$fecha_hoy ="$y-$m-$d"; //getdate converted day
echo $fecha_hoy;
echo $todayh;
echo "</br>";
echo $fecha_max;
echo "</br>";
for($i = 9; $i<=$highestRow; $i++){
	//$fecha = PHPExcel_Style_NumberFormat::toFormattedString($sheet->getCell('A'.$i)->getCalculatedValue(), 'yyyy-mm-dd');	
	$ano=$sheet->getCell('B'.$i)->getCalculatedValue();
	$control=$sheet->getCell('A'.$i)->getCalculatedValue();
	
	
	if ($control !='') {
	$precip=$sheet->getCell('C'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'01-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
	$precip=$sheet->getCell('D'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'02-27';
	//echo $precip.'   '.$fecha.'    '.$fecha_max;
	
	if ($fecha >$fecha_max ){
		echo "</br>";
		echo "1  HOLA              HOLA";
		echo "</br>";
		if (is_numeric($precip)){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('E'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'03-31';
	if ($fecha >$fecha_max ){
		if ($precip!=''){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}

$precip=$sheet->getCell('F'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'04-30';
	if ($fecha >$fecha_max ){
		if (is_numeric($precip)){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('G'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'05-31';
	if ($fecha >$fecha_max ){
		if (is_numeric($precip)){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}

$precip=$sheet->getCell('H'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'06-30';
	if ($fecha >$fecha_max ){
		if (is_numeric($precip)){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('I'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'07-31';
	if ($fecha >$fecha_max ){
		if (is_numeric($precip)){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('J'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'08-31';
	if ($fecha >$fecha_max ){
		if (is_numeric($precip)){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('K'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'09-30';
	if ($fecha >$fecha_max ){
		if (is_numeric($precip)){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('L'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'10-31';
	if ($fecha >$fecha_max ){
		if (is_numeric($precip)){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}
$precip=$sheet->getCell('M'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'11-30';
	if ($fecha >$fecha_max ){
		if (is_numeric($precip)){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}

$precip=$sheet->getCell('N'.$i)->getCalculatedValue();
	$fecha=$ano.'-'.'12-31';
	if ($fecha >$fecha_max ){
		if (is_numeric($precip)){
			echo $fecha;
			echo "</br>";
			echo $precip;
			echo "</br>";
		
			$SQL_METEO ="INSERT INTO meteo ( fecha,  precip, estacion,fecha_inserccion) VALUES ( '".$fecha."',".$precip." ,'".$estacion."' ,'".$fecha_hoy."');";
			pg_query($conn, $SQL_METEO);
			echo $SQL_METEO;
			echo "</br>";
	}
}



}
}

echo "ACTUALIZADA ESTACION : ";
 echo $estacion;
 echo "</br>";
 echo "</br>";












//***********************************************************************************************************************************************************
//***********************************************************************************************************************************************************
//
// DATOS DE GANADERIA
//
//***********************************************************************************************************************************************************
//***********************************************************************************************************************************************************


//***********************************************************************************************************************************************************
//
// DATOS Productores
//
//***********************************************************************************************************************************************************


$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");

echo "</br>";
//echo $conn;
/** Include PHPExcel */
//require_once '/var/www/PHPExcel_1.8.0/Classes/PHPExcel.php';

/**$uploadfile = $argv[1];*/
$uploadfile = 'c:\\datos/sierra/Plan_Sierra_server/xls/PRODUCTORES.xlsx';


$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($uploadfile);

$sheet = $objPHPExcel->getSheet(1); 

$highestRow = $sheet->getHighestRow();
echo $uploadfile;
echo "</br>";
echo $highestRow ;
//$highestRow=251;


echo "</br>";
$SQL_fecha = "SELECT   max(id) FROM   public.gs_productor;";
$result  = pg_query($conn, $SQL_fecha);
$row_muestreo = pg_fetch_array($result);
$fecha_max = $row_muestreo[0];

echo $fecha_max;

for($i = 6; $i<=$highestRow; $i++){
	$fid = $sheet->getCell('A'.$i)->getCalculatedValue();	
	
 
	if ($fid >$fecha_max ){
		$fid = $sheet->getCell('A'.$i)->getCalculatedValue();
		$productor = $sheet->getCell('B'.$i)->getCalculatedValue();
		$celula = $sheet->getCell('C'.$i)->getCalculatedValue();
		$asociacion = $sheet->getCell('D'.$i)->getCalculatedValue();
		$coord_x = $sheet->getCell('E'.$i)->getCalculatedValue();
		$coord_y = $sheet->getCell('F'.$i)->getCalculatedValue();
		
		$SQL_METEO ="INSERT INTO gs_productor ( id, productor,asociacion, celula,coord_x,coord_y) VALUES ( '".$fid."', '".$productor."','".$asociacion."', '".$celula."', ".$coord_x.",".$coord_y." );";
		//$SQL_METEO ="INSERT INTO meteo ( fecha, t_min, t_max, t_media, precip) VALUES ( '".$fecha."',".$tmin.",".$tmax.", ".$tmedia.",".$precip." );";
		pg_query($conn, $SQL_METEO);
		
	
}


}
echo "</br>";
echo "Actualizado gs_productores";
echo "</br>";

//***********************************************************************************************************************************************************
//
// DATOS Centros de acopio
//
//***********************************************************************************************************************************************************



$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");

echo "</br>";
//echo $conn;
/** Include PHPExcel */
//require_once '/var/www/PHPExcel_1.8.0/Classes/PHPExcel.php';

/**$uploadfile = $argv[1];*/
$uploadfile = 'c:\\datos/sierra/Plan_Sierra_server/xls/PRODUCTORES.xlsx';


$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($uploadfile);

$sheet = $objPHPExcel->getSheet(2); 

$highestRow = $sheet->getHighestRow();
echo $uploadfile;
echo "</br>";
echo $highestRow ;
//$highestRow=251;


echo "</br>";
$SQL_fecha = "SELECT   max(id) FROM   public.gs_centro_acopio;";
$result  = pg_query($conn, $SQL_fecha);
$row_muestreo = pg_fetch_array($result);
$fecha_max = $row_muestreo[0];

echo $fecha_max;

for($i = 2; $i<=$highestRow; $i++){
	$fid = $sheet->getCell('A'.$i)->getCalculatedValue();	
	
 
	if ($fid >$fecha_max ){
		$fid = $sheet->getCell('A'.$i)->getCalculatedValue();
		$centro = $sheet->getCell('B'.$i)->getCalculatedValue();
		
		$coord_x = $sheet->getCell('C'.$i)->getCalculatedValue();
		$coord_y = $sheet->getCell('D'.$i)->getCalculatedValue();
		
		$SQL_METEO ="INSERT INTO gs_centro_acopio ( id,centro,coord_x,coord_y) VALUES ( '".$fid."', '".$centro."', ".$coord_x.",".$coord_y." );";
		//$SQL_METEO ="INSERT INTO meteo ( fecha, t_min, t_max, t_media, precip) VALUES ( '".$fecha."',".$tmin.",".$tmax.", ".$tmedia.",".$precip." );";
		pg_query($conn, $SQL_METEO);
		
	
}


}
echo "</br>";
echo "Actualizado gs_centro_acopios";
echo "</br>";


//***********************************************************************************************************************************************************
//
// DATOS Lagunas
//
//***********************************************************************************************************************************************************



$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");

echo "</br>";
//echo $conn;
/** Include PHPExcel */
//require_once '/var/www/PHPExcel_1.8.0/Classes/PHPExcel.php';

/**$uploadfile = $argv[1];*/
$uploadfile = 'c:\\datos/sierra/Plan_Sierra_server/xls/PRODUCTORES.xlsx';


$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($uploadfile);

$sheet = $objPHPExcel->getSheet(3); 

$highestRow = $sheet->getHighestRow();
echo $uploadfile;
echo "</br>";
echo $highestRow ;
//$highestRow=251;


echo "</br>";
$SQL_fecha = "SELECT   max(id) FROM   public.gs_laguna;";
$result  = pg_query($conn, $SQL_fecha);
$row_muestreo = pg_fetch_array($result);
$fecha_max = $row_muestreo[0];

echo $fecha_max;

for($i = 5; $i<=$highestRow; $i++){
	$fid = $sheet->getCell('A'.$i)->getCalculatedValue();	
	
 
	if ($fid >$fecha_max ){
		$fid = $sheet->getCell('A'.$i)->getCalculatedValue();
		$productor = $sheet->getCell('B'.$i)->getCalculatedValue();
		$ubicacion = $sheet->getCell('C'.$i)->getCalculatedValue();
		$coord_x = $sheet->getCell('D'.$i)->getCalculatedValue();
		$coord_y = $sheet->getCell('E'.$i)->getCalculatedValue();
		
		$SQL_METEO ="INSERT INTO gs_laguna ( id,productor,ubicacion,coord_x,coord_y) VALUES ( '".$fid."', '".$productor."', '".$ubicacion."', ".$coord_x.",".$coord_y." );";
		//$SQL_METEO ="INSERT INTO meteo ( fecha, t_min, t_max, t_media, precip) VALUES ( '".$fecha."',".$tmin.",".$tmax.", ".$tmedia.",".$precip." );";
		pg_query($conn, $SQL_METEO);
		
	
}


}
echo "</br>";
echo "Actualizado gs_lagunas";
echo "</br>";
	


//***********************************************************************************************************************************************************
//
// DATOS Reservorio
//
//***********************************************************************************************************************************************************



$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");

echo "</br>";
//echo $conn;
/** Include PHPExcel */
//require_once '/var/www/PHPExcel_1.8.0/Classes/PHPExcel.php';

/**$uploadfile = $argv[1];*/
$uploadfile = 'c:\\datos/sierra/Plan_Sierra_server/xls/PRODUCTORES.xlsx';


$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($uploadfile);

$sheet = $objPHPExcel->getSheet(4); 

$highestRow = $sheet->getHighestRow();
echo $uploadfile;
echo "</br>";
echo $highestRow ;
//$highestRow=251;


echo "</br>";
$SQL_fecha = "SELECT   max(id) FROM   public.gs_reservorio;";
$result  = pg_query($conn, $SQL_fecha);
$row_muestreo = pg_fetch_array($result);
$fecha_max = $row_muestreo[0];

echo $fecha_max;

for($i = 4; $i<=$highestRow; $i++){
	$fid = $sheet->getCell('A'.$i)->getCalculatedValue();	
	
 
	if ($fid >$fecha_max ){
		$fid = $sheet->getCell('A'.$i)->getCalculatedValue();
		$productor = $sheet->getCell('B'.$i)->getCalculatedValue();
		$ubicacion = $sheet->getCell('C'.$i)->getCalculatedValue();
		$coord_x = $sheet->getCell('D'.$i)->getCalculatedValue();
		$coord_y = $sheet->getCell('E'.$i)->getCalculatedValue();
		
		$SQL_METEO ="INSERT INTO gs_reservorio ( id,productor,ubicacion,coord_x,coord_y) VALUES ( '".$fid."', '".$productor."', '".$ubicacion."', ".$coord_x.",".$coord_y." );";
		//$SQL_METEO ="INSERT INTO meteo ( fecha, t_min, t_max, t_media, precip) VALUES ( '".$fecha."',".$tmin.",".$tmax.", ".$tmedia.",".$precip." );";
		pg_query($conn, $SQL_METEO);
		
	
}


}
echo "</br>";
echo "Actualizado gs_reservorio";
echo "</br>";




//***********************************************************************************************************************************************************
//
// DATOS Sistema de riego
//
//***********************************************************************************************************************************************************



$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");

echo "</br>";
//echo $conn;
/** Include PHPExcel */
//require_once '/var/www/PHPExcel_1.8.0/Classes/PHPExcel.php';

/**$uploadfile = $argv[1];*/
$uploadfile = 'c:\\datos/sierra/Plan_Sierra_server/xls/PRODUCTORES.xlsx';


$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($uploadfile);

$sheet = $objPHPExcel->getSheet(5); 

$highestRow = $sheet->getHighestRow();
echo $uploadfile;
echo "</br>";
echo $highestRow ;
//$highestRow=251;


echo "</br>";
$SQL_fecha = "SELECT   max(id) FROM   public.gs_sistema_riego;";
$result  = pg_query($conn, $SQL_fecha);
$row_muestreo = pg_fetch_array($result);
$fecha_max = $row_muestreo[0];

echo $fecha_max;

for($i = 4; $i<=$highestRow; $i++){
	$fid = $sheet->getCell('A'.$i)->getCalculatedValue();	
	
 
	if ($fid >$fecha_max ){
		$fid = $sheet->getCell('A'.$i)->getCalculatedValue();
		$productor = $sheet->getCell('B'.$i)->getCalculatedValue();
		$ubicacion = $sheet->getCell('C'.$i)->getCalculatedValue();
		$coord_x = $sheet->getCell('D'.$i)->getCalculatedValue();
		$coord_y = $sheet->getCell('E'.$i)->getCalculatedValue();
		
		$SQL_METEO ="INSERT INTO gs_sistema_riego ( id,productor,ubicacion,coord_x,coord_y) VALUES ( '".$fid."', '".$productor."', '".$ubicacion."', ".$coord_x.",".$coord_y." );";
		//$SQL_METEO ="INSERT INTO meteo ( fecha, t_min, t_max, t_media, precip) VALUES ( '".$fecha."',".$tmin.",".$tmax.", ".$tmedia.",".$precip." );";
		pg_query($conn, $SQL_METEO);
		
	
}


}
echo "</br>";
echo "Actualizado gs_sistema_riego";
echo "</br>";





//***********************************************************************************************************************************************************
//***********************************************************************************************************************************************************
//
// METAS ACUMULADAS (GANADERIA)
//
//***********************************************************************************************************************************************************
//***********************************************************************************************************************************************************


//***********************************************************************************************************************************************************
//
// METAS Fomento
//
//***********************************************************************************************************************************************************

//$conn2= pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'"); 
//		$sql2 ="DELETE FROM ". $tabla_destino.";";
//		$result=pg_query($conn2,$sql2);



$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");
$SQL_fecha = "SELECT  id, parametro, columna, ano,unidad,fichero,hoja,tipo,control_intro,columna_propietario, unidades FROM   public.gs_parametros ORDER BY id;";
$result  = pg_query($conn, $SQL_fecha);

$uploadfile = 'c:\\datos/sierra/Plan_Sierra_server/xls/METAS ACUMULADAS.xlsx';


$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($uploadfile);
$sheetNames = $objPHPExcel->getSheetNames();
echo '<pre>';
print_r($sheetNames);
echo '</pre>';
//$sheet = $objPHPExcel->getSheetByName('FOMENTO');
$todayh=getdate();
$d = $todayh['mday'];
$m = $todayh['mon'];
$y = $todayh['year'];
$fecha_hoy ="$y-$m-$d"; 
$indice=20;

$sql2 ="DELETE FROM gs_valores;";
$id_max  = pg_query($conn, $sql2);


$SQL_max ="SELECT max(id) FROM gs_valores;";
$id_max  = pg_query($conn, $SQL_max);
$id_row = pg_fetch_array($id_max);
$indice= $id_row[0] + 1;



while ($data = pg_fetch_object($result)) {
//	SELECT  id, parametro, columna, ano,unidad,fichero,hoja,tipo,control_intro,columna_propietario
  $id = $data->id;
  $parametro= $data->parametro;
  $columna= $data->columna;
  $ano=$data->ano;
  $control_intro=$data->control_intro;
  $columna_propietario=$data->columna_propietario;
  $unidad_particular=$data->unidades;
  $hoja=$data->hoja;
  $sheet = $objPHPExcel->getSheetByName($hoja);
 echo $id;
echo "</br>";

 $highestRow = $sheet->getHighestRow();
  for($colum=1;$colum<=$highestRow;$colum++){
		$control_input=$sheet->getCell($control_intro.$colum)->getCalculatedValue();
		$g=$sheet->getCell($columna.$colum)->getCalculatedValue();
		$s=$sheet->getCell($columna_propietario.$colum)->getCalculatedValue();
		$u='';
		if ($unidad_particular!=''){
		 $u=$sheet->getCell($unidad_particular.$colum)->getCalculatedValue();
		}
     if (is_numeric($control_input)) {
 
		if ($g!='') {
			$SQL_METEO ="INSERT INTO gs_valores ( id,parametro,propietario,valor,fecha_insercion, ano, codigo_parametro, unidad, fila ) VALUES ( '".$indice."', '".$parametro."', '".$s."', '".$g."','".$fecha_hoy."','".$ano."','".$id."','".$u."','".$colum."' );";
			//$SQL_METEO ="INSERT INTO meteo ( fecha, t_min, t_max, t_media, precip) VALUES ( '".$fecha."',".$tmin.",".$tmax.", ".$tmedia.",".$precip." );";
			pg_query($conn, $SQL_METEO);
			$indice=$indice+1;
		}
	}
  }

}






 $data = pg_fetch_object($result, 6);

echo 'gs_parametros';
echo "</br>";
echo $data->id;
echo $data->parametro;






echo "</br>";
echo "Metas Fomento";
echo "</br>";


//***********************************************************************************************************************************************************
//***********************************************************************************************************************************************************
//
// DATOS DE POA
//
//***********************************************************************************************************************************************************
//***********************************************************************************************************************************************************



$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");
$SQL_fecha = "SELECT  id, parametro, columna, ano,unidad,fichero,hoja,tipo,control_intro,columna_propietario, unidades,grupo FROM   public.poa_parametros ORDER BY id;";
$result  = pg_query($conn, $SQL_fecha);

//las dos siguientes lineas son provisionales, es para limpiar la base de datos mientras las pruebas

$sql2 ="DELETE FROM poa_valores;";
$id_max  = pg_query($conn, $sql2);

//$sheet = $objPHPExcel->getSheetByName('FOMENTO');
$todayh=getdate();
$d = $todayh['mday'];
$m = $todayh['mon'];
$y = $todayh['year'];
$fecha_hoy ="$y-$m-$d"; 
$indice=20;


$SQL_max ="SELECT max(id) FROM poa_valores;";
$id_max  = pg_query($conn, $SQL_max);
$id_row = pg_fetch_array($id_max);
$indice= $id_row[0] + 1;



while ($data = pg_fetch_object($result)) {
	$archivo=$data->fichero;
	$grupo=$data->grupo;
   	$uploadfile = 'c:\\datos/sierra/Plan_Sierra_server/xls/'.$archivo;
	$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objPHPExcel = $objReader->load($uploadfile);
	$sheetNames = $objPHPExcel->getSheetNames();
	echo '<pre>';
	print_r($sheetNames);
	echo '</pre>';
  
  
  
  
  
	  $id = $data->id;
	  $parametro= $data->parametro;
	  $columna= $data->columna;
	  $ano=$data->ano;
	  $control_intro=$data->control_intro;
	  $columna_propietario=$data->columna_propietario;
	  $unidad_particular=$data->unidades;
	  $hoja=$data->hoja;
	  $sheet = $objPHPExcel->getSheetByName($hoja);
	 echo $id;
	echo "</br>";

 $highestRow = $sheet->getHighestRow();
  for($colum=1;$colum<=$highestRow;$colum++){
		$control_input=$sheet->getCell($control_intro.$colum)->getCalculatedValue();
		$g=$sheet->getCell($columna.$colum)->getCalculatedValue();
		$s=$sheet->getCell($columna_propietario.$colum)->getCalculatedValue();
		$u='';
		if ($unidad_particular!=''){
		 $u=$sheet->getCell($unidad_particular.$colum)->getCalculatedValue();
		}
     if (is_numeric($control_input)) {
 
		if ($g!='') {
			$SQL_METEO ="INSERT INTO poa_valores ( id,parametro,propietario,valor,fecha_insercion, ano, codigo_parametro, codigo_micro_cuenca, id_tipo_2 ) 
			VALUES ( '".$indice."', '".$parametro."', '".$s."', '".$g."','".$fecha_hoy."','".$ano."','".$id."','".$control_input."','".$grupo."' );";
			
			pg_query($conn, $SQL_METEO);
			$indice=$indice+1;
		}
	}
  }

}






?>