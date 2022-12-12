<div class="pane ui-layout-south">
	<div id="loading">
	  <img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />
	</div>

	<div class="row">
	  <div class="col-md-2" >
	
	  <label>Actual</label>
	
		<br/>
		<br/>
		
		<button type="button" class="btn btn-primay" title="Calcular" onclick="cargarGraficoAno()">Calcular 
							<img width=22 src="images/concentricos.png" alt="Cacular"/>
						</button>

		<!--<select onchange="cargarGraficoAno()" id="ano" name="ano">
		  <option value="2 ">  </option>
		  <option value="1 ">Actualiza</option>
		  
		</select>-->
		<br/>
		<br/>
		<br/>
		<div id="layertree"  class="tree" ></div>
	
	  </div>	
	  <div class="col-md-7" >
		<div id="map" style="height:500px; margin-right=0px">
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
		
		<div class="col-md-3" >
		
			<div id="popup" >
			<!--a href="#" id="popup-closer" class="ol-popup-closer"></a-->
			  <div id="popup-content">
				<div id="tabs">
				  <ul>
					<li><a href="#tabs-1">Plantacion</a></li>
					<li><a href="#tabs-2">D. generales</a></li>
					<li><a href="#tabs-4">D. técnicos</a></li>
					<li><a href="#tabs-3">Especies</a></li>
					<li><a href="#tabs-6">Especies_detallado</a></li>	
					<li><a href="#tabs-7">Labores</a></li>
					<li><a href="#tabs-5">Predios</a></li>
					<li><a href="#tabs-8">Cliente</a></li>
					<li><a href="#tabs-0">Facturas</a></li>
					<li><a href="#tabs-A">Informe</a></li>
					<li><a href="#tabs-9">Puntual</a></li>
				  </ul>
				  
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
					<table id="infoCompeEns1" class="infoTabla"></table><br><br>
					<table id="infoCompeSup1" class="infoTabla"></table>
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
					<table id="infoCompeSup9" class="infoTabla"></table>
				  </div>
				 <div id="tabs-0">
					<table id="infoPlantas" class="infoTabla"></table><br><br>
					<table id="infoLabores" class="infoTabla"></table>
				  </div>
				  <div id="tabs-A" style="font-size:16px;"width="100%"  >
							<div class="row" >
								<div class="col-md-2">
									<a id="informeparcelapdf" type="button" class="btn btn-primay" title="informe" target="_blank"  href="index.php?r=site/informeparcelapdf&parcela=">Informe pdf
									<img width=22 src="images/concentricos.png" alt="PDF"> </a>
									</div>	
							</div>
						</div>
				</div>
			  </div>
			
			
			</div>
		
		</div>
	</div>		
</div>
<!--div class="pane ui-layout-north">North</div-->


