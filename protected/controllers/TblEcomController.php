<?php

class TblEcomController extends Controller
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
					'actions'=>array('create','update', 'getPeriodos', 'getCV', 'allCV', 'allCVPorc', 'infoEcom', 'infoEcomAcum','panelCV','panelCVAcum','getPeriodosProgresion'),
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
					'actions'=>array('create','update', 'getPeriodos', 'getCV', 'allCV', 'allCVPorc', 'infoEcom', 'infoEcomAcum','panelCV','panelCVAcum','getPeriodosProgresion'),
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

 public function actionInfoEcom($id_hiper, $cp, $fecha){
		
	header('Content-Type: application/json'); 
	
	$salida; 
	
	$compr = explode(",", $id_hiper);
		
	foreach($compr as $c){
		$c = str_replace ("'", "", $c);
		if(!is_numeric($c))
		exit("error2");	
	}
	
	$compr1 = explode(",", $cp);
		
		foreach($compr1 as $c1){
		$c1 = str_replace ("'", "", $c1);
		if(!is_numeric($c1))
		exit("error2");	
	}

	
	//CIFRA DE VENTA
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(cv) as cv";
	$Criteria->condition = "id_hiper = :hiper AND fecha = '".$fecha."'";
	$Criteria->params = array(':hiper' => $id_hiper);
	
	$model=TblEcom::model()->find($Criteria);
	$cv_total = $model->cv;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(cv) as cv";
	if($cp == -1){
		$Criteria->condition = "id_hiper = :hiper AND fecha = '".$fecha."'";
		$Criteria->params = array(':hiper' => $id_hiper);
	}else{
		$Criteria->condition = "id_hiper = :hiper AND cp IN(".$cp.") AND fecha = '".$fecha."'";
		$Criteria->params = array(':hiper' => $id_hiper);
	}
	$model=TblEcom::model()->find($Criteria);
	$cv_actual = $model->cv;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(cv) as cv";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha = '".$fecha."'::date - interval '1 year'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha = '".$fecha."'::date - interval '1 year'";
	
	$model=TblEcom::model()->find($Criteria);
	$cv_anterior = $model->cv;
	$progresion_cv = 0;
	if ($cv_anterior)
		$progresion_cv = ($cv_actual - $cv_anterior)*100/$cv_anterior;
	
	//echo $cv_actual."<br>";
	//echo $cv_anterior."<br>";
	//echo $progresion_cv ."<br>";
	$salida['progresion_cv'] = $progresion_cv;
	$salida['porcentaje_cv'] = $cv_actual*100/$cv_total;
	$salida['cv'] = (float)$cv_actual;
	
	//PEDIDOS
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha = '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha = '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$pedidos_actual = $model->num_pedidos;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha = '".$fecha."'::date - interval '1 year'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha = '".$fecha."'::date - interval '1 year'";
	
	$model=TblEcom::model()->find($Criteria);
	$pedidos_anterior = $model->num_pedidos;
	$progresion_pedidos = 0;
	if($pedidos_anterior)
		$progresion_pedidos = ($pedidos_actual - $pedidos_anterior)*100/$pedidos_anterior;
	
	//echo $pedidos_actual."<br>";
	//echo $pedidos_anterior."<br>";
	//echo $progresion_pedidos . "<br>";
	$salida['progresion_pedidos'] = $progresion_pedidos;
	$salida['num_pedidos'] = $pedidos_actual;
	
	//CLIENTES UNICOS
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(clientes_unicos) as clientes_unicos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha = '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha = '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$clientes_unicos = $model->clientes_unicos;
	
	//echo $clientes_unicos."<br>";
	$salida['clientes_unicos'] = $clientes_unicos;
	
	//RECOGIDA
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha = '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN (".$cp.") AND fecha = '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$recogida_total_actual = $model->num_pedidos;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha = '".$fecha."'::date - interval '1 year'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN (".$cp.") AND fecha = '".$fecha."'::date - interval '1 year'";
	
	$model=TblEcom::model()->find($Criteria);
	$recogida_total_anterior = $model->num_pedidos;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND tipo_entrega = 1 AND fecha = '".$fecha."'::date - interval '1 year'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND tipo_entrega = 1 AND cp IN(".$cp.") AND fecha = '".$fecha."'::date - interval '1 year'";
	
	$model=TblEcom::model()->find($Criteria);
	$recogida_anterior = $model->num_pedidos;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND tipo_entrega = 1 AND fecha = '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND tipo_entrega = 1 AND cp IN(".$cp.") AND fecha = '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$recogida_actual = $model->num_pedidos;
	
	$porc_recogida = 0;
	if($recogida_total_actual && $recogida_total_anterior)
		$porc_recogida = 100*(($recogida_actual/$recogida_total_actual) - ($recogida_anterior / $recogida_total_anterior));
	$p_recogida = 0;
	if($recogida_total_actual)
		$p_recogida = 100*($recogida_actual/$recogida_total_actual);
	
	//echo $recogida_total_actual."<br>";
	//echo $recogida_total_anterior."<br>";
	//echo $recogida_anterior."<br>";
	//echo $recogida_actual."<br>";
	//echo $porc_recogida."<br>";
	$salida['porc_recogida'] = $porc_recogida;
	$salida['p_recogida'] = $p_recogida;
	
	//CADDY
	$Criteria = new CDbCriteria();
	$Criteria->select = "(sum(cv)/sum(num_pedidos)) as cv";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha = '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha = '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$caddy_actual = $model->cv;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "(sum(cv)/sum(num_pedidos)) as cv";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha = '".$fecha."'::date - interval '1 year'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha = '".$fecha."'::date - interval '1 year'";
	
	$model=TblEcom::model()->find($Criteria);
	$caddy_anterior = $model->cv;
	
	$progresion_caddy = 0;
	if($caddy_anterior)
		$progresion_caddy = ($caddy_actual - $caddy_anterior)*100/$caddy_anterior;
	
	//echo $caddy_actual."<br>";
	//echo $caddy_anterior."<br>";
	//echo $progresion_caddy . "<br>";
	$salida['prog_caddy'] = $progresion_caddy;
	$salida['caddy'] = (float)$caddy_actual;
	
	echo json_encode($salida);
 }
 
 public function actionInfoEcomAcum($id_hiper, $cp, $fecha){
		
	header('Content-Type: application/json'); 
	
	$salida; 
	$anno = explode("-",$fecha);
	$anno = $anno[0];
	
	//CIFRA DE VENTA
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(cv) as cv";
	$Criteria->condition = "id_hiper = :hiper AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	$Criteria->params = array(':hiper' => $id_hiper);
	
	$model=TblEcom::model()->find($Criteria);
	$cv_total = $model->cv;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(cv) as cv";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$cv_actual = $model->cv;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(cv) as cv";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha BETWEEN '1-1-".$anno."'::date - interval '1 year' AND '".$fecha."'::date - interval '1 year'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha BETWEEN '1-1-".$anno."'::date - interval '1 year' AND '".$fecha."'::date - interval '1 year'";
	
	$model=TblEcom::model()->find($Criteria);
	$cv_anterior = $model->cv;
	$progresion_cv = 0;
	if($cv_anterior)
		$progresion_cv = ($cv_actual - $cv_anterior)*100/$cv_anterior;
	
	//echo $cv_actual."<br>";
	//echo $cv_anterior."<br>";
	//echo $progresion_cv ."<br>";
	$salida['progresion_cv'] = $progresion_cv;
	$salida['porcentaje_cv'] = $cv_actual*100/$cv_total;
	$salida['cv'] = (float)$cv_actual;
	
	//PEDIDOS
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$pedidos_actual = $model->num_pedidos;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha BETWEEN '1-1-".$anno."'::date - interval '1 year' AND '".$fecha."'::date - interval '1 year'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha BETWEEN '1-1-".$anno."'::date - interval '1 year' AND '".$fecha."'::date - interval '1 year'";
	
	$model=TblEcom::model()->find($Criteria);
	$pedidos_anterior = $model->num_pedidos;
	
	$progresion_pedidos = 0;
	if($pedidos_anterior)
		$progresion_pedidos = ($pedidos_actual - $pedidos_anterior)*100/$pedidos_anterior;
	
	//echo $pedidos_actual."<br>";
	//echo $pedidos_anterior."<br>";
	//echo $progresion_pedidos . "<br>";
	$salida['progresion_pedidos'] = $progresion_pedidos;
	$salida['num_pedidos'] = $pedidos_actual;
	//CLIENTES UNICOS
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(clientes_unicos) as clientes_unicos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$clientes_unicos = $model->clientes_unicos;
	
	//echo $clientes_unicos."<br>";
	$salida['clientes_unicos'] = $clientes_unicos;
	
	//RECOGIDA
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN (".$cp.") AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$recogida_total_actual = $model->num_pedidos;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha BETWEEN '1-1-".$anno."'::date - interval '1 year' AND '".$fecha."'::date - interval '1 year'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN (".$cp.") AND fecha BETWEEN '1-1-".$anno."'::date - interval '1 year' AND '".$fecha."'::date - interval '1 year'";
	
	$model=TblEcom::model()->find($Criteria);
	$recogida_total_anterior = $model->num_pedidos;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND tipo_entrega = 1 AND fecha BETWEEN '1-1-".$anno."'::date - interval '1 year' AND '".$fecha."'::date - interval '1 year'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND tipo_entrega = 1 AND cp IN(".$cp.") AND fecha BETWEEN '1-1-".$anno."'::date - interval '1 year' AND '".$fecha."'::date - interval '1 year'";
	
	$model=TblEcom::model()->find($Criteria);
	$recogida_anterior = $model->num_pedidos;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(num_pedidos) as num_pedidos";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND tipo_entrega = 1 AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND tipo_entrega = 1 AND cp IN(".$cp.") AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$recogida_actual = $model->num_pedidos;
	
	$porc_recogida = 0;
	if($recogida_total_actual && $recogida_total_anterior)
		$porc_recogida = 100*(($recogida_actual/$recogida_total_actual) - ($recogida_anterior / $recogida_total_anterior));
	
	$p_recogida = 0;
	if($recogida_total_actual)
		$p_recogida = 100*($recogida_actual/$recogida_total_actual);
	
	//echo $recogida_total_actual."<br>";
	//echo $recogida_total_anterior."<br>";
	//echo $recogida_anterior."<br>";
	//echo $recogida_actual."<br>";
	//echo $porc_recogida."<br>";
	$salida['porc_recogida'] = $porc_recogida;
	$salida['p_recogida'] = $p_recogida;
	
	//CADDY
	$Criteria = new CDbCriteria();
	$Criteria->select = "(sum(cv)/sum(num_pedidos)) as cv";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha BETWEEN '1-1-".$anno."' AND '".$fecha."'";
	
	$model=TblEcom::model()->find($Criteria);
	$caddy_actual = $model->cv;
	
	$Criteria = new CDbCriteria();
	$Criteria->select = "(sum(cv)/sum(num_pedidos)) as cv";
	if($cp == -1)
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND fecha BETWEEN '1-1-".$anno."'::date - interval '1 year' AND '".$fecha."'::date - interval '1 year'";
	else
		$Criteria->condition = 'id_hiper = ' . $id_hiper . " AND cp IN(".$cp.") AND fecha BETWEEN '1-1-".$anno."'::date - interval '1 year' AND '".$fecha."'::date - interval '1 year'";
	
	$model=TblEcom::model()->find($Criteria);
	$caddy_anterior = $model->cv;
	
	$progresion_caddy = 0;
	if($caddy_anterior)
		$progresion_caddy = ($caddy_actual - $caddy_anterior)*100/$caddy_anterior;
	
	//echo $caddy_actual."<br>";
	//echo $caddy_anterior."<br>";
	//echo $progresion_caddy . "<br>";
	$salida['prog_caddy'] = $progresion_caddy;
	$salida['caddy'] = (float)$caddy_actual;
	
	echo json_encode($salida);
 }
	public function actionGetPeriodos($id_hiper){
		
		header('Content-Type: application/json'); 
		$Criteria = new CDbCriteria();
		$Criteria->select = "DISTINCT(fecha)";
		$Criteria->condition = 'id_hiper = :id_hiper';
		$Criteria->params = array(':id_hiper' => $id_hiper);
		$Criteria->order = "fecha DESC";
		//$Criteria->distinct = true;
		
		$model=TblEcom::model()->findAll($Criteria);
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
	
	public function actionAllCV($id_hiper, $cps){
		header('Content-Type: application/json');
		
		$salida = array();
		//CALCULAR TOTAL
		$Criteria = new CDbCriteria();
		$Criteria->select = "fecha + interval '2 hour' as fecha, sum(cv) as cv";
		$Criteria->condition = 'id_hiper = :id_hiper';
		$Criteria->params = array(':id_hiper' => $id_hiper);
		$Criteria->group = "fecha";
		$Criteria->order = "fecha ASC";
		
		$model=TblEcom::model()->findAll($Criteria);
		$s_c = array();
		foreach($model as $m){
			array_push($s_c, array(strtotime($m->fecha)*1000, (float)$m->cv));
		}
		array_push($salida, array("nombre"=>"Total", "dato"=>$s_c));
		
		//CALCULAR RESTO 
		
		$cp = json_decode($cps);
		
		$cod = "";
		foreach($cp as $c){
			$Criteria = new CDbCriteria();
			$Criteria->select = "fecha + interval '2 hour' as fecha, sum(cv) as cv";
			$Criteria->condition = "id_hiper = :id_hiper AND cp = '".$c."'";
			$Criteria->params = array(':id_hiper' => $id_hiper);
			$Criteria->group = "fecha";
			$Criteria->order = "fecha ASC";
			
			$model=TblEcom::model()->findAll($Criteria);
			$s_c = array();
			foreach($model as $m){
				array_push($s_c, array(strtotime($m->fecha)*1000, (float)$m->cv));
			}
			
			if($c!= "Otros"){
				array_push($salida, array("nombre"=>"CP " . $c, "dato"=>$s_c));
				$cod .= "'".$c . "', ";
			}
				
		}
		
		//CALCULAR "OTROS" 
		$cod = substr($cod, 0, strlen($cod)-2);
		$Criteria = new CDbCriteria();
		$Criteria->select = "fecha + interval '2 hour' as fecha, sum(cv) as cv";
		$Criteria->condition = "id_hiper = :id_hiper AND cp NOT IN (".$cod.")";
		$Criteria->params = array(':id_hiper' => $id_hiper);
		$Criteria->group = "fecha";
		$Criteria->order = "fecha ASC";
		$model=TblEcom::model()->findAll($Criteria);
		$s_c = array();
		foreach($model as $m){
			array_push($s_c, array(strtotime($m->fecha)*1000, (float)$m->cv));
		}
		array_push($salida, array("nombre"=>"Otros", "dato"=>$s_c));
		
			
		echo json_encode($salida);
	}
	
	public function actionAllCVPorc($id_hiper, $cps){
		header('Content-Type: application/json'); 
		
		$cp = json_decode($cps);
		$salida = array();
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(cv) as cv";
		$Criteria->condition = "id_hiper = :id_hiper";
		$Criteria->params = array(':id_hiper' => $id_hiper);
		$Criteria->group = "fecha";
		$Criteria->order = "fecha ASC";
		
		$model=TblEcom::model()->findAll($Criteria);
		$cvTotal = array();
		$cod = "";
		
		foreach($model as $m){
			array_push($cvTotal, $m->cv);
		}
		foreach($cp as $c){
			$Criteria = new CDbCriteria();
			$Criteria->select = "fecha, sum(cv) as cv";
			$Criteria->condition = "id_hiper = :id_hiper AND cp = '".$c."'";
			$Criteria->params = array(':id_hiper' => $id_hiper);
			$Criteria->group = "fecha";
			$Criteria->order = "fecha ASC";
			
			$model=TblEcom::model()->findAll($Criteria);
			$s_c = array();
			$i=0;
			foreach($model as $m){
				array_push($s_c, array(strtotime($m->fecha)*1000, (float)($m->cv/$cvTotal[$i])*100));
				$i=$i+1;
			}
			if($c!= "Otros"){
				array_push($salida, array("nombre"=>$c, "dato"=>$s_c));
				$cod .= "'".$c . "', ";
			}
		}
		
		$cod = substr($cod, 0, strlen($cod)-2);
		$Criteria = new CDbCriteria();
		$Criteria->select = "fecha as fecha, sum(cv) as cv";
		$Criteria->condition = "id_hiper = :id_hiper AND cp NOT IN (".$cod.")";
		$Criteria->params = array(':id_hiper' => $id_hiper);
		$Criteria->group = "fecha";
		$Criteria->order = "fecha ASC";
		$model=TblEcom::model()->findAll($Criteria);
		$s_c = array();
		$i=0;
		foreach($model as $m){
			array_push($s_c, array(strtotime($m->fecha)*1000, (float)($m->cv/$cvTotal[$i])*100));
			$i=$i+1;
		}
		array_push($salida, array("nombre"=>"Otros", "dato"=>$s_c));
		
		echo json_encode($salida);
	}
	
	public function actionGetCV($id_hiper, $fecha){
		
		header('Content-Type: application/json'); 
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(cv) as cv";
		$Criteria->condition = "id_hiper = :id_hiper AND fecha = '".$fecha."'";
		$Criteria->params = array(':id_hiper' => $id_hiper);
		
		$model=TblEcom::model()->findAll($Criteria);
		$cvTotal = 0;
		
		foreach($model as $m){
			$cvTotal = $m->cv;
		}
		
		$Criteria = new CDbCriteria();
		$Criteria->select = "cp, sum(cv) as cv";
		$Criteria->condition = "id_hiper = :id_hiper AND fecha = '".$fecha."'";
		$Criteria->params = array(':id_hiper' => $id_hiper);
		$Criteria->group = "cp";
		$Criteria->order = "cv DESC";
		
		$model=TblEcom::model()->findAll($Criteria);
		$salida = array();
		$i = 0;
		$cv = 0;
		foreach($model as $m){
			$k = '';
			$k["cp"] = $m->cp;
			$k["cv"] = (float)($m->cv/$cvTotal)*100;
			$k["cv_bruto"] = $m->cv;
			if($i<10)
				array_push($salida, $k);	
			else
				$cv += $m->cv;
			$i+=1;
		}
		$k = '';
		$k["cp"] = "Otros";
		$k["cv"] = ($cv/$cvTotal)*100;
		$k["cv_bruto"] = $cv;
		array_push($salida, $k);
		
		//RECUPERAR EL AÑO ANTERIOR
		$Criteria = new CDbCriteria();
		//$Criteria->select = "DISTINCT fecha as fecha";
		$Criteria->condition = "id_hiper = :id_hiper AND fecha = '".$fecha . "'::date - interval '1 year'" ;
		$Criteria->params = array(':id_hiper' => $id_hiper);
		$Criteria->order = "fecha DESC";
		
		$model=TblEcom::model()->find($Criteria);
		$salida2 = array();
		
		if($model){
			$fecha_anterior = $model->fecha;
			$Criteria = new CDbCriteria();
			$Criteria->select = "sum(cv) as cv";
			$Criteria->condition = "id_hiper = :id_hiper AND fecha = '".$fecha_anterior."'";
			$Criteria->params = array(':id_hiper' => $id_hiper);
		
			$m=TblEcom::model()->find($Criteria);
			$cvTotal = 0;
			$cvTotal = $m->cv;
			$porc = 0;
			$cv_anterior = 0;
			foreach($salida as $s){
				$cp = $s["cp"];
				
				if($cp != "Otros"){
					$Criteria = new CDbCriteria();
					$Criteria->select = "sum(cv) as cv";
					$Criteria->condition = "id_hiper = :id_hiper AND fecha = '".$fecha_anterior."' AND cp = '".$cp."'";
					$Criteria->params = array(':id_hiper' => $id_hiper);
					
					$m=TblEcom::model()->find($Criteria);
					$k["cp"] = $s["cp"];
					$k["cv"] = (float)$s["cv"];
					$k["cv_bruto"] = (float)$s["cv_bruto"];
					if($m){
						if($m->cv!=0){
							$k["cv_anterior"] =  100*($s["cv_bruto"]-$m->cv)/$m->cv; //(float)($m->cv/$cvTotal)*100;
						}else
							$k["cv_anterior"] = 0;
						$porc = $porc + ($m->cv/$cvTotal)*100;
						$cv_anterior = $cv_anterior + $m->cv;
					}
					
					array_push($salida2, $k);
				}else{
					$k["cp"] = "Otros";
					$k["cv"] = (float)$s["cv"];
					$k["cv_bruto"] = (float)$s["cv_bruto"];
					$k["cv_anterior"] = ($s["cv"] - $cv_anterior )/$cv_anterior; //100-$porc;
					//$k["cv_anterior"] = 100-$porc;
					array_push($salida2, $k);
				}
				
			}
		}
		if(count($salida2) >0)
			echo json_encode($salida2);
		else
			echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------
	/*
	* -----------------------------------------------------------------------------------
	* PANEL E-COMMERCE
	* -----------------------------------------------------------------------------------
	*/	
	//---------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------
	
	public function actionpanelCV($region){
		
		header('Content-Type: application/json');
		
		$salida = array();
		
		if($region=="TOTAL"){
			//CALCULAR TOTAL
			$Criteria = new CDbCriteria();
			$Criteria->select = "t.fecha + interval '2 hour' as fecha, sum(t.cv) as cv";
			$Criteria->join = 'INNER JOIN tbl_hiper_alcampo ON t.id_hiper=tbl_hiper_alcampo.id_hiper_alcampo';
			//$Criteria->condition = "tbl_hiper_alcampo.region = :region";
			//$Criteria->params = array(':region' => $region);
			$Criteria->group = " t.fecha";
			$Criteria->order = "t.fecha ASC";
			
			$model=TblEcom::model()->findAll($Criteria);
			$s_c = array();
			
			foreach($model as $m){
				array_push($s_c,array(strtotime($m->fecha)*1000, (float)$m->cv));
			}
			array_push($salida, array("nombre"=>"Total", "dato"=>$s_c));
			
			//-------------------------------------
		}else{
			//CALCULAR TOTAL
			$Criteria = new CDbCriteria();
			$Criteria->select = "t.fecha + interval '2 hour' as fecha, sum(t.cv) as cv";
			$Criteria->join = 'INNER JOIN tbl_hiper_alcampo ON t.id_hiper=tbl_hiper_alcampo.id_hiper_alcampo';
			$Criteria->condition = "tbl_hiper_alcampo.region = :region";
			$Criteria->params = array(':region' => $region);
			$Criteria->group = " t.fecha";
			$Criteria->order = "t.fecha ASC";
			
			$model=TblEcom::model()->findAll($Criteria);
			$s_c = array();
			
			foreach($model as $m){
				array_push($s_c,array(strtotime($m->fecha)*1000, (float)$m->cv));
			}
			array_push($salida, array("nombre"=>"Total", "dato"=>$s_c));
			
			//-------------------------------------
			
			//SACAR ID'S Alcampo
			$Criteria = new CDbCriteria();
			$Criteria->select = "t.id_hiper, tbl_hiper_alcampo.nombre as cp";
			$Criteria->join = 'INNER JOIN tbl_hiper_alcampo ON t.id_hiper=tbl_hiper_alcampo.id_hiper_alcampo';
			$Criteria->condition = "tbl_hiper_alcampo.region = :region";
			$Criteria->params = array(':region' => $region);
			$Criteria->group = "t.id_hiper, tbl_hiper_alcampo.nombre";
			$Criteria->order = "t.id_hiper ASC";
			
			$model=TblEcom::model()->findAll($Criteria);		
			$idHiper = array();
			foreach($model as $m){
				$k['id_hiper'] = $m->id_hiper;
				$k['nombre'] = $m->cp;
				array_push($idHiper, $k);
			}
			
			//-------------------------------------
			//CALCULAR RESTO 
			
			$cod = "";	

			foreach($idHiper as $id){
				$Criteria = new CDbCriteria();
				$Criteria->select = "tbl_hiper_alcampo.nombre,t.fecha as fecha, sum(t.cv) as cv";
				$Criteria->join = 'INNER JOIN tbl_hiper_alcampo ON t.id_hiper=tbl_hiper_alcampo.id_hiper_alcampo';
				$Criteria->condition = "tbl_hiper_alcampo.region = :region AND t.id_hiper = '".$id['id_hiper']."'";
				$Criteria->params = array(':region' => $region);
				$Criteria->group = "t.fecha,tbl_hiper_alcampo.nombre";
				$Criteria->order = "t.fecha ASC";
				
				$model=TblEcom::model()->findAll($Criteria);
				$s_c = array();
				foreach($model as $m){
					array_push($s_c, array(strtotime($m->fecha)*1000, (float)$m->cv));
				}
				
				if($id!= "Otros"){
					array_push($salida, array("nombre"=>$id['id_hiper']." - Hiper ". $id['nombre'], "dato"=>$s_c));
					$cod .= "'".$id . "', ";
				}
					
			}		
		}
		echo json_encode($salida);
	}
	
	public function actionpanelCVAcum($region){
		
		header('Content-Type: application/json');
		
		$salida = array();
		
		$anno = date("Y");
		
		if($region=="TOTAL"){
			$Criteria = new CDbCriteria();
			$Criteria->select = "t.fecha + interval '2 hour' as fecha, sum(t.cv) as cv";
			$Criteria->join = 'INNER JOIN tbl_hiper_alcampo ON t.id_hiper=tbl_hiper_alcampo.id_hiper_alcampo';
			//$Criteria->condition = "tbl_hiper_alcampo.region = :region";
			//$Criteria->params = array(':region' => $region);
			$Criteria->group = " t.fecha";
			$Criteria->order = "t.fecha ASC";
			
			$model=TblEcom::model()->findAll($Criteria);
			$s_c = array();
			$fechaBuscar = "01-01";
			$sumaTotal = 0;	

			foreach($model as $m){
					$fechaMes = $m->fecha;					
					if(strpos($fechaMes, $fechaBuscar) !== FALSE){							
						$sumaTotal=0;
						array_push($s_c, array(strtotime($m->fecha)*1000, $sumaTotal));					
					}
					else{							
						$sumaTotal=$sumaTotal+(float)$m->cv;
						array_push($s_c, array(strtotime($m->fecha)*1000, $sumaTotal));
					}
				}
			array_push($salida, array("nombre"=>"Total", "dato"=>$s_c));
		}else{
			//CALCULAR TOTAL
			$Criteria = new CDbCriteria();
			$Criteria->select = "t.fecha + interval '2 hour' as fecha, sum(t.cv) as cv";
			$Criteria->join = 'INNER JOIN tbl_hiper_alcampo ON t.id_hiper=tbl_hiper_alcampo.id_hiper_alcampo';
			$Criteria->condition = "tbl_hiper_alcampo.region = :region";
			$Criteria->params = array(':region' => $region);
			$Criteria->group = " t.fecha";
			$Criteria->order = "t.fecha ASC";
			
			$model=TblEcom::model()->findAll($Criteria);
			$s_c = array();
			$fechaBuscar = "01-01";
			$sumaTotal = 0;	

			foreach($model as $m){
					$fechaMes = $m->fecha;					
					if(strpos($fechaMes, $fechaBuscar) !== FALSE){							
						$sumaTotal=0;
						array_push($s_c, array(strtotime($m->fecha)*1000, $sumaTotal));					
					}
					else{							
						$sumaTotal=$sumaTotal+(float)$m->cv;
						array_push($s_c, array(strtotime($m->fecha)*1000, $sumaTotal));
					}
				}
			array_push($salida, array("nombre"=>"Total", "dato"=>$s_c));
			
			//-------------------------------------
			
			//SACAR ID'S Alcampo
			$Criteria = new CDbCriteria();
			$Criteria->select = "t.id_hiper, tbl_hiper_alcampo.nombre as cp";
			$Criteria->join = 'INNER JOIN tbl_hiper_alcampo ON t.id_hiper=tbl_hiper_alcampo.id_hiper_alcampo';
			$Criteria->condition = "tbl_hiper_alcampo.region = :region";
			$Criteria->params = array(':region' => $region);
			$Criteria->group = "t.id_hiper, tbl_hiper_alcampo.nombre";
			$Criteria->order = "t.id_hiper ASC";
			
			$model=TblEcom::model()->findAll($Criteria);		
			$idHiper = array();
			foreach($model as $m){
				$k['id_hiper'] = $m->id_hiper;
				$k['nombre'] = $m->cp;
				array_push($idHiper, $k);
			}
			
			//-------------------------------------
			//CALCULAR RESTO 
			
			$cod = "";	
			$sumaResto = 0;	

			foreach($idHiper as $id){
				$Criteria = new CDbCriteria();
				$Criteria->select = "tbl_hiper_alcampo.nombre,t.fecha as fecha, sum(t.cv) as cv";
				$Criteria->join = 'INNER JOIN tbl_hiper_alcampo ON t.id_hiper=tbl_hiper_alcampo.id_hiper_alcampo';
				$Criteria->condition = "tbl_hiper_alcampo.region = :region AND t.id_hiper = '".$id['id_hiper']."'";			
				$Criteria->params = array(':region' => $region);
				$Criteria->group = "t.fecha,tbl_hiper_alcampo.nombre";
				$Criteria->order = "t.fecha ASC";
				
				$model=TblEcom::model()->findAll($Criteria);
				$s_c = array();
				$fechaBuscar = "01-01";
				foreach($model as $m){
					$fechaMes = $m->fecha;	
					if(strpos($fechaMes, $fechaBuscar) !== FALSE){		
						$sumaResto=0;
						array_push($s_c, array(strtotime($m->fecha)*1000, $sumaResto));					
					}
					else{		
						$sumaResto=$sumaResto+(float)$m->cv;
						array_push($s_c, array(strtotime($m->fecha)*1000, $sumaResto));
					}
				}
				
				if($id!= "Otros"){
					array_push($salida, array("nombre"=>$id['id_hiper']." - Hiper ". $id['nombre'], "dato"=>$s_c));
					$cod .= "'".$id . "', ";
				}				
			}		
		}	
		echo json_encode($salida);
	}
	
	//---------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------
	
	
	public function actionGetPeriodosProgresion(){
		
		header('Content-Type: application/json'); 
		
		$model=TblEcom::model()->findAllBySql("SELECT 
												  DISTINCT(ec_progresion_cp.fecha) as fecha
												FROM 
												  public.ec_progresion_cp
												WHERE progresion IS NOT NULL
												ORDER BY fecha DESC");

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
	
	
	//---------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------
	
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
		$model=new TblEcom;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblEcom']))
		{
			$model->attributes=$_POST['TblEcom'];
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

		if(isset($_POST['TblEcom']))
		{
			$model->attributes=$_POST['TblEcom'];
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
		$dataProvider=new CActiveDataProvider('TblEcom');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblEcom('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblEcom']))
			$model->attributes=$_GET['TblEcom'];

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
		$model=TblEcom::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-ecom-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
