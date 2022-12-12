<?php

class TblExtranjerosController extends Controller
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
					'actions'=>array('create','update', 'getExtranjeros', 'getExtranjerosZI', 'getExtranjerosBarrio', 'getExtranjerosProvincia', 'getExtranjerosMunicipio', 'getExtranjerosSecciones', 'getExtranjerosDistritos','getExtranjerosRadio'),
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
					'actions'=>array('create','update', 'getExtranjeros', 'getExtranjerosZI', 'getExtranjerosBarrio', 'getExtranjerosProvincia', 'getExtranjerosMunicipio', 'getExtranjerosSecciones', 'getExtranjerosDistritos','getExtranjerosRadio'),
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
	
	//-------------------------------------------------------------
	//Gráfico extranjeros entorno y general Radio
	//-------------------------------------------------------------
	public function actionGetExtranjerosRadio($coordenadasRadio, $radio){
		
		header('Content-Type: application/json');
		$compr = explode(",", $coordenadasRadio);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");		
		}
		
		$sqlNacional="SELECT  				
						sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as total,
						sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as pobex_afric
					FROM 
						geo_secciones";
			
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		$dNacional = $dataProviderNacional->getData();
		
		$totalEspana = 0;
		$totalExtranjeros = 0;		
		
		foreach($dNacional as $sNacional){
			$totalEspana += $sNacional['total'];
			$totalExtranjeros += $sNacional['pobex_afric'];
		}
		
		$sql="SELECT  				
				ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_secciones.geom))/ST_Area(geo_secciones.geom) porc, 
				sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as totalseleccion,
				cod_secc, 
				sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as total
			FROM 
				geo_secciones 
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_secciones.geom)				
			group by geo_secciones.geom,cod_secc";
				
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$d = $dataProvider->getData();
		$r;
		$k  = array();
		$total = 0;
		$total2 = 0;
		$totalSeleccion = 0;
		$totalExtranjerosSeleccion = 0;
		foreach($d as $s){
			$totalSeleccion += $s['totalseleccion'];
			$totalExtranjerosSeleccion += $s['total'];
			$total += $s['total'] * $s['porc'];
			$r[$s['cod_secc']] = (float)$s['porc'];
			
			$model = new TblExtranjeros();
			$Criteria = new CDbCriteria();
			$Criteria->with= array('nacionalidad0', 'seccion0');
			$Criteria->condition = 'cod_secc = \'' . $s['cod_secc'] . '\' AND grupo <> -1 AND poblacion <>0';
			$Criteria->order = "poblacion DESC";
			
			$extranjeros = $model->findAll($Criteria);
			$p = 0;
			
			foreach($extranjeros as $ex){
			
				//if($p>0){
					if(array_key_exists($ex->nacionalidad0->desc_nacionalidad, $k)){
						//echo $p. "p:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
						$k[$ex->nacionalidad0->desc_nacionalidad] += $ex->poblacion * $s['porc'];
					}else{
						$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
						//echo $p. "p1:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
					}
				/*}else{
					$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
					echo $p. ":" . $ex->nacionalidad0->desc_nacionalidad . "             ";
				}*/
				
				//echo " : " . $ex->poblacion * $s['porc']. "<br>";
				$p += 1;
				$total2 += $ex->poblacion * $s['porc'];
			}
		}
		arsort($k);
		echo json_encode(array("datos"=>$k, "total"=>$total, "total2"=>$total2, "totalEspana"=>$totalExtranjeros*100/$totalEspana, "totalSeleccion"=>$totalExtranjerosSeleccion*100/$totalSeleccion));
	}
	
	//-------------------------------------------------------------
	//Gráfico extranjeros entorno y general CP
	//-------------------------------------------------------------
	public function actionGetExtranjeros($cp){
		
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");		
		}
		
		$sqlNacional="SELECT  				
						sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as total,
						sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as pobex_afric
					FROM 
						geo_secciones";
			
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		$dNacional = $dataProviderNacional->getData();
		
		$totalEspana = 0;
		$totalExtranjeros = 0;		
		
		foreach($dNacional as $sNacional){
			$totalEspana += $sNacional['total'];
			$totalExtranjeros += $sNacional['pobex_afric'];
		}
		
		$sql="SELECT  
				ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom))/ST_Area(geo_secciones.geom) porc, 
				sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as totalseleccion,
				cod_secc, 
				sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as total
			FROM 
				geo_cp, 
				geo_secciones 
			WHERE 
				ST_Intersects(geo_cp.geom , geo_secciones.geom) AND 
				geo_cp.cp IN (" . $cp . ")
			group by geo_cp.geom,geo_secciones.geom,cod_secc";
				
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$d = $dataProvider->getData();
		$r;
		$k  = array();
		$total = 0;
		$total2 = 0;
		$totalSeleccion = 0;
		$totalExtranjerosSeleccion = 0;
		foreach($d as $s){
			$totalSeleccion += $s['totalseleccion'];
			$totalExtranjerosSeleccion += $s['total'];
			$total += $s['total'] * $s['porc'];
			$r[$s['cod_secc']] = (float)$s['porc'];
			
			$model = new TblExtranjeros();
			$Criteria = new CDbCriteria();
			$Criteria->with= array('nacionalidad0', 'seccion0');
			$Criteria->condition = 'cod_secc = \'' . $s['cod_secc'] . '\' AND grupo <> -1 AND poblacion <>0';
			$Criteria->order = "poblacion DESC";
			
			$extranjeros = $model->findAll($Criteria);
			$p = 0;
			
			foreach($extranjeros as $ex){
			
				//if($p>0){
					if(array_key_exists($ex->nacionalidad0->desc_nacionalidad, $k)){
						//echo $p. "p:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
						$k[$ex->nacionalidad0->desc_nacionalidad] += $ex->poblacion * $s['porc'];
					}else{
						$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
						//echo $p. "p1:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
					}
				/*}else{
					$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
					echo $p. ":" . $ex->nacionalidad0->desc_nacionalidad . "             ";
				}*/
				
				//echo " : " . $ex->poblacion * $s['porc']. "<br>";
				$p += 1;
				$total2 += $ex->poblacion * $s['porc'];
			}
		}
		arsort($k);
		echo json_encode(array("datos"=>$k, "total"=>$total, "total2"=>$total2, "totalEspana"=>$totalExtranjeros*100/$totalEspana, "totalSeleccion"=>$totalExtranjerosSeleccion*100/$totalSeleccion));
	}
	
	//-------------------------------------------------------------
	//Gráfico extranjeros entorno municipio
	//-------------------------------------------------------------
	public function actionGetExtranjerosMunicipio($municipio){
		
		header('Content-Type: application/json');
		$compr = explode(",", $municipio);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");		
		}
		
		$sqlNacional="SELECT  				
						sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as total,
						sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as pobex_afric
					FROM 
						geo_secciones";
			
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		$dNacional = $dataProviderNacional->getData();
		
		$totalEspana = 0;
		$totalExtranjeros = 0;		
		
		foreach($dNacional as $sNacional){
			$totalEspana += $sNacional['total'];
			$totalExtranjeros += $sNacional['pobex_afric'];
		}
		
		$sql="SELECT  
				ST_Area(ST_Intersection(geo_mun.geom, geo_secciones.geom))/ST_Area(geo_secciones.geom) porc, 
				sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as totalseleccion,
				cod_secc, 
				sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as total
			FROM 
				geo_mun, 
				geo_secciones 
			WHERE 
				ST_Intersects(geo_mun.geom , geo_secciones.geom) AND 
				geo_mun.cod_mun IN (" . $municipio . ")
			group by geo_mun.geom,geo_secciones.geom,cod_secc";
				
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$d = $dataProvider->getData();
		$r;
		$k  = array();
		$total = 0;
		$total2 = 0;
		$totalSeleccion = 0;
		$totalExtranjerosSeleccion = 0;
		foreach($d as $s){
			$totalSeleccion += $s['totalseleccion'];
			$totalExtranjerosSeleccion += $s['total'];
			$total += $s['total'] * $s['porc'];
			$r[$s['cod_secc']] = (float)$s['porc'];
			
			$model = new TblExtranjeros();
			$Criteria = new CDbCriteria();
			$Criteria->with= array('nacionalidad0', 'seccion0');
			$Criteria->condition = 'cod_secc = \'' . $s['cod_secc'] . '\' AND grupo <> -1 AND poblacion <>0';
			$Criteria->order = "poblacion DESC";
			
			$extranjeros = $model->findAll($Criteria);
			$p = 0;
			
			foreach($extranjeros as $ex){
			
				//if($p>0){
					if(array_key_exists($ex->nacionalidad0->desc_nacionalidad, $k)){
						//echo $p. "p:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
						$k[$ex->nacionalidad0->desc_nacionalidad] += $ex->poblacion * $s['porc'];
					}else{
						$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
						//echo $p. "p1:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
					}
				/*}else{
					$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
					echo $p. ":" . $ex->nacionalidad0->desc_nacionalidad . "             ";
				}*/
				
				//echo " : " . $ex->poblacion * $s['porc']. "<br>";
				$p += 1;
				$total2 += $ex->poblacion * $s['porc'];
			}
		}
		arsort($k);
		echo json_encode(array("datos"=>$k, "total"=>$total, "total2"=>$total2, "totalEspana"=>$totalExtranjeros*100/$totalEspana, "totalSeleccion"=>$totalExtranjerosSeleccion*100/$totalSeleccion));
	}
	
	//-------------------------------------------------------------
	//Gráfico extranjeros entorno barrios
	//-------------------------------------------------------------
	public function actionGetExtranjerosBarrio($barrio){
		
		header('Content-Type: application/json');
		$compr = explode(",", $barrio);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");		
		}
		
		$sqlNacional="SELECT  				
						sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as total,
						sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as pobex_afric
					FROM 
						geo_secciones";
			
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		$dNacional = $dataProviderNacional->getData();
		
		$totalEspana = 0;
		$totalExtranjeros = 0;		
		
		foreach($dNacional as $sNacional){
			$totalEspana += $sNacional['total'];
			$totalExtranjeros += $sNacional['pobex_afric'];
		}
		
		$sql="SELECT  
				ST_Area(ST_Intersection(geo_barrios.geom, geo_secciones.geom))/ST_Area(geo_secciones.geom) porc, 
				sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as totalseleccion,
				cod_secc, 
				sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as total
			FROM 
				geo_barrios, 
				geo_secciones 
			WHERE 
				ST_Intersects(geo_barrios.geom , geo_secciones.geom) AND 
				geo_barrios.cbarrio IN (" . $barrio . ")
			group by geo_barrios.geom,geo_secciones.geom,cod_secc";
				
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$d = $dataProvider->getData();
		$r;
		$k  = array();
		$total = 0;
		$total2 = 0;
		$totalSeleccion = 0;
		$totalExtranjerosSeleccion = 0;
		foreach($d as $s){
			$totalSeleccion += $s['totalseleccion'];
			$totalExtranjerosSeleccion += $s['total'];
			$total += $s['total'] * $s['porc'];
			$r[$s['cod_secc']] = (float)$s['porc'];
			
			$model = new TblExtranjeros();
			$Criteria = new CDbCriteria();
			$Criteria->with= array('nacionalidad0', 'seccion0');
			$Criteria->condition = 'cod_secc = \'' . $s['cod_secc'] . '\' AND grupo <> -1 AND poblacion <>0';
			$Criteria->order = "poblacion DESC";
			
			$extranjeros = $model->findAll($Criteria);
			$p = 0;
			
			foreach($extranjeros as $ex){
			
				//if($p>0){
					if(array_key_exists($ex->nacionalidad0->desc_nacionalidad, $k)){
						//echo $p. "p:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
						$k[$ex->nacionalidad0->desc_nacionalidad] += $ex->poblacion * $s['porc'];
					}else{
						$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
						//echo $p. "p1:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
					}
				/*}else{
					$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
					echo $p. ":" . $ex->nacionalidad0->desc_nacionalidad . "             ";
				}*/
				
				//echo " : " . $ex->poblacion * $s['porc']. "<br>";
				$p += 1;
				$total2 += $ex->poblacion * $s['porc'];
			}
		}
		arsort($k);
		echo json_encode(array("datos"=>$k, "total"=>$total, "total2"=>$total2, "totalEspana"=>$totalExtranjeros*100/$totalEspana, "totalSeleccion"=>$totalExtranjerosSeleccion*100/$totalSeleccion));
	}
	
	//-------------------------------------------------------------
	//Gráfico extranjeros entorno distritos
	//-------------------------------------------------------------
	public function actionGetExtranjerosDistritos($distrito){
		
		header('Content-Type: application/json');
		$compr = explode(",", $distrito);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");		
		}
		
		$sqlNacional="SELECT  				
						sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as total,
						sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as pobex_afric
					FROM 
						geo_secciones";
			
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		$dNacional = $dataProviderNacional->getData();
		
		$totalEspana = 0;
		$totalExtranjeros = 0;		
		
		foreach($dNacional as $sNacional){
			$totalEspana += $sNacional['total'];
			$totalExtranjeros += $sNacional['pobex_afric'];
		}
		
		$sql="SELECT  
				ST_Area(ST_Intersection(geo_distritos.geom, geo_secciones.geom))/ST_Area(geo_secciones.geom) porc, 
				sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as totalseleccion,
				cod_secc, 
				sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as total
			FROM 
				geo_distritos, 
				geo_secciones 
			WHERE 
				ST_Intersects(geo_distritos.geom , geo_secciones.geom) AND 
				geo_distritos.cod_distri IN (" . $distrito . ")
			group by geo_distritos.geom,geo_secciones.geom,cod_secc";
				
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$d = $dataProvider->getData();
		$r;
		$k  = array();
		$total = 0;
		$total2 = 0;
		$totalSeleccion = 0;
		$totalExtranjerosSeleccion = 0;
		foreach($d as $s){
			$totalSeleccion += $s['totalseleccion'];
			$totalExtranjerosSeleccion += $s['total'];
			$total += $s['total'] * $s['porc'];
			$r[$s['cod_secc']] = (float)$s['porc'];
			
			$model = new TblExtranjeros();
			$Criteria = new CDbCriteria();
			$Criteria->with= array('nacionalidad0', 'seccion0');
			$Criteria->condition = 'cod_secc = \'' . $s['cod_secc'] . '\' AND grupo <> -1 AND poblacion <>0';
			$Criteria->order = "poblacion DESC";
			
			$extranjeros = $model->findAll($Criteria);
			$p = 0;
			
			foreach($extranjeros as $ex){
			
				//if($p>0){
					if(array_key_exists($ex->nacionalidad0->desc_nacionalidad, $k)){
						//echo $p. "p:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
						$k[$ex->nacionalidad0->desc_nacionalidad] += $ex->poblacion * $s['porc'];
					}else{
						$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
						//echo $p. "p1:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
					}
				/*}else{
					$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
					echo $p. ":" . $ex->nacionalidad0->desc_nacionalidad . "             ";
				}*/
				
				//echo " : " . $ex->poblacion * $s['porc']. "<br>";
				$p += 1;
				$total2 += $ex->poblacion * $s['porc'];
			}
		}
		arsort($k);
		echo json_encode(array("datos"=>$k, "total"=>$total, "total2"=>$total2, "totalEspana"=>$totalExtranjeros*100/$totalEspana, "totalSeleccion"=>$totalExtranjerosSeleccion*100/$totalSeleccion));
	}
	
	//-------------------------------------------------------------
	//Gráfico extranjeros entorno secciones
	//-------------------------------------------------------------
	public function actionGetExtranjerosSecciones($seccion){
		
		header('Content-Type: application/json');
		$compr = explode(",", $seccion);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");		
		}
		
		$sqlNacional="SELECT  				
						sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as total,
						sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as pobex_afric
					FROM 
						geo_secciones";
			
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		$dNacional = $dataProviderNacional->getData();
		
		$totalEspana = 0;
		$totalExtranjeros = 0;		
		
		foreach($dNacional as $sNacional){
			$totalEspana += $sNacional['total'];
			$totalExtranjeros += $sNacional['pobex_afric'];
		}
			
		$sql="SELECT  
				ST_Area(ST_Intersection(geo_mun.geom, geo_secciones.geom))/ST_Area(geo_secciones.geom) porc, 
				sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as totalseleccion,
				cod_secc, 
				sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as total
			FROM 
				geo_mun, 
				geo_secciones 
			WHERE 
				ST_Intersects(geo_mun.geom , geo_secciones.geom) AND 
				geo_secciones.cod_secc IN (" . $seccion . ")
			group by geo_mun.geom,geo_secciones.geom,cod_secc";
				
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$d = $dataProvider->getData();
		$r;
		$k  = array();
		$total = 0;
		$total2 = 0;
		$totalSeleccion = 0;
		$totalExtranjerosSeleccion = 0;
		foreach($d as $s){
			$totalSeleccion += $s['totalseleccion'];
			$totalExtranjerosSeleccion += $s['total'];
			$total += $s['total'] * $s['porc'];
			$r[$s['cod_secc']] = (float)$s['porc'];
			
			$model = new TblExtranjeros();
			$Criteria = new CDbCriteria();
			$Criteria->with= array('nacionalidad0', 'seccion0');
			$Criteria->condition = 'cod_secc = \'' . $s['cod_secc'] . '\' AND grupo <> -1 AND poblacion <>0';
			$Criteria->order = "poblacion DESC";
			
			$extranjeros = $model->findAll($Criteria);
			$p = 0;
			
			foreach($extranjeros as $ex){
			
				//if($p>0){
					if(array_key_exists($ex->nacionalidad0->desc_nacionalidad, $k)){
						//echo $p. "p:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
						$k[$ex->nacionalidad0->desc_nacionalidad] += $ex->poblacion * $s['porc'];
					}else{
						$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
						//echo $p. "p1:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
					}
				/*}else{
					$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
					echo $p. ":" . $ex->nacionalidad0->desc_nacionalidad . "             ";
				}*/
				
				//echo " : " . $ex->poblacion * $s['porc']. "<br>";
				$p += 1;
				$total2 += $ex->poblacion * $s['porc'];
			}
		}
		arsort($k);
		echo json_encode(array("datos"=>$k, "total"=>$total, "total2"=>$total2, "totalEspana"=>$totalExtranjeros*100/$totalEspana, "totalSeleccion"=>$totalExtranjerosSeleccion*100/$totalSeleccion));
	}
	
	//-------------------------------------------------------------
	//Gráfico extranjeros entorno provincias
	//-------------------------------------------------------------
	public function actionGetExtranjerosProvincia($provincia){
		
		header('Content-Type: application/json');
		$compr = explode(",", $provincia);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");		
		}
		
		$sqlNacional="SELECT  				
						sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as total,
						sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as pobex_afric
					FROM 
						geo_secciones";
			
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		$dNacional = $dataProviderNacional->getData();
		
		$totalEspana = 0;
		$totalExtranjeros = 0;		
		
		foreach($dNacional as $sNacional){
			$totalEspana += $sNacional['total'];
			$totalExtranjeros += $sNacional['pobex_afric'];
		}
		
		$sql="SELECT  
				ST_Area(ST_Intersection(geo_prov.geom, geo_secciones.geom))/ST_Area(geo_secciones.geom) porc, 
				sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as totalseleccion,
				cod_secc, 
				sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as total
			FROM 
				geo_prov, 
				geo_secciones 
			WHERE 
				ST_Intersects(geo_prov.geom , geo_secciones.geom) AND 
				geo_prov.cod_prov IN (" . $provincia . ")
			group by geo_prov.geom,geo_secciones.geom,cod_secc";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$d = $dataProvider->getData();
		$r;
		$k  = array();
		$total = 0;
		$total2 = 0;
		$totalSeleccion = 0;
		$totalExtranjerosSeleccion = 0;
		foreach($d as $s){
			$totalSeleccion += $s['totalseleccion'];
			$totalExtranjerosSeleccion += $s['total'];
			$total += $s['total'] * $s['porc'];
			$r[$s['cod_secc']] = (float)$s['porc'];
			
			$model = new TblExtranjeros();
			$Criteria = new CDbCriteria();
			$Criteria->with= array('nacionalidad0', 'seccion0');
			$Criteria->condition = 'cod_secc = \'' . $s['cod_secc'] . '\' AND grupo <> -1 AND poblacion <>0';
			$Criteria->order = "poblacion DESC";
			
			$extranjeros = $model->findAll($Criteria);
			$p = 0;
			
			foreach($extranjeros as $ex){
			
				//if($p>0){
					if(array_key_exists($ex->nacionalidad0->desc_nacionalidad, $k)){
						//echo $p. "p:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
						$k[$ex->nacionalidad0->desc_nacionalidad] += $ex->poblacion * $s['porc'];
					}else{
						$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
						//echo $p. "p1:" . $ex->nacionalidad0->desc_nacionalidad . "             ";
					}
				/*}else{
					$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
					echo $p. ":" . $ex->nacionalidad0->desc_nacionalidad . "             ";
				}*/
				
				//echo " : " . $ex->poblacion * $s['porc']. "<br>";
				$p += 1;
				$total2 += $ex->poblacion * $s['porc'];
			}
		}
		arsort($k);
		echo json_encode(array("datos"=>$k, "total"=>$total, "total2"=>$total2, "totalEspana"=>$totalExtranjeros*100/$totalEspana, "totalSeleccion"=>$totalExtranjerosSeleccion*100/$totalSeleccion));
	}
	
	//-------------------------------------------------------------
	//Gráfico extranjeros general ZI
	//-------------------------------------------------------------
	public function actionGetExtranjerosZI($loc){
		header('Content-Type: application/json');
		$compr = explode(",", $loc);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");		
		}
		
		$sqlNacional="SELECT  				
						sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as total,
						sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as pobex_afric
					FROM 
						geo_secciones";
			
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		$dNacional = $dataProviderNacional->getData();
		
		$totalEspana = 0;
		$totalExtranjeros = 0;		
		
		foreach($dNacional as $sNacional){
			$totalEspana += $sNacional['total'];
			$totalExtranjeros += $sNacional['pobex_afric'];
		}
		
		$sql="SELECT  
				ST_Area(ST_Intersection(geo_zona_influencia.geom, geo_secciones.geom))/ST_Area(geo_secciones.geom) porc, 
				sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as totalseleccion,
				cod_secc, 
				sum(pobex_afric+pobex_ameri+pobex_asiat+pobex_europ+pobex_resto) as total
			FROM 
				geo_zona_influencia, 
				geo_secciones 
			WHERE 
				ST_Intersects(geo_zona_influencia.geom , geo_secciones.geom) AND 
				geo_zona_influencia.loc IN (" . $loc . ")
			group by geo_zona_influencia.geom,geo_secciones.geom,cod_secc";
				
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$d = $dataProvider->getData();
		$r;
		$k  = array();
		$total = 0;
		$total2 = 0;
		$totalSeleccion = 0;
		$totalExtranjerosSeleccion = 0;
		foreach($d as $s){
			$totalSeleccion += $s['totalseleccion'];
			$totalExtranjerosSeleccion += $s['total'];
			$total += $s['total'] * $s['porc'];
			$r[$s['cod_secc']] = (float)$s['porc'];			
			
			$model = new TblExtranjeros();
			$Criteria = new CDbCriteria();
			$Criteria->with= array('nacionalidad0', 'seccion0');
			$Criteria->condition = 'cod_secc = \'' . $s['cod_secc'] . '\' AND grupo != -1 AND poblacion != 0';
			$Criteria->order = "poblacion DESC";
			
			$extranjeros = $model->findAll($Criteria);
			$p = 0;
			foreach($extranjeros as $ex){
				//if($p>0){
					if(array_key_exists($ex->nacionalidad0->desc_nacionalidad, $k)){
						$k[$ex->nacionalidad0->desc_nacionalidad] += $ex->poblacion * $s['porc'];
					}else
						$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
				//}else
				//	$k[$ex->nacionalidad0->desc_nacionalidad] = $ex->poblacion * $s['porc'];
				//echo $ex->nacionalidad0->desc_nacionalidad;
				//echo " : " . $ex->poblacion * $s['porc']. "<br>";
				$p += 1;
				$total2 += $ex->poblacion * $s['porc'];
			}
		}
		arsort($k);
		echo json_encode(array("datos"=>$k, "total"=>$total, "total2"=>$total2, "totalEspana"=>$totalExtranjeros*100/$totalEspana, "totalSeleccion"=>$totalExtranjerosSeleccion*100/$totalSeleccion));
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
		$model=new TblExtranjeros;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblExtranjeros']))
		{
			$model->attributes=$_POST['TblExtranjeros'];
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

		if(isset($_POST['TblExtranjeros']))
		{
			$model->attributes=$_POST['TblExtranjeros'];
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
		$dataProvider=new CActiveDataProvider('TblExtranjeros');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblExtranjeros('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblExtranjeros']))
			$model->attributes=$_GET['TblExtranjeros'];

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
		$model=TblExtranjeros::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-extranjeros-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
