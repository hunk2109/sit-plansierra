<div class="pane ui-layout-center">
	<div id="loading">
	  <img id="loading-image" width=200 src="images/loading.gif" alt="Loading..." />
	</div>

	<div id="map" style="height:100%; margin-right=0px">
		<div id="navTool" class="div-navTool">
			<div id='butSelZP' title="Seleccionar zona principal"><img height=24 src="images/people_principal.png"/></div>
			<div id='butSelZS' title="Seleccionar zona secundaria"><img height=24 src="images/people_secundaria.png"/></div>
			<div id='butSelZR' title="Seleccionar zona resto"><img height=24 src="images/people_resto.png"/></div>
			<div id='butInfoWMS' title="Información de las capas"><img height=24 src="images/info.png"/></div>
			<div id='butInfo' title="Información sociodemográfica"><img height=24 src="images/people_color.png"/></div>
			<div id='butUnselect' title="Limpiar selección"><img height=24 src="images/people.png"/></div>
		</div>
		<div id="coord" class="div-coordenadas"></div>
		
	</div>
</div>
<!--div class="pane ui-layout-north">North</div-->
<div class="pane ui-layout-south">
	<div style="width: 50%; height: 100%; float:left" id="grafico1"></div>
	<div style="width: 50%; height: 100%; float:right" id="grafico2"></div>
	
</div>
<div class="pane ui-layout-west">
	<div>
		<label>Seleccione hiper Alcampo</label>
		<br/>
		<select id="hiperAlcampo" name="hiperAlcampo"></select>
		<br/>
		<label>Seleccione Año</label>
		<br/>
		<select id="idEncuesta" name="idEncuesta"></select>
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
					<li><a href="#tabs-1">Zonas de influencia</a></li>
					<li><a href="#tabs-2">Sociodemográfia</a></li>					
					<li><a href="#tabs-3">Competencia</a></li>
				  </ul>
				  <div id="tabs-1">
					<table id="infoCV" class="infoTabla"></table>
					<div id="infoClientes"></div>
				  </div>
				  <div id="tabs-2">
					<div id="infoEdad"></div>
					<div id="infoExtr"></div>
				  </div>				  
				  <div id="tabs-3">
					<table id="infoCompeEns" class="infoTabla"></table><br><br>
					<table id="infoCompeSup" class="infoTabla"></table>
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


<script type="text/javascript">