<div class="pane ui-layout-center">
	<!--<div style="width: 50%; height: 100%; float:left" id="grafico1"></div>
	<div style="width: 50%; height: 100%; float:right" >
		
		<div id="grafico2" style ="height: 100%"></div>-->
	
	
 <div class="row">
   <div class="col-md-12" >
	<div id="popup" >
			<!--a href="#" id="popup-closer" class="ol-popup-closer"></a-->
		<div id="popup-content2">
			<div id="tabs2">
											
								
				<div id="tabs2-1">	
								    
											<!--<div id="map" style="width:100%; height:80%"></div>		-->	
										<div class="row">
											<div class="col-md-8" >
												<div id="grafico80"></div>
											</div>
											<div class="col-md-4" >
												<div id="grafico80_A"></div>
											</div>
										</div>	
										
										<div class="row">
											
											<div class="col-md-6">
													<div id="grafico90"></div>
											</div>

											<div class="col-md-6">
											    <div id="grafico91"></div>	
											</div>
											
										</div>	
										
										<div class="row">	
											
											<div class="col-md-4">
											    <h4 id="Titulo92" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico92" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											
											<div class="col-md-4">
											    <h4 id="Titulo93" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico93" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											<div class="col-md-4">
											    <h4 id="Titulo94" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico94" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										
										</div>
										
										<div class="row">	
											<div class="col-md-4">
											    <h4 id="Titulo102" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico102" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											<div class="col-md-4">
											    <h4 id="Titulo103" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico103" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											<div class="col-md-4">
											    <h4 id="Titulo104" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico104" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										
										</div>
										<div class="row">
											
											<div class="col-md-6" >
												<div id="grafico100"></div>
											</div>
											<div class="col-md-6">
											    <div id="grafico101"></div>	
											</div>
										</div>

										
										
										
										<div class="row">
											
											
											<div class="col-md-5" id="panel1-1">
											    <h4 id="Titulo0" width="74%"  class="p-3 mb-2 bg-danger text-white".bg-success></h4>
												<h5 id="pobEdad0"></h5>
												<h5 id="pobEdad1"></h5>
												<h5 id="pobEdad2"></h5>
												<h5 id="pobEdad3"></h5>
												<h5 id="pobEdad4"></h5>
												<div id="loadingInfoEdad"></div>
												<div id="infoEdad" style="width:auto;"></div>
												
												<h4 id="Titulo1" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<div id="loadingTablaCorta"></div>
												<div class="table">									
														<table id="infoTablaCorta" class="table-striped bg-danger text-white "></table>
												</div>
												
												<h4 id="Titulo2" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<div id="loadingTablaLarga"></div>
												<div class="table">
															<table id="infoTablaLarga" class="table-striped bg-danger text-white" ></table>
												</div>
												<h4 id="Titulo3" width="74%"  class="p-3 mb-2 bg-danger text-white".bg-success></h4>
												<div id="loadingTablaLarga2"></div>
												<div class="table">
															<table id="infoTablaLarga2" class="table-striped bg-danger text-white"></table>
												</div>
												<h4 id="Titulo4" width="74%" class="p-3 mb-2  bg-danger text-white  ".bg-success></h4>
												<div id="loadingTablaLarga3"></div>
												<div class="table">
															<table id="infoTablaLarga3" class="table-striped bg-danger text-white"></table>
												</div>
											</div>
											
											
											
											<div class="col-md-7">
											    <div id="grafico22"></div>
												<div id="grafico2"></div>
												<div id="grafico21"></div>
												
											</div>
										</div>
										
				</div>


				<div id="tabs2-2">	
									
											<div class="row">
												<div class="col-md-12">
													<div id="container10" style="width:100%; height:100%">
													</div>
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
											
				</div>		

				<div id="tabs2-3">	
										<div class="row">
												<div class="col-md-6">
													<div id="grafico3" style="width:100%; height:300%"></div>
												</div>
												<div class="col-md-6">
													<div id="grafico4" style="width:100%; height:300%"></div>
												</div>
										</div>
										<div class="row">
												<div class="col-md-12">
													<div id="container13" style="width:100%; height:300%"></div>
													
										        </div>
										    </div>
										<div class="row">
												<div class="col-md-12">
													<div id="container14" style="width:100%; height:300%"></div>
													
										        </div>
										  </div>
		
				</div>
								
			</div>
		</div>
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
<!--inserta la libreria de cambio de coordenadas-->
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
var iso1, iso2, iso3, iso4, iso5, microcuencas_selected, plantaciones_cuencas_selected, plantaciones_ano_en_curso,parcelas, arg_cuencas, ensenas, loc = null, idAlcampo, idEncuesta, cuencas, microcuenca;
var sel, selLayer, osm, google, google_carto,parcelassel,sal,salid,codigobuscado,solo_plantaciones,dataano,dataespecie, dataanocu, datacuenca;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
var myLayout;
var infoCV;
cuencas =99;
idAlcampo=99;
//REFORESTACION
var tipoactividad=1;




//**********************************
// EVENTOS
//**********************************


