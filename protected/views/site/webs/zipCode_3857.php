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
	<div style="width: 50%; height: 100%; float:left" id="grafico1"></div>
	<div style="width: 50%; height: 100%; float:right" >
		<div id="seleccion" style="height: 15%"></div>
		<div id="grafico2" style ="height:85%"></div>
	</div>	
</div>
<div class="pane ui-layout-west">
	<div>
		<label>Seleccione hiper Alcampo</label>
		<br/>
		<select id="hiperAlcampo" name="hiperAlcampo"></select>
		<br/>
		<label>Seleccione Zipcode</label>
		<br/>
		<select id="zipCode" name="zipCode"></select>
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
					<li><a href="#tabs-1">ZipCode</a></li>
					<li><a href="#tabs-2">Sociodemografía</a></li>					
					<li><a href="#tabs-3">Competencia</a></li>
				  </ul>				  
				  <div id="tabs-1">
					<!--<p id="infoLateral"></p>-->
					<table id="infoCV" class="infoTabla"></table>
					<div id="infoMercado"></div>
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
<div id="popupInfo" class="ol-popup" style="width:400px">
	<a href="#" id="popup-closer-medida" class="ol-popup-closer"></a>
	<div id="popup-content-info">
		<ul></ul>
	</div>
	
</div>
<style>
	.modal-dialog {
		width: 80%;
	}
	#infoSectores {
		width: 77%;
	}
</style>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Sectores<img src='images/new.gif' width=35></img></h4>
			</div>
			<div class="modal-body">
				<div id="infoSectores"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

</div>
</div>

<script type="text/javascript">