var groupCapas, groupSociodemo;
var tools = {socio:false};
var cpSelected = [], nacionalidad = ["RESTO", "EUROPA", "ASIA", "AMERICA", "AFRICA"], edades = [{capa:"POB_6599", titulo:"Población > 65"}, {capa:"POB_2965", titulo:"Población 29-65"}, {capa:"POB_2029", titulo:"Población 20-29"}, {capa:"POB_1519", titulo:"Población 15-19"}, {capa:"POB_0514", titulo:"Población 5-14"},{capa:"POB_0005", titulo:"Población 0-5"}];
var zi, principales, c_totales, ensenas, loc = null, idAlcampo, idEncuesta;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
var myLayout;
var infoCV;
var totalPoblacion = 0;	
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
	});
		
	$( "#tabs" ).tabs();
	
	$( "#butInfoWMS" )
		.button()
		.click(function( event ) {
			$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			//$("#map").css({'cursor': 'url(https://cdn3.iconfinder.com/data/icons/bluecoral/Cursor.png), default'});
			tools.socio = false;
			tools.capa = true;
	});
	
	$( "#butSelZP" )
		.button()
		.click(function( event ) {
			$.get("index.php?r=TblZonaInfluencia/getByZone&idAlcampo="+idAlcampo+"&zone=1", function(data){
				for(var loc in data){
					var cod = data[loc].loc;
					cpSelected.push("'"+cod+"'");
					loc = new ol.layer.Image({
						//extent: extent,
						name: "LOC",
						source: new ol.source.ImageWMS({
						url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&loc='+cod,
						crossorigin: 'anonymous',
							params: {'LAYERS': 'loc', 'SRS': "EPSG:25830"}
						})
					})
					map.addLayer(loc);
			   infoCP();
				}
			});
	});
	
	$( "#butSelZS" )
		.button()
		.click(function( event ) {
			$.get("index.php?r=TblZonaInfluencia/getByZone&idAlcampo="+idAlcampo+"&zone=2", function(data){
				for(var loc in data){
					var cod = data[loc].loc;
					cpSelected.push("'"+cod+"'");
					loc = new ol.layer.Image({
						//extent: extent,
						name: "LOC",
						source: new ol.source.ImageWMS({
						url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&loc='+cod,
						crossorigin: 'anonymous',
							params: {'LAYERS': 'loc', 'SRS': "EPSG:25830"}
						})
					})
					map.addLayer(loc);
			   infoCP();
				}
			});
	});
	
	$( "#butSelZR" )
		.button()
		.click(function( event ) {
			$.get("index.php?r=TblZonaInfluencia/getByZone&idAlcampo="+idAlcampo+"&zone=3", function(data){
				for(var loc in data){
					var cod = data[loc].loc;
					cpSelected.push("'"+cod+"'");
					loc = new ol.layer.Image({
						//extent: extent,
						name: "LOC",
						source: new ol.source.ImageWMS({
						url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&loc='+cod,
						crossorigin: 'anonymous',
							params: {'LAYERS': 'loc', 'SRS': "EPSG:25830"}
						})
					})
					map.addLayer(loc);
			   infoCP();
				}
			});
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
			$("#infoClientes").empty();
			$("#infoCompeEns").empty();
			$("#infoCompeSup").empty();
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'LOC'){
					map.removeLayer(capas[i]);
				}
			}
		});
			
		$( "#tabs" ).tabs();
	
	$('#hiperAlcampo').selectmenu({
		change: function( event, data ) {
			$( "#butUnselect" ).trigger('click');
			idAlcampo = data.item.value;
			$('#grafico1').empty();
			$('#grafico2').empty();
			$('#idEncuesta').empty();
			$.get('index.php?r=tblIdEncuesta/getAll&id='+idAlcampo, function(data2){
				
				$.get('index.php?r=geoZonaInfluencia/getExtent&id='+data2[0].id_encuesta, function (d){
					map.getView().setCenter([parseFloat(d[0].st_x), parseFloat(d[0].st_y)]);
					map.getView().setZoom(10);
				});
				$('#grafico1').empty();
				cargarGrafico1(data2[0].id_encuesta);
				//cargarGrafico2();
				for(var i2 = 0; i2 < data2.length; i2++){
					var opt = $('<option/>', {
						value: data2[i2].id_encuesta,
						text: data2[i2].fecha_encuesta
					});
					
					//$('#zipCode').append(opt);
					opt.appendTo("#idEncuesta");
				}
					idEncuesta = $("#idEncuesta").val();
					$("#idEncuesta option:first").attr('selected','selected');
				 	$("#idEncuesta").selectmenu("refresh");		
					$("#idEncuesta").trigger("change");
				zi.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&hiper="+idAlcampo);
				//principales.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&id_encuesta="+idEncuesta);
				//c_totales.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&id_encuesta="+idEncuesta);
									
			})
      }
	});
	
	$('#idEncuesta').selectmenu({
		change: function( event, data ) {
			$( "#butUnselect" ).trigger('click');
			idEncuesta = data.item.value;
			$('#grafico1').empty();
			cargarGrafico1(idEncuesta);
			zi.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&hiper="+idAlcampo);
			//principales.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&id_encuesta="+idEncuesta);
			//c_totales.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&id_encuesta="+idEncuesta);
			
      }
	});
	
	//RELLENAR COMBO DE HIPER ALCAMPO
	$.get('index.php?r=tblHiperAlcampo/getHiperAlcampo', function(data){
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
	
	//CARGAR MAPA
	var projection = new ol.proj.Projection({
	  code: 'EPSG:25830',
	  // The extent is used to determine zoom level 0. Recommended values for a
	  // projection's validity extent can be found at http://epsg.io/.
	  //extent: [485869.5728, 76443.1884, 837076.5648, 299941.7864],
	  units: 'm'
	});
	
	ol.proj.addProjection(projection);
	var layers = [];
	
	var ign = new ol.layer.Tile({
		//extent: extent,
		id:'wms_ign',
		name: "Mapa carreteras",
		url: 'images/ignbase_todo.png',
		source: new ol.source.TileWMS({
			url: 'http://www.ign.es/wms-inspire/ign-base?',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'IGNBaseTodo', 'SRS': 25830, viewparams: "par:data;par:data" }
			})
	})

	layers.push(ign);
	
	var pnoa = new ol.layer.Tile({
		//extent: extent,
		id:'wms_pnoa',
		name: "Mapa satélite",
		visible:false, 
		//url: 'images/ignbase_todo.png',
		source: new ol.source.TileWMS({
			url: 'http://www.ign.es/wms-inspire/pnoa-ma?',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'OI.OrthoimageCoverage', 'SRS': 25830, viewparams: "par:data;par:data" }
			})
	})

	layers.push(pnoa);
	
	var cod_postal = new ol.layer.Image({
		//extent: extent,
		id:'cod_postal',
		name: "Códigos postales",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cod_postal_layer',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'cod_postal_layer', 'SRS': 25830 }
			})
	})

	layers.push(cod_postal);
	
	var municipios = new ol.layer.Image({
		//extent: extent,
		id:'municipios',
		name: "Municipios",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=municipios',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'municipios', 'SRS': 25830 }
			})
	})

	layers.push(municipios);
	
	
	
	//CAPAS SOCIO-DEMOGRÁFICAS
	/*var pob = [];
	
	$.each(nacionalidad, function(index, value){
		layer = new ol.layer.Tile({
			//extent: extent,
			id: 'nacionalidad'+index,
			name: value,
			visible: false,
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=' + value,
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map',
				crossorigin: 'anonymous',
					params: {'LAYERS': value, 'SRS': "EPSG:25830" }
				})
		})
	
		pob.push(layer);
	})
	var edad = [];
	
	$.each(edades, function(index, value){
		layer = new ol.layer.Tile({
			//extent: extent,
			id: value.capa,
			name: value.titulo,
			visible: false,
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=' + value.capa,
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map',
				crossorigin: 'anonymous',
					params: {'LAYERS': value.capa, 'SRS': "EPSG:25830" }
				})
		})
	
		edad.push(layer);
	})
	poblacion = new ol.layer.Tile({
		//extent: extent,
		id: 'poblacion',
		name: "POBLACION",
		visible: false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=POBLACION',
		source: new ol.source.TileWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'POBLACION', 'SRS': "EPSG:25830"}
			})
	})
	
	//pob.push(poblacion);
	
	nacion = new ol.layer.Group({
		id:'nacionalidad',
		name: 'Nacionalidad',
		layers: pob
	});
	
	ed = new ol.layer.Group({
		id:'edad',
		name: 'Edad',
		layers: edad
	});
	
	groupSociodemo = new ol.layer.Group({
		id:'sociodemografia',
		name: 'Sociodemografía',
		layers: [ed, nacion, poblacion]
	});
	layers.push(groupSociodemo);
	*/
	//---------------------------------------------------
	
	
	
	zi = new ol.layer.Image({
		//extent: extent,
		id: 'zi',
		name: "ZONAS DE INFLUENCIA",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ZONAS_INFLUENCIA',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ZONAS_INFLUENCIA', 'SRS': "EPSG:25830" }
		})
	})
	
	/*principales = new ol.layer.Image({
		//extent: extent,
		id: 'principales',
		name: "Clientes principales",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=CLIENTES_PRINCIPALES',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&zc=1',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'CLIENTES_PRINCIPALES', 'SRS': "EPSG:25830" }
			})
	})
	
	c_totales = new ol.layer.Image({
		//extent: extent,
		id: 'c_totales',
		name: "Clientes totales",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=CLIENTES_TOTALES',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&zc=1',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'CLIENTES_TOTALES', 'SRS': "EPSG:25830" }
			})
	})*/
	
	
	groupCapas = new ol.layer.Group({
		id:'zonasInfluencia',
		name: 'Capas ZONAS DE INFLUENCIA',
		layers: [zi]
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
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&tipo='+element[0],
				crossorigin: 'anonymous',
					params: {'LAYERS': 'COMPETENCIA_1', 'SRS': 25830 }
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
				visible: visi,
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/sigma/images/logos2/'+element.etiqueta +'.png',
				source: new ol.source.TileWMS({
					url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&etiqueta='+element.id,
					crossorigin: 'anonymous',
						params: {'LAYERS': 'COMPETENCIA_2', 'SRS': 25830 }
					})
			})
			
			ensenas.push(layer);
		});
		
		
	}});
	groupEnsena = new ol.layer.Group({
		id:'ensenas',
		name: 'Enseñas',
		layers: ensenas
	});
		//layers.push(groupEnsena);
	
	
	
	groupCompe = new ol.layer.Group({
		id:'competencia',
		name: 'Competencia',
		layers: [groupEnsena, tamano]
	});
	layers.push(groupCompe);
	
	
	//---------------------------------------
	
	/*ensenas = new ol.layer.Tile({
		//extent: extent,
		id: 'ensenas',
		name: "Enseñas",
		visible: false, 
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Ensenas',
		source: new ol.source.TileWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'Ensenas', 'SRS': 25830 }
			})
	})
	
	layers.push(ensenas);*/
	
	
	map = new ol.Map({
		target: 'map',
		layers: layers,
		logo:'images/flechas.png',
		view: new ol.View({
		  projection: projection,
		  center: [433041, 4477982],
		  zoom: 7
		})
	});
	map.getLayerGroup().set('name', 'Capas');
	
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
	
	
	map.on('pointermove', function(event) {
		var coord = event.coordinate;
		$('#coord').html(ol.coordinate.toStringXY(coord, 2) + "<br> ETRS89 Zona 30");
	});
	map.on('singleclick', function(evt) {
		if(tools.socio){
			var url = zi.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution(), map.getView().getProjection(),
                        {
							'INFO_FORMAT': 'text/plain'
                        }
                    );
			$.get(url, function (data){
			   var f = data.split('Feature ');
			   cod = f[1].replace(/(\r\n|\n|\r|\:|\s)/gm,"");
			   if(cod.length == 6)
				   cod = '0'+cod;
			   cpSelected.push("'"+cod+"'");
					loc = new ol.layer.Image({
						//extent: extent,
						name: "LOC",
						source: new ol.source.ImageWMS({
						url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&loc='+cod,
						crossorigin: 'anonymous',
							params: {'LAYERS': 'loc', 'SRS': "EPSG:25830"}
						})
					})
					map.addLayer(loc);
			   infoCP();
		   })
		}
		if(tools.capa){
			visibles = [];
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
				source: /** @type {ol.Coordinate} */ (map.getView().getCenter())
			 });
			 map.beforeRender(pan);
			 map.getView().setCenter(evt.coordinate);
			  
			  
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
	$.get('index.php?r=GeoSecciones/infoZI&id=' + cpSelected.toString(), function (data3){	
	totalPoblacion = 0;	
	$('#infoEdad').empty();
	 categorias = [];
	 datos = [];
	 $.each(data3.poblacion[0], function(index, element){
		 categorias.push(index);
		 datos.push(parseFloat(element));
		 totalPoblacion += parseFloat(element);
	 })
	 Highcharts.setOptions({
					global: {
						useUTC: false,
						
					},
					lang: {
					  decimalPoint: ',',
					  thousandsSep: '.'
					}
				});
	 $('#infoEdad').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: 0,
			plotShadow: false,
			//height: 300,
			//width: 300
		},
		title: {
			//text: 'Población ('+totalPoblacion.toFixed(0)+' hab.)',
			text: 'Población ('+totalPoblacion.toLocaleString('es-ES', {maximumFractionDigits:0})+' hab.)',
			align: 'center',
			//verticalAlign: 'middle',
			//y: 50
		},
		legend:{
			enabled:false
		},
		credits:{enabled:false},
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
		tooltip: {
			pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
		},
		xAxis: {
			title: 'Población',
			categories: categorias,
			labels: {
				rotation: -45,
				style: {
					fontSize: '8px',
					fontFamily: 'Verdana, sans-serif'
				}
			}
		},
		series: [{
			type: 'column',
			name: 'Población',
			//innerSize: '50%',
			color:'#B168F0',
			data: datos,
			dataLabels: {
                enabled: true,
                color: '#8C008C',
                align: 'center',
                format: '{point.y:.0f}', 
                style: {
                    fontSize: '10px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
		}]
	});
	
})
$.get('index.php?r=tblExtranjeros/getExtranjerosZI&loc=' + cpSelected.toString(), function (data2){
  myLayout.open('east');
   $('#infoExtr').empty();
	
   var datos = [];
  $k = 0;
  var resto = data2.total;
  $.each(data2.datos, function(index, value){
	  if($k == 10)
		  return false;
	  datos.push([index, value]);
	  resto = resto - value;
	  $k++;
  });
  datos.push(["Resto", resto]);
   $('#infoExtr').empty();
	Highcharts.setOptions({
					global: {
						useUTC: false,
						
					},
					lang: {
					  decimalPoint: ',',
					  thousandsSep: '.'
					}
				});
   $('#infoExtr').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			//width: 300,
			type: 'pie'
		},
		title:{text:''},
		subtitle: {
			//text: 'Extranjeros por procedencia (Total: ' + data2.total.toFixed(0) + ' hab. -> ' +(data2.total*100/totalPoblacion).toFixed(0)+' %)' 
			text: 'Extranjeros por procedencia (Total: ' + data2.total.toFixed(0) + ' hab. -> ' +(data2.totalSeleccion.toFixed(0))+' %)'
		},
		credits:{enabled:false},
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
		tooltip: {
			pointFormat: '<b>{point.percentage:.0f}%</b>'
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
			colors:['#40503F', '#0E42BC', '#D267C8', '#359FB5', '#C35265', '#F2CB71', '#7051BA', '#32A47A', '#86295D', '#3EA10C', '#5298CD', '#CD5298'],
			name: 'Nacionalidad',
			data: datos
		}]
	});
})
$.get('index.php?r=geoCp/getCompeZI&cp='+ cpSelected.toString()+'&cod_zipcode=' + idEncuesta, function (data3){
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
$.get('index.php?r=geoCp/getCompeSupZI&cp='+ cpSelected.toString()+'&cod_zipcode=' + idEncuesta, function (data3){
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
 
$.get('index.php?r=tblEncuestaInfluencia/getClientes&idEncuesta='+idEncuesta+'&loc='+cpSelected.toString(), function(data){
	 var prevData = getPrevYearLoc(idEncuesta);
	 var categorias = [];
	 var totales = [];
	 var totales2 = [];
	 var principales = [];
	 var linea = [];
	 $.each(data, function(index, valor){
		 categorias.push(index);
		 totales.push(valor.totales);
		 principales.push(valor.principales);
		 totales2.push(valor.totales-valor.principales);
		 if(prevData != "sin datos"){
			 $.each(prevData, function (i, v){
				if(i==index){
					linea.push(v.principales);
				}					
			 })
		 }
	 })
	 Highcharts.setOptions({
					global: {
						useUTC: false,
						
					},
					lang: {
					  decimalPoint: ',',
					  thousandsSep: '.'
					}
				});
	 $('#infoClientes').highcharts({
		chart: {
			type: 'column',
			//width: '100%'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: 'Clientes principales y totales por establecimiento'
		},
		xAxis: {
			categories: categorias,
			labels: {
                rotation: -45,
                style: {
                    fontSize: '9px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
		},
		credits:{enabled:false},
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
		yAxis: {
			min: 0,
			title: {
				text: ''
			}
		},
		plotOptions: {
			column: {
				stacking: 'normal'
			}
		},
		series: [{
			name: 'Totales',
			color: '#CC0066',
			tooltip: {
				pointFormat:' <span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.total:.1f} %</b><br/>'
			},
			data:totales2
		}, {
			name: 'Principales',
			color: '#00CC00',
			tooltip: {
				pointFormat:' <span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.1f} %</b><br/>'
			},
			events: {
				legendItemClick: function(){
					return false;
				}
			},
			data: principales
		}, {
			name: 'Totales año anterior',
			type: 'spline',
			color: '#000000',
			dashStyle: 'Dash',
			marker: {
				radius: 3
			},
			data: linea,
			tooltip: {
				pointFormat:' <span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.1f} %</b><br/>'
			}
		}]
	});
	 /*cargarGrafico2();
	 */
 })

}
function getPrevYearLoc(id) {
    return $.ajax({
        type: "GET",
        url: 'index.php?r=tblEncuestaInfluencia/ClientesPrincPrevio&idEncuesta='+id+'&loc='+cpSelected.toString(),
        async: false
    }).responseJSON;
}
function getPrevYear(id) {
    return $.ajax({
        type: "GET",
        url: 'index.php?r=tblEncuestaInfluencia/ClientesPrincPrevio&idEncuesta='+id,
        async: false
    }).responseJSON;
}
function cargarGrafico1(id){
	 $.get('index.php?r=tblEncuestaInfluencia/getClientes&idEncuesta='+id, function(data){
		 var prevData = getPrevYear(id);
		 infoCV = data;
		 var categorias = [];
		 var totales = [];
		 var principales = [];
		 var totales2 = [];
		 var linea = [];
		 $.each(data, function(index, valor){
			 categorias.push(index);
			 totales.push(valor.totales);
			 principales.push(valor.principales);
			 totales2.push(valor.totales-valor.principales);
			 if(prevData != "sin datos"){
				 $.each(prevData, function (i, v){
					if(i==index){
						linea.push(v.principales);
					}					
				 })
			 }
		 })
		 Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		 $('#grafico1').highcharts({
			chart: {
				type: 'column',
				height: 300
			},
			title: {
				text: ''
			},
			subtitle: {
				text: 'Clientes principales y totales por establecimiento'
			},
			xAxis: {
				categories: categorias,
				labels: {
					rotation: -45,
					style: {
						fontSize: '8px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},
			credits:{enabled:false},
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
			plotOptions: {
				column: {
					stacking: 'normal'
				}
			},			
			yAxis: {
				min: 0,
				title: {
					text: 'Hogares (%)'
				}
			},
			legend: {
				align: 'right',
				x: -30,
				verticalAlign: 'top',
				y: 25,
				floating: true,
				backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
				borderColor: '#CCC',
				borderWidth: 1,
				shadow: false
			},
			series: [{
				name: 'Totales',
				color: '#B30000',
				data:totales2,
				tooltip: {
					pointFormat:' <span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.total:.1f} %</b><br/>'
				}
			}, {
				name: 'Principales',
				color: '#FF9999',
				events: {
					legendItemClick: function(){
						return false;
					}
				},
				data: principales,
				tooltip: {
					pointFormat:' <span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.1f} %</b><br/>'
				}
			}, {
				name: 'Totales año anterior',
				type: 'spline',
				color: '#000000',
				dashStyle: 'Dash',
				marker: {
					radius: 3
				},
				data: linea,
				tooltip: {
					pointFormat:' <span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.1f} %</b><br/>'
				}
			}]
		});
		 cargarGrafico2();
		 $('#grafico2').empty();
	 })
	 
}


function cargarGrafico2(){
	
	$.get('index.php?r=TblEncuestaInfluencia/Evolucion&idEncuesta='+idEncuesta, function(d){
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
				text:''
			},
			subtitle: {
				text: 'Evolución clientes principales'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.y:.1f} </b>'
			},
			xAxis: {
				/*type: 'datetime',
				minRange: 360 * 24 * 3600000 // fourteen days*/
				categories: d.categorias
			},
			yAxis: {
				title: {
					text: 'Clientes principales (%)'
				}
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
			credits:{enabled:false},
			legend: {
				/*enabled:false,
				align: 'right',
				verticalAlign: 'top',
				layout: 'vertical',
				x: 0,
				y: 0*/
			},
			series: d.datos
		 })
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
