<?php

class PuntosGanaderiaController extends Controller
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','getSelectMicrocuenca','GetSelectLagunas', 'GetSelectSistemaRiego','GetSelectReservorio','GetProductorValores','getClienteCombo','getClienteBox','getPredioCombo', 'getPredioBox', 'GetProductorPoint','getBoxMicrocuenca', 'getActividad','getPredio','getCliente', 'getLabor','getPointsIntersect','getPlantacionCombo', 'getPlantacion', 'getPlantacionSegunda','getSelectGanadero','getPointsIntersectID', 'getPlantacionEspecie','getPointsIntersectIDMuestra', 'getAllPoints', 'descargaTodo', 'getPoints', 'getCoordenadas', 'getNombreCorto', 'getNombreLargo'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
  function actionGetPlantacion($planta){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT de_codigo_plantacion, 
		pr_codigo_predio,
		nombre_proyecto,
		cs_tipo_plantacion,
		dp_fecha_plantacion::DATE,
		pr_descripcion,
		pr_tipo_tenencia_parcela
		FROM "15_Plantacion_completa"  WHERE de_codigo_plantacion::int= '.$planta  ) as $fila){
										
		    $b = null;
			$b['Plantacion'] = $fila['de_codigo_plantacion'];
			$b['Predio'] = $fila['pr_codigo_predio'];
			$b['Proyecto'] = $fila['nombre_proyecto'];
			$b['Tipo_plantacion'] = $fila['cs_tipo_plantacion'];
			$b['Fecha'] = $fila['dp_fecha_plantacion'];
			$b['Descripcion'] = $fila['pr_descripcion'];
			$b['Tenencia'] = $fila['pr_tipo_tenencia_parcela'];
			array_push($result, $b);
					
		}	
		
		echo json_encode($result);
		
	}
	
	
	function actionGetProductorPoint($planta){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  id,
		 box ((geom)) AS caja,
		 ST_XMin(geom) AS xmin,
         ST_XMax(geom) AS xmax,
         ST_YMin(geom) AS ymin,
         ST_YMax(geom) AS ymax
		FROM "gs_productor_geom_4326"   WHERE id::int=' .$planta  ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['id'];
			$b['caja'] = $fila['caja'];		
			$b['xmin'] = $fila['xmin'];
			$b['xmax'] = $fila['xmax'];
			$b['ymin'] = $fila['ymin'];
			$b['ymax'] = $fila['ymax'];
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	function actionGetPredioBox($predio){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  codigo_predio,
		codigo_plantacion,
		 box ((geom2)) AS caja,
		 ST_XMin(geom2) AS xmin,
         ST_XMax(geom2) AS xmax,
         ST_YMin(geom2) AS ymin,
         ST_YMax(geom2) AS ymax
		FROM "Solo_Plantaciones_2"   WHERE codigo_predio=' .$predio  ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo_predio'];
			$b['plantacion'] = $fila['codigo_plantacion'];
			$b['caja'] = $fila['caja'];		
			$b['xmin'] = $fila['xmin'];
			$b['xmax'] = $fila['xmax'];
			$b['ymin'] = $fila['ymin'];
			$b['ymax'] = $fila['ymax'];
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetClienteBox($cliente){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  codigo_cliente::INT,
		codigo_plantacion,
		 box ((geom2)) AS caja,
		 ST_XMin(geom2) AS xmin,
         ST_XMax(geom2) AS xmax,
         ST_YMin(geom2) AS ymin,
         ST_YMax(geom2) AS ymax
		FROM "Solo_Plantaciones_2"   WHERE codigo_cliente::int=' .$cliente  ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo_cliente'];
			$b['plantacion'] = $fila['codigo_plantacion'];
			$b['caja'] = $fila['caja'];		
			$b['xmin'] = $fila['xmin'];
			$b['xmax'] = $fila['xmax'];
			$b['ymin'] = $fila['ymin'];
			$b['ymax'] = $fila['ymax'];
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	

	 function actionGetPlantacionSegunda($plantacion){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
			 codigo_plantacion, 
			 predio, 
			 cliente, 
			 fecha_plantacion::DATE,
			 cantidad_tarea,
			 marco_de_plantacion, 
			 destiono, 
			 tipo_plantacion, 
			 proyecto,
			 actividad, 
			 dessc_plantacion , 
			 condicion, 
			 observacion, 
			 fecha_inspeccion::DATE, 
			 estatus, 
			 importe_total, 
			 balance_total, 
			 balance_inversión, 
			 sec_evaluacion, 
			 plantas_muertas, 
			 plantas_vivas, 
			 fecha_ultima_evaluacion,
			 fecha_proxima_evaluacion::DATE
			 
			FROM "Plantacion_segunda"  WHERE codigo_plantacion::int= '.$plantacion) as $fila){
										
		    $b = null;
			$b['Plantacion'] = $fila['codigo_plantacion'];
			$b['Predio'] = $fila['predio'];
			$b['Cliente'] = $fila['cliente'];
			$b['Fecha_plantacion'] = $fila['fecha_plantacion'];
			$b['Fecha_inspeccion'] = $fila['fecha_inspeccion'];
			$b['Cantidad_tarea'] = $fila['cantidad_tarea'];
			$b['Marco_de_plantacion'] = $fila['marco_de_plantacion'];
			$b['Destino'] = $fila['destiono'];
			$b['Tipo_plantacion'] = $fila['tipo_plantacion'];
			$b['Proyecto'] = $fila['proyecto'];
			$b['Actividad'] = $fila['actividad']; 
			$b['Desc_plantacion'] = $fila['dessc_plantacion']; 
			$b['Condicion'] = $fila['condicion']; 
			$b['Observacion'] = $fila['observacion']; 
			$b['Estatus'] = $fila['estatus']; 
			$b['Importe_total'] = $fila['importe_total'];
			$b['Balance_total'] = $fila['balance_total']; 
			$b['Balance_inversion'] = $fila['balance_inversión']; 
			$b['Secuencia_evaluacion'] = $fila['sec_evaluacion']; 
			$b['Plantas_muertas'] = $fila['plantas_muertas']; 
			$b['Plantas_vivas'] = $fila['plantas_vivas']; 
			$b['Fecha_ultima_inspeccion'] = $fila['fecha_ultima_evaluacion'];
			$b['Fecha_proxima_evaluacion'] = $fila['fecha_proxima_evaluacion'];			
			array_push($result, $b);
					
							
		}	
		
		echo json_encode($result);
		
	}
	
	
	
	
	function actionGetSelectGanadero($x, $y, $resolution){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  gid,  geom, productor, asociacion
		FROM "gs_productor_geom_4326"  WHERE geom && ST_Buffer(ST_Point('.$x.','.$y.'),'.$resolution.') ORDER BY productor' ) as $fila){
			   		 
		    $b = null;
			$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['productor'];
			$b['asociacion'] = $fila['asociacion'];
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	

	
	function actionGetSelectLagunas($x, $y, $resolution){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		
		$codigo_old=0;
		foreach($mbd->query('SELECT  gid,  geom, productor
		FROM "gs_laguna_geom_4326"  WHERE geom && ST_Buffer(ST_Point('.$x.','.$y.'),'.$resolution.') ORDER BY productor' ) as $fila){
			   		 
		    $b = null;
			$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['productor'];
			
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	
	function actionGetSelectReservorio($x, $y, $resolution){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  gid,  geom, productor
		FROM "gs_reservorio_geom_4326"  WHERE geom && ST_Buffer(ST_Point('.$x.','.$y.'),'.$resolution.') ORDER BY productor' ) as $fila){
			   		 
		    $b = null;
			$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['productor'];
			
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetSelectSistemaRiego($x, $y, $resolution){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  gid,  geom, productor
		FROM "gs_sistema_riego_geom_4326"  WHERE geom && ST_Buffer(ST_Point('.$x.','.$y.'),'.$resolution.') ORDER BY productor' ) as $fila){
			   		 
		    $b = null;
			$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['productor'];
			
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	
	
	function actionGetPlantacionCombo(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  codigo_plantacion
		FROM "Solo_Plantaciones"   Group by codigo_plantacion ORDER BY codigo_plantacion::int' ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo_plantacion'];
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetPredioCombo(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  codigo_predio
		FROM "Solo_Plantaciones_2"   Group by codigo_predio ORDER BY codigo_predio' ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo_predio'];
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetClienteCombo(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  codigo_cliente
		FROM "Solo_Plantaciones_2"   Group by codigo_cliente  ORDER BY codigo_cliente::int' ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo_cliente'];
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	
	function actionGetPointsIntersect($x, $y, $resolution){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  gid,  geom,
		de_codigo_plantacion AS codigo, 
		tp_descripcion_tipo_plantacion AS tipoplantacion ,
		tp_descripcio_tipo_actividad,
		nombre_paraje,
		nombre_municipio,
		nombre_provincia,
		nombre_cuenca,
		nombre_microcuenca,
		tarea_plantada::real,
		descripcion_simplificada,
		dp_total_tarea,
		ano,
		cantidad::int
		FROM "15_plantacion_completa_especies"  WHERE geom && ST_Buffer(ST_Point('.$x.','.$y.'),0.00001) ORDER BY codigo,ano ' ) as $fila){
			   		 
		    $b = null;
			$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo'];
			$b['Superficie (tareas)'] = $fila['dp_total_tarea'];
			$b['Año_plantación']= $fila['ano'];
			$b['tipo'] = $fila['tipoplantacion'];
			$b['Especie'] = $fila['descripcion_simplificada'];	
			$b['Cantidad_plantas'] = $fila['cantidad'];
			$b['Tarea_plantada'] = (float)$fila['tarea_plantada'];
			$b['Tipo_de_plantacion'] = $fila['tipoplantacion'];
			$b['Tipo_de_actividad'] = $fila['tp_descripcio_tipo_actividad'];
			$b['Paraje'] = $fila['nombre_paraje'];
			$b['Municipio'] = $fila['nombre_municipio'];
			$b['Provincia'] = $fila['nombre_provincia'];
			$b['Subcuenca'] = $fila['nombre_cuenca'];
			$b['Microcuenca'] = $fila['nombre_microcuenca'];
			
			$b['  ']='   ';
			$b['---']='   ';
			
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetPlantacionEspecie($plantacion){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
		codigo_plantacion AS codigo, 
		cantidad::int,
		tarea_plantada::real,
		codigo_control,
		fecha::DATE,
		fecha_de_inspeccion::DATE,
		desc_actividad,
		des_plantacion,
		codigo_articulo,
		nombre_articulo,
		nombre
		FROM "Plantacion_Especie_Clasificacion"  WHERE codigo_plantacion::int= '.$plantacion) as $fila){
			   		 
		    $b = null;
			$b['codigo'] = $fila['codigo'];
			$b['Año_plantación']= $fila['fecha'];
			$b['Fecha_inspeccion']= $fila['fecha_de_inspeccion'];
			$b['tipo'] = $fila['des_plantacion'];
			$b['Especie'] = $fila['nombre_articulo'];	
			$b['Cantidad_plantas'] = $fila['cantidad'];
			$b['Tarea_plantada'] = (float)$fila['tarea_plantada'];
			$b['Tipo_de_plantacion'] = $fila['des_plantacion'];
			$b['Tipo_de_actividad'] = $fila['desc_actividad'];
			
			
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	
	function actionGetProductorValores($plantacion){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
			"gs_valores".propietario AS propietario,
			"gs_productor".id AS id,
			"gs_valores".fecha_insercion AS fecha, 
			"gs_valores".ano AS ano, 
			"gs_valores".valor AS valor, 
			"gs_valores".unidad AS unidad, 
			"gs_valores".codigo_parametro AS codparametro, 
			"gs_parametros".id AS id2, 
			"gs_parametros".parametro AS parametro, 
			"gs_parametros".unidad AS unidad2
		FROM 
			"gs_valores", 
			"gs_parametros",
			"gs_productor"
		WHERE 
			"gs_valores".codigo_parametro = "gs_parametros".id and  "gs_valores".propietario = "gs_productor".productor  AND "gs_productor".id::int = '.$plantacion.' 

		ORDER BY "gs_valores".propietario, "gs_valores".codigo_parametro,  "gs_valores".ano ') as $fila){
			   		 
		    $b = null;
			$b['Productor'] = $fila['propietario'];
			$b['Fecha_insercion'] = $fila['fecha'];	
			$b['Parametro'] = $fila['parametro'];
			$b['Valor'] = $fila['valor'];
			$b['Unidad'] = $fila['unidad2'];
			$b['Ano'] = $fila['ano'];
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	 function actionGetPredio($plantacion){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
codigo_plantacion,
codigo_predio,
descripcion,
apellido,
nombre,
subcuenca,
microcuenca,
paraje,
municipio,
provincia,
seccion,
comentario,
tipo_tenencia_parcela,
tipo_suelo,
altura_sobre_nivel_mar,
promedio_pendiente_finca,
nombre_fuente_agua,
propuesta_reordenamiento_ecologico_finca,
tarea_intervenir,
colindantes_norte,
colindantes_sur,
colindantes_este,
colindantes_oeste,
especie_platar,
pendiente_area_intervenir,
codigo_tipo_actividad,
latitud,
longitud,
relieve,
exposicion,
distancia_fuente_agua,
codigo_cliente

			 
			FROM "Plantacion_Predio"  WHERE codigo_plantacion::int= '.$plantacion) as $fila){
										
		    $b = null;
$b['Plantacion']=$fila['codigo_plantacion'];
$b['Predio']=$fila['codigo_predio'];
$b['Descripcion']=$fila['descripcion'];
$b['Tecnico apellido']=$fila['apellido'];
$b['Tecnico nombre']=$fila['nombre'];
$b['Subcuenca']=$fila['subcuenca'];
$b['Microcuenca']=$fila['microcuenca'];
$b['Paraje']=$fila['paraje'];
$b['Seccion']=$fila['seccion'];
$b['Municipio']=$fila['municipio'];
$b['Provincia']=$fila['provincia'];
$b['Comentario']=$fila['comentario'];
$b['Tenencia']=$fila['tipo_tenencia_parcela'];
$b['Suelo']=$fila['tipo_suelo'];
$b['Altura_snm']=$fila['altura_sobre_nivel_mar'];
$b['Pendiente']=$fila['promedio_pendiente_finca'];
$b['Pendiente_area_intervenir']=$fila['pendiente_area_intervenir'];
$b['Fuente_agua']=$fila['nombre_fuente_agua'];
$b['Propuesta_orden.']=$fila['propuesta_reordenamiento_ecologico_finca'];
$b['Tareas_intervenir']=$fila['tarea_intervenir'];
$b['Colindantes_norte']=$fila['colindantes_norte'];
$b['Colindantes_sur']=$fila['colindantes_sur'];
$b['Colindantes_este']=$fila['colindantes_este'];
$b['Colindantes_oeste']=$fila['colindantes_oeste'];
$b['Especie_platar']=$fila['especie_platar'];
$b['Codigo_tipo_actividad']=$fila['codigo_tipo_actividad'];
$b['Latitud']=$fila['latitud'];
$b['Longitud']=$fila['longitud'];
$b['Relieve']=$fila['relieve'];
$b['Exposicion']=$fila['exposicion'];
$b['Distancia_agua']=$fila['distancia_fuente_agua'];
$b['codigo_cliente']=$fila['codigo_cliente'];

			
			array_push($result, $b);
					
							
		}	
		
		echo json_encode($result);
		
	}

 function actionGetLabor($plantacion){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
codigo_plantacion,
codigo_control,
apellido,
actividad,
plantacion,
cantidad,
labor,
fecha_plantacio,
fecha_de_inspeccion
		 
			FROM "Plantacion_Labor"  WHERE codigo_plantacion::int= '.$plantacion. 'ORDER BY fecha_plantacio') as $fila){
										
		    $b = null;
$b['codigo_plantacion']=$fila['codigo_plantacion'];
$b['codigo_control']=$fila['codigo_control'];
$b['apellido']=$fila['apellido'];
$b['actividad']=$fila['actividad'];
$b['plantacion']=$fila['plantacion'];
$b['cantidad']=$fila['cantidad'];
$b['labor']=$fila['labor'];
$b['fecha_plantacio']=$fila['fecha_plantacio'];
$b['fecha_de_inspeccion']=$fila['fecha_de_inspeccion'];
$b['-------']='---------';

			
			array_push($result, $b);
					
							
		}	
		
		echo json_encode($result);
		
	}

	
	function actionGetActividad($plantacion){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
codigo_plantacion,
codigo_control,
plantacion,
actividad,
nombre,
apellido,
fecha_de_inspeccion::DATE,
observacion,
condicion_de_la_pantacion

		 
			FROM "Plantacion_Actividad"  WHERE codigo_plantacion::int= '.$plantacion. ' ORDER BY fecha_de_inspeccion DESC' ) as $fila){
										
		    $b = null;
$b['codigo_plantacion']=$fila['codigo_plantacion'];
$b['codigo_control']=$fila['codigo_control'];
$b['plantacion']=$fila['plantacion'];
$b['actividad']=$fila['actividad'];
$b['nombre']=$fila['nombre'];
$b['apellido']=$fila['apellido'];
$b['fecha_de_inspeccion']=$fila['fecha_de_inspeccion'];
$b['observacion']=$fila['observacion'];
$b['condicion_de_la_pantacion']=$fila['condicion_de_la_pantacion'];


	
			array_push($result, $b);
					
							
		}	
		
		echo json_encode($result);
		
	}
	


		function actionGetCliente($plantacion){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
codigo_plantacion,
codigo_predio,
nombre,
apellido,
cedula,
apodo,
direccion,
seccion,
sector,
telefono_1,
correo_electronico,
fecha_creacion,
limite_de_credito,
balance_pendiente,
cuenta_de_ingreso,
fecha_ultima_venta
		 
			FROM "Plantacion_Cliente"  WHERE codigo_plantacion::int= '.$plantacion ) as $fila){
										
		    $b = null;
$b['codigo_plantacion']=$fila['codigo_plantacion'];
$b['codigo_predio']=$fila['codigo_predio'];
$b['nombre']=$fila['nombre'];
$b['apellido']=$fila['apellido'];
$b['cedula']=$fila['cedula'];
$b['apodo']=$fila['apodo'];
$b['direccion']=$fila['direccion'];
$b['seccion']=$fila['seccion'];
$b['sector']=$fila['sector'];
$b['telefono_1']=$fila['telefono_1'];
$b['correo_electronico']=$fila['correo_electronico'];
$b['fecha_creacion']=$fila['fecha_creacion'];
$b['limite_de_credito']=$fila['limite_de_credito'];
$b['balance_pendiente']=$fila['balance_pendiente'];
$b['cuenta_de_ingreso']=$fila['cuenta_de_ingreso'];
$b['fecha_ultima_venta']=$fila['fecha_ultima_venta'];
	
			array_push($result, $b);
					
							
		}	
		
		echo json_encode($result);
		
	}

function actionGetSelectMicrocuenca($x, $y, $resolution){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		
		foreach($mbd->query('SELECT  
		 nom_cuenca,
         sub_cuenca,
         mic_cuenca,
         sub_divisi
		FROM "microcuencas4326"  WHERE geom4326 && ST_Buffer(ST_Point('.$x.','.$y.'),0.00001) ORDER BY sub_divisi' ) as $fila){   		 
		    $b = null;
			$b['Cuenca'] = $fila['nom_cuenca'];
			$b['Subcuenca'] = $fila['sub_cuenca'];
			$b['Microcuenca'] = $fila['mic_cuenca'];
			$b['Nanocuenca'] = $fila['sub_divisi'];
			
			array_push($result, $b);			
		}
		echo json_encode($result);	
		
	}
function actionGetBoxMicrocuenca($x ){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		
		foreach($mbd->query('SELECT 
		gid, cod_microc::int AS id,
		nom_cuenca, 
		sub_cuenca, 
		mic_cuenca, 
		shape_leng, 
		shape_area, 
        box (ST_Transform(geom4326,3857)) AS caja,
		 ST_XMin((ST_Transform(geom4326,3857))) AS xmin,
         ST_XMax((ST_Transform(geom4326,3857))) AS xmax,
         ST_YMin((ST_Transform(geom4326,3857))) AS ymin,
         ST_YMax((ST_Transform(geom4326,3857))) AS ymax
          FROM microcuencas4326 where cod_microc::int='.$x) as $fila){   		 
		    $b = null;
			$b['id'] = $fila['id'];
			$b['caja'] = $fila['caja'];
			$b['xmin']=$fila['xmin'];
			$b['xmax']=$fila['xmax'];
			$b['ymin']=$fila['ymin'];
			$b['ymax']=$fila['ymax'];		
			array_push($result, $b);		
		 }
		echo json_encode($result);	
		
	}	
	 
}	