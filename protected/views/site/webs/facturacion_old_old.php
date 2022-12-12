 <head>
    <title>Measure</title>
    <link rel="stylesheet" href="https://openlayers.org/en/v5.3.0/css/ol.css" type="text/css">
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
	<!--<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>-->

   
  <html>
<div class="pane ui-layout-center">
	<div class="row">	
											
		<div class="col-md-10">	
			 <h4 id="Titulo_1_1" width="100%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
		</div>			
		<div class="col-md-2">
			 <table id="Control_1_1" class="table-striped bg-danger text-white" width="100%"></table>
		</div>
	</div>	
	<div class="row">  
		<div class="col-md-12">	
		   <div class="card bg_light mb-3">
				<div class="card-body">
					<table id="Grafico_1_1" class="table table-bordered" width="100%">
						<thead>
							<tr>
								<th>ord</th>
								<th>Plan.</th>
								<th>Cont.</th>
								<th>Clie.</th>
								<th>Apellido</th>
								<th>Nombre</th>
								<th>Cedula</th>
								<th>Subcuenca</th>
								<th>Microcuenca</th>
								<th>Destino</th>
								<th>Fecha</th>
								<th>Plantas</th>
								<th>Tareas</th>
								<th>Inver.</th>
								<th>Labor</th>
								<th>Factura</th>
									
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>	
	</div>

</div>


<!--div class="pane ui-layout-north">North</div-->

<div class="pane ui-layout-west">
	
</div>


<div class="pane ui-layout-east">
<body>


<div id="Unidad" class="tabcontent">
  
  
  <a href="javascript:document.location.reload();">       Refrescar</a>
  
  
		<div class="row">
			<button type="button" class="btn btn-primay" title="Calcular" onclick="cargarTablaFactura()">Calcular 
							<img width=22 src="images/concentricos.png" alt="Cacular"/>
			</button>
		</div>
		<br/>
		<div class="row">
			<div class="row" >
				<input type="checkbox" id ="checksubcuenca"  name="checksubcuenca" value= "1"><label>  Subcuenca</label>
			</div>
			<div class="row" >	
				<select id="subcuenca" name="subcuenca" ></select>
			</div>
			
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox"  id="checkmicrocuenca"  name="checkmicrocuenca" value= "1"><label>__Microcuenca</label>
			</div>
			<div class="row" >
				
				<select id="microcuenca" name="microcuenca"></select>
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkcedula"  name="checkcedula" value= 1><label>  Cédula cliente</label>
			</div>
			<div class="row" >
				
				<select id="cedula" name="cedula" contenteditable="true"></select>
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkplantacion" name="checkplantacion" value= 1><label>  Plantacion</label>
			</div>
			<div class="row" >
				
				<select id="plantacion" name="plantacion" contenteditable="true"></select>
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkpredio" name="checkpredio" value= 1><label>  Predio</label>
			</div>
			<div class="row" >
				
				<select id="predio" name="predio"></select>
			</div>
			<br/>
		</div>	
		 <div class="row">
			<div class="row" >
				<input type="checkbox" id="checkproyecto" name="checkproyecto" value= 1><label>  Proyecto</label>
			</div>
			<div class="row" >
				
				<select id="proyecto" name="proyecto"></select>
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkdestino" name="checkdestino" value= 1><label>  Destino</label>
			</div>
			<div class="row" >
				
				<select id="destino" name="destino"></select>
			</div>
			<br/>
		</div>	
		
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkactividad" name="checkactividad" value= 1><label>  Tipo Actividad</label>
			</div>
			<div class="row" >
				
				<select id="actividad" name="actividad"></select>
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checktplantacion" name="checktplantacion" value= 1><label>  Tipo Plantación</label>
			</div>
			<div class="row" >
				
				<select id="tplantacion" name="tplantacion"></select>
			</div>
			<br/>
		</div>	
		
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkfecha" name="checkfecha" value= 0><label>  Fecha</label>
			</div>
			<div class="row" >
				<label>Seleccione Fecha Inicial</label>
				<input  type="date" id="fechaini" name="fechaini" value="2019-01-01"  >
				<br/>
				<label>Seleccione Fecha Final</label>
				<input type="date" id="fechafin" name="fechafin" value="<?php echo date("Y-m-d");?>" >
			</div>
			<br/>
		</div>	
		<div class="row">
			<div class="row" >
				<input type="checkbox" id ="checkfactura" name="checkfactura" value= 1><label>  Factura</label>
			</div>
			<div class="row" >
				
				<select id="ifactura" name="ifactura"></select>
				<select id="ffactura" name="ffactura"></select>
			</div>
			<br/>
		</div>	
		
