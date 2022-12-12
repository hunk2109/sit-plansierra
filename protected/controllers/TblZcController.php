<?php

class TblZcController extends Controller
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
					'actions'=>array('create','update', 'getAll', 'getAllIso', 'getZCAlcampo', 'getCVAlcampo','GetPeriodos'),
					'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','delete'),
					'users'=>array('admin'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('actualizaZC'),
					'users'=>array('jlAlberruche','admin22'),
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
					'actions'=>array('create','update', 'getAll', 'getAllIso', 'getZCAlcampo', 'getCVAlcampo','GetPeriodos'),
					'users'=>array('*'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','delete'),
					'users'=>array('admin'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('actualizaZC'),
					'users'=>array('jlAlberruche','admin22'),
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
	
	public function actionGetAll($id = -1)
	{
		header('Content-Type: application/json');
		$model=new TblZc;
		$Criteria = new CDbCriteria();
		//$Criteria->select = "cod_zipcode, EXTRACT(week FROM fecha_ini) || "-" || EXTRACT(month FROM fecha_ini) as fecha_ini, fecha_fin, cv, tipo_zc, id_alcampo";
		//$Criteria->with= array('codZipcode');
		//$Criteria->condition = 'id_alcampo = ' . $id;
		$Criteria->condition = 'id_alcampo = :eid';
		$Criteria->params = array(':eid' => $id);
		$Criteria->order = 'fecha_ini desc';
		
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
			$r['cod_zipcode']=$z->cod_zipcode;
			
			$anno = substr($z->fecha_ini, 0, -6);
			$mes = substr($z->fecha_ini, 5, -3);
			if($mes == "01"){
				$mes="Enero";
			}
			if($mes == "02"){
				$mes="Febrero";
			}
			if($mes == "03"){
				$mes="Marzo";
			}
			if($mes == "04"){
				$mes="Abril";
			}
			if($mes == "05"){
				$mes="Mayo";
			}
			if($mes == "06"){
				$mes="Junio";
			}
			if($mes == "07"){
				$mes="Julio";
			}
			if($mes == "08"){
				$mes="Agosto";
			}
			if($mes == "09"){
				$mes="Septiembre";
			}
			if($mes == "10"){
				$mes="Octubre";
			}
			if($mes == "11"){
				$mes="Noviembre";
			}
			if($mes == "12"){
				$mes="Diciembre";
			}
			$r["fecha_ini"] = $mes." ".$anno;			
			$r['fecha_fin']=$z->fecha_fin;
			$r['id_alcampo']=$z->idAlcampo->nombre;
			$r['cv']=$z->cv;
			$r['tipo_zc']=$z->tipo_zc;
			array_push($result, $r);
		}
		echo json_encode($result);
	}
	
	public function actionGetAllIso($id = -1)
	{
		header('Content-Type: application/json');
		$model=new TblZc;
			
		$zc;
		if($id==-1)
			$zc = $model->findAll();
		else
			$zc = $model->findAllBySql("SELECT
									 tbl_zc.cod_zipcode,									 
									  min(tbl_zc.fecha_ini) as fecha_ini
									FROM
									  public.tbl_iso_cv,
									  public.tbl_zc
									WHERE
									  tbl_iso_cv.id_encuesta_zc = tbl_zc.cod_zipcode and tbl_zc.id_alcampo=".$id."								 
									GROUP BY
									   tbl_iso_cv.id_encuesta_zc, tbl_zc.cod_zipcode
									ORDER BY
										fecha_ini desc");
		$result = array();
		foreach($zc as $z){
			//$r = array($z->cod_zipcode, $z->fecha_ini, $z->fecha_fin, $z->id_alcampo);
			//foreach($z->attributeNames() as $at){
				//$r[$at]=$z->$at;
			//}
			$r['cod_zipcode']=$z->cod_zipcode;
			
			$anno = substr($z->fecha_ini, 0, -6);
			$mes = substr($z->fecha_ini, 5, -3);
			if($mes == "01"){
				$mes="Enero";
			}
			if($mes == "02"){
				$mes="Febrero";
			}
			if($mes == "03"){
				$mes="Marzo";
			}
			if($mes == "04"){
				$mes="Abril";
			}
			if($mes == "05"){
				$mes="Mayo";
			}
			if($mes == "06"){
				$mes="Junio";
			}
			if($mes == "07"){
				$mes="Julio";
			}
			if($mes == "08"){
				$mes="Agosto";
			}
			if($mes == "09"){
				$mes="Septiembre";
			}
			if($mes == "10"){
				$mes="Octubre";
			}
			if($mes == "11"){
				$mes="Noviembre";
			}
			if($mes == "12"){
				$mes="Diciembre";
			}
			$r["fecha_ini"] = $mes." ".$anno;			
			
			array_push($result, $r);
		}
		echo json_encode($result);
	}

	public function actionGetZCAlcampo($id){
		header('Content-Type: application/json');
		$model=new TblZc;
		$Criteria = new CDbCriteria();
		//$Criteria->with= array('codZipcode');
		$Criteria->condition = 'id_alcampo = :eid';
		$Criteria->params = array(':eid' => $id);
		
		$Criteria->order = 'fecha_ini DESC';
		$zc = $model->find($Criteria);
		$result = array();
		$cv = $zc->cv;
		$i = 0;
		foreach($zc->tblZcConsolidados as $cons){
			//$r['cp'] = $cons->cp;
			//$r['y'] = ($cons->venta_si + $cons->venta_no + $cons->venta_ns)*$cv/100;
			$r = array($cons->cp, ($cons->venta_si + $cons->venta_no + $cons->venta_ns)*$cv/100);
			array_push($result, $r);
			if($i==10)
				break;
			$i = $i+1;
		}
		
		echo json_encode($result);
	}
	
	
	public function actionGetCVAlcampo($id, $zc, $euros=true){
		header('Content-Type: application/json');
		
		$result = array();
		$codigos_postales = array();
		
		$model_consolidado=new TblZcConsolidado;
		$Criteria = new CDbCriteria();
		$Criteria->select = "(venta_si + venta_no + venta_ns) as venta_si, cp";
		$Criteria->condition = "cod_zipcode = :eid" ;
		$Criteria->params = array(':eid' => $zc);
		$Criteria->order = "venta_si DESC";
		$Criteria->limit = 10;
		$cod = $model_consolidado->findAll($Criteria);
		$suma = 0;
		foreach($cod as $c){
			array_push($codigos_postales, $c->cp);
		}

		$model=new TblZc;
		$Criteria = new CDbCriteria();
		$Criteria->condition = "tipo_zc = 1 AND id_alcampo = :eid" ;
		$Criteria->params = array(':eid' => $id);
		$Criteria->order = "fecha_ini";
		$zipcodes = $model->findAll($Criteria);

		foreach($codigos_postales as $codigo){

			$fechas = array();		
			
			foreach($zipcodes as $z){
				$r['cp']= $codigo;
				
				$Criteria = new CDbCriteria();
				$Criteria->select = "(venta_si + venta_no + venta_ns) as venta_si, cp";
				$Criteria->condition = "cp = '".$codigo."' AND cod_zipcode = ".$z->cod_zipcode ;
				$Criteria->params = array(':eid' => $zc);
				$cod = $model_consolidado->find($Criteria);
				//Comprobamos si la consulta devuelve cifra de venta en todos los ZC de todas las encuestas. Si un año tenía cifra de venta y en otro no, le ponemos un cero para que haga el cálculo y no de error.
				if($cod == NULL || $cod == ""){
					$venta_codigo = 0;
				}else{
					$venta_codigo = $cod->venta_si;
				}
				//----------------------------------------------------------------------------------------------------------
				$cifra_venta_total = $z->cv;
				$fecha = $z->fecha_ini;
				$mi_zc = $z->cod_zipcode;

				$Criteria = new CDbCriteria();
				$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si";
				$Criteria->condition = "cod_zipcode = " . $mi_zc ;
				$cod = $model_consolidado->find($Criteria);
				$suma_zipcode = $cod->venta_si;
				
				array_push($fechas, array("fecha"=>strtotime($fecha)*1000, "porc_cv" => 100*$venta_codigo/$suma_zipcode, "cv" => $cifra_venta_total * ($venta_codigo/$suma_zipcode)/1000000));
			}
			
			$r['datos'] = $fechas;
			array_push($result, $r);
			$r='';
		}
		
		echo json_encode($result);
	}
	
	public function actionGetPeriodos(){
		
		header('Content-Type: application/json'); 
		$Criteria = new CDbCriteria();
		$Criteria->select = "distinct extract(year from fecha_ini::date) as fecha_ini";
		//$Criteria->condition = 'id_hiper = ' . $id_hiper;
		//$Criteria->group = "fecha_ini";
		$Criteria->order = "extract(year from fecha_ini::date) DESC";
		//$Criteria->distinct = true;
		
		$model=TblZc::model()->findAll($Criteria);
		$salida = array();
		foreach($model as $m){			
			$k["id"] = $m->fecha_ini;
			array_push($salida, $k);	
		}
		
		echo json_encode($salida);
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TblZc;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblZc']))
		{
			$model->attributes=$_POST['TblZc'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cod_zipcode));
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

		if(isset($_POST['TblZc']))
		{
			$model->attributes=$_POST['TblZc'];
			if($model->save())
				$this->redirect(array('actualizaZC'));
			else
				$this->redirect(array('actualizaZC'));
		}

		/*$this->render('update',array(
			'model'=>$model,
		));
		$this->renderPartial('update',array(
			'model'=>$model,
		));*/
	}
	
	public function actionActualizaZC()
	{
		
		$this->renderPartial('actualizaZC');
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
		$dataProvider=new CActiveDataProvider('TblZc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblZc('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblZc']))
			$model->attributes=$_GET['TblZc'];

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
		$model=TblZc::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-zc-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
