function cargarGraficoAno(){
	
	//var f = new Date();
	var ffinal ="\'"+$("#fechafin").val()+"\'";
	var finicial ="\'"+$("#fechaini").val()+"\'";
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
			var ffinal ="\'"+(f.getFullYear()+ "-" + (f.getMonth()+1 ) + "-" + f.getDate() )+"\'";
			var ffinal2 =f.getDate() + "-" + (f.getMonth()+1 ) + "-" + f.getFullYear();
			var fi = new Date();
   
			var finicial ="\'"+((fi.getFullYear())+ "-" + 1+ "-" + 1)+"\'";
			var finicial2 =(1+ "-" + 1+ "-" + (fi.getFullYear()));	
		//alert (finicial+'   '+ffinal+'   '+finicial2+'   '+ffinal2+ '  sin fech');
	}
	

	$('#psgrafico80').empty();	
	$("#psgrafico79").append("<agenciaforestal td width=1200px><h2	 align='left' style='color:darkred;'> <b><i >&nbsp;Actividad&nbsp"+nombreactividad+"&nbsp("+tipoactividad+")&nbsp </i></b></h2></td> ");
	$("#psgrafico80").append("</td>   <td ><h4><b> &nbsp Fecha de la consulta :&nbsp; " +dia+ ", (consulta desde el dia  " +finicial2+"&nbsp; a&nbsp;: "+ffinal2+"&nbsp  ) </b></h4></td> " );
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
	
	
	
	if (document.getElementById("checkfecha").checked != true ) {  	 
	
	
	$.get('index.php?r=Meteoro/GetMesAnoMedio', function (data){
	$.get('index.php?r=Meteoro/GetMesAnoActual', function (data1){
	
	//data = JSON.parse(data);
	data = JSON.parse(data);			
	data1 = JSON.parse(data1);
	
$('#psgrafico101').empty();	
$('#psgrafico101').highcharts({

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
	}
	if (document.getElementById("checkfecha").checked != true ) {  	 
	
	$.get('index.php?r=Poa/GetAvance&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data){
	
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
		
	
$('#psgrafico90').empty();
	
$('#psgrafico90').highcharts({

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
		});	
		//cuadro de avances 
		
       	$("#psTituloA2").append("<td><h4><b>" +"Actividad de&nbsp;"+ nombreactividad + "&nbsp; Avance / Meta = % de cumplimiento" + "</b></h4></td>" );
		
		$('#psgraficoA2').empty();
	 var row = $("<tr />");
		$("#psgraficoA2").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=25%><h5><b>T. Plantación</b></h5></td>"));
		
		row.append($("<td width=25%><h5><b>Meta</b></h5></td>"));
		row.append($("<td width=30%><h5><b>Avance</b></h5></td>"));
		row.append($("<td width=30%><h5><b>% Cumplimiento</b></h5></td>"));
			var row = $("<tr />")	
			$("#graficoA2").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data.length; i++){
			
			
			$("#psgraficoA2").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data[i].plantacion.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data[i].tareasprevano.toLocaleString('en-EN', {maximumFractionDigits:2}) + "</td>"));
			row.append($("<td><h5>" + data[i].tareasejecutadas.toLocaleString('en-EN', {maximumFractionDigits:2}) + "</td>"));
			row.append($("<td><h5>" + data[i].porce.toLocaleString('en-EN', {maximumFractionDigits:2}) + "</td>"));
			var row = $("<tr />");
			
			$("#psgraficoA2").append(row); 
		
		}
		
		

		})
	

	}

	
	
	$.get('index.php?r=Poa/GetActividadActividad&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		$("#psTitulo92").append("<td><h4><b>" +" Tipo actividad de &nbsp;"+nombreactividad + "</b></h3></td>" );
	$('#psgrafico92').empty();
	 var row = $("<tr />");
		$("#psgrafico92").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=30%><h5><b>Actividad</b></h5></td>"));
		row.append($("<td width=30%><h5><b>T. Plantación</b></h5></td>"));
		
		row.append($("<td width=20%><h5><b>Plantaciones</b></h5></td>"));
		row.append($("<td width=20%><h5><b>Tareas</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico92").append(row); 
			
		var totalsup=0;
		var sumatotales=[];
		sumatotales[0]=0;
		sumatotales[1]=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#psgrafico92").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			row.append($("<td><h5>" + data3[i].actividad.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			sumatotales[0]=sumatotales[0]+data3[i].plantas;
			sumatotales[1]=sumatotales[1]+data3[i].tareas;
			var row = $("<tr />");
			
			$("#psgrafico92").append(row); 
		
		}
		row.append($("<th></th>"));
			row.append($("<td><h4><b style='color:darkred;'>"+ "TOTAL" +"</b></h4></td>"));
			row.append($("<td><h4><b>"+ "--" +"</b></h4></td>"));
			for (var j=0; j < 2; j++){
			row.append($("<td><h4><b style='color:darkred;'>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#psgrafico93").append(row);
	
	})
	
	
	$("#psTitulo93").append("<td><h4><b>" +"Tipo de Actividad por Subcuenca (Tareas)" + "</b></h3></td>" );
	
	$.get('index.php?r=Poa/GetActividadActividadSubcuencas&tipoactividad='+tipoactividad+'&tipoactividadsec=0&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var sumatotales =[];
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
//primera actividad


	$.get('index.php?r=Poa/GetActividadActividad&tipoactividad='+tipoactividad+'&tipoactividadsec=0&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetSubcuencasActividad&tipoactividad='+tipoactividad+'&tipoactividadsec=0&finicial='+finicial+'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);

	
		//$("#Titulo93sub").append("<td><h5>" +data4[0].actividad+ "</h5></td>" );
	
	 var row = $("<tr />");
		$("#psgrafico93").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=20%<h5><b>Subcuenca</b></h5></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%><h5><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h5></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=20%><h5><b>Total</b></h5></td>"));
			var row = $("<tr />")	
			$("#psgrafico93").append(row); 
			
		var totalsup=0;
		
		// bucle de subcuenca
		for (var l=0; l < data4.length+1;l++){
			sumatotales[l]=0;
			
		}
				for (var i=0; i < data5.length; i++){
					row.append($("<td>" +  "</td>"));
					
					//bucle de tipo de plantacion
				
					row.append($("<td><h5>" + data5[i].subcuenca.toLocaleString('en-EN') + "</td>"));
					suma=0;
					for (var l=0; l < data4.length;l++){
					
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].subcuenca ==  data3[j].subcuenca){
							if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
								suma =suma + data3[j].tareas;
								sumatotales[l]=sumatotales[l]+data3[j].tareas;
								sumatotales[data4.length]=sumatotales[data4.length]+data3[j].tareas;
							}
						}
						}
						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
				$("#psgrafico93").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico93").append(row); 
			
			row.append($("<th></th>"));
			row.append($("<td><h4><b style='color:darkred;'>"+ "TOTAL" +"</b></h4></td>"));
			for (var j=0; j < data4.length+1; j++){
			row.append($("<td><h4><b style='color:darkred;' >" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#psgrafico93").append(row); 
		
	   })
	  })
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
	$("#psTitulo104").append("<td><h4><b>" +"Grupo de especie (salidas vivero)" + "</b></h34></td>" );
	
	$.get('index.php?r=Poa/GetEspecieActividad&tipoactividad='+tipoactividad+'&tipoactividadsec=0&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$.get('index.php?r=Poa/GetActividadActividad2&tipoactividad='+tipoactividad+'&tipoactividadsec=0&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		//$.get('index.php?r=Poa/GetEspecieUtilizadasActividad&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data5){
		$.get('index.php?r=Poa/GetEspecieSalidasViveroActividad&tipoactividad='+tipoactividad+'&tipoactividadsec=0&finicial='+finicial+'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);

	
	//$("#Titulo104sub").append("<td><h5>" +data4[0].actividad+ "</h5></td>" );
		
	
		 var row = $("<tr />");
		$("#psgrafico104").append(row); 
		 
		row.append($("<th></th>"));
		row.append($("<td width=20%<h5><b>Especies</b></h5></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%><h5><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h5></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=20%><h5><b>" + "Total salidas." + "</b></h5></td>"));
		
			
			var row = $("<tr />")	
			$("#psgrafico104").append(row); 
			
		var totalsup=0;
	 
	 var sumatotales=[];
	 
	 //---------------NUEVO
		// bucle de especies
	 
	 for (var l=0; l < data4.length+1;l++){
		 sumatotales[l]=0
	 }
	
		for (var i=0; i < data5.length; i++){
					row.append($("<td>" +  "</td>"));
					
					//bucle de tipo de plantacion
				
					row.append($("<td><h5>" + data5[i].familia.toLocaleString('en-EN') + "</td>"));
					var suma=0;
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].familia ==  data3[j].familia){
							if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
								suma =suma + data3[j].plantas;
								sumatotales[l]=sumatotales[l]+ data3[j].plantas;
								sumatotales[data4.length]=sumatotales[data4.length]+ data3[j].plantas
							}
						}
						}
						
						

						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					
					
				$("#psgrafico104").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico104").append(row); 
		
			
			row.append($("<th></th>"));
			row.append($("<td><h4><b style='color:darkred;'>"+ "TOTAL" +"</b></h4></td>"));
			for (var j=0; j < data4.length+1; j++){
			row.append($("<td><h4><b style='color:darkred;'>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#psgrafico104").append(row); 
	
	})
	})
})
/*

$.get('index.php?r=Poa/GetEspecieActividad&tipoactividad=0&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$.get('index.php?r=Poa/GetActividadActividad&tipoactividad=0&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		//$.get('index.php?r=Poa/GetEspecieUtilizadasActividad&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data5){
		$.get('index.php?r=Poa/GetEspecieSalidasViveroActividad&tipoactividad=0&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);

	
	//$("#Titulo104bis").append("<td><h5>" +data4[0].actividad+ "</h5></td>" );
		
	
		 var row = $("<tr />");
		$("#grafico104bis").append(row); 
		 
		row.append($("<th></th>"));
		row.append($("<td width=20%<h5><b>Especies</b></h5></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%><h5><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h5></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=20%><h5><b>" + "Total salidas." + "</b></h5></td>"));
		
			
			var row = $("<tr />")	
			$("#grafico104bis").append(row); 
			
		var totalsup=0;
	 
	 var sumatotales=[];
	 
	 //---------------NUEVO
		// bucle de especies
	 
	 for (var l=0; l < data4.length+1;l++){
		 sumatotales[l]=0
	 }
	
		for (var i=0; i < data5.length; i++){
					row.append($("<td>" +  "</td>"));
					
					//bucle de tipo de plantacion
				
					row.append($("<td><h5>" + data5[i].familia.toLocaleString('en-EN') + "</td>"));
					var suma=0;
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].familia ==  data3[j].familia){
							if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
								suma =suma + data3[j].plantas;
								sumatotales[l]=sumatotales[l]+ data3[j].plantas;
								sumatotales[data4.length]=sumatotales[data4.length]+ data3[j].plantas
							}
						}
						}
						
						

						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					
					
				$("#grafico104bis").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#grafico104bis").append(row); 
		
			
			row.append($("<th></th>"));
			row.append($("<td><h4><b>"+ "TOTAL" +"</b></h4></td>"));
			for (var j=0; j < data4.length+1; j++){
			row.append($("<td><h4><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#grafico104bis").append(row); 
	
	})
	})
})

*/

	
	$.get('index.php?r=Poa/GetMunicipioActividad&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		$("#psTitulo102").append("<td><h4><b>" +" Superficies resforestada por Municipios" + "</b></h3></td>" );
	
	    var row = $("<tr />");
		$("#psgrafico102").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h5><b>Municipio</b></h5></td>"));
		
		row.append($("<td width=40%><h5><b>Tareas</b></h5></td>"));
			var row = $("<tr />")	
			$("#psgrafico102").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#psgrafico102").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			
			$("#psgrafico102").append(row); 
		
		}
		
	
	})
	$("#psTitulo94").empty();
	$("#psgrafico94").empty();
	$("#psTitulo94").append("<td><h4><b>" +"Especies plantadas en la actividad de  &nbsp;"+nombreactividad + "</b></h3></td>" );
	
	$.get('index.php?r=Poa/GetEspecieActividadPlantadas&tipoactividad='+tipoactividad+'&tipoactividadsec=0&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$.get('index.php?r=Poa/GetActividadActividad2&tipoactividad='+tipoactividad+'&tipoactividadsec=0&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetEspecieUtilizadasActividad&tipoactividad='+tipoactividad+'&tipoactividadsec=0&finicial='+finicial+'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);

	
	//$("#Titulo94sub").append("<td><h5>" +data4[0].actividad+ "</h5></td>" );
	
		
		 var row = $("<tr />");
		$("#psgrafico94").append(row); 
		 
		row.append($("<th></th>"));
		row.append($("<td width=20%<h5><b>Especies</b></h5></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%><h5><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h5></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=20%><h5><b>" + "Total plantas" + "</b></h5></td>"));
			
		
			var row = $("<tr />")	
			$("#psgrafico94").append(row); 
			
		var totalsup=0;
	
	
		
		
		//---------------NUEVO
		// bucle de subcuenca
		var sumatotales=[];
		for (var l=0; l < (2+2*data4.length);l++){
			sumatotales[l]=0;
		}
			//especie
				for (var i=0; i < data5.length; i++){
					row.append($("<td>" +  "</td>"));
					
					//bucle de tipo de plantacion
				
					row.append($("<td><h5>" + data5[i].familia.toLocaleString('en-EN') + "</td>"));
					var suma=0;
					//tipo
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						//sumatorios
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].familia ==  data3[j].familia){
							if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
								suma =suma + data3[j].plantas;
								sumatotales[l]=sumatotales[l]+data3[j].plantas;
								sumatotales[data4.length]=sumatotales[data4.length]+data3[j].plantas;
							}
						}
						}
						
						

						if (nulo==0){
							row.append($("<td><h5>" + "0" + "</td>"));
						}
						
					}
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					
					var suma=0;
					
					
				$("#psgrafico94").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico94").append(row); 
		
		var row = $("<tr />");
			
			$("#psgrafico94").append(row); 
			
			row.append($("<th></th>"));
			row.append($("<td><h4><b style='color:darkred;'>"+ "TOTAL" +"</b></h4></td>"));
			
			//modificado el 03 de sep donde pone 1+ 1*data4.length hntes ponia 2+2*dat4.length
			for (var j=0; j < (1+1*data4.length); j++){
			row.append($("<td><h4><b style='color:darkred;'>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#psgrafico94").append(row); 
		
		
		var row = $("<tr />");
		$("#psgrafico94B").append(row); 
		
		 
		 
		row.append($("<th></th>"));
		row.append($("<td width=20%<h5><b>Especies</b></h5></td>"));
		
		
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%><h5><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h5></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=20%><h5><b>" + "Total tareas" + "</b></h5></td>"));	
			var row = $("<tr />")	
			$("#psgrafico94B").append(row); 
			
		var totalsup=0;
	
	
		
		
		//---------------NUEVO
		// bucle de subcuenca
		var sumatotales=[];
		for (var l=0; l < (2+2*data4.length);l++){
			sumatotales[l]=0;
		}
		
				for (var i=0; i < data5.length; i++){
					row.append($("<td>" +  "</td>"));
					
					//bucle de tipo de plantacion
				
					row.append($("<td><h5>" + data5[i].familia.toLocaleString('en-EN') + "</td>"));
					var suma=0;
					
					
					
					//quitado el dia 03  de sep
					
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].familia ==  data3[j].familia){
							if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></td>"));
								suma =suma + data3[j].tareas;
								sumatotales[l+1+data4.length]=sumatotales[l+1+data4.length]+data3[j].tareas;
								sumatotales[2*data4.length+1]=sumatotales[2*data4.length+1]+data3[j].tareas;
							}
						}
						}
						
						

						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					
				$("#psgrafico94B").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico94B").append(row); 
		
		var row = $("<tr />");
			
			$("#psgrafico94B").append(row); 
			
			row.append($("<th></th>"));
			row.append($("<td><h4><b style='color:darkred;'>"+ "TOTAL" +"</b></h4></td>"));
			
			//modificado el 03 de sep donde pone 1+ 1*data4.length hntes ponia 2+2*dat4.length
			for (var j=1+data4.length; j < (2+2*data4.length); j++){
			row.append($("<td><h4><b style='color:darkred;'>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#psgrafico94B").append(row); 
		
	
	})
	})
	})
	
	
	
	//POR DESTINO
	$("#psTitulo95").append("<td witdht=100%><h4><b>" +"Superficie de reforestación por destino" + "</center></b></h4></td>" );
	//////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////
	
	$.get('index.php?r=Poa/GetEspecieActividadDestino&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$.get('index.php?r=Poa/GetDestinoTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetEspecieUtilizadasTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);
		 var row = $("<tr />");
		
		$("#psgrafico95").append(row); 
		
		 
		
		row.append($("<td width=25%><h4><b>Especies</b></h4></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=15%><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=15%><h4><b>" + "Total plantas" + "</b></h4></td>"));
			
		
			var row = $("<tr />")	
			$("#psgrafico95").append(row); 
			
		var totalsup=0;
	
	
		
		
		
		// bucle de subcuenca
		var sumatotales=[];
		for (var l=0; l < (2+2*data4.length);l++){
			sumatotales[l]=0;
		}
		
				for (var i=0; i < data5.length; i++){
					//row.append($("<td>" +  "</td>"));
					
					//bucle de tipo de plantacion
				
					row.append($("<td><h5>" + data5[i].familia.toLocaleString('en-EN') + "</td>"));
					var suma=0;
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].familia ==  data3[j].familia){
							if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
								suma =suma + data3[j].plantas;
								sumatotales[l]=sumatotales[l]+data3[j].plantas;
								sumatotales[data4.length]=sumatotales[data4.length]+data3[j].plantas;
							}
						}
						}
						
						

						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					
					
					
				$("#psgrafico95").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico95").append(row); 
		
		var row = $("<tr />");
			
			$("#psgrafico95").append(row); 

			row.append($("<td><h4><b style='color:darkred;'>"+ "TOTAL" +"</b></h4></td>"));
	
			for (var j=0; j < (1+1*data4.length); j++){
			row.append($("<td><h4><b style='color:darkred;'>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#psgrafico95").append(row); 
		
	})
	})
	})
	
	
	//por proyecto
	
	$.get('index.php?r=Poa/GetProyectoActividad&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
		$("#psTitulo103").append("<td><h4><b>" +"Superficie de reforestación por fondo" + "</b></h3></td>" );
	
	 var row = $("<tr />");
		$("#psgrafico103").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h5><b>Proyecto</b></h5></td>"));
		
		row.append($("<td width=40%><h5><b>Tareas</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico103").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#psgrafico103").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			
			$("#psgrafico103").append(row); 
		
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