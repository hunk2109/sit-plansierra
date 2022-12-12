<div class="pane ui-layout-center">
	<div id="loading">
	  <img id="loading-image" width=75 src="images/logo3_75_75.gif" alt="Loading..." />
	</div>

	<div id="map" style="height:100%; margin-right=0px">
		<div id="navTool" class="div-navTool">
			<div id='butInfoWMS' title="Información de las capas"><img height=24 src="images/info.png"/></div>
			<div id='butInfo' title="Información sociodemográfica"><img height=24 src="images/people_color.png"/></div>
			<div id='butUnselect' title="Limpiar selección"><img height=24 src="images/people.png"/></div>
		</div>
		
		
		
		<!-- Aqui se ponen las corrdenadas que aparecen en la esquina inferior izquierda-->
		<div style="width: 170px; height: 100px"  id="coord" class="div-coordenadas"></div>
		
		<div id="dialog-form"></div>
		
			</div>
</div>
<!--div class="pane ui-layout-north">North</div-->
<div class="pane ui-layout-south">
	<!--<div style="width: 50%; height: 100%; float:left" id="grafico1"></div>
	<div style="width: 50%; height: 100%; float:right" >
		
		<div id="grafico2" style ="height: 100%"></div>-->
		

		
		
		
		<div class="col-md-10">
											<div id="map" style="width:100%; height:80%"></div>											
											<div class="row">
												<div class="col-md-6">
													<div id="grafico1"></div>
												</div>
												<div class="col-md-6">
													<div id="grafico2"></div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div id="grafico3"></div>
												</div>
												<div class="col-md-6">
													<div id="grafico4"></div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-12">
													<div id="container10" style="width:100%; height:100%"></div>
													
											</div>	
											</div>	
											<div class="row">
												<div class="col-md-12">
													<div id="container11" style="width:100%; height:100%"></div>
												</div>	
											</div>
											<div class="row">
												<div class="col-md-12">
													<div id="container12" style="width:100%; height:300%"></div>
													
										        </div>
										    </div>
										<div class="row">
												<div class="col-md-12">
													<div id="container13" style="width:100%; height:300%"></div>
													
										        </div>
										    </div>
		
	</div>
	
</div>
<div class="pane ui-layout-west">
	<div>
	
	<label>GANADERIA PRODUCTOR</label>
	
		<br/>
		<br/>
	
		<label>Seleccione  por nombre de productor</label>
		<br/>
		<select id="hiperAlcampo" name="hiperAlcampo"></select>
		<a href="javascript:document.location.reload();">       Refrescar</a>
		<br/>
		<label>Seleccione por cedula de productor</label>
		<br/>
		<select id="microcuenca" name="microcuenca"></select>
		<br/>
		<label>Seleccione Cliente</label>
		<br/>
		<select id="cliente" name="cliente"></select>
		<br/>
		
		<br/>
		<!--<label>Intervalo de fechas</label><br/>
		<input type="date"><input type="date">
		
		
		<label>vacia</label>
		<br/>
		<select onchange="cargarGraficoAno()" id="ano" name="ano">
		 
		</select>-->
		<br/>
		<br/>
		<br/>
		
		
		<div id="layertree"  class="tree"></div>
	</div>
</div>
<div class="pane ui-layout-east">
	<div>
		<div id="popup" >
			<!--a href="#" id="popup-closer" class="ol-popup-closer"></a-->
			<div id="popup-content">
				<div id="tabs">
				  <ul>
					<li><a href="#tabs-1">Propietarios</a></li>
					<li><a href="#tabs-2">Datos generales</a></li>
					<li><a href="#tabs-4">Datos técnicos</a></li>
					<li><a href="#tabs-3">Atuaciones</a></li>
					<li><a href="#tabs-6">Lagunas</a></li>	
					<li><a href="#tabs-7">Reservorio</a></li>
					<li><a href="#tabs-5">Sistema Riego</a></li>
					<li><a href="#tabs-8">Cliente</a></li>
					<li><a href="#tabs-9">Cuencas y otros</a></li>
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
var iso1, iso2, iso3, iso4, iso5, microcuencas_selected, plantaciones_cuencas_selected, parcelas, arg_cuencas, ensenas, loc = null, idAlcampo, idEncuesta, cuencas, microcuenca, productores_ganaderos,centro_de_acopio,productor_ganadero_seleccionado;
var sel, selLayer, osm, google, google_carto,parcelassel,sal,salid,codigobuscado,solo_plantaciones,dataano,dataespecie,xmed,ymed,xmin,xmax,ymin,ymax;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
var myLayout;
var infoCV;
cuencas =99;
idAlcampo=99;



//**********************************
// EVENTOS
//**********************************