</div>






 



 
</body>

</div>


<div class="pane ui-layout-south">
	<div>

		<div id="popup"   >
			<!--a href="#" id="popup-closer" class="ol-popup-closer"></a-->
			<div id="popup-content" style="font-size:20px">
				<div id="tabs">
				  <ul>
					<li><a href="#tabs-1" style="color: FireBrick">Plantación</a></li>
					<li><a href="#tabs-2" style="color: FireBrick">Generales</a></li>
					<li><a href="#tabs-4" style="color: FireBrick" >Técnicos</a></li>
					<li><a href="#tabs-3" style="color: FireBrick">Especies</a></li>
					<li><a href="#tabs-6" style="color: FireBrick" >Esp. detalladas</a></li>	
					<li><a href="#tabs-7" style="color: FireBrick" >Labores</a></li>
					<li><a href="#tabs-5" style="color: FireBrick" >Predio</a></li>
					<li><a href="#tabs-8" style="color: FireBrick">Cliente</a></li>
					<li><a href="#tabs-0" style="color: FireBrick">Facturas</a></li>
					<li><a href="#tabs-A" style="color: FireBrick">Mapa</a></li><br><br>
					<!--<li><a href="#tabs-10">Ganaderos</a></li>
					<li><a href="#tabs-30">Atuaciones</a></li>
					<li><a href="#tabs-60">Lagunas</a></li>	
					<li><a href="#tabs-70">Reservorio</a></li>
					<li><a href="#tabs-50">Sistema Riego</a></li><br><br>
					
				
					
					
					<li><a href="#tabs-9" style="color: Blue">Geografia</a></li>-->
					
					
					
				  </ul>
				  <!--div id="tabs-1">
					<div id="infoEdad"></div>
					<div id="infoExtr"></div>
				  </div-->
				  <div id="tabs-1" style="font-size:16px;"width="50%"  >
				 
					<table id="infoCompeEns1" class="infoTabla"></table><br><br>
					<table id="infoCompeSup1" class="infoTabla"></table>
				  </div>
				  <div id="tabs-2"style="font-size:16px;" width="50%" >
					<div style="font-size:12px;font-style: italic;color: grey;" id="totalPob"></div>
					<table id="infoCV" class="infoTabla"></table>
					<table id="infoPobM" class="infoTabla"></table><br><br>
					<table id="infoPobD" class="infoTabla"></table><br><br>
					<table id="infoPobS" class="infoTabla"></table><br><br>
				  </div>
				  <div id="tabs-3" style="font-size:16px;" width="50%" >
					<table id="infoCompeEns3" class="infoTabla"></table><br><br>
					<table id="infoCompeSup3" class="infoTabla"></table>
				  </div>
				   <div id="tabs-4" style="font-size:16px;" width="300px" >
					<table id="infoCompeEns4" class="infoTabla"></table><br><br>
					<table id="infoCompeSup4" class="infoTabla"></table>
				  </div>
				   <div id="tabs-5" style="font-size:16px;" width="50%" >
				   
				   
					<table id="infoCompeEns5" class="infoTabla"></table><br><br>
					<table id="infoCompeSup5" class="infoTabla"></table>
				  </div> 
				  <div id="tabs-7" style="font-size:16px;" width="50%" >
					<table id="infoCompeEns17" class="infoTabla"></table><br><br>
					<table id="infoCompeSup17" class="infoTabla"></table>
				  </div> 
				  <div id="tabs-8" style="font-size:16px;" width="50%"  >
					<table id="infoCompeEns8" class="infoTabla"></table><br><br>
					<table id="infoCompeSup8" class="infoTabla"></table>
				  </div> 
				   <div id="tabs-6"style="font-size:16px;" width="50%" >
				   	<table id="infoPlantacion" class="infoTabla"></table><br><br>
					<table id="infoReplantacion" class="infoTabla"></table><br><br>
					<table id="infoMantenimiento" class="infoTabla"></table>
				 </div>
				  <div id="tabs-9" style="font-size:16px;">
					<table id="infoCompeEns9" class="infoTabla"></table><br><br>
					<table id="infoCompeEns9B" class="infoTabla"></table><br><br>
					<table id="infoCompeEns10" class="infoTabla"></table>
				  </div>
				 <div id="tabs-0" style="font-size:16px;"width="50%"  >
					<table id="infoPlantas" class="infoTabla"></table><br><br>
					<table id="infoLabores" class="infoTabla"></table>
				  </div>
				   <div id="tabs-A" style="font-size:16px;"width="100%"  >
					<div id="map" class="map" style="width:100% heigght=500px"  >
					</div>
				  </div>
				  
				  
				  <div id="tabs-30">
					<table id="infoCompeEns3" class="infoTabla"></table><br><br>
					<table id="infoCompeSup3" class="infoTabla"></table>
				  </div>
				  
				  <div id="tabs-10">
					<table id="infoCompeEns100" class="infoTabla"></table><br><br>
					<table id="infoCompeSup100" class="infoTabla"></table>
				  
				   <div id="tabs-50">
				   
				   
					<table id="infoCompeEns50" class="infoTabla"></table><br><br>
					<table id="infoCompeSup50" class="infoTabla"></table>
				  </div> 
				  <div id="tabs-70">
					<table id="infoCompeEns170" class="infoTabla"></table><br><br>
					<table id="infoCompeSup170" class="infoTabla"></table>
				  </div> 
				  
				   <div id="tabs-60">
				   	<table id="infoPlantacion0" class="infoTabla"></table><br><br>
					<table id="infoReplantacion0" class="infoTabla"></table><br><br>
					<table id="infoMantenimiento0" class="infoTabla"></table>
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
var iso1, iso2, iso3, iso4, iso5, microcuencas_selected, municipio_selected, plantaciones_cuencas_selected, parcelas, arg_cuencas, ensenas, loc = null, idAlcampo, idEncuesta, cuencas, microcuenca, productores_ganaderos,centro_de_acopio,productor_ganadero_seleccionado;
var sel, selLayer, osm, google, google_carto,parcelassel,sal,salid,codigobuscado,solo_plantaciones,dataano,dataespecie,xmed,ymed,xmin,xmax,ymin,ymax,distrito;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
var myLayout;
var infoCV;

