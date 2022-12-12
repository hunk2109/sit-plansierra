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
		
		
		
		<!-- Aqui se ponen las corrdenadas que aparecen en la esquina inferior izquierda-->
		<div style="width: 170px; height: 100px"  id="coord" class="div-coordenadas"></div>
		<div id="dialog-form"></div>
		
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
		<label>Seleccione  Cuenca</label>
		<br/>
		<select id="hiperAlcampo" name="hiperAlcampo"></select>
		<a href="javascript:document.location.reload();">       Refrescar</a>
		<br/>
		<label>Seleccione  Micro Cuenca</label>
		<br/>
		<select id="microcuenca" name="microcuenca"></select>
		
		<br/>
		<label>Seleccione Año</label>
		<br/>
		<select onchange="cargarGraficoAno()" id="ano" name="ano">
		  <option value="2019">2019</option>
		  <option value="2018">2018</option>
		  <option value="2017">2017</option>
		  <option value="2016">2016</option>
		  <option value="2015">2015</option>
		  <option value="2014">2014</option>
		  <option value="2013">2013</option>
		  <option value="2012">2012</option>
		  <option value="2011">2011</option>
		  <option value="2010">2010</option>
		</select>
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
					<li><a href="#tabs-1">Plantacion</a></li>
					<li><a href="#tabs-2">Datos generales</a></li>
					<li><a href="#tabs-3">Especies</a></li>
					<li><a href="#tabs-4">Datos técnicos</a></li>
					<li><a href="#tabs-5">Historia</a></li>
					<li><a href="#tabs-6">Otros</a></li>
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
					<table id="infoCompeEns" class="infoTabla"></table><br><br>
					<table id="infoCompeSup" class="infoTabla"></table>
				  </div>
				   <div id="tabs-4">
					<table id="infoCompeEns1" class="infoTabla"></table><br><br>
					<table id="infoCompeSup1" class="infoTabla"></table>
				  </div>
				   <div id="tabs-5">
					<table id="infoCompeEns1" class="infoTabla"></table><br><br>
					<table id="infoCompeSup1" class="infoTabla"></table>
				  </div> 
				  <div id="tabs-6">
				   	<table id="infoPlantacion" class="infoTabla"></table><br><br>
					<table id="infoReplantacion" class="infoTabla"></table><br><br>
					<table id="infoMantenimiento" class="infoTabla"></table>
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
//inserta la libreria de cambio de coordenadas
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>-->



<script type="text/javascript">

//defino la proyeccoin 32619 que es WGS 84 UTM 19N
//
//proj4.defs("EPSG:32619","+proj=utm +zone=19 +ellps=WGS84 +datum=WGS84 +units=m +no_defs");