$(document).ready(function () {
	myLayout = $('#content').layout({
		west__size:	'20%',
		east__size:	'35%',
		south__size:'42%',
		east__initClosed: true, 
		onresize: function () {
			map.updateSize();//alert('whenever anything on layout is redrawn.') 
		}	
	});
	
	$( "#butInfo" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'pointer'});
			tools.capa = false;
			tools.socio = true;
			//alert ( 'estoy aqui en butInfo');
	});
		
	$( "#tabs" ).tabs();
	
	$( "#butInfoWMS" )
		.button()
		.click(function( event ) {
			$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			//$("#map").css({'cursor': 'url(https://cdn3.iconfinder.com/data/icons/bluecoral/Cursor.png), default'});
			tools.socio = false;
			tools.capa = true;
			//alert ( 'estoy aqui en butInfoWMS');
	});
	
	$( "#butUnselect" )
		.button()
		.click(function( event ) {
			tools.socio = false;
			$("#map").css({'cursor': 'default'});
			cpSelected = [];
			$("#infoEdad").empty();
			$("#infoExtr").empty();
			$("#infoCV").empty();
			$("#totalPob").empty();
			$("#infoPobM").empty();
			$("#infoPobD").empty();
			$("#infoPobS").empty();
			$("#infoCompeEns").empty();
			$("#infoCompeSup").empty();
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'Seleccion'){
					map.removeLayer(capas[i]);
				}
			}
		});
			
	//********************************
    //SELECCION DE CUENCAS 
    //********************************	

	
	$('#hiperAlcampo').selectmenu({
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
	
	$('#idEncuesta').selectmenu({
		change: function( event, data ) {
			idEncuesta = data.item.value;
			cargarGrafico1(data.item.value);
			//cargarGrafico1(idEncuesta);
			//iso1.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso2.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso3.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso4.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso5.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//sel.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			
			
      }
	});
	
	$('#microcuenca').selectmenu({
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
	
	
//***********************************************	
//RELLENAR COMBO DE PROPIETARIOS
//**********************************************
	
<?php
//DESPLEGABLE DEL PROPIETARIO POR NOMBRE
//primer desplegable originalemente hiper alcampo

//OJO HE INTRODUCIDO MODIFICACIONE PORQUE NO FUNCIONABA
//BUSCO DIRECTAMENTE EN LA BASE DE DATOS SIN USAR LAS HERRAMIENTAS DE Yii


//CONEXION DIRECTA A LA BASE DE DATOS
$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

$rs3 = array();
//foreach($mbd->query('SELECT gid, objectid, id, nom_cuenca, sub_cuenca, shape_leng, shape_area, geom FROM geo_subcuencas order by gid asc;') as $fila3) {
$query = 'SELECT id, propietario FROM gs_productores_todos order by propietario asc;';



//***********************************************************************************************
//***********************************************************************************************
//***********************************************************************************************
//                                                                                            ***
//ESTO ES UN EJEMPLO DE  COMO USAR EL CONTROL DE USUARIOS PARA PERMITIR UNOS ACCESO U OTROS.  ***
//                                                                                            ***
//***********************************************************************************************
//***********************************************************************************************
//***********************************************************************************************
/*

$grupo = Yii::app()->user->getState('grupo');

if (strpos($grupo, 'cuenca') !== false) {
	$cuenca = explode("_" , $grupo);
	$cuenca = $cuenca[1];
	$query = 'SELECT codigo_cuenca, descripcion FROM ss_cuenca WHERE codigo_cuenca = \''.$cuenca.'\' order by codigo_cuenca asc;';
	
}
*/
//finaliza el control de accesos.




foreach($mbd->query($query) as $fila3) {
	$c = null;								
	$c['id'] =(int)$fila3['id'];
	$c['nombre'] =$fila3['propietario'];

	array_push($rs3, $c);

}


?>
	 $("#hiperAlcampo").empty();
	data = <?php echo json_encode($rs3);?>;
	//var a = "<option value=999>Todas las subcuencas</option>";
	$("#hiperAlcampo").append(a);
	for(var i = 0; i < data.length; i++){
		$('#hiperAlcampo').append($('<option>', {
				value: data[i].id,
				text: data[i].id+ '- '+ data[i].nombre
			}));
		
	}

	
		
<?php
//DESPLEGABLE DEL PROPIETARIO POR CEDULA
//primer desplegable originalemente hiper alcampo

//OJO HE INTRODUCIDO MODIFICACIONE PORQUE NO FUNCIONABA
//BUSCO DIRECTAMENTE EN LA BASE DE DATOS SIN USAR LAS HERRAMIENTAS DE Yii


//CONEXION DIRECTA A LA BASE DE DATOS
$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

$rs3 = array();
//foreach($mbd->query('SELECT gid, objectid, id, nom_cuenca, sub_cuenca, shape_leng, shape_area, geom FROM geo_subcuencas order by gid asc;') as $fila3) {
$query = 'SELECT id, celula FROM gs_productores_todos order by celula asc;';




foreach($mbd->query($query) as $fila3) {
	$c = null;								
	$c['id'] =(int)$fila3['id'];
	$c['nombre'] =$fila3['celula'];

	array_push($rs3, $c);

}


?>
	 $("#microcuenca").empty();
	data = <?php echo json_encode($rs3);?>;
	//var a = "<option value=999>Todas las subcuencas</option>";
	$("#microcuenca").append(a);
	for(var i = 0; i < data.length; i++){
		$('#microcuenca').append($('<option>', {
				value: data[i].id,
				text: data[i].id+ '- '+ data[i].nombre
			}));
		
	}
	
	
	
	
	
	
	
	
	
//---------------------------------------------
//---------------------------------------------
//
//relleno desplegable del año
//
//---------------------------------------------
//---------------------------------------------
<?php

$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

$rs3 = array();
	
foreach($mbd->query('SELECT ano FROM ano ORDER by ano DESC;') as $fila3) {


//SELECT ano FROM Estadisticas_plantacion GROUP BY ani  order by ano asc;') as $fila30) {
$c = null;								
$c['id'] =(int)$fila3['ano'];
$c['nombre']=$fila3['ano'];

array_push($rs3, $c);

}
	



?>
		 $("#ano").empty();
	data = <?php echo json_encode($rs3);?>;
	var a = "<option value=999>Todos los años</option>";
		$("#ano").append(a);
	for(var i = 0; i < data.length; i++){
		$('#ano').append($('<option>', {
				value: data[i].id,
				text: data[i].id
			}));
		
	}
		
		
	
	
	/* quito esto para hcerlo directamente
	$.get('index.php?r=TblGeoMicrocuencas/getHiperAlcampo', function(data)
	
		$('#hiperAlcampo').append($('<option>', {
				value: 0,
				text: ''
			}));
		for(var i = 0; i < data.length; i++){
			$('#hiperAlcampo').append($('<option>', {
				value: data[i].id,
				text: data[i].nombre
			}));
		}
		
		
	})
	*/
	

	

	
	
	
	
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







	
	//***********************************
	//MUY IMPORTANTE COMPROBAR QUE ESTAN DEFINIDAS TODAS LAS VARIABLES Y LOS NOMBRE BIEN PUESTOS
	//
	// ESTA PARTE DEL PROGRAMA SOMBREA LA CUENCA SELECCIONADA
	//
	//*********************************
	
	microcuencas_selected = new ol.layer.Image({
		//extent: extent,
		id: 'Cuenca-seleccionada',
		name: "Cuenca seleccionada",
		visible: false,
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas=99&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=MICROCUENCAS_SELECTED2',
		source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas=99',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'MICROCUENCAS_SELECTED2', 'SRS': "EPSG:3857" }
		})
	})
	
	
	//prueba de cartografia de parcelas
	plantaciones_cuencas_selected = new ol.layer.Image({
		//extent: extent,
		id: 'Plantaciones de Cuenca-seleccionada',
		visible: false,
		name: "Plantaciones de Cuenca seleccionada",
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel=99&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_CUENCAS_SELECTED',
		source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel=99',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'plantaciones_cuencas_selected', 'SRS': "EPSG:3857" }
		})
	})
	
	
	
	
	
	
	
	
    arg_cuencas= new ol.layer.Image({
	id:'Subcuencas',
	name:'Subcuencas',
	opacity :'0.3',
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
	 
	plantaciones_puntos = new ol.layer.Image({
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
})		
	
//*************************************************
//AÑADO LA CAPA DE CUENCAS DEL PLAN SIERRA
//**************************************************	
	
	
	
	var cuencas_select = new ol.layer.Tile({
	name:'CUENCAS',
	visible: true,
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
	opacity :'.2',
	
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
	
		
	
	
	
	groupCapas = new ol.layer.Group({
		id: 'Plantaciones',
		name: 'Plantaciones',
		layers: [microcuencas_selected, arg_cuencas, parcelas, plantaciones_cuencas_selected, plantaciones_puntos ]
	});
	
	layers.push(groupCapas);
	
	
	
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
	
	map = new ol.Map({
		target: 'map',
		layers: layers,
		logo:'images/flechas.png',
		view: new ol.View({
		  //projection: projection,419322, 4941215
		  center: [-7910000, 2200000],
		  zoom: 10
		})
	});
	
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
		$('#coord').html(ol.coordinate.toStringXY(coord, 2) + "<br> WGS 84  PseudoMercator<br> " +ol.coordinate.toStringXY(sal, 6) + "<br> WGS 84  Geograficas<br>" +ol.coordinate.toStringXY(salid, 0) + "<br> WGS 84  UTM 19N<br>");	
	});
 
 
	
	//PINCHAR EN UN LA PANTALLA
	
	//pantalla de informacion administrativa y topo grafica general
	
	map.on('singleclick', function(event) {
		if(tools.socio){
			
			/*$('#tabs-1').empty();
			$('#tabs-2').empty();
			$('#tabs-3').empty();
			$('#tabs-4').empty();		
			$('#tabs-5').empty();
		
			$('#tabs-7').empty();
			$('#tabs-8').empty();
			$('#tabs-9').empty();*/
			myLayout.close('east');
			 
			//alert ('estoy aqui');
			var x = event.coordinate[0];
			var y = event.coordinate[1];
			//alert (x+'   '+y);
			var resolution = map.getView().getResolution();
			var content = document.getElementById('popup-content');
			lastCoords = event.coordinate;
			map.getLayers().getArray()[1].getLayers().getArray()[0];
			//Alertas para vigilancia
			//alert (x +" - "+y);
			
			
	         sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:32619');
			//alert ('X  '+sal[0]+'  Y  '+sal[1]);
			
			
			
			
//PRUBAS DE PREGUNTA leeo el model digital del terreno

$('#infoCompeEns10').empty();
	$.get("index.php?r=CartoBase/GetElevacion&x="+sal[0]+"&y="+sal[1], function( data10 ) {

	  	 data10=JSON.parse(data10);
		 
	    
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			//alert ('Altitud  '+data10[0].Altitud);
			
			 
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data10[0], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#infoCompeEns10');
					}	)		
			
               myLayout.open('east');
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
			
               myLayout.open('east');
	})				
			
	
//fin de pregunta a raster	


	
			sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:4326');
			//alert (sal[0]+'    '+sal[1]);
			//problemas con la proyeccion en 
			//sal[0]=280604;
			//sal[1]=2142553;
			//interrogar al modelo digital del terreno grupo 1 capa 1
			/*
			var length=0;
			
			//var group= map.getLayerGroup();
			

			var layers = map.getLayerGroup();
			 //alert (layers.getLength());
			 
			var root= layers.getLayers();
			 var length = root.getLength();
			 
			// alert (length);
			  var element = root.item(1);
			 // alert (element.Length);
			  var name=element.get('name');
			 // alert (name);
			  var layerssub=element.getLayers();
			   var length = layerssub.getLength();
			 //  alert ('layersub  '+length);
			   //hacen no visibles las parcelas no seleccionadas
			   var element = layerssub.item(1);
			  //alert ('layersub2  '+element.Length);
			  var name=element.get('name');
			 // alert ('name  '+name);
			 element.setVisible(false); 
			// alert ('sas  '+event.coordinate[0]+'   '+event.coordinate[1]);
			// //var coord2[];
			 var coord2=element.getPixelFromCoordinate(event.coordinate);
			
			// alert ('sasass  '+coord2);
			 
			*/
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
               myLayout.open('east');
				})		
				
				
			/*
			var url = sel.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution()*10, map.getView().getProjection(),
                        {
							'INFO_FORMAT': 'text/plain'
                        }
                    );
			$.get(url, function (data){
			   var f = data.split('Feature ');
			   cod = f[1].replace(/(\r\n|\n|\r|\:|\s)/gm,"");
			   if(cod.length == 6)
				   cod = '0'+cod;
			   cpSelected.push(cod);
					selLayer = new ol.layer.Image({
						//extent: extent,
						id: 'sel',
						name: "Seleccion",
						source: new ol.source.ImageWMS({
						url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/maps/puntos.map',
						crossorigin: 'anonymous',
							params: {'LAYERS': 'Plantaciones_puntoss', 'SRS': "EPSG:3857" }
						})
					})
					
					map.addLayer(selLayer);
			   infoCP();
		   })*/
		}
		
		
		
		//primer  icono del mapa
		//
		//Iinfromacion acerca del tema visualizado
		
		//______________________________________________________
		
		
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
			
			//Alerta para comprobar cambio de coprdenada a geografica
			//alert ('Lon = ' +sal[0] +"   Lat = "+sal[1]);
			
			
			//Aqui se hace la consulta a la base de datos . Se está utilizando la consulta a punto de medi-ambient
			
			
		
			//aqui preguntamos por el poligono. OJO esto tiene que devolver tan solo los numeros de plantacion. filtarados para que solo haya uno
			
			//alert (sal[0]+"    "+sal[1]+"    "+resolution);
			
			//LAGUNAS		
						
			$.get( "index.php?r=puntosGanaderia/GetSelectReservorio&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data ) {
			
				i=0;
				data=JSON.parse(data);
				
				
				  $('#infoCompeEns17').empty();
					var row = $("<tr />");
					
					$('#infoCompeEns17').append(row);  
				//for(var j=0; j < data.length; j++){ //_____________
					row.append($("<th Width='25 px'>Id</th>"));
					row.append($("<th Width='100 px'>Nombre</th>"));
					
					var row = $("<tr />");
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data, function(i, item) {
				var row = $("<tr />");
				$('#infoCompeEns17').append(row);
				row.append($("<td  style='text-align:left'>" + item.gid + "</td>"));
					row.append($("<th>" + item.codigo + "</td>"));
					
					
					
			})
			
			})			
						
						
						
						
			$.get( "index.php?r=puntosGanaderia/GetSelectLagunas&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data2 ) {
			
				i=0;
				data2=JSON.parse(data2);
				
				
				  $('#infoPlantacion').empty();
					var row = $("<tr />");
					$('#infoPlantacion').append(row);  
				//for(var j=0; j < data.length; j++){ //_____________
					row.append($("<th Width='25 px'>Id</th>"));
					row.append($("<th Width='100 px'>Nombre</th>"));
					
					var row = $("<tr />");
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data2, function(i, item) {
				var row = $("<tr />");
				$('#infoPlantacion').append(row);
				row.append($("<td  style='text-align:left'>" + item.gid + "</td>"));
					row.append($("<th>" + item.codigo + "</td>"));
					
					
					
			})
			
			})
			
			
			
			
			$.get( "index.php?r=puntosGanaderia/GetSelectSistemaRiego&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data1 ) {
			
				i=0;
				data1=JSON.parse(data1);
				
				
				  $('#infoCompeEns5').empty();
					var row = $("<tr />");
					$('#infoCompeEns5').append(row);  
				//for(var j=0; j < data.length; j++){ //_____________
					row.append($("<th Width='25 px'>Id</th>"));
					row.append($("<th Width='100 px'>Nombre</th>"));
					
					var row = $("<tr />");
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data1, function(i, item) {
				var row = $("<tr />");
				$('#infoCompeEns5').append(row);
				row.append($("<td  style='text-align:left'>" + item.gid + "</td>"));
					row.append($("<th>" + item.codigo + "</td>"));
					
					
					
			})
			
			})
			
			$.get( "index.php?r=puntosGanaderia/GetSelectGanadero&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data ) {
			
				
				data=JSON.parse(data);
				
				
				  $('#infoCompeEns1').empty();
					var row = $("<tr />");
					$('#infoCompeEns1').append(row);  
				//for(var j=0; j < data.length; j++){ //_____________
					row.append($("<th Width='25 px'>Id</th>"));
					row.append($("<th Width='100 px'>Nombre</th>"));
					row.append($("<th Width='50 px'>Asociación</th>"));
					var row = $("<tr />");
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data, function(i, item) {
				var row = $("<tr />");
				$('#infoCompeEns1').append(row);
				row.append($("<td  style='text-align:left'>" + item.gid + "</td>"));
					row.append($("<th>" + item.codigo + "</td>"));
					row.append($("<th>" + item.asociacion + "</td>"));
					
					
			})			
		//}	//________________
               myLayout.open('east');	
						
	
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
							title: "Parcelas en el area",
							autoOpen: false,
							height: 250,
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
			/*visibles = [];
			getActiveLayers(map.getLayerGroup());
			tabs.find( ".ui-tabs-nav" ).empty();
			//tabs.find( ".ui-tabs-nav" ).empty();
			//$(".ui-tabs-nav").empty();
			$.each(visibles, function(index, value){
				var url = value.getSource().getGetFeatureInfoUrl(evt.coordinate, map.getView().getResolution()*5, map.getView().getProjection(), {
                            'INFO_FORMAT': 'text/html'
                        }
                    );
				
				$.get(url, function(data){
					
					if(data.toString()!="[object XMLDocument]" && data.toString()!=""){
						popupInfo.setPosition(evt.coordinate);
						popupContainer.style.display = 'block';
						var label = value.get('name');
						id = "tabs-"+value.get('id');
						if(id!="tabs-wms_ign"){
							$("#"+id).empty();
							//tabs = $("#popup-content-info");
							
							li = "<li><a href='#"+id+"'>"+label+"</a></li>";
							var tabContentHtml =data.toString();
							
							$("#"+id).text('');
							$("#"+id).remove();
							tabs.find( ".ui-tabs-nav" ).append( li );
							tabs.tabs({ active: 0 });
							tabs.append( "<div id='" + id + "'>" + tabContentHtml + "</div>" );
							tabs.tabs('refresh');
						}
					}else{
						id = "tabs-"+value.get('id');
						$("#"+id).empty();
						$("#"+id).text('');
						$("#"+id).remove();
					}
					
				})
			})
			
			 var pan = ol.animation.pan({
				duration: 1000,
				source: /** @type {ol.Coordinate} */ 
				
				/*(map.getView().getCenter())
			 });
			 map.beforeRender(pan);
			 map.getView().setCenter(evt.coordinate);
			  */
			  
			//map.getView().setCenter(evt.coordinate);
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

