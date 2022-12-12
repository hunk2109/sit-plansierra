<?php

class TblIsoPobController extends Controller
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
					'actions'=>array('create','update', 'getPob', 'getPobIso', 'exportExcel'),
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
					'actions'=>array('create','update', 'getPob', 'getPobIso', 'exportExcel'),
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

	public function actionExportExcel($id, $id_encuesta){
		$this->renderPartial('exportExcel');
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

	public function actionGetPobIso($id, $id_encuesta, $tipo='s'){
		header('Content-Type: application/json');
		
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
			exit("error2");	
		}
		
		$model = new GeoIsopolygon();
		$Criteria = new CDbCriteria();		
		$Criteria->condition = "gid IN (".$id.")";
		//$Criteria->params = array(':eid' => $id);
		$Criteria->order = "iso";
		$isos = $model->findAll($Criteria);
		$result = array();
		
		foreach($isos as $iso){
			$model2 = new TblIsoPob();
			$i = $iso->iso;
			$r = '';
			$t = '';
			$Criteria = new CDbCriteria();
			$Criteria->select = 'sum(p'.$i.') as p'.$i.', secc as secc';
			$Criteria->group = "secc" ;
			if($tipo == 'm'){
				$Criteria->select = 'sum(p'.$i.') as p'.$i.', left(secc, 5) as secc';
				$Criteria->group = "left(secc, 5)" ;
			}
			if($tipo == 'd'){
				$Criteria->select = 'sum(p'.$i.') as p'.$i.', left(secc, 7) as secc';
				$Criteria->order = 'secc';
				$Criteria->group = "left(secc, 7)" ;
			}
			//$Criteria->condition = "id_encuesta_zc = " . $id_encuesta . " AND p".$i." > 0";
			$Criteria->condition = "id_encuesta_zc = :eid AND p".$i." > 0";
			$Criteria->params = array(':eid' => $id_encuesta);
			$poblacion = $model2->findAll($Criteria);
			$k = array();
			$prov = array();
			$prov2 = array();
			
			foreach($poblacion as $p){
				$muni = $p->secc;
				
				if($tipo=='m'){
					$modelMuni = new TblMunicipios();
					$Criteria = new CDbCriteria();
					$Criteria->condition = "cod_mun = '".$p->secc."'";
					$mun = $modelMuni->find($Criteria);
					$muni = $mun->desc_mun;
				}
				if($tipo=='d'){
					$modelMuni = new TblMunicipios();
					$Criteria = new CDbCriteria();
					$Criteria->condition = "cod_mun = '".substr($muni, 0,5) ."'";
					//$Criteria->limit = -1;
					
					$mun = $modelMuni->find($Criteria);
					$muni = $mun->desc_mun . " - " . substr($muni, 5,2);					
				}
				
				$r[$muni] = array("pob"=>(float)$p['p'.$i], "cod"=>$p->secc);
				
				array_push($prov, (integer)substr($p->secc,0, 2)); 
			}
			
			$prov = array_unique ($prov);
			
			foreach($prov as $p){
				$model = new TblHogares();
				$Criteria = new CDbCriteria();
				$Criteria->condition = "cpro = :eid" ;
				$Criteria->params = array(':eid' => $p);
				//$Criteria->condition = "cpro=".$p;
				
				$resu = $model->find($Criteria);
				$k[$p] = (float)$resu->personas;
				
				array_push($prov2, $k);
			}
			
			$m = "";
			
			foreach($r as $key=>$g){
				
				$pr = substr($g['cod'], 0, 2);
				$pr = (Integer)$pr;
				
				$hog = $k[$pr];
				$g["hog"] = $g["pob"]/$hog;
				$m[$key] =$g;
			}
			//array_push($k, $r);
			array_push($result, array($i=>$m));
		}
		echo json_encode($result);
	}
	
	public function actionGetPob($id){
		header('Content-Type: application/json');
		$model = new VieEsTotalesNombres();
		$Criteria = new CDbCriteria();
		$Criteria->select = 'descripcion AS especie, sum(area_especie) as cantidad';
		$Criteria->condition = "ano = :eid" ;
		$Criteria->params = array(':eid' => $id);
		$Criteria->group = 'especie' ;
		$plantado = $model->find($Criteria);
		
				
		$result = array();
		$b = null;
		
		foreach($plantado as $b){
			$b['name'] = $plantado->especie;
	        $b['y'] =  $plantado->cantidad;
	        array_push($result, $b);
		}
		 echo json_encode($result);
	

	}


	
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TblIsoPob;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblIsoPob']))
		{
			$model->attributes=$_POST['TblIsoPob'];
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

		if(isset($_POST['TblIsoPob']))
		{
			$model->attributes=$_POST['TblIsoPob'];
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
		$dataProvider=new CActiveDataProvider('TblIsoPob');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblIsoPob('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblIsoPob']))
			$model->attributes=$_GET['TblIsoPob'];

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
		$model=TblIsoPob::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-iso-pob-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
