<?php
$host ='192.168.1.201';
$username ='web';
$password ='web';
$dbname = 'sierra';

	$conection = new PDO ("pgsql:dbname=$dbname;host=$host", $username, $password);
	echo 'Conexion OK" </br>';
	
	$filas=$conection->query('SELECT * FROM ss_archivo_sig;');
	
	$i=1;
	foreach ($filas as $fila){
		
		$registro = $fila['registro'];
	    $codigo_control=$fila['codigo_control'];
	    $archivo =$fila['archivo'];
	    $formato =$fila['formato'];
	    $principal =$fila['principal'];
	    $tipo_registro =$fila['tipo_registro'];
	    $fecha_registro =$fila['fecha_registro'];
		echo $registro;
		echo "</br>";
		echo $archivo;
		echo "</br>";
		echo "</br>";
;	
	}
	

?>