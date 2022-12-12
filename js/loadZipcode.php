<?php
$cnn = " host='localhost' port='5432' user='postgres' password='postgres' dbname='sigma' ";
$dbconn = pg_connect($cnn) or die('Could not connect: ' . pg_last_error());
$file = fopen("/home/sigma/" . $argv[1], 'r'); 
while (!feof($file)) {
	$insert = "INSERT INTO tbl_zc_consolidado(cod_zipcode, cp, venta_si, venta_no, venta_ns, folleto_si, 
            folleto_no, folleto_ns)VALUES (";
	$line = fgets($file);
	
	$elementos  = explode (";", $line);
	$insert = $insert . $elementos[0] . ", '";
	$insert = $insert . $elementos[1] . "', ";
	$insert = $insert . str_replace(",", ".", $elementos[2]). ", ";
	$insert = $insert . str_replace(",", ".", $elementos[3]). ", ";
	$insert = $insert . str_replace(",", ".", $elementos[4]). ", ";
	$insert = $insert . str_replace(",", ".", $elementos[5]). ", ";
	$insert = $insert . str_replace(",", ".", $elementos[6]). ", ";
	$insert = $insert . str_replace(",", ".", $elementos[7]). ");";
	//pg_query($cnn, $insert);
	$result = pg_query( $insert);

	//dump the result object
	var_dump($result);
	//echo $insert . "<br>";
	
}
// Closing connection
	pg_close($dbconn);
?>