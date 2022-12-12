<?php
$cnn = " host='localhost' port='5432' user='postgres' password='postgres' dbname='sigma_navteq' ";
$dbconn = pg_connect($cnn) or die('Could not connect: ' . pg_last_error());
$sql = "SELECT gid FROM portal where pob_portal is null";
$result = pg_query( $sql);
while ($row = pg_fetch_row($result)) {
	$id = $row[0];
	$sql_find = "select pob_portal from temp_portal_seccion where id_portal = ".$id;
	$result2 = pg_query( $sql_find);
	
	$row2 = pg_fetch_row($result2);
	if($row2!=null){
		$update = "update portal set pob_portal = ".$row2[0]." where gid = " . $id;
		pg_query( $update);
	}
}

// Closing connection
	pg_close($dbconn);
?>