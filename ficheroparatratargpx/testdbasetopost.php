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



$conn2= pg_connect("host='localhost' port='5433' user='postgres' password='postgres' dbname='jbsoft'");

echo 'SS_MICRO_CUENCA dbase     ';
//$SQL_fecha = "SELECT * FROM SS_PREDIO";


	foreach($conn->query("SELECT * FROM SS_MICRO_CUENCA") as $fila) {
		//echo "</br>";
     // print_r($fila);
	  //echo "</br>";
	 // echo "</br>";

echo "</br>";
echo $fila[0];
echo "</br>";
$fila[1]=mb_convert_encoding($fila[1], 'utf-8', 'iso-8859-1');
echo $fila[1];
echo "--";
echo "</br>";
//echo $fila[2];
echo "</br>";
if (!is_numeric($fila[3])) $fila[3]='null';
echo $fila[3];
//echo "</br>";
if (!is_numeric($fila[4])) $fila[4]='null';
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


$sql2 ="INSERT INTO SS_MICRO_CUENCA VALUES (".$fila[0].",'".$fila[1]."','".$fila[2]."',".$fila[3].",".$fila[4].",'".$fila[5]."')  ;";
//echo $sql2;
//echo "</br>";


$result=pg_query($conn2,$sql2);

	}
	
	

//listo todo do lo leido




//$row_muestreo=pg_fetch_array($result);
//$catidad=$row_muestreo[0];
echo "</br>";
echo 'SS_MICRO_CUENCAS postgres    ';
echo $catidad;


  

?>