$(document).ready(function () {
	myLayout = $('#content').layout({
		west__size:	'20%',
		east__size:	'35%',
		north__size:'50%',
		south__size:'70%',
		east__initClosed: true, 
		south__initClosed: true, 
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
			//plantaciones_puntos.getSource().setUrl("'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad="+tipoactividad);
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



//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************

	

	

	
	
	
	
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
	 cargarGraficoAno();
	 $('#grafico80_A').empty();
	var projection = new ol.proj.Projection({
	    code: 'EPSG:32619',
	  //code: 'EPSG:3857',
	  //NO SE SI A ESTO SE LE HACE CASO
	  // The extent is used to determine zoom level 0. Recommended values for a
	  // projection's validity extent can be found at http://epsg.io/.
	  //extent: [485869.5728, 76443.1884, 837076.5648, 299941.7864],
	  units: 'm'
	});


	
	
//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************
	
	
//DEFINICION DE CAPAS DE GOOGLE SATELITE O MAPA
//**********************************************
//me lo he llevado mas abajo para que puedan estar en el arbol


	
	//ol.proj.addProjection(projection);
	var layers = [];
	
	
//OSM


	
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
	
		var f = new Date();
    var ano = f.getFullYear() ;
	


	var ahora = new Date();
	var targetDate = new Date("12/31/" +ano);
	var timeAfterTarget = Math.floor(( ahora.getTime() - targetDate.getTime()) / 86400000 +365) ;
	
	
	//ATENCION QUITAR cuando se tenga base de datos actual
	ano=ano;
	doy=timeAfterTarget;
	
	plantaciones_ano_en_curso = new ol.layer.Image({
		//extent: extent,
		id: 'Plantaciones de año en curso',
		name: "Plantaciones de año en curso",
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&ano='+ano+'&doy='+doy+'&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_ANO_EN_CURSO',
		source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&ano='+ano+'&doy='+doy,
		crossorigin: 'anonymous',
			params: {'LAYERS': 'plantaciones_ano_en_curso', 'SRS': "EPSG:3857" }
		})
	})
	
	
	plantaciones_puntos = new ol.layer.Image({
	id: 'Puntos',
	name:'Puntos',
	opacity :'0.75',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad+'&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_PUNTOS_ACTIVIDAD_ANO',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad,
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Plantaciones_puntos_actividad_ano', 'SRS': "EPSG:3857" }
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
	opacity :'0.2',
	
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
//AQUI AÑADO LAS CARTOGRAFIAS DE BASE OSM, Y GOOGLE POR EL MOMENTO
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
		layers: [ plan_sierra, osm_viario, rios_principales, rios, embalses_general, cuencas_plan_sierra]
	});
	
	layers.push(groupCapas30);
	
		
	
	
	
	groupCapas = new ol.layer.Group({
		id: 'Plantaciones',
		name: 'Plantaciones',
		layers: [microcuencas_selected, arg_cuencas, parcelas, plantaciones_cuencas_selected, plantaciones_ano_en_curso,plantaciones_puntos ]
	});
	
	layers.push(groupCapas);
	

	
	
	
	//COMPETENCIA


	
	
	//ENSEÑAS
	
	
	
	
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
		  center: [-7920000, 2195000],
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
	
	
//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************

	
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
		$('#coord').html(ol.coordinate.toStringXY(coord, 2) + "<br> WGS 84  PseudoMercator<br> " +ol.coordinate.toStringXY(sal, 6) + "<br> WGS 84  Geograficas<br>"  +ol.coordinate.toStringXY(salid, 0) + "<br> WGS 84  UTM 19N<br>");	
	//"
	});
 
 
	
	//PINCHAR EN UN LA PANTALLA
	
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
			var resolution = map.getView().getResolution();
			var content = document.getElementById('popup-content');
			lastCoords = event.coordinate;
			map.getLayers().getArray()[1].getLayers().getArray()[0];
			//Alertas para vigilancia
			//alert (x +" - "+y);
			
		
			sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:4326');
			//alert (sal[0]+'    '+sal[1]);
			
			$.get( "index.php?r=puntos/GetSelectMicrocuenca&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data10 ) {
			
				
				data10=JSON.parse(data10);
				//alert ('Cuenca = ' +data10[0].sub_cuenca+' - '+data10[0].mic_cuenca);	
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
               myLayout.open('east');
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
				
	
				
					
				})
	
			
		}
		
	})
	
	
	
	
	
	
