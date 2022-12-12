<?php

class MeteoroController extends Controller
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
					'actions'=>array('create','update','getAnoMedio','getAnoActual','getMesAnoMedio','GetMesAnoActual'),
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
					'actions'=>array('create','update', 'getEstadActividad','getAnoMedio','GetContarElementos','GetAnoMedioMes','GetContarElementosNosig','getCuencaAno', 'getAno', 'getCuenca'),
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

	
	//FUNCIONES GRAFICAS para meteorologia
	

    
	
	function actionGetAnoMedio(){
		
		//datos por dia
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs1 = array();
		$rs2 = array();
		$rs3 = array();
		$rs4 = array();
		$rs5 = array();
		$rs6 = array();
		
		                 

		foreach($mbd->query('SELECT 
		t_min,
		t_max,
		ast_media,
		lluvia_min,
		lluvia_max,
		lluvia_media,
		dia

		FROM "meteo_acumulado_medio" 
		 ORDER BY dia ASC' ) as $fila) {
			
			$b = null;
			$b['0'] = (float)$fila['dia'];
			$b['1'] = (float)$fila['lluvia_media'];
			array_push($rs1, $b);
			$b = null;
			$b['0'] = (float)$fila['dia'];	
			$b['1'] = (float)$fila['lluvia_max'];
			array_push($rs2, $b);
			$b = null;
			$b['0'] = (float)$fila['dia'];	
			$b['1'] = (float)$fila['lluvia_min'];
			array_push($rs3, $b);
			$b = null;
			$b['0'] = (float)$fila['dia'];	
			$b['1'] = (float)$fila['t_min'];
			array_push($rs4, $b);
			$b = null;
			$b['0'] = (float)$fila['dia'];	
			$b['1'] = (float)$fila['t_max'];
			array_push($rs5, $b);
			$b = null;
			$b['0'] = (float)$fila['dia'];	
			$b['1'] = (float)$fila['ast_media'];
			array_push($rs6, $b);
			
		
						
		}	
		
		$seis_resultados = (object) array('primero' => $rs1, 'segundo' => $rs2, 'tercero' => $rs3, 'cuarto' => $rs4, 'quinto' => $rs5, 'sexto' => $rs6);
		echo json_encode($seis_resultados);
	}
	
	function actionGetAnoActual(){
		//datos por dias
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		
		
		                 

		foreach($mbd->query('SELECT 
		year,
		dia,
		lluvia

		FROM "meteo_acumulado"
		WHERE  year  =(extract (year from current_date)) AND
			 dia  < extract (doy from current_date)
		 ORDER BY dia ASC' ) as $fila) {
			
			$b = null;
			$b['0'] = (int)$fila['dia'];
			$b['1'] = (int)$fila['lluvia'];
			array_push($rs, $b);
			
			
		
						
		}	
		
		
		echo json_encode($rs);
	}
	
	function actionGetMesAnoMedio(){
		
		//datos por dia
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs1 = array();
		$rs2 = array();
		$rs3 = array();
		$rs4 = array();
		$rs5 = array();
		$rs6 = array();
		
		                 

		foreach($mbd->query('SELECT 
		month,
		4-month As PER,
		precip_min,
		precip_max,
		precip_media,
		estacion,
        CASE
            WHEN ((extract (month from current_date))-month)>0 THEN (13-(extract (month from current_date)-month))
            ELSE (1-(extract (month from current_date)-month))
        END AS orden
	
		FROM "meteo_media_mensual"
        WHERE estacion=\'Sajoma\'
		 ORDER BY orden ASC' ) as $fila) {
			
			$b = null;
			$b['0'] = (float)$fila['orden'];
			$b['1'] = (float)$fila['precip_media'];
			array_push($rs1, $b);
			$b = null;
			$b['0'] = (float)$fila['orden'];	
			$b['1'] = (float)$fila['precip_max'];
			array_push($rs2, $b);
			$b = null;
			$b['0'] = (float)$fila['orden'];	
			$b['1'] = (float)$fila['precip_min'];
			array_push($rs3, $b);
			$b = null;
			$b['0'] = (float)$fila['orden'];	
			$b['1'] = (float)$fila['precip_min'];
			array_push($rs4, $b);
			$b = null;
			$b['0'] = (float)$fila['orden'];	
			$b['1'] = (float)$fila['precip_max'];
			array_push($rs5, $b);
			$b = null;
			$b['0'] = (float)$fila['orden'];	
			$b['1'] = (float)$fila['precip_media'];
			array_push($rs6, $b);
			
		
						
		}	
		
		$seis_resultados = (object) array('primero' => $rs1, 'segundo' => $rs2, 'tercero' => $rs3, 'cuarto' => $rs4, 'quinto' => $rs5, 'sexto' => $rs6);
		echo json_encode($seis_resultados);
	}
	
	
	function actionGetMesAnoActual(){
		//datos por dias
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		
		
		                 

		foreach($mbd->query('SELECT 
		precip,
		extract (year from fecha) AS year,
		extract (month from fecha) AS month,
		precip,
		estacion,
		CASE
            WHEN ((extract (month from current_date))-extract (month from fecha))>0 THEN (13-(extract (month from current_date)-extract (month from fecha)))
            ELSE (1-(extract (month from current_date)-extract (month from fecha)))
        END AS ORDEN

		FROM "meteo"
		WHERE  ((extract (year from fecha) =extract (year from current_date) and (extract (month from fecha) <(extract (month from current_date)+0)) ) or 
		( extract (year from fecha) =(extract (year from current_date)-1) and 
		(extract (month from fecha) >=(extract (month from current_date)+0))))and estacion= \'Sajoma\'
		 ORDER BY orden ASC' ) as $fila) {
			
			$b = null;
			$b['0'] = (int)$fila['orden'];
			$b['1'] = (int)$fila['precip'];
			array_push($rs, $b);
			
			
		
						
		}	
		
		
		echo json_encode($rs);
	}
	
}
