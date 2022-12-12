<?php
//voy a leer una base de datos acces y general una en psotgres

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

//AHORA DEFINO POSTGRES

$conn2= pg_connect("host='localhost' port='5433' user='postgres' password='postgres' dbname='jbsoft'");

echo 'SS_MICRO_CUENCA POSTGRESQL    ';


//Y BORRO LA BASE DE DATOS


$sql2 ="DELETE FROM SS_MICRO_CUENCA;";

$result=pg_query($conn2,$sql2);

PRINT $result;




//LEO Access
	foreach($conn->query("SELECT * FROM SS_MICRO_CUENCA") as $fila) {
		//echo "</br>";
     // print_r($fila);
	  //echo "</br>";
	 // echo "</br>";

//VIGILO VALORES ANOMALOS
//CUIDADO CON LOS NUMERIOCS VACIOS"
//CAMBIO DE FORMATO POR ACENTOS Y OTROS
$fila[1]=mb_convert_encoding($fila[1], 'utf-8', 'iso-8859-1');
//SI UN VALOR NUMERICO ESTA VACIO HAY QUE PONER UN NULL
if (!is_numeric($fila[3])) $fila[3]='null';
if (!is_numeric($fila[4])) $fila[4]='null';



//insert el valor leido CUIDADO CON LAS COMILLAS SOLO HAY QUE UTILIZARLO EN LOS TEXTOS


$sql2 ="INSERT INTO SS_MICRO_CUENCA VALUES (".$fila[0].",'".$fila[1]."','".$fila[2]."',".$fila[3].",".$fila[4].",'".$fila[5]."')  ;";
$result=pg_query($conn2,$sql2);

	}
	
	


  

?>

