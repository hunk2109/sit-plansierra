 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Mensaje</h4>
	  </div>
	  <div class="modal-body">
		<p>Funcionalidad no desarrollada.</p>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
	  </div>
	</div>

  </div>
</div>

<div class="pane ui-layout-center">
	<div id="loading">
	  <img id="loading-image" width=200 src="images/loading.gif" alt="Loading..." />
	</div>

	<div id="map" style="height:100%; margin-right:0px"></div>
</div>
<!--div class="pane ui-layout-north">North</div-->

<div class="pane ui-layout-west">
	<div>
		<center><h2>Progresión E-commerce</h2></center>
		
		<div id="radio" class="ui-buttonset">
			<input type="radio" id="progresionCV" name="radio" checked="checked" class="ui-helper-hidden-accessible">
			<label class="btn btn-info btn-xs ui-state-active ui-button ui-widget ui-state-default ui-button-text-only ui-corner-left" for="progresionCV" style="margin:0 5px;" role="button">
				<span class="ui-button-text">Progresión CV</span>
			</label>

			<input type="radio" id="progresionClientes" name="radio" class="ui-helper-hidden-accessible">
			<label class="btn btn-default btn-xs ui-button ui-widget ui-state-default ui-button-text-only" data-toggle="modal" data-target="#myModal" for="progresionClientes" style="margin:0 5px;" role="button">
				<span class="ui-button-text">Progresión Clientes</span>
			</label>
			<br/><br/>
			<input type="radio" id="progresionPedidos" name="radio" class="ui-helper-hidden-accessible">
			<label class="btn btn-default btn-xs ui-button ui-widget ui-state-default ui-button-text-only" data-toggle="modal" data-target="#myModal" for="progresionPedidos" style="margin:0 5px;" role="button">
				<span class="ui-button-text">Progresión Pedidos</span>
			</label>
			
			<input type="radio" id="progresionCaddy" name="radio" class="ui-helper-hidden-accessible">
			<label class="btn btn-default btn-xs ui-button ui-widget ui-state-default ui-button-text-only" data-toggle="modal" data-target="#myModal" for="progresionCaddy" style="margin:0 5px;" role="button">
				<span class="ui-button-text">Progresión Caddy</span>
			</label>
		</div>
		<br/>
		<label>Fecha: </label><br/>
		<select id="fechaProgresion" name="fechaProgresion"></select>
		<br/><br/>
		<label>Municipio: </label><br/>
		<select id="hiperAlcampo" name="hiperAlcampo"></select>
		<br/><br/>
		<div id="layertree" class="tree"></div>		
	</div>
</div>

</div>
</div>


<script type="text/javascript">