var microcuenca, subcuenca,cedula,predio,proyecto,destino,actividad,tplantacion,fechaini,fechafin,ifactura,ffactura
var checksubcuenca, checkmicrocuenca,checkcedula,checkpredio,checkproyecto,checkdestino,checkactividad,checktplantacion,checkfecha,checkfactura;
var tabla,map;
cuencas =99;
idAlcampo=99;
$("#Control_1_1").empty();
$("#Control_1_1").html('<img id="loading-image" width=100 src="images/logo3_75_75.gif" alt="Loading..." />');		
	$("#map").empty();
	var projection = new ol.proj.Projection({
	    code: 'EPSG:32619',
	  //code: 'EPSG:3857',
	  //NO SE SI A ESTO SE LE HACE CASO
	  // The extent is used to determine zoom level 0. Recommended values for a
	  // projection's validity extent can be found at http://epsg.io/.
	  //extent: [485869.5728, 76443.1884, 837076.5648, 299941.7864],
	  units: 'm'
	});

	var layers = [];
	 google = new ol.layer.Tile({
				source: new ol.source.XYZ({
				  url: 'http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}'
				}),
				name:'Google',
			});
	
	
	groupCapas3 = new ol.layer.Group({
		id: 'Imagen Google',
		name: 'Imagen Google',
		visible: false,
		layers: [google]
	});
	layers.push(groupCapas3);
	
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
		
		
		

