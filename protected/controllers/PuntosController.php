<?php

class PuntosController extends Controller
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
				'actions'=>array('create','update','GetPlantacionComboSinGeo','GetDestinoCombo','GetProyectoCombo','GetActividadCombo','GetTPlantacionCombo','GetFacturaCombo',
				'GetPlantacionBoxSubcuenca','GetPlantacionFacturaLabores','GetPlantacionFacturaPlantas','getSelectMicrocuenca','getPlantacionEspecieSumatorio','getClienteCombo','getClienteBox','getPredioCombo', 'getPredioBox', 'GetPlantacionBox','getBoxMicrocuenca', 'getActividad','getPredio','getCliente', 'getLabor','getPointsIntersect','getPlantacionCombo', 'getPlantacion', 'getPlantacionSegunda','getSelectPlantacion','getPointsIntersectID', 'getPlantacionEspecie','getPointsIntersectIDMuestra', 'getAllPoints', 'descargaTodo', 'getPoints', 'getCoordenadas', 'getNombreCorto', 'getNombreLargo','GetPlantacionSeleccionBox'),
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
		pl_fecha_plantacion::DATE,
		pr_descripcion,
		pr_tipo_tenencia_parcela
		FROM "15_Plantacion_completa"  WHERE de_codigo_plantacion::int= '.$planta  ) as $fila){
										
		    $b = null;
			$b['Plantacion'] = $fila['de_codigo_plantacion'];
			$b['Predio'] = $fila['pr_codigo_predio'];
			$b['Proyecto'] = $fila['nombre_proyecto'];
			$b['Tipo_plantacion'] = $fila['cs_tipo_plantacion'];
			$b['Fecha'] = $fila['pl_fecha_plantacion'];
			$b['Descripcion'] = $fila['pr_descripcion'];
			$b['Tenencia'] = $fila['pr_tipo_tenencia_parcela'];
			array_push($result, $b);
					
		}	
		
		echo json_encode($result);
		
	}
	
	 
	 function actionGetPlantacionFacturaPlantas($plantacion){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT fac_plantas.codigo_plantacion, 
  fac_plantas.codigo_control, 
  fac_plantas.codigo_cliente, 
 fac_plantas.fecha ::DATE ,
  fac_plantas.codigo_factura, 
  fac_plantas.plantas, 
  fac_plantas.tareas, 
  fac_plantas.inversion_plantas
FROM 
  public.fac_plantas  WHERE fac_plantas.codigo_plantacion::int= '.$plantacion  ) as $fila){
										
		    $b = null;
			$b['Plantacion'] = $fila['codigo_plantacion'];
			$b['Codigo_Control'] = $fila['codigo_control'];
			$b['Cliente'] = $fila['codigo_cliente'];
			$b['Fecha'] = $fila['fecha'];
			$b['Factura'] = $fila['codigo_factura'];
			$b['Plantas'] = $fila['plantas'];
			$b['Tareas'] = $fila['tareas'];
			$b['Inversion_plantas'] = $fila['inversion_plantas'];
			array_push($result, $b);
					
		}	
		
		echo json_encode($result);
		
	}
	  function actionGetPlantacionFacturaLabores($plantacion){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
  fac_labores.codigo_control, 
  fac_labores.coste_labores, 
  ss_detalle_plantacio.codigo_plantacion
FROM 
  public.fac_labores, 
  public.ss_detalle_plantacio
WHERE 
  fac_labores.codigo_control = ss_detalle_plantacio.codigo_control and codigo_plantacion::int ='.$plantacion  ) as $fila){
										
		    $b = null;
			
			$b['Codigo_Control'] = $fila['codigo_control'];
			$b['Plantacion'] = $fila['codigo_plantacion'];
			$b['coste_labores'] = $fila['coste_labores'];
			array_push($result, $b);
					
		}	
		
		echo json_encode($result);
		
	}
	
	function actionGetPlantacionBox($planta){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  codigo_plantacion,
		 box ((geom2)) AS caja,
		 ST_XMin(geom2) AS xmin,
         ST_XMax(geom2) AS xmax,
         ST_YMin(geom2) AS ymin,
         ST_YMax(geom2) AS ymax
		FROM "Solo_Plantaciones"   WHERE codigo_plantacion::int=' .$planta  ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo_plantacion'];
			$b['caja'] = $fila['caja'];		
			$b['xmin'] = $fila['xmin'];
			$b['xmax'] = $fila['xmax'];
			$b['ymin'] = $fila['ymin'];
			$b['ymax'] = $fila['ymax'];
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetPlantacionSeleccionBox($criterio2){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  geom, gid, de_codigo_plantacion,
		 box ((geom)) AS caja,
		 ST_XMin(geom) AS xmin,
         ST_XMax(geom) AS xmax,
         ST_YMin(geom) AS ymin,
         ST_YMax(geom) AS ymax
		FROM "15_Plantacion_completa" WHERE st_area(geom)!=0 and '  .$criterio2  ) as $fila){
			 
 


			 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['de_codigo_plantacion'];
			$b['caja'] = (float)$fila['caja'];		
			$b['xmin'] = (float)$fila['xmin'];
			$b['xmax'] = (float)$fila['xmax'];
			$b['ymin'] = (float)$fila['ymin'];
			$b['ymax'] = (float)$fila['ymax'];
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	
	function actionGetPlantacionBoxSubcuenca($cuenca){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
			cod_cuenca AS codigo,
		 box ((geom4326)) AS caja,
		 ST_XMin(geom4326) AS xmin,
         ST_XMax(geom4326) AS xmax,
         ST_YMin(geom4326) AS ymin,
         ST_YMax(geom4326) AS ymax
		FROM microcuencas4326_completo   WHERE cod_cuenca::int=' .$cuenca  ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo'];
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
	
	
	
	
	function actionGetSelectPlantacion($x, $y, $resolution){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  gid,  geom2, codigo_plantacion
		FROM "Solo_Plantaciones"  WHERE geom2 && ST_Buffer(ST_Point('.$x.','.$y.'),0.00001) ORDER BY codigo_plantacion' ) as $fila){
			   		 
		    $b = null;
			$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo_plantacion'];
					
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
	
	function actionGetPlantacionComboSinGeo(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  codigo_plantacion
		FROM "Solo_Plantaciones_2_NOSIG"   Group by codigo_plantacion ORDER BY codigo_plantacion::int' ) as $fila){
			   		 
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
	
	function actionGetProyectoCombo(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
  "15_Plantacion_completa".nombre_proyecto
FROM 
  public."15_Plantacion_completa"
GROUP BY 
"15_Plantacion_completa".nombre_proyecto  ORDER BY "15_Plantacion_completa".nombre_proyecto' ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['nombre_proyecto'];
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetActividadCombo(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
  "15_Plantacion_completa".tp_descripcio_tipo_actividad
FROM 
  public."15_Plantacion_completa"
GROUP BY 
"15_Plantacion_completa".tp_descripcio_tipo_actividad  ORDER BY "15_Plantacion_completa".tp_descripcio_tipo_actividad' ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['tp_descripcio_tipo_actividad'];
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetTPlantacionCombo(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
  "15_Plantacion_completa".tp_descripcion_tipo_plantacion
FROM 
  public."15_Plantacion_completa"
GROUP BY 
"15_Plantacion_completa".tp_descripcion_tipo_plantacion  ORDER BY "15_Plantacion_completa".tp_descripcion_tipo_plantacion' ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['tp_descripcion_tipo_plantacion'];
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetFacturaCombo(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
  fac_plantas.codigo_factura::int
FROM 
  public.fac_plantas
  ORDER BY fac_plantas.codigo_factura::int;' ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo_factura'];
					
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	
	
	
	function actionGetDestinoCombo(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
  "15_Plantacion_completa".pl_destino
FROM 
  public."15_Plantacion_completa"
GROUP BY 
"15_Plantacion_completa".pl_destino  ORDER BY "15_Plantacion_completa".pl_destino' ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['pl_destino'];
					
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
	
	
	
	function actionGetPlantacionEspecieSumatorio($plantacion){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
		codigo_plantacion AS codigo,
		sum(cantidad::int) AS cantidad_total,
		nombre_articulo
		
		FROM "Plantacion_Especie_Clasificacion"  WHERE codigo_plantacion::int= '.$plantacion. ' GROUP BY  nombre_articulo,codigo_plantacion ') as $fila){
			   		 
		    $b = null;
			$b['codigo'] = $fila['codigo'];
			$b['Especie'] = $fila['nombre_articulo'];	
			$b['Cantidad_plantas'] = $fila['cantidad_total'];
					
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