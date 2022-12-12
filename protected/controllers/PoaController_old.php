<?php

class PoaController extends Controller
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
					'actions'=>array('create','update','GetActividadActividadSubcuencaListadoParcelas','GetActividadActividadMicrocuencaListadoParcelas',
					'GetEspecieActividadMicrocuenca','GetProyectoActividadMicrocuenca','GetMunicipioActividadMicrocuenca','GetActividadActividadMicrocuenca','GetAvanceMicrocuenca','GetEspecieActividadPlantadasMicrocuenca',
					'GetEspecieActividadSubcuenca','GetProyectoActividadSubcuenca','GetMunicipioActividadSubcuencas','GetEspecieActividadPlantadasSubcuencas','GetActividadActividadMicrocuencas','GetActividadActividadSubcuenca','GetAvanceSubcuenca', 'GetAvance','GetTecnicoActividad','GetEspecieActividadPlantadas','GetProyectoActividad','GetMunicipioActividad','GetEspecieActividad','GetActividadActividadSubcuencas','GetActividadActividad','GetPoa','GetPoa2','GetPlantadas','GetPlantadas2','GetActividad','GetPlantacion','GetEspecie','GetTecnico','GetMunicipio','GetCuenca','GetProyecto',
					'GetActividadFacturacion','GetActividadFacturacionLabores','GetActividadAnoActual','GetMunicipioAnoActual','GetProyectoAnoActual','GetAvanceAnoActual','GetActividadActividadSubcuencasAnoActual','GetEspecieActividadPlantadasAnoActual','GetEspecieActividadAnoActual','GetSubcuencasActividad','GetEspecieUtilizadasActividad'),
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

	
	//FUNCIONES GRAFICAS POR MICROCUENCA
	

    
	
	function actionGetPoa(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		mes, 
		tareas_acumuladas
		
		FROM "POA_Tareas_acumuladas" 
		  ORDER BY mes ASC' ) as $fila) {
			
		$b = null;
			$b['0'] = (int)$fila['mes'];
			$b['1'] = (int)$fila['tareas_acumuladas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetPlantadas(){
		
		//AQUI FALTA PONER el MES para pruebas suponemos que es siempre 5
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT	mes, tareas_acumuladas
			FROM "Taraes_acumuladas_año"
			WHERE mes <= extract (month from current_date)
	ORDER BY mes ASC' ) as $fila) {
			
		$b = null;
			$b['0'] = (int)$fila['mes'];
			$b['1'] = (int)$fila['tareas_acumuladas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
		
	}
	
	
	
	
	
	
	function actionGetPoa2(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		mes, 
		tareas_acumuladas
		
		FROM "POA_Tareas_acumuladas" 
		  ORDER BY mes ASC' ) as $fila) {
			
		$b = null;
			$b['a'] = (int)$fila['mes'];
			$b['b'] = (int)$fila['tareas_acumuladas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetPlantadas2(){
		
		//AQUI FALTA PONER el MES para pruebas suponemos que es siempre 5
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT	mes, tareas_acumuladas
			FROM "Taraes_acumuladas_año"
			WHERE mes <= extract (month from current_date)
	ORDER BY mes ASC' ) as $fila) {
			
		$b = null;
			$b['a'] = (int)$fila['mes'];
			$b['b'] = (int)$fila['tareas_acumuladas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
		
	}
	
	
	
	
	
	
	
	function actionGetActividad(){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			ss_tipo_actividad.descripcion as tipo_actividad, 
			count (ss_tipo_actividad.descripcion) as numero,
			sum(ss_control_supervision.cantidad_tarea) as tareas
  
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_actividad 
 
 
		WHERE 
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad
			AND extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))-1) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date)

		GROUP BY  ss_tipo_actividad.descripcion 
		Order by Numero DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo_actividad'];
			$b['plantas'] = (int)$fila['numero'];
		    $b['tareas'] = (int)$fila['tareas'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetActividadActividad($tipoactividad){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			ss_tipo_actividad.descripcion as tipo_actividad, 
			sig_tipo_de_plantacion.nueva_descripcion as tipo_plantacion,
			count (ss_tipo_actividad.descripcion) as numero,
			sum(ss_control_supervision.cantidad_tarea) as tareas
			
  
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_actividad,
			public.ss_tipo_de_plantacion,
			public.sig_tipo_de_plantacion
	
 
 
		WHERE 
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad
			AND extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
			ss_control_supervision.codigo_tipo_de_plantacion = ss_tipo_de_plantacion.codigo_tipo_de_plantacion AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) AND
			ss_tipo_actividad.codigo_tipo_actividad::int ='.$tipoactividad.' and 
			public.ss_tipo_de_plantacion.descripcion=public.sig_tipo_de_plantacion.descripcion

		GROUP BY  ss_tipo_actividad.descripcion , sig_tipo_de_plantacion.nueva_descripcion
		Order by Numero DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['plantas'] = (int)$fila['numero'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetActividadAnoActual(){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			ss_tipo_actividad.descripcion as tipo_actividad, 
			
			count (ss_tipo_actividad.descripcion) as numero,
			sum(ss_control_supervision.cantidad_tarea) as tareas
			
  
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_actividad,
			public.ss_tipo_de_plantacion
	
 
 
		WHERE 
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad
			AND extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
			ss_control_supervision.codigo_tipo_de_plantacion = ss_tipo_de_plantacion.codigo_tipo_de_plantacion AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) 
			

		GROUP BY  ss_tipo_actividad.descripcion 
		Order by Numero DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo_actividad'] ;
			$b['plantas'] = (int)$fila['numero'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetActividadActividadSubcuenca($tipoactividad,$ano,$subcuenca){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			ss_tipo_actividad.descripcion as tipo_actividad, 
			ss_tipo_de_plantacion.descripcion as tipo_plantacion,
			count (ss_tipo_actividad.descripcion) as numero,
			sum(ss_control_supervision.cantidad_tarea) as tareas,
			ss_predio.codigo_cuenca
			
			
  
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_actividad,
			public.ss_tipo_de_plantacion,
			public.ss_predio
	
 
 
		WHERE 
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad 
			AND	ss_control_supervision.codigo_predio = ss_predio.codigo_predio
			AND extract (year from ss_control_supervision.fecha_de_inspeccion) = '.$ano.' AND
			ss_control_supervision.codigo_tipo_de_plantacion = ss_tipo_de_plantacion.codigo_tipo_de_plantacion AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) AND
			ss_tipo_actividad.codigo_tipo_actividad::int ='.$tipoactividad.' and
			ss_predio.codigo_cuenca::int= '.$subcuenca.' 
			
			

		GROUP BY  ss_tipo_actividad.descripcion , ss_tipo_de_plantacion.descripcion, ss_predio.codigo_cuenca
		Order by Numero DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['plantas'] = (int)$fila['numero'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetActividadActividadSubcuencaListadoParcelas($tipoactividad,$ano,$subcuenca){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_plantacion, 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_control, 
  "Plantacion_control_actividad_cuenca_microcuenca".tipo_actividad, 
  "Plantacion_control_actividad_cuenca_microcuenca".tipo_plantacion, 
  "Plantacion_control_actividad_cuenca_microcuenca".numero, 
  "Plantacion_control_actividad_cuenca_microcuenca".tareas, 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_cuenca,
   "Plantacion_control_actividad_cuenca_microcuenca".codigo_micro_cuenca, 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_predio, 
  "Plantacion_control_actividad_cuenca_microcuenca".fecha_de_inspeccion, 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_tipo_actividad, 
  "20190116predios".codigo_con, 
  "20190116predios".geom, 
  "20190116predios".file_name
  
FROM

  public."Plantacion_control_actividad_cuenca_microcuenca" left join
  public."20190116predios"
on 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_control ::int= "20190116predios".codigo_con


WHERE
extract (year from fecha_de_inspeccion) = '.$ano.' AND
				codigo_tipo_actividad::int ='.$tipoactividad.' and
			codigo_cuenca::int= '.$subcuenca.' 
			

order by   "20190116predios".file_name desc, codigo_plantacion::int asc' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['codigo_plantacion'];
			$b['control'] = $fila['codigo_control'];
			$b['plantas'] = $fila['tipo_actividad'];
			$b['tareas'] = $fila['tipo_plantacion'];
			$b['file'] = $fila['file_name'];
			
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetActividadActividadMicrocuencaListadoParcelas($tipoactividad,$ano,$microcuenca){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_plantacion, 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_control, 
  "Plantacion_control_actividad_cuenca_microcuenca".tipo_actividad, 
  "Plantacion_control_actividad_cuenca_microcuenca".tipo_plantacion, 
  "Plantacion_control_actividad_cuenca_microcuenca".numero, 
  "Plantacion_control_actividad_cuenca_microcuenca".tareas, 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_cuenca,
   "Plantacion_control_actividad_cuenca_microcuenca".codigo_micro_cuenca, 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_predio, 
  "Plantacion_control_actividad_cuenca_microcuenca".fecha_de_inspeccion, 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_tipo_actividad, 
  "20190116predios".codigo_con, 
  "20190116predios".geom, 
  "20190116predios".file_name
  
FROM

  public."Plantacion_control_actividad_cuenca_microcuenca" left join
  public."20190116predios"
on 
  "Plantacion_control_actividad_cuenca_microcuenca".codigo_control ::int= "20190116predios".codigo_con


WHERE
extract (year from fecha_de_inspeccion) = '.$ano.' AND
				codigo_tipo_actividad::int ='.$tipoactividad.' and
			codigo_micro_cuenca::int= '.$microcuenca.' 
			

order by   "20190116predios".file_name desc, codigo_plantacion::int asc' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['codigo_plantacion'];
			$b['control'] = $fila['codigo_control'];
			$b['plantas'] = $fila['tipo_actividad'];
			$b['tareas'] = $fila['tipo_plantacion'];
			$b['file'] = $fila['file_name'];
			
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetActividadActividadMicrocuenca($tipoactividad,$ano,$microcuenca){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			ss_tipo_actividad.descripcion as tipo_actividad, 
			ss_tipo_de_plantacion.descripcion as tipo_plantacion,
			count (ss_tipo_actividad.descripcion) as numero,
			sum(ss_control_supervision.cantidad_tarea) as tareas,
			ss_predio.codigo_micro_cuenca
			
			
  
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_actividad,
			public.ss_tipo_de_plantacion,
			public.ss_predio
	
 
 
		WHERE 
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad 
			AND	ss_control_supervision.codigo_predio = ss_predio.codigo_predio
			AND extract (year from ss_control_supervision.fecha_de_inspeccion) = '.$ano.' AND
			ss_control_supervision.codigo_tipo_de_plantacion = ss_tipo_de_plantacion.codigo_tipo_de_plantacion AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) AND
			ss_tipo_actividad.codigo_tipo_actividad::int ='.$tipoactividad.' and
			ss_predio.codigo_micro_cuenca::int= '.$microcuenca.' 
			
			

		GROUP BY  ss_tipo_actividad.descripcion , ss_tipo_de_plantacion.descripcion, ss_predio.codigo_micro_cuenca
		Order by Numero DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['plantas'] = (int)$fila['numero'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	
	function actionGetActividadActividadSubcuencas($tipoactividad){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			ss_tipo_actividad.descripcion as tipo_actividad, 
			ss_cuenca.descripcion AS subcuenca,
			sig_tipo_de_plantacion.nueva_descripcion AS tipo_plantacion,
			count (ss_tipo_actividad.descripcion) as numero,
			sum(ss_control_supervision.cantidad_tarea) as tareas
			
  
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_actividad,
			public.ss_tipo_de_plantacion,
			public.ss_predio,
			public.ss_cuenca,
			public.sig_tipo_de_plantacion

		WHERE 
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad
			AND extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
			ss_control_supervision.codigo_tipo_de_plantacion = ss_tipo_de_plantacion.codigo_tipo_de_plantacion AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) and
			ss_control_supervision.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_cuenca=ss_cuenca.codigo_cuenca and
			ss_tipo_actividad.codigo_tipo_actividad::int = '.$tipoactividad.' and
			sig_tipo_de_plantacion.descripcion= ss_tipo_de_plantacion.descripcion

		GROUP BY  ss_cuenca.descripcion,ss_tipo_actividad.descripcion , sig_tipo_de_plantacion.nueva_descripcion,  ss_tipo_de_plantacion.codigo_tipo_de_plantacion
		Order by ss_cuenca.descripcion, ss_tipo_de_plantacion.codigo_tipo_de_plantacion, Numero DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['subcuenca'] = $fila['subcuenca'];
			$b['numero'] = $fila['numero'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	function actionGetSubcuencasActividad($tipoactividad){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			ss_tipo_actividad.descripcion as tipo_actividad, 
			ss_cuenca.descripcion AS subcuenca,
			
			count (ss_tipo_actividad.descripcion) as numero,
			sum(ss_control_supervision.cantidad_tarea) as tareas
			
  
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_actividad,
			public.ss_tipo_de_plantacion,
			public.ss_predio,
			public.ss_cuenca,
			public.sig_tipo_de_plantacion

		WHERE 
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad
			AND extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
			ss_control_supervision.codigo_tipo_de_plantacion = ss_tipo_de_plantacion.codigo_tipo_de_plantacion AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) and
			ss_control_supervision.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_cuenca=ss_cuenca.codigo_cuenca and
			ss_tipo_actividad.codigo_tipo_actividad::int = '.$tipoactividad.' and
			sig_tipo_de_plantacion.descripcion= ss_tipo_de_plantacion.descripcion

		GROUP BY  ss_cuenca.descripcion,ss_tipo_actividad.descripcion 
		Order by ss_cuenca.descripcion,  Numero DESC' ) as $fila) {
			
		$b = null;
			
			$b['subcuenca'] = $fila['subcuenca'];
			$b['numero'] = $fila['numero'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetActividadActividadSubcuencasAnoActual(){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			ss_tipo_actividad.descripcion as tipo_actividad, 
			ss_cuenca.descripcion AS subcuenca,
			ss_tipo_de_plantacion.descripcion AS tipo_plantacion,
			count (ss_tipo_actividad.descripcion) as numero,
			sum(ss_control_supervision.cantidad_tarea) as tareas
			
  
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_actividad,
			public.ss_tipo_de_plantacion,
			public.ss_predio,
			public.ss_cuenca

		WHERE 
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad
			AND extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
			ss_control_supervision.codigo_tipo_de_plantacion = ss_tipo_de_plantacion.codigo_tipo_de_plantacion AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) and
			ss_control_supervision.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_cuenca=ss_cuenca.codigo_cuenca 
			

		GROUP BY  ss_cuenca.descripcion,ss_tipo_actividad.descripcion , ss_tipo_de_plantacion.descripcion
		Order by ss_cuenca.descripcion, ss_tipo_de_plantacion.descripcion, Numero DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['subcuenca'] = $fila['subcuenca'];
			$b['numero'] = $fila['numero'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	
	
	
	function actionGetActividadActividadMicrocuencas($tipoactividad,$ano,$subcuenca){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			ss_tipo_actividad.descripcion as tipo_actividad, 
			ss_micro_cuenca.descripcion AS microcuenca,
			ss_tipo_de_plantacion.descripcion AS tipo_plantacion,
			count (ss_tipo_actividad.descripcion) as numero,
			sum(ss_control_supervision.cantidad_tarea) as tareas
			
  
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_actividad,
			public.ss_tipo_de_plantacion,
			public.ss_predio,
			public.ss_micro_cuenca

		WHERE 
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad
			AND extract (year from ss_control_supervision.fecha_de_inspeccion) = '.$ano.'
			 AND
			ss_control_supervision.codigo_tipo_de_plantacion = ss_tipo_de_plantacion.codigo_tipo_de_plantacion AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) and
			ss_control_supervision.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_micro_cuenca=ss_micro_cuenca.codigo_micro_cuenca and
			ss_tipo_actividad.codigo_tipo_actividad::int = '.$tipoactividad.' and
			ss_predio.codigo_cuenca::int='.$subcuenca.'

		GROUP BY  ss_micro_cuenca.descripcion,ss_tipo_actividad.descripcion , ss_tipo_de_plantacion.descripcion
		Order by ss_micro_cuenca.descripcion, ss_tipo_de_plantacion.descripcion, Numero DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['microcuenca'] = $fila['microcuenca'];
			$b['numero'] = $fila['numero'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	
	function actionGetPlantacion(){
		
	//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 
 			ss_tipo_de_plantacion.descripcion AS tipo_plantacion,
			count (ss_tipo_de_plantacion.descripcion) as numero
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_de_plantacion
 		WHERE 
			ss_control_supervision.codigo_tipo_de_plantacion = ss_tipo_de_plantacion.codigo_tipo_de_plantacion and
			extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))-1) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date)
		Group by  ss_tipo_de_plantacion.descripcion 
		ORDER BY numero DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['plantas'] = (int)$fila['numero'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	//Especies segun datos de salidas de vivero
	function actionGetEspecie(){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 
			sig_articulos_tipos_1.nombre as familia, 
			sum( pv_detalle_factura.cantidad) as numero
		FROM 
			public.ss_detalle_factura_control_supervision, 
			public.pv_detalle_factura, 
			public.pv_articulos, 
			public.sig_clasificacion_articulo, 
			public.sig_articulos_tipos_1
		WHERE 
			ss_detalle_factura_control_supervision.codigo_factura = pv_detalle_factura.codigo_factura AND
			pv_detalle_factura.codigo_articulo = pv_articulos.codigo_articulo AND
			pv_articulos.codigo_articulo = sig_clasificacion_articulo.codigo_articulo AND
			sig_clasificacion_articulo.codigo_clas_1 = sig_articulos_tipos_1.id_tipo_1 and
			extract (year from ss_detalle_factura_control_supervision.fecha) = ((extract (year from current_date))-1) and
			extract (doy from ss_detalle_factura_control_supervision.fecha) <extract (doy from current_date)
		GROUP BY sig_articulos_tipos_1.nombre
		ORDER BY numero DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['familia'];
			$b['plantas'] = (int)$fila['numero'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetEspecieActividad($tipoactividad){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

			sig_tipo_de_plantacion.nueva_descripcion as tipo,
			
			sig_articulos_tipos_1.nombre as familia, 
			sum (pv_detalle_factura.cantidad) as numero
		FROM 
			public.ss_detalle_factura_control_supervision, 
			public.ss_control_supervision,
			public.pv_detalle_factura, 
			public.pv_articulos, 
			public.sig_clasificacion_articulo, 
			public.sig_articulos_tipos_1,
			public.ss_tipo_de_plantacion,
			public.sig_tipo_de_plantacion
		WHERE 
			ss_detalle_factura_control_supervision.codigo_factura = pv_detalle_factura.codigo_factura AND
			ss_detalle_factura_control_supervision.codigo_control = ss_control_supervision.codigo_control and
			pv_detalle_factura.codigo_articulo = pv_articulos.codigo_articulo AND 
			pv_articulos.codigo_articulo = sig_clasificacion_articulo.codigo_articulo AND
			sig_clasificacion_articulo.codigo_clas_1 = sig_articulos_tipos_1.id_tipo_1 and
			extract (year from ss_detalle_factura_control_supervision.fecha) = ((extract (year from current_date))) and
			extract (doy from ss_detalle_factura_control_supervision.fecha) <extract (doy from current_date) and
			ss_control_supervision.codigo_tipo_de_plantacion =ss_tipo_de_plantacion.codigo_tipo_de_plantacion and
			ss_control_supervision.codigo_tipo_actividad::int='.$tipoactividad.' and
			ss_tipo_de_plantacion.descripcion = sig_tipo_de_plantacion.descripcion
		group by sig_tipo_de_plantacion.nueva_descripcion,Familia,sig_tipo_de_plantacion.codigo_tipo_de_plantacion
		ORDER BY sig_tipo_de_plantacion.nueva_descripcion asc, sig_tipo_de_plantacion.codigo_tipo_de_plantacion ' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo'];
			$b['familia'] = $fila['familia'];
			$b['plantas'] = (int)$fila['numero'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetEspecieActividadAnoActual(){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

			ss_tipo_de_plantacion.descripcion as tipo,
			
			sig_articulos_tipos_1.nombre as familia, 
			sum (pv_detalle_factura.cantidad) as numero
		FROM 
			public.ss_detalle_factura_control_supervision, 
			public.ss_control_supervision,
			public.pv_detalle_factura, 
			public.pv_articulos, 
			public.sig_clasificacion_articulo, 
			public.sig_articulos_tipos_1,
			public.ss_tipo_de_plantacion
		WHERE 
			ss_detalle_factura_control_supervision.codigo_factura = pv_detalle_factura.codigo_factura AND
			ss_detalle_factura_control_supervision.codigo_control = ss_control_supervision.codigo_control and
			pv_detalle_factura.codigo_articulo = pv_articulos.codigo_articulo AND 
			pv_articulos.codigo_articulo = sig_clasificacion_articulo.codigo_articulo AND
			sig_clasificacion_articulo.codigo_clas_1 = sig_articulos_tipos_1.id_tipo_1 and
			extract (year from ss_detalle_factura_control_supervision.fecha) = ((extract (year from current_date))) and
			extract (doy from ss_detalle_factura_control_supervision.fecha) <extract (doy from current_date) and
			ss_control_supervision.codigo_tipo_de_plantacion =ss_tipo_de_plantacion.codigo_tipo_de_plantacion 
		group by ss_tipo_de_plantacion.descripcion,Familia
		ORDER BY ss_tipo_de_plantacion.descripcion asc' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo'];
			$b['familia'] = $fila['familia'];
			$b['plantas'] = (int)$fila['numero'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	function actionGetEspecieActividadSubcuenca($tipoactividad,$ano,$subcuenca){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

			ss_tipo_de_plantacion.descripcion as tipo,
			
			sig_articulos_tipos_1.nombre as familia, 
			sum (pv_detalle_factura.cantidad) as numero,
			ss_predio.codigo_cuenca
		FROM 
			public.ss_detalle_factura_control_supervision, 
			public.ss_control_supervision,
			public.pv_detalle_factura, 
			public.pv_articulos, 
			public.sig_clasificacion_articulo, 
			public.sig_articulos_tipos_1,
			public.ss_tipo_de_plantacion,
			public.ss_predio
		WHERE 
			ss_detalle_factura_control_supervision.codigo_factura = pv_detalle_factura.codigo_factura AND
			ss_detalle_factura_control_supervision.codigo_control = ss_control_supervision.codigo_control and
			pv_detalle_factura.codigo_articulo = pv_articulos.codigo_articulo AND 
			pv_articulos.codigo_articulo = sig_clasificacion_articulo.codigo_articulo AND
			ss_control_supervision.codigo_predio=ss_predio.codigo_predio AND
			sig_clasificacion_articulo.codigo_clas_1 = sig_articulos_tipos_1.id_tipo_1 and
			
			
			ss_control_supervision.codigo_tipo_de_plantacion =ss_tipo_de_plantacion.codigo_tipo_de_plantacion and
			extract (year from ss_detalle_factura_control_supervision.fecha) = '.$ano.' and
			ss_control_supervision.codigo_tipo_actividad::int='.$tipoactividad.' and
			ss_predio.codigo_cuenca::int = '.$subcuenca.'
			
		group by ss_tipo_de_plantacion.descripcion,Familia, ss_predio.codigo_cuenca
		ORDER BY ss_tipo_de_plantacion.descripcion asc' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo'];
			$b['familia'] = $fila['familia'];
			$b['plantas'] = (int)$fila['numero'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetEspecieActividadMicrocuenca($tipoactividad,$ano,$microcuenca){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

			ss_tipo_de_plantacion.descripcion as tipo,
			
			sig_articulos_tipos_1.nombre as familia, 
			sum (pv_detalle_factura.cantidad) as numero,
			ss_predio.codigo_micro_cuenca
		FROM 
			public.ss_detalle_factura_control_supervision, 
			public.ss_control_supervision,
			public.pv_detalle_factura, 
			public.pv_articulos, 
			public.sig_clasificacion_articulo, 
			public.sig_articulos_tipos_1,
			public.ss_tipo_de_plantacion,
			public.ss_predio
		WHERE 
			ss_detalle_factura_control_supervision.codigo_factura = pv_detalle_factura.codigo_factura AND
			ss_detalle_factura_control_supervision.codigo_control = ss_control_supervision.codigo_control and
			pv_detalle_factura.codigo_articulo = pv_articulos.codigo_articulo AND 
			pv_articulos.codigo_articulo = sig_clasificacion_articulo.codigo_articulo AND
			ss_control_supervision.codigo_predio=ss_predio.codigo_predio AND
			sig_clasificacion_articulo.codigo_clas_1 = sig_articulos_tipos_1.id_tipo_1 and
			
			
			ss_control_supervision.codigo_tipo_de_plantacion =ss_tipo_de_plantacion.codigo_tipo_de_plantacion and
			extract (year from ss_detalle_factura_control_supervision.fecha) = '.$ano.' and
			ss_control_supervision.codigo_tipo_actividad::int='.$tipoactividad.' and
			ss_predio.codigo_micro_cuenca::int = '.$microcuenca.'
			
		group by ss_tipo_de_plantacion.descripcion,Familia, ss_predio.codigo_micro_cuenca
		ORDER BY ss_tipo_de_plantacion.descripcion asc' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo'];
			$b['familia'] = $fila['familia'];
			$b['plantas'] = (int)$fila['numero'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	//especies segun inspecciones de plantación
	
	function actionGetEspecieActividadPlantadas($tipoactividad){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT   
		  sig_articulos_tipos_1.nombre as familia, 
		  sum("15_plantacion_especie_singeom".cantidad) as cantidad,
		  sum("15_plantacion_especie_singeom".tarea_plantada) as tareas,
		  sig_tipo_de_plantacion.nueva_descripcion AS tipo_plantacion
		FROM 
		  public."15_plantacion_especie_singeom", 
		  public.sig_clasificacion_articulo, 
		  public.sig_articulos_tipos_1, 
		  public.ss_control_supervision,
		  public.sig_tipo_de_plantacion
		WHERE 
		"15_plantacion_especie_singeom".tipo_plantacion = sig_tipo_de_plantacion.descripcion and
		  "15_plantacion_especie_singeom".codigo_articulo = sig_clasificacion_articulo.codigo_articulo AND
		  "15_plantacion_especie_singeom".codigo_control = ss_control_supervision.codigo_control AND
		  extract (year from  ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
		  extract (doy from ss_control_supervision.fecha_de_inspeccion) <extract (doy from current_date) AND
			"15_plantacion_especie_singeom".codigo_tipo_actividad::int='.$tipoactividad.' AND
		  sig_clasificacion_articulo.codigo_clas_1 = sig_articulos_tipos_1.id_tipo_1
		 GROUP BY  "15_plantacion_especie_singeom".tipo_plantacion, sig_articulos_tipos_1.nombre,sig_tipo_de_plantacion.codigo_tipo_de_plantacion ,sig_tipo_de_plantacion.nueva_descripcion 
		 order by sig_tipo_de_plantacion.codigo_tipo_de_plantacion , sig_articulos_tipos_1.nombre' ) as $fila) {
					
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['familia'] = $fila['familia'];
			$b['plantas'] = (int)$fila['cantidad'];
			$b['tareas'] = (float)$fila['tareas'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	function actionGetEspecieUtilizadasActividad($tipoactividad){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT   
		  sig_articulos_tipos_1.nombre as familia, 
		  sum("15_plantacion_especie_singeom".cantidad) as cantidad,
		  sum("15_plantacion_especie_singeom".tarea_plantada) as tareas
		  
		FROM 
		  public."15_plantacion_especie_singeom", 
		  public.sig_clasificacion_articulo, 
		  public.sig_articulos_tipos_1, 
		  public.ss_control_supervision,
		  public.sig_tipo_de_plantacion
		WHERE 
		"15_plantacion_especie_singeom".tipo_plantacion = sig_tipo_de_plantacion.descripcion and
		  "15_plantacion_especie_singeom".codigo_articulo = sig_clasificacion_articulo.codigo_articulo AND
		  "15_plantacion_especie_singeom".codigo_control = ss_control_supervision.codigo_control AND
		  extract (year from  ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
		  extract (doy from ss_control_supervision.fecha_de_inspeccion) <extract (doy from current_date) AND
			"15_plantacion_especie_singeom".codigo_tipo_actividad::int='.$tipoactividad.' AND
		  sig_clasificacion_articulo.codigo_clas_1 = sig_articulos_tipos_1.id_tipo_1
		 GROUP BY   sig_articulos_tipos_1.nombre 
		 order by  sig_articulos_tipos_1.nombre' ) as $fila) {
					
		$b = null;
			
			$b['familia'] = $fila['familia'];
			$b['plantas'] = (int)$fila['cantidad'];
			$b['tareas'] = (float)$fila['tareas'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	function actionGetEspecieActividadPlantadasAnoActual(){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT   
		  sig_articulos_tipos_1.nombre as familia, 
		  sum("15_plantacion_especie_singeom".cantidad) as cantidad,
		  sum("15_plantacion_especie_singeom".tarea_plantada) as tareas,
		  "15_plantacion_especie_singeom".tipo_plantacion AS tipo_plantacion
		FROM 
		  public."15_plantacion_especie_singeom", 
		  public.sig_clasificacion_articulo, 
		  public.sig_articulos_tipos_1, 
		  public.ss_control_supervision
		WHERE 
		  "15_plantacion_especie_singeom".codigo_articulo = sig_clasificacion_articulo.codigo_articulo AND
		  "15_plantacion_especie_singeom".codigo_control = ss_control_supervision.codigo_control AND
		  extract (year from  ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
		  extract (doy from ss_control_supervision.fecha_de_inspeccion) <extract (doy from current_date) AND
		  sig_clasificacion_articulo.codigo_clas_1 = sig_articulos_tipos_1.id_tipo_1
		 GROUP BY  "15_plantacion_especie_singeom".tipo_plantacion, sig_articulos_tipos_1.nombre
		 order by "15_plantacion_especie_singeom".tipo_plantacion, sig_articulos_tipos_1.nombre	' ) as $fila) {
					
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['familia'] = $fila['familia'];
			$b['plantas'] = (int)$fila['cantidad'];
			$b['tareas'] = (float)$fila['tareas'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	
	function actionGetEspecieActividadPlantadasSubcuencas($tipoactividad,$ano,$subcuenca){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT   
		ss_predio.codigo_cuenca,
		  sig_articulos_tipos_1.nombre as familia, 
		  sum("15_plantacion_especie_singeom".cantidad) as cantidad,
		  sum("15_plantacion_especie_singeom".tarea_plantada) as tareas,
		  "15_plantacion_especie_singeom".tipo_plantacion AS tipo_plantacion,
		  "15_plantacion_especie_singeom".codigo_tipo_actividad
		FROM 
		  public."15_plantacion_especie_singeom", 
		  public.sig_clasificacion_articulo, 
		  public.sig_articulos_tipos_1, 
		  public.ss_control_supervision,
		  public.ss_predio
		WHERE 
		 "15_plantacion_especie_singeom".codigo_predio = ss_predio.codigo_predio AND
		  "15_plantacion_especie_singeom".codigo_articulo = sig_clasificacion_articulo.codigo_articulo AND
		  "15_plantacion_especie_singeom".codigo_control = ss_control_supervision.codigo_control AND
		  extract (year from  ss_control_supervision.fecha_de_inspeccion) = '.$ano.' AND
		ss_predio.codigo_cuenca::int='.$subcuenca.' and
		"15_plantacion_especie_singeom".codigo_tipo_actividad::int='.$tipoactividad.' AND
		  sig_clasificacion_articulo.codigo_clas_1 = sig_articulos_tipos_1.id_tipo_1
		 GROUP BY  "15_plantacion_especie_singeom".tipo_plantacion, sig_articulos_tipos_1.nombre,ss_predio.codigo_cuenca,"15_plantacion_especie_singeom".codigo_tipo_actividad
		 order by "15_plantacion_especie_singeom".tipo_plantacion, sig_articulos_tipos_1.nombre	' ) as $fila) {
					
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['familia'] = $fila['familia'];
			$b['plantas'] = (int)$fila['cantidad'];
			$b['tareas'] = (float)$fila['tareas'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetEspecieActividadPlantadasMicrocuenca($tipoactividad,$ano,$microcuenca){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT   
		ss_predio.codigo_micro_cuenca,
		  sig_articulos_tipos_1.nombre as familia, 
		  sum("15_plantacion_especie_singeom".cantidad) as cantidad,
		  sum("15_plantacion_especie_singeom".tarea_plantada) as tareas,
		  "15_plantacion_especie_singeom".tipo_plantacion AS tipo_plantacion,
		  "15_plantacion_especie_singeom".codigo_tipo_actividad
		FROM 
		  public."15_plantacion_especie_singeom", 
		  public.sig_clasificacion_articulo, 
		  public.sig_articulos_tipos_1, 
		  public.ss_control_supervision,
		  public.ss_predio
		WHERE 
		 "15_plantacion_especie_singeom".codigo_predio = ss_predio.codigo_predio AND
		  "15_plantacion_especie_singeom".codigo_articulo = sig_clasificacion_articulo.codigo_articulo AND
		  "15_plantacion_especie_singeom".codigo_control = ss_control_supervision.codigo_control AND
		  extract (year from  ss_control_supervision.fecha_de_inspeccion) = '.$ano.' AND
		ss_predio.codigo_micro_cuenca::int='.$microcuenca.' and
		"15_plantacion_especie_singeom".codigo_tipo_actividad::int='.$tipoactividad.' AND
		  sig_clasificacion_articulo.codigo_clas_1 = sig_articulos_tipos_1.id_tipo_1
		 GROUP BY  "15_plantacion_especie_singeom".tipo_plantacion, sig_articulos_tipos_1.nombre,ss_predio.codigo_micro_cuenca,"15_plantacion_especie_singeom".codigo_tipo_actividad
		 order by "15_plantacion_especie_singeom".tipo_plantacion, sig_articulos_tipos_1.nombre	' ) as $fila) {
					
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['familia'] = $fila['familia'];
			$b['plantas'] = (int)$fila['cantidad'];
			$b['tareas'] = (float)$fila['tareas'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetTecnico(){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
            
		foreach($mbd->query('SELECT 
			ss_control_supervision.codigo_tecnico::int As tecnico,
			count(ss_control_supervision.codigo_tecnico) AS numero
		FROM 
			public.ss_control_supervision
		WHERE 
		extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))-1) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date)
		Group by ss_control_supervision.codigo_tecnico
		Order by numero') as $fila) {
			
		$b = null;
			
			$b = (int)$fila['numero'];
	
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetTecnicoActividad($tipoactividad){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
            
		foreach($mbd->query('SELECT 
			ss_control_supervision.codigo_tecnico::int As tecnico,
			count(ss_control_supervision.codigo_tecnico) AS numero
		FROM 
			public.ss_control_supervision,
			public.ss_tipo_actividad
		WHERE 
		extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date)and
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad and
			ss_tipo_actividad.codigo_tipo_actividad::int = '.$tipoactividad.'	
		Group by ss_control_supervision.codigo_tecnico
		Order by numero') as $fila) {
			
		$b = null;
			$b = (int)$fila['numero'];
			array_push($rs, $b);			
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetMunicipio(){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 
			st_municipio.descripcion as municipio,
			count(ss_control_supervision.codigo_control) as supervisiones
 
		FROM 
			public.ss_control_supervision, 
			public.ss_predio, 
 			public.st_municipio
  


		WHERE 
			ss_control_supervision.codigo_predio = ss_predio.codigo_predio AND
 
			ss_predio.codigo_municipio = st_municipio.codigo_municipio AND
  
			extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))-1) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date)
			Group by  st_municipio.descripcion
		Order By supervisiones DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['municipio'];
			$b['plantas'] = (int)$fila['supervisiones'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetMunicipioActividad($tipoactividad){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 
			st_municipio.descripcion as municipio,
			sum(ss_control_supervision.cantidad_tarea) as tareas
 
		FROM 
			public.ss_control_supervision, 
			public.ss_predio, 
 			public.st_municipio,
			public.ss_tipo_actividad
  


		WHERE 
			ss_control_supervision.codigo_predio = ss_predio.codigo_predio AND
 
			ss_predio.codigo_municipio = st_municipio.codigo_municipio AND
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad and
			extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) AND
			ss_tipo_actividad.codigo_tipo_actividad::int = '.$tipoactividad.'
				
			Group by  st_municipio.descripcion 
			
		Order By tareas DESC' ) as $fila) {
			
	
		$b = null;
			$b['tipo'] = $fila['municipio'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetMunicipioAnoActual(){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 
			st_municipio.descripcion as municipio,
			sum(ss_control_supervision.cantidad_tarea) as tareas
 
		FROM 
			public.ss_control_supervision, 
			public.ss_predio, 
 			public.st_municipio,
			public.ss_tipo_actividad
  


		WHERE 
			ss_control_supervision.codigo_predio = ss_predio.codigo_predio AND
 
			ss_predio.codigo_municipio = st_municipio.codigo_municipio AND
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad and
			extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) 
				
			Group by  st_municipio.descripcion 
			
		Order By tareas DESC' ) as $fila) {
			
	
		$b = null;
			$b['tipo'] = $fila['municipio'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetMunicipioActividadSubcuencas($tipoactividad,$ano,$subcuenca){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 
			st_municipio.descripcion as municipio,
			public.ss_predio.codigo_cuenca,
			sum(ss_control_supervision.cantidad_tarea) as tareas
 
		FROM 
			public.ss_control_supervision, 
			public.ss_predio, 
 			public.st_municipio,
			public.ss_tipo_actividad
  


		WHERE 
			ss_control_supervision.codigo_predio = ss_predio.codigo_predio AND
 
			ss_predio.codigo_municipio = st_municipio.codigo_municipio AND
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad and
			extract (year from ss_control_supervision.fecha_de_inspeccion) = '.$ano.' AND
			
			ss_tipo_actividad.codigo_tipo_actividad::int = '.$tipoactividad.' and
			public.ss_predio.codigo_cuenca::int='.$subcuenca.'
				
			Group by  st_municipio.descripcion ,ss_predio.codigo_cuenca
			
		Order By tareas DESC' ) as $fila) {
			
	
		$b = null;
			$b['tipo'] = $fila['municipio'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetMunicipioActividadMicrocuenca($tipoactividad,$ano,$microcuenca){
		
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 
			st_municipio.descripcion as municipio,
			public.ss_predio.codigo_micro_cuenca,
			sum(ss_control_supervision.cantidad_tarea) as tareas
 
		FROM 
			public.ss_control_supervision, 
			public.ss_predio, 
 			public.st_municipio,
			public.ss_tipo_actividad
  


		WHERE 
			ss_control_supervision.codigo_predio = ss_predio.codigo_predio AND
 
			ss_predio.codigo_municipio = st_municipio.codigo_municipio AND
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad and
			extract (year from ss_control_supervision.fecha_de_inspeccion) = '.$ano.' AND
			
			ss_tipo_actividad.codigo_tipo_actividad::int = '.$tipoactividad.' and
			public.ss_predio.codigo_micro_cuenca::int='.$microcuenca.'
				
			Group by  st_municipio.descripcion ,ss_predio.codigo_micro_cuenca
			
		Order By tareas DESC' ) as $fila) {
			
	
		$b = null;
			$b['tipo'] = $fila['municipio'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	function actionGetCuenca(){
		
		//AQUI FALTA PONER el MES para pruebas suponemos que es siempre 5
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

			ss_cuenca.descripcion as cuenca,
			count (ss_cuenca.descripcion) as supervisiones
		FROM 
			public.ss_control_supervision , 
			public.ss_predio, 
			public.ss_micro_cuenca, 

			public.ss_cuenca
		WHERE 
			ss_control_supervision.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_micro_cuenca = ss_micro_cuenca.codigo_micro_cuenca AND
 
			ss_micro_cuenca.codigo_cuenca = ss_cuenca.codigo_cuenca AND
			extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))-1) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date)
		Group by  ss_cuenca.descripcion
		Order By  ss_cuenca.descripcion  ASC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['cuenca'];
			$b['plantas'] = (int)$fila['supervisiones'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetProyecto(){
		
		//AQUI FALTA PONER el MES para pruebas suponemos que es siempre 5
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

			pv_proyecto.descripcion as cuenca,
			count (pv_proyecto.descripcion) as supervisiones
		FROM 
			public.ss_control_supervision , 
			public.pv_proyecto 
			
		WHERE 
			ss_control_supervision.codigo_proyecto = pv_proyecto.codigo_proyecto AND
			extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))-1) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date)
		Group by pv_proyecto.descripcion
		Order by supervisiones desc' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['cuenca'];
			$b['plantas'] = (int)$fila['supervisiones'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetProyectoActividad($tipoactividad){
		
		//AQUI FALTA PONER el MES para pruebas suponemos que es siempre 5
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

			pv_proyecto.descripcion as proyecto,
			count (pv_proyecto.descripcion) as supervisiones,
			sum(ss_control_supervision.cantidad_tarea) as tareas
		FROM 
			public.ss_control_supervision , 
			public.pv_proyecto,
			public.ss_tipo_actividad
  
			
		WHERE 
			ss_control_supervision.codigo_proyecto = pv_proyecto.codigo_proyecto AND
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad and
			extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) and
			ss_tipo_actividad.codigo_tipo_actividad::int = '.$tipoactividad.'
		Group by pv_proyecto.descripcion
		Order by supervisiones desc' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['proyecto'];
			$b['plantas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetProyectoAnoActual(){
		
		//AQUI FALTA PONER el MES para pruebas suponemos que es siempre 5
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

			pv_proyecto.descripcion as proyecto,
			count (pv_proyecto.descripcion) as supervisiones,
			sum(ss_control_supervision.cantidad_tarea) as tareas
		FROM 
			public.ss_control_supervision , 
			public.pv_proyecto,
			public.ss_tipo_actividad
  
			
		WHERE 
			ss_control_supervision.codigo_proyecto = pv_proyecto.codigo_proyecto AND
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad and
			extract (year from ss_control_supervision.fecha_de_inspeccion) = ((extract (year from current_date))) AND
			extract (doy from ss_control_supervision.fecha_de_inspeccion) < extract (doy from current_date) 
		Group by pv_proyecto.descripcion
		Order by supervisiones desc' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['proyecto'];
			$b['plantas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetProyectoActividadSubcuenca($tipoactividad,$ano,$subcuenca){
		
		//AQUI FALTA PONER el MES para pruebas suponemos que es siempre 5
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

			pv_proyecto.descripcion as proyecto,
			count (pv_proyecto.descripcion) as supervisiones,
			sum(ss_control_supervision.cantidad_tarea) as tareas,
			ss_predio.codigo_cuenca
		FROM 
			public.ss_control_supervision , 
			public.pv_proyecto,
			public.ss_tipo_actividad,
			public.ss_predio
  
			
		WHERE 
			ss_control_supervision.codigo_proyecto = pv_proyecto.codigo_proyecto AND
			ss_control_supervision.codigo_predio =ss_predio.codigo_predio and
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad and
			extract (year from ss_control_supervision.fecha_de_inspeccion) = '.$ano.' AND
			ss_tipo_actividad.codigo_tipo_actividad::int = '.$tipoactividad.' AND
			ss_predio.codigo_cuenca::int= '.$subcuenca.'
		Group by pv_proyecto.descripcion, ss_predio.codigo_cuenca
		Order by supervisiones desc' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['proyecto'];
			$b['plantas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetProyectoActividadMicrocuenca($tipoactividad,$ano,$microcuenca){
		
		//AQUI FALTA PONER el MES para pruebas suponemos que es siempre 5
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

			pv_proyecto.descripcion as proyecto,
			count (pv_proyecto.descripcion) as supervisiones,
			sum(ss_control_supervision.cantidad_tarea) as tareas,
			ss_predio.codigo_micro_cuenca
		FROM 
			public.ss_control_supervision , 
			public.pv_proyecto,
			public.ss_tipo_actividad,
			public.ss_predio
  
			
		WHERE 
			ss_control_supervision.codigo_proyecto = pv_proyecto.codigo_proyecto AND
			ss_control_supervision.codigo_predio =ss_predio.codigo_predio and
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad and
			extract (year from ss_control_supervision.fecha_de_inspeccion) = '.$ano.' AND
			ss_tipo_actividad.codigo_tipo_actividad::int = '.$tipoactividad.' AND
			ss_predio.codigo_micro_cuenca::int= '.$microcuenca.'
		Group by pv_proyecto.descripcion, ss_predio.codigo_micro_cuenca
		Order by supervisiones desc' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['proyecto'];
			$b['plantas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	//NUEVO PO
	/*
	function actionGetAvance($tipoactividad){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		               
		foreach($mbd->query('
		SELECT 

			  resumen_actividad_poa_actual.codigo_tipo_actividad,
			  resumen_actividad_poa_actual.descripcion as plantacion, 
			   resumen_actividad_ano_actual.tareas  as tareas_ejecutadas,
			   resumen_actividad_poa_actual.sum As tarea_prev_ano,
			   (resumen_actividad_ano_actual.tareas/resumen_actividad_poa_actual.sum)*100 as porce
			FROM 
			  public.resumen_actividad_ano_actual FULL JOIN  
			  public.resumen_actividad_poa_actual
			ON
			   resumen_actividad_ano_actual.tipo_plantacion = resumen_actividad_poa_actual.descripcion and 
			   ( resumen_actividad_poa_actual.codigo_tipo_actividad::int='.$tipoactividad.' and  resumen_actividad_ano_actual.codigo_tipo_actividad::int='.$tipoactividad.')
			WHERE
				resumen_actividad_poa_actual.codigo_tipo_actividad::int='.$tipoactividad ) as $fila) {
	

		$b = null;
		$b['plantacion'] = $fila['plantacion'];
		$b['tareasejecutadas'] = (float)$fila['tareas_ejecutadas'];
		$b['tareasprevano'] = (float)$fila['tarea_prev_ano'];
		$b['porce'] = (float)$fila['porce'];
		
		array_push($rs, $b);
						
		}	
		echo json_encode($rs);


	}*/
	
	function actionGetAvance($tipoactividad){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		               
		foreach($mbd->query('
		SELECT 



			 
			 sig_tipo_de_plantacion.nueva_descripcion AS plantacion,
			  resumen_actividad_ano_actual.tareas  as tareas_ejecutadas,
			  resumen_actividad_poa_actual.sum As tarea_prev_ano,
			   (resumen_actividad_ano_actual.tareas/resumen_actividad_poa_actual.sum)*100 as porce
			FROM 
			public.sig_tipo_de_plantacion,
			  public.resumen_actividad_ano_actual full JOIN  
			  public.resumen_actividad_poa_actual
			ON
CONCAT(resumen_actividad_poa_actual.codigo_tipo_actividad,resumen_actividad_poa_actual.descripcion) =CONCAT (resumen_actividad_ano_actual.codigo_tipo_actividad ,resumen_actividad_ano_actual.tipo_plantacion)


			    WHERE 
			   resumen_actividad_ano_actual.tipo_plantacion  =   sig_tipo_de_plantacion.descripcion AND
			 resumen_actividad_ano_actual.codigo_tipo_actividad::int=' .$tipoactividad.' 
			 Order by sig_tipo_de_plantacion.codigo_tipo_de_plantacion') as $fila) {
	

		$b = null;
		$b['plantacion'] = $fila['plantacion'];
		$b['tareasejecutadas'] = (float)$fila['tareas_ejecutadas'];
		$b['tareasprevano'] = (float)$fila['tarea_prev_ano'];
		$b['porce'] = (float)$fila['porce'];
		
		array_push($rs, $b);
						
		}	
		echo json_encode($rs);


	}
	
	function actionGetAvanceAnoActual(){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		               
		foreach($mbd->query('
		SELECT 



			  resumen_actividad_ano_actual.tipo_plantacion  AS plantacion, 
			 
			  resumen_actividad_ano_actual.tareas  as tareas_ejecutadas,
			  resumen_actividad_poa_actual.sum As tarea_prev_ano,
			   (resumen_actividad_ano_actual.tareas/resumen_actividad_poa_actual.sum)*100 as porce
			FROM 
			  public.resumen_actividad_ano_actual full JOIN  
			  public.resumen_actividad_poa_actual
			ON
CONCAT(resumen_actividad_poa_actual.codigo_tipo_actividad,resumen_actividad_poa_actual.descripcion) =CONCAT (resumen_actividad_ano_actual.codigo_tipo_actividad ,resumen_actividad_ano_actual.tipo_plantacion) 
	ORDER BY resumen_actividad_poa_actual.codigo_tipo_actividad') as $fila) {
	

		$b = null;
		$b['plantacion'] = $fila['plantacion'];
		$b['tareasejecutadas'] = (float)$fila['tareas_ejecutadas'];
		$b['tareasprevano'] = (float)$fila['tarea_prev_ano'];
		$b['porce'] = (float)$fila['porce'];
		
		array_push($rs, $b);
						
		}	
		echo json_encode($rs);


	}
	
	
	function actionGetAvanceSubcuenca($tipoactividad,$ano,$subcuenca){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('
		
		SELECT 
  resumen_actividada_poa_anual_juntos.tipo_actividad, 
  resumen_actividada_poa_anual_juntos.descripcion_plantacin as plantacion, 
  resumen_actividada_poa_anual_juntos.ano, 
  resumen_actividada_poa_anual_juntos.cuenca, 
 
  sum(resumen_actividada_poa_anual_juntos.tareas_plantadas) AS tareas_ejecutadas, 
  sum (resumen_actividada_poa_anual_juntos.tareas_previstas)  AS tareas_prev_ano
 
FROM 
  public.resumen_actividada_poa_anual_juntos

WHERE
  resumen_actividada_poa_anual_juntos.ano ='.$ano.' 
  and resumen_actividada_poa_anual_juntos.tipo_actividad::int='.$tipoactividad.'
  and resumen_actividada_poa_anual_juntos.cuenca::int='.$subcuenca.'
GROUP BY 
resumen_actividada_poa_anual_juntos.tipo_actividad, 
  resumen_actividada_poa_anual_juntos.descripcion_plantacin, 
  resumen_actividada_poa_anual_juntos.ano, 
  resumen_actividada_poa_anual_juntos.cuenca
ORDER BY
resumen_actividada_poa_anual_juntos.tipo_actividad,
 resumen_actividada_poa_anual_juntos.cuenca'  ) as $fila) {
		
		
		
		
		
		
	

		$b = null;
		$b['plantacion'] = $fila['plantacion'];
		$b['tareasejecutadas'] = (float)$fila['tareas_ejecutadas'];
		$b['tareasprevano'] = (float)$fila['tareas_prev_ano'];
		
		
		array_push($rs, $b);
						
		}	
		echo json_encode($rs);


	}


function actionGetAvanceMicrocuenca($tipoactividad,$ano,$microcuenca){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('
		
		SELECT 
  resumen_actividada_poa_anual_juntos.tipo_actividad, 
  resumen_actividada_poa_anual_juntos.descripcion_plantacin as plantacion, 
  resumen_actividada_poa_anual_juntos.ano, 
  resumen_actividada_poa_anual_juntos.micro_cuenca, 
 
  sum(resumen_actividada_poa_anual_juntos.tareas_plantadas) AS tareas_ejecutadas, 
  sum (resumen_actividada_poa_anual_juntos.tareas_previstas)  AS tareas_prev_ano
 
FROM 
  public.resumen_actividada_poa_anual_juntos

WHERE
  resumen_actividada_poa_anual_juntos.ano ='.$ano.' 
  and resumen_actividada_poa_anual_juntos.tipo_actividad::int='.$tipoactividad.'
  and resumen_actividada_poa_anual_juntos.micro_cuenca::int='.$microcuenca.'
GROUP BY 
resumen_actividada_poa_anual_juntos.tipo_actividad, 
  resumen_actividada_poa_anual_juntos.descripcion_plantacin, 
  resumen_actividada_poa_anual_juntos.ano, 
  resumen_actividada_poa_anual_juntos.micro_cuenca
ORDER BY
resumen_actividada_poa_anual_juntos.tipo_actividad,
 resumen_actividada_poa_anual_juntos.micro_cuenca'  ) as $fila) {
		
		
		
		
		
		
	

		$b = null;
		$b['plantacion'] = $fila['plantacion'];
		$b['tareasejecutadas'] = (float)$fila['tareas_ejecutadas'];
		$b['tareasprevano'] = (float)$fila['tareas_prev_ano'];
		
		
		array_push($rs, $b);
						
		}	
		echo json_encode($rs);


	}
	
	function actionGetActividadFacturacion($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_plantacion,
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_control,
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_cliente,
			"15_Plantacion_completa_sin_geo_facturas_plus".apellido,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre,
			"15_Plantacion_completa_sin_geo_facturas_plus".cedula,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre_cuenca,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre_microcuenca,
			"15_Plantacion_completa_sin_geo_facturas_plus".cs_destino,
			"15_Plantacion_completa_sin_geo_facturas_plus".fecha::date,
			"15_Plantacion_completa_sin_geo_facturas_plus".plantas,
			"15_Plantacion_completa_sin_geo_facturas_plus".tareas,
			"15_Plantacion_completa_sin_geo_facturas_plus".inversion_plantas,
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_factura
			
  
		FROM 
			public."15_Plantacion_completa_sin_geo_facturas_plus"
			
	
 
 
		WHERE 
			'.$criterio.'
			
		ORDER BY fecha DESC') as $fila) {
			
		$b = null;
			$b['plantacion'] = $fila['codigo_plantacion'];
			$b['control'] = $fila['codigo_control'];
			$b['cliente'] = $fila['codigo_cliente'];
			$b['apellido'] = $fila['apellido'];
			$b['nombre'] = $fila['nombre'];
			$b['cedula'] = $fila['cedula'];
			$b['cuenca'] = $fila['nombre_cuenca'];
			$b['microcuenca'] = $fila['nombre_microcuenca'];
			$b['destino'] = $fila['cs_destino'];
			$b['fecha'] = $fila['fecha'];
			$b['plantas'] = (float)$fila['plantas'];
			
			$b['tareas'] = (float)$fila['tareas'];
			$b['inversion_plantas'] = (float)$fila['inversion_plantas'];
			$b['factura'] = $fila['codigo_factura'];
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetActividadFacturacionLabores($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_plantacion,
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_control,
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_cliente,
			"15_Plantacion_completa_sin_geo_facturas_plus".apellido,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre,
			"15_Plantacion_completa_sin_geo_facturas_plus".cedula,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre_cuenca,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre_microcuenca,
			"15_Plantacion_completa_sin_geo_facturas_plus".cs_destino,
			"15_Plantacion_completa_sin_geo_facturas_plus".fecha::date,
			"15_Plantacion_completa_sin_geo_facturas_plus".plantas,
			"15_Plantacion_completa_sin_geo_facturas_plus".tareas,
			"15_Plantacion_completa_sin_geo_facturas_plus".inversion_plantas,
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_factura,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre_municipio,
			"15_Plantacion_completa_sin_geo_facturas_plus".tp_descripcion_tipo_plantacion,
			"15_Plantacion_completa_sin_geo_facturas_plus".tp_descripcio_tipo_actividad,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre_proyecto,
		    fac_labores_codigo_factura.coste_labores
		FROM 
			public."15_Plantacion_completa_sin_geo_facturas_plus" left join 
			public.fac_labores_codigo_factura
		on
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_factura = fac_labores_codigo_factura.codigo_factura
	WHERE 
			'.$criterio.'
ORDER BY "15_Plantacion_completa_sin_geo_facturas_plus".codigo_plantacion::int,"15_Plantacion_completa_sin_geo_facturas_plus".codigo_factura::int') as $fila) {
			
		$b = null;
			$b['plantacion'] = $fila['codigo_plantacion'];
			$b['control'] = $fila['codigo_control'];
			$b['cliente'] = $fila['codigo_cliente'];
			$b['apellido'] = $fila['apellido'];
			$b['nombre'] = $fila['nombre'];
			$b['cedula'] = $fila['cedula'];
			$b['cuenca'] = $fila['nombre_cuenca'];
			$b['microcuenca'] = $fila['nombre_microcuenca'];
			$b['destino'] = $fila['cs_destino'];
			$b['fecha'] = $fila['fecha'];
			$b['plantas'] = (float)$fila['plantas'];
			
			$b['tareas'] = (float)$fila['tareas'];
			$b['inversion_plantas'] = (float)$fila['inversion_plantas'];
			$b['factura'] = $fila['codigo_factura'];
			$b['labores'] = (float)$fila['coste_labores'];
			$b['municipio'] = $fila['nombre_municipio'];
			$b['tipoplantacion'] = $fila['tp_descrpcion_tipo_plantacion'];
			$b['actividad'] = $fila['tp_descripcio_tipo_actividad'];
			$b['proyecto'] = $fila['nombre_proyecto'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
}