function cargarTablaFactura(){
	$("#Control_1_1").empty();
	$("#Control_1_1").html('<img id="loading-image" width=100 src="images/logo3_75_75.gif" alt="Loading..." />');	
		
	
	
	var text ='';
	subcuenca = $("#subcuenca").val();
	if (document.getElementById("checksubcuenca").checked == true ) {
		checksubcuenca =1;
		 text = 'pr_codigo_cuenca::int = '+subcuenca;
		 }
	else {checksubcuenca =0}
	
	microcuenca =$("#microcuenca").val();
	if (document.getElementById("checkmicrocuenca").checked == true ) {
		checkmicrocuenca =1;
		if (text == ""){
			text = text +'pr_codigo_micro_cuenca::int = '+microcuenca;
			}
		else {text = text +' AND pr_codigo_micro_cuenca::int = '+microcuenca}
	}
	else {checkmicrocuenca =0}
	
	
	
	cedula =$("#cedula").val();
	if (document.getElementById("checkcedula").checked == true ) {
		checkcedula =1;
		if (text == ""){
			text = text +'codigo_cliente = \''+cedula+'\'';
			}
		
		else {text = text +' AND codigo_cliente =\''+cedula+'\''}
	}
	else {checkcedula =0}
	
	plantacion =$("#plantacion").val();
	if (document.getElementById("checkplantacion").checked == true ) {
		checkplantacion =1;
		var plant_code =plantacion;
	
	verGrafico(plant_code)
		
		if (text == ""){
			text = text +'codigo_plantacion = \''+plantacion+'\'';
			}
		
		else {text = text +' AND codigo_plantacion =\''+plantacion+'\''}
	}
	else {checkplantacion =0}
	
	predio =$("#predio").val();
	if (document.getElementById("checkpredio").checked == true ) {
		checkpredio =1;
		if (text == ""){
			text = text +'pr_codigo_predio = \''+predio+'\'';
			}
		
		else {text = text +' AND pr_codigo_predio = \''+predio+'\''}
	}
	else {checkpredio =0}
	
	proyecto =$("#proyecto").val();
	if (document.getElementById("checkproyecto").checked == true ) {
		checkproyecto =1;
		if (text == ""){
			text = text +'nombre_proyecto = \''+proyecto+'\'';
			}
		
		else {text = text +' AND nombre_proyecto =  \''+proyecto+'\''}
	}
	else {checkproyecto =0}
	
	destino =$("#destino").val();
	if (document.getElementById("checkdestino").checked == true ) {
		checkdestino =1;
		if (text == ""){
			text = text +'cs_destino = \''+destino+'\'';
			}
		
		else {text = text +' AND cs_destino =  \''+destino+'\''}
	}
	else {checkdestino =0}
	
	
	actividad =$("#actividad").val();
	if (document.getElementById("checkactividad").checked == true ) {
		checkactividad =1;
		if (text == ""){
			text = text +'tp_descripcio_tipo_actividad = \''+actividad+'\'';
			}
		
		else {text = text +' AND tp_descripcio_tipo_actividad =\''+actividad+'\''}
	}
	else {checkactividad =0}
	
	
	tplantacion =$("#tplantacion").val();
	if (document.getElementById("checktplantacion").checked == true ) {
		checktplantacion =1;
		if (text == ""){
			text = text +'tp_descripcion_tipo_plantacion = \''+tplantacion+'\'';
			}
		
		else {text = text +' AND tp_descripcion_tipo_plantacion =  \''+tplantacion+'\''}
	}
	
	else {checktplantacion =0}
	
	
	fechaini =$("#fechaini").val();
	fechafin =$("#fechafin").val();
	if (document.getElementById("checkfecha").checked == true ) {
		checkfecha =1;
		if (text == ""){
			text = text +'fecha >=  \''+fechaini + '\' AND fecha <= \''+fechafin+'\'' ;
			}
		
		else {text = text +' AND fecha >=   \''+fechaini + '\' AND fecha <= \''+fechafin+'\''}
	}
	else {checkfecha =0}
	
	
	ifactura =$("#ifactura").val();
	ffactura =$("#ffactura").val();
	if (document.getElementById("checkfactura").checked == true ) {
		checkfactura =1;
		if (text == ""){
			text = text +'codigo_factura::int >=  '+ifactura + ' AND codigo_factura::int <= '+ffactura ;
			}
		
		else {text = text +' AND codigo_factura::int >=  '+ifactura + ' AND codigo_factura::int <= '+ffactura}
	}
	else {checkfactura =0}

var crite=[];
 crite.push(text);
//$('#Grafico_1_1').empty();
//$("#Grafico_1_1").html('<img id="loading-image" width=100 src="images/logo3_75_75.gif" alt="Loading..." />');
	//AQUI EMPIEZO A GENERAR LAS TABLAS
	
	
	$.get('index.php?r=Poa/GetActividadFacturacionLabores&criterio='+crite, function (data3){
	
	data3 = JSON.parse(data3);	
	alert ('Numero de registros devueltos ' +data3.length);
	var totalTareas = 0;
	var totalPlantas = 0;
	var totalInversion = 0;
	var totalLabores = 0 ;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	//$("#Control_1_1").html('<img id="loading-image" width=100 src="images/logo3_75_75.gif" alt="Loading..." />');	
		
		
		
		
		
	
	/* var row = $("<tr />");
	 $('#Grafico_1_1').empty();
		$("#Grafico_1_1").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=3%><h5><b>.</b></h5></td>"));
		row.append($("<td width=4%><h5><b>Plan.</b></h5></td>"));
		row.append($("<td width=4%><h5><b>Cont.</b></h5></td>"));
		row.append($("<td width=4%><h5><b>Clie.</b></h5></td>"));
		row.append($("<td width=13%><h5><b>Apellido</b></h5></td>"));
		row.append($("<td width=11%><h5><b>Nombre</b></h5></td>"));
		row.append($("<td width=7%><h5><b>Cedula</b></h5></td>"));
		row.append($("<td width=7%><h5><b>Subcuenca</b></h5></td>"));
		row.append($("<td width=7%><h5><b>Microcuenca</b></h5></td>"));
		row.append($("<td width=7%><h5><b>Destino</b></h5></td>"));
		row.append($("<td width=7%><h5><b>Fecha</b></h5></td>"));
		row.append($("<td width=5%><h5><b>Plantas</b></h5></td>"));
		row.append($("<td width=3%><h5><b>Tareas</b></h5></td>"));
		row.append($("<td width=6%><h5><b>Inver.</b></h5></td>"));
		row.append($("<td width=6%><h5><b>Labor</b></h5></td>"));
		row.append($("<td width=11%><h5><b>Factura</b></h5></td>"));
		var row = $("<tr />")	
			$("#Grafico_1_1").append(row); 
			
	*/	
			 
			
		var totalsup=0;
		//tabla.clear().draw();
		
		if (tabla != undefined)
			tabla.clear().draw();
		else {
			tabla=$('#Grafico_1_1').DataTable({
				"searching":true,
				"scrollY":"600px",
				"scrollX":"600px",
				"scrollCollapse":true,
				"bPaginate":true,
				"ColumnDefs": [
				{"className": "dt-center", "targets": "_all"}
				]
			})
		}
		
		$('#Grafico_1_1 tbody').on ('click', 'tr' , function() {
		  var data = tabla.row (this).data();
		  var seccion = data[1];
		  //alert ( ' segunda ' +seccion);
		  verGrafico(seccion)
		  
	});
	
		
		
	
		for (var i=0; i < data3.length; i++){
			totalTareas = totalTareas + data3[i].tareas ;
			totalPlantas = totalPlantas + data3[i].plantas;
			totalInversion = totalInversion + data3[i].inversion_plantas;
			totalLabores = totalLabores + data3[i].labores;
			//$("#Grafico_1_1").append(row); 
			l=i+1;
		    
			/*row.append($("<td>" +  "</td>"));
			row.append($("<td><h5>" + l.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].plantacion.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].control.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].cliente.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].apellido + "</td>"));
			row.append($("<td><h5>" + data3[i].nombre + "</td>"));
			row.append($("<td><h5>" + data3[i].cedula + "</td>"));
			row.append($("<td><h5>" + data3[i].cuenca.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].microcuenca.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].destino.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].fecha.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].inversion_plantas.toLocaleString('en-EN') + "</td>"));
			//if (isNaN(data3[i].labores)){
			row.append($("<td><h5>" + data3[i].labores.toLocaleString('en-EN') + "</td>"));
			//}
			//else 
			//{row.append($("<td><h5> </td>")}
			row.append($("<td><h5>" + data3[i].factura.toLocaleString('en-EN') + "</td>"));
			
			
			
			var row = $("<tr />");
			
			$("#Grafico_1_1").append(row); */
			
			var rowNode=tabla.row.add (
				[
				 i,
			data3[i].plantacion,
			data3[i].control,
			data3[i].cliente,
			data3[i].apellido,
			data3[i].nombre,
			data3[i].cedula,
			data3[i].cuenca,
			data3[i].microcuenca,
			data3[i].destino,
			data3[i].fecha,
			data3[i].plantas,
			data3[i].tareas,
			data3[i].inversion_plantas,
			data3[i].labores,
			data3[i].factura
				]).draw(true);
		}
		$("#Titulo_1_1").empty();
		$("#Control_1_1").empty();
		$("#Titulo_1_1").append("<td width=100%><h5><b>Selec* from</b>"+text+"</h5></td>");
		/*
			row.append($("<td><h5> </td>"));
			row.append($("<td><h5>  </td>"));
			row.append($("<td><h5> </td>"));
			row.append($("<td><h5>  </td>"));
			row.append($("<td><h5>  </td>"));
			row.append($("<td><h5>  </td>"));
			row.append($("<td><h5>  </td>"));
			row.append($("<td><h5>  </td>"));
			row.append($("<td><h5>  </td>"));
			row.append($("<td><h5> </td>"));
			row.append($("<td><h5>  </td>"));
			row.append($("<td><h4> TOTAL</td>"));
		
			row.append($("<td><h4>" + totalPlantas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td><h5> </td>"));
			row.append($("<td><h4>" + totalInversion.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td><h4>" + totalLabores.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td><h5>  </td>"));
			var row = $("<tr />");
			$("#Grafico_1_1").append(row); 
			*/
	})
	
	//$("#Control_1_1").empty();
	//$("#Control_1_1").html('<img id="loading-image" width=100 src="images/logo3_75_75.gif" alt="Loading..." />');	
		
	
	
	
	};







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
function verGrafico(data){
	codigobuscado = data
	
	//1 TAB-1-
	//alert ('aqui estoy line 603 variable data =' +codigobuscado);
				$('#tabs-1').empty();
				
	
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
	
			for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data1[j], function(i, item) {
				
					var $tr = $('<tr><h2>').append(
						//
						
						$('<td><h2>').text(i),
						$('<td><h2>').text(item)
					).appendTo('#tabs-1');
				
				
			})
			}

	
			
			
			
			})
			
		
	//2 TAB-2-		
			
			$('#tabs-2').empty();
				
			
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
			
			
			
		
	//3 TAB-4-		
			
				$('#tabs-4').empty();
				
	
	
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
			
			
				
				
	
		
		})	
	
		
	//4 TAB-3-
				$('#tabs-3').empty();
				
	
	
	
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
		
		
	//5 TAB-6-
				
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
	
	
	

	//6 TAB-7-
				$('#tabs-7').empty();
				
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
	
	
	
	
	//7 TAB-5-
				$('#tabs-5').empty();
				
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
	
	
	
	
	//8 TAB-8-
				$('#tabs-8').empty();
				
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
	
		
	//9 TAB-0-
				
	
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




	
	
}





