//******************************************
// DEFINICION DE VARIABLES Y EVENTOS
//****************************************++
var groupCapas, groupSociodemo;
var tools = {socio:false};
var cpSelected = [], nacionalidad = ["RESTO", "EUROPA", "ASIA", "AMERICA", "AFRICA"], edades = [{capa:"POB_6599", titulo:"Población > 65"}, {capa:"POB_2965", titulo:"Población 29-65"}, {capa:"POB_2029", titulo:"Población 20-29"}, {capa:"POB_1519", titulo:"Población 15-19"}, {capa:"POB_0514", titulo:"Población 5-14"},{capa:"POB_0005", titulo:"Población 0-5"}];
var iso1, iso2, iso3, iso4, iso5, microcuencas_selected, plantaciones_cuencas_selected, parcelas, arg_cuencas, ensenas, loc = null, idAlcampo, idEncuesta, cuencas, microcuenca;
var sel, selLayer, osm, google, google_carto,parcelassel,sal,salid,codigobuscado,solo_plantaciones;
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
			idAlcampo = data.item.value;
		
			
			//$('#grafico1').empty();
			//$('#grafico2').empty();
			//$('#seleccion').empty();
	
			//QUITOS ESTO PARA PROBAR CON PLANSIERRA
			//iso1.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso2.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso3.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso4.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso5.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//sel.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			
			
			//microcuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas="+idAlcampo);
			//plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel="+idAlcampo);
			//parcelas.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map");
			
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
		 $("#microcuenca").append(a);
	     for(var i = 0; i < data.length; i++){
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			if (data[i].cuenca == idAlcampo) {
		      $('#microcuenca').append($('<option>', {
				   value: data[i].id,
				   text: data[i].id+ '- '+ data[i].nombre + '  (' +data[i].cuenca+' )'+ idAlcampo
		     	}));
			}
	    }
	
			
			
	//fecha de la encuesta o año
	
			$('#idEncuesta').empty();
			$.get('index.php?r=tblIsoCv/getIsoFechas&idAlcampo='+idAlcampo, function(data2){
				
				/*ESTA PARTE ES PARA CENTRAR EL DMAPA. AHORA NO LO HACEMOS
				//***************************************************
				$.get('index.php?r=tblHiperAlcampo/getCoords&epsg=3857&id='+idAlcampo, function (d){
					map.getView().setCenter([parseFloat(d[0].x), parseFloat(d[0].y)]);
					map.getView().setZoom(10);
				});
				*/
				//***************************************************
				//
				//AQUI SE LLAMAN A LOS DOS GRAFICOS QUE INCLUYE LA PAGINA A 21-02-2019
				//
				//
				//***************************************************
				//cargarGrafico1(idAlcampo);
				
				//cargarGrafico1(data2[0].id_encuesta);
				cargarGrafico2(false);
				for(var i2 = 0; i2 < data2.length; i2++){
					var opt = $('<option/>', {
						//value: data2[i2].id_encuesta,
						value: data2[i2].fecha_encuesta,
						text: data2[i2].fecha_encuesta
					});
					
					//$('#zipCode').append(opt);
					opt.appendTo("#idEncuesta");
				}
					idEncuesta = $("#idEncuesta").val();
					$("#idEncuesta option:first").attr('selected','selected');
				 	$("#idEncuesta").selectmenu("refresh");		
					$("#idEncuesta").trigger("change");
				
				
		
	
			
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
			$( "#butUnselect" ).trigger('click');
			microcuenca = data.item.value;
			$('#grafico1').empty();
			$('#grafico2').empty();
			$('#seleccion').empty();
	
	        microcuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas="+microcuenca);
			plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel="+microcuenca);
			parcelas.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map");
			
	      }
	});
	
	
//***********************************************	
//RELLENAR COMBO DE HIPER ALCAMPO
//**********************************************
	
<?php
//DESPLEGABLE DE LA CUENCA
//primer desplegable originalemente hiper alcampo

//OJO HE INTRODUCIDO MODIFICACIONE PORQUE NO FUNCIONABA
//BUSCO DIRECTAMENTE EN LA BASE DE DATOS SIN USAR LAS HERRAMIENTAS DE Yii


//CONEXION DIRECTA A LA BASE DE DATOS
$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

$rs3 = array();
//foreach($mbd->query('SELECT gid, objectid, id, nom_cuenca, sub_cuenca, shape_leng, shape_area, geom FROM geo_subcuencas order by gid asc;') as $fila3) {
foreach($mbd->query('SELECT codigo_cuenca, descripcion FROM ss_cuenca order by codigo_cuenca asc;') as $fila3) {
$c = null;								
$c['id'] =(int)$fila3['codigo_cuenca'];
$c['nombre'] =$fila3['descripcion'];

array_push($rs3, $c);

}


