<?php

class QuestController extends Controller
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
					'actions'=>array('create','update','GetSubcuenca','GetMicrocuenca','GetTipoActividad','GetTipoPlantacion'),
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
					'actions'=>array('admin','delete', 'getCuencaAno', 'getAno', 'getCuenca','GetTipoActividad','GetTipoPlantacion'),
					'users'=>array('admin'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}
	}

	
	//FUNCIONES GRAFICAS POR MICROCUENCA
	

    
	
	function actionGetSubcuenca($subcuenca){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		descripcion
		
		FROM "ss_cuenca" 
		where codigo_cuenca::int='.$subcuenca.'
		  ORDER BY descripcion ASC' ) as $fila) {
			
		$b = null;
			$b['respuesta'] = $fila['descripcion'];
			
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetMicrocuenca($microcuenca){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		descripcion
		
		FROM "ss_micro_cuenca" 
		where codigo_micro_cuenca::int='.$microcuenca.'
		  ORDER BY descripcion ASC' ) as $fila) {
			
		$b = null;
			$b['respuesta'] = $fila['descripcion'];
			
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetTipoPlantacion($tipoplantacion){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		descripcion
		
		FROM ss_tipo_de_plantacion 
		where codigo_tipo_de_plantacion::int='.$tipoplantacion.'
		  ORDER BY descripcion ASC' ) as $fila) {
			
		$b = null;
			$b['respuesta'] = $fila['descripcion'];
			
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetTipoActividad($tipoactividad){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		descripcion
		
		FROM ss_tipo_actividad 
		where codigo_tipo_actividad::int='.$tipoactividad.'
		  ORDER BY descripcion ASC' ) as $fila) {
			
		$b = null;
			$b['respuesta'] = $fila['descripcion'];
			
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
}