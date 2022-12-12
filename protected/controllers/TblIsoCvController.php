<?php

class TblIsoCvController extends Controller
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
					'actions'=>array('create','update', 'loadIso', 'getIsoFechas', 'getEvolucion'),
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
					'actions'=>array('create','update', 'loadIso', 'getIsoFechas', 'getEvolucion'),
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

	public function actionGetEvolucion($idAlcampo, $euros=true){
		header('Content-Type: application/json');
		$model = new TblIsoCv();
		$Criteria = new CDbCriteria();
		$Criteria->select = '"id_encuesta_zc", "idEncuestaZc"."fecha_ini" as fecha_ini, cv, iso';
		$Criteria->with = 'idEncuestaZc';
		$Criteria->condition = '"idEncuestaZc"."id_alcampo" = :eid';
		$Criteria->params = array(':eid' => $idAlcampo);
		$Criteria->order = '"idEncuestaZc"."fecha_ini"  ASC';
		$fechas = $model->findAll($Criteria);
		$fech = array();
		$iso1 = array();
		$iso2 = array();
		$iso3 = array();
		$iso4 = array();
		$iso5 = array();
		$resto = array();
		
		$id_encuesta = array();
		
		foreach($fechas as $fecha){
			array_push($id_encuesta, $fecha->id_encuesta_zc);
			if($fecha->iso == 1){
				array_push($iso1, (float)$fecha->cv);
				array_push($fech, substr($fecha->fecha_ini, 0, 4));
			}
			if($fecha->iso == 2)
				array_push($iso2, (float)$fecha->cv);
			if($fecha->iso == 3)
				array_push($iso3, (float)$fecha->cv);
			if($fecha->iso == 4)
				array_push($iso4, (float)$fecha->cv);
			if($fecha->iso == 5)
				array_push($iso5, (float)$fecha->cv);
			if($fecha->iso == 6)
				array_push($resto, (float)$fecha->cv);
		}
		
		if($euros=="true"){
			$id_encuesta = array_unique ($id_encuesta);
			$i = 0;
			foreach($id_encuesta as $id){
				$model = new TblZc();
				$Criteria = new CDbCriteria();
				$Criteria->condition = "cod_zipcode = ".$id;
				$total = $model->find($Criteria);
				$cv = $total->cv;
				$iso1[$i] = $iso1[$i]*$cv/100000000;
				$iso2[$i] = $iso2[$i]*$cv/100000000;
				$iso3[$i] = $iso3[$i]*$cv/100000000;
				$iso4[$i] = $iso4[$i]*$cv/100000000;
				$iso5[$i] = $iso5[$i]*$cv/100000000;
				$resto[$i] = $resto[$i]*$cv/100000000;
				$i++;
			}
			
		}
		echo json_encode(array("fechas"=>$fech, "iso1"=>$iso1, "iso2"=>$iso2, "iso3"=>$iso3, "iso4"=>$iso4, "iso5"=>$iso5, "resto"=>$resto));
	}
	public function actionGetIsoFechas($idAlcampo){
		header('Content-Type: application/json');
		$model = new TblIsoCv();
		$Criteria = new CDbCriteria();
		$Criteria->select = '"id_encuesta_zc", EXTRACT(year FROM "idEncuestaZc"."fecha_ini") as fecha_ini';
		$Criteria->with = 'idEncuestaZc';
		$Criteria->condition = '"idEncuestaZc"."id_alcampo" = :eid AND iso = 1';
		$Criteria->params = array(':eid' => $idAlcampo);
		$Criteria->order = '"idEncuestaZc"."fecha_ini"  DESC';
		$fechas = $model->findAll($Criteria);
		$result = array();
		
		foreach($fechas as $fecha){
			$r['fecha_encuesta']=$fecha->fecha_ini;
			$r['id_encuesta']=$fecha->id_encuesta_zc;
			array_push($result, $r);
			//$r['id_alcampo']=$z->idAlcampo->nombre;
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
		$model=new TblIsoCv;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblIsoCv']))
		{
			$model->attributes=$_POST['TblIsoCv'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_iso_cv_zc));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionLoadIso()
	{
		$this->renderPartial('loadIso');
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

		if(isset($_POST['TblIsoCv']))
		{
			$model->attributes=$_POST['TblIsoCv'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_iso_cv_zc));
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
		$dataProvider=new CActiveDataProvider('TblIsoCv');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblIsoCv('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblIsoCv']))
			$model->attributes=$_GET['TblIsoCv'];

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
		$model=TblIsoCv::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-iso-cv-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
