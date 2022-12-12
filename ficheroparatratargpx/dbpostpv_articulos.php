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
//2ª POSTGRESQL
$conn2= pg_connect("host='localhost' port='5433' user='postgres' password='postgres' dbname='jbsoft'");
$sqltablas= "select * from sig_tablas_cargar";
//foreach  ($conn2 ->$sqltablas) as file {



// Se realiza la conexón con los datos especificados anteriormente
//1º ACCESS
$dsn = "odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db; Uid=; Pwd=;";
$conn = new PDO($dsn);


;
if ($conn ){ 
   	echo "Conectado correctamente o eso creo"; 
}
else 
{
    echo "NO Conectado correctamente";
		}




//BORRO LA BASE DE DATOS de POSTGRES
$sql2 ="DELETE FROM PV_ARTICULOS;";
$result=pg_query($conn2,$sql2);

//inicialización variables (esto puede ser sutituido por una lectura a una base de datos.

PRINT $result;
$campos=21;


//T cualquier cosa que no sea numerico
//sigue pendiente el tratamiento de las comillas.
$tip[0]='T';
$tip[1]='T';
$tip[2]='T';
$tip[3]='N';
$tip[4]='N';
$tip[5]='T';
$tip[6]='T';
$tip[7]='N';
$tip[8]='N';
$tip[9]='T';
$tip[10]='T';
$tip[11]='T';
$tip[12]='T';
$tip[13]='T';
$tip[14]='T';
$tip[15]='N';
$tip[16]='T';
$tip[17]='T';
$tip[18]='T';
$tip[19]='T';
$tip[20]='T';
$tip[21]='T';
$tip[22]='T';
$tip[23]='T';
$tip[24]='T';
$tip[25]='T';
$tip[26]='T';
$tip[27]='T';
$tip[28]='T';
$tip[29]='T';
$ca=0;




//LEO Access
	foreach($conn->query("SELECT * FROM PV_ARTICULOS") as $fila) {
		//echo "</br>";
     // print_r($fila);
	  //echo "</br>";
	 // echo "</br>";

//VIGILO VALORES ANOMALOS
//CUIDADO CON LOS NUMERICOSS VACIOS"
//CAMBIO DE FORMATO POR ACENTOS Y OTROS
//$fila[1]=mb_convert_encoding($fila[1], 'utf-8', 'iso-8859-1');
//SI UN VALOR NUMERICO ESTA VACIO HAY QUE PONER UN NULL
//if (!is_numeric($fila[3])) $fila[3]='null';
//if (!is_numeric($fila[4])) $fila[4]='null';





//MODULO GENERAL. PASO DATOS LEIDOS A POSTGRESQL
 
$inserline="INSERT INTO PV_ARTICULOS VALUES (";
for ($ca=0;$ca<$campos;$ca++) {
    if ($tip[$ca]=='T'){	
        $fila[$ca]=mb_convert_encoding($fila[$ca], 'utf-8', 'iso-8859-1');
		$inserline=$inserline."'".$fila[$ca]."',";
    }
    if ($tip[$ca]=='N'){
        if (!is_numeric($fila[$ca])) $fila[$ca]='null';
		$inserline=$inserline.$fila[$ca].",";
    }

}


$ca=$campos;
  if ($tip[$ca]=='T'){	
        $fila[$ca]=mb_convert_encoding($fila[$ca], 'utf-8', 'iso-8859-1');
		$inserline=$inserline."'".$fila[$ca]."');";
  }
  if ($tip[$ca]=='N'){
        if (!is_numeric($fila[$ca])) $fila[$ca]='null';
		$inserline=$inserline.$fila[$ca].");";
  }


$sql2=$inserline;

$result=pg_query($conn2,$sql2);

	}
	
	//insert el valor leido CUIDADO CON LAS COMILLAS SOLO HAY QUE UTILIZARLO EN LOS TEXTOS
/*$sql2 ="INSERT INTO PV_ARTICULOS VALUES ('".$fila[0]."','".$fila[1]."','".$fila[2]."',".$fila[3].",".$fila[4].",'".$fila[5]."'
,'".$fila[6]."',".$fila[7].",".$fila[8].",'".$fila[9]."','".$fila[10]."','".$fila[11]."'
,'".$fila[12]."','".$fila[13]."','".$fila[14]."',".$fila[15].",'".$fila[16]."','".$fila[17]."'
,'".$fila[18]."','".$fila[19]."','".$fila[20]."','".$fila[21]."')  ;";*/


  

?>

