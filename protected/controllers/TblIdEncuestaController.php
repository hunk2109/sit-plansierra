<?php

class TblIdEncuestaController extends Controller
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
					'actions'=>array('create','update', 'getAll'),
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
					'actions'=>array('create','update', 'getAll'),
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


	public function actionGetAll($id = -1)
	{
		header('Content-Type: application/json');
		$model=new TblIdEncuesta;
		$Criteria = new CDbCriteria();
		//$Criteria->with= array('codZipcode');
		$Criteria->select = "id_encuesta, EXTRACT(year FROM fecha_encuesta) as fecha_encuesta, id_alcampo";
		$Criteria->condition = 'id_alcampo = :eid';
		$Criteria->params = array(':eid' => $id);
		$Criteria->order = 'fecha_encuesta DESC';
		$zc;
		if($id==-1)
			$zc = $model->findAll();
		else
			$zc = $model->findAll($Criteria);
		$result = array();
		foreach($zc as $z){
			//$r = array($z->cod_zipcode, $z->fecha_ini, $z->fecha_fin, $z->id_alcampo);
			//foreach($z->attributeNames() as $at){
				//$r[$at]=$z->$at;
			//}
			$r['fecha_encuesta']=$z->fecha_encuesta;
			$r['id_encuesta']=$z->id_encuesta;
			$r['id_alcampo']=$z->idAlcampo->nombre;
			array_push($result, $r);
		}
		echo json_encode($result);
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
		$model=new TblIdEncuesta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblIdEncuesta']))
		{
			$model->attributes=$_POST['TblIdEncuesta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_encuesta));
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

		if(isset($_POST['TblIdEncuesta']))
		{
			$model->attributes=$_POST['TblIdEncuesta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_encuesta));
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
		$dataProvider=new CActiveDataProvider('TblIdEncuesta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblIdEncuesta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblIdEncuesta']))
			$model->attributes=$_GET['TblIdEncuesta'];

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
		$model=TblIdEncuesta::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-id-encuesta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
