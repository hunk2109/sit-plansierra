function cargarGraficoAno(genero){
	
	
	//var f = new Date();
	/*var ffinal ="\'"+$("#fechafin").val()+"\'";
	var finicial ="\'"+$("#fechaini").val()+"\'";
	var criterio='';
	anofin=ffinal.substr(1,4);
	anoini=finicial.substr(1,4);
	*/
	
	if (document.getElementById("checkfecha").checked == true ) {
		var ffinal ="\'"+$("#fechafin").val()+"\'";
		var finicial ="\'"+$("#fechaini").val()+"\'";
		
	var criterio='';
	anofin=ffinal.substr(1,4);
	anoini=finicial.substr(1,4);
	
	
		criterio = criterio +' and ss_predio_sistema_cafe.fecha_establecida >=' +finicial+' and ss_predio_sistema_cafe.fecha_establecida<= ' +ffinal;
	}
	else {
		var finicial ="\'2000-01-01\'";
		var ffinal ="\'"+$("#fechafin").val()+"\'";
	var criterio='';
	anofin=ffinal.substr(1,4);
	anoini=finicial.substr(1,4);
	
	//quito el tema de fechas
	criterio= criterio
	
	//criterio = criterio +' and ss_predio_sistema_familiar.ano_establecido >=\'' +anoini+'\' and ss_predio_sistema_familiar.ano_establecido<= \'' +anofin+ '\' ';
		
	}
	//alert ('criterio 1 =  ' +criterio);
	//alert (finicial+','+ffinal+','+	anofin+','+anoini);
	qcuenca=$("#hiperAlcampo").val();

	mcuenca=$("#microcuenca").val();
	//var criterio=' ';
	
	var anopoa2=anofin;
	var anopoa1=anoini;
	var cuencapoa=0;
	if ( qcuenca ) {
		if (qcuenca !=999){
	            criterio = criterio + ' and ss_predio.codigo_cuenca::int = '+qcuenca;
				cuencapoa=qcuenca;
	 }
	}
	if (mcuenca ) {
	  if (mcuenca !=999){
		
	    criterio = criterio + ' and ss_predio.codigo_micro_cuenca::int = '+mcuenca;
	  }
	}
	//alert ('criterio 49 =  ' +criterio);
	//var criterio=' and ss_predio.codigo_cuenca::int=1'
	//alert (finicial+'    '+ffinal);
	
	/*
    var ffinal ="\'"+(f.getFullYear()+ "-" + (f.getMonth()+1 ) + "-" + f.getDate() )+"\'";
	var ffinal2 =f.getDate() + "-" + (f.getMonth()+1 ) + "-" + f.getFullYear();
	
	//alert (ffinal+´  ´+ffinal2);

	
	var finicial ="\'"+((fi.getFullYear()-1)+ "-" + 1+ "-" + 1)+"\'";
	var finicial2 =(1+ "-" + 1+ "-" + (fi.getFullYear()-1));
	
	*/
$('#psgrafico79').empty();	
	$('#psgrafico80').empty();
	$("#psgrafico80_A").empty();
	var f = new Date();
    var dia =(f.getDate() + "-" + (f.getMonth() +1) + "-" + f.getFullYear());
	var anoconsulta= f.getFullYear();
	

	
	
//color:darkgreen;
if (document.getElementById("checkfecha").checked == true ) {
			finicial ="\'"+$("#fechaini").val()+"\'";
			ffinal ="\'"+$("#fechafin").val()+"\'";
			ffinal2 = $("#fechafin").val().split('-').reverse().join('-');
			finicial2 = $("#fechaini").val().split('-').reverse().join('-');

			
			
			//alert (finicial+'   '+ffinal+'   '+finicial2+'   '+ffinal2+ '  con fech');
	}
	else {
			finicial ="2019-01-01";
			ffinal ="\'"+$("#fechafin").val()+"\'";
			ffinal2 = $("#fechafin").val().split('-').reverse().join('-');
			finicial2 = finicial.split('-').reverse().join('-');
			/*var ffinal ="\'"+(f.getFullYear()+ "-" + (f.getMonth()+1 ) + "-" + f.getDate() )+"\'";
			var ffinal2 =f.getDate() + "-" + (f.getMonth()+1 ) + "-" + f.getFullYear();
			var fi = new Date();
   
			var finicial ="\'"+((fi.getFullYear())+ "-" + 1+ "-" + 1)+"\'";
			var finicial2 =(1+ "-" + 1+ "-" + (fi.getFullYear()));	*/
		//alert (finicial+'   '+ffinal+'   '+finicial2+'   '+ffinal2+ '  sin fech');
	}
	

	$('#psgrafico80').empty();	
	$('#psgrafico79').empty();
	//$("#psgrafico79").append("<agenciaforestal td width=1200px><h2	 align='left' style='color:darkred;'> <b><i >&nbsp"+nombreactividad+"&nbsp </i></b></h2></td> ");
	////////////////////////////
	$("#psgrafico79").append("<agenciaforestal td width=1200px><h2	 align='left' style='color:darkred;'> <b><i >&nbsp"+nombreactividad+"</h2>");
	var tcuenca=qcuenca;
	var tmicro=mcuenca;
	
	if (tcuenca != null) {
	$.get('index.php?r=Quest/GetSubcuenca&subcuenca='+tcuenca, function (datacuenca){
		
		datacuenca= JSON.parse(datacuenca);
		var nombrecuenca=datacuenca[0].respuesta;
		var nombremicro='----';
		
		$("#psgrafico79").append("<h4  align='left' style='color:darkred;'>&nbsp &nbsp  Subcuenca: "+nombrecuenca+"</h4>");
		if (tmicro !=999) {
		$.get('index.php?r=Quest/GetMicrocuenca&microcuenca='+tmicro, function (datamicro){
			datamicro= JSON.parse(datamicro);
			nombremicro=datamicro[0].respuesta;
			
			$("#psgrafico79").append("<h5 align='left' style='color:darkred;' >&nbsp &nbsp  &nbsp &nbspMicrocuenca: "+nombremicro+ "</h5>");
		})
		
		}
		
		
		
		
	})
	}
	
	///////////////////////////
	$("#psgrafico80").append("</td>   <td ><h4><b> &nbsp Fecha de la consulta :&nbsp; " +dia+ ", (del dia  " +finicial2+"&nbsp; a&nbsp;: "+ffinal2+"&nbsp  ) </b></h4></td> " );
	//$("#psgrafico80_A").html('<img id="loading-image" width=200 src="images/logo3_75_75.gif" alt="Loading..." />');
		
		
       var id2 = parseInt($("#ano").val());
	   
	   $('#psgrafico101').empty();	
		
	
	
		//plantaciones_ano_en_curso.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&ano=2018&doy=161");
		
	
	
	var f = new Date();
    var dia =(f.getDate() + "-" + (f.getMonth() +1) + "-" + f.getFullYear());
	var anoconsulta= f.getFullYear();

//alert (f);
		
	//$('#psgrafico80').empty();
	//$("#grafico80").append("</td>   <td ><h3><b>&nbsp; Fecha de consulta :&nbsp; " +dia+ ", (desde: " +finicial+"&nbsp; a&nbsp;: "+ffinal+"&nbsp;) </b></h3></td> " );
	//$("#psgrafico80").append("</td>   <td ><h4><b>&nbsp; Fecha de consulta :&nbsp; " +dia+ " </b></h4></td> " );
	//$("#grafico80_A").html('<img id="loading-image" width=200 src="images/logo3_75_75.gif" alt="Loading..." />');
		
		$('#psgrafico80_A').empty();
		$('#psgrafico90').empty();
		$('#psgrafico91').empty();
		$('#psgrafico92').empty();
		$('#psgrafico93').empty();
		$('#psgrafico93sub').empty();
		$('#psgrafico93bis').empty();
		$('#psgrafico94').empty();
		$('#psgrafico94sub').empty();
		$('#psgrafico94bis').empty();
		$('#psgrafico94B').empty();
		$('#psgrafico95').empty();
		$('#psgrafico100').empty();
		$('#psgrafico101').empty();
		$('#psgrafico102').empty();
		$('#psgrafico103').empty();
		$('#psgrafico104').empty();
		$('#psgrafico104sub').empty();
		$('#psgrafico104bis').empty();
		$('#psgraficoA2').empty();
		$('#psgraficoA3').empty();
		//$("#grafico101").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
		//$("#grafico91").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	  $('#pobEdad0').empty();
		$('#pobEdad1').empty();
		$('#pobEdad2').empty();
		$('#pobEdad3').empty();
		$('#pobEdad4').empty();
		$('#psTitulo0').empty();
		$('#psTitulo1').empty();
		$('#psTitulo2').empty();
		$('#psTitulo3').empty();
		$('#psTitulo4').empty();
		$('#psTituloA2').empty();
		$('#psTituloA3').empty();
		$('#psTitulo92').empty();
		$('#psTitulo93').empty();
		$('#psTitulo93sub').empty();
		$('#psTitulo93bis').empty();
		$('#psTitulo94').empty();
		$('#psTitulo94bis').empty();
		$('#psTitulo94sub').empty();
		$('#psTitulo95').empty();
		$('#psTitulo102').empty();
		$('#psTitulo103').empty();
		$('#psTitulo104').empty();
		$('#psTitulo104sub').empty();
	$('#grafico2').empty();
		$('#psgrafico21').empty();
		$('#psgrafico22').empty();
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

	;
	
	
if (genero==0) {
	
	//if (document.getElementById("checkfecha").checked != true ) {  	 
	
	$.get('index.php?r=cafe/GetAvances2&criterio='+criterio, function (data4){
			data4 = JSON.parse(data4);	
			$.get('index.php?r=cafe/GetPoa2&cuenca='+cuencapoa+'&ano1='+anopoa1+'&ano2='+anopoa2, function (data3){
			data3 = JSON.parse(data3);
	

	categorias=[];
	serie1=[];
	serie2=[];
	serie3=[];
	
	//productores
	
		categorias.push('Fomentadas');
		serie1.push(data4[0].fomentadas);
		serie2.push(data3[0].fomentadas);
		serie3.push((data4[0].fomentadas*100)/(data3[0].fomentadas));
		categorias.push('Rehabilitadas');
		serie1.push(data4[0].rehabilitadas);
		serie2.push(data3[0].rehabilitadas);
		serie3.push((data4[0].rehabilitadas*100)/(data3[0].rehabilitadas));
		categorias.push('Renovadas');
		serie1.push(data4[0].renovadas);
		serie2.push(data3[0].renovadas);
		serie3.push((data4[0].renovadas*100)/(data3[0].renovadas));
		categorias.push('Plantas (*1000)');
		serie1.push(data4[0].plantas/1000);
		serie2.push(data3[0].plantas/1000);
		serie3.push((data4[0].plantas*100)/(data3[0].plantas));
		categorias.push('Tareas financiadas');
		serie1.push(data4[0].financiadas);
		serie2.push(data3[0].financiadas);
		serie3.push((data4[0].financiadas*100)/(data3[0].financiadas));
		categorias.push('Monto (*1000)');
		serie1.push(data4[0].monto/1000);
		serie2.push(data3[0].monto/1000);
		serie3.push((data4[0].monto*100)/(data3[0].monto));
		
		
		
	
$('#psgrafico90').empty();
	/*
$('#psgrafico90').highcharts({

    chart: {
        type: 'bar'
    },
    title: {
        text: 'Unidades ejecutadas vs previstas'
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
            text: 'Unidades',
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
        valueSuffix: ' unidades'
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
		
		
	$('#psgrafico91').empty();
	
$('#psgrafico91').highcharts({

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
		});	*/
		//cuadro de avances 
		
       	

		})
	})
	
	

	//}
	
	
	$('#psgraficoA2').empty();
	$("#psgraficoA2").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	$("#psTituloA2").append("<td><h4><b>" +"Actividad de&nbsp;"+ nombreactividad + "&nbsp; Avance/Meta = % de cumplimiento" + "</b></h4></td>" );
		
		$.get('index.php?r=cafe/GetAvances2&criterio='+criterio, function (data3){
		$("#psgraficoA2").empty();	
		var row = $("<tr>");
		$("#psgraficoA2").append(row); 
		//row.append($("<th>"));
		row.append($("<td width=40%><h5 align='center'><b>Descripción</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>Meta</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>Avance</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>%</b></h5></td>"));
		row.append($("<th></th>"));
		var row = $("</tr>")
			$("#psgraficoA2").append(row);	
			
		var totalsup=0;
		
		//alert (criterio);
		
		
			data3 = JSON.parse(data3);	
			
			
			//////////
			act='tareas_fomentadas';
			$.get('index.php?r=cafe/GetPoa3&cuenca='+cuencapoa+'&ano1='+anopoa1+'&ano2='+anopoa2+'&actividad=\''+act+'\'', function (data4){
			data4 = JSON.parse(data4);	
			var row = $("<tr>");
			$("#psgraficoA2").append(row); 
			row.append($("<td ><h6  align='left ' ><b>Tareas fomentadas</b></h6></td>"));
			
			row.append($("<td><h5 align='right'>" + parseFloat(data4[0].suma).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:0,minimunFractionDigits:0}) + "</td>"));
			
			row.append($("<td><h5 align='right'>" + parseFloat(data3[0].fomentadas).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:0,minimunFractionDigits:0}) + "</td>"));
			row.append($("<td><h5 align='right'>" +parseFloat( ((data3[0].fomentadas*100)/(data4[0].suma))).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
			var row = $("</tr>");
			$("#psgraficoA2").append(row); 
			////////
			
				act='tareas_rehabilitadas';
				$.get('index.php?r=cafe/GetPoa3&cuenca='+cuencapoa+'&ano1='+anopoa1+'&ano2='+anopoa2+'&actividad=\''+act+'\'', function (data4){
				data4 = JSON.parse(data4);	
				
				var row = $("<tr>");
				$("#psgraficoA2").append(row); 
				row.append($("<td ><h6  align='left ' ><b>Tareas rehabilitadas</b></h5></td>"));
				row.append($("<td><h5 align='right'>" + parseFloat((data4[0].suma)).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
				row.append($("<td><h5 align='right'>" + parseFloat(data3[0].rehabilitadas).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
				row.append($("<td><h5 align='right'>" + parseFloat(((data3[0].rehabilitadas*100)/(data4[0].suma))).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
				var row = $("</tr>");
				$("#psgraficoA2").append(row); 
				
			
			//////////
					act='tareas_renovadas';
					$.get('index.php?r=cafe/GetPoa3&cuenca='+cuencapoa+'&ano1='+anopoa1+'&ano2='+anopoa2+'&actividad=\''+act+'\'', function (data4){
					data4 = JSON.parse(data4);		
					var row = $("</tr>");	
					$("#psgraficoA2").append(row); 
					var row = $("<tr>");
					$("#psgraficoA2").append(row); 
					row.append($("<td ><h6  align='left ' ><b>Tareas renovadas</b></h5></td>"));
					row.append($("<td><h5 align='right'>" + parseFloat(data4[0].suma).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
					row.append($("<td><h5 align='right'>" + parseFloat(data3[0].renovadas).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
					row.append($("<td><h5 align='right'>" + parseFloat(((data3[0].renovadas*100)/(data4[0].suma))).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
					var row = $("</tr>");
					$("#psgraficoA2").append(row); 	
				
				
			//////////////	
				
				
						act='plantas';
						$.get('index.php?r=cafe/GetPoa3&cuenca='+cuencapoa+'&ano1='+anopoa1+'&ano2='+anopoa2+'&actividad=\''+act+'\'', function (data4){
						data4 = JSON.parse(data4);	
						 

						var row = $("<tr>");
						$("#psgraficoA2").append(row); 
						row.append($("<td ><h6  align='left ' ><b>Plantas</b></h5></td>"));
							
						row.append($("<td><h5 align='right'>" + parseFloat(data4[0].suma).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
						row.append($("<td><h5 align='right'>" + parseFloat(data3[0].plantas).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
						row.append($("<td><h5 align='right'>" + parseFloat(((data3[0].plantas*100)/(data4[0].suma))).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
						var row = $("</tr>");
						$("#psgraficoA2").append(row); 
						
		
							act='tareas_financiadas';
							$.get('index.php?r=cafe/GetPoa3&cuenca='+cuencapoa+'&ano1='+anopoa1+'&ano2='+anopoa2+'&actividad=\''+act+'\'', function (data4){
							data4 = JSON.parse(data4);
							
							
							var row = $("<tr>");
							$("#psgraficoA2").append(row); 
							row.append($("<td ><h6  align='left ' ><b>Tareas financiadas</b></h5></td>"));
							row.append($("<td><h5 align='right'>" +parseFloat(data4[0].suma).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
							row.append($("<td><h5 align='right'>" + parseFloat(data3[0].financiadas).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
							row.append($("<td><h5 align='right'>" +parseFloat(((data3[0].financiadas*100)/(data4[0].suma))).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
							
							var row = $("</tr>");	
							$("#psgraficoA2").append(row); 
			
								act='monto_financiado';
								$.get('index.php?r=cafe/GetPoa3&cuenca='+cuencapoa+'&ano1='+anopoa1+'&ano2='+anopoa2+'&actividad=\''+act+'\'', function (data4){
								data4 = JSON.parse(data4);
								
								
								var row = $("<tr>");
								$("#psgraficoA2").append(row); 
								row.append($("<td ><h6  align='left ' ><b>Monto financiado</b></h5></td>"));
								row.append($("<td><h5 align='right'>" +parseFloat(data4[0].suma).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
								row.append($("<td><h5 align='right'>" + parseFloat(data3[0].monto).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
								row.append($("<td><h5 align='right'>" +parseFloat(((data3[0].monto*100)/(data4[0].suma))).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
								
								var row = $("</tr>");	
								$("#psgraficoA2").append(row); 
								
			
		})})})})})})	
		})
	
	






































	
	$.get('index.php?r=Poa/GetActividadActividadSubcuencas&tipoactividad=0&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var sumatotales =[];
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	  
	  //segunda actividad
	
	  
	})
	
//MUNICIPIO
$("#psTitulo102").empty();
$("#psgrafico102").empty();
	
	$("#psTitulo102").append("<td><h4><b>" +" Sistemas de produccion por Municipio" + "</b></h3></td>" );
	$("#psgrafico102").empty();
	var row = $("<tr />");
		$("#psgrafico102").append(row); 
		row.append($("<td width=20% class=sucess colspan=1></td>"));
		row.append($("<td width=60% class=sucess colspan=3 ><h5 align='center' ><b> Tareas por componente</b></h5></td>"));
		row.append($("<td width=20% class=sucess colspan=1></td>"));
		row.append($("<th></th>"));
		var row = $("<tr style='background-color:white' >");
		 $("#psgrafico102").append(row); 	
		row.append($("<td width=20%><h5 align='center'><b>Municipio</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>Fomento</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>Rehabilitacion</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>Renovación</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>Total tareas</b></h5></td>"));
		row.append($("<th></th>"));
		var row = $("</tr>");
		$("#psgrafico102").append(row); 
	
	
	
	$.get('index.php?r=cafe/GetSistemasMunicipio&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	



	////////////////////
	    
			
		var totalsup=0;
		var totalcantidad=0;
	var totaltareas=0;
	var totalriego=0;
	for (var i=0; i < data3.length; i++){
			total=0
			var row = $("<tr>");
			$("#psgrafico102").append(row); 
			row.append($("<td ><h5 align='left'>" + data3[i].municipio.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5 align='right'>" + data3[i].fomentadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totalcantidad= totalcantidad+data3[i].fomentadas;
			 total=total + data3[i].fomentadas;
			 row.append($("<td><h5 align='right'>" + data3[i].rehabilitadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totaltareas= totaltareas+data3[i].rehabilitadas;
			 total=total + data3[i].rehabilitadas;
			 row.append($("<td><h5 align='right'>" + data3[i].renovadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totalriego= totalriego+data3[i].renovadas;
			 total= total+data3[i].renovadas;
			 row.append($("<td><h5 align='right'>" + total.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("</tr>");
			$("#psgrafico102").append(row); 
		
		}
		
		
			
			
			var row = $("<tr>");
			$("#psgrafico102").append(row); 
			row.append($("<td><h5><b style='color:darkred;'>"+ "TOTAL" +"</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalcantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totaltareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalriego.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			total=totalcantidad + totaltareas + totalriego;
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + total.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			var row = $("</tr>");
			
			$("#psgrafico102").append(row); 
		
	
	})
	
	
	//CAPACITACION
	$("#psTitulo94").empty();
	$("#psgrafico94").empty();
	$("#psTitulo94").append("<td><h4><b>" +"Capacitación" + "</b></h3></td>" );
	$("#psgrafico94").empty();
		//row.append($("<th></th>"));
		 var row = $("<tr />");
		$("#psgrafico94").append(row); 
		
		
		row.append($("<td width=20%><h5 align='center'><b>Actividad</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Meta</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Realizadas</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Participantes</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Tareas</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Otras</b></h5></td>"));
		row.append($("<th></th>"));
		//var row = $("<tr />");
		$("#psgrafico94").append(row);
	$.get('index.php?r=sisfam/GetCalificacion&criterio='+criterio, function (data3){
		/*
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$.get('index.php?r=sisfam/GetSumaCalificacion&criterio='+criterio, function (data4){
	data4 = JSON.parse(data4);
	var totalcalificacion=data4[0].cantidad;
	
	 
		
			
		var totalsup=0;
	for (var i=0; i < data3.length; i++){
			
			var row = $("<tr />");
			$("#psgrafico94").append(row); 
			row.append($("<td ><h5 align='left'>" + data3[i].estado.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5 align='right'>" + data3[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totalsup= totalsup+data3[i].cantidad;
			row.append($("<td ><h5 align='right'>" + ((data3[i].cantidad*100)/totalcalificacion).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</td>"));
			$("#psgrafico94").append(row); 
		var row = $("<tr />");
		}
		
		
			
			$("#psgrafico94").append(row); 

			row.append($("<td><h5><b style='color:darkred;'>"+ "TOTAL" +"</b></h5></td>"));
	
			
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));	
			row.append($("<td><h5 align='right'><b style='color:darkred;'>100.00</b></h5></td>"));	
		var row = $("<tr />");
			
			$("#psgrafico94").append(row); 
	
	})
	*/})
	
	
	
	
	
	
	
	//DISTRIBUCIÓN DE SISTEMAS POR SUBCUENCA.
	
	$("#psTitulo94bis").empty();
	$("#psgrafico94bis").empty();
	$("#psTitulo94bis").append("<td><h4><b>" +"Distribución de sistemas por subcuenca" + "</b></h3></td>" );
	$("#psgrafico94bis").empty();
	var row = $("<tr />");
		$("#psgrafico94bis").append(row); 
		row.append($("<td width=20% class=sucess colspan=1></td>"));
		row.append($("<td width=60% class=sucess colspan=3 ><h5 align='center' ><b> Tareas por componente</b></h5></td>"));
		row.append($("<td width=20% class=sucess colspan=1></td>"));
		row.append($("<th></th>"));
		var row = $("<tr style='background-color:white' >");
		 $("#psgrafico94bis").append(row); 	
		row.append($("<td width=20%><h5 align='center'><b>Subcuenca</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>Fomento</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>Rehabilitacion</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>Renovación</b></h5></td>"));
		row.append($("<td width=20%><h5 align='center'><b>Total tareas</b></h5></td>"));
		row.append($("<th></th>"));
		var row = $("</tr>");
		$("#psgrafico94bis").append(row); 
	$.get('index.php?r=cafe/GetSistemasSubcuenca&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		
	var totalcantidad=0;
	var totaltareas=0;
	var totalriego=0;
	for (var i=0; i < data3.length; i++){
			total=0
			var row = $("<tr>");
			$("#psgrafico94bis").append(row); 
			row.append($("<td ><h5 align='left'>" + data3[i].cuenca.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5 align='right'>" + data3[i].fomentadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totalcantidad= totalcantidad+data3[i].fomentadas;
			 total=total + data3[i].fomentadas;
			 row.append($("<td><h5 align='right'>" + data3[i].rehabilitadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totaltareas= totaltareas+data3[i].rehabilitadas;
			 total=total + data3[i].rehabilitadas;
			 row.append($("<td><h5 align='right'>" + data3[i].renovadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totalriego= totalriego+data3[i].renovadas;
			 total= total+data3[i].renovadas;
			 row.append($("<td><h5 align='right'>" + total.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("</tr>");
			$("#psgrafico94bis").append(row); 
		
		}
		
		
			
			
			var row = $("<tr>");
			$("#psgrafico94bis").append(row); 
			row.append($("<td><h5><b style='color:darkred;'>"+ "TOTAL" +"</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalcantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totaltareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalriego.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			total=totalcantidad + totaltareas + totalriego;
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + total.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			var row = $("</tr>");
			
			$("#psgrafico94bis").append(row); 
	
	
	})
	
	//VARIEDAD
	$("#psTitulo95").empty();
	$("#psgrafico95").empty();
	$("#psTitulo95").append("<td><h4><b>Plantas de café por variedad</b></h4></td>" );
		var row = $("<tr>");
		
		$("#psgrafico95").append(row); 
	
		row.append($("<td width=40%><h5 align='left'><b>Variedad</b></h5></td>"));
		row.append($("<td width=30%><h5 align='center'><b>Cantidad de plantas</b></h5></td>"));
		row.append($("<td width=30%><h5 align='center'><b>Por ciento</b></h5></td>"));
		row.append($("<th></th>"));
		var row = $("</tr>");
		$("#psgrafico95").append(row); 
		
		 var row = $("<tr />");
		
		$("#psgrafico95").append(row); 
		
		
		//row.append($("<td ><h5 align='left'><b>Cultivos (Libras)</b></h5></td>"));
	//var row = $("</tr>");
		//$("#psgrafico95").append(row); 
	
	
	$.get('index.php?r=cafe/GetVariedad&criterio=  '+criterio, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	var fechapro = new Date();
	var  anoactual = fechapro.getFullYear();
	$.get('index.php?r=cafe/GetVariedadTotal&criterio=  '+criterio, function (data4){
	data4 = JSON.parse(data4);
	
		//row.append($("<th></th>"));
		
			
		var totalsup=0;
		var pesosiniciales=0;
		var pesosactuales=0;
		for ( var j=0 ; j < data3.length ; j++){
			
			var row = $("<tr>");
			$("#psgrafico95").append(row); 
			row.append($("<td><h5 align='left'>" + data3[j].variedad.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0 }) + "</b></h5></td>")); 
			row.append($("<td><h5 align='right'>" + ((data3[j].plantas*100)/data4[0].plantas).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2 }) + "</b></h5></td>")); 
	
			var row = $("</tr>");
			$("#psgrafico95").append(row); 
		}
		
		var row = $("<tr>");
		$("#psgrafico95").append(row); 	
		row.append($("<td><h5 align='left' style='color:darkred;'><b> TOTAL </b></h5></td>"));
		row.append($("<td><h5 align='right'style='color:darkred;' >" + data4[0].plantas.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0 }) + "</b></h5></td>")); 
		row.append($("<td><h5 align='right' style='color:darkred;'> 100.00    </b></h5></td>")); 
		var row = $("</tr>");
		$("#psgrafico95").append(row); 		
		
		})
	})


//CAPTACION DE TERRENO
	$("#psTitulo95a").empty();
	$("#psgrafico95a").empty()
	$("#psTitulo95a").append("<td><h4><b>Captación de terrenos</b></h4></td>" );
	
	
	var row = $("<tr />");
		$("#psgrafico95a").append(row); 
		row.append($("<td width=52% class=sucess colspan=4></td>"));
		row.append($("<td width=24% class=sucess colspan=2 ><h5 align='center' ><b> Superficie establecida</b></h5></td>"));
		row.append($("<td width=24% class=sucess colspan=2><h5 align='center' ><b> Marco de plantación</b></h5></td>"));
		row.append($("<th></th>"));
		var row = $("<tr style='background-color:white' >");
		 $("#psgrafico95a").append(row); 
 var row = $("<tr>");
		
		$("#psgrafico95a").append(row); 
		
		 
	
		
		
		row.append($("<td width=16%><h5 align='left'><b>Componente</b></h5></td>"));
		row.append($("<td width=12%><h5 align='center'><b>Captación</b></h5></td>"));
		row.append($("<td width=12%><h5 align='center'><b>Sombra establecida</b></h5></td>"));
		row.append($("<td width=12%><h5 align='center'><b>Tareas supervisadas</b></h5></td>"));
		row.append($("<td width=12%><h5 align='center'><b>Tareas</b></h5></td>"));
		row.append($("<td width=12%><h5 align='center'><b>Por ciento</b></h5></td>"));
		row.append($("<td width=12%><h5 align='center'><b>H*p</b></h5></td>"));
		row.append($("<td width=12%><h5 align='center'><b>Pta/ta</b></h5></td>"));
		row.append($("<th></th>"));
		var row = $("</tr>");
		$("#psgrafico95a").append(row); 
		
		 var row = $("<tr>");
		
		$("#psgrafico95a").append(row); 
		
	
	
	$.get('index.php?r=cafe/GetCaptacionTerrenos&criterio=  '+criterio, function (data3){
	/*
	
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	var fechapro = new Date();
	var  anoactual = fechapro.getFullYear();
	$.get('index.php?r=cafe/GetVariedadTotal&criterio=  '+criterio, function (data4){
	data4 = JSON.parse(data4);
	
			
		
		
		
		//row.append($("<th></th>"));
		
			
		var totalsup=0;
		var pesosiniciales=0;
		var pesosactuales=0;
		for ( var j=0 ; j < data3.length ; j++){
			
			var row = $("<tr>");
			$("#psgrafico95a").append(row); 
			row.append($("<td><h5 align='left'>" + data3[j].variedad.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0 }) + "</b></h5></td>")); 
			row.append($("<td><h5 align='right'>" + ((data3[j].plantas*100)/data4[0].plantas).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2 }) + "</b></h5></td>")); 
			   
			
			
			var row = $("</tr>");
			$("#psgrafico95a").append(row); 
		}
		
		var row = $("<tr>");
		$("#psgrafico95a").append(row); 
		
		row.append($("<td><h5 align='left'><b> TOTAL </b></h5></td>"));
		row.append($("<td><h5 align='right'>" + data4[0].plantas.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0 }) + "</b></h5></td>")); 
		row.append($("<td><h5 align='right'> 100.00    </b></h5></td>")); 
		var row = $("</tr>");
		$("#psgrafico95a").append(row); 		
				
			
				
						
			
	})
	*/	
	})

//Establecimineto sombra
	$("#psTitulo95b").empty();
	$("#psgrafico95b").empty()
	$("#psTitulo95b").append("<td><h4><b>Establecimiento Sombra para Café</b></h4></td>" );
	
	
	var row = $("<tr />");
		$("#psgrafico95b").append(row); 
		row.append($("<td width=20% class=sucess colspan=1></td>"));
		row.append($("<td width=30% class=sucess colspan=2 ><h5 align='center' ><b> Producción plantas para sombra café</b></h5></td>"));
		row.append($("<td width=5% class=sucess colspan=1></td>"));
		row.append($("<td width=45% class=sucess colspan=3><h5 align='center' ><b> Establecimiento sombra</b></h5></td>"));
		row.append($("<th></th>"));
		var row = $("<tr style='background-color:white' >");
		 $("#psgrafico95b").append(row); 
 var row = $("<tr>");
		
		$("#psgrafico95b").append(row); 
		
		 
	
		
		
		row.append($("<td width=20%><h5 align='left'><b>Componente</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Meta</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>avance</b></h5></td>"));
		row.append($("<td width=5%><h5 align='center'><b></b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Meta</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Avance</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Por ciento</b></h5></td>"));
		
		row.append($("<th></th>"));
		var row = $("</tr>");
		$("#psgrafico95b").append(row); 
		
		 var row = $("<tr>");
		
		$("#psgrafico95b").append(row); 
		
	
	
	$.get('index.php?r=cafe/GetCaptacionTerrenos&criterio=  '+criterio, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	var fechapro = new Date();
	var  anoactual = fechapro.getFullYear();
	$.get('index.php?r=cafe/GetVariedadTotal&criterio=  '+criterio, function (data4){
	data4 = JSON.parse(data4);
	
			/*
		
		
		
		//row.append($("<th></th>"));
		
			
		var totalsup=0;
		var pesosiniciales=0;
		var pesosactuales=0;
		for ( var j=0 ; j < data3.length ; j++){
			
			var row = $("<tr>");
			$("#psgrafico95a").append(row); 
			row.append($("<td><h5 align='left'>" + data3[j].variedad.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0 }) + "</b></h5></td>")); 
			row.append($("<td><h5 align='right'>" + ((data3[j].plantas*100)/data4[0].plantas).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2 }) + "</b></h5></td>")); 
			   
			
			
			var row = $("</tr>");
			$("#psgrafico95a").append(row); 
		}
		
		var row = $("<tr>");
		$("#psgrafico95b").append(row); 
		
		row.append($("<td><h5 align='left'><b> TOTAL </b></h5></td>"));
		row.append($("<td><h5 align='right'>" + data4[0].plantas.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0 }) + "</b></h5></td>")); 
		row.append($("<td><h5 align='right'> 100.00    </b></h5></td>")); 
		var row = $("</tr>");
		$("#psgrafico95b").append(row); 		
				
			*/	
				
						
			
	})
	})

//Visitas técnicas
	$("#psTitulo95c").empty();
	$("#psgrafico95c").empty()
	$("#psTitulo95c").append("<td><h4><b>Visitas técnicas para el monitoreo de establecimiento de las plantaciones y viveros establecidos</b></h4></td>" );
	
	
	var row = $("<tr />");
		$("#psgrafico95c").append(row); 
		row.append($("<td width=25% class=sucess colspan=1></td>"));
		row.append($("<td width=30% class=sucess colspan=2 ><h5 align='center' ><b> Visitas productores</b></h5></td>"));
		row.append($("<td width=15% class=sucess colspan=1><h5 align='center' >Tareas</b></h5></td>"));
		row.append($("<td width=30% class=sucess colspan=2><h5 align='center' ><b> Establecida modalidad</b></h5></td>"));
		row.append($("<th></th>"));
		var row = $("<tr style='background-color:white' >");
		 $("#psgrafico95c").append(row); 
 var row = $("<tr>");
		
		$("#psgrafico95c").append(row); 
		
		 
	
		
		
		row.append($("<td width=25%><h5 align='left'><b>Componente</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Programas</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Ejecutadas</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Supervisadas</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Tareas</b></h5></td>"));
		row.append($("<td width=15%><h5 align='center'><b>Por ciento</b></h5></td>"));
		
		row.append($("<th></th>"));
		var row = $("</tr>");
		$("#psgrafico95c").append(row); 
		
		 var row = $("<tr>");
		
		$("#psgrafico95c").append(row); 
		
	
	
	$.get('index.php?r=cafe/GetCaptacionTerrenos&criterio=  '+criterio, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	var fechapro = new Date();
	var  anoactual = fechapro.getFullYear();
	$.get('index.php?r=cafe/GetVariedadTotal&criterio=  '+criterio, function (data4){
	data4 = JSON.parse(data4);
	
			/*
		
		
		
		//row.append($("<th></th>"));
		
			
		var totalsup=0;
		var pesosiniciales=0;
		var pesosactuales=0;
		for ( var j=0 ; j < data3.length ; j++){
			
			var row = $("<tr>");
			$("#psgrafico95c").append(row); 
			row.append($("<td><h5 align='left'>" + data3[j].variedad.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0 }) + "</b></h5></td>")); 
			row.append($("<td><h5 align='right'>" + ((data3[j].plantas*100)/data4[0].plantas).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2 }) + "</b></h5></td>")); 
			   
			
			
			var row = $("</tr>");
			$("#psgrafico95c").append(row); 
		}
		
		var row = $("<tr>");
		$("#psgrafico95c").append(row); 
		
		row.append($("<td><h5 align='left'><b> TOTAL </b></h5></td>"));
		row.append($("<td><h5 align='right'>" + data4[0].plantas.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0 }) + "</b></h5></td>")); 
		row.append($("<td><h5 align='right'> 100.00    </b></h5></td>")); 
		var row = $("</tr>");
		$("#psgrafico95c").append(row); 		
				
			*/	
				
						
			
	})
	})


	
	
//ASOCIACIONES


$("#psTitulo103").empty();
$("#psgrafico103").empty();
$("#psgrafico103").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	
	$("#psTitulo103").append("<td><h4><b>" +" Evaluación Asociatividad " + "</b></h3></td>" );
	$.get('index.php?r=cafe/GetAsociacionesTareas&criterio='+criterio, function (data3){
	$("#psgrafico103").empty();
	var row = $("<tr />");
	$("#psgrafico103").append(row); 	
	//var row = $("<tr style='background-color:white' >");
		//$("#psgrafico103").append(row); 		
		row.append($("<td width=23% class=sucess colspan=1></td>"));
		row.append($("<td width=11% class=sucess colspan=1><h5 align='center'><b>Asociados </b></h5></td>"));
		row.append($("<td width=33% class=sucess colspan=3><h5 align='center' ><b> Tareas</b></h5></td>"));
		row.append($("<td width=11% class=sucess colspan=1><h5 align='center' ><b>Caficultores </b></h5></td>"));
		row.append($("<td width=11% class=sucess colspan=1><h5 align='center' ><b>Tareas </b></h5></td>"));
		row.append($("<td width=11% class=sucess colspan=1><h5 align='center' ><b> </b></h5></td>"));
		row.append($("<th style='background-color:white' ></th>"));
		var row = $("<tr style='background-color:white' >");
		 $("#psgrafico103").append(row); 
	    var row = $("<tr >");
		$("#psgrafico103").append(row); 
		row.append($("<td width=23%><h5 align='center'><b>Asociación</b></h5></td>"));
		row.append($("<td width=11%><h5 align='center'><b>Cantidad</b></h5></td>"));
		row.append($("<td width=11%><h5 align='center'><b>Fomentadas</b></h5></td>"));
		row.append($("<td width=11%><h5 align='center'><b>Rehabilitadas</b></h5></td>"));
		row.append($("<td width=11%><h5 align='center'><b>Renovadas</b></h5></td>"));
		row.append($("<td width=11%><h5 align='center'><b>Financiados</b></h5></td>"));
		row.append($("<td width=11%><h5 align='center'><b>Financiadas</b></h5></td>"));
		row.append($("<td width=11%><h5 align='center'><b>Otros</b></h5></td>"));
		row.append($("<th></th>"));
		//var row = $("<tr />");
		
		$("#psgrafico103").append(row); 
	
				
	
	data3 = JSON.parse(data3);	
	var totalasociados = 0;
	var totalfomentadas = 0;
	var totalrehabilitadas = 0;
	var totalrenovadas = 0;
	var totalcaficultores = 0;
	var totalfinanciadas = 0;
	var totalotros = 0;
	var i = 0;
	var c = 0, s =0;
	
	
	
	
	
		for (var l=0; l < data3.length; l++){
					var row = $("<tr />");
					financiadas=0;
					$("#psgrafico103").append(row); 
					
					if (data3[l].nombre==null){ data3[l].nombre="No asociados"};
					
					row.append($("<td><h5 align='left'>" + data3[l].nombre + "</td>"));	
				
					row.append($("<td><h5 align='right' >" + data3[l].asociados.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
					totalasociados = totalasociados + data3[l].asociados;
					
					row.append($("<td><h5 align='right' >" + data3[l].fomentadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
					totalfomentadas = totalfomentadas + data3[l].fomentadas;
					financiadas = financiadas + data3[l].fomentadas;
					
					row.append($("<td><h5 align='right' >" + data3[l].rehabilitadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
					totalrehabilitadas = totalrehabilitadas+ data3[l].rehabilitadas;
					financiadas = financiadas + data3[l].rehabilitadas;
					
					row.append($("<td><h5 align='right' >" + data3[l].renovadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
					totalrenovadas = totalrenovadas + data3[l].renovadas;
					financiadas = financiadas + data3[l].renovadas;
					
					
					row.append($("<td><h5 align='right' >" + data3[l].caficultores.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
					totalcaficultores = totalcaficultores + data3[l].caficultores;
					
					
					row.append($("<td><h5 align='right' >" + financiadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
					totalfinanciadas = totalfinanciadas + financiadas;
					
					row.append($("<td><h5 align='right' ></td>"));
					 totalotros = totalotros ;
			
					$("#psgrafico103").append(row); 
					var row = $("<tr />");
					
			
		}
		
		var row = $("<tr>");
			$("#psgrafico103").append(row); 
			row.append($("<td><h5><b style='color:darkred;'>"+ "TOTAL" +"</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalasociados.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalfomentadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalrehabilitadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalrenovadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalcaficultores.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalfinanciadas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalotros.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			var row = $("</tr>");
			
			$("#psgrafico103").append(row); 
	
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

}	

//CLASIFICACION POR GENERO Y ESTADO CIVIL
	//datos de  la matriz
	$('#psgrafico92').empty();
	$("#psgrafico92").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	$.get('index.php?r=cafe/GetEstadoCivilGenero&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		$("#psTitulo92").append("<td><h4><b>" +" Género </b></h3></td>" );
		$('#psgrafico92').empty();
		var row = $("<tr />");
		$("#psgrafico92").append(row); 
		row.append($("<td width=45% class=sucess colspan=3></td>"));

		row.append($("<td width=55% class=sucess colspan=4 ><h5 align='center' ><b> Distribución por sexo</b></h5></td>"));
		
		row.append($("<th></th>"));
		
		var row = $("<tr style='background-color:white' >");
		 $("#psgrafico92").append(row); 
		//row.append($("<th></th>"));
		row.append($("<td width=15% ><h5   align='center' ><b>Estado civil</b></h4></td>"));
		row.append($("<td width=15%><h5 align='center' ><b >Cantidad</b></h4></td>"));
		row.append($("<td width=15%><h5 align='center' ><b>Por ciento</b></h4></td>"));
		
		row.append($("<td width=13%><h5 align='center' ><b>Femenino<b></h5></td>"));
		row.append($("<td width=13%><h5 align='center' ><b>Masculino</b></h5></td>"));
		row.append($("<td width=13%><h5 align='center' ><b>Juridico</b></h5></td>"));
		row.append($("<td width=16%><h5 align='center' ><b>Total</b></h5></td>"));
			var row = $("<tr />")	
			$("#psgrafico92").append(row); 
			
		var totalsup=0;
		var sumatotales=[];
		sumatotales[0]=0;
		sumatotales[1]=0;
		//FILAS de la matriz
		//carga lista de estados civil
		$.get('index.php?r=cafe/GetTodoGenero&criterio='+criterio, function (data4){
		data4 = JSON.parse(data4);
	
			//datos de la columna
			//carrga datos de genero
		$.get('index.php?r=cafe/GetEstadoCivil2&criterio='+criterio, function (data5){
			data5 = JSON.parse(data5);
		$.get('index.php?r=cafe/GetSumaEstadoCivil&criterio='+criterio, function (data6){
			data6 = JSON.parse(data6);
			var totalestadocivil=data6[0].cantidad;
		//$("#Titulo93sub").append("<td><h5>" +data4[0].actividad+ "</h5></td>" );
	
	/* var row = $("<tr />");
		$("#psgrafico92").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=20%<h5><b>Subcuenca</b></h5></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%><h5><b>" + data4[i].estado.toLocaleString('en-EN') + "</b></h5></td>"));	
			
		}
			row.append($("<td width=20%><h5><b>Total</b></h5></td>"));
			var row = $("<tr />")	
			$("#psgrafico93").append(row); 
			
		var totalsup=0;
		*/
		// bucle de subcuenca
	
		for (var l=0; l < data4.length+1;l++){
			sumatotales[l]=0;
			
		}
		
		//alert (data5.length+'   '+data4.length+'   '+data3.length+'   ');	
		
				for (var i=0; i < data5.length; i++){
					var row = $("<tr />");
					row.append($("<td><h5>" + data5[i].estado.toLocaleString('en-EN') + "</td>"));
					suma=0;
					row.append($("<td><h5 align='right'>" + data5[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
					row.append($("<td><h5 align='right'>" + ((data5[i].cantidad*100)/totalestadocivil).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
					
					for (var l=0; l < data4.length;l++){
					
						var nulo = 0;
						//alert ('l   :'+l);
						//alert (data3.length);
						
						for (var j=0; j < data3.length; j++){
						//alert ('   i :'+i+'  l :'+l+'  j:'+j);
						  if (data5[i].estado ==  data3[j].estado){
							//alert ('estado  '+data5[i].estado+'  '+data3[j].estado);
							
							if (data4[l].genero ==  data3[j].genero){
								//alert ('genero  '+data4[l].genero+ '   '+data3[j].genero)
								nulo = nulo+1;
								row.append($("<td><h5 align='right'>" + data3[j].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
								suma =suma + data3[j].cantidad;
								sumatotales[l]=sumatotales[l]+data3[j].cantidad;
								sumatotales[data4.length]=sumatotales[data4.length]+data3[j].cantidad;
							}
						  }
						}
						if (nulo==0){
							
							row.append($("<td><h5 align='right'>" + "0" + "</td>"));
						}
						
					}
					row.append($("<td><h5 align='right'><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
				$("#psgrafico92").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico92").append(row); 
			
			//row.append($("<th></th>"));
			row.append($("<td><h4><b style='color:darkred'>"+ "TOTAL" +"</b></h4></td>"));
			row.append($("<td><h5  align='right'><b style='color:darkred'>" + totalestadocivil.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));
			row.append($("<td><h5  align='right'><b style='color:darkred'  > 100.00</b></h5></td>"));
			for (var j=0; j < data4.length+1; j++){
				row.append($("<td><h5 align='right' ><b style='color:darkred' >" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h5></td>"));	
			}
		    var row = $("<tr />");
			
			
	   })
		})
	  })
		
	
	})
	
	
	
	
	//DEDICACION CONYUGE 
	
	$("#psgrafico93").empty(); 
	$("#psTitulo93").empty();
	$("#psTitulo93").append("<td><h4><b>" +"Dedicación cónyuge" + "</b></h3></td>" );
	

	


$.get('index.php?r=cafe/GetConyuge&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	$.get('index.php?r=cafe/GetTodoConyuge&criterio='+criterio, function (data4){
	data4=JSON.parse(data4);

	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	
	$("#psgrafico93").empty();
		//row.append($("<th></th>"));
		 var row = $("<tr />");
		$("#psgrafico93").append(row); 
		
		
		row.append($("<td width=50%><h5 align='center'><b>Actividad</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Cantidad</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Por ciento</b></h5></td>"));
		row.append($("<th></th>"));
		//var row = $("<tr />");
		$("#psgrafico93").append(row); 
		
			
		var totalsup=0;
	for (var i=0; i < data3.length; i++){
			
			var row = $("<tr />");
			$("#psgrafico93").append(row); 
			if (data3[i].actividad=="") {data3[i].actividad="Otros o desconocidos"}
			row.append($("<td ><h5 align='left'>" + data3[i].actividad.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5 align='right'>" + data3[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totalsup= totalsup+data3[i].cantidad;
			row.append($("<td ><h5 align='right'>" + ((data3[i].cantidad*100)/data4[0].cantidad).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</td>"));
			$("#psgrafico93").append(row); 
		var row = $("<tr />");
		}
		
		
			
			$("#psgrafico93").append(row); 

			row.append($("<td><h5><b style='color:darkred;'>"+ "TOTAL" +"</b></h5></td>"));
	
			
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));	
			row.append($("<td><h5 align='right'><b style='color:darkred;'>100.00</b></h5></td>"));	
		var row = $("<tr />");
			
			$("#psgrafico93").append(row); 
	
	
	})
})


//CANTIDAD hijos QUE TRABAJAN AN  93a
$("#psgrafico93a").empty(); 
	$("#psTitulo93a").empty();
	$("#psTitulo93a").append("<td><h4><b>" +"Hijos que colaboran en la actividad productiva" + "</b></h3></td>" );
	
$.get('index.php?r=cafe/GetHijo&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	$.get('index.php?r=cafe/GetTodoHijo&criterio='+criterio, function (data4){
	data4=JSON.parse(data4);

	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	
	$("#psgrafico93a").empty();
		//row.append($("<th></th>"));
		 var row = $("<tr />");
		$("#psgrafico93").append(row); 
		
		
		row.append($("<td width=50%><h5 align='center'><b>Frecuencia de hijos que colaboran</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Cantidad de productores</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Por ciento</b></h5></td>"));
		row.append($("<th></th>"));
		//var row = $("<tr />");
		$("#psgrafico93a").append(row); 
		
			
		var totalsup=0;
	for (var i=0; i < data3.length; i++){
			
			var row = $("<tr />");
			$("#psgrafico93a").append(row); 
			//if (data3[i].actividad=="") {data3[i].actividad="Otros o desconocidos"}
			row.append($("<td ><h5 align='left'>" + data3[i].actividad.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5 align='right'>" + data3[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totalsup= totalsup+data3[i].cantidad;
			row.append($("<td ><h5 align='right'>" + ((data3[i].cantidad*100)/data4[0].cantidad).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</td>"));
			$("#psgrafico93a").append(row); 
		var row = $("<tr />");
		}
		
		
			
			$("#psgrafico93a").append(row); 

			row.append($("<td><h5><b style='color:darkred;'>"+ "TOTAL" +"</b></h5></td>"));
	
			
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));	
			row.append($("<td><h5 align='right'><b style='color:darkred;'>100.00</b></h5></td>"));	
		var row = $("<tr />");
			
			$("#psgrafico93a").append(row); 
	
	
	})
})	
	

//CANTIDAD DETRABAJDORES 93b

	$("#psTitulo93b").empty();
	$("#psTitulo93b").append("<td><h4><b>" +"Obreros contratados" + "</b></h3></td>" );

	
$.get('index.php?r=cafe/GetObreros&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	$.get('index.php?r=cafe/GetTodoObreros&criterio='+criterio, function (data4){
	data4=JSON.parse(data4);

	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	
	$("#psgrafico93b").empty();
		//row.append($("<th></th>"));
		 var row = $("<tr />");
		$("#psgrafico93b").append(row); 
		
		
		row.append($("<td width=50%><h5 align='center'><b>Frecuencia de cantidad de obreros contratados</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Cantidad de productores contratan obreros</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Por ciento</b></h5></td>"));
		row.append($("<th></th>"));
		//var row = $("<tr />");
		$("#psgrafico93b").append(row); 
		
			
		var totalsup=0;
	for (var i=0; i < data3.length; i++){
			
			var row = $("<tr />");
			$("#psgrafico93b").append(row); 
			if (!data3[i].actividad) {data3[i].actividad="Ninguno o desconocido"}
			row.append($("<td ><h5 align='left'>" + data3[i].actividad.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5 align='right'>" + data3[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totalsup= totalsup+data3[i].cantidad;
			row.append($("<td ><h5 align='right'>" + ((data3[i].cantidad*100)/data4[0].cantidad).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</td>"));
			$("#psgrafico93b").append(row); 
		var row = $("<tr />");
		}
		
		
			
			$("#psgrafico93b").append(row); 

			row.append($("<td><h5><b style='color:darkred;'>"+ "TOTAL" +"</b></h5></td>"));
	
			
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));	
			row.append($("<td><h5 align='right'><b style='color:darkred;'>100.00</b></h5></td>"));	
		var row = $("<tr />");
			
			$("#psgrafico93b").append(row); 
	
	
	})
})	































	

//CANTIDAD DE MUJERES QUE TRABAJAN 93c
$("#psgrafico93c").empty(); 
	$("#psTitulo93c").empty();
	$("#psTitulo93c").append("<td><h4><b>" +"Mujeres contratadas" + "</b></h3></td>" );


	
$.get('index.php?r=cafe/GetMujeres&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	$.get('index.php?r=cafe/GetTodoMujeres&criterio='+criterio, function (data4){
	data4=JSON.parse(data4);

	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	
	$("#psgrafico93c").empty();
		//row.append($("<th></th>"));
		 var row = $("<tr />");
		$("#psgrafico93c").append(row); 
		
		
		row.append($("<td width=50%><h5 align='center'><b>Frecuencia de mujeres contratadas</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Cantidad productores contratan mujeres</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Por ciento</b></h5></td>"));
		row.append($("<th></th>"));
		//var row = $("<tr />");
		$("#psgrafico93c").append(row); 
		
			
		var totalsup=0;
	for (var i=0; i < data3.length; i++){
			
			var row = $("<tr />");
			$("#psgrafico93c").append(row); 
			if (!data3[i].actividad) {data3[i].actividad="Ninguna o desconocido"}
			row.append($("<td ><h5 align='left'>" + data3[i].actividad.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5 align='right'>" + data3[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totalsup= totalsup+data3[i].cantidad;
			row.append($("<td ><h5 align='right'>" + ((data3[i].cantidad*100)/data4[0].cantidad).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</td>"));
			$("#psgrafico93c").append(row); 
		var row = $("<tr />");
		}
		
		
			
			$("#psgrafico93c").append(row); 

			row.append($("<td><h5><b style='color:darkred;'>"+ "TOTAL" +"</b></h5></td>"));
	
			
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));	
			row.append($("<td><h5 align='right'><b style='color:darkred;'>100.00</b></h5></td>"));	
		var row = $("<tr />");
			
			$("#psgrafico93c").append(row); 
	
	
	})
})


	
}