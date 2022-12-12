<div class="row">
	  
	
	  <label>Actualizacion de tablas desde SPSO</label>
	
	<br/>
		<br/>
		<div class="row">
		<div class="col-md-2">								
			<!--	<button type="button" class="btn btn-primay"  title="ss_cuenca" onclick="actualizartabla('ss_cuenca')">ss_cuenca </button><br/>-->
		</div>
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

/*$.get('index.php?r=Actualiza/GetTabla', function(data){
	$("#tablaControl").append(data);
});*/
 $("#grafico01_02").html('<img id="loading-image" width=75 src="images/logo3_75_75.gif" alt="Loading..." />');

$.get('index.php?r=Actualiza/GetCuentaAcces', function(data){
alert ('Finalizada actualización');
	$("#grafico01_02").empty();
	$("#tablaControl").empty();
$.get('index.php?r=Actualiza/GetTabla', function(data){
	$("#tablaControl").append(data);
})
});


function actualiza(tabla){
     $("#grafico01_02").html('<img id="loading-image" width=200 src="images/logo3_75_75.gif" alt="Loading..." />');
	
	alert(tabla);
	alert(tabla);
	$("#grafico01_02").empty();
	
}
	
function actualizartabla(cuencaele){

 $("#grafico01_02").html('<img id="loading-image" width=75 src="images/logo3_75_75.gif" alt="Loading..." />');
//Actualiza una tabla
actualizartabla2(cuencaele);
//var cuencaele='ss_cuenca';
//alert ( 'ahora ' +cuencaele);



 
}

function actualizartabla2(cuencaele){
$.get('index.php?r=Actualiza/GetActualizaUnaTabla&Tablaactualizar=' +cuencaele, function (data2){

	alert (data2);
	$("#grafico01_02").empty();	
	$("#tablaControl").empty();
	/*$.get('index.php?r=Actualiza/GetCuentaAcces', function (data1){
		
	alert (data1);
	
});	*/
	$.get('index.php?r=Actualiza/GetTabla', function(data){
	$("#tablaControl").append(data);

});
})

//alert ( 'ahora 2  ' +cuencaele);

	var a = "actualizado";
    $("#grafico01_01").empty();
	$("#grafico01_01").append(a);

}
</script>


