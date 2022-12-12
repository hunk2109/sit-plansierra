<script src="js/bootbox.js"></script>
<div class="pane ui-layout-center">
	<div id="loading">
	  <img id="loading-image" width=200 src="images/loading.gif" alt="Loading..." />
	</div>
	<div id="map" style="height:100%; margin-right:0px">
		<div id="navTool" class="div-navTool">
			<div id='butCoordenadas' title="Cambiar coordenadas"><img height=24 src="images/coordenadas.png"/></div>
			<div id='butInfoWMS' title="Información de las capas"><img height=24 src="images/info.png"/></div>
			<!--<div id='butInfo' title="Información sociodemográfica"><img height=24 src="images/people_color.png"/></div>-->
			<div id='butUnselect' title="Limpiar selección"><img height=24 src="images/people.png"/></div>
			<!--<div id='butResumenMes' title="Resumen mes"><img height=24 src="images/calendar.png"/></div>-->
		</div>
		<div id="coord" class="div-coordenadas"></div>
		
	</div>
</div>
<div class="pane ui-layout-north">
	<label>Seleccione Provincia</label>		
	<select id="provincia" name="provincia"></select>
	<label>Seleccione Municipio</label>
	<select id="municipio" name="municipio"></select>
	<label>Seleccione Rótulo</label>
	<select id="rotulo" name="rotulo"></select>
	<label>Seleccione Cod. Nielssen</label>
	<select id="nielssen" name="nielssen"></select>
</div>

<div class="pane ui-layout-west">
	<div>		
		<div id="layertree"  class="tree"></div>
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

<div id="resMesDialog" title="Resumen mes">
  <table id="m_ecom" class="infoTabla"></table><br>
	<label id="etiqueta">Acumulado fecha</label>
  <table id="m_ecomAnual" class="infoTabla"></table>
</div>

<script type="text/javascript">

