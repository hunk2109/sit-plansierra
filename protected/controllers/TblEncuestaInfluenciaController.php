<?php

class TblEncuestaInfluenciaController extends Controller
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
					'actions'=>array('create','update', 'loadEncuesta', 'getClientes', 'evolucion', 'clientesPrincPrevio'),
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
					'actions'=>array('create','update', 'loadEncuesta', 'getClientes', 'evolucion', 'clientesPrincPrevio'),
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

	public function actionEvolucion($idEncuesta){
		header('Content-Type: application/json');
		$model=new TblIdEncuesta;
		$Criteria = new CDbCriteria();
		$Criteria->condition = "id_encuesta = :eid";
		$Criteria->params = array(':eid' => $idEncuesta);
		$total1 = $model->find($Criteria);
		$cod_nielssen = $total1->idAlcampo->cod_nielssen;
		$id_alcampo = $total1->id_alcampo;
		
		$model=new TblCodigoMkt;
		$Criteria = new CDbCriteria();
		$Criteria->condition = "nielssen = '" . $cod_nielssen . "'";
		$total1 = $model->find($Criteria);
		$cod_hiper = $total1->codigo;
		//$cod_nielssen = $total1->idAlcampo->cod_nielssen;
		
		
		$model=new TblIdEncuesta;
		$Criteria = new CDbCriteria();
		$Criteria->condition = "id_alcampo = " . $id_alcampo;
		$Criteria->order = "fecha_encuesta";
		$total1 = $model->findAll($Criteria);
		
		$modelInfluencia = new TblEncuestaInfluencia;
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(ponderacion) as ponderacion, p as p";
		$Criteria->condition = " id_encuesta = :eid AND t.tipo = 'P1'";
		$Criteria->params = array(':eid' => $idEncuesta);
		$Criteria->group = "p";
		$Criteria->order = "sum(ponderacion) DESC";
		$clientes = $modelInfluencia->findAll($Criteria);
		
		$centros = array();
		$i = 0;
		foreach($clientes as $cliente){
			if($cliente->p0->observ!=null && $cliente->p0->observ != "NS/NC"){
				array_push($centros, $cliente->p);
				$i++;
			}
			if($i == 10)
				break;
		}
		
		$categorias = array();
		$datos = array();
		foreach($total1 as $t){
			
			array_push($categorias, $t->fecha_encuesta);
			
			$Criteria = new CDbCriteria();
			$Criteria->select = "sum(ponderacion) as ponderacion";
			$Criteria->condition = "t.tipo = 'P1' AND id_encuesta = " . $t->id_encuesta;
			$pond = $modelInfluencia->find($Criteria);
			$totalEncuesta = $pond->ponderacion;
			
			foreach($centros as $centro){
				$nombre = '';
				$Criteria = new CDbCriteria();
				$Criteria->select = "sum(ponderacion) as ponderacion, p as p";
				$Criteria->condition = " p = '" . $centro . "' AND t.tipo = 'P1' AND id_encuesta = " . $t->id_encuesta;
				$Criteria->group = "p";
				$Criteria->order = "sum(ponderacion) DESC";
				$clientes = $modelInfluencia->findAll($Criteria);
				$i = 0;
				$f = array();
				$ok = false;
				foreach($clientes as $cliente){
					$nombre = $cliente->p0->observ;
					if($cliente->p0->observ!=null && $cliente->p0->observ != "NS/NC"){
						array_push($f, 100*$cliente->ponderacion/$totalEncuesta);
						$i++;
						
					}
					if($i == 10)
						break;
				}
				$c['data'] = $f;
				$c['name'] = $nombre;
				if($cod_hiper == $centro)
					$c['lineWidth'] = 6;
				else
					$c['lineWidth'] = 1;
				$ok = false;
				for($a = 0; $a<count($datos); $a++){
					if(array_key_exists("name", $datos[$a]) && $datos[$a]['name'] ==$nombre){
						$ok = true;
						if($f)
							array_push($datos[$a]['data'], $f[0]);
					}
				}
				if(count($datos)==0 || !$ok){
					array_push($datos, $c);
				}
			}
			
			
		}
		
		echo json_encode(array("categorias"=>$categorias, "datos"=>$datos));
		
		
	}
	
	public function actionClientesPrincPrevio($idEncuesta, $loc=-1){
		header('Content-Type: application/json');
		$model = new TblIdEncuesta;
		$Criteria = new CDbCriteria();
		$Criteria->condition = "id_encuesta = :eid";
		$Criteria->params = array(':eid' => $idEncuesta);
		$c = $model->find($Criteria);
		$idAlcampo = $c->id_alcampo;
		$fecha = $c->fecha_encuesta;
		
		$model = new TblIdEncuesta;
		$Criteria = new CDbCriteria();
		$Criteria->condition = "id_alcampo = ".$idAlcampo . " AND id_encuesta <> :eid AND fecha_encuesta < '" . $fecha . "'";		
		$Criteria->params = array(':eid' => $idEncuesta);
		$Criteria->order = "fecha_encuesta";
		$c = $model->find($Criteria);
		
		if($c){
			$oldEncuesta = $c->id_encuesta;
			$model=new TblEncuestaInfluencia;
			$Criteria = new CDbCriteria();
			$Criteria->select = "sum(ponderacion) as ponderacion";
			$Criteria->condition = "id_encuesta = " . $oldEncuesta . " AND tipo = 'P1'";
			if($loc!=-1){
				$Criteria->condition = "id_encuesta = " . $oldEncuesta . " AND tipo = 'P1' AND loc_mkt IN (".$loc.")";
				//$Criteria->params = array(':eid' => $loc);
			}
				
			$total1 = $model->find($Criteria);
			$total = $total1->ponderacion;
			
			$Criteria = new CDbCriteria();
			$Criteria->select = "sum(ponderacion) as ponderacion, p as p";
			$Criteria->condition = " id_encuesta = " . $oldEncuesta ;
			if($loc!=-1){
				$Criteria->condition = "id_encuesta = " . $oldEncuesta . " AND loc_mkt IN (".$loc.")";	
				//$Criteria->params = array(':eid' => $loc);
			}
					
			$Criteria->group = "p";
			$Criteria->order = "sum(ponderacion) DESC";
			$clientes = $model->findAll($Criteria);
			
			$result1 = array();
			foreach($clientes as $cliente){
				if($cliente->p0->observ!=null && $cliente->p0->observ != "NS/NC"){
					$r['principales'] = 100*$cliente->ponderacion/$total;
					$result1[$cliente->p0->observ] =  $r;
				}
			}
			echo json_encode($result1);
		}else
			echo json_encode("sin datos");
		
	}
	
	public function actionGetClientes($idEncuesta, $loc=-1){
		header('Content-Type: application/json');
		
		$model=new TblEncuestaInfluencia;
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(ponderacion) as ponderacion";
		$Criteria->condition = "id_encuesta = :eid AND tipo = 'P1'";
		$Criteria->params = array(':eid' => $idEncuesta);
		if($loc!=-1){
			$Criteria->condition = "id_encuesta = :eid AND tipo = 'P1' AND loc_mkt IN (".$loc.")";
			$Criteria->params = array(':eid' => $idEncuesta);
		}
			
		$total1 = $model->find($Criteria);
		$total = $total1->ponderacion;
		//echo $loc;
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(ponderacion) as ponderacion, p as p";
		$Criteria->condition = " id_encuesta = :eid AND t.tipo = 'P1'";
		$Criteria->params = array(':eid' => $idEncuesta);
		if($loc!=-1){
			$Criteria->condition = "id_encuesta = :eid AND tipo = 'P1' AND loc_mkt IN (".$loc.")";
			$Criteria->params = array(':eid' => $idEncuesta);
		}
			
		
		$Criteria->group = "p";
		$Criteria->order = "sum(ponderacion) DESC";
		$clientes = $model->findAll($Criteria);
		
		$result1 = array();
		$i = 0;
		foreach($clientes as $cliente){
			if($cliente->p0->observ!=null && $cliente->p0->observ != "NS/NC"){
				$r['principales'] = 100*$cliente->ponderacion/$total;
				$result1[$cliente->p0->observ] =  $r;
				$i++;
			}
			if($i == 10)
				break;
		}
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(ponderacion) as ponderacion, p as p";
		$Criteria->condition = "id_encuesta = :eid";
		$Criteria->params = array(':eid' => $idEncuesta);
		if($loc!=-1){
			$Criteria->condition = "id_encuesta = :eid AND loc_mkt IN (".$loc.")";
			$Criteria->params = array(':eid' => $idEncuesta);
		}
			
		$Criteria->group = "p";
		$clientes2 = $model->findAll($Criteria);
		
		$result2 = array();
		foreach($clientes2 as $cliente2){
			if($cliente2->p0->observ!=null && $cliente2->p0->observ != "NS/NC"){
				$r['totales'] = 100*$cliente2->ponderacion/$total;
				//$r['p'] = $cliente->p0->observ;
				if(array_key_exists($cliente2->p0->observ, $result1)){
					$r['principales'] = $result1[$cliente2->p0->observ]['principales'];
					$result1[$cliente2->p0->observ] = $r;
				}/*else{
					$r['principales'] = 0;
					$result1[$cliente2->p0->observ] = $r;
				}*/
				
			}
			
		}
		echo json_encode($result1);
		/*echo (array("principales" => $result1, "totales"=>$result2));*/
	}
	
	public function actionLoadEncuesta(){
		$this->renderPartial('loadEncuesta');
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
		$model=new TblEncuestaInfluencia;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblEncuestaInfluencia']))
		{
			$model->attributes=$_POST['TblEncuestaInfluencia'];
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

		if(isset($_POST['TblEncuestaInfluencia']))
		{
			$model->attributes=$_POST['TblEncuestaInfluencia'];
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
		$dataProvider=new CActiveDataProvider('TblEncuestaInfluencia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblEncuestaInfluencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblEncuestaInfluencia']))
			$model->attributes=$_GET['TblEncuestaInfluencia'];

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
		$model=TblEncuestaInfluencia::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-encuesta-influencia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