var groupCapas, groupSociodemo;
var visibles = [];
var tools = {socio:false, capa:false};
var totalPoblacion = 0;
var cpSelected = [], nacionalidad = ["RESTO", "EUROPA", "ASIA", "AMERICA", "AFRICA"], edades = [{capa:"POB_6599", titulo:"Población > 65"}, {capa:"POB_2965", titulo:"Población 29-65"}, {capa:"POB_2029", titulo:"Población 20-29"}, {capa:"POB_1519", titulo:"Población 15-19"}, {capa:"POB_0514", titulo:"Población 5-14"},{capa:"POB_0005", titulo:"Población 0-5"}];
var cv, zonas_cv, penetracion,caddy, pasos, folletos, ensenas, cod_postal = null, idAlcampo, idZipCode;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
var myLayout;
var infoCV, categorias;
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
			//$("#infoLateral").empty();
			$("#infoEdad").empty();
			$("#infoExtr").empty();
			$("#infoCV").empty();
			$("#infoMercado").empty();
			$("#infoCompeEns").empty();
			$("#infoCompeSup").empty();
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'COD_POSTAL'){
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
			$('#seleccion').empty();
			$('#zipCode').empty();
			zonas_cv.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			
			$.get('index.php?r=tblZc/getAll&id='+idAlcampo, function(data2){
				if(data2.length > 0){
					cv.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zipcode="+data2[0].cod_zipcode);
					penetracion.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo+"&zipcode="+data2[0].cod_zipcode);
					//caddy.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc="+data2[0].cod_zipcode);
					//pasos.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc="+data2[0].cod_zipcode);
					folletos.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc="+data2[0].cod_zipcode);
					
					$.get('index.php?r=tblHiperAlcampo/getCoords&epsg=3857&id='+idAlcampo, function (d){
						map.getView().setCenter([parseFloat(d[0].x), parseFloat(d[0].y)]);
						map.getView().setZoom(10);
					});
					
					cargarGrafico1(data2[0].cod_zipcode);
					
					//cargarGrafico2();
					for(var i2 = 0; i2 < data2.length; i2++){
						var tipo = "Nacional";
						if(data2[i2].tipo_zc==2){
							tipo = "Otros";
						}
						var opt = $('<option/>', {
							value: data2[i2].cod_zipcode,
							text: data2[i2].fecha_ini +" ("+tipo+")"
						});						
						
						//$('#zipCode').append(opt);
						opt.appendTo("#zipCode");
					}
						
					$("#zipCode option:first").attr('selected','selected');
					$("#zipCode").selectmenu("refresh");		
					$("#zipCode").trigger("change");
					idZipCode = $("#zipCode").val();
				}else{		
					$('#zipCode').empty();
					$('#zipCode').find('option').remove().end();
					$('#zipCode').selectmenu('destroy').selectmenu({ style: 'dropdown' });
				}
									
			})
      }
	});
	
	$('#zipCode').selectmenu({
		change: function( event, data ) {
			$( "#butUnselect" ).trigger('click');
			idAlcampo = $("#hiperAlcampo").val();
			idZipCode = data.item.value;
			cv.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zipcode="+data.item.value);
			zonas_cv.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			penetracion.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo+"&zipcode="+data.item.value);
			//caddy.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc="+data.item.value);
			//pasos.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc="+data.item.value);
			folletos.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc="+data.item.value);
			cargarGrafico1(data.item.value);
			//cargarGrafico2();
			
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
	
	//ol.proj.addProjection(projection);
	var layers = [];
	
	
	/*
	var ign = new ol.layer.Tile({
		//extent: extent,
		id:'wms_ign',
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
	
	
	//CAPAS SOCIO-DEMOGRÁFICAS
	var pob = [];
	
	$.each(nacionalidad, function(index, value){
		layer = new ol.layer.Tile({
			//extent: extent,
			id: 'nacionalidad'+index,
			name: value,
			visible: false,
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=' + value,
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
				crossorigin: 'anonymous',
					params: {'LAYERS': value, 'SRS': "EPSG:3857" }
				})
		})
	
		pob.push(layer);
	})
	/*var edad = [];
	
	$.each(edades, function(index, value){
		layer = new ol.layer.Tile({
			//extent: extent,
			id: value.capa,
			name: value.titulo,
			visible: false,
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=' + value.capa,
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
				crossorigin: 'anonymous',
					params: {'LAYERS': value.capa, 'SRS': "EPSG:3857" }
				})
		})
	
		edad.push(layer);
	})
	poblacion = new ol.layer.Tile({
		//extent: extent,
		id: 'poblacion',
		name: "POBLACION",
		visible: false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=POBLACION',
		source: new ol.source.TileWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'POBLACION', 'SRS': "EPSG:3857"}
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
	
	
	
	cv = new ol.layer.Image({
		//extent: extent,
		id: 'layer_cv',
		name: "CIFRA DE VENTA",
		visible:true,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cv',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'CV', 'SRS': "EPSG:3857" }
		})
	})
	
	zonas_cv = new ol.layer.Image({
		//extent: extent,
		id: 'layer_zonas_cv',
		name: "ZONAS ZIP CODE",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=zonas_cv',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'Zonas_CV', 'SRS': "EPSG:3857" }
		})
	})
	
	penetracion = new ol.layer.Image({
		//extent: extent,
		id: 'layer_penetracion',
		name: "PENETRACIÓN",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=penetracion',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'penetracion', 'SRS': "EPSG:3857" }
		})
	})
	
	/*caddy = new ol.layer.Image({
		//extent: extent,
		id: 'caddy',
		visible:false,
		name: "CADDY",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=caddy',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'CADDY', 'SRS': "EPSG:3857" }
			})
	})
	
	pasos = new ol.layer.Image({
		//extent: extent,
		id: 'pasos',
		visible:false,
		name: "PASOS",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=pasos',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'PASOS', 'SRS': "EPSG:3857" }
			})
	})*/
	folletos = new ol.layer.Image({
		//extent: extent,
		id: 'folletos',
		name: "FOLLETOS",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=folletos',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'FOLLETOS', 'SRS': "EPSG:3857" }
			})
	})
	groupCapas = new ol.layer.Group({
		id:'zipcode',
		name: 'Capas ZIPCODE',
		layers: [folletos, zonas_cv, penetracion, cv]
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
			var url = cv.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution(), map.getView().getProjection(),
				{
					'INFO_FORMAT': 'text/plain'
				}
			);
			$.get(url, function (data){
			   var f = data.split('Feature ');
			   cod = f[1].replace(/(\r\n|\n|\r|\:|\s)/gm,"");
			   if(cod.length == 4)
				   cod = '0'+cod;
			   cpSelected.push("'"+cod+"'");
					cod_postal = new ol.layer.Image({
						//extent: extent,
						name: "COD_POSTAL",
						source: new ol.source.ImageWMS({
						url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&cp='+cod,
						crossorigin: 'anonymous',
							params: {'LAYERS': 'cod_postal', 'SRS': "EPSG:3857" }
						})
					})
					map.addLayer(cod_postal);
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
/*
fecha = $("#zipCode option:selected").text();	
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

$("#infoLateral").append("<b>"+mes+" "+ano+", CP: "+cpSelected.toString()+"</b>");
*/


 $.get('index.php?r=tblZcConsolidado/getDatosCP&cp='+cpSelected.toString()+'&cod_zipcode=' + idZipCode, function (data3){
	$("#infoCV").empty();

	$.each(data3[0], function(index, value){
			var row = $("<tr />")
			$("#infoCV").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td>" + index + "</td>"));
			if(index=='Cifra de venta(mill. €)'){
				row.append($("<td>" + value.toFixed(3).replace(".", ",") + "</td>"));
			}
			else if(index=='Progresión Folletos (P.P)'){
				if(value == "Solo disponible en Nacional"){
					row.append($("<td> - <img src='images/new.gif' width='35'/></td>"));
				}else if(index=='Progresión Folletos (P.P)'){
					row.append($("<td>" + value.toFixed(0) + "<img src='images/new.gif' width='35'/></td>"));
				}else{
					row.append($("<td>" + value.toFixed(0) + "<img src='images/new.gif' width='35'/></td>"));					
				}
			}
			
			else if(index=='Penetración (%)'){				
				if(value == "Solo disponible en Nacional"){
					row.append($("<td>- <img src='images/new.gif' width='35'/></td>"));
				}else{					
					row.append($("<td>" + value.toFixed(1).replace(".", ",") + "<img src='images/new.gif' width='35'/></td>"));
				}
			}
			
			else if(index=='Progresión CV (%)'){
				if(value.length == 0){
					row.append($("<td>- <img src='images/new.gif' width='35'/></td>"));
				}else{					
					row.append($("<td>" + value.toFixed(1).replace(".", ",") + "<img src='images/new.gif' width='35'/></td>"));
				}				
			}
			else{
				row.append($("<td>" + value.toFixed(0) + "</td>"));
			}
	});
 });
$.get('index.php?r=geoCp/getCompe&cp='+ cpSelected.toString()+'&cod_zipcode=' + idZipCode, function (data3){
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
$.get('index.php?r=geoCp/getCompeSup&cp='+ cpSelected.toString()+'&cod_zipcode=' + idZipCode, function (data3){
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
 
$.get('index.php?r=tblZcMercados/infoMercados&cp='+ cpSelected.toString()+'&cod_zipcode='+idZipCode , function (data3){
	$("#infoMercado").empty();
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoMercado').highcharts({
			chart: {
				type: 'pie',
				//marginRight: 100,
				//width: 300
			},
			title: {
				text: 'Distribución por sectores',
				//x: -50
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
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
			plotOptions: {
				pie:{
					allowPointSelect: true,
					cursor: 'pointer',
				},
				series: {
					dataLabels: {
						enabled: true,
						distance: -30,
						style: {
							fontWeight: 'bold'
						}//format: '<b>{point.name}</b> ({point.y:,.0f})',
						//color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
						//softConnector: false
					}
				}
			},
			legend: {
				enabled: false
			},
			series: [{
				name: 'Mercados',
				data: data3,
				events: {
					click: function(event){
						
						idAlcampo = $("#hiperAlcampo").val();
						codigosPostales = cpSelected.toString();
						idZC = idZipCode;
						sector = event.point.name;
						
						cargarGraficoMercados(idAlcampo, codigosPostales, idZC, sector);												
					}
				}
			}]
		});
	
 });

}

/*
* -----------------------------------------------------------------------------------
* GRÁFICO SECTORES Y MERCADOS
* -----------------------------------------------------------------------------------
*/

function cargarGraficoMercados(idAlcampo, codigosPostales, idZC, sector){
	$("#infoSectores").empty();
	$('#myModal').modal('show');
	
	$.ajax({
		url: 'index.php?r=TblMercado/mercadoSectores',
		type: 'GET',
		data: {
			"hiper":idAlcampo,
			"cp":codigosPostales,
			"cod_zipcode":idZC,
			"sector":sector
		},
		dataType: 'json',
		contentType: "application/json; charset=utf-8",
		success: function(data)
		{			
			series = [];
			f = [];
			b = [];
			comprobar = [];
			suma=0;
			$.each(data, function(index, value){
				sector=value.sector;
				cp=value.cv;
				color=value.color;
				if(comprobar.indexOf(sector) === -1){
					f = {
							id: value.sector,
							name: value.mercado,
							color: value.color,
							value: cp
						}
					b =	{
							name: value.mercado,
							parent: value.sector,
							value: cp
						}
					suma += value.cv;
					series.push(f);
				}
				else{
					b = {
							id: value.sector,
							name: value.mercado,
							color: value.color,
							value: cp
						}
					suma += value.cv;
					series.push(b);
				}				
				comprobar.push(value.sector);
			});
			
			Highcharts.setOptions({
				global: {
					useUTC: false,					
				},
				lang: {
				  decimalPoint: ',',
				  thousandsSep: '.'
				}
			});
			
			$('#infoSectores').highcharts({
				chart: {
						// Edit chart spacing
						spacingBottom: 5,
						spacingTop: 5,
						spacingLeft: 5,
						spacingRight: 5,

						// Explicitly tell the width and height of a chart
						//width: null,
						height: 500
				},
				plotOptions: {
					series: {
						dataLabels: {
							useHTML: true,
							formatter: function () {
								if(this.key == "Bazar" || this.key == "P.G.C" || this.key == "Perecederos" || this.key == "Hogar" || this.key == "Textil"){
									return '<div class=dataLabelContainer><div style="position: absolute; top: -1px; left: 1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; top: 1px; left: 1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; top: 1px; left: -1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; top: -1px; left: -1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; color: #fff; font-size:20px;">'+this.key+'</div></div><div style="color: #fff; font-size:20px;">'+this.key+'</div></div>';
								}else{
									return '<div class=dataLabelContainer><div style="position: absolute; top: -1px; left: 1px; color: #000;">'+this.key+'</div><div style="position: absolute; top: 1px; left: 1px; color: #000;">'+this.key+'</div><div style="position: absolute; top: 1px; left: -1px; color: #000;">'+this.key+'</div><div style="position: absolute; top: -1px; left: -1px; color: #000;">'+this.key+'</div><div style="position: absolute; color: #fff;">'+this.key+'</div></div><div style="color: #fff;">'+this.key+'</div></div>';
								}
							},
							enabled: true,
							align: 'center',
							style: {
								fontSize: '12px',
								//color: '#FFFFFF',
								//textShadow: "0 0 3px #000, 0 0 3px #000",
							}
						}
					}
				},
				series: [{
					type: "treemap",
					layoutAlgorithm: 'squarified',
					alternateStartingDirection: true,
					levels: [{
						level: 0,
						layoutAlgorithm: 'sliceAndDice',
						dataLabels: {
							enabled: true,
							align: 'left',
							//verticalAlign: 'top',
							style: {
								fontSize: '15px',
								fontWeight: 'bold'
							}
						}
					}/*,{
						level: 1,
						layoutAlgorithm: 'sliceAndDice',
						dataLabels: {
							enabled: true,
							align: 'left',
							verticalAlign: 'top',
							style: {
								fontSize: '15px',
								fontWeight: 'bold'
							}
						}
					}*/],
					allowDrillToNode: true,
					data: series
				}],
				tooltip: {
					formatter: function() {
						return '<b>' + this.point.name + ': </b>' + Highcharts.numberFormat(this.point.value,1) + '%';
					}
				},
				title: {
					text: 'Mercados (Cifra de venta) - Sector: '+sector+' ('+suma.toFixed(1)+'%)'
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
					enabled:false,
					url: 'http://sit.plansierra.org/sigma/js/exportToPNG.php'
				},
				legend: {
					align: 'right',
					verticalAlign: 'top',
					layout: 'vertical',
					x: 0,
					y: 20
				}			
			 })
		}
	});
	
	/*$.ajax({
		url: 'index.php?r=TblMercado/mercadoSectores',
		type: 'GET',
		data: {
			"hiper":idAlcampo,
			"cp":codigosPostales,
			"cod_zipcode":idZC,
			"sector":sector
		},
		dataType: 'json',
		contentType: "application/json; charset=utf-8",
		success: function()
		{
			alert("Entro");
		}
	});
	
	$.get('index.php?r=TblMercado/mercadoSectores&hiper='+idAlcampo+'&cp='+codigosPostales+'&cod_zipcode='+idZC+'&sector='+sector, function(data){
		alert("Entro");
		series = [];
		f = [];
		b = [];
		comprobar = [];
		$.each(data, function(index, value){
			sector=value.sector;
			if(comprobar.indexOf(sector) === -1){
				f = {
						id: value.sector,
						name: value.sector,
						color: value.color
					}
				b =	{
						name: value.mercado,
						parent: value.sector,
						value: Math.round(value.cv)
					}
				series.push(f,b);
			}
			else{
				b = {
						name: value.mercado,
						parent: value.sector,
						value: Math.round(value.cv)
					}
				series.push(b);
			}				
			comprobar.push(value.sector);
		});		
			
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		
		$('#infoSectores').highcharts({
			
			chart: {
					// Edit chart spacing
					spacingBottom: 5,
					spacingTop: 5,
					spacingLeft: 5,
					spacingRight: 5,

					// Explicitly tell the width and height of a chart
					//width: null,
					height: 500
			},
			plotOptions: {
				series: {
					dataLabels: {
						useHTML: true,
						formatter: function () {
							if(this.key == "Bazar" || this.key == "P.G.C" || this.key == "Perecederos" || this.key == "Hogar" || this.key == "Textil"){
								return '<div class=dataLabelContainer><div style="position: absolute; top: -1px; left: 1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; top: 1px; left: 1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; top: 1px; left: -1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; top: -1px; left: -1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; color: #fff; font-size:20px;">'+this.key+'</div></div><div style="color: #fff; font-size:20px;">'+this.key+'</div></div>';
							}else{
								return '<div class=dataLabelContainer><div style="position: absolute; top: -1px; left: 1px; color: #000;">'+this.key+'</div><div style="position: absolute; top: 1px; left: 1px; color: #000;">'+this.key+'</div><div style="position: absolute; top: 1px; left: -1px; color: #000;">'+this.key+'</div><div style="position: absolute; top: -1px; left: -1px; color: #000;">'+this.key+'</div><div style="position: absolute; color: #fff;">'+this.key+'</div></div><div style="color: #fff;">'+this.key+'</div></div>';
							}
						},
						enabled: true,
						align: 'center',
						style: {
							fontSize: '11px',
							//color: '#FFFFFF',
							//textShadow: "0 0 3px #000, 0 0 3px #000",
						}
					}
				}
			},  			
			series: [{
				type: "treemap",
				layoutAlgorithm: 'squarified',
				alternateStartingDirection: true,
				levels: [{
					level: 3,
					layoutAlgorithm: 'sliceAndDice',
					dataLabels: {
						enabled: true,
						align: 'left',
						//verticalAlign: 'top',
						style: {
							fontSize: '15px',
							fontWeight: 'bold'
						}
					}
				}],
				allowDrillToNode: true,
				data: series
			}],
			title: {
				text: 'Mercados'
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
				enabled:false,
				url: 'http://sit.plansierra.org/sigma/js/exportToPNG.php'
			},
			legend: {
				align: 'right',
				verticalAlign: 'top',
				layout: 'vertical',
				x: 0,
				y: 20
			}			
		 })
	})	
	*/
}


function cargarGrafico1(id){
	 $.get('index.php?r=TblZcConsolidado/getCVByZC&zc='+id, function(data){
		 infoCV = data.presente;
		 cargarGrafico2(true, id);
		 categorias = [];
		 datos = [];
		 $.each(data.presente, function(index, element){
			 categorias.push(element[0]);
			 datos.push(element[1]);
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
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				height: 300,
				//widht: '80%'
			},
			title: {
				text: 'Cifra de venta',
				align: 'center'
			},
			legend:{
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
			tooltip: {
				pointFormat: '{series.name}: <b>{point.y:.2f} %</b>'
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
			yAxis: [{
				labels: {
					format: '{value} %',
					style: {
						color: '#00D900'
					}
				},
				title: {
					text: 'Cifra de venta (%)',
					style: {
						color: '#00D900'
					}
				}
				
			}],
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
			series: [{
				type: 'column',
				name: 'Cifra de venta',
				color:'green',
				data: datos,
				events: {
					click: function(event){
						
						cod_postal = new ol.layer.Image({
							//extent: extent,
							name: "COD_POSTAL",
							source: new ol.source.ImageWMS({
							url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&cp='+event.point.category,
							crossorigin: 'anonymous',
								params: {'LAYERS': 'cod_postal', 'SRS': "EPSG:3857" }
							})
						})
						map.addLayer(cod_postal);
						cpSelected.push("'"+event.point.category+"'");
						infoCP();
					}
				}
			},  {
				name: 'Progresión CV',
				type: 'spline',
				//yAxis: 1,
				color: '#000000',
				dashStyle: 'Dash',
				marker: {
					radius: 3
				},
				data: data.anterior,
				tooltip: {
					pointFormat:' <span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.1f} %</b><br/>'
				}
			}]
		});
	 })
	 
}

function cargarGrafico2(euros, id){
	idZipCodeGrafico = $("#zipCode option:selected").text();

	if(idZipCodeGrafico.indexOf("Nacional") != -1){
		$("#grafico2").empty();
		$("#seleccion").empty();
		
		if(euros){
			$.get('index.php?r=TblZc/getCVAlcampo&id='+idAlcampo+'&zc='+id, function(d){
				series = [];
				/*$.each(infoCV, function(index, element){
					var t=[];
					for(var h = 0; h<d.length;h++){
						t.push([d[h][0], d[h][1]*element[1]/100]);
						//t.push([d[h][0], element[1]]);
					};
					var f = {
						type: 'spline',
						name: 'CP ' + element[0],
						data: t
					}
					series.push(f);
				});
				*/
				$.each(d, function(index, element){
					var t=[];
					for(var h = 0; h<element.datos.length;h++){
						t.push([element.datos[h].fecha, element.datos[h].cv]);
						//t.push([d[h][0], element[1]]);
					};
					var f = {
						type: 'spline',
						name: 'CP ' + element.cp,
						data: t
					}
					series.push(f);
					
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
						zoomType: 'x'
					},
					title: {
						text: 'Evolución'
					},
					tooltip: {
						headerFormat: '<b>{point.key:%Y}</b><br/>',
						pointFormat: '{series.name}: <b>{point.y:.2f} mill. €</b>'
					},
					xAxis: {
						type: 'datetime',
						minRange: 360 * 24 * 3600000 
					},
					yAxis: {
						title: {
							text: 'Cifra de venta (mill. €)'
						}
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
					series: series
				 })
				
				$("#seleccion").empty();
				var radioSet = $('<div id="radio">');
				radioSet.appendTo('#seleccion');
				var radioBtn = $('<input type="radio" id="euros" name="radio" checked="checked">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label for="euros">Euros</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="porc" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label for="porc">% Cifra venta</label>');
				radioLbl.appendTo('#radio');
				
				$( "#radio" ).buttonset().change(function( event ) {
					if(event.target.id=='euros'){
						cargarGrafico2(true, id);
					}else{
						cargarGrafico2(false, id);
					}
					//alert(event.target.id);
					//alert($("#radio :radio:checked + label").text());
				});
			})
		}else{
			$.get('index.php?r=TblZcConsolidado/getCVByZCTodos&idAlcampo='+idAlcampo, function(d){
				series = [];
				$.each(infoCV, function(index, element){
					var t=[];
					for(var h = 0; h<d.length;h++){
						var pos = -1;
						$.each(d[h].datos, function(ind, elem){
							if(elem[0] == element[0])
								pos = ind;
						})
						if(pos!=-1)
							t.push([d[h].fecha, d[h].datos[pos][1]]);
						//t.push([d[h][0], element[1]]);
					};
					var f = {
						type: 'spline',
						name: 'CP ' + element[0],
						data: t
					}
					series.push(f);
				});
				
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
						text: 'Evolución'
					},
					tooltip: {
						headerFormat: '<b>{point.key:%Y}</b><br/>',
						pointFormat: '{series.name}: <b>{point.y:.2f} %</b>'
					},
					xAxis: {
						type: 'datetime',
						minRange: 360 * 24 * 3600000 
					},
					yAxis: {
						title: {
							text: 'Cifra de venta (%)'
						}
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
					series: series
				 })
				
				$("#seleccion").empty();
				var radioSet = $('<div id="radio">');
				radioSet.appendTo('#seleccion');
				var radioBtn = $('<input type="radio" id="euros" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label for="euros">Euros</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="porc" name="radio" checked="checked">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label for="porc">% Cifra venta</label>');
				radioLbl.appendTo('#radio');
				
				$( "#radio" ).buttonset().change(function( event ) {
					if(event.target.id=='euros'){
						cargarGrafico2(true, id);
					}else{
						cargarGrafico2(false, id);
					}
					//alert(event.target.id);
					//alert($("#radio :radio:checked + label").text());
				});
			})
		}
	}else{
		$("#grafico2").empty();
		$("#seleccion").empty();
		
		$.get('index.php?r=TblZcConsolidado/getCVByZCTodos&idAlcampo='+idAlcampo, function(d){
			series = [];
			$.each(infoCV, function(index, element){
				var t=[];
				for(var h = 0; h<d.length;h++){
					var pos = -1;
					$.each(d[h].datos, function(ind, elem){
						if(elem[0] == element[0])
							pos = ind;
					})
					if(pos!=-1)
						t.push([d[h].fecha, d[h].datos[pos][1]]);
					//t.push([d[h][0], element[1]]);
				};
				var f = {
					type: 'spline',
					name: 'CP ' + element[0],
					data: t
				}
				series.push(f);
			});
			
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
					text: 'Evolución'
				},
				tooltip: {
					headerFormat: '<b>{point.key:%Y}</b><br/>',
					pointFormat: '{series.name}: <b>{point.y:.2f} %</b>'
				},
				xAxis: {
					type: 'datetime',
					minRange: 360 * 24 * 3600000 
				},
				yAxis: {
					title: {
						text: 'Cifra de venta (%)'
					}
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
				series: series
			 })
			
			$("#seleccion").empty();
			var radioSet = $('<div id="radio">');
			radioSet.appendTo('#seleccion');
						
			var radioBtn = $('<input type="radio" id="porc" name="radio" checked="checked">');
			radioBtn.appendTo('#radio');
			var radioLbl = $('<label for="porc">% Cifra venta</label>');
			radioLbl.appendTo('#radio');
			
			$( "#radio" ).buttonset().change(function( event ) {
				if(event.target.id=='euros'){
					cargarGrafico2(true, id);
				}else{
					cargarGrafico2(false, id);
				}
				//alert(event.target.id);
				//alert($("#radio :radio:checked + label").text());
			});
		})
		
	}
	
	
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

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-64660106-1', 'auto');
  ga('send', 'pageview');
 
</script>