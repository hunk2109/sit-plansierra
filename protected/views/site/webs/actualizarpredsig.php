<div class="row">
	  
	
	  <label>Actualiza la base de datos de predios desde los ficheros GPX corregido o vaslidados en QGIS</label>
	
	<br/>
		<br/>
		<div class="row">
			<div > Introduzca la tabla donde estan los ficheros a actualizar<div>	
<input id="tabla_actua"></input>			
			<button id="actualiza" type="button" class="btn btn-primay"  title="Tabla a actualizar" onclick="actualizartablapredios()">Actualiza</button><br/>-->
		
		<div class="col-md-2">								
			<div id="grafico01_01"></div>
		</div>
		<div class="col-md-8">								
			<div id="grafico01_02"></div>
		</div>	
		
		</div>
		<br/>
		<div class="row">
		<div class="col-md-2">
		<!--<button type="button" class="btn btn-primay" title="ss_detalle_especie" onclick="actualizartabla('ss_detalle_especie')">ss_detalle_especie </button>-->
		</div>
		</div>
		
		<div id="tablaControl"></div>
		
		
<div>


<?php 
///ACTUALIZA LAS TABLAS DEPOSTGRES A PARTIR DE LAS DE ACCES



error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');









//***********************************************************************************************************************************************************
//
// DATOS Sistema de riego
//
//***********************************************************************************************************************************************************
?>
<script type="text/javascript">
var cuencaele="20160614predio";
alert (cuencaele);
	
//$.get('index.php?r=Actualiza/GetActualizaSigControl&Tablaactualizar="' +cuencaele+ '"', function (data){
	
function actualizartablapredios(){
var a = $("#tabla_actua").val();
alert ('gdjasgdjasd'+a);
$.get('index.php?r=Actualiza/GetActualizaPrediosSig&tabla=' +a, function (data){
})

}



	

</script>


