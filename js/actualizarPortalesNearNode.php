<?php
$cnn = " host='localhost' port='5432' user='postgres' password='postgres' dbname='sigma_navteq' ";
$dbconn = pg_connect($cnn) or die('Could not connect: ' . pg_last_error());
$sql = "SELECT gid FROM portal where near_node is null limit 2000000";
$result = pg_query( $sql);
while ($row = pg_fetch_row($result)) {
	$id = $row[0];
	$sql_find = "SELECT 
			   DISTINCT ON (senal.gid) senal.gid, port.id, ST_Distance(port.the_geom, senal.geom_utm)  as dist
			FROM portal As senal, streets_vertices_pgr As port  
			WHERE ST_DWithin(port.the_geom, senal.geom_utm, 100)  and gid = ".$id."
			ORDER BY senal.gid, port.id, ST_Distance(port.the_geom, senal.geom_utm) ;";
	$result2 = pg_query( $sql_find);
	
	$row2 = pg_fetch_row($result2);
	if($row2!=null){
		$update = "update portal set near_node = ".$row2[0]." where gid = " . $id;
		pg_query( $update);
	}
}

// Closing connection
	pg_close($dbconn);
?>