//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************
	
	
	
	
	
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



}

//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************

//****************************************
//
// FUNCIONES DE CARGA DE GRAFICOS.
//
//***********************************+


//PRIMER GRAFICO TARTA ESPECIES

function cargarGraficoAno(){
	
		//plantaciones_ano_en_curso.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&ano=2018&doy=161");
		
	$('#grafico80').empty();
	
	var f = new Date();
    var dia =(f.getDate() + "-" + (f.getMonth() +1) + "-" + f.getFullYear());
	
	
	$("#grafico80").append("</td>   <td ><h3><b>Fecha de hoy : " +dia+ ", (desde 1-Enero)</b></h3></td> " );
	$("#grafico80_A").html('<img id="loading-image" width=200 src="images/logo3_75_75.gif" alt="Loading..." />');
		$('#grafico90').empty();
		$('#grafico91').empty();
		$('#grafico92').empty();
		$('#grafico93').empty();
		$('#grafico93').empty();
		$('#grafico100').empty();
		$('#grafico101').empty();
		$('#grafico102').empty();
		$('#grafico103').empty();
		$('#grafico104').empty();
		
		$("#grafico101").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
		$("#grafico91").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	  $('#pobEdad0').empty();
		$('#pobEdad1').empty();
		$('#pobEdad2').empty();
		$('#pobEdad3').empty();
		$('#pobEdad4').empty();
		$('#Titulo0').empty();
		$('#Titulo1').empty();
		$('#Titulo2').empty();
		$('#Titulo3').empty();
		$('#Titulo4').empty();
		$('#grafico2').empty();
		$('#grafico21').empty();
		$('#grafico22').empty();
		$('#infoTablaCorta').empty();
	    $('#infoTablaLarga').empty();
     	$('#infoTablaLarga2').empty();
    	$('#infoTablaLarga3').empty();
		
       var id2 = parseInt($("#ano").val());
//Cuenca
//alert ('cuenca'+idAlcampo);
//microcuenca
//alert ('microcuenca'+microcuenca);
//año
//alert ('año'+id2);

//(((((((((((((((((((((((((((((((((((((((((((((((((((((((())))))))))))))))))))))))))))))))))))))))))))))))))))))))
//(((((((((((((((((((((((((((((((((((((((((((((((((((((((())))))))))))))))))))))))))))))))))))))))))))))))))))))))

	$.get('index.php?r=Meteoro/GetMesAnoMedio', function (data){
	$.get('index.php?r=Meteoro/GetMesAnoActual', function (data1){
	
	//data = JSON.parse(data);
	data = JSON.parse(data);			
	data1 = JSON.parse(data1);
	
$('#grafico101').empty();	
$('#grafico101').highcharts({

        chart: {
				type: 'spline',
				zoomType: 'xy'
			},
			title: {
				text: 'Lluvia mensual mm (ultimos 12 meses)'
			},
			subtitle: {
				text: 'Estación de SAJOMA'
			},
			xAxis: {
				title: {
					enabled: true,
					text: 'mes'
				},
				startOnTick: true,
				endOnTick: false,
				showLastLabel: true,
				gridLineWidth: 2,
				min:0,
				max:12
			},
			yAxis: [{
				title: {
					text: 'mm de agua'
				
				},
				min: 0,
				max: 1000
			}],
			legend: {
				layout: 'horizontal',
				align: 'left',
				verticalAlign: 'top',
				x: 80,
				y: 80,
				floating: true,
				backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
				borderWidth: 1
			},
			tooltip: {
						valueDecimals: 0,
						 crosshairs: true,
						shared: true
					
					},
			plotOptions: {
				scatter: {
					marker: {
						radius: 2,
						states: {
							hover: {
								enabled: true,
								lineColor: 'rgb(100,100,100)'
							}
						}
					},
					states: {
						hover: {
							marker: {
								enabled: false
							}
						}
					}
					
					 
				}
			},
			series: [ {
				name: 'Ultimos 12 meses',
				yAxis:0,
				color: 'rgba(255, 32, 32, 1)',
				data: data1

				}, {
				name: 'Máxima.',
				yAxis:0,
				color: 'rgba(22, 230, 83, 0.4)',
				data: data.segundo

				},
			{
				name: ' Promedio',
				yAxis:0,
				color: 'rgba(22, 83, 83, 0.4)',
				data: data.primero,

			},   {
				name: 'Minima',
				yAxis:0,
				color: 'rgba(22, 83, 230, 0.4)',
				data: data.tercero

				}
				
				
				
				],
		});
       
	});
	
	});
	
	
	
	
	
	
	
	$.get('index.php?r=Poa/GetTecnicoActividad&tipoactividad='+tipoactividad, function (data){

	data = JSON.parse(data);			
	
	
$('#grafico100').highcharts({
	chart: {
				type: 'spline',
				zoomType: 'xy'
			},


    title: {
        text: 'Supervisiones por técnico'
    },

    

    yAxis: {
        title: {
            text: 'Supervisiones'
        }
    },
	xAxis: {
        title: {
            text: 'Numero de técnico (relativo)'
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
            pointStart: 0
        }
    },

    series: [{
        name: 'Supervisiones por técnico',
		color: 'rgba(255, 30, 30, 1)',
        data: data
    }],

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

})
	})	
	
	
	$.get('index.php?r=Poa/GetAvance&tipoactividad='+tipoactividad, function (data){
	
	data = JSON.parse(data);
	categorias=[];
	serie1=[];
	serie2=[];
	serie3=[];
	for (i=0; i<data.length; i++){
		categorias.push(data[i].plantacion);
		serie1.push(data[i].tareasejecutadas);
		serie2.push(data[i].tareasprevano);
		serie3.push(data[i].porce);
		
	}
		
	
$('#grafico90').empty();
	
$('#grafico90').highcharts({

    chart: {
        type: 'bar'
    },
    title: {
        text: 'Tareas ejecutadas vs previstas'
    },
    
    xAxis: {
        categories: categorias,
		 labels:{
			 style:{
				 color: '#000000',
				 fontSize: '12px'
			 },
		 },
        title: {
           text: '',
			 style: {
				  color: '#0000ff99',
                fontSize: '12px'
            }
        },
		
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Tareas',
            align: 'high',
			  style: {
				  color: '#0000ff99',
                fontSize: '18px'
            }
			
        },
		
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
		valueDecimals: 1,
        valueSuffix: ' tareas'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: false
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -0,
        y: 20,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Ejecutadas',
        data: serie1,
		color: '#ff000099'
    }, {
        name: 'Previstas',
        data: serie2,
		color: '#aa003399'
    }]
		});
		
		
	$('#grafico91').empty();
	
$('#grafico91').highcharts({

    chart: {
        type: 'bar'
    },
    title: {
        text: '% cumplimiento'
    },
    
    xAxis: {
        categories: categorias,
		 labels:{
			 style:{
				 color: '#000000',
				 fontSize: '12px'
			 },
		 },
        title: {
           text: '',
			 style: {
				  color: '#0000ff99',
                fontSize: '12px'
            }
        },
		
    },
    yAxis: {
        min: 0,
		max:100,
        title: {
            text: '%',
            align: 'high',
			  style: {
				  color: '#0000ff99',
                fontSize: '18px'
            }
			
        },
		
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
		valueDecimals: 1,
        valueSuffix: '%'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: false
            }
        }
    },
    legend: {
       enabled:false
    },
    credits: {
        enabled: false
    },
    series: [{
        name: '%',
        data: serie3,
		color: '#ff000099'

    }]
		});	
		
       

		})
	
	
