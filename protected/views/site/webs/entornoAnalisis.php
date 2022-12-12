﻿<script src="js/bootbox.js"></script>

<!--script src="/highcharts/Highcharts-4.0.4/js/highcharts-more.js"></script-->

<style>
	.none {
		display:none;
	}
	.show-grid [class^=col-] {
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #eee;
		border: 1px solid #ddd;		
	}
	
	table, td {
		border: 1px solid #fff !important;
		text-align: center;
	}
	
	.tabla-roja{
		font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		font-size: 13px;
		background: #fff;		
		width: 100%;
		border-collapse: collapse;
		border: 1px solid #fff !important;
		text-align: left;
	}
	.tabla-roja th{
		font-size: 13px;
		font-weight: normal;
		color: #b20000;
		padding: 10px 8px;
		border-bottom: 2px solid #b20000;
		text-align: center;
	}
	.tabla-roja td{
		color: #000;
		padding: 0px;
		border-bottom: 2px solid #b20000 !important;
		text-align: center;
	}
	.tabla-roja tr:hover td{
		color: #6a0000;
		background: #e5e5e5;
	}
	
	.tabla-azul{
		font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		font-size: 13px;
		background: #fff;		
		width: 100%;
		border-collapse: collapse;
		border: 1px solid #fff !important;
		text-align: left;
	}
	.tabla-azul th{
		font-size: 13px;
		font-weight: normal;
		color: #4169E1;
		padding: 10px 8px;
		border-bottom: 2px solid #4169E1;
		text-align: center;
	}
	.tabla-azul td{
		color: #000;
		padding: 0px;
		border-bottom: 2px solid #4169E1 !important;
		text-align: center;
	}
	.tabla-azul tr:hover td{
		color: #7d9eff;
		background: #e5e5e5;
	}
	
	.tabla-amarilla{
		font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		font-size: 13px;
		background: #fff;		
		width: 100%;
		border-collapse: collapse;
		border: 1px solid #fff !important;
		text-align: left;
	}
	.tabla-amarilla th{
		font-size: 13px;
		font-weight: normal;
		color: #059800;
		padding: 10px 8px;
		border-bottom: 2px solid #059800;
		text-align: center;
	}
	.tabla-amarilla td{
		color: #000;
		padding: 0px;
		border-bottom: 2px solid #059800 !important;
		text-align: center;
	}
	.tabla-amarilla tr:hover td{
		color: #6cdb68;
		background: #e5e5e5;
	}
	
	.tabla-negra{
		font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		font-size: 13px;
		background: #fff;		
		width: 100%;
		border-collapse: collapse;
		border: 1px solid #fff !important;
		text-align: left;
	}
	.tabla-negra th{
		font-size: 13px;
		font-weight: normal;
		color: #000;
		padding: 10px 8px;
		border-bottom: 2px solid #000;
		text-align: center;
	}
	.tabla-negra td{
		color: #000;
		padding: 0px;
		border-bottom: 2px solid #000 !important;
		text-align: center;
	}
	.tabla-negra tr:hover td{
		color: #4c4c4c;
		background: #e5e5e5;
	}	
	
	.tabla-radio{
		font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		font-size: 13px;
		background: #fff;		
		width: 100%;
		border-collapse: collapse;
		border: 1px solid #fff !important;
		text-align: left;
	}
	.tabla-radio th{
		font-size: 13px;
		font-weight: normal;
		color: #000;
		padding: 10px 8px;
		border-bottom: 2px solid #000;
		text-align: center;
	}
	.tabla-radio td{
		color: white;
		padding: 0px;
		border-bottom: 2px solid #000 !important;
		text-align: center;
	}
	.tabla-radio .blue{
		color: white;
		background: rgb(82, 82, 255);
	}
	.tabla-radio .violet{
		color: white;
		background: rgb(108, 80, 135);
	}
	.tabla-radio .pink{
		color: white;
		background: rgb(255, 141, 255);
	}
