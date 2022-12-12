 <head>
    <title>Measure</title>
    <link rel="stylesheet" href="https://openlayers.org/en/v5.3.0/css/ol.css" type="text/css">
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
	<!--<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>-->
	
<link rel="stylesheet"  href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
   <link rel="stylesheet" href="path/to/file/picker.min.css">
<script type="text/javascript" src="path/to/file/picker.min.js"></script>


<!-- estaos tres enlaces los introduje para que SELECTPICKER tuviera tosas sus funciones 2919-09-15-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>



  <html>
  <div class="pane ui-layout-north">
	<div class="row">	
											
		<div class="col-md-10">	
			 <h4 id="Titulo_1_1" width="100%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
		</div>	
		<div class="col-md-1">
			 <a id="generarexcel" type="button" class="btn btn-primay" title="Hojaexcel" href="index.php?r=site/hojaexcel&criterio=">Excel 
							<img width=22 src="images/concentricos.png" alt="Excel"> </a>
			
		</div>		
		<div class="col-md-1">
			 <table id="Control_1_1" class="table-striped bg-danger text-white" width="100%"></table>
		</div>
	</div>
	
	 <br/>
  <br/>
	<div class="row">  
		<div class="col-md-12">	
		   <div class="card bg_light mb-3">
				<div class="card-body">
					<table id="Grafico_1_1" class="table table-bordered" width="100%">
						<thead>
							<tr>
								<th>ord</th>
								<th>Sig</th>
								<th>Plan.</th>
								<th>Cont.</th>
								<th>Clie.</th>
								<th>Apellido</th>
								<th>Nombre</th>
								<th>Cedula</th>
								<th>Subcuenca</th>
								<th>Microcuenca</th>
								<th>Destino</th>
								<th>Fecha</th>
								<th>Plantas</th>
								
									
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>	
	</div>

</div>


  
<div class="pane ui-layout-center">
	<div id="loading">
	  <img id="loading-image" width=75 src="images/logo3_75_75.gif" alt="Loading..." />
	</div>

	<div id="map" style="height:100%; margin-right=0px">
		<div id="navTool" class="div-navTool">
			<div id='butInfo' title="Información del País"><img height=48 src="images/informacionpais.png"/></div>	
			<div id='butInfoWMS' title="Información ganadera"><img height=48 src="images/ganaderia.png"/></div>
	
			<div id='butUnselect' title="Informacion de reforestación"><img height=48 src="images/reforestacion.png"/></div>
			<div id='butBusqueda' title="Busqueda"><img height=48 src="images/charts.png"/></div>
			<div id='butMedirDistancia' title="Medir distancia"><img height=48 src="images/medirdistancia.png"/></div>
			<div id='butMedirArea' title="Medir area"><img height=48 src="images/medirarea.png"/></div>
			
		</div>
		 <div id="popupMapa" class="ol-popup">
			<a href="#" id="popup-closer" class="ol-popup-closer"></a>
			<div id="popup-content"></div>
		</div>
		
		
		<!-- Aqui se ponen las corrdenadas que aparecen en la esquina inferior izquierda-->
		<div style="width:200px; height: 100px"  id="coord" class="div-coordenadas"></div>
		
		<div id="dialog-form"></div>
		
		</div>
		 
			
			
			
			
</div>
<!--div class="pane ui-layout-north">North</div-->

<div class="pane ui-layout-west">
	<div>
	
	<label>VISOR GENERAL
	
		<br/>
		<div id="layertree"  class="tree"></div>
		<br/>
		<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #666;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border:1px solid #666;
  outline:10px ;
  cursor: pointer;
  padding: 1px 10px;
  transition: 0.3s;
  font-size: 12px;
}
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #666;
  background-color: #f1f1f1;
}

/* Change background color of buttons on hover */
.tab button:hover {
	font-color: #fff;
  background-color: #ccc;
}

/* Create an active/current tablink class */
.tab button.active {
	font-color: #fff;
  background-color: #fff;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border:1px solid #ccc;
  border-top: none;
}

  .ol-popup {
	display: none;
	position: absolute;
	background-color: white;
	-moz-box-shadow: 0 1px 4px rgba(0,0,0,0.2);
	-webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
	filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
	padding: 15px;
	border-radius: 10px;
	border: 1px solid #cccccc;
	bottom: 12px;
	left: -50px;
  }
  .ol-popup:after, .ol-popup:before {
	top: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
  }
  .ol-popup:after {
	border-top-color: white;
	border-width: 10px;
	left: 48px;
	margin-left: -10px;
  }
  .ol-popup:before {
	border-top-color: #cccccc;
	border-width: 11px;
	left: 48px;
	margin-left: -11px;
  }
  .ol-popup-closer {
	text-decoration: none;
	position: absolute;
	top: 2px;
	right: 8px;
  }
  .ol-popup-closer:after {
	content: "✖";
  }
   
</style>
</head>

	
		
		
		
	</div>
</div>


<div class="pane ui-layout-east">




  
  
  <a href="javascript:document.location.reload();">       Actualizar todo</a>
  <br/>
  <br/>
		<div class="row">
			<button type="button" class="btn btn-primay" title="Calcular" onclick="hacerBusqueda()">Buscar 
							<img width=22 src="images/concentricos.png" alt="Cacular"/>
			</button>
		</div>
		<br/>
		<div class="row">
			<div class="row" >
				<input type="checkbox" id ="checksubcuenca"  name="checksubcuenca" value= "1"><label>  Subcuenca</label>
			</div>
			<div class="row" >	
				<select id="subcuenca" name="subcuenca" ></select>
			</div>
			
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox"  id="checkmicrocuenca"  name="checkmicrocuenca" value= "1"><label>__Microcuenca</label>
			</div>
			<div class="row" >
				
				<select id="microcuenca" name="microcuenca"></select>
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkcedula"  name="checkcedula" value= 1><label>  Cédula cliente</label>
			</div>
			<div class="row" >
				
				<select class="selectpicker" id="cedula" data-live-search="true" name="cedula" contenteditable="false" autocomplete="on"   ></select>
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkplantacion" name="checkplantacion" value= 1><label>  Plantacion</label>
			</div>
			<div class="row" >
				
				<select class="selectpicker" id="plantacion" name="plantacion"   data-live-search="true" contenteditable="true"></select>
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkpredio" name="checkpredio" value= 1><label>  Predio</label>
			</div>
			<div class="row" >
				
				<select id="predio" name="predio"></select>
			</div>
			<br/>
		</div>	
		 <div class="row">
			<div class="row" >
				<input type="checkbox" id="checkproyecto" name="checkproyecto" value= 1><label>  Proyecto</label>
			</div>
			<div class="row" >
				
				<select id="proyecto" name="proyecto"></select>
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkdestino" name="checkdestino" value= 1><label>  Destino</label>
			</div>
			<div class="row" >
				
				<select id="destino" name="destino"></select>
			</div>
			<br/>
		</div>	
		
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkactividad" name="checkactividad" value= 1><label>  Tipo Actividad</label>
			</div>
			<div class="row" >
				
				<select id="actividad" name="actividad"></select>
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checktplantacion" name="checktplantacion" value= 1><label>  Tipo Plantación</label>
			</div>
			<div class="row" >
				
				<select id="tplantacion" name="tplantacion"></select>
			</div>
			<br/>
		</div>	
		
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkfecha" name="checkfecha" value= 0><label>  Fecha</label>
			</div>
			<div class="row" >
				<label>Seleccione Fecha Inicial</label>
				<input  type="date" id="fechaini" name="fechaini" value="2019-01-01"  >
				<br/>
				<label>Seleccione Fecha Final</label>
				<input type="date" id="fechafin" name="fechafin" value="<?php echo date("Y-m-d");?>" >
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id ="checkfactura" name="checkfactura" value= 1><label>  Factura</label>
			</div>
			<div class="row" >
				
				<select id="ifactura" name="ifactura"></select>
				<select id="ffactura" name="ffactura"></select>
			</div>
			<br/>
		</div>	
		
 

</div>


<div class="pane ui-layout-south">
	<div>

		<div id="popup" >
			<!--a href="#" id="popup-closer" class="ol-popup-closer"></a-->
			<div id="popup-content">
				<div id="tabs">
				  <ul>
					<li><a href="#tabs-1" style="color: FireBrick">Plantación</a></li>
					<li><a href="#tabs-2" style="color: FireBrick">Generales</a></li>
					<li><a href="#tabs-4" style="color: FireBrick" >Técnicos</a></li>
					<li><a href="#tabs-3" style="color: FireBrick">Especies</a></li>
					<li><a href="#tabs-6" style="color: FireBrick" >Esp. detalladas</a></li>	
					<li><a href="#tabs-7" style="color: FireBrick" >Labores</a></li>
					<li><a href="#tabs-5" style="color: FireBrick" >Predio</a></li>
					<li><a href="#tabs-8" style="color: FireBrick">Cliente</a></li>
					<li><a href="#tabs-A" style="color: FireBrick" >Informe</a></li>
					<li><a href="#tabs-0" style="color: FireBrick">Facturas</a></li><br><br>
					
					<li><a href="#tabs-10">Ganaderos</a></li>
					<li><a href="#tabs-30">Atuaciones</a></li>
					<li><a href="#tabs-60">Lagunas</a></li>	
					<li><a href="#tabs-70">Reservorio</a></li>
					<li><a href="#tabs-50">Sistema Riego</a></li><br><br>
					
				
					
					
					<li><a href="#tabs-9" style="color: Blue">Geografia</a></li>
					
					
					
				  </ul>
				  <!--div id="tabs-1">
					<div id="infoEdad"></div>
					<div id="infoExtr"></div>
				  </div-->
				  <div id="tabs-1">
					<table id="infoCompeEns1" class="infoTabla"></table><br><br>
					<table id="infoCompeSup1" class="infoTabla"></table>
				  </div>
				  <div id="tabs-2">
					<div style="font-size:12px;font-style: italic;color: grey;" id="totalPob"></div>
					<table id="infoCV" class="infoTabla"></table>
					<table id="infoPobM" class="infoTabla"></table><br><br>
					<table id="infoPobD" class="infoTabla"></table><br><br>
					<table id="infoPobS" class="infoTabla"></table><br><br>
				  </div>
				  <div id="tabs-3">
					<table id="infoCompeEns3" class="infoTabla"></table><br><br>
					<table id="infoCompeSup3" class="infoTabla"></table>
				  </div>
				   <div id="tabs-4">
					<table id="infoCompeEns4" class="infoTabla"></table><br><br>
					<table id="infoCompeSup4" class="infoTabla"></table>
				  </div>
				   <div id="tabs-5">
				   
				   
					<table id="infoCompeEns5" class="infoTabla"></table><br><br>
					<table id="infoCompeSup5" class="infoTabla"></table>
				  </div> 
				  <div id="tabs-7">
					<table id="infoCompeEns17" class="infoTabla"></table><br><br>
					<table id="infoCompeSup17" class="infoTabla"></table>
				  </div> 
				  <div id="tabs-8">
					<table id="infoCompeEns8" class="infoTabla"></table><br><br>
					<table id="infoCompeSup8" class="infoTabla"></table>
				  </div> 
				   <div id="tabs-6">
				   	<table id="infoPlantacion" class="infoTabla"></table><br><br>
					<table id="infoReplantacion" class="infoTabla"></table><br><br>
					<table id="infoMantenimiento" class="infoTabla"></table>
				 </div>
				  <div id="tabs-9">
					<table id="infoCompeEns9" class="infoTabla"></table><br><br>
					<table id="infoCompeEns9B" class="infoTabla"></table><br><br>
					<table id="infoCompeEns10" class="infoTabla"></table>
				  </div>
				  <div id="tabs-A" style="font-size:16px;"width="100%"  >
					<div class="row" >
						<div class="col-md-2">
							<a id="informeparcelapdf" type="button" class="btn btn-primay" title="informe" target="_blank"  href="index.php?r=site/informeparcelapdf&parcela=">Informe pdf
							<img width=22 src="images/concentricos.png" alt="PDF"> </a>
						</div>	
					</div>
				</div>
				  
				 <div id="tabs-0">
					<table id="infoPlantas" class="infoTabla"></table><br><br>
					<table id="infoLabores" class="infoTabla"></table>
				  </div>
				  <div id="tabs-30">
					<table id="infoCompeEns3" class="infoTabla"></table><br><br>
					<table id="infoCompeSup3" class="infoTabla"></table>
				  </div>
				  
				  <div id="tabs-10">
					<table id="infoCompeEns100" class="infoTabla"></table><br><br>
					<table id="infoCompeSup100" class="infoTabla"></table>
				</div>	
				  
				   <div id="tabs-50">
				   
				   
					<table id="infoCompeEns50" class="infoTabla"></table><br><br>
					<table id="infoCompeSup50" class="infoTabla"></table>
				  </div> 
				  <div id="tabs-70">
					<table id="infoCompeEns170" class="infoTabla"></table><br><br>
					<table id="infoCompeSup170" class="infoTabla"></table>
				  </div> 
				  
				   <div id="tabs-60">
				   	<table id="infoPlantacion0" class="infoTabla"></table><br><br>
					<table id="infoReplantacion0" class="infoTabla"></table><br><br>
					<table id="infoMantenimiento0" class="infoTabla"></table>
				 </div>
				  
				  
				  
				  
				  
				  
				</div>
			</div>
			
			
			
		</div>
		
		
		
		
			
	</div>
</div>
	

</div>
</div>

<div id="popupInfo" class="ol-popup" style="width:400px">
	<a href="#" id="popup-closer-medida" class="ol-popup-closer"></a>
	<div id="popup-content-info">
		<ul></ul>
	</div>
	
</div>
<!--inserta la libreria de cambio de coordenadas
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>

<script type="text/javascript">

//defino la proyeccoin 32619 que es WGS 84 UTM 19N
//
proj4.defs("EPSG:32619","+proj=utm +zone=19 +ellps=WGS84 +datum=WGS84 +units=m +no_defs");