/*
	
	$.get('index.php?r=Poa/GetPoa2', function (data){
	$.get('index.php?r=Poa/GetPlantadas2', function (data1){
	data = JSON.parse(data);
	data1 = JSON.parse(data1);	


	
	
	obje=((data1[data1.length-1].b/data[data1.length-1].b)*100);
	obje1=parseFloat(obje.toFixed(1));
	
	
	
	
	$('#grafico90').empty();


$('#grafico90').highcharts({
	
chart: {
        type: 'solidgauge'
    },

    title: {
		text: 'Cumplimiento (realizado vs previsto)'
	},

    pane: {
        center: ['50%', '60%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#fff',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    tooltip: {
        enabled: true
    }, 
	exporting: {
        enabled: false
    },

    // the value axis
    yAxis: {
        stops: [
		[0.0, '#ff000099'],
            [0.7, '#ff000099'], // greenDF5353
            [0.75, '#ffff0099'], // yellow
			  [0.85, '#66ff0099'],
            [0.97, '#00ff0099'] // red
        ],
        lineWidth: 0,
       
       
		 min: 0,
        max: 125,
        title: {
            text: 'Objetivo %'
        }
       
    },
	xAxis: {
        
		 min: 0,
        max: 130
        
       
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true
            }
        }
    },
	
    credits: {
        enabled: false
    },
	
   
    series: [{
        name: '%',
        data: [obje1],
        dataLabels: {
            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                   '<span style="font-size:12px;color:silver">%</span></div>'
        },
        tooltip: {
            valueSuffix: ' tareas'
        }
    }],	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
});

		
		
	})
	}) */
	
	/*
	$.get('index.php?r=Poa/GetPoa', function (data){
	
	$.get('index.php?r=Poa/GetPlantadas', function (data1){
	data = JSON.parse(data);
	data1 = JSON.parse(data1);	
	
$('#grafico91').empty();
	
$('#grafico91').highcharts({

        chart: {
				type: 'spline',
				zoomType: 'xy'
			},
			title: {
				text: 'Tareas plantadas'
			},
			subtitle: {
				text: 'Calendario no valido'
			},
			xAxis: {
				title: {
					enabled: true,
					text: 'Mes'
				},
				startOnTick: true,
				endOnTick: true,
				showLastLabel: true,
				gridLineWidth: 2,
				min:1,
				max:12
			},
			yAxis: [{
				title: {
					text: 'Tareas'
				
				},
				min: 0,
				max: 40000
			}],
			legend: {
				layout: 'vertical',
				align: 'left',
				verticalAlign: 'top',
				x: 80,
				y: 80,
				floating: true,
				backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
				borderWidth: 1
			},
			plotOptions: {
				scatter: {
					marker: {
						radius: 2,
						states: {
							hover: {
								enabled: true,
								lineColor: 'rgb(100,100,100)'
							}
						}
					},
					states: {
						hover: {
							marker: {
								enabled: false
							}
						}
					},
					tooltip: {
						valueDecimals: 0,
						headerFormat: '<b>{series.name}</b><br>',
						pointFormat: 'mes {point.x} , {point.y:} Tareas%'
						
						
					}
					
				}
			},
			series: [{
				name: 'Previstas',
				yAxis:0,
				color: 'rgba(23, 223, 83, 0.5)',
				data: data
				
				
				

			},  {
				name: 'Reales',
				yAxis:0,
				color: 'rgba(222, 23, 83, 1)',
				data: data1

	
	
				}
				
				
				],
		});
       
	
		})
	})*/
	
	
	$.get('index.php?r=Poa/GetActividadActividad&tipoactividad='+tipoactividad, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		$("#Titulo92").append("<td><h5>" +" Tipo de Plantación" + "</h5></td>" );
	$('#grafico92').empty();
	 var row = $("<tr />");
		$("#grafico92").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h5><b>Actividad</b></h5></td>"));
		
		row.append($("<td width=20%><h5><b>Plant</b></h5></td>"));
		row.append($("<td width=20%><h5><b>Tar</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico92").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#grafico92").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			
			$("#grafico92").append(row); 
		
		}
		
	
	})
	
	$.get('index.php?r=Poa/GetActividadActividadSubcuencas&tipoactividad='+tipoactividad, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		$("#Titulo93").append("<td><h5>" +"Tipo de Plantacion por Subcuenca" + "</h5></td>" );
	
	 var row = $("<tr />");
		$("#grafico93").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=20%<h5><b>Subcu.</b></h5></td>"));
		row.append($("<td width=60%><h5><b>Tipo</b></h5></td>"));	
		//row.append($("<td width=100><h4><b>Plantaciones</b></h5></td>"));
		row.append($("<td width=20%><h5><b>Tareas</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico93").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#grafico93").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].subcuenca.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
			//row.append($("<td><h4>" + data3[i].numero.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			
			var row = $("<tr />");
			
			$("#grafico93").append(row); 
		
		}
		
	
	})
	$.get('index.php?r=Poa/GetEspecieActividad&tipoactividad='+tipoactividad, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		$("#Titulo104").append("<td><h5>" +"Grupo de especie (salidas vivero)" + "</h5></td>" );
	
	 var row = $("<tr />");
		$("#grafico104").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=40%><h5><b>Tipo</b></h5></td>"));
			row.append($("<td width=40%><h5><b>Grupo</b></h5></td>"));
		row.append($("<td width=20%><h5><b>Plantas</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico104").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#grafico104").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		row.append($("<td><h5>" + data3[i].familia.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			
			$("#grafico104").append(row); 
		
		}
		
	
	})
	
	$.get('index.php?r=Poa/GetMunicipioActividad&tipoactividad='+tipoactividad, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		$("#Titulo102").append("<td><h5>" +" Municipios" + "</h5></td>" );
	
	    var row = $("<tr />");
		$("#grafico102").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h5><b>Municipio</b></h5></td>"));
		
		row.append($("<td width=40%><h5><b>Tareas</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico102").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#grafico102").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			
			$("#grafico102").append(row); 
		
		}
		
	
	})
	
	$.get('index.php?r=Poa/GetEspecieActividadPlantadas&tipoactividad='+tipoactividad, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		$("#Titulo94").append("<td><h5>" +"Epecies plantadas" + "</h5></td>" );
	
	 var row = $("<tr />");
		$("#grafico94").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=40%><h5><b>Tipo</b></h5></td>"));
		row.append($("<td width=20%><h5><b>Familia</b></h5></td>"));
		row.append($("<td width=20%><h5><b>Plantas</b></h5></td>"));
		row.append($("<td width=20%><h5><b>Tareas</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico94").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#grafico94").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].familia.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			
			$("#grafico94").append(row); 
		
		}
		
	
	})
	
	//por proyecto
	
	$.get('index.php?r=Poa/GetProyectoActividad&tipoactividad='+tipoactividad, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		$("#Titulo103").append("<td><h5>" +"Proyectos" + "</h5></td>" );
	
	 var row = $("<tr />");
		$("#grafico103").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h5><b>Proyecto</b></h5></td>"));
		
		row.append($("<td width=40%><h5><b>Tareas</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico103").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#grafico103").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			
			$("#grafico103").append(row); 
		
		}
		
	
	})
	


