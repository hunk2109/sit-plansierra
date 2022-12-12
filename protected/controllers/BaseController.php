<?php

class SeccionesController extends Controller
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
					'actions'=>array('index','view', 'infoExtranjeros', 'info'),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update'),
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
					'actions'=>array('index','view', 'infoExtranjeros', 'info'),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update'),
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
		$model=new Secciones;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Secciones']))
		{
			$model->attributes=$_POST['Secciones'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->gid));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionInfoExtranjeros($id){
		header('Content-Type: application/json');
		$model=new Secciones;
		$Criteria = new CDbCriteria();
		//$Criteria->with= array('codZipcode');
		$Criteria->condition = 'gid = :eid';
		$Criteria->params = array(':eid' => $id);
		$secciones = $model->findAll($Criteria);
		$result = array();
		$total;
		$totalEx;
		foreach($secciones as $seccion){
			
			array_push($result,array('español', (float) $seccion->total));
			array_push($result,array('africana_1', (float) $seccion->africana_1));
			array_push($result,array('american_1', (float) $seccion->american_1));
			array_push($result,array('asiatica_1', (float) $seccion->asiatica_1));
			array_push($result,array('europea_1', (float) $seccion->europea_1));
			array_push($result,array('resto_1', (float) $seccion->resto_1));
			
			$total = (float)$seccion->total;
			$totalEx = (float)$seccion->total_ex_1;
		}
		
		echo json_encode(array(array(array("total", $total), array("extranjeros", $totalEx)),$result));
	}
	
	public function actionInfo($id){
		header('Content-Type: application/json');
		$model=new Secciones;
		$Criteria = new CDbCriteria();
		//$Criteria->with= array('codZipcode');
		$Criteria->condition = 'gid = :eid';
		$Criteria->params = array(':eid' => $id);
		$secciones = $model->find($Criteria);
		$result = array();
		$f = $secciones->attributeNames();
		$i=0;
		foreach($secciones->attributes as $a){
			array_push($result, array($f[$i]=>$a));
			//echo $a;
			$i++;
		}
		echo json_encode($result);
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

		if(isset($_POST['Secciones']))
		{
			$model->attributes=$_POST['Secciones'];
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
		$dataProvider=new CActiveDataProvider('Secciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Secciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Secciones']))
			$model->attributes=$_GET['Secciones'];

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
		$model=Secciones::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='secciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
