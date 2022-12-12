function hacerBusqueda(){
	//$("#Control_1_1").empty();
	//$("#Control_1_1").html('<img id="loading-image" width=100 src="images/logo3_75_75.gif" alt="Loading..." />');	
		
	//alert ('aqu esty 1044');
	alert ('he entrado');
	var text ='';
	var text2='';
	subcuenca =$("#hiperAlcampo").val();
	microcuenca=$("#microcuenca").val();
	
	if (subcuenca == 999){
		 }
	else {
		text = 'pr_codigo_cuenca::int = '+subcuenca;
		 text2 = 'pr_codigo_cuenca::int = '+subcuenca;;
	}
	if (microcuenca === null){
		
	else {
		if ( microcuenca == 999){	
		
			 }
		else 	{
			text = text +' AND pr_codigo_micro_cuenca::int = '+microcuenca;
		    text2 = text2 +' AND pr_codigo_micro_cuenca::int = '+microcuenca;
		}
	}
	
	text = text +' AND tp_descripcio_tipo_actividad =\''+tipoactividad+'\'';
	text2 = text2 +' AND tp_descripcio_tipo_actividad =\''+tipoactividad+'\''
	
	
	
	
	
	
	fechaini =$("#fechaini").val();
	fechafin =$("#fechafin").val();
	if (document.getElementById("checkfecha").checked == true ) {
		checkfecha =1;
		if (text == ""){
			text = text +'pl_fecha_inspeccion >=  \''+fechaini + '\' AND pl_fecha_inspeccion <= \''+fechafin+'\'' ;
			text2 = text2 +'fecha >=  \''+fechaini + '\' AND fecha <= \''+fechafin+'\'' ;
			}
		
		else {text = text +' AND pl_fecha_inspeccion >=   \''+fechaini + '\' AND pl_fecha_inspeccion <= \''+fechafin+'\''
		text2 = text2 +' AND fecha >=   \''+fechaini + '\' AND fecha <= \''+fechafin+'\''}
	}
	
textfin = ' where ' + text;
// alert ('esto es :'+textfin+'    '+text2);
 plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&criterio2="+textfin);

var crite=[];
 crite.push(text2);
 //se hace zoom sobre las parcelas selccionadas
	textfin2 = '\''+text+'\'';
	
	$.get("index.php?r=Puntos/GetPlantacionSeleccionBox&criterio2="+text, function( data10 ) {
		
	data10=JSON.parse(data10);

    
	
	var xmin= parseFloat(9999999999.0);
	var xmax= parseFloat(-9999999999.0);
	var ymin= parseFloat(9999999999.0);
	var ymax= parseFloat(-9999999999.0);
	alert ('numero de poligonos (parcelas con geometria en SIT),' +data10.length);
	
	if (data10.length < 1) {
		alert ('ATENCION: No hay ningn poligono digitalizado correcto para esta seleecion');}
	
	    for (i=0; (i<data10.length);i++) {
			
			if (xmin>data10[i].xmin) {xmin=parseFloat(data10[i].xmin)};
			if (xmax<data10[i].xmax) {xmax=parseFloat(data10[i].xmax)};
			if (ymin>data10[i].ymin) {ymin=parseFloat(data10[i].ymin)};
			if (ymax<data10[i].ymax) {ymax=parseFloat(data10[i].ymax)};
			
		} 
			
		 var xmed=(parseFloat(xmin)+parseFloat(xmax))/2;
		 var ymed=(parseFloat(ymax)+parseFloat(ymin))/2;
	
		
	;
		 var cormin=ol.proj.transform([parseFloat(xmin),parseFloat(ymin)], 'EPSG:4326', 'EPSG:3857');
         var sal=ol.proj.transform([xmed,ymed], 'EPSG:4326', 'EPSG:3857');
	     var cormax=ol.proj.transform([parseFloat(xmax),parseFloat(ymax)], 'EPSG:4326', 'EPSG:3857');
	
	//alert ('primera coordenada '+cormin[0]+'  '+cormin[1]+'  '+cormax[0]+'  '+cormax[1]);
		
var myExtent = [cormin[0],cormin[1],cormax[0],cormax[1]];
	map.getView().fitExtent(myExtent , map.getSize());
				
	
			
	
	
		 
})
//findel zoom

 
 //
 $("#generarexcel").attr("href", "index.php?r=site/hojaexcel&criterio="+crite);
 
//
//
//AQUI SE GENERA LA TABLA
 $.get('index.php?r=Poa/GetActividadFacturacionLabores&criterio='+crite, function (data3){
	
	data3 = JSON.parse(data3);	
	//alert ('Criterio ' +crite);
	if (data3.length>100 ){
	alert ('Numero de registros devueltos (plantaciones con o sin poligono asociado) ' +data3.length+' solo se mostraran los 100 primeros en pantalla, limite la busqueda. Excel los exportará todos' );
	}
	else {
	alert ('Numero de registros devueltos (plantaciones con o sin poligono asociado)' +data3.length);
	}	
	var totalTareas = 0;
	var totalPlantas = 0;
	var totalInversion = 0;
	var totalLabores = 0 ;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	
			 
			
		var totalsup=0;
		
		//alert ('en la linea 2875');
		if (tabla != undefined){
		tabla.clear().draw();
		}
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
		
		//alert ('en la linea 2891');
		



	
	$('#Grafico_1_1 tbody').on ('click', 'tr' , function() {
		  var data = tabla.row (this).data();
		  var seccion = data[2];
		  
		  
		  //plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel="+seccion);
		  $("#informeparcelapdf").attr("href", "index.php?r=site/informeparcelapdf&parcela="+seccion);	
			
		  $.get("index.php?r=Puntos/GetPlantacionBox&planta="+seccion, function( data10 ) {

	  	data10=JSON.parse(data10);


	
	var xmin= parseFloat(9999999999.0);
	var xmax=parseFloat(-9999999999.0);
	var ymin=9999999999.0;
	var ymax=-9999999999.0;
	 
	
	if (data10.length < 1) {
		alert ('ATENCION: No hay poligono digitalizado correcto para esta parcela'+ seccion);}
	
	    for (i=0; (i<data10.length);i++) {
			
			if (xmin>data10[i].xmin) {xmin=parseFloat(data10[i].xmin)};
			if (xmax<data10[i].xmax) {xmax=parseFloat(data10[i].xmax)};
			if (ymin>data10[i].ymin) {ymin=parseFloat(data10[i].ymin)};
			if (ymax<data10[i].ymax) {ymax=parseFloat(data10[i].ymax)};
			
		} 
			
		 var xmed=(parseFloat(xmin)+parseFloat(xmax))/2;
		 var ymed=(parseFloat(ymax)+parseFloat(ymin))/2;
	
		
	;
		 var cormin=ol.proj.transform([parseFloat(xmin),parseFloat(ymin)], 'EPSG:4326', 'EPSG:3857');
         var sal=ol.proj.transform([xmed,ymed], 'EPSG:4326', 'EPSG:3857');
	     var cormax=ol.proj.transform([parseFloat(xmax),parseFloat(ymax)], 'EPSG:4326', 'EPSG:3857');
	
	//alert ('primera coordenada '+cormin[0]+'  '+cormin[1]+'  '+cormax[0]+'  '+cormax[1]);
		
var myExtent = [cormin[0],cormin[1],cormax[0],cormax[1]];
	map.getView().fitExtent(myExtent , map.getSize());
				
	
			
	
	
		 
})
	//prueba
	
	par2=[];
				
					var par1={
						gid:0,
						codigo:seccion
						
					}
					par2.push(par1);
					
	
	
		//alert (par2[0].gid+'   '+par2[0].codigo+ '    '+seccion+'   '+event);
		var coordenadas = "vacio";
						var idMuestra = "vacio";
						var idPunto = "vacio";
						
						verGraficoRefo(par2, event, coordenadas, idMuestra, idPunto);  
		 
		  
	});
		
		records=data3.length;
		if (records>100){
			records=100;
		}
	
		for (var i=0; i < records; i++){
			totalTareas = totalTareas + data3[i].tareas ;
			totalPlantas = totalPlantas + data3[i].plantas;
			totalInversion = totalInversion + data3[i].inversion_plantas;
			totalLabores = totalLabores + data3[i].labores;
			//$("#Grafico_1_1").append(row); 
			l=i+1;
		    platb= data3[i].plantacion;
			var textA = ' de_codigo_plantacion= \''+platb+'\'';
			if (data3[i].superficie >0){
			sig="Si"}
			else {
			sig="No"}
			
			
		
			var rowNode=tabla.row.add (
				[
				 i+1,
				 sig,
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
			data3[i].plantas
			//data3[i].tareas,
			//data3[i].inversion_plantas,
			//data3[i].labores,
			//data3[i].factura
				]).draw(true);
					
		}
		$("#Titulo_1_1").empty();
		$("#Control_1_1").empty();
		$("#Titulo_1_1").append("<td width=100%><h5><b>Selec* from</b>"+text+"</h5></td>");
		
	})

 
}

