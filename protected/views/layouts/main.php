<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link type="text/css" rel="stylesheet" href="css/layout-default.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/b0d5f35e.vendor.css">
		<link rel="stylesheet" href="/ol_v3.2.1/css/ol.css" type="text/css">
		 <!--link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css"-->		
		<style type="text/css">
			html, body {
				width:		100%;
				height:		100%;					
				
			}
			<?php if(CHtml::encode($this->pageTitle) != "SIGMA - CrearCodigoMkt TblCodigoMkt" && CHtml::encode($this->pageTitle) != "PANEL E-COMMERCE" && CHtml::encode($this->pageTitle) != "PANEL MERCADO" && CHtml::encode($this->pageTitle) != "PROGRESIÓN E-COMMERCE" && CHtml::encode($this->pageTitle) != "DEMO" && CHtml::encode($this->pageTitle) != "PANEL HABITS"){ ?>
				
				#content {
					background:	#fff;
					height:		100%;
					top:		0px;	/* margins in pixels */
					bottom:		10px;
					right:		0px;
					width:		100%;
					min-width:	700px;
					_width:		1200px; /* min-width for IE6 */
				}
				
				#container {
					height:		90%;
					margin:		10px;
				}	
			<?php }else{ ?>
				#content {					
					height:		100%;
					top:		0px;	/* margins in pixels */
					bottom:		0px;	/* could also use a percent */
					left:		0px;
					right:		0px;
					width:		100%;
					min-width:	700px;
					_width:		1200px; /* min-width for IE6 */
				}
			
				#container {
					height:		100%;
					margin:		0px;
				}
			<?php } ?>	
		</style>
		
		<!--script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.layout.js"></script-->		
		
		<!--
		<script type="text/javascript" src="js/a753cc2e.vendor.js"></script>
		<script type="text/javascript" src="js/c6b52431.plugins.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script type="text/javascript" src="js/jquery.layout.resizePaneAccordions-latest.js"></script>
		<script type="text/javascript" src="js/jquery-ui-latest.js"></script>
		<script type="text/javascript" src="js/jquery.layout.js"></script>
		<script src="/highcharts/Highstock-2.0.4/js/highstock.js"></script>
		<script src="/highcharts/Highstock-2.0.4/js/modules/exporting.js"></script>
		<!--script src="/ol_v3.2.1/build/ol.js" type="text/javascript"></script>
		<script src="http://openlayers.org/en/v3.5.0/build/ol.js" type="text/javascript"></script-->
		
		<link rel="stylesheet" href="
		https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
		<script type="text/javascript" src="js/a753cc2e.vendor.js"></script>
		<script type="text/javascript" src="js/c6b52431.plugins.js"></script>
		<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
		
		<script type="text/javascript" src="js/jquery.layout-latest.js"></script>
		<script type="text/javascript" src="js/jquery.layout.resizePaneAccordions-latest.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script src="js/jquery-ui.js"></script>
		<!--script type="text/javascript" src="js/jquery-ui-latest.js"></script-->
		<!--script src="/highcharts/Highcharts-4.0.4/js/highcharts.js"></script>
		<script src="/highcharts/Highcharts-4.0.4/js/modules/heatmap.js"></script>
		<script src="/highcharts/Highcharts-4.0.4/js/modules/treemap.js"></script-->
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/highcharts-more.js"></script>
		<script src="https://code.highcharts.com/modules/heatmap.js"></script>
		<script src="https://code.highcharts.com/modules/treemap.js"></script>
		<script src="https://code.highcharts.com/modules/bullet.js"></script>
		<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
		
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>