$.get('index.php?r=Graficos/GetPSanoex', function (data1){
	dataano = JSON.parse(data1);	
	//alert ('GetPSanoex')	;
  
});

$.get('index.php?r=Graficos/GetPSEspecies', function (data2){
	dataespecie = JSON.parse(data2);
	//alert ('PSEspecies')	;
});


$.get('index.php?r=Graficos/GetPSAnoEspecies', function (data){
	
	data = JSON.parse(data);
	
    var datos=[];

	
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
	
	 var dato=[];
	
	var dato={
						name:dataespecie[l].especie,
						data:datosespecie,
						
					}
					//alert ( +data[i].ano+'    '+data[i].especie+'    '+data[i].cantidad);
					
					
					datos.push(dato);
					
				
	}
					

	



//cuarto



//quinto





//fin de quinto

})

//septimo
$.get('index.php?r=Graficos/GetPSsubanoex', function (data1){
	dataanocu = JSON.parse(data1);	
	
  
});

$.get('index.php?r=Graficos/GetPSsubcuencas', function (data2){
	datacuenca = JSON.parse(data2);
	
});
	
$.get('index.php?r=Graficos/GetPSsubAnoCuencas', function (data){
	//$.get('index.php?r=Graficos/GetAno&id='+id2, function (data){
	//var data=[];
	
	
	datax = JSON.parse(data);
	//alert('sali');
	//alert (datax[0].ano)	;
	//alert (datax[0].cuenca)	;
	//alert (datax[0].cantidad)	;
	  //alert ('año minimo  '+dataano[0].ano + '  Especie mas frecuente  '+dataespecie[0].especie);
	
	//alert('sali');
	
    var datos=[];
	
//bucle para todas las especies

//bucle para todos los años

   //alert (dataespecie.length);
   //alert (dataano.length);
	//alert ('ano long       '+dataanocu.length);
	//alert ('cuencas long   '+datacuenca.length);
	for (l=0;l<datacuenca.length;l++) {
		var datoscuenca=[]	;
		//alert ('ano long       '+dataanocu.length);
	    //alert ('cuencas long   '+datacuenca.length);
	  for (j=0; j<dataanocu.length; j++){
		 //alert (l+'   '+j);
		 //alert ('ano long     n  '+dataanocu.length);
	     //alert ('cuencas long  n '+datacuenca.length);
	    
	//bucle recorriendo la base de datos especies,año, microcuenca
	     //alert ('datx long  n '+datax.length);
	     for( i=0; i < datax.length; i++){
			 /*alert ('ano long     i  '+dataanocu.length);
	         alert ('cuencas long  i '+datacuenca.length);
			 alert (datax[i].cuenca);
			 alert (datacuenca[l].cuenca);
			 alert (datax[i].ano);
			 alert (dataanocu[j].ano);*/
		     if (datax[i].cuenca==datacuenca[l].cuenca && datax[i].ano==dataanocu[j].ano ) { 		
				 datoscuenca[j]=[datax[i].cantidad];
				//alert (datosespecie+ '  año  '+data[i].ano+'    especie '+data[i].especie + '  cantida '+data[i].cantidad);
		     }
	     }
	   }
	//alert (datosespecie);
	//alert (datosespecie[4]);
	 var dato=[];
	var dato={
						name:datacuenca[l].cuenca,
						data:datoscuenca,	
					}
					//alert ( +data[i].ano+'    '+data[i].especie+'    '+data[i].cantidad);
					datos.push(dato);			
	}
 //alert ('ano long  FIN     '+dataanocu.length);
 //alert ('cuencas long  FIN '+datacuenca.length);					
 //alert (datos);

//quinto





//fin de quinto

})

	

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
			
			$('#tabs-1').empty();
			$('#tabs-2').empty();
			$('#tabs-3').empty();
			$('#tabs-4').empty();		
			$('#tabs-5').empty();
		
			$('#tabs-7').empty();
			$('#tabs-8').empty();
			$('#infoPlantas').empty();
			$('#infoLabores').empty();
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
	myLayout.open('east');			
			
		})

			
//PRUEBA TABS_1
//plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel="+codigobuscado);
		  $("#informeparcelapdf").attr("href", "index.php?r=site/informeparcelapdf&parcela="+codigobuscado);	
		
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
			
	



// TAB-0-			
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
	row.append($("<th Width='40%'>Especie</th>"));
	row.append($("<th Width='20%'>Cantidad de Plantas</th>"));
	row.append($("<th Width='20%'>Tareas plantadas</th>"));
	row.append($("<th Width='20%'>Tipo de plantación</th>"));
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
			
			myLayout.open('east');	
			$("#infoReplantacion").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#infoReplantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='40%'>  Especie</th>"));		
	row.append($("<th Width='20%'> Cantidad de Plantas</th>"));
	row.append($("<th Width='20%'>Tareas Replantadas</th>"));
	row.append($("<th Width='20%'>Tipo de plantación</th>"));
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
	row.append($("<th Width='40%'>  Especie</th>"));		
	row.append($("<th Width='20%'> Cantidad de Plantas</th>"));
	row.append($("<th Width='20%'>Tareas Mantenida</th>"));
	row.append($("<th Width='20%'>Tipo de plantación</th>"));
	
	
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
			myLayout.open('east');			
			
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