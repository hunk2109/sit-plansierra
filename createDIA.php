<?php
$dbconn = pg_connect("host='localhost' port='5432' user='web' password='web' dbname='sigma'");

$SQL_Select = "SELECT 
  geo_cp.cp
FROM 
  public.geo_cp
WHERE cp > '37210'
ORDER BY cp";
$result = pg_query($dbconn, $SQL_Select);
$i = 0;
while ($row = pg_fetch_row($result)) {
	
	$url ="https://tutienda.dia.es/buscadorTiendas.html?action=buscarTienda&localidad=&codigoPostal=".$row[0]."&direccion=&centerX=43.247748&centerY=-2.962558700000045&numeroTiendas=0&tipoOrigen=&random=80000";
		
	$result_dia = file_get_contents($url, false);
	$json_dia = json_decode($result_dia);
	
	foreach($json_dia as $dia){
		$i = $i+1;
		if($dia->codigoPostal){
			$insert = "INSERT INTO dias(
					\"codigoPostal\", localidad, telefono, \"direccionPostal\", \"prettyUrlTienda\", 
					\"tipoTiendaDescripcion\", codigo, \"indexTienda\", \"tipoTiendaId\", 
					\"nombreVia\", \"tipoVia\", y, \"numeroVia\", x)
			VALUES ('".$dia->codigoPostal."', '".$dia->localidad."', '".$dia->telefono."', '".$dia->direccionPostal."', '".$dia->prettyUrlTienda."', 
					'".$dia->tipoTiendaDescripcion."', '".$dia->codigo."', '".$dia->indexTienda."', ".$dia->tipoTiendaId.", 
					'".$dia->nombreVia."', '".$dia->tipoVia."', ".$dia->y.", '".$dia->numeroVia."', ".$dia->x.");";
			pg_exec($dbconn,$insert);
		}
	}
}

echo "OK: ".$i;

?>