function infoCP(){
	console.log(cpSelected.toString());
	/*$.get('index.php?r=GeoSecciones/infoExtranjerosISO&id=' + cpSelected.toString(), function (data3){
	

  myLayout.open('east');
   $('#infoExtr').empty();
	
   $('#infoExtr').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			width: 300,
			type: 'pie'
		},
		title:{text:''},
		subtitle: {
			text: 'Total extranjeros: ' + data3[0][1][1].toFixed(0)
		},
		credits:{enabled:false},
		exporting:{enabled:false},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			//type: 'pie',
			name: 'Total',
			size: '60%',
			data: data3[0]
		},{
			//type: 'pie',
			 size: '80%',
			 innerSize: '60%',
			name: 'Nacionalidad',
			data: data3[1]
		}]
	});
})*/
myLayout.open('east');

$.get('index.php?r=geoCp/getCompeISO&id='+ cpSelected.toString(), function (data3){
	$("#infoCompeEns").empty();
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />")
	$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th>Enseña</th>"));
	row.append($("<th>Superficie</th>"));
	row.append($("<th>Número</th>"));
	var i = 0;
	var c = 0, s =0;
	$.each(data3, function(index, value){
		if(i<10){
			var row = $("<tr />")
			$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td style='text-align:left'>" + value.ensena + "</td>"));
			row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
			totalSup += value.superficie;
			totalNum += value.total;
		}else{
			c += value.total;
			s += value.superficie;
			totalSup += value.superficie;
			totalNum += value.total;
		}
			
			i++;
	});
	var row = $("<tr />");
	$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<td style='text-align:left'>Resto</td>"));
	row.append($("<td>" + s.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
	row.append($("<td>" + c.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
	
	var row = $("<tr />");
	$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th><b>Total</b></th>"));
	row.append($("<th>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</th>"));
	row.append($("<th>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</th>"));
 });
$.get('index.php?r=geoCp/getCompeSupISO&id='+ cpSelected.toString(), function (data3){
	$("#infoCompeSup").empty();
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />")
	$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th>Tipo</th>"));
	row.append($("<th>Superficie</th>"));
	row.append($("<th>Número</th>"));
	$.each(data3, function(index, value){
			var row = $("<tr />")
			$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td  style='text-align:left'>" + value.tipo + "</td>"));
			row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
			totalSup += value.superficie;
			totalNum += value.total;
	});
	var row = $("<tr />");
	$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th><b>Total</b></th>"));
	row.append($("<th>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</th>"));
	row.append($("<th>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</th>"));
 });

/*
$.get('index.php?r=tblIsoPob/getPobIso&id_encuesta='+idEncuesta+'&id='+cpSelected.toString()+'&tipo=m', function(data){
		$("#infoPobM").empty();
		var row = $("<tr />")
		$("#infoPobM").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th>Municipio</th>"));
		row.append($("<th>Población</th>"));
		row.append($("<th>Hogares</th>"));
		var tot = 0;
	  $.each(data, function(index, value){
		  $.each(value, function(i, val){
				total = 0;
				totalH = 0;
				sufix = ": 0-2'";
				if(i==2)
					sufix = ": 2-5'";
				if(i==3)
					sufix = ": 5-8'";
				if(i==4)
					sufix = ": 8-12'";
				if(i==5)
					sufix = ": 12-20'";
				$.each(val,function(m, n){total+=parseFloat(n.pob);totalH+=parseFloat(n.hog);});
				var row = $("<tr />")
				$("#infoPobM").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<th>Isocrona "+i+ sufix +"</th>"));
				row.append($("<th>"+total.toLocaleString('es-ES', {maximumFractionDigits:0})+"</th>"));
				row.append($("<th>"+totalH.toLocaleString('es-ES', {maximumFractionDigits:0})+"</th>"));
				$.each(val, function(k, v){
					var row = $("<tr />")
					$("#infoPobM").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td>"+k+"</td>"));
					row.append($("<td>"+v.pob.toLocaleString('es-ES', {maximumFractionDigits:0})+"</td>"));
					row.append($("<td>"+v.hog.toLocaleString('es-ES', {maximumFractionDigits:0})+"</td>"));
				})
				tot+=total;
		  })
		 
	  })
	  $("#totalPob").text("Población total: " + tot.toLocaleString('es-ES', {maximumFractionDigits:0}));
	  //$('#infoPobS')
	
})
/*
$.get('index.php?r=tblIsoPob/getPobIso&id_encuesta='+idEncuesta+'&id='+cpSelected.toString()+'&tipo=d', function(data){
		$("#infoPobD").empty();
		var row = $("<tr />")
		$("#infoPobD").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th>Distrito</th>"));
		row.append($("<th>Población</th>"));
		row.append($("<th>Hogares</th>"));
	  $.each(data, function(index, value){
		  $.each(value, function(i, val){
				sufix = ": 0-2'";
				if(i==2)
					sufix = ": 2-5'";
				if(i==3)
					sufix = ": 5-8'";
				if(i==4)
					sufix = ": 8-12'";
				if(i==5)
					sufix = ": 12-20'";
				var row = $("<tr />");
				$("#infoPobD").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				var total = 0;
				var totalH = 0;
				$.each(val,function(m, n){total+=parseFloat(n.pob);totalH+=parseFloat(n.hog);});
				row.append($("<th>Isocrona "+i+sufix+"</th>"));
				row.append($("<th>"+total.toLocaleString('es-ES', {maximumFractionDigits:0})+"</th>"));
				row.append($("<th>"+totalH.toLocaleString('es-ES', {maximumFractionDigits:0})+"</th>"));
				$.each(val, function(k, v){
					var row = $("<tr />")
					$("#infoPobD").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td>"+k+"</td>"));
					row.append($("<td>"+v.pob.toLocaleString('es-ES', {maximumFractionDigits:0})+"</td>"));
					row.append($("<td>"+v.hog.toLocaleString('es-ES', {maximumFractionDigits:0})+"</td>"));
				})
			   console.log(i);
		  })
		 
	  })
	  //$('#infoPobS')
	  
	
})
*/
/*$.get('index.php?r=tblIsoPob/getPobIso&id_encuesta='+idEncuesta+'&id='+cpSelected.toString(), function(data){
		$("#infoPobS").empty();
		var row = $("<tr />")
		$("#infoPobS").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th>Distrito</th>"));
		row.append($("<th>Población</th>"));
	  $.each(data, function(index, value){
		  $.each(value, function(i, val){
				var row = $("<tr />")
				$("#infoPobS").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into i
				row.append($("<th>Isocrona "+i+"</th>"));
				$.each(val, function(k, v){
					var row = $("<tr />")
					$("#infoPobS").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td>"+k+"</td>"));
					row.append($("<td>"+v+"</td>"));
				})
			   console.log(i);
		  })
		 
	  })
	  //$('#infoPobS')
	
})*/
}


//****************************************
//
// FUNCIONES DE CARGA DE GRAFICOS.
//
//***********************************+


//PRIMER GRAFICO TARTA ESPECIES

function cargarGraficoAno(){
	
var id2 = parseInt($("#ano").val());
//Cuenca
//alert ('cuenca'+idAlcampo);
//microcuenca
//alert ('microcuenca'+microcuenca);
//año
//alert ('año'+id2);
	
	
	
	
$.get('index.php?r=Graficos/GetCuencaAno&ano='+id2+ "&miccuenca="+microcuenca, function (data){
	//$.get('index.php?r=Graficos/GetAno&id='+id2, function (data){
	
	data = JSON.parse(data);
	//alert('sali');

	$('#grafico1').highcharts({
	
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: 'black',
    plotShadow: true,
    type: 'pie'
  },
  title: {
    text: 'Superfice ' +id2 
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
	  showInLegend: false,
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
	  name: '% de la superfice anual',
    data: 	data
  }]
  
  
});

//tabla
			/*
			//	 Basico
			for(var j=0; j < data.length; j++){	
			   $.each(data[j], function(i, item) {
				   //if (i == 'codigo_control' || i=='actividad' || i=='apellido' || i=='actividad' || i=='fecha_de_inspeccion'|| i=='observacion'|| i=='condicion_de_la_plantacion'){
				var $td = $('<tr>').append(
				  $('<td>').text(i),
				  $('<td>').text(item)
				  ).appendTo('#grafico2');
				  // }
			    })
				
			}
			
		*/
			/*
			//en forma de tabla
			$("#grafico2").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#grafico2").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	    row.append($("<th Width='200 px'>Especie</th>"));
		row.append($("<th Width='150 px'>Tareas</th>"));
	$.each(data, function(index, value){
			
					var row = $("<tr />");
					$("#grafico2").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.name + "</td>"));
					row.append($("<td>" + value.y + "</td>"));
					
			
	});

*/


})


//segunda fila
$.get('index.php?r=Graficos/GetCuenca&miccuenca='+microcuenca, function (data){
	//$.get('index.php?r=Graficos/GetAno&id='+id2, function (data){
	
	data = JSON.parse(data);
	//alert('sali');

	$('#grafico2').highcharts({
	
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: 'black',
    plotShadow: true,
    type: 'pie'
  },
  title: {
    text: 'Superfice total zona (no anual)'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
	  showInLegend: false,
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
	  name: '% de la superficie total',
    data: 	data
  }]
  
  
});


	
	
	
	
	
	
	//fin cuarto
	


//tabla
			/*
			//	 Basico
			for(var j=0; j < data.length; j++){	
			   $.each(data[j], function(i, item) {
				   //if (i == 'codigo_control' || i=='actividad' || i=='apellido' || i=='actividad' || i=='fecha_de_inspeccion'|| i=='observacion'|| i=='condicion_de_la_plantacion'){
				var $td = $('<tr>').append(
				  $('<td>').text(i),
				  $('<td>').text(item)
				  ).appendTo('#grafico2');
				  // }
			    })
				
			}
			
		*/
		/*	
			//en forma de tabla
			$("#grafico20").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#grafico20").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	    row.append($("<th Width='200 px'>Especie</th>"));
		row.append($("<th Width='150 px'>Tareas</th>"));
	$.each(data, function(index, value){
			
					var row = $("<tr />");
					$("#grafico20").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.name + "</td>"));
					row.append($("<td>" + value.y + "</td>"));
					
			
	});

*/


})	

//tercero

$.get('index.php?r=Graficos/GetCuencaanoex&miccuenca='+microcuenca, function (data1){
	dataano = JSON.parse(data1);	
		
  
});

$.get('index.php?r=Graficos/GetCuencaEspecies&miccuenca='+microcuenca, function (data2){
	dataespecie = JSON.parse(data2);
});



$.get('index.php?r=Graficos/GetCuencaanoEspecies&miccuenca='+microcuenca, function (data){
	//$.get('index.php?r=Graficos/GetAno&id='+id2, function (data){
	
	data = JSON.parse(data);
	//alert('sali');

	  //alert ('año minimo  '+dataano[0].ano + '  Especie mas frecuente  '+dataespecie[0].especie);
		
	
	
	//alert('sali');
	;
    var datos=[];
	
//bucle para todas las especies

//bucle para todos los años

   
	
	for (l=0;l<dataespecie.length;l++) {
		var datosespecie=[]	;
	for (j=0; j<dataano.length; j++){
	datosespecie[j]=0;
	//bucle recorriendo la base de datos especies,año, microcuenca
	for(var i=0; i < data.length; i++){
		if (data[i].especie==dataespecie[l].especie && data[i].ano==dataano[j].ano ) { 
					
				datosespecie[j]=[data[i].cantidad];
				//alert (datosespecie+ '  año  '+data[i].ano+'    especie '+data[i].especie + '  cantida '+data[i].cantidad);
		}
	}
	
	}
	//alert (datosespecie);
	//alert (datosespecie[4]);
	 var dato=[];
	
	var dato={
						name:dataespecie[l].especie,
						data:datosespecie,
						
					}
					//alert ( +data[i].ano+'    '+data[i].especie+'    '+data[i].cantidad);
					
					
					datos.push(dato);
					
				
	}
					
	
	
$('#container10').highcharts({


    title: {
        text: 'Evolución anual superficie plantada'
    },

    subtitle: {
        text: '   '
    },

    yAxis: {
        title: {
            text: 'Tareas'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },
	
	

    series: datos,

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});


//cuarto

	
$('#container11').highcharts({
    chart: {
        type: 'area'
    },
    title: {
        text: 'Evolucion historica de la superficie plantada segun principales especies'
    },
    subtitle: {
        text: 'Fuente SPSO'
    },
    xAxis: {
        categories: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017','2018'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Percent'
        }
    },
	legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} Tareas)<br/>',
        split: true
    },
    plotOptions: {
        area: {
            stacking: 'percent',
            lineColor: '#ffffff',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#ffffff'
            }
        }
    },
    series: datos,
});