?>
		 $("#hiperAlcampo").empty();
	data = <?php echo json_encode($rs3);?>;
	var a = "<option value=999>Todas las subcuencas</option>";
		$("#hiperAlcampo").append(a);
	for(var i = 0; i < data.length; i++){
		$('#hiperAlcampo').append($('<option>', {
				value: data[i].id,
				text: data[i].id+ '- '+ data[i].nombre
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
	  code: 'EPSG:3857',
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
/*	 
var osm = new ol.layer.Tile({
	              name:'OSM',
                  source: new ol.source.OSM()
          });   
	 layers.push(osm); 	
	 
//GOOGLE	

 var google = new ol.layer.Tile({
            source: new ol.source.XYZ({
				
              //IMAGEN
			  
			  url: 'http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}'
			  
			 // mapa direccion URL y opacidad
			 //'https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}'
			 //opacity=08
            }),
			name:'Google',
			visible :true,
			opacity: 0.5
          });
	layers.push(google);
	*/
/*	
var parcelas = new ol.layer.Tile({
	name:'parcelas',
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map',
		params: {
			'LAYERS': 'PARCELAS', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true
			
		},
		//tileGrid: tileGrid
	})
});	
	 layers.push(parcelas);
*/
//djalsdlkas


/*
	var cuencas_selected = new ol.layer.Tile({
	name:'CUENCAS_SELECT',
	//visible: true,
	source: new ol.source.TileWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas='+idAlcampo,
		params: {
			'LAYERS': 'CUENCAS_SELECT', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true
			
		},
		//tileGrid: tileGrid
	})
});
layers.push(cuencas_selected);

*/
/*
var microcuencas_selected = new ol.layer.Tile({
	name:'MICROCUENCAS_SELECTED',
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&&cuencas='+idAlcampo,
		params: {
			'LAYERS': 'MICROCUENCAS_SELECT', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true
		},
		//tileGrid: tileGrid
	})
});

layers.push(microcuencas_selected);

*/





	 
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
/*	
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
	
	
*/	
	
	//CAPAS SOCIO-DEMOGRÁFICAS
	/*var pob = [];
	
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
	var edad = [];
	
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
		id: 'nacionalidad',
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
	
	//*************************
	//ESTOAS CAPAS LAS NECESITO MIENTRAS HAGA PRUEBAS CON SIGMA
	//DESPUES LAS PUEDO QUITAR
	//********************************
/*	
	sel = new ol.layer.Image({
		//extent: extent,
		id: 'sel',
		name: "Seleccion",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO_POLYGON',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO_POLYGON', 'SRS': "EPSG:3857" }
		})
	})
	
	
*/	
//**************************
//variables relacionadas con la actualizacion de los mapas
//
//*********************************

	/*
	iso1 = new ol.layer.Image({
		//extent: extent,
		id: 'iso1',
		name: "Isocrona 1: 0-2",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO1',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO1', 'SRS': "EPSG:3857" }
		})
	})
	
	iso2 = new ol.layer.Image({
		//extent: extent,
		id: 'iso2',
		name: "Isocrona 2: 2-5",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO2',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO2', 'SRS': "EPSG:3857" }
		})
	})
	
	iso3 = new ol.layer.Image({
		//extent: extent,
		id: 'iso3',
		name: "Isocrona 3: 5-8",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO3',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO3', 'SRS': "EPSG:3857" }
		})
	})
	
	iso4 = new ol.layer.Image({
		//extent: extent,
		id: 'iso4',
		name: "Isocrona 4: 8-12",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO4',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO4', 'SRS': "EPSG:3857" }
		})
	})
	
	iso5 = new ol.layer.Image({
		//extent: extent,
		id: 'iso5',
		name: "Isocrona 5: 12-20",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO5',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO5', 'SRS': "EPSG:3857" }
		})
	})
	
	*/

	
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
	opacity :'1',
	
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

osm_viario = new ol.layer.Image({
	id: 'OSM_viario',
	name:'OSM_viario',
	opacity :'0.75',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/OSMBasetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=osm_viario',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/OSMBasetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'osm_viario', 'SRS': "EPSG:4326" }
	})
})		





//******************************************
//
//AQUI AÑADO LAS CARTOGGRSFIAS DE BASE osm, Y gOOGLE POR EL MOMENTO
//
//********************************************************************
	 
 osm = new ol.layer.Tile({
	              name:'OSM',
				 
				  source: new ol.source.OSM()
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
//DEFINE TREES DE LA LEYENDA//
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
		layers: [ plan_sierra, osm_viario, rios_principales, rios, embalses_general, cuencas_plan_sierra]
	});
	
	layers.push(groupCapas30);
	
		
	
	
	
	groupCapas = new ol.layer.Group({
		id: 'Plantaciones',
		name: 'Plantaciones',
		layers: [microcuencas_selected, arg_cuencas, parcelas, plantaciones_cuencas_selected, plantaciones_puntos ]
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
	/*
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
	
	*/
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
		//salid=ol.proj.transform( sal, 'EPSG:4326', 'EPSG:32619');
		$('#coord').html(ol.coordinate.toStringXY(coord, 2) + "<br> WGS 84  PseudoMercator<br> " +ol.coordinate.toStringXY(sal, 6) + "<br> WGS 84  Geograficas<br>"  );	
	// +ol.coordinate.toStringXY(salid, 0) + "<br> WGS 84  UTM 19N<br>"
	});
 
	
	//PINCHAR EN UN LA PANTALLA
	
	map.on('singleclick', function(event) {
		if(tools.socio){
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
		   })
		}
		
		
		
		//primer  icono del mapa
		//ESTOY MODIFICANDO ESTO
		
		
		if(tools.capa){
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
				//alert (data.length);
				for(var i=0; i < data.length; i++){
					var dato={
						gid:data[i].gid,
						codigo:data[i].codigo
						//tipo:data[i].tipo,
						//especie:data[i].Especie	,
						//ano:data[i].Año_plantación
					}
						
					//if (codigo_old!=data[i].codigo)	{
					datos.push(dato);
					//alert (' lo meto');
					//}
					//alert (codigo_old +'   '+data[i].codigo);
					
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
						
						verGrafico(data, event, coordenadas, idMuestra, idPunto);
					}
				
				//FIN DE PRUEBAS
				
				
				
				
				
				

				
					/*if(data.length >1){
						$( "#dialog-form" ).empty();
						dialog = $( "#dialog-form" ).dialog({
							title: "Puntos disponibles",
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
									verGrafico(data, event, coordenadas, idMuestra, idPunto);
								},
									"Cancelar": function() {
									dialog.dialog( "close" );
								}
							},
							
						});
						var $select = $('<select id="featuresFound">').appendTo("#dialog-form");
						for(var i=0; i < data.length; i++){
							$("<option />", {value: data[i].id, text: data[i]['Nom llarg']}).appendTo($select);
						}
						dialog.dialog( "open" );
					}else{
						var coordenadas = "vacio";
						var idMuestra = "vacio";
						var idPunto = "vacio";
						
						verGrafico(data, event, coordenadas, idMuestra, idPunto);
					}*/
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




function cargarGraficoAno(){
	
var id2 = parseInt($("#ano").val());

$.get('index.php?r=tblIsoPob/getAno&id='+id2, function (data){
	data = JSON.parse(data);

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
	  name: 'Numero de plantas',
    data: 	data
  }]
});
	
})

	

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
			
			$('#tabs-1').empty();
			$('#tabs-2').empty();
			$('#tabs-3').empty();
			$('#tabs-4').empty();		
			$('#tabs-5').empty();
			$('#tabs-5').empty();
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
			
			
			//echo"<hr><";
			//echo"<hr>< width='20%'><br></td>";
			for(var j=0; j < 1; j++){
					
			$.each(data[j], function(i, item) {
					
				    if((i=='Especie' || i=='Tarea plantada'|| i=='codigo'|| i=='Tipo de plantacion'|| i=='Cantidad_plantas') ) {
					var $th= $('<th SIZE=12 ALIGN=RIGHT>').append(
						$('<td> ').text(i) ,
						//$('<td>').text(item)
						//$('<hr>').'WIDTH=20%',
					).appendTo('#tabs-3');
				}
				
				
			  });
			}
			
			$('<tr>').appendTo('#tabs-3');	
			// echo"</hr><";
			for(var j=0; j < data.length; j++){
				
			$.each(data[j], function(i, item) {
						
				    if((i=='Especie' || i=='Tarea_plantada'|| i=='codigo'|| i=='Tipo_de_plantacion'|| i=='Cantidad_plantas') ) {
					var $td = $('<td SIZE= 8 ALIGN=RIGHT >').append(
						//$('<td>').text(i)  ,
						$('<td  SIZE= 20 WIDTH=20% ALIGN=LEFT>  ').text(item)
					).appendTo('#tabs-3');
				}
				
				
			  })
			  
			  $('<tr>').appendTo('#tabs-3');	
			}
			
			
			var codigobuscado=data[selectedIndex].codigo;
			//alert( 'test   ' + codigobuscado);
			

			
			//PRUEBA TABS_4
		
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
			
		
				//Cabecera
				
			for(var j=0; j < 1; j++){	
			   $.each(data1[j], function(i, item) {
				var $td = $('<td>').append(
				$('<td>').text(i)
				).appendTo('#tabs-4');
			})
			}
			
			
			$('<tr>').appendTo('#tabs-4');		
			
			//llena tabla
			
			for(var j=0; j < data1.length; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
				$.each(data1[j], function(i, item) {
					var $td = $('<td>').append(
						//$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-4');
				})
				$('<tr>').appendTo('#tabs-4');	
			}
			
	// TAB-2-
/*
			myLayout.close('east');
			
			var codigobuscado=data[selectedIndex].codigo;
			
			$.get( "index.php?r=puntos/GetPlantacionSegunda&plantacion="+codigobuscado, function( data4 ) {
							
				data3=JSON.parse(data4);
				var datosplantacion=[];
				//alert ('linea 1935  Longitud = ' +data1.length );
				
			for(var j=0; j < 1; j++){
					
			  $.each(data3[j], function(i, item) {
								    
					var $th= $('<th SIZE=12 ALIGN=RIGHT>').append(
						$('<td> ').text(i) ,
						$('<td>').text(item)
						//$('<hr>').'WIDTH=20%',
					).appendTo('#tabs-3');
						
				});
			}
			
			*/
			
			/*$.each(data[selectedIndex], function(i, item) {
				if(i!='geom' && i!='geom_pol' && i!='Columna geologica'){
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-2');
				}
				if(i=='Columna geologica' && item != 'null' && item != null){
					if(item.indexOf('Llobregat')!=-1){
						var $tr = $('<tr>').append(
							$('<td>').text('Imagen'),
							$('<td>').html('<img width=150 src="http://sit.plansierra.org/medi-ambient/'+item+'"></img>')
						).appendTo('#tabs-2');
					}else{
						var $tr = $('<tr>').append(
							$('<td>').text(i),
							$('<td>').html('<a target="_blank" href="http://sit.plansierra.org/medi-ambient/'+item+'">Descarga</a>')
						).appendTo('#tabs-2');
					}
				}
			});*/(		
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
//			
//PRUEBA DE OTRA FORMA DE CARGAR LOS DATOS
//		
//TAB -6-
	

//Plantacion	
			
	$("#infoPlantacion").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#infoPlantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>  Especie</th>"));
	row.append($("<th Width='150 px'> Cantidad de Plantas</th>"));
	row.append($("<th Width='150 px'>Tareas plantadas</th>"));
	row.append($("<th Width='150 px'>Tipo de plantación</th>"));
	$.each(data, function(index, value){
			
			if (value.Tipo_de_plantacion == "Plantación (Reforestación)") {
					var row = $("<tr />");
					$("#infoPlantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
					row.append($("<td>" + value.Tarea_plantada + "</td>"));
					row.append($("<td>" + value.Tipo_de_plantacion + "</td>"));
					row.append($("<td>" + value.codigo + "</td>"));
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
			
			myLayout.open('east');	
			$("#infoReplantacion").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#infoReplantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>  Especie</th>"));		
	row.append($("<th Width='150 px'> Cantidad de Plantas</th>"));
	row.append($("<th Width='150 px'>Tareas plantadas</th>"));
	row.append($("<th Width='150 px'>Tipo de plantación</th>"));
	$.each(data, function(index, value){
			
			if (value.Tipo_de_plantacion == "Replantación  (Reforestación)") {
					var row = $("<tr />");
					$("#infoReplantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
					row.append($("<td>" + value.Tarea_plantada + "</td>"));
					row.append($("<td>" + value.Tipo_de_plantacion + "</td>"));
					row.append($("<td>" + value.codigo + "</td>"));
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
	row.append($("<th Width='150 px'>Tareas plantadas</th>"));
	row.append($("<th Width='150 px'>Tipo de plantación</th>"));
	
	
	$.each(data, function(index, value){
			
			if (value.Tipo_de_plantacion == "Mantenimiento  (Reforestación)") {
					var row = $("<tr />");
					$("#infoMantenimiento").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
					row.append($("<td>" + value.Tarea_plantada + "</td>"));
					row.append($("<td>" + value.Tipo_de_plantacion + "</td>"));
					row.append($("<td>" + value.codigo + "</td>"));
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
			myLayout.open('east');			
			
// fin Prueb tabs_5
			
			
			
			
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