//**********************************
// EVENTOS
//**********************************


<?php
$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

$rs3 = array();
//foreach($mbd->query('SELECT gid, objectid, id, nom_cuenca, sub_cuenca, shape_leng, shape_area, geom FROM geo_subcuencas order by gid asc;') as $fila3) {
$query = 'SELECT codigo_cuenca, descripcion FROM ss_cuenca order by codigo_cuenca asc;';



//***********************************************************************************************
//***********************************************************************************************
//***********************************************************************************************
//                                                                                            ***
//ESTO ES UN EJEMPLO DE  COMO USAR EL CONTROL DE USUARIOS PARA PERMITIR UNOS ACCESO U OTROS.  ***
//                                                                                            ***
//***********************************************************************************************
//***********************************************************************************************
//***********************************************************************************************


$grupo = Yii::app()->user->getState('grupo');

if (strpos($grupo, 'cuenca') !== false) {
	$cuenca = explode("_" , $grupo);
	$cuenca = $cuenca[1];
	$query = 'SELECT codigo_cuenca, descripcion FROM ss_cuenca WHERE codigo_cuenca = \''.$cuenca.'\' order by codigo_cuenca asc;';
	
}

//finaliza el control de accesos.


		

foreach($mbd->query($query) as $fila3) {
	$c = null;								
	$c['id'] =$fila3['codigo_cuenca'];
	$c['nombre'] =$fila3['descripcion'];

	array_push($rs3, $c);

}


