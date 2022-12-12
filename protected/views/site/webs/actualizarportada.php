<?php 
//LEE LA HOJA EXCEL DE DATOS METEOROLOGICOS DE UNA ESTACION Y LA GUARDA EN BASE DE DATOS
//SOLO INCORPORA A LA BASE DE DATOS LAS MEDIDAS POSTERIORES A  LA FECHA MAS TARDIA DE L ABASE DE DATOS DE PARTIDA:

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');


//LEE DATOS METEOROLOGICOS
//VERSION ANTIGUA

/*$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");

echo "</br>";
//echo $conn;
//Include PHPExcel 
require_once '/var/www/PHPExcel_1.8.0/Classes/PHPExcel.php';

//$uploadfile = $argv[1];
$uploadfile = 'c:\\datos/sierra/Plan_Sierra_server/xls/meteo2.xlsx';

$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($uploadfile);


$sheet = $objPHPExcel->getSheet(0); 

$highestRow = $sheet->getHighestRow();
echo $uploadfile;
echo "</br>";
echo $highestRow ;
//$highestRow=251;
echo "</br>";
$SQL_fecha = "SELECT   max(meteo.fecha)FROM   public.meteo;";
$result  = pg_query($conn, $SQL_fecha);
$row_muestreo = pg_fetch_array($result);
$fecha_max = $row_muestreo[0];

echo $fecha_max;
echo "</br>";

for($i = 2; $i<=$highestRow; $i++){
	$fecha = PHPExcel_Style_NumberFormat::toFormattedString($sheet->getCell('A'.$i)->getCalculatedValue(), 'yyyy-mm-dd');	
	

	if ($fecha >$fecha_max ){
		$tmin = $sheet->getCell('B'.$i)->getCalculatedValue();
		$tmax = $sheet->getCell('C'.$i)->getCalculatedValue();
		$tmedia = $sheet->getCell('D'.$i)->getCalculatedValue();
		$precip = $sheet->getCell('E'.$i)->getCalculatedValue();
		echo $fecha;
		echo "</br>";
		echo $fecha_max;
		$SQL_METEO ="INSERT INTO meteo ( fecha, t_min, t_max, t_media, precip) VALUES ( '".$fecha."',".$tmin.",".$tmax.", ".$tmedia.",".$precip." );";
		pg_query($conn, $SQL_METEO);
		echo $SQL_METEO;
		echo "</br>";
	
}
}*/

//VERSION NUEVA

echo "</br>";
echo "<h5>Esta pagina permite actualizar las bases de datos de del SIT-Plan Sierra</h5>";
echo "</br>";
echo "<h5>Lo hace desde diversas fuentes </h5>";
echo "</br>";
echo "<h4>	-Actualiza desde Excel.- Actualiza datos desde las hojas EXCEL (meteo, ganaderia y POA)</h4>";
echo "</br>";
echo "<h4>	-Actualiza desde ACCESS.- Actualiza datos desde ACCESS (SPSO)</h4>";
echo "</br>";
echo "<h4>	-Actualiza desde GPX.- Actualiza ficheros desde GPX</h4>";
echo "</br>";
echo "<h4>	-Actualiza Fichero SIG de poligonos- Actualiza ficheros SIG de SPSO</h4>";
echo "</br>";

//***********************************************************************************************************************************************************
//
// DATOS Sistema de riego
//
//***********************************************************************************************************************************************************




?>