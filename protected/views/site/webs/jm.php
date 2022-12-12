<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/ol.css" type="text/css">
		
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="js/ol.js" type="text/javascript"></script>		
<script src="js/ol.js" type="text/javascript"></script>

<script>
function cargarMapa(hiperAl){
			//CARGAR MAPA
			
			$("#map").empty ();
			var projection = new ol.proj.Projection({
			  code: 'EPSG:25830',
			  // The extent is used to determine zoom level 0. Recommended values for a
			  // projection's validity extent can be found at http://epsg.io/.
			  //extent: [485869.5728, 76443.1884, 837076.5648, 299941.7864],
			  units: 'm'
			});
			
			ol.proj.addProjection(projection);
			var layers = [];
			var image = new ol.style.Circle({
			  radius: 5,
			  fill: null,
			  stroke: new ol.style.Stroke({color: 'red', width: 1})
			});			
			var styles = {
			  'Point': [new ol.style.Style({
				image: image
			  })],
			  'LineString': [new ol.style.Style({
				stroke: new ol.style.Stroke({
				  color: 'green',
				  width: 1
				})
			  })],
			  'MultiLineString': [new ol.style.Style({
				stroke: new ol.style.Stroke({
				  color: 'red',
				  width: 2
				})
			  })],
			  'MultiPoint': [new ol.style.Style({
				image: image
			  })],
			  'MultiPolygon': [new ol.style.Style({
				stroke: new ol.style.Stroke({
				  color: 'yellow',
				  width: 1
				}),
				fill: new ol.style.Fill({
				  color: 'rgba(255, 255, 0, 0.1)'
				})
			  })],
			  'Polygon': [new ol.style.Style({
				stroke: new ol.style.Stroke({
				  color: 'blue',
				  lineDash: [4],
				  width: 3
				}),
				fill: new ol.style.Fill({
				  color: 'rgba(0, 0, 255, 0.1)'
				})
			  })],
			  'GeometryCollection': [new ol.style.Style({
				stroke: new ol.style.Stroke({
				  color: 'magenta',
				  width: 2
				}),
				fill: new ol.style.Fill({
				  color: 'magenta'
				}),
				image: new ol.style.Circle({
				  radius: 10,
				  fill: null,
				  stroke: new ol.style.Stroke({
					color: 'magenta'
				  })
				})
			  })],
			  'Circle': [new ol.style.Style({
				stroke: new ol.style.Stroke({
				  color: 'red',
				  width: 2
				}),
				fill: new ol.style.Fill({
				  color: 'rgba(255,0,0,0.2)'
				})
			  })]
			};
			
			var styleFunction = function(feature, resolution) {
			  return styles[feature.getGeometry().getType()];
			};
			
			$.get( "index.php?r=geoIsolines/getIsoHiper2&id="+hiperAl, function( data ) {
				var feat = [];
				var center = data[0][0][0];
				for(var i = 0; i<data.length; i++){
					var t =  {
						'type': 'Feature',
						'geometry': {
							'type':'MultiLineString',
							'coordinates':data[i]
						}
					  }
					  feat.push(t);
				
				}
				var vectorSource = new ol.source.GeoJSON(
					 ({
					  object: {
						'type': 'FeatureCollection',
						'crs': {
						  'type': 'name',
						  'properties': {
							'name': 'EPSG:3857'
						  }
						},
						'features': feat
					  }
					 })
				);
				
				
				var vectorLayer = new ol.layer.Vector({
				  source: vectorSource,
				  style: styleFunction
				});
				
					
				
				var ign = new ol.layer.Image({
					//extent: extent,
					source: new ol.source.ImageWMS({
					  url: 'http://www.ign.es/wms-inspire/ign-base?',
					 crossorigin: 'anonymous',
					 //crossOrigin: '',
					 
					  params: {'LAYERS': 'IGNBaseTodo'},
					  //serverType: /** @type {ol.source.wms.ServerType} */ ('mapserver')
					})
				})
	
				layers.push(ign);
				layers.push(vectorLayer);
				
				map = new ol.Map({
					target: 'map',
					layers: layers,
					
					
					view: new ol.View({
					  projection: projection,
					  center: center,
					  zoom: 11
					})
				});
			});
			// map.addLayers([layers]);
		}
</script>		

</head>


	<body onload="inicio()">
	
	<select id="hiper">
	</select>
	<button onclick="cargarMapaCombo()">Cargar Mapa</button>
	<button onclick="getValue()">Actualizar Info</button>
	<div></div>
	<div id="map" class="map" style="width:800; height:500">
	
</body>
<script>
function inicio(){
	$.get( "index?r=TblHiperAlcampo/getHiperAlcampo", function( data ) {
		
		for(var i = 0; i<data.length; i++){
			$("<option />", {value: data[i].id, text: data[i].id + "-" +data[i].nombre}).appendTo("#hiper");
			
			console.log(data[i].id + "-" +data[i].nombre);
		}
	});
}


function getValue(){
 var selectCtrl = document.getElementById("hiper");
 var selectedItem =  selectCtrl.options[selectCtrl.selectedIndex];
 alert("Valor de la selección= "+ selectedItem.value+", Text= " + selectedItem.text ); 
}

function cargarMapaCombo(){
 var selectCtrl = document.getElementById("hiper");
 var selectedItem =  selectCtrl.options[selectCtrl.selectedIndex];
 cargarMapa(selectedItem.value)
}


		
</script>