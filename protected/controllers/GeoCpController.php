<?php

class GeoCpController extends Controller
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
					'actions'=>array('index',
									'view',
									'geoZIPCode', 
									'getExtentZC', 
									'getInfoZC', 
									'getCompeRadio', 'getCompeSupRadio','getCompeDescargableRadio',
									'getCompeRadioMultiple', 'getCompeSupRadioMultiple','getCompeDescargableRadioMultiple',
									'getCompe', 'getCompeZI', 'getCompeISO','getCompeDescargableCP', 
									'getCompeSup', 'getCompeSupZI', 'getCompeSupISO',
									'getCompeSecciones','getCompeSupSecciones','getCompeDescargableSecciones', 
									'getCompeBarrios','getCompeSupBarrios','getCompeDescargableBarrios', 
									'getCompeDistritos','getCompeSupDistritos','getCompeDescargableDistritos', 
									'getCompeMunicipios','getCompeSupMunicipios','getCompeDescargableMunicipios'),
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
					'actions'=>array('index',
									'view',
									'geoZIPCode', 
									'getExtentZC', 
									'getInfoZC', 
									'getCompeRadio', 'getCompeSupRadio','getCompeDescargableRadio',
									'getCompeRadioMultiple', 'getCompeSupRadioMultiple','getCompeDescargableRadioMultiple',
									'getCompe', 'getCompeZI', 'getCompeISO','getCompeDescargableCP', 
									'getCompeSup', 'getCompeSupZI', 'getCompeSupISO',
									'getCompeSecciones','getCompeSupSecciones','getCompeDescargableSecciones', 
									'getCompeBarrios','getCompeSupBarrios','getCompeDescargableBarrios', 
									'getCompeDistritos','getCompeSupDistritos','getCompeDescargableDistritos', 
									'getCompeMunicipios','getCompeSupMunicipios','getCompeDescargableMunicipios'),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update'),
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
		$model=new GeoCp;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GeoCp']))
		{
			$model->attributes=$_POST['GeoCp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->gid));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	//------------------------------------------------------------------------------
	//------------------------------------------------------------------------------
	
	public function actionGetCompeRadioMultiple($coordenadasRadio){
		header('Content-Type: application/json');
		$compr = explode(",", $coordenadasRadio);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}		
				
		$sqlCompe250 = "SELECT 
						count(*) as total250, sum(sala_ventas)  as superficie250
					FROM
						geo_nielssen, tbl_rotulo
					WHERE
						tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
						geo_nielssen.fecha_baja is null AND
						ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_nielssen.geom)
					GROUP BY
						rotulo
					ORDER BY
						sum(sala_ventas) DESC";
			
		$dataProviderCompe250=new CSqlDataProvider($sqlCompe250, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		
		$sqlCompe500 = "SELECT 
						count(*) as total500, sum(sala_ventas)  as superficie500
					FROM
						geo_nielssen, tbl_rotulo
					WHERE
						tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
						geo_nielssen.fecha_baja is null AND
						ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_nielssen.geom)
					GROUP BY
						rotulo
					ORDER BY
						sum(sala_ventas) DESC";
			
		$dataProviderCompe500=new CSqlDataProvider($sqlCompe500, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		
		$sqlCompe1000 = "SELECT 
						count(*) as total1000, sum(sala_ventas)  as superficie1000
					FROM
						geo_nielssen, tbl_rotulo
					WHERE
						tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
						geo_nielssen.fecha_baja is null AND
						ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_nielssen.geom)
					GROUP BY
						rotulo
					ORDER BY
						sum(sala_ventas) DESC";
			
		$dataProviderCompe1000=new CSqlDataProvider($sqlCompe1000, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		
		echo json_encode(array($dataProviderCompe250->getData(),$dataProviderCompe500->getData(),$dataProviderCompe1000->getData()));// will return a list of arrays.
	}
	
	public function actionGetCompeRadio($coordenadasRadio, $radio){
		header('Content-Type: application/json');
		$compr = explode(",", $coordenadasRadio);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		
		//Selección Densidad Comercial
		$sql="SELECT  
				sum(((x4_h + x4_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"5-14\",
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"15-19\",
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \">65\"
			FROM 
				geo_ine_secciones 
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['0-4'];
			$pob_0514 += $p['5-14'];
			$pob_1519 += $p['15-19'];
			$pob_2029 += $p['20-29'];
			$pob_2965 += $p['30-65'];
			$pob_6599 += $p['>65'];
		}
		$total = $pob_0005 + $pob_0514 + $pob_1519 + $pob_2029 + $pob_2965 + $pob_6599;			
		
		//Nacional Densidad Comercial
		//Población Nacional
		$sqlNacional="SELECT  
						sum(total) as total
					FROM 
						geo_ine_secciones";
		
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		
		$pobNacional = $dataProviderNacional->getData();		
		
		$totalPoblacionNacional = 0;

		foreach($pobNacional as $p){;
			$totalPoblacionNacional += $p['total'];
		}
		
		//Superficie Nacional
		$sqlSuperficieNacional="SELECT  
						sum(sala_ventas) as total
					FROM 
						geo_nielssen";
		
		$dataProviderSuperficieNacional=new CSqlDataProvider($sqlSuperficieNacional, array(
			'pagination'=>false
		));
		
		$superficieNacional = $dataProviderSuperficieNacional->getData();		
		
		$totalSuperficieNacional = 0;

		foreach($superficieNacional as $p){;
			$totalSuperficieNacional += $p['total'];
		}
		
		//---------------------------------------------------------
		$sqlCompe = "SELECT 
						rotulo as ensena, count(*) as total, sum(sala_ventas)  as superficie, round(".$total.") as poblacion, round(".$totalPoblacionNacional.") as poblacionnacional, round(".$totalSuperficieNacional.") as superficienacional
					FROM 
						geo_nielssen, tbl_rotulo 
					WHERE 
						tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
						geo_nielssen.fecha_baja is null AND						
						ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_nielssen.geom)
					GROUP BY 
						rotulo  
					ORDER BY 
						sum(sala_ventas) DESC";
			
		$dataProviderCompe=new CSqlDataProvider($sqlCompe, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProviderCompe->getData());
	}

	public function actionGetCompe($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		
		//Selección Densidad Comercial
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"5-14\",
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"15-19\",
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \">65\"
			FROM 
				geo_cp, 
				geo_ine_secciones 
			WHERE 
				geo_cp.geom && geo_ine_secciones.geom AND 
				geo_cp.cp IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['0-4'];
			$pob_0514 += $p['5-14'];
			$pob_1519 += $p['15-19'];
			$pob_2029 += $p['20-29'];
			$pob_2965 += $p['30-65'];
			$pob_6599 += $p['>65'];
		}
		$total = $pob_0005 + $pob_0514 + $pob_1519 + $pob_2029 + $pob_2965 + $pob_6599;			
		
		//Nacional Densidad Comercial
		//Población Nacional
		$sqlNacional="SELECT  
						sum(total) as total
					FROM 
						geo_ine_secciones";
		
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		
		$pobNacional = $dataProviderNacional->getData();		
		
		$totalPoblacionNacional = 0;

		foreach($pobNacional as $p){;
			$totalPoblacionNacional += $p['total'];
		}
		
		//Superficie Nacional
		$sqlSuperficieNacional="SELECT  
						sum(sala_ventas) as total
					FROM 
						geo_nielssen";
		
		$dataProviderSuperficieNacional=new CSqlDataProvider($sqlSuperficieNacional, array(
			'pagination'=>false
		));
		
		$superficieNacional = $dataProviderSuperficieNacional->getData();		
		
		$totalSuperficieNacional = 0;

		foreach($superficieNacional as $p){;
			$totalSuperficieNacional += $p['total'];
		}
		
		//---------------------------------------------------------
		$sqlCompe = "SELECT rotulo as ensena, count(*) as total, sum(sala_ventas)  as superficie, round(".$total.") as poblacion, round(".$totalPoblacionNacional.") as poblacionnacional, round(".$totalSuperficieNacional.") as superficienacional
			FROM geo_cp, geo_nielssen, tbl_rotulo 
			WHERE tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
			geo_cp.cp IN (".$cp.") and geo_nielssen.fecha_baja is null AND
			ST_Intersects(geo_cp.geom, geo_nielssen.geom)
			GROUP BY rotulo  
			ORDER BY sum(sala_ventas) DESC";
			
		$dataProviderCompe=new CSqlDataProvider($sqlCompe, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProviderCompe->getData());
	}
	
	public function actionGetCompeSecciones($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		
		//Selección Densidad Comercial
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"5-14\",
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"15-19\",
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \">65\"
			FROM 
				geo_secciones, 
				geo_ine_secciones 
			WHERE 
				geo_secciones.geom && geo_ine_secciones.geom AND 
				geo_secciones.cod_secc IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['0-4'];
			$pob_0514 += $p['5-14'];
			$pob_1519 += $p['15-19'];
			$pob_2029 += $p['20-29'];
			$pob_2965 += $p['30-65'];
			$pob_6599 += $p['>65'];
		}
		$total = $pob_0005 + $pob_0514 + $pob_1519 + $pob_2029 + $pob_2965 + $pob_6599;			
		
		//Nacional Densidad Comercial
		//Población Nacional
		$sqlNacional="SELECT  
						sum(total) as total
					FROM 
						geo_ine_secciones";
		
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		
		$pobNacional = $dataProviderNacional->getData();		
		
		$totalPoblacionNacional = 0;

		foreach($pobNacional as $p){;
			$totalPoblacionNacional += $p['total'];
		}
		
		//Superficie Nacional
		$sqlSuperficieNacional="SELECT  
						sum(sala_ventas) as total
					FROM 
						geo_nielssen";
		
		$dataProviderSuperficieNacional=new CSqlDataProvider($sqlSuperficieNacional, array(
			'pagination'=>false
		));
		
		$superficieNacional = $dataProviderSuperficieNacional->getData();		
		
		$totalSuperficieNacional = 0;

		foreach($superficieNacional as $p){;
			$totalSuperficieNacional += $p['total'];
		}
		
		//---------------------------------------------------------
		$sqlCompe = "SELECT rotulo as ensena, count(*) as total, sum(sala_ventas)  as superficie, round(".$total.") as poblacion, round(".$totalPoblacionNacional.") as poblacionnacional, round(".$totalSuperficieNacional.") as superficienacional
			FROM geo_secciones, geo_nielssen, tbl_rotulo 
			WHERE tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
			geo_secciones.cod_secc IN (".$cp.") and geo_nielssen.fecha_baja is null AND
			ST_Intersects(geo_secciones.geom, geo_nielssen.geom)
			GROUP BY rotulo  
			ORDER BY sum(sala_ventas) DESC";
			
		$dataProviderCompe=new CSqlDataProvider($sqlCompe, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProviderCompe->getData());
	}
	
	public function actionGetCompeBarrios($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		
		//Selección Densidad Comercial
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"5-14\",
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"15-19\",
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \">65\"
			FROM 
				geo_barrios, 
				geo_ine_secciones 
			WHERE 
				geo_barrios.geom && geo_ine_secciones.geom AND 
				geo_barrios.cbarrio IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['0-4'];
			$pob_0514 += $p['5-14'];
			$pob_1519 += $p['15-19'];
			$pob_2029 += $p['20-29'];
			$pob_2965 += $p['30-65'];
			$pob_6599 += $p['>65'];
		}
		$total = $pob_0005 + $pob_0514 + $pob_1519 + $pob_2029 + $pob_2965 + $pob_6599;			
		
		//Nacional Densidad Comercial
		//Población Nacional
		$sqlNacional="SELECT  
						sum(total) as total
					FROM 
						geo_ine_secciones";
		
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		
		$pobNacional = $dataProviderNacional->getData();		
		
		$totalPoblacionNacional = 0;

		foreach($pobNacional as $p){;
			$totalPoblacionNacional += $p['total'];
		}
		
		//Superficie Nacional
		$sqlSuperficieNacional="SELECT  
						sum(sala_ventas) as total
					FROM 
						geo_nielssen";
		
		$dataProviderSuperficieNacional=new CSqlDataProvider($sqlSuperficieNacional, array(
			'pagination'=>false
		));
		
		$superficieNacional = $dataProviderSuperficieNacional->getData();		
		
		$totalSuperficieNacional = 0;

		foreach($superficieNacional as $p){;
			$totalSuperficieNacional += $p['total'];
		}
		
		//---------------------------------------------------------
		$sqlCompe = "SELECT rotulo as ensena, count(*) as total, sum(sala_ventas)  as superficie, round(".$total.") as poblacion, round(".$totalPoblacionNacional.") as poblacionnacional, round(".$totalSuperficieNacional.") as superficienacional
			FROM geo_barrios, geo_nielssen, tbl_rotulo 
			WHERE tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
			geo_barrios.cbarrio IN (".$cp.") and geo_nielssen.fecha_baja is null AND
			ST_Intersects(geo_barrios.geom, geo_nielssen.geom)
			GROUP BY rotulo  
			ORDER BY sum(sala_ventas) DESC";
			
		$dataProviderCompe=new CSqlDataProvider($sqlCompe, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProviderCompe->getData());
	}
	
	public function actionGetCompeDistritos($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		
		//Selección Densidad Comercial
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"5-14\",
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"15-19\",
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \">65\"
			FROM 
				geo_distritos, 
				geo_ine_secciones 
			WHERE 
				geo_distritos.geom && geo_ine_secciones.geom AND 
				geo_distritos.cod_distri IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['0-4'];
			$pob_0514 += $p['5-14'];
			$pob_1519 += $p['15-19'];
			$pob_2029 += $p['20-29'];
			$pob_2965 += $p['30-65'];
			$pob_6599 += $p['>65'];
		}
		$total = $pob_0005 + $pob_0514 + $pob_1519 + $pob_2029 + $pob_2965 + $pob_6599;			
		
		//Nacional Densidad Comercial
		//Población Nacional
		$sqlNacional="SELECT  
						sum(total) as total
					FROM 
						geo_ine_secciones";
		
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		
		$pobNacional = $dataProviderNacional->getData();		
		
		$totalPoblacionNacional = 0;

		foreach($pobNacional as $p){;
			$totalPoblacionNacional += $p['total'];
		}
		
		//Superficie Nacional
		$sqlSuperficieNacional="SELECT  
						sum(sala_ventas) as total
					FROM 
						geo_nielssen";
		
		$dataProviderSuperficieNacional=new CSqlDataProvider($sqlSuperficieNacional, array(
			'pagination'=>false
		));
		
		$superficieNacional = $dataProviderSuperficieNacional->getData();		
		
		$totalSuperficieNacional = 0;

		foreach($superficieNacional as $p){;
			$totalSuperficieNacional += $p['total'];
		}
		
		//---------------------------------------------------------
		$sqlCompe = "SELECT rotulo as ensena, count(*) as total, sum(sala_ventas)  as superficie, round(".$total.") as poblacion, round(".$totalPoblacionNacional.") as poblacionnacional, round(".$totalSuperficieNacional.") as superficienacional
			FROM geo_distritos, geo_nielssen, tbl_rotulo 
			WHERE tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
			geo_distritos.cod_distri IN (".$cp.") and geo_nielssen.fecha_baja is null AND
			ST_Intersects(geo_distritos.geom, geo_nielssen.geom)
			GROUP BY rotulo  
			ORDER BY sum(sala_ventas) DESC";
			
		$dataProviderCompe=new CSqlDataProvider($sqlCompe, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProviderCompe->getData());
	}
	
	public function actionGetCompeMunicipios($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		
		//Selección Densidad Comercial
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"5-14\",
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"15-19\",
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \">65\"
			FROM 
				geo_mun, 
				geo_ine_secciones 
			WHERE 
				geo_mun.geom && geo_ine_secciones.geom AND 
				geo_mun.cod_mun IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['0-4'];
			$pob_0514 += $p['5-14'];
			$pob_1519 += $p['15-19'];
			$pob_2029 += $p['20-29'];
			$pob_2965 += $p['30-65'];
			$pob_6599 += $p['>65'];
		}
		$total = $pob_0005 + $pob_0514 + $pob_1519 + $pob_2029 + $pob_2965 + $pob_6599;			
		
		//Nacional Densidad Comercial
		//Población Nacional
		$sqlNacional="SELECT  
						sum(total) as total
					FROM 
						geo_ine_secciones";
		
		$dataProviderNacional=new CSqlDataProvider($sqlNacional, array(
			'pagination'=>false
		));
		
		$pobNacional = $dataProviderNacional->getData();		
		
		$totalPoblacionNacional = 0;

		foreach($pobNacional as $p){;
			$totalPoblacionNacional += $p['total'];
		}
		
		//Superficie Nacional
		$sqlSuperficieNacional="SELECT  
						sum(sala_ventas) as total
					FROM 
						geo_nielssen";
		
		$dataProviderSuperficieNacional=new CSqlDataProvider($sqlSuperficieNacional, array(
			'pagination'=>false
		));
		
		$superficieNacional = $dataProviderSuperficieNacional->getData();		
		
		$totalSuperficieNacional = 0;

		foreach($superficieNacional as $p){;
			$totalSuperficieNacional += $p['total'];
		}
		
		//---------------------------------------------------------
		$sqlCompe = "SELECT rotulo as ensena, count(*) as total, sum(sala_ventas)  as superficie, round(".$total.") as poblacion, round(".$totalPoblacionNacional.") as poblacionnacional, round(".$totalSuperficieNacional.") as superficienacional
			FROM geo_mun, geo_nielssen, tbl_rotulo 
			WHERE tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
			geo_mun.cod_mun IN (".$cp.") and geo_nielssen.fecha_baja is null AND
			ST_Intersects(geo_mun.geom, geo_nielssen.geom)
			GROUP BY rotulo  
			ORDER BY sum(sala_ventas) DESC";
			
		$dataProviderCompe=new CSqlDataProvider($sqlCompe, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProviderCompe->getData());
	}
	
	//--------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------
	//Competencia Sup
	//--------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------
	
	public function actionGetCompeSupRadio($coordenadasRadio, $radio){
		header('Content-Type: application/json');
		$compr = explode(",", $coordenadasRadio);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT 
					descr as tipo, count(*) as total , sum(sala_ventas)  as superficie
				FROM 
					geo_nielssen, tbl_tipo_estab 
				WHERE 
					tbl_tipo_estab.tipo = geo_nielssen.tipo AND					
					geo_nielssen.fecha_baja is null AND
					--ST_Intersects(geo_cp.geom, geo_nielssen.geom)
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_nielssen.geom)
				GROUP BY 
					descr  
				ORDER BY 
					descr ASC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeSup($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT descr as tipo, count(*) as total , sum(sala_ventas)  as superficie
			FROM geo_cp, geo_nielssen, tbl_tipo_estab 
			WHERE tbl_tipo_estab.tipo = geo_nielssen.tipo AND
			geo_cp.cp IN (".$cp.") and geo_nielssen.fecha_baja is null AND
			ST_Intersects(geo_cp.geom, geo_nielssen.geom)
			GROUP BY descr  
			ORDER BY descr ASC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeSupSecciones($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT descr as tipo, count(*) as total , sum(sala_ventas)  as superficie
			FROM geo_secciones, geo_nielssen, tbl_tipo_estab 
			WHERE tbl_tipo_estab.tipo = geo_nielssen.tipo AND
			geo_secciones.cod_secc IN (".$cp.") and geo_nielssen.fecha_baja is null AND
			ST_Intersects(geo_secciones.geom, geo_nielssen.geom)
			GROUP BY descr  
			ORDER BY descr ASC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeSupBarrios($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT descr as tipo, count(*) as total , sum(sala_ventas)  as superficie
			FROM geo_barrios, geo_nielssen, tbl_tipo_estab 
			WHERE tbl_tipo_estab.tipo = geo_nielssen.tipo AND
			geo_barrios.cbarrio IN (".$cp.") and geo_nielssen.fecha_baja is null AND
			ST_Intersects(geo_barrios.geom, geo_nielssen.geom)
			GROUP BY descr  
			ORDER BY descr ASC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeSupDistritos($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT descr as tipo, count(*) as total , sum(sala_ventas)  as superficie
			FROM geo_distritos, geo_nielssen, tbl_tipo_estab 
			WHERE tbl_tipo_estab.tipo = geo_nielssen.tipo AND
			geo_distritos.cod_distri IN (".$cp.") and geo_nielssen.fecha_baja is null AND
			ST_Intersects(geo_distritos.geom, geo_nielssen.geom)
			GROUP BY descr  
			ORDER BY descr ASC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeSupMunicipios($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT descr as tipo, count(*) as total , sum(sala_ventas)  as superficie
			FROM geo_mun, geo_nielssen, tbl_tipo_estab 
			WHERE tbl_tipo_estab.tipo = geo_nielssen.tipo AND
			geo_mun.cod_mun IN (".$cp.") and geo_nielssen.fecha_baja is null AND
			ST_Intersects(geo_mun.geom, geo_nielssen.geom)
			GROUP BY descr  
			ORDER BY descr ASC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	//--------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------
	//Competencia Descargable Entorno 
	//--------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------
	
	public function actionGetCompeDescargableRadio($coordenadasRadio, $radio){
		header('Content-Type: application/json');
		$compr = explode(",", $coordenadasRadio);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT 
					rotulo as ensena,  
					sala_ventas as superficie,
					direccion,
					numero,
					geo_nielssen.cp,
					provincia,
					municipio	
				FROM 
					geo_nielssen, 
					tbl_rotulo 
				WHERE 
					tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
					geo_nielssen.fecha_baja is null AND
					--ST_Intersects(geo_cp.geom, geo_nielssen.geom)	
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_nielssen.geom)					
				ORDER BY 
					sala_ventas DESC";
					
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeDescargableCP($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT 
					rotulo as ensena,  
					sala_ventas as superficie,
					direccion,
					numero,
					geo_nielssen.cp,
					provincia,
					municipio	
				FROM 
					geo_cp, 
					geo_nielssen, 
					tbl_rotulo 
				WHERE 
					tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
					geo_cp.cp IN (".$cp.") and geo_nielssen.fecha_baja is null AND
					ST_Intersects(geo_cp.geom, geo_nielssen.geom)			
				ORDER BY 
					sala_ventas DESC";
					
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeDescargableSecciones($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT 
					rotulo as ensena,  
					sala_ventas as superficie,
					direccion,
					numero,
					geo_nielssen.cp,
					provincia,
					municipio	
				FROM 
					geo_secciones, 
					geo_nielssen, 
					tbl_rotulo 
				WHERE 
					tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
					geo_secciones.cod_secc IN (".$cp.") and geo_nielssen.fecha_baja is null AND
					ST_Intersects(geo_secciones.geom, geo_nielssen.geom)			
				ORDER BY 
					sala_ventas DESC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeDescargableBarrios($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT 
					rotulo as ensena,  
					sala_ventas as superficie,
					direccion,
					numero,
					geo_nielssen.cp,
					provincia,
					municipio	
				FROM 
					geo_barrios, 
					geo_nielssen, 
					tbl_rotulo 
				WHERE 
					tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
					geo_barrios.cbarrio IN (".$cp.") and geo_nielssen.fecha_baja is null AND
					ST_Intersects(geo_barrios.geom, geo_nielssen.geom)			
				ORDER BY 
					sala_ventas DESC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeDescargableDistritos($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT 
					rotulo as ensena,  
					sala_ventas as superficie,
					direccion,
					numero,
					geo_nielssen.cp,
					provincia,
					municipio	
				FROM 
					geo_distritos, 
					geo_nielssen, 
					tbl_rotulo 
				WHERE 
					tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
					geo_distritos.cod_distri IN (".$cp.") and geo_nielssen.fecha_baja is null AND
					ST_Intersects(geo_distritos.geom, geo_nielssen.geom)			
				ORDER BY 
					sala_ventas DESC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeDescargableMunicipios($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT 
					rotulo as ensena,  
					sala_ventas as superficie,
					direccion,
					numero,
					geo_nielssen.cp,
					provincia,
					municipio	
				FROM 
					geo_mun, 
					geo_nielssen, 
					tbl_rotulo 
				WHERE 
					tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
					geo_mun.cod_mun IN (".$cp.") and geo_nielssen.fecha_baja is null AND
					ST_Intersects(geo_mun.geom, geo_nielssen.geom)			
				ORDER BY 
					sala_ventas DESC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>500,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	//------------------------------------------------------------------------------
	//------------------------------------------------------------------------------
	
	public function actionGetCompeZI($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT rotulo as ensena, count(*) as total, sum(sala_ventas)  as superficie
			FROM geo_zona_influencia, geo_nielssen , tbl_rotulo 
			WHERE tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
			ST_Intersects(geo_zona_influencia.geom, geo_nielssen.geom) AND 
			geo_zona_influencia.loc IN (".$cp.") and geo_nielssen.fecha_baja is null
			GROUP BY rotulo  
			ORDER BY sum(sala_ventas) DESC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>100,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeISO($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT rotulo as ensena, count(*) as total, sum(sala_ventas)  as superficie
			FROM geo_isopolygon, geo_nielssen , tbl_rotulo 
			WHERE tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
			ST_Intersects(geo_isopolygon.geom, geo_nielssen.geom) AND 
			geo_isopolygon.gid IN (".$id.") and geo_nielssen.fecha_baja is null
			GROUP BY rotulo  
			ORDER BY sum(sala_ventas) DESC";
			
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>array(
				'pageSize'=>100,
		)));
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeSupISO($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT descr as tipo, count(*) as total , sum(sala_ventas)  as superficie
				FROM geo_isopolygon, geo_nielssen , tbl_tipo_estab 
				WHERE tbl_tipo_estab.tipo = geo_nielssen.tipo AND
				ST_Intersects(geo_isopolygon.geom,  geo_nielssen.geom) AND 
				geo_isopolygon.gid IN (".$id.") and geo_nielssen.fecha_baja is null
				GROUP BY descr  
				ORDER BY descr ASC";
			
		$dataProvider=new CSqlDataProvider($sql);
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetCompeSupZI($cp){
		header('Content-Type: application/json');
		$compr = explode(",", $cp);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql = "SELECT descr as tipo, count(*) as total , sum(sala_ventas)  as superficie
				FROM geo_zona_influencia, geo_nielssen , tbl_tipo_estab 
				WHERE tbl_tipo_estab.tipo = geo_nielssen.tipo AND
				ST_Intersects(geo_zona_influencia.geom,  geo_nielssen.geom) AND 
				geo_zona_influencia.loc IN (".$cp.") and geo_nielssen.fecha_baja is null
				GROUP BY descr  
				ORDER BY descr ASC";
			
		$dataProvider=new CSqlDataProvider($sql);
		echo json_encode($dataProvider->getData());
	}
	
	public function actionGetInfoZC($id){
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql='';
		$dataProvider=new CSqlDataProvider($sql);
		$result = array();
		$total;
		$totalEx;
		$secciones = $dataProvider->getData();
		
		//foreach($secciones as $seccion){

			array_push($result,array('España', (float) $secciones[0]['total']));
			array_push($result,array('Africa', (float) $secciones[0]['africa']));
			array_push($result,array('America', (float) $secciones[0]['america']));
			array_push($result,array('Asia', (float) $secciones[0]['asia']));
			array_push($result,array('Europa', (float) $secciones[0]['europa']));
			array_push($result,array('Resto', (float) $secciones[0]['resto']));
			
			$total = (float)($secciones[0]['total']);
			$totalEx = (float)($secciones[0]['africa']+$secciones[0]['america']+$secciones[0]['asia']+$secciones[0]['europa']+$secciones[0]['resto']);
		//}
		
		echo json_encode(array(array(array("total", $total), array("extranjeros", $totalEx)),$result));// will return a list of arrays.
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

		if(isset($_POST['GeoCp']))
		{
			$model->attributes=$_POST['GeoCp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->gid));
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
		$dataProvider=new CActiveDataProvider('GeoCp');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GeoCp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GeoCp']))
			$model->attributes=$_GET['GeoCp'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionGetExtentZC($id){
		header('Content-Type: application/json');
		
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		
		$SQL = "SELECT 
			  (tbl_zc_consolidado.venta_si+
			  tbl_zc_consolidado.venta_no+
			  tbl_zc_consolidado.venta_ns)*100/c.total as cv ,
			 ST_X(ST_Centroid(geom)), ST_Y(ST_Centroid(geom))
			FROM 
			  public.tbl_zc_consolidado, (
				SELECT 
				  sum (tbl_zc_consolidado.venta_si+
				  tbl_zc_consolidado.venta_no+
				  tbl_zc_consolidado.venta_ns) as total
				FROM 
				  public.tbl_zc_consolidado
				WHERE cod_zipcode = ".$id."
				GROUP BY cod_zipcode
			  )as c, geo_cp 
			WHERE cod_zipcode = ".$id." AND geo_cp.cp = tbl_zc_consolidado.cp
			ORDER BY cv DESC";
		$dataProvider=new CSqlDataProvider($SQL, array(
			 'pagination'=>array(
				'pageSize'=>1,
			),
		));
		
		echo json_encode($dataProvider->getData());
	}
	
	/**
	 * Mapa de variables (cv_porc, caddy, pasos y folletos por CP)
	 */
	public function actionGeoZIPCode()
	{
		/*
		SELECT 
			geo_cp.cp, 
			geo_cp.geom,
			tbl_zipcode.cv_porc, 
			tbl_zipcode.caddy, 
			tbl_zipcode.pasos, 
			tbl_zipcode.folleto
		FROM 
			public.geo_cp, 
			public.tbl_zipcode, 
			public.tbl_id_encuesta_zc
		WHERE 
			geo_cp.cp = tbl_zipcode.cp AND
			tbl_zipcode.id_encuesta_zc = tbl_id_encuesta_zc.id_encuesta_zc AND
			tbl_zipcode.id_encuesta_zc = 2 AND -- Valor que corresponde a la campaña elegida por el usuario en la web (comboCampana)
			tbl_id_encuesta_zc.id_hiper_alcampo = 5; -- Valor que corresponde al hiper elegido por el usuario en la web (comboHiper)
		*/
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=GeoCp::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='geo-cp-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
