<?php
//voy a leer una base de datos acces y general una en psotgres
echo "</br>";
echo "</br>";
// Se especifica la ubicación de la base de datos Access (directorio actual)
//$db = getcwd() . "\\" . 'jbsoft.mdb';
// Se define la cadena de conexión
$db = "C:\\ms4w\\Apache\\htdocs\\PlanSierra\\jbsoft.mdb";
echo $db;
echo "</br>";
//$dsn = "DRIVER={Microsoft Access Driver (*.mdb)};
//DBQ=$db";
$dsn = "odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db; Uid=; Pwd=;";
// Se realiza la conexón con los datos especificados anteriormente

$conn = new PDO($dsn);
;
if ($conn ){ 
   	echo "Conectado correctamente o eso creo"; 
}
else 
{
    echo "NO Conectado correctamente";
		}

$cabecera = '<gpx creator="Garmin Desktop App" version="1.1" xsi:schemaLocation="http://www.topografix.com/GPX/1/1 http://www.topografix.com/GPX/1/1/gpx.xsd http://www.garmin.com/xmlschemas/WaypointExtension/v1 http://www8.garmin.com/xmlschemas/WaypointExtensionv1.xsd http://www.garmin.com/xmlschemas/TrackPointExtension/v1 http://www.garmin.com/xmlschemas/TrackPointExtensionv1.xsd http://www.garmin.com/xmlschemas/GpxExtensions/v3 http://www8.garmin.com/xmlschemas/GpxExtensionsv3.xsd http://www.garmin.com/xmlschemas/ActivityExtension/v1 http://www8.garmin.com/xmlschemas/ActivityExtensionv1.xsd http://www.garmin.com/xmlschemas/AdventuresExtensions/v1 http://www8.garmin.com/xmlschemas/AdventuresExtensionv1.xsd http://www.garmin.com/xmlschemas/PressureExtension/v1 http://www.garmin.com/xmlschemas/PressureExtensionv1.xsd http://www.garmin.com/xmlschemas/TripExtensions/v1 http://www.garmin.com/xmlschemas/TripExtensionsv1.xsd" xmlns="http://www.topografix.com/GPX/1/1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:wptx1="http://www.garmin.com/xmlschemas/WaypointExtension/v1" xmlns:gpxtrx="http://www.garmin.com/xmlschemas/GpxExtensions/v3" xmlns:gpxtpx="http://www.garmin.com/xmlschemas/TrackPointExtension/v1" xmlns:gpxx="http://www.garmin.com/xmlschemas/GpxExtensions/v3" xmlns:trp="http://www.garmin.com/xmlschemas/TripExtensions/v1" xmlns:adv="http://www.garmin.com/xmlschemas/AdventuresExtensions/v1" xmlns:prs="http://www.garmin.com/xmlschemas/PressureExtension/v1">';


$conn2= pg_connect("host='localhost' port='5433' user='postgres' password='postgres' dbname='jbsoft'");

echo 'SS_MICRO_CUENCAS dbase     ';
$SQL_fecha = "SELECT * FROM SS_PREDIO";


	foreach($conn->query("SELECT *	from SS_ARCHIVO_SIG WHERE registro<200") as $fila) {
		//echo "</br>";
     // print_r($fila);
	  //echo "</br>";
	 // echo "</br>";

echo "</br>";
echo $fila[0];
echo "</br>";
//$fila[1]=mb_convert_encoding($fila[1], 'utf-8', 'iso-8859-1');
echo $fila[1];
echo "--";
echo "</br>";
//echo $fila[2];
echo "</br>";
//if (!is_numeric($fila[3])) $fila[3]='null';
echo $fila[3];
//echo "</br>";
//if (!is_numeric($fila[4])) $fila[4]='null';
echo $fila[4];
//if (!is_numeric($fila[5])) $fila[5]='null';
//echo "</br>";
echo $fila[5];
echo $fila[6];
//echo "</br>";
//echo "</br>";
echo "</br>";

$registro=$fila[0];
$codigo_control=$fila[1];
$archivo=$fila[2];

$archivo2 = str_replace('<?xml version="1.0" encoding="utf-8"?><gpx creator="Garmin Desktop App" version="1.1" xsi:schemaLocation="http://www.topografix.com/GPX/1/1 http://www.topografix.com/GPX/1/1/gpx.xsd http://www.garmin.com/xmlschemas/WaypointExtension/v1 http://www8.garmin.com/xmlschemas/WaypointExtensionv1.xsd http://www.garmin.com/xmlschemas/TrackPointExtension/v1 http://www.garmin.com/xmlschemas/TrackPointExtensionv1.xsd http://www.garmin.com/xmlschemas/GpxExtensions/v3 http://www8.garmin.com/xmlschemas/GpxExtensionsv3.xsd http://www.garmin.com/xmlschemas/ActivityExtension/v1 http://www8.garmin.com/xmlschemas/ActivityExtensionv1.xsd http://www.garmin.com/xmlschemas/AdventuresExtensions/v1 http://www8.garmin.com/xmlschemas/AdventuresExtensionv1.xsd http://www.garmin.com/xmlschemas/PressureExtension/v1 http://www.garmin.com/xmlschemas/PressureExtensionv1.xsd http://www.garmin.com/xmlschemas/TripExtensions/v1 http://www.garmin.com/xmlschemas/TripExtensionsv1.xsd" xmlns="http://www.topografix.com/GPX/1/1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:wptx1="http://www.garmin.com/xmlschemas/WaypointExtension/v1" xmlns:gpxtrx="http://www.garmin.com/xmlschemas/GpxExtensions/v3" xmlns:gpxtpx="http://www.garmin.com/xmlschemas/TrackPointExtension/v1" xmlns:gpxx="http://www.garmin.com/xmlschemas/GpxExtensions/v3" xmlns:trp="http://www.garmin.com/xmlschemas/TripExtensions/v1" xmlns:adv="http://www.garmin.com/xmlschemas/AdventuresExtensions/v1" xmlns:prs="http://www.garmin.com/xmlschemas/PressureExtension/v1">', '',$archivo);

$control = fopen('c:'.$registro.'_'.$codigo_control.'.gpx','w+');
	
		$l1 = $cabecera;
		$l2 = $archivo2;
		$dd = file_put_contents('c:/gpx/'.$registro.'_'.$codigo_control.'.gpx', $l1, FILE_APPEND);
		$dd = file_put_contents('c:/gpx/'.$registro.'_'.$codigo_control.'.gpx', $l2, FILE_APPEND);
		





//$sql2 ="INSERT INTO SS_ARCHIVO_SIG (".$fila[0].",'".$fila[1]."','".$fila[2]."','".$fila[3]."','".$fila[4]."','".$fila[5]."','".$fila[6]."')  ;";
//echo $sql2;
//echo "</br>";


//$result=pg_query($conn2,$sql2);

	}
	
	

//listo todo do lo leido




$row_muestreo=pg_fetch_array($result);
$catidad=$row_muestreo[0];
echo "</br>";
echo 'SS_MICRO_CUENCAS postgres    ';
echo $catidad;


  

?>

