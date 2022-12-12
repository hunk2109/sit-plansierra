<?php

class CartoBaseController extends Controller
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
				'actions'=>array('create','update','getSelectMicrocuenca','getPlantacionEspecieSumatorio','getElevacion', 'getPointsIntersect', 'getNombreLargo','GetPendiente'),
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
	
  function actionGetElevacion($x, $y){
	
	     $mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
			$result = array();
            $rs4 = array();

	        foreach($mbd->query('SELECT ST_Value(rast,1,(('.$x.'-ST_UpperLeftX(rast))/(ST_ScaleX(rast)))::int , (('.$y.'-ST_UpperLefty(rast))/(ST_Scaley(rast)))::int) AS value FROM srtm_dtm') as $fila4) {
             //foreach($mbd->query('SELECT ST_value(rast,1,1400,1200) AS value FROM srtm_dtm  ') as $fila4) {
                   $c = null;								
                   $c['Altitud (msnm)'] =(int)$fila4['value'];
                   array_push($result, $c);
              }	
			  
		 echo json_encode($result);
	  
	  
	  
  }           
  
  function actionGetPendiente($x, $y){
	
	     $mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
			$result = array();
            $rs4 = array();

	        foreach($mbd->query('SELECT ST_Value(rast,1,(('.$x.'-ST_UpperLeftX(rast))/(ST_ScaleX(rast)))::int , (('.$y.'-ST_UpperLefty(rast))/(ST_Scaley(rast)))::int) AS value FROM slope_det') as $fila4) {
             
                   $c = null;								
                   $c['Pendiente (%)'] =(int)$fila4['value'];
                   array_push($result, $c);
              }	
			  
		 echo json_encode($result);
	  
	  
	  
  }    
  
	
	function actionGetPointsIntersect($x, $y, $resolution){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$result = array();
		$codigo_old=0;
		foreach($mbd->query('SELECT  gid,  geom,
		de_codigo_plantacion AS codigo, 
		tp_descripcion_tipo_plantacion AS tipoplantacion ,
		tp_descripcio_tipo_actividad,
		nombre_paraje,
		nombre_municipio,
		nombre_provincia,
		nombre_cuenca,
		nombre_microcuenca,
		tarea_plantada::real,
		descripcion_simplificada,
		dp_total_tarea,
		ano,
		cantidad::int
		FROM "15_plantacion_completa_especies"  WHERE geom && ST_Buffer(ST_Point('.$x.','.$y.'),0.00001) ORDER BY codigo,ano ' ) as $fila){
			   		 
		    $b = null;
			$b['gid'] = $fila['gid'];
			$b['codigo'] = $fila['codigo'];
			$b['Superficie (tareas)'] = $fila['dp_total_tarea'];
			$b['Año_plantación']= $fila['ano'];
			$b['tipo'] = $fila['tipoplantacion'];
			$b['Especie'] = $fila['descripcion_simplificada'];	
			$b['Cantidad_plantas'] = $fila['cantidad'];
			$b['Tarea_plantada'] = (float)$fila['tarea_plantada'];
			$b['Tipo_de_plantacion'] = $fila['tipoplantacion'];
			$b['Tipo_de_actividad'] = $fila['tp_descripcio_tipo_actividad'];
			$b['Paraje'] = $fila['nombre_paraje'];
			$b['Municipio'] = $fila['nombre_municipio'];
			$b['Provincia'] = $fila['nombre_provincia'];
			$b['Subcuenca'] = $fila['nombre_cuenca'];
			$b['Microcuenca'] = $fila['nombre_microcuenca'];
			
			$b['  ']='   ';
			$b['---']='   ';
			
			array_push($result, $b);
						
		}

		
		
		echo json_encode($result);
		
	}
	
	
	
	 
}	