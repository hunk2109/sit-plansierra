<?php

class GeoSeccionesController extends Controller
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
									'info', 
									'infoZI', 
									'infoExtranjeros', 
									'infoExtranjerosISO', 
									'infoTablaCorta','infoTablaCortaSecciones','infoTablaCortaBarrios','infoTablaCortaDistritos','infoTablaCortaMunicipios','infoTablaCortaRadio','infoTablaCortaRadioMultiple',
									'infoTablaLarga','infoTablaLargaSecciones','infoTablaLargaBarrios','infoTablaLargaDistritos','infoTablaLargaMunicipios','infoTablaLargaRadio',
									'infoEntornoPoblacion','infoEntornoPoblacionSecciones','infoEntornoPoblacionBarrios','infoEntornoPoblacionDistritos','infoEntornoPoblacionMunicipios','infoEntornoPoblacionRadio',
									'infoEntornoHogares','infoEntornoHogaresSecciones','infoEntornoHogaresBarrios','infoEntornoHogaresDistritos','infoEntornoHogaresMunicipios','infoEntornoHogaresRadio',
									'infoTablaCortaHogares','infoTablaCortaHogaresSecciones','infoTablaCortaHogaresBarrios','infoTablaCortaHogaresDistritos','infoTablaCortaHogaresMunicipios','infoTablaCortaHogaresRadio',
									'infoEntornoHogaresICE','infoEntornoHogaresICESecciones','infoEntornoHogaresICEBarrios','infoEntornoHogaresICEDistritos','infoEntornoHogaresICEMunicipios','infoEntornoHogaresICERadio',
									'infoTablaCortaHogaresICE','infoTablaCortaHogaresICESecciones','infoTablaCortaHogaresICEBarrios','infoTablaCortaHogaresICEDistritos','infoTablaCortaHogaresICEMunicipios','infoTablaCortaHogaresICERadio','infoTablaCortaHogaresICERadioMultiple',
									'MapaHogaresDesviacionCP', 'mapaHogaresDesviacionSecciones','mapaHogaresDesviacionMunicipios','mapaHogaresDesviacionDistritos', 'mapaHogaresDesviacionBarrios','mapaHogaresDesviacionRadio',
									'MapaSeleccionCP', 'MapaSeleccionSecciones','MapaSeleccionMunicipios','MapaSeleccionDistritos', 'MapaSeleccionBarrios','MapaSeleccionRadio','MapaSeleccionRadioMultiple',
									'infoTablaIndicadoresCP','infoTablaIndicadoresSecciones','infoTablaIndicadoresMunicipios','infoTablaIndicadoresDistritos','infoTablaIndicadoresBarrios','infoTablaIndicadoresRadio', 'getPiramideBuffer', 'getSeccionesBuffer', 'getIsochrone'),
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
									'info', 
									'infoZI', 
									'infoExtranjeros', 
									'infoExtranjerosISO', 
									'infoTablaCorta','infoTablaCortaSecciones','infoTablaCortaBarrios','infoTablaCortaDistritos','infoTablaCortaMunicipios','infoTablaCortaRadio','infoTablaCortaRadioMultiple',
									'infoTablaLarga','infoTablaLargaSecciones','infoTablaLargaBarrios','infoTablaLargaDistritos','infoTablaLargaMunicipios','infoTablaLargaRadio',
									'infoEntornoPoblacion','infoEntornoPoblacionSecciones','infoEntornoPoblacionBarrios','infoEntornoPoblacionDistritos','infoEntornoPoblacionMunicipios','infoEntornoPoblacionRadio',
									'infoEntornoHogares','infoEntornoHogaresSecciones','infoEntornoHogaresBarrios','infoEntornoHogaresDistritos','infoEntornoHogaresMunicipios','infoEntornoHogaresRadio',
									'infoTablaCortaHogares','infoTablaCortaHogaresSecciones','infoTablaCortaHogaresBarrios','infoTablaCortaHogaresDistritos','infoTablaCortaHogaresMunicipios','infoTablaCortaHogaresRadio',
									'infoEntornoHogaresICE','infoEntornoHogaresICESecciones','infoEntornoHogaresICEBarrios','infoEntornoHogaresICEDistritos','infoEntornoHogaresICEMunicipios','infoEntornoHogaresICERadio',
									'infoTablaCortaHogaresICE','infoTablaCortaHogaresICESecciones','infoTablaCortaHogaresICEBarrios','infoTablaCortaHogaresICEDistritos','infoTablaCortaHogaresICEMunicipios','infoTablaCortaHogaresICERadio','infoTablaCortaHogaresICERadioMultiple',
									'MapaHogaresDesviacionCP', 'mapaHogaresDesviacionSecciones','mapaHogaresDesviacionMunicipios','mapaHogaresDesviacionDistritos', 'mapaHogaresDesviacionBarrios','mapaHogaresDesviacionRadio',
									'MapaSeleccionCP', 'MapaSeleccionSecciones','MapaSeleccionMunicipios','MapaSeleccionDistritos', 'MapaSeleccionBarrios','MapaSeleccionRadio','MapaSeleccionRadioMultiple',
									'infoTablaIndicadoresCP','infoTablaIndicadoresSecciones','infoTablaIndicadoresMunicipios','infoTablaIndicadoresDistritos','infoTablaIndicadoresBarrios','infoTablaIndicadoresRadio', 'getPiramideBuffer', 'getSeccionesBuffer', 'getIsochrone'),
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

	public function actionGetPiramideBuffer($x, $y, $buffer){
		header('Content-Type: application/json');
		$sql="SELECT 
		  SUM (geo_ine_secciones.x4_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x4_h, 
		  SUM (geo_ine_secciones.x9_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x9_h, 
		  SUM (geo_ine_secciones.x14_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x14_h, 
		  SUM (geo_ine_secciones.x19_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x19_h, 
		  SUM (geo_ine_secciones.x24_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x24_h, 
		  SUM (geo_ine_secciones.x29_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x29_h, 
		  SUM (geo_ine_secciones.x34_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x34_h, 
		  SUM (geo_ine_secciones.x39_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x39_h, 
		  SUM (geo_ine_secciones.x44_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x44_h, 
		  SUM (geo_ine_secciones.x49_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x49_h, 
		  SUM (geo_ine_secciones.x54_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x54_h, 
		  SUM (geo_ine_secciones.x59_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x59_h, 
		  SUM (geo_ine_secciones.x64_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x64_h, 
		  SUM (geo_ine_secciones.x69_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x69_h, 
		  SUM (geo_ine_secciones.x74_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x74_h, 
		  SUM (geo_ine_secciones.x79_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x79_h, 
		  SUM (geo_ine_secciones.x84_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x84_h, 
		  SUM (geo_ine_secciones.x89_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x89_h, 
		  SUM (geo_ine_secciones.x94_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x94_h, 
		  SUM (geo_ine_secciones.x99_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x99_h, 
		  SUM (geo_ine_secciones.x100_h* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x100_h, 
		  SUM (geo_ine_secciones.x4_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x4_m, 
		  SUM (geo_ine_secciones.x9_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x9_m, 
		  SUM (geo_ine_secciones.x14_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x14_m, 
		  SUM (geo_ine_secciones.x19_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x19_m, 
		  SUM (geo_ine_secciones.x24_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x24_m, 
		  SUM (geo_ine_secciones.x29_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x29_m, 
		  SUM (geo_ine_secciones.x34_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x34_m, 
		  SUM (geo_ine_secciones.x39_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x39_m, 
		  SUM (geo_ine_secciones.x44_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x44_m, 
		  SUM (geo_ine_secciones.x49_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x49_m, 
		  SUM (geo_ine_secciones.x54_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x54_m, 
		  SUM (geo_ine_secciones.x59_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x59_m, 
		  SUM (geo_ine_secciones.x64_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x64_m, 
		  SUM (geo_ine_secciones.x69_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x69_m, 
		  SUM (geo_ine_secciones.x74_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x74_m, 
		  SUM (geo_ine_secciones.x79_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x79_m, 
		  SUM (geo_ine_secciones.x84_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x84_m, 
		  SUM (geo_ine_secciones.x89_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x89_m, 
		  SUM (geo_ine_secciones.x94_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x94_m, 
		  SUM (geo_ine_secciones.x99_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x99_m, 
		  SUM (geo_ine_secciones.x100_m* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom))::int as x100_m
		FROM 
		  public.geo_ine_secciones
		  where st_intersects(geom, ST_Buffer(ST_SetSRID(ST_Point(".$x.",".$y."), 25830), ".$buffer."))

		";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$result = array();
		$secciones = $dataProvider->getData();
		echo json_encode($secciones);
	}
	public function actionGetSeccionesBuffer($x, $y, $buffer){
		header('Content-Type: application/json');
		$sql="SELECT 
		  total* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $x . ", " .$y. "),25830),".$buffer."), geo_ine_secciones.geom))/ST_Area(geom)::int as total, 
		  cusec
		FROM 
		  public.geo_ine_secciones
		  where st_intersects(geom, ST_Buffer(ST_SetSRID(ST_Point(".$x.",".$y."), 25830), ".$buffer."))
		";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$result = array();
		$secciones = $dataProvider->getData();
		echo json_encode($secciones);
	}
	public function actionGetIsochrone($x, $y, $tiempo){
		header('Content-Type: application/json');
		$conn = pg_pconnect("dbname=navteq user=web password=web port=5432 host=localhost");
		$query = "SELECT id
			FROM zaragoza_streets_vertices_pgr,
			  (select ST_SetSRID(ST_MakePoint(".$x.", ".$y."),25830) as poi) as poi
			WHERE ST_DWithin(poi, the_geom, 10000)
			ORDER BY ST_Distance(the_geom, poi)
			LIMIT 1;";
		$result=pg_query($conn, $query);
		$id = -1;
		while ($row = pg_fetch_array($result)) {
			 $id= $row[0];
		   }
		 
		$resultado = array();
		if ($id==-1)
			echo "error";
		
		$query = "SELECT ST_AsGeoJSON(ST_ConcaveHull(ST_Collect(zaragoza_streets.geom),0.7,false))
			FROM zaragoza_streets
			JOIN (SELECT * FROM pgr_drivingdistance('SELECT gid as id, source, target, time_f::float8 AS cost, time_t::float8 as reverse_cost from zaragoza_streets where source is not null', ".$id.", ".$tiempo."*60, false, false), zaragoza_streets where id2 = gid) 
			AS route 
			ON zaragoza_streets.source = route.id1";
		$result=pg_query($conn, $query);
		while ($row = pg_fetch_array($result)) {
			 $resultado= $row['st_asgeojson'];
		 }
		   
		/*$sql="SELECT 
		  sum(total* ST_Area(ST_Intersection(ST_SetSRID(ST_GeomFromGeoJSON ('" . $resultado."'),25830), geo_ine_secciones.geom))/ST_Area(geom))::int as total
		FROM 
		  public.geo_ine_secciones
		  where st_intersects(geom, ST_SetSRID(ST_GeomFromGeoJSON('".$resultado."'),25830))
		";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$result = array();
		$secciones = $dataProvider->getData();
		*/
		echo json_encode(array("pol"=>$resultado, "pob"=>0));
		//echo 
		
		
	}
	public function actionInfoExtranjeros($id){
		header('Content-Type: application/json');
		
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		
		$sql="SELECT a+b+c+d+e+f as total, africa,america, asia, europa, resto FROM(
				SELECT 
					sum(((pob_0005)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as a, 
					sum(((pob_0514)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as b,
					sum(((pob_1519)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as c,
					sum(((pob_2029)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as d,
					sum(((pob_2965)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as e,
					sum(((pob_6599)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as f,
					sum(((pobex_afric)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as africa,
					sum(((pobex_ameri)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as america,
					sum(((pobex_asiat)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as asia,
					sum(((pobex_europ)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as europa,
					sum(((pobex_resto)* ST_Area(ST_Intersection(geo_cp.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as resto
					FROM geo_cp, geo_secciones 
					WHERE geo_cp.geom && geo_secciones.geom AND 
					geo_cp.cp IN (" . $id . ")) as m";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
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
			$totalEx = (float)($secciones[0]['africa'] + $secciones[0]['america'] + $secciones[0]['asia'] + $secciones[0]['europa'] + $secciones[0]['resto']);
		//}
		
		echo json_encode(array(array(array("total", $total), array("extranjeros", $totalEx)),$result));// will return a list of arrays.
	}
	
	public function actionInfoExtranjerosISO($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT a+b+c+d+e+f as total, africa,america, asia, europa, resto FROM(
				SELECT 
					sum(((pob_0005)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as a, 
					sum(((pob_0514)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as b,
					sum(((pob_1519)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as c,
					sum(((pob_2029)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as d,
					sum(((pob_2965)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as e,
					sum(((pob_6599)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as f,
					sum(((pobex_afric)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as africa,
					sum(((pobex_ameri)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as america,
					sum(((pobex_asiat)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as asia,
					sum(((pobex_europ)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as europa,
					sum(((pobex_resto)* ST_Area(ST_Intersection(geo_isopolygon.geom, geo_secciones.geom)))/ST_Area(geo_secciones.geom)) as resto
					FROM geo_isopolygon, geo_secciones 
					WHERE ST_Intersects(geo_isopolygon.geom, geo_secciones.geom) AND 
					geo_isopolygon.gid IN (" . $id . ")) as m";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
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
			$totalEx = (float)($secciones[0]['africa'] + $secciones[0]['america'] + $secciones[0]['asia'] + $secciones[0]['europa'] + $secciones[0]['resto']);
		//}
		
		echo json_encode(array(array(array("total", $total), array("extranjeros", $totalEx)),$result));// will return a list of arrays.
	}
	
	
	public function actionInfo($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"5-14\",
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"15-19 \",
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \">65\"
			FROM 
				geo_cp, 
				geo_ine_secciones 
			WHERE 
				geo_cp.geom && geo_ine_secciones.geom AND 
				geo_cp.cp IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		echo json_encode($dataProvider->getData());// will return a list of arrays.
	}
	
	
	public function actionInfoZI($id){
		header('Content-Type: application/json');
		
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT ST_Area(ST_Intersection(geo_zona_influencia.geom, geo_secciones.geom))/ST_Area(geo_secciones.geom) as porc, geo_secciones.id 
			FROM geo_zona_influencia, geo_secciones 
			WHERE ST_Intersects(geo_zona_influencia.geom, geo_secciones.geom) AND 
			geo_zona_influencia.loc IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$porc = $dataProvider->getData();
		$porcentaje = array();
		foreach($porc as $p){
			$porcentaje[$p['id']] = (float)$p['porc'];
		}
		
		$sql="SELECT geo_secciones.* 
			FROM geo_zona_influencia, geo_secciones 
			WHERE ST_Intersects(geo_zona_influencia.geom, geo_secciones.geom) AND 
			geo_zona_influencia.loc IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;
		$pob_afr = 0;
		$pob_asia = 0;
		$pob_amer = 0;
		$pob_eur = 0;
		$pob_resto = 0;
		foreach($pob as $p){
			$id = (string)$p['id'];
			$pob_0005 += $p['pob_0005']*$porcentaje[$id];
			$pob_0514 += $p['pob_0514']*$porcentaje[$id];
			$pob_1519 += $p['pob_1519']*$porcentaje[$id];
			$pob_2029 += $p['pob_2029']*$porcentaje[$id];
			$pob_2965 += $p['pob_2965']*$porcentaje[$id];
			$pob_6599 += $p['pob_6599']*$porcentaje[$id];
			$pob_afr += $p['pobex_afric']*$porcentaje[$id];
			$pob_asia += $p['pobex_asiat']*$porcentaje[$id];
			$pob_amer += $p['pobex_ameri']*$porcentaje[$id];
			$pob_eur += $p['pobex_europ']*$porcentaje[$id];
			$pob_resto += $p['pobex_resto']*$porcentaje[$id];
		}
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		$ext = $pob_afr + $pob_asia + $pob_amer + $pob_eur + $pob_resto;
		
		$poblacion = array(array("0-4" => $pob_0005, "5-14" => $pob_0514, "15-19" => $pob_1519, "20-29" => $pob_2029, "30-65" => $pob_2965, ">65" => $pob_6599 ));
		$extranjeros = array(array( array("total", $total), array("extranjeros", $ext)), array(array("España", $total), array("África", $pob_afr), array("América", $pob_amer), array("Asia", $pob_asia), array("Europa", $pob_eur), array("Resto", $pob_resto)));
		echo json_encode(array("poblacion" => $poblacion, "extranjeros" => $extranjeros));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//ENTORNO: Funciones CP 
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function actionInfoEntornoPoblacion($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
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
				geo_cp.cp IN (" . $id . ")";
		
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
		
		$sqlPorcentaje="SELECT  
				sum(((x4_h + x4_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"5-14\",
				sum(((x19_h + x19_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"15-19 \",
				sum(((x24_h + x24_m + x29_h + x29_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \">65\"
			FROM 
				geo_cp, 
				geo_ine_secciones
			WHERE 
				geo_cp.geom && geo_ine_secciones.geom AND 
				geo_cp.cp IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) * 100 / total as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) * 100 / total as pob_0514,
						(x19_h + x19_m) * 100 / total as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) * 100 / total as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * 100 / total as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * 100 / total as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	public function actionInfoTablaCorta($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		
		$result = array();
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0514'] = $pob_0514;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2029'] = $pob_2029;
		$salida['pob_2965'] = $pob_2965;
		$salida['pob_6599'] = $pob_6599;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0514_porcentaje'] = $pob_0514*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2029_porcentaje'] = $pob_2029*100/$total;
		$salida['pob_2965_porcentaje'] = $pob_2965*100/$total;
		$salida['pob_6599_porcentaje'] = $pob_6599*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0514_espana += $pe['pob_0514'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2029_espana += $pe['pob_2029'];
			$pob_2965_espana += $pe['pob_2965'];
			$pob_6599_espana += $pe['pob_6599'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0514_porcentaje_espana'] = $pob_0514_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2029_porcentaje_espana'] = $pob_2029_espana*100/$total_espana;
		$salida['pob_2965_porcentaje_espana'] = $pob_2965_espana*100/$total_espana;
		$salida['pob_6599_porcentaje_espana'] = $pob_6599_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionInfoTablaLarga($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0609,				
				sum(((x14_h + x14_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2024,
				sum(((x29_h + x29_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2529,
				sum(((x34_h + x34_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3034,
				sum(((x39_h + x39_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3539,
				sum(((x44_h + x44_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4044,
				sum(((x49_h + x49_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4549,
				sum(((x54_h + x54_m + x59_h + x59_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_5059,
				sum(((x64_h + x64_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6064,
				sum(((x69_h + x69_m + x74_h + x74_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6575,				
				sum(((x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_75
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
		
		$result = array();
		$pob_0005 = 0;
		$pob_0609 = 0;
		$pob_1014 = 0;
		$pob_1519 = 0;
		$pob_2024 = 0;
		$pob_2529 = 0;
		$pob_3034 = 0;
		$pob_3539 = 0;
		$pob_4044 = 0;
		$pob_4549 = 0;
		$pob_5059 = 0;
		$pob_6064 = 0;
		$pob_6575 = 0;
		$pob_75 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0609 += $p['pob_0609'];
			$pob_1014 += $p['pob_1014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2024 += $p['pob_2024'];
			$pob_2529 += $p['pob_2529'];			
			$pob_3034 += $p['pob_3034'];
			$pob_3539 += $p['pob_3539'];
			$pob_4044 += $p['pob_4044'];
			$pob_4549 += $p['pob_4549'];
			$pob_5059 += $p['pob_5059'];
			$pob_6064 += $p['pob_6064'];
			$pob_6575 += $p['pob_6575'];
			$pob_75 += $p['pob_75'];
		}
		$total = $pob_0005 + $pob_0609 + $pob_1014 + $pob_1519 + $pob_2024 + $pob_2529 + $pob_3034 + $pob_3539 + $pob_4044 + $pob_4549 + $pob_5059 + $pob_6064 + $pob_6575 + $pob_75;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0609'] = $pob_0609;
		$salida['pob_1014'] = $pob_1014;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2024'] = $pob_2024;
		$salida['pob_2529'] = $pob_2529;
		$salida['pob_3034'] = $pob_3034;
		$salida['pob_3539'] = $pob_3539;
		$salida['pob_4044'] = $pob_4044;
		$salida['pob_4549'] = $pob_4549;
		$salida['pob_5059'] = $pob_5059;
		$salida['pob_6064'] = $pob_6064;
		$salida['pob_6575'] = $pob_6575;
		$salida['pob_75'] = $pob_75;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0609_porcentaje'] = $pob_0609*100/$total;
		$salida['pob_1014_porcentaje'] = $pob_1014*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2024_porcentaje'] = $pob_2024*100/$total;
		$salida['pob_2529_porcentaje'] = $pob_2529*100/$total;
		$salida['pob_3034_porcentaje'] = $pob_3034*100/$total;
		$salida['pob_3539_porcentaje'] = $pob_3539*100/$total;
		$salida['pob_4044_porcentaje'] = $pob_4044*100/$total;
		$salida['pob_4549_porcentaje'] = $pob_4549*100/$total;
		$salida['pob_5059_porcentaje'] = $pob_5059*100/$total;
		$salida['pob_6064_porcentaje'] = $pob_6064*100/$total;
		$salida['pob_6575_porcentaje'] = $pob_6575*100/$total;
		$salida['pob_75_porcentaje'] = $pob_75*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m) as pob_0609,				
						(x14_h + x14_m) as pob_1014,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m) as pob_2024,
						(x29_h + x29_m) as pob_2529,
						(x34_h + x34_m) as pob_3034,
						(x39_h + x39_m) as pob_3539,
						(x44_h + x44_m) as pob_4044,
						(x49_h + x49_m) as pob_4549,
						(x54_h + x54_m + x59_h + x59_m) as pob_5059,
						(x64_h + x64_m) as pob_6064,
						(x69_h + x69_m + x74_h + x74_m) as pob_6575,				
						(x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_75
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0609_espana = 0;
		$pob_1014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2024_espana = 0;
		$pob_2529_espana = 0;
		$pob_3034_espana = 0;
		$pob_3539_espana = 0;
		$pob_4044_espana = 0;
		$pob_4549_espana = 0;
		$pob_5059_espana = 0;
		$pob_6064_espana = 0;
		$pob_6575_espana = 0;
		$pob_75_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0609_espana += $pe['pob_0609'];
			$pob_1014_espana += $pe['pob_1014'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2024_espana += $pe['pob_2024'];
			$pob_2529_espana += $pe['pob_2529'];			
			$pob_3034_espana += $pe['pob_3034'];
			$pob_3539_espana += $pe['pob_3539'];
			$pob_4044_espana += $pe['pob_4044'];
			$pob_4549_espana += $pe['pob_4549'];
			$pob_5059_espana += $pe['pob_5059'];
			$pob_6064_espana += $pe['pob_6064'];
			$pob_6575_espana += $pe['pob_6575'];
			$pob_75_espana += $pe['pob_75'];
		}
		$total_espana = $pob_0005_espana + $pob_0609_espana + $pob_1014_espana + $pob_1519_espana + $pob_2024_espana + $pob_2529_espana + $pob_3034_espana + $pob_3539_espana + $pob_4044_espana + $pob_4549_espana + $pob_5059_espana + $pob_6064_espana + $pob_6575_espana + $pob_75_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0609_porcentaje_espana'] = $pob_0609_espana*100/$total_espana;
		$salida['pob_1014_porcentaje_espana'] = $pob_1014_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2024_porcentaje_espana'] = $pob_2024_espana*100/$total_espana;
		$salida['pob_2529_porcentaje_espana'] = $pob_2529_espana*100/$total_espana;
		$salida['pob_3034_porcentaje_espana'] = $pob_3034_espana*100/$total_espana;
		$salida['pob_3539_porcentaje_espana'] = $pob_3539_espana*100/$total_espana;
		$salida['pob_4044_porcentaje_espana'] = $pob_4044_espana*100/$total_espana;
		$salida['pob_4549_porcentaje_espana'] = $pob_4549_espana*100/$total_espana;
		$salida['pob_5059_porcentaje_espana'] = $pob_5059_espana*100/$total_espana;
		$salida['pob_6064_porcentaje_espana'] = $pob_6064_espana*100/$total_espana;
		$salida['pob_6575_porcentaje_espana'] = $pob_6575_espana*100/$total_espana;
		$salida['pob_75_porcentaje_espana'] = $pob_75_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogares($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"2\",
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"3\",
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"4\",
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \">4\"
			FROM 
				geo_cp, 
				geo_sec_hogares_censo 
			WHERE 
				geo_cp.geom && geo_sec_hogares_censo.geom AND 
				geo_cp.cp IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['1'];
			$hogares2 += $p['2'];
			$hogares3 += $p['3'];
			$hogares4 += $p['4'];
			$hogares5 += $p['>4'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$sqlPorcentaje="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"2\", 
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"3\", 
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"4\", 
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \">4\"
			FROM 
				geo_cp, 
				geo_sec_hogares_censo 
			WHERE 
				geo_cp.geom && geo_sec_hogares_censo.geom AND 
				geo_cp.cp IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT
						sum(est_hogares1) * 100 / sum(est_hogares_total) as hogares1, 
						sum(est_hogares2) * 100 / sum(est_hogares_total) as hogares2,
						sum(est_hogares3) * 100 / sum(est_hogares_total) as hogares3,
						sum(est_hogares4) * 100 / sum(est_hogares_total) as hogares4,
						sum(est_hogares5) * 100 / sum(est_hogares_total) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogares($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares1, 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares2,
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares3,
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares4,
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares5
			FROM 
				geo_cp, 
				geo_sec_hogares_censo 
			WHERE 
				geo_cp.geom && geo_sec_hogares_censo.geom AND 
				geo_cp.cp IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT  
						sum(est_hogares1) as hogares1, 
						sum(est_hogares2) as hogares2,
						sum(est_hogares3) as hogares3,
						sum(est_hogares4) as hogares4,
						sum(est_hogares5) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresICE($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Bajo\", 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Bajo\"
				FROM 
					geo_cp, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					geo_cp.geom && geo_sec_hogares_censo.geom AND 
					geo_cp.cp IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio\"
				FROM 
					geo_cp, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					geo_cp.geom && geo_sec_hogares_censo.geom AND 
					geo_cp.cp IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Alto\"
				FROM 
					geo_cp, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					geo_cp.geom && geo_sec_hogares_censo.geom AND 
					geo_cp.cp IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Alto\"
				FROM 
					geo_cp, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					geo_cp.geom && geo_sec_hogares_censo.geom AND 
					geo_cp.cp IN (" . $id . "))
			FROM 
				geo_cp, 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				geo_cp.geom && geo_sec_hogares_censo.geom AND 
				geo_cp.cp IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['Bajo'];
			$hogares2 += $p['Medio-Bajo'];
			$hogares3 += $p['Medio'];
			$hogares4 += $p['Medio-Alto'];
			$hogares5 += $p['Alto'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;		
		
		$sqlPorcentaje="SELECT  
							COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Bajo\", 
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Bajo\"
							FROM 
								geo_cp, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
								geo_cp.geom && geo_sec_hogares_censo.geom AND 
								geo_cp.cp IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio\"
							FROM 
								geo_cp, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
								geo_cp.geom && geo_sec_hogares_censo.geom AND 
								geo_cp.cp IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Alto\"
							FROM 
								geo_cp, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
								geo_cp.geom && geo_sec_hogares_censo.geom AND 
								geo_cp.cp IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Alto\"
							FROM 
								geo_cp, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro > 39800 AND
								geo_cp.geom && geo_sec_hogares_censo.geom AND 
								geo_cp.cp IN (" . $id . "))
						FROM 
							geo_cp, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						WHERE 
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
							estimacion_ice_euro < 13300 AND
							geo_cp.geom && geo_sec_hogares_censo.geom AND 
							geo_cp.cp IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
				
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";					
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						geo_cp, 
						geo_sec_hogares_censo,
						tbl_hogares_arvato
					WHERE 
						tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
						geo_cp.geom && geo_sec_hogares_censo.geom AND 
						geo_cp.cp IN (" . $id . ")";				
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							geo_cp, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						where
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
							ST_Intersects(geo_cp.geom, ST_Centroid(geo_sec_hogares_censo.geom)) AND
							geo_cp.cp IN (" . $id . ")
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData(),(int)$estimacionBase));// will return a list of arrays.		
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogaresICE($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$sql="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares1, 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares2
				FROM 
					geo_cp, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					geo_cp.geom && geo_sec_hogares_censo.geom AND 
					geo_cp.cp IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares3
				FROM 
					geo_cp, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					geo_cp.geom && geo_sec_hogares_censo.geom AND 
					geo_cp.cp IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares4
				FROM 
					geo_cp, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					geo_cp.geom && geo_sec_hogares_censo.geom AND 
					geo_cp.cp IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_cp.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares5
				FROM 
					geo_cp, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					geo_cp.geom && geo_sec_hogares_censo.geom AND 
					geo_cp.cp IN (" . $cp . "))
			FROM 
				geo_cp, 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				geo_cp.geom && geo_sec_hogares_censo.geom AND 
				geo_cp.cp IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionMapaHogaresDesviacionCP($cp){
		
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
		$lyr = $map->getLayerByName("desviacionRentaCP");
		
		$lyr->data = "geom FROM (SELECT 	
									round(desviacion_ice_respecto_nacional) as desviacion_ice_respecto_nacional,
									tbl_hogares_arvato.cod_secc as cod_secc, 
									geo_sec_hogares_censo.geom as geom,	
									geo_sec_hogares_censo.gid as gid
								FROM 
									public.geo_sec_hogares_censo,
									public.tbl_hogares_arvato, 
									public.geo_cp
								WHERE 
									geo_cp.cp IN (" . $cp . ") AND
									tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
									ST_Intersects(geo_cp.geom , geo_sec_hogares_censo.geom)
								group by 
									tbl_hogares_arvato.cod_secc, 
									geo_sec_hogares_censo.geom,
									geo_sec_hogares_censo.gid,
									desviacion_ice_respecto_nacional)
		as subquery USING UNIQUE cod_secc USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionMapaSeleccionCP($cp){
		
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
		$lyr = $map->getLayerByName("mapaSeleccionCP");
		
		$lyr->data = "geom FROM (SELECT 
									geo_cp.cp, 
									geo_cp.geom, 
									gid
								FROM 
									public.geo_cp 
								WHERE  
									geo_cp.cp IN (" . $cp . "))
		as subquery USING UNIQUE cp USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionInfoTablaIndicadoresCP($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// ICE Base
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						geo_cp, 
						geo_sec_hogares_censo,
						tbl_hogares_arvato
					WHERE 
						tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
						geo_cp.geom && geo_sec_hogares_censo.geom AND 
						geo_cp.cp IN (" . $id . ")";				
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							geo_cp, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						where
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
							ST_Intersects(geo_cp.geom, ST_Centroid(geo_sec_hogares_censo.geom)) AND
							geo_cp.cp IN (" . $cp . ")
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;		
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de envejecimiento y tasa de dependencia
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1565,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		$pob_0014 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_1565 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_0014 += $p['pob_0014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_1565 += $p['pob_1565'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}						
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005_espana, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514_espana,
						(x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) as pob_0014_espana,
						(x19_h + x19_m) as pob_1519_espana,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029_espana,
						(x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_1565_espana,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965_espana,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599_espana
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_0014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_1565_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005_espana'];
			$pob_0514_espana += $pe['pob_0514_espana'];
			$pob_0014_espana += $pe['pob_0014_espana'];
			$pob_1519_espana += $pe['pob_1519_espana'];
			$pob_2029_espana += $pe['pob_2029_espana'];
			$pob_1565_espana += $pe['pob_1565_espana'];
			$pob_2965_espana += $pe['pob_2965_espana'];
			$pob_6599_espana += $pe['pob_6599_espana'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Población vinculada no residente municipio
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sqlPobVinculada="SELECT
						sum(pobl_vincu) as pobl_vincu
					FROM 
						geo_cp, 
						geo_mun,
						tbl_pobl_vinculada
					WHERE 
						tbl_pobl_vinculada.cod_mun = geo_mun.cod_mun AND
						geo_cp.geom && geo_mun.geom AND 
						st_within(st_centroid(geo_cp.geom), geo_mun.geom) AND						
						geo_cp.cp IN (" . $cp . ")";				
		
		$dataProviderPobVinculada=new CSqlDataProvider($sqlPobVinculada, array(
			'pagination'=>false
		));
		
		$pobVinculada = $dataProviderPobVinculada->getData();
		
		$cifraPobVinculada = 0;		
		foreach($pobVinculada as $a){
			$cifraPobVinculada += $a['pobl_vincu'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Nivel de estudios y accesibilidad
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		//AVG(((accesibilidad)* ST_Area(ST_Intersection(geo_cp.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as accesibilidad, 
		$sqlAccesibilidadEstudios="SELECT  
										AVG(accesibilidad) as accesibilidad,
										AVG(nivel_estudios) as nivel_estudios,
										sum(total) as total
									FROM 
										geo_cp, 
										geo_ine_secciones 
									WHERE 
										ST_Intersects(geo_cp.geom , geo_ine_secciones.geom) AND
										geo_cp.geom && geo_ine_secciones.geom AND 
										geo_cp.cp IN (" . $cp . ")";
		
		$dataProviderAccesibilidadEstudios=new CSqlDataProvider($sqlAccesibilidadEstudios, array(
			'pagination'=>false
		));
		$AccesibilidadEstudios = $dataProviderAccesibilidadEstudios->getData();
				
		$accesibilidad = 0;
		$nivel_estudios = 0;
		$totalPoblacion = 0;

		foreach($AccesibilidadEstudios as $p){
			$accesibilidad += $p['accesibilidad'];
			$nivel_estudios += $p['nivel_estudios'];
			$totalPoblacion += $p['total'];
		}
		//Nacional
		$sqlAccesibilidadEstudiosNacional="SELECT  
												(SELECT AVG(accesibilidad) as accesibilidad FROM tbl_ine_espana),
												AVG(nivel_estudios) as nivel_estudios,
												sum(total) as total
											FROM 
												geo_ine_secciones";
		
		$dataProviderAccesibilidadEstudiosNacional=new CSqlDataProvider($sqlAccesibilidadEstudiosNacional, array(
			'pagination'=>false
		));
		$AccesibilidadEstudiosNacional = $dataProviderAccesibilidadEstudiosNacional->getData();
				
		$accesibilidadNacional = 0;
		$nivel_estudiosNacional = 0;
		$totalPoblacionNacional = 0;

		foreach($AccesibilidadEstudiosNacional as $p){
			$accesibilidadNacional += $p['accesibilidad'];
			$nivel_estudiosNacional += $p['nivel_estudios'];
			$totalPoblacionNacional += $p['total'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de Desempleo SEPE
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sqlDesempleo="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa					
					FROM 
						geo_cp, 
						geo_mun,
						tbl_desempleo
					WHERE 
						tbl_desempleo.municipio = geo_mun.cod_mun AND
						geo_cp.geom && geo_mun.geom AND 
						st_within(st_centroid(geo_cp.geom), geo_mun.geom) AND						
						geo_cp.cp IN (" . $cp . ")";				
		
		$dataProviderDesempleo=new CSqlDataProvider($sqlDesempleo, array(
			'pagination'=>false
		));
		
		$desempleo = $dataProviderDesempleo->getData();
		
		$cifraDesempleo = 0;
		$pob_activa = 0;
		foreach($desempleo as $a){
			$cifraDesempleo += $a['tasa_desempleo'];
			$pob_activa += $a['pob_activa'];
		}
		//Nacional
		$sqlDesempleoNacional="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa
					FROM 
						tbl_desempleo";				
		
		$dataProviderDesempleoNacional=new CSqlDataProvider($sqlDesempleoNacional, array(
			'pagination'=>false
		));
		
		$desempleoNacional = $dataProviderDesempleoNacional->getData();
		
		$cifraDesempleoNacional = 0;	
		foreach($desempleoNacional as $a){
			$cifraDesempleoNacional += $a['tasa_desempleo'];
		}		
		
		//-------------------------------------------------------------------------------------------------------------------
		//Datos a mostrar en la vista.
		//-------------------------------------------------------------------------------------------------------------------
		
		//Índice de envejecimiento
		//Población
		$totalPoblacionEnvejecimiento = $pob_6599;
		$salida['totalPoblacionEnvejecimiento'] = $totalPoblacionEnvejecimiento;
		//Selección
		//$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) / ($pob_6599_espana / $pob_0014_espana) * 100;
		$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) * 100;
		$salida['porcentajeEnvejecimientoSeleccion'] = $porcentajeEnvejecimientoSeleccion;
		//Nacional
		$porcentajeEnvejecimientoNacional = ($pob_6599_espana / $pob_0014_espana) * 100;
		$salida['porcentajeEnvejecimientoNacional'] = $porcentajeEnvejecimientoNacional;
		//Gráfico
		$salida['porcentajeEnvejecimientoSeleccionGrafico'] = ($porcentajeEnvejecimientoSeleccion / $porcentajeEnvejecimientoNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de dependencia
		//Población
		$totalPoblacionDependencia = $pob_0014 + $pob_6599;
		$salida['totalPoblacionDependencia'] = $totalPoblacionDependencia;
		//Selección
		//$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) / (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) * 100;
		$salida['porcentajeDependenciaSeleccion'] = $porcentajeDependenciaSeleccion;
		//Nacional
		$porcentajeDependenciaNacional = (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$salida['porcentajeDependenciaNacional'] = $porcentajeDependenciaNacional;
		//Gráfico
		$salida['porcentajeDependenciaSeleccionGrafico'] = ($porcentajeDependenciaSeleccion / $porcentajeDependenciaNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de infancia
		//Población
		$totalPoblacionInfancia = (int)$pob_0014;
		$salida['totalPoblacionInfancia'] = $totalPoblacionInfancia;
		//Selección
		$porcentajeInfanciaSeleccion = ($pob_0014 / $total) * 100;
		$salida['porcentajeInfanciaSeleccion'] = $porcentajeInfanciaSeleccion;
		//Nacional
		$porcentajeInfanciaNacional = ($pob_0014_espana / $total_espana) * 100;
		$salida['porcentajeInfanciaNacional'] = $porcentajeInfanciaNacional;
		//Gráfico
		$salida['porcentajeInfanciaSeleccionGrafico'] = ($porcentajeInfanciaSeleccion / $porcentajeInfanciaNacional) *100;
		
		//------------------------------------------------------
		
		//Tasa de vejez
		//Población
		$totalPoblacionVejez = (int)$pob_6599;
		$salida['totalPoblacionVejez'] = $totalPoblacionVejez;
		//Selección
		$porcentajeVejezSeleccion = ($pob_6599 / $total) * 100;
		$salida['porcentajeVejezSeleccion'] = $porcentajeVejezSeleccion;
		//Nacional
		$porcentajeVejezNacional = ($pob_6599_espana / $total_espana) * 100;
		$salida['porcentajeVejezNacional'] = $porcentajeVejezNacional;
		//Gráfico
		$salida['porcentajeVejezSeleccionGrafico'] = ($porcentajeVejezSeleccion / $porcentajeVejezNacional) * 100;
		
		//------------------------------------------------------
		
		//ICE
		$salida['ICE'] = (int)$estimacionBase;		
		
		//------------------------------------------------------
		
		//Población vinculada no residente municipio
		$salida['pobVinculada'] = (int)$cifraPobVinculada;
		
		//------------------------------------------------------
		
		//Accesibilidad y nivel de estudios
		//Población
		$salida['totalPoblacion'] = (int)$totalPoblacion;
		//Selección
		$salida['accesibilidad'] = $accesibilidad;		
		$salida['nivel_estudios'] = $nivel_estudios;
		//Nacional		
		$salida['accesibilidadNacional'] = $accesibilidadNacional;		
		$salida['nivel_estudiosNacional'] = $nivel_estudiosNacional;
		//Gráfico
		$salida['accesibilidadSeleccionGrafico'] = ($accesibilidad / $accesibilidadNacional) * 100;
		$salida['nivel_estudiosSeleccionGrafico'] = ($nivel_estudios / $nivel_estudiosNacional) * 100;		
		
		//------------------------------------------------------
		
		//Índice de Desempleo SEPE
		$salida['cifraDesempleo'] = $cifraDesempleo;
		//Nacional
		$salida['cifraDesempleoNacional'] = $cifraDesempleoNacional;
		//Gráfico
		$salida['cifraDesempleoPorcentaje'] = ($cifraDesempleo / $cifraDesempleoNacional) * 100;		
		$salida['pob_activa'] = (int)$pob_activa;
		//------------------------------------------------------
		
		echo json_encode($salida);
	}
	
	//Pepe
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//ENTORNO: Funciones Radio
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function actionInfoEntornoPoblacionRadio($coordenadasRadio, $radio){
		header('Content-Type: application/json');
		$compr = explode(",", $coordenadasRadio);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				sum(((x4_h + x4_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"5-14\",
				sum(((x19_h + x19_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"15-19\",
				sum(((x24_h + x24_m + x29_h + x29_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as \">65\"
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
		
		$sqlPorcentaje="SELECT  
				sum(((x4_h + x4_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"5-14\",
				sum(((x19_h + x19_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"15-19 \",
				sum(((x24_h + x24_m + x29_h + x29_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \">65\"
			FROM 				
				geo_ine_secciones
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) * 100 / total as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) * 100 / total as pob_0514,
						(x19_h + x19_m) * 100 / total as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) * 100 / total as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * 100 / total as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * 100 / total as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}	
	
	public function actionInfoTablaCortaRadioMultiple($coordenadasRadio){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $coordenadasRadio);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$result = array();
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
			
		$sql250="SELECT  
				sum(((total)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005
			FROM 
				geo_ine_secciones 
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_ine_secciones.geom)";
		
		$dataProvider250=new CSqlDataProvider($sql250, array(
			'pagination'=>false
		));
		$pob250 = $dataProvider250->getData();		

		foreach($pob250 as $p){
			$pob_0005 += $p['pob_0005'];
		}		
		$salida['pob_0005'] = $pob_0005;		
		
		//
		
		$sql500="SELECT  				
				sum(((total) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514				
			FROM 
				geo_ine_secciones 
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_ine_secciones.geom)";
		
		$dataProvider500=new CSqlDataProvider($sql500, array(
			'pagination'=>false
		));
		$pob500 = $dataProvider500->getData();		

		foreach($pob500 as $c){			
			$pob_0514 += $c['pob_0514'];			
		}				
		$salida['pob_0514'] = $pob_0514;		
		
		//
		
		$sql1000="SELECT  
				sum(((total)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519				
			FROM 
				geo_ine_secciones 
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_ine_secciones.geom)";
		
		$dataProvider1000=new CSqlDataProvider($sql1000, array(
			'pagination'=>false
		));
		$pob1000 = $dataProvider1000->getData();		

		foreach($pob1000 as $h){
			$pob_1519 += $h['pob_1519'];			
		}
		$salida['pob_1519'] = $pob_1519;
		
		/*
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0514_porcentaje'] = $pob_0514*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;		
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0514_espana += $pe['pob_0514'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2029_espana += $pe['pob_2029'];
			$pob_2965_espana += $pe['pob_2965'];
			$pob_6599_espana += $pe['pob_6599'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0514_porcentaje_espana'] = $pob_0514_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2029_porcentaje_espana'] = $pob_2029_espana*100/$total_espana;
		$salida['pob_2965_porcentaje_espana'] = $pob_2965_espana*100/$total_espana;
		$salida['pob_6599_porcentaje_espana'] = $pob_6599_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;*/
		
		echo json_encode($salida);
	}
	
	public function actionInfoTablaCortaRadio($coordenadasRadio, $radio){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $coordenadasRadio);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
			FROM 
				geo_ine_secciones 
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0514'] = $pob_0514;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2029'] = $pob_2029;
		$salida['pob_2965'] = $pob_2965;
		$salida['pob_6599'] = $pob_6599;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0514_porcentaje'] = $pob_0514*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2029_porcentaje'] = $pob_2029*100/$total;
		$salida['pob_2965_porcentaje'] = $pob_2965*100/$total;
		$salida['pob_6599_porcentaje'] = $pob_6599*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0514_espana += $pe['pob_0514'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2029_espana += $pe['pob_2029'];
			$pob_2965_espana += $pe['pob_2965'];
			$pob_6599_espana += $pe['pob_6599'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0514_porcentaje_espana'] = $pob_0514_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2029_porcentaje_espana'] = $pob_2029_espana*100/$total_espana;
		$salida['pob_2965_porcentaje_espana'] = $pob_2965_espana*100/$total_espana;
		$salida['pob_6599_porcentaje_espana'] = $pob_6599_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionInfoTablaLargaRadio($coordenadasRadio, $radio){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $coordenadasRadio);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0609,				
				sum(((x14_h + x14_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2024,
				sum(((x29_h + x29_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2529,
				sum(((x34_h + x34_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3034,
				sum(((x39_h + x39_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3539,
				sum(((x44_h + x44_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4044,
				sum(((x49_h + x49_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4549,
				sum(((x54_h + x54_m + x59_h + x59_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_5059,
				sum(((x64_h + x64_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6064,
				sum(((x69_h + x69_m + x74_h + x74_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6575,				
				sum(((x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_75
			FROM 				
				geo_ine_secciones 
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$pob_0005 = 0;
		$pob_0609 = 0;
		$pob_1014 = 0;
		$pob_1519 = 0;
		$pob_2024 = 0;
		$pob_2529 = 0;
		$pob_3034 = 0;
		$pob_3539 = 0;
		$pob_4044 = 0;
		$pob_4549 = 0;
		$pob_5059 = 0;
		$pob_6064 = 0;
		$pob_6575 = 0;
		$pob_75 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0609 += $p['pob_0609'];
			$pob_1014 += $p['pob_1014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2024 += $p['pob_2024'];
			$pob_2529 += $p['pob_2529'];			
			$pob_3034 += $p['pob_3034'];
			$pob_3539 += $p['pob_3539'];
			$pob_4044 += $p['pob_4044'];
			$pob_4549 += $p['pob_4549'];
			$pob_5059 += $p['pob_5059'];
			$pob_6064 += $p['pob_6064'];
			$pob_6575 += $p['pob_6575'];
			$pob_75 += $p['pob_75'];
		}
		$total = $pob_0005 + $pob_0609 + $pob_1014 + $pob_1519 + $pob_2024 + $pob_2529 + $pob_3034 + $pob_3539 + $pob_4044 + $pob_4549 + $pob_5059 + $pob_6064 + $pob_6575 + $pob_75;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0609'] = $pob_0609;
		$salida['pob_1014'] = $pob_1014;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2024'] = $pob_2024;
		$salida['pob_2529'] = $pob_2529;
		$salida['pob_3034'] = $pob_3034;
		$salida['pob_3539'] = $pob_3539;
		$salida['pob_4044'] = $pob_4044;
		$salida['pob_4549'] = $pob_4549;
		$salida['pob_5059'] = $pob_5059;
		$salida['pob_6064'] = $pob_6064;
		$salida['pob_6575'] = $pob_6575;
		$salida['pob_75'] = $pob_75;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0609_porcentaje'] = $pob_0609*100/$total;
		$salida['pob_1014_porcentaje'] = $pob_1014*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2024_porcentaje'] = $pob_2024*100/$total;
		$salida['pob_2529_porcentaje'] = $pob_2529*100/$total;
		$salida['pob_3034_porcentaje'] = $pob_3034*100/$total;
		$salida['pob_3539_porcentaje'] = $pob_3539*100/$total;
		$salida['pob_4044_porcentaje'] = $pob_4044*100/$total;
		$salida['pob_4549_porcentaje'] = $pob_4549*100/$total;
		$salida['pob_5059_porcentaje'] = $pob_5059*100/$total;
		$salida['pob_6064_porcentaje'] = $pob_6064*100/$total;
		$salida['pob_6575_porcentaje'] = $pob_6575*100/$total;
		$salida['pob_75_porcentaje'] = $pob_75*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m) as pob_0609,				
						(x14_h + x14_m) as pob_1014,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m) as pob_2024,
						(x29_h + x29_m) as pob_2529,
						(x34_h + x34_m) as pob_3034,
						(x39_h + x39_m) as pob_3539,
						(x44_h + x44_m) as pob_4044,
						(x49_h + x49_m) as pob_4549,
						(x54_h + x54_m + x59_h + x59_m) as pob_5059,
						(x64_h + x64_m) as pob_6064,
						(x69_h + x69_m + x74_h + x74_m) as pob_6575,				
						(x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_75
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0609_espana = 0;
		$pob_1014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2024_espana = 0;
		$pob_2529_espana = 0;
		$pob_3034_espana = 0;
		$pob_3539_espana = 0;
		$pob_4044_espana = 0;
		$pob_4549_espana = 0;
		$pob_5059_espana = 0;
		$pob_6064_espana = 0;
		$pob_6575_espana = 0;
		$pob_75_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0609_espana += $pe['pob_0609'];
			$pob_1014_espana += $pe['pob_1014'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2024_espana += $pe['pob_2024'];
			$pob_2529_espana += $pe['pob_2529'];			
			$pob_3034_espana += $pe['pob_3034'];
			$pob_3539_espana += $pe['pob_3539'];
			$pob_4044_espana += $pe['pob_4044'];
			$pob_4549_espana += $pe['pob_4549'];
			$pob_5059_espana += $pe['pob_5059'];
			$pob_6064_espana += $pe['pob_6064'];
			$pob_6575_espana += $pe['pob_6575'];
			$pob_75_espana += $pe['pob_75'];
		}
		$total_espana = $pob_0005_espana + $pob_0609_espana + $pob_1014_espana + $pob_1519_espana + $pob_2024_espana + $pob_2529_espana + $pob_3034_espana + $pob_3539_espana + $pob_4044_espana + $pob_4549_espana + $pob_5059_espana + $pob_6064_espana + $pob_6575_espana + $pob_75_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0609_porcentaje_espana'] = $pob_0609_espana*100/$total_espana;
		$salida['pob_1014_porcentaje_espana'] = $pob_1014_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2024_porcentaje_espana'] = $pob_2024_espana*100/$total_espana;
		$salida['pob_2529_porcentaje_espana'] = $pob_2529_espana*100/$total_espana;
		$salida['pob_3034_porcentaje_espana'] = $pob_3034_espana*100/$total_espana;
		$salida['pob_3539_porcentaje_espana'] = $pob_3539_espana*100/$total_espana;
		$salida['pob_4044_porcentaje_espana'] = $pob_4044_espana*100/$total_espana;
		$salida['pob_4549_porcentaje_espana'] = $pob_4549_espana*100/$total_espana;
		$salida['pob_5059_porcentaje_espana'] = $pob_5059_espana*100/$total_espana;
		$salida['pob_6064_porcentaje_espana'] = $pob_6064_espana*100/$total_espana;
		$salida['pob_6575_porcentaje_espana'] = $pob_6575_espana*100/$total_espana;
		$salida['pob_75_porcentaje_espana'] = $pob_75_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresRadio($coordenadasRadio, $radio){
		header('Content-Type: application/json');
		$compr = explode(",", $coordenadasRadio);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"2\",
				sum(((est_hogares3) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"3\",
				sum(((est_hogares4) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"4\",
				sum(((est_hogares5) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \">4\"
			FROM 
				geo_sec_hogares_censo 
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)";
				
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['1'];
			$hogares2 += $p['2'];
			$hogares3 += $p['3'];
			$hogares4 += $p['4'];
			$hogares5 += $p['>4'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$sqlPorcentaje="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"2\", 
				sum(((est_hogares3) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"3\", 
				sum(((est_hogares4) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"4\", 
				sum(((est_hogares5) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \">4\"
			FROM 
				geo_sec_hogares_censo 
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)";
				
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT
						sum(est_hogares1) * 100 / sum(est_hogares_total) as hogares1, 
						sum(est_hogares2) * 100 / sum(est_hogares_total) as hogares2,
						sum(est_hogares3) * 100 / sum(est_hogares_total) as hogares3,
						sum(est_hogares4) * 100 / sum(est_hogares_total) as hogares4,
						sum(est_hogares5) * 100 / sum(est_hogares_total) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogaresRadio($coordenadasRadio, $radio){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $coordenadasRadio);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares1, 
				sum(((est_hogares2) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares2,
				sum(((est_hogares3) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares3,
				sum(((est_hogares4) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares4,
				sum(((est_hogares5) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares5
			FROM 				
				geo_sec_hogares_censo 
			WHERE 
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT  
						sum(est_hogares1) as hogares1, 
						sum(est_hogares2) as hogares2,
						sum(est_hogares3) as hogares3,
						sum(est_hogares4) as hogares4,
						sum(est_hogares5) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresICERadio($coordenadasRadio, $radio){
		header('Content-Type: application/json');
		$compr = explode(",", $coordenadasRadio);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  								
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Bajo\", 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Bajo\"
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio\"
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Alto\"
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Alto\"
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))
			FROM 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['Bajo'];
			$hogares2 += $p['Medio-Bajo'];
			$hogares3 += $p['Medio'];
			$hogares4 += $p['Medio-Alto'];
			$hogares5 += $p['Alto'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;		
		
		$sqlPorcentaje="SELECT  
							COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Bajo\", 
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Bajo\"
							FROM 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
								ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio\"
							FROM 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
								ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Alto\"
							FROM 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
								ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Alto\"
							FROM 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro > 39800 AND
								ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))
						FROM 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						WHERE 
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
							estimacion_ice_euro < 13300 AND
							ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
				
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";					
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						geo_cp, 
						geo_sec_hogares_censo,
						tbl_hogares_arvato
					WHERE 
						tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
						geo_cp.geom && geo_sec_hogares_censo.geom AND 
						geo_cp.cp IN (" . $id . ")";				
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							--geo_cp, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						where
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
							--ST_Intersects(geo_cp.geom, ST_Centroid(geo_sec_hogares_censo.geom)) AND
							ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData(),(int)$estimacionBase));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------
	
	public function actionInfoTablaCortaHogaresICERadioMultiple($coordenadasRadio){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $coordenadasRadio);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$sql250="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares1, 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares2
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares3
				FROM  
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares4
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares5
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_sec_hogares_censo.geom))
			FROM 				
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_sec_hogares_censo.geom)";
		
		$dataProvider250=new CSqlDataProvider($sql250, array(
			'pagination'=>false
		));
		$pob250 = $dataProvider250->getData();
		
		$result = array();
		$hogares1_250 = 0;
		$hogares2_250 = 0;
		$hogares3_250 = 0;
		$hogares4_250 = 0;
		$hogares5_250 = 0;
		$hogares_total_250 = 0;

		foreach($pob250 as $p){
			$hogares1_250 += $p['hogares1'];
			$hogares2_250 += $p['hogares2'];
			$hogares3_250 += $p['hogares3'];
			$hogares4_250 += $p['hogares4'];
			$hogares5_250 += $p['hogares5'];
		}
		$hogares_total_250 = $hogares1_250 + $hogares2_250 + $hogares3_250 + $hogares4_250 + $hogares5_250;
		
		$salida['hogares1_250'] = $hogares1_250;
		$salida['hogares2_250'] = $hogares2_250;
		$salida['hogares3_250'] = $hogares3_250;
		$salida['hogares4_250'] = $hogares4_250;
		$salida['hogares5_250'] = $hogares5_250;
		$salida['hogares_total_250'] = $hogares_total_250;
		
		//
		
		$sql500="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares1, 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares2
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares3
				FROM  
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares4
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares5
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_sec_hogares_censo.geom))
			FROM 				
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_sec_hogares_censo.geom)";
		
		$dataProvider500=new CSqlDataProvider($sql500, array(
			'pagination'=>false
		));
		$pob500 = $dataProvider500->getData();
		
		$result = array();
		$hogares1_500 = 0;
		$hogares2_500 = 0;
		$hogares3_500 = 0;
		$hogares4_500 = 0;
		$hogares5_500 = 0;
		$hogares_total_500 = 0;

		foreach($pob500 as $h){
			$hogares1_500 += $h['hogares1'];
			$hogares2_500 += $h['hogares2'];
			$hogares3_500 += $h['hogares3'];
			$hogares4_500 += $h['hogares4'];
			$hogares5_500 += $h['hogares5'];
		}
		$hogares_total_500 = $hogares1_500 + $hogares2_500 + $hogares3_500 + $hogares4_500 + $hogares5_500;
		
		$salida['hogares1_500'] = $hogares1_500;
		$salida['hogares2_500'] = $hogares2_500;
		$salida['hogares3_500'] = $hogares3_500;
		$salida['hogares4_500'] = $hogares4_500;
		$salida['hogares5_500'] = $hogares5_500;
		$salida['hogares_total_500'] = $hogares_total_500;
		
		//
		
		$sql1000="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares1, 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares2
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares3
				FROM  
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares4
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares5
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_sec_hogares_censo.geom))
			FROM 				
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),1000), geo_sec_hogares_censo.geom)";
		
		$dataProvider1000=new CSqlDataProvider($sql1000, array(
			'pagination'=>false
		));
		$pob1000 = $dataProvider1000->getData();
		
		$result = array();
		$hogares1_1000 = 0;
		$hogares2_1000 = 0;
		$hogares3_1000 = 0;
		$hogares4_1000 = 0;
		$hogares5_1000 = 0;
		$hogares_total_1000 = 0;

		foreach($pob1000 as $j){
			$hogares1_1000 += $j['hogares1'];
			$hogares2_1000 += $j['hogares2'];
			$hogares3_1000 += $j['hogares3'];
			$hogares4_1000 += $j['hogares4'];
			$hogares5_1000 += $j['hogares5'];
		}
		$hogares_total_1000 = $hogares1_1000 + $hogares2_1000 + $hogares3_1000 + $hogares4_1000 + $hogares5_1000;
		
		$salida['hogares1_1000'] = $hogares1_1000;
		$salida['hogares2_1000'] = $hogares2_1000;
		$salida['hogares3_1000'] = $hogares3_1000;
		$salida['hogares4_1000'] = $hogares4_1000;
		$salida['hogares5_1000'] = $hogares5_1000;
		$salida['hogares_total_1000'] = $hogares_total_1000;
		
		/*
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		*/
		
		echo json_encode($salida);
	}

	public function actionInfoTablaCortaHogaresICERadio($coordenadasRadio, $radio){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $coordenadasRadio);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$sql="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares1, 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares2
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares3
				FROM  
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares4
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares5
				FROM 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom))
			FROM 				
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionMapaHogaresDesviacionRadio($coordenadasRadio, $radio){
		
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
		$lyr = $map->getLayerByName("desviacionRentaRadio");
		
		$lyr->data = "geom FROM (SELECT 	
									round(desviacion_ice_respecto_nacional) as desviacion_ice_respecto_nacional,
									tbl_hogares_arvato.cod_secc as cod_secc, 									
									ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom) as geom,
									geo_sec_hogares_censo.gid as gid
								FROM 
									public.geo_sec_hogares_censo,
									public.tbl_hogares_arvato
								WHERE 
									tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
									ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)
								group by 
									tbl_hogares_arvato.cod_secc, 
									geo_sec_hogares_censo.geom,
									geo_sec_hogares_censo.gid,
									desviacion_ice_respecto_nacional)

		as subquery USING UNIQUE cod_secc USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionMapaSeleccionRadioMultiple($coordenadasRadio){
		
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
		
		$radio=1000;
		//CAPAS ZIPCODE
		$lyr = $map->getLayerByName("mapaSeleccionRadioMultiple");
		
		$lyr->data = "geom FROM (SELECT 
									geo_cp.cp, 
									ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_cp.geom) as geom,
									gid
								FROM 
									public.geo_cp 
								WHERE
									ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_cp.geom))
		as subquery USING UNIQUE cp USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',60);
		
		//---------------------
		//$lyr500 = $map->getLayerByName("mapaSeleccionRadioMultiple");
		$lyr250 = ms_newLayerObj($map);
		$lyr250->set("status", MS_ON);
		$lyr250->set("startindex", 0);
		$lyr250->set("type", MS_LAYER_POLYGON);
		$lyr250->setConnectionType(MS_POSTGIS);
		$lyr250->set('connection', "dbname='sigma' host=localhost port=5432 user='postgres' password='postgres' sslmode=disable");		
		
		$lyr250->data = "geom FROM (SELECT 
									geo_cp.cp, 
									ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_cp.geom) as geom,
									gid
								FROM 
									public.geo_cp 
								WHERE
									ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),250), geo_cp.geom))
		as subquery USING UNIQUE cp USING srid=25830";
				 		
		$lyr250->set('opacity',40);		
		$lyr250->updateFromString('LAYER 
										CLASS 
											STYLE 
												WIDTH 2 
												COLOR 30 144 255
												OUTLINECOLOR 0 0 0
											END 
										END 
									END');
		//$map->insertLayer($lyr250,0);
		/*$class500 = $lyr250->getClass(0);
		$style = $class500->getStyle(0);
		$style->outlinecolor->setRGB(0, 0, 0);*/
		$lyr250->set('name','lyr250');		
		//-------------------------------------
		
		//---------------------
		//$lyr500 = $map->getLayerByName("mapaSeleccionRadioMultiple");
		$lyr500 = ms_newLayerObj($map);
		$lyr500->set("status", MS_ON);
		$lyr500->set("startindex", 0);
		$lyr500->set("type", MS_LAYER_POLYGON);
		$lyr500->setConnectionType(MS_POSTGIS);
		$lyr500->set('connection', "dbname='sigma' host=localhost port=5432 user='postgres' password='postgres' sslmode=disable");		
		
		$lyr500->data = "geom FROM (SELECT 
									geo_cp.cp, 
									ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_cp.geom) as geom,
									gid
								FROM 
									public.geo_cp 
								WHERE
									ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830),500), geo_cp.geom))
		as subquery USING UNIQUE cp USING srid=25830";
				 		
		$lyr500->set('opacity',30);		
		$lyr500->updateFromString('LAYER 
										CLASS 
											STYLE 
												WIDTH 2 
												COLOR 51 0 102
												OUTLINECOLOR 0 0 0
											END 
										END 
									END');
		//$map->insertLayer($lyr500,0);
		/*$class500 = $lyr500->getClass(0);
		$style = $class500->getStyle(0);
		$style->outlinecolor->setRGB(0, 0, 0);*/
		$lyr500->set('name','lyr500');		
		//-------------------------------------		
		
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionMapaSeleccionRadio($coordenadasRadio, $radio){
		
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
		$lyr = $map->getLayerByName("mapaSeleccionRadio");
		
		$lyr->data = "geom FROM (SELECT 
									geo_cp.cp, 
									ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_cp.geom) as geom,
									gid
								FROM 
									public.geo_cp 
								WHERE
									ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_cp.geom))
		as subquery USING UNIQUE cp USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionInfoTablaIndicadoresRadio($coordenadasRadio, $radio){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $coordenadasRadio);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// ICE Base
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						geo_cp, 
						geo_sec_hogares_censo,
						tbl_hogares_arvato
					WHERE 
						tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
						geo_cp.geom && geo_sec_hogares_censo.geom AND 
						geo_cp.cp IN (" . $id . ")";				
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						where
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
							--ST_Intersects(geo_cp.geom, ST_Centroid(geo_sec_hogares_censo.geom)) 
							ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_sec_hogares_censo.geom)
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;		
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de envejecimiento y tasa de dependencia
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1565,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		$pob_0014 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_1565 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_0014 += $p['pob_0014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_1565 += $p['pob_1565'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}						
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005_espana, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514_espana,
						(x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) as pob_0014_espana,
						(x19_h + x19_m) as pob_1519_espana,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029_espana,
						(x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_1565_espana,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965_espana,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599_espana
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_0014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_1565_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005_espana'];
			$pob_0514_espana += $pe['pob_0514_espana'];
			$pob_0014_espana += $pe['pob_0014_espana'];
			$pob_1519_espana += $pe['pob_1519_espana'];
			$pob_2029_espana += $pe['pob_2029_espana'];
			$pob_1565_espana += $pe['pob_1565_espana'];
			$pob_2965_espana += $pe['pob_2965_espana'];
			$pob_6599_espana += $pe['pob_6599_espana'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Población vinculada no residente municipio
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sqlPobVinculada="SELECT
						sum(pobl_vincu) as pobl_vincu
					FROM 						
						geo_mun,
						tbl_pobl_vinculada
					WHERE 
						tbl_pobl_vinculada.cod_mun = geo_mun.cod_mun AND
						--geo_cp.geom && geo_mun.geom AND 						
						--st_within(st_centroid(geo_cp.geom), geo_mun.geom) AND						
						st_within(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_mun.geom)";				
		
		$dataProviderPobVinculada=new CSqlDataProvider($sqlPobVinculada, array(
			'pagination'=>false
		));
		
		$pobVinculada = $dataProviderPobVinculada->getData();
		
		$cifraPobVinculada = 0;		
		foreach($pobVinculada as $a){
			$cifraPobVinculada += $a['pobl_vincu'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Nivel de estudios y accesibilidad
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		//AVG(((accesibilidad)* ST_Area(ST_Intersection(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as accesibilidad, 
		$sqlAccesibilidadEstudios="SELECT  
										AVG(accesibilidad) as accesibilidad,
										AVG(nivel_estudios) as nivel_estudios,
										sum(total) as total
									FROM
										geo_ine_secciones
									WHERE 
										ST_Intersects(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_ine_secciones.geom)";
		
		$dataProviderAccesibilidadEstudios=new CSqlDataProvider($sqlAccesibilidadEstudios, array(
			'pagination'=>false
		));
		$AccesibilidadEstudios = $dataProviderAccesibilidadEstudios->getData();
				
		$accesibilidad = 0;
		$nivel_estudios = 0;
		$totalPoblacion = 0;

		foreach($AccesibilidadEstudios as $p){
			$accesibilidad += $p['accesibilidad'];
			$nivel_estudios += $p['nivel_estudios'];
			$totalPoblacion += $p['total'];
		}
		//Nacional
		$sqlAccesibilidadEstudiosNacional="SELECT  
												(SELECT AVG(accesibilidad) as accesibilidad FROM tbl_ine_espana),
												AVG(nivel_estudios) as nivel_estudios,
												sum(total) as total
											FROM 
												geo_ine_secciones";
		
		$dataProviderAccesibilidadEstudiosNacional=new CSqlDataProvider($sqlAccesibilidadEstudiosNacional, array(
			'pagination'=>false
		));
		$AccesibilidadEstudiosNacional = $dataProviderAccesibilidadEstudiosNacional->getData();
				
		$accesibilidadNacional = 0;
		$nivel_estudiosNacional = 0;
		$totalPoblacionNacional = 0;

		foreach($AccesibilidadEstudiosNacional as $p){
			$accesibilidadNacional += $p['accesibilidad'];
			$nivel_estudiosNacional += $p['nivel_estudios'];
			$totalPoblacionNacional += $p['total'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de Desempleo SEPE
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sqlDesempleo="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa					
					FROM 
						geo_mun,
						tbl_desempleo
					WHERE 
						tbl_desempleo.municipio = geo_mun.cod_mun AND
						--geo_cp.geom && geo_mun.geom AND 
						--st_within(st_centroid(geo_cp.geom), geo_mun.geom) AND
						st_within(ST_Buffer(ST_SetSRID(ST_Point(" . $coordenadasRadio . "),25830)," . $radio . "), geo_mun.geom)";				
		
		$dataProviderDesempleo=new CSqlDataProvider($sqlDesempleo, array(
			'pagination'=>false
		));
		
		$desempleo = $dataProviderDesempleo->getData();
		
		$cifraDesempleo = 0;
		$pob_activa = 0;
		foreach($desempleo as $a){
			$cifraDesempleo += $a['tasa_desempleo'];
			$pob_activa += $a['pob_activa'];
		}
		//Nacional
		$sqlDesempleoNacional="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa
					FROM 
						tbl_desempleo";				
		
		$dataProviderDesempleoNacional=new CSqlDataProvider($sqlDesempleoNacional, array(
			'pagination'=>false
		));
		
		$desempleoNacional = $dataProviderDesempleoNacional->getData();
		
		$cifraDesempleoNacional = 0;	
		foreach($desempleoNacional as $a){
			$cifraDesempleoNacional += $a['tasa_desempleo'];
		}		
		
		//-------------------------------------------------------------------------------------------------------------------
		//Datos a mostrar en la vista.
		//-------------------------------------------------------------------------------------------------------------------
		
		//Índice de envejecimiento
		//Población
		$totalPoblacionEnvejecimiento = $pob_6599;
		$salida['totalPoblacionEnvejecimiento'] = $totalPoblacionEnvejecimiento;
		//Selección
		//$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) / ($pob_6599_espana / $pob_0014_espana) * 100;
		$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) * 100;
		$salida['porcentajeEnvejecimientoSeleccion'] = $porcentajeEnvejecimientoSeleccion;
		//Nacional
		$porcentajeEnvejecimientoNacional = ($pob_6599_espana / $pob_0014_espana) * 100;
		$salida['porcentajeEnvejecimientoNacional'] = $porcentajeEnvejecimientoNacional;
		//Gráfico
		$salida['porcentajeEnvejecimientoSeleccionGrafico'] = ($porcentajeEnvejecimientoSeleccion / $porcentajeEnvejecimientoNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de dependencia
		//Población
		$totalPoblacionDependencia = $pob_0014 + $pob_6599;
		$salida['totalPoblacionDependencia'] = $totalPoblacionDependencia;
		//Selección
		//$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) / (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) * 100;
		$salida['porcentajeDependenciaSeleccion'] = $porcentajeDependenciaSeleccion;
		//Nacional
		$porcentajeDependenciaNacional = (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$salida['porcentajeDependenciaNacional'] = $porcentajeDependenciaNacional;
		//Gráfico
		$salida['porcentajeDependenciaSeleccionGrafico'] = ($porcentajeDependenciaSeleccion / $porcentajeDependenciaNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de infancia
		//Población
		$totalPoblacionInfancia = (int)$pob_0014;
		$salida['totalPoblacionInfancia'] = $totalPoblacionInfancia;
		//Selección
		$porcentajeInfanciaSeleccion = ($pob_0014 / $total) * 100;
		$salida['porcentajeInfanciaSeleccion'] = $porcentajeInfanciaSeleccion;
		//Nacional
		$porcentajeInfanciaNacional = ($pob_0014_espana / $total_espana) * 100;
		$salida['porcentajeInfanciaNacional'] = $porcentajeInfanciaNacional;
		//Gráfico
		$salida['porcentajeInfanciaSeleccionGrafico'] = ($porcentajeInfanciaSeleccion / $porcentajeInfanciaNacional) *100;
		
		//------------------------------------------------------
		
		//Tasa de vejez
		//Población
		$totalPoblacionVejez = (int)$pob_6599;
		$salida['totalPoblacionVejez'] = $totalPoblacionVejez;
		//Selección
		$porcentajeVejezSeleccion = ($pob_6599 / $total) * 100;
		$salida['porcentajeVejezSeleccion'] = $porcentajeVejezSeleccion;
		//Nacional
		$porcentajeVejezNacional = ($pob_6599_espana / $total_espana) * 100;
		$salida['porcentajeVejezNacional'] = $porcentajeVejezNacional;
		//Gráfico
		$salida['porcentajeVejezSeleccionGrafico'] = ($porcentajeVejezSeleccion / $porcentajeVejezNacional) * 100;
		
		//------------------------------------------------------
		
		//ICE
		$salida['ICE'] = (int)$estimacionBase;		
		
		//------------------------------------------------------
		
		//Población vinculada no residente municipio
		$salida['pobVinculada'] = (int)$cifraPobVinculada;
		
		//------------------------------------------------------
		
		//Accesibilidad y nivel de estudios
		//Población
		$salida['totalPoblacion'] = (int)$totalPoblacion;
		//Selección
		$salida['accesibilidad'] = $accesibilidad;		
		$salida['nivel_estudios'] = $nivel_estudios;
		//Nacional		
		$salida['accesibilidadNacional'] = $accesibilidadNacional;		
		$salida['nivel_estudiosNacional'] = $nivel_estudiosNacional;
		//Gráfico
		$salida['accesibilidadSeleccionGrafico'] = ($accesibilidad / $accesibilidadNacional) * 100;
		$salida['nivel_estudiosSeleccionGrafico'] = ($nivel_estudios / $nivel_estudiosNacional) * 100;		
		
		//------------------------------------------------------
		
		//Índice de Desempleo SEPE
		$salida['cifraDesempleo'] = $cifraDesempleo;
		//Nacional
		$salida['cifraDesempleoNacional'] = $cifraDesempleoNacional;
		//Gráfico
		$salida['cifraDesempleoPorcentaje'] = ($cifraDesempleo / $cifraDesempleoNacional) * 100;		
		$salida['pob_activa'] = (int)$pob_activa;
		//------------------------------------------------------
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//ENTORNO: Funciones Secciones 
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	
	public function actionInfoEntornoPoblacionSecciones($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
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
				geo_secciones.cod_secc IN (" . $id . ")";
		
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
		
		$sqlPorcentaje="SELECT  
				sum(((x4_h + x4_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"5-14\",
				sum(((x19_h + x19_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"15-19 \",
				sum(((x24_h + x24_m + x29_h + x29_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \">65\"
			FROM 
				geo_secciones, 
				geo_ine_secciones
			WHERE 
				geo_secciones.geom && geo_ine_secciones.geom AND 
				geo_secciones.cod_secc IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) * 100 / total as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) * 100 / total as pob_0514,
						(x19_h + x19_m) * 100 / total as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) * 100 / total as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * 100 / total as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * 100 / total as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	public function actionInfoTablaCortaSecciones($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		
		$result = array();
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0514'] = $pob_0514;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2029'] = $pob_2029;
		$salida['pob_2965'] = $pob_2965;
		$salida['pob_6599'] = $pob_6599;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0514_porcentaje'] = $pob_0514*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2029_porcentaje'] = $pob_2029*100/$total;
		$salida['pob_2965_porcentaje'] = $pob_2965*100/$total;
		$salida['pob_6599_porcentaje'] = $pob_6599*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0514_espana += $pe['pob_0514'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2029_espana += $pe['pob_2029'];
			$pob_2965_espana += $pe['pob_2965'];
			$pob_6599_espana += $pe['pob_6599'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0514_porcentaje_espana'] = $pob_0514_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2029_porcentaje_espana'] = $pob_2029_espana*100/$total_espana;
		$salida['pob_2965_porcentaje_espana'] = $pob_2965_espana*100/$total_espana;
		$salida['pob_6599_porcentaje_espana'] = $pob_6599_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionInfoTablaLargaSecciones($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0609,				
				sum(((x14_h + x14_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2024,
				sum(((x29_h + x29_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2529,
				sum(((x34_h + x34_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3034,
				sum(((x39_h + x39_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3539,
				sum(((x44_h + x44_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4044,
				sum(((x49_h + x49_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4549,
				sum(((x54_h + x54_m + x59_h + x59_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_5059,
				sum(((x64_h + x64_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6064,
				sum(((x69_h + x69_m + x74_h + x74_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6575,				
				sum(((x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_75
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
		
		$result = array();
		$pob_0005 = 0;
		$pob_0609 = 0;
		$pob_1014 = 0;
		$pob_1519 = 0;
		$pob_2024 = 0;
		$pob_2529 = 0;
		$pob_3034 = 0;
		$pob_3539 = 0;
		$pob_4044 = 0;
		$pob_4549 = 0;
		$pob_5059 = 0;
		$pob_6064 = 0;
		$pob_6575 = 0;
		$pob_75 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0609 += $p['pob_0609'];
			$pob_1014 += $p['pob_1014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2024 += $p['pob_2024'];
			$pob_2529 += $p['pob_2529'];			
			$pob_3034 += $p['pob_3034'];
			$pob_3539 += $p['pob_3539'];
			$pob_4044 += $p['pob_4044'];
			$pob_4549 += $p['pob_4549'];
			$pob_5059 += $p['pob_5059'];
			$pob_6064 += $p['pob_6064'];
			$pob_6575 += $p['pob_6575'];
			$pob_75 += $p['pob_75'];
		}
		$total = $pob_0005 + $pob_0609 + $pob_1014 + $pob_1519 + $pob_2024 + $pob_2529 + $pob_3034 + $pob_3539 + $pob_4044 + $pob_4549 + $pob_5059 + $pob_6064 + $pob_6575 + $pob_75;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0609'] = $pob_0609;
		$salida['pob_1014'] = $pob_1014;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2024'] = $pob_2024;
		$salida['pob_2529'] = $pob_2529;
		$salida['pob_3034'] = $pob_3034;
		$salida['pob_3539'] = $pob_3539;
		$salida['pob_4044'] = $pob_4044;
		$salida['pob_4549'] = $pob_4549;
		$salida['pob_5059'] = $pob_5059;
		$salida['pob_6064'] = $pob_6064;
		$salida['pob_6575'] = $pob_6575;
		$salida['pob_75'] = $pob_75;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0609_porcentaje'] = $pob_0609*100/$total;
		$salida['pob_1014_porcentaje'] = $pob_1014*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2024_porcentaje'] = $pob_2024*100/$total;
		$salida['pob_2529_porcentaje'] = $pob_2529*100/$total;
		$salida['pob_3034_porcentaje'] = $pob_3034*100/$total;
		$salida['pob_3539_porcentaje'] = $pob_3539*100/$total;
		$salida['pob_4044_porcentaje'] = $pob_4044*100/$total;
		$salida['pob_4549_porcentaje'] = $pob_4549*100/$total;
		$salida['pob_5059_porcentaje'] = $pob_5059*100/$total;
		$salida['pob_6064_porcentaje'] = $pob_6064*100/$total;
		$salida['pob_6575_porcentaje'] = $pob_6575*100/$total;
		$salida['pob_75_porcentaje'] = $pob_75*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m) as pob_0609,				
						(x14_h + x14_m) as pob_1014,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m) as pob_2024,
						(x29_h + x29_m) as pob_2529,
						(x34_h + x34_m) as pob_3034,
						(x39_h + x39_m) as pob_3539,
						(x44_h + x44_m) as pob_4044,
						(x49_h + x49_m) as pob_4549,
						(x54_h + x54_m + x59_h + x59_m) as pob_5059,
						(x64_h + x64_m) as pob_6064,
						(x69_h + x69_m + x74_h + x74_m) as pob_6575,				
						(x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_75
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0609_espana = 0;
		$pob_1014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2024_espana = 0;
		$pob_2529_espana = 0;
		$pob_3034_espana = 0;
		$pob_3539_espana = 0;
		$pob_4044_espana = 0;
		$pob_4549_espana = 0;
		$pob_5059_espana = 0;
		$pob_6064_espana = 0;
		$pob_6575_espana = 0;
		$pob_75_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0609_espana += $pe['pob_0609'];
			$pob_1014_espana += $pe['pob_1014'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2024_espana += $pe['pob_2024'];
			$pob_2529_espana += $pe['pob_2529'];			
			$pob_3034_espana += $pe['pob_3034'];
			$pob_3539_espana += $pe['pob_3539'];
			$pob_4044_espana += $pe['pob_4044'];
			$pob_4549_espana += $pe['pob_4549'];
			$pob_5059_espana += $pe['pob_5059'];
			$pob_6064_espana += $pe['pob_6064'];
			$pob_6575_espana += $pe['pob_6575'];
			$pob_75_espana += $pe['pob_75'];
		}
		$total_espana = $pob_0005_espana + $pob_0609_espana + $pob_1014_espana + $pob_1519_espana + $pob_2024_espana + $pob_2529_espana + $pob_3034_espana + $pob_3539_espana + $pob_4044_espana + $pob_4549_espana + $pob_5059_espana + $pob_6064_espana + $pob_6575_espana + $pob_75_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0609_porcentaje_espana'] = $pob_0609_espana*100/$total_espana;
		$salida['pob_1014_porcentaje_espana'] = $pob_1014_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2024_porcentaje_espana'] = $pob_2024_espana*100/$total_espana;
		$salida['pob_2529_porcentaje_espana'] = $pob_2529_espana*100/$total_espana;
		$salida['pob_3034_porcentaje_espana'] = $pob_3034_espana*100/$total_espana;
		$salida['pob_3539_porcentaje_espana'] = $pob_3539_espana*100/$total_espana;
		$salida['pob_4044_porcentaje_espana'] = $pob_4044_espana*100/$total_espana;
		$salida['pob_4549_porcentaje_espana'] = $pob_4549_espana*100/$total_espana;
		$salida['pob_5059_porcentaje_espana'] = $pob_5059_espana*100/$total_espana;
		$salida['pob_6064_porcentaje_espana'] = $pob_6064_espana*100/$total_espana;
		$salida['pob_6575_porcentaje_espana'] = $pob_6575_espana*100/$total_espana;
		$salida['pob_75_porcentaje_espana'] = $pob_75_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresSecciones($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"2\",
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"3\",
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"4\",
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \">4\"
			FROM 
				geo_secciones, 
				geo_sec_hogares_censo 
			WHERE 
				geo_secciones.geom && geo_sec_hogares_censo.geom AND 
				geo_secciones.cod_secc IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['1'];
			$hogares2 += $p['2'];
			$hogares3 += $p['3'];
			$hogares4 += $p['4'];
			$hogares5 += $p['>4'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$sqlPorcentaje="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"2\", 
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"3\", 
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"4\", 
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \">4\"
			FROM 
				geo_secciones, 
				geo_sec_hogares_censo 
			WHERE 
				geo_secciones.geom && geo_sec_hogares_censo.geom AND 
				geo_secciones.cod_secc IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT
						sum(est_hogares1) * 100 / sum(est_hogares_total) as hogares1, 
						sum(est_hogares2) * 100 / sum(est_hogares_total) as hogares2,
						sum(est_hogares3) * 100 / sum(est_hogares_total) as hogares3,
						sum(est_hogares4) * 100 / sum(est_hogares_total) as hogares4,
						sum(est_hogares5) * 100 / sum(est_hogares_total) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogaresSecciones($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares1, 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares2,
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares3,
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares4,
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares5
			FROM 
				geo_secciones, 
				geo_sec_hogares_censo 
			WHERE 
				geo_secciones.geom && geo_sec_hogares_censo.geom AND 
				geo_secciones.cod_secc IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT  
						sum(est_hogares1) as hogares1, 
						sum(est_hogares2) as hogares2,
						sum(est_hogares3) as hogares3,
						sum(est_hogares4) as hogares4,
						sum(est_hogares5) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresICESecciones($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  				
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Bajo\", 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Bajo\"
				FROM 
					geo_secciones, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					geo_secciones.geom && geo_sec_hogares_censo.geom AND 
					geo_secciones.cod_secc IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio\"
				FROM 
					geo_secciones, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					geo_secciones.geom && geo_sec_hogares_censo.geom AND 
					geo_secciones.cod_secc IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Alto\"
				FROM 
					geo_secciones, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					geo_secciones.geom && geo_sec_hogares_censo.geom AND 
					geo_secciones.cod_secc IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Alto\"
				FROM 
					geo_secciones, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					geo_secciones.geom && geo_sec_hogares_censo.geom AND 
					geo_secciones.cod_secc IN (" . $id . "))
			FROM 
				geo_secciones, 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				geo_secciones.geom && geo_sec_hogares_censo.geom AND 
				geo_secciones.cod_secc IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['Bajo'];
			$hogares2 += $p['Medio-Bajo'];
			$hogares3 += $p['Medio'];
			$hogares4 += $p['Medio-Alto'];
			$hogares5 += $p['Alto'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$sqlPorcentaje="SELECT  
							COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Bajo\", 
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Bajo\"
							FROM 
								geo_secciones, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
								geo_secciones.geom && geo_sec_hogares_censo.geom AND 
								geo_secciones.cod_secc IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio\"
							FROM 
								geo_secciones, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
								geo_secciones.geom && geo_sec_hogares_censo.geom AND 
								geo_secciones.cod_secc IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Alto\"
							FROM 
								geo_secciones, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
								geo_secciones.geom && geo_sec_hogares_censo.geom AND 
								geo_secciones.cod_secc IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Alto\"
							FROM 
								geo_secciones, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro > 39800 AND
								geo_secciones.geom && geo_sec_hogares_censo.geom AND 
								geo_secciones.cod_secc IN (" . $id . "))
						FROM 
							geo_secciones, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						WHERE 
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
							estimacion_ice_euro < 13300 AND
							geo_secciones.geom && geo_sec_hogares_censo.geom AND 
							geo_secciones.cod_secc IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
				
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";					
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						tbl_hogares_arvato
					WHERE
							tbl_hogares_arvato.cod_secc IN (" . $id . ")";						
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato
						WHERE
							tbl_hogares_arvato.cod_secc IN (" . $id . ")
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData(), (int)$estimacionBase));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogaresICESecciones($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$sql="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares1, 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares2
				FROM 
					geo_secciones, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					geo_secciones.geom && geo_sec_hogares_censo.geom AND 
					geo_secciones.cod_secc IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares3
				FROM 
					geo_secciones, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					geo_secciones.geom && geo_sec_hogares_censo.geom AND 
					geo_secciones.cod_secc IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares4
				FROM 
					geo_secciones, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					geo_secciones.geom && geo_sec_hogares_censo.geom AND 
					geo_secciones.cod_secc IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_secciones.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares5
				FROM 
					geo_secciones, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					geo_secciones.geom && geo_sec_hogares_censo.geom AND 
					geo_secciones.cod_secc IN (" . $cp . "))
			FROM 
				geo_secciones, 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				geo_secciones.geom && geo_sec_hogares_censo.geom AND 
				geo_secciones.cod_secc IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionMapaHogaresDesviacionSecciones($cp){
		
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
		$lyr = $map->getLayerByName("desviacionRentaSecciones");
		
		$lyr->data = "geom FROM (SELECT 	
									round(desviacion_ice_respecto_nacional) as desviacion_ice_respecto_nacional,
									tbl_hogares_arvato.cod_secc as cod_secc, 
									geo_sec_hogares_censo.geom as geom,	
									geo_sec_hogares_censo.gid as gid
								FROM 
									public.geo_sec_hogares_censo,
									public.tbl_hogares_arvato
								WHERE 
									tbl_hogares_arvato.cod_secc IN (" . $cp . ") AND
									tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec
								group by 
									tbl_hogares_arvato.cod_secc, 
									geo_sec_hogares_censo.geom,
									geo_sec_hogares_censo.gid,
									desviacion_ice_respecto_nacional)
		as subquery USING UNIQUE cod_secc USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionMapaSeleccionSecciones($cp){
		
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
		$lyr = $map->getLayerByName("mapaSeleccionSecciones");
		
		$lyr->data = "geom FROM (SELECT 
									geo_secciones.cod_secc, 
									geo_secciones.geom, 
									id
								FROM 
									public.geo_secciones 
								WHERE 
									geo_secciones.cod_secc IN (" . $cp . "))
		as subquery USING UNIQUE cod_secc USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionInfoTablaIndicadoresSecciones($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// ICE Base
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						tbl_hogares_arvato
					WHERE
							tbl_hogares_arvato.cod_secc IN (" . $id . ")";						
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato
						WHERE
							tbl_hogares_arvato.cod_secc IN (" . $cp . ")
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de envejecimiento y tasa de dependencia
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1565,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		$pob_0014 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_1565 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_0014 += $p['pob_0014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_1565 += $p['pob_1565'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}						
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005_espana, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514_espana,
						(x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) as pob_0014_espana,
						(x19_h + x19_m) as pob_1519_espana,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029_espana,
						(x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_1565_espana,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965_espana,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599_espana
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_0014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_1565_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005_espana'];
			$pob_0514_espana += $pe['pob_0514_espana'];
			$pob_0014_espana += $pe['pob_0014_espana'];
			$pob_1519_espana += $pe['pob_1519_espana'];
			$pob_2029_espana += $pe['pob_2029_espana'];
			$pob_1565_espana += $pe['pob_1565_espana'];
			$pob_2965_espana += $pe['pob_2965_espana'];
			$pob_6599_espana += $pe['pob_6599_espana'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Población vinculada no residente municipio
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sqlPobVinculada="SELECT
						sum(pobl_vincu) as pobl_vincu
					FROM 
						geo_secciones, 
						geo_mun,
						tbl_pobl_vinculada
					WHERE 
						tbl_pobl_vinculada.cod_mun = geo_mun.cod_mun AND
						geo_secciones.geom && geo_mun.geom AND 
						st_within(st_centroid(geo_secciones.geom), geo_mun.geom) AND						
						geo_secciones.cod_secc IN (" . $cp . ")";				
		
		$dataProviderPobVinculada=new CSqlDataProvider($sqlPobVinculada, array(
			'pagination'=>false
		));
		
		$pobVinculada = $dataProviderPobVinculada->getData();
		
		$cifraPobVinculada = 0;		
		foreach($pobVinculada as $a){
			$cifraPobVinculada += $a['pobl_vincu'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Nivel de estudios y accesibilidad
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		//AVG(((accesibilidad)* ST_Area(ST_Intersection(geo_secciones.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as accesibilidad, 
		$sqlAccesibilidadEstudios="SELECT  
										AVG(accesibilidad) as accesibilidad,
										AVG(nivel_estudios) as nivel_estudios,
										sum(total) as total
									FROM 
										geo_secciones, 
										geo_ine_secciones 
									WHERE 
										ST_Intersects(geo_secciones.geom , geo_ine_secciones.geom) AND
										geo_secciones.geom && geo_ine_secciones.geom AND 
										geo_secciones.cod_secc IN (" . $cp . ")";
		
		$dataProviderAccesibilidadEstudios=new CSqlDataProvider($sqlAccesibilidadEstudios, array(
			'pagination'=>false
		));
		$AccesibilidadEstudios = $dataProviderAccesibilidadEstudios->getData();
				
		$accesibilidad = 0;
		$nivel_estudios = 0;
		$totalPoblacion = 0;

		foreach($AccesibilidadEstudios as $p){
			$accesibilidad += $p['accesibilidad'];
			$nivel_estudios += $p['nivel_estudios'];
			$totalPoblacion += $p['total'];
		}
		//Nacional
		$sqlAccesibilidadEstudiosNacional="SELECT  
												(SELECT AVG(accesibilidad) as accesibilidad FROM tbl_ine_espana),
												AVG(nivel_estudios) as nivel_estudios,
												sum(total) as total
											FROM 
												geo_ine_secciones";
		
		$dataProviderAccesibilidadEstudiosNacional=new CSqlDataProvider($sqlAccesibilidadEstudiosNacional, array(
			'pagination'=>false
		));
		$AccesibilidadEstudiosNacional = $dataProviderAccesibilidadEstudiosNacional->getData();
				
		$accesibilidadNacional = 0;
		$nivel_estudiosNacional = 0;
		$totalPoblacionNacional = 0;

		foreach($AccesibilidadEstudiosNacional as $p){
			$accesibilidadNacional += $p['accesibilidad'];
			$nivel_estudiosNacional += $p['nivel_estudios'];
			$totalPoblacionNacional += $p['total'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de Desempleo SEPE
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sqlDesempleo="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa					
					FROM 
						geo_secciones, 
						geo_mun,
						tbl_desempleo
					WHERE 
						tbl_desempleo.municipio = geo_mun.cod_mun AND
						geo_secciones.geom && geo_mun.geom AND 
						st_within(st_centroid(geo_secciones.geom), geo_mun.geom) AND						
						geo_secciones.cod_secc IN (" . $cp . ")";				
		
		$dataProviderDesempleo=new CSqlDataProvider($sqlDesempleo, array(
			'pagination'=>false
		));
		
		$desempleo = $dataProviderDesempleo->getData();
		
		$cifraDesempleo = 0;
		$pob_activa = 0;
		foreach($desempleo as $a){
			$cifraDesempleo += $a['tasa_desempleo'];
			$pob_activa += $a['pob_activa'];
		}
		//Nacional
		$sqlDesempleoNacional="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa
					FROM 
						tbl_desempleo";				
		
		$dataProviderDesempleoNacional=new CSqlDataProvider($sqlDesempleoNacional, array(
			'pagination'=>false
		));
		
		$desempleoNacional = $dataProviderDesempleoNacional->getData();
		
		$cifraDesempleoNacional = 0;	
		foreach($desempleoNacional as $a){
			$cifraDesempleoNacional += $a['tasa_desempleo'];
		}		
		
		//-------------------------------------------------------------------------------------------------------------------
		//Datos a mostrar en la vista.
		//-------------------------------------------------------------------------------------------------------------------
		
		//Índice de envejecimiento
		//Población
		$totalPoblacionEnvejecimiento = $pob_6599;
		$salida['totalPoblacionEnvejecimiento'] = $totalPoblacionEnvejecimiento;
		//Selección
		//$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) / ($pob_6599_espana / $pob_0014_espana) * 100;
		$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) * 100;
		$salida['porcentajeEnvejecimientoSeleccion'] = $porcentajeEnvejecimientoSeleccion;
		//Nacional
		$porcentajeEnvejecimientoNacional = ($pob_6599_espana / $pob_0014_espana) * 100;
		$salida['porcentajeEnvejecimientoNacional'] = $porcentajeEnvejecimientoNacional;
		//Gráfico
		$salida['porcentajeEnvejecimientoSeleccionGrafico'] = ($porcentajeEnvejecimientoSeleccion / $porcentajeEnvejecimientoNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de dependencia
		//Población
		$totalPoblacionDependencia = $pob_0014 + $pob_6599;
		$salida['totalPoblacionDependencia'] = $totalPoblacionDependencia;
		//Selección
		//$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) / (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) * 100;
		$salida['porcentajeDependenciaSeleccion'] = $porcentajeDependenciaSeleccion;
		//Nacional
		$porcentajeDependenciaNacional = (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$salida['porcentajeDependenciaNacional'] = $porcentajeDependenciaNacional;
		//Gráfico
		$salida['porcentajeDependenciaSeleccionGrafico'] = ($porcentajeDependenciaSeleccion / $porcentajeDependenciaNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de infancia
		//Población
		$totalPoblacionInfancia = (int)$pob_0014;
		$salida['totalPoblacionInfancia'] = $totalPoblacionInfancia;
		//Selección
		$porcentajeInfanciaSeleccion = ($pob_0014 / $total) * 100;
		$salida['porcentajeInfanciaSeleccion'] = $porcentajeInfanciaSeleccion;
		//Nacional
		$porcentajeInfanciaNacional = ($pob_0014_espana / $total_espana) * 100;
		$salida['porcentajeInfanciaNacional'] = $porcentajeInfanciaNacional;
		//Gráfico
		$salida['porcentajeInfanciaSeleccionGrafico'] = ($porcentajeInfanciaSeleccion / $porcentajeInfanciaNacional) *100;
		
		//------------------------------------------------------
		
		//Tasa de vejez
		//Población
		$totalPoblacionVejez = (int)$pob_6599;
		$salida['totalPoblacionVejez'] = $totalPoblacionVejez;
		//Selección
		$porcentajeVejezSeleccion = ($pob_6599 / $total) * 100;
		$salida['porcentajeVejezSeleccion'] = $porcentajeVejezSeleccion;
		//Nacional
		$porcentajeVejezNacional = ($pob_6599_espana / $total_espana) * 100;
		$salida['porcentajeVejezNacional'] = $porcentajeVejezNacional;
		//Gráfico
		$salida['porcentajeVejezSeleccionGrafico'] = ($porcentajeVejezSeleccion / $porcentajeVejezNacional) * 100;
		
		//------------------------------------------------------
		
		//ICE
		$salida['ICE'] = (int)$estimacionBase;		
		
		//------------------------------------------------------
		
		//Población vinculada no residente municipio
		$salida['pobVinculada'] = (int)$cifraPobVinculada;
		
		//------------------------------------------------------
		
		//Accesibilidad y nivel de estudios
		//Población
		$salida['totalPoblacion'] = (int)$totalPoblacion;
		//Selección
		$salida['accesibilidad'] = $accesibilidad;		
		$salida['nivel_estudios'] = $nivel_estudios;
		//Nacional		
		$salida['accesibilidadNacional'] = $accesibilidadNacional;		
		$salida['nivel_estudiosNacional'] = $nivel_estudiosNacional;
		//Gráfico
		$salida['accesibilidadSeleccionGrafico'] = ($accesibilidad / $accesibilidadNacional) * 100;
		$salida['nivel_estudiosSeleccionGrafico'] = ($nivel_estudios / $nivel_estudiosNacional) * 100;		
		
		//------------------------------------------------------
		
		//Índice de Desempleo SEPE
		$salida['cifraDesempleo'] = $cifraDesempleo;
		//Nacional
		$salida['cifraDesempleoNacional'] = $cifraDesempleoNacional;
		//Gráfico
		$salida['cifraDesempleoPorcentaje'] = ($cifraDesempleo / $cifraDesempleoNacional) * 100;		
		$salida['pob_activa'] = (int)$pob_activa;
		//------------------------------------------------------
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//ENTORNO: Funciones Barrios
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function actionInfoEntornoPoblacionBarrios($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
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
				geo_barrios.cbarrio IN (" . $id . ")";
		
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
		
		$sqlPorcentaje="SELECT  
				sum(((x4_h + x4_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"5-14\",
				sum(((x19_h + x19_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"15-19 \",
				sum(((x24_h + x24_m + x29_h + x29_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \">65\"
			FROM 
				geo_barrios, 
				geo_ine_secciones
			WHERE 
				geo_barrios.geom && geo_ine_secciones.geom AND 
				geo_barrios.cbarrio IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) * 100 / total as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) * 100 / total as pob_0514,
						(x19_h + x19_m) * 100 / total as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) * 100 / total as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * 100 / total as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * 100 / total as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	public function actionInfoTablaCortaBarrios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		
		$result = array();
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0514'] = $pob_0514;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2029'] = $pob_2029;
		$salida['pob_2965'] = $pob_2965;
		$salida['pob_6599'] = $pob_6599;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0514_porcentaje'] = $pob_0514*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2029_porcentaje'] = $pob_2029*100/$total;
		$salida['pob_2965_porcentaje'] = $pob_2965*100/$total;
		$salida['pob_6599_porcentaje'] = $pob_6599*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0514_espana += $pe['pob_0514'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2029_espana += $pe['pob_2029'];
			$pob_2965_espana += $pe['pob_2965'];
			$pob_6599_espana += $pe['pob_6599'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0514_porcentaje_espana'] = $pob_0514_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2029_porcentaje_espana'] = $pob_2029_espana*100/$total_espana;
		$salida['pob_2965_porcentaje_espana'] = $pob_2965_espana*100/$total_espana;
		$salida['pob_6599_porcentaje_espana'] = $pob_6599_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionInfoTablaLargaBarrios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0609,				
				sum(((x14_h + x14_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2024,
				sum(((x29_h + x29_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2529,
				sum(((x34_h + x34_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3034,
				sum(((x39_h + x39_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3539,
				sum(((x44_h + x44_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4044,
				sum(((x49_h + x49_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4549,
				sum(((x54_h + x54_m + x59_h + x59_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_5059,
				sum(((x64_h + x64_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6064,
				sum(((x69_h + x69_m + x74_h + x74_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6575,				
				sum(((x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_75
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
		
		$result = array();
		$pob_0005 = 0;
		$pob_0609 = 0;
		$pob_1014 = 0;
		$pob_1519 = 0;
		$pob_2024 = 0;
		$pob_2529 = 0;
		$pob_3034 = 0;
		$pob_3539 = 0;
		$pob_4044 = 0;
		$pob_4549 = 0;
		$pob_5059 = 0;
		$pob_6064 = 0;
		$pob_6575 = 0;
		$pob_75 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0609 += $p['pob_0609'];
			$pob_1014 += $p['pob_1014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2024 += $p['pob_2024'];
			$pob_2529 += $p['pob_2529'];			
			$pob_3034 += $p['pob_3034'];
			$pob_3539 += $p['pob_3539'];
			$pob_4044 += $p['pob_4044'];
			$pob_4549 += $p['pob_4549'];
			$pob_5059 += $p['pob_5059'];
			$pob_6064 += $p['pob_6064'];
			$pob_6575 += $p['pob_6575'];
			$pob_75 += $p['pob_75'];
		}
		$total = $pob_0005 + $pob_0609 + $pob_1014 + $pob_1519 + $pob_2024 + $pob_2529 + $pob_3034 + $pob_3539 + $pob_4044 + $pob_4549 + $pob_5059 + $pob_6064 + $pob_6575 + $pob_75;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0609'] = $pob_0609;
		$salida['pob_1014'] = $pob_1014;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2024'] = $pob_2024;
		$salida['pob_2529'] = $pob_2529;
		$salida['pob_3034'] = $pob_3034;
		$salida['pob_3539'] = $pob_3539;
		$salida['pob_4044'] = $pob_4044;
		$salida['pob_4549'] = $pob_4549;
		$salida['pob_5059'] = $pob_5059;
		$salida['pob_6064'] = $pob_6064;
		$salida['pob_6575'] = $pob_6575;
		$salida['pob_75'] = $pob_75;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0609_porcentaje'] = $pob_0609*100/$total;
		$salida['pob_1014_porcentaje'] = $pob_1014*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2024_porcentaje'] = $pob_2024*100/$total;
		$salida['pob_2529_porcentaje'] = $pob_2529*100/$total;
		$salida['pob_3034_porcentaje'] = $pob_3034*100/$total;
		$salida['pob_3539_porcentaje'] = $pob_3539*100/$total;
		$salida['pob_4044_porcentaje'] = $pob_4044*100/$total;
		$salida['pob_4549_porcentaje'] = $pob_4549*100/$total;
		$salida['pob_5059_porcentaje'] = $pob_5059*100/$total;
		$salida['pob_6064_porcentaje'] = $pob_6064*100/$total;
		$salida['pob_6575_porcentaje'] = $pob_6575*100/$total;
		$salida['pob_75_porcentaje'] = $pob_75*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m) as pob_0609,				
						(x14_h + x14_m) as pob_1014,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m) as pob_2024,
						(x29_h + x29_m) as pob_2529,
						(x34_h + x34_m) as pob_3034,
						(x39_h + x39_m) as pob_3539,
						(x44_h + x44_m) as pob_4044,
						(x49_h + x49_m) as pob_4549,
						(x54_h + x54_m + x59_h + x59_m) as pob_5059,
						(x64_h + x64_m) as pob_6064,
						(x69_h + x69_m + x74_h + x74_m) as pob_6575,				
						(x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_75
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0609_espana = 0;
		$pob_1014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2024_espana = 0;
		$pob_2529_espana = 0;
		$pob_3034_espana = 0;
		$pob_3539_espana = 0;
		$pob_4044_espana = 0;
		$pob_4549_espana = 0;
		$pob_5059_espana = 0;
		$pob_6064_espana = 0;
		$pob_6575_espana = 0;
		$pob_75_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0609_espana += $pe['pob_0609'];
			$pob_1014_espana += $pe['pob_1014'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2024_espana += $pe['pob_2024'];
			$pob_2529_espana += $pe['pob_2529'];			
			$pob_3034_espana += $pe['pob_3034'];
			$pob_3539_espana += $pe['pob_3539'];
			$pob_4044_espana += $pe['pob_4044'];
			$pob_4549_espana += $pe['pob_4549'];
			$pob_5059_espana += $pe['pob_5059'];
			$pob_6064_espana += $pe['pob_6064'];
			$pob_6575_espana += $pe['pob_6575'];
			$pob_75_espana += $pe['pob_75'];
		}
		$total_espana = $pob_0005_espana + $pob_0609_espana + $pob_1014_espana + $pob_1519_espana + $pob_2024_espana + $pob_2529_espana + $pob_3034_espana + $pob_3539_espana + $pob_4044_espana + $pob_4549_espana + $pob_5059_espana + $pob_6064_espana + $pob_6575_espana + $pob_75_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0609_porcentaje_espana'] = $pob_0609_espana*100/$total_espana;
		$salida['pob_1014_porcentaje_espana'] = $pob_1014_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2024_porcentaje_espana'] = $pob_2024_espana*100/$total_espana;
		$salida['pob_2529_porcentaje_espana'] = $pob_2529_espana*100/$total_espana;
		$salida['pob_3034_porcentaje_espana'] = $pob_3034_espana*100/$total_espana;
		$salida['pob_3539_porcentaje_espana'] = $pob_3539_espana*100/$total_espana;
		$salida['pob_4044_porcentaje_espana'] = $pob_4044_espana*100/$total_espana;
		$salida['pob_4549_porcentaje_espana'] = $pob_4549_espana*100/$total_espana;
		$salida['pob_5059_porcentaje_espana'] = $pob_5059_espana*100/$total_espana;
		$salida['pob_6064_porcentaje_espana'] = $pob_6064_espana*100/$total_espana;
		$salida['pob_6575_porcentaje_espana'] = $pob_6575_espana*100/$total_espana;
		$salida['pob_75_porcentaje_espana'] = $pob_75_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresBarrios($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"2\",
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"3\",
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"4\",
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \">4\"
			FROM 
				geo_barrios, 
				geo_sec_hogares_censo 
			WHERE 
				geo_barrios.geom && geo_sec_hogares_censo.geom AND 
				geo_barrios.cbarrio IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['1'];
			$hogares2 += $p['2'];
			$hogares3 += $p['3'];
			$hogares4 += $p['4'];
			$hogares5 += $p['>4'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$sqlPorcentaje="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"2\", 
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"3\", 
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"4\", 
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \">4\"
			FROM 
				geo_barrios, 
				geo_sec_hogares_censo 
			WHERE 
				geo_barrios.geom && geo_sec_hogares_censo.geom AND 
				geo_barrios.cbarrio IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT
						sum(est_hogares1) * 100 / sum(est_hogares_total) as hogares1, 
						sum(est_hogares2) * 100 / sum(est_hogares_total) as hogares2,
						sum(est_hogares3) * 100 / sum(est_hogares_total) as hogares3,
						sum(est_hogares4) * 100 / sum(est_hogares_total) as hogares4,
						sum(est_hogares5) * 100 / sum(est_hogares_total) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogaresBarrios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares1, 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares2,
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares3,
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares4,
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares5
			FROM 
				geo_barrios, 
				geo_sec_hogares_censo 
			WHERE 
				geo_barrios.geom && geo_sec_hogares_censo.geom AND 
				geo_barrios.cbarrio IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT  
						sum(est_hogares1) as hogares1, 
						sum(est_hogares2) as hogares2,
						sum(est_hogares3) as hogares3,
						sum(est_hogares4) as hogares4,
						sum(est_hogares5) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresICEBarrios($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Bajo\", 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Bajo\"
				FROM 
					geo_barrios, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					geo_barrios.geom && geo_sec_hogares_censo.geom AND 
					geo_barrios.cbarrio IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio\"
				FROM 
					geo_barrios, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					geo_barrios.geom && geo_sec_hogares_censo.geom AND 
					geo_barrios.cbarrio IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Alto\"
				FROM 
					geo_barrios, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					geo_barrios.geom && geo_sec_hogares_censo.geom AND 
					geo_barrios.cbarrio IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Alto\"
				FROM 
					geo_barrios, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					geo_barrios.geom && geo_sec_hogares_censo.geom AND 
					geo_barrios.cbarrio IN (" . $id . "))
			FROM 
				geo_barrios, 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				geo_barrios.geom && geo_sec_hogares_censo.geom AND 
				geo_barrios.cbarrio IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['Bajo'];
			$hogares2 += $p['Medio-Bajo'];
			$hogares3 += $p['Medio'];
			$hogares4 += $p['Medio-Alto'];
			$hogares5 += $p['Alto'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;		
		
		$sqlPorcentaje="SELECT  
							COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Bajo\", 
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Bajo\"
							FROM 
								geo_barrios, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
								geo_barrios.geom && geo_sec_hogares_censo.geom AND 
								geo_barrios.cbarrio IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio\"
							FROM 
								geo_barrios, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
								geo_barrios.geom && geo_sec_hogares_censo.geom AND 
								geo_barrios.cbarrio IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Alto\"
							FROM 
								geo_barrios, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
								geo_barrios.geom && geo_sec_hogares_censo.geom AND 
								geo_barrios.cbarrio IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Alto\"
							FROM 
								geo_barrios, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro > 39800 AND
								geo_barrios.geom && geo_sec_hogares_censo.geom AND 
								geo_barrios.cbarrio IN (" . $id . "))
						FROM 
							geo_barrios, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						WHERE 
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
							estimacion_ice_euro < 13300 AND
							geo_barrios.geom && geo_sec_hogares_censo.geom AND 
							geo_barrios.cbarrio IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
				
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";					
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						geo_barrios, 
						geo_sec_hogares_censo,
						tbl_hogares_arvato
					WHERE 
						tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
						geo_barrios.geom && geo_sec_hogares_censo.geom AND 
						geo_barrios.cbarrio IN (" . $id . ")";				
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							geo_barrios, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						where
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND								 
							ST_Intersects(geo_barrios.geom, ST_Centroid(geo_sec_hogares_censo.geom)) AND
							geo_barrios.cbarrio IN (" . $id . ")						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
	//-------------------
	$sqlTotalHogaresSeleccion="SELECT
						hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
					FROM 
						tbl_hogares_arvato						
					GROUP BY
						hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
	
	$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
		'pagination'=>false
	));
	
	$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
	
	$hogar1Seleccion = 0;	
	$hogar2Seleccion = 0;	
	$hogar3Seleccion = 0;	
	$hogar4Seleccion = 0;	
	$hogar5Seleccion = 0;	
	foreach($totSeleccion as $bSeleccion){			
		$hogar1Seleccion += $bSeleccion['hog_ice_1'];
		$hogar2Seleccion += $bSeleccion['hog_ice_2'];
		$hogar3Seleccion += $bSeleccion['hog_ice_3'];
		$hogar4Seleccion += $bSeleccion['hog_ice_4'];
		$hogar5Seleccion += $bSeleccion['hog_ice_5'];
	}
	$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
	$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
	
	$estimacionBase = $R3*100/$R1;
	
	echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData(), (int)$estimacionBase));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogaresICEBarrios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$sql="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares1, 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares2
				FROM 
					geo_barrios, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					geo_barrios.geom && geo_sec_hogares_censo.geom AND 
					geo_barrios.cbarrio IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares3
				FROM 
					geo_barrios, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					geo_barrios.geom && geo_sec_hogares_censo.geom AND 
					geo_barrios.cbarrio IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares4
				FROM 
					geo_barrios, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					geo_barrios.geom && geo_sec_hogares_censo.geom AND 
					geo_barrios.cbarrio IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_barrios.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares5
				FROM 
					geo_barrios, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					geo_barrios.geom && geo_sec_hogares_censo.geom AND 
					geo_barrios.cbarrio IN (" . $cp . "))
			FROM 
				geo_barrios, 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				geo_barrios.geom && geo_sec_hogares_censo.geom AND 
				geo_barrios.cbarrio IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionMapaHogaresDesviacionBarrios($cp){
		
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
		$lyr = $map->getLayerByName("desviacionRentaBarrios");
		//geo_barrios.geom && geo_sec_hogares_censo.geom
		$lyr->data = "geom FROM (SELECT 	
									round(desviacion_ice_respecto_nacional) as desviacion_ice_respecto_nacional,
									tbl_hogares_arvato.cod_secc as cod_secc, 
									geo_sec_hogares_censo.geom as geom,	
									geo_sec_hogares_censo.gid as gid
								FROM 
									public.geo_sec_hogares_censo,
									public.tbl_hogares_arvato, 
									public.geo_barrios
								WHERE  
									geo_barrios.cbarrio IN (" . $cp . ") AND
									tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND									
									ST_Intersects(geo_barrios.geom , geo_sec_hogares_censo.geom)
								group by 
									tbl_hogares_arvato.cod_secc, 
									geo_sec_hogares_censo.geom,
									geo_sec_hogares_censo.gid,
									desviacion_ice_respecto_nacional)
		as subquery USING UNIQUE cod_secc USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionMapaSeleccionBarrios($cp){
		
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
		$lyr = $map->getLayerByName("mapaSeleccionBarrios");
		
		$lyr->data = "geom FROM (SELECT 
									geo_barrios.nombre, 
									geo_barrios.cbarrio, 
									geo_barrios.geom, 
									gid
								FROM 
									public.geo_barrios 
								WHERE 
									geo_barrios.cbarrio IN (" . $cp . "))
		as subquery USING UNIQUE cbarrio USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionInfoTablaIndicadoresBarrios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// ICE Base
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						geo_barrios, 
						geo_sec_hogares_censo,
						tbl_hogares_arvato
					WHERE 
						tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
						geo_barrios.geom && geo_sec_hogares_censo.geom AND 
						geo_barrios.cbarrio IN (" . $id . ")";				
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							geo_barrios, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						where
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND								 
							ST_Intersects(geo_barrios.geom, ST_Centroid(geo_sec_hogares_censo.geom)) AND
							geo_barrios.cbarrio IN (" . $cp . ")						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;		
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de envejecimiento y tasa de dependencia
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1565,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		$pob_0014 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_1565 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_0014 += $p['pob_0014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_1565 += $p['pob_1565'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}						
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005_espana, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514_espana,
						(x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) as pob_0014_espana,
						(x19_h + x19_m) as pob_1519_espana,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029_espana,
						(x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_1565_espana,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965_espana,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599_espana
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_0014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_1565_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005_espana'];
			$pob_0514_espana += $pe['pob_0514_espana'];
			$pob_0014_espana += $pe['pob_0014_espana'];
			$pob_1519_espana += $pe['pob_1519_espana'];
			$pob_2029_espana += $pe['pob_2029_espana'];
			$pob_1565_espana += $pe['pob_1565_espana'];
			$pob_2965_espana += $pe['pob_2965_espana'];
			$pob_6599_espana += $pe['pob_6599_espana'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Población vinculada no residente municipio
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sqlPobVinculada="SELECT
						sum(pobl_vincu) as pobl_vincu
					FROM 
						geo_barrios, 
						geo_mun,
						tbl_pobl_vinculada
					WHERE 
						tbl_pobl_vinculada.cod_mun = geo_mun.cod_mun AND
						geo_barrios.geom && geo_mun.geom AND 
						st_within(st_centroid(geo_barrios.geom), geo_mun.geom) AND						
						geo_barrios.cbarrio IN (" . $cp . ")";				
		
		$dataProviderPobVinculada=new CSqlDataProvider($sqlPobVinculada, array(
			'pagination'=>false
		));
		
		$pobVinculada = $dataProviderPobVinculada->getData();
		
		$cifraPobVinculada = 0;		
		foreach($pobVinculada as $a){
			$cifraPobVinculada += $a['pobl_vincu'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Nivel de estudios y accesibilidad
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		//AVG(((accesibilidad)* ST_Area(ST_Intersection(geo_barrios.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as accesibilidad, 
		$sqlAccesibilidadEstudios="SELECT  
										AVG(accesibilidad) as accesibilidad,
										AVG(nivel_estudios) as nivel_estudios,
										sum(total) as total
									FROM 
										geo_barrios, 
										geo_ine_secciones 
									WHERE 
										ST_Intersects(geo_barrios.geom , geo_ine_secciones.geom) AND
										geo_barrios.geom && geo_ine_secciones.geom AND 
										geo_barrios.cbarrio IN (" . $cp . ")";
		
		$dataProviderAccesibilidadEstudios=new CSqlDataProvider($sqlAccesibilidadEstudios, array(
			'pagination'=>false
		));
		$AccesibilidadEstudios = $dataProviderAccesibilidadEstudios->getData();
				
		$accesibilidad = 0;
		$nivel_estudios = 0;
		$totalPoblacion = 0;

		foreach($AccesibilidadEstudios as $p){
			$accesibilidad += $p['accesibilidad'];
			$nivel_estudios += $p['nivel_estudios'];
			$totalPoblacion += $p['total'];
		}
		//Nacional
		$sqlAccesibilidadEstudiosNacional="SELECT  
												(SELECT AVG(accesibilidad) as accesibilidad FROM tbl_ine_espana),
												AVG(nivel_estudios) as nivel_estudios,
												sum(total) as total
											FROM 
												geo_ine_secciones";
		
		$dataProviderAccesibilidadEstudiosNacional=new CSqlDataProvider($sqlAccesibilidadEstudiosNacional, array(
			'pagination'=>false
		));
		$AccesibilidadEstudiosNacional = $dataProviderAccesibilidadEstudiosNacional->getData();
				
		$accesibilidadNacional = 0;
		$nivel_estudiosNacional = 0;
		$totalPoblacionNacional = 0;

		foreach($AccesibilidadEstudiosNacional as $p){
			$accesibilidadNacional += $p['accesibilidad'];
			$nivel_estudiosNacional += $p['nivel_estudios'];
			$totalPoblacionNacional += $p['total'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de Desempleo SEPE
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sqlDesempleo="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa					
					FROM 
						geo_barrios, 
						geo_mun,
						tbl_desempleo
					WHERE 
						tbl_desempleo.municipio = geo_mun.cod_mun AND
						geo_barrios.geom && geo_mun.geom AND 
						st_within(st_centroid(geo_barrios.geom), geo_mun.geom) AND						
						geo_barrios.cbarrio IN (" . $cp . ")";				
		
		$dataProviderDesempleo=new CSqlDataProvider($sqlDesempleo, array(
			'pagination'=>false
		));
		
		$desempleo = $dataProviderDesempleo->getData();
		
		$cifraDesempleo = 0;
		$pob_activa = 0;
		foreach($desempleo as $a){
			$cifraDesempleo += $a['tasa_desempleo'];
			$pob_activa += $a['pob_activa'];
		}
		//Nacional
		$sqlDesempleoNacional="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa
					FROM 
						tbl_desempleo";				
		
		$dataProviderDesempleoNacional=new CSqlDataProvider($sqlDesempleoNacional, array(
			'pagination'=>false
		));
		
		$desempleoNacional = $dataProviderDesempleoNacional->getData();
		
		$cifraDesempleoNacional = 0;	
		foreach($desempleoNacional as $a){
			$cifraDesempleoNacional += $a['tasa_desempleo'];
		}		
		
		//-------------------------------------------------------------------------------------------------------------------
		//Datos a mostrar en la vista.
		//-------------------------------------------------------------------------------------------------------------------
		
		//Índice de envejecimiento
		//Población
		$totalPoblacionEnvejecimiento = $pob_6599;
		$salida['totalPoblacionEnvejecimiento'] = $totalPoblacionEnvejecimiento;
		//Selección
		//$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) / ($pob_6599_espana / $pob_0014_espana) * 100;
		$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) * 100;
		$salida['porcentajeEnvejecimientoSeleccion'] = $porcentajeEnvejecimientoSeleccion;
		//Nacional
		$porcentajeEnvejecimientoNacional = ($pob_6599_espana / $pob_0014_espana) * 100;
		$salida['porcentajeEnvejecimientoNacional'] = $porcentajeEnvejecimientoNacional;
		//Gráfico
		$salida['porcentajeEnvejecimientoSeleccionGrafico'] = ($porcentajeEnvejecimientoSeleccion / $porcentajeEnvejecimientoNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de dependencia
		//Población
		$totalPoblacionDependencia = $pob_0014 + $pob_6599;
		$salida['totalPoblacionDependencia'] = $totalPoblacionDependencia;
		//Selección
		//$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) / (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) * 100;
		$salida['porcentajeDependenciaSeleccion'] = $porcentajeDependenciaSeleccion;
		//Nacional
		$porcentajeDependenciaNacional = (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$salida['porcentajeDependenciaNacional'] = $porcentajeDependenciaNacional;
		//Gráfico
		$salida['porcentajeDependenciaSeleccionGrafico'] = ($porcentajeDependenciaSeleccion / $porcentajeDependenciaNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de infancia
		//Población
		$totalPoblacionInfancia = (int)$pob_0014;
		$salida['totalPoblacionInfancia'] = $totalPoblacionInfancia;
		//Selección
		$porcentajeInfanciaSeleccion = ($pob_0014 / $total) * 100;
		$salida['porcentajeInfanciaSeleccion'] = $porcentajeInfanciaSeleccion;
		//Nacional
		$porcentajeInfanciaNacional = ($pob_0014_espana / $total_espana) * 100;
		$salida['porcentajeInfanciaNacional'] = $porcentajeInfanciaNacional;
		//Gráfico
		$salida['porcentajeInfanciaSeleccionGrafico'] = ($porcentajeInfanciaSeleccion / $porcentajeInfanciaNacional) *100;
		
		//------------------------------------------------------
		
		//Tasa de vejez
		//Población
		$totalPoblacionVejez = (int)$pob_6599;
		$salida['totalPoblacionVejez'] = $totalPoblacionVejez;
		//Selección
		$porcentajeVejezSeleccion = ($pob_6599 / $total) * 100;
		$salida['porcentajeVejezSeleccion'] = $porcentajeVejezSeleccion;
		//Nacional
		$porcentajeVejezNacional = ($pob_6599_espana / $total_espana) * 100;
		$salida['porcentajeVejezNacional'] = $porcentajeVejezNacional;
		//Gráfico
		$salida['porcentajeVejezSeleccionGrafico'] = ($porcentajeVejezSeleccion / $porcentajeVejezNacional) * 100;
		
		//------------------------------------------------------
		
		//ICE
		$salida['ICE'] = (int)$estimacionBase;		
		
		//------------------------------------------------------
		
		//Población vinculada no residente municipio
		$salida['pobVinculada'] = (int)$cifraPobVinculada;
		
		//------------------------------------------------------
		
		//Accesibilidad y nivel de estudios
		//Población
		$salida['totalPoblacion'] = (int)$totalPoblacion;
		//Selección
		$salida['accesibilidad'] = $accesibilidad;		
		$salida['nivel_estudios'] = $nivel_estudios;
		//Nacional		
		$salida['accesibilidadNacional'] = $accesibilidadNacional;		
		$salida['nivel_estudiosNacional'] = $nivel_estudiosNacional;
		//Gráfico
		$salida['accesibilidadSeleccionGrafico'] = ($accesibilidad / $accesibilidadNacional) * 100;
		$salida['nivel_estudiosSeleccionGrafico'] = ($nivel_estudios / $nivel_estudiosNacional) * 100;		
		
		//------------------------------------------------------
		
		//Índice de Desempleo SEPE
		$salida['cifraDesempleo'] = $cifraDesempleo;
		//Nacional
		$salida['cifraDesempleoNacional'] = $cifraDesempleoNacional;
		//Gráfico
		$salida['cifraDesempleoPorcentaje'] = ($cifraDesempleo / $cifraDesempleoNacional) * 100;		
		$salida['pob_activa'] = (int)$pob_activa;
		//------------------------------------------------------
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//ENTORNO: Funciones Distritos
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function actionInfoEntornoPoblacionDistritos($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
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
				geo_distritos.cod_distri IN (" . $id . ")";
		
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
		
		$sqlPorcentaje="SELECT  
				sum(((x4_h + x4_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"5-14\",
				sum(((x19_h + x19_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"15-19 \",
				sum(((x24_h + x24_m + x29_h + x29_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \">65\"
			FROM 
				geo_distritos, 
				geo_ine_secciones
			WHERE 
				geo_distritos.geom && geo_ine_secciones.geom AND 
				geo_distritos.cod_distri IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) * 100 / total as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) * 100 / total as pob_0514,
						(x19_h + x19_m) * 100 / total as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) * 100 / total as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * 100 / total as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * 100 / total as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	public function actionInfoTablaCortaDistritos($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		
		$result = array();
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0514'] = $pob_0514;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2029'] = $pob_2029;
		$salida['pob_2965'] = $pob_2965;
		$salida['pob_6599'] = $pob_6599;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0514_porcentaje'] = $pob_0514*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2029_porcentaje'] = $pob_2029*100/$total;
		$salida['pob_2965_porcentaje'] = $pob_2965*100/$total;
		$salida['pob_6599_porcentaje'] = $pob_6599*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0514_espana += $pe['pob_0514'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2029_espana += $pe['pob_2029'];
			$pob_2965_espana += $pe['pob_2965'];
			$pob_6599_espana += $pe['pob_6599'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0514_porcentaje_espana'] = $pob_0514_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2029_porcentaje_espana'] = $pob_2029_espana*100/$total_espana;
		$salida['pob_2965_porcentaje_espana'] = $pob_2965_espana*100/$total_espana;
		$salida['pob_6599_porcentaje_espana'] = $pob_6599_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionInfoTablaLargaDistritos($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0609,				
				sum(((x14_h + x14_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2024,
				sum(((x29_h + x29_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2529,
				sum(((x34_h + x34_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3034,
				sum(((x39_h + x39_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3539,
				sum(((x44_h + x44_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4044,
				sum(((x49_h + x49_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4549,
				sum(((x54_h + x54_m + x59_h + x59_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_5059,
				sum(((x64_h + x64_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6064,
				sum(((x69_h + x69_m + x74_h + x74_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6575,				
				sum(((x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_75
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
		
		$result = array();
		$pob_0005 = 0;
		$pob_0609 = 0;
		$pob_1014 = 0;
		$pob_1519 = 0;
		$pob_2024 = 0;
		$pob_2529 = 0;
		$pob_3034 = 0;
		$pob_3539 = 0;
		$pob_4044 = 0;
		$pob_4549 = 0;
		$pob_5059 = 0;
		$pob_6064 = 0;
		$pob_6575 = 0;
		$pob_75 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0609 += $p['pob_0609'];
			$pob_1014 += $p['pob_1014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2024 += $p['pob_2024'];
			$pob_2529 += $p['pob_2529'];			
			$pob_3034 += $p['pob_3034'];
			$pob_3539 += $p['pob_3539'];
			$pob_4044 += $p['pob_4044'];
			$pob_4549 += $p['pob_4549'];
			$pob_5059 += $p['pob_5059'];
			$pob_6064 += $p['pob_6064'];
			$pob_6575 += $p['pob_6575'];
			$pob_75 += $p['pob_75'];
		}
		$total = $pob_0005 + $pob_0609 + $pob_1014 + $pob_1519 + $pob_2024 + $pob_2529 + $pob_3034 + $pob_3539 + $pob_4044 + $pob_4549 + $pob_5059 + $pob_6064 + $pob_6575 + $pob_75;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0609'] = $pob_0609;
		$salida['pob_1014'] = $pob_1014;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2024'] = $pob_2024;
		$salida['pob_2529'] = $pob_2529;
		$salida['pob_3034'] = $pob_3034;
		$salida['pob_3539'] = $pob_3539;
		$salida['pob_4044'] = $pob_4044;
		$salida['pob_4549'] = $pob_4549;
		$salida['pob_5059'] = $pob_5059;
		$salida['pob_6064'] = $pob_6064;
		$salida['pob_6575'] = $pob_6575;
		$salida['pob_75'] = $pob_75;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0609_porcentaje'] = $pob_0609*100/$total;
		$salida['pob_1014_porcentaje'] = $pob_1014*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2024_porcentaje'] = $pob_2024*100/$total;
		$salida['pob_2529_porcentaje'] = $pob_2529*100/$total;
		$salida['pob_3034_porcentaje'] = $pob_3034*100/$total;
		$salida['pob_3539_porcentaje'] = $pob_3539*100/$total;
		$salida['pob_4044_porcentaje'] = $pob_4044*100/$total;
		$salida['pob_4549_porcentaje'] = $pob_4549*100/$total;
		$salida['pob_5059_porcentaje'] = $pob_5059*100/$total;
		$salida['pob_6064_porcentaje'] = $pob_6064*100/$total;
		$salida['pob_6575_porcentaje'] = $pob_6575*100/$total;
		$salida['pob_75_porcentaje'] = $pob_75*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m) as pob_0609,				
						(x14_h + x14_m) as pob_1014,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m) as pob_2024,
						(x29_h + x29_m) as pob_2529,
						(x34_h + x34_m) as pob_3034,
						(x39_h + x39_m) as pob_3539,
						(x44_h + x44_m) as pob_4044,
						(x49_h + x49_m) as pob_4549,
						(x54_h + x54_m + x59_h + x59_m) as pob_5059,
						(x64_h + x64_m) as pob_6064,
						(x69_h + x69_m + x74_h + x74_m) as pob_6575,				
						(x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_75
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0609_espana = 0;
		$pob_1014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2024_espana = 0;
		$pob_2529_espana = 0;
		$pob_3034_espana = 0;
		$pob_3539_espana = 0;
		$pob_4044_espana = 0;
		$pob_4549_espana = 0;
		$pob_5059_espana = 0;
		$pob_6064_espana = 0;
		$pob_6575_espana = 0;
		$pob_75_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0609_espana += $pe['pob_0609'];
			$pob_1014_espana += $pe['pob_1014'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2024_espana += $pe['pob_2024'];
			$pob_2529_espana += $pe['pob_2529'];			
			$pob_3034_espana += $pe['pob_3034'];
			$pob_3539_espana += $pe['pob_3539'];
			$pob_4044_espana += $pe['pob_4044'];
			$pob_4549_espana += $pe['pob_4549'];
			$pob_5059_espana += $pe['pob_5059'];
			$pob_6064_espana += $pe['pob_6064'];
			$pob_6575_espana += $pe['pob_6575'];
			$pob_75_espana += $pe['pob_75'];
		}
		$total_espana = $pob_0005_espana + $pob_0609_espana + $pob_1014_espana + $pob_1519_espana + $pob_2024_espana + $pob_2529_espana + $pob_3034_espana + $pob_3539_espana + $pob_4044_espana + $pob_4549_espana + $pob_5059_espana + $pob_6064_espana + $pob_6575_espana + $pob_75_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0609_porcentaje_espana'] = $pob_0609_espana*100/$total_espana;
		$salida['pob_1014_porcentaje_espana'] = $pob_1014_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2024_porcentaje_espana'] = $pob_2024_espana*100/$total_espana;
		$salida['pob_2529_porcentaje_espana'] = $pob_2529_espana*100/$total_espana;
		$salida['pob_3034_porcentaje_espana'] = $pob_3034_espana*100/$total_espana;
		$salida['pob_3539_porcentaje_espana'] = $pob_3539_espana*100/$total_espana;
		$salida['pob_4044_porcentaje_espana'] = $pob_4044_espana*100/$total_espana;
		$salida['pob_4549_porcentaje_espana'] = $pob_4549_espana*100/$total_espana;
		$salida['pob_5059_porcentaje_espana'] = $pob_5059_espana*100/$total_espana;
		$salida['pob_6064_porcentaje_espana'] = $pob_6064_espana*100/$total_espana;
		$salida['pob_6575_porcentaje_espana'] = $pob_6575_espana*100/$total_espana;
		$salida['pob_75_porcentaje_espana'] = $pob_75_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresDistritos($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"2\",
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"3\",
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"4\",
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \">4\"
			FROM 
				geo_distritos, 
				geo_sec_hogares_censo 
			WHERE 
				geo_distritos.geom && geo_sec_hogares_censo.geom AND 
				geo_distritos.cod_distri IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['1'];
			$hogares2 += $p['2'];
			$hogares3 += $p['3'];
			$hogares4 += $p['4'];
			$hogares5 += $p['>4'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$sqlPorcentaje="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"2\", 
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"3\", 
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"4\", 
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \">4\"
			FROM 
				geo_distritos, 
				geo_sec_hogares_censo 
			WHERE 
				geo_distritos.geom && geo_sec_hogares_censo.geom AND 
				geo_distritos.cod_distri IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT
						sum(est_hogares1) * 100 / sum(est_hogares_total) as hogares1, 
						sum(est_hogares2) * 100 / sum(est_hogares_total) as hogares2,
						sum(est_hogares3) * 100 / sum(est_hogares_total) as hogares3,
						sum(est_hogares4) * 100 / sum(est_hogares_total) as hogares4,
						sum(est_hogares5) * 100 / sum(est_hogares_total) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogaresDistritos($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((est_hogares1)* ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares1, 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares2,
				sum(((est_hogares3)* ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares3,
				sum(((est_hogares4)* ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares4,
				sum(((est_hogares5)* ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares5
			FROM 
				geo_distritos, 
				geo_sec_hogares_censo 
			WHERE 
				geo_distritos.geom && geo_sec_hogares_censo.geom AND 
				geo_distritos.cod_distri IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT  
						sum(est_hogares1) as hogares1, 
						sum(est_hogares2) as hogares2,
						sum(est_hogares3) as hogares3,
						sum(est_hogares4) as hogares4,
						sum(est_hogares5) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresICEDistritos($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Bajo\", 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Bajo\"
				FROM 
					geo_distritos, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					geo_distritos.geom && geo_sec_hogares_censo.geom AND 
					geo_distritos.cod_distri IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio\"
				FROM 
					geo_distritos, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					geo_distritos.geom && geo_sec_hogares_censo.geom AND 
					geo_distritos.cod_distri IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Alto\"
				FROM 
					geo_distritos, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					geo_distritos.geom && geo_sec_hogares_censo.geom AND 
					geo_distritos.cod_distri IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Alto\"
				FROM 
					geo_distritos, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					geo_distritos.geom && geo_sec_hogares_censo.geom AND 
					geo_distritos.cod_distri IN (" . $id . "))
			FROM 
				geo_distritos, 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				geo_distritos.geom && geo_sec_hogares_censo.geom AND 
				geo_distritos.cod_distri IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['Bajo'];
			$hogares2 += $p['Medio-Bajo'];
			$hogares3 += $p['Medio'];
			$hogares4 += $p['Medio-Alto'];
			$hogares5 += $p['Alto'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;		
		
		$sqlPorcentaje="SELECT  
							COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Bajo\", 
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Bajo\"
							FROM 
								geo_distritos, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
								geo_distritos.geom && geo_sec_hogares_censo.geom AND 
								geo_distritos.cod_distri IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio\"
							FROM 
								geo_distritos, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
								geo_distritos.geom && geo_sec_hogares_censo.geom AND 
								geo_distritos.cod_distri IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Alto\"
							FROM 
								geo_distritos, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
								geo_distritos.geom && geo_sec_hogares_censo.geom AND 
								geo_distritos.cod_distri IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Alto\"
							FROM 
								geo_distritos, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro > 39800 AND
								geo_distritos.geom && geo_sec_hogares_censo.geom AND 
								geo_distritos.cod_distri IN (" . $id . "))
						FROM 
							geo_distritos, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						WHERE 
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
							estimacion_ice_euro < 13300 AND
							geo_distritos.geom && geo_sec_hogares_censo.geom AND 
							geo_distritos.cod_distri IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
				
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";					
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						geo_distritos, 
						geo_sec_hogares_censo,
						tbl_hogares_arvato
					WHERE 
						tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
						geo_distritos.geom && geo_sec_hogares_censo.geom AND 
						geo_distritos.cod_distri IN (" . $id . ")";				
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							geo_distritos, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						where
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
							ST_Intersects(geo_distritos.geom, ST_Centroid(geo_sec_hogares_censo.geom)) AND
							geo_distritos.cod_distri IN (" . $id . ")						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;
	
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData(), (int)$estimacionBase));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogaresICEDistritos($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$sql="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares1, 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares2
				FROM 
					geo_distritos, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					geo_distritos.geom && geo_sec_hogares_censo.geom AND 
					geo_distritos.cod_distri IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares3
				FROM 
					geo_distritos, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					geo_distritos.geom && geo_sec_hogares_censo.geom AND 
					geo_distritos.cod_distri IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares4
				FROM 
					geo_distritos, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					geo_distritos.geom && geo_sec_hogares_censo.geom AND 
					geo_distritos.cod_distri IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_distritos.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares5
				FROM 
					geo_distritos, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					geo_distritos.geom && geo_sec_hogares_censo.geom AND 
					geo_distritos.cod_distri IN (" . $cp . "))
			FROM 
				geo_distritos, 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				geo_distritos.geom && geo_sec_hogares_censo.geom AND 
				geo_distritos.cod_distri IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionMapaHogaresDesviacionDistritos($cp){
		
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
		$lyr = $map->getLayerByName("desviacionRentaDistritos");
		
		$lyr->data = "geom FROM (SELECT 	
									round(desviacion_ice_respecto_nacional) as desviacion_ice_respecto_nacional,
									tbl_hogares_arvato.cod_secc as cod_secc, 
									geo_sec_hogares_censo.geom as geom,	
									geo_sec_hogares_censo.gid as gid
								FROM 
									public.geo_sec_hogares_censo,
									public.tbl_hogares_arvato, 
									public.geo_distritos
								WHERE 
									geo_distritos.cod_distri IN (" . $cp . ") AND
									tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
									ST_Intersects(geo_distritos.geom , geo_sec_hogares_censo.geom)
								group by 
									tbl_hogares_arvato.cod_secc, 
									geo_sec_hogares_censo.geom,
									geo_sec_hogares_censo.gid,
									desviacion_ice_respecto_nacional)
		as subquery USING UNIQUE cod_secc USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionMapaSeleccionDistritos($cp){
		
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
		$lyr = $map->getLayerByName("mapaSeleccionDistritos");
		
		$lyr->data = "geom FROM (SELECT 
									geo_distritos.cod_distri, 
									geo_distritos.geom, 
									gid
								FROM 
									public.geo_distritos 
								WHERE 
									geo_distritos.cod_distri IN (" . $cp . "))
		as subquery USING UNIQUE cod_distri USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionInfoTablaIndicadoresDistritos($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// ICE Base
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						geo_distritos, 
						geo_sec_hogares_censo,
						tbl_hogares_arvato
					WHERE 
						tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
						geo_distritos.geom && geo_sec_hogares_censo.geom AND 
						geo_distritos.cod_distri IN (" . $id . ")";				
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							geo_distritos, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						where
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
							ST_Intersects(geo_distritos.geom, ST_Centroid(geo_sec_hogares_censo.geom)) AND
							geo_distritos.cod_distri IN (" . $cp . ")						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;		
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de envejecimiento y tasa de dependencia
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1565,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		$pob_0014 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_1565 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_0014 += $p['pob_0014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_1565 += $p['pob_1565'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}						
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005_espana, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514_espana,
						(x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) as pob_0014_espana,
						(x19_h + x19_m) as pob_1519_espana,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029_espana,
						(x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_1565_espana,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965_espana,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599_espana
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_0014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_1565_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005_espana'];
			$pob_0514_espana += $pe['pob_0514_espana'];
			$pob_0014_espana += $pe['pob_0014_espana'];
			$pob_1519_espana += $pe['pob_1519_espana'];
			$pob_2029_espana += $pe['pob_2029_espana'];
			$pob_1565_espana += $pe['pob_1565_espana'];
			$pob_2965_espana += $pe['pob_2965_espana'];
			$pob_6599_espana += $pe['pob_6599_espana'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Población vinculada no residente municipio
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sqlPobVinculada="SELECT
						sum(pobl_vincu) as pobl_vincu
					FROM 
						geo_distritos, 
						geo_mun,
						tbl_pobl_vinculada
					WHERE 
						tbl_pobl_vinculada.cod_mun = geo_mun.cod_mun AND
						geo_distritos.geom && geo_mun.geom AND 
						st_within(st_centroid(geo_distritos.geom), geo_mun.geom) AND						
						geo_distritos.cod_distri IN (" . $cp . ")";				
		
		$dataProviderPobVinculada=new CSqlDataProvider($sqlPobVinculada, array(
			'pagination'=>false
		));
		
		$pobVinculada = $dataProviderPobVinculada->getData();
		
		$cifraPobVinculada = 0;		
		foreach($pobVinculada as $a){
			$cifraPobVinculada += $a['pobl_vincu'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Nivel de estudios y accesibilidad
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		//AVG(((accesibilidad)* ST_Area(ST_Intersection(geo_distritos.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as accesibilidad, 
		$sqlAccesibilidadEstudios="SELECT  
										AVG(accesibilidad) as accesibilidad,
										AVG(nivel_estudios) as nivel_estudios,
										sum(total) as total
									FROM 
										geo_distritos, 
										geo_ine_secciones 
									WHERE 
										ST_Intersects(geo_distritos.geom , geo_ine_secciones.geom) AND
										geo_distritos.geom && geo_ine_secciones.geom AND 
										geo_distritos.cod_distri IN (" . $cp . ")";
		
		$dataProviderAccesibilidadEstudios=new CSqlDataProvider($sqlAccesibilidadEstudios, array(
			'pagination'=>false
		));
		$AccesibilidadEstudios = $dataProviderAccesibilidadEstudios->getData();
				
		$accesibilidad = 0;
		$nivel_estudios = 0;
		$totalPoblacion = 0;

		foreach($AccesibilidadEstudios as $p){
			$accesibilidad += $p['accesibilidad'];
			$nivel_estudios += $p['nivel_estudios'];
			$totalPoblacion += $p['total'];
		}
		//Nacional
		$sqlAccesibilidadEstudiosNacional="SELECT  
												(SELECT AVG(accesibilidad) as accesibilidad FROM tbl_ine_espana),
												AVG(nivel_estudios) as nivel_estudios,
												sum(total) as total
											FROM 
												geo_ine_secciones";
		
		$dataProviderAccesibilidadEstudiosNacional=new CSqlDataProvider($sqlAccesibilidadEstudiosNacional, array(
			'pagination'=>false
		));
		$AccesibilidadEstudiosNacional = $dataProviderAccesibilidadEstudiosNacional->getData();
				
		$accesibilidadNacional = 0;
		$nivel_estudiosNacional = 0;
		$totalPoblacionNacional = 0;

		foreach($AccesibilidadEstudiosNacional as $p){
			$accesibilidadNacional += $p['accesibilidad'];
			$nivel_estudiosNacional += $p['nivel_estudios'];
			$totalPoblacionNacional += $p['total'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de Desempleo SEPE
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		$sqlDesempleo="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa					
					FROM 
						geo_distritos, 
						geo_mun,
						tbl_desempleo
					WHERE 
						tbl_desempleo.municipio = geo_mun.cod_mun AND
						geo_distritos.geom && geo_mun.geom AND 
						st_within(st_centroid(geo_distritos.geom), geo_mun.geom) AND						
						geo_distritos.cod_distri IN (" . $cp . ")";				
		
		$dataProviderDesempleo=new CSqlDataProvider($sqlDesempleo, array(
			'pagination'=>false
		));
		
		$desempleo = $dataProviderDesempleo->getData();
		
		$cifraDesempleo = 0;
		$pob_activa = 0;
		foreach($desempleo as $a){
			$cifraDesempleo += $a['tasa_desempleo'];
			$pob_activa += $a['pob_activa'];
		}
		//Nacional
		$sqlDesempleoNacional="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa
					FROM 
						tbl_desempleo";				
		
		$dataProviderDesempleoNacional=new CSqlDataProvider($sqlDesempleoNacional, array(
			'pagination'=>false
		));
		
		$desempleoNacional = $dataProviderDesempleoNacional->getData();
		
		$cifraDesempleoNacional = 0;	
		foreach($desempleoNacional as $a){
			$cifraDesempleoNacional += $a['tasa_desempleo'];
		}		
		
		//-------------------------------------------------------------------------------------------------------------------
		//Datos a mostrar en la vista.
		//-------------------------------------------------------------------------------------------------------------------
		
		//Índice de envejecimiento
		//Población
		$totalPoblacionEnvejecimiento = $pob_6599;
		$salida['totalPoblacionEnvejecimiento'] = $totalPoblacionEnvejecimiento;
		//Selección
		//$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) / ($pob_6599_espana / $pob_0014_espana) * 100;
		$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) * 100;
		$salida['porcentajeEnvejecimientoSeleccion'] = $porcentajeEnvejecimientoSeleccion;
		//Nacional
		$porcentajeEnvejecimientoNacional = ($pob_6599_espana / $pob_0014_espana) * 100;
		$salida['porcentajeEnvejecimientoNacional'] = $porcentajeEnvejecimientoNacional;
		//Gráfico
		$salida['porcentajeEnvejecimientoSeleccionGrafico'] = ($porcentajeEnvejecimientoSeleccion / $porcentajeEnvejecimientoNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de dependencia
		//Población
		$totalPoblacionDependencia = $pob_0014 + $pob_6599;
		$salida['totalPoblacionDependencia'] = $totalPoblacionDependencia;
		//Selección
		//$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) / (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) * 100;
		$salida['porcentajeDependenciaSeleccion'] = $porcentajeDependenciaSeleccion;
		//Nacional
		$porcentajeDependenciaNacional = (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$salida['porcentajeDependenciaNacional'] = $porcentajeDependenciaNacional;
		//Gráfico
		$salida['porcentajeDependenciaSeleccionGrafico'] = ($porcentajeDependenciaSeleccion / $porcentajeDependenciaNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de infancia
		//Población
		$totalPoblacionInfancia = (int)$pob_0014;
		$salida['totalPoblacionInfancia'] = $totalPoblacionInfancia;
		//Selección
		$porcentajeInfanciaSeleccion = ($pob_0014 / $total) * 100;
		$salida['porcentajeInfanciaSeleccion'] = $porcentajeInfanciaSeleccion;
		//Nacional
		$porcentajeInfanciaNacional = ($pob_0014_espana / $total_espana) * 100;
		$salida['porcentajeInfanciaNacional'] = $porcentajeInfanciaNacional;
		//Gráfico
		$salida['porcentajeInfanciaSeleccionGrafico'] = ($porcentajeInfanciaSeleccion / $porcentajeInfanciaNacional) *100;
		
		//------------------------------------------------------
		
		//Tasa de vejez
		//Población
		$totalPoblacionVejez = (int)$pob_6599;
		$salida['totalPoblacionVejez'] = $totalPoblacionVejez;
		//Selección
		$porcentajeVejezSeleccion = ($pob_6599 / $total) * 100;
		$salida['porcentajeVejezSeleccion'] = $porcentajeVejezSeleccion;
		//Nacional
		$porcentajeVejezNacional = ($pob_6599_espana / $total_espana) * 100;
		$salida['porcentajeVejezNacional'] = $porcentajeVejezNacional;
		//Gráfico
		$salida['porcentajeVejezSeleccionGrafico'] = ($porcentajeVejezSeleccion / $porcentajeVejezNacional) * 100;
		
		//------------------------------------------------------
		
		//ICE
		$salida['ICE'] = (int)$estimacionBase;		
		
		//------------------------------------------------------
		
		//Población vinculada no residente municipio
		$salida['pobVinculada'] = (int)$cifraPobVinculada;
		
		//------------------------------------------------------
		
		//Accesibilidad y nivel de estudios
		//Población
		$salida['totalPoblacion'] = (int)$totalPoblacion;
		//Selección
		$salida['accesibilidad'] = $accesibilidad;		
		$salida['nivel_estudios'] = $nivel_estudios;
		//Nacional		
		$salida['accesibilidadNacional'] = $accesibilidadNacional;		
		$salida['nivel_estudiosNacional'] = $nivel_estudiosNacional;
		//Gráfico
		$salida['accesibilidadSeleccionGrafico'] = ($accesibilidad / $accesibilidadNacional) * 100;
		$salida['nivel_estudiosSeleccionGrafico'] = ($nivel_estudios / $nivel_estudiosNacional) * 100;		
		
		//------------------------------------------------------
		
		//Índice de Desempleo SEPE
		$salida['cifraDesempleo'] = $cifraDesempleo;
		//Nacional
		$salida['cifraDesempleoNacional'] = $cifraDesempleoNacional;
		//Gráfico
		$salida['cifraDesempleoPorcentaje'] = ($cifraDesempleo / $cifraDesempleoNacional) * 100;		
		$salida['pob_activa'] = (int)$pob_activa;
		//------------------------------------------------------
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//ENTORNO: Funciones Municipios
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function actionInfoEntornoPoblacionMunicipios($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
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
				geo_mun.cod_mun IN (" . $id . ")";
		
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
		
		$sqlPorcentaje="SELECT  
				sum(((x4_h + x4_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"0-4\", 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"5-14\",
				sum(((x19_h + x19_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"15-19 \",
				sum(((x24_h + x24_m + x29_h + x29_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"20-29\",
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \"30-65\",
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) * 100 / ".$total." as \">65\"
			FROM 
				geo_mun, 
				geo_ine_secciones
			WHERE 
				geo_mun.geom && geo_ine_secciones.geom AND 
				geo_mun.cod_mun IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) * 100 / total as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) * 100 / total as pob_0514,
						(x19_h + x19_m) * 100 / total as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) * 100 / total as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) * 100 / total as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) * 100 / total as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	public function actionInfoTablaCortaMunicipios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		
		$result = array();
		$pob_0005 = 0;
		$pob_0514 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0514'] = $pob_0514;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2029'] = $pob_2029;
		$salida['pob_2965'] = $pob_2965;
		$salida['pob_6599'] = $pob_6599;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0514_porcentaje'] = $pob_0514*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2029_porcentaje'] = $pob_2029*100/$total;
		$salida['pob_2965_porcentaje'] = $pob_2965*100/$total;
		$salida['pob_6599_porcentaje'] = $pob_6599*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0514_espana += $pe['pob_0514'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2029_espana += $pe['pob_2029'];
			$pob_2965_espana += $pe['pob_2965'];
			$pob_6599_espana += $pe['pob_6599'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0514_porcentaje_espana'] = $pob_0514_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2029_porcentaje_espana'] = $pob_2029_espana*100/$total_espana;
		$salida['pob_2965_porcentaje_espana'] = $pob_2965_espana*100/$total_espana;
		$salida['pob_6599_porcentaje_espana'] = $pob_6599_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionInfoTablaLargaMunicipios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0609,				
				sum(((x14_h + x14_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2024,
				sum(((x29_h + x29_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2529,
				sum(((x34_h + x34_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3034,
				sum(((x39_h + x39_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_3539,
				sum(((x44_h + x44_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4044,
				sum(((x49_h + x49_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_4549,
				sum(((x54_h + x54_m + x59_h + x59_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_5059,
				sum(((x64_h + x64_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6064,
				sum(((x69_h + x69_m + x74_h + x74_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6575,				
				sum(((x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_75
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
		
		$result = array();
		$pob_0005 = 0;
		$pob_0609 = 0;
		$pob_1014 = 0;
		$pob_1519 = 0;
		$pob_2024 = 0;
		$pob_2529 = 0;
		$pob_3034 = 0;
		$pob_3539 = 0;
		$pob_4044 = 0;
		$pob_4549 = 0;
		$pob_5059 = 0;
		$pob_6064 = 0;
		$pob_6575 = 0;
		$pob_75 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0609 += $p['pob_0609'];
			$pob_1014 += $p['pob_1014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2024 += $p['pob_2024'];
			$pob_2529 += $p['pob_2529'];			
			$pob_3034 += $p['pob_3034'];
			$pob_3539 += $p['pob_3539'];
			$pob_4044 += $p['pob_4044'];
			$pob_4549 += $p['pob_4549'];
			$pob_5059 += $p['pob_5059'];
			$pob_6064 += $p['pob_6064'];
			$pob_6575 += $p['pob_6575'];
			$pob_75 += $p['pob_75'];
		}
		$total = $pob_0005 + $pob_0609 + $pob_1014 + $pob_1519 + $pob_2024 + $pob_2529 + $pob_3034 + $pob_3539 + $pob_4044 + $pob_4549 + $pob_5059 + $pob_6064 + $pob_6575 + $pob_75;
		
		$salida['pob_0005'] = $pob_0005;
		$salida['pob_0609'] = $pob_0609;
		$salida['pob_1014'] = $pob_1014;
		$salida['pob_1519'] = $pob_1519;
		$salida['pob_2024'] = $pob_2024;
		$salida['pob_2529'] = $pob_2529;
		$salida['pob_3034'] = $pob_3034;
		$salida['pob_3539'] = $pob_3539;
		$salida['pob_4044'] = $pob_4044;
		$salida['pob_4549'] = $pob_4549;
		$salida['pob_5059'] = $pob_5059;
		$salida['pob_6064'] = $pob_6064;
		$salida['pob_6575'] = $pob_6575;
		$salida['pob_75'] = $pob_75;
		$salida['total'] = $total;
		
		$salida['pob_0005_porcentaje'] = $pob_0005*100/$total;
		$salida['pob_0609_porcentaje'] = $pob_0609*100/$total;
		$salida['pob_1014_porcentaje'] = $pob_1014*100/$total;
		$salida['pob_1519_porcentaje'] = $pob_1519*100/$total;
		$salida['pob_2024_porcentaje'] = $pob_2024*100/$total;
		$salida['pob_2529_porcentaje'] = $pob_2529*100/$total;
		$salida['pob_3034_porcentaje'] = $pob_3034*100/$total;
		$salida['pob_3539_porcentaje'] = $pob_3539*100/$total;
		$salida['pob_4044_porcentaje'] = $pob_4044*100/$total;
		$salida['pob_4549_porcentaje'] = $pob_4549*100/$total;
		$salida['pob_5059_porcentaje'] = $pob_5059*100/$total;
		$salida['pob_6064_porcentaje'] = $pob_6064*100/$total;
		$salida['pob_6575_porcentaje'] = $pob_6575*100/$total;
		$salida['pob_75_porcentaje'] = $pob_75*100/$total;
		$salida['total_porcentaje'] = $total*100/$total;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005, 
						(x9_h + x9_m) as pob_0609,				
						(x14_h + x14_m) as pob_1014,
						(x19_h + x19_m) as pob_1519,
						(x24_h + x24_m) as pob_2024,
						(x29_h + x29_m) as pob_2529,
						(x34_h + x34_m) as pob_3034,
						(x39_h + x39_m) as pob_3539,
						(x44_h + x44_m) as pob_4044,
						(x49_h + x49_m) as pob_4549,
						(x54_h + x54_m + x59_h + x59_m) as pob_5059,
						(x64_h + x64_m) as pob_6064,
						(x69_h + x69_m + x74_h + x74_m) as pob_6575,				
						(x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_75
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0609_espana = 0;
		$pob_1014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2024_espana = 0;
		$pob_2529_espana = 0;
		$pob_3034_espana = 0;
		$pob_3539_espana = 0;
		$pob_4044_espana = 0;
		$pob_4549_espana = 0;
		$pob_5059_espana = 0;
		$pob_6064_espana = 0;
		$pob_6575_espana = 0;
		$pob_75_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005'];
			$pob_0609_espana += $pe['pob_0609'];
			$pob_1014_espana += $pe['pob_1014'];
			$pob_1519_espana += $pe['pob_1519'];
			$pob_2024_espana += $pe['pob_2024'];
			$pob_2529_espana += $pe['pob_2529'];			
			$pob_3034_espana += $pe['pob_3034'];
			$pob_3539_espana += $pe['pob_3539'];
			$pob_4044_espana += $pe['pob_4044'];
			$pob_4549_espana += $pe['pob_4549'];
			$pob_5059_espana += $pe['pob_5059'];
			$pob_6064_espana += $pe['pob_6064'];
			$pob_6575_espana += $pe['pob_6575'];
			$pob_75_espana += $pe['pob_75'];
		}
		$total_espana = $pob_0005_espana + $pob_0609_espana + $pob_1014_espana + $pob_1519_espana + $pob_2024_espana + $pob_2529_espana + $pob_3034_espana + $pob_3539_espana + $pob_4044_espana + $pob_4549_espana + $pob_5059_espana + $pob_6064_espana + $pob_6575_espana + $pob_75_espana;
		
		$salida['pob_0005_porcentaje_espana'] = $pob_0005_espana*100/$total_espana;
		$salida['pob_0609_porcentaje_espana'] = $pob_0609_espana*100/$total_espana;
		$salida['pob_1014_porcentaje_espana'] = $pob_1014_espana*100/$total_espana;
		$salida['pob_1519_porcentaje_espana'] = $pob_1519_espana*100/$total_espana;
		$salida['pob_2024_porcentaje_espana'] = $pob_2024_espana*100/$total_espana;
		$salida['pob_2529_porcentaje_espana'] = $pob_2529_espana*100/$total_espana;
		$salida['pob_3034_porcentaje_espana'] = $pob_3034_espana*100/$total_espana;
		$salida['pob_3539_porcentaje_espana'] = $pob_3539_espana*100/$total_espana;
		$salida['pob_4044_porcentaje_espana'] = $pob_4044_espana*100/$total_espana;
		$salida['pob_4549_porcentaje_espana'] = $pob_4549_espana*100/$total_espana;
		$salida['pob_5059_porcentaje_espana'] = $pob_5059_espana*100/$total_espana;
		$salida['pob_6064_porcentaje_espana'] = $pob_6064_espana*100/$total_espana;
		$salida['pob_6575_porcentaje_espana'] = $pob_6575_espana*100/$total_espana;
		$salida['pob_75_porcentaje_espana'] = $pob_75_espana*100/$total_espana;
		$salida['total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresMunicipios($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"2\",
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"3\",
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \"4\",
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as \">4\"
			FROM 
				geo_mun, 
				geo_sec_hogares_censo 
			WHERE 
				geo_mun.geom && geo_sec_hogares_censo.geom AND 
				geo_mun.cod_mun IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['1'];
			$hogares2 += $p['2'];
			$hogares3 += $p['3'];
			$hogares4 += $p['4'];
			$hogares5 += $p['>4'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$sqlPorcentaje="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"1\", 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"2\", 
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"3\", 
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \"4\", 
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) * 100 / ".$total." as \">4\"
			FROM 
				geo_mun, 
				geo_sec_hogares_censo 
			WHERE 
				geo_mun.geom && geo_sec_hogares_censo.geom AND 
				geo_mun.cod_mun IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
		
		$sqlEspana="SELECT
						sum(est_hogares1) * 100 / sum(est_hogares_total) as hogares1, 
						sum(est_hogares2) * 100 / sum(est_hogares_total) as hogares2,
						sum(est_hogares3) * 100 / sum(est_hogares_total) as hogares3,
						sum(est_hogares4) * 100 / sum(est_hogares_total) as hogares4,
						sum(est_hogares5) * 100 / sum(est_hogares_total) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData()));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogaresMunicipios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
			
		$sql="SELECT  
				sum(((est_hogares1) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares1, 
				sum(((est_hogares2) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares2,
				sum(((est_hogares3) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares3,
				sum(((est_hogares4) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares4,
				sum(((est_hogares5) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom)))/ST_Area(geo_sec_hogares_censo.geom)) as hogares5
			FROM 
				geo_mun, 
				geo_sec_hogares_censo 
			WHERE 
				geo_mun.geom && geo_sec_hogares_censo.geom AND 
				geo_mun.cod_mun IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT  
						sum(est_hogares1) as hogares1, 
						sum(est_hogares2) as hogares2,
						sum(est_hogares3) as hogares3,
						sum(est_hogares4) as hogares4,
						sum(est_hogares5) as hogares5
					FROM 
						geo_sec_hogares_censo";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------
	
	public function actionInfoEntornoHogaresICEMunicipios($id){
		header('Content-Type: application/json');
		$compr = explode(",", $id);
		
		foreach($compr as $c){
			$c = str_replace ("'", "", $c);
			if(!is_numeric($c))
				exit("error2");
		
		}
		$sql="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Bajo\", 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Bajo\"
				FROM 
					geo_mun, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					geo_mun.geom && geo_sec_hogares_censo.geom AND 
					geo_mun.cod_mun IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio\"
				FROM 
					geo_mun, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					geo_mun.geom && geo_sec_hogares_censo.geom AND 
					geo_mun.cod_mun IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Medio-Alto\"
				FROM 
					geo_mun, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					geo_mun.geom && geo_sec_hogares_censo.geom AND 
					geo_mun.cod_mun IN (" . $id . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as \"Alto\"
				FROM 
					geo_mun, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					geo_mun.geom && geo_sec_hogares_censo.geom AND 
					geo_mun.cod_mun IN (" . $id . "))
			FROM 
				geo_mun, 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				geo_mun.geom && geo_sec_hogares_censo.geom AND 
				geo_mun.cod_mun IN (" . $id . ")";
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		
		$pob = $dataProvider->getData();		
		
		$hogares1 = 0;		
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;

		foreach($pob as $p){
			$hogares1 += $p['Bajo'];
			$hogares2 += $p['Medio-Bajo'];
			$hogares3 += $p['Medio'];
			$hogares4 += $p['Medio-Alto'];
			$hogares5 += $p['Alto'];
		}
		$total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;		
		
		$sqlPorcentaje="SELECT  
							COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Bajo\", 
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Bajo\"
							FROM 
								geo_mun, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
								geo_mun.geom && geo_sec_hogares_censo.geom AND 
								geo_mun.cod_mun IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio\"
							FROM 
								geo_mun, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
								geo_mun.geom && geo_sec_hogares_censo.geom AND 
								geo_mun.cod_mun IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Medio-Alto\"
							FROM 
								geo_mun, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
								geo_mun.geom && geo_sec_hogares_censo.geom AND 
								geo_mun.cod_mun IN (" . $id . ")),
							(SELECT 
								COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) * 100 / ".$total." as \"Alto\"
							FROM 
								geo_mun, 
								geo_sec_hogares_censo,
								tbl_hogares_arvato
							where
								tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
								 estimacion_ice_euro > 39800 AND
								geo_mun.geom && geo_sec_hogares_censo.geom AND 
								geo_mun.cod_mun IN (" . $id . "))
						FROM 
							geo_mun, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						WHERE 
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
							estimacion_ice_euro < 13300 AND
							geo_mun.geom && geo_sec_hogares_censo.geom AND 
							geo_mun.cod_mun IN (" . $id . ")";
		$dataProviderPorcentaje=new CSqlDataProvider($sqlPorcentaje, array(
			'pagination'=>false
		));
				
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";					
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						geo_mun, 
						geo_sec_hogares_censo,
						tbl_hogares_arvato
					WHERE 
						tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
						geo_mun.geom && geo_sec_hogares_censo.geom AND 
						geo_mun.cod_mun IN (" . $id . ")";				
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							geo_mun, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						where
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND								
							ST_Intersects(geo_mun.geom, ST_Centroid(geo_sec_hogares_censo.geom)) AND
							geo_mun.cod_mun IN (" . $id . ")						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;
	
		echo json_encode(array($dataProvider->getData(),$dataProviderEspana->getData(),$dataProviderPorcentaje->getData(), (int)$estimacionBase));// will return a list of arrays.
	}
	
	//---------------------------------------------------------------------------------------
	//Hogares tabla corta entorno hogares ICE (Indice de Capacidad Económica)
	//---------------------------------------------------------------------------------------

	public function actionInfoTablaCortaHogaresICEMunicipios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		$sql="SELECT  
				COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares1, 
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares2
				FROM 
					geo_mun, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400 AND
					geo_mun.geom && geo_sec_hogares_censo.geom AND 
					geo_mun.cod_mun IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares3
				FROM 
					geo_mun, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100 AND
					geo_mun.geom && geo_sec_hogares_censo.geom AND 
					geo_mun.cod_mun IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares4
				FROM 
					geo_mun, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800 AND
					geo_mun.geom && geo_sec_hogares_censo.geom AND 
					geo_mun.cod_mun IN (" . $cp . ")),
				(SELECT 
					COALESCE(CAST(round(sum((hogares) * ST_Area(ST_Intersection(geo_mun.geom, geo_sec_hogares_censo.geom))/ST_Area(geo_sec_hogares_censo.geom))) as int),0) as hogares5
				FROM 
					geo_mun, 
					geo_sec_hogares_censo,
					tbl_hogares_arvato
				where
					tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND	
					 estimacion_ice_euro > 39800 AND
					geo_mun.geom && geo_sec_hogares_censo.geom AND 
					geo_mun.cod_mun IN (" . $cp . "))
			FROM 
				geo_mun, 
				geo_sec_hogares_censo,
				tbl_hogares_arvato
			WHERE 
				tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
				estimacion_ice_euro < 13300 AND
				geo_mun.geom && geo_sec_hogares_censo.geom AND 
				geo_mun.cod_mun IN (" . $cp . ")";
		
		$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
		$pob = $dataProvider->getData();
		
		$result = array();
		$hogares1 = 0;
		$hogares2 = 0;
		$hogares3 = 0;
		$hogares4 = 0;
		$hogares5 = 0;
		$hogares_total = 0;

		foreach($pob as $p){
			$hogares1 += $p['hogares1'];
			$hogares2 += $p['hogares2'];
			$hogares3 += $p['hogares3'];
			$hogares4 += $p['hogares4'];
			$hogares5 += $p['hogares5'];
		}
		$hogares_total = $hogares1 + $hogares2 + $hogares3 + $hogares4 + $hogares5;
		
		$salida['hogares1'] = $hogares1;
		$salida['hogares2'] = $hogares2;
		$salida['hogares3'] = $hogares3;
		$salida['hogares4'] = $hogares4;
		$salida['hogares5'] = $hogares5;
		$salida['hogares_total'] = $hogares_total;
		
		$salida['hogares1_porcentaje'] = $hogares1*100/$hogares_total;
		$salida['hogares2_porcentaje'] = $hogares2*100/$hogares_total;
		$salida['hogares3_porcentaje'] = $hogares3*100/$hogares_total;
		$salida['hogares4_porcentaje'] = $hogares4*100/$hogares_total;
		$salida['hogares5_porcentaje'] = $hogares5*100/$hogares_total;
		$salida['hogares_total_porcentaje'] = $hogares_total*100/$hogares_total;
		
		$sqlEspana="SELECT
						COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares1, 
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares2 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 13300 AND estimacion_ice_euro < 18400),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares3 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 18400 AND estimacion_ice_euro < 27100),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares4 FROM tbl_hogares_arvato WHERE estimacion_ice_euro >= 27100 AND estimacion_ice_euro < 39800),
						(SELECT COALESCE(CAST(sum(hogares) * 100 / (SELECT sum(hogares) FROM tbl_hogares_arvato) as int),0) as hogares5 FROM tbl_hogares_arvato WHERE estimacion_ice_euro > 39800)
					FROM 
						tbl_hogares_arvato
					WHERE estimacion_ice_euro < 13300";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$hogares1_espana = 0;
		$hogares2_espana = 0;
		$hogares3_espana = 0;
		$hogares4_espana = 0;
		$hogares5_espana = 0;
		$total_espana = 0;
		
		foreach($pobEspana as $pe){
			$hogares1_espana += $pe['hogares1'];
			$hogares2_espana += $pe['hogares2'];
			$hogares3_espana += $pe['hogares3'];
			$hogares4_espana += $pe['hogares4'];
			$hogares5_espana += $pe['hogares5'];
		}
		$total_espana = $hogares1_espana + $hogares2_espana + $hogares3_espana + $hogares4_espana + $hogares5_espana;
		
		$salida['hogares1_porcentaje_espana'] = $hogares1_espana*100/$total_espana;
		$salida['hogares2_porcentaje_espana'] = $hogares2_espana*100/$total_espana;
		$salida['hogares3_porcentaje_espana'] = $hogares3_espana*100/$total_espana;
		$salida['hogares4_porcentaje_espana'] = $hogares4_espana*100/$total_espana;
		$salida['hogares5_porcentaje_espana'] = $hogares5_espana*100/$total_espana;
		$salida['hogares_total_porcentaje_espana'] = $total_espana*100/$total_espana;
		
		echo json_encode($salida);
	}
	
	public function actionMapaHogaresDesviacionMunicipios($cp){
		
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
		$lyr = $map->getLayerByName("desviacionRentaMunicipios");
		
		$lyr->data = "geom FROM (SELECT 	
									round(desviacion_ice_respecto_nacional) as desviacion_ice_respecto_nacional,
									tbl_hogares_arvato.cod_secc as cod_secc, 
									geo_sec_hogares_censo.geom as geom,	
									geo_sec_hogares_censo.gid as gid
								FROM 
									public.geo_sec_hogares_censo,
									public.tbl_hogares_arvato, 
									public.geo_mun
								WHERE 
									geo_mun.cod_mun IN (" . $cp . ") AND
									tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
									ST_Intersects(geo_mun.geom , geo_sec_hogares_censo.geom)
								group by 
									tbl_hogares_arvato.cod_secc, 
									geo_sec_hogares_censo.geom,
									geo_sec_hogares_censo.gid,
									desviacion_ice_respecto_nacional)
		as subquery USING UNIQUE cod_secc USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionMapaSeleccionMunicipios($cp){
		
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
		$lyr = $map->getLayerByName("mapaSeleccionMunicipios");
		
		$lyr->data = "geom FROM (SELECT 
									geo_mun.cod_mun, 
									geo_mun.geom,
									tbl_municipios.desc_mun
								FROM 
									public.geo_mun,
									public.tbl_municipios
								WHERE 
									geo_mun.cod_mun = tbl_municipios.cod_mun AND
									geo_mun.cod_mun IN (" . $cp . "))
		as subquery USING UNIQUE cod_mun USING srid=25830";
				 
		$lyr->set('status',MS_ON);
		$lyr->set('opacity',70);
		$class = $lyr->getClass(0);
		$label = $class->getLabel(0);
		$label->set('size', 12);
		$label->color->setRGB(50,50,50);
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
	
	public function actionInfoTablaIndicadoresMunicipios($cp){
		
		header('Content-Type: application/json'); 
		
		$salida; 
		
		$compr1 = explode(",", $cp);
			
			foreach($compr1 as $c1){
			$c1 = str_replace ("'", "", $c1);
			if(!is_numeric($c1))
			exit("error2");	
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// ICE Base
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		/*$sqlMedia="SELECT
						avg(estimacion_ice_euro) as estimacion_ice_euro
					FROM 
						geo_mun, 
						geo_sec_hogares_censo,
						tbl_hogares_arvato
					WHERE 
						tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND
						geo_mun.geom && geo_sec_hogares_censo.geom AND 
						geo_mun.cod_mun IN (" . $id . ")";				
		
		$dataProviderMedia=new CSqlDataProvider($sqlMedia, array(
			'pagination'=>false
		));
		
		$media = $dataProviderMedia->getData();
		
		$cifra = 0;		
		foreach($media as $a){
			$cifra += $a['estimacion_ice_euro'];
		}*/
		//----------------------
		$sqlTotalHogares="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							geo_mun, 
							geo_sec_hogares_censo,
							tbl_hogares_arvato
						where
							tbl_hogares_arvato.cod_secc = geo_sec_hogares_censo.cusec AND								
							ST_Intersects(geo_mun.geom, ST_Centroid(geo_sec_hogares_censo.geom)) AND
							geo_mun.cod_mun IN (" . $cp . ")						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogares=new CSqlDataProvider($sqlTotalHogares, array(
			'pagination'=>false
		));
		
		$tot = $dataProviderTotalHogares->getData();
		
		$totalHogares = 0;		
		$hogar1 = 0;	
		$hogar2 = 0;	
		$hogar3 = 0;	
		$hogar4 = 0;	
		$hogar5 = 0;	
		foreach($tot as $b){			
			$hogar1 += $b['hog_ice_1'];
			$hogar2 += $b['hog_ice_2'];
			$hogar3 += $b['hog_ice_3'];
			$hogar4 += $b['hog_ice_4'];
			$hogar5 += $b['hog_ice_5'];
		}
		$totalHogares = $hogar1+$hogar2+$hogar3+$hogar4+$hogar5;	
		$R3 = (($hogar1*1) + ($hogar2*2) + ($hogar3*3) + ($hogar4*4) + ($hogar5*5)) / $totalHogares;
		//-------------------
		$sqlTotalHogaresSeleccion="SELECT
							hog_ice_1 as hog_ice_1,hog_ice_2 as hog_ice_2,hog_ice_3 as hog_ice_3,hog_ice_4 as hog_ice_4,hog_ice_5 as hog_ice_5
						FROM 
							tbl_hogares_arvato						
						GROUP BY
							hog_ice_1,hog_ice_2,hog_ice_3,hog_ice_4,hog_ice_5";
		
		$dataProviderTotalHogaresSeleccion=new CSqlDataProvider($sqlTotalHogaresSeleccion, array(
			'pagination'=>false
		));
		
		$totSeleccion = $dataProviderTotalHogaresSeleccion->getData();
		
		$hogar1Seleccion = 0;	
		$hogar2Seleccion = 0;	
		$hogar3Seleccion = 0;	
		$hogar4Seleccion = 0;	
		$hogar5Seleccion = 0;	
		foreach($totSeleccion as $bSeleccion){			
			$hogar1Seleccion += $bSeleccion['hog_ice_1'];
			$hogar2Seleccion += $bSeleccion['hog_ice_2'];
			$hogar3Seleccion += $bSeleccion['hog_ice_3'];
			$hogar4Seleccion += $bSeleccion['hog_ice_4'];
			$hogar5Seleccion += $bSeleccion['hog_ice_5'];
		}
		$totalHogaresSeleccion = $hogar1Seleccion+$hogar2Seleccion+$hogar3Seleccion+$hogar4Seleccion+$hogar5Seleccion;	
		$R1 = (($hogar1Seleccion*1) + ($hogar2Seleccion*2) + ($hogar3Seleccion*3) + ($hogar4Seleccion*4) + ($hogar5Seleccion*5)) / $totalHogaresSeleccion;
		
		$estimacionBase = $R3*100/$R1;
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de envejecimiento y tasa de dependencia
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
		$sql="SELECT  
				sum(((x4_h + x4_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0005, 
				sum(((x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0514,
				sum(((x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) * ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_0014,
				sum(((x19_h + x19_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1519,
				sum(((x24_h + x24_m + x29_h + x29_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2029,
				sum(((x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_1565,
				sum(((x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_2965,
				sum(((x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as pob_6599
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
		$pob_0014 = 0;
		$pob_1519 = 0;
		$pob_2029 = 0;
		$pob_1565 = 0;
		$pob_2965 = 0;
		$pob_6599 = 0;

		foreach($pob as $p){
			$pob_0005 += $p['pob_0005'];
			$pob_0514 += $p['pob_0514'];
			$pob_0014 += $p['pob_0014'];
			$pob_1519 += $p['pob_1519'];
			$pob_2029 += $p['pob_2029'];
			$pob_1565 += $p['pob_1565'];
			$pob_2965 += $p['pob_2965'];
			$pob_6599 += $p['pob_6599'];
		}						
		$total = $pob_0005 + $pob_0514 +$pob_1519 +$pob_2029 +$pob_2965 +$pob_6599;
		
		$sqlEspana="SELECT  
						(x4_h + x4_m) as pob_0005_espana, 
						(x9_h + x9_m + x14_h + x14_m) as pob_0514_espana,
						(x4_h + x4_m + x9_h + x9_m + x14_h + x14_m) as pob_0014_espana,
						(x19_h + x19_m) as pob_1519_espana,
						(x24_h + x24_m + x29_h + x29_m) as pob_2029_espana,
						(x19_h + x19_m + x24_h + x24_m + x29_h + x29_m + x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_1565_espana,
						(x34_h + x34_m + x39_h + x39_m + x44_h + x44_m + x49_h + x49_m + x54_h + x54_m + x59_h + x59_m + x64_h + x64_m) as pob_2965_espana,
						(x69_h + x69_m + x74_h + x74_m + x79_h + x79_m + x84_h + x84_m + x89_h + x89_m + x94_h + x94_m + x99_h + x99_m + x100_h + x100_m) as pob_6599_espana
					FROM 
						tbl_ine_espana";
		
		$dataProviderEspana=new CSqlDataProvider($sqlEspana, array(
			'pagination'=>false
		));
		$pobEspana = $dataProviderEspana->getData();
		
		$pob_0005_espana = 0;
		$pob_0514_espana = 0;
		$pob_0014_espana = 0;
		$pob_1519_espana = 0;
		$pob_2029_espana = 0;
		$pob_1565_espana = 0;
		$pob_2965_espana = 0;
		$pob_6599_espana = 0;
		
		foreach($pobEspana as $pe){
			$pob_0005_espana += $pe['pob_0005_espana'];
			$pob_0514_espana += $pe['pob_0514_espana'];
			$pob_0014_espana += $pe['pob_0014_espana'];
			$pob_1519_espana += $pe['pob_1519_espana'];
			$pob_2029_espana += $pe['pob_2029_espana'];
			$pob_1565_espana += $pe['pob_1565_espana'];
			$pob_2965_espana += $pe['pob_2965_espana'];
			$pob_6599_espana += $pe['pob_6599_espana'];			
		}
		$total_espana = $pob_0005_espana + $pob_0514_espana + $pob_1519_espana + $pob_2029_espana + $pob_2965_espana + $pob_6599_espana;
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Población vinculada no residente municipio
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//geo_cp.geom && geo_mun.geom AND 
		//st_within(st_centroid(geo_cp.geom), geo_mun.geom) AND						
		
		$sqlPobVinculada="SELECT
						sum(pobl_vincu) as pobl_vincu
					FROM 						
						geo_mun,
						tbl_pobl_vinculada
					WHERE 
						tbl_pobl_vinculada.cod_mun = geo_mun.cod_mun AND						
						geo_mun.cod_mun IN (" . $cp . ")";				
		
		$dataProviderPobVinculada=new CSqlDataProvider($sqlPobVinculada, array(
			'pagination'=>false
		));
		
		$pobVinculada = $dataProviderPobVinculada->getData();
		
		$cifraPobVinculada = 0;		
		foreach($pobVinculada as $a){
			$cifraPobVinculada += $a['pobl_vincu'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Nivel de estudios y accesibilidad
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		//AVG(((accesibilidad)* ST_Area(ST_Intersection(geo_mun.geom, geo_ine_secciones.geom)))/ST_Area(geo_ine_secciones.geom)) as accesibilidad, 
		$sqlAccesibilidadEstudios="SELECT  
										AVG(accesibilidad) as accesibilidad,
										AVG(nivel_estudios) as nivel_estudios,
										sum(total) as total
									FROM 
										geo_mun, 
										geo_ine_secciones 
									WHERE 
										ST_Intersects(geo_mun.geom , geo_ine_secciones.geom) AND
										geo_mun.geom && geo_ine_secciones.geom AND 
										geo_mun.cod_mun IN (" . $cp . ")";
		
		$dataProviderAccesibilidadEstudios=new CSqlDataProvider($sqlAccesibilidadEstudios, array(
			'pagination'=>false
		));
		$AccesibilidadEstudios = $dataProviderAccesibilidadEstudios->getData();
				
		$accesibilidad = 0;
		$nivel_estudios = 0;
		$totalPoblacion = 0;

		foreach($AccesibilidadEstudios as $p){
			$accesibilidad += $p['accesibilidad'];
			$nivel_estudios += $p['nivel_estudios'];
			$totalPoblacion += $p['total'];
		}
		//Nacional
		$sqlAccesibilidadEstudiosNacional="SELECT  
												(SELECT AVG(accesibilidad) as accesibilidad FROM tbl_ine_espana),
												AVG(nivel_estudios) as nivel_estudios,
												sum(total) as total
											FROM 
												geo_ine_secciones";
		
		$dataProviderAccesibilidadEstudiosNacional=new CSqlDataProvider($sqlAccesibilidadEstudiosNacional, array(
			'pagination'=>false
		));
		$AccesibilidadEstudiosNacional = $dataProviderAccesibilidadEstudiosNacional->getData();
				
		$accesibilidadNacional = 0;
		$nivel_estudiosNacional = 0;
		$totalPoblacionNacional = 0;

		foreach($AccesibilidadEstudiosNacional as $p){
			$accesibilidadNacional += $p['accesibilidad'];
			$nivel_estudiosNacional += $p['nivel_estudios'];
			$totalPoblacionNacional += $p['total'];
		}
		
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Índice de Desempleo SEPE
		//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//geo_cp.geom && geo_mun.geom AND 
		//st_within(st_centroid(geo_cp.geom), geo_mun.geom) AND	
		
		$sqlDesempleo="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa					
					FROM 
						geo_mun,
						tbl_desempleo
					WHERE 
						tbl_desempleo.municipio = geo_mun.cod_mun AND
						geo_mun.cod_mun IN (" . $cp . ")";				
		
		$dataProviderDesempleo=new CSqlDataProvider($sqlDesempleo, array(
			'pagination'=>false
		));
		
		$desempleo = $dataProviderDesempleo->getData();
		
		$cifraDesempleo = 0;
		$pob_activa = 0;
		foreach($desempleo as $a){
			$cifraDesempleo += $a['tasa_desempleo'];
			$pob_activa += $a['pob_activa'];
		}
		//Nacional
		$sqlDesempleoNacional="SELECT
						avg(tasa_desempleo) as tasa_desempleo,	
						sum(pob_activa) as pob_activa
					FROM 
						tbl_desempleo";				
		
		$dataProviderDesempleoNacional=new CSqlDataProvider($sqlDesempleoNacional, array(
			'pagination'=>false
		));
		
		$desempleoNacional = $dataProviderDesempleoNacional->getData();
		
		$cifraDesempleoNacional = 0;	
		foreach($desempleoNacional as $a){
			$cifraDesempleoNacional += $a['tasa_desempleo'];
		}		
		
		//-------------------------------------------------------------------------------------------------------------------
		//Datos a mostrar en la vista.
		//-------------------------------------------------------------------------------------------------------------------
		
		//Índice de envejecimiento
		//Población
		$totalPoblacionEnvejecimiento = $pob_6599;
		$salida['totalPoblacionEnvejecimiento'] = $totalPoblacionEnvejecimiento;
		//Selección
		//$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) / ($pob_6599_espana / $pob_0014_espana) * 100;
		$porcentajeEnvejecimientoSeleccion = ($pob_6599 / $pob_0014) * 100;
		$salida['porcentajeEnvejecimientoSeleccion'] = $porcentajeEnvejecimientoSeleccion;
		//Nacional
		$porcentajeEnvejecimientoNacional = ($pob_6599_espana / $pob_0014_espana) * 100;
		$salida['porcentajeEnvejecimientoNacional'] = $porcentajeEnvejecimientoNacional;
		//Gráfico
		$salida['porcentajeEnvejecimientoSeleccionGrafico'] = ($porcentajeEnvejecimientoSeleccion / $porcentajeEnvejecimientoNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de dependencia
		//Población
		$totalPoblacionDependencia = $pob_0014 + $pob_6599;
		$salida['totalPoblacionDependencia'] = $totalPoblacionDependencia;
		//Selección
		//$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) / (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$porcentajeDependenciaSeleccion = (($pob_0014 + $pob_6599) / $pob_1565) * 100;
		$salida['porcentajeDependenciaSeleccion'] = $porcentajeDependenciaSeleccion;
		//Nacional
		$porcentajeDependenciaNacional = (($pob_0014_espana + $pob_6599_espana) / $pob_1565_espana) * 100;
		$salida['porcentajeDependenciaNacional'] = $porcentajeDependenciaNacional;
		//Gráfico
		$salida['porcentajeDependenciaSeleccionGrafico'] = ($porcentajeDependenciaSeleccion / $porcentajeDependenciaNacional) * 100;
		
		//------------------------------------------------------
		
		//Tasa de infancia
		//Población
		$totalPoblacionInfancia = (int)$pob_0014;
		$salida['totalPoblacionInfancia'] = $totalPoblacionInfancia;
		//Selección
		$porcentajeInfanciaSeleccion = ($pob_0014 / $total) * 100;
		$salida['porcentajeInfanciaSeleccion'] = $porcentajeInfanciaSeleccion;
		//Nacional
		$porcentajeInfanciaNacional = ($pob_0014_espana / $total_espana) * 100;
		$salida['porcentajeInfanciaNacional'] = $porcentajeInfanciaNacional;
		//Gráfico
		$salida['porcentajeInfanciaSeleccionGrafico'] = ($porcentajeInfanciaSeleccion / $porcentajeInfanciaNacional) *100;
		
		//------------------------------------------------------
		
		//Tasa de vejez
		//Población
		$totalPoblacionVejez = (int)$pob_6599;
		$salida['totalPoblacionVejez'] = $totalPoblacionVejez;
		//Selección
		$porcentajeVejezSeleccion = ($pob_6599 / $total) * 100;
		$salida['porcentajeVejezSeleccion'] = $porcentajeVejezSeleccion;
		//Nacional
		$porcentajeVejezNacional = ($pob_6599_espana / $total_espana) * 100;
		$salida['porcentajeVejezNacional'] = $porcentajeVejezNacional;
		//Gráfico
		$salida['porcentajeVejezSeleccionGrafico'] = ($porcentajeVejezSeleccion / $porcentajeVejezNacional) * 100;
		
		//------------------------------------------------------
		
		//ICE
		$salida['ICE'] = (int)$estimacionBase;		
		
		//------------------------------------------------------
		
		//Población vinculada no residente municipio
		$salida['pobVinculada'] = (int)$cifraPobVinculada;
		
		//------------------------------------------------------
		
		//Accesibilidad y nivel de estudios
		//Población
		$salida['totalPoblacion'] = (int)$totalPoblacion;
		//Selección
		$salida['accesibilidad'] = $accesibilidad;		
		$salida['nivel_estudios'] = $nivel_estudios;
		//Nacional		
		$salida['accesibilidadNacional'] = $accesibilidadNacional;		
		$salida['nivel_estudiosNacional'] = $nivel_estudiosNacional;
		//Gráfico
		$salida['accesibilidadSeleccionGrafico'] = ($accesibilidad / $accesibilidadNacional) * 100;
		$salida['nivel_estudiosSeleccionGrafico'] = ($nivel_estudios / $nivel_estudiosNacional) * 100;		
		
		//------------------------------------------------------
		
		//Índice de Desempleo SEPE
		$salida['cifraDesempleo'] = $cifraDesempleo;
		//Nacional
		$salida['cifraDesempleoNacional'] = $cifraDesempleoNacional;
		//Gráfico
		$salida['cifraDesempleoPorcentaje'] = ($cifraDesempleo / $cifraDesempleoNacional) * 100;		
		$salida['pob_activa'] = (int)$pob_activa;
		//------------------------------------------------------
		
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------------------------------------------------
	//FIN ENTORNO
	//---------------------------------------------------------------------------------------------------------------------------
	
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
		$model=new GeoSecciones;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GeoSecciones']))
		{
			$model->attributes=$_POST['GeoSecciones'];
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

		if(isset($_POST['GeoSecciones']))
		{
			$model->attributes=$_POST['GeoSecciones'];
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
		$dataProvider=new CActiveDataProvider('GeoSecciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GeoSecciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GeoSecciones']))
			$model->attributes=$_GET['GeoSecciones'];

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
		$model=GeoSecciones::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='geo-secciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