//******************************************
// DEFINICION DE VARIABLES Y EVENTOS
//****************************************++
var groupCapas, groupSociodemo;
var tools = {socio:false};
var cpSelected = [], nacionalidad = ["RESTO", "EUROPA", "ASIA", "AMERICA", "AFRICA"], edades = [{capa:"POB_6599", titulo:"Población > 65"}, {capa:"POB_2965", titulo:"Población 29-65"}, {capa:"POB_2029", titulo:"Población 20-29"}, {capa:"POB_1519", titulo:"Población 15-19"}, {capa:"POB_0514", titulo:"Población 5-14"},{capa:"POB_0005", titulo:"Población 0-5"}];
var iso1, iso2, iso3, iso4, iso5, microcuencas_selected, municipio_selected, plantaciones_cuencas_selected, parcelas, arg_cuencas, ensenas, loc = null, idAlcampo, idEncuesta, cuencas, microcuenca, productores_ganaderos,centro_de_acopio,productor_ganadero_seleccionado;
var sel, selLayer, osm, google, google_carto,parcelassel,sal,salid,codigobuscado,solo_plantaciones,dataano,dataespecie,xmed,ymed,xmin,xmax,ymin,ymax,distrito;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
var myLayout;
var infoCV;
var tabla;
cuencas =99;
idAlcampo=99;



//**********************************
// EVENTOS
//**********************************


$(document).ready(function () {
	myLayout = $('#content').layout({
		west__size:	'20%',
		east__size:	'25%',
		south__size:'50%',
		north__size:'50%',
		east__initClosed: false, 
		north__initClosed: true,
		south__initClosed: true,
		onresize: function () {
			map.updateSize();//alert('whenever anything on layout is redrawn.') 
		}	
	});
	
	$( "#butInfoWMS" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'url(http://sit.plansierra.org/PlanSierra/images/cganaderia.png), help'});
			//$("#map").css({'cursor': 'url(https://cdn3.iconfinder.com/data/icons/bluecoral/Cursor.png), default'});
			tools.socio = false;
			tools.capa = true;
			tools.refo =false;
			tools.busq =false;
			tools.dist = false;
			tools.area = false;
			sourcevect.clear();
			 map.removeInteraction(draw);
			  //interaction.setActive(false);
			//alert ( 'estoy aqui en butInfoWMS');
	});
	
	
	$( "#butInfo" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'url(http://sit.plansierra.org/PlanSierra/images/cpais.png), help'});
			//$("#map").css({'cursor': 'pointer'});
			tools.socio = true;
			tools.capa = false;
			tools.refo =false;
			tools.busq =false;
			tools.dist = false;
			tools.area = false;
			sourcevect.clear();
			 map.removeInteraction(draw);
			//alert ( 'estoy aqui en butInfo');
	});
		
		$( "#butUnselect" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'crosshair'});
			$("#map").css({'cursor': 'url(http://sit.plansierra.org/PlanSierra/images/cforestal.png), help'});
			tools.socio = false;
			tools.capa = false;
			tools.refo =true;
			tools.busq =false;
			tools.dist = false;
			tools.area = false;
			sourcevect.clear();
			map.removeInteraction(draw);
			 
			
		});
			
		
	$( "#tabs" ).tabs();
	
	
	
	
	$( "#butBusqueda" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'pointer'});
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'url(http://sit.plansierra.org/PlanSierra/images/cacueducto.png), help'});
			tools.socio = false;
			tools.capa = false;
			tools.refo =false;
			tools.busq =true;
			tools.dist = false;
			tools.area = false;
			sourcevect.clear();
			 map.removeInteraction(draw);
			//alert ( 'estoy aqui en butInfoWMS');
	});
	
	
	
	
	
	//CARGA DE MENUS INICIALES
	
	<?php
$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

$rs3 = array();
//foreach($mbd->query('SELECT gid, objectid, id, nom_cuenca, sub_cuenca, shape_leng, shape_area, geom FROM geo_subcuencas order by gid asc;') as $fila3) {
$query = 'SELECT codigo_cuenca, descripcion FROM ss_cuenca order by codigo_cuenca asc;';



//***********************************************************************************************
//***********************************************************************************************
//***********************************************************************************************
//                                                                                            ***
//ESTO ES UN EJEMPLO DE  COMO USAR EL CONTROL DE USUARIOS PARA PERMITIR UNOS ACCESO U OTROS.  ***
//                                                                                            ***
//***********************************************************************************************
//***********************************************************************************************
//***********************************************************************************************


$grupo = Yii::app()->user->getState('grupo');
$username = Yii::app()->user->getState('username');


if (strpos($grupo, 'cuenca') !== false) {
	$cuenca = explode("_" , $grupo);
	$cuenca = $cuenca[1];
	$query = 'SELECT codigo_cuenca, descripcion FROM ss_cuenca WHERE codigo_cuenca = \''.$cuenca.'\' order by codigo_cuenca asc;';
	
}

//finaliza el control de accesos.


		

foreach($mbd->query($query) as $fila3) {
	$c = null;								
	$c['id'] =$fila3['codigo_cuenca'];
	$c['nombre'] =$fila3['descripcion'];

	array_push($rs3, $c);

}


?>
		 
//alert ($username);


$("#subcuenca").empty();
	data = <?php echo json_encode($rs3);?>;
	var a = "<option value=999></option>";
	$("#subcuenca").append(a);
	for(var i = 0; i < data.length; i++){
		$('#subcuenca').append($('<option>', {
				value: data[i].id,
				text: data[i].id+ '- '+ data[i].nombre
			}));
		
	}
	
	<?php

//AQUI RELLENO EL DESPLEGABLE DE MICROCUENCA para todas las cuencas; 
			
		     $mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

            $rs4 = array();
//ss_micro_cuencas tiene todas las microcuencas consideradas en SPSO y cada microcuenca tiene un ID diferente

             foreach($mbd->query('SELECT codigo_micro_cuenca, descripcion, codigo_cuenca FROM ss_micro_cuenca  order by codigo_micro_cuenca::int asc;') as $fila4) {
				 
				 
                   $c = null;								
                   $c['id'] =(int)$fila4['codigo_micro_cuenca'];
                   $c['nombre'] =$fila4['descripcion'];
				   $c['cuenca']= (int)$fila4['codigo_cuenca'];
                   array_push($rs4, $c);

              }


?>	

		$("#microcuenca").empty();
	     data = <?php echo json_encode($rs4);?>;
	     var a = "<option value=999>Todas</option>";
		 $("#microcuenca").append(a);
	     for(var i = 0; i < data.length; i++){
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			
		      $('#microcuenca').append($('<option>', {
				   value: data[i].id,
				   text: data[i].id+ '- '+ data[i].nombre + '  (' +data[i].cuenca+' )'
		     	}));
			
	    }
	
			
			
	//Cedula del cliente
	
<?php

//AQUI RELLENO EL DESPLEGABLE DE CELULAS
			
		     $mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

            $rs4 = array();
//ss_micro_cuencas tiene todas las microcuencas consideradas en SPSO y cada microcuenca tiene un ID diferente

             foreach($mbd->query('SELECT 
  pv_cliente.codigo_cliente::int,
  pv_cliente.cedula, 
  pv_cliente.apellido, 
  pv_cliente.nombre 

FROM 
  public.pv_cliente

  ORDER BY  pv_cliente.cedula, pv_cliente.apellido;') as $fila4) {
				 
				 
                   $c = null;								
                   $c['id'] =(int)$fila4['codigo_cliente'];
				   $c['cedula'] =$fila4['cedula'];
                   $c['apellido'] =$fila4['apellido'];
				   $c['nombre']= $fila4['nombre'];
                   array_push($rs4, $c);

              }


?>		

	
			
//AQUI RELLENO EL DESPLEGABLE DE LA PLANTACION
$('#Control_1_1').empty();
$("#Control_1_1").html('<img id="loading-image" width=100 src="images/logo3_75_75.gif" alt="Loading..." />');

$.get('index.php?r=puntos/getPlantacionComboSinGeo', function(data){
	$("#plantacion").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#plantacion').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})






//AQUI RELLENO EL DESPLEGABLE DEL PREDIO		

$.get('index.php?r=puntos/getPredioCombo', function(data){
	$("#predio").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#predio').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})




//AQUI RELLENO EL DESPLEGABLE DE PROYECTO
$.get('index.php?r=puntos/getProyectoCombo', function(data){
	$("#proyecto").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#proyecto').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})


//AQUI RELLENO EL DESPLEGABLE DE Destino
$.get('index.php?r=puntos/getDestinoCombo', function(data){
	$("#destino").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#destino').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})



//AQUI RELLENO EL DESPLEGABLE DE tipo de actividad
$.get('index.php?r=puntos/getActividadCombo', function(data){
	$("#actividad").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#actividad').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})



//AQUI RELLENO EL DESPLEGABLE DE tipo de plantacion
$.get('index.php?r=puntos/getTPlantacionCombo', function(data){
	$("#tplantacion").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#tplantacion').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})
$('#Control_1_1').empty();	



// TERMINADO EL RELLENO DE cedula
	
$('#cedula').empty();
	     data = <?php echo json_encode($rs4);?>;
	     var a = "<option value=999></option>";
		 $('#cedula').append(a);
	     for(var i = 0; i < data.length; i++){
			 
		      $('#cedula').append($('<option>', {
				   value: data[i].id,
				   text: data[i].cedula+'      '+data[i].apellido+', '+data[i].nombre
		     	}));
			
	    }
	
	
	
	//EVENTO DISPARADO POR EL RELLENO DE LA Subcuenca
	
	$("#subcuenca").selectmenu({
		change: function( event, data ) {
			
			subcuenca = data.item.value;
			$("#microcuenca").empty();			
			//alert ('lkjlkjlkjlkjlk   '+ subcuenca );
		


	
<?php

//AQUI RELLENO EL DESPLEGABLE DE MICROCUENCA; ESTE EVENTO SE DISPARA CUANDO YA HE SELECCIONADO UNA CUENA ?
			
		     $mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

            $rs4 = array();
//ss_micro_cuencas tiene todas las microcuencas consideradas en SPSO y cada microcuenca tiene un ID diferente

             foreach($mbd->query('SELECT codigo_micro_cuenca, descripcion, codigo_cuenca FROM ss_micro_cuenca  order by codigo_micro_cuenca::int asc;') as $fila4) {
				 
				 
                   $c = null;								
                   $c['id'] =(int)$fila4['codigo_micro_cuenca'];
                   $c['nombre'] =$fila4['descripcion'];
				   $c['cuenca']= (int)$fila4['codigo_cuenca'];
                   array_push($rs4, $c);

              }


?>	
	     	//alert ('lkjlkjlkjlkjlk  2  '+ subcuenca );
			 $("#microcuenca").empty();
			//alert ('lkjlkjlkjlkjlk  3  '+ subcuenca ); 
		 data = <?php echo json_encode($rs4);?>;
	     var a = "<option value=999>Solo la subcuenca seleccionada</option>";
		  $('#microcuenca').append(a);
	     for(var i = 0; i < data.length; i++){
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			if (data[i].cuenca == subcuenca) {
		      $('#microcuenca').append($('<option>', {
				   value: data[i].id,
				   text: data[i].id+ '- '+ data[i].nombre + '  (' +data[i].cuenca+' )'+ subcuenca
		     	}));
			}
	    }
	
			
			
	//fecha de la encuesta o año
	
			
			
			
      }
	});
	
	
	
	
	
	$('#distrito').selectmenu({
		change: function( event, data ) {
					$( "#butUnselect" ).trigger('click');
			distrito = data.item.value;
			$('#grafico1').empty();
			$('#grafico2').empty();
			$('#seleccion').empty();
			//alert (microcuenca+'municipio'+idAlcampo+'provincia'+distrito +'distrito');
	
	//se DEBE PINTRR EL TERMINO MUNICIPAL pinta la microcuenca seleccionada
	       municipio_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/unidad_administrativa.map&municipio="+microcuenca+"&provincia="+idAlcampo+"&distrito="+distrito);
	
$.get('index.php?r=Areas/getBoxDistrito&x='+microcuenca+'&y='+idAlcampo+'&z='+distrito , function( data10 ) {

	  	 data10=JSON.parse(data10);


	
	var xmin= parseFloat (9999999999.0);
	var xmax=parseFloat(-9999999999.0);
	var ymin=parseFloat(9999999999.0);
	var ymax=parseFloat(-9999999999.0);
	 
	//alert (xmax+'  xmax  '+ xmin);
	 
	// alert ('ahora el doble '+data10.length*19);
	 
	    for (i=0;i<data10.length;i++) {
			
			if (xmin>data10[i].xmin) {xmin=parseFloat(data10[i].xmin)};
			if (xmax<data10[i].xmax) {xmax=parseFloat(data10[i].xmax)};
			if (ymin>data10[i].ymin) {ymin=parseFloat(data10[i].ymin)};
			if (ymax<data10[i].ymax) {ymax=parseFloat(data10[i].ymax)};
	
		} 
			
		 var xmed=(parseFloat(xmin)+parseFloat(xmax))/2;
		 var ymed=(parseFloat(ymax)+parseFloat(ymin))/2;
	
		
		
		
   
		 var cormin=ol.proj.transform([parseFloat(xmin),parseFloat(ymin)], 'EPSG:4326', 'EPSG:3857');
         var sal=ol.proj.transform([xmed,ymed], 'EPSG:4326', 'EPSG:3857');
	     var cormax=ol.proj.transform([parseFloat(xmax),parseFloat(ymax)], 'EPSG:4326', 'EPSG:3857');
		 
	 
		
		
		
var myExtent = [xmin,ymin,xmax,ymax];
	map.getView().fitExtent(myExtent , map.getSize());
	
				//alert ((ymin+ymax)/2);
	/*map.setView(new ol.View({
            center:[xmed,ymed],
            zoom: 11
     }));*/

	})
 



	


		
	
	


//esto es para encender y apagar capas



	
			
	//se pinta las parcelas	de la microcuenca seleccionada	
			//plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel="+microcuenca);
			//parcelas.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map");
			
			//map.getLayersByName('Rios')[0].setVisibility(true);	
			
			var length=0;
			
			//var group= map.getLayerGroup();
			

			var layers = map.getLayerGroup();
			 //alert (layers.getLength());
			 
			var root= layers.getLayers();
			 var length = root.getLength();
			 
			  //alert (length);
			  var element = root.item(3);
			 // alert (element.Length);
			  var name=element.get('name');
			  //alert (name);
			  var layerssub=element.getLayers();
			   var length = layerssub.getLength();
			   //alert ('layersub  '+length);
			   //hacen no visibles las parcelas no seleccionadas
			   var element = layerssub.item(2);
			  //alert ('layersub2  '+element.Length);
			  var name=element.get('name');
			  //alert ('name  '+name);
			 element.setVisible(false);
			 //hacen no visibles la informacionpuntual.
			 var element = layerssub.item(4);
			  //alert ('layersub2  '+element.Length);
			  var name=element.get('name');
			  //alert ('name  '+name);
			 element.setVisible(false);
		
	      }
	});
	
	
//***********************************************	
//RELLENAR COMBO DE PROVINIAS
//**********************************************


	
	
	
		
	
		



		
		
	
	
	

	




	
	
	
	//**********************************************
	//CARGAR MAPA epsg:25830
	//AQUI SE DEFINEN DIVERSAS CAPAS
	//
	//*************************************************
	
	
	
	//DEFINICION DEL SISTEMA DE PROYECCION UTILIZADO EN LA REPRESENTACION 
	//EPSG:3857 erts89 HUSO 30
	//OTROS POSIBLES
	//EPSG:4326 WGS84 GEOGRAFICA
	//EPSG:32619 WGS84 UTM ZONE 19N
	//EPSG:3857 WGS84 PSEUDO MERCATOR
	//OJO creo que no estan definidos en OpenLayers algunas proyecciones
	
	//*******************
	
	
	
	var projection = new ol.proj.Projection({
	  //ojo esto es muy importante aantes estaba en 3857 y daba problemas
	  code: 'EPSG:32619',
	  //code: 'EPSG:3857',
	  //NO SE SI A ESTO SE LE HACE CASO
	  // The extent is used to determine zoom level 0. Recommended values for a
	  // projection's validity extent can be found at http://epsg.io/.
	  //extent: [485869.5728, 76443.1884, 837076.5648, 299941.7864],
	  units: 'm'
	});


//DEFINICION DE CAPAS DE GOOGLE SATELITE O MAPA
//**********************************************
//me lo he llevado mas abajo para que puedan estar en el arbol


	
	//ol.proj.addProjection(projection);
	var layers = [];
	
	
//OSM

//djalsdlkas



//DEFINICION DE CAPAS DEL MAPAQ



	
	//***********************************
	//MUY IMPORTANTE COMPROBAR QUE ESTAN DEFINIDAS TODAS LAS VARIABLES Y LOS NOMBRE BIEN PUESTOS
	//
	// ESTA PARTE DEL PROGRAMA SOMBREA LA CUENCA SELECCIONADA
	//
	//*********************************
	 municipio_selected = new ol.layer.Image({
		//extent: extent,
		id: 'Unidad administrativa',
		name: "Unidad Administrativa",
			opacity :'0.4',
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/unidad_administrativa.map&municipio=0&provincia=0&distrito=0&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=MUNICIPIO_SELECTED2',
		source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/unidad_administrativa.map&municipio=0&provincia=0&distrito=0',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'MUNICIPIO_SELECTED2', 'SRS': "EPSG:3857" }
		})
	})
	
	
	microcuencas_selected = new ol.layer.Image({
		//extent: extent,
		id: 'Cuenca-seleccionada',
		name: "Cuenca seleccionada",
		visible: true,
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas=99&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=MICROCUENCAS_SELECTED2',
		source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas=99',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'MICROCUENCAS_SELECTED2', 'SRS': "EPSG:3857" }
		})
	})
	

	//prueba de cartografia de parcelas
	text3='where gid > 1';
	plantaciones_cuencas_selected = new ol.layer.Image({
		//extent: extent,
		id: 'Plantaciones seleccionadas',
		visible: true,
		name: "Plantaciones seleccionadas",
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&criterio2='+text3+'&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_MULTICRITERIO',
		
		//http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel=99&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_MULTICRITERIO',
		
		source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&criterio2='+text3,
		crossorigin: 'anonymous',
			params: {'LAYERS': 'plantaciones_multicriterio', 'SRS': "EPSG:3857" }
		})
	})
	
	
	
	
	
	
	
	
    arg_cuencas= new ol.layer.Image({
	id:'Subcuencas',
	name:'Subcuencas',
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=CUENCAS_SELECT2',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'CUENCAS_SELECT2', 'SRS': "EPSG:3857"}
		
	})
})	
	
	parcelas = new ol.layer.Image({
	id: 'parcelas',
	name:'Parcelas',
	opacity :'0.75',
	visible: false,
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=TODAS_LAS_PLANTACIONES',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'todas_las_plantaciones', 'SRS': "EPSG:3857" }
	})
})	
	tipoactividad=1;
	plantaciones_puntos = new ol.layer.Image({
	id: 'Reforestación',
	name:'Reforestación',
	opacity :'0.75',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad+'&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_PUNTOS_ACTIVIDAD',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad,
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Plantaciones_puntos_actividad', 'SRS': "EPSG:3857" }
	})
})	 
	 tipoactividad=2;
	plantaciones_puntos_2 = new ol.layer.Image({
	id: 'Café',
	name:'Café',
	opacity :'0.75',
	visible: false,
	//url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad+'&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_PUNTOS_ACTIVIDAD',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad,
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Plantaciones_puntos_actividad', 'SRS': "EPSG:3857" }
	})
})	
tipoactividad=3;
	plantaciones_puntos_3 = new ol.layer.Image({
	id: 'Ref. con Guama',
	name:'Ref. con Guama',
	opacity :'0.75',
	visible: false,
	//url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad+'&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_PUNTOS_ACTIVIDAD',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad,
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Plantaciones_puntos_actividad', 'SRS': "EPSG:3857" }
	})
})	
	tipoactividad=4;
	plantaciones_puntos_4 = new ol.layer.Image({
	id: 'S. Familiar',
	name:'S. Familiar',
	opacity :'0.75',
	visible: false,
	
	//url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad+'&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_PUNTOS_ACTIVIDAD',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad,
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Plantaciones_puntos_actividad', 'SRS': "EPSG:3857" }
	})
})	
	tipoactividad=5;
	plantaciones_puntos_5 = new ol.layer.Image({
	id: 'Macadamia',
	name:'Macadamia',
	opacity :'0.75',
	visible: false,
	//url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad+'&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_PUNTOS_ACTIVIDAD',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad,
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Plantaciones_puntos_actividad', 'SRS': "EPSG:3857" }
	})
})	 
	/*plantaciones_puntos = new ol.layer.Image({
	id: 'Puntos',
	name:'Puntos',
	opacity :'0.75',
	visible: false,
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_PUNTOS',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Plantaciones_puntos', 'SRS': "EPSG:3857" }
	})
})	*/	
	
