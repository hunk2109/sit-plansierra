<?php

class TblClClientesController extends Controller
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
					'actions'=>array('create','update','InfoClientes','InfoClientesAcum','allNumClientes','allNumClientesPorc','GetNumClientes','GetPeriodos','InfoEdadClientes','InfoEdadClientesAcum'),
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
					'actions'=>array('create','update','InfoClientes','InfoClientesAcum','allNumClientes','allNumClientesPorc','GetNumClientes','GetPeriodos','InfoEdadClientes','InfoEdadClientesAcum'),
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
	
	/*
	* -----------------------------------------------------------------------------------
	* DATOS CLIENTES LATERAL DERECHO
	* -----------------------------------------------------------------------------------
	*/	
	
	public function actionInfoClientes($cp, $fecha){
		
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
		$model=TblClClientes::model()->find($Criteria);
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
		
		$model=TblClClientes::model()->find($Criteria);
		$num_clientes_actual = $model->num_clientes;
		
		/*
		*
		* Calculamos el número de clientes en el mismo mes del año anterior.
		*
		*/	
		
		//Sacamos el año de la búsqueda
		$cadenaFecha = substr($fecha, 0, 4);
		$cadenaFechaFinal = substr($fecha, 0, 4)."-01-01";	
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(num_clientes) as num_clientes";
		if($cp == -1)
			$Criteria->condition = "fecha <= '".$fecha."'::date - interval '1 year'";
		else
			$Criteria->condition = "cp IN(".$cp.") AND fecha <= '".$fecha."'::date - interval '1 year'";
		
		$model=TblClClientes::model()->find($Criteria);
		$num_clientes_anterior_progresion = $model->num_clientes;
		//echo $num_clientes_anterior_progresion;
		
		//-----------------------------------------------------------------
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(num_clientes) as num_clientes";
		if($cp == -1)
			$Criteria->condition = "fecha <= '".$fecha."'";
		else
			$Criteria->condition = "cp IN(".$cp.") AND fecha <= '".$fecha."'";
		
		$model=TblClClientes::model()->find($Criteria);
		$num_clientes_actual_progresion = $model->num_clientes;
		//echo $num_clientes_actual_progresion;

		$progresion_num_clientes = 0;
		
		if ($num_clientes_anterior_progresion)
			$progresion_num_clientes = ($num_clientes_actual_progresion - $num_clientes_anterior_progresion)*100/$num_clientes_anterior_progresion;
		
		$salida['progresion_num_clientes'] = $progresion_num_clientes;
		$salida['porcentaje_num_clientes'] = $num_clientes_actual*100/$num_clientes_total;
		$salida['num_clientes'] = (float)$num_clientes_actual;
		$salida['num_clientes_total'] = (float)$num_clientes_total;
		
		echo json_encode($salida);
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* DATOS CLIENTES ACUMULADOS LATERAL DERECHO
	* -----------------------------------------------------------------------------------
	*/	
	
	public function actionInfoClientesAcum($cp, $fecha){
		
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
		$model=TblClClientes::model()->find($Criteria);
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
		
		$model=TblClClientes::model()->find($Criteria);
		$num_clientes_actual = $model->num_clientes;
		
		/*
		*
		* Calculamos el número de clientes en el mismo mes del año anterior.
		*
		*/	
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(num_clientes) as num_clientes";
		if($cp == -1)
			$Criteria->condition = "fecha BETWEEN '".$cadenaFechaFinal."' AND '".$fecha."'";
		else
			$Criteria->condition = "cp IN(".$cp.") AND fecha BETWEEN '".$cadenaFechaFinal."' AND '".$fecha."'";
		
		$model=TblClClientes::model()->find($Criteria);
		$num_clientes_anterior = $model->num_clientes;
		$progresion_num_clientes = 0;
		if ($num_clientes_anterior)
			$progresion_num_clientes = ($num_clientes_actual - $num_clientes_anterior)*100/$num_clientes_anterior;
		
		$salida['progresion_num_clientes'] = $progresion_num_clientes;
		$salida['porcentaje_num_clientes'] = $num_clientes_actual*100/$num_clientes_total;
		$salida['num_clientes'] = (float)$num_clientes_actual;
		$salida['num_clientes_total'] = (float)$num_clientes_total;
		
		echo json_encode($salida);
	}
	
	//-----------------------------------------------------------------------------------
	
	public function actionGetPeriodos(){
		
		header('Content-Type: application/json'); 
		$Criteria = new CDbCriteria();
		$Criteria->select = "DISTINCT(fecha)";
		//$Criteria->condition = 'id_hiper = ' . $id_hiper;
		$Criteria->order = "fecha DESC";
		//$Criteria->distinct = true;
		
		$model=TblClClientes::model()->findAll($Criteria);
		$salida = array();
		foreach($model as $m){
			$anno = substr($m->fecha, 0, -6);
			$mes = substr($m->fecha, 5, -3);
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
			$k["fecha"] = $mes." ".$anno;
			$k["id"] = $m->fecha;
			array_push($salida, $k);	
		}
		
		echo json_encode($salida);
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO EDAD CLIENTES POR CÓDIGO POSTAL
	* -----------------------------------------------------------------------------------
	*/	
	
	public function actionInfoEdadClientes($id, $fecha){
		//header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c)){
				exit("error2");	
			}
		}
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "cod_edad,sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$id.") AND fecha = '".$fecha."'";
		$Criteria->group = "cod_edad";
		$Criteria->order = "cod_edad ASC";
		
		$model=TblClClientes::model()->findAll($Criteria);
		$salida = array();
		foreach($model as $m){
			$k["num_clientes"] = $m->num_clientes;
			$k["cod_edad"] = $m->codEdad->desc_cod_edad;
			array_push($salida, $k);	
		}
		
		echo json_encode($salida);// will return a list of arrays.
		
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO EDAD CLIENTES POR CÓDIGO POSTAL ACUMULADOS
	* -----------------------------------------------------------------------------------
	*/	
	
	public function actionInfoEdadClientesAcum($id, $fecha){
		//header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c)){
				exit("error2");	
			}
		}
		
		//Sacamos el año de la búsqueda
		$cadenaFecha = substr($fecha, 0, 4);
		$cadenaFechaFinal = substr($fecha, 0, 4)."-01-01";	
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "cod_edad,sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$id.") AND fecha BETWEEN '".$cadenaFechaFinal."' AND :eid";
		$Criteria->params = array(':eid' => $fecha);
		$Criteria->group = "cod_edad";
		$Criteria->order = "cod_edad ASC";
		
		$model=TblClClientes::model()->findAll($Criteria);
		$salida = array();
		foreach($model as $m){
			$k["num_clientes"] = $m->num_clientes;
			$k["cod_edad"] = $m->codEdad->desc_cod_edad;
			array_push($salida, $k);	
		}
		
		echo json_encode($salida);// will return a list of arrays.
		
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 1
	* -----------------------------------------------------------------------------------
	*/	
	
	public function actionGetNumClientes($idEncuesta, $idHiper){
		
		header('Content-Type: application/json'); 
		$salidaClientes = array();
		$salidaRegistros = array();
		$salidaLista = array();
		
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

		$Criteria = new CDbCriteria();
		$Criteria->select = "cp,sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$cadenaFinal.") AND fecha = :eid";
		$Criteria->params = array(':eid' => $idEncuesta);
		$Criteria->group = "cp";
		$Criteria->order = "num_clientes DESC";
		$Criteria->limit = "10";
		
		$model=TblClClientes::model()->findAll($Criteria);
		$model2=TblClRegistros::model()->findAll($Criteria);
		
		$codPostalClientes = array();
		foreach($model as $m){
			$k["num_clientes"] = (float)$m->num_clientes;
			$k["cp"] = $m->cp;			
			array_push($codPostalClientes, $m->cp);
			array_push($salidaClientes, $k);
		}
		
		$codPostalRegistros = array();
		foreach($model2 as $m2){			
			if(in_array($m2->cp, $codPostalClientes)){
				$p["num_registros"] = (float)$m2->num_clientes;
				//$p["cp"] = $m2->cp;
			}
			array_push($codPostalRegistros, $m2->cp);
			array_push($salidaRegistros, $p);			
		}

		/*
		* -------------------------------------------------------------------------------
		* AL CALCULAR EL NÚMERO TOTAL DE REGISTROS EN EL AÑO ANTERIOR, 
		* EN EL 2014-01-01 SE REALIZÓ UNA SUBIDA DE TODOS LOS REGISTROS ACUMULADOS, 
		* POR LO TANTO SALDRÍAN VALORES MUY ALTOS PARA REALIZAR LA COMPARACIÓN INTERANUAL.
		* -------------------------------------------------------------------------------
		*/
		if($idEncuesta != "2015-01-01"){
			$cadenaPostal="";			
			foreach($codPostalClientes as $codPostalFinal){
				$cadenaPostal .= "'".$codPostalFinal."',";
			}
			$cadenaFinalPostal = substr($cadenaPostal, 0, -1);
			
			//RECUPERAR EL AÑO ANTERIOR
			$Criteria = new CDbCriteria();
			$Criteria->select = "cp, sum(num_clientes) as num_clientes";
			$Criteria->condition = "cp IN(".$cadenaFinalPostal.") AND fecha = :eid::date - interval '1 year'" ;
			$Criteria->params = array(':eid' => $idEncuesta);
			$Criteria->group = "cp";
			$Criteria->order = "num_clientes DESC";
			$Criteria->limit = "10";
			
			$modelLista=TblClRegistros::model()->findAll($Criteria);

			foreach($modelLista as $ml){
				if(in_array($ml->cp, $codPostalRegistros)){
					$i["num_clientes_anterior"] = (float)$ml->num_clientes;
					//$i["cp"] = $ml->cp;
				}			
				array_push($salidaLista, $i);
			}
		}
		
		//$k["cp"] = "Otros";
		//$k["num_clientes"] = ($num_clientes/$num_clientesTotal)*100;
		//array_push($salidaRegistros, $k);
		
		/*
		//RECUPERAR EL AÑO ANTERIOR
		$Criteria = new CDbCriteria();
		$Criteria->select = "cp, sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp IN(".$cadenaFinal.") AND fecha = '".$idEncuesta . "'::date - interval '1 year'" ;
		//$Criteria->order = "fecha DESC";
		$Criteria->order = "num_clientes DESC";
		
		$modelLista=TblClRegistros::model()->findAll($Criteria);
		$salida2 = array();
		
		if($modelLista){
			$fecha_anterior = $model->fecha;
			$Criteria = new CDbCriteria();
			$Criteria->select = "sum(num_clientes) as num_clientes";
			$Criteria->condition = "cp IN(".$cadenaFinal.") AND fecha = '".$fecha_anterior."'";
		
			$m=TblClRegistros::model()->find($Criteria);
			$num_clientesTotal = 0;
			$num_clientesTotal = $m->num_clientes;
			$porc = 0;
			foreach($salidaRegistros as $s){
				$cp = $s["cp"];
				
				if($cp != "Otros"){
					$Criteria = new CDbCriteria();
					$Criteria->select = "sum(num_clientes) as num_clientes";
					$Criteria->condition = "fecha = '".$fecha_anterior."' AND cp = '".$cp."'";
					
					$m=TblClRegistros::model()->find($Criteria);
					$p["cp"] = $s["cp"];
					$p["num_clientes"] = (float)$s["num_clientes"];
										
					array_push($salidaLista, $p);
				}else{
					$p["cp"] = "Otros";
					$p["num_clientes_lista"] = (float)$s["num_clientes"];
					array_push($salidaLista, $p);
				}
				
			}
		}
		if(count($salidaLista) > 0){
			$final = array("clientes"=>$salidaClientes, "registros"=>$salidaRegistros, "linea"=>$salidaLinea);
			echo json_encode($final);
		}
		else{
			$final = array("clientes"=>$salidaClientes, "registros"=>$salidaRegistros);
			echo json_encode($final);
		}
		*/
		
		$final = array("clientes"=>$salidaClientes, "registros"=>$salidaRegistros, "linea"=>$salidaLista);
		echo json_encode($final);
	}
	
	//-----------------------------------------------------------------------------------
	
	public function actionallNumClientesPorc($cps){
		
		header('Content-Type: application/json'); 
		
		$cp = json_decode($cps);
		$salida = array();
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(num_clientes) as num_clientes";
		//$Criteria->condition = 'id_hiper = ' . $id_hiper;
		$Criteria->group = "fecha";
		$Criteria->order = "fecha ASC";
		
		$model=TblClClientes::model()->findAll($Criteria);
		$num_clientesTotal = array();
		$cod = "";
		
		foreach($model as $m){
			array_push($num_clientesTotal, $m->num_clientes);
		}
		foreach($cp as $c){
			$Criteria = new CDbCriteria();
			$Criteria->select = "fecha, sum(num_clientes) as num_clientes";
			$Criteria->condition = "cp = '".$c."'";
			$Criteria->group = "fecha";
			$Criteria->order = "fecha ASC";
			
			$model=TblClClientes::model()->findAll($Criteria);
			$s_c = array();
			$i=0;
			foreach($model as $m){
				array_push($s_c, array(strtotime($m->fecha)*1000, (float)($m->num_clientes/$num_clientesTotal[$i])*100));
				$i=$i+1;
			}
			if($c!= "Otros"){
				array_push($salida, array("nombre"=>$c, "dato"=>$s_c));
				$cod .= "'".$c . "', ";
			}
		}
		
		$cod = substr($cod, 0, strlen($cod)-2);
		$Criteria = new CDbCriteria();
		$Criteria->select = "fecha as fecha, sum(num_clientes) as num_clientes";
		$Criteria->condition = "cp NOT IN (".$cod.")";
		$Criteria->group = "fecha";
		$Criteria->order = "fecha ASC";
		$model=TblClClientes::model()->findAll($Criteria);
		$s_c = array();
		$i=0;
		foreach($model as $m){
			array_push($s_c, array(strtotime($m->fecha)*1000, (float)($m->num_clientes/$num_clientesTotal[$i])*100));
			$i=$i+1;
		}
		array_push($salida, array("nombre"=>"Otros", "dato"=>$s_c));
		
		echo json_encode($salida);
	}
	
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
		$model=new TblClClientes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblClClientes']))
		{
			$model->attributes=$_POST['TblClClientes'];
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

		if(isset($_POST['TblClClientes']))
		{
			$model->attributes=$_POST['TblClClientes'];
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
		$dataProvider=new CActiveDataProvider('TblClClientes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblClClientes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblClClientes']))
			$model->attributes=$_GET['TblClClientes'];

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
		$model=TblClClientes::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-cl-clientes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