var groupCapas, groupSociodemo;
var visibles = [];
var tools = {socio:false, capa:false};
var progresion, cod_postal = null, idAlcampo, idZipCode;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
var myLayout;
$(document).ready(function () {
	myLayout = $('#content').layout({
		west__size:	'25%',
		south__size:'75%',
		east__initClosed: true, 
		onresize: function () {
			map.updateSize();//alert('whenever anything on layout is redrawn.') 
		}	
	});
			
	$( "#tabs" ).tabs();
	
	/*$('#fechaProgresion').selectmenu({
		change: function( event, data ) {
			
			//$('#zipCode').empty();
			$.get('index.php?r=TblEcom/GetPeriodosProgresion', function(data2){				
				progresion.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map&fecha="+data2[0].id);
				
				for(var i2 = 0; i2 < data2.length; i2++){					
					var opt = $('<option/>', {
						value: data2[i2].id,
						text: data2[i2].fecha
					});
					
				}
					
			})
      }
	});*/
	
	function formatDate (input) {
		var datePart = input.match(/\d+/g),
		year = datePart[0].substring(0),
		month = datePart[1], day = datePart[2];
		return day+'/'+month+'/'+year;
	}
	
	$('#fechaProgresion').selectmenu({
		change: function( event, data ) {			
			fechaPro = data.item.value;
			progresion.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map&fecha="+formatDate(fechaPro)+"");
		}
	});
	
	$('#hiperAlcampo').selectmenu({
		change: function( event, data ) {
			idAlcampo = data.item.value;
			
			$.get('index.php?r=tblHiperAlcampo/getCoordsMunicipio&id='+idAlcampo, function (d){
				map.getView().setCenter([parseFloat(d[0].x), parseFloat(d[0].y)]);
				map.getView().setZoom(10);
			});
		}
	});
	
	//$('#fechaProgresion').selectmenu('destroy');
	
	//RELLENAR COMBO FECHA PROGRESIÓN
	$.get('index.php?r=TblEcom/GetPeriodosProgresion', function(data){
		$('#fechaProgresion').append($('<option>', {
			value: 0,
			text: 'Seleccione una fecha'
		}));
		for(var i = 0; i < data.length; i++){
			/*if(i == 0){
				$('#fechaProgresion').append($('<option>', {
					value: data[i].id,
					text: data[i].fecha,
					selected: "selected"
				}));
			}else{*/
				$('#fechaProgresion').append($('<option>', {
					value: data[i].id,
					text: data[i].fecha
				}));
			//}
			if(i == 0){
				progresion.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map&fecha="+formatDate(data[i].id)+"");	  
			}
		}
	})	
	
	//RELLENAR COMBO DE HIPER ALCAMPO
	$.get('index.php?r=tblHiperAlcampo/getMunicipio', function(data){
		$('#hiperAlcampo').append($('<option>', {
				value: 0,
				text: 'Seleccione un municipio'
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
		name: " Mapa carreteras",
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
		name: " Mapa satélite",
		visible:false, 
		//url: 'images/ignbase_todo.png',
		source: new ol.source.TileWMS({
			url: 'http://www.ign.es/wms-inspire/pnoa-ma?',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'OI.OrthoimageCoverage', 'SRS': 25830, viewparams: "par:data;par:data" }
			})
	})

	layers.push(pnoa);
	
	progresion = new ol.layer.Image({
		//extent: extent,
		id: 'progresion',
		name: " Progresión",
		visible:true,
		//url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map&fecha="'+formatDate(fechaPro)+'"&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=progresion',					
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map&fecha=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=progresion',
		source: new ol.source.ImageWMS({
			//url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map&fecha="'+formatDate(fechaPro)+'"',
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map&fecha=1',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'progresion', 'SRS': "EPSG:25830" }
			})
	})
	
	layers.push(progresion);
		
	var cod_postal = new ol.layer.Image({
		//extent: extent,
		id:'cod_postal',
		name: " Códigos postales",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cod_postal_layer',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'cod_postal_layer', 'SRS': 25830 }
			})
	})

	layers.push(cod_postal);		
	
	//ENSEÑAS
	var ensenas=[];
	$.ajax({
		url: 'index.php?r=tblEtiqueta/getAll', 
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
					url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map&etiqueta='+element.id,
					crossorigin: 'anonymous',
						params: {'LAYERS': 'COMPETENCIA_2', 'SRS': 25830 }
					})
			})
			
			ensenas.push(layer);
		});
	}});
	
	groupEnsena = new ol.layer.Group({
		id:'ensenas',
		name: ' Enseñas',
		layers: ensenas
	});
	//layers.push(groupEnsena);	
	
	groupCompe = new ol.layer.Group({
		id:'competencia',
		name: ' Competencia',
		layers: [groupEnsena]
	});
	layers.push(groupCompe);	
	
	//---------------------------------------	
	
	
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
	map.getLayerGroup().set('name', ' Capas');	
      
	  
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
						url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_ecomm_progresion.map&cp='+cod,
						crossorigin: 'anonymous',
							params: {'LAYERS': 'cod_postal', 'SRS': "EPSG:25830" }
						})
					})
					map.addLayer(cod_postal);			   
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
	
	function getActiveLayers(layers){
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