//*************************************************
//AÑADO LA CAPA DE CUENCAS DEL PLAN SIERRA
//**************************************************	
	
	
	
	var cuencas_select = new ol.layer.Tile({
	name:'CUENCAS',
	
	visible: false,
	source: new ol.source.TileWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map',
		params: {
			'LAYERS': 'CUENCAS', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true
		},
		//tileGrid: tileGrid
	})
});



//******************************************
//
//AQUI AÑADO LAS CARTOGGRSFIAS DE BASE propia
//
//********************************************************************


// ASOCIADAS A MDT


var mdt_srtm_sombreado = new ol.layer.Image({
	id: 'mdt_srtm_sombreado',
	name:'mdt_srtm_sombreado',
	opacity :'0.5',
	
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=mdt_srtm_sombreado',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map',
		crossorigin: 'anonymous',
		params: {
			'LAYERS': 'mdt_srtm_sombreado', 
			
			//'VERSION': '1.3.0',
			//'FORMAT': 'image/png',
			//'TILED': true,
			'SRS': "EPSG:32619" 
		},
		//tileGrid: tileGrid
	})
});

var mdt_srtm = new ol.layer.Image({
	id:'mdt_srtm',
	name:'mdt_srtm',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=mdt_srtm',
	
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map',
		crossorigin: 'anonymous',
		params: {
			'LAYERS': 'mdt_srtm', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true,
			'SRS': "EPSG:32619" 
		},
		//tileGrid: tileGrid
	})
});


var mdt_pendiente = new ol.layer.Image({
	id:'mdt_pendiente',
	name:'mdt_pendiente',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=mdt_pendiente',
	
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map',
		params: {
			'LAYERS': 'mdt_pendiente', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true,
			'SRS': "EPSG:32619" 
		},
		//tileGrid: tileGrid
	})
});


//******************************************
//
//AQUI AÑADO LAS CARTOGGRSFIAS DE BASE topografica
//
//********************************************************************


plan_sierra = new ol.layer.Image({
	id: 'Plan_Sierra',
	name:'Plan_Sierra',
	opacity :'1',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Plan_Sierra',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Plan_Sierra', 'SRS': "EPSG:32619" }
	})
})		
	

	

rios_principales = new ol.layer.Image({
	id: 'Rios_principales',
	name:'Rios_principales',
	opacity :'1',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Rios_principales',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Rios_principales', 'SRS': "EPSG:32619" }
	})
})		
		
		
rios = new ol.layer.Image({
	id: 'Rios',
	name:'Rios',
	opacity :'1',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Rios',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Rios', 'SRS': "EPSG:32619" }
	})
})			
		
cuencas_plan_sierra = new ol.layer.Image({
	id: 'Cuencas',
	name:'Cuencas',
	opacity :'0.2',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Cuencas_plan_sierra',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Cuencas_plan_sierra', 'SRS': "EPSG:32619" }
	})
})			
			
		

embalses_general = new ol.layer.Image({
	id: 'Embalses',
	name:'Embalses',
	opacity :'1',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Embalses_general',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Embalses_general', 'SRS': "EPSG:32619" }
	})
})	


productor_ganadero_seleccionado = new ol.layer.Image({
	id: 'Ganaderos_sel',
	name:'Ganaderos_sel',
	opacity :'1',
	visible: false,
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map&productor=0&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Productor_ganadero_seleccionado',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map&productor=0',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Productor_ganadero_seleccionado', 'SRS': "EPSG:32619" }
	})
})	

productores_ganaderos = new ol.layer.Image({
	id: 'Ganaderos',
	name:'Ganaderos',
	opacity :'1',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Productores_ganaderos',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Productores_ganaderos', 'SRS': "EPSG:32619" }
	})
})	





centro_de_acopio = new ol.layer.Image({
	id: 'Centro de acopio',
	name:'Centro de acopio',
	opacity :'1',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Centro_de_acopio',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'centro_de_acopio', 'SRS': "EPSG:32619" }
	})
})	

	lagunas = new ol.layer.Image({
	id: 'Lagunas',
	name:'Lagunas',
	opacity :'1',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Lagunas',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Lagunas', 'SRS': "EPSG:32619" }
	})
})

osm_viario = new ol.layer.Image({
	id: 'OSM_viario',
	name:'OSM_viario',
	opacity :'0.75',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/OSMBasetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=osm_viario',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/OSMBasetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'osm_viario', 'SRS': "EPSG:32619" }
	})
})		

	reservorio = new ol.layer.Image({
	id: 'Reservorio',
	name:'Reservorio',
	opacity :'1',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Reservorio',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Reservorio', 'SRS': "EPSG:32619" }
	})
})

	sistema_de_riego = new ol.layer.Image({
	id: 'Sistema de riego',
	name:'Sistema de riego',
	opacity :'1',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Sistema de riego',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'sistema de riego', 'SRS': "EPSG:32619" }
	})
})

osm_viario = new ol.layer.Image({
	id: 'OSM_viario',
	name:'OSM_viario',
	opacity :'0.75',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/OSMBasetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=osm_viario',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/OSMBasetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'osm_viario', 'SRS': "EPSG:32619" }
	})
})		


osm_viario = new ol.layer.Image({
	id: 'OSM_viario',
	name:'OSM_viario',
	opacity :'0.75',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/OSMBasetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=osm_viario',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/OSMBasetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'osm_viario', 'SRS': "EPSG:32619" }
	})
})		





//******************************************
//
//AQUI AÑADO LAS CARTOGRAFIAS DE BASE OSM, Y GOOGLE POR EL MOMENTO
//
//********************************************************************
	 
 osm = new ol.layer.Tile({
	              name:'OSM',
				 
				  source: new ol.source.OSM({
					  params: { 'SRS': "EPSG:3857" }
					  
				  })
          });   
	 	
	 
//GOOGLE	

 google = new ol.layer.Tile({
            source: new ol.source.XYZ({
				
              //IMAGEN
			  
			  url: 'http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}'
			  
			 // mapa direccion URL y opacidad
			 //'https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}'
			 //opacity=08
            }),
			name:'Google',
			//visible :false,
			//opacity: 1
          });
	
google_carto = new ol.layer.Tile({
            source: new ol.source.XYZ({
				             			  
			  url: 'https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}'
			 
            }),
			name:'Google_carto',
			//visible :false,
			//opacity: 1
          });


//Test para probar la digitalizacion
  sourcevect = new ol.source.Vector({wrapX: false});
  var vector = new ol.layer.Vector({
        source: sourcevect,
		name:'vector'
      });
//layers.push(vector);

