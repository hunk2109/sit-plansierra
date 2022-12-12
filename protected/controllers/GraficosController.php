<?php

class GraficosController extends Controller
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
					'actions'=>array('index','view'),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update', 'getCuencaAno', 'getAno', 'getCuenca','GetCuencaAnoEspecies','GetCuencaAnoex','GetCuencaEspecies', 'getPSAno', 'getPS', 'getPSActividad','GetPSAnoEspecies','GetPSAnoex','GetPSEspecies' , 'getPSsubAno', 'getPSsub','GetPSsubAnoEspecies','GetPSsubAnoex','GetPSEspecies','GetPSsubCuencas','GetPSsubAnoCuencas','GetCuenMicrEspe','getPSsubMicroCuencas','GetPSAnoEspeciesActividad','GetPSsubAnoCuencasActividad','GetPSsubActividad' ),
					'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','delete', 'getCuencaAno', 'getAno', 'getCuenca'),
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
					'actions'=>array('create','update', 'getCuencaAno', 'getAno', 'getCuenca'),
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

	
	//FUNCIONES GRAFICAS POR MICROCUENCA
	

    function actionGetCuencaAno($ano, $miccuenca){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		clase_red AS especie, 
		tareas_plantadas AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" 
		WHERE ano::int = '.$ano.' AND codigo_micro_cuenca::int=' .$miccuenca. ' ORDER BY tareas_plantadas DESC' ) as $fila) {
										
		$b = null;
			$b['name'] = $fila['especie'];
			$b['y'] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	 function actionGetCuencaAnoEspecies($miccuenca){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		clase_red AS especie, 
		ano,
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" 
		WHERE codigo_micro_cuenca::int=' .$miccuenca. 'Group BY ano, clase_red ORDER BY clase_red DESC' ) as $fila) {
										
		$b = null;
			$b['especie'] = $fila['especie'];
			$b['cantidad'] = (float)$fila['cantidad'];
			$b['ano'] = $fila['ano'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	 function actionGetCuencaAnoex($miccuenca){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		ano
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" 
		WHERE codigo_micro_cuenca::int=' .$miccuenca. 'Group BY ano ORDER BY ano ASC' ) as $fila) {
										
		$b = null;
			$b['ano'] = $fila['ano'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	 function actionGetCuencaEspecies($miccuenca){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		clase_red AS especie, 
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" 
		WHERE codigo_micro_cuenca::int=' .$miccuenca. 'Group BY  clase_red ORDER BY cantidad DESC' ) as $fila) {
										
		$b = null;
			$b['especie'] = $fila['especie'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}

	  function actionGetCuenca( $miccuenca){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		clase_red AS especie, 
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" 
		WHERE  codigo_micro_cuenca::int=' .$miccuenca. 'GROUP by clase_red ORDER BY cantidad DESC ') as $fila) {
										
		$b = null;
			$b['name'] = $fila['especie'];
			$b['y'] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	public function actionGetAno($id){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		foreach($mbd->query('SELECT descripcion AS especie, sum(area_especie) as cantidad, min(ano) AS year FROM "es_totales_areas_nombres"  WHERE ano = '.$id.' GROUP BY especie, ano ORDER BY cantidad asc') as $fila) {
										
		$b = null;
			$b['name'] = $fila['especie'];
			$b['y'] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}

	
	
	
	
	
	// FUNCIONES GRAFCIAS PARA TODO EL PLAN SIERRA
	
	function actionGetPSAno($ano){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		clase_red AS especie, 
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" 
		WHERE ano::int = '.$ano.' GROUP BY   clase_red ORDER BY cantidad DESC' ) as $fila) {
										
		$b = null;
			$b['name'] = $fila['especie'];
			$b['y'] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	 function actionGetPSAnoEspecies(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		clase_red AS especie, 
		ano,
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" 
		Group BY ano, clase_red ORDER BY clase_red' ) as $fila) {
										
		$b = null;
			$b['especie'] = $fila['especie'];
			$b['cantidad'] = (float)$fila['cantidad'];
			$b['ano'] = $fila['ano'];
			array_push($rs, $b);
						
		}
		
		echo json_encode($rs);
		
	}
	
	function actionGetPSAnoEspeciesActividad($tipoactividad){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		clase_red AS especie, 
		ano,
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie_Activida" 
		WHERE codigo_tipo_actividad::int='.$tipoactividad.'
		Group BY ano, clase_red 
		ORDER BY cantidad DESC' ) as $fila) {
										
		$b = null;
			$b['especie'] = $fila['especie'];
			$b['cantidad'] = (float)$fila['cantidad'];
			$b['ano'] = $fila['ano'];
			array_push($rs, $b);
						
		}
		
		echo json_encode($rs);
		
	}
	
	 function actionGetPSAnoex(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		ano
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" Where ano::int>2009 Group BY ano ORDER BY ano ASC' ) as $fila) {
										
		$b = null;
			$b['ano'] = $fila['ano'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	 function actionGetPSEspecies(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		clase_red AS especie, 
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" Group BY  clase_red ORDER BY cantidad DESC' ) as $fila) {
										
		$b = null;
			$b['especie'] = $fila['especie'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}

	  function actionGetPS( ){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		clase_red AS especie, 
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie"  GROUP by clase_red ORDER BY cantidad DESC ') as $fila) {
										
		$b = null;
			$b['name'] = $fila['especie'];
			$b['y'] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetPSActividad($tipoactividad ){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		clase_red AS especie, 
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie_Actividad"  
		Where ano > 2009 and codigo_tipo_actividad::int='.$tipoactividad.'
		GROUP by clase_red ORDER BY cantidad DESC ') as $fila) {
		





		
		$b = null;
			$b['name'] = $fila['especie'];
			$b['y'] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	// FUNCIONES GRAFCIAS PARA subcuencas
	
	function actionGetPSsubAno($ano){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		
										
		foreach($mbd->query('SELECT 
		ss_cuenca.descripcion AS especie, 
		sum ("Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".tareas_plantadas) AS cantidad
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie", ss_cuenca 
		WHERE   "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".codigo_cuenca = ss_cuenca.codigo_cuenca AND ano::int = '.$ano.'
		GROUP BY  ss_cuenca.descripcion ORDER BY cantidad DESC ') as $fila) {						
										
										
										
		$b = null;
			$b['name'] = $fila['especie'];
			$b['y'] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	 function actionGetPSsubAnoCuencas(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		ano,
		ss_cuenca.descripcion AS cuenca,
		sum(tareas_plantadas) As cantidad
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie", ss_cuenca 
		WHERE   "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".codigo_cuenca = ss_cuenca.codigo_cuenca
		GROUP by ano, cuenca' ) as $fila) {
										
		$b = null;
			$b['cuenca'] = $fila['cuenca'];
			$b['cantidad'] = (float)$fila['cantidad'];
			$b['ano'] = $fila['ano'];
			array_push($rs, $b);
						
		}
		
		echo json_encode($rs);
		
	}
	function actionGetPSsubAnoCuencasActividad($tipoactividad){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		ano,
		ss_cuenca.descripcion AS cuenca,
		sum(tareas_plantadas) As cantidad
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie_Activida", ss_cuenca 
		WHERE   "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie_Activida".codigo_cuenca = ss_cuenca.codigo_cuenca AND
		"Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie_Activida".codigo_tipo_actividad::int='.$tipoactividad.'
		GROUP by ano, cuenca' ) as $fila) {
										
		$b = null;
			$b['cuenca'] = $fila['cuenca'];
			$b['cantidad'] = (float)$fila['cantidad'];
			$b['ano'] = $fila['ano'];
			array_push($rs, $b);
						
		}
		
		echo json_encode($rs);
		
	}

	 function actionGetPSsubAnoex(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

						 
		foreach($mbd->query('SELECT 
		ano
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" 
		WHERE     ano::int>2009 Group BY ano ORDER BY ano ASC' ) as $fila) {
										
		$b = null;
			$b['ano'] = $fila['ano'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	 function actionGetPSsubCuencas(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

						 
						 			 
						 
		foreach($mbd->query('SELECT 
		ss_cuenca.descripcion  AS cuenca 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie", ss_cuenca 
		WHERE   "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".codigo_cuenca = ss_cuenca.codigo_cuenca
		GROUP BY  ss_cuenca.descripcion  ' ) as $fila) {
										
		$b = null;
			$b['cuenca'] = $fila['cuenca'];
			array_push($rs, $b);				
		}	
		echo json_encode($rs);
		
	}

	function actionGetPSsubMicroCuencas(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

						 
						 			 
						 
		foreach($mbd->query('SELECT 
			ss_micro_cuenca.codigo_micro_cuenca, 
			ss_micro_cuenca.descripcion AS micro_cuenca, 
			ss_cuenca.descripcion AS cuenca, 
			ss_micro_cuenca.codigo_cuenca
			FROM 
			public.ss_micro_cuenca, 
			public.ss_cuenca
			WHERE 
			ss_micro_cuenca.codigo_cuenca = ss_cuenca.codigo_cuenca' ) as $fila) {
										
		$b = null;
			$b['microcuenca'] = $fila['micro_cuenca'];
			$b['cuenca'] = $fila['cuenca'];
			array_push($rs, $b);				
		}	
		echo json_encode($rs);
		
	}

	
		
	
	
	
	  function actionGetPSsub(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		ss_cuenca.descripcion AS especie, 
		sum ("Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".tareas_plantadas) AS cantidad
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie", ss_cuenca 
		WHERE   "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".codigo_cuenca = ss_cuenca.codigo_cuenca
		GROUP BY  ss_cuenca.descripcion ORDER BY cantidad DESC ') as $fila) {
			
			
		$b = null;
			$b['name'] = $fila['especie'];
			$b['y'] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	 function actionGetPSsubActividad($tipoactividad){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		ss_cuenca.descripcion AS especie, 
		sum ("Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie_Activida".tareas_plantadas) AS cantidad
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie_Activida", ss_cuenca 
		WHERE   "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie_Activida".codigo_cuenca = ss_cuenca.codigo_cuenca AND  "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie_Activida".codigo_tipo_actividad::int='.$tipoactividad.'
		GROUP BY  ss_cuenca.descripcion ORDER BY cantidad DESC ') as $fila) {
			
			
		$b = null;
			$b['name'] = $fila['especie'];
			$b['y'] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}

  function actionGetCuenMicrEspe(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
  
  "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".codigo_cuenca AS codigo_cuenca, 
  "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".codigo_micro_cuenca AS codigo_micro_cuenca, 
  "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".clase_red AS clase_red , 
  sum("Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".tareas_plantadas) AS tareas, 
  sum ("Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".plantas_plantadas) as plantas, 
  ss_cuenca.descripcion AS cuenca, 
  ss_micro_cuenca.descripcion As microcuenca,
  min(sig_color_2.color) as color
FROM 
  public."Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie", 
  public.ss_micro_cuenca, 
  public.ss_cuenca,
  public.sig_color_2
WHERE 
  "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".codigo_cuenca = ss_cuenca.codigo_cuenca AND
  "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".codigo_micro_cuenca = ss_micro_cuenca.codigo_micro_cuenca AND
  "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".clase_red =sig_color_2.descripcion
 GROUP BY "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".codigo_cuenca, 
  "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".codigo_micro_cuenca, 
  "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie".clase_red,
  ss_cuenca.descripcion, 
  ss_micro_cuenca.descripcion') as $fila) {
			
			
		$b = null;
			$b['codigo_cuenca'] = $fila['codigo_cuenca'];
			$b['codigo_micro_cuenca'] = $fila['codigo_micro_cuenca'];
			$b['especie'] = $fila['clase_red'];
			$b['tareas'] =(float) $fila['tareas'];
			$b['plantas'] = $fila['plantas'];
			$b['cuenca'] = $fila['cuenca'];
			$b['microcuenca'] = $fila['microcuenca'];
			$b['color']= (float)$fila['color'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}



	
}
