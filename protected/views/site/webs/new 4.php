$('#psgrafico90').empty();
	$('#psgrafico91').empty();
	$("#psTituloA2").empty();
	$("#psgraficoA2").empty();
/*	
	if (document.getElementById("checkfecha").checked != true ) {  
	$.get('index.php?r=Poa/GetAvanceReforestacion&finicial='+finicial+'&ffinal='+ffinal, function (data){
	
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
		$("#psTituloA2").empty();
       	$("#psTituloA2").append("<td><h4><b>" +"Actividad de reforestación:  Avance / Meta = % de cumplimiento" + "</b></h4></td>" );
		
		$('#psgraficoA2').empty();
	 var row = $("<tr />");
		$("#psgraficoA2").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=25%><h4><b>Tipo de actividad.</b></h4></td>"));
		
		row.append($("<td width=25%><h4><b>Meta</b></h4></td>"));
		row.append($("<td width=30%><h4><b>Avance</b></h4></td>"));
		row.append($("<td width=30%><h4><b>% Cumplimiento</b></h4></td>"));
			var row = $("<tr />")	
			$("#psgraficoA2").append(row); 
			
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
*/
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$.get('index.php?r=Poa/GetActividadTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);
	$.get('index.php?r=Poa/GetActividadPoa&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca=0', function (data5){
				//+'&subcuenca='+cuenca+'&microcuenca='+microcuenca
			data5 = JSON.parse(data5);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#psTituloA2").empty();
	$("#psTituloA2").append("<td><h4><b>" +" Tipo de actividad de reforestación</b></h4><h5>*(Realizadas entre fechas, Planificadas años completos)</h5></td>" );
	$('#psgraficoA2').empty();
	 var row = $("<tr />");
		$("#psgraficoA2").append(row); 
		row.append($("<th></th>"));
		//row.append($("<td width=30%><h5><b>Actividad</b></h5></td>"));
		row.append($("<td width=40%><h4><b>Actividad</b></h4></td>"))	
		row.append($("<td width=30%><h4><b>Realizadas</b></h4></td>"));
		row.append($("<td width=30%><h4><b>Planificadas</b></h4></td>"));
		var row = $("<tr />");	
		$("#psgraficoA2").append(row); 
			
		var totalsup=0;
		var sumatotales=[];
		sumatotales[0]=0;
		sumatotales[1]=0;
			
			/*
				for (var i=0; i < data3.length; i++){
					//alert (data3[i].tipo);
					if (data3[i].tipo != 'Otros1'){
					$("#psgraficoA2").append(row); 
					//alert (actividad01.toLocaleString('de-DE'));
					
					row.append($("<td>" +  "</td>"));
					//row.append($("<td><h5>" + data3[i].actividad.toLocaleString('en-EN') + "</td>"));
					row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
				
					row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
					sumatotales[1]=sumatotales[1]+data3[i].tareas;
					for (var j=0; j < data5.length; j++){
						if  (data3[i].tipo == data5[j].tipo){
							//alert (data3[i].tipo + data5[j].tipo);
							row.append($("<td><h5>" + data5[j].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							sumatotales[0]=sumatotales[0]+data5[j].tareas;
						}
					}
					var row = $("<tr />");
					
					$("#psgraficoA2").append(row); 
					}
				}
			*/
			//version para que controle la situacion el POA y no las plantadas
			for (var j=0; j < data5.length; j++){
				contador=0
				$("#psgraficoA2").append(row); 
					//alert (actividad01.toLocaleString('de-DE'));
					row.append($("<td>" +  "</td>"));
							//row.append($("<td><h5>" + data3[i].actividad.toLocaleString('en-EN') + "</td>"));
							row.append($("<td><h5>" + data5[j].tipo.toLocaleString('en-EN') + "</td>"));
					
				for (var i=0; i < data3.length; i++){
					//alert (data3[i].tipo);
					if (data3[i].tipo != 'Otros1'){
					contador=contador+1;
					//for (var j=0; j < data5.length; j++){
						if  (data3[i].tipo == data5[j].tipo){
							
						
							row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
							sumatotales[1]=sumatotales[1]+data3[i].tareas;
							//alert (data3[i].tipo + data5[j].tipo);
							
						}
					//}
					
					}
				}
				if (contador == 0 ) {
					cero=0;
					row.append($("<td><h5>" + cero.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
					sumatotales[1]=sumatotales[1]+cero;
				}
				row.append($("<td><h5>" + data5[j].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
				sumatotales[0]=sumatotales[0]+data5[j].tareas;
				
				var row = $("<tr />");
					
				$("#psgraficoA2").append(row); 
			}
			
		
			})
		row.append($("<th></th>"));
	})



