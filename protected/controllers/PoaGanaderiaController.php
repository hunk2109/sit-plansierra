<?php

class PoaGanaderiaController extends Controller
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
					'actions'=>array('create','update','GetRealizado','GetCumplido','GetCategorias','GetTotalCategorias'),
					'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','delete', 'getCuencaAno', 'getAno', 'getCuenca','GetRealizado'),
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
					'actions'=>array('create','update','GetRealizado' ),
					'users'=>array('*'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','delete', 'getCuencaAno', 'getAno', 'getCuenca','GetRealizado'),
					'users'=>array('admin'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}
	}

	
	
	//FUNCIONES para obtern infroaion del abase de datos de ganaderia
	

function actionGetRealizado($grupo){
		
	//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 
			
			gs_valores_sumarizados_fecha_hoy.propietario ,
			gs_valores_sumarizados_fecha_hoy.grupo, 
			gs_valores_sumarizados_fecha_hoy.unidad, 

			gs_valores_sumarizados_fecha_hoy.sum
			
FROM 
  public.gs_valores_sumarizados_fecha_hoy
  
 WHERE grupo='.$grupo) as $fila) {
			
			$b = null;
			$b['tipo'] = $fila['propietario'];
			$b['plantas'] = (int)$fila['sum'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}

function actionGetCumplido(){
		
	//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 

				AVG( gs_valores_cumpliento_metas.sobre_mes_finalizado) AS sum
 
			FROM 
					public.gs_valores_cumpliento_metas;') as $fila) {
			
			$b = null;
			
			$b['plantas'] = (float)$fila['sum'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}

function actionGetCategorias(){
		
	//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 
				gs_valores_cumpliento_metas.grupo as sum,
				avg ( gs_valores_cumpliento_metas.sobre_anual) as anual,
				avg (gs_valores_cumpliento_metas.sobre_mes_finalizado) as mensual
			FROM 
			public.gs_valores_cumpliento_metas
			Group by grupo;') as $fila) {
			
			$b = null;
			
			$b['plantas'] = $fila['sum'];
			$b['anual'] = (float) $fila['anual'];
			$b['mensual'] = (float)$fila['mensual'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}

function actionGetTotalCategorias(){
		
	//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 
		foreach($mbd->query('SELECT 
				gs_valores_agrupados especie,
				gs_valores_agrupados.cantidad
 
 
			FROM 
				gs_valores_agrupados
				
			;') as $fila) {
			
			
			$b = null;
			$b['name'] = $fila['especie'];
			$b['y'] = (float)$fila['cantidad'];
			array_push($rs, $b);
			
		}	
		echo json_encode($rs);
		
	}

	
}