<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

		
		
		<script src="/highcharts/Highcharts-4.0.4/js/modules/exporting.js"></script>	
		
		<!--script src="/ol_v3.2.1/build/ol.js" type="text/javascript"></script-->
		<script src="js/ol.js" type="text/javascript"></script>
		 <!--script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script-->
		
		
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		
		
		<!--REFORESTACION
		-->
		<?php if(CHtml::encode($this->pageTitle) == "Situación a día de hoy (Actual)" ||CHtml::encode($this->pageTitle) == "isocronas"||CHtml::encode($this->pageTitle) == "Cuencas - Busqueda" ||CHtml::encode($this->pageTitle) == "U. Política - Busqueda" ||CHtml::encode($this->pageTitle) == "Plantaciones - Busqueda" ||CHtml::encode($this->pageTitle) == "POA"||CHtml::encode($this->pageTitle) == "Histórico"||CHtml::encode($this->pageTitle) == "Subcuencas"||CHtml::encode($this->pageTitle) == "Microcuencas"||CHtml::encode($this->pageTitle) == "CM 03" ||CHtml::encode($this->pageTitle) == "Estadisticas reforestacion entre dos fechas"||CHtml::encode($this->pageTitle) == "Situación a día de hoy actividad reforestación"||CHtml::encode($this->pageTitle) == "Estadisticas actividad reforestacion entre dos fechas" ){ ?>
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			
			<div class="row">
											
				
				
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9 >
					<h2>  span style="font-style:italic"</h2>
					<a  href="index.php?r=site/isocronas"><img class="img-square" width="40px" src="images/reforestacion.png" ></a>
					<h3 style="color: FireBrick">Reforestacion >  <?php echo CHtml::encode($this->pageTitle); ?></h3>
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img    align="right" src="images/reforestacion.png" width='60%'></img></a></div>-->
				</div>
			</div>
			
			
			
			</div>
				<!--<div class="derecha" style="width: 170px; height: 100px; font size:1"> 		<div  style="width: 170px;font size:1">-->
				<?php
				//echo CHtml::encode($this->pageTitle );
				?>
				</div>
				
				
			</div><!-- header -->

			<ul class="nav nav-pills" role="tablist">
				<li id="tabCuenca" role="presentation"><a href="index.php?r=site/cuencas">Agencia Forestal</a></li>
				<!--<li id="tabarff" role="presentation"><a href="index.php?r=site/actirefofechas">Actividad reforestacion</a></li>-->
				<li id="tabRfh" role="presentation"><a href="index.php?r=site/obtenerInforme">Histórico</a></li>
				
				<!--
				<li id="tabRf" role="tablist"><a  href="index.php?r=site/isocronas">Reforestacion general</a></li>
				<li id="tabRff" role="tablist"><a href="index.php?r=site/refogenefechas">Reforestacion general por fechas</a></li>
				<li id="tabRfa" role="presentation"  ><a href="index.php?r=site/actirefo">Actividad reforestacion</a></li>
				<li id="tabarff" role="presentation"><a href="index.php?r=site/actirefofechas">Actividad reforestacion por fechas</a></li>
				
				<li id="tabRfh" role="presentation"><a href="index.php?r=site/obtenerInforme">Histórico</a></li>
				<!--<li role="presentation"><a href="index.php?r=site/zipCode"> Unidad Política</a></li>
				<li role="presentation"><a href="index.php?r=site/zonasInfluencia">Plantación/Predio/Cliente</a></li>
				
				
				<li role="presentation" ><a href="index.php?r=site/obtenerInformeCuencas">Por Subcuencas</a></li>
				<li role="presentation" ><a  href="index.php?r=site/Informe">Por Microcuenca</a></li>
				<li role="presentation" ><a href="index.php?r=site/entorno">Especies</a></li>-->
				
			</ul>
		<?php } ?>
		
		
		<!--CAFE
		-->
		<?php if(CHtml::encode($this->pageTitle) == "Cafe a dia de hoy" ||CHtml::encode($this->pageTitle) == "Cafe por cuenca"||CHtml::encode($this->pageTitle) ==  "Café histórico" ){ ?>
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			
			<div class="row">
											
				
				
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9 >
					<h2>  span style="font-style:italic"</h2>
					<a  href="index.php?r=site/cafegeneral"><img class="img-square" width="40px" src="images/cafe.png" ></a>
					<h3 style="color: FireBrick">Café >  <?php echo CHtml::encode($this->pageTitle); ?></h3>
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img    align="right" src="images/reforestacion.png" width='60%'></img></a></div>-->
				</div>
			</div>
			
			
			
			</div>
				<!--<div class="derecha" style="width: 170px; height: 100px; font size:1"> 		<div  style="width: 170px;font size:1">-->
				<?php
				//echo CHtml::encode($this->pageTitle );
				?>
				</div>
				
				
			</div><!-- header -->

			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation"><a href="index.php?r=site/cafegeneral">Actual</a></li>
				<li role="presentation"><a href="index.php?r=site/cafecuencas">Cuencas</a></li>
				
				<!--<li role="presentation"><a href="index.php?r=site/ecomm">POA</a></li>-->
				<!--<li role="presentation"><a href="index.php?r=site/clientes">Otros</a></li>-->
				<li role="presentation" ><a href="index.php?r=site/cafehistorico">Histórico</a></li>
				
				
			</ul>
		<?php } ?>
		
		<!--SISTEMA FAMILIAR-->
		<?php if(CHtml::encode($this->pageTitle) =="Sistemas F. a dia de hoy" ||CHtml::encode($this->pageTitle) == "Sistemas F. a dia de hoy" ||CHtml::encode($this->pageTitle) == "Sistemas F. por cuencas" ||CHtml::encode($this->pageTitle) == "Sistemas F. historico"  ){ ?>
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			
			<div class="row">
											
				
				
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9 >
					<h2>  span style="font-style:italic"</h2>
					<a  href="index.php?r=site/sistemasfamiliaresgeneral"><img class="img-square" width="40px" src="images/sistemas_fam.png" ></a>
					<h3 style="color: FireBrick">Sistemas familiares>  <?php echo CHtml::encode($this->pageTitle); ?></h3>
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img    align="right" src="images/reforestacion.png" width='60%'></img></a></div>-->
				</div>
			</div>
			
			
			
			</div>
				<!--<div class="derecha" style="width: 170px; height: 100px; font size:1"> 		<div  style="width: 170px;font size:1">-->
				<?php
				//echo CHtml::encode($this->pageTitle );
				?>
				</div>
				
				
			
			</div><!-- header -->

			<ul  class="nav nav-pills" role="tablist">
				<li id="tabsfgeneral" role="presentation"><a href="index.php?r=site/sistemasfamiliaresgeneral">Sistema familiar</a></li>
				<li id="tabsfcuenca" role="presentation"><a href="index.php?r=site/sistemasfamiliarescuencas">Actividad</a></li>
				<!--<li role="presentation"><a href="index.php?r=site/zipCode"> Unidad Política</a></li>-->
				<!--<li role="presentation"><a href="index.php?r=site/zonasInfluencia">Plantación/Predio/Cliente</a></li>-->
				<!--<li role="presentation"><a href="index.php?r=site/ecomm">POA</a></li>-->
				<!--<li role="presentation"><a href="index.php?r=site/clientes">Otros</a></li>-->
				<li id="tabsfhistoria" role="presentation" ><a href="index.php?r=site/sistemasfamiliareshistorico">Histórico</a></li>
				<!--<li role="presentation" ><a href="index.php?r=site/obtenerInformeCuencas">Por Subcuencas</a></li>-->
				<!--<li role="presentation" ><a  href="index.php?r=site/Informe">Por Microcuenca</a></li>-->
				<!--<li role="presentation" ><a href="index.php?r=site/entorno">Especies</a></li>-->
				
			</ul>
		<?php } ?>
		
		<!--Plantacion guama-->
		<?php if(CHtml::encode($this->pageTitle) =="Plantacion guama a dia de hoy" ||CHtml::encode($this->pageTitle) == "Plantacion guama a dia de hoy" ||CHtml::encode($this->pageTitle) == "Plantacion guama por cuenca"||CHtml::encode($this->pageTitle) == "Plantacion guama historia"  ){ ?>
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			
			<div class="row">
											
				
				
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9 >
					<h2>  span style="font-style:italic"</h2>
					<a  href="index.php?r=site/plantacionguamageneral"><img class="img-square" width="40px" src="images/cafe.png" ></a>
					<h3 style="color: FireBrick">Plantación Guama>  <?php echo CHtml::encode($this->pageTitle); ?></h3>
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img    align="right" src="images/reforestacion.png" width='60%'></img></a></div>-->
				</div>
			</div>
			
			
			
			</div>
				<!--<div class="derecha" style="width: 170px; height: 100px; font size:1"> 		<div  style="width: 170px;font size:1">-->
				<?php
				//echo CHtml::encode($this->pageTitle );
				?>
				</div>
				
				
			</div><!-- header -->

			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation"><a href="index.php?r=site/plantacionguamageneral">Actual</a></li>
				<li role="presentation"><a href="index.php?r=site/plantacionguamacuencas">Cuencas</a></li>
				
				<li role="presentation" ><a href="index.php?r=site/plantacionguamahistorico">Histórico</a></li>
		
				
			</ul>
		<?php } ?>
		<!--MACADAMIA-->
		<?php if(CHtml::encode($this->pageTitle) ==  "Macadamia a dia de hoy"||CHtml::encode($this->pageTitle) == "Macadamia a dia de hoy" ||CHtml::encode($this->pageTitle) == "Macadamia por cuenca" ||CHtml::encode($this->pageTitle) == "Macadamia historico"){ ?>
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			
			<div class="row">
											
				
				
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9 >
					<h2>  span style="font-style:italic"</h2>
					<a  href="index.php?r=site/macadamiageneral"><img class="img-square" width="40px" src="images/macadamia.png" ></a>
					<h3 style="color: FireBrick">Macadamia >  <?php echo CHtml::encode($this->pageTitle); ?></h3>
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img    align="right" src="images/reforestacion.png" width='60%'></img></a></div>-->
				</div>
			</div>
			
			
			
			</div>
				<!--<div class="derecha" style="width: 170px; height: 100px; font size:1"> 		<div  style="width: 170px;font size:1">-->
				<?php
				//echo CHtml::encode($this->pageTitle );
				?>
				</div>
				
				
			</div><!-- header -->

			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation"><a href="index.php?r=site/macadamiageneral">Actual</a></li>
				<li role="presentation"><a href="index.php?r=site/macadamiacuencas">Cuencas</a></li>
				<li role="presentation" ><a href="index.php?r=site/macadamiahistorico">Histórico</a></li>
				
				
			</ul>
		<?php } ?>
		
		<!--GENERO INTRODUCIDO el 18 dicembre 2019
		-->
		<?php if(CHtml::encode($this->pageTitle) == "Género_sistema_familiar" ||CHtml::encode($this->pageTitle) == "Género_cafe"||CHtml::encode($this->pageTitle) ==  "Genero" ){ ?>
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			
			<div class="row">
											
				
				
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9 >
					<h2>  span style="font-style:italic"</h2>
					<a  href="index.php?r=site/generosfgeneral"><img class="img-square" width="40px" src="images/genero.png" ></a>
					<h3 style="color: FireBrick">Género >  <?php echo CHtml::encode($this->pageTitle); ?></h3>
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img    align="right" src="images/reforestacion.png" width='60%'></img></a></div>-->
				</div>
			</div>
			
			
			
			</div>
				<!--<div class="derecha" style="width: 170px; height: 100px; font size:1"> 		<div  style="width: 170px;font size:1">-->
				<?php
				//echo CHtml::encode($this->pageTitle );
				?>
				</div>
				
				
			</div><!-- header -->
			
		
			
			
			

			<ul class="nav nav-pills" role="tablist">
				<li id="tabsfgeneralsf" role="presentation"><a href="index.php?r=site/generosfgeneral">Género-Sistemas Familiares</a></li>
				<li id="tabsfgeneralcf" role="presentation"><a href="index.php?r=site/generocfgeneral">Género-Café</a></li>
				
				<!--<li role="presentation"><a href="index.php?r=site/ecomm">POA</a></li>-->
				<!--<li role="presentation"><a href="index.php?r=site/clientes">Otros</a></li>-->
				<!--<li role="presentation" ><a href="index.php?r=site/cafehistorico">Histórico</a></li>-->
				
				
			</ul>
		<?php } ?>
		
		
		<!--GANADERIA
		-->
		
		<?php if(CHtml::encode($this->pageTitle) == "Silvopastoriles" ||CHtml::encode($this->pageTitle) == "Silvopastoriles_actual" ||CHtml::encode($this->pageTitle) == "Ganaderia_productor"||CHtml::encode($this->pageTitle) == "Ganaderia_cuencas" ||CHtml::encode($this->pageTitle) == "Ganaderia_UA" ){ ?>
			
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			<div class="row">
											
				
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9" >
				<a  href="index.php?r=site/isocronas"><img class="img-square" width="40px" src="images/ganaderia.png" ></a>
					<h3 style="color: FireBrick">Silvopastoriles >  <?php echo CHtml::encode($this->pageTitle); ?></h3>
				
				
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img align="right" src="images/ganaderia.png" width='60%'></img></a></div>-->
				</div>
			</div>
			
			
				<!--<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='10%'></img></a></div>				
				<!--<div class="derecha" style="width: 170px; height: 100px; font size:1"> 		<div  style="width: 170px;font size:1">-->
				<?php
				//echo CHtml::encode($this->pageTitle );
				?>
				</div>
				
			</div><!-- header -->

			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation"><a href="index.php?r=site/gs_actual">Actual</a></li>
				<li role="presentation"><a href="index.php?r=site/gs_cuencas">Cuencas</a></li>
				<li role="presentation"><a href="index.php?r=site/gs_unidad_administrativa"> Unidad Administrativa</a></li>
				<li role="presentation"><a href="index.php?r=site/gs_productor">Productor</a></li>
				<!--<li role="presentation"><a href="index.php?r=site/gs_poa">POA</a></li>-->
				<li role="presentation" ><a href="index.php?r=site/gs_cm01">MANDOS 01</a></li>
				<li role="presentation" ><a  href="index.php?r=site/gs_cm02">MANDOS 02</a></li>
				<li role="presentation" ><a href="index.php?r=site/gs_cm03">MANDOS 03</a></li>
			
			
			</ul>
		<?php } ?>
		
		
		<?php if(CHtml::encode($this->pageTitle) == "Actualizar" ||CHtml::encode($this->pageTitle) == "Actualizarportada"||CHtml::encode($this->pageTitle) == "ActualizarTablaPostgres" ||CHtml::encode($this->pageTitle) == "ActualizarSIG" ||CHtml::encode($this->pageTitle) == "ActualizarPRE"||CHtml::encode($this->pageTitle) == "ActualizarPRESIG" ){ ?>
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			<div class="row">
											
				
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9" >
					<h2 style="color: FireBrick "} > Actualizar
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img align="right" src="images/ganaderia.png" width='60%'></img></a></div>-->
				</div>
			</div>
			
			
								</div>
				
			</div><!-- header -->

			<ul class="nav nav-tabs" role="tablist">

				<li role="presentation"><a href="index.php?r=site/actualizartodo">Actualizar desde EXCEL</a></li>
				<li role="presentation"><a href="index.php?r=site/actualizartablas">Actualizar desde ACCESS</a></li>
				<li role="presentation"><a href="index.php?r=site/actualizarsig">Actualizar desde GPX</a></li>
				<li role="presentation"><a href="index.php?r=site/actualizarpredios">Añadir plantaciones SIG
				<li role="presentation"><a href="index.php?r=site/actualizarprediossig">Añadir a la base de datos predios
				</a></li>
			</ul>
		<?php } ?>
		
			
		<?php if(CHtml::encode($this->pageTitle) == "Seguimiento" ||CHtml::encode($this->pageTitle) == "Facturacion" ||CHtml::encode($this->pageTitle) == "Seguimiento reforestacion" ||CHtml::encode($this->pageTitle) == "Seguimiento cafe" ||CHtml::encode($this->pageTitle) == "Seguimiento Sistemas Familiares" ||CHtml::encode($this->pageTitle) == "Seguimiento Macadamia"  ||CHtml::encode($this->pageTitle) == "Seguimiento Reforestacion con Guama" ){ ?>
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			<div class="row">
											
			
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9" >
					<h2 style="color: FireBrick "} > Seguimiento
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img align="right" src="images/ganaderia.png" width='60%'></img></a></div>-->
				</div>
			</div>
			
			
				<!--<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='10%'></img></a></div>				
				<!--<div class="derecha" style="width: 170px; height: 100px; font size:1"> 		<div  style="width: 170px;font size:1">-->
				<?php
				//echo CHtml::encode($this->pageTitle );
				?>
				</div>
				
			</div><!-- header -->

			<ul class="nav nav-tabs" role="tablist">

				<li role="presentation"><a href="index.php?r=site/seguimiento">Toda la Reforestación</a></li>
				<li role="presentation"><a href="index.php?r=site/sereforestacion">Reforestación</a></li>
				<li role="presentation"><a href="index.php?r=site/secafe">Café</a></li>
				<li role="presentation"><a href="index.php?r=site/sesistemasfamiliares">Sistemas Familiares</a></li>
				<li role="presentation"><a href="index.php?r=site/semacadamia">Macadamia</a></li>
				<li role="presentation"><a href="index.php?r=site/sereforestacionguama">Ref. con Guama</a></li>
				<li role="presentation"><a href="index.php?r=site/facturacion">Facturacion reforestacion</a></li>
				
			</ul>
		<?php } ?>
		




