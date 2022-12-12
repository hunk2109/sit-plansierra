<div class="pane ui-layout-center">
	<div id="loading">
	  <img id="loading-image" width=200 src="images/loading.gif" alt="Loading..." />
	</div>

	<div id="map" style="height:100%; margin-right=0px">
		<div id="navTool" class="div-navTool">
			<div id='butInfoWMS' title="Información de las capas"><img height=24 src="images/info.png"/></div>
			<div id='butInfo' title="Información sociodemográfica"><img height=24 src="images/people_color.png"/></div>
			<div id='butUnselect' title="Limpiar selección"><img height=24 src="images/people.png"/></div>
		</div>
		<div id="coord" class="div-coordenadas"></div>
		
	</div>
</div>
<!--div class="pane ui-layout-north">North</div-->
<div class="pane ui-layout-south">
	<div class="row">
		<div class="col-md-6" id="grafico1"></div>
		<div class="col-md-3" id="grafico3"></div>
		<div class="col-md-3" id="grafico2"></div>
	</div>
	<!--<div style="width: 50%; height: 100%; float:right" >
		<div id="seleccion" style="height: 15%"></div>
		<div id="grafico2" style ="height:85%"></div>
	</div>-->
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
						<li><a href="#tabs-1">Clientes y Registros</a></li>
						<li><a href="#tabs-2">Sociodemografía</a></li>						
						<li><a href="#tabs-3">Competencia</a></li>
					</ul>
					
					<div id="tabs-1">
						<p id="infoLateral"></p>
						<p id="infoLateral2" style="display:none;"></p>
						
						<h3>Clientes</h3>									
						<table id="clientes" class="infoTabla"></table><br/>
						<hr>
						<div id="infoEdadClientes"></div>						
						<hr>
						
						<h3>Registros</h3>
						<table id="registros" class="infoTabla"></table><br/>
						<hr>
						<div id="grafico2CP" style ="height:85%"></div>
						<hr>
						<div id="grafico3CP" style ="height:85%"></div>
						<hr>
						
						<!-- ----------------------------------------------- -->
						
						<h3><b><u><center>ACUMULADO AÑO</center></u></b></h3>
						<h3>Clientes</h3>
						<table id="clientesAnual" class="infoTabla"></table>
						<hr>
						<div id="infoEdadClientesAcum"></div>						
						<hr>
						
						<h3>Registros</h3>
						<table id="registrosAnual" class="infoTabla"></table>
						<hr>
						<div id="grafico2CPAcum" style ="height:85%"></div>
						<!--<hr>
						<div id="grafico3CPAcum" style ="height:85%"></div>-->
					</div>
					
					<div id="tabs-2">
						<div id="infoEdad"></div>
						<div id="infoExtr"></div>
					</div>
					
					<div id="tabs-3">
						<table id="infoCompeEns" class="infoTabla"></table><br/>
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
	var totalPoblacion = 0;
	var cpSelected = [], nacionalidad = ["RESTO", "EUROPA", "ASIA", "AMERICA", "AFRICA"], edades = [{capa:"POB_6599", titulo:"Población > 65"}, {capa:"POB_2965", titulo:"Población 29-65"}, {capa:"POB_2029", titulo:"Población 20-29"}, {capa:"POB_1519", titulo:"Población 15-19"}, {capa:"POB_0514", titulo:"Población 5-14"},{capa:"POB_0005", titulo:"Población 0-5"}];
	var cp_clientes, cp_clientes_seleccionar, ensenas, loc = null, idAlcampo, idEncuesta;
	var sel, selLayer;
	var comp = [[7,"Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
	var myLayout;
	var infoClientes;

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
			
		$( "#butUnselect" )
			.button()
			.click(function( event ) {
				tools.socio = false;
				$("#map").css({'cursor': 'default'});
				cpSelected = [];
				$("#infoLateral").empty();
				$("#infoEdad").empty();
				$("#infoExtr").empty();
				$("#clientes").empty();
				$("#clientesAnual").empty();
				$("#infoEdadClientes").empty();
				$("#infoEdadClientesAcum").empty();
				$("#registros").empty();
				$("#registrosAnual").empty();
				$("#grafico2CP").empty();
				$("#grafico3CP").empty();
				$("#grafico2CPAcum").empty();
				//$("#grafico3CPAcum").empty();
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
				
			$( "#tabs" ).tabs();
		
		$('#hiperAlcampo').selectmenu({
			change: function( event, data ) {
				$( "#butUnselect" ).trigger('click');
				idAlcampo = data.item.value;
				
				cp_clientes.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
				
				$('#idEncuesta').empty();
				$.get('index.php?r=TblClClientes/GetPeriodos&id_hiper='+idAlcampo, function(data2){
					
					$.get('index.php?r=tblHiperAlcampo/getCoords&epsg=3857&id='+idAlcampo, function (d){
						map.getView().setCenter([parseFloat(d[0].x), parseFloat(d[0].y)]);
						map.getView().setZoom(10.8);
					});
					//cargarGrafico1(idAlcampo, );
					//cargarGrafico2(false);
					for(var i2 = 0; i2 < data2.length; i2++){
						var opt = $('<option/>', {
							value: data2[i2].id,
							text: data2[i2].fecha
						});
						
						//$('#zipCode').append(opt);
						opt.appendTo("#idEncuesta");
					}
						idEncuesta = $("#idEncuesta").val();
						//cp = cpSelected.toString();
						$("#idEncuesta option:first").attr('selected','selected');
						$("#idEncuesta").selectmenu("refresh");		
						$("#idEncuesta").trigger("change");
						cargarGrafico1(idAlcampo, idEncuesta);
						cargarGrafico3(idAlcampo, idEncuesta);
						cargarGrafico2(idAlcampo, idEncuesta);
										
				})
		  }
		});
		
		$('#idEncuesta').selectmenu({
			change: function( event, data ) {
				$( "#butUnselect" ).trigger('click');
				idEncuesta = data.item.value;
				cargarGrafico1(idAlcampo, idEncuesta);
				cargarGrafico3(idAlcampo, idEncuesta);
				cargarGrafico2(idAlcampo, idEncuesta);
				
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
		  code: 'EPSG:3857',
		  // The extent is used to determine zoom level 0. Recommended values for a
		  // projection's validity extent can be found at http://epsg.io/.
		  //extent: [485869.5728, 76443.1884, 837076.5648, 299941.7864],
		  units: 'm'
		});
		
		ol.proj.addProjection(projection);
		var layers = [];
		/*
		var ign = new ol.layer.Tile({
			//extent: extent,
			id: 'wms_ign',
			name: "Mapa carreteras",
			url: 'images/ignbase_todo.png',
			source: new ol.source.TileWMS({
				url: 'http://www.ign.es/wms-inspire/ign-base?',
				crossorigin: 'anonymous',
					params: {'LAYERS': 'IGNBaseTodo', 'SRS': 3857, viewparams: "par:data;par:data" }
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
					params: {'LAYERS': 'OI.OrthoimageCoverage', 'SRS': 3857, viewparams: "par:data;par:data" }
				})
		})

		layers.push(pnoa);		
		*/
		
		var google = new ol.layer.Tile({
            source: new ol.source.XYZ({
              url: 'https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}'
            }),
			opacity: 0.8
          });
		layers.push(google);
	
	
		var cod_postal = new ol.layer.Image({
			//extent: extent,
			id:'cod_postal',
			name: "Códigos postales",
			visible:false,
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cod_postal_layer',
			source: new ol.source.ImageWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
				crossorigin: 'anonymous',
					params: {'LAYERS': 'cod_postal_layer', 'SRS': 3857 }
				})
		})

		layers.push(cod_postal);
		
		var municipios = new ol.layer.Image({
			//extent: extent,
			id:'municipios',
			name: "Municipios",
			visible:false,
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=municipios',
			source: new ol.source.ImageWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
				crossorigin: 'anonymous',
					params: {'LAYERS': 'municipios', 'SRS': 3857 }
				})
		})

		layers.push(municipios);
		
		cp_clientes = new ol.layer.Image({
			//extent: extent,
			id: 'cp_clientes',
			name: "Códigos postales clientes",
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cp_clientes',
			source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'cp_clientes', 'SRS': "EPSG:3857" }
			})
		})
		
		cp_clientes_seleccionar = new ol.layer.Image({
			//extent: extent,
			id: 'cp_clientes_seleccionar',
			name: "Códigos postales clientes",
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cp_ecom',
			source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'cp_clientes_seleccionar', 'SRS': "EPSG:3857" }
			})
		})
		
		layers.push(cp_clientes);
		
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
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Ensenas',
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
				crossorigin: 'anonymous',
					params: {'LAYERS': 'Ensenas', 'SRS': 3857 }
				})
		})
		
		layers.push(ensenas);*/
		
		
		map = new ol.Map({
			target: 'map',
			layers: layers,
			logo:'images/flechas.png',
			view: new ol.View({
			  projection: projection,
			  center: [-419322, 4941215],
			  zoom: 5
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
				var url = cp_clientes_seleccionar.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution(), map.getView().getProjection(),
							{
								'INFO_FORMAT': 'text/plain'
							}
						);
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
							url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&cp='+cod,
							crossorigin: 'anonymous',
								params: {'LAYERS': 'cp_clientes_select', 'SRS': "EPSG:3857" }
							})
						})
						
						map.addLayer(selLayer);
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
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 1
	* -----------------------------------------------------------------------------------
	*/

	function cargarGrafico1(id, idEncuesta){
		 $.get('index.php?r=TblClClientes/GetNumClientes&idEncuesta='+idEncuesta+'&idHiper='+id, function(data){
			
			// var prevData = getPrevYear(id);
			infoClientes = data;
			var categorias = [];
			var num_clientes = [];
			var num_registros = [];
			var totales2 = [];
			//var linea = [];
			var totalClientes = 0;
			var totalRegistros = 0;
			 
			$.each(data.clientes, function(index, valor){
				categorias.push(valor.cp);
				num_clientes.push(valor.num_clientes); 
				totalClientes += parseFloat(valor.num_clientes);
			})
			 
			$.each(data.registros, function(index, valor){
				if(categorias.indexOf(valor.cp)==-1){
					categorias.push(valor.cp);
				}
				num_registros.push(valor.num_registros);
				totalRegistros += parseFloat(valor.num_registros);
			})
			 
			 /*$.each(data.linea, function(index, valor){
				linea.push(valor.num_clientes_anterior);
			})*/
			
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
					height: 275
				},
				title: {
					text: 'Altas: Clientes y Registros'
				},
				subtitle: {
					data:num_clientes,
					text: '<b>Clientes: </b>' + totalClientes.toFixed(0) + '<br/><b>Registros: </b>' + totalRegistros.toFixed(0),
					align: 'left',
					x: -10
				},
				xAxis: {
					categories: categorias,
					labels: {
						rotation: -45,
						style: {
							fontSize: '10px',
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
						pointPadding: 0.2,
						borderWidth: 0
					}
				},			
				yAxis: {
					min: 0,
					title: {
						text: 'Cifra Registros y Clientes'
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
				series: [
					{
						name: 'Clientes',
						color: '#6495ED',
						data:num_clientes,
						tooltip: {
							pointFormat:' <span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.0f}</b><br/>'
						},
						events: {
							click: function(event){
								selLayer = new ol.layer.Image({
									//extent: extent,
									name: "Seleccion",
									id: 'sel',
									source: new ol.source.ImageWMS({
									url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&cp='+event.point.category,
									crossorigin: 'anonymous',
										params: {'LAYERS': 'cod_postal', 'SRS': "EPSG:3857" }
									})
								})
								map.addLayer(selLayer);
								cod = event.point.category;
								if(cod.length == 4)
									cod = "0"+cod;
								cpSelected.push("'"+cod+"'");
								infoCP();
							}
						}
					},
					{
						name: 'Registros',
						color: '#9ee6ff',
						events: {
							legendItemClick: function(){
								return false;
							}
						},
						data: num_registros,
						tooltip: {
							pointFormat:' <span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.0f}</b><br/>'
						},
						events: {
							click: function(event){
								selLayer = new ol.layer.Image({
									//extent: extent,
									name: "Seleccion",
									id: 'sel',
									source: new ol.source.ImageWMS({
									url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&cp='+event.point.category,
									crossorigin: 'anonymous',
										params: {'LAYERS': 'cod_postal', 'SRS': "EPSG:3857" }
									})
								})
								map.addLayer(selLayer);
								cod = event.point.category;
								if(cod.length == 4)
									cod = "0"+cod;
								cpSelected.push("'"+cod+"'");
								infoCP();
							}
						}
					}/*, {
						name: 'Registros totales del año anterior',
						type: 'spline',
						color: '#000000',
						dashStyle: 'Dash',
						marker: {
							radius: 3
						},
						data: linea,
						tooltip: {
							pointFormat:' <span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.0f}</b><br/>'
						}
				}*/]
			});
			
			 
		 })
	 
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 3
	* -----------------------------------------------------------------------------------
	*/

	function cargarGrafico3(id, idEncuesta){		
		$.get('index.php?r=TblClRegistros/allNumZonaInfluencia&idEncuesta='+idEncuesta+'&idHiper='+id, function(data){
			
			var categorias = [];
			var num_clientes = [];
			 
			$.each(JSON.parse(data), function(index, valor){
				categorias.push(valor.tipo_fuente);				
				elemento = 
				{
                    name: valor.tipo_fuente,
                    y: valor.num_clientes
                };
				num_clientes.push(elemento);
				
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
			 
			$('#grafico3').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie',
					height: 275
				},
				title: {
					text: 'Altas por fuentes'
				},
				subtitle: {
					text: ''
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
					//pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br/>{series.name}: <b>{point.y:.0f}</b>'
					pointFormat: 'Porcentaje: <b>{point.percentage:.1f}%</b><br/>Registros: <b>{point.y:.0f}</b>'
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
				yAxis: {
					min: 0,
					title: {
						text: ''
					}
				},				
				series: [{
					//type: 'column',
					name: 'Registros',
					//innerSize: '50%',
					//color:'#B168F0',
					data: num_clientes
					
				}]
			});		 
		})
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 3 Códigos Postales
	* -----------------------------------------------------------------------------------
	*/

	function cargarGrafico3CP(id, idEncuesta){
		$.get('index.php?r=TblClRegistros/allNumZonaInfluenciaCP&idEncuesta='+idEncuesta+'&idHiper='+id+'&cp='+cpSelected.toString(), function(data){

			var categorias = [];
			var num_clientes = [];
			 
			$.each(JSON.parse(data), function(index, valor){
				categorias.push(valor.tipo_fuente);				
				elemento = 
				{
                    name: valor.tipo_fuente,
                    y: valor.num_clientes
                };
				num_clientes.push(elemento);
				
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
			 
			$('#grafico3CP').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie',
					height: 275
				},
				title: {
					text: 'Fuentes en códigos postales seleccionados'
				},
				subtitle: {
					text: ''
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
					//pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br/>{series.name}: <b>{point.y:.0f}</b>'
					pointFormat: 'Porcentaje: <b>{point.percentage:.1f}%</b><br/>Registros: <b>{point.y:.0f}</b>'
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
				yAxis: {
					min: 0,
					title: {
						text: ''
					}
				},				
				series: [{
					//type: 'column',
					name: 'Registros',
					//innerSize: '50%',
					//color:'#B168F0',
					data: num_clientes
					
				}]
			});		 
		})
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 3 Códigos Postales Acumulado
	* -----------------------------------------------------------------------------------
	*/

	/*function cargarGrafico3CPAcum(id, idEncuesta){
		$.get('index.php?r=TblClRegistros/allNumZonaInfluenciaCPAcum&idEncuesta='+idEncuesta+'&idHiper='+id+'&cp='+cpSelected.toString(), function(data){

			var categorias = [];
			var num_clientes = [];
			 
			$.each(JSON.parse(data), function(index, valor){
				categorias.push(valor.tipo_fuente);				
				elemento = 
				{
                    name: valor.tipo_fuente,
                    y: valor.num_clientes
                };
				num_clientes.push(elemento);
				
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
			 
			$('#grafico3CPAcum').highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie',
					height: 275
				},
				title: {
					text: 'Fuentes en códigos postales seleccionados'
				},
				subtitle: {
					text: ''
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
					//pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br/>{series.name}: <b>{point.y:.0f}</b>'
					pointFormat: 'Porcentaje: <b>{point.percentage:.1f}%</b><br/>Registros: <b>{point.y:.0f}</b>'
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
				yAxis: {
					min: 0,
					title: {
						text: ''
					}
				},				
				series: [{
					//type: 'column',
					name: 'Registros',
					//innerSize: '50%',
					//color:'#B168F0',
					data: num_clientes
					
				}]
			});		 
		})
	}*/
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 2
	* -----------------------------------------------------------------------------------
	*/

	function cargarGrafico2(id, idEncuesta){		
		$.get('index.php?r=TblClRegistros/allNumClientes&idEncuesta='+idEncuesta+'&idHiper='+id, function(data){

			infoClientes = data;
			var cod_edad = [];
			var tipo_fuente = [];
			var totales = [];
			
			$.each(data.datos, function(index, valor){
				if(tipo_fuente.indexOf(valor.tipo_fuente)==-1)
					tipo_fuente.push(valor.tipo_fuente);
			})
			
			var series = [];
			$.each(data.edades, function(index, valor){
				edades = [];
				for(r = 0; r < 5; r++){
					insertado = false;
					$.each(data.datos, function(i, v){
						if(v.cod_edad == valor && v.tipo_fuente == tipo_fuente[r]){
							edades.push(v.num_clientes);
							insertado = true;
						}
					});
					if(!insertado)
						edades.push(0);
				}
				
				elemento = {
						name: valor,
						data: edades
					}
				series.push(elemento);
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
			 
			$('#grafico2').highcharts({
				chart: {
					type: 'bar',
					height: 275
				},
				title: {
					text: 'Altas por fuentes y edades'
				},
				subtitle: {
					text: ''
				},
				colors: [
					'#0b160b',
					'#2f582f',
					'#539a53',
					'#77dd77',
					'#92e392',
					'#7A7677'
				],
				xAxis: {
					categories: tipo_fuente,
					labels: {
						rotation: -0,
						style: {
							fontSize: '10px',
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
					series: {
						stacking: 'normal'
					}
				},			
				yAxis: {
					min: 0,
					title: {
						text: ''
					},
					stackLabels: {
						enabled: true,
						style: {
							fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
						}
					}
				},
				legend: {
					enabled:false
				},
				series: series
			});		 
		})
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 2 Códigos Postales
	* -----------------------------------------------------------------------------------
	*/
	
	function cargarGrafico2CP(id, idEncuesta){
		$.get('index.php?r=TblClRegistros/allNumClientesCP&idEncuesta='+idEncuesta+'&idHiper='+id+'&cp='+cpSelected.toString(), function(data){

			infoClientes = data;
			var cod_edad = [];
			var tipo_fuente = [];
			var totales = [];
			
			$.each(data.datos, function(index, valor){
				if(tipo_fuente.indexOf(valor.tipo_fuente)==-1)
					tipo_fuente.push(valor.tipo_fuente);
			})
			
			var series = [];
			$.each(data.edades, function(index, valor){
				edades = [];
				for(r = 0; r<tipo_fuente.length; r++){
					insertado = false;
					$.each(data.datos, function(i, v){
						if(v.cod_edad == valor && v.tipo_fuente == tipo_fuente[r]){
							edades.push(v.num_clientes);
							insertado = true;
						}
					});
					if(!insertado)
						edades.push(0);
				}
				
				elemento = {
								name: valor,
								data: edades
							}
				series.push(elemento);
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
			 
			$('#grafico2CP').highcharts({
				chart: {
					type: 'bar',
					height: 275
				},
				title: {
					text: 'Fuentes y Edad Nuevos registros'
				},
				subtitle: {
					text: ''
				},
				xAxis: {
					categories: tipo_fuente,
					labels: {
						rotation: -0,
						style: {
							fontSize: '10px',
							fontFamily: 'Verdana, sans-serif'
						}
					}
				},
				colors: [
					'#0b160b',
					'#2f582f',
					'#539a53',
					'#77dd77',
					'#92e392',
					'#7A7677'
				],
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
					series: {
						stacking: 'normal'
					}
				},			
				yAxis: {
					min: 0,
					title: {
						text: ''
					},
					stackLabels: {
						enabled: true,
						style: {
							fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
						}
					}
				},
				legend: {
					enabled:false
				},
				series: series
			});			 
		})
	}
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 2 Códigos Postales Acumulados
	* -----------------------------------------------------------------------------------
	*/
	
	function cargarGrafico2CPAcum(id, idEncuesta){
		$.get('index.php?r=TblClRegistros/allNumClientesCPAcum&idEncuesta='+idEncuesta+'&idHiper='+id+'&cp='+cpSelected.toString(), function(data){

			infoClientes = data;
			var cod_edad = [];
			var tipo_fuente = [];
			var totales = [];
			
			$.each(data.datos, function(index, valor){
				if(tipo_fuente.indexOf(valor.tipo_fuente)==-1)
					tipo_fuente.push(valor.tipo_fuente);
			})
			
			var series = [];
			$.each(data.edades, function(index, valor){
				edades = [];
				for(r = 0; r<tipo_fuente.length; r++){
					insertado = false;
					$.each(data.datos, function(i, v){
						if(v.cod_edad == valor && v.tipo_fuente == tipo_fuente[r]){
							edades.push(v.num_clientes);
							insertado = true;
						}
					});
					if(!insertado)
						edades.push(0);
				}
				
				elemento = {
								name: valor,
								data: edades
							}
				series.push(elemento);
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
			 
			$('#grafico2CPAcum').highcharts({
				chart: {
					type: 'bar',
					height: 275
				},
				title: {
					text: 'Fuentes y Edad Nuevos registros año'
				},
				subtitle: {
					text: ''
				},
				xAxis: {
					categories: tipo_fuente,
					labels: {
						rotation: -0,
						style: {
							fontSize: '10px',
							fontFamily: 'Verdana, sans-serif'
						}
					}
				},
				colors: [
					'#0b160b',
					'#2f582f',
					'#539a53',
					'#77dd77',
					'#92e392',
					'#7A7677'
				],
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
					series: {
						stacking: 'normal'
					}
				},			
				yAxis: {
					min: 0,
					title: {
						text: ''
					},
					stackLabels: {
						enabled: true,
						style: {
							fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
						}
					}
				},
				legend: {
					enabled:false
				},
				series: series
			});			 
		})
	}
	
function infoCP(){
	console.log(cpSelected.toString());
	$.get('index.php?r=GeoSecciones/info&id=' + cpSelected.toString(), function (data3){
		totalPoblacion = 0;
		
		$('#infoEdad').empty();
		 categorias = [];
		 datos = [];
		 $.each(data3[0], function(index, element){
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
				height: 275,
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
						fontSize: '10px',
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
//$.get('index.php?r=GeoSecciones/infoExtranjeros&id=' + cpSelected.toString(), function (data2){
	$.get('index.php?r=tblExtranjeros/getExtranjeros&cp=' + cpSelected.toString(), function (data2){
		myLayout.open('east');
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

	fecha = $("#idEncuesta").val();	
	$("#infoLateral").empty();
	
	var ano = fecha.slice(0,4);
	var mes = fecha.slice(5,7);
	if(mes == "01"){
		mes="Enero";
	}
	if(mes == "02"){
		mes="Febrero";
	}
	if(mes == "03"){
		mes="Marzo";
	}
	if(mes == "04"){
		mes="Abril";
	}
	if(mes == "05"){
		mes="Mayo";
	}
	if(mes == "06"){
		mes="Junio";
	}
	if(mes == "07"){
		mes="Julio";
	}
	if(mes == "08"){
		mes="Agosto";
	}
	if(mes == "09"){
		mes="Septiembre";
	}
	if(mes == "10"){
		mes="Octubre";
	}
	if(mes == "11"){
		mes="Noviembre";
	}
	if(mes == "12"){
		mes="Diciembre";
	}
	var codPostal=[cpSelected.toString()];
	var arr = [cpSelected];

	arr = arr.filter( function( item, index, inputArray ) {
			   return inputArray.indexOf(item) == index;
		});
	$("#infoLateral").append("<b>"+mes+" "+ano+", CP: "+arr+"</b>");
	

	/*
	 *	--------------------------------------------
	 *	Clientes
	 *	--------------------------------------------
	 */
	$.get('index.php?r=TblClClientes/InfoClientes&cp='+cpSelected.toString()+'&fecha='+fecha, function (data3){
		$("#clientes").empty();
		
		var row = $("<tr />")
		$("#clientes").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Nº de clientes totales</td>"));
		row.append($("<td>" + data3['num_clientes_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr />")
		$("#clientes").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>% Progresión de clientes totales</td>"));
		row.append($("<td>" + data3['progresion_num_clientes'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#clientes").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Nº de altas clientes nuevos mes</td>"));
		row.append($("<td>" + data3['num_clientes'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));				
	});
 
	/*
	 *	--------------------------------------------
	 *	Clientes Acumulados
	 *	--------------------------------------------
	 */
	$.get('index.php?r=TblClClientes/InfoClientesAcum&cp='+cpSelected.toString()+'&fecha='+fecha, function (data3){
		$("#clientesAnual").empty();
		
		var row = $("<tr />")
		$("#clientesAnual").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Nº de clientes nuevos año</td>"));
		row.append($("<td>" + data3['num_clientes'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));	
	});

	$.get('index.php?r=TblClClientes/InfoEdadClientes&id='+cpSelected.toString()+'&fecha='+fecha, function (data){
		
		$('#infoEdadClientes').empty();
		
		 var categorias = [];
		 var num_clientes = [];
		 totalClientes = 0;
		 
		 $.each(JSON.parse(data), function(index, valor){
			 categorias.push(valor.cod_edad);
			 num_clientes.push(valor.num_clientes);
			 totalClientes += parseFloat(valor.num_clientes);
			 
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
	 
		 $('#infoEdadClientes').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				height: 275,
				//width: 300
			},
			title: {
				text: 'Edad altas nuevos clientes mes ('+totalClientes.toFixed(0)+')',
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
				title: 'Clientes',
				categories: categorias,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			series: [{
				type: 'column',
				name: 'Clientes',
				//innerSize: '50%',
				color:'#AEC6CF',
				data: num_clientes,
				dataLabels: {
					enabled: true,
					//color: '#8C008C',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
	});
	
	$.get('index.php?r=TblClClientes/InfoEdadClientesAcum&id='+cpSelected.toString()+'&fecha='+fecha, function (data){
		
		$('#infoEdadClientesAcum').empty();
		
		 var categorias = [];
		 var num_clientes = [];
		 totalClientes = 0;
		 
		 $.each(JSON.parse(data), function(index, valor){
			 categorias.push(valor.cod_edad);
			 num_clientes.push(valor.num_clientes);
			 totalClientes += parseFloat(valor.num_clientes);
			 
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
	 
		 $('#infoEdadClientesAcum').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				height: 275,
				//width: 300
			},
			title: {
				text: 'Edad nuevos clientes año ('+totalClientes.toFixed(0)+')',
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
				title: 'Clientes',
				categories: categorias,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			series: [{
				type: 'column',
				name: 'Clientes',
				//innerSize: '50%',
				color:'#AEC6CF',
				data: num_clientes,
				dataLabels: {
					enabled: true,
					//color: '#8C008C',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
	});
 
	/*
	*	--------------------------------------------
	*	Registros
	*	--------------------------------------------
	*/
	$.get('index.php?r=TblClRegistros/InfoRegistros&cp='+cpSelected.toString()+'&fecha='+fecha, function (data3){
		$("#registros").empty();
		
		var row = $("<tr />")
		$("#registros").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Nº de registros totales</td>"));
		row.append($("<td>" + data3['num_clientes_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr />")
		$("#registros").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Nº de altas de registros nuevos mes</td>"));
		row.append($("<td>" + data3['num_clientes'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		
		/*var row = $("<tr />")
		$("#registros").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>% Progresión de registros por fuente</td>"));
		row.append($("<td>" + data3['progresion_num_clientes'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
	});
 
	/*
	*	--------------------------------------------
	*	Registros Acumulados
	*	--------------------------------------------
	*/
	$.get('index.php?r=TblClRegistros/InfoRegistrosAcum&cp='+cpSelected.toString()+'&fecha='+fecha, function (data3){
		$("#registrosAnual").empty();
			
		var row = $("<tr />")
		$("#registrosAnual").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Nº de registros nuevos año según fuente</td>"));
		row.append($("<td>" + data3['num_clientes'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		
	});
 
 
	/*
	*	--------------------------------------------
	*	GRÁFICO 2 Códigos Postales
	*	--------------------------------------------
	*/
	 
	$("#grafico2CP").empty();
	cargarGrafico2CP(idAlcampo, idEncuesta, cpSelected.toString());
	
	/*
	*	--------------------------------------------
	*	GRÁFICO 2 Códigos Postales Acumulado
	*	--------------------------------------------
	*/
	 
	$("#grafico2CPAcum").empty();
	cargarGrafico2CPAcum(idAlcampo, idEncuesta, cpSelected.toString());
	
	/*
	*	--------------------------------------------
	*	GRÁFICO 3 Códigos Postales
	*	--------------------------------------------
	*/
	
	$("#grafico3CP").empty();
	cargarGrafico3CP(idAlcampo, idEncuesta, cpSelected.toString());
	
	/*
	*	--------------------------------------------
	*	GRÁFICO 3 Códigos Postales Acumulado
	*	--------------------------------------------
	*/
	
	//$("#grafico3CPAcum").empty();
	//cargarGrafico3CPAcum(idAlcampo, idEncuesta, cpSelected.toString());
	  
	//----------------------------------------------------------------------------------------------------------------------
	
	$.get('index.php?r=geoCp/getCompe&cp='+ cpSelected.toString(), function (data3){
		$("#infoCompeEns").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalNum = 0;
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
	$.get('index.php?r=geoCp/getCompeSup&cp='+ cpSelected.toString(), function (data3){
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