<?php

class EstadisticasController extends Controller
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
					'actions'=>array('create','update','GetSubContarEspeciesFechaCuencaG','GetSubContarEspeciesFechaCuenca','GetSubCuencaTotalEspeciePlantar','GetSubCuencaTotal','GetContarEspeciesFechaCuencaG','GetContarEspeciesFechaCuenca','GetCuencaTotalTecnico','GetCuencaTotalEspeciePlantar','GetCuencaTotal','getEstadActividad','GetContarElementos','GetContarElementosNosig','GetPSAno','GetContarProyectosNosig','GetAreaParcela','GetAreaParcelaActividad','GetContarEspecies','GetContarPlantacion','GetContarProyectos','GetContarEspeciesActividad',
					'GetContarPlantacionActividad','GetContarProyectosActividad','GetContarProyectosNosigActividad','GetPSAnoActividad'),
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
					'actions'=>array('create','update', 'GetCuencaTotal','getEstadActividad','GetContarElementos','GetContarElementosNosig' ,'getCuencaAno', 'getAno', 'getCuenca'),
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
	

    
	
	function actionGetEstadActividad(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		actividad, 
		sum(cantidad) AS plantas,
		sum(tarea_plantada) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas" 
		 Group BY  actividad ORDER BY cantidad DESC' ) as $fila) {
			
		$b = null;
			$b['actividad'] = $fila['actividad'];
			$b['tareas'] = (float)$fila['cantidad'];
			$b['plantas'] = (float)$fila['plantas'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
		
	
	
		function actionGetContarElementos(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
		count (distinct codigo_plantacion) AS plantaciones,
        count (distinct codigo_predio) AS predios,
        count (distinct codigo_cliente) AS clientes
		FROM "Solo_Plantaciones_2"   ' ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['plantaciones'] = $fila['plantaciones'];
		    $b['predios'] = $fila['predios'];
			$b['clientes'] = $fila['clientes'];	
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	
	
	function actionGetContarElementosNosig(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
		count (distinct codigo_plantacion) AS plantaciones,
        count (distinct codigo_predio) AS predios,
        count (distinct codigo_cliente) AS clientes
		FROM "Solo_Plantaciones_2_NOSIG"   ' ) as $fila){
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['plantaciones'] = $fila['plantaciones'];
		    $b['predios'] = $fila['predios'];
			$b['clientes'] = $fila['clientes'];	
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	function actionGetContarEspecies(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
          nombre_red AS tipo, 
          sum(tarea_plantada) AS tareas, 
           sum (cantidad) AS plantas
        FROM  "Estadisticas_Plantaciones_Clasificadas" GROUP BY nombre_red ORDER by tareas DESC') as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['tipo'] = $fila['tipo'];
		    $b['tareas'] =(float) $fila['tareas'];
			$b['plantas'] =(float) $fila['plantas'];	
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	function actionGetContarEspeciesActividad($tipoactividad){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
          nombre_red AS tipo, 
          sum(tarea_plantada) AS tareas, 
           sum (cantidad) AS plantas
        FROM  "Estadisticas_Plantaciones_Clasificadas" 
		WHERE codigo_tipo_actividad::int='.$tipoactividad.'
		GROUP BY nombre_red ORDER by tareas DESC') as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['tipo'] = $fila['tipo'];
		    $b['tareas'] =(float) $fila['tareas'];
			$b['plantas'] =(float) $fila['plantas'];	
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetContarPlantacion(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
          plantacion AS tipo, 
          sum(tarea_plantada) AS tareas, 
           sum (cantidad) AS plantas
        FROM  "Estadisticas_Plantaciones_Clasificadas" GROUP BY Plantacion ORDER by tareas DESC') as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['tipo'] = $fila['tipo'];
		    $b['tareas'] =(float) $fila['tareas'];
			$b['plantas'] =(float) $fila['plantas'];	
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetContarPlantacionActividad($tipoactividad){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
          plantacion AS tipo, 
          sum(tarea_plantada) AS tareas, 
           sum (cantidad) AS plantas
        FROM  "Estadisticas_Plantaciones_Clasificadas" 
		WHERE codigo_tipo_actividad::int='.$tipoactividad.'
		GROUP BY Plantacion ORDER by tareas DESC') as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['tipo'] = $fila['tipo'];
		    $b['tareas'] =(float) $fila['tareas'];
			$b['plantas'] =(float) $fila['plantas'];	
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
function actionGetContarProyectos(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
           proyecto,
           count (distinct codigo_plantacion) as cantidad
        FROM  "Solo_Plantaciones_2"
        Group by proyecto
        Order by proyecto asc ') as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['proyecto'] = $fila['proyecto'];
			$b['plantaciones'] = (float)$fila['cantidad'];
		    
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	function actionGetContarProyectosActividad($tipoactividad){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
           proyecto,
           count (distinct codigo_plantacion) as cantidad
        FROM  "Solo_Plantaciones_2",
		ss_tipo_actividad
		WHERE ss_tipo_actividad.codigo_tipo_actividad::int='.$tipoactividad.' and ss_tipo_actividad.descripcion = "Solo_Plantaciones_2".tipo_actividad
		
        Group by proyecto
        Order by proyecto asc ') as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['proyecto'] = $fila['proyecto'];
			$b['plantaciones'] = (float)$fila['cantidad'];
		    
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}

	function actionGetContarProyectosNosig(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
           proyecto,
           count (distinct codigo_plantacion) as cantidad
        FROM  "Solo_Plantaciones_2_NOSIG"
        Group by proyecto
        Order by proyecto asc ') as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['proyecto'] = $fila['proyecto'];
			$b['plantaciones'] = (float)$fila['cantidad'];
		    
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	function actionGetContarProyectosNosigActividad($tipoactividad){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
           proyecto,
           count (distinct codigo_plantacion) as cantidad
        FROM  "Solo_Plantaciones_2_NOSIG",
		ss_tipo_actividad
		WHERE ss_tipo_actividad.codigo_tipo_actividad::int='.$tipoactividad.' and ss_tipo_actividad.descripcion = "Solo_Plantaciones_2_NOSIG".tipo_actividad
        Group by proyecto
        Order by proyecto asc ') as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['proyecto'] = $fila['proyecto'];
			$b['plantaciones'] = (float)$fila['cantidad'];
		    
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
		function actionGetAreaParcela(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
          tareas, orden
        FROM   "Plantaciones_superficie_ordenadas_orden" WHERE tareas >0 ') as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b[0] = (float)$fila['orden'];
			$b[1] =(float) $fila['tareas'];
			
		    
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
		function actionGetAreaParcelaActividad($tipoactividad){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
          tareas, row_number() OVER (ORDER BY tareas) AS orden
        FROM   "Plantaciones_superficie_ordenadas_orden",ss_plantacion
		WHERE tareas >0 and ss_plantacion.codigo_plantacion= "Plantaciones_superficie_ordenadas_orden".codigo_plantacion and codigo_tipo_actividad=\''.$tipoactividad.'\'
		 order by tareas asc') as $fila ){

		
        
     
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b[0] = (float)$fila['orden'];
			$b[1] =(float) $fila['tareas'];
			
		    
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	 function actionGetPSAno(){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		
		ano,
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie" 
		Where ano > 2009
		Group BY ano ORDER BY ano' ) as $fila) {
										
		$b = null;
			
			$b[0] = (float)$fila['ano'];
			$b[1] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}
		
		echo json_encode($rs);
		
	}
	
	function actionGetPSAnoActividad($tipoactividad){
		
		//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODIFICAR LO DE OSGEO4W/BIN/PHP.INI
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		
		ano,
		sum(tareas_plantadas) AS cantidad 
		FROM "Estadisticas_Plantaciones_Clasificadas_Sumadas_Especie_Actividad" 
		Where ano > 2009 and codigo_tipo_actividad::int='.$tipoactividad.'
		Group BY ano ORDER BY ano' ) as $fila) {
										
		$b = null;
			
			$b[0] = (float)$fila['ano'];
			$b[1] = (float)$fila['cantidad'];
			array_push($rs, $b);
						
		}
		
		echo json_encode($rs);
		
	}
	
	//estadiosticas a nivel de subcuenca y microcuenca
	
	//primero las de microcuencas
	
	
	function actionGetCuencaTotal($labor,$microcuenca,$fechaini,$fechafin){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
			  sum("Plantacion_labor_predio".cantidad) as cantidad, 
			  "Plantacion_labor_predio".plantacion,
			  "Plantacion_labor_predio".labor, 
			   "Plantacion_labor_predio".microcuenca 
			 
		FROM 
			public."Plantacion_labor_predio"
		WHERE
			labor='.$labor.'  AND codigo_micro_cuenca::int =' .$microcuenca.' AND "fecha_de_inspeccion" >= '.$fechaini.' AND "fecha_de_inspeccion" < '.$fechafin.'
		GROUP BY
			  "Plantacion_labor_predio".plantacion,
			  "Plantacion_labor_predio".labor, 
			   "Plantacion_labor_predio".microcuenca 
		ORDER BY
		cantidad DESC') as $fila) {
			 
			
										
					$b = null;
					$b['cantidad']=$fila['cantidad'];
					$b['plantacion']=$fila['plantacion'];
					$b['labor']=$fila['labor'];
					$b['microcuenca']=$fila['microcuenca'];
			

			
			array_push($result, $b);
					
							
		}	
		
		echo json_encode($result);
		
		
	}
	
	
	function actionGetCuencaTotalEspeciePlantar($labor,$microcuenca,$fechaini,$fechafin){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
			  sum("Plantacion_labor_predio".cantidad) as cantidad, 
			  "Plantacion_labor_predio".especie_platar,
			  "Plantacion_labor_predio".labor, 
			   "Plantacion_labor_predio".microcuenca
			   
			 
		FROM 
			public."Plantacion_labor_predio"
		WHERE
			labor='.$labor.'  AND codigo_micro_cuenca::int =' .$microcuenca.' AND "fecha_de_inspeccion" >= '.$fechaini.' AND "fecha_de_inspeccion" < '.$fechafin.'
		GROUP BY
			  "Plantacion_labor_predio".especie_platar,
			  "Plantacion_labor_predio".labor, 
			   "Plantacion_labor_predio".microcuenca 
		ORDER BY
		cantidad DESC') as $fila) {
			 
			
										
					$b = null;
					$b['cantidad']=$fila['cantidad'];
					$b['especieplantar']=$fila['especie_platar'];
					$b['labor']=$fila['labor'];
					$b['microcuenca']=$fila['microcuenca'];
			

			
			array_push($result, $b);
					
							
		}	
		
		echo json_encode($result);
		
		
	}
	function actionGetCuencaTotalTecnico($labor,$microcuenca,$fechaini,$fechafin){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
			  sum("Plantacion_labor_predio".cantidad) as cantidad, 
			  "Plantacion_labor_predio".apellido,
			  "Plantacion_labor_predio".labor, 
			  "Plantacion_labor_predio".microcuenca
			   
			 
		FROM 
			public."Plantacion_labor_predio"
		WHERE
			labor='.$labor.'  AND codigo_micro_cuenca::int =' .$microcuenca.' AND "fecha_de_inspeccion" >= '.$fechaini.' AND "fecha_de_inspeccion" < '.$fechafin.'
		GROUP BY
			  "Plantacion_labor_predio".apellido,
			  "Plantacion_labor_predio".labor, 
			   "Plantacion_labor_predio".microcuenca 
		ORDER BY
		cantidad DESC') as $fila) {
			 
			
										
					$b = null;
					$b['cantidad']=$fila['cantidad'];
					$b['apellido']=$fila['apellido'];
					$b['labor']=$fila['labor'];
					$b['microcuenca']=$fila['microcuenca'];
			

			
			array_push($result, $b);
					
							
		}	
		
		echo json_encode($result);
		
		
	}
	
	function actionGetContarEspeciesFechaCuenca($microcuenca,$fechaini,$fechafin){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
          nombre_red AS tipo, 
          sum(tarea_plantada) AS tareas, 
          sum (cantidad) AS plantas,
		  codigo_cuenca,
		  codigo_micro_cuenca
        FROM  "Estadisticas_Plantaciones_Clasificadas" 
		WHERE codigo_micro_cuenca::int =' .$microcuenca.' AND "fecha_plantacio" >= '.$fechaini.' AND "fecha_plantacio" < '.$fechafin.'
		
		GROUP BY nombre_red , codigo_micro_cuenca, codigo_cuenca
		ORDER by tareas DESC' ) as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['tipo'] = $fila['tipo'];
		    $b['tareas'] =(float) $fila['tareas'];
			$b['plantas'] =(float) $fila['plantas'];
			$b['cuenca'] = $fila['codigo_cuenca'];
			$b['microcuenca'] = $fila['codigo_micro_cuenca'];
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	function actionGetContarEspeciesFechaCuencaG($microcuenca,$fechaini,$fechafin){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
          nombre_red AS tipo, 
          sum(tarea_plantada) AS tareas, 
          sum (cantidad) AS plantas,
		  codigo_cuenca,
		  codigo_micro_cuenca
        FROM  "Estadisticas_Plantaciones_Clasificadas" 
		WHERE codigo_micro_cuenca::int =' .$microcuenca.' AND "fecha_plantacio" >= '.$fechaini.' AND "fecha_plantacio" < '.$fechafin.'
		
		GROUP BY nombre_red , codigo_micro_cuenca, codigo_cuenca
		ORDER by tareas DESC' ) as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['name'] = $fila['tipo'];
		    $b['y'] =(float) $fila['tareas'];
			
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	
	//AHORA LAS SUBCUENCAS
	
	function actionGetSubCuencaTotal($labor,$cuenca,$fechaini,$fechafin){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
			  sum("Plantacion_labor_predio".cantidad) as cantidad, 
			  "Plantacion_labor_predio".plantacion,
			  "Plantacion_labor_predio".labor, 
			   "Plantacion_labor_predio".subcuenca 
			 
		FROM 
			public."Plantacion_labor_predio"
		WHERE
			labor='.$labor.'  AND codigo_cuenca::int =' .$cuenca.' AND "fecha_de_inspeccion" >= '.$fechaini.' AND "fecha_de_inspeccion" < '.$fechafin.'
		GROUP BY
			  "Plantacion_labor_predio".plantacion,
			  "Plantacion_labor_predio".labor, 
			   "Plantacion_labor_predio".subcuenca 
		ORDER BY
		cantidad DESC') as $fila) {
			 
			
										
					$b = null;
					$b['cantidad']=$fila['cantidad'];
					$b['plantacion']=$fila['plantacion'];
					$b['labor']=$fila['labor'];
					$b['cuenca']=$fila['subcuenca'];
			

			
			array_push($result, $b);
					
							
		}	
		
		echo json_encode($result);
		
		
	}
	
	function actionGetSubCuencaTotalEspeciePlantar($labor,$cuenca,$fechaini,$fechafin){
		
	
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		foreach($mbd->query('SELECT 
			  sum("Plantacion_labor_predio".cantidad) as cantidad, 
			  "Plantacion_labor_predio".especie_platar,
			  "Plantacion_labor_predio".labor, 
			   "Plantacion_labor_predio".subcuenca
			   
			 
		FROM 
			public."Plantacion_labor_predio"
		WHERE
			labor='.$labor.'  AND codigo_cuenca::int =' .$cuenca.' AND "fecha_de_inspeccion" >= '.$fechaini.' AND "fecha_de_inspeccion" < '.$fechafin.'
		GROUP BY
			  "Plantacion_labor_predio".especie_platar,
			  "Plantacion_labor_predio".labor, 
			   "Plantacion_labor_predio".subcuenca 
		ORDER BY
		cantidad DESC') as $fila) {
			 
			
										
					$b = null;
					$b['cantidad']=$fila['cantidad'];
					$b['especieplantar']=$fila['especie_platar'];
					$b['labor']=$fila['labor'];
					$b['cuenca']=$fila['subcuenca'];
			

			
			array_push($result, $b);
					
							
		}	
		
		echo json_encode($result);
		
		
	}
	function actionGetSubContarEspeciesFechaCuenca($cuenca,$fechaini,$fechafin){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
          nombre_red AS tipo, 
          sum(tarea_plantada) AS tareas, 
          sum (cantidad) AS plantas,
		  codigo_cuenca
		  
        FROM  "Estadisticas_Plantaciones_Clasificadas" 
		WHERE codigo_cuenca::int =' .$cuenca.' AND "fecha_plantacio" >= '.$fechaini.' AND "fecha_plantacio" < '.$fechafin.'
		
		GROUP BY nombre_red ,  codigo_cuenca
		ORDER by tareas DESC' ) as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['tipo'] = $fila['tipo'];
		    $b['tareas'] =(float) $fila['tareas'];
			$b['plantas'] =(float) $fila['plantas'];
			$b['cuenca'] = $fila['codigo_cuenca'];
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	function actionGetSubContarEspeciesFechaCuencaG($cuenca,$fechaini,$fechafin){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT 
          nombre_red AS tipo, 
          sum(tarea_plantada) AS tareas, 
          sum (cantidad) AS plantas,
		  codigo_cuenca
		FROM  "Estadisticas_Plantaciones_Clasificadas" 
		WHERE codigo_cuenca::int =' .$cuenca.' AND "fecha_plantacio" >= '.$fechaini.' AND "fecha_plantacio" < '.$fechafin.'
		
		GROUP BY nombre_red ,  codigo_cuenca
		ORDER by tareas DESC' ) as $fila ){

		
			   		 
		    $b = null;
			//$b['gid'] = $fila['gid'];
			$b['name'] = $fila['tipo'];
		    $b['y'] =(float) $fila['tareas'];
			
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
}