var groupCapas, groupSociodemo;
var tools = {socio:false};
var cpSelected = [], nacionalidad = ["RESTO", "EUROPA", "ASIA", "AMERICA", "AFRICA"], edades = [{capa:"POB_6599", titulo:"Población > 65"}, {capa:"POB_2965", titulo:"Población 29-65"}, {capa:"POB_2029", titulo:"Población 20-29"}, {capa:"POB_1519", titulo:"Población 15-19"}, {capa:"POB_0514", titulo:"Población 5-14"},{capa:"POB_0005", titulo:"Población 0-5"}];
var competencia, cp_ecom, cp_ecom_seleccionar, ensenas, loc = null, idAlcampo, municipio;
var sel, selLayer;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"]];
var myLayout;
$(document).ready(function () {
	myLayout = $('#content').layout({
		west__size:	'23%',
		east__size:	'35%',
		south__size:'42%',
		east__initClosed: true, 
		onresize: function () {
			map.updateSize();//alert('whenever anything on layout is redrawn.') 
		}		
	});
	
	$( "#resMesDialog" ).dialog({
      autoOpen: false,
	  width: 400
    });
	
	$( "#butResumenMes" )
		.button()
		.click(function( event ) {
			fecha = $("#municipio").val();
			if(fecha == null || idAlcampo == null){
				$( "#resMesDialog" ).dialog( "open" );
				$("#etiqueta").text("Es necesario tener seleccionado un híper y una fecha");
				return null;
				
			}
				
			$( "#resMesDialog" ).dialog( "open" );
			$("#etiqueta").text("Acumulado fecha");
			$.get('index.php?r=TblEcom/InfoEcom&cp=-1&id_hiper='+idAlcampo+'&fecha='+fecha, function (data3){
				$("#m_ecom").empty();
				
				var row = $("<tr />")
				$("#m_ecom").append(row); 
				row.append($("<td>CV (€)</td>"));
				row.append($("<td>" + data3['cv'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
				
				var row = $("<tr />")
				$("#m_ecom").append(row); 
				row.append($("<td>% Progresión CV</td>"));
				row.append($("<td>" + data3['progresion_cv'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
				
				var row = $("<tr />")
				$("#m_ecom").append(row); 
				row.append($("<td>Participación CV(%)</td>"));
				row.append($("<td>"+data3['porcentaje_cv'].toLocaleString('de-DE', {maximumFractionDigits:1})+"</td>"));
				
				var row = $("<tr />")
				$("#m_ecom").append(row); 
				row.append($("<td>Nº Pedidos</td>"));
				row.append($("<td>" + data3['num_pedidos'].toLocaleString('de-DE', {maximumFractionDigits:2}) + "</td>"));
							
				var row = $("<tr />")
				$("#m_ecom").append(row); 
				row.append($("<td>% Progresión Pedidos</td>"));
				row.append($("<td>" + data3['progresion_pedidos'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
				
				var row = $("<tr />")
				$("#m_ecom").append(row); 
				row.append($("<td>Clientes totales</td>"));
				row.append($("<td>" + data3['clientes_unicos'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
				
				var row = $("<tr />")
				$("#m_ecom").append(row); 
				row.append($("<td>% Recogida</td>"));
				row.append($("<td>" + data3['p_recogida'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
				
				var row = $("<tr />")
				$("#m_ecom").append(row); 
				row.append($("<td>Diferencial recogida (p.p.)</td>"));
				row.append($("<td>" + data3['porc_recogida'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
				
				var row = $("<tr />")
				$("#m_ecom").append(row); 
				row.append($("<td>Caddy(€)</td>"));
				row.append($("<td>" + data3['caddy'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
				
				var row = $("<tr />")
				$("#m_ecom").append(row); 
				row.append($("<td>% Progresión caddy</td>"));
				row.append($("<td>" + data3['prog_caddy'].toLocaleString('de-DE', {maximumFractionDigits:2}) + "</td>"));
					
		 });
		 $.get('index.php?r=TblEcom/InfoEcomAcum&cp=-1&id_hiper='+idAlcampo+'&fecha='+fecha, function (data3){
			$("#m_ecomAnual").empty();

			var row = $("<tr />")
			$("#m_ecomAnual").append(row); 
			row.append($("<td>CV (€)</td>"));
			row.append($("<td>" + data3['cv'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
			
			var row = $("<tr />")
			$("#m_ecomAnual").append(row); 
			row.append($("<td>Participación CV(%)</td>"));
			row.append($("<td>" + data3['progresion_cv'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
			
			var row = $("<tr />")
			$("#m_ecomAnual").append(row); 
			row.append($("<td>% CV</td>"));
			row.append($("<td>"+data3['porcentaje_cv'].toLocaleString('de-DE', {maximumFractionDigits:2})+"</td>"));
			
			var row = $("<tr />")
			$("#m_ecomAnual").append(row); 
			row.append($("<td>Nº Pedidos</td>"));
			row.append($("<td>" + data3['num_pedidos'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
						
			var row = $("<tr />")
			$("#m_ecomAnual").append(row); 
			row.append($("<td>% Progresión Pedidos</td>"));
			row.append($("<td>" + data3['progresion_pedidos'].toLocaleString('de-DE', {maximumFractionDigits:2}) + "</td>"));					
			
			var row = $("<tr />")
			$("#m_ecomAnual").append(row); 
			row.append($("<td>% Recogida</td>"));
			row.append($("<td>" + data3['p_recogida'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
			
			var row = $("<tr />")
			$("#m_ecomAnual").append(row); 
			row.append($("<td>Diferencial recogida (p.p.)</td>"));
			row.append($("<td>" + data3['porc_recogida'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
			
			var row = $("<tr />")
			$("#m_ecomAnual").append(row); 
			row.append($("<td>Caddy(€)</td>"));
			row.append($("<td>" + data3['caddy'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
			
			var row = $("<tr />")
			$("#m_ecomAnual").append(row); 
			row.append($("<td>% Progresión caddy</td>"));
			row.append($("<td>" + data3['prog_caddy'].toLocaleString('de-DE', {maximumFractionDigits:2}) + "</td>"));					
			 });
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
	
	$( "#butCoordenadas" )
		.button()
		.click(function( event ) {
			$("#map").css({'cursor': 'url(images/flechaCoordenadas.png), default'});
			//$("#map").css({'cursor': 'url(https://cdn3.iconfinder.com/data/icons/bluecoral/Cursor.png), default'});
			//tools.socio = false;
			tools.coordenadas = true;
			tools.capa = false;
	});
	
	$( "#butInfoWMS" )
		.button()
		.click(function( event ) {
			$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			//$("#map").css({'cursor': 'url(https://cdn3.iconfinder.com/data/icons/bluecoral/Cursor.png), default'});
			tools.socio = false;
			tools.capa = true;
			tools.coordenadas = false;
	});
		
	$( "#butUnselect" )
		.button()
		.click(function( event ) {
			tools.socio = false;
			tools.coordenadas = false;
			$("#map").css({'cursor': 'default'});
			
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'Seleccion'){
					map.removeLayer(capas[i]);
				}
			}
		});
			
		$( "#tabs" ).tabs();
	
	$('#provincia').selectmenu({
		change: function( event, data ) {
			$( "#butUnselect" ).trigger('click');
			if($("#resMesDialog").is(':visible'))
				$( "#butResumenMes" ).trigger('click');
			provincia = data.item.value;			
			//cp_ecom.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigmaCompetencia.map&hiper="+idAlcampo);
			
			$('#municipio').empty();
			$('#rotulo').empty();
			$('#nielssen').empty();
			$.get('index.php?r=geoNielssen/getMunicipios&provincia='+provincia, function(data2){
				
				/*$.get('index.php?r=tblHiperAlcampo/getCoords&id='+provincia, function (d){
					map.getView().setCenter([parseFloat(d[0].x), parseFloat(d[0].y)]);
					map.getView().setZoom(10);
				});*/
				$('#municipio').append($('<option>', {
					value: 0,
					text: ''
				}));
				for(var i2 = 0; i2 < data2.length; i2++){
					var opt = $('<option/>', {
						value: data2[i2].municipio,
						text: data2[i2].municipio
					});
					
					//$('#zipCode').append(opt);
					opt.appendTo("#municipio");
				}
					municipio = $("#municipio").val();
					$("#municipio option:first").attr('selected','selected');
				 	$("#municipio").selectmenu("refresh");		
					$("#municipio").trigger("change");
									
			})
		}
	});
	
	$('#municipio').selectmenu({
		change: function( event, data ) {
			$( "#butUnselect" ).trigger('click');
			if($("#resMesDialog").is(':visible'))
				$( "#butResumenMes" ).trigger('click');
			municipio = data.item.value;
			$('#rotulo').empty();
			$('#nielssen').empty();
			$.get('index.php?r=geoNielssen/getRotulo&provincia='+provincia+'&municipio='+municipio, function(data2){

				$('#rotulo').append($('<option>', {
					value: 0,
					text: ''
				}));
				for(var i2 = 0; i2 < data2.length; i2++){
					var opt = $('<option/>', {
						value: data2[i2].id_rotulo,
						text: data2[i2].cadena
					});
					
					opt.appendTo("#rotulo");
				}
					rotulo = $("#rotulo").val();
					$("#rotulo option:first").attr('selected','selected');
				 	$("#rotulo").selectmenu("refresh");		
					$("#rotulo").trigger("change");
									
			})			
      }
	});
	
	$('#rotulo').selectmenu({
		change: function( event, data ) {
			$( "#butUnselect" ).trigger('click');
			if($("#resMesDialog").is(':visible'))
				$( "#butResumenMes" ).trigger('click');
			rotulo = data.item.value;
			$('#nielssen').empty();
			$.get('index.php?r=geoNielssen/getCodNielssen&provincia='+provincia+'&municipio='+municipio+'&rotulo='+rotulo, function(data2){
				
				$('#nielssen').append($('<option>', {
					value: 0,
					text: ''
				}));
				for(var i2 = 0; i2 < data2.length; i2++){
					var opt = $('<option/>', {
						value: data2[i2].codigo_nielssen,
						text: data2[i2].codigo_nielssen
					});
					
					opt.appendTo("#nielssen");
				}
					nielssen = $("#nielssen").val();
					$("#nielssen option:first").attr('selected','selected');
				 	$("#nielssen").selectmenu("refresh");		
					$("#nielssen").trigger("change");
			})			
		}
	});
	
	$('#nielssen').selectmenu({
		change: function( event, data ) {
			$( "#butUnselect" ).trigger('click');
			if($("#resMesDialog").is(':visible'))
				$( "#butResumenMes" ).trigger('click');
			nielssen = data.item.value;	
			//nielssen = $("#nielssen").val();				
			$.get('index.php?r=geoNielssen/getCoords&nielssen='+nielssen, function (d){
				map.getView().setCenter([parseFloat(d[0].x), parseFloat(d[0].y)]);
				map.getView().setZoom(18);
			});
			
		}
	});
	
	//RELLENAR COMBO DE PROVINCIAS
	$.get('index.php?r=geoNielssen/getProvincias', function(data){
		$('#provincia').append($('<option>', {
				value: 0,
				text: ''
			}));
		for(var i = 0; i < data.length; i++){
			$('#provincia').append($('<option>', {
				value: data[i].provincia,
				text: data[i].provincia
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
		id: 'wms_ign',
		name: "Mapa carreteras",
		visible:false, 
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
		visible:true, 
		//url: 'images/ignbase_todo.png',
		source: new ol.source.TileWMS({
			url: 'http://www.ign.es/wms-inspire/pnoa-ma?',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'OI.OrthoimageCoverage', 'SRS': 25830, viewparams: "par:data;par:data" }
			})
	})

	layers.push(pnoa);	
	
	var cod_postal = new ol.layer.Image({
		
		id:'cod_postal',
		name: "Códigos postales",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigmaCompetencia.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cod_postal_layer',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigmaCompetencia.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'cod_postal_layer', 'SRS': 25830 }
			})
	})

	layers.push(cod_postal);
	
	var municipios = new ol.layer.Image({
		
		id:'municipios',
		name: "Municipios",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigmaCompetencia.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=municipios',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigmaCompetencia.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'municipios', 'SRS': 25830 }
			})
	})

	layers.push(municipios);
	
	cp_ecom = new ol.layer.Image({
		//extent: extent,
		id: 'cp_ecom',
		name: "Códigos postales e-com",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cp_ecom',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'cp_ecom', 'SRS': "EPSG:25830" }
		})
	})
	
	cp_ecom_seleccionar = new ol.layer.Image({
		//extent: extent,
		id: 'cp_ecom_seleccionar',
		name: "Códigos postales e-com",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cp_ecom',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'cp_ecom_seleccionar', 'SRS': "EPSG:25830" }
		})
	})
	
	layers.push(cp_ecom);
	
	
	
	
	//COMPETENCIA
	var competencia=[];
	$.each(comp, function(index, element){
		var visi = true;
		//if(element[0]<6 )
		//	visi = false;
		layer = new ol.layer.Tile({
			//extent: extent,
			id: 'ensenas'+element[0],
			name: element[1],
			visible: visi, 
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigmaCompetencia.map&tipo='+element[0],
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
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/sigma/images/logos2/'+element.etiqueta+'.png',
				visible: visi, 
				source: new ol.source.TileWMS({
					url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigmaCompetencia.map&etiqueta='+element.id,
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
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigmaCompetencia.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Ensenas',
		source: new ol.source.TileWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigmaCompetencia.map',
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
			var url = cp_ecom_seleccionar.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution(), map.getView().getProjection(),{'INFO_FORMAT': 'text/plain'});
			$.get(url, function (data){
			   var f = data.split('Feature ');
			   cod = f[1].replace(/(\r\n|\n|\r|\:|\s)/gm,"");
			   if(cod.length == 4)
				   cod = "0"+cod;
			   cpSelected.push("'"+cod+"'");
					selLayer = new ol.layer.Image({
						//extent: extent,
						id: 'sel',
						name: "Seleccion",
						source: new ol.source.ImageWMS({
						url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigmaCompetencia.map&cp='+cod,
						crossorigin: 'anonymous',
							params: {'LAYERS': 'cp_ecom_select', 'SRS': "EPSG:25830" }
						})
					})
					
					map.addLayer(selLayer);
			   
		   })
		}
		if(tools.coordenadas){			
			var coord = evt.coordinate;
			nielssen = $("#nielssen").val();			
			if (nielssen != null) {
				bootbox.confirm("¿Desea guardar las nuevas coordenadas del código nielssen "+nielssen+"?", function(result) {
					if (result == true) {                                             
						$.get('index.php?r=geoNielssen/actualizarCoordenada&coord='+coord+'&nielssen='+nielssen, function(data){
							bootbox.alert(data, function() {});										
							var zoomActual = map.getView().getZoom();
							map.getView().setZoom(zoomActual+1);
						})
					}
				});
			}else{				
				bootbox.alert("Seleccione previamente un código nielssen.", function() {});
			}
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
	$("li.parent_li").find("[data-layerid='Competencia']").next().hide('fast');
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