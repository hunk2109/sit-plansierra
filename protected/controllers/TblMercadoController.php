<?php

class TblMercadoController extends Controller
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
					'actions'=>array('create','update','panelMercado','mercadoSectores'),
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
					'actions'=>array('create','update','panelMercado','mercadoSectores'),
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
	
	//---------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------
	/*
	* -----------------------------------------------------------------------------------
	* PANEL MERCADO
	* -----------------------------------------------------------------------------------
	*/	
	//---------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------
	
	public function actionpanelMercado($region, $anno){
		
		header('Content-Type: application/json');
		
		if(!is_numeric($region))
			exit("error");
		
		$salida = array();
		$annoIni=$anno."-01-01";
		$annoFin=$anno+'1';
		$annoFinFinal=$annoFin."-01-01";
		
		$model=TblZcMercados::model()->findAllBySql("SELECT 
													  min(tbl_sectores.desc_sector) as cp, 
													  tbl_mercado.desc_mercado as venta_no, 
													  sum(tbl_zc_mercados.venta_si + tbl_zc_mercados.venta_no + tbl_zc_mercados.venta_ns) as venta_si,
													  tbl_hiper_alcampo.region as folleto_si,
													  min(tbl_sectores.color) as folleto_no
													FROM 
													  public.tbl_hiper_alcampo, 
													  public.tbl_zc_mercados, 
													  public.tbl_zc, 
													  public.tbl_sectores, 
													  public.tbl_mercado
													WHERE 
													  tbl_zc_mercados.id_mercado = tbl_mercado.id_mercado AND
													  tbl_zc.id_alcampo = tbl_hiper_alcampo.id_hiper_alcampo AND
													  tbl_zc.cod_zipcode = tbl_zc_mercados.cod_zipcode AND
													  tbl_mercado.id_sector = tbl_sectores.id_sector AND
													  tbl_hiper_alcampo.region = ".$region." AND
													  tbl_zc.fecha_ini between '".$annoIni."' AND '".$annoFinFinal."'
													GROUP BY tbl_hiper_alcampo.region, tbl_mercado.desc_mercado order by cp, venta_no, folleto_si, folleto_no");

		foreach($model as $m){
			$k['sector'] = $m->cp;
			$k['mercado'] = $m->venta_no;
			$k['cv'] = (float)$m->venta_si;
			$k['region'] = $m->folleto_si;
			$k['color'] = $m->folleto_no;
			array_push($salida, $k);			
		}
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------		
	//GRÁFICO SECTORES Y MERCADO.
	//---------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------
	
	public function actionmercadoSectores(){
		
		//header('Content-Type: application/json');
		
		$hiper = $_GET['hiper'];
		$codigosPostales = $_GET['cp'];
		$idZC = $_GET['cod_zipcode'];
		$sector = $_GET['sector'];
		
		if(!is_numeric($hiper)){
			exit("error");
		}	
		
		$salida = array();
		
		$modelCV=TblZcMercados::model()->findAllBySql("SELECT 
															sum(tbl_zc_mercados.venta_si + tbl_zc_mercados.venta_no + tbl_zc_mercados.venta_ns) as venta_si 
														FROM 
															public.tbl_hiper_alcampo, 
															public.tbl_zc_mercados, 
															public.tbl_zc
														WHERE   
															tbl_zc.id_alcampo = tbl_hiper_alcampo.id_hiper_alcampo AND
															tbl_zc.cod_zipcode = tbl_zc_mercados.cod_zipcode AND  
															tbl_hiper_alcampo.id_hiper_alcampo = ".$hiper." AND
															tbl_zc_mercados.cp IN (".$codigosPostales.") AND
															tbl_zc_mercados.cod_zipcode = ".$idZC."");

		foreach($modelCV as $v){			
			$cvTotal = (float)$v->venta_si;			
		}
		
		//sum(tbl_zc_mercados.venta_si + tbl_zc_mercados.venta_no + tbl_zc_mercados.venta_ns)/".$cvTotal." * 100 as venta_si,
		$model=TblZcMercados::model()->findAllBySql("SELECT
														tbl_sectores.desc_sector as cp,  
														tbl_mercado.desc_mercado as venta_no, 
														sum(tbl_zc_mercados.venta_si + tbl_zc_mercados.venta_no + tbl_zc_mercados.venta_ns)/".$cvTotal." * 100 as venta_si,
														min(tbl_sectores.color) as folleto_no
													FROM 
														public.tbl_hiper_alcampo, 
														public.tbl_zc_mercados, 
														public.tbl_zc, 
														public.tbl_sectores, 
														public.tbl_mercado
													WHERE 
														tbl_zc_mercados.id_mercado = tbl_mercado.id_mercado AND
														tbl_zc.id_alcampo = tbl_hiper_alcampo.id_hiper_alcampo AND
														tbl_zc.cod_zipcode = tbl_zc_mercados.cod_zipcode AND
														tbl_mercado.id_sector = tbl_sectores.id_sector AND
														tbl_hiper_alcampo.id_hiper_alcampo = ".$hiper." AND
														tbl_zc_mercados.cod_zipcode = ".$idZC." AND
														tbl_zc_mercados.cp IN (".$codigosPostales.") AND
														tbl_sectores.desc_sector = '".$sector."'
													GROUP BY tbl_sectores.desc_sector, tbl_mercado.desc_mercado order by  venta_no, folleto_no");

		foreach($model as $m){
			$k['sector'] = $m->cp;
			$k['mercado'] = $m->venta_no;
			$k['cv'] = (float)$m->venta_si;
			//$k['region'] = $m->folleto_si;
			$k['color'] = $m->folleto_no;
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
		$model=new TblMercado;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblMercado']))
		{
			$model->attributes=$_POST['TblMercado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_mercado));
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

		if(isset($_POST['TblMercado']))
		{
			$model->attributes=$_POST['TblMercado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_mercado));
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
		$dataProvider=new CActiveDataProvider('TblMercado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblMercado('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblMercado']))
			$model->attributes=$_GET['TblMercado'];

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
		$model=TblMercado::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-mercado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