<?php if(CHtml::encode($this->pageTitle) == "Visor" ||CHtml::encode($this->pageTitle) == "Visor" ||CHtml::encode($this->pageTitle) == "Visor2"){ ?>
			<div id="header">
			<!--
			//***********************************************************************************************************************************
			//***********************************************************************************************************************************
			//
			// LOGO DEL PLN SIERRA
			-->
			<div class="row">
											
			
				
				<div class="col-md-2" >
											
			
					<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='100%'></img></a></div>
				</div>
				
				<div class="col-md-9" >
				
			
					
					<a  href="index.php?r=site/cafegeneral"><img class="img-square" width="40px" src="images/visor.png" ></a>
					<h3 style="color: FireBrick">Visor >  <?php echo CHtml::encode($this->pageTitle); ?></h3>
				
	
				
				
				
				
					
				
				</div>
				<div class="col-md-1" >
											
			
					<!--<div id="logo"><a href="index.php"><img align="right" src="images/ganaderia.png" width='60%'></img></a></div>-->
				</div>
			</div>
			
			
			
				<!--<div id="logo"><a href="index.php"><img src="images/cliente_logo.png" width='10%'></img></a></div>				
				<!--<div class="derecha" style="width: 170px; height: 100px; font size:1"> 		<div  style="width: 170px;font size:1">-->
				<?php
				//echo CHtml::encode($this->pageTitle );
				?>
				</div>
				
			</div><!-- header -->

			<ul class="nav nav-tabs" role="tablist">

				<!--<li role="presentation"><a href="index.php?r=site/visor">Todo Plan Sierra</a></li>-->
				<li role="presentation"><a href="index.php?r=site/visor2">Visor forestal</a></li>				
			</ul>
		<?php } ?>		
		
		
		
	</head>
	<body>
		<div id="container">
			<?php
				echo $content;
			?>
		</div><!-- page -->
	</body>
</html>
