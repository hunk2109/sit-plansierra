<?php

class sisfamController extends Controller
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
					'actions'=>array('create','update','GetSubcuenca','GetMicrocuenca','GetEstadoCivil','GetEstadoCivil2','GetGenero','GetTodoGenero','GetEstadoCivilGenero','GetSumaEstadoCivil','GetSumaCalificacion','GetCalificacion','GetSistemasSubcuenca','GetSistemasMunicipio','GetConyuge','GetTodoConyuge','GetSistemasProduccionCultivos','GetSistemasProduccionInicial','GetSistemasProduccionActual','GetAvances','GetPoa','GetPoa3','GetComponentes','GetComponentesPorAnalisis','GetMujeres','GetTodoMujeres','GetObreros','GetTodoObreros','GetHijo','GetTodoHijo'),
					'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','delete', 'getCuencaAno', 'getAno', 'getCuenca'),
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
					'actions'=>array('create','update' ),
					'users'=>array('*'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','delete', 'getCuencaAno', 'getAno', 'getCuenca'),
					'users'=>array('admin'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
		}
	}

	
	//FUNCIONES GRAFICAS POR MICROCUENCA
	

    
	
	function actionGetSubcuenca($subcuenca){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		descripcion
		
		FROM "ss_cuenca" 
		where codigo_cuenca::int='.$subcuenca.'
		  ORDER BY descripcion ASC' ) as $fila) {
			
		$b = null;
			$b['respuesta'] = $fila['descripcion'];
			
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetMicrocuenca($microcuenca){
		
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
		descripcion
		
		FROM "ss_micro_cuenca" 
		where codigo_micro_cuenca::int='.$microcuenca.'
		  ORDER BY descripcion ASC' ) as $fila) {
			
		$b = null;
			$b['respuesta'] = $fila['descripcion'];
			
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetEstadoCivil($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			pv_cliente.estado_civil as estado, 
			count (pv_cliente.estado_civil) as cantidad 
  
		FROM 
			public.ss_predio_sistema_familiar, 
			public.ss_predio, 
			public.pv_cliente,
			public.ss_estado
		WHERE 
			pv_cliente.estado_civil =ss_estado.estado AND
			ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.' 
		Group by 
			pv_cliente.estado_civil,ss_estado.orden
			
		ORDER BY  ss_estado.orden  ASC') as $fila) {
			
		$b = null;
			$b['estado'] = $fila['estado'];
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetEstadoCivil2($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		



		

		foreach($mbd->query('SELECT
			ss_estado.estado as estado, 
			 j.cantidad as cantidad 
  
		FROM public.ss_estado left join (
		select pv_cliente.estado_civil as estado, 
			count (pv_cliente.estado_civil) as cantidad 
		FROM
			public.ss_predio_sistema_familiar, 
			public.ss_predio, 
			public.pv_cliente,
			public.ss_estado
		WHERE 
			pv_cliente.estado_civil =ss_estado.estado AND
			ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'
		Group by 
			pv_cliente.estado_civil,ss_estado.orden) as j
			on ss_estado.estado = j.estado
			
		ORDER BY  ss_estado.orden  ASC') as $fila) {
			
		$b = null;
			$b['estado'] = $fila['estado'];
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetSumaEstadoCivil($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			count (*) as cantidad 
  
		FROM 
			public.ss_predio_sistema_familiar, 
			public.ss_predio, 
			public.pv_cliente,
			public.ss_estado
		WHERE 
			pv_cliente.estado_civil =ss_estado.estado AND
			ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.' ') as $fila) {
			
		$b = null;
			
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetEstadoCivilGenero($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			pv_cliente.estado_civil as estado, 
			 pv_cliente.genero as genero, 
			count (pv_cliente.estado_civil) as cantidad 
  
		FROM 
			public.ss_predio_sistema_familiar, 
			public.ss_predio, 
			public.pv_cliente
		WHERE 
			ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'
		Group by 
			pv_cliente.estado_civil,pv_cliente.genero 
			
		ORDER BY pv_cliente.estado_civil DESC') as $fila) {
			
		$b = null;
			$b['estado'] = $fila['estado'];
			$b['genero'] = $fila['genero'];
			$b['cantidad'] = (float)$fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetGenero($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			
			 pv_cliente.genero as genero, 
			count (ss_predio_sistema_familiar.genero ) as cantidad 
  
		FROM 
			public.ss_predio_sistema_familiar, 
			public.ss_predio, 
			public.pv_cliente,
			public.ss_genero
		WHERE 
			public.pv_cliente.genero =ss_genero.genero and
			ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'
		Group by 
			pv_cliente.genero, ss_genero.orden
			
		ORDER BY ss_genero.orden  ASC') as $fila) {
			
		$b = null;
			
			$b['genero'] = $fila['genero'];
			$b['cantidad'] = $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetTodoGenero($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('select 
		ss_genero.genero as resultado, 
		j.cuenta as cantidad
		from ss_genero left join(

			SELECT 
				pv_cliente.genero, 
				count ( pv_cliente.genero) as cuenta
			FROM 
				public.ss_predio_sistema_familiar, 
				public.ss_predio,
				public.pv_cliente
			WHERE 
				ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio
				and pv_cliente.codigo_cliente = ss_predio.codigo_cliente'.$criterio.' 
			group by  pv_cliente.genero) as j

			on ss_genero.genero=j.genero 
			where ss_genero.orden <10') as $fila) {
			
		$b = null;
			
			$b['genero'] = $fila['resultado'];
			$b['cantidad'] = $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetCalificacion($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			ss_predio_sistema_familiar.calificacion estado, 
			count (ss_predio_sistema_familiar.calificacion) as cantidad 
  
		FROM 
			public.ss_predio_sistema_familiar, 
			public.ss_predio,
			public. pv_cliente,
			public.ss_calificacion_sf
		WHERE 
			ss_predio_sistema_familiar.calificacion = ss_calificacion_sf.calificacion and
			ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'
		Group by 
			ss_predio_sistema_familiar.calificacion ,ss_calificacion_sf.orden
			
		ORDER BY ss_calificacion_sf.orden  ASC') as $fila) {
			
		$b = null;
			$b['estado'] = $fila['estado'];
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetSumaCalificacion($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			count(*) as cantidad
  
		FROM 
			public.ss_predio_sistema_familiar, 
			public.ss_predio,
			public. pv_cliente,
			public.ss_calificacion_sf
		WHERE 
			ss_predio_sistema_familiar.calificacion = ss_calificacion_sf.calificacion and
			ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.' ') as $fila) {
			
		$b = null;
		
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetSistemasSubcuenca($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			 ss_cuenca.descripcion as cuenca,
			 count (id) as cantidad,
			 sum(ss_predio_sistema_familiar.tareas_establecidas) as tareas,
			 sum(ss_predio_sistema_familiar.tareas_bajo_riego) as riego	  
		FROM 
			  public.ss_predio_sistema_familiar, 
			  public.ss_predio, 
			  public.pv_cliente,
			  public.ss_cuenca
		WHERE
			 ss_predio.codigo_cuenca = ss_cuenca.codigo_cuenca and
			 ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			 ss_predio.codigo_cliente = pv_cliente.codigo_cliente '.$criterio.'

		Group by 
			ss_cuenca.descripcion

		Order by
			ss_cuenca.descripcion') as $fila) {
			
		$b = null;
			$b['cuenca'] =$fila['cuenca'];
			$b['cantidad'] =(float) $fila['cantidad'];
			$b['tareas'] =(float) $fila['tareas'];
			$b['riego'] =(float) $fila['riego'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetSistemasMunicipio($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			 st_municipio.descripcion as municipio,
			 count (id) as cantidad,
			 sum(ss_predio_sistema_familiar.tareas_establecidas) as tareas,
			 sum(ss_predio_sistema_familiar.tareas_bajo_riego) as riego	  
		FROM 
			  public.ss_predio_sistema_familiar, 
			  public.ss_predio, 
			  public.pv_cliente,
			  public.st_municipio
		WHERE
			 ss_predio.codigo_municipio = st_municipio.codigo_municipio and
			 ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			 ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'

		Group by 
			st_municipio.descripcion

		Order by
			count (id) desc') as $fila) {
			
		$b = null;
			$b['municipio'] =$fila['municipio'];
			$b['cantidad'] =(float) $fila['cantidad'];
			$b['tareas'] =(float) $fila['tareas'];
			$b['riego'] =(float) $fila['riego'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetConyuge($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			pv_cliente.ocupacion_conyuge as actividad ,
			 count (id) as cantidad
				  
		FROM 
			  public.ss_predio_sistema_familiar, 
			  public.ss_predio, 
			  public.pv_cliente
			
		WHERE
			 
			 ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			 ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'

		Group by 
			pv_cliente.ocupacion_conyuge

		Order by
			count (id) desc') as $fila) {
			
		$b = null;
			$b['actividad'] = $fila['actividad'];
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetTodoConyuge($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			
			 count (id) as cantidad
				  
		FROM 
			  public.ss_predio_sistema_familiar, 
			  public.ss_predio, 
			  public.pv_cliente
			
		WHERE
			 
			 ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			 ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'

		
		') as $fila) {
			
		$b = null;
			
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetSistemasProduccionInicial($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			sf_produccion_final_v03.cultivo, 
			sum ( sf_produccion_final_v03.cantidad_normalizada) as produccion, 
			sum ( sf_produccion_final_v03.cantidad_normalizada*sf_produccion_final_v03.valor) as pesos
 
		FROM 
			public.sf_produccion_final_v03,
			public.ss_predio,
			public.ss_predio_sistema_familiar
			  
		WHERE
			ss_predio_sistema_familiar.codigo_predio =ss_predio.codigo_predio and	
			 sf_produccion_final_v03.dato_inicial=0 and
			 sf_produccion_final_v03.codigo_predio = ss_predio.codigo_predio '.$criterio.'

		Group by 
			sf_produccion_final_v03.cultivo 

		Order by
			sf_produccion_final_v03.cultivo asc') as $fila) {
			
		$b = null;
			$b['cultivo'] =$fila['cultivo'];
			$b['produccion'] =(float) $fila['produccion'];
			$b['pesos'] =(float) $fila['pesos'];
			
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetSistemasProduccionActual($criterio,$ano){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			sf_produccion_final_v03.cultivo, 
			sum ( sf_produccion_final_v03.cantidad_normalizada) as produccion, 
			sum (sf_produccion_final_v03.cantidad_normalizada*sf_produccion_final_v03.valor) as pesos
 
		FROM 
			public.sf_produccion_final_v03,
			public.ss_predio,
			public.ss_predio_sistema_familiar
			  
		WHERE ss_predio_sistema_familiar.codigo_predio =ss_predio.codigo_predio and
			 sf_produccion_final_v03.ano='.$ano.' and
			 sf_produccion_final_v03.codigo_predio = ss_predio.codigo_predio '.$criterio.'

		Group by 
			sf_produccion_final_v03.cultivo 

		Order by
			sf_produccion_final_v03.cultivo asc') as $fila) {
			
		$b = null;
			$b['cultivo'] =$fila['cultivo'];
			$b['produccion'] =(float) $fila['produccion'];
			$b['pesos'] =(float) $fila['pesos'];
			
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetSistemasProduccionCultivos($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			sf_produccion_final_v03.cultivo, 
			sum ( sf_produccion_final_v03.cantidad_normalizada) as produccion, 
			sum (sf_produccion_final_v03.valor *sf_produccion_final_v03.valor ) as pesos
 
		FROM 
			public.sf_produccion_final_v03,
			public.ss_predio,
			public.ss_predio_sistema_familiar
			  
		WHERE
			 
			 sf_produccion_final_v03.codigo_predio = ss_predio.codigo_predio  and ss_predio_sistema_familiar.codigo_predio= ss_predio.codigo_predio'  .$criterio.'

		Group by 
			sf_produccion_final_v03.cultivo 

		Order by
			sf_produccion_final_v03.cultivo asc') as $fila) {
			
		$b = null;
			$b['cultivo'] =$fila['cultivo'];
			$b['produccion'] =(float) $fila['produccion'];
			$b['pesos'] =(float) $fila['pesos'];
			
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetAvances($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
 
  COUNT(DISTINCT ss_predio.codigo_cliente ) as productores,
    sum(ss_predio_sistema_familiar.tareas_establecidas) as tareas, 
    count (ss_predio.codigo_cliente) filter (where ss_predio_sistema_familiar.tareas_bajo_riego>0) as riego,
  sum (ss_predio_sistema_familiar.tareas_bajo_riego) as tareasriego, 
count(ss_predio_sistema_familiar.actividad_capacitacion) filter ( where ss_predio_sistema_familiar.actividad_capacitacion is true) as capacitacion,
  sum(ss_predio_sistema_familiar.tareas_cafe) as cafe, 
  sum(ss_predio_sistema_familiar.tareas_macademia) as macadamia, 
  Sum(ss_predio_sistema_familiar.tareas_frutales) as frutales 
  
FROM 
  public.ss_predio_sistema_familiar, 
  public.ss_predio
WHERE 
  ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio' .$criterio) as $fila) {
			
		$b = null;
			$b['productores'] =(float )$fila['productores'];
			$b['tareas'] =(float) $fila['tareas'];
			$b['riego'] =(float) $fila['riego'];
			$b['tareasriego'] =(float) $fila['tareasriego'];
			$b['capacitacion'] =(float) $fila['capacitacion'];
			$b['cafe'] =(float) $fila['cafe'];
			$b['frutales'] =(float) $fila['frutales'];
			$b['macadamia'] =(float) $fila['macadamia'];
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetPoa($cuenca,$ano1,$ano2){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
 
  poa_familiar_sit_ordenado.cuenca, 
 
 
  sum (poa_familiar_sit_ordenado.productores) as productores, 
  sum( poa_familiar_sit_ordenado.tareas) as tareas, 
  sum( poa_familiar_sit_ordenado.riego) as riego, 
  sum (poa_familiar_sit_ordenado.tareasriego) as tareasriego, 
  sum (poa_familiar_sit_ordenado.capacitacion) as capacitacion, 
  sum(poa_familiar_sit_ordenado.cafe) as cafe, 
  sum(poa_familiar_sit_ordenado.frutales) as frutales, 
  sum(poa_familiar_sit_ordenado.macadamia) as macadamia
FROM 
  public.poa_familiar_sit_ordenado

Where
ano>='.$ano1.' and ano <='.$ano2.' and cuenca::int='.$cuenca.'
group by cuenca') as $fila) {
			
		$b = null;
			$b['productores'] =(float )$fila['productores'];
			$b['tareas'] =(float) $fila['tareas'];
			$b['riego'] =(float) $fila['riego'];
			$b['tareasriego'] =(float) $fila['tareasriego'];
			$b['capacitacion'] =(float) $fila['capacitacion'];
			$b['cafe'] =(float) $fila['cafe'];
			$b['frutales'] =(float) $fila['frutales'];
			$b['macadamia'] =(float) $fila['macadamia'];
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetPoa3($cuenca,$actividad, $ano1,$ano2){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
 				sum( suma::float) as suma

		FROM 
				public.poa_sistemas_familiares_ordenado
		Where
		ano>='.$ano1.' and ano <='.$ano2.' and  descripcion='.$actividad.' and cuenca='.$cuenca) as $fila) {
			
		$b = null;
		$b['suma'] =(float )$fila['suma'];
		array_push($rs, $b);				
		}	
		echo json_encode($rs);
		
	}
	
	
	
	
	
	
	
	function actionGetComponentes(){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 
  sf_descripcion_componentes.descripcion, 
  sf_descripcion_componentes.codigo
FROM 
  public.sf_descripcion_componentes
 Order by sf_descripcion_componentes.orden ASC;') as $fila) {
			
		$b = null;
			$b['descripcion'] =$fila['descripcion'];
			$b['codigo'] = $fila['codigo'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetComponentesPorAnalisis($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('select sf_descripcion_componentes.codigo,
sf_descripcion_componentes.descripcion,
j.count as diagnostico,
g.count as instalar,
f.count as establecido

from sf_descripcion_componentes 
left join

(SELECT 
  count (ss_predio_sistema_familiar.id),
  sf_descripcion_componentes.codigo 
  
FROM 
  public.ss_predio_sistema_familiar,
  public.sf_descripcion_componentes,
  public.ss_predio

where position( sf_descripcion_componentes.codigo in ss_predio_sistema_familiar.componente_diagnostico )>0
and ss_predio_sistema_familiar.codigo_predio =ss_predio.codigo_predio' .$criterio.'
group by  sf_descripcion_componentes.codigo) as j
 on sf_descripcion_componentes.codigo=j.codigo

 left join

(SELECT 
  count (ss_predio_sistema_familiar.id),
  sf_descripcion_componentes.codigo 
  
FROM 
  public.ss_predio_sistema_familiar,
  public.sf_descripcion_componentes,
  public.ss_predio

where position( sf_descripcion_componentes.codigo in ss_predio_sistema_familiar.componente_establecido )>0
and ss_predio_sistema_familiar.codigo_predio =ss_predio.codigo_predio' .$criterio.'
group by  sf_descripcion_componentes.codigo) as f
 on sf_descripcion_componentes.codigo=f.codigo

left join

(SELECT 
  count (ss_predio_sistema_familiar.id),
  sf_descripcion_componentes.codigo 
  
FROM 
  public.ss_predio_sistema_familiar,
  public.sf_descripcion_componentes,
  public.ss_predio

where position( sf_descripcion_componentes.codigo in ss_predio_sistema_familiar.componentes_instalar )>0 
and ss_predio_sistema_familiar.codigo_predio =ss_predio.codigo_predio' .$criterio.'
group by  sf_descripcion_componentes.codigo) as g
 on sf_descripcion_componentes.codigo=g.codigo

 Order by sf_descripcion_componentes.orden
  ;') as $fila) {
			
		$b = null;
			$b['codigo'] =$fila['codigo'];
			$b['descripcion'] =$fila['descripcion'];
			$b['diagnostico'] =(float)$fila['diagnostico'];
			$b['establecido'] =(float)$fila['establecido'];
			$b['instalar'] =(float)$fila['instalar'];
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetMujeres($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			ss_predio_sistema_familiar.mujeres_trabajando as actividad ,
			 count (id) as cantidad
				  
		FROM 
			  public.ss_predio_sistema_familiar, 
			  public.ss_predio, 
			  public.pv_cliente
			
		WHERE
			 
			 ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			 ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'

		Group by 
			ss_predio_sistema_familiar.mujeres_trabajando

		Order by
			ss_predio_sistema_familiar.mujeres_trabajando ') as $fila) {
			
		$b = null;
			$b['actividad'] = $fila['actividad'];
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetTodoMujeres($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			
			 count (id) as cantidad
				  
		FROM 
			  public.ss_predio_sistema_familiar, 
			  public.ss_predio, 
			  public.pv_cliente
			
		WHERE
			 
			 ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			 ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'

		 ') as $fila) {
			
		$b = null;
			
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	function actionGetObreros($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			ss_predio_sistema_familiar.obreros_contratados as actividad ,
			 count (id) as cantidad
				  
		FROM 
			  public.ss_predio_sistema_familiar, 
			  public.ss_predio, 
			  public.pv_cliente
			
		WHERE
			 
			 ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			 ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'

		Group by 
			ss_predio_sistema_familiar.obreros_contratados

		Order by
			ss_predio_sistema_familiar.obreros_contratados ') as $fila) {
			
		$b = null;
			$b['actividad'] = $fila['actividad'];
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	function actionGetTodoObreros($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			
			 count (id) as cantidad
				  
		FROM 
			  public.ss_predio_sistema_familiar, 
			  public.ss_predio, 
			  public.pv_cliente
			
		WHERE
			 
			 ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			 ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'

		 ') as $fila) {
			
		$b = null;
			
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	function actionGetHijo($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			pv_cliente.cantidad_de_hijos_apoyan as actividad ,
			 count (id) as cantidad
				  
		FROM 
			  public.ss_predio_sistema_familiar, 
			  public.ss_predio, 
			  public.pv_cliente
			
		WHERE
			 
			 ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			 ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'

		Group by 
			pv_cliente.cantidad_de_hijos_apoyan

		Order by
			 pv_cliente.cantidad_de_hijos_apoyan desc') as $fila) {
			
		$b = null;
			$b['actividad'] = $fila['actividad'];
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	function actionGetTodoHijo($criterio){
		
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT
			
			 count (id) as cantidad
				  
		FROM 
			  public.ss_predio_sistema_familiar, 
			  public.ss_predio, 
			  public.pv_cliente
			
		WHERE
			 
			 ss_predio_sistema_familiar.codigo_predio = ss_predio.codigo_predio AND
			 ss_predio.codigo_cliente = pv_cliente.codigo_cliente'.$criterio.'

		
		') as $fila) {
			
		$b = null;
			
			$b['cantidad'] =(float) $fila['cantidad'];
			
			
			
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}
	
	
	
	
}