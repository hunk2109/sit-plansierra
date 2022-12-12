<?php
$cnn = " host='localhost' port='5432' user='postgres' password='postgres' dbname='sigma' ";
$dbconn = pg_connect($cnn) or die('Could not connect: ' . pg_last_error());
$file = fopen("/home/sigma/" . $argv[1], 'r'); 
while (!feof($file)) {
	
	$insert = "INSERT INTO tbl_cl_registros(fecha, cp, tipo_fuente, cod_edad, num_clientes) VALUES ('";
	$line = fgets($file);
		
	$elementos  = explode (";", $line);
	$insert = $insert . $elementos[0] . "01', '";
	$insert = $insert . $elementos[1] . "', ";
	$insert = $insert . $elementos[2] . ", ";
	$insert = $insert . $elementos[3] . ", ";
	$insert = $insert . $elementos[4] . ");";
	
	//pg_query($cnn, $insert);
	$result = pg_query( $insert);

	//dump the result object
	var_dump($result);
	//echo $insert . "<br>";
	
}
// Closing connection
	pg_close($dbconn);
?>