</style>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" style="width: 50%;height: 50%;">
		<div class="modal-content" style="height: auto; min-height: 100%;">
			<div class="modal-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">					
					<li style="float:right;">					
						<button type="button" class="btn btn-danger btn-md pull-right" data-dismiss="modal">Cerrar &nbsp;&nbsp;&times;</button>						
					</li>
				</ul>
				<center>
					<h3>Herramienta no vinculada con la presente aplicación.</h3>
					<br/>
					<img id="imgLayer" class="image-responsive" src="images/isocronas.png"/>
					<br/><br/>
				</center>				
			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" style="width: 100.9%;height: 99.9%;margin: 0px;padding: 0;">
		<div class="modal-content" style="height: auto;min-height: 100%;border-radius: 0;">
			<div class="modal-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a id="menu1" href="#panel1" data-toggle="tab">Población y Hogares</a></li>				
					<li><a id="menu2" href="#panel2" data-toggle="tab">Sociodemográfico</a></li>
					<li><a id="menu3" href="#panel3" data-toggle="tab">Competencia</a></li>
					<li><a id="menu4" href="#panel4" data-toggle="tab">Mapa Selección</a></li>
					
					<li style="float:right;">					
						<button type="button" class="btn btn-danger btn-md pull-right" data-dismiss="modal">Cerrar &nbsp;&nbsp;&times;</button>
						&nbsp;&nbsp;&nbsp;&nbsp;					
						
						<!-- EXPORTAR A EXCEL -->
						<button id="butExportarExcel" title="Exportar a Excel" style="display:none" class="btn btn-success btn-sm pull-right botonExcel" 
							onclick="tablesToExcel([
													'infoTablaCorta',
													'infoTablaLarga',
													'infoTablaCortaHogares',
													'infoTablaCortaHogaresICE',
													'infoTablaIndicadores',
													'infoCompeEns',
													'infoCompeSup',
													'infoCompeDescargable'
													],
													[
													'Población Agrupada',
													'Población',
													'Hogares',
													'ICE Hogares',
													'Indicadores',
													'Competencia - Enseña',
													'Competencia - Tipo',
													'Competencia - Lista'
													], 'Tablas_Entorno.xls', 'Excel')">Exportar a Excel 
							<img width=22 src="images/excel.png" alt="Exportar a Excel"/>
						</button>
						<button id="butExportarExcelMultiple" title="Exportar a Excel" style="display:none" class="btn btn-success btn-sm pull-right botonExcel" 
							onclick="tablesToExcel([
													'infoTablaCortaRadioMultiple',
													'infoTablaCortaHogaresICE',													
													'infoCompeEnsRadioMultiple',
													'infoCompeDescargable'
													],
													[
													'Población',
													'ICE Hogares',
													'Competencia',
													'Competencia - Lista'
													], 'Tablas_Entorno.xls', 'Excel')">Exportar a Excel 
							<img width=22 src="images/excel.png" alt="Exportar a Excel"/>
						</button>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="panel1">
						<br/>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div id="loadingMapaSeleccionRadioMultiple"></div>
								<div id="mapaSeleccionRadioMultiple"></div>
							</div>
							<div class="col-md-3"></div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div id="loadingTablaCortaRadioMultiple"></div>
								<div class="table-responsive">									
									<table id="infoTablaCortaRadioMultiple" class="tabla-radio"></table>
								</div>
							</div>
							<div class="col-md-6">
								<div id="loadingCompetenciaRadioMultiple"></div>								
								<div class="table-responsive">
									<table id="infoCompeEnsRadioMultiple" class="tabla-radio"></table>
								</div>	
							</div>
							
							
												
						</div>
						<div class="row">
							<div id="tituloSecc"></div>
							<div class="col-md-3">
								<div class="table-responsive">
									<div id="tablaSecciones"></div>
								</div>
								
							</div>	
							<div class="col-md-3">
								<div id="chartPob"></div>
								
							</div>
							<div class="col-md-6">
								<div id="loadingTablaCortaHogaresICE"></div>
								<div class="table-responsive">
									<table id="infoTablaCortaHogaresICE" class="tabla-radio" style="display:none;"></table>								
								</div>
							</div>								
						</div>
						<div class="row">
							<div class="col-md-4" id="panel1-1">
								<h4 id="pobEdad1"></h4>
								<div id="loadingInfoEdad"></div>
								<div id="infoEdad" style="width:auto;"></div>
								<div id="loadingTablaCorta"></div>
								<div class="table-responsive">									
									<table id="infoTablaCorta" class="tabla-azul"></table>
								</div>
								
								<div id="loadingTablaLarga"></div>
								<div class="table-responsive">
									<table id="infoTablaLarga" class="tabla-azul"></table>
								</div>
							</div>
							<div class="col-md-4" id="panel1-2">
															
								<h4 id="textoHogares"></h4>
								<div id="loadingHogares"></div>
								<div id="infoHogares" style="width:auto;"></div>
								<div id="loadingTablaCortaHogares"></div>
								<div class="table-responsive">								
									<table id="infoTablaCortaHogares" class="tabla-roja" ></table>
								</div>
							</div>
							<div class="col-md-4" id="panel1-3">
								
								<div id="loadingExtranjeros"></div>
								<h4 id="pobExtranjera1"></h4>
								<h5 id="pobExtranjera2"></h5>
								<h5 id="pobExtranjera3"></h5>
								<div id="infoExtr" style="width:auto;"></div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="panel2">
						<div class="row">
							<div class="col-md-6" id="panel2-1">
								<div id="loadingMapaHogares"></div>
								<center><div id="leyendaHogares"></div></center>
								<div id="mapaHogares"></div>
								<div id="loadingIndicadores"></div>
								<div id="infoIndicadores" style="width:auto;"></div>
							</div>
							<div class="col-md-6" id="panel2-2">
								<h4 id="textoHogaresICE"></h4>
								<div id="loadingHogaresICE"></div>
								<div id="infoHogaresICE" style="width:auto;"></div>								
								<i id="iceMultiple">ICE: Índice de Capacidad Económica en € por hogar</i>
								<div id="loadingTablaIndicadores"></div>
								<div class="table-responsive">								
									<table id="infoTablaIndicadores" class="tabla-negra" style="display:none;"></table>
								</div>
								<div class="table-responsive">								
									<table id="infoTablaIndicadoresMostrar" class="tabla-negra" ></table>
								</div>
							</div>
						</div>			
					</div>
					
					<div class="tab-pane" id="panel3">
						<br/>
						<div class="row">
							<div class="col-md-4" id="panel3-1">
								<div id="loadingCompetencia"></div>
								<h4 id="textoDensidadComercial"></h4>
								<h4 id="textoDensidadComercialNacional"></h4>
								<div class="table-responsive">
									<table id="infoCompeEns" class="tabla-negra"></table>
								</div>
								<div id="loadingCompetenciaSup"></div>
								<div class="table-responsive">
									<table id="infoCompeSup" class="tabla-negra"></table>
								</div>
								<div class="table-responsive">
									<table id="infoCompeDescargable" class="tabla-negra" style="display:none;"></table>
								</div>
							</div>
							<div class="col-md-8" id="panel3-2">
								<div id="loadingMapaCompetencia"></div>
								<center><div id="leyendaCompetencia"></div></center>
								<div id="mapaCompetencia"></div>
							</div>
						</div>			
					</div>
					<div class="tab-pane" id="panel4">
						<br/>
						<div class="row">
							<div class="col-md-1" id="panel4-1"></div>
							<div class="col-md-10" id="panel4-2">
								<div id="loadingMapaSeleccion"></div>
								<div id="mapaSeleccion"></div>
							</div>
							<div class="col-md-1" id="panel4-3"></div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="pane ui-layout-center">
	<div id="loading">
		<img id="loading-image" width=200 src="images/loading.gif" alt="Loading..." />
	</div>
	<div id="map" style="height:100%; margin-right:0px">		
		<div class="div-navTool">			
			<!--<div id='butInfo' title="Información sociodemográfica"><img height=24 src="images/people_color.png"/></div>-->
			<!--<div id='butResumenMes' title="Resumen mes"><img height=24 src="images/calendar.png"/></div>-->
			<br/><br/><br/><br/>
			
			<!--<div id="layertree" style="max-height:415px; font-size:90%; display:none;" class="tree alert alert-warning" ></div>-->
			<div id="layertree" style="max-height: 425px; max-width: 415px; font-size: 85%; display: none;" class="tree alert alert-warning pull-right"></div>
			<div id="zoomDiv" style="max-height: 425px; max-width: 415px; font-size: 85%;" class="tree alert alert-warning pull-right" >
				<input type="radio" name='thing' value='valuable' data-id="zoomHiper" /> Zoom a hiper Alcampo
				<br/>
				<input type="radio" name='thing' value='valuable' data-id="zoomGeo" /> Zoom a municipio	
				<br/><br/>
				<div id="zoomGeo" class="none">	
					<label>Seleccione hiper Alcampo</label>
					<br/>
					<select id="hiperAlcampo" name="hiperAlcampo"></select>
				</div>
				
				<div id="zoomHiper" class="none">
					<label>Seleccione Provincia</label>
					<br/>
					<select id="provincia" name="provincia"></select>
					<br/>
					<label>Seleccione Municipio</label>
					<br/>
					<select id="municipio" name="municipio"></select>
				</div>
			</div>
			<div id="elegirRadio" style="max-height: 425px; max-width: 415px; font-size: 85%; display:none;" class="tree alert alert-warning pull-right" >
				<label for="selectRadio" style="width:auto;">Radio:</label>
				<select id="selectRadio" class="form-control" name="selectRadio">
					<!--<option value="">Seleccione radio</option>-->
					<option value="1000">1000 metros</option>
					<option value="500" selected>500 metros</option>
					<option value="250">250 metros</option>
				</select>				
			</div>
			<div id="elegirTiempo" style="max-height: 425px; max-width: 415px; font-size: 85%; display:none;" class="tree alert alert-warning pull-right" >
				<label for="selectIsocrona" style="width:auto;">Tiempo isocrona:</label>
				<select id="selectIsocrona" class="form-control" name="selectIsocrona">
					<!--<option value="">Seleccione radio</option>-->
					<option value="5" selected>5 minutos</option>
					<option value="10">10 minutos</option>
					<option value="15">15 minutos</option>
					<option value="20">20 minutos</option>
				</select>				
			</div>
		</div>
		<div id="navTool" class="div-navTool">
			<div class="row">
				<div class="col-lg-12">
					<!--<div id='butCoordenadas' title="Cambiar coordenadas"><img height=24 src="images/coordenadas.png"/></div>-->
					<button id="butChartsProvincias" title="Listado de gráficos" style="display:none" class="btn btn-warning pull-right"><img height=42 class="image-responsive" src="images/charts.png"/></button>
					<button id="butChartsMunicipios" title="Listado de gráficos" style="display:none" class="btn btn-warning pull-right"><img height=42 class="image-responsive" src="images/charts.png"/></button>
					<button id="butChartsBarrios" title="Listado de gráficos" style="display:none" class="btn btn-warning pull-right"><img height=42 class="image-responsive" src="images/charts.png"/></button>
					<button id="butChartsCP" title="Listado de gráficos" style="display:none" class="btn btn-warning pull-right"><img height=42 class="image-responsive" src="images/charts.png"/></button>
					<button id="butChartsRadio" title="Listado de gráficos" style="display:none" class="btn btn-warning pull-right"><img height=42 class="image-responsive" src="images/charts.png"/></button>
					<button id="butChartsRadioMultiple" title="Listado de gráficos" style="display:none" class="btn btn-warning pull-right"><img height=42 class="image-responsive" src="images/charts.png"/></button>
					<button id="butChartsSecciones" title="Listado de gráficos" style="display:none" class="btn btn-warning pull-right"><img height=42 class="image-responsive" src="images/charts.png"/></button>
					<button id="butChartsDistritos" title="Listado de gráficos" style="display:none" class="btn btn-warning pull-right"><img height=42 class="image-responsive" src="images/charts.png"/></button>
					
					<div id='butGrupoAnalisis' style="height:35px;" title="Dibujar"><span class="ui-button-text">Análisis de proximidad</span></div>	
					<div id='butZoom' title="Zoom a hiper o municipio">Zoom <img id="imgLayer" height=24 width=24 src="images/lupa.png"/></div>
					<div id='butLayer' title="Listado de las capas">Selección de capas <img id="imgLayer" height=24 width=24 src="images/layer.png"/></div>
					<div id='butInfo' title="Seleccionar polígono">Selección geográfica<img height=24 src="images/coordenadas.png"/></div>
					<div id='butUnselect' title="Limpiar selección">Limpiar selección <img height=24 src="images/people.png"/></div>
					<div id='butInfoWMS' title="Información de las capas"><img height=24 src="images/info.png"/></div>					
					<div id="proximidad" style="display:none;">
						<br/>
						<div id='butInfoAnalisis' title="Dibujar">Distancia fija <img height=24 src="images/radio.png"/></div>
						<div id='butInfoAnalisisMultiple' title="Dibujar">Anillos de distancia <img height=24 src="images/concentricos.png"/></div>						
						<div id='butInfoAnalisisIsocrona' title="Dibujar">Isocronas <img height=24 src="images/time.png"/></div>
					</div>
				</div>
			</div>			
		</div>
		<div id="coord" class="div-coordenadas"></div>		
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
var coordenadasRadio , radio;
var cpSelected = [], cpSelectedTemporal = [], barriosSelected = [], provinciasSelected = [], municipiosSelected = [], seccionesSelected = [], distritosSelected = [], nacionalidad = ["RESTO", "EUROPA", "ASIA", "AMERICA", "AFRICA"], edades = [{capa:"POB_6599", titulo:"Población > 65"}, {capa:"POB_2965", titulo:"Población 29-65"}, {capa:"POB_2029", titulo:"Población 20-29"}, {capa:"POB_1519", titulo:"Población 15-19"}, {capa:"POB_0514", titulo:"Población 5-14"},{capa:"POB_0005", titulo:"Población 0-5"}];
var nombreCapa, competencia, cp_ecom, cp_seleccionar, barrios_seleccionar, provincias_seleccionar, municipios_seleccionar, secciones_seleccionar, distritos_seleccionar,ensenas, loc = null, cod_postal = null, idAlcampo, municipio;
var sel, selLayer;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
var myLayout;
$(document).ready(function () {
	myLayout = $('#content').layout({
		west__size:	'23%',
		east__size:	'35%',
		north__size: '12%',
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
	
	$( "#butInfoAnalisis" ).button().click(function( event ) {
		$("#map").css({'cursor': 'url(images/flechaCoordenadas.png), default'});
		$("#layertree").hide();
		cpSelected = [];
		cpSelectedTemporal = [];
		barriosSelected = [];
		provinciasSelected = [];
		municipiosSelected = [];
		seccionesSelected = [];
		distritosSelected = [];
		$("#butChartsProvincias").hide();
		$("#butChartsMunicipios").hide();
		$("#butChartsBarrios").hide();
		$("#butChartsCP").hide();
		$("#butChartsRadio").hide();
		$("#butChartsRadioMultiple").hide();
		$("#butChartsSecciones").hide();
		$("#butChartsDistritos").hide();
		
		circleLayer.getSource().clear();
		circleLayer2.getSource().clear();
		circleLayer3.getSource().clear();
		
		var capas = map.getLayers().getArray();
		for(var i = capas.length-1; i>=0; i--){
			var nombre = capas[i].get('name');
			if(nombre == 'COD_POSTAL' || nombre == 'BARRIOS_SELECCION' || nombre == 'PROVINCIAS_SELECCION' || nombre == 'MUNICIPIOS_SELECCION' || nombre == 'SECCIONES_SELECCION' || nombre == 'DISTRITOS_SELECCION'){
				map.removeLayer(capas[i]);
			}
		}
		
		tools.capa = false;
		tools.socio = false;
		tools.coordenadas = false;		
		tools.socioAnalisis = true;
		tools.socioAnalisisMultiple = false;
		tools.socioAnalisisIso = false;
	});
	
	$( "#butInfoAnalisisMultiple" ).button().click(function( event ) {
		$("#map").css({'cursor': 'url(images/flechaCoordenadas.png), default'});
		$("#layertree").hide();
		$("#elegirRadio").hide();
		$("#elegirTiempo").hide();
		$("#zoomDiv").hide();
		cpSelected = [];
		cpSelectedTemporal = [];
		barriosSelected = [];
		provinciasSelected = [];
		municipiosSelected = [];
		seccionesSelected = [];
		distritosSelected = [];
		$("#butChartsProvincias").hide();
		$("#butChartsMunicipios").hide();
		$("#butChartsBarrios").hide();
		$("#butChartsCP").hide();
		$("#butChartsRadio").hide();
		$("#butChartsRadioMultiple").hide();
		$("#butChartsSecciones").hide();
		$("#butChartsDistritos").hide();
		
		circleLayer.getSource().clear();
		circleLayer2.getSource().clear();
		circleLayer3.getSource().clear();
		
		var capas = map.getLayers().getArray();
		for(var i = capas.length-1; i>=0; i--){
			var nombre = capas[i].get('name');
			if(nombre == 'COD_POSTAL' || nombre == 'BARRIOS_SELECCION' || nombre == 'PROVINCIAS_SELECCION' || nombre == 'MUNICIPIOS_SELECCION' || nombre == 'SECCIONES_SELECCION' || nombre == 'DISTRITOS_SELECCION'){
				map.removeLayer(capas[i]);
			}
		}
		
		tools.capa = false;
		tools.socio = false;
		tools.coordenadas = false;		
		tools.socioAnalisis = false;
		tools.socioAnalisisMultiple = true;
		tools.socioAnalisisIso = false;
	});
	
	$( "#butInfoAnalisisIsocrona" ).button().click(function( event ) {
		//$("#map").css({'cursor': 'url(images/flechaCoordenadas.png), default'});
		$("#map").css({'cursor': 'default'});
		$("#elegirRadio").hide();
		//$("#elegirTiempo").toggle();
		$("#zoomDiv").hide();		
		$("#map").css({'cursor': 'default'});
		$("#layertree").hide();
		tools.capa = false;
		tools.socio = false;
		tools.coordenadas = false;		
		tools.socioAnalisis = false;
		tools.socioAnalisisMultiple = false;
		tools.socioAnalisisIso = true;
		
	});
	
	$( "#butInfo" ).button().click(function( event ) {
		//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
		//$("#map").css({'cursor': 'pointer'});	
		$("#map").css({'cursor': 'url(images/flechaCoordenadas.png), default'});	
		$("#layertree").hide();
		$("#elegirRadio").hide();
		$("#elegirTiempo").hide();
		$("#zoomDiv").hide();
		circleLayer.getSource().clear();
		circleLayer2.getSource().clear();
		circleLayer3.getSource().clear();
		$("#butChartsRadio").hide();
		$("#butChartsRadioMultiple").hide();
		tools.capa = false;
		tools.socio = true;
		tools.socioAnalisis = false;
		tools.socioAnalisisMultiple = false;
		tools.coordenadas = false;
		tools.socioAnalisisIso = false;
	});
		
	$( "#tabs" ).tabs();
	
	$( "#butCoordenadas" ).button().click(function( event ) {
		$("#map").css({'cursor': 'url(images/flechaCoordenadas.png), default'});
		//$("#map").css({'cursor': 'url(https://cdn3.iconfinder.com/data/icons/bluecoral/Cursor.png), default'});
		//tools.socio = false;
		tools.coordenadas = true;
		tools.capa = false;
	});
	
	$( "#butInfoWMS" ).button().click(function( event ) {
		$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
		//$("#map").css({'cursor': 'url(https://cdn3.iconfinder.com/data/icons/bluecoral/Cursor.png), default'});
		tools.socio = false;
		tools.socioAnalisis = false;
		tools.socioAnalisisMultiple = false;
		tools.capa = true;
		tools.coordenadas = false;
		tools.socioAnalisisIso = false;
		$("#zoomDiv").hide();
		$("#layertree").hide();
		$("#elegirRadio").hide();
		$("#elegirTiempo").hide();
	});
		
	$( "#butUnselect" ).button().click(function( event ) {
		tools.socio = false;
		tools.socioAnalisis = false;
		tools.socioAnalisisMultiple = false;
		tools.coordenadas = false;
		tools.socioAnalisisIso = false;
		$("#map").css({'cursor': 'default'});
		coordenadasRadio = '';				
		radio = '';
		cpSelected = [];
		cpSelectedTemporal = [];
		barriosSelected = [];
		provinciasSelected = [];
		municipiosSelected = [];
		seccionesSelected = [];
		distritosSelected = [];
		$("#butChartsProvincias").hide();
		$("#butChartsMunicipios").hide();
		$("#butChartsBarrios").hide();
		$("#butChartsCP").hide();
		$("#butChartsRadio").hide();
		$("#butChartsRadioMultiple").hide();
		$("#butChartsSecciones").hide();
		$("#butChartsDistritos").hide();
		
		circleLayer.getSource().clear();
		circleLayer2.getSource().clear();
		circleLayer3.getSource().clear();
		
		var capas = map.getLayers().getArray();
		for(var i = capas.length-1; i>=0; i--){
			var nombre = capas[i].get('name');
			if(nombre == 'COD_POSTAL' || nombre == 'BARRIOS_SELECCION' || nombre == 'PROVINCIAS_SELECCION' || nombre == 'MUNICIPIOS_SELECCION' || nombre == 'SECCIONES_SELECCION' || nombre == 'DISTRITOS_SELECCION'){
				map.removeLayer(capas[i]);
			}
		}
	});
	
	$( "#butLayer" ).button().click(function( event ) {
		$("#layertree").toggle();
		$("#zoomDiv").hide();
		$("#elegirRadio").hide();
		$("#elegirTiempo").hide();
	});
	$( "#butZoom" ).button().click(function( event ) {
		$("#zoomDiv").toggle();
		$("#layertree").hide();
		$("#elegirRadio").hide();
		$("#elegirTiempo").hide();
	});	
	$( "#butInfoAnalisis" ).button().click(function( event ) {
		$("#elegirRadio").toggle();
		$("#elegirTiempo").hide();
		$("#zoomDiv").hide();
		$("#layertree").hide();
		$("#elegirTiempo").hide();
	});
	
	$( "#butGrupoAnalisis" ).button().click(function( event ) {
		$("#elegirRadio").hide();
		$("#elegirTiempo").hide();
		$("#zoomDiv").hide();		
		$("#map").css({'cursor': 'default'});
		$("#layertree").hide();
		$("#proximidad").toggle();
	});
	
	$( "#tabs" ).tabs();
	
	$('#hiperAlcampo').selectmenu({
		change: function( event, data ) {
			idAlcampo = data.item.value;
			$.get('index.php?r=tblHiperAlcampo/getCoords&id='+idAlcampo, function (d){
				map.getView().setCenter([parseFloat(d[0].x), parseFloat(d[0].y)]);
				map.getView().setZoom(15);
			});
		}
	});
	
	$('#provincia').selectmenu({
		change: function( event, data ) {
			$( "#butUnselect" ).trigger('click');
			if($("#resMesDialog").is(':visible'))
				$( "#butResumenMes" ).trigger('click');
			provincia = data.item.value;			
			//cp_ecom.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&hiper="+idAlcampo);
						
			$('#municipio').empty();

			$.get('index.php?r=geoNielssen/getMunicipios&provincia='+provincia, function(data2){
								
				$('#municipio').append($('<option>', {
					value: 0,
					text: ''
				}));
				for(var i2 = 0; i2 < data2.length; i2++){
					var opt = $('<option/>', {
						value: data2[i2].municipio,
						text: data2[i2].municipio
					});
										
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
			provincia = $("#provincia").val();				
			$.get('index.php?r=geoNielssen/getCoordsEntorno&provincia='+provincia+'&municipio='+municipio, function (d){
				map.getView().setCenter([parseFloat(d[0].x), parseFloat(d[0].y)]);
				map.getView().setZoom(12);
			});
			
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
		name: " Mapa carreteras",
		visible:true, 
		//url: 'images/ignbase_todo.png',
		source: new ol.source.TileWMS({url: 'http://www.ign.es/wms-inspire/ign-base?',crossorigin: 'anonymous',params: {'LAYERS': 'IGNBaseTodo', 'SRS': 25830, viewparams: "par:data;par:data" }})
	})

	layers.push(ign);

	//COMPETENCIA
	var competencia=[];
	$.each(comp, function(index, element){
		var visi = false;
				
		layer = new ol.layer.Tile({
			//extent: extent,
			id: 'ensenas'+element[0],
			name: element[1],
			visible: visi, 
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&tipo='+element[0], crossorigin: 'anonymous', params: {'LAYERS': 'COMPETENCIA_1', 'SRS': 25830 }
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
			if(element.id == 1 || element.id == 19)
				visi = true;
			
			layer = new ol.layer.Tile({
				//extent: extent,
				id: 'ensenas_'+element.id,
				name: element.etiqueta,
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/sigma/images/logos2/'+element.etiqueta+'.png',
				visible: visi, 
				source: new ol.source.TileWMS({url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&etiqueta='+element.id,crossorigin: 'anonymous',params: {'LAYERS': 'COMPETENCIA_2', 'SRS': 25830 }})
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
		layers: [groupEnsena, tamano]
	});
	layers.push(groupCompe);	
		
	var secciones_censales = new ol.layer.Image({		
		id:'secciones_censales',
		name: " Secciones censales",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=secciones_censales',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'secciones_censales', 'SRS': 25830 }
		})
	})	
	
	var cod_postal = new ol.layer.Image({
		
		id:'cod_postal',
		name: " Códigos postales",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cod_postal_layer',
		source: new ol.source.ImageWMS({url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma.map',crossorigin: 'anonymous',params: {'LAYERS': 'cod_postal_layer', 'SRS': 25830 }})
	})	
	
	var barrios = new ol.layer.Image({		
		id:'barrios',
		name: " Barrios",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=barrios',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'barrios', 'SRS': 25830 }
			})
	})	
	
	var distritos = new ol.layer.Image({		
		id:'distritos',
		name: " Distritos",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=distritos',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'distritos', 'SRS': 25830 }
			})
	})	
	
	var municipios = new ol.layer.Image({		
		id:'municipios',
		name: " Municipios",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=municipios',
		source: new ol.source.ImageWMS({url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map',crossorigin: 'anonymous',params: {'LAYERS': 'municipios', 'SRS': 25830 }})
	})
	
	var features=[];
	var feature, geometry;
	feature = new ol.Feature();	
		
	var fill1 = new ol.style.Fill({
		color: [0, 0, 255, 0.2]
	});	 
	var stroke1 = new ol.style.Stroke({
		color: [0, 0, 255, 1],
		width: 2
	});
	var fill2 = new ol.style.Fill({
		color: [51, 0, 102, 0.4]
	});	 
	var stroke2 = new ol.style.Stroke({
		color: [51, 0, 102, 1],
		width: 2
	});
	var fill3 = new ol.style.Fill({
		color: [255, 0, 255, 0.2]
	});	 
	var stroke3 = new ol.style.Stroke({
		color: [255, 0, 255, 1],
		width: 2
	});
	
	var startTextStyle1 = new ol.style.Text();
	startTextStyle1.setText("label 1");
	startTextStyle1.setFont("Arial");
	startTextStyle1.setFill(new ol.style.Fill({color: 'blue'}));
	
	var style1 = new ol.style.Style({
		image: new ol.style.Circle({
			fill: fill1,
			stroke: stroke1,
			radius: 8
		}),
		fill: fill1,
		stroke: stroke1,
		//text: startTextStyle1,
	});
	
	var style2 = new ol.style.Style({
		image: new ol.style.Circle({
			fill: fill2,
			stroke: stroke2,
			radius: 8
		}),
		fill: fill2,
		stroke: stroke2
	});
	
	var style3 = new ol.style.Style({
		image: new ol.style.Circle({
			fill: fill3,
			stroke: stroke3,
			radius: 8
		}),
		fill: fill3,
		stroke: stroke3
	});	
	
	/*
	feature.setStyle(style1);
	features.push(feature);
	feature.setStyle(style2);
	features.push(feature);
	feature.setStyle(style3);
	features.push(feature);
	*/
	
	var vectorSource = new ol.source.Vector({features: features});
	var vectorSource2 = new ol.source.Vector({features: features});
	var vectorSource3 = new ol.source.Vector({features: features});
	var circleLayer = new ol.layer.Vector({
		id: ' Radio',
		name: ' Radio',
		source: vectorSource
	});
	var circleLayer2 = new ol.layer.Vector({
		id: ' Radio',
		name: ' Radio',
		source: vectorSource2
	});
	var circleLayer3 = new ol.layer.Vector({
		id: ' Radio',
		name: ' Radio',
		source: vectorSource3
	});
	//map.addLayer(circleLayer);	
	
	circleLayer3.setStyle(style3);
	circleLayer2.setStyle(style2);
	circleLayer.setStyle(style1);
	
	//--------- CAPA PARA ISOCRONAS -----------
	
	var isoSource = new ol.source.Vector({features: []});

	var isoLayer = new ol.layer.Vector({
        source: isoSource,
        style: styleFunction,
		id: "isoLayer"
      });
	
	function styleFunction(feature, resolution) {
        var minutos = feature.get('minutos');
		if (minutos == 20) {
          styleCache = new ol.style.Style({
            fill: new ol.style.Fill({color: 'rgba(255,0,0,1)'}),
            stroke: new ol.style.Stroke({color: 'rgba(255,0,0,1)', width:2})
          });
        }
        if (minutos == 12) {
          styleCache = new ol.style.Style({
            fill: new ol.style.Fill({color: 'rgba(45,243,44,0.5)'}),
            stroke: new ol.style.Stroke({color: 'rgba(45,243,44,0.5)', width:2})
          });
        } if (minutos == 8) {
          styleCache = new ol.style.Style({
            fill: new ol.style.Fill({color: 'rgba(246,64,244,0.5)'}),
            stroke: new ol.style.Stroke({color: 'rgba(246,64,244,0.5)', width:2})
          });
        }if (minutos == 5) {
          styleCache = new ol.style.Style({
            fill: new ol.style.Fill({color: 'rgba(255,128,0,0.5'}),
            stroke: new ol.style.Stroke({color: 'rgba(255,128,0,0.5', width:2})
          });
        } if (minutos == 2) {
          styleCache = new ol.style.Style({
            fill: new ol.style.Fill({color: 'rgba(38,38,255,0.5)'}),
            stroke: new ol.style.Stroke({color: 'rgba(38,38,255,0.5)', width:2})
          });
        }return [styleCache];
      }
	//-----------------------------------------
	
	//Descomentar para que funcione provincias
	/*var provincias = new ol.layer.Image({		
		id:'provincias',
		name: " Provincias",
		visible:true,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=provincias',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'provincias', 'SRS': 25830 }
			})
	})

	layers.push(provincias);*/
	layers.push(circleLayer3);	
	layers.push(circleLayer2);
	layers.push(circleLayer);
	layers.push(isoLayer);
	layers.push(municipios);
	layers.push(distritos);
	layers.push(barrios);
	layers.push(cod_postal);
	layers.push(secciones_censales);		
	
	cp_seleccionar = new ol.layer.Image({
		//extent: extent,
		id: 'cp_seleccionar',
		name: "Códigos postales",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cp_seleccionar',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'cp_seleccionar', 'SRS': "EPSG:25830" }
		})
	})
	
	barrios_seleccionar = new ol.layer.Image({
		//extent: extent,
		id: 'barrios_seleccionar',
		name: "Barrios",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=barrios_seleccionar',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'barrios_seleccionar', 'SRS': "EPSG:25830" }
		})
	})
	
	provincias_seleccionar = new ol.layer.Image({
		//extent: extent,
		id: 'provincias_seleccionar',
		name: "Provincias",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=provincias_seleccionar',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'provincias_seleccionar', 'SRS': "EPSG:25830" }
		})
	})
	
	municipios_seleccionar = new ol.layer.Image({
		//extent: extent,
		id: 'municipios_seleccionar',
		name: "Municipios",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=municipios_seleccionar',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'municipios_seleccionar', 'SRS': "EPSG:25830" }
		})
	})
	
	secciones_seleccionar = new ol.layer.Image({
		//extent: extent,
		id: 'secciones_seleccionar',
		name: "Secciones censales",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=secciones_seleccionar',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'secciones_seleccionar', 'SRS': "EPSG:25830" }
		})
	})
	
	distritos_seleccionar = new ol.layer.Image({
		//extent: extent,
		id: 'distritos_seleccionar',
		name: "Distritos",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=distritos_seleccionar',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'distritos_seleccionar', 'SRS': "EPSG:25830" }
		})
	})
		
	/*groupVarios = new ol.layer.Group({
		id:'varios',
		name: ' Varios',
		layers: [provincias, barrios, municipios, cod_postal]
	});
	layers.push(groupVarios);*/	
	
	//---------------------------------------
	
	/*ensenas = new ol.layer.Tile({
		//extent: extent,
		id: 'ensenas',
		name: "Enseñas",
		visible: false, 
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Ensenas',
		source: new ol.source.TileWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map',
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
	
	function unique(list) {
		var result = [];
		$.each(list, function(i, e) {
			if ($.inArray(e, result) == -1) result.push(e);
		});
		return result;
	}
	
	map.on('pointermove', function(event) {
		var coord = event.coordinate;
		$('#coord').html(ol.coordinate.toStringXY(coord, 2) + "<br> ETRS89 Zona 30");
		map.forEachFeatureAtPixel(event.pixel,
		function(feature, layer) {
			if(layer.get('id') == 'isoLayer'){
				console.log(feature.get('minutos') + ":" + feature.get('pob'));
			}
		  });
		  
		
	});
	map.on('singleclick', function(evt) {
		if(tools.socio){
			
			if ($('input[name=capasRadio]:checked').length > 0) {
				if(nombreCapa != ""){
					if(nombreCapa == " Códigos postales"){
						var url = cp_seleccionar.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution(), map.getView().getProjection(),{'INFO_FORMAT': 'text/plain'});
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
								url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&cp='+cod,
								crossorigin: 'anonymous',
									params: {'LAYERS': 'cp_seleccion', 'SRS': "EPSG:25830" }
								})
							})
							map.addLayer(cod_postal);
							//cargarGraficoCP(cpSelected.toString());
							$("#butChartsCP").show();
							$("#butExportarExcel").hide();
							$("#butExportarExcelMultiple").hide();
						})
					}
					
					if(nombreCapa == " Barrios"){
						var url = barrios_seleccionar.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution(), map.getView().getProjection(),{'INFO_FORMAT': 'text/plain'});
						$.get(url, function (data){
							var f = data.split('Feature ');
							cod = f[1].replace(/(\r\n|\n|\r|\:|\s)/gm,"");
							//if(cod.length == 2)
								//cod = '0'+cod;
							barriosSelected.push("'"+cod+"'");
							barrios_seleccion = new ol.layer.Image({
								//extent: extent,
								name: "BARRIOS_SELECCION",
								source: new ol.source.ImageWMS({
								url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&cbarrio='+cod,
								crossorigin: 'anonymous',
									params: {'LAYERS': 'barrios_seleccion', 'SRS': "EPSG:25830" }
								})
							})
							map.addLayer(barrios_seleccion);
							//cargarGraficoBarrios(barriosSelected.toString());
							$("#butChartsBarrios").show();
							$("#butExportarExcel").hide();
							$("#butExportarExcelMultiple").hide();
						})
					}
					
					if(nombreCapa == " Provincias"){
						var url = provincias_seleccionar.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution(), map.getView().getProjection(),{'INFO_FORMAT': 'text/plain'});
						$.get(url, function (data){
							var f = data.split('Feature ');
							cod = f[1].replace(/(\r\n|\n|\r|\:|\s)/gm,"");
							/*if(cod.length == 4)
								cod = '0'+cod;*/
							provinciasSelected.push("'"+cod+"'");
							provincias_seleccion = new ol.layer.Image({
								//extent: extent,
								name: "PROVINCIAS_SELECCION",
								source: new ol.source.ImageWMS({
								url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&cod_prov='+cod,
								crossorigin: 'anonymous',
									params: {'LAYERS': 'provincias_seleccion', 'SRS': "EPSG:25830" }
								})
							})
							map.addLayer(provincias_seleccion);
							//cargarGraficoProvincias(provinciasSelected.toString());
							$("#butChartsProvincias").show();
							$("#butExportarExcel").hide();
							$("#butExportarExcelMultiple").hide();
						})
					}
					
					if(nombreCapa == " Municipios"){
						var url = municipios_seleccionar.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution(), map.getView().getProjection(),{'INFO_FORMAT': 'text/plain'});
						$.get(url, function (data){
							var f = data.split('Feature ');
							cod = f[1].replace(/(\r\n|\n|\r|\:|\s)/gm,"");						
							if(cod.length == 4)
								cod = '0'+cod;
							municipiosSelected.push("'"+cod+"'");
							municipios_seleccion = new ol.layer.Image({
								//extent: extent,
								name: "MUNICIPIOS_SELECCION",
								source: new ol.source.ImageWMS({
								url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&cod_mun='+cod,
								crossorigin: 'anonymous',
									params: {'LAYERS': 'municipios_seleccion', 'SRS': "EPSG:25830" }
								})
							})
							map.addLayer(municipios_seleccion);
							//cargarGraficoMunicipios(municipiosSelected.toString());
							$("#butChartsMunicipios").show();
							$("#butExportarExcel").hide();
							$("#butExportarExcelMultiple").hide();
						})
					}

					if(nombreCapa == " Secciones censales"){					
						var url = secciones_seleccionar.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution(), map.getView().getProjection(),{'INFO_FORMAT': 'text/plain'});
						$.get(url, function (data){
							var f = data.split('Feature ');
							cod = f[1].replace(/(\r\n|\n|\r|\:|\s)/gm,"");												
							if(cod.length == 9)
								cod = '0'+cod;
							seccionesSelected.push("'"+cod+"'");
							secciones_seleccion = new ol.layer.Image({
								//extent: extent,
								name: "SECCIONES_SELECCION",
								source: new ol.source.ImageWMS({
								url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&cod_secc='+cod,
								crossorigin: 'anonymous',
									params: {'LAYERS': 'secciones_seleccion', 'SRS': "EPSG:25830" }
								})
							})
							map.addLayer(secciones_seleccion);
							//cargarGraficoSecciones(seccionesSelected.toString());
							$("#butChartsSecciones").show();
							$("#butExportarExcel").hide();
							$("#butExportarExcelMultiple").hide();
						})
					}
					
					if(nombreCapa == " Distritos"){					
						var url = distritos_seleccionar.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution(), map.getView().getProjection(),{'INFO_FORMAT': 'text/plain'});
						$.get(url, function (data){
							var f = data.split('Feature ');
							cod = f[1].replace(/(\r\n|\n|\r|\:|\s)/gm,"");						
							if(cod.length == 6)
								cod = '0'+cod;
							distritosSelected.push("'"+cod+"'");
							distritos_seleccion = new ol.layer.Image({
								//extent: extent,
								name: "DISTRITOS_SELECCION",
								source: new ol.source.ImageWMS({
								url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_entorno.map&cod_distri='+cod,
								crossorigin: 'anonymous',
									params: {'LAYERS': 'distritos_seleccion', 'SRS': "EPSG:25830" }
								})
							})
							map.addLayer(distritos_seleccion);
							//cargarGraficoSecciones(seccionesSelected.toString());
							$("#butChartsDistritos").show();
							$("#butExportarExcel").hide();
							$("#butExportarExcelMultiple").hide();
						})
					}
				}
			}else{
				//Descomentar para que funcione provincias
				//bootbox.alert("Seleccione previamente una capa (Provincias, municipios, barrios, códigos postales o secciones censales).", function() {});
				//bootbox.alert("Seleccione previamente una capa (Municipios, distritos, barrios, códigos postales o secciones censales).", function() {});
				bootbox.alert({ 
					size: 'small',
					message: "Seleccione previamente una capa (Municipios, distritos, barrios, códigos postales o secciones censales).", 
					callback: function(){ /* your callback code */ }
				})
			}
			
			/*else{				
				//Descomentar para que funcione provincias
				//bootbox.alert("Seleccione previamente una capa (Provincias, municipios, barrios, códigos postales o secciones censales).", function() {});
				bootbox.alert("Seleccione previamente una capa (Municipios, distritos, barrios, códigos postales o secciones censales).", function() {});
			}*/
		}
		if(tools.socioAnalisis){
			
			var arrayRadio = new Array();
			
			map.getLayers().forEach(function(layer) {				
				arrayRadio.push(layer.get('name'));				
			});
			
			var arrayUnico = unique(arrayRadio);
			
			if($.inArray(" Radio", arrayUnico)  != -1){
				circleLayer.getSource().clear();
				coordenadasRadio = evt.coordinate;				
				radio = parseInt($( "#selectRadio" ).val());				
				vectorSource.addFeature(new ol.Feature(new ol.geom.Circle(coordenadasRadio, radio)));
				$("#butChartsRadio").show();
				$("#butExportarExcel").hide();
				$("#butExportarExcelMultiple").hide();
			}
			else{
				alert("Tienes que dibujar el círculo.");
			}
		}
		if(tools.socioAnalisisMultiple){
			
			var arrayRadioMultiple = new Array();
			
			map.getLayers().forEach(function(layer) {				
				arrayRadioMultiple.push(layer.get('name'));				
			});
			
			var arrayUnicoMultiple = unique(arrayRadioMultiple);
			
			if($.inArray(" Radio", arrayUnicoMultiple)  != -1){
				circleLayer.getSource().clear();
				circleLayer2.getSource().clear();
				circleLayer3.getSource().clear();
				coordenadasRadio = evt.coordinate;
				
				vectorSource3.addFeature(new ol.Feature(new ol.geom.Circle(coordenadasRadio, 1000)));				
				vectorSource2.addFeature(new ol.Feature(new ol.geom.Circle(coordenadasRadio, 500)));
				vectorSource.addFeature(new ol.Feature(new ol.geom.Circle(coordenadasRadio, 250)));				
				
				$("#butChartsRadioMultiple").show();
				$("#butExportarExcel").hide();
				$("#butExportarExcelMultiple").hide();
			}
			else{
				alert("Tienes que dibujar el círculo concentrico.");
			}
		}
		if(tools.socioAnalisisIso){
			isoSource.clear();
			var feat = [];
			$("#loading").show();
			var d1 = $.get("http://sit.plansierra.org/sigma/index.php?r=GeoSecciones/getIsochrone&x="+evt.coordinate[0]+"&y="+evt.coordinate[1]+"&tiempo=2", 
				function(data){
					var f = new ol.Feature({geometry: new ol.geom.Polygon($.parseJSON(data.pol).coordinates)});
					f.set("minutos", 2);
					f.set("pob", 0);
					//isoSource.addFeature(f);
					feat[0] = f;
					console.log("HECHO 2");
			}).fail(function() {
				$("#loading").hide();
			  })
			var d2 = $.get("http://sit.plansierra.org/sigma/index.php?r=GeoSecciones/getIsochrone&x="+evt.coordinate[0]+"&y="+evt.coordinate[1]+"&tiempo=5", 
				function(data){
					var f = new ol.Feature({geometry: new ol.geom.Polygon($.parseJSON(data.pol).coordinates)});
					f.set("minutos", 5);
					f.set("pob",0);
					//isoSource.addFeature(f);
					feat[1] = f;
					console.log("HECHO 5");
			}).fail(function() {
				$("#loading").hide();
			  })
			var d3 = $.get("http://sit.plansierra.org/sigma/index.php?r=GeoSecciones/getIsochrone&x="+evt.coordinate[0]+"&y="+evt.coordinate[1]+"&tiempo=8", 
				function(data){
					var f = new ol.Feature({geometry: new ol.geom.Polygon($.parseJSON(data.pol).coordinates)});
					f.set("minutos", 8);
					f.set("pob", 0);
					//isoSource.addFeature(f);
					feat[2] = f;
					console.log("HECHO 8");
			}).fail(function() {
				$("#loading").hide();
			  })
			var d4 = $.get("http://sit.plansierra.org/sigma/index.php?r=GeoSecciones/getIsochrone&x="+evt.coordinate[0]+"&y="+evt.coordinate[1]+"&tiempo=12", 
				function(data){
					var f = new ol.Feature({geometry: new ol.geom.Polygon($.parseJSON(data.pol).coordinates)});
					f.set("minutos", 12);
					//f.set("pob", data.pob[0].total);
					f.set("pob", 0);
					//isoSource.addFeature(f);
					feat[3] = f;
					console.log("HECHO 12");
			}).fail(function() {
				$("#loading").hide();
			  })
			$.when(d1, d2, d3, d4).done(function() {
				isoSource.addFeature(feat[3]);
				setTimeout(function(){
					isoSource.addFeature(feat[2]);
					setTimeout(function(){
						isoSource.addFeature(feat[1]);
						setTimeout(function(){
							isoSource.addFeature(feat[0]);
						}, 500);
					}, 500);
				}, 500);
				
				
				$("#loading").hide();
			});
			/*$.ajax(
				{url:"http://sit.plansierra.org/sigma/index.php?r=GeoSecciones/getIsochrone&x="+evt.coordinate[0]+"&y="+evt.coordinate[1]+"&tiempo=12", 
				success:function(data){
					var f = new ol.Feature({geometry: new ol.geom.Polygon($.parseJSON(data.pol).coordinates)});
					f.set("minutos", 12);
					f.set("pob", data.pob[0].total);
					isoSource.addFeature(f);
				},
				async:false
			})
			$.ajax(
				{url:"http://sit.plansierra.org/sigma/index.php?r=GeoSecciones/getIsochrone&x="+evt.coordinate[0]+"&y="+evt.coordinate[1]+"&tiempo=8", 
				success:function(data){
					var f = new ol.Feature({geometry: new ol.geom.Polygon($.parseJSON(data.pol).coordinates)});
					f.set("minutos", 8);
					f.set("pob", data.pob[0].total);
					isoSource.addFeature(f);
				},
				async:false
			})
			$.ajax(
				{url:"http://sit.plansierra.org/sigma/index.php?r=GeoSecciones/getIsochrone&x="+evt.coordinate[0]+"&y="+evt.coordinate[1]+"&tiempo=5", 
				success:function(data){
					var f = new ol.Feature({geometry: new ol.geom.Polygon($.parseJSON(data.pol).coordinates)});
					f.set("minutos", 5);
					f.set("pob", data.pob[0].total);
					isoSource.addFeature(f);
				},
				async:false
			})
			$.ajax(
				{url:"http://sit.plansierra.org/sigma/index.php?r=GeoSecciones/getIsochrone&x="+evt.coordinate[0]+"&y="+evt.coordinate[1]+"&tiempo=2", 
				success:function(data){
					var f = new ol.Feature({geometry: new ol.geom.Polygon($.parseJSON(data.pol).coordinates)});
					f.set("minutos", 2);
					f.set("pob", data.pob[0].total);
					isoSource.addFeature(f);
				},
				async:false
			})*/
			
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
				bootbox.alert("Seleccione previamente una capa.", function() {});
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
	//$("li.parent_li").find("[data-layerid='Competencia']").next().hide('fast');
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
	
	
	// Handle visibility control
	$('input').on('click', function() {
		var layername = $(this).closest('li').data('layerid');	
		
		//Control Barrios
		if(layername == ' Barrios'){
			tools.socio = false;
			tools.coordenadas = false;
			$("#map").css({'cursor': 'default'});
			cpSelected = [];
			barriosSelected = [];
			provinciasSelected = [];
			municipiosSelected = [];
			seccionesSelected = [];
			distritosSelected = [];
			$("#butChartsProvincias").hide();
			$("#butChartsMunicipios").hide();
			$("#butChartsBarrios").hide();
			$("#butChartsCP").hide();
			$("#butChartsRadio").hide();
			$("#butChartsRadioMultiple").hide();
			$("#butChartsSecciones").hide();
			$("#butChartsDistritos").hide();
			$("#butExportarExcel").hide();
			$("#butExportarExcelMultiple").hide();
			
			circleLayer.getSource().clear();
			circleLayer2.getSource().clear();
			circleLayer3.getSource().clear();
			
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'COD_POSTAL' || nombre == 'BARRIOS_SELECCION' || nombre == 'PROVINCIAS_SELECCION' || nombre == 'MUNICIPIOS_SELECCION' || nombre == 'SECCIONES_SELECCION' || nombre == 'DISTRITOS_SELECCION'){
					map.removeLayer(capas[i]);
				}
			}
			nombreCapa=layername;
			var layer = findBy(map.getLayerGroup(), 'name', layername);		
			layer.setVisible(!layer.getVisible());				
			
			if (layer.getVisible()) {				
				$(this).prop('checked', true); 
				
				var layername = ' Municipios';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Códigos postales';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				//Descomentar para que funcione provincias
				/*var layername = ' Provincias';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);*/
				
				var layername = ' Secciones censales';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Distritos';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
			} else {
				$(this).prop('checked', false); 	
				nombreCapa="";
				
			}
		}
		//Control Municipios
		else if(layername == ' Municipios'){
			tools.socio = false;
			tools.coordenadas = false;
			$("#map").css({'cursor': 'default'});
			cpSelected = [];
			barriosSelected = [];
			provinciasSelected = [];
			municipiosSelected = [];
			seccionesSelected = [];
			distritosSelected = [];
			$("#butChartsProvincias").hide();
			$("#butChartsMunicipios").hide();
			$("#butChartsBarrios").hide();
			$("#butChartsCP").hide();
			$("#butChartsRadio").hide();
			$("#butChartsRadioMultiple").hide();
			$("#butChartsSecciones").hide();
			$("#butChartsDistritos").hide();
			$("#butExportarExcel").hide();
			$("#butExportarExcelMultiple").hide();
			
			circleLayer.getSource().clear();
			circleLayer2.getSource().clear();
			circleLayer3.getSource().clear();
			
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'COD_POSTAL' || nombre == 'BARRIOS_SELECCION' || nombre == 'PROVINCIAS_SELECCION' || nombre == 'MUNICIPIOS_SELECCION' || nombre == 'SECCIONES_SELECCION' || nombre == 'DISTRITOS_SELECCION'){
					map.removeLayer(capas[i]);
				}
			}
			nombreCapa=layername;
			var layer = findBy(map.getLayerGroup(), 'name', layername);		
			layer.setVisible(!layer.getVisible());
			
			if (layer.getVisible()) {
				$(this).prop('checked', true); 
				
				var layername = ' Barrios';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Códigos postales';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				//Descomentar para que funcione provincias
				/*var layername = ' Provincias';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);*/
				
				var layername = ' Secciones censales';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Distritos';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
			} else {
				$(this).prop('checked', false); 
				nombreCapa="";
			}
		}
		//Control Secciones censales
		else if(layername == ' Secciones censales'){
			tools.socio = false;
			tools.coordenadas = false;
			$("#map").css({'cursor': 'default'});
			cpSelected = [];
			barriosSelected = [];
			provinciasSelected = [];
			municipiosSelected = [];
			seccionesSelected = [];
			distritosSelected = [];
			$("#butChartsProvincias").hide();
			$("#butChartsMunicipios").hide();
			$("#butChartsBarrios").hide();
			$("#butChartsCP").hide();
			$("#butChartsRadio").hide();
			$("#butChartsRadioMultiple").hide();
			$("#butChartsSecciones").hide();
			$("#butChartsDistritos").hide();
			$("#butExportarExcel").hide();
			$("#butExportarExcelMultiple").hide();
			
			circleLayer.getSource().clear();
			circleLayer2.getSource().clear();
			circleLayer3.getSource().clear();
			
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'COD_POSTAL' || nombre == 'BARRIOS_SELECCION' || nombre == 'PROVINCIAS_SELECCION' || nombre == 'MUNICIPIOS_SELECCION' || nombre == 'SECCIONES_SELECCION' || nombre == 'DISTRITOS_SELECCION'){
					map.removeLayer(capas[i]);
				}
			}
			nombreCapa=layername;
			var layer = findBy(map.getLayerGroup(), 'name', layername);		
			layer.setVisible(!layer.getVisible());
			
			if (layer.getVisible()) {
				$(this).prop('checked', true); 
				
				var layername = ' Barrios';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Municipios';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Códigos postales';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				//Descomentar para que funcione provincias
				/*var layername = ' Provincias';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);*/
				
				var layername = ' Distritos';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
			} else {
				$(this).prop('checked', false); 
				nombreCapa="";
			}
		}
		//Control Distritos
		else if(layername == ' Distritos'){
			tools.socio = false;
			tools.coordenadas = false;
			$("#map").css({'cursor': 'default'});
			cpSelected = [];
			barriosSelected = [];
			provinciasSelected = [];
			municipiosSelected = [];
			seccionesSelected = [];
			distritosSelected = [];
			$("#butChartsProvincias").hide();
			$("#butChartsMunicipios").hide();
			$("#butChartsBarrios").hide();
			$("#butChartsCP").hide();
			$("#butChartsRadio").hide();
			$("#butChartsRadioMultiple").hide();
			$("#butChartsSecciones").hide();
			$("#butChartsDistritos").hide();
			$("#butExportarExcel").hide();
			$("#butExportarExcelMultiple").hide();
			
			circleLayer.getSource().clear();
			circleLayer2.getSource().clear();
			circleLayer3.getSource().clear();
			
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'COD_POSTAL' || nombre == 'BARRIOS_SELECCION' || nombre == 'PROVINCIAS_SELECCION' || nombre == 'MUNICIPIOS_SELECCION' || nombre == 'SECCIONES_SELECCION' || nombre == 'DISTRITOS_SELECCION'){
					map.removeLayer(capas[i]);
				}
			}
			nombreCapa=layername;
			var layer = findBy(map.getLayerGroup(), 'name', layername);		
			layer.setVisible(!layer.getVisible());
			
			if (layer.getVisible()) {
				$(this).prop('checked', true); 
				
				var layername = ' Barrios';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Municipios';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Códigos postales';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				//Descomentar para que funcione provincias
				/*var layername = ' Provincias';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);*/
				
				var layername = ' Secciones censales';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
			} else {
				$(this).prop('checked', false); 
				nombreCapa="";
			}
		}
		//Control Códigos postales
		else if(layername == ' Códigos postales'){
			tools.socio = false;
			tools.coordenadas = false;
			$("#map").css({'cursor': 'default'});
			cpSelected = [];
			barriosSelected = [];
			provinciasSelected = [];
			municipiosSelected = [];
			seccionesSelected = [];
			distritosSelected = [];
			$("#butChartsProvincias").hide();
			$("#butChartsMunicipios").hide();
			$("#butChartsBarrios").hide();
			$("#butChartsCP").hide();
			$("#butChartsRadio").hide();
			$("#butChartsRadioMultiple").hide();
			$("#butChartsSecciones").hide();
			$("#butChartsDistritos").hide();
			$("#butExportarExcel").hide();
			$("#butExportarExcelMultiple").hide();
			
			circleLayer.getSource().clear();
			circleLayer2.getSource().clear();
			circleLayer3.getSource().clear();
			
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'COD_POSTAL' || nombre == 'BARRIOS_SELECCION' || nombre == 'PROVINCIAS_SELECCION' || nombre == 'MUNICIPIOS_SELECCION' || nombre == 'SECCIONES_SELECCION' || nombre == 'DISTRITOS_SELECCION'){
					map.removeLayer(capas[i]);
				}
			}
			nombreCapa=layername;
			var layer = findBy(map.getLayerGroup(), 'name', layername);		
			layer.setVisible(!layer.getVisible());
		
			if (layer.getVisible()) {
				$(this).prop('checked', true);
				
				var layername = ' Municipios';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Barrios';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				//Descomentar para que funcione provincias
				/*var layername = ' Provincias';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);*/
				
				var layername = ' Secciones censales';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Distritos';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
			} else {
				$(this).prop('checked', false); 
				nombreCapa="";
			}
		}
		//Control Provincias
		else if(layername == ' Provincias'){
			tools.socio = false;
			tools.coordenadas = false;
			$("#map").css({'cursor': 'default'});
			cpSelected = [];
			barriosSelected = [];
			provinciasSelected = [];
			municipiosSelected = [];
			seccionesSelected = [];
			distritosSelected = [];
			$("#butChartsProvincias").hide();
			$("#butChartsMunicipios").hide();
			$("#butChartsBarrios").hide();
			$("#butChartsCP").hide();
			$("#butChartsRadio").hide();
			$("#butChartsRadioMultiple").hide();
			$("#butChartsSecciones").hide();
			$("#butChartsDistritos").hide();
			$("#butExportarExcel").hide();
			$("#butExportarExcelMultiple").hide();
			
			circleLayer.getSource().clear();
			circleLayer2.getSource().clear();
			circleLayer3.getSource().clear();
			
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'COD_POSTAL' || nombre == 'BARRIOS_SELECCION' || nombre == 'PROVINCIAS_SELECCION' || nombre == 'MUNICIPIOS_SELECCION' || nombre == 'SECCIONES_SELECCION' || nombre == 'DISTRITOS_SELECCION'){
					map.removeLayer(capas[i]);
				}
			}
			nombreCapa=layername;
			var layer = findBy(map.getLayerGroup(), 'name', layername);		
			layer.setVisible(!layer.getVisible());
			
			if (layer.getVisible()) {				
				$(this).prop('checked', true);
				
				var layername = ' Municipios';
				var layer = findBy(map.getLayerGroup(), 'name', layername);						
				layer.setVisible(false);
				
				var layername = ' Códigos postales';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Barrios';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Secciones censales';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
				
				var layername = ' Distritos';
				var layer = findBy(map.getLayerGroup(), 'name', layername);		
				layer.setVisible(false);
			} else {
				$(this).prop('checked', false);
				nombreCapa="";				
			}
		}
		/*else{
			tools.socio = false;
			tools.coordenadas = false;
			$("#map").css({'cursor': 'default'});
			cpSelected = [];
			barriosSelected = [];
			provinciasSelected = [];
			municipiosSelected = [];
			seccionesSelected = [];
			distritosSelected = [];
			$("#butChartsProvincias").hide();
			$("#butChartsMunicipios").hide();
			$("#butChartsBarrios").hide();
			$("#butChartsCP").hide();
			$("#butChartsRadio").hide();
			$("#butChartsRadioMultiple").hide();
			$("#butChartsSecciones").hide();
			$("#butChartsDistritos").hide();
			$("#butExportarExcel").hide();
			$("#butExportarExcelMultiple").hide();
			
			circleLayer.getSource().clear();
			circleLayer2.getSource().clear();
			circleLayer3.getSource().clear();
			
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'COD_POSTAL' || nombre == 'BARRIOS_SELECCION' || nombre == 'PROVINCIAS_SELECCION' || nombre == 'MUNICIPIOS_SELECCION' || nombre == 'SECCIONES_SELECCION' || nombre == 'DISTRITOS_SELECCION'){
					map.removeLayer(capas[i]);
				}
			}
			var layername = $(this).closest('li').data('layerid');
			nombreCapa=layername;
			var layer = findBy(map.getLayerGroup(), 'name', layername);		
			layer.setVisible(!layer.getVisible());	
			if (layer.getVisible()) {
				$(this).removeClass('glyphicon-unchecked').addClass('glyphicon-check');
				$(this).prop('checked', true); 			
			} else {
				$(this).removeClass('glyphicon-check').addClass('glyphicon-unchecked');
				$(this).prop('checked', false); 
				nombreCapa="";
			}
		}*/
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
	
	if(layer.get('name') == ' Barrios' || layer.get('name') == ' Municipios' || layer.get('name') == ' Códigos postales' || layer.get('name') == ' Provincias' || layer.get('name') == ' Secciones censales' || layer.get('name') == ' Distritos'){
		if(layer.get('visible')){
			nombreCapa=layer.get('name');
			div = "<li data-layerid='" + name + "'>" +
				"<span><input type='radio' name='capasRadio' class='capasRadio' checked>" + layer.get('name') + "</span>" +
				" ";
		}else{
			div = "<li data-layerid='" + name + "'>" +
				"<span><input type='radio' name='capasRadio' class='capasRadio'>" + layer.get('name') + "</span>" +
				" ";
		}
		if(!layer.getLayers){
			if(layer.get('url')){
				url = layer.get('url');
				div += "<br><img src='" + url +"'></img>";
				
			}
		}
	}else{
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
			elem = div + " <ul class='parent_li'>" + sublayersElem + "</li></ul>";
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

$(':radio').change(function (event) {
    var id = $(this).data('id');
	if(id=="zoomGeo"){
		$('#' + id).addClass('none').siblings().removeClass('none');
	}
	if(id=="zoomHiper"){
		$('#' + id).addClass('none').siblings().removeClass('none');
	}
});

//-------------------------------------------------------------------------------------
//Cargar Gráficos
//-------------------------------------------------------------------------------------
$('#butChartsProvincias').click(function () {
	$('#myModal').modal({
		keyboard: false,
		backdrop: 'static'
	});
	$("#menu1").show();
	$("#menu2").show();
	$("#menu3").show();
	$("#menu4").show();	
	$("#butExportarExcel").hide();
	$("#butExportarExcelMultiple").hide();
	$('#infoExtr').empty();
	$('#pobExtranjera1').empty();
	$('#pobExtranjera2').empty();
	$('#pobExtranjera3').empty();
	$('#infoEdad').empty();
	$('#pobEdad1').empty();
	$("#infoTablaCorta").empty();
	$("#infoTablaCortaRadioMultiple").empty();
	$("#infoTablaLarga").empty();
	$('#textoHogares').empty();
	$('#infoHogares').empty();
	$("#infoTablaCortaHogares").empty();
	$('#textoHogaresICE').empty();
	$('#infoHogaresICE').empty();
	$("#infoTablaCortaHogaresICE").empty();
	$("#infoCompeEns").empty();
	$("#infoCompeEnsRadioMultiple").empty();	
	$("#infoCompeSup").empty();
	$("#infoCompeDescargable").empty();
	$("#mapaHogares").empty();
	$("#mapaSeleccion").empty();
	$("#mapaSeleccionRadioMultiple").empty();
	$("#leyendaHogares").empty();
	$("#leyendaCompetencia").empty();
	$("#mapaCompetencia").empty();
	$("#infoIndicadores").empty();
	$("#infoTablaIndicadores").empty();
	$("#infoTablaIndicadoresMostrar").empty();
	$('#textoDensidadComercial').empty();
	$('#textoDensidadComercialNacional').empty();
	$('#chartPob').empty();
    $('#tablaSecciones').empty();
    cargarGraficoProvincias(provinciasSelected.toString());
});
$('#butChartsMunicipios').click(function () {
	$('#myModal').modal({
		keyboard: false,
		backdrop: 'static'
	});
	$("#menu1").show();
	$("#menu2").show();
	$("#menu3").show();
	$("#menu4").show();
	$("#butExportarExcel").hide();
	$("#butExportarExcelMultiple").hide();
	$('#infoExtr').empty();
	$('#pobExtranjera1').empty();
	$('#pobExtranjera2').empty();
	$('#pobExtranjera3').empty();
	$('#infoEdad').empty();		
	$('#pobEdad1').empty();
	$("#infoTablaCorta").empty();
	$("#infoTablaCortaRadioMultiple").empty();
	$("#infoTablaLarga").empty();
	$('#textoHogares').empty();
	$('#infoHogares').empty();
	$("#infoTablaCortaHogares").empty();
	$('#textoHogaresICE').empty();
	$('#infoHogaresICE').empty();
	$("#infoTablaCortaHogaresICE").empty();
	$("#infoCompeEns").empty();
	$("#infoCompeEnsRadioMultiple").empty();
	$("#infoCompeSup").empty();
	$("#infoCompeDescargable").empty();
	$("#mapaHogares").empty();
	$("#mapaSeleccion").empty();
	$("#mapaSeleccionRadioMultiple").empty();
	$("#leyendaHogares").empty();
	$("#leyendaCompetencia").empty();
	$("#mapaCompetencia").empty();
	$("#infoIndicadores").empty();
	$("#infoTablaIndicadores").empty();
	$("#infoTablaIndicadoresMostrar").empty();
	$('#textoDensidadComercial').empty();
	$('#textoDensidadComercialNacional').empty();
    $('#chartPob').empty();
	$('#tablaSecciones').empty();
    cargarGraficoMunicipios(municipiosSelected.toString());
});
$('#butChartsBarrios').click(function () {
	$('#myModal').modal({
		keyboard: false,
		backdrop: 'static'
	});
	$("#menu1").show();
	$("#menu2").show();
	$("#menu3").show();
	$("#menu4").show();
	$("#butExportarExcel").hide();
	$("#butExportarExcelMultiple").hide();
	$('#infoExtr').empty();
	$('#pobExtranjera1').empty();
	$('#pobExtranjera2').empty();
	$('#pobExtranjera3').empty();
	$('#infoEdad').empty();		
	$('#pobEdad1').empty();
	$("#infoTablaCorta").empty();
	$("#infoTablaCortaRadioMultiple").empty();
	$("#infoTablaLarga").empty();
	$('#textoHogares').empty();
	$('#infoHogares').empty();
	$("#infoTablaCortaHogares").empty();
	$('#textoHogaresICE').empty();
	$('#infoHogaresICE').empty();
	$("#infoTablaCortaHogaresICE").empty();
	$("#infoCompeEns").empty();
	$("#infoCompeEnsRadioMultiple").empty();
	$("#infoCompeSup").empty();
	$("#infoCompeDescargable").empty();
	$("#mapaHogares").empty();
	$("#mapaSeleccion").empty();
	$("#mapaSeleccionRadioMultiple").empty();
	$("#leyendaHogares").empty();
	$("#leyendaCompetencia").empty();
	$("#mapaCompetencia").empty();
	$("#infoIndicadores").empty();
	$("#infoTablaIndicadores").empty();
	$("#infoTablaIndicadoresMostrar").empty();
	$('#textoDensidadComercial').empty();
	$('#textoDensidadComercialNacional').empty();
   $('#chartPob').empty();
   $('#tablaSecciones').empty();
    cargarGraficoBarrios(barriosSelected.toString());
});
$('#butChartsCP').click(function () {
	//FIX ME
	//if(cpSelectedTemporal.toString() != cpSelected.toString()){
		$('#myModal').modal({
			keyboard: false,
			backdrop: 'static'
		});
		$("#menu1").show();
		$("#menu2").show();
		$("#menu3").show();
		$("#menu4").show();
		$("#butExportarExcel").hide();
		$("#butExportarExcelMultiple").hide();
		$('#infoExtr').empty();
		$('#pobExtranjera1').empty();
		$('#pobExtranjera2').empty();
		$('#pobExtranjera3').empty();
		$('#infoEdad').empty();		
		$('#pobEdad1').empty();
		$("#infoTablaCorta").empty();
		$("#infoTablaCortaRadioMultiple").empty();
		$("#infoTablaLarga").empty();
		$('#textoHogares').empty();
		$('#infoHogares').empty();
		$("#infoTablaCortaHogares").empty();
		$('#textoHogaresICE').empty();
		$('#infoHogaresICE').empty();
		$("#infoTablaCortaHogaresICE").empty();
		$("#infoCompeEns").empty();
		$("#infoCompeEnsRadioMultiple").empty();
		$("#infoCompeSup").empty();
		$("#infoCompeDescargable").empty();
		$("#mapaHogares").empty();
		$("#mapaSeleccion").empty();
		$("#mapaSeleccionRadioMultiple").empty();
		$("#leyendaHogares").empty();
		$("#leyendaCompetencia").empty();
		$("#mapaCompetencia").empty();
		$("#infoIndicadores").empty();
		$("#infoTablaIndicadores").empty();
		$("#infoTablaIndicadoresMostrar").empty();
		$('#textoDensidadComercial').empty();
		$('#textoDensidadComercialNacional').empty();
		$('#chartPob').empty();
		$('#tablaSecciones').empty();
		cargarGraficoCP(cpSelected.toString());
	/*}else{
		$("#butChartsCP").show();
	}*/
});

$('#butChartsRadio').click(function () {
	$('#myModal').modal({
		keyboard: false,
		backdrop: 'static'
	});
	$("#menu1").show();
	$("#menu2").show();
	$("#menu3").show();
	$("#menu4").show();
	$("#butExportarExcel").hide();
	$("#butExportarExcelMultiple").hide();
	$('#infoExtr').empty();
	$('#pobExtranjera1').empty();
	$('#pobExtranjera2').empty();
	$('#pobExtranjera3').empty();
	$('#infoEdad').empty();		
	$('#pobEdad1').empty();
	$("#infoTablaCorta").empty();
	$("#infoTablaCortaRadioMultiple").empty();
	$("#infoTablaLarga").empty();
	$('#textoHogares').empty();
	$('#infoHogares').empty();
	$("#infoTablaCortaHogares").empty();
	$('#textoHogaresICE').empty();
	$('#infoHogaresICE').empty();
	$("#infoTablaCortaHogaresICE").empty();
	$("#infoCompeEns").empty();
	$("#infoCompeEnsRadioMultiple").empty();
	$("#infoCompeSup").empty();
	$("#infoCompeDescargable").empty();
	$("#mapaHogares").empty();
	$("#mapaSeleccion").empty();
	$("#mapaSeleccionRadioMultiple").empty();
	$("#leyendaHogares").empty();
	$("#leyendaCompetencia").empty();
	$("#mapaCompetencia").empty();
	$("#infoIndicadores").empty();
	$("#infoTablaIndicadores").empty();
	$("#infoTablaIndicadoresMostrar").empty();
	$('#textoDensidadComercial').empty();
	$('#textoDensidadComercialNacional').empty();
	$('#chartPob').empty();
	$('#tablaSecciones').empty();
	cargarGraficoRadio(coordenadasRadio, radio);
});

$('#butChartsRadioMultiple').click(function () {
	
	$("#menu1").trigger('click');	
	
	$('#myModal').modal({
		keyboard: false,
		backdrop: 'static'
	});
	$("#menu1").hide();
	$("#menu2").hide();
	$("#menu3").hide();
	$("#menu4").hide();
	$("#butExportarExcel").hide();
	$("#butExportarExcelMultiple").hide();
	$('#infoExtr').empty();
	$('#pobExtranjera1').empty();
	$('#pobExtranjera2').empty();
	$('#pobExtranjera3').empty();
	$('#infoEdad').empty();		
	$('#pobEdad1').empty();
	$("#infoTablaCorta").empty();
	$("#infoTablaCortaRadioMultiple").empty();
	$("#infoTablaLarga").empty();
	$('#textoHogares').empty();
	$('#infoHogares').empty();
	$("#infoTablaCortaHogares").empty();
	$('#textoHogaresICE').empty();
	$('#infoHogaresICE').empty();
	$("#infoTablaCortaHogaresICE").empty();
	$("#infoCompeEns").empty();
	$("#infoCompeEnsRadioMultiple").empty();
	$("#infoCompeSup").empty();
	$("#infoCompeDescargable").empty();
	$("#mapaHogares").empty();
	$("#mapaSeleccion").empty();
	$("#mapaSeleccionRadioMultiple").empty();
	$("#leyendaHogares").empty();
	$("#leyendaCompetencia").empty();
	$("#mapaCompetencia").empty();
	$("#infoIndicadores").empty();
	$("#infoTablaIndicadores").empty();
	$("#infoTablaIndicadoresMostrar").empty();
	$('#textoDensidadComercial').empty();
	$('#textoDensidadComercialNacional').empty();
	$('#chartPob').empty();
	$('#tablaSecciones').empty();
	cargarGraficoRadioMultiple(coordenadasRadio);
});

$('#butChartsSecciones').click(function () {
	$('#myModal').modal({
		keyboard: false,
		backdrop: 'static'
	});
	$("#menu1").show();
	$("#menu2").show();
	$("#menu3").show();
	$("#menu4").show();
	$("#butExportarExcel").hide();
	$("#butExportarExcelMultiple").hide();
	$('#infoExtr').empty();
	$('#pobExtranjera1').empty();
	$('#pobExtranjera2').empty();
	$('#pobExtranjera3').empty();
	$('#infoEdad').empty();		
	$('#pobEdad1').empty();
	$("#infoTablaCorta").empty();
	$("#infoTablaCortaRadioMultiple").empty();
	$("#infoTablaLarga").empty();
	$('#textoHogares').empty();
	$('#infoHogares').empty();
	$("#infoTablaCortaHogares").empty();
	$('#textoHogaresICE').empty();
	$('#infoHogaresICE').empty();
	$("#infoTablaCortaHogaresICE").empty();
	$("#infoCompeEns").empty();
	$("#infoCompeEnsRadioMultiple").empty();
	$("#infoCompeSup").empty();
	$("#infoCompeDescargable").empty();
	$("#mapaHogares").empty();
	$("#mapaSeleccion").empty();
	$("#mapaSeleccionRadioMultiple").empty();
	$("#leyendaHogares").empty();
	$("#leyendaCompetencia").empty();
	$("#mapaCompetencia").empty();
	$("#infoIndicadores").empty();
	$("#infoTablaIndicadores").empty();
	$("#infoTablaIndicadoresMostrar").empty();
	$('#textoDensidadComercial').empty();
	$('#textoDensidadComercialNacional').empty();
    cargarGraficoSecciones(seccionesSelected.toString());
});
$('#butChartsDistritos').click(function () {
	$('#myModal').modal({
		keyboard: false,
		backdrop: 'static'
	});
	$("#menu1").show();
	$("#menu2").show();
	$("#menu3").show();
	$("#menu4").show();
	$("#butExportarExcel").hide();
	$("#butExportarExcelMultiple").hide();
	$('#infoExtr').empty();
	$('#pobExtranjera1').empty();
	$('#pobExtranjera2').empty();
	$('#pobExtranjera3').empty();
	$('#infoEdad').empty();		
	$('#pobEdad1').empty();
	$("#infoTablaCorta").empty();
	$("#infoTablaCortaRadioMultiple").empty();
	$("#infoTablaLarga").empty();
	$('#textoHogares').empty();
	$('#infoHogares').empty();
	$("#infoTablaCortaHogares").empty();
	$('#textoHogaresICE').empty();
	$('#infoHogaresICE').empty();
	$("#infoTablaCortaHogaresICE").empty();
	$("#infoCompeEns").empty();
	$("#infoCompeEnsRadioMultiple").empty();
	$("#infoCompeSup").empty();
	$("#infoCompeDescargable").empty();
	$("#mapaHogares").empty();
	$("#mapaSeleccion").empty();
	$("#mapaSeleccionRadioMultiple").empty();
	$("#leyendaHogares").empty();
	$("#leyendaCompetencia").empty();
	$("#mapaCompetencia").empty();
	$("#infoIndicadores").empty();
	$("#infoTablaIndicadores").empty();
	$("#infoTablaIndicadoresMostrar").empty();
	$('#textoDensidadComercial').empty();
	$('#textoDensidadComercialNacional').empty();
    cargarGraficoDistritos(distritosSelected.toString());
});

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Cargar Gráficos Provincias
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
/*function cargarGraficoProvincias(provincias){
	totalPoblacion = 0;
	$.get('index.php?r=tblExtranjeros/getExtranjerosProvincia&provincia=' + provinciasSelected.toString(), function (data){		
		myLayout.open('east');
		var datos = [];
		$k = 0;
		var resto = data.total;
		$.each(data.datos, function(index, value){
			if($k == 10)
				return false;
			datos.push([index, value]);
			resto = resto - value;
			$k++;
		});
		datos.push(["Resto", resto]);							
		$('#pobExtranjera1').append('Población Extranjera Selección: ' + data.total.toLocaleString('es-ES', {maximumFractionDigits:0}));
		$('#pobExtranjera2').append('% Población Extranjera Selección: ' + data.totalSeleccion.toFixed(1) + '%');
		$('#pobExtranjera3').append('% Población Extranjera España: ' + data.totalEspana.toFixed(1) + '%');
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
	
	//-------------------------------------------------------------------------------------
	//Mostrar el botón que abre el modal con los gráficos y tablas.
	//-------------------------------------------------------------------------------------	
	$("#butChartsProvincias").show();
}*/

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Cargar Gráficos Municipios
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function cargarGraficoMunicipios(municipios){
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA HOGARES
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');			
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionMunicipios&cp=' + municipiosSelected.toString(),
		type: 'GET',
		success: function(data){ 			
			$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
			$('#loadingMapaHogares').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionMunicipios&cp=' + municipiosSelected.toString(),
				type: 'GET',
				success: function(data){ 			
					$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
					$('#loadingMapaHogares').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionMunicipios&cp=' + municipiosSelected.toString(),
						type: 'GET',
						success: function(data){ 			
							$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
							$('#loadingMapaHogares').empty();
						},
						error: function(data) {
							$("#mapaHogares").empty();
							$("#leyendaHogares").empty();
							$("#mapaHogares").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaHogares').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------	
	
	totalPoblacion = 0;
	$("#loadingExtranjeros").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.get('index.php?r=tblExtranjeros/getExtranjerosMunicipio&municipio=' + municipiosSelected.toString(), function (data){
		myLayout.open('east');
		var datos = [];
		$k = 0;
		var resto = data.total;
		$.each(data.datos, function(index, value){
			if($k == 10)
				return false;
			datos.push([index, value]);
			resto = resto - value;
			$k++;
		});
		datos.push(["Resto", resto]);							
		$('#pobExtranjera1').append('Población Extranjera Selección: ' + data.total.toLocaleString('es-ES', {maximumFractionDigits:0}));
		$('#pobExtranjera2').append('% Población Extranjera Selección: ' + data.totalSeleccion.toFixed(1) + '%');
		$('#pobExtranjera3').append('% Población Extranjera España: ' + data.totalEspana.toFixed(1) + '%');
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
		$('#loadingExtranjeros').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 población
	//-------------------------------------------------------------------------------------
	totalPoblacion = 0;	
	$("#loadingInfoEdad").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoEntornoPoblacionMunicipios&id=' + municipiosSelected.toString(), function (data3){		
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalPoblacion += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#pobEdad1').show();
		$('#pobEdad1').append('Población Selección: ' + totalPoblacion.toLocaleString('es-ES', {maximumFractionDigits:0}));
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
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Población',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Población'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Población',
				//innerSize: '50%',
				color:'#4169E1',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#7d9eff',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingInfoEdad').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de la población en la pestaña 1
	//-------------------------------------------------------------------------------------	
	$("#loadingTablaCorta").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaMunicipios&cp=' + municipiosSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 5-14</td>"));
		row.append($("<td>" + data3['pob_0514'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 20-29</td>"));
		row.append($("<td>" + data3['pob_2029'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 30-65</td>"));
		row.append($("<td>" + data3['pob_2965'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: >65</td>"));
		row.append($("<td>" + data3['pob_6599'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCorta').empty();
	});
		
	//-------------------------------------------------------------------------------------
	//Tabla larga de la población en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaLarga").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaLargaMunicipios&cp=' + municipiosSelected.toString(), function (data3){		
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row);
		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 5-9</td>"));
		row.append($("<td>" + data3['pob_0609'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 10-14</td>"));
		row.append($("<td>" + data3['pob_1014'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 20-24</td>"));
		row.append($("<td>" + data3['pob_2024'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 25-29</td>"));
		row.append($("<td>" + data3['pob_2529'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 30-34</td>"));
		row.append($("<td>" + data3['pob_3034'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 35-39</td>"));
		row.append($("<td>" + data3['pob_3539'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 40-44</td>"));
		row.append($("<td>" + data3['pob_4044'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 45-49</td>"));
		row.append($("<td>" + data3['pob_4549'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 50-59</td>"));
		row.append($("<td>" + data3['pob_5059'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 60-64</td>"));
		row.append($("<td>" + data3['pob_6064'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 65-75</td>"));
		row.append($("<td>" + data3['pob_6575'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: >75</td>"));
		row.append($("<td>" + data3['pob_75'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaLarga').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//-------------------------------------------------------------------------------------
	totalHogares = 0;	
	$("#loadingHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresMunicipios&id=' + municipiosSelected.toString(), function (data3){
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogares += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#textoHogares').append('Estimación NºHogares Selección: ' + totalHogares.toLocaleString('es-ES', {maximumFractionDigits:0}));
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogares').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares',
				//innerSize: '50%',
				color:'#b20000',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#ff3f3f',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingHogares').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresMunicipios&cp=' + municipiosSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>1</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>2</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>3</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>4</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>>4</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCortaHogares').empty();
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA SELECCIÓN
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaSeleccion").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaSeleccionMunicipios&cp=' + municipiosSelected.toString(),
		type: 'GET',
		success: function(data){ 			
			$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$('#loadingMapaSeleccion').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaSeleccionMunicipios&cp=' + municipiosSelected.toString(),
				type: 'GET',
				success: function(data){ 			
					$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$('#loadingMapaSeleccion').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaSeleccionMunicipios&cp=' + municipiosSelected.toString(),
						type: 'GET',
						success: function(data){ 			
							$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$('#loadingMapaSeleccion').empty();
						},
						error: function(data) {
							$("#mapaSeleccion").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaSeleccion').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE
	//-------------------------------------------------------------------------------------
	totalHogaresICE = 0;	
	valorBase = 0;
	$("#loadingHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresICEMunicipios&id=' + municipiosSelected.toString(), function (data3){
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogaresICE += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})		
		valorBase += data3[3];		
		
		$('#textoHogaresICE').append('Estimación ICE Hogares Selección (Base 100=España): ' + valorBase);
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogaresICE').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares Renta') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares Renta',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares renta'
						,
						style: {
							color: '#059800'
						}
					},
					labels: {
						format: '{value}',
						style: {
							color: '#059800'
						}
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares Renta',
				//innerSize: '50%',
				color:'#059800',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#6cdb68',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingHogaresICE').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresICEMunicipios&cp=' + municipiosSelected.toString(), function (data3){
		$("#infoTablaCortaHogaresICE").hide();
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row);
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Renta Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Bajo</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Bajo</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Alto</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>>Alto</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCortaHogaresICE').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Competencia
	//-------------------------------------------------------------------------------------
	
	$("#loadingCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.get('index.php?r=geoCp/getCompeMunicipios&cp='+ municipiosSelected.toString(), function (data3){
		
		$("#infoCompeEns").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalNum = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		var i = 0;
		var c = 0, s = 0;
		$.each(data3, function(index, value){
			if(i<10){
				var row = $("<tr />")
				$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td>" + value.ensena + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}else{
				c += value.total;
				s += value.superficie;
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}
			i++;
		});
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Resto</td>"));
		row.append($("<td>" + s.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + c.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var densidadComercial = (totalSup / totalPoblacion) * 1000;				
		var densidadComercialNacional = (totalSupNacional / totalPoblacionNacional) * 1000;		
		$('#textoDensidadComercial').append('Densidad Comercial Selección: ' + densidadComercial.toFixed(1).replace(".", ","));
		$('#textoDensidadComercialNacional').append('Densidad Comercial Nacional: ' + densidadComercialNacional.toFixed(1).replace(".", ","));
		$('#loadingCompetencia').empty();
	});
	
	$("#loadingCompetenciaSup").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=geoCp/getCompeSupMunicipios&cp='+ municipiosSelected.toString(), function (data3){						
		$("#infoCompeSup").empty();
		var totalSup = 0;
		var totalNum = 0;
		
		var row = $("<tr />")
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Tipo</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		$.each(data3, function(index, value){
				var row = $("<tr />")
				$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td >" + value.tipo + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalNum += value.total;
		});
		var row = $("<tr />");
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + totalNum .toLocaleString('es-ES', {maximumFractionDigits:0})+ "</b></td>"));
		$('#loadingCompetenciaSup').empty();
	});
	
	$.get('index.php?r=geoCp/getCompeDescargableMunicipios&cp='+ municipiosSelected.toString(), function (data3){
		
		$("#infoCompeDescargable").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Dirección</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		row.append($("<th><b>Código Postal</b></th>"));
		row.append($("<th><b>Provincia</b></th>"));
		row.append($("<th><b>Municipio</b></th>"));
		var i = 1;
		
		$.each(data3, function(index, value){			
			var row = $("<tr />")
			$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td>" + value.ensena + "</td>"));
			row.append($("<td>" + value.superficie + "</td>"));
			row.append($("<td>" + value.direccion + "</td>"));
			row.append($("<td>" + value.numero + "</td>"));
			row.append($("<td>" + value.cp + "</td>"));
			row.append($("<td>" + value.provincia + "</td>"));
			row.append($("<td>" + value.municipio + "</td>"));
			totalSup += value.superficie;
			totalSupNacional = value.superficienacional;
			totalPoblacion = value.poblacion;
			totalPoblacionNacional = value.poblacionnacional;			
			i++;			
		});
		
		var row = $("<tr />");
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
	});
	
	//-------------------------------------------------------------------------------------
	//Tabla indicadores
	//-------------------------------------------------------------------------------------
	$("#loadingTablaIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	$.get('index.php?r=GeoSecciones/infoTablaIndicadoresMunicipios&cp=' + municipiosSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
							
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));*/
		
		//--------------------------------------------------------------------------------------------------------------
		//EXCEL
		//--------------------------------------------------------------------------------------------------------------
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['accesibilidad'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 2 && data3['accesibilidad'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 4 && data3['accesibilidad'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidad'] >= 6 && data3['accesibilidad'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidad'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['accesibilidadNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 2 && data3['accesibilidadNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 4 && data3['accesibilidadNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidadNacional'] >= 6 && data3['accesibilidadNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidadNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
					
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['nivel_estudios'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 2 && data3['nivel_estudios'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 4 && data3['nivel_estudios'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudios'] >= 6 && data3['nivel_estudios'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudios'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['nivel_estudiosNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 2 && data3['nivel_estudiosNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 4 && data3['nivel_estudiosNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 6 && data3['nivel_estudiosNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudiosNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));
					
		$('#loadingTablaIndicadores').empty();
		$("#loadingIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');				
		
		//Gráfico de araña
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$(function () {
			$('#infoIndicadores').highcharts({
				chart: {
					polar: true,
					type: 'line'
				},
				title: {
					text: '',
					x: -80
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
				pane: {
					size: '80%'
				},
				xAxis: {
					categories: [//'Índice de Envejecimiento',
								'Tasa de Dependencia', 
								'Tasa de Infancia',
								'Tasa de Vejez',
								//'Índice de Desempleo SEPE (Municipio Seleccionado)', 
								'Accesibilidad',
								'Nivel de Estudios', 
								'Índice Nivel Económico'],
					tickmarkPlacement: 'on',
					lineWidth: 0
				},
				yAxis: {
					gridLineInterpolation: 'polygon',
					lineWidth: 0,
					min: 0
				},
				tooltip: {
					enabled: true,
					shared: true,
					pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.1f}</b><br/>'
				},
				legend: {
					align: 'right',
					verticalAlign: 'top',
					y: 50,
					layout: 'vertical'
				},
				series: [{
					name: '% Selección',
					data: [
						//data3['porcentajeEnvejecimientoSeleccionGrafico'], 
							data3['porcentajeDependenciaSeleccionGrafico'], 
							data3['porcentajeInfanciaSeleccionGrafico'], 
							data3['porcentajeVejezSeleccionGrafico'], 
							//data3['cifraDesempleoPorcentaje'], 
							data3['accesibilidadSeleccionGrafico'], 
							data3['nivel_estudiosSeleccionGrafico'], 
							data3['ICE']
						],
					pointPlacement: 'on'
				}, {
					name: '% Nacional',
					data: [//100,//data3['porcentajeEnvejecimientoNacional'], 
							100,//data3['porcentajeDependenciaNacional'], 
							100,
							100,
							//100,//data3['cifraDesempleoNacional'], 							
							100,//data3['accesibilidadNacionalPorcentaje'], 							
							100,//data3['nivel_estudiosNacionalPorcentaje'], 
							100],//ICE
					pointPlacement: 'on'
				}]

			});
		});		
		$('#loadingIndicadores').empty();
		$('#butExportarExcel').fadeIn(1500);
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA COMPETENCIA
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');	
	$.ajax({
		url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoMunicipios&cp=' + municipiosSelected.toString(),
		type: 'GET',
		success: function(data){ 
			$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
			$('#loadingMapaCompetencia').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoMunicipios&cp=' + municipiosSelected.toString(),
				type: 'GET',
				success: function(data){ 
					$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
					$('#loadingMapaCompetencia').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoMunicipios&cp=' + municipiosSelected.toString(),
						type: 'GET',
						success: function(data){ 
							$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
							$('#loadingMapaCompetencia').empty();
						},
						error: function(data) {
							$("#mapaCompetencia").empty();
							$("#leyendaCompetencia").empty();
							$("#mapaCompetencia").append("<h4>En la zona seleccionada no existe ningún centro con superficie mayor a 1000m².</h4>");
							$('#loadingMapaCompetencia').empty();
						}
					});
				}
			});
		}
	});	
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Mostrar el botón que abre el modal con los gráficos y tablas.
	//-------------------------------------------------------------------------------------	
	$("#butChartsMunicipios").show();
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Cargar Gráficos Barrios
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function cargarGraficoBarrios(barrios){
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA HOGARES
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');			
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionBarrios&cp=' + barriosSelected.toString(),
		type: 'GET',
		success: function(data){ 			
			$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
			$('#loadingMapaHogares').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionBarrios&cp=' + barriosSelected.toString(),
				type: 'GET',
				success: function(data){ 			
					$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
					$('#loadingMapaHogares').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionBarrios&cp=' + barriosSelected.toString(),
						type: 'GET',
						success: function(data){ 			
							$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
							$('#loadingMapaHogares').empty();
						},
						error: function(data) {
							$("#mapaHogares").empty();
							$("#leyendaHogares").empty();
							$("#mapaHogares").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaHogares').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	totalPoblacion = 0;
	$("#loadingExtranjeros").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	$.get('index.php?r=tblExtranjeros/getExtranjerosBarrio&barrio=' + barriosSelected.toString(), function (data){
		myLayout.open('east');
		var datos = [];
		$k = 0;
		var resto = data.total;
		$.each(data.datos, function(index, value){
			if($k == 10)
				return false;
			datos.push([index, value]);
			resto = resto - value;
			$k++;
		});
		datos.push(["Resto", resto]);							
		$('#pobExtranjera1').append('Población Extranjera Selección: ' + data.total.toLocaleString('es-ES', {maximumFractionDigits:0}));
		$('#pobExtranjera2').append('% Población Extranjera Selección: ' + data.totalSeleccion.toFixed(1) + '%');
		$('#pobExtranjera3').append('% Población Extranjera España: ' + data.totalEspana.toFixed(1) + '%');
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
			title:{
				text:''
			},
			subtitle: {
				text: '' 
			},
			credits: {
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
		$('#loadingExtranjeros').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 población
	//-------------------------------------------------------------------------------------
	totalPoblacion = 0;	
	$("#loadingInfoEdad").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');			
	$.get('index.php?r=GeoSecciones/infoEntornoPoblacionBarrios&id=' + barriosSelected.toString(), function (data3){		
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalPoblacion += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#pobEdad1').show();
		$('#pobEdad1').append('Población Selección: ' + totalPoblacion.toLocaleString('es-ES', {maximumFractionDigits:0}));
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
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Población',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Población'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Población',
				//innerSize: '50%',
				color:'#4169E1',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#7d9eff',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});		
		$('#loadingInfoEdad').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de la población en la pestaña 1
	//-------------------------------------------------------------------------------------	
	$("#loadingTablaCorta").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');	
	$.get('index.php?r=GeoSecciones/infoTablaCortaBarrios&cp=' + barriosSelected.toString(), function (data3){
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 5-14</td>"));
		row.append($("<td>" + data3['pob_0514'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 20-29</td>"));
		row.append($("<td>" + data3['pob_2029'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 30-65</td>"));
		row.append($("<td>" + data3['pob_2965'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: >65</td>"));
		row.append($("<td>" + data3['pob_6599'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));		
		$('#loadingTablaCorta').empty();
	});
		
	//-------------------------------------------------------------------------------------
	//Tabla larga de la población en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaLarga").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');			
	$.get('index.php?r=GeoSecciones/infoTablaLargaBarrios&cp=' + barriosSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 		
		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 5-9</td>"));
		row.append($("<td>" + data3['pob_0609'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 10-14</td>"));
		row.append($("<td>" + data3['pob_1014'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 20-24</td>"));
		row.append($("<td>" + data3['pob_2024'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 25-29</td>"));
		row.append($("<td>" + data3['pob_2529'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 30-34</td>"));
		row.append($("<td>" + data3['pob_3034'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 35-39</td>"));
		row.append($("<td>" + data3['pob_3539'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 40-44</td>"));
		row.append($("<td>" + data3['pob_4044'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 45-49</td>"));
		row.append($("<td>" + data3['pob_4549'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 50-59</td>"));
		row.append($("<td>" + data3['pob_5059'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 60-64</td>"));
		row.append($("<td>" + data3['pob_6064'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 65-75</td>"));
		row.append($("<td>" + data3['pob_6575'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: >75</td>"));
		row.append($("<td>" + data3['pob_75'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaLarga').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//-------------------------------------------------------------------------------------
	totalHogares = 0;
	$("#loadingHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');			
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresBarrios&id=' + barriosSelected.toString(), function (data3){
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogares += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#textoHogares').append('Estimación NºHogares Selección: ' + totalHogares.toLocaleString('es-ES', {maximumFractionDigits:0}));
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogares').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares',
				//innerSize: '50%',
				color:'#b20000',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#ff3f3f',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		$('#loadingHogares').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresBarrios&cp=' + barriosSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>1</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>2</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>3</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>4</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>>4</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));		
		$('#loadingTablaCortaHogares').empty();
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA SELECCIÓN
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaSeleccion").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaSeleccionBarrios&cp=' + barriosSelected.toString(),
		type: 'GET',
		success: function(data){ 			
			$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$('#loadingMapaSeleccion').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaSeleccionBarrios&cp=' + barriosSelected.toString(),
				type: 'GET',
				success: function(data){ 			
					$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$('#loadingMapaSeleccion').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaSeleccionBarrios&cp=' + barriosSelected.toString(),
						type: 'GET',
						success: function(data){ 			
							$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$('#loadingMapaSeleccion').empty();
						},
						error: function(data) {
							$("#mapaSeleccion").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaSeleccion').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE
	//-------------------------------------------------------------------------------------
	totalHogaresICE = 0;	
	valorBase = 0;
	$("#loadingHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresICEBarrios&id=' + barriosSelected.toString(), function (data3){		
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogaresICE += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})		
		valorBase += data3[3];		
		
		$('#textoHogaresICE').append('Estimación ICE Hogares Selección (Base 100=España): ' + valorBase);
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogaresICE').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares Renta') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares Renta',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares renta'
						,
						style: {
							color: '#059800'
						}
					},
					labels: {
						format: '{value}',
						style: {
							color: '#059800'
						}
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares Renta',
				//innerSize: '50%',
				color:'#059800',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#6cdb68',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});		
		$('#loadingHogaresICE').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresICEBarrios&cp=' + barriosSelected.toString(), function (data3){
		$("#infoTablaCortaHogaresICE").hide();
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Renta Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Bajo</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Bajo</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Alto</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>>Alto</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCortaHogaresICE').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Competencia
	//-------------------------------------------------------------------------------------
	
	$("#loadingCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=geoCp/getCompeBarrios&cp='+ barriosSelected.toString(), function (data3){
		$("#infoCompeEns").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalNum = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		var i = 0;
		var c = 0, s = 0;
		$.each(data3, function(index, value){
			if(i<10){
				var row = $("<tr />")
				$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td>" + value.ensena + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}else{
				c += value.total;
				s += value.superficie;
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}
			i++;
		});
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Resto</td>"));
		row.append($("<td>" + s.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + c.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var densidadComercial = (totalSup / totalPoblacion) * 1000;				
		var densidadComercialNacional = (totalSupNacional / totalPoblacionNacional) * 1000;		
		$('#textoDensidadComercial').append('Densidad Comercial Selección: ' + densidadComercial.toFixed(1).replace(".", ","));
		$('#textoDensidadComercialNacional').append('Densidad Comercial Nacional: ' + densidadComercialNacional.toFixed(1).replace(".", ","));
		$('#loadingCompetencia').empty();
	});
	
	$("#loadingCompetenciaSup").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=geoCp/getCompeSupBarrios&cp='+ barriosSelected.toString(), function (data3){
		$("#infoCompeSup").empty();
		var totalSup = 0;
		var totalNum = 0;
		
		var row = $("<tr />")
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Tipo</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		$.each(data3, function(index, value){
				var row = $("<tr />")
				$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td >" + value.tipo + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalNum += value.total;
		});
		var row = $("<tr />");
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		
		$('#loadingCompetenciaSup').empty();
	});
	
	$.get('index.php?r=geoCp/getCompeDescargableBarrios&cp='+ barriosSelected.toString(), function (data3){	
		
		$("#infoCompeDescargable").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Dirección</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		row.append($("<th><b>Código Postal</b></th>"));
		row.append($("<th><b>Provincia</b></th>"));
		row.append($("<th><b>Municipio</b></th>"));
		var i = 1;
		
		$.each(data3, function(index, value){			
			var row = $("<tr />")
			$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td>" + value.ensena + "</td>"));
			row.append($("<td>" + value.superficie + "</td>"));
			row.append($("<td>" + value.direccion + "</td>"));
			row.append($("<td>" + value.numero + "</td>"));
			row.append($("<td>" + value.cp + "</td>"));
			row.append($("<td>" + value.provincia + "</td>"));
			row.append($("<td>" + value.municipio + "</td>"));
			totalSup += value.superficie;
			totalSupNacional = value.superficienacional;
			totalPoblacion = value.poblacion;
			totalPoblacionNacional = value.poblacionnacional;			
			i++;			
		});
		
		var row = $("<tr />");
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
	});
	
	//-------------------------------------------------------------------------------------
	//Tabla indicadores
	//-------------------------------------------------------------------------------------
	$("#loadingTablaIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	$.get('index.php?r=GeoSecciones/infoTablaIndicadoresBarrios&cp=' + barriosSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
							
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));*/
		
		//--------------------------------------------------------------------------------------------------------------
		//EXCEL
		//--------------------------------------------------------------------------------------------------------------
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['accesibilidad'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 2 && data3['accesibilidad'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 4 && data3['accesibilidad'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidad'] >= 6 && data3['accesibilidad'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidad'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['accesibilidadNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 2 && data3['accesibilidadNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 4 && data3['accesibilidadNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidadNacional'] >= 6 && data3['accesibilidadNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidadNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
					
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['nivel_estudios'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 2 && data3['nivel_estudios'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 4 && data3['nivel_estudios'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudios'] >= 6 && data3['nivel_estudios'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudios'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['nivel_estudiosNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 2 && data3['nivel_estudiosNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 4 && data3['nivel_estudiosNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 6 && data3['nivel_estudiosNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudiosNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));
					
		$('#loadingTablaIndicadores').empty();
		$("#loadingIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');				
		
		//Gráfico de araña
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$(function () {
			$('#infoIndicadores').highcharts({
				chart: {
					polar: true,
					type: 'line'
				},
				title: {
					text: '',
					x: -80
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
				pane: {
					size: '80%'
				},
				xAxis: {
					categories: [//'Índice de Envejecimiento',
								'Tasa de Dependencia', 
								'Tasa de Infancia',
								'Tasa de Vejez',
								//'Índice de Desempleo SEPE (Municipio Seleccionado)', 
								'Accesibilidad',
								'Nivel de Estudios', 
								'Índice Nivel Económico'],
					tickmarkPlacement: 'on',
					lineWidth: 0
				},
				yAxis: {
					gridLineInterpolation: 'polygon',
					lineWidth: 0,
					min: 0
				},
				tooltip: {
					enabled: true,
					shared: true,
					pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.1f}</b><br/>'
				},
				legend: {
					align: 'right',
					verticalAlign: 'top',
					y: 50,
					layout: 'vertical'
				},
				series: [{
					name: '% Selección',
					data: [//data3['porcentajeEnvejecimientoSeleccionGrafico'], 
							data3['porcentajeDependenciaSeleccionGrafico'], 
							data3['porcentajeInfanciaSeleccionGrafico'], 
							data3['porcentajeVejezSeleccionGrafico'], 
							//data3['cifraDesempleoPorcentaje'], 
							data3['accesibilidadSeleccionGrafico'], 
							data3['nivel_estudiosSeleccionGrafico'], 
							data3['ICE']],
					pointPlacement: 'on'
				}, {
					name: '% Nacional',
					data: [//100,//data3['porcentajeEnvejecimientoNacional'], 
							100,//data3['porcentajeDependenciaNacional'], 
							100,
							100,
							//100,//data3['cifraDesempleoNacional'], 							
							100,//data3['accesibilidadNacionalPorcentaje'], 							
							100,//data3['nivel_estudiosNacionalPorcentaje'], 
							100],//ICE
					pointPlacement: 'on'
				}]

			});
		});		
		$('#loadingIndicadores').empty();
		$('#butExportarExcel').fadeIn(1500);
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA COMPETENCIA
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');	
	$.ajax({
		url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoBarrios&cp=' + barriosSelected.toString(),
		type: 'GET',
		success: function(data){ 
			$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
			$('#loadingMapaCompetencia').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoBarrios&cp=' + barriosSelected.toString(),
				type: 'GET',
				success: function(data){ 
					$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
					$('#loadingMapaCompetencia').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoBarrios&cp=' + barriosSelected.toString(),
						type: 'GET',
						success: function(data){ 
							$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
							$('#loadingMapaCompetencia').empty();
						},
						error: function(data) {
							$("#mapaCompetencia").empty();
							$("#leyendaCompetencia").empty();
							$("#mapaCompetencia").append("<h4>En la zona seleccionada no existe ningún centro con superficie mayor a 1000m².</h4>");
							$('#loadingMapaCompetencia').empty();
						}
					});	
				}
			});	
		}
	});	
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------------
	//Mostrar el botón que abre el modal con los gráficos y tablas.
	//-------------------------------------------------------------------------------------	
	$("#butChartsBarrios").show();
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Cargar Gráficos Distritos
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function cargarGraficoDistritos(distritos){
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA HOGARES
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');			
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionDistritos&cp=' + distritosSelected.toString(),
		type: 'GET',
		success: function(data){ 			
			$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
			$('#loadingMapaHogares').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionDistritos&cp=' + distritosSelected.toString(),
				type: 'GET',
				success: function(data){ 			
					$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
					$('#loadingMapaHogares').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionDistritos&cp=' + distritosSelected.toString(),
						type: 'GET',
						success: function(data){ 			
							$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
							$('#loadingMapaHogares').empty();
						},
						error: function(data) {
							$("#mapaHogares").empty();
							$("#leyendaHogares").empty();
							$("#mapaHogares").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaHogares').empty();
						}
					});
				}
			});
		}
	});
		
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	totalPoblacion = 0;
	$("#loadingExtranjeros").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=tblExtranjeros/getExtranjerosDistritos&distrito=' + distritosSelected.toString(), function (data){
		myLayout.open('east');
		var datos = [];
		$k = 0;
		var resto = data.total;
		$.each(data.datos, function(index, value){
			if($k == 10)
				return false;
			datos.push([index, value]);
			resto = resto - value;
			$k++;
		});
		datos.push(["Resto", resto]);							
		$('#pobExtranjera1').append('Población Extranjera Selección: ' + data.total.toLocaleString('es-ES', {maximumFractionDigits:0}));
		$('#pobExtranjera2').append('% Población Extranjera Selección: ' + data.totalSeleccion.toFixed(1) + '%');
		$('#pobExtranjera3').append('% Población Extranjera España: ' + data.totalEspana.toFixed(1) + '%');
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
		
		$('#loadingExtranjeros').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 población
	//-------------------------------------------------------------------------------------
	totalPoblacion = 0;	
	$("#loadingInfoEdad").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=GeoSecciones/infoEntornoPoblacionDistritos&id=' + distritosSelected.toString(), function (data3){
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalPoblacion += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#pobEdad1').show();
		$('#pobEdad1').append('Población Selección: ' + totalPoblacion.toLocaleString('es-ES', {maximumFractionDigits:0}));
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
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Población',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Población'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Población',
				//innerSize: '50%',
				color:'#4169E1',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#7d9eff',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingInfoEdad').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de la población en la pestaña 1
	//-------------------------------------------------------------------------------------	
	$("#loadingTablaCorta").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaDistritos&cp=' + distritosSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<th></th>"));
		row.append($("<th data-style='s62'><b>Población Selección</b></th>"));
		row.append($("<th data-style='s62'><b>% Selección</b></th>"));
		row.append($("<th data-style='s62'><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 5-14</td>"));
		row.append($("<td>" + data3['pob_0514'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 20-29</td>"));
		row.append($("<td>" + data3['pob_2029'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 30-65</td>"));
		row.append($("<td>" + data3['pob_2965'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: >65</td>"));
		row.append($("<td>" + data3['pob_6599'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCorta').empty();
	});
		
	//-------------------------------------------------------------------------------------
	//Tabla larga de la población en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaLarga").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=GeoSecciones/infoTablaLargaDistritos&cp=' + distritosSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row);
 		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 5-9</td>"));
		row.append($("<td>" + data3['pob_0609'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 10-14</td>"));
		row.append($("<td>" + data3['pob_1014'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 20-24</td>"));
		row.append($("<td>" + data3['pob_2024'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 25-29</td>"));
		row.append($("<td>" + data3['pob_2529'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 30-34</td>"));
		row.append($("<td>" + data3['pob_3034'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 35-39</td>"));
		row.append($("<td>" + data3['pob_3539'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 40-44</td>"));
		row.append($("<td>" + data3['pob_4044'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 45-49</td>"));
		row.append($("<td>" + data3['pob_4549'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 50-59</td>"));
		row.append($("<td>" + data3['pob_5059'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 60-64</td>"));
		row.append($("<td>" + data3['pob_6064'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 65-75</td>"));
		row.append($("<td>" + data3['pob_6575'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: >75</td>"));
		row.append($("<td>" + data3['pob_75'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaLarga').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//-------------------------------------------------------------------------------------
	totalHogares = 0;	
	$("#loadingHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresDistritos&id=' + distritosSelected.toString(), function (data3){
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogares += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#textoHogares').append('Estimación NºHogares Selección: ' + totalHogares.toLocaleString('es-ES', {maximumFractionDigits:0}));
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogares').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares',
				//innerSize: '50%',
				color:'#b20000',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#ff3f3f',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingHogares').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresDistritos&cp=' + distritosSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>1</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>2</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>3</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>4</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>>4</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCortaHogares').empty();
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA SELECCIÓN
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaSeleccion").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaSeleccionDistritos&cp=' + distritosSelected.toString(),
		type: 'GET',
		success: function(data){ 			
			$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$('#loadingMapaSeleccion').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaSeleccionDistritos&cp=' + distritosSelected.toString(),
				type: 'GET',
				success: function(data){ 			
					$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$('#loadingMapaSeleccion').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaSeleccionDistritos&cp=' + distritosSelected.toString(),
						type: 'GET',
						success: function(data){ 			
							$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$('#loadingMapaSeleccion').empty();
						},
						error: function(data) {
							$("#mapaSeleccion").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaSeleccion').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE
	//-------------------------------------------------------------------------------------
	totalHogaresICE = 0;	
	valorBase = 0;
	$("#loadingHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresICEDistritos&id=' + distritosSelected.toString(), function (data3){
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogaresICE += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})		
		valorBase += data3[3];		
		
		$('#textoHogaresICE').append('Estimación ICE Hogares Selección (Base 100=España): ' + valorBase);
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogaresICE').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares Renta') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares Renta',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares renta'
						,
						style: {
							color: '#059800'
						}
					},
					labels: {
						format: '{value}',
						style: {
							color: '#059800'
						}
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares Renta',
				//innerSize: '50%',
				color:'#059800',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#6cdb68',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingHogaresICE').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresICEDistritos&cp=' + distritosSelected.toString(), function (data3){
		$("#infoTablaCortaHogaresICE").hide();
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Renta Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Bajo</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Bajo</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Alto</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>>Alto</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCortaHogaresICE').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Competencia
	//-------------------------------------------------------------------------------------
	
	$("#loadingCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=geoCp/getCompeDistritos&cp='+ distritosSelected.toString(), function (data3){
		$("#infoCompeEns").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalNum = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		var i = 0;
		var c = 0, s = 0;
		$.each(data3, function(index, value){
			if(i<10){
				var row = $("<tr />")
				$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td>" + value.ensena + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}else{
				c += value.total;
				s += value.superficie;
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}
			i++;
		});
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Resto</td>"));
		row.append($("<td>" + s.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + c.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var densidadComercial = (totalSup / totalPoblacion) * 1000;				
		var densidadComercialNacional = (totalSupNacional / totalPoblacionNacional) * 1000;		
		$('#textoDensidadComercial').append('Densidad Comercial Selección: ' + densidadComercial.toFixed(1).replace(".", ","));
		$('#textoDensidadComercialNacional').append('Densidad Comercial Nacional: ' + densidadComercialNacional.toFixed(1).replace(".", ","));
		$('#loadingCompetencia').empty();
	});
	
	$("#loadingCompetenciaSup").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=geoCp/getCompeSupDistritos&cp='+ distritosSelected.toString(), function (data3){
		$("#infoCompeSup").empty();
		var totalSup = 0;
		var totalNum = 0;
		
		var row = $("<tr />")
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Tipo</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		$.each(data3, function(index, value){
				var row = $("<tr />")
				$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td >" + value.tipo + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalNum += value.total;
		});
		var row = $("<tr />");
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		
		$('#loadingCompetenciaSup').empty();
	});
	
	$.get('index.php?r=geoCp/getCompeDescargableDistritos&cp='+ distritosSelected.toString(), function (data3){	
		
		$("#infoCompeDescargable").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Dirección</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		row.append($("<th><b>Código Postal</b></th>"));
		row.append($("<th><b>Provincia</b></th>"));
		row.append($("<th><b>Municipio</b></th>"));
		var i = 1;
		
		$.each(data3, function(index, value){			
			var row = $("<tr />")
			$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td>" + value.ensena + "</td>"));
			row.append($("<td>" + value.superficie + "</td>"));
			row.append($("<td>" + value.direccion + "</td>"));
			row.append($("<td>" + value.numero + "</td>"));
			row.append($("<td>" + value.cp + "</td>"));
			row.append($("<td>" + value.provincia + "</td>"));
			row.append($("<td>" + value.municipio + "</td>"));
			totalSup += value.superficie;
			totalSupNacional = value.superficienacional;
			totalPoblacion = value.poblacion;
			totalPoblacionNacional = value.poblacionnacional;			
			i++;			
		});
		
		var row = $("<tr />");
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
	});
	
	//-------------------------------------------------------------------------------------
	//Tabla indicadores
	//-------------------------------------------------------------------------------------
	$("#loadingTablaIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	$.get('index.php?r=GeoSecciones/infoTablaIndicadoresDistritos&cp=' + distritosSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
							
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));*/
		
		//--------------------------------------------------------------------------------------------------------------
		//EXCEL
		//--------------------------------------------------------------------------------------------------------------
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['accesibilidad'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 2 && data3['accesibilidad'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 4 && data3['accesibilidad'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidad'] >= 6 && data3['accesibilidad'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidad'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['accesibilidadNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 2 && data3['accesibilidadNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 4 && data3['accesibilidadNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidadNacional'] >= 6 && data3['accesibilidadNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidadNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
					
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['nivel_estudios'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 2 && data3['nivel_estudios'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 4 && data3['nivel_estudios'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudios'] >= 6 && data3['nivel_estudios'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudios'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['nivel_estudiosNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 2 && data3['nivel_estudiosNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 4 && data3['nivel_estudiosNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 6 && data3['nivel_estudiosNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudiosNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));
					
		$('#loadingTablaIndicadores').empty();
		$("#loadingIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');				
		
		//Gráfico de araña
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$(function () {
			$('#infoIndicadores').highcharts({
				chart: {
					polar: true,
					type: 'line'
				},
				title: {
					text: '',
					x: -80
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
				pane: {
					size: '80%'
				},
				xAxis: {
					categories: [//'Índice de Envejecimiento',
								'Tasa de Dependencia', 
								'Tasa de Infancia',
								'Tasa de Vejez',
								//'Índice de Desempleo SEPE (Municipio Seleccionado)', 
								'Accesibilidad',
								'Nivel de Estudios', 
								'Índice Nivel Económico'],
					tickmarkPlacement: 'on',
					lineWidth: 0
				},
				yAxis: {
					gridLineInterpolation: 'polygon',
					lineWidth: 0,
					min: 0
				},
				tooltip: {
					enabled: true,
					shared: true,
					pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.1f}</b><br/>'
				},
				legend: {
					align: 'right',
					verticalAlign: 'top',
					y: 50,
					layout: 'vertical'
				},
				series: [{
					name: '% Selección',
					data: [//data3['porcentajeEnvejecimientoSeleccionGrafico'], 
							data3['porcentajeDependenciaSeleccionGrafico'], 
							data3['porcentajeInfanciaSeleccionGrafico'], 
							data3['porcentajeVejezSeleccionGrafico'], 
							//data3['cifraDesempleoPorcentaje'], 
							data3['accesibilidadSeleccionGrafico'], 
							data3['nivel_estudiosSeleccionGrafico'], 
							data3['ICE']],
					pointPlacement: 'on'
				}, {
					name: '% Nacional',
					data: [//100,//data3['porcentajeEnvejecimientoNacional'], 
							100,//data3['porcentajeDependenciaNacional'], 
							100,
							100,
							//100,//data3['cifraDesempleoNacional'], 							
							100,//data3['accesibilidadNacionalPorcentaje'], 							
							100,//data3['nivel_estudiosNacionalPorcentaje'], 
							100],//ICE
					pointPlacement: 'on'
				}]

			});
		});		
		$('#loadingIndicadores').empty();
		$('#butExportarExcel').fadeIn(1500);
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA COMPETENCIA
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');	
	$.ajax({
		url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoDistritos&cp=' + distritosSelected.toString(),
		type: 'GET',
		success: function(data){ 
			$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
			$('#loadingMapaCompetencia').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoDistritos&cp=' + distritosSelected.toString(),
				type: 'GET',
				success: function(data){ 
					$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
					$('#loadingMapaCompetencia').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoDistritos&cp=' + distritosSelected.toString(),
						type: 'GET',
						success: function(data){ 
							$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
							$('#loadingMapaCompetencia').empty();
						},
						error: function(data) {
							$("#mapaCompetencia").empty();
							$("#leyendaCompetencia").empty();
							$("#mapaCompetencia").append("<h4>En la zona seleccionada no existe ningún centro con superficie mayor a 1000m².</h4>");
							$('#loadingMapaCompetencia').empty();
						}
					});
				}
			});
		}
	});	
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Mostrar el botón que abre el modal con los gráficos y tablas.
	//-------------------------------------------------------------------------------------	
	$("#butChartsDistritos").show();
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Cargar Gráficos CP
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function cargarGraficoCP(cp){
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA HOGARES
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');			
	$.ajax({
		url: 'index.php?r=GeoSecciones/MapaHogaresDesviacionCP&cp=' + cpSelected.toString(),
		type: 'GET',
		success: function(data){ 			
			$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
			$('#loadingMapaHogares').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/MapaHogaresDesviacionCP&cp=' + cpSelected.toString(),
				type: 'GET',
				success: function(data){ 			
					$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
					$('#loadingMapaHogares').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/MapaHogaresDesviacionCP&cp=' + cpSelected.toString(),
						type: 'GET',
						success: function(data){ 			
							$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
							$('#loadingMapaHogares').empty();
						},
						error: function(data) {
							$("#mapaHogares").empty();
							$("#leyendaHogares").empty();
							$("#mapaHogares").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaHogares').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 extranjeros
	//-------------------------------------------------------------------------------------
	totalPoblacion = 0;
	$("#loadingExtranjeros").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.get('index.php?r=tblExtranjeros/getExtranjeros&cp=' + cpSelected.toString(), function (data){
		myLayout.open('east');
		var datos = [];
		$k = 0;
		var resto = data.total;
		$.each(data.datos, function(index, value){
			if($k == 10)
				return false;
			datos.push([index, value]);
			resto = resto - value;
			$k++;
		});
		datos.push(["Resto", resto]);							
		$('#pobExtranjera1').append('Población Extranjera Selección: ' + data.total.toLocaleString('es-ES', {maximumFractionDigits:0}));
		$('#pobExtranjera2').append('% Población Extranjera Selección: ' + data.totalSeleccion.toFixed(1) + '%');
		$('#pobExtranjera3').append('% Población Extranjera España: ' + data.totalEspana.toFixed(1) + '%');
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
			title:{
				text:''
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
		$('#loadingExtranjeros').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 población
	//-------------------------------------------------------------------------------------
	totalPoblacion = 0;	
	$("#loadingInfoEdad").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoEntornoPoblacion&id=' + cpSelected.toString(), function (data3){		
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalPoblacion += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#pobEdad1').show();
		$('#pobEdad1').append('Población Selección: ' + totalPoblacion.toLocaleString('es-ES', {maximumFractionDigits:0}));
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
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Población',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Población'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Población',
				//innerSize: '50%',
				color:'#4169E1',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#7d9eff',
				dashStyle: 'shortdash',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingInfoEdad').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de la población en la pestaña 1
	//-------------------------------------------------------------------------------------	
	$("#loadingTablaCorta").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCorta&cp=' + cpSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 5-14</td>"));
		row.append($("<td>" + data3['pob_0514'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 20-29</td>"));
		row.append($("<td>" + data3['pob_2029'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 30-65</td>"));
		row.append($("<td>" + data3['pob_2965'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: >65</td>"));
		row.append($("<td>" + data3['pob_6599'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCorta').empty();
	});
		
	//-------------------------------------------------------------------------------------
	//Tabla larga de la población en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaLarga").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaLarga&cp=' + cpSelected.toString(), function (data3){		
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row);
		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 5-9</td>"));
		row.append($("<td>" + data3['pob_0609'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 10-14</td>"));
		row.append($("<td>" + data3['pob_1014'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 20-24</td>"));
		row.append($("<td>" + data3['pob_2024'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 25-29</td>"));
		row.append($("<td>" + data3['pob_2529'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 30-34</td>"));
		row.append($("<td>" + data3['pob_3034'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 35-39</td>"));
		row.append($("<td>" + data3['pob_3539'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 40-44</td>"));
		row.append($("<td>" + data3['pob_4044'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 45-49</td>"));
		row.append($("<td>" + data3['pob_4549'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 50-59</td>"));
		row.append($("<td>" + data3['pob_5059'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 60-64</td>"));
		row.append($("<td>" + data3['pob_6064'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 65-75</td>"));
		row.append($("<td>" + data3['pob_6575'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: >75</td>"));
		row.append($("<td>" + data3['pob_75'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaLarga').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//-------------------------------------------------------------------------------------
	totalHogares = 0;	
	$("#loadingHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoEntornoHogares&id=' + cpSelected.toString(), function (data3){		
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogares += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#textoHogares').append('Estimación NºHogares Selección: ' + totalHogares.toLocaleString('es-ES', {maximumFractionDigits:0}));
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogares').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares',
				//innerSize: '50%',
				color:'#b20000',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#ff3f3f',
				dashStyle: 'shortdash',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingHogares').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogares&cp=' + cpSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>1</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>2</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>3</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>4</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>>4</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCortaHogares').empty();
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA SELECCIÓN
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaSeleccion").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaSeleccionCP&cp=' + cpSelected.toString(),
		type: 'GET',
		success: function(data){ 			
			$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$('#loadingMapaSeleccion').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaSeleccionCP&cp=' + cpSelected.toString(),
				type: 'GET',
				success: function(data){ 			
					$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$('#loadingMapaSeleccion').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaSeleccionCP&cp=' + cpSelected.toString(),
						type: 'GET',
						success: function(data){ 			
							$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$('#loadingMapaSeleccion').empty();
						},
						error: function(data) {
							$("#mapaSeleccion").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaSeleccion').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE
	//-------------------------------------------------------------------------------------
	totalHogaresICE = 0;	
	valorBase = 0;
	$("#loadingHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresICE&id=' + cpSelected.toString(), function (data3){
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogaresICE += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})		
		valorBase += data3[3];		
		
		$('#textoHogaresICE').append('Estimación ICE Hogares Selección (Base 100=España): ' + valorBase);
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogaresICE').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares Renta') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares Renta',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares renta'
						,
						style: {
							color: '#059800'
						}
					},
					labels: {
						format: '{value}',
						style: {
							color: '#059800'
						}
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares Renta',
				//innerSize: '50%',
				color:'#059800',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#000000',
				dashStyle: 'shortdash',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingHogaresICE').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresICE&cp=' + cpSelected.toString(), function (data3){
		$("#infoTablaCortaHogaresICE").hide();
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Renta Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Bajo</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Bajo</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Alto</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>>Alto</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCortaHogaresICE').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Competencia
	//-------------------------------------------------------------------------------------
	
	$("#loadingCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.get('index.php?r=geoCp/getCompe&cp='+ cpSelected.toString(), function (data3){
		
		$("#infoCompeEns").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalNum = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		var i = 0;
		var c = 0, s = 0;
		$.each(data3, function(index, value){
			if(i<10){
				var row = $("<tr />")
				$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td>" + value.ensena + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}else{
				c += value.total;
				s += value.superficie;
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}
			i++;
		});
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Resto</td>"));
		row.append($("<td>" + s.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + c.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var densidadComercial = (totalSup / totalPoblacion) * 1000;				
		var densidadComercialNacional = (totalSupNacional / totalPoblacionNacional) * 1000;		
		$('#textoDensidadComercial').append('Densidad Comercial Selección: ' + densidadComercial.toFixed(1).replace(".", ","));
		$('#textoDensidadComercialNacional').append('Densidad Comercial Nacional: ' + densidadComercialNacional.toFixed(1).replace(".", ","));
		$('#loadingCompetencia').empty();
	});
	
	$("#loadingCompetenciaSup").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=geoCp/getCompeSup&cp='+ cpSelected.toString(), function (data3){		
				
		$("#infoCompeSup").empty();
		var totalSup = 0;
		var totalNum = 0;
		
		var row = $("<tr />")
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Tipo</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		$.each(data3, function(index, value){
				var row = $("<tr />")
				$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td >" + value.tipo + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalNum += value.total;
		});
		var row = $("<tr />");
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		$('#loadingCompetenciaSup').empty();
	});
	
	$.get('index.php?r=geoCp/getCompeDescargableCP&cp='+ cpSelected.toString(), function (data3){	
		
		$("#infoCompeDescargable").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Dirección</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		row.append($("<th><b>Código Postal</b></th>"));
		row.append($("<th><b>Provincia</b></th>"));
		row.append($("<th><b>Municipio</b></th>"));
		var i = 1;
		
		$.each(data3, function(index, value){			
			var row = $("<tr />")
			$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td>" + value.ensena + "</td>"));
			row.append($("<td>" + value.superficie + "</td>"));
			row.append($("<td>" + value.direccion + "</td>"));
			row.append($("<td>" + value.numero + "</td>"));
			row.append($("<td>" + value.cp + "</td>"));
			row.append($("<td>" + value.provincia + "</td>"));
			row.append($("<td>" + value.municipio + "</td>"));
			totalSup += value.superficie;
			totalSupNacional = value.superficienacional;
			totalPoblacion = value.poblacion;
			totalPoblacionNacional = value.poblacionnacional;			
			i++;			
		});
		
		var row = $("<tr />");
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
	});
	
	//-------------------------------------------------------------------------------------
	//Tabla indicadores
	//-------------------------------------------------------------------------------------
	$("#loadingTablaIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	$.get('index.php?r=GeoSecciones/infoTablaIndicadoresCP&cp=' + cpSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
							
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));*/
		
		//--------------------------------------------------------------------------------------------------------------
		//EXCEL
		//--------------------------------------------------------------------------------------------------------------
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['accesibilidad'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 2 && data3['accesibilidad'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 4 && data3['accesibilidad'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidad'] >= 6 && data3['accesibilidad'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidad'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['accesibilidadNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 2 && data3['accesibilidadNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 4 && data3['accesibilidadNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidadNacional'] >= 6 && data3['accesibilidadNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidadNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
					
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['nivel_estudios'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 2 && data3['nivel_estudios'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 4 && data3['nivel_estudios'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudios'] >= 6 && data3['nivel_estudios'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudios'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['nivel_estudiosNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 2 && data3['nivel_estudiosNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 4 && data3['nivel_estudiosNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 6 && data3['nivel_estudiosNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudiosNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));
					
		$('#loadingTablaIndicadores').empty();
		$("#loadingIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');				
		
		//Gráfico de araña
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$(function () {
			$('#infoIndicadores').highcharts({
				chart: {
					polar: true,
					type: 'line'
				},
				title: {
					text: '',
					x: -80
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
				pane: {
					size: '80%'
				},
				xAxis: {
					categories: [//'Índice de Envejecimiento',
								'Tasa de Dependencia', 
								'Tasa de Infancia',
								'Tasa de Vejez',
								//'Índice de Desempleo SEPE (Municipio Seleccionado)', 
								'Accesibilidad',
								'Nivel de Estudios', 
								'Índice Nivel Económico'],
					tickmarkPlacement: 'on',
					lineWidth: 0
				},
				yAxis: {
					gridLineInterpolation: 'polygon',
					lineWidth: 0,
					min: 0
				},
				tooltip: {
					enabled: true,
					shared: true,
					pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.1f}</b><br/>'
				},
				legend: {
					align: 'right',
					verticalAlign: 'top',
					y: 50,
					layout: 'vertical'
				},
				series: [{
					name: '% Selección',
					data: [//data3['porcentajeEnvejecimientoSeleccionGrafico'], 
							data3['porcentajeDependenciaSeleccionGrafico'], 
							data3['porcentajeInfanciaSeleccionGrafico'], 
							data3['porcentajeVejezSeleccionGrafico'], 
							//data3['cifraDesempleoPorcentaje'], 
							data3['accesibilidadSeleccionGrafico'], 
							data3['nivel_estudiosSeleccionGrafico'], 
							data3['ICE']],
					pointPlacement: 'on'
				}, {
					name: '% Nacional',
					data: [//100,//data3['porcentajeEnvejecimientoNacional'], 
							100,//data3['porcentajeDependenciaNacional'], 
							100,
							100,
							//100,//data3['cifraDesempleoNacional'], 							
							100,//data3['accesibilidadNacionalPorcentaje'], 							
							100,//data3['nivel_estudiosNacionalPorcentaje'], 
							100],//ICE
					pointPlacement: 'on'
				}]

			});
		});		
		$('#loadingIndicadores').empty();
		$('#butExportarExcel').fadeIn(1500);
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA COMPETENCIA
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');	
	$.ajax({
		url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoCP&cp=' + cpSelected.toString(),
		type: 'GET',
		success: function(data){ 		
			$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
			$('#loadingMapaCompetencia').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoCP&cp=' + cpSelected.toString(),
				type: 'GET',
				success: function(data){ 
					$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
					$('#loadingMapaCompetencia').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoCP&cp=' + cpSelected.toString(),
						type: 'GET',
						success: function(data){ 
							$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
							$('#loadingMapaCompetencia').empty();
						},
						error: function(data) {
							$("#mapaCompetencia").empty();
							$("#leyendaCompetencia").empty();
							$("#mapaCompetencia").append("<h4>En la zona seleccionada no existe ningún centro con superficie mayor a 1000m².</h4>");
							$('#loadingMapaCompetencia').empty();
						}
					});	
				}
			});	
		}
	});	
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Mostrar el botón que abre el modal con los gráficos y tablas.
	//-------------------------------------------------------------------------------------	
	$("#butChartsCP").show();
	
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Cargar Gráficos Radio
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function cargarGraficoRadio(coordenadasRadio, radio){
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA HOGARES
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');			
	$.ajax({
		url: 'index.php?r=GeoSecciones/MapaHogaresDesviacionRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
		type: 'GET',
		success: function(data){ 			
			$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
			$('#loadingMapaHogares').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/MapaHogaresDesviacionRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
				type: 'GET',
				success: function(data){ 			
					$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
					$('#loadingMapaHogares').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/MapaHogaresDesviacionRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
						type: 'GET',
						success: function(data){ 			
							$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
							$('#loadingMapaHogares').empty();
						},
						error: function(data) {
							$("#mapaHogares").empty();
							$("#leyendaHogares").empty();
							$("#mapaHogares").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaHogares').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 extranjeros
	//-------------------------------------------------------------------------------------
	totalPoblacion = 0;
	$("#loadingExtranjeros").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.get('index.php?r=tblExtranjeros/getExtranjerosRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data){
		myLayout.open('east');
		var datos = [];
		$k = 0;
		var resto = data.total;
		$.each(data.datos, function(index, value){
			if($k == 10)
				return false;
			datos.push([index, value]);
			resto = resto - value;
			$k++;
		});
		datos.push(["Resto", resto]);							
		$('#pobExtranjera1').append('Población Extranjera Selección: ' + data.total.toLocaleString('es-ES', {maximumFractionDigits:0}));
		$('#pobExtranjera2').append('% Población Extranjera Selección: ' + data.totalSeleccion.toFixed(1) + '%');
		$('#pobExtranjera3').append('% Población Extranjera España: ' + data.totalEspana.toFixed(1) + '%');
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
			title:{
				text:''
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
		$('#loadingExtranjeros').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 población
	//-------------------------------------------------------------------------------------
	totalPoblacion = 0;	
	$("#loadingInfoEdad").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoEntornoPoblacionRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){		
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalPoblacion += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#pobEdad1').show();
		$('#pobEdad1').append('Población Selección: ' + totalPoblacion.toLocaleString('es-ES', {maximumFractionDigits:0}));
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
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Población',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Población'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Población',
				//innerSize: '50%',
				color:'#4169E1',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#7d9eff',
				dashStyle: 'shortdash',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingInfoEdad').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de la población en la pestaña 1
	//-------------------------------------------------------------------------------------	
	$("#loadingTablaCorta").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 5-14</td>"));
		row.append($("<td>" + data3['pob_0514'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 20-29</td>"));
		row.append($("<td>" + data3['pob_2029'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 30-65</td>"));
		row.append($("<td>" + data3['pob_2965'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: >65</td>"));
		row.append($("<td>" + data3['pob_6599'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCorta').empty();
	});
		
	//-------------------------------------------------------------------------------------
	//Tabla larga de la población en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaLarga").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaLargaRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row);
		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 5-9</td>"));
		row.append($("<td>" + data3['pob_0609'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 10-14</td>"));
		row.append($("<td>" + data3['pob_1014'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 20-24</td>"));
		row.append($("<td>" + data3['pob_2024'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 25-29</td>"));
		row.append($("<td>" + data3['pob_2529'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 30-34</td>"));
		row.append($("<td>" + data3['pob_3034'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 35-39</td>"));
		row.append($("<td>" + data3['pob_3539'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 40-44</td>"));
		row.append($("<td>" + data3['pob_4044'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 45-49</td>"));
		row.append($("<td>" + data3['pob_4549'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 50-59</td>"));
		row.append($("<td>" + data3['pob_5059'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 60-64</td>"));
		row.append($("<td>" + data3['pob_6064'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 65-75</td>"));
		row.append($("<td>" + data3['pob_6575'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: >75</td>"));
		row.append($("<td>" + data3['pob_75'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaLarga').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//-------------------------------------------------------------------------------------
	totalHogares = 0;	
	$("#loadingHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogares += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#textoHogares').append('Estimación NºHogares Selección: ' + totalHogares.toLocaleString('es-ES', {maximumFractionDigits:0}));
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogares').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares',
				//innerSize: '50%',
				color:'#b20000',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#ff3f3f',
				dashStyle: 'shortdash',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingHogares').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>1</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>2</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>3</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>4</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>>4</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCortaHogares').empty();
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA SELECCIÓN
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaSeleccion").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaSeleccionRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
		type: 'GET',
		success: function(data){ 			
			$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$('#loadingMapaSeleccion').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaSeleccionRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
				type: 'GET',
				success: function(data){ 			
					$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$('#loadingMapaSeleccion').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaSeleccionRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
						type: 'GET',
						success: function(data){ 			
							$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$('#loadingMapaSeleccion').empty();
						},
						error: function(data) {
							$("#mapaSeleccion").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaSeleccion').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE
	//-------------------------------------------------------------------------------------
	totalHogaresICE = 0;	
	valorBase = 0;
	$("#loadingHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresICERadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogaresICE += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})		
		valorBase += data3[3];		
		
		$('#textoHogaresICE').append('Estimación ICE Hogares Selección (Base 100=España): ' + valorBase);
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogaresICE').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares Renta') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares Renta',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares renta'
						,
						style: {
							color: '#059800'
						}
					},
					labels: {
						format: '{value}',
						style: {
							color: '#059800'
						}
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares Renta',
				//innerSize: '50%',
				color:'#059800',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#000000',
				dashStyle: 'shortdash',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		
		$('#loadingHogaresICE').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresICERadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){
		$("#infoTablaCortaHogaresICE").hide();
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Renta Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Bajo</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Bajo</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Alto</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>>Alto</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCortaHogaresICE').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Competencia
	//-------------------------------------------------------------------------------------
	
	$("#loadingCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.get('index.php?r=geoCp/getCompeRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){
		
		$("#infoCompeEns").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalNum = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		var i = 0;
		var c = 0, s = 0;
		$.each(data3, function(index, value){
			if(i<10){
				var row = $("<tr />")
				$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td>" + value.ensena + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}else{
				c += value.total;
				s += value.superficie;
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}
			i++;
		});
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Resto</td>"));
		row.append($("<td>" + s.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + c.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var densidadComercial = (totalSup / totalPoblacion) * 1000;				
		var densidadComercialNacional = (totalSupNacional / totalPoblacionNacional) * 1000;		
		$('#textoDensidadComercial').append('Densidad Comercial Selección: ' + densidadComercial.toFixed(1).replace(".", ","));
		$('#textoDensidadComercialNacional').append('Densidad Comercial Nacional: ' + densidadComercialNacional.toFixed(1).replace(".", ","));
		$('#loadingCompetencia').empty();
	});
	
	$("#loadingCompetenciaSup").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');	
	$.get('index.php?r=geoCp/getCompeSupRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){
				
		$("#infoCompeSup").empty();
		var totalSup = 0;
		var totalNum = 0;
		
		var row = $("<tr />")
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Tipo</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		$.each(data3, function(index, value){
				var row = $("<tr />")
				$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td >" + value.tipo + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalNum += value.total;
		});
		var row = $("<tr />");
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		$('#loadingCompetenciaSup').empty();
	});
	
	$.get('index.php?r=geoCp/getCompeDescargableRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){	
		
		$("#infoCompeDescargable").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Dirección</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		row.append($("<th><b>Código Postal</b></th>"));
		row.append($("<th><b>Provincia</b></th>"));
		row.append($("<th><b>Municipio</b></th>"));
		var i = 1;
		
		$.each(data3, function(index, value){			
			var row = $("<tr />")
			$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td>" + value.ensena + "</td>"));
			row.append($("<td>" + value.superficie + "</td>"));
			row.append($("<td>" + value.direccion + "</td>"));
			row.append($("<td>" + value.numero + "</td>"));
			row.append($("<td>" + value.cp + "</td>"));
			row.append($("<td>" + value.provincia + "</td>"));
			row.append($("<td>" + value.municipio + "</td>"));
			totalSup += value.superficie;
			totalSupNacional = value.superficienacional;
			totalPoblacion = value.poblacion;
			totalPoblacionNacional = value.poblacionnacional;			
			i++;			
		});
		
		var row = $("<tr />");
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
	});
	
	//-------------------------------------------------------------------------------------
	//Tabla indicadores
	//-------------------------------------------------------------------------------------
	$("#loadingTablaIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	$.get('index.php?r=GeoSecciones/infoTablaIndicadoresRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio, function (data3){
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
							
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));*/
		
		//--------------------------------------------------------------------------------------------------------------
		//EXCEL
		//--------------------------------------------------------------------------------------------------------------
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['accesibilidad'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 2 && data3['accesibilidad'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 4 && data3['accesibilidad'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidad'] >= 6 && data3['accesibilidad'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidad'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['accesibilidadNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 2 && data3['accesibilidadNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 4 && data3['accesibilidadNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidadNacional'] >= 6 && data3['accesibilidadNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidadNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
					
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['nivel_estudios'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 2 && data3['nivel_estudios'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 4 && data3['nivel_estudios'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudios'] >= 6 && data3['nivel_estudios'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudios'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['nivel_estudiosNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 2 && data3['nivel_estudiosNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 4 && data3['nivel_estudiosNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 6 && data3['nivel_estudiosNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudiosNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));
					
		$('#loadingTablaIndicadores').empty();
		$("#loadingIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');				
		
		//Gráfico de araña
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$(function () {
			$('#infoIndicadores').highcharts({
				chart: {
					polar: true,
					type: 'line'
				},
				title: {
					text: '',
					x: -80
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
				pane: {
					size: '80%'
				},
				xAxis: {
					categories: [//'Índice de Envejecimiento',
								'Tasa de Dependencia', 
								'Tasa de Infancia',
								'Tasa de Vejez',
								//'Índice de Desempleo SEPE (Municipio Seleccionado)', 
								'Accesibilidad',
								'Nivel de Estudios', 
								'Índice Nivel Económico'],
					tickmarkPlacement: 'on',
					lineWidth: 0
				},
				yAxis: {
					gridLineInterpolation: 'polygon',
					lineWidth: 0,
					min: 0
				},
				tooltip: {
					enabled: true,
					shared: true,
					pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.1f}</b><br/>'
				},
				legend: {
					align: 'right',
					verticalAlign: 'top',
					y: 50,
					layout: 'vertical'
				},
				series: [{
					name: '% Selección',
					data: [//data3['porcentajeEnvejecimientoSeleccionGrafico'], 
							data3['porcentajeDependenciaSeleccionGrafico'], 
							data3['porcentajeInfanciaSeleccionGrafico'], 
							data3['porcentajeVejezSeleccionGrafico'], 
							//data3['cifraDesempleoPorcentaje'], 
							data3['accesibilidadSeleccionGrafico'], 
							data3['nivel_estudiosSeleccionGrafico'], 
							data3['ICE']],
					pointPlacement: 'on'
				}, {
					name: '% Nacional',
					data: [//100,//data3['porcentajeEnvejecimientoNacional'], 
							100,//data3['porcentajeDependenciaNacional'], 
							100,
							100,
							//100,//data3['cifraDesempleoNacional'], 							
							100,//data3['accesibilidadNacionalPorcentaje'], 							
							100,//data3['nivel_estudiosNacionalPorcentaje'], 
							100],//ICE
					pointPlacement: 'on'
				}]

			});
		});		
		$('#loadingIndicadores').empty();
		$('#butExportarExcel').fadeIn(1500);
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA COMPETENCIA
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');	
	$.ajax({
		url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
		type: 'GET',
		success: function(data){ 		
			$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
			$('#loadingMapaCompetencia').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
				type: 'GET',
				success: function(data){ 
					$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
					$('#loadingMapaCompetencia').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
						type: 'GET',
						success: function(data){ 
							$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
							$('#loadingMapaCompetencia').empty();
						},
						error: function(data) {
							$("#mapaCompetencia").empty();
							$("#leyendaCompetencia").empty();
							$("#mapaCompetencia").append("<h4>En la zona seleccionada no existe ningún centro con superficie mayor a 1000m².</h4>");
							$('#loadingMapaCompetencia').empty();
						}
					});	
				}
			});	
		}
	});	
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Mostrar el botón que abre el modal con los gráficos y tablas.
	//-------------------------------------------------------------------------------------	
	$("#butChartsRadio").show();
	
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Cargar Gráficos Radio Múltiple
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function cargarGraficoRadioMultiple(coordenadasRadio){
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de la población en la pestaña 1
	//-------------------------------------------------------------------------------------	
	$("#loadingTablaCortaRadioMultiple").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaRadioMultiple&coordenadasRadio=' + coordenadasRadio, function (data3){
		
		$('#pobEdad1').hide();
		
		var row = $("<tr/>")
		$("#infoTablaCortaRadioMultiple").append(row); 
		row.append($("<th><b>Radio</b></th>"));
		row.append($("<th><b>Número</b></th>"));		
		
		var row = $("<tr data-value='250' class='blue example'/>");
		$("#infoTablaCortaRadioMultiple").append(row); 
		
		row.append($("<td data-value='250'>Población - 250 metros</td>"));
		row.append($("<td data-value='250'>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr data-value='500' class='violet example'/>");
		$("#infoTablaCortaRadioMultiple").append(row); 
		row.append($("<td data-value='500'>Población - 500 metros</td>"));
		row.append($("<td data-value='500'>" + data3['pob_0514'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));		
		
		var row = $("<tr  data-value='1000' class='pink example'/>");
		$("#infoTablaCortaRadioMultiple").append(row); 
		row.append($("<td  data-value='1000'>Población - 1000 metros</td>"));
		row.append($("<td  data-value='1000'>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));		
		
		$('#loadingTablaCortaRadioMultiple').empty();
				
		$(".example").click(function(f){
			var buffer = f.target.getAttribute("data-Value");
			$("#tituloSecc")[0].innerHTML = "<b style='margin-left: 200px;'>Población - "+buffer+" metros</b>";
			
			$.get("index.php?r=GeoSecciones/getSeccionesBuffer&x="+coordenadasRadio[0]+"&y="+coordenadasRadio[1]+"&buffer="+buffer, function(data){
				$("#tablaSecciones").empty();
				$("#tablaSecciones").append("<table class='table-condensed' id='tSecc'></table>");
				$("#tSecc").append("<tr><th>Sección censal</th><th>Población</th></tr>");
				for(t = 0; t < data.length;t++){
					if(parseInt(data[t].total).toFixed(0)>0)
						$("#tSecc").append("<tr><td>"+data[t].cusec+"</td><td>"+parseInt(data[t].total).toFixed(0)+"</td></tr>");
				}
			})
			$.get("index.php?r=GeoSecciones/getPiramideBuffer&x="+coordenadasRadio[0]+"&y="+coordenadasRadio[1]+"&buffer="+buffer, function(data){
				d_h = [];
				d_m = [];
				for(var t in data[0]){
					if(t.endsWith("h"))
						d_h.push(data[0][t] - 2 * data[0][t]);
					if(t.endsWith("m"))
						d_m.push(data[0][t]*1);
				}
			
				$('#chartPob').highcharts({
					chart: {
						type: 'bar'
					},
					title: {
						text: ''
					},
					exporting:{
						enabled: false
					},
					credits:{
						enabled:false
					},
					subtitle: {
						text: ''
					},
					xAxis: [{
						categories: ['0-4', '5-9', '10-14', '15-19',
					'20-24', '25-29', '30-34', '35-39', '40-44',
					'45-49', '50-54', '55-59', '60-64', '65-69',
					'70-74', '75-79', '80-84', '85-89', '90-94',
					'95-99', '100 + '],
						reversed: false,
						labels: {
							step: 1
						}
					}, { // mirror axis on right side
						opposite: true,
						reversed: false,
						categories: ['0-4', '5-9', '10-14', '15-19',
					'20-24', '25-29', '30-34', '35-39', '40-44',
					'45-49', '50-54', '55-59', '60-64', '65-69',
					'70-74', '75-79', '80-84', '85-89', '90-94',
					'95-99', '100 + '],
						linkedTo: 0,
						labels: {
							step: 1
						}
					}],
					yAxis: {
						title: {
							text: null
						},
						labels: {
							formatter: function () {
								return Math.abs(this.value);
							}
						}
					},

					plotOptions: {
						series: {
							stacking: 'normal'
						}
					},

					tooltip: {
						formatter: function () {
							return '<b>' + this.series.name + ', age ' + this.point.category + '</b><br/>' +
								'Population: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
						}
					},

					series: [{
						name: 'Hombres',
						data: d_h,
						color: "#771010"
					}, {
						name: 'Mujeres',
						data: d_m,
						color:"#FFCCCC"
					}]
				});
			})
		})
	});
	
	
			
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA SELECCIÓN
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaSeleccionRadioMultiple").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaSeleccionRadioMultiple&coordenadasRadio=' + coordenadasRadio,
		type: 'GET',
		success: function(data){ 			
			$("#mapaSeleccionRadioMultiple").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$('#loadingMapaSeleccionRadioMultiple').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaSeleccionRadioMultiple&coordenadasRadio=' + coordenadasRadio,
				type: 'GET',
				success: function(data){ 			
					$("#mapaSeleccionRadioMultiple").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$('#loadingMapaSeleccionRadioMultiple').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaSeleccionRadioMultiple&coordenadasRadio=' + coordenadasRadio,
						type: 'GET',
						success: function(data){ 			
							$("#mapaSeleccionRadioMultiple").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$('#loadingMapaSeleccionRadioMultiple').empty();
						},
						error: function(data) {
							$("#mapaSeleccionRadioMultiple").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaSeleccionRadioMultiple').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------	
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresICERadioMultiple&coordenadasRadio=' + coordenadasRadio, function (data3){
		$("#infoTablaCortaHogaresICE").show();
		$("#iceMultiple").hide();
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<th><b>Radio</b></th>"));
		row.append($("<th><b>Bajo</b></th>"));
		row.append($("<th><b>Medio-Bajo</b></th>"));
		row.append($("<th><b>Medio</b></th>"));
		row.append($("<th><b>Medio-Alto</b></th>"));
		row.append($("<th><b>Alto</b></th>"));
		row.append($("<th><b>TOTAL</b></th>"));
		
		var row = $("<tr class='blue'/>");
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Hogares Renta - 250 metros</td>"));
		row.append($("<td>" + data3['hogares1_250'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_250'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares3_250'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>" + data3['hogares4_250'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_250'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td><b>" + data3['hogares_total_250'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		
		var row = $("<tr class='violet'/>");
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Hogares Renta - 500 metros</td>"));
		row.append($("<td>" + data3['hogares1_500'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_500'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares3_500'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_500'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_500'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td><b>" + data3['hogares_total_500'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		
		var row = $("<tr class='pink'/>");
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Hogares Renta - 1000 metros</td>"));
		row.append($("<td>" + data3['hogares1_1000'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_1000'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));		
		row.append($("<td>" + data3['hogares3_1000'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_1000'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_1000'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td><b>" + data3['hogares_total_1000'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		
		$('#loadingTablaCortaHogaresICE').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Competencia
	//-------------------------------------------------------------------------------------
	
	$("#loadingCompetenciaRadioMultiple").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.get('index.php?r=geoCp/getCompeRadioMultiple&coordenadasRadio=' + coordenadasRadio, function (data3){
		
		$("#infoCompeEnsRadioMultiple").empty();
		var row = $("<tr />");
		var totalSup_250 = 0;		
		var totalNum_250 = 0;
		var totalSup_500 = 0;		
		var totalNum_500 = 0;
		var totalSup_1000 = 0;		
		var totalNum_1000 = 0;
		
		$("#infoCompeEnsRadioMultiple").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Radio</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		
		$.each(data3[0], function(index, value){			
			totalSup_250 += value.superficie250;
			totalNum_250 += value.total250;
		})
		$.each(data3[1], function(index, value){
			totalSup_500 += value.superficie500;
			totalNum_500 += value.total500;
		})
		$.each(data3[2], function(index, value){			
			totalSup_1000 += value.superficie1000;			
			totalNum_1000 += value.total1000;
		})
		
		var row = $("<tr class='blue'/>");
		$("#infoCompeEnsRadioMultiple").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Competencia - 250 metros</td>"));
		row.append($("<td>" + totalSup_250.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + totalNum_250.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr class='violet'/>");
		$("#infoCompeEnsRadioMultiple").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Competencia - 500 metros</td>"));
		row.append($("<td>" + totalSup_500.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + totalNum_500.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr class='pink'/>");
		$("#infoCompeEnsRadioMultiple").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Competencia - 1000 metros</td>"));
		row.append($("<td>" + totalSup_1000.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + totalNum_1000.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				
		$('#loadingCompetenciaRadioMultiple').empty();
	});
	
	$.get('index.php?r=geoCp/getCompeDescargableRadio&coordenadasRadio=' + coordenadasRadio + '&radio=1000', function (data3){
		
		$("#infoCompeDescargable").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Dirección</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		row.append($("<th><b>Código Postal</b></th>"));
		row.append($("<th><b>Provincia</b></th>"));
		row.append($("<th><b>Municipio</b></th>"));
		var i = 1;
		
		$.each(data3, function(index, value){			
			var row = $("<tr />")
			$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td>" + value.ensena + "</td>"));
			row.append($("<td>" + value.superficie + "</td>"));
			row.append($("<td>" + value.direccion + "</td>"));
			row.append($("<td>" + value.numero + "</td>"));
			row.append($("<td>" + value.cp + "</td>"));
			row.append($("<td>" + value.provincia + "</td>"));
			row.append($("<td>" + value.municipio + "</td>"));
			totalSup += value.superficie;
			totalSupNacional = value.superficienacional;
			totalPoblacion = value.poblacion;
			totalPoblacionNacional = value.poblacionnacional;			
			i++;			
		});
		
		var row = $("<tr />");
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA COMPETENCIA
	//--------------------------------------------------------------------------------------------------------------------------
	
	/*$("#loadingMapaCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');	
	$.ajax({
		url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
		type: 'GET',
		success: function(data){ 		
			$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
			$('#loadingMapaCompetencia').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
				type: 'GET',
				success: function(data){ 
					$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
					$('#loadingMapaCompetencia').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoRadio&coordenadasRadio=' + coordenadasRadio + '&radio=' + radio,
						type: 'GET',
						success: function(data){ 
							$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
							$('#loadingMapaCompetencia').empty();
						},
						error: function(data) {
							$("#mapaCompetencia").empty();
							$("#leyendaCompetencia").empty();
							$("#mapaCompetencia").append("<h4>En la zona seleccionada no existe ningún centro con superficie mayor a 1000m².</h4>");
							$('#loadingMapaCompetencia').empty();
						}
					});	
				}
			});	
		}
	});*/
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	$('#butExportarExcelMultiple').fadeIn(1500);
	
	//-------------------------------------------------------------------------------------
	//Mostrar el botón que abre el modal con los gráficos y tablas.
	//-------------------------------------------------------------------------------------	
	$("#butChartsRadioMultiple").show();
	
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Cargar Gráficos Secciones Censales
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function cargarGraficoSecciones(secciones){
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA HOGARES
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');			
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionSecciones&cp=' + seccionesSelected.toString(),
		type: 'GET',
		success: function(data){ 			
			$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
			$('#loadingMapaHogares').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionSecciones&cp=' + seccionesSelected.toString(),
				type: 'GET',
				success: function(data){ 			
					$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
					$('#loadingMapaHogares').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaHogaresDesviacionSecciones&cp=' + seccionesSelected.toString(),
						type: 'GET',
						success: function(data){ 			
							$("#mapaHogares").append("<img alt='Mapa Desviación Nivel de Renta Respecto al Nacional' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaHogares").append("<img alt='Leyenda Desviación Nivel de Renta Respecto al Nacional' style='width:70%; height:70%;' src='images/leyendaHogares.jpg'/>");
							$('#loadingMapaHogares').empty();
						},
						error: function(data) {
							$("#mapaHogares").empty();
							$("#leyendaHogares").empty();
							$("#mapaHogares").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaHogares').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	totalPoblacion = 0;
	$.get('index.php?r=tblExtranjeros/getExtranjerosSecciones&seccion=' + seccionesSelected.toString(), function (data){
		myLayout.open('east');
		var datos = [];
		$k = 0;
		var resto = data.total;
		$.each(data.datos, function(index, value){
			if($k == 10)
				return false;
			datos.push([index, value]);
			resto = resto - value;
			$k++;
		});
		datos.push(["Resto", resto]);									
		$('#pobExtranjera1').append('Población Extranjera Selección: ' + data.total.toLocaleString('es-ES', {maximumFractionDigits:0}));
		$('#pobExtranjera2').append('% Población Extranjera Selección: ' + data.totalSeleccion.toFixed(1) + '%');
		$('#pobExtranjera3').append('% Población Extranjera España: ' + data.totalEspana.toFixed(1) + '%');
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
	
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 población
	//-------------------------------------------------------------------------------------
	totalPoblacion = 0;	
	$("#loadingInfoEdad").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.get('index.php?r=GeoSecciones/infoEntornoPoblacionSecciones&id=' + seccionesSelected.toString(), function (data3){
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalPoblacion += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#pobEdad1').show();
		$('#pobEdad1').append('Población Selección: ' + totalPoblacion.toLocaleString('es-ES', {maximumFractionDigits:0}));
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
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Población') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Población',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Población'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Población',
				//innerSize: '50%',
				color:'#4169E1',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#7d9eff',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		$('#loadingInfoEdad').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de la población en la pestaña 1
	//-------------------------------------------------------------------------------------	
	$.get('index.php?r=GeoSecciones/infoTablaCortaSecciones&cp=' + seccionesSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 5-14</td>"));
		row.append($("<td>" + data3['pob_0514'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0514_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 20-29</td>"));
		row.append($("<td>" + data3['pob_2029'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2029_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: 30-65</td>"));
		row.append($("<td>" + data3['pob_2965'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2965_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td>Edad: >65</td>"));
		row.append($("<td>" + data3['pob_6599'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6599_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCorta").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
	});
		
	//-------------------------------------------------------------------------------------
	//Tabla larga de la población en la pestaña 1
	//-------------------------------------------------------------------------------------
	$.get('index.php?r=GeoSecciones/infoTablaLargaSecciones&cp=' + seccionesSelected.toString(), function (data3){		
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 		
		row.append($("<th></th>"));
		row.append($("<th><b>Población Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 0-4</td>"));
		row.append($("<td>" + data3['pob_0005'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0005_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 5-9</td>"));
		row.append($("<td>" + data3['pob_0609'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_0609_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 10-14</td>"));
		row.append($("<td>" + data3['pob_1014'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_1014_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 15-19</td>"));
		row.append($("<td>"+data3['pob_1519'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['pob_1519_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 20-24</td>"));
		row.append($("<td>" + data3['pob_2024'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2024_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 25-29</td>"));
		row.append($("<td>" + data3['pob_2529'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_2529_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 30-34</td>"));
		row.append($("<td>" + data3['pob_3034'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3034_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 35-39</td>"));
		row.append($("<td>" + data3['pob_3539'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_3539_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 40-44</td>"));
		row.append($("<td>" + data3['pob_4044'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4044_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 45-49</td>"));
		row.append($("<td>" + data3['pob_4549'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_4549_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 50-59</td>"));
		row.append($("<td>" + data3['pob_5059'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_5059_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 60-64</td>"));
		row.append($("<td>" + data3['pob_6064'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6064_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: 65-75</td>"));
		row.append($("<td>" + data3['pob_6575'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_6575_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td>Edad: >75</td>"));
		row.append($("<td>" + data3['pob_75'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['pob_75_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaLarga").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
	});
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares
	//-------------------------------------------------------------------------------------
	totalHogares = 0;
	$("#loadingHogares").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresSecciones&id=' + seccionesSelected.toString(), function (data3){		
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogares += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})
		$('#textoHogares').append('Estimación NºHogares Selección: ' + totalHogares.toLocaleString('es-ES', {maximumFractionDigits:0}));
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogares').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares'
					},
					labels: {
						format: '{value}'
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares',
				//innerSize: '50%',
				color:'#b20000',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#ff3f3f',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		$('#loadingHogares').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresSecciones&cp=' + seccionesSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>1</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>2</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>3</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>4</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td>>4</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogares").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA SELECCIÓN
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaSeleccion").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.ajax({
		url: 'index.php?r=GeoSecciones/mapaSeleccionSecciones&cp=' + seccionesSelected.toString(),
		type: 'GET',
		success: function(data){ 			
			$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$('#loadingMapaSeleccion').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoSecciones/mapaSeleccionSecciones&cp=' + seccionesSelected.toString(),
				type: 'GET',
				success: function(data){ 			
					$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$('#loadingMapaSeleccion').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoSecciones/mapaSeleccionSecciones&cp=' + seccionesSelected.toString(),
						type: 'GET',
						success: function(data){ 			
							$("#mapaSeleccion").append("<img alt='Mapa Selección' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$('#loadingMapaSeleccion').empty();
						},
						error: function(data) {
							$("#mapaSeleccion").append("<h4>Error al cargar el mapa. Pruebe a ejecutar de nuevo la consulta.</h4>");
							$('#loadingMapaSeleccion').empty();
						}
					});
				}
			});
		}
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Gráfico pestaña 1 hogares ICE
	//-------------------------------------------------------------------------------------
	totalHogaresICE = 0;
	valorBase = 0;
	$("#loadingHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	$.get('index.php?r=GeoSecciones/infoEntornoHogaresICESecciones&id=' + seccionesSelected.toString(), function (data3){		
		categorias = [];
		datos = [];
		datosNacional = [];
		datosPorcentaje = [];
		$.each(data3[0][0], function(index, element){
			categorias.push(index);
			datos.push(parseFloat(element));
			totalHogaresICE += parseFloat(element);
		})
		$.each(data3[1][0], function(index, element){
			datosNacional.push(parseFloat(element));
		})
		$.each(data3[2][0], function(index, element){
			datosPorcentaje.push(parseFloat(element));
		})		
		valorBase += data3[3];		
		
		$('#textoHogaresICE').append('Estimación ICE Hogares Selección (Base 100=España): ' + valorBase);
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$('#infoHogaresICE').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: 0,
				plotShadow: false,
				//height: 300,
				//width: 300
			},
			title: {
				text: '',
				align: 'center',
				//verticalAlign: 'middle',
				//y: 50
			},
			legend:{
				enabled:true
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
				shared: false,
				formatter: function() {
					var text = '';
					if(this.series.name == 'Hogares Renta') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(0);
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + this.y.toFixed(1) + '%';
					}
					/*if(this.series.name == 'Hogares') {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,0})?/));
					} else {
						text = '<b>' + this.series.name+' '+this.x + ':</b> ' + Number(this.y.toString().match(/^\d+(?:\.\d{0,1})?/)) + '%';
					}*/
					return text;
				}
			},
			xAxis: {
				title: 'Hogares Renta',
				categories: categorias,
				crosshair: true,
				labels: {
					rotation: -45,
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					} 
				}
			},
			yAxis: [
				{ // Primary yAxis
					title: {
						text: 'Hogares renta'
						,
						style: {
							color: '#059800'
						}
					},
					labels: {
						format: '{value}',
						style: {
							color: '#059800'
						}
					}				
				}, { // Secondary yAxis
					title: {
						text: '% Nacional'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}, { // Secondary yAxis
					title: {
						text: '% Selección'
					},
					labels: {
						format: '{value}%'
					},
					opposite: true
				}
			],
			series: [{
				type: 'column',
				name: 'Hogares Renta',
				//innerSize: '50%',
				color:'#059800',
				data: datos,
				yAxis: 0,	
				tooltip: {
					yDecimals: 0
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.0f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Nacional',
				//innerSize: '50%',
				color:'#000000',
				data: datosNacional,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			},{
				type: 'spline',
				name: '% Selección',
				//innerSize: '50%',
				color:'#6cdb68',
				data: datosPorcentaje,
				yAxis: 1,
				tooltip: {
					valueSuffix: '%',
					yDecimals: 1
				},
				dataLabels: {
					enabled: false,
					color: '#000000',
					align: 'center',
					format: '{point.y:.1f}', 
					style: {
						fontSize: '10px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
		$('#loadingHogaresICE').empty();
	})
	
	//-------------------------------------------------------------------------------------
	//Tabla corta de los hogares en la pestaña 1
	//-------------------------------------------------------------------------------------
	$("#loadingTablaCortaHogaresICE").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=GeoSecciones/infoTablaCortaHogaresICESecciones&cp=' + seccionesSelected.toString(), function (data3){
		$("#infoTablaCortaHogaresICE").hide();
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<th></th>"));
		row.append($("<th><b>Hogares Renta Selección</b></th>"));
		row.append($("<th><b>% Selección</b></th>"));
		row.append($("<th><b>% Nacional</b></th>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Bajo</td>"));
		row.append($("<td>" + data3['hogares1'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares1_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Bajo</td>"));
		row.append($("<td>" + data3['hogares2'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares2_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio</td>"));
		row.append($("<td>"+data3['hogares3'].toLocaleString('de-DE', {maximumFractionDigits:0})+"</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		row.append($("<td>"+data3['hogares3_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1})+"%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>Medio-Alto</td>"));
		row.append($("<td>" + data3['hogares4'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares4_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
					
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td>>Alto</td>"));
		row.append($("<td>" + data3['hogares5'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		row.append($("<td>" + data3['hogares5_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</td>"));
		
		var row = $("<tr />")
		$("#infoTablaCortaHogaresICE").append(row); 
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + data3['hogares_total'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		row.append($("<td><b>" + data3['hogares_total_porcentaje_espana'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "%</b></td>"));
		
		$('#loadingTablaCortaHogaresICE').empty();
	});
	
	//-------------------------------------------------------------------------------------
	//Competencia
	//-------------------------------------------------------------------------------------
	$("#loadingCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	$.get('index.php?r=geoCp/getCompeSecciones&cp='+ seccionesSelected.toString(), function (data3){
		$("#infoCompeEns").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalNum = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		var i = 0;
		var c = 0, s = 0;
		$.each(data3, function(index, value){
			if(i<10){
				var row = $("<tr />")
				$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td>" + value.ensena + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}else{
				c += value.total;
				s += value.superficie;
				totalSup += value.superficie;
				totalSupNacional = value.superficienacional;
				totalNum += value.total;
				totalPoblacion = value.poblacion;
				totalPoblacionNacional = value.poblacionnacional;
			}
			i++;
		});
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td>Resto</td>"));
		row.append($("<td>" + s.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + c.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var row = $("<tr />");
		$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
		
		var densidadComercial = (totalSup / totalPoblacion) * 1000;				
		var densidadComercialNacional = (totalSupNacional / totalPoblacionNacional) * 1000;		
		$('#textoDensidadComercial').append('Densidad Comercial Selección: ' + densidadComercial.toFixed(1).replace(".", ","));
		$('#textoDensidadComercialNacional').append('Densidad Comercial Nacional: ' + densidadComercialNacional.toFixed(1).replace(".", ","));
		$('#loadingCompetencia').empty();
	});
	
	$("#loadingCompetenciaSup").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');
	
	$.get('index.php?r=geoCp/getCompeSupSecciones&cp='+ seccionesSelected.toString(), function (data3){
		$("#infoCompeSup").empty();
		var totalSup = 0;
		var totalNum = 0;
		
		var row = $("<tr />")
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Tipo</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		$.each(data3, function(index, value){
				var row = $("<tr />")
				$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<td >" + value.tipo + "</td>"));
				row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
				totalSup += value.superficie;
				totalNum += value.total;
		});
		var row = $("<tr />");
		$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td><b>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		row.append($("<td><b>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</b></td>"));
		$('#loadingCompetenciaSup').empty();
	});
	
	$.get('index.php?r=geoCp/getCompeDescargableSecciones&cp='+ seccionesSelected.toString(), function (data3){	
		
		$("#infoCompeDescargable").empty();
		var row = $("<tr />");
		var totalSup = 0;
		var totalSupNacional = 0;
		var totalPoblacion = 0;
		var totalPoblacionNacional = 0;
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th><b>Enseña</b></th>"));
		row.append($("<th><b>Superficie</b></th>"));
		row.append($("<th><b>Dirección</b></th>"));
		row.append($("<th><b>Número</b></th>"));
		row.append($("<th><b>Código Postal</b></th>"));
		row.append($("<th><b>Provincia</b></th>"));
		row.append($("<th><b>Municipio</b></th>"));
		var i = 1;
		
		$.each(data3, function(index, value){			
			var row = $("<tr />")
			$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td>" + value.ensena + "</td>"));
			row.append($("<td>" + value.superficie + "</td>"));
			row.append($("<td>" + value.direccion + "</td>"));
			row.append($("<td>" + value.numero + "</td>"));
			row.append($("<td>" + value.cp + "</td>"));
			row.append($("<td>" + value.provincia + "</td>"));
			row.append($("<td>" + value.municipio + "</td>"));
			totalSup += value.superficie;
			totalSupNacional = value.superficienacional;
			totalPoblacion = value.poblacion;
			totalPoblacionNacional = value.poblacionnacional;			
			i++;			
		});
		
		var row = $("<tr />");
		$("#infoCompeDescargable").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<td><b>TOTAL</b></td>"));
		row.append($("<td>" + totalSup + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
	});
	
	//-------------------------------------------------------------------------------------
	//Tabla indicadores
	//-------------------------------------------------------------------------------------
	$("#loadingTablaIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');		
	$.get('index.php?r=GeoSecciones/infoTablaIndicadoresSecciones&cp=' + seccionesSelected.toString(), function (data3){
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));		
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
							
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadoresMostrar").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));*/
		
		//--------------------------------------------------------------------------------------------------------------
		//EXCEL
		//--------------------------------------------------------------------------------------------------------------
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<th></th>"));
		row.append($("<th></th>"));
		row.append($("<th><b>Población</b></th>"));
		row.append($("<th><b>Selección</b></th>"));
		row.append($("<th><b>Nacional</b></th>"));
		
		/*var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Envejecimiento</td>"));
		row.append($("<td>El % de población mayor de 64 años sobre la población menor de 16 años</td>"));
		row.append($("<td>" + data3['totalPoblacionEnvejecimiento'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeEnvejecimientoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));*/
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Dependencia</td>"));
		row.append($("<td>Cociente entre personas menores de 15 años y mayores de 64 entre la población entre 16 y 64 años</td>"));
		row.append($("<td>" + data3['totalPoblacionDependencia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeDependenciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Infancia</td>"));
		row.append($("<td>Personas menores de 16 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionInfancia'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeInfanciaNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Tasa de Vejez</td>"));
		row.append($("<td>Personas mayores de 64 años entre la población total</td>"));
		row.append($("<td>" + data3['totalPoblacionVejez'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezSeleccion'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['porcentajeVejezNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice de Desempleo SEPE (Municipio Seleccionado)</td>"));
		row.append($("<td>El % de parados registrados sobre los activos + parados registrados</td>"));
		row.append($("<td></td>"));
		//row.append($("<td>" + data3['pob_activa'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleo'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['cifraDesempleoNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Población Vinculada No Residente (Municipio Seleccionado)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['pobVinculada'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td></td>"));
		row.append($("<td></td>"));
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Accesibilidad</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['accesibilidad'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['accesibilidadNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['accesibilidad'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 2 && data3['accesibilidad'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidad'] >= 4 && data3['accesibilidad'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidad'] >= 6 && data3['accesibilidad'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidad'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['accesibilidadNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 2 && data3['accesibilidadNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['accesibilidadNacional'] >= 4 && data3['accesibilidadNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['accesibilidadNacional'] >= 6 && data3['accesibilidadNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['accesibilidadNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
					
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Nivel de Estudios</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['totalPoblacion'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudios'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		row.append($("<td>" + data3['nivel_estudiosNacional'].toLocaleString('de-DE', {maximumFractionDigits:1}) + "</td>"));
		/*if(data3['nivel_estudios'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 2 && data3['nivel_estudios'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudios'] >= 4 && data3['nivel_estudios'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudios'] >= 6 && data3['nivel_estudios'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudios'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}
		
		if(data3['nivel_estudiosNacional'] < 2){
			row.append($("<td>Muy Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 2 && data3['nivel_estudiosNacional'] < 4){
			row.append($("<td>Bajo</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 4 && data3['nivel_estudiosNacional'] < 6){
			row.append($("<td>Medio</td>"));
		}
		if(data3['nivel_estudiosNacional'] >= 6 && data3['nivel_estudiosNacional'] < 8){
			row.append($("<td>Alto</td>"));
		}
		if(data3['nivel_estudiosNacional'] > 8){
			row.append($("<td>Muy Alto</td>"));
		}*/	
		
		var row = $("<tr />")
		$("#infoTablaIndicadores").append(row); 
		row.append($("<td>Índice Nivel Económico (España=Base 100)</td>"));
		row.append($("<td>Índice de nivel económico a partir del ICE (Índice de Capacidad Económica)</td>"));
		row.append($("<td></td>"));
		row.append($("<td>" + data3['ICE'].toLocaleString('de-DE', {maximumFractionDigits:0}) + "</td>"));
		row.append($("<td>100</td>"));
					
		$('#loadingTablaIndicadores').empty();
		$("#loadingIndicadores").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');				
		
		//Gráfico de araña
		Highcharts.setOptions({
			global: {
				useUTC: false,
				
			},
			lang: {
			  decimalPoint: ',',
			  thousandsSep: '.'
			}
		});
		$(function () {
			$('#infoIndicadores').highcharts({
				chart: {
					polar: true,
					type: 'line'
				},
				title: {
					text: '',
					x: -80
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
				pane: {
					size: '80%'
				},
				xAxis: {
					categories: [//'Índice de Envejecimiento',
								'Tasa de Dependencia', 
								'Tasa de Infancia',
								'Tasa de Vejez',
								//'Índice de Desempleo SEPE (Municipio Seleccionado)', 
								'Accesibilidad',
								'Nivel de Estudios', 
								'Índice Nivel Económico'],
					tickmarkPlacement: 'on',
					lineWidth: 0
				},
				yAxis: {
					gridLineInterpolation: 'polygon',
					lineWidth: 0,
					min: 0
				},
				tooltip: {
					enabled: true,
					shared: true,
					pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.1f}</b><br/>'
				},
				legend: {
					align: 'right',
					verticalAlign: 'top',
					y: 50,
					layout: 'vertical'
				},
				series: [{
					name: '% Selección',
					data: [//data3['porcentajeEnvejecimientoSeleccionGrafico'], 
							data3['porcentajeDependenciaSeleccionGrafico'], 
							data3['porcentajeInfanciaSeleccionGrafico'], 
							data3['porcentajeVejezSeleccionGrafico'], 
							//data3['cifraDesempleoPorcentaje'], 
							data3['accesibilidadSeleccionGrafico'], 
							data3['nivel_estudiosSeleccionGrafico'], 
							data3['ICE']],
					pointPlacement: 'on'
				}, {
					name: '% Nacional',
					data: [//100,//data3['porcentajeEnvejecimientoNacional'], 
							100,//data3['porcentajeDependenciaNacional'], 
							100,
							100,
							//100,//data3['cifraDesempleoNacional'], 							
							100,//data3['accesibilidadNacionalPorcentaje'], 							
							100,//data3['nivel_estudiosNacionalPorcentaje'], 
							100],//ICE
					pointPlacement: 'on'
				}]

			});
		});		
		$('#loadingIndicadores').empty();
		$('#butExportarExcel').fadeIn(1500);
	});
	
	//--------------------------------------------------------------------------------------------------------------------------
	//MAPA COMPETENCIA
	//--------------------------------------------------------------------------------------------------------------------------
	
	$("#loadingMapaCompetencia").html('<img id="loading-image" width=80 src="images/loading.gif" alt="Loading..." />');	
	$.ajax({
		url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoSecciones&cp=' + seccionesSelected.toString(),
		type: 'GET',
		success: function(data){ 
			$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
			$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
			$('#loadingMapaCompetencia').empty();
		},
		error: function(data) {
			$.ajax({
				url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoSecciones&cp=' + seccionesSelected.toString(),
				type: 'GET',
				success: function(data){ 
					$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
					$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
					$('#loadingMapaCompetencia').empty();
				},
				error: function(data) {
					$.ajax({
						url: 'index.php?r=GeoNielssen/MapaCompetenciaEntornoSecciones&cp=' + seccionesSelected.toString(),
						type: 'GET',
						success: function(data){ 
							$("#mapaCompetencia").append("<img alt='Plano selección con competencia mayor de 1000m²' style='width:100%;' src='images/mapas/"+ data['foto'] +"'/>");
							$("#leyendaCompetencia").append("<img alt='Leyenda plano selección con competencia mayor de 1000m²' style='width:30%; height:30%;' src='images/leyendaCompetencia.jpg'/>");
							$('#loadingMapaCompetencia').empty();
						},
						error: function(data) {
							$("#mapaCompetencia").empty();
							$("#leyendaCompetencia").empty();
							$("#mapaCompetencia").append("<h4>En la zona seleccionada no existe ningún centro con superficie mayor a 1000m².</h4>");
							$('#loadingMapaCompetencia').empty();
						}
					});	
				}
			});	
		}
	});	
	
	//--------------------------------------------------------------------------------------------------------------------------
	//FIN MAPA
	//--------------------------------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------
	//Mostrar el botón que abre el modal con los gráficos y tablas.
	//-------------------------------------------------------------------------------------	
	$("#butChartsSecciones").show();
}

/*$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar1").val( $("<div>").append( $("#infoTablaCorta").eq(0).clone()).html());
		$("#datos_a_enviar2").val( $("<div>").append( $("#infoTablaLarga").eq(0).clone()).html());
		$("#datos_a_enviar3").val( $("<div>").append( $("#infoTablaCortaHogares").eq(0).clone()).html());		
		$("#datos_a_enviar4").val( $("<div>").append( $("#infoTablaCortaHogaresICE").eq(0).clone()).html());
		$("#datos_a_enviar5").val( $("<div>").append( $("#infoCompeEns").eq(0).clone()).html());
		$("#datos_a_enviar6").val( $("<div>").append( $("#infoCompeSup").eq(0).clone()).html());
		
		$("#FormularioExportacion").submit();
	});
});*/

//EXPORTAR A EXCEL - FUNCIÓN
var tablesToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,'
    , tmplWorkbookXML = '<\?xml version="1.0"\?><\?mso-application progid="Excel.Sheet"\?><Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">'
      + '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>Alcampo</Author><Created>{created}</Created></DocumentProperties>'
      + '<Styles>'
      + '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>'
      + '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>'
      + '<Style ss:ID="s62"><Font ss:Size="22" ss:Bold="1" /></Style>'
      + '</Styles>' 
      + '{worksheets}</Workbook>'
    , tmplWorksheetXML = '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>'
    , tmplCellXML = '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
    return function(tables, wsnames, wbname, appname) {
      var ctx = "";
      var workbookXML = "";
      var worksheetsXML = "";
      var rowsXML = "";

      for (var i = 0; i < tables.length; i++) {
        if (!tables[i].nodeType) tables[i] = document.getElementById(tables[i]);
        for (var j = 0; j < tables[i].rows.length; j++) {
          rowsXML += '<Row>'
          for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
            var dataType = tables[i].rows[j].cells[k].getAttribute("data-type");
            var dataStyle = tables[i].rows[j].cells[k].getAttribute("data-style");
            var dataValue = tables[i].rows[j].cells[k].getAttribute("data-value");
            dataValue = (dataValue)?dataValue:tables[i].rows[j].cells[k].innerHTML;
            var dataFormula = tables[i].rows[j].cells[k].getAttribute("data-formula");
            dataFormula = (dataFormula)?dataFormula:(appname=='Calc' && dataType=='DateTime')?dataValue:null;
            ctx = {  attributeStyleID: (dataStyle=='Currency' || dataStyle=='Date')?' ss:StyleID="'+dataStyle+'"':''
                   , nameType: (dataType=='Number' || dataType=='DateTime' || dataType=='Boolean' || dataType=='Error')?dataType:'String'
                   , data: (dataFormula)?'':dataValue
                   , attributeFormula: (dataFormula)?' ss:Formula="'+dataFormula+'"':''
                  };
            rowsXML += format(tmplCellXML, ctx);
          }
          rowsXML += '</Row>'
        }
        ctx = {rows: rowsXML, nameWS: wsnames[i] || 'Sheet' + i};
        worksheetsXML += format(tmplWorksheetXML, ctx);
        rowsXML = "";
      }

      ctx = {created: (new Date()).getTime(), worksheets: worksheetsXML};
      workbookXML = format(tmplWorkbookXML, ctx);

	console.log(workbookXML);

      var link = document.createElement("A");
      link.href = uri + base64(workbookXML);
      link.download = wbname || 'Workbook.xls';
      link.target = '_blank';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
})();

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-64660106-1', 'auto');
ga('send', 'pageview');
 
</script>