?>
		 



$("#subcuenca").empty();
	data = <?php echo json_encode($rs3);?>;
	var a = "<option value=999></option>";
	$("#subcuenca").append(a);
	for(var i = 0; i < data.length; i++){
		$('#subcuenca').append($('<option>', {
				value: data[i].id,
				text: data[i].id+ '- '+ data[i].nombre
			}));
		
	}
	
	
	
<?php

//AQUI RELLENO EL DESPLEGABLE DE MICROCUENCA para todas las cuencas; 
			
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

		$("#microcuenca").empty();
	     data = <?php echo json_encode($rs4);?>;
	     var a = "<option value=999>Todas</option>";
		 $("#microcuenca").append(a);
	     for(var i = 0; i < data.length; i++){
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			
		      $('#microcuenca').append($('<option>', {
				   value: data[i].id,
				   text: data[i].id+ '- '+ data[i].nombre + '  (' +data[i].cuenca+' )'
		     	}));
			
	    }
	
			
			
	//Cedula del cliente
	
<?php

//AQUI RELLENO EL DESPLEGABLE DE CELULAS
			
		     $mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

            $rs4 = array();
//ss_micro_cuencas tiene todas las microcuencas consideradas en SPSO y cada microcuenca tiene un ID diferente

             foreach($mbd->query('SELECT 
  pv_cliente.codigo_cliente::int,
  pv_cliente.cedula, 
  pv_cliente.apellido, 
  pv_cliente.nombre 

FROM 
  public.pv_cliente

  ORDER BY  pv_cliente.cedula, pv_cliente.apellido;') as $fila4) {
				 
				 
                   $c = null;								
                   $c['id'] =(int)$fila4['codigo_cliente'];
				   $c['cedula'] =$fila4['cedula'];
                   $c['apellido'] =$fila4['apellido'];
				   $c['nombre']= $fila4['nombre'];
                   array_push($rs4, $c);

              }


?>		

	
			
//AQUI RELLENO EL DESPLEGABLE DE LA PLANTACION
$('#Control_1_1').empty();
$("#Control_1_1").html('<img id="loading-image" width=100 src="images/logo3_75_75.gif" alt="Loading..." />');

$.get('index.php?r=puntos/getPlantacionComboSinGeo', function(data){
	$("#plantacion").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#plantacion').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})






//AQUI RELLENO EL DESPLEGABLE DEL PREDIO		

$.get('index.php?r=puntos/getPredioCombo', function(data){
	$("#predio").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#predio').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})




//AQUI RELLENO EL DESPLEGABLE DE PROYECTO
$.get('index.php?r=puntos/getProyectoCombo', function(data){
	$("#proyecto").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#proyecto').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})


//AQUI RELLENO EL DESPLEGABLE DE Destino
$.get('index.php?r=puntos/getDestinoCombo', function(data){
	$("#destino").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#destino').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})



//AQUI RELLENO EL DESPLEGABLE DE tipo de actividad
$.get('index.php?r=puntos/getActividadCombo', function(data){
	$("#actividad").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#actividad').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})



//AQUI RELLENO EL DESPLEGABLE DE tipo de plantacion
$.get('index.php?r=puntos/getTPlantacionCombo', function(data){
	$("#tplantacion").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#tplantacion').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
		
		
	})


//AQUI RELLENO EL DESPLEGABLE DE factura
	
   $.get('index.php?r=puntos/getFacturaCombo', function(data){
	$("#ifactura").empty();
	 	 data=JSON.parse(data);	
		
		for(var i = 0; i <data.length; i++){
			$('#ifactura').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}
	$("#ffactura").empty();
	 	
		
		for(var i = 0; i <data.length; i++){
			$('#ffactura').append($('<option>', {
				value: data[i].codigo,
				text: data[i].codigo
			}));
		}	
	$('#Control_1_1').empty();	
	})




// TERMINADO EL RELLENO DE cedula
	
$('#cedula').empty();
	     data = <?php echo json_encode($rs4);?>;
	     var a = "<option value=999></option>";
		 $('#cedula').append(a);
	     for(var i = 0; i < data.length; i++){
			 
		      $('#cedula').append($('<option>', {
				   value: data[i].id,
				   text: data[i].cedula+'      '+data[i].apellido+', '+data[i].nombre
		     	}));
			
	    }
	
	
	
	


$(document).ready(function () {
	myLayout = $('#content').layout({
		west__size:	'80%',
		east__size:	'20%',
		south__size:'60%',
		west__initClosed: true, 
		south__initClosed: true,
		onresize: function () {
			map.updateSize();//alert('whenever anything on layout is redrawn.') 
		}	
	});
	
	
		
	$( "#tabs" ).tabs();
	
	
	
	
	
	
	
	
	
	
	$("#subcuenca").selectmenu({
		change: function( event, data ) {
			
			subcuenca = data.item.value;
			$("#microcuenca").empty();			
			//alert ('lkjlkjlkjlkjlk   '+ subcuenca );
		


	
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
	     	//alert ('lkjlkjlkjlkjlk  2  '+ subcuenca );
			 $("#microcuenca").empty();
			//alert ('lkjlkjlkjlkjlk  3  '+ subcuenca ); 
		 data = <?php echo json_encode($rs4);?>;
	     var a = "<option value=999>Solo la subcuenca seleccionada</option>";
		  $('#microcuenca').append(a);
	     for(var i = 0; i < data.length; i++){
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			if (data[i].cuenca == subcuenca) {
		      $('#microcuenca').append($('<option>', {
				   value: data[i].id,
				   text: data[i].id+ '- '+ data[i].nombre + '  (' +data[i].cuenca+' )'+ subcuenca
		     	}));
			}
	    }
	
			
			
	//fecha de la encuesta o año
	
			
			
			
      }
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//________________________________________________________________________________________
	//OTROS EVENTOS consecencia de otros
	//________________________________________________________________________________________
	
	
	 
	
	
	
	
	

	
	
	
	
	
	
	
	



	
	
	
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