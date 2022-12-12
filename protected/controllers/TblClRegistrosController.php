<?php

class TblClRegistrosController extends Controller
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
					'actions'=>array('create','update','InfoRegistros','InfoRegistrosAcum','allNumClientes','allNumClientesCP','allNumClientesCPAcum','allNumZonaInfluencia','allNumZonaInfluenciaCP','allNumZonaInfluenciaCPAcum'),
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
					'actions'=>array('create','update','InfoRegistros','InfoRegistrosAcum','allNumClientes','allNumClientesCP','allNumClientesCPAcum','allNumZonaInfluencia','allNumZonaInfluenciaCP','allNumZonaInfluenciaCPAcum'),
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
	
	//-----------------------------------------------------------------------------------
	
	public function actionInfoRegistros($cp, $fecha){
		
		header('Content-Type: application/json'); 
		
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		
		//Variable salida.
		$salida; 
		
		/*
		*
		* Calculamos el número total de clientes.
		*
		*/
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$cp.") AND fecha <= '".$fecha."'";
		$model=TblClRegistros::model()->find($Criteria);
		$num_clientes_total = $model->num_clientes;
				
		/*
		*
		* Calculamos el número actual de clientes.
		*
		*/		
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(num_clientes) as num_clientes";
		if($cp == -1)
			$Criteria->condition = 'fecha = ' . $fecha."'";
		else
			$Criteria->condition = "cp IN(".$cp.") AND fecha = '".$fecha."'";
		
		$model=TblClRegistros::model()->find($Criteria);
		$num_clientes_actual = $model->num_clientes;
		
		/*
		*
		* Calculamos la progresión de clientes por fuente en el mismo mes del año anterior.
		*
		*/	
		/*$Criteria = new CDbCriteria();
		$Criteria->select = "tipo_fuente,sum(num_clientes) as num_clientes";
		if($cp == -1){
			$Criteria->condition = "fecha = '".$fecha."'::date - interval '1 year'";
		}else{
			$Criteria->condition = "cp IN(".$cp.") AND fecha = '".$fecha."'::date - interval '1 year'";
		}
		$Criteria->group = "tipo_fuente";
		$Criteria->order = "sum(num_clientes) DESC";
		$Criteria->limit = "8";
		
		$model=TblClRegistros::model()->find($Criteria);
		$num_clientes_anterior = $model->num_clientes;
		$progresion_num_clientes = 0;
		if ($num_clientes_anterior){
			$progresion_num_clientes = ($num_clientes_actual - $num_clientes_anterior) * 100 / $num_clientes_anterior;
		}*/
		
		//$salida['progresion_num_clientes'] = $progresion_num_clientes;
		$salida['porcentaje_num_clientes'] = $num_clientes_actual*100/$num_clientes_total;
		$salida['num_clientes'] = (float)$num_clientes_actual;
		$salida['num_clientes_total'] = (float)$num_clientes_total;
		
		echo json_encode($salida);
	}
	
	//-----------------------------------------------------------------------------------
	
	public function actionInfoRegistrosAcum($cp, $fecha){
		
		header('Content-Type: application/json'); 
		
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		
		//Variable salida.
		$salida; 
		//Sacamos el año de la búsqueda
		$cadenaFecha = substr($fecha, 0, 4);
		$cadenaFechaFinal = substr($fecha, 0, 4)."-01-01";		
		
		/*
		*
		* Calculamos el número total de clientes.
		*
		*/
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(num_clientes) as num_clientes";
		$Criteria->condition = 'cp IN('.$cp.')';
		$model=TblClRegistros::model()->find($Criteria);
		$num_clientes_total = $model->num_clientes;
				
		/*
		*
		* Calculamos el número actual de clientes.
		*
		*/		
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(num_clientes) as num_clientes";
		if($cp == -1)
			$Criteria->condition = "fecha BETWEEN '".$cadenaFechaFinal."' AND '".$fecha."'";
		else
			$Criteria->condition = "cp IN(".$cp.") AND fecha BETWEEN '".$cadenaFechaFinal."' AND '".$fecha."'";
		
		$model=TblClRegistros::model()->find($Criteria);
		$num_clientes_actual = $model->num_clientes;
		
		/*
		*
		* Calculamos la progresión de clientes por fuente en el mismo mes del año anterior.
		*
		*/	
		$Criteria = new CDbCriteria();
		$Criteria->select = "tipo_fuente,sum(num_clientes) as num_clientes";
		if($cp == -1){
			$Criteria->condition = "fecha BETWEEN '".$cadenaFechaFinal."' AND '".$fecha."'";
		}else{
			$Criteria->condition = "cp IN(".$cp.") AND fecha BETWEEN '".$cadenaFechaFinal."' AND '".$fecha."'";
		}
		$Criteria->group = "tipo_fuente";
		$Criteria->order = "sum(num_clientes) DESC";
		$Criteria->limit = "8";
		
		$model=TblClRegistros::model()->find($Criteria);
		$num_clientes_anterior = $model->num_clientes;
		$progresion_num_clientes = 0;
		if ($num_clientes_anterior){
			$progresion_num_clientes = ($num_clientes_actual - $num_clientes_anterior) * 100 / $num_clientes_anterior;
		}
		
		$salida['progresion_num_clientes'] = $progresion_num_clientes;
		$salida['porcentaje_num_clientes'] = $num_clientes_actual*100/$num_clientes_total;
		$salida['num_clientes'] = (float)$num_clientes_actual;
		$salida['num_clientes_total'] = (float)$num_clientes_total;
		
		echo json_encode($salida);
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 2
	* -----------------------------------------------------------------------------------
	*/
	
	public function actionallNumClientes($idEncuesta, $idHiper){
		
		header('Content-Type: application/json'); 
		$salida = array();		
		
		$compr = explode(",", $idHiper);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
			exit("error2");	
		}

		
		$sql="SELECT
				geo_cp.cp
			FROM
				geo_cp,
				geo_nielssen,
				tbl_hiper_alcampo
			WHERE
				tbl_hiper_alcampo.cod_nielssen = geo_nielssen.codigo_nielssen  
				AND 
				tbl_hiper_alcampo.id_hiper_alcampo=".$idHiper."
				AND 
				ST_DWithin(geo_cp.geom,geo_nielssen.geom,10000)
				order by ST_Distance(geo_cp.geom, geo_nielssen.geom) asc";
				
		$dataProvider=new CSqlDataProvider($sql);
		$cp=$dataProvider->getData();
		
		$cadena="";
		foreach($cp as $codPostal){
			$cadena .= "'".$codPostal["cp"]."',";
		}
		$cadenaFinal = substr($cadena, 0, -1);
		
		//$cod = substr($cod, 0, strlen($cod)-2);	
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "cod_edad, tipo_fuente, sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$cadenaFinal.") AND fecha = '".$idEncuesta."'";
		$Criteria->group = "tipo_fuente, cod_edad";
		$Criteria->order = "num_clientes DESC";
		//$Criteria->limit = "10";
		$model=TblClRegistros::model()->findAll($Criteria);

		foreach($model as $m){
			$k["cod_edad"] = $m->codEdad->desc_cod_edad;
			$k["tipo_fuente"] = $m->tipoFuente->desc_fuente;
			$k["num_clientes"] = (float)$m->num_clientes;
			array_push($salida, $k);
			
		}
		//array_push($salida, $k);
		
		//LISTADO DE EDADES
		$Criteria = new CDbCriteria();
		$Criteria->order = "cod_edad desc";
		$model=TblClCodEdad::model()->findAll($Criteria);
		$salidaEdad = array();
		foreach($model as $m){
			array_push($salidaEdad, $m->desc_cod_edad);
			
		}
		
		$final = array("datos"=>$salida, "edades"=>$salidaEdad);
		echo json_encode($final);
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 2 Códigos Postales
	* -----------------------------------------------------------------------------------
	*/
	
	public function actionallNumClientesCP($idEncuesta, $idHiper, $cp){
		
		header('Content-Type: application/json'); 
		$salida = array();			
		
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
			exit("error2");	
		}

		
		$Criteria = new CDbCriteria();
		$Criteria->select = "cod_edad, tipo_fuente, sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$cp.") AND fecha = '".$idEncuesta."'";
		$Criteria->group = "tipo_fuente, cod_edad";
		$Criteria->order = "num_clientes DESC";
		//$Criteria->limit = "10";
		$model=TblClRegistros::model()->findAll($Criteria);

		foreach($model as $m){
			$k["cod_edad"] = $m->codEdad->desc_cod_edad;
			$k["tipo_fuente"] = $m->tipoFuente->desc_fuente;
			$k["num_clientes"] = (float)$m->num_clientes;
			array_push($salida, $k);
			
		}
		
		//LISTADO DE EDADES
		$Criteria = new CDbCriteria();
		$Criteria->order = "cod_edad desc";
		$model=TblClCodEdad::model()->findAll($Criteria);
		$salidaEdad = array();
		foreach($model as $m){
			array_push($salidaEdad, $m->desc_cod_edad);
			
		}
		
		$final = array("datos"=>$salida, "edades"=>$salidaEdad);
		echo json_encode($final);
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 2 Códigos Postales Acumulados
	* -----------------------------------------------------------------------------------
	*/
	
	public function actionallNumClientesCPAcum($idEncuesta, $idHiper, $cp){
		
		header('Content-Type: application/json'); 
		
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
			exit("error2");	
		}

		
		$salida = array();		
		//Sacamos el año de la búsqueda
		$cadenaFecha = substr($idEncuesta, 0, 4);
		$cadenaFechaFinal = substr($idEncuesta, 0, 4)."-01-01";	
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "cod_edad, tipo_fuente, sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$cp.") AND fecha BETWEEN '".$cadenaFechaFinal."' AND '".$idEncuesta."'";
		$Criteria->group = "tipo_fuente, cod_edad";
		$Criteria->order = "num_clientes DESC";
		//$Criteria->limit = "10";
		$model=TblClRegistros::model()->findAll($Criteria);

		foreach($model as $m){
			$k["cod_edad"] = $m->codEdad->desc_cod_edad;
			$k["tipo_fuente"] = $m->tipoFuente->desc_fuente;
			$k["num_clientes"] = (float)$m->num_clientes;
			array_push($salida, $k);
			
		}
		
		//LISTADO DE EDADES
		$Criteria = new CDbCriteria();
		$Criteria->order = "cod_edad desc";
		$model=TblClCodEdad::model()->findAll($Criteria);
		$salidaEdad = array();
		foreach($model as $m){
			array_push($salidaEdad, $m->desc_cod_edad);
			
		}
		
		$final = array("datos"=>$salida, "edades"=>$salidaEdad);
		echo json_encode($final);
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 3
	* -----------------------------------------------------------------------------------
	*/
	
	public function actionallNumZonaInfluencia($idEncuesta, $idHiper){
		
		//header('Content-Type: application/json'); 
		$salida = array();		
		
		$compr = explode(",", $idHiper);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
			exit("error2");	
		}

		
		$sql="SELECT
				geo_cp.cp
			FROM
				geo_cp,
				geo_nielssen,
				tbl_hiper_alcampo
			WHERE
				tbl_hiper_alcampo.cod_nielssen = geo_nielssen.codigo_nielssen  
				AND 
				tbl_hiper_alcampo.id_hiper_alcampo=".$idHiper."
				AND 
				ST_DWithin(geo_cp.geom,geo_nielssen.geom,10000)
				order by ST_Distance(geo_cp.geom, geo_nielssen.geom) asc";
				
		$dataProvider=new CSqlDataProvider($sql);
		$cp=$dataProvider->getData();
		
		$cadena="";
		foreach($cp as $codPostal){
			$cadena .= "'".$codPostal["cp"]."',";
		}
		$cadenaFinal = substr($cadena, 0, -1);
		
		//$cod = substr($cod, 0, strlen($cod)-2);	
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "tipo_fuente, sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$cadenaFinal.") AND fecha = '".$idEncuesta."'";
		$Criteria->params = array(':eid' => $idEncuesta);
		$Criteria->group = "tipo_fuente";
		$Criteria->order = "num_clientes DESC";
		//$Criteria->limit = "5";
		$model=TblClRegistros::model()->findAll($Criteria);

		foreach($model as $m){
			$k["tipo_fuente"] = $m->tipoFuente->desc_fuente;
			$k["num_clientes"] = (float)$m->num_clientes;
			array_push($salida, $k);
		}
		
		echo json_encode($salida);// will return a list of arrays.
		
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 3 Códigos Postales
	* -----------------------------------------------------------------------------------
	*/
	
	public function actionallNumZonaInfluenciaCP($idEncuesta, $idHiper, $cp){
		
		//header('Content-Type: application/json'); 
		$salida = array();		
		
		$compr = explode(",", $idHiper);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
			exit("error2");	
		}
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "tipo_fuente, sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$cp.")";
		//$Criteria->condition = "cp IN(".$cp.") AND fecha = '".$idEncuesta."'";
		$Criteria->group = "tipo_fuente";
		$Criteria->order = "num_clientes DESC";
		//$Criteria->limit = "5";
		$model=TblClRegistros::model()->findAll($Criteria);

		foreach($model as $m){
			$k["tipo_fuente"] = $m->tipoFuente->desc_fuente;
			$k["num_clientes"] = (float)$m->num_clientes;
			array_push($salida, $k);
		}
		
		echo json_encode($salida);// will return a list of arrays.
		
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 3 Códigos Postales Acumulados
	* -----------------------------------------------------------------------------------
	*/
	
	/*public function actionallNumZonaInfluenciaCPAcum($idEncuesta, $idHiper, $cp){
		
		//header('Content-Type: application/json'); 
		$salida = array();		
		//Sacamos el año de la búsqueda
		$cadenaFecha = substr($idEncuesta, 0, 4);
		$cadenaFechaFinal = substr($idEncuesta, 0, 4)."-01-01";	
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "tipo_fuente, sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$cp.") AND fecha BETWEEN '".$cadenaFechaFinal."' AND '".$idEncuesta."'";
		$Criteria->group = "tipo_fuente";
		$Criteria->order = "num_clientes DESC";
		//$Criteria->limit = "5";
		$model=TblClRegistros::model()->findAll($Criteria);

		foreach($model as $m){
			$k["tipo_fuente"] = $m->tipoFuente->desc_fuente;
			$k["num_clientes"] = (float)$m->num_clientes;
			array_push($salida, $k);
		}
		
		echo json_encode($salida);// will return a list of arrays.
		
	}*/
	
	//-----------------------------------------------------------------------------------	
	
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
		$model=new TblClRegistros;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblClRegistros']))
		{
			$model->attributes=$_POST['TblClRegistros'];
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

		if(isset($_POST['TblClRegistros']))
		{
			$model->attributes=$_POST['TblClRegistros'];
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
		$dataProvider=new CActiveDataProvider('TblClRegistros');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblClRegistros('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblClRegistros']))
			$model->attributes=$_GET['TblClRegistros'];

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
		$model=TblClRegistros::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-cl-registros-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
