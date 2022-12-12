<?php

class GeoIsolinesController extends Controller
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
					'actions'=>array('create','update', 'getIsoHiper'),
					'users'=>array('@'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update', 'getIsoHiper2'),
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
					'actions'=>array('create','update', 'getIsoHiper'),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update', 'getIsoHiper2'),
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

	public function actionGetIsoHiper($id){
		ob_start("ob_gzhandler");
		header('Content-Type: application/json');
		$seconds_to_cache = 36000;
		$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
		header("Expires: $ts");
		header("Pragma: cache");
		header("Cache-Control: max-age=$seconds_to_cache");
		ini_set("memory_limit","1000M");
		if(!is_numeric($id))
			exit("error2");
		$dbconn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='sigma'");
		
		$SQL = "select st_asgeojson(geom) from geo_isolines where iso < 6 and id_hiper = ".$id;

		$result = pg_query($dbconn, $SQL);
		$resultado = array();
		while($row = pg_fetch_row($result)){
			$f = json_decode($row[0]);
			$feat = $f->coordinates;
			array_push($resultado, $feat);
			
		}		
		echo json_encode($resultado);
		ob_end_flush();
		
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	 
	 	public function actionGetIsoHiper2($id){
		ob_start("ob_gzhandler");
		header('Content-Type: application/json');
		$seconds_to_cache = 36000;
		$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
		header("Expires: $ts");
		header("Pragma: cache");
		header("Cache-Control: max-age=$seconds_to_cache");
		ini_set("memory_limit","1000M");
		if(!is_numeric($id))
			exit("error2");
		
		$dbconn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='sigma'");
		
		$SQL = "select st_asgeojson(geom) from geo_isolines where iso <4 and st_length(geom)>50 and id_hiper = ".$id;

		$result = pg_query($dbconn, $SQL);
		$resultado = array();
		while($row = pg_fetch_row($result)){
			$f = json_decode($row[0]);
			$feat = $f->coordinates;
			array_push($resultado, $feat);
			
		}		
		echo json_encode($resultado);
		ob_end_flush();

		}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GeoIsolines;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GeoIsolines']))
		{
			$model->attributes=$_POST['GeoIsolines'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->gid));
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

		if(isset($_POST['GeoIsolines']))
		{
			$model->attributes=$_POST['GeoIsolines'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->gid));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('GeoIsolines');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GeoIsolines('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GeoIsolines']))
			$model->attributes=$_GET['GeoIsolines'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=GeoIsolines::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='geo-isolines-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
