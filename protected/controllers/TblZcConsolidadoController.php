<?php

class TblZcConsolidadoController extends Controller
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
					'actions'=>array('create','update', 'getCV', 'getCVByZC', 'getCVByZCTodos', 'getDatosCP'),
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
					'actions'=>array('create','update', 'getCV', 'getCVByZC', 'getCVByZCTodos', 'getDatosCP'),
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

	public function actionGetCVByZC($zc){
		header('Content-Type: application/json');
		$model=new TblZcConsolidado;
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si";
		$Criteria->condition = "cod_zipcode = :eid";
		$Criteria->params = array(':eid' => $zc);
		$Criteria->group = "cod_zipcode";
		$cifra_venta = $model->find($Criteria);
		$result=array();
		$result2 = array();
		if($cifra_venta ){
			$CV = $cifra_venta->venta_si;
			
			
			$Criteria = new CDbCriteria();
			$Criteria->select = "(venta_si + venta_no + venta_ns) as venta_si, cp";
			$Criteria->condition = "cod_zipcode = :eid" ;
			$Criteria->params = array(':eid' => $zc);
			$Criteria->order = "venta_si DESC";
			$Criteria->limit = 10;
			$cod = $model->findAll($Criteria);
			$suma = 0;
			foreach($cod as $c){
				$r = array($c->cp, $c->venta_si*100/$CV);
				$suma = $suma + ($c->venta_si*100/$CV);
				array_push($result, $r);
			}
			$r = array('Otros', 100-$suma);
			array_push($result, $r);
		
		
			//SACAR EL ANTERIOR Y VARIACION
		
			$model = new TblZc();
			$Criteria = new CDbCriteria();
			$Criteria->condition = 'cod_zipcode = :eid' ;
			$Criteria->params = array(':eid' => $zc);
			$m = $model->find($Criteria);
			$fecha_ini = $m->fecha_ini;
			$idAlcampo = $m->id_alcampo;
			$euros = $m->cv;
			$Criteria = new CDbCriteria();
			$Criteria->condition = 'id_alcampo = ' . $idAlcampo . ' AND fecha_ini < \''. $fecha_ini . '\' AND tipo_zc = 1';
			$Criteria->order = 'fecha_ini DESC';
			$m = $model->find($Criteria);
			
			if($m && $euros >0){
				$new_zc = $m->cod_zipcode;
				$new_euros = $m->cv;
				
				$model=new TblZcConsolidado;
				$Criteria = new CDbCriteria();
				$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si";
				$Criteria->condition = "cod_zipcode = " . $new_zc ;
				$Criteria->group = "cod_zipcode";
				$cifra_venta = $model->find($Criteria);
				$new_CV = $cifra_venta->venta_si;
				
				
				$suma = 0;
				$suma_old = 0;
				foreach($cod as $c){
					$Criteria = new CDbCriteria();
					$Criteria->condition = "cod_zipcode = " . $new_zc . " AND cp = '".$c->cp."'";
					$k = $model->find($Criteria);
					if($k){
						$valor_euros = $new_euros*($k->venta_si+$k->venta_no+$k->venta_ns)/$new_CV;
						$valor_euros_old = $euros*$c->venta_si/$CV;
						
						$variacion = 100*($valor_euros_old-$valor_euros)/$valor_euros;
						$r = array($c->cp,  $variacion);
						//$suma = $suma + 100*($k->venta_si+$k->venta_no+$k->venta_ns)/$new_CV;
						$suma = $suma + $valor_euros;
						$suma_old = $suma_old + $valor_euros_old;
					}else{
						$r = array($c->cp, 0);						
					}
					array_push($result2, $r);
					
					
				}
				$variacion = 100*($suma_old-$suma)/$suma;
				$r = array('Otros', $variacion);
				array_push($result2, $r);
			}
		}
		echo json_encode(array("presente"=>$result, "anterior"=>$result2));
	}
	
	public function actionGetCVByZCTodos($idAlcampo){
		header('Content-Type: application/json');
		$result = array();
		
		$model=new TblZc;
		
		$Criteria = new CDbCriteria();
		$Criteria->condition = "id_alcampo = :idAlcampo";
		$Criteria->params = array(':idAlcampo' => $idAlcampo);
		$Criteria->order = "fecha_ini DESC";
		$alc = $model->findAll($Criteria);
		
		foreach($alc as $czc){
			$cod_zipcode = $czc->cod_zipcode;
			error_log($cod_zipcode);
			$euros = $czc->cv;
			$model=new TblZcConsolidado;
			$Criteria = new CDbCriteria();
			$Criteria->condition = "cod_zipcode = " . $cod_zipcode;
			$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si";
			$Criteria->group = "cod_zipcode";
			$cifra_venta = $model->find($Criteria);
			$CV = $cifra_venta->venta_si;
			
			$Criteria = new CDbCriteria();
			$Criteria->select = "(venta_si + venta_no + venta_ns) as venta_si, cp";
			$Criteria->condition = "cod_zipcode = " . $cod_zipcode ;
			$Criteria->order = "venta_si DESC";
			$cod = $model->findAll($Criteria);
			
			$res = array();
			foreach ($cod as $c){
				$r = array($c->cp, $c->venta_si*100/$CV);
				array_push($res, $r);
			}
			$t['cod'] = $cod_zipcode;
			$t['fecha'] = strtotime($czc->fecha_ini)*1000;
			$t['datos'] = $res;
			array_push($result, $t);
		}
		echo json_encode($result);
		/*$result=array();
		$result2 = array();
		if($cifra_venta ){
			$CV = $cifra_venta->venta_si;
			
			
			$Criteria = new CDbCriteria();
			$Criteria->select = "(venta_si + venta_no + venta_ns) as venta_si, cp";
			$Criteria->condition = "cod_zipcode = :eid" ;
			$Criteria->params = array(':eid' => $zc);
			$Criteria->order = "venta_si DESC";
			$Criteria->limit = 10;
			$cod = $model->findAll($Criteria);
			$suma = 0;
			foreach($cod as $c){
				//$r['cod_zipcode'] = $c->cod_zipcode;
				//$r['cv'] = $c->venta_si*100/$CV;
				$r = array($c->cp, $c->venta_si*100/$CV);
				$suma = $suma + ($c->venta_si*100/$CV);
				array_push($result, $r);
			}
			$r = array('Otros', 100-$suma);
			array_push($result, $r);
		
			$model = new TblZc();
			$Criteria = new CDbCriteria();
			$Criteria->condition = 'cod_zipcode = :eid' ;
			$Criteria->params = array(':eid' => $zc);
			$m = $model->find($Criteria);
			$fecha_ini = $m->fecha_ini;
			$idAlcampo = $m->id_alcampo;
			$euros = $m->cv;
			$Criteria = new CDbCriteria();
			$Criteria->condition = 'id_alcampo = ' . $idAlcampo . ' AND fecha_ini < \''. $fecha_ini . '\' AND tipo_zc = 1';
			$Criteria->order = 'fecha_ini DESC';
			$m = $model->find($Criteria);
			
			if($m && $euros >0){
				$new_zc = $m->cod_zipcode;
				$new_euros = $m->cv;
				
				$model=new TblZcConsolidado;
				$Criteria = new CDbCriteria();
				$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si";
				$Criteria->condition = "cod_zipcode = " . $new_zc ;
				$Criteria->group = "cod_zipcode";
				$cifra_venta = $model->find($Criteria);
				$new_CV = $cifra_venta->venta_si;
				
				
				$suma = 0;
				$suma_old = 0;
				foreach($cod as $c){
					$Criteria = new CDbCriteria();
					$Criteria->condition = "cod_zipcode = " . $new_zc . " AND cp = '".$c->cp."'";
					$k = $model->find($Criteria);
					
					$valor_euros = $new_euros*($k->venta_si+$k->venta_no+$k->venta_ns)/$new_CV;
					$valor_euros_old = $euros*$c->venta_si/$CV;
					$variacion = 100*($valor_euros_old-$valor_euros)/$euros;
					$r = array($c->cp,  $variacion);
					//$suma = $suma + 100*($k->venta_si+$k->venta_no+$k->venta_ns)/$new_CV;
					$suma = $suma + $valor_euros;
					$suma_old = $suma_old + $valor_euros_old;
					array_push($result2, $r);
					
				}
				$variacion = 100*($suma_old-$suma)/$euros;
				$r = array('Otros', $variacion);
				array_push($result2, $r);
			}
		}
		echo json_encode(array("presente"=>$result, "anterior"=>$result2));*/
	}
	
	public function actionGetDatosCP($cp, $cod_zipcode){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$model = new TblZc();
		$Criteria = new CDbCriteria();
		$Criteria->condition = "cod_zipcode = :eid";
		$Criteria->params = array(':eid' => $cod_zipcode);
		$f = $model->find($Criteria);
		$cifra_total_3 = $f->cv;
		
		$model=new TblZcConsolidado;
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si, sum(folleto_si + folleto_no + folleto_ns) as folleto_si";
		$Criteria->condition = "cod_zipcode = :eid";
		$Criteria->params = array(':eid' => $cod_zipcode);
		$Criteria->group = "cod_zipcode";
		$cifra_venta = $model->find($Criteria);
		$cifra = $cifra_venta->venta_si;
			
		$Criteria = new CDbCriteria();
		$Criteria->condition = "cp IN (".$cp.") AND cod_zipcode = :a";
		//$Criteria->params = array(":eid" => $cp, ":a"=>$cod_zipcode);
		$Criteria->params = array(":a"=>$cod_zipcode);		
		$cod = $model->findAll($Criteria);
		
		//Población
		$sql = "SELECT 
					sum((((pob_0005)+(pob_0514)+(pob_1519)+(pob_2029)+(pob_2965)+(pob_6599))* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as suma
				FROM 
					geo_cp, geo_secciones
				WHERE 
					geo_cp.geom && geo_secciones.geom AND geo_cp.cp IN (".$cp.")";
		$command = Yii::app()->db->createCommand($sql);
		$resultadoPoblacion = $command->queryAll();
		
		$sql = "SELECT 					
					max(tbl_entorno_prov.id_valor) as gasto
				FROM 
					public.geo_prov, 
					public.tbl_entorno_prov, 
					public.geo_cp
				WHERE
					geo_cp.cp IN (".$cp.") AND ST_Intersects (geo_prov.geom, geo_cp.geom) AND tbl_entorno_prov.id_capa=7 AND (geo_prov.cod_prov=tbl_entorno_prov.id_poligono)";
		$command = Yii::app()->db->createCommand($sql);
		$resultadoGasto = $command->queryAll();
		
		$result = array();
		
		$cv = 0;
		$caddy1 = 0;
		$caddy2 = 0;
		$pasos = 0;
		$folletos1 = 0;
		$folletos2 = 0;
		$gastoComercializable = 0;
		$poblacion = 0;
		$CVcp = 0;
				
		$poblacion = (double)$resultadoPoblacion[0]["suma"];
		$gastoComercializable = (double)$resultadoGasto[0]["gasto"];
		error_log($gastoComercializable);
		
		foreach($cod as $c){
			
			/*if($c->codZipcode->cv>0)
				$cv += $c->codZipcode->cv*((($c->venta_si + $c->venta_no + $c->venta_ns)/$c->codZipcode->cv));*/
			//if($c->codZipcode->cv>0)
				//Cifra de venta por CP
				$cv += ($c->venta_si + $c->venta_no + $c->venta_ns);
				
			$caddy1 += ($c->venta_si + $c->venta_no + $c->venta_ns);
			$caddy2 += ($c->folleto_si + $c->folleto_no + $c->folleto_ns);
			$pasos += ($c->folleto_si + $c->folleto_no + $c->folleto_ns);
			$folletos1 += $c->folleto_si;
			$folletos2 += ($c->folleto_si + $c->folleto_no + $c->folleto_ns);
		}		
		
		//----------------------------------------------------------------------------------------
		//----------------------------------------------------------------------------------------
		//PROGRESIÓN CV
		
		//SACAR EL ANTERIOR Y VARIACION
		//----------------------------------------------------------------------------------------
		//----------------------------------------------------------------------------------------
		
		$model=new TblZcConsolidado;
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si";
		$Criteria->condition = "cod_zipcode = :eid";
		$Criteria->params = array(':eid' => $cod_zipcode);
		$Criteria->group = "cod_zipcode";
		$cifra_venta = $model->find($Criteria);
		$result=array();
		$result2 = array();
		if($cifra_venta ){
			$CV = $cifra_venta->venta_si;			
			
			$Criteria = new CDbCriteria();
			$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si, cp";
			$Criteria->condition = "cp IN (".$cp.") AND cod_zipcode = :eid" ;
			$Criteria->params = array(':eid' => $cod_zipcode);
			$Criteria->group = "cp";
			$Criteria->order = "venta_si DESC";
			$Criteria->limit = 10;
			$cod = $model->findAll($Criteria);
			$suma = 0;
			foreach($cod as $c){
				//$s = array($c->cp, $c->venta_si*100/$CV);
				$suma = $suma + ($c->venta_si*100/$CV);
				//array_push($result, $s);
			}
			//$s = array('Otros', 100-$suma);
			//array_push($result, $s);
		
		
			//SACAR EL ANTERIOR Y VARIACION
		
			$model = new TblZc();
			$Criteria = new CDbCriteria();
			$Criteria->condition = 'cod_zipcode = :eid' ;
			$Criteria->params = array(':eid' => $cod_zipcode);
			$m = $model->find($Criteria);
			$fecha_ini = $m->fecha_ini;
			$idAlcampo = $m->id_alcampo;
			$euros = $m->cv;
			$Criteria = new CDbCriteria();
			$Criteria->condition = 'id_alcampo = ' . $idAlcampo . ' AND fecha_ini < \''. $fecha_ini . '\' AND tipo_zc = 1';
			$Criteria->order = 'fecha_ini DESC';
			$m = $model->find($Criteria);
			
			if($m && $euros >0){
				$new_zc = $m->cod_zipcode;
				$new_euros = $m->cv;
				
				$model=new TblZcConsolidado;
				$Criteria = new CDbCriteria();
				$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si";
				$Criteria->condition = "cod_zipcode = " . $new_zc ;
				$Criteria->group = "cod_zipcode";
				$cifra_venta = $model->find($Criteria);
				$new_CV = $cifra_venta->venta_si;
				$old_folletos = $cifra_venta->folleto_si;
				
				$suma = 0;
				$suma_old = 0;
				$valor_euros = 0;
				$valor_euros_old = 0;
				
				foreach($cod as $c){
					
					$Criteria = new CDbCriteria();
					$Criteria->condition = "cod_zipcode = " . $new_zc . " AND cp = '".$c->cp."'";
					$k = $model->find($Criteria);
					if($k){
						$valor_euros += $new_euros*($k->venta_si+$k->venta_no+$k->venta_ns)/$new_CV;
						$valor_euros_old += $euros*$c->venta_si/$CV;
						
						$variacion = 100*($valor_euros_old-$valor_euros)/$valor_euros;
						$s = $variacion;
						//$suma = $suma + 100*($k->venta_si+$k->venta_no+$k->venta_ns)/$new_CV;
						//$suma = $suma + $valor_euros;
						//$suma_old = $suma_old + $valor_euros_old;
					}else{
						$s = 0;						
					}
					$result2=$s;					
					
				}
				
				$Criteria = new CDbCriteria();
				$Criteria->condition = "cp IN (".$cp.") AND cod_zipcode = :a";
				//$Criteria->params = array(":eid" => $cp, ":a"=>$cod_zipcode);
				$Criteria->params = array(":a"=>$new_zc);		
				$cod = $model->findAll($Criteria);
				
				$folletos1_old = 0;
				$folletos2_old = 0;
				foreach($cod as $c){			
					$folletos1_old += $c->folleto_si;
					$folletos2_old += ($c->folleto_si + $c->folleto_no + $c->folleto_ns);
				}
				
				/*$variacion = 100*($suma_old-$suma)/$suma;
				$s = array('Otros', $variacion);
				array_push($result2, $s);*/
			}
		}
		
		//----------------------------------------------------------------------------------------
		
		$r['Cifra de venta(mill. €)'] = $cv*$cifra_total_3/($cifra*1000000);
		
		
		//echo $cv;
		$r['% CV'] = $cv*100/$cifra;
		if($caddy2==0)
			$r['Caddy (€)'] = 0;
		else
			$r['Caddy (€)'] = $caddy1/$caddy2;
		//$r['Pasos por caja'] = $pasos;
		if($folletos2==0)			
			$r['Folletos (%)'] = 0;
		else
			$r['Folletos (%)'] = 100*$folletos1/$folletos2;
		if(isset($folletos1_old) && isset($folletos2_old)){
			$folletosActuales=100*$folletos1/$folletos2;
			if($folletos2_old == 0){
				$folletosViejos=0;
			}else{
				$folletosViejos=100*$folletos1_old/$folletos2_old;
			}			
			if($folletos1_old==0 || $folletos2_old==0){
				$r['Progresión Folletos (P.P)'] = 0;
			}else{
				if($folletosViejos > $folletosActuales){
					$r['Progresión Folletos (P.P)'] = -((100*$folletos1_old/$folletos2_old) - (100*$folletos1/$folletos2));
				}else{
					$r['Progresión Folletos (P.P)'] = 0 -((100*$folletos1_old/$folletos2_old) - (100*$folletos1/$folletos2));
				}
			}
		}else{
			//$folletos2_old = 0;
			$r['Progresión Folletos (P.P)'] = "Solo disponible en Nacional";
		}
		
		
		$CVcp = $cv*$cifra_total_3/($cifra*100);
		$penetracion = $CVcp / ($gastoComercializable * $poblacion)*100*100;
		if($penetracion == 0){
			$r['Penetración (%)'] = "Solo disponible en Nacional";
		}else{
			$r['Penetración (%)'] = $penetracion;
		}			
		
		$r['Progresión CV (%)'] = $result2;		
		
		array_push($result, $r);
		
		echo json_encode($result);
	}
	
	public function actionGetCV($cp){
		header('Content-Type: application/json');
		$model=new TblZcConsolidado;
		$Criteria = new CDbCriteria();
		$Criteria->with= array('codZipcode');
		$Criteria->condition = "cp = :eid";
		$Criteria->params = array(':eid' => $cp);
		$Criteria->order = "t1_c1";
		$Criteria->together = true;
		$cod = $model->findAll($Criteria);
		$result=array();
		foreach($cod as $c){
			$r['cod_zipcode'] = $c->cod_zipcode;
			$r['fecha'] = $c->codZipcode->fecha_ini;
			$r['cv'] = ($c->venta_si + $c->venta_no + $c->venta_ns)*$c->codZipcode->cv/100;
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
		$model=new TblZcConsolidado;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblZcConsolidado']))
		{
			$model->attributes=$_POST['TblZcConsolidado'];
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

		if(isset($_POST['TblZcConsolidado']))
		{
			$model->attributes=$_POST['TblZcConsolidado'];
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
		$dataProvider=new CActiveDataProvider('TblZcConsolidado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblZcConsolidado('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblZcConsolidado']))
			$model->attributes=$_GET['TblZcConsolidado'];

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
		$model=TblZcConsolidado::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-zc-consolidado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
