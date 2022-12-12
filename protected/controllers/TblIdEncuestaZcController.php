<?php

class TblIdEncuestaZcController extends Controller
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
					'actions'=>array('create','update','getCampanaHiper','getEvolucionCVTotal'),
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
					'actions'=>array('create','update','getCampanaHiper','getEvolucionCVTotal'),
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
		$model=new TblIdEncuestaZc;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblIdEncuestaZc']))
		{
			$model->attributes=$_POST['TblIdEncuestaZc'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_encuesta_zc));
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

		if(isset($_POST['TblIdEncuestaZc']))
		{
			$model->attributes=$_POST['TblIdEncuestaZc'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_encuesta_zc));
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
		$dataProvider=new CActiveDataProvider('TblIdEncuestaZc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblIdEncuestaZc('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblIdEncuestaZc']))
			$model->attributes=$_GET['TblIdEncuestaZc'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	* Para rellenar comboCampana (Lista de campañas del ZIP_CODE asociada a un Hipermercado Alcampo. Se rellena cuando el usuario elige un Alcampo en
	* comboHiper)
	*/
	public function actionGetCampanaHiper($idHiperAlcampo)
	{
		// En la consulta poner ORDER BY fecha inicio DESC; de este modo, por defecto, 
		// el mapa que se visualiza corresponde siempre a la última campaña
	}
	
	/**
	* Evolución de CV y total
	*/
	public function actionGetEvolucionCVTotal()
	{
	/*
		SELECT cp, fecha_ini, (cv*cv_porc)/100 AS cv_euros FROM tbl_id_encuesta_zc, tbl_zipcode
		WHERE tbl_zipcode.cp IN 
		(SELECT tbl_zipcode.cp
		FROM tbl_zipcode, tbl_id_encuesta_zc
		WHERE tbl_zipcode.id_encuesta_zc = tbl_id_encuesta_zc.id_encuesta_zc 
		AND tbl_id_encuesta_zc.id_encuesta_zc = 1 --obtenemos valor del comboCampana
		ORDER BY cv_porc DESC LIMIT 10) 
		AND tbl_zipcode.id_encuesta_zc = tbl_id_encuesta_zc.id_encuesta_zc
		AND id_hiper_alcampo = 5 -- obtenemos valor del comboHiper
		ORDER BY cp, fecha_ini
	*/
	}
	
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TblIdEncuestaZc::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-id-encuesta-zc-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
