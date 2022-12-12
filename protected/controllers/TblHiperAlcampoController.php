<?php

class TblHiperAlcampoController extends Controller
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
					'actions'=>array('create','update','getHiperAlcampo', 'getCoords','getRegion','getMunicipio','getCoordsMunicipio'),
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
		}else{
			return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('index','view'),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update','getHiperAlcampo', 'getCoords','getRegion','getMunicipio','getCoordsMunicipio'),
					'users'=>array('*'),
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
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TblHiperAlcampo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblHiperAlcampo']))
		{
			$model->attributes=$_POST['TblHiperAlcampo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_hiper_alcampo));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblHiperAlcampo']))
		{
			$model->attributes=$_POST['TblHiperAlcampo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_hiper_alcampo));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionGetCoords($id, $epsg=25830){
		header('Content-Type: application/json');
		
		if(!is_numeric($id))
			exit("error");
		$SQL = "SELECT 
		  ST_X(ST_Transform(geo_nielssen.geom, ".$epsg.")) as x, ST_Y(ST_Transform(geo_nielssen.geom, ".$epsg.")) as y
		FROM 
		  public.tbl_hiper_alcampo, 
		  public.geo_nielssen
		WHERE 
		  tbl_hiper_alcampo.cod_nielssen = geo_nielssen.codigo_nielssen AND id_hiper_alcampo = ". $id;
		  
		$dataProvider=new CSqlDataProvider($SQL);
		$result = $dataProvider->getData() ;//will return a list of arrays.
		echo json_encode($result);
	}
	
	public function actionGetCoordsMunicipio($id){
		header('Content-Type: application/json');
		
		if(!is_numeric($id))
			exit("error");
		$SQL = "SELECT 
		  ST_X(geo_nielssen.geom) as x, ST_Y(geo_nielssen.geom) as y
		FROM 
		  public.geo_nielssen
		WHERE 
		  codigo_nielssen = '". $id."'";
		  
		$dataProvider=new CSqlDataProvider($SQL);
		$result = $dataProvider->getData() ;//will return a list of arrays.
		echo json_encode($result);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblHiperAlcampo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblHiperAlcampo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblHiperAlcampo']))
			$model->attributes=$_GET['TblHiperAlcampo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Lista de hipermercados Alcampo -para rellenar comboHiper-
	 */
	 
	public function actionGetHiperAlcampo(){
		
		header('Content-Type: application/json'); 
		$Criteria = new CDbCriteria();
		$Criteria->order = '"id_hiper_alcampo"';
		
		$model=TblHiperAlcampo::model()->findAll($Criteria);
		$i1 = 0;
		//echo 'Seleccione emplazamiento para cargar datos: <select id="instalaciones" onChange="cargar()">';
		
		$salida1 = array();
		
		foreach($model as $m){
			array_push($salida1, array("id"=>$m->id_hiper_alcampo, "nombre"=>$m->id_hiper_alcampo . " - ".$m->nombre));
	
		}
		echo json_encode($salida1);
	}
	
	/**
	 * Lista de hipermercados Alcampo -para rellenar comboHiper-
	 */
	 
	public function actionGetMunicipio(){
		
		header('Content-Type: application/json'); 
		
		$model=TblHiperAlcampo::model()->findAllBySql("SELECT 
														min(tbl_hiper_alcampo.cod_nielssen) as cod_nielssen,
														geo_nielssen.municipio as region
													FROM 
													  public.tbl_hiper_alcampo, 
													  public.geo_nielssen
													WHERE 
													  tbl_hiper_alcampo.cod_nielssen = geo_nielssen.codigo_nielssen 
													GROUP BY geo_nielssen.municipio
													ORDER BY region;");
		$i1 = 0;
		//echo 'Seleccione emplazamiento para cargar datos: <select id="instalaciones" onChange="cargar()">';
		
		$salida1 = array();
		
		foreach($model as $m){
			array_push($salida1, array("id"=>$m->cod_nielssen, "nombre"=>$m->region));
	
		}
		echo json_encode($salida1);
	}
	
	/**
	 * Lista de hipermercados Alcampo -para rellenar comboHiper-
	 */
	 
	public function actionGetRegion(){
		
		header('Content-Type: application/json'); 
		$Criteria = new CDbCriteria();
		$Criteria->select = "distinct region";
		$Criteria->order = '"region"';
		
		
		$model=TblHiperAlcampo::model()->findAll($Criteria);
		$i1 = 0;
		//echo 'Seleccione emplazamiento para cargar datos: <select id="instalaciones" onChange="cargar()">';
		
		$salida1 = array();
		
		foreach($model as $m){
			array_push($salida1, array("id"=>$m->region, "nombre"=>"Región ".$m->region));
	
		}
		echo json_encode($salida1);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TblHiperAlcampo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-hiper-alcampo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
