<?php

class ActualizaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		if(Yii::app()->params['servidor'] == "localhost"){
			return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('index','view','getActualizaUnaTabla' ),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update','GetActualizaSigControl','GetCuentaAcces','GetTabla','GetActualizaUnaTabla','GetActualizaPrediosSig'),
					'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','delete','getActualizaUnaTabla' ,'getCuencaAno', 'getAno', 'getCuenca'),
					'users'=>array('admin'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}else{
			return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('index','view'),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update' ),
					'users'=>array('*'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','delete', 'getCuencaAno', 'getAno', 'getCuenca'),
					'users'=>array('admin'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}
	}

	
	//FUNCIONES ACTUALIZACION DE TABLAS
	

    
	
function actionGetTabla(){
	$db = "C:\\datos\\jbsoft\\jbsoft.mdb";
	$conn2= new PDO ('pgsql:host=localhost; port=5432; dbname=jbsoft','postgres', 'postgres' );
	$tabla="sig_tablas_cargar";
	$campo ="sig_tablas_cargar.Tabla_destino";
	$filas=$conn2->query('select * from sig_tablas_cargar where actualiza<>\'1\' order by ABS("rec_postgres"-"rec_access") DESC, "Tabla_origen"  ');
	$i=1;		
	echo "<table  class=\"table-sm\"
		<thead>
			<tr>
				  <th scope=\"col\"><h3><center>Tabla</center></h3></th>
				  <th scope=\"col\"><h3>Fecha de actualización&nbsp&nbsp&nbsp</h3></th>
				  <th scope=\"col\"><h3>Rec de DB-WEB&nbsp&nbsp&nbsp</h3></th>
				  <th scope=\"col\"><h3>Rec de SPSO&nbsp&nbsp&nbsp</h3></th>
			</tr>
		</thead>";
	foreach ($filas as $fila) {	
		$id = $fila['0'];
		$tabla_origen=$fila['1'];
		//print $tabla_origen;
		//echo "</br>";
		$tabla_destino=$fila['2'];
		$fecha=$fila['45'];
		$postgres=$fila['46'];
		$access=$fila['47'];
		//$campos =$fila['3']-1;	
		echo "<tr><td><div style=\"text-align:left\">".$tabla_origen."&nbsp&nbsp&nbsp</td><td>".$fecha."&nbsp&nbsp&nbsp</td><td>".$postgres."&nbsp&nbsp&nbsp</td><td>".$access."&nbsp&nbsp&nbsp</td><td><button onclick=actualizartabla(\"".$tabla_destino."\")>Actualiza</button></td></tr>";	 
	}
	echo "</table>";
}




function actionGetCuentaAccess2(){	
	//cuenta los records qe hay en cada tabla tanto en postgres como en access
	$db = "C:\\datos\\jbsoft\\jbsoft.mdb";
	$conn2= new PDO ('pgsql:host=localhost; port=5432; dbname=jbsoft','postgres','postgres');
	//$sql3="select * from sig_tablas_cargar;";
	$tabla="sig_tablas_cargar";
	$campo ="sig_tablas_cargar.Tabla_destino";
	$filas=$conn2->query('select * from sig_tablas_cargar ;');
	$i=1;
	foreach ($filas as $fila) {	
		$id = $fila['0'];
	    $tabla_origen=$fila['1'];
	    $tabla_destino=$fila['2'];
	    $campos =$fila['3']-1;
		$Tablaactualizar=$tabla_destino;
		$ca=0;
		$dsn = "odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db; Uid=; Pwd=;";
		$conn = new PDO($dsn);
		if ($conn ){ 
			print "Conectado correctamente ";
			echo "\r\n";
		}
		else 
		{
			print "NO Conectado correctamente";
			echo "\r\n";
		}
		$ca=0;
		//Leo Access
		$conn3= pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'"); 
		/*
		foreach($conn->query("SELECT * FROM  ".$tabla_origen ) as $filb) {  
			$count=(int)$filb['0'];
			//grabo				
		}
		
		*/
		//Leo postgres	
		foreach($conn2->query("SELECT count(*) FROM ".$tabla_destino ) as $filc) {

			$count=(int)$filc['0'];
			//grabo		
			$sqlupdate2 ='update sig_tablas_cargar set rec_postgres='.$count.' where "Tabla_destino" =\''.$Tablaactualizar.'\'';
			
			pg_query($conn3,$sqlupdate2);
		}
	}
}









function actionGetActualizaUnaTabla($Tablaactualizar){

	$db = "C:\\datos\\jbsoft\\jbsoft.mdb";
	echo $db;

	echo "\r\n";

	$conn2= new PDO ('pgsql:host=localhost; port=5432; dbname=jbsoft','postgres', 'postgres' );

	$tabla="sig_tablas_cargar";
	$campo ="sig_tablas_cargar.Tabla_destino";
	$filas=$conn2->query('select * from sig_tablas_cargar ;');

	$i=1;
	foreach ($filas as $fila) {
		
		$id = $fila['0'];
		$tabla_origen=$fila['1'];
			//print $tabla_origen;
			//echo "</br>";
		$tabla_destino=$fila['2'];
		$campos =$fila['3']-1;
	 
	    if ($Tablaactualizar==$tabla_destino){

			$ca=0;
			
			for ($ca=0; $ca<=$campos;$ca++){
				$index=	$ca+4;
				$tip[$ca]=$fila[$index];

			}
			$actualiza=$fila['actualiza'];
		 
		
			// Se realiza la conexón con los datos especificados anteriormente
			//1º ACCESS
			$dsn = "odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db; Uid=; Pwd=;";
			$conn = new PDO($dsn);
			


			if ($conn ){ 
				echo "Conectado correctamente "; 
				echo "\r\n";
				echo "\r\n";
				
				
						}
			else 
			{
				echo "NO Conectado correctamente";
			}

			//BORRO LA BASE DE DATOS de POSTGRES
			$conn2= pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'"); 
			$sql2 ="DELETE FROM ". $tabla_destino.";";
			$result=pg_query($conn2,$sql2);

			//inicialización variables (esto puede ser sutituido por una lectura a una base de datos.
			$ca=0;
			//LEO Access
			$cuenta=0;
			
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
						 if ($tip[$ca]=='F'){
							//if (!is_numeric($fila[$ca])) {
							if ($fila[$ca]=='') { 	
								$fila[$ca]='1900/01/01';
							$inserline=$inserline."'".$fila[$ca]."',";
							}
							else {
							$inserline=$inserline."'".$fila[$ca]."',";	
							}
						}
						if ($tip[$ca]=='B'){	
							if ($fila[$ca]=='') { 	
									$fila[$ca]='false';
							}
							$fila[$ca]=mb_convert_encoding($fila[$ca], 'utf-8', 'iso-8859-1');
							$inserline=$inserline."'".$fila[$ca]."',";
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
				if ($tip[$ca]=='F'){
					//  if (!is_numeric($fila[$ca])) {
					if ($fila[$ca]=='') { 
						$fila[$ca]='1900/01/01';
						$inserline=$inserline."'".$fila[$ca]."');";
					}
					else {
						$inserline=$inserline."'".$fila[$ca]."');";
								}
					}

					$sql2=$inserline;

					$result=pg_query($conn2,$sql2);
					$cuenta=$cuenta+1;
				}
			echo "  ACTUALIZADA  ";
			print $tabla_origen;
			echo "\r\n";
			echo "  desde  ";
			print $tabla_destino;
			echo "\r\n";
			echo " total records   ";
			print $cuenta;
			echo "\r\n";
	
			$sqlupdate ='update sig_tablas_cargar set fecha=now() where "Tabla_destino" =\''.$Tablaactualizar.'\'';
			pg_query($conn2,$sqlupdate);
			$sqlupdate ='update sig_tablas_cargar set rec_postgres='.$cuenta.' where "Tabla_destino" =\''.$Tablaactualizar.'\'';
			pg_query($conn2,$sqlupdate);
			$sqlupdate ='update sig_tablas_cargar set rec_access='.$cuenta.' where "Tabla_destino" =\''.$Tablaactualizar.'\'';
			pg_query($conn2,$sqlupdate);		
		}
	 	
	}

}
	



function actionGetActualizaSigControl($Tablaactualizar){

$conn2= new PDO ('pgsql:host=localhost; port=5432; dbname=jbsoft','postgres', 'postgres' );


$salida="select * from 20190116prediosbis;";

$entrada='select * from "20160614predio";';
//$tabla="sig_tablas_cargar";
//$campo ="sig_tablas_cargar.Tabla_destino";
$filaentrada= pg_query($conn2,$entrada);
	$i=1;
	foreach ($filaentrada as $fila) {
		
		
		$inserline='INSERT INTO "20190116prediosbis" (id) VALUES  (34);';
	  
		$sql2=$inserline;

        pg_query($conn2,$sql2);
		
		
	 	
	}

}



//////////////////////////////////////////////////	
function actionGetCuentaAcces(){

	$db = "C:\\datos\\jbsoft\\jbsoft.mdb";
	echo $db;

	$dsn = "odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db; Uid=; Pwd=;";
			$conn = new PDO($dsn);

			if ($conn ){ 
				echo "Conectado correctamente "; 
				echo "\r\n";
				echo "\r\n";
			}
			else 
			{
				echo "NO Conectado correctamente";
			}
	echo "\r\n";

	$conn2= new PDO ('pgsql:host=localhost; port=5432; dbname=jbsoft','postgres', 'postgres' );

	$tabla="sig_tablas_cargar";
	$campo ="sig_tablas_cargar.Tabla_destino";
	$filas=$conn2->query('select * from sig_tablas_cargar ;');
	
	$i=1;
	foreach ($filas as $fila) {
		
		$id = $fila['0'];
		$tabla_origen=$fila['1'];
		$tabla_destino=$fila['2'];
		$Tablaactualizar=$fila['2'];
		$campos =$fila['3']-1;
	   

			$ca=0;
			
			// Se realiza la conexón con los datos especificados anteriormente
			//1º ACCESS
			

			

			//inicialización variables (esto puede ser sutituido por una lectura a una base de datos.
			$ca=0;
			//LEO Access
			$cuenta=0;
			
			$sql_ = $conn->query("SELECT count(*) FROM ".$tabla_origen .";");
			
			if(!$sql_){
				echo "SELECT count(*) FROM ".$tabla_origen .";";
			}else{
				foreach ($sql_ as $filb) {

							$cuenta=$filb[0];
				}
				$sqlupdate = 'update sig_tablas_cargar set rec_access='.$cuenta.' where "Tabla_destino" =\''.$Tablaactualizar.'\';';
				$sqlupdate_ = $conn2->query('update sig_tablas_cargar set rec_access='.$cuenta.' where "Tabla_destino" =\''.$Tablaactualizar.'\';');
				
				
				
				
			}
			
			
			
			
				
		
	 	
	}

}	
function actionGetActualizaPrediosSig($tabla){
		
		//AQUI FALTA PONER el MES para pruebas suponemos que es siempre 5
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('insert into "20190116predios" (id,feature_ty,file_name,id_control,codigo_con, geom)
select id,feature_ty,file_name,substring(file_name,1,4)::int , substring(file_name,6,4)::int , geom
from '.$tabla.'
where feature_ty=\'tracks\' ' ) as $fila) {
			
		
						
		}	
		
		
	}




	
	
}
