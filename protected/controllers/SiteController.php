<?php

class SiteController extends Controller
{

	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		
			$permisos = array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('index', 'login', 'logout'),
					'users'=>array('*'),
				),
				/*array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('inicio', 'visor', 'ZonasInfluencia', 'clientes', 'ecomm', 'Prueba', 'jm', 'informe', 'obtenerInforme','mantenimiento','entorno','entornoAnalisis', 'printZI', 'formZI'),
					'users'=>array('@'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('panelEcomm','panelMercado','ecommProgresion','demo','competencia','panelHabits'),
					'users'=>array('jartieda','admin22','demoArgongra', 'jlAlberruche'),
				),
				
				array('deny',  // deny all users
					'users'=>array('*'),
				),*/
			);
		
//AQUI LEO LAS TABLAS DE ACCESO (USERSM GROUP Y ACCIONES) PARA CARGAR LO QUE ESTÁ PERMIIDO A CADA GRUPO
//OBSERVESE QUE EN EST APLICACION SITE SE RESERVA PARA ESTO
//ESTO QUIERE DECIR QUE SI ALGUNA FUNCION SE QUIERE PERMITIR TAN SOLO A UN GRUPO O GRUPO DE USUARIOS SE PUEDE INTRODUCIR AQUI. 

		
		if(Yii::app()->user->id){
			$model = new Acciones();
			$Criteria = new CDbCriteria();
			$Criteria->condition = "grupo = '".Yii::app()->user->getState('grupo')."'";
			error_log("grupo = '".Yii::app()->user->getState('grupo')."'");
			$acciones = $model->findAll($Criteria);
			$a = array();
			foreach($acciones as $accion){
				array_push($a, $accion->accion);
				
				
			}
			$b = array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>$a,
					'users'=>array(Yii::app()->user->id),
				);
			
			array_push($permisos, $b);
			//error_log("ACCEDO AQUI: " . Yii::app()->user->id . " GRUPO:" . Yii::app()->user->getState('grupo') );
		}
		array_push($permisos, array('deny',  // deny all users
					'users'=>array('*'),
				));
		error_log(json_encode($permisos));
			return $permisos;
		//}
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->renderPartial('index');
	}
	
	public function actionObtenerInforme()
	{
		//$this->renderPartial('webs/obtenerInforme');
		
	$this->pageTitle = "Histórico";
		//$this->render('webs/cuadrodemandos01');
		$this->render('webs/rfhistorico');
	}
	
	public function actionObtenerInformeCuencas()
	{
				
		$this->pageTitle = "Subcuencas";
		$this->render('webs/cuadrodemandos01_cuencas');
	}
	
	public function actionMantenimiento()
	{
		$this->renderPartial('webs/mantenimiento');
	}
	
	public function actionInforme()
	{
		$this->pageTitle = "Microcuencas";
		$this->render('webs/cuadrodemandos02');
	}
	
	
	
	public function actionJM()
	{
		$this->renderPartial('webs/jm');
	}
	
	public function actionPrueba()
	{
		$model=new GeoCp();
	
	}
	/**
	* Visualización de la pantalla de ZIP CODE
	*/
	public function actionZipCode()
	{
		$this->pageTitle = "U. Política - Busqueda";
		$this->render('webs/Unidad_administrativa');
	}
	
	/**
	* Visualización de la pantalla de ZONAS DE INFLUENCIA
	*/
	public function actionZonasInfluencia()
	{
		$this->pageTitle = "Plantaciones - Busqueda";
		$this->render('webs/predio');
	}

	/**
	* Visualización de la pantalla de ISOCRONAS
	*/
	public function actionIsocronas()
	{
		$this->pageTitle = "Situación a día de hoy (Actual)";
		$this->render('webs/rfgeneral');
	}
	
	public function actionRefogenefechas()
	{
		$this->pageTitle = "Estadisticas reforestacion entre dos fechas";
		$this->render('webs/rffgeneral');
	}
	public function actionActirefo()
	{
		$this->pageTitle = "Situación a día de hoy actividad reforestación";
		$this->render('webs/arfgeneral');
	}
	
	public function actionActirefofechas()
	{
		$this->pageTitle = "Estadisticas actividad reforestacion entre dos fechas";
		$this->render('webs/arffgeneral');
	}
	
	public function actionGanaderia()
	{
		$this->pageTitle = "Silvopastoriles";
		$this->render('webs/ganaderia_actual');
	
	}
	
	/**
	* ACTUALIZAR BASES DE DATOS
	*/
	
	public function actionActualizar()
	{
		$this->pageTitle = "Actualizar";
		$this->render('webs/actualizarportada');
	}
	
	
	public function actionActualizartodo()
	{
		$this->pageTitle = "Actualizardatos";
		$this->render('webs/actualizardatos');
	}
	
	public function actionActualizartablas()
	{
		$this->pageTitle = "ActualizarTablaPostgres";
		$this->render('webs/actualizartabla');
	}
	public function actionActualizarsig()
	{
		$this->pageTitle = "ActualizarSIG";
		$this->render('webs/actualizarsig');
	}
	public function actionActualizarpredios()
	{
		$this->pageTitle = "ActualizarPRED";
		$this->render('webs/actualizarpred');
	}
	public function actionActualizarprediossig()
	{
		$this->pageTitle = "ActualizarPREDSIG";
		$this->render('webs/actualizarpredsig');
	}
	
	/**
	* Seguimiento
	*/
	
	public function actionSeguimiento()
	{
		$this->pageTitle = "Seguimiento";
		//$this->render('webs/seguimiento');
		$this->render('webs/general');
	}
	public function actionFacturacion()
	{
		$this->pageTitle = "Facturacion";
		$this->render('webs/Facturacion');
	}
	
	
	public function actionVisor()
	{
		$this->pageTitle = "Visor";
		$this->render('webs/visor');
	}
	public function actionVisor2()
	{
		$this->pageTitle = "Visor2";
		$this->render('webs/visor_busqueda');
	}
	
	

	public function actionVisor_medida()
	{
		$this->pageTitle = "Visor_medida";
		$this->render('webs/visormedida');
	}
	
	/**
	* Visualización de la pantalla de CUENCAS
	*/
	public function actionCuencas()
	{
		$this->pageTitle = "Cuencas - Busqueda";
		//$this->render('webs/cuenca')
		$this->render('webs/rfcuenca');
	}
	
	
	/**
	* Visualización de la pantalla de E-COMMERCE
	*/
	public function actionEcomm()
	{
		$this->pageTitle = "POA";
		$this->render('webs/poa');
	}
	/**
	* Visualización de la pantalla de CLIENTES
	*/
	public function actionClientes()
	{
		$this->pageTitle = "Actualiza";
		$this->render('webs/leerexcelestacionmeteo');
	}
	
	/**
	* Visualización de la pantalla de DEMO
	*/
	public function actionDemo()
	{
		$this->pageTitle = "DEMO";
		$this->render('webs/demo');
	}
	
	/**
	* Visualización de la pantalla de PANEL E-COMMERCE
	*/
	public function actionPanelEcomm()
	{
		$this->pageTitle = "PANEL E-COMMERCE";
		$this->render('webs/panelEcomm');
	}
	
	/**
	* Visualización de la pantalla de PANEL MERCADO
	*/
	public function actionPanelMercado()
	{
		$this->pageTitle = "PANEL MERCADO";
		$this->render('webs/panelMercado');
	}
	
	/**
	* Visualización de la pantalla de PANEL HABITS
	*/
	public function actionPanelHabits()
	{
		$this->pageTitle = "PANEL HABITS";
		$this->render('webs/panelHabits');
	}
	
	/**
	* Visualización de la pantalla de PROGRESIÓN E-COMMERCE
	*/
	public function actionEcommProgresion()
	{
		$this->pageTitle = "PROGRESIÓN E-COMMERCE";
		$this->render('webs/ecommProgresion');
	}
	
	/**
	* Visualización de la pantalla de COMPETENCIA
	*/
	public function actionCompetencia()
	{
		$this->pageTitle = "COMPETENCIA";
		$this->render('webs/competencia');
	}
	
	/**
	* Visualización de la pantalla de ENTORNO
	*/
	public function actionEntorno()
	{
		$this->pageTitle = "CM 03";
		$this->render('webs/cuadrodemandos03');
		//$this->pageTitle = "ENTORNO";
		//$this->render('webs/entorno_3857');
	}
	
	//_________________________________________________________________________________________
	//ganaderia
	
	public function actiongs_actual()
	{
		$this->pageTitle = "Silvopastoriles_actual";
		$this->render('webs/ganaderia_actual');
		
	}
	
	public function actiongs_cuencas()
	{
		$this->pageTitle = "Ganaderia_cuencas";
		$this->render('webs/ganaderia_cuencas');
		
	}
	
	public function actiongs_unidad_administrativa()
	{
		$this->pageTitle = "Ganaderia_UA";
		$this->render('webs/ganaderia_ua');
		
	}
	public function actiongs_productor()
	{
		$this->pageTitle = "Ganaderia_productor";
		$this->render('webs/ganaderia_productor');
		
	}
		public function actiongs_poa()
	{
		$this->pageTitle = "Ganaderia_poa";
		$this->render('webs/ganaderia_poa');
		
	}
	public function actiongs_cm01()
	{
		$this->pageTitle = "Ganaderia_cm01";
		$this->render('webs/ganaderia_cm01');
		
	}
	
	public function actiongs_cm02()
	{
		$this->pageTitle = "Ganaderia_cm02";
		$this->render('webs/ganaderia_cm02');
		
	}
	public function actiongs_cm03()
	{
		$this->pageTitle = "Ganaderia_cm03";
		$this->render('webs/ganaderia_cm03');
		
	}
	
	
	
	/**
	* Impresión de mapas ZONAS DE INFLUENCIA
	*/
	public function actionPrintZI()
	{
		$this->pageTitle = "ZONAS DE INFLUENCIA";
		$this->renderPartial('printZI');
	}
	/**
	* Impresión de mapas ZONAS DE INFLUENCIA
	*/
	public function actionFormZI()
	{
		$this->pageTitle = "ZONAS DE INFLUENCIA";
		$this->renderPartial('webs/printZI_form');
	}
	/**
	* Visualización de la pantalla de ENTORNO - ANÁLISIS DE PROXIMIDAD
	*/
	public function actionEntornoAnalisis()
	{
		$this->pageTitle = "ENTORNO - ANÁLISIS DE PROXIMIDAD";
		$this->render('webs/entornoAnalisis');
	}
	
	public function actionHojaexcel($criterio)
	{
		$this->pageTitle = " ";
		$this->renderPartial('webs/hojaexcel');
	}
	
	public function actionInformeparcelapdf($parcela)
	{
		$this->pageTitle = " ";
		$this->renderPartial('webs/informeparcelapdf');
	}
	
	public function actionWordWrap()
	{
		$this->pageTitle = " ";
		$this->renderPartial('webs/wordwrap');
	}
	
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//$this->redirect('index.php?r=site/inicio');
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->renderPartial('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionInicio()
	{
		$this->renderPartial('paginas/inicio');
	}
	
	//CAFE
	
	public function actioncafegeneral()
	{
		$this->pageTitle = "Cafe a dia de hoy";
		$this->render('webs/cfgeneral');
	}
	public function actioncafecuencas()
	{
		$this->pageTitle = "Cafe por cuenca";
		$this->render('webs/cfcuenca');
	}
	public function actioncafehistorico()
	{
		//$this->renderPartial('webs/obtenerInforme');
		
	$this->pageTitle = "Café histórico";
		$this->render('webs/cfhistorico');
	}
	
	
	public function actionsistemasfamiliaresgeneral()
	{
		$this->pageTitle = "Sistemas F. a dia de hoy";
		$this->render('webs/sfgeneral');
	}
	public function actionsistemasfamiliarescuencas()
	{
		$this->pageTitle = "Sistemas F. por cuencas";
		$this->render('webs/sfcuenca');
	}
	public function actionsistemasfamiliareshistorico()
	{
		$this->pageTitle = "Sistemas F. historico";
		$this->render('webs/sfhistorico');
	}
	
	
	
	public function actionmacadamiageneral()
	{
		$this->pageTitle = "Macadamia a dia de hoy";
		$this->render('webs/mageneral');
	}
	public function actionmacadamiacuencas()
	{
		$this->pageTitle = "Macadamia por cuenca";
		$this->render('webs/macuenca');
	}
	public function actionmacadamiahistorico()
	{
		$this->pageTitle = "Macadamia historico";
		$this->render('webs/mahistorico');
	}
	
	
	
	
	public function actionplantacionguamageneral()
	{
		$this->pageTitle = "Plantacion guama a dia de hoy";
		$this->render('webs/pggeneral');
	}
	public function actionplantacionguamacuencas()
	{
		$this->pageTitle = "Plantacion guama por cuenca";
		$this->render('webs/pgcuenca');
	}
	public function actionplantacionguamahistorico()
	{
		$this->pageTitle = "Plantacion guama historia";
		$this->render('webs/pghistorico');
	}
	public function actionsereforestacion()
	{
		$this->pageTitle = "Seguimiento reforestacion";
		$this->render('webs/rfgeneral');
	}
	public function actionsecafe()
	{
		$this->pageTitle = "Seguimiento cafe";
		$this->render('webs/cfgeneral');
	}
	public function actionsesistemasfamiliares()
	{
		$this->pageTitle = "Seguimiento Sistemas Familiares";
		$this->render('webs/sfgeneral');
	}
	public function actionsemacadamia()
	{
		$this->pageTitle = "Seguimiento Macadamia";
		$this->render('webs/mageneral');
	}
	public function actionsereforestacionguama()
	{
		$this->pageTitle = "Seguimiento Reforestacion con Guama";
		$this->render('webs/pggeneral');
	}
	public function actionverMapa()
	{
		$this->pageTitle = "Ver el mapa";
		$this->renderPartial('webs/cargarmapa');
	}
	
	
	public function actiongenerosfgeneral()
	{
		$this->pageTitle = "Género_sistema_familiar";
		$this->render('webs/generosfgeneral');
	}
	
	public function actiongenerocfgeneral()
	{
		$this->pageTitle = "Género_cafe";
		$this->render('webs/generocfgeneral');
	}
	
	
}