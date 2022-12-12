<?php

class TblPoblaAisController extends Controller
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
					'actions'=>array('index','view','panelHabits','getProvincias','getMunicipios'),
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
					'actions'=>array('index','view','panelHabits','getProvincias','getMunicipios'),
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
		}
	}
	
	//--------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------
	
	public function actionGetProvincias(){
		
		header('Content-Type: application/json'); 		

		$model = TblPoblaAis::model()->findAllBySql("SELECT distinct a.cod_prov as cod_prov, b.nom_prov as cod_mun
													FROM public.tbl_pobla_ais as a, geo_prov as b
													WHERE a.cod_prov=b.cod_prov
													ORDER BY cod_prov asc;");
		
		$salida = array();
		
		foreach($model as $m){
			array_push($salida, array("cod_mun"=>$m->cod_mun,"cod_prov"=>$m->cod_prov));
	
		}
		echo json_encode($salida);
	}	

	public function actionGetMunicipios($provincia){
		header('Content-Type: application/json'); 
				
		$model = TblPoblaAis::model()->findAllBySql("SELECT distinct a.cod_mun as cod_mun, b.desc_mun as cod_prov
													FROM public.tbl_pobla_ais as a, public.tbl_municipios as b
													WHERE a.cod_prov=:provincia AND a.cod_mun = b.cod_mun
													ORDER BY a.cod_mun asc;",array(":provincia"=> $provincia));		
		
		$salida = array();
		
		foreach($model as $m){
			array_push($salida, array("cod_mun"=>$m->cod_mun,"cod_prov"=>$m->cod_prov));
	
		}
		echo json_encode($salida);
	}
	
	public function actionpanelHabits($provincia, $municipio){
		
		header('Content-Type: application/json');
		
		$salida = array();
		
		$model=TblPoblaAis::model()->findAllBySql("SELECT 
													sum(tbl_pobla_ais.a) as a, 
													sum(tbl_pobla_ais.b) as b, 
													sum(tbl_pobla_ais.c) as c, 
													sum(tbl_pobla_ais.d) as d, 
													sum(tbl_pobla_ais.e) as e, 
													sum(tbl_pobla_ais.f) as f, 
													sum(tbl_pobla_ais.g) as g, 
													sum(tbl_pobla_ais.h) as h, 
													sum(tbl_pobla_ais.i) as i, 
													sum(tbl_pobla_ais.j) as j, 
													sum(tbl_pobla_ais.k) as k, 
													sum(tbl_pobla_ais.l) as l, 
													sum(tbl_pobla_ais.m) as m, 
													sum(tbl_pobla_ais.n) as n, 
													sum(tbl_pobla_ais.o) as o, 
													sum(tbl_pobla_ais.p) as p, 
													sum(tbl_pobla_ais.q) as q, 
													sum(tbl_pobla_ais.r) as r
												FROM 
													public.tbl_pobla_ais
												WHERE
													tbl_pobla_ais.cod_prov=:provincia AND
													tbl_pobla_ais.cod_mun=:municipio",array(":provincia"=> $provincia, ":municipio"=> $municipio));
													
		foreach($model as $m){
			$k['a'] = (int)$m->a;
			$k['b'] = (int)$m->b;
			$k['c'] = (int)$m->c;
			$k['d'] = (int)$m->d;
			$k['e'] = (int)$m->e;
			$k['f'] = (int)$m->f;
			$k['g'] = (int)$m->g;
			$k['h'] = (int)$m->h;
			$k['i'] = (int)$m->i;
			$k['j'] = (int)$m->j;
			$k['k'] = (int)$m->k;
			$k['l'] = (int)$m->l;
			$k['m'] = (int)$m->m;
			$k['n'] = (int)$m->n;
			$k['o'] = (int)$m->o;
			$k['p'] = (int)$m->p;
			$k['q'] = (int)$m->q;
			$k['r'] = (int)$m->r;			
			array_push($salida, $k);			
		}		
		echo json_encode($salida);
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
		$model=new TblPoblaAis;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblPoblaAis']))
		{
			$model->attributes=$_POST['TblPoblaAis'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['TblPoblaAis']))
		{
			$model->attributes=$_POST['TblPoblaAis'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('TblPoblaAis');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblPoblaAis('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblPoblaAis']))
			$model->attributes=$_GET['TblPoblaAis'];

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
		$model=TblPoblaAis::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-pobla-ais-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
