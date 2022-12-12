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




//foreach  ($conn2 ->$sqltablas) as file {
$conn2= new PDO ('pgsql:host=localhost; port=5433; dbname=jbsoft','postgres', 'postgres' );
//$sql3="select * from sig_tablas_cargar;";
$filas=$conn2->query('select * from sig_tablas_cargar;');

	$i=1;
	foreach ($filas as $fila) {
		
		$id = $fila['0'];
	    $tabla_origen=$fila['1'];
		print $tabla_origen;
		echo "</br>";
	    $tabla_destino=$fila['2'];
	    $campos =$fila['3']-1;
		
		
		for ($ca=0; $ca<=$campos;$ca++){
		$index=	$ca+4;
	    $tip[$ca]=$fila[$index];
		
		}
		$actualiza=$fila['actualiza'];
		 if ($actualiza=='1') {
		
// Se realiza la conexón con los datos especificados anteriormente
//1º ACCESS
$dsn = "odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db; Uid=; Pwd=;";
$conn = new PDO($dsn);

if ($conn ){ 
   	echo "Conectado correctamente "; 
}
else 
{
    echo "NO Conectado correctamente";
		}

//BORRO LA BASE DE DATOS de POSTGRES
$conn2= pg_connect("host='localhost' port='5433' user='postgres' password='postgres'dbname='jbsoft'"); 
$sql2 ="DELETE FROM ". $tabla_destino.";";
 
$result=pg_query($conn2,$sql2);

//inicialización variables (esto puede ser sutituido por una lectura a una base de datos.


$ca=0;




//LEO Access
	foreach($conn->query("SELECT * FROM ".$tabla_origen ) as $fila) {



//MODULO GENERAL. PASO DATOS LEIDOS A POSTGRESQL
 
$inserline="INSERT INTO ".$tabla_destino. " VALUES (";


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
	echo "  ACTUALIZADA   ";
	print $tabla_origen;
		echo "</br>";
	
	}
	else
	echo "  NO SE HA ACTUALIZADO   ";
	print $tabla_origen;
		echo "</br>";	
	} 

?>

