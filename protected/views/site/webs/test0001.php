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
   	echo "Conectado correctamente o al menos eso creo"; 
}
else 
{
    echo "NO Conectado correctamente";
		}




$SQL_fecha = "SELECT * FROM SS_PREDIO";

//foreach($conn->query("SELECT descripcion from SS_PREDIO  WHERE codigo_predio = '102'") as $fila) {
	foreach($conn->query("SELECT count(descripcion) AS numero_records from SS_PREDIO ") as $fila) {
        //print_r($fila);
    }
echo "</br>";;
echo 'SS_PREDIO      ';

echo $fila['numero_records'];
echo "</br>";
foreach($conn->query("SELECT count(codigo_plantacion) AS numero_records from SS_PLANTACION ") as $fila) {
        //print_r($fila);
    }

echo 'SS_PLANTACION      ';

echo $fila['numero_records'];
echo "</br>";


echo "</br>";
//$result = odbc_exec($conn, $SQL_fecha;
//$row_muestreo =odbc_fetch_array($result);
//$fecha_max = $row_muestreo[0];
//echo $fecha_max;
?>
