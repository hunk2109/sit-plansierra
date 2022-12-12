<?php

class AreasController extends Controller
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','getSelectParaje','getBoxTerMunicipal','getBoxDistrito','getSelectMicrocuenca', 'getNombreLargo'),
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
	}
	
	function actionGetBoxTerMunicipal($x, $y){
		 
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		
		foreach($mbd->query('SELECT 
		gid, 
		mun::int AS id_muni,
		prov::int AS id_prov, 
         box (ST_Transform(geom4326,3857)) AS caja,
         ST_XMin((ST_Transform(geom4326,3857))) AS xmin,
         ST_XMax((ST_Transform(geom4326,3857))) AS xmax,
         ST_YMin((ST_Transform(geom4326,3857))) AS ymin,
         ST_YMax((ST_Transform(geom4326,3857))) AS ymax
          FROM "censo20104326plansierra" WHERE mun::int='.$x. ' AND  prov::int='.$y) as $fila){   		 
		    $b = null;
			$b['id'] = $fila['id_muni'];
			$b['caja'] = $fila['caja'];
			$b['xmin']=$fila['xmin'];
			$b['xmax']=$fila['xmax'];
			$b['ymin']=$fila['ymin'];
			$b['ymax']=$fila['ymax'];		
			array_push($result, $b);		
		 }
		echo json_encode($result);	
		
	}	
	function actionGetBoxDistrito($x, $y, $z){
		 
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		
		foreach($mbd->query('SELECT 
		gid, 
		mun::int AS id_muni,
		prov::int AS id_prov, 
         box (ST_Transform(geom4326,3857)) AS caja,
         ST_XMin((ST_Transform(geom4326,3857))) AS xmin,
         ST_XMax((ST_Transform(geom4326,3857))) AS xmax,
         ST_YMin((ST_Transform(geom4326,3857))) AS ymin,
         ST_YMax((ST_Transform(geom4326,3857))) AS ymax
          FROM "censo20104326plansierra" WHERE mun::int='.$x. ' AND  prov::int='.$y. ' AND  dm::int='.$z) as $fila){   		 
		    $b = null;
			$b['id'] = $fila['id_muni'];
			$b['caja'] = $fila['caja'];
			$b['xmin']=$fila['xmin'];
			$b['xmax']=$fila['xmax'];
			$b['ymin']=$fila['ymin'];
			$b['ymax']=$fila['ymax'];		
			array_push($result, $b);		
		 }
		echo json_encode($result);	
		
	}
	
	function actionGetSelectMicrocuenca($x, $y, $resolution){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  
		 nom_cuenca,
         sub_cuenca,
         mic_cuenca,
         sub_divisi
		FROM "microcuencas4326"  WHERE geom4326 && ST_Buffer(ST_Point('.$x.','.$y.'),0.00001) ORDER BY sub_divisi' ) as $fila){   		 
		    $b = null;
			$b['nom_cuenca'] = $fila['nom_cuenca'];
			$b['sub_cuenca'] = $fila['sub_cuenca'];
			$b['mic_cuenca'] = $fila['mic_cuenca'];
			$b['sub_divisi'] = $fila['sub_divisi'];
			array_push($result, $b);			
		}
		echo json_encode($result);	
		
	}
function actionGetSelectParaje($x, $y, $resolution){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		
		foreach($mbd->query('SELECT 
  codigo, 
  reg_toponi, 
  prov_topon, 
  mun_toponi, 
  dm_toponim, 
  sec_toponi, 
  bp_toponim
FROM "censo20104326"  WHERE geom4326 && ST_Buffer(ST_Point('.$x.','.$y.'),0.00001)  ORDER BY codigo' ) as $fila){  
		    		 
		    $b = null;
			$b['Código'] = $fila['codigo'];
			$b['Provincia'] = $fila['prov_topon'];
			$b['Municipio'] = $fila['mun_toponi'];
			$b['Distrito'] = $fila['dm_toponim'];
			$b['Seccion'] = $fila['sec_toponi'];
			$b['Barrio-Paraje'] = $fila['bp_toponim'];
			array_push($result, $b);			
		}
		echo json_encode($result);	
		
	}	
	
}	