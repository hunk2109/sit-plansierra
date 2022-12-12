<?php
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




$SQL_fecha = "SELECT * FROM SS_PREDIO";

//foreach($conn->query("SELECT descripcion from SS_PREDIO  WHERE codigo_predio = '102'") as $fila) {
	foreach($conn->query("SELECT count(descripcion) AS numero_records from SS_MICRO_CUENCA ") as $fila) {
        //print_r($fila);
    }
echo "</br>";
echo 'SS_MICRO_CUENCAS dbase     ';
echo $fila['numero_records'];
echo "</br>";



$conn2= pg_connect("host='192.168.1.202' port='5432' user='web' password='web' dbname='jbsoft'");
$sql2 ="SELECT descripcion AS numero_records from SS_MICRO_CUENCA;";
$result=pg_query($conn2,$sql2);
$row_muestreo=pg_fetch_array($result);
$catidad=$row_muestreo[0];
echo "</br>";
echo 'SS_MICRO_CUENCAS postgres    ';
echo $catidad;


  

?>

