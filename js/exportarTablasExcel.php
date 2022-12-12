<?php
	header("Content-Type:   application/vnd.ms-excel; charset=iso-8859-1");
	header("Content-Disposition: filename=Tabla_Entorno.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	$mostrar1 = iconv('utf-8','iso-8859-1',$_POST['datos_a_enviar1']);
	echo $mostrar1;
	$mostrar2 = iconv('utf-8','iso-8859-1',$_POST['datos_a_enviar2']);
	echo $mostrar2;
	$mostrar3 = iconv('utf-8','iso-8859-1',$_POST['datos_a_enviar3']);
	echo $mostrar3;
	$mostrar4 = iconv('utf-8','iso-8859-1',$_POST['datos_a_enviar4']);
	echo $mostrar4;
	$mostrar5 = iconv('utf-8','iso-8859-1',$_POST['datos_a_enviar5']);
	echo $mostrar5;
	$mostrar6 = iconv('utf-8','iso-8859-1',$_POST['datos_a_enviar6']);
	echo $mostrar6;
?>