//********************
//
//DEFINE ARBOLES DE LA LEYENDA//
//***********************
	groupCapas21 = new ol.layer.Group({
		id: 'Plan Sierra',
		name: 'Plan Sierra',
		layers: [plan_sierra]
	});
	//layers.push(groupCapas21);
	
	
	groupCapas2 = new ol.layer.Group({
		id: 'OSM',
		name: 'OSM',
		visible: false,
		layers: [osm]
	});
	//layers.push(groupCapas2);
	
	
	
	groupCapas3 = new ol.layer.Group({
		id: 'Imagen Google',
		name: 'Imagen Google',
		visible: false,
		layers: [google]
	});
	//layers.push(groupCapas3);
	
	groupCapas4 = new ol.layer.Group({
		id: 'Cartografía Google',
		name: 'Cartografía Google',
		visible: true,
		layers: [google_carto]
	});
	//layers.push(groupCapas4);
	
	groupCapas20 = new ol.layer.Group({
		id: 'Cartografia  base externa',
		name: 'Cartografía base externa',
		layers: [groupCapas2,groupCapas3,groupCapas4]
	});
	layers.push(groupCapas20);
	
	
	groupCapas1 = new ol.layer.Group({
		id: 'MDT',
		name: 'MDT',
		layers: [mdt_pendiente, mdt_srtm,mdt_srtm_sombreado]
	});
	layers.push(groupCapas1);
	

	
	groupCapas30 = new ol.layer.Group({
		id: 'Varios',
		name: 'Varios',
		layers: [ plan_sierra, osm_viario, rios_principales, rios,  embalses_general, cuencas_plan_sierra]
	});
	
	layers.push(groupCapas30);
	
	groupCapas100 = new ol.layer.Group({
		id: 'Actividad',
		name: 'Actividad',
		layers: [plantaciones_puntos_5, plantaciones_puntos_4, plantaciones_puntos_3, plantaciones_puntos_2,plantaciones_puntos]
	});
	//layers.push(groupCapas100);	
	
	
	
	
	
	
	
	groupCapas41 = new ol.layer.Group({
		id: 'Construcciones',
		name: 'Construcciones',
		layers: [ sistema_de_riego,reservorio ,lagunas]
	});
	
	
	groupCapas40 = new ol.layer.Group({
		id: 'Ganadería',
		name: 'Ganadería',
		layers: [ groupCapas41, centro_de_acopio,productor_ganadero_seleccionado, productores_ganaderos]
	});
	
	layers.push(groupCapas40);
	groupCapas = new ol.layer.Group({
		id: 'Plantaciones',
		name: 'Plantaciones',
		layers: [municipio_selected, arg_cuencas, parcelas, plantaciones_cuencas_selected, groupCapas100]
	});
	
	layers.push(groupCapas);
	
	
	//COMPETENCIA
	var competencia=[];
	$.each(comp, function(index, element){
		layer = new ol.layer.Tile({
			//extent: extent,
			id: 'ensenas'+element[0],
			name: element[1],
			visible: false, 
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&tipo='+element[0],
				crossorigin: 'anonymous',
					params: {'LAYERS': 'COMPETENCIA_1', 'SRS': 3857 }
				})
		})
		
		competencia.push(layer);
	});
		
	tamano = new ol.layer.Group({
		id:'tamano',
		name: 'Tamaño',
		layers: competencia
	});
	
	
	//ENSEÑAS
	var ensenas=[];
	$.ajax(
	{url: 'index.php?r=tblEtiqueta/getAll', 
	async: false,
	success: function (data){
		$.each(data, function(index, element){
			var visi = false;
			if(element.id == 1)
				visi = true;
			
			layer = new ol.layer.Tile({
				//extent: extent,
				id: 'ensenas_'+element.id,
				name: element.etiqueta,
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/sigma/images/logos2/'+element.etiqueta+'.png',
				visible: visi, 
				source: new ol.source.TileWMS({
					url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&etiqueta='+element.id,
					crossorigin: 'anonymous',
						params: {'LAYERS': 'COMPETENCIA_2', 'SRS': 3857 }
					})
			})
			
			ensenas.push(layer);
		});
		
		
	}});
	
	//**********************************************
	//
	//AQUI ESTA DEFINIDO EL CENTRO Y ZOOM DEL MAPA DE PARTIDA
	//
	//***************************************************
	
	
	/**
	 * Elements that make up the popup.
	 */
	var container = document.getElementById('popupMapa');
	var content = document.getElementById('popup-content');
	var closer = document.getElementById('popup-closer');


	/**
	 * Add a click handler to hide the popup.
	 * @return {boolean} Don't follow the href.
	 */
	closer.onclick = function() {
	  container.style.display = 'none';
	  closer.blur();
	  return false;
	};


	/**
	 * Create an overlay to anchor the popup to the map.
	 */
	overlay = new ol.Overlay({
	  element: container
	});
	
	map = new ol.Map({
		target: 'map',
		layers: layers,
		overlays: [overlay],
		logo:'images/flechas.png',
		view: new ol.View({
		  //projection: projection,419322, 4941215
		  center: [-7925000, 2200000],
		  zoom: 11
		})
	});
	
	 draw = new ol.interaction.Draw({
            source: sourcevect,
            //maxPoints: 2,
			type: 'Polygon',
			//geometryFunction : geometryFunction
          });
		   //alert ('estoy en la linea 2450   3');
          map.addInteraction(draw);
	
	
	
	//NNOMBRE DE LA LEYENDA
	
	map.getLayerGroup().set('name', 'CAPAS DE INFORMACIÓN');
	
	
	
	//??????
	popupContainer = document.getElementById('popupInfo');
		var closerInfo = document.getElementById('popup-closer-medida');
		popupInfo = new ol.Overlay({
		  element: popupContainer
		});
		closerInfo.onclick = function() {
		  popupContainer.style.display = 'none';
		  //closer.blur();
		  return false;
	};
	map.addOverlay(popupInfo);
	tabs = $( "#popup-content-info" ).tabs();
	
	//*****************
	//
	//FUNCIONES QUE TIENEN QUE VER CON EL MAPA
	//
	//********************************
	
	
	//COORDENADAS QUE APARECEN EN PANTALLA CUANDO SE MUEVE EL CURSOSR
	
	
	map.on('pointermove', function(event) {
		var coord = event.coordinate;
		sal=ol.proj.transform( coord, 'EPSG:3857', 'EPSG:4326');
		//HAY UN PROBLEMA DE CONVERSIONA WGS84 UTM 19N POR ESO ESTA COMENTADA LA SIGUINETE LINEA Y NO APARECE EN PANTALLA
		salid=ol.proj.transform( sal, 'EPSG:4326', 'EPSG:32619');
		$('#coord').html(ol.coordinate.toStringXY(coord, 0) + "<br> WGS 84  PseudoMercator<br> " +ol.coordinate.toStringHDMS(sal, 2) + "<br> WGS 84  Geograficas<br>" +ol.coordinate.toStringXY(salid, 0) + "<br> WGS 84  UTM 19N<br>");	
	});
 
 
	
	//PINCHAR EN UN LA PANTALLA
	
	//pantalla de informacion administrativa y topo grafica general
	
	map.on('singleclick', function(event) {
		
		
		
		//INFORMCION DEL PAIS
		if(tools.socio){
			
			
			myLayout.close('east');
			 
			
			var x = event.coordinate[0];
			var y = event.coordinate[1];
			
			var resolution = map.getView().getResolution();
			var content = document.getElementById('popup-content');
			lastCoords = event.coordinate;
			map.getLayers().getArray()[1].getLayers().getArray()[0];
			
			
			
	         sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:32619');
			
			
			
			
			
//PRUBAS DE PREGUNTA leeo el model digital del terreno

$('#infoCompeEns10').empty();
	$.get("index.php?r=CartoBase/GetElevacion&x="+sal[0]+"&y="+sal[1], function( data10 ) {

	  	 data10=JSON.parse(data10);
		 
	    
			$.each(data10[0], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#infoCompeEns10');
					}	)		
			
               myLayout.open('south');
	})
			
			$.get("index.php?r=CartoBase/GetPendiente&x="+sal[0]+"&y="+sal[1], function( data10 ) {

	  	 data10=JSON.parse(data10);
		 
	    
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			//alert ('Altitud  '+data10[0].Altitud);
			
			 //$('#infoCompeEns10').empty();
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data10[0], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#infoCompeEns10');
					}	)		
			
               myLayout.open('#tabs-9');
	})				
			
	
//fin de pregunta a raster	


	
			sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:4326');
			//alert (sal[0]+'    '+sal[1]);
			//problemas con la proyeccion en 
			//sal[0]=280604;
			//sal[1]=2142553;
			//interrogar al modelo digital del terreno grupo 1 capa 1
			
//
// ahora busco los vectoriales


			sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:4326');
			//alert (sal[0]+'    '+sal[1]);
			
			$.get( "index.php?r=puntos/GetSelectMicrocuenca&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data10 ) {
			
				
				data10=JSON.parse(data10);
				//ert ('Cuenca = ' +data10[0].sub_cuenca+' - '+data10[0].mic_cuenca);	
				//
                $('#infoCompeEns9').empty();
				for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data10[j], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#infoCompeEns9');
			})			
		}	
               //myLayout.open('east');
				})
				
	$.get( "index.php?r=areas/GetSelectParaje&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data11 ) {
			
				
				data11=JSON.parse(data11);
				//ert ('Cuenca = ' +data10[0].sub_cuenca+' - '+data10[0].mic_cuenca);	
				//
                $('#infoCompeEns9B').empty();
				for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data11[j], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#infoCompeEns9B');
			})			
		}	
               //myLayout.open('#tabs-9');
				})		
				
				
			
		}
		
		
		
		//primer  icono del mapa
		//
		//Iinfromacion acerca del tema visualizado
		
		//______________________________________________________
		//ganaderia
		
		if(tools.capa){
			
			
			//se determina donde se ha pinchado. devuleve las coordenada en Pseudomercator y se convierten a geograficas
			var x = event.coordinate[0];
			var y = event.coordinate[1];
			var resolution = (map.getView().getResolution())/10000;
			var content = document.getElementById('popup-content');
			lastCoords = event.coordinate;
			map.getLayers().getArray()[1].getLayers().getArray()[0];
			//Alertas para vigilancia
			//alert (x +" - "+y);
			map.setView(new ol.View({
            center:[x,y],
            zoom: 14
     }));
		
			sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:4326');
			$("#tabs-30").empty();
			
			//Alerta para comprobar cambio de coprdenada a geografica
			//alert ('Lon = ' +sal[0] +"   Lat = "+sal[1]);
			
			
			//Aqui se hace la consulta a la base de datos . Se está utilizando la consulta a punto de medi-ambient
			
			
		
			//aqui preguntamos por el poligono. OJO esto tiene que devolver tan solo los numeros de plantacion. filtarados para que solo haya uno
			
			//alert (sal[0]+"    "+sal[1]+"    "+resolution);
			
			//reservorios	
						
			$.get( "index.php?r=puntosGanaderia/GetSelectReservorio&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data ) {
			
				i=0;
				//alert ('esto en reservorio');
				data=JSON.parse(data);
				
				
				  $('#infoCompeEns170').empty();
				   $('#infoCompeSup170').empty();
					var row = $("<tr />");
					
					$('#infoCompeEns170').append(row);  
				//for(var j=0; j < data.length; j++){ //_____________
					row.append($("<th Width='25 px'>Id</th>"));
					row.append($("<th Width='100 px'>Nombre</th>"));
					
					var row = $("<tr />");
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data, function(i, item) {
				var row = $("<tr />");
				$('#infoCompeEns170').append(row);
				row.append($("<td  style='text-align:left'>" + item.gid + "</td>"));
					row.append($("<th>" + item.codigo + "</td>"));
					//alert (item.codigo);
					
					
			})
			
			})			
						
						
				//LAGUNAS			
						
			$.get( "index.php?r=puntosGanaderia/GetSelectLagunas&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data2 ) {
			
				i=0;
				//alert ('lagunas');
				data2=JSON.parse(data2);
				
				
				  $('#infoPlantacion0').empty();
				  $('#infoReplantacion0').empty();
				  $('#infoMantenimiento0').empty();
				  
					var row = $("<tr />");
					$('#infoPlantacion0').append(row);  
				//for(var j=0; j < data.length; j++){ //_____________
					row.append($("<th Width='25 px'>Id</th>"));
					row.append($("<th Width='100 px'>Nombre</th>"));
					
					var row = $("<tr />");
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data2, function(i, item) {
				var row = $("<tr />");
				$('#infoPlantacion0').append(row);
				row.append($("<td  style='text-align:left'>" + item.gid + "</td>"));
					row.append($("<th>" + item.codigo + "</td>"));
					//alert (item.codigo);
					
					
			})
			
			})
			
			
			//sistema de riego
			
			$.get( "index.php?r=puntosGanaderia/GetSelectSistemaRiego&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data1 ) {
			
				i=0;
				//alert ('sistema de riego');
				data1=JSON.parse(data1);
				
				
				    $('#infoCompeEns50').empty();
					$('#infoCompeSup50').empty();
					var row = $("<tr />");
					$('#infoCompeEns50').append(row);  
				//for(var j=0; j < data.length; j++){ //_____________
					row.append($("<th Width='25 px'>Id</th>"));
					row.append($("<th Width='100 px'>Nombre</th>"));
					
					var row = $("<tr />");
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data1, function(i, item) {
				var row = $("<tr />");
				$('#infoCompeEns50').append(row);
				row.append($("<td  style='text-align:left'>" + item.gid + "</td>"));
					row.append($("<th>" + item.codigo + "</td>"));
					//alert (item.codigo);
					
					
			})
			
			})
			
			// ganadero
			
			$.get( "index.php?r=puntosGanaderia/GetSelectGanadero&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data ) {
			
				$( "#infoCompeEns100" ).empty()
				data=JSON.parse(data);
				//alert ('esto en ganadero');
				
				  //$('#infoCompeEns1').empty();
					var row = $("<tr />");
					$('#infoCompeEns100').append(row);  
				//for(var j=0; j < data.length; j++){ //_____________
					row.append($("<th Width='25 px'>Id</th>"));
					row.append($("<th Width='100 px'>Nombre</th>"));
					row.append($("<th Width='50 px'>Asociación</th>"));
					var row = $("<tr />");
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			 
			 
			$.each(data, function(i, item) {
				var row = $("<tr />");
				$('#infoCompeEns100').append(row);
				row.append($("<td  style='text-align:left'>" + item.gid + "</td>"));
					row.append($("<th>" + item.codigo + "</td>"));
					row.append($("<th>" + item.asociacion + "</td>"));
					
					
			})			
		//}	//________________
               //myLayout.open('south');	
						
	
				console.info(data);
				var datos=[];
				//alert ('Longitud = ' +data.length );
				var codigo_old=0;
				for(var i=0; i < data.length; i++){
					var dato={
						gid:data[i].gid,
						codigo:data[i].codigo,
						asociacion:data[i].asociacion
						//tipo:data[i].tipo,
						//especie:data[i].Especie	,
						//ano:data[i].Año_plantación
					}
						
					//if (codigo_old!=data[i].codigo)	{
					datos.push(dato);
					//alert (' lo meto');
					//}
					//alert (codigo_old +'   '+data[i].codigo);
					codigo_old=data[i].codigo;
				}	
				for(var i=0; i < data.length; i++){
				//alert ('Parcela = ' +datos[i].codigo);
				}
				
			
				
				//EN PRUEBAS
				
				if(data.length >1){
						$( "#dialog-form" ).empty();
						dialog = $( "#dialog-form" ).dialog({
							title: "Ganaderos en el área",
							autoOpen: false,
							height: 500,
							width: 500,
							modal: true,
							buttons: {
								"Ver información": function(){
										
									dialog.dialog( "close" );
									var coordenadas = "vacio";
									var idMuestra = "vacio";
									var idPunto = "vacio";
									verGrafico(data, event, coordenadas, idMuestra, idPunto);
								
								},
									"Cancelar": function() {
									dialog.dialog( "close" );
								}
							},
							/*close: function() {
							//form[ 0 ].reset();
							allFields.removeClass( "ui-state-error" );
							}*/
						}
						);
						
						//aqui cargo el desplegable
						var $select = $('<select id="featuresFound" style="width: 300px;"> ').appendTo("#dialog-form");
						var codigo_old=0;
						for(var j=0; j < datos.length; j++){
							//esto es para que no duplique codigos de plantacion
							//if (datos[j].codigo != codigo_old ){
							$("<option />", {value: datos[j].gid, text:( datos[j].codigo )+'    '+( datos[j].asociacion ) }).appendTo($select);
							codigo_old=datos[j].codigo ;
						//}
						}
						dialog.dialog( "open" );
				
				}else{
						var coordenadas = "vacio";
						var idMuestra = "vacio";
						var idPunto = "vacio";
						
						verGrafico(data, event, coordenadas, idMuestra, idPunto);
						
	
					}
				
			
				
				})
			
			
				
			
			
			//ESTO ES ANTIGUO
			
			//map.getView().setCenter(evt.coordinate);
		}
		
	if(tools.refo){
			
		
			//se determina donde se ha pinchado. devuleve las coordenada en Pseudomercator y se convierten a geograficas
			var x = event.coordinate[0];
			var y = event.coordinate[1];
			var resolution = map.getView().getResolution();
			var content = document.getElementById('popup-content');
			lastCoords = event.coordinate;
			map.getLayers().getArray()[1].getLayers().getArray()[0];
			//Alertas para vigilancia
			//alert (x +" - "+y);
			
			
		
			sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:4326');
			
			//Alerta para comprobar cambio de coprdenada a geografica
			//alert ('Lon = ' +sal[0] +"   Lat = "+sal[1]);
			
			
			//Aqui se hace la consulta a la base de datos . Se está utilizando la consulta a punto de medi-ambient
			
			
		
			//aqui preguntamos por el poligono. OJO esto tiene que devolver tan solo los numeros de plantacion. filtarados para que solo haya uno
			
			
			$.get( "index.php?r=puntos/GetSelectPlantacion&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data ) {
			
				
				data=JSON.parse(data);
				
			
				console.info(data);
				var datos=[];
				//alert ('Longitud = ' +data.length );
				var codigo_old=0;
				for(var i=0; i < data.length; i++){
					var dato={
						gid:data[i].gid,
						codigo:data[i].codigo,
						//tipo:data[i].tipo,
						//especie:data[i].Especie	,
						//ano:data[i].Año_plantación
					}
						
					//if (codigo_old!=data[i].codigo)	{
					datos.push(dato);
					//alert (' lo meto');
					//}
					//alert (codigo_old +'   '+data[i].codigo);
					codigo_old=data[i].codigo;
				}	
				for(var i=0; i < data.length; i++){
				//alert ('Parcela = ' +datos[i].codigo);
				}
				//EN PRUEBAS
				
				if(data.length >1){
						$( "#dialog-form" ).empty();
						dialog = $( "#dialog-form" ).dialog({
							title: "Parcelas en el area",
							autoOpen: false,
							// height: 300,
							// width: 350,
							modal: true,
							buttons: {
								"Ver información": function(){
									dialog.dialog( "close" );
									var coordenadas = "vacio";
									var idMuestra = "vacio";
									var idPunto = "vacio";
									verGraficoRefo(data, event, coordenadas, idMuestra, idPunto);
								},
									"Cancelar": function() {
									dialog.dialog( "close" );
								}
							},
							/*close: function() {
							//form[ 0 ].reset();
							allFields.removeClass( "ui-state-error" );
							}*/
						}
						);
						
						
						var $select = $('<select id="featuresFound">').appendTo("#dialog-form");
						var codigo_old=0;
						for(var j=0; j < datos.length; j++){
							//esto es para que no duplique codigos de plantacion
							//if (datos[j].codigo != codigo_old ){
							$("<option />", {value: datos[j].gid, text:( datos[j].codigo ) }).appendTo($select);
							codigo_old=datos[j].codigo ;
						//}
						}
						dialog.dialog( "open" );
				
				}else{
						var coordenadas = "vacio";
						var idMuestra = "vacio";
						var idPunto = "vacio";
						
						verGraficoRefo(data, event, coordenadas, idMuestra, idPunto);
					}
				
				//FIN DE PRUEBAS
				
	
				
					
				})
	
			
		}	
	


		if(tools.dist){
		

		}
		
		if(tools.area){
		

		}
	})
	
	
	//ARBOL DE CAPAS
	initializeTree();
	  
	$('#loading').hide();
	  
	$('input.opacity').slider().on('slide', function(ev) {
		var layername = $(this).closest('li').data('layerid');
		var layer = findBy(map.getLayerGroup(), 'name', layername);

		layer.setOpacity(ev.value);
	});
	

	// Handle visibility control
	
	
	$('i').on('click', function() {
		var layername = $(this).closest('li').data('layerid');
		var layer = findBy(map.getLayerGroup(), 'name', layername);

		layer.setVisible(!layer.getVisible());

		if (layer.getVisible()) {
			$(this).removeClass('glyphicon-unchecked').addClass('glyphicon-check');
		} else {
			$(this).removeClass('glyphicon-check').addClass('glyphicon-unchecked');
		}
	});
		
		
});




