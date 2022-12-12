<?php

class GeoNielssenController extends Controller
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
					'actions'=>array('create',
									'update',
									'GetProvincias',
									'GetMunicipios',
									'getRotulo',
									'getCodNielssen',
									'GetCoords',
									'ActualizarCoordenada',
									'GetCoordsEntorno',
									'mapaCompetenciaEntornoCP','mapaCompetenciaEntornoSecciones','mapaCompetenciaEntornoDistritos','mapaCompetenciaEntornoMunicipios','mapaCompetenciaEntornoBarrios','mapaCompetenciaEntornoRadio'),
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
					'actions'=>array('create',
									'update',
									'GetProvincias',
									'GetMunicipios',
									'getRotulo',
									'getCodNielssen',
									'GetCoords',
									'ActualizarCoordenada',
									'GetCoordsEntorno',
									'mapaCompetenciaEntornoCP','mapaCompetenciaEntornoSecciones','mapaCompetenciaEntornoDistritos','mapaCompetenciaEntornoMunicipios','mapaCompetenciaEntornoBarrios','mapaCompetenciaEntornoRadio'),
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
		$model=new GeoNielssen;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GeoNielssen']))
		{
			$model->attributes=$_POST['GeoNielssen'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->codigo_nielssen));
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

		if(isset($_POST['GeoNielssen']))
		{
			$model->attributes=$_POST['GeoNielssen'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->codigo_nielssen));
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
		$dataProvider=new CActiveDataProvider('GeoNielssen');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GeoNielssen('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GeoNielssen']))
			$model->attributes=$_GET['GeoNielssen'];

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
		$model=GeoNielssen::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='geo-nielssen-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	//--------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------
	
	public function actionGetProvincias(){
		
		header('Content-Type: application/json'); 		

		$model = GeoNielssen::model()->findAllBySql("SELECT distinct provincia FROM public.geo_nielssen WHERE fecha_baja is null ORDER BY provincia asc;");		
		
		$salida = array();
		
		foreach($model as $m){
			array_push($salida, array("provincia"=>$m->provincia));
	
		}
		echo json_encode($salida);
	}	

	public function actionGetMunicipios($provincia){
		header('Content-Type: application/json'); 
				
		$model = GeoNielssen::model()->findAllBySql("SELECT distinct municipio FROM public.geo_nielssen WHERE fecha_baja is null and provincia=:provincia ORDER BY municipio asc;",array(":provincia"=> $provincia));		
		
		$salida = array();
		
		foreach($model as $m){
			array_push($salida, array("municipio"=>$m->municipio));
	
		}
		echo json_encode($salida);
	}
	
	public function actionGetRotulo($provincia,$municipio){
		header('Content-Type: application/json'); 
				
		$model=GeoNielssen::model()->findAllBySql("SELECT 
														r.rotulo as cadena, 
														r.id_rotulo as id_rotulo
													FROM 
														public.geo_nielssen as g, 
														public.tbl_rotulo as r 
													WHERE 
														g.fecha_baja is null and g.id_rotulo = r.id_rotulo AND g.provincia=:provincia AND g.municipio=:municipio
													GROUP BY 
														r.id_rotulo
													ORDER BY 
														r.rotulo ASC;",array(":provincia"=> $provincia, ":municipio"=> $municipio));
		
		$salida = array();
		
		foreach($model as $m){
			array_push($salida, array("id_rotulo"=>$m->id_rotulo, "cadena"=>$m->cadena));
	
		}
		echo json_encode($salida);
	}
	
	public function actionGetCodNielssen($provincia,$municipio,$rotulo){
		header('Content-Type: application/json'); 
				
		$model=GeoNielssen::model()->findAllBySql("SELECT codigo_nielssen 
												   FROM public.geo_nielssen 
												   WHERE fecha_baja is null and municipio=:municipio AND provincia=:provincia AND id_rotulo=:rotulo
												   ORDER BY codigo_nielssen asc;",array(":provincia"=> $provincia, ":municipio"=> $municipio, ":rotulo"=> $rotulo));		
		
		$salida = array();
		
		foreach($model as $m){
			array_push($salida, array("codigo_nielssen"=>$m->codigo_nielssen));
	
		}
		echo json_encode($salida);
	}
	
	public function actionGetCoords($nielssen){
		header('Content-Type: application/json');
		
		if(!is_numeric($nielssen)){
			exit("error");
		}
		
		$compr = explode(",", $nielssen);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
			exit("error2");	
		}

		$SQL = "SELECT 
					ST_X(geo_nielssen.geom) as x, ST_Y(geo_nielssen.geom) as y
				FROM 		 
					public.geo_nielssen
				WHERE 
					codigo_nielssen = '".$nielssen."'";
		  
		$dataProvider=new CSqlDataProvider($SQL);
		$result = $dataProvider->getData() ;
		echo json_encode($result);
	}
	
	public function actionGetCoordsEntorno($provincia, $municipio){
		header('Content-Type: application/json');
		
		if(is_numeric($municipio)){
			exit("error");
		}
		if(is_numeric($provincia)){
			exit("error");
		}
		
		/*$compr = explode(",", $nielssen);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
			exit("error2");	
		}*/		
		
		$SQL = "SELECT 
					ST_X(geo_nielssen.geom) as x, ST_Y(geo_nielssen.geom) as y
				FROM 		 
					public.geo_nielssen
				WHERE 
					municipio='".$municipio."' AND provincia='".$provincia."'";
		  
		$dataProvider=new CSqlDataProvider($SQL);
		$result = $dataProvider->getData() ;
		echo json_encode($result);		
	}
	
	public function actionActualizarCoordenada($coord, $nielssen){
		//header('Content-Type: application/json');
		
		if(!is_numeric($nielssen)){
			exit("error");
		}
		
		$compr = explode(",", $nielssen);		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
			exit("error2");	
		}
		
		$compr2 = explode(",", $coord);		
		foreach($compr2 as $c2){
			$c2 = str_replace ("'", "", $c2);
			if(!is_numeric($c2))
			exit("error2");	
		}
		
		$coordenadas = explode(",",$coord);
		$x = $coordenadas[0];
		$y = $coordenadas[1];
				
		$connection=Yii::app()->db;		 
		$sql="UPDATE geo_nielssen SET geom = ST_SetSRID(ST_Point(".$x.", ".$y."), 25830), geo_precision=16 WHERE codigo_nielssen = '".$nielssen."'";		
		$command=$connection->createCommand($sql);
		//$command->bindParam(":x",$x,PDO::PARAM_STR);
		//$command->bindParam(":y",$y,PDO::PARAM_STR);
		//$command->bindValue(':status', $state, PDO::PARAM_STR);
		$command->execute();
		$result="Coordenadas actualizadas.";
		echo $result;
	}
	
	//----------------------------------------------------------------------------------------------
	//Entorno
	//----------------------------------------------------------------------------------------------
	
	public function actionMapaCompetenciaEntornoRadio($coordenadasRadio, $radio){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $coordenadasRadio);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$map = ms_newMapObj("c:\\datos/sigma/maps/sigma_entorno.map");		
		$map->selectOutputFormat('jpeg');
		$map->setSize(1050, 504);

		//CAPAS ZIPCODE
		$lyr = $map->getLayerByName("mapaCompetenciaEntornoCP");
		
		//geo_cp.cp IN (" . $cp . ") AND
		$lyr->data = "geom FROM (SELECT 	
									geo_nielssen.codigo_nielssen as gid, 
									geo_nielssen.geom as geom,
									tbl_rotulo.rotulo as rotulo,
									geo_nielssen.sala_ventas
									--,geo_cp.cp as cp
								FROM 
									public.geo_nielssen,
									--public.geo_cp,
									public.tbl_rotulo
								WHERE									
									tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
									--ST_Intersects(geo_cp.geom , geo_nielssen.geom)
									ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_nielssen.geom)
								group by  
									geo_nielssen.geom,
									geo_nielssen.codigo_nielssen,
									tbl_rotulo.rotulo
									--,geo_cp.cp
								)	
		as subquery USING UNIQUE gid USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		//$label = $class->getLabel(0);
		//$label->set('size', 12);
		//$label->color->setRGB(50,50,50);
		$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);
		
		//---------------------------------------------------------------------------------------------------------------------------
		//WMS IGN
		//---------------------------------------------------------------------------------------------------------------------------

		$l = ms_newLayerObj($map);
		$l->set("name", "WMS_IGN");
		$l->set("status", MS_ON);
		$l->set("startindex", 0);
		$l->set("type", MS_LAYER_RASTER);
		$l->setConnectionType(MS_WMS);
		$l->set('connection', "http://www.ign.es/wms-inspire/ign-base?SERVICE=WMS");
		$l->setMetaData("wms_srs", "epsg:25830");
		$l->setMetaData("wms_name", "IGNBaseTodo");
		$l->setMetaData("wms_format", "image/jpeg");
		$l->setMetaData("wms_server_version", "1.1.1");

		$map->removeLayer($map->numlayers-1);
		$map->insertLayer($l, 0);

		$ref = $map->draw();
		$ran = rand ();
		$t1 = 'images/mapas/t1_'.$ran.'.jpg';
		$t2 = 't1_'.$ran.'.jpg';
		$ref->saveImage($t1);

		$salida['foto'] = $t2;
		
		echo json_encode($salida);
	}
	
	public function actionMapaCompetenciaEntornoCP($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$map = ms_newMapObj("c:\\datos/sigma/maps/sigma_entorno.map");		
		$map->selectOutputFormat('jpeg');
		$map->setSize(1050, 504);

		//CAPAS ZIPCODE
		$lyr = $map->getLayerByName("mapaCompetenciaEntornoCP");
		
		$lyr->data = "geom FROM (SELECT 	
									geo_nielssen.codigo_nielssen as gid, 
									geo_nielssen.geom as geom,
									tbl_rotulo.rotulo as rotulo,
									geo_nielssen.sala_ventas,
									geo_cp.cp as cp
								FROM 
									public.geo_nielssen,
									public.geo_cp,
									public.tbl_rotulo
								WHERE
									geo_cp.cp IN (" . $cp . ") AND
									tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
									ST_Intersects(geo_cp.geom , geo_nielssen.geom)
								group by  
									geo_nielssen.geom,
									geo_nielssen.codigo_nielssen,
									tbl_rotulo.rotulo,
									geo_cp.cp)	
		as subquery USING UNIQUE cp USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		//$label = $class->getLabel(0);
		//$label->set('size', 12);
		//$label->color->setRGB(50,50,50);
		$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);
		
		//---------------------------------------------------------------------------------------------------------------------------
		//WMS IGN
		//---------------------------------------------------------------------------------------------------------------------------

		$l = ms_newLayerObj($map);
		$l->set("name", "WMS_IGN");
		$l->set("status", MS_ON);
		$l->set("startindex", 0);
		$l->set("type", MS_LAYER_RASTER);
		$l->setConnectionType(MS_WMS);
		$l->set('connection', "http://www.ign.es/wms-inspire/ign-base?SERVICE=WMS");
		$l->setMetaData("wms_srs", "epsg:25830");
		$l->setMetaData("wms_name", "IGNBaseTodo");
		$l->setMetaData("wms_format", "image/jpeg");
		$l->setMetaData("wms_server_version", "1.1.1");

		$map->removeLayer($map->numlayers-1);
		$map->insertLayer($l, 0);

		$ref = $map->draw();
		$ran = rand ();
		$t1 = 'images/mapas/t1_'.$ran.'.jpg';
		$t2 = 't1_'.$ran.'.jpg';
		$ref->saveImage($t1);

		$salida['foto'] = $t2;
		
		echo json_encode($salida);
	}
	
	public function actionMapaCompetenciaEntornoSecciones($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$map = ms_newMapObj("c:\\datos/sigma/maps/sigma_entorno.map");		
		$map->selectOutputFormat('jpeg');
		$map->setSize(1050, 504);

		//CAPAS ZIPCODE
		$lyr = $map->getLayerByName("mapaCompetenciaEntornoSecciones");
		
		$lyr->data = "geom FROM (SELECT 	
									geo_nielssen.codigo_nielssen as gid, 
									geo_nielssen.geom as geom,
									tbl_rotulo.rotulo as rotulo,
									geo_nielssen.sala_ventas,
									geo_secciones.cod_secc as cod_secc
								FROM 
									public.geo_nielssen,
									public.geo_secciones,
									public.tbl_rotulo
								WHERE
									geo_secciones.cod_secc IN (" . $cp . ") AND
									tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
									ST_Intersects(geo_secciones.geom , geo_nielssen.geom)
								group by  
									geo_nielssen.geom,
									geo_nielssen.codigo_nielssen,
									tbl_rotulo.rotulo,
									geo_secciones.cod_secc)	
		as subquery USING UNIQUE cod_secc USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		//$label = $class->getLabel(0);
		//$label->set('size', 12);
		//$label->color->setRGB(50,50,50);
		$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);
		
		//---------------------------------------------------------------------------------------------------------------------------
		//WMS IGN
		//---------------------------------------------------------------------------------------------------------------------------

		$l = ms_newLayerObj($map);
		$l->set("name", "WMS_IGN");
		$l->set("status", MS_ON);
		$l->set("startindex", 0);
		$l->set("type", MS_LAYER_RASTER);
		$l->setConnectionType(MS_WMS);
		$l->set('connection', "http://www.ign.es/wms-inspire/ign-base?SERVICE=WMS");
		$l->setMetaData("wms_srs", "epsg:25830");
		$l->setMetaData("wms_name", "IGNBaseTodo");
		$l->setMetaData("wms_format", "image/jpeg");
		$l->setMetaData("wms_server_version", "1.1.1");

		$map->removeLayer($map->numlayers-1);
		$map->insertLayer($l, 0);

		$ref = $map->draw();
		$ran = rand ();
		$t1 = 'images/mapas/t1_'.$ran.'.jpg';
		$t2 = 't1_'.$ran.'.jpg';
		$ref->saveImage($t1);

		$salida['foto'] = $t2;
		
		echo json_encode($salida);
	}
	
	public function actionMapaCompetenciaEntornoDistritos($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$map = ms_newMapObj("c:\\datos/sigma/maps/sigma_entorno.map");		
		$map->selectOutputFormat('jpeg');
		$map->setSize(1050, 504);

		//CAPAS ZIPCODE
		$lyr = $map->getLayerByName("mapaCompetenciaEntornoDistritos");
		
		$lyr->data = "geom FROM (SELECT 	
									geo_nielssen.codigo_nielssen as gid, 
									geo_nielssen.geom as geom,
									tbl_rotulo.rotulo as rotulo,
									geo_nielssen.sala_ventas,
									geo_distritos.cod_distri as cod_distri
								FROM 
									public.geo_nielssen,
									public.geo_distritos,
									public.tbl_rotulo
								WHERE
									geo_distritos.cod_distri IN (" . $cp . ") AND
									tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
									ST_Intersects(geo_distritos.geom , geo_nielssen.geom)
								group by  
									geo_nielssen.geom,
									geo_nielssen.codigo_nielssen,
									tbl_rotulo.rotulo,
									geo_distritos.cod_distri)	
		as subquery USING UNIQUE cod_distri USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		//$label = $class->getLabel(0);
		//$label->set('size', 12);
		//$label->color->setRGB(50,50,50);
		$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);
		
		//---------------------------------------------------------------------------------------------------------------------------
		//WMS IGN
		//---------------------------------------------------------------------------------------------------------------------------

		$l = ms_newLayerObj($map);
		$l->set("name", "WMS_IGN");
		$l->set("status", MS_ON);
		$l->set("startindex", 0);
		$l->set("type", MS_LAYER_RASTER);
		$l->setConnectionType(MS_WMS);
		$l->set('connection', "http://www.ign.es/wms-inspire/ign-base?SERVICE=WMS");
		$l->setMetaData("wms_srs", "epsg:25830");
		$l->setMetaData("wms_name", "IGNBaseTodo");
		$l->setMetaData("wms_format", "image/jpeg");
		$l->setMetaData("wms_server_version", "1.1.1");

		$map->removeLayer($map->numlayers-1);
		$map->insertLayer($l, 0);

		$ref = $map->draw();
		$ran = rand ();
		$t1 = 'images/mapas/t1_'.$ran.'.jpg';
		$t2 = 't1_'.$ran.'.jpg';
		$ref->saveImage($t1);

		$salida['foto'] = $t2;
		
		echo json_encode($salida);
	}
	
	public function actionMapaCompetenciaEntornoMunicipios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$map = ms_newMapObj("c:\\datos/sigma/maps/sigma_entorno.map");		
		$map->selectOutputFormat('jpeg');
		$map->setSize(1050, 504);

		//CAPAS ZIPCODE
		$lyr = $map->getLayerByName("mapaCompetenciaEntornoMunicipios");
		
		$lyr->data = "geom FROM (SELECT 	
									geo_nielssen.codigo_nielssen as gid, 
									geo_nielssen.geom as geom,
									tbl_rotulo.rotulo as rotulo,
									geo_nielssen.sala_ventas,
									geo_mun.cod_mun as cod_mun
								FROM 
									public.geo_nielssen,
									public.geo_mun,
									public.tbl_rotulo
								WHERE
									geo_mun.cod_mun IN (" . $cp . ") AND
									tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
									ST_Intersects(geo_mun.geom , geo_nielssen.geom)
								group by  
									geo_nielssen.geom,
									geo_nielssen.codigo_nielssen,
									tbl_rotulo.rotulo,
									geo_mun.cod_mun)	
		as subquery USING UNIQUE cod_mun USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		//$label = $class->getLabel(0);
		//$label->set('size', 12);
		//$label->color->setRGB(50,50,50);
		$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);
		
		//---------------------------------------------------------------------------------------------------------------------------
		//WMS IGN
		//---------------------------------------------------------------------------------------------------------------------------

		$l = ms_newLayerObj($map);
		$l->set("name", "WMS_IGN");
		$l->set("status", MS_ON);
		$l->set("startindex", 0);
		$l->set("type", MS_LAYER_RASTER);
		$l->setConnectionType(MS_WMS);
		$l->set('connection', "http://www.ign.es/wms-inspire/ign-base?SERVICE=WMS");
		$l->setMetaData("wms_srs", "epsg:25830");
		$l->setMetaData("wms_name", "IGNBaseTodo");
		$l->setMetaData("wms_format", "image/jpeg");
		$l->setMetaData("wms_server_version", "1.1.1");

		$map->removeLayer($map->numlayers-1);
		$map->insertLayer($l, 0);

		$ref = $map->draw();
		$ran = rand ();
		$t1 = 'images/mapas/t1_'.$ran.'.jpg';
		$t2 = 't1_'.$ran.'.jpg';
		$ref->saveImage($t1);

		$salida['foto'] = $t2;
		
		echo json_encode($salida);
	}
	
	public function actionMapaCompetenciaEntornoBarrios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$map = ms_newMapObj("c:\\datos/sigma/maps/sigma_entorno.map");		
		$map->selectOutputFormat('jpeg');
		$map->setSize(1050, 504);

		//CAPAS ZIPCODE
		$lyr = $map->getLayerByName("mapaCompetenciaEntornoBarrios");
		
		$lyr->data = "geom FROM (SELECT 	
									geo_nielssen.codigo_nielssen as gid, 
									geo_nielssen.geom as geom,
									tbl_rotulo.rotulo as rotulo,
									geo_nielssen.sala_ventas,
									geo_barrios.cbarrio as cbarrio
								FROM 
									public.geo_nielssen,
									public.geo_barrios,
									public.tbl_rotulo
								WHERE
									geo_barrios.cbarrio IN (" . $cp . ") AND
									tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
									ST_Intersects(geo_barrios.geom , geo_nielssen.geom)
								group by  
									geo_nielssen.geom,
									geo_nielssen.codigo_nielssen,
									tbl_rotulo.rotulo,
									geo_barrios.cbarrio)	
		as subquery USING UNIQUE cbarrio USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		//$label = $class->getLabel(0);
		//$label->set('size', 12);
		//$label->color->setRGB(50,50,50);
		$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);
		
		//---------------------------------------------------------------------------------------------------------------------------
		//WMS IGN
		//---------------------------------------------------------------------------------------------------------------------------

		$l = ms_newLayerObj($map);
		$l->set("name", "WMS_IGN");
		$l->set("status", MS_ON);
		$l->set("startindex", 0);
		$l->set("type", MS_LAYER_RASTER);
		$l->setConnectionType(MS_WMS);
		$l->set('connection', "http://www.ign.es/wms-inspire/ign-base?SERVICE=WMS");
		$l->setMetaData("wms_srs", "epsg:25830");
		$l->setMetaData("wms_name", "IGNBaseTodo");
		$l->setMetaData("wms_format", "image/jpeg");
		$l->setMetaData("wms_server_version", "1.1.1");

		$map->removeLayer($map->numlayers-1);
		$map->insertLayer($l, 0);

		$ref = $map->draw();
		$ran = rand ();
		$t1 = 'images/mapas/t1_'.$ran.'.jpg';
		$t2 = 't1_'.$ran.'.jpg';
		$ref->saveImage($t1);

		$salida['foto'] = $t2;
		
		echo json_encode($salida);
	}
}