//quinto

$('#container12').highcharts({
    chart: {
        type: 'area'
    },
    title: {
        text: 'Superfice en Traeas '
    },
    subtitle: {
        text: 'Fuente: Plan Sierra'
    },
    xAxis: {
        categories: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Tareas'
        },
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
	legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    tooltip: {
        split: true,
        valueSuffix: ' Tareas'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
     series: datos,
});




//fin de quinto


});	

//fin tercero
	

	
}	
	
	


function cargarGrafico2(euros){
	
	$.get('index.php?r=TblIsoCv/getEvolucion&idAlcampo='+idAlcampo+"&euros="+euros, function(d){
		etiqueta = "%";
		if(euros==true){
			etiqueta = "mill €";
		}
		
		Highcharts.setOptions({
					global: {
						useUTC: false,
						
					},
					lang: {
					  decimalPoint: ',',
					  thousandsSep: '.'
					}
				});
				
		$('#grafico2').highcharts({
			chart: {
				zoomType: 'x'
			},
			title: {
				text: 'Evolución cifra de ventas por isocrona'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.y:.2f} </b>'
			},
			xAxis: {
				/*type: 'datetime',
				minRange: 360 * 24 * 3600000 // fourteen days*/
				 categories: d.fechas
			},
			yAxis: {
				title: {
					text: "Evolución (" + etiqueta + ")"
				}
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.y:.2f} '+etiqueta+'</b>'
			},
			credits:{
				enabled:false
			},
			lang: {
			   descarga: "Descarga"
			},
			exporting:{
				buttons: {
					contextButton: {
						_titleKey: "descarga",
						menuItems: null,
						onclick: function () {
							this.exportChart();
						},
						symbol: 'url(images/download.png)',
					}
				},
				//enabled:false,
				url: 'http://sit.plansierra.org/sigma/js/exportToPNG.php'
			},
			legend: {
				align: 'right',
				verticalAlign: 'top',
				layout: 'vertical',
				x: 0,
				y: 20
			},
			series: [
				{name:"Isocrona 0-2'",
				color: "#2626FF",
				data: d.iso1},
				{name:"Isocrona 2-5'",
				color: "#FF8000",
				data: d.iso2},
				{name:"Isocrona 5-8'",
				color: "#FF00FF",
				data: d.iso3},
				{name:"Isocrona 8-12'",
				color: "#00B32D",
				data: d.iso4},
				{name:"Isocrona 12-20'",
				color: "#FFFF00",
				data: d.iso5},
				{name:"Residual",
				color: "#000000",
				data: d.resto},
				
			]
		 })
		 
		$("#seleccion").empty();
		var radioSet = $('<div id="radio">');
		radioSet.appendTo('#seleccion');
		var radioBtn = $('<input type="radio" id="euros" name="radio" checked="checked">');
		if(!euros)
			radioBtn = $('<input type="radio" id="euros" name="radio">');
		radioBtn.appendTo('#radio');
		var radioLbl = $('<label for="euros">Euros</label>');
		radioLbl.appendTo('#radio');
		
		var radioBtn = $('<input type="radio" id="porc" name="radio">');
		if(!euros)
			radioBtn = $('<input type="radio" id="porc" name="radio" checked="checked">');
		radioBtn.appendTo('#radio');
		var radioLbl = $('<label for="porc">% Cifra venta</label>');
		radioLbl.appendTo('#radio');
		
		$( "#radio" ).buttonset()
			.change(function( event ) {
				e = false;
				if(event.target.id == "euros")
					e = true;
				cargarGrafico2(e);
			});
	})
}
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
//--------------------------------------------------------------------
//
//
//
//AQUI escribe la informacion sacarda de pantalla en la ventada del este
//
//
//
//
//----------------------------------------------------------------
function verGrafico(data, event, coordenadas, idMuestra){
			
			//$('#tabs-1').empty();
			/*$('#tabs-2').empty();
			$('#tabs-3').empty();
			$('#tabs-4').empty();		
			$('#tabs-5').empty();
		
			$('#tabs-7').empty();
			$('#tabs-8').empty();
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
	$("#tabs-3").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	
	
	var row = $("<tr />")
	$("#tabs-3").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>  Parametro</th>"));
	row.append($("<th Width='150 px'> Valor</th>"));
	row.append($("<th Width=75 px'> Unidad</th>"));
	row.append($("<th Width='50 px'> Año</th>"));
	
	
	
	
	$.each(data5, function(index, value){
			
					var row = $("<tr />");
					$("#tabs-3").append(row);
					//this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Parametro+ "</td>"));
					row.append($("<td>" + value.Valor + "</td>"));
					row.append($("<td>" + value.Unidad + "</td>"));
					row.append($("<td>" + value.Ano + "</td>"));
		});
	var row = $("<tr />");
	$("#tabs-3").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	myLayout.open('east');			
			
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

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-64660106-1', 'auto');
  ga('send', 'pageview');
 
</script>