//****************************************
//
// FUNCIONES DE CARGA DE GRAFICOS.
//
//***********************************+


	
	
	


/**
 * Build a tree layer from the map layers with visible and opacity 
 * options.
 * 
 * @param {type} layer
 * @returns {String}
 */
function buildLayerTree(layer) {
	var elem;
	var name = layer.get('id') ? layer.get('name') : "Group";
	var div;
	if(layer.get('name')){
		if(layer.get('visible')){
			div = "<li data-layerid='" + name + "'>" +
				"<span><i class='glyphicon glyphicon-check'></i>" + layer.get('name') + "</span>" +
				" ";
		}else{
			div = "<li data-layerid='" + name + "'>" +
				"<span><i class='glyphicon glyphicon-unchecked'></i>" + layer.get('name') + "</span>" +
				" ";
		}
		if(!layer.getLayers){
				if(layer.get('url')){
					url = layer.get('url');
					div += "<br><img src='" + url +"'></img>";
					
				}
			}
	}
			//div += "<input style='width:80px;' class='opacity' type='text' value='' data-slider-min='0' data-slider-max='1' data-slider-step='0.1' data-slider-tooltip='hide'>";
		if (layer.getLayers) {
			var sublayersElem = ''; 
			var layers = layer.getLayers().getArray(),
					len = layers.length;
			for (var i = len - 1; i >= 0; i--) {
				sublayersElem += buildLayerTree(layers[i]);
			}
			elem = div + " <ul class='parent_li'>" + sublayersElem + "</ul></li>";
		} else {
			elem = div + " </li>";
		}
	
	return elem;
}

/**
 * Initialize the tree from the map layers
 * @returns {undefined}
 */
function initializeTree() {

	var elem = buildLayerTree(map.getLayerGroup());
	$('#layertree').empty().append(elem);

	$('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
	$('.tree li.parent_li > span').on('click', function(e) {
		var children = $(this).parent('li.parent_li').find(' > ul > li');
		if (children.is(":visible")) {
			children.hide('fast');
			$(this).attr('title', 'Expand this branch').find(' > i').addClass('glyphicon-plus').removeClass('glyphicon-minus');
		} else {
			children.show('fast');
			$(this).attr('title', 'Collapse this branch').find(' > i').addClass('glyphicon-minus').removeClass('glyphicon-plus');
		}
		e.stopPropagation();
	});
	
	//$('li[data-layerid=Competencia]')[0].hide('fast');
	$('#layertree > li > ul ').find(' > li > ul > li').hide('fast');
}
function cargarTablaFactura(){
}
//--------------------------------------------------------------------
//
//
//
//AQUI escribe la informacion sacarda de pantalla en la ventada del SUR
//
//
//
//
//----------------------------------------------------------------
function verGrafico(data, event, coordenadas, idMuestra){
			
			
			//$('#tabs-9').empty();*/
			var idPuntos = data[0].gid;
			
			if(data.length>1){
				idPuntos = $("#featuresFound")[0].selectedOptions[0].value;
				//alert ('puntos  '+idPuntos);
			}
			
			//alert ('prueba' +idPuntos)
			
			
			var selectedIndex = 0;
			if(data.length>1){
				selectedIndex = $("#featuresFound")[0].selectedIndex;
				
				
			}
			
			//alert ('index  '+selectedIndex);




			
			
// TAB-3-			
			
			
			var codigobuscado=data[selectedIndex].codigo;
			
		    productor_ganadero_seleccionado.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map&productor="+idPuntos);
			
	$.get( "index.php?r=puntosGanaderia/GetProductorValores&plantacion="+idPuntos, function( data5 ) {
							
				data5=JSON.parse(data5);
				var datosplantacion=[];
				
	//FORMA DE TABLA COMPLETA			
	$("#tabs-30").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	
	
	var row = $("<tr />")
	$("#tabs-30").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>  Parametro</th>"));
	row.append($("<th Width='150 px'> Valor</th>"));
	row.append($("<th Width=75 px'> Unidad</th>"));
	row.append($("<th Width='50 px'> Año</th>"));
	
	
	
	
	$.each(data5, function(index, value){
			
					var row = $("<tr />");
					$("#tabs-30").append(row);
					//this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Parametro+ "</td>"));
					row.append($("<td>" + value.Valor + "</td>"));
					row.append($("<td>" + value.Unidad + "</td>"));
					row.append($("<td>" + value.Ano + "</td>"));
		});
	var row = $("<tr />");
	$("#tabs-30").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	//myLayout.open('south');			
			
		})

		
}



// fin pruebas
/**
 * Finds recursively the layer with the specified key and value.
 * @param {ol.layer.Base} layer
 * @param {String} key
 * @param {any} value
 * @returns {ol.layer.Base}
 */
function findBy(layer, key, value) {

	if (layer.get(key) === value) {
		return layer;
	}

	// Find recursively if it is a group
	if (layer.getLayers) {
		var layers = layer.getLayers().getArray(),
				len = layers.length, result;
		for (var i = 0; i < len; i++) {
			result = findBy(layers[i], key, value);
			if (result) {
				return result;
			}
		}
	}

	return null;
}

function getActiveLayers(layers){
	//var layers = map.getLayerGroup();
	

	if(layers.getLayers){
		var group = layers.getLayers();
		
		for(var i = 0; i < group.getArray().length; i++){
			getActiveLayers(group.getArray()[i]);
		}
	}else{
		if(layers.getVisible())
			visibles.push(layers);//console.log(layers.get('id'));
	}
	
}

function hacerBusqueda(){
	//$("#Control_1_1").empty();
	//$("#Control_1_1").html('<img id="loading-image" width=100 src="images/logo3_75_75.gif" alt="Loading..." />');	
		
	//alert ('aqu esty 1044');
	
	var text ='';
	var text2='';
	subcuenca = $("#subcuenca").val();
	if (document.getElementById("checksubcuenca").checked == true ) {
		checksubcuenca =1;
		 text = 'pr_codigo_cuenca::int = '+subcuenca;
		 text2 = 'pr_codigo_cuenca::int = '+subcuenca;
		 }
	else {checksubcuenca =0}
	
	microcuenca =$("#microcuenca").val();
	if (document.getElementById("checkmicrocuenca").checked == true ) {
		checkmicrocuenca =1;
		if (text == ""){
			text = text +'pr_codigo_micro_cuenca::int = '+microcuenca;
			text2 = text2 +'pr_codigo_micro_cuenca::int = '+microcuenca;
			}
		else {text = text +' AND pr_codigo_micro_cuenca::int = '+microcuenca;
		text2 = text2 +' AND pr_codigo_micro_cuenca::int = '+microcuenca}
	}
	else {checkmicrocuenca =0}
	
	
	
	cedula =$("#cedula").val();
	if (document.getElementById("checkcedula").checked == true ) {
		checkcedula =1;
		if (text == ""){
			text = text +'pr_codigo_cliente = \''+cedula+'\'';
			text2 = text2 +'codigo_cliente = \''+cedula+'\'';
			}
		
		else {text = text +' AND pr_codigo_cliente =\''+cedula+'\'';
		text2 = text2 +' AND codigo_cliente =\''+cedula+'\''}
	}
	else {checkcedula =0}
	
	plantacion =$("#plantacion").val();
	if (document.getElementById("checkplantacion").checked == true ) {
		checkplantacion =1;
		var plant_code =plantacion;
	
	//verGrafico(plant_code)
		
		if (text == ""){
			text = text +'de_codigo_plantacion = \''+plantacion+'\'';
			text2 = text2 +'codigo_plantacion = \''+plantacion+'\'';
			//codigo_plantacion
			}
		
		else {text = text +' AND de_codigo_plantacion =\''+plantacion+'\'';
		text2 = text2 +' AND codigo_plantacion =\''+plantacion+'\''}
	}
	else {checkplantacion =0}
	
	predio =$("#predio").val();
	if (document.getElementById("checkpredio").checked == true ) {
		checkpredio =1;
		if (text == ""){
			text = text +'pr_codigo_predio = \''+predio+'\'';
			text2 = text2 +'pr_codigo_predio = \''+predio+'\'';
			}
		
		else {text = text +' AND pr_codigo_predio = \''+predio+'\'';
		text2 = text2 +' AND pr_codigo_predio = \''+predio+'\''}
	}
	else {checkpredio =0}
	
	proyecto =$("#proyecto").val();
	if (document.getElementById("checkproyecto").checked == true ) {
		checkproyecto =1;
		if (text == ""){
			text = text +'nombre_proyecto = \''+proyecto+'\'';
			text2 = text2 +'nombre_proyecto = \''+proyecto+'\'';
			}
		
		else {text = text +' AND nombre_proyecto =  \''+proyecto+'\'';
		text2 = text2 +' AND nombre_proyecto =  \''+proyecto+'\''}
	}
	else {checkproyecto =0}
	
	destino =$("#destino").val();
	if (document.getElementById("checkdestino").checked == true ) {
		checkdestino =1;
		if (text == ""){
			text = text +'cs_destino = \''+destino+'\'';
			text2 = text2 +'cs_destino = \''+destino+'\'';
			}
		
		else {text = text +' AND cs_destino =  \''+destino+'\'';
		text2 = text2 +' AND cs_destino =  \''+destino+'\''}
	}
	else {checkdestino =0}
	
	
	actividad =$("#actividad").val();
	if (document.getElementById("checkactividad").checked == true ) {
		checkactividad =1;
		if (text == ""){
			text = text +'tp_descripcio_tipo_actividad = \''+actividad+'\'';
			text2 = text2 +'tp_descripcio_tipo_actividad = \''+actividad+'\'';
			}
		
		else {text = text +' AND tp_descripcio_tipo_actividad =\''+actividad+'\'';
		text2 = text2 +' AND tp_descripcio_tipo_actividad =\''+actividad+'\''}
	}
	else {checkactividad =0}
	
	
	tplantacion =$("#tplantacion").val();
	if (document.getElementById("checktplantacion").checked == true ) {
		checktplantacion =1;
		if (text == ""){
			text = text +'tp_descripcion_tipo_plantacion = \''+tplantacion+'\'';
			text2 = text2 +'tp_descripcion_tipo_plantacion = \''+tplantacion+'\'';
			}
		
		else {text = text +' AND tp_descripcion_tipo_plantacion =  \''+tplantacion+'\'';
		text = text +' AND tp_descripcion_tipo_plantacion =  \''+tplantacion+'\''}
	}
	
	else {checktplantacion =0}
	
	
	fechaini =$("#fechaini").val();
	fechafin =$("#fechafin").val();
	if (document.getElementById("checkfecha").checked == true ) {
		checkfecha =1;
		if (text == ""){
			text = text +'pl_fecha_inspeccion >=  \''+fechaini + '\' AND pl_fecha_inspeccion <= \''+fechafin+'\'' ;
			text2 = text2 +'fecha >=  \''+fechaini + '\' AND fecha <= \''+fechafin+'\'' ;
			}
		
		else {text = text +' AND pl_fecha_inspeccion >=   \''+fechaini + '\' AND pl_fecha_inspeccion <= \''+fechafin+'\''
		text2 = text2 +' AND fecha >=   \''+fechaini + '\' AND fecha <= \''+fechafin+'\''}
	}
	else {checkfecha =0}
	
	/*
	ifactura =$("#ifactura").val();
	ffactura =$("#ffactura").val();
	if (document.getElementById("checkfactura").checked == true ) {
		checkfactura =1;
		if (text == ""){
			text = text +'codigo_factura::int >=  '+ifactura + ' AND codigo_factura::int <= '+ffactura ;
			}
		
		else {text = text +' AND codigo_factura::int >=  '+ifactura + ' AND codigo_factura::int <= '+ffactura}
	}
	else {checkfactura =0}
*/
textfin = ' where ' + text;
// alert ('esto es :'+textfin+'    '+text2);
 plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&criterio2="+textfin);

var crite=[];
 crite.push(text2);
 //se hace zoom sobre las parcelas selccionadas
	textfin2 = '\''+text+'\'';
	
	$.get("index.php?r=Puntos/GetPlantacionSeleccionBox&criterio2="+text, function( data10 ) {
		
	data10=JSON.parse(data10);

    
	
	var xmin= parseFloat(9999999999.0);
	var xmax= parseFloat(-9999999999.0);
	var ymin= parseFloat(9999999999.0);
	var ymax= parseFloat(-9999999999.0);
	alert ('numero de poligonos (parcelas con geometria en SIT),' +data10.length);
	
	if (data10.length < 1) {
		alert ('ATENCION: No hay ningn poligono digitalizado correcto para esta seleecion');}
	
	    for (i=0; (i<data10.length);i++) {
			
			if (xmin>data10[i].xmin) {xmin=parseFloat(data10[i].xmin)};
			if (xmax<data10[i].xmax) {xmax=parseFloat(data10[i].xmax)};
			if (ymin>data10[i].ymin) {ymin=parseFloat(data10[i].ymin)};
			if (ymax<data10[i].ymax) {ymax=parseFloat(data10[i].ymax)};
			
		} 
			
		 var xmed=(parseFloat(xmin)+parseFloat(xmax))/2;
		 var ymed=(parseFloat(ymax)+parseFloat(ymin))/2;
	
		
	;
		 var cormin=ol.proj.transform([parseFloat(xmin),parseFloat(ymin)], 'EPSG:4326', 'EPSG:3857');
         var sal=ol.proj.transform([xmed,ymed], 'EPSG:4326', 'EPSG:3857');
	     var cormax=ol.proj.transform([parseFloat(xmax),parseFloat(ymax)], 'EPSG:4326', 'EPSG:3857');
	
	//alert ('primera coordenada '+cormin[0]+'  '+cormin[1]+'  '+cormax[0]+'  '+cormax[1]);
		
var myExtent = [cormin[0],cormin[1],cormax[0],cormax[1]];
	map.getView().fitExtent(myExtent , map.getSize());
				
	
			
	
	
		 
})
//findel zoom

 
 //
 $("#generarexcel").attr("href", "index.php?r=site/hojaexcel&criterio="+crite);
 
//
//
//AQUI SE GENERA LA TABLA
 $.get('index.php?r=Poa/GetActividadFacturacionLabores&criterio='+crite, function (data3){
	
	data3 = JSON.parse(data3);	
	//alert ('Criterio ' +crite);
	if (data3.length>100 ){
	alert ('Numero de registros devueltos (plantaciones con o sin poligono asociado) ' +data3.length+' solo se mostraran los 100 primeros en pantalla, limite la busqueda. Excel los exportará todos' );
	}
	else {
	alert ('Numero de registros devueltos (plantaciones con o sin poligono asociado)' +data3.length);
	}	
	var totalTareas = 0;
	var totalPlantas = 0;
	var totalInversion = 0;
	var totalLabores = 0 ;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	
			 
			
		var totalsup=0;
		
		//alert ('en la linea 2875');
		if (tabla != undefined){
		tabla.clear().draw();
		}
		else {
			tabla=$('#Grafico_1_1').DataTable({
				"searching":true,
				"scrollY":"600px",
				"scrollX":"600px",
				"scrollCollapse":true,
				"bPaginate":true,
				"ColumnDefs": [
				{"className": "dt-center", "targets": "_all"}
				]
			})
		}
		
		//alert ('en la linea 2891');
		



	
	$('#Grafico_1_1 tbody').on ('click', 'tr' , function() {
		  var data = tabla.row (this).data();
		  var seccion = data[2];
		  
		  
		  //plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel="+seccion);
		  $("#informeparcelapdf").attr("href", "index.php?r=site/informeparcelapdf&parcela="+seccion);	
			
		  $.get("index.php?r=Puntos/GetPlantacionBox&planta="+seccion, function( data10 ) {

	  	data10=JSON.parse(data10);


	
	var xmin= parseFloat(9999999999.0);
	var xmax=parseFloat(-9999999999.0);
	var ymin=9999999999.0;
	var ymax=-9999999999.0;
	 
	
	if (data10.length < 1) {
		alert ('ATENCION: No hay poligono digitalizado correcto para esta parcela'+ seccion);}
	
	    for (i=0; (i<data10.length);i++) {
			
			if (xmin>data10[i].xmin) {xmin=parseFloat(data10[i].xmin)};
			if (xmax<data10[i].xmax) {xmax=parseFloat(data10[i].xmax)};
			if (ymin>data10[i].ymin) {ymin=parseFloat(data10[i].ymin)};
			if (ymax<data10[i].ymax) {ymax=parseFloat(data10[i].ymax)};
			
		} 
			
		 var xmed=(parseFloat(xmin)+parseFloat(xmax))/2;
		 var ymed=(parseFloat(ymax)+parseFloat(ymin))/2;
	
		
	;
		 var cormin=ol.proj.transform([parseFloat(xmin),parseFloat(ymin)], 'EPSG:4326', 'EPSG:3857');
         var sal=ol.proj.transform([xmed,ymed], 'EPSG:4326', 'EPSG:3857');
	     var cormax=ol.proj.transform([parseFloat(xmax),parseFloat(ymax)], 'EPSG:4326', 'EPSG:3857');
	
	//alert ('primera coordenada '+cormin[0]+'  '+cormin[1]+'  '+cormax[0]+'  '+cormax[1]);
		
var myExtent = [cormin[0],cormin[1],cormax[0],cormax[1]];
	map.getView().fitExtent(myExtent , map.getSize());
				
	
			
	
	
		 
})
	//prueba
	
	par2=[];
				
					var par1={
						gid:0,
						codigo:seccion
						
					}
					par2.push(par1);
					
	
	
		//alert (par2[0].gid+'   '+par2[0].codigo+ '    '+seccion+'   '+event);
		var coordenadas = "vacio";
						var idMuestra = "vacio";
						var idPunto = "vacio";
						
						verGraficoRefo(par2, event, coordenadas, idMuestra, idPunto);  
		 
		  
	});
		
		records=data3.length;
		if (records>100){
			records=100;
		}
	
		for (var i=0; i < records; i++){
			totalTareas = totalTareas + data3[i].tareas ;
			totalPlantas = totalPlantas + data3[i].plantas;
			totalInversion = totalInversion + data3[i].inversion_plantas;
			totalLabores = totalLabores + data3[i].labores;
			//$("#Grafico_1_1").append(row); 
			l=i+1;
		    platb= data3[i].plantacion;
			var textA = ' de_codigo_plantacion= \''+platb+'\'';
			if (data3[i].superficie >0){
			sig="Si"}
			else {
			sig="No"}
			
			
		
			var rowNode=tabla.row.add (
				[
				 i+1,
				 sig,
			data3[i].plantacion,
			data3[i].control,
			data3[i].cliente,
			data3[i].apellido,
			data3[i].nombre,
			data3[i].cedula,
			data3[i].cuenca,
			data3[i].microcuenca,
			data3[i].destino,
			data3[i].fecha,
			data3[i].plantas
			//data3[i].tareas,
			//data3[i].inversion_plantas,
			//data3[i].labores,
			//data3[i].factura
				]).draw(true);
					
		}
		$("#Titulo_1_1").empty();
		$("#Control_1_1").empty();
		$("#Titulo_1_1").append("<td width=100%><h5><b>Selec* from</b>"+text+"</h5></td>");
		
	})

 
}


//--------------------------------------------------------------------
//REFORESTACION
//
//
//AQUI escribe la informacion sacarda de pantalla en la ventada del este
//
//
//
//
//----------------------------------------------------------------
function verGraficoRefo(data, event, coordenadas, idMuestra){
			$("#tabs-1").empty();
			$("#tabs-2").empty();
			$("#tabs-3").empty();
			$("#tabs-4").empty();
			$("#tabs-5").empty();
			//$("#tabs-6").empty();
			$("#tabs-7").empty();
			$("#tabs-8").empty();
			
			
			//$('#tabs-9').empty();
			var idPuntos = data[0].gid;
			
			if(data.length>1){
				idPuntos = $("#featuresFound")[0].selectedOptions[0].value;
				//alert ('puntos  '+idPuntos);
			}
			
			//alert ('prueba' +idPuntos)
			
			
			var selectedIndex = 0;
			if(data.length>1){
				selectedIndex = $("#featuresFound")[0].selectedIndex;
				
				
			}
			
			//alert ('index  '+selectedIndex);




			
			
// TAB-3-			
			
			
			var codigobuscado=data[selectedIndex].codigo;
			//alert( 'test   ' + codigobuscado);
	
			
	$.get( "index.php?r=puntos/GetPlantacionEspecieSumatorio&plantacion="+codigobuscado, function( data5 ) {
							
				data5=JSON.parse(data5);
				var datosplantacion=[];
				
	//FORMA DE TABLA COMPLETA			
	$("#tabs-3").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#tabs-3").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>  Especie</th>"));
	row.append($("<th Width='150 px'> Cantidad de Plantas</th>"));
	
	$.each(data5, function(index, value){
			
					var row = $("<tr />");
					$("#tabs-3").append(row);
					//this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
		});
	var row = $("<tr />");
	$("#tabs-3").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	//myLayout.open('south');			
			
		})

			
//PRUEBA TABS_1
		
		//	$.get( "index.php?r=puntos/GetPointsIntersect&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data ) {
			$.get( "index.php?r=puntos/GetPlantacion&planta="+codigobuscado, function( data2 ) {
							
				data1=JSON.parse(data2);
				var datosplantacion=[];
				//alert ('linea 1935  Longitud = ' +data1.length );
				for(var j=0; j < data1.length; j++){	
		           //alert (' linea 1937 bucle  '+j +'   ' +data1[j].Plantacion +'     ' +data1[j].Predio );
				}
				for(var i=0; i < data.length; i++){
					var dato={
						Plantacion:data[i].Plantacion,
						Predio:data[i].Predio
						
					}
					datosplantacion.push(dato);
				}	
			
		
// TAB-1-	

		
			for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data1[j], function(i, item) {
				
					var $tr = $('<tr>').append(
						//
						
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-1');
				
				
			})
			}

	
			
			
			
			})
			
	
	
	
	

	var codigobuscado=data[selectedIndex].codigo;
			//alert( 'test   ' + codigobuscado);
			
			
	$.get( "index.php?r=puntos/GetPlantacionFacturaPlantas&plantacion="+codigobuscado, function( data20 ) {
							
				data20=JSON.parse(data20);
				var datosplantacion=[];
				
				
				

				//Cabecera
				
			/*for(var j=0; j < data20.length; j++){	
			   $.each(data20[j], function(i, item) {
				  
				var $td = $('<tr>').append(
				  $('<td>').text(i),
				  $('<td>').text(item)
				  ).appendTo('#infoPlantas');
				  // }
			    })
				
			}
			
			
			$('<tr>').appendTo('#infoPlantas');	*/	
			
			//llena tabla
			$("#infoPlantas").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />");
	$("#infoPlantas").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='15%'>Cont.</th>"));
	row.append($("<th Width='20%'>Fact.-</th>"));
	row.append($("<th Width='30%'>Fecha-</th>"));
	row.append($("<th Width='15%'>Plan.</th>"));
	row.append($("<th Width='20%'>Valor</th>"));
	$("#infoPlantas").append(row); 			
	$.each(data20, function(index, value){
			
			
					var row = $("<tr />");
					$("#infoPlantas").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td>" + value.Codigo_Control + "</td>"));
					row.append($("<td>" + value.Factura + "</td>"));
					row.append($("<td>" + value.Fecha + "</td>"));
					row.append($("<td>" + value.Plantas + "</td>"));
					row.append($("<td>" + value.Inversion_plantas + "</td>"));
					
			
	})
	var row = $("<tr />");
	$("#infoPlantas").append(row);	
		})	

$.get( "index.php?r=puntos/GetPlantacionFacturaLabores&plantacion="+codigobuscado, function( data21 ) {
							
				data21=JSON.parse(data21);
				var datosplantacion=[];
				
				
				

				//Cabecera
				
			/*for(var j=0; j < data20.length; j++){	
			   $.each(data20[j], function(i, item) {
				  
				var $td = $('<tr>').append(
				  $('<td>').text(i),
				  $('<td>').text(item)
				  ).appendTo('#infoPlantas');
				  // }
			    })
				
			}
			
			
			$('<tr>').appendTo('#infoPlantas');	*/	
			
			//llena tabla
			$("#infoLabores").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />");
	$("#infoLabores").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='33%'>Cont.</th>"));
	row.append($("<th Width='33%'>Plantación-</th>"));
	row.append($("<th Width='34%'>Valor</th>"));
	$("#infoLabores").append(row); 			
	$.each(data21, function(index, value){
			
			
					var row = $("<tr />");
					$("#infoLabores").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td>" + value.Codigo_Control + "</td>"));
					row.append($("<td>" + value.Plantacion + "</td>"));
					row.append($("<td>" + value.coste_labores + "</td>"));

					
			
	})
	var row = $("<tr />");
	$("#infoLabores").append(row);	
		})
		
			
			
	// TAB-4-			
	$.get( "index.php?r=puntos/GetActividad&plantacion="+codigobuscado, function( data20 ) {
							
				data20=JSON.parse(data20);
				var datosplantacion=[];
				
				
				

				//Cabecera
				
			for(var j=0; j < data20.length; j++){	
			   $.each(data20[j], function(i, item) {
				   //if (i == 'codigo_control' || i=='actividad' || i=='apellido' || i=='actividad' || i=='fecha_de_inspeccion'|| i=='observacion'|| i=='condicion_de_la_plantacion'){
				var $td = $('<tr>').append(
				  $('<td>').text(i),
				  $('<td>').text(item)
				  ).appendTo('#tabs-4');
				  // }
			    })
				
			}
			
			
			$('<tr>').appendTo('#tabs-4');		
			
			//llena tabla
			/*
			for(var j=0; j < data20.length; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
				$.each(data20[j], function(i, item) {
					 if (i == 'codigo_control' || i=='actividad' || i=='apellido' || i=='actividad' || i=='fecha_de_inspeccion'|| i=='observacion'|| i=='condicion_de_la_plantacion'){
				
					var $td = $('<td>').append(
						//$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-4');
					 }
				})
				$('<tr>').appendTo('#tabs-4');	
			}

		*/
				
				
	
		
		})		
			
			

// TAB-2-			
	$.get( "index.php?r=puntos/GetPlantacionSegunda&plantacion="+codigobuscado, function( data6 ) {
							
				data6=JSON.parse(data6);
				var datosplantacion=[];
				
	for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data6[j], function(i, item) {
				
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-2');
				
				
			})		
			
		}
		
		})
		
	//TABS-7

    $.get( "index.php?r=puntos/GetLabor&plantacion="+codigobuscado, function( data8 ) {
							
				data8=JSON.parse(data8);
				var datosplantacion=[];
				for(var j=0; j < data8.length; j++){
				$.each(data8[j], function(i, item) {
				
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-7');
				
				})
			}
	} )		
			
	//TABS-5
	
	
$.get( "index.php?r=puntos/GetPredio&plantacion="+codigobuscado, function( data7 ) {
							
				data7=JSON.parse(data7);
				var datosplantacion=[];
				
	for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data7[j], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-5');
			})			
		}
		})

		
		//TABS-8

  $.get( "index.php?r=puntos/GetCliente&plantacion="+codigobuscado, function( data9 ) {
							
				data9=JSON.parse(data9);
				var datosplantacion=[];
				for(var j=0; j < data9.length; j++){
				$.each(data9[j], function(i, item) {
				
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-8');
				
				})
			}
	} )		
		
	//TABS A	
		 $("#informeparcelapdf").attr("href", "index.php?r=site/informeparcelapdf&parcela="+codigobuscado);
	
//			
//PRUEBA DE OTRA FORMA DE CARGAR LOS DATOS
//		
//TAB -6-
	

//Plantacion	

$.get( "index.php?r=puntos/GetPlantacionEspecie&plantacion="+codigobuscado, function( data4 ) {
							
				data4=JSON.parse(data4);
				var datosplantacion=[];
				//alert ('linea 1935  Longitud = ' +data1.length );
				for(var j=0; j < data4.length; j++){	
		           //alert (' linea 2281 bucle  '+j +'   ' +data1[j].Plantacion +'     ' +data1[j].Predio );
				}
				/*
				for(var i=0; i < data4.length; i++){
					var dato={
						Plantacion:data4[i].Plantacion,
						Predio:data4[i].Predio
						
					}
					datosplantacion.push(dato);
				}	
			
		*/
			
			
			//llena tabla
			

	
	$("#infoPlantacion").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#infoPlantacion").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>Especie</th>"));
	row.append($("<th Width='150 px'>Cantidad de Plantas</th>"));
	row.append($("<th Width='150 px'>Tareas plantadas</th>"));
	row.append($("<th Width='150 px'>Tipo de plantación</th>"));
	$.each(data4, function(index, value){
			
			if (value.Tipo_de_plantacion == "Plantación (Reforestación)") {
					var row = $("<tr />");
					$("#infoPlantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
					row.append($("<td>" + value.Tarea_plantada + "</td>"));
					row.append($("<td>" + value.Tipo_de_plantacion + "</td>"));
					row.append($("<td>" + value.Año_plantación + "</td>"));
					totalSup += value.Cantidad_plantas;
					totalNum += value.Tarea_plantada;
			}
	});
	var row = $("<tr />");
	$("#infoPlantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th><b>Total</b></th>"));
	row.append($("<th style='text-align:center' >" + totalSup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</th>"));
	row.append($("<th  style='text-align:center'>" + totalNum.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</th>"));
	
	
	
	
//REPLANTACION			
			
			//myLayout.open('south');	
			$("#infoReplantacion").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#infoReplantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>  Especie</th>"));		
	row.append($("<th Width='150 px'> Cantidad de Plantas</th>"));
	row.append($("<th Width='150 px'>Tareas Replantadas</th>"));
	row.append($("<th Width='150 px'>Tipo de plantación</th>"));
	$.each(data4, function(index, value){
			
			if (value.Tipo_de_plantacion == "Replantación  (Reforestación)") {
					var row = $("<tr />");
					$("#infoReplantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
					row.append($("<td>" + value.Tarea_plantada + "</td>"));
					row.append($("<td>" + value.Tipo_de_plantacion + "</td>"));
					row.append($("<td>" + value.Año_plantación + "</td>"));
					totalSup += value.Cantidad_plantas;
					totalNum += value.Tarea_plantada;
			}
	});
	var row = $("<tr />");
	$("#infoReplantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th><b>Total</b></th>"));
	row.append($("<th style='text-align:center' >" + totalSup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</th>"));
	row.append($("<th  style='text-align:center'>" + totalNum.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</th>"));
		

	
//MANTENIMIENTO
	

var totalSup = 0;
$("#infoMantenimiento").empty();
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#infoMantenimiento").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>  Especie</th>"));		
	row.append($("<th Width='150 px'> Cantidad de Plantas</th>"));
	row.append($("<th Width='150 px'>Tareas Mantenida</th>"));
	row.append($("<th Width='150 px'>Tipo de plantación</th>"));
	
	
	$.each(data4, function(index, value){
			
			if (value.Tipo_de_plantacion == "Mantenimiento  (Reforestación)") {
					var row = $("<tr />");
					$("#infoMantenimiento").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
					row.append($("<td>" + value.Tarea_plantada + "</td>"));
					row.append($("<td>" + value.Tipo_de_plantacion + "</td>"));
					row.append($("<td>" + value.Año_plantación + "</td>"));
					totalSup += value.Cantidad_plantas;
					totalNum += value.Tarea_plantada;
			}
	});
	var row = $("<tr />");
	$("#infoMantenimiento").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th><b>Total</b></th>"));
	row.append($("<th style='text-align:center' >" + totalSup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</th>"));
	row.append($("<th  style='text-align:center'>" + totalNum.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</th>"));
		var row = $("<tr />");
	$("#tabs-6").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		
	
			
			//fin de prueba
			//myLayout.open('south');			
			
// fin Prueb tabs_5
			
			
		}	)

		
			
			/*
			var $select = $('<select id="param">').appendTo("#tabs-2");
			$("<option />", {value: '', text: ''}).appendTo($select);		
			var espacio = $("<p id='borrar'><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></p>").appendTo("#tabs-2");
			
			$tr = $('<tr border: "1px solid black">').append(
				$('<td>').text("Parámetro"),
				$('<td>').text("Número datos"),
				$('<td>').text("Primera fecha fecha muestreo"),
				$('<td>').text("Última fecha muestreo")
				
			).appendTo('#tabs-3');
			
			$tr = $('<tr border: "1px solid black">').append(
				$('<td>').text("Parámetro"),
				$('<td>').text("Valor"),			
				$('<td>').text("Última fecha muestreo")			
			).appendTo('#tabs-5');
			
			$.get( "index?r=muestras/getParametersUltimoValor&id="+idPuntos, function( data2 ) {
				for(var i = 0; i<data2.length; i++){
					$tr = $('<tr>').append(
						$('<td>').text(data2[i].desc_parametro),
						$('<td>').text(data2[i].valor),
						$('<td>').text(data2[i].fecha)
					).appendTo('#tabs-5');
				}
			});
			
			//Condición para mostrar en el modal INFO los datos de la muestra a través de la búsqueda
			if (idMuestra != "vacio") {
				$('#tabBusqueda1').show();
				$('#tabBusqueda2').show();
				$('#tabs-6').empty();
				
				$tr = $('<tr border: "1px solid black">').append(
					$('<td>').text("Parámetro"),
					$('<td>').text("Valor"),			
					$('<td>').text("Última fecha muestreo")			
				).appendTo('#tabs-6');
				
				$.get( "index?r=muestras/getParametersIDMuestra&id="+idMuestra, function( data2 ) {
					for(var i = 0; i<data2.length; i++){
						$tr = $('<tr>').append(
							$('<td>').text(data2[i].desc_parametro),
							$('<td>').text(data2[i].valor),
							$('<td>').text(data2[i].fecha)
						).appendTo('#tabs-6');
					}
				});
			}			
			
			$.get( "index?r=muestras/getParameters&id="+idPuntos, function( data2 ) {
				for(var i = 0; i<data2.length; i++){
					$("<option />", {value: data2[i].id_parametro+'-'+data2[i].desc_unidad, text: data2[i].desc_parametro}).appendTo($select);
					$tr = $('<tr>').append(
						$('<td>').text(data2[i].desc_parametro),
						$('<td>').text(data2[i].total),
						$('<td>').text(data2[i].min_fecha),
						$('<td>').text(data2[i].fecha_muestreo)
					).appendTo('#tabs-3');
				}
				
				var r= $('<input type="button" class="btn btn-primary" id="botonScholler" value="Cargar gráfico"/>');
				$("#tabs-4").append(r);			
				$('#botonScholler').click(function(evt){
					$('#botonScholler').show();
					$.getJSON( "index?r=Muestras/getSchollerBerckaloff&id="+idPuntos, function( data3 ) {
						var series = [];
						if(data3.length==0){
							$('<p>').text("No disponible").appendTo("#tabs-4");
							$('#botonScholler').hide();
						}
						else{
							for (var i = 0; i<data3.length; i++){
								var h = {
									name: data3[i][0],
									data: data3[i][1]
								}
								series.push(h);
							}
							$('#tabs-4').highcharts({
								chart:{
									height:280,
									width: 340
								},
								title: {
									text: ''					
								},
								credits:{
									enabled:false
								},
								exporting: {
									enabled: false
								},
								xAxis: {
									categories: ['Calcio', 'Ion cloruro', 'Magnesio', 'Potasio', 'Sodio', 'Ion sulfato']
								},
								yAxis: {
									title: {
										enabled: false
									},
									plotLines: [{
										value: 0,
										width: 1,
										color: '#808080'
									}]
								},
								tooltip: {
									valueSuffix: ' meq'
								},
								legend: {
									
									enabled:false
								},
								series: series
							});
							$('#botonScholler').hide();
						}
					});
				});	
				$('#param').change(function(evt){
				// alert($('#param').find(":selected").text());
					document.getElementById("borrar").innerHTML="";
					var id_param = $('#param').find(":selected")[0].value.split("-")[0];
					var unidad = $('#param').find(":selected")[0].value.split("-")[1];
					var desc_param = $('#param').find(":selected")[0].text;			
					var $div = $('<div id="chartParam">').appendTo("#tabs-2");
					$('.highcharts-data-table').empty();
					
					$.get( "index.php?r=muestras/getAnalytic&id="+idPuntos+"&parametro="+id_param, function( data ) {
						
						
						
						for(key in data){
							if(key=="id")
								continue;
							if(key=="color")
								continue;
							if(key=="id_param")
								continue;
							if(key=="nombre")
								continue;
							
							$('#chartParam').highcharts('StockChart', {
								chart:{
									height:280,
									width: 340
								},
								credits:{
									enabled:false
								},
								rangeSelector : {
									enabled : false
								},
								subtitle : {
									text : key + ' (' + unidad + ')'
								},
								xAxis: {
									ordinal: false
								},
								title : {
									text : ''
								},
								plotOptions:{
									line:{
										color: '#999999',
									},
								},
								exporting: {
									enabled: true
								},
								navigator:{
									height: 20,
									maskFill: 'rgba(200, 200, 200, 0.45)',
									series: {
										type: 'areaspline',
										color: '#999999',
										fillOpacity: 0.05,
										dataGrouping: {
											smoothed: true
										},
										lineWidth: 1,
										marker: {
											enabled: false
										}
									}
								},
								series : [{
									turboThreshold: 5000,
									name : key ,
									data : data[key],
									tooltip: {
										valueDecimals: 2
									}
								}]
							});
							var $butExp = $('<button>', {text: 'Exportar', class: 'btn btn-primary'}).appendTo("#chartParam");
							$butExp.click(exporta);
							
							
							
						}
					});
				 });
			})
			
			if (event != "undefined" || event != "vacio") {
				popup.setPosition(event.coordinate);
			}
			if (coordenadas != "vacio") {
				popup.setPosition(coordenadas);
			}		
			popupContainer.style.display = 'block';
		*/
}

$('#menuproductor').selectmenu({
		change: function( event, data ) {
			
			idAlcampo = data.item.value;
		
		    productor_ganadero_seleccionado.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map&productor="+idAlcampo);
				
			$.get("index.php?r=PuntosGanaderia/GetProductorPoint&planta="+idAlcampo, function( data10 ) {
		
				data10=JSON.parse(data10);
				var xmin= parseFloat(9999999999.0);
				var xmax=parseFloat(-9999999999.0);
				var ymin=9999999999.0;
				var ymax=-9999999999.0;
		
				for (i=0;i<data10.length;i++) {
			
					if (xmin>data10[i].xmin) {xmin=parseFloat(data10[i].xmin)};
					if (xmax<data10[i].xmax) {xmax=parseFloat(data10[i].xmax)};
					if (ymin>data10[i].ymin) {ymin=parseFloat(data10[i].ymin)};
					if (ymax<data10[i].ymax) {ymax=parseFloat(data10[i].ymax)};
			
	
				} 
				
				var xmed=(parseFloat(xmin)+parseFloat(xmax))/2;
				var ymed=(parseFloat(ymax)+parseFloat(ymin))/2;
	
				var cormin=ol.proj.transform([parseFloat(xmin),parseFloat(ymin)], 'EPSG:4326', 'EPSG:3857');
				var sal=ol.proj.transform([xmed,ymed], 'EPSG:4326', 'EPSG:3857');
				var cormax=ol.proj.transform([parseFloat(xmax),parseFloat(ymax)], 'EPSG:4326', 'EPSG:3857');
	
				map.setView(new ol.View({
					center:[sal[0],sal[1]],
					zoom: 14
	
				}))
		
		
			})
		
		
		

      }
	});

	$( "#butMedirDistancia" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'url(http://sit.plansierra.org/PlanSierra/images/cdistancia.png), help'});
			//$("#map").css({'cursor': 'pointer'});
			tools.socio = false;
			tools.capa = false;
			tools.refo =false;
			tools.busq =false;
			tools.dist = true;
			tools.area = false;
			
			
		// var pointerMoveHandler = function(evt) {
       /* if (evt.dragging) {
          return;
        }*/
        /** @type {string} */
        sourcevect.clear();
        // alert ('estoy en la linea 2425  0');  
      //var typeSelect = document.getElementById('typedigitalizacion');
		var geometryFunction = function(coordinates, geometry) {
				if (!geometry) {
				  geometry = new ol.geom.Polygon(null);
				  
				}
				var start = coordinates[0];
				var end = coordinates[1];
				geometry.setCoordinates([
				  [start, [start[0], end[1]], end, [end[0], start[1]], start]
				]);
				//alert ('estoy en la linea 2436   1');
				return geometry;
			  }
     // global so we can remove it later
	  //alert ('estoy en la linea 2440   2');
     //function addInteraction() {
        //var value = typeSelect.value;
        //if (value !== 'None') {
          draw = new ol.interaction.Draw({
            source: sourcevect,
            //maxPoints: 2,
			type: 'LineString',
			//geometryFunction : geometryFunction
          });
		   //alert ('estoy en la linea 2450   3');
          map.addInteraction(draw);
		
		  //alert ('estoy en la linea 2452   3b');
      //  }
     //}
 			draw.on('drawend', function (k){
				//alert('termino    linea 2456   4');
				//alert(k.feature.getGeometry().getLength());
				
				var coordinate = k.feature.getGeometry().getLastCoordinate();
			  var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
				  coordinate, 'EPSG:3857', 'EPSG:4326'));


				$( "#dialog-form" ).empty();
					dialog = $( "#dialog-form" ).dialog({
						title: "Medida longitud",
						autoOpen: false,
						// height: 300,
						// width: 350,
						modal: true,
						buttons: {
							"Cancelar": function() {
								dialog.dialog( "close" );
								sourcevect.clear();
			           map.removeInteraction(draw);
							}
						},
						/*close: function() {
						//form[ 0 ].reset();
						allFields.removeClass( "ui-state-error" );
						}*/
					}
					);
					
					
					$('<p>You clicked here:</p><code>' + hdms +
			  '</code><p>Longitud: '+k.feature.getGeometry().getLength().toLocaleString('en-EN', {maximumFractionDigits:2})+'  m</p>').appendTo("#dialog-form");
					
					dialog.dialog( "open" );
						
						
			  
  
				//map.removeInteraction(draw);
				
				
			});
			draw.on('drawstart', function (k){
				//alert('empiezo linea 2462  5');
				sourcevect.clear();
				
			});
			
			
	});
	/*
$('#typedigitalizacion').selectmenu({
		change: function( event, data ) {	
	

	 map.removeInteraction(draw);
        addInteraction();
	
		}
});
*/

$( "#butMedirArea" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'url(http://sit.plansierra.org/PlanSierra/images/carea.png), help'});
			//$("#map").css({'cursor': 'pointer'});
			tools.socio = false;
			tools.capa = false;
			tools.refo =false;
			tools.busq =false;
			tools.dist = false;
			tools.area = true;
			
			
			
		// var pointerMoveHandler = function(evt) {
       /* if (evt.dragging) {
          return;
        }*/
        /** @type {string} */
        sourcevect.clear();
        // alert ('estoy en la linea 2425  0');  
      //var typeSelect = document.getElementById('typedigitalizacion');
		var geometryFunction = function(coordinates, geometry) {
				if (!geometry) {
				  geometry = new ol.geom.Polygon(null);
				  
				}
				var start = coordinates[0];
				var end = coordinates[1];
				geometry.setCoordinates([
				  [start, [start[0], end[1]], end, [end[0], start[1]], start]
				]);
				//alert ('estoy en la linea 2436   1');
				return geometry;
			  }
     // global so we can remove it later
	  //alert ('estoy en la linea 2440   2');
     //function addInteraction() {
        //var value = typeSelect.value;
        //if (value !== 'None') {
          draw = new ol.interaction.Draw({
            source: sourcevect,
            //maxPoints: 2,
			type: 'Polygon',
			//geometryFunction : geometryFunction
          });
		   //alert ('estoy en la linea 2450   3');
          map.addInteraction(draw);
		
		  //alert ('estoy en la linea 2452   3b');
      //  }
     //}
 			draw.on('drawend', function (k){
				//alert('termino    linea 2456   4');
				//alert(k.feature.getGeometry().getLength());
				
				
				var coordinate = k.feature.getGeometry().getLastCoordinate();
			  var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
				  coordinate, 'EPSG:3857', 'EPSG:4326'));


				$( "#dialog-form" ).empty();
					dialog = $( "#dialog-form" ).dialog({
						title: "Medida de area",
						autoOpen: false,
						// height: 300,
						// width: 350,
						modal: true,
						buttons: {
							"Cancelar": function() {
								dialog.dialog( "close");
								sourcevect.clear();
								map.removeInteraction(draw);
							}
						},
						
						
						
						/*close: function() {
						//form[ 0 ].reset();
						allFields.removeClass( "ui-state-error" );
						}*/
					}
					);
					
					
					$('<p>You clicked here:</p><code>' + hdms +
			  '</code><p><h4>Area: '+k.feature.getGeometry().getArea().toLocaleString('en-EN', {maximumFractionDigits:2})+' m2</p>').appendTo("#dialog-form");
					var tareas= ( k.feature.getGeometry().getArea())/628.86;
					$('<p></code><p><h4>Area: '+tareas.toLocaleString('en-EN', {maximumFractionDigits:2})+' Tareas</p>').appendTo("#dialog-form");	
					dialog.dialog( "open" );
						
						
			  
  
				//map.removeInteraction(draw);
				
				
			});
			draw.on('drawstart', function (k){
				//alert('empiezo linea 2462  5');
				sourcevect.clear();
				
			});
			
			
	});



	
	
$('#menucedula').selectmenu({
		change: function( event, data ) {
		
idAlcampo = data.item.value;
		
		    productor_ganadero_seleccionado.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/ganaderia.map&productor="+idAlcampo);
				
			$.get("index.php?r=PuntosGanaderia/GetProductorPoint&planta="+idAlcampo, function( data10 ) {
		
				data10=JSON.parse(data10);
				var xmin= parseFloat(9999999999.0);
				var xmax=parseFloat(-9999999999.0);
				var ymin=9999999999.0;
				var ymax=-9999999999.0;
		
				for (i=0;i<data10.length;i++) {
			
					if (xmin>data10[i].xmin) {xmin=parseFloat(data10[i].xmin)};
					if (xmax<data10[i].xmax) {xmax=parseFloat(data10[i].xmax)};
					if (ymin>data10[i].ymin) {ymin=parseFloat(data10[i].ymin)};
					if (ymax<data10[i].ymax) {ymax=parseFloat(data10[i].ymax)};
			
	
				} 
				
				var xmed=(parseFloat(xmin)+parseFloat(xmax))/2;
				var ymed=(parseFloat(ymax)+parseFloat(ymin))/2;
	
				var cormin=ol.proj.transform([parseFloat(xmin),parseFloat(ymin)], 'EPSG:4326', 'EPSG:3857');
				var sal=ol.proj.transform([xmed,ymed], 'EPSG:4326', 'EPSG:3857');
				var cormax=ol.proj.transform([parseFloat(xmax),parseFloat(ymax)], 'EPSG:4326', 'EPSG:3857');
	
				map.setView(new ol.View({
					center:[sal[0],sal[1]],
					zoom: 14
	
				}))
		
		
			})
		


		
	      }
	});


	$('#menucuenca').selectmenu({
		change: function( event, data ) {
			
			idAlcampo = data.item.value;
			
		
		<?php  
		//AQUI RELLENO EL DESPLEGABLE DE MICROCUENCA; ESTE EVENTO SE DISPARA CUANDO YA HE SELECCIONADO UNA CUENA ?
			
		     $mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

             $rs4 = array();
			 
//ss_micro_cuencas tiene todas las microcuencas consideradas en SPSO y cada microcuenca tiene un ID diferente

             foreach($mbd->query('SELECT codigo_micro_cuenca, descripcion, codigo_cuenca FROM ss_micro_cuenca  order by codigo_micro_cuenca::int asc;') as $fila4) {
				 
				 
                   $c = null;								
                   $c['id'] =(int)$fila4['codigo_micro_cuenca'];
                   $c['nombre'] =$fila4['descripcion'];
				   $c['cuenca']= (int)$fila4['codigo_cuenca'];
                   array_push($rs4, $c);

              }


?>	
	     data = <?php echo json_encode($rs4);?>;
	     var a = "<option value=999>Todas las subcuencas</option>";
		 $("#menumicrocuenca").append(a);
	     for(var i = 0; i < data.length; i++){
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			if (data[i].cuenca == idAlcampo) {
		      $('#menumicrocuenca').append($('<option>', {
				   value: data[i].id,
				   text: data[i].id+ '- '+ data[i].nombre + '  (' +data[i].cuenca+' )'+ idAlcampo
		     	}));
			}
	    }
		

      }
	});

	
	
	
		
	$('#menumicrocuenca').selectmenu({
		change: function( event, data ) {
					$( "#butUnselect" ).trigger('click');
			microcuenca = data.item.value;
			$('#grafico1').empty();
			$('#grafico2').empty();
			$('#seleccion').empty();
	
	//se pinta la microcuenca seleccionada
	        microcuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas="+microcuenca);
	
$.get("index.php?r=Puntos/GetBoxMicrocuenca&x="+microcuenca, function( data10 ) {

	  	 data10=JSON.parse(data10);


	
	var xmin= parseFloat (9999999999.0);
	var xmax=parseFloat(-9999999999.0);
	var ymin=parseFloat(9999999999.0);
	var ymax=parseFloat(-9999999999.0);
	 
	//alert (xmax+'  xmax  '+ xmin);
	 
	// alert ('ahora el doble '+data10.length*19);
	 
	    for (i=0;i<data10.length;i++) {
			
			if (xmin>data10[i].xmin) {xmin=parseFloat(data10[i].xmin)};
			if (xmax<data10[i].xmax) {xmax=parseFloat(data10[i].xmax)};
			if (ymin>data10[i].ymin) {ymin=parseFloat(data10[i].ymin)};
			if (ymax<data10[i].ymax) {ymax=parseFloat(data10[i].ymax)};
	
		} 
			
		 var xmed=(parseFloat(xmin)+parseFloat(xmax))/2;
		 var ymed=(parseFloat(ymax)+parseFloat(ymin))/2;
	
		
		
		
   
		 var cormin=ol.proj.transform([parseFloat(xmin),parseFloat(ymin)], 'EPSG:4326', 'EPSG:3857');
         var sal=ol.proj.transform([xmed,ymed], 'EPSG:4326', 'EPSG:3857');
	     var cormax=ol.proj.transform([parseFloat(xmax),parseFloat(ymax)], 'EPSG:4326', 'EPSG:3857');
		 
	 
		
		
		
var myExtent = [xmin,ymin,xmax,ymax];
	map.getView().fitExtent(myExtent , map.getSize());
	
				//alert ((ymin+ymax)/2);
	/*map.setView(new ol.View({
            center:[xmed,ymed],
            zoom: 11
     }));*/

	})
 



	


		
	
	





	
			
	//se pinta las parcelas	de la microcuenca seleccionada	
			//plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel="+microcuenca);
			//parcelas.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map");
			
			//map.getLayersByName('Rios')[0].setVisibility(true);	
			
			var length=0;
			
			//var group= map.getLayerGroup();
			

			var layers = map.getLayerGroup();
			 //alert (layers.getLength());
			 
			var root= layers.getLayers();
			 var length = root.getLength();
			 
			  //alert (length);
			  var element = root.item(3);
			 // alert (element.Length);
			  var name=element.get('name');
			  //alert (name);
			  var layerssub=element.getLayers();
			   var length = layerssub.getLength();
			   //alert ('layersub  '+length);
			   //hacen no visibles las parcelas no seleccionadas
			   var element = layerssub.item(2);
			  //alert ('layersub2  '+element.Length);
			  var name=element.get('name');
			  //alert ('name  '+name);
			 element.setVisible(false);
			 //hacen no visibles la informacionpuntual.
			 var element = layerssub.item(4);
			  //alert ('layersub2  '+element.Length);
			  var name=element.get('name');
			  //alert ('name  '+name);
			 element.setVisible(false);
		
	      }
	});
	


	
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-64660106-1', 'auto');
  ga('send', 'pageview');
 
</script>