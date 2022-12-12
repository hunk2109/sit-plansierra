function cargarGraficoAno(genero){
	
	//alert('estoy en la linea 2 y el genero es '+genero );
	
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
		
		criterio = criterio +' and ss_predio_sistema_macadamia.fecha_establecida >=' +finicial+' and ss_predio_sistema_macadamia.fecha_establecida<= ' +ffinal+ ' ';
	}
	else {
		var finicial ="\'2000-01-01\'";
		var ffinal ="\'"+$("#fechafin").val()+"\'";
	var criterio='';
	anofin=ffinal.substr(1,4);
	anoini=finicial.substr(1,4);
	criterio = criterio +' and ss_predio_sistema_macadamia.fecha_establecida >=' +finicial+' and ss_predio_sistema_macadamia.fecha_establecida<= ' +ffinal+ ' ';
		
	}
	//alert ('criterio 1 =  ' +criterio);
	
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
			finicial ="2000-01-01";
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
	
	
	
	
	//if (document.getElementById("checkfecha").checked != true ) {  	 
	
	$.get('index.php?r=maca/GetAvances&criterio='+criterio, function (data3){
			data3 = JSON.parse(data3);	
			$.get('index.php?r=maca/GetPoa&cuenca='+cuencapoa+'&ano1='+anopoa1+'&ano2='+anopoa2, function (data4){
			data4 = JSON.parse(data4);
	

	categorias=[];
	serie1=[];
	serie2=[];
	serie3=[];
	
	//productores
	
		categorias.push('Productores');
		serie1.push(data4[0].productores);
		serie2.push(data3[0].productores);
		serie3.push((data4[0].productores*100)/(data3[0].productores));
		categorias.push('Tareas totales');
		serie1.push(data4[0].tareas);
		serie2.push(data3[0].tareas);
		serie3.push((data4[0].tareas*100)/(data3[0].tareas));
		categorias.push('Riegos');
		serie1.push(data4[0].riego);
		serie2.push(data3[0].riego);
		serie3.push((data4[0].riego*100)/(data3[0].riego));
		categorias.push('Superficie riego');
		serie1.push(data4[0].tareasriego);
		serie2.push(data3[0].tareasriego);
		serie3.push((data4[0].tareasriego*100)/(data3[0].tareasriego));
		categorias.push('Capacitación');
		serie1.push(data4[0].capacitacion);
		serie2.push(data3[0].capacitacion);
		serie3.push((data4[0].capacitacion*100)/(data3[0].capacitacion));
		categorias.push('Cafe');
		serie1.push(data4[0].cafe);
		serie2.push(data3[0].cafe);
		serie3.push((data4[0].cafe*100)/(data3[0].cafe));
		categorias.push('Frutales');
		serie1.push(data4[0].frutales);
		serie2.push(data3[0].frutales);
		serie3.push((data4[0].frutales*100)/(data3[0].frutales));
		categorias.push('Macadamia');
		serie1.push(data4[0].macadamia);
		serie2.push(data3[0].macadamia);
		serie3.push((data4[0].macadamia*100)/(data3[0].macadamia));
		
		
	
$('#psgrafico90').empty();
if (genero==0){	
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
}	
		
	$('#psgrafico91').empty();
if (genero==0){		
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
		
}  	

		})
	})
	
	

	//}
	if (genero==0){	
	$("#psTituloA2").append("<td><h4><b>" +"Actividad de&nbsp;"+ nombreactividad + "&nbsp; Avance/Meta = % de cumplimiento" + "</b></h4></td>" );
		
		$('#psgraficoA2').empty();
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
		
	
		
		$.get('index.php?r=maca/GetAvances&criterio='+criterio, function (data3){
			data3 = JSON.parse(data3);
			/////////////////////////
		
			act='cantidad_produ';
			$.get('index.php?r=maca/GetPoa3&cuenca='+cuencapoa+'&ano1='+anopoa1+'&ano2='+anopoa2+'&actividad=\''+act+'\'', function (data4){
			data4 = JSON.parse(data4);	
			//////////////////////////
			var row = $("<tr>");
			$("#psgraficoA2").append(row); 
			row.append($("<td ><h6  align='left ' ><b>Productores con siembra de macadamia</b></h6></td>"));		
			row.append($("<td><h5 align='right'>" + parseFloat(data4[0].suma).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:0,minimunFractionDigits:0}) + "</td>"));
			row.append($("<td><h5 align='right'>" + parseFloat(data3[0].productores).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:0,minimunFractionDigits:0}) + "</td>"));
			row.append($("<td><h5 align='right'>" +parseFloat( ((data3[0].productores*100)/(data4[0].suma))).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
			var row = $("</tr>");
			$("#psgraficoA2").append(row); 
			
				/////////////////////////
				act='superficemac';
				$.get('index.php?r=maca/GetPoa3&cuenca='+cuencapoa+'&ano1='+anopoa1+'&ano2='+anopoa2+'&actividad=\''+act+'\'', function (data4){
				data4 = JSON.parse(data4);	
				//////////////////////////
				var row = $("<tr>");
				$("#psgraficoA2").append(row); 
				row.append($("<td ><h6  align='left ' ><b>Superficie plantada de macadamia(tareas)</b></h5></td>"));
				row.append($("<td><h5 align='right'>" + parseFloat((data4[0].suma)).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
				row.append($("<td><h5 align='right'>" + parseFloat(data3[0].tareas).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
				row.append($("<td><h5 align='right'>" + parseFloat(((data3[0].tareas*100)/(data4[0].suma))).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:2,minimunFractionDigits:2}) + "</td>"));
				
				var row = $("</tr>");	
				$("#psgraficoA2").append(row); 
				
			
					
			
			 
			/**/
			})
			})
		
		})
	}
	
//resumen	
	if (genero==0){	
	$("#psTituloA3").append("<td><h4><b>Resumen </b></h4></td>" );
		
		$('#psgraficoA3').empty();
		var row = $("<tr>");
		$("#psgraficoA3").append(row); 
		//row.append($("<th>"));
		row.append($("<td width=60%><h5 align='center'><b>Concepto</b></h5></td>"));
		row.append($("<td width=40%><h5 align='center'><b>Valor</b></h5></td>"));
		
		row.append($("<th></th>"));
		var row = $("</tr>")
			$("#psgraficoA3").append(row);	
			
		var totalsup=0;
		
	
		
		$.get('index.php?r=maca/GetResumen&criterio='+criterio, function (data3){
			data3 = JSON.parse(data3);
			/////////////////////////
		
			
			
			for (var l=0; l < data3.length+1;l++){
					var row = $("<tr>");
					$("#psgraficoA3").append(row); 
							
					row.append($("<td><h5 align='right'>" + data3[l].descripcion + "</td>"));
					row.append($("<td><h5 align='right'>" + (data3[l].cantidad).toFixed(2).toLocaleString('en-EN', {maximumFractionDigits:0,minimunFractionDigits:0}) + "</td>"));
					var row = $("</tr>");
					$("#psgraficoA3").append(row); 
					
					
						
			}
		
		})
		
	}
	
	
	
	
	
//CLASIFICACION POR GENERO Y ESTADO CIVIL
	//datos de  la matriz
		$('#psgrafico92').empty();
		$("#psgrafico92").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	
	$.get('index.php?r=maca/GetEstadoCivilGenero&criterio='+criterio, function (data3){
		data3 = JSON.parse(data3);	
		
		var totalSup = 0;
		var totalNum = 0;
		var row = $("<tr />");
		var i = 0;
		var c = 0, s =0;
	
		$("#psTitulo92").append("<td><h4><b>" +" Género </b></h3></td>" );
		$("#psgrafico92").empty();
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
		$.get('index.php?r=maca/GetTodoGenero&criterio='+criterio, function (data4){
		data4 = JSON.parse(data4);
	
			//datos de la columna
			//carrga datos de genero
		$.get('index.php?r=maca/GetEstadoCivil2&criterio='+criterio, function (data5){
			data5 = JSON.parse(data5);
		$.get('index.php?r=maca/GetSumaEstadoCivil&criterio='+criterio, function (data6){
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
	

	
//primera actividad

$.get('index.php?r=maca/GetConyuge&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	$.get('index.php?r=maca/GetTodoConyuge&criterio='+criterio, function (data4){
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
	$("#psTitulo93a").append("<td><h4><b>" +"Dedicación hijos" + "</b></h3></td>" );

$("#psgrafico93a").empty();
		//row.append($("<th></th>"));
		 var row = $("<tr />");
		$("#psgrafico93").append(row); 
		
		
		row.append($("<td width=50%><h5 align='center'><b>Nº de hijos</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Cantidad</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Por ciento</b></h5></td>"));
		row.append($("<th></th>"));
		//var row = $("<tr />");
		$("#psgrafico93a").append(row); 
	
$.get('index.php?r=maca/GetHijo&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	$.get('index.php?r=maca/GetTodoHijo&criterio='+criterio, function (data4){
	data4=JSON.parse(data4);

	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	
	
		
			
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
$("#psgrafico93b").empty();
		//row.append($("<th></th>"));
		 var row = $("<tr />");
		$("#psgrafico93b").append(row); 
		
		
		row.append($("<td width=50%><h5 align='center'><b>Nº de obreros</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Cantidad</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Por ciento</b></h5></td>"));
		row.append($("<th></th>"));
		//var row = $("<tr />");
		$("#psgrafico93b").append(row); 
	
$.get('index.php?r=maca/GetObreros&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	$.get('index.php?r=maca/GetTodoObreros&criterio='+criterio, function (data4){
	data4=JSON.parse(data4);

	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	
	
		
			
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
	$("#psTitulo93c").append("<td><h4><b>" +"Nº de mujeres" + "</b></h3></td>" );
$("#psgrafico93c").empty();
		//row.append($("<th></th>"));
		 var row = $("<tr />");
		$("#psgrafico93c").append(row); 
		
		
		row.append($("<td width=50%><h5 align='center'><b>Nº de mujeres</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Cantidad</b></h5></td>"));
		row.append($("<td width=25%><h5 align='center'><b>Por ciento</b></h5></td>"));
		row.append($("<th></th>"));
		//var row = $("<tr />");
		$("#psgrafico93c").append(row); 

	
$.get('index.php?r=maca/GetMujeres&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	$.get('index.php?r=maca/GetTodoMujeres&criterio='+criterio, function (data4){
	data4=JSON.parse(data4);

	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	
	
		
			
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
$("#psTitulo102").empty();
$("#psgrafico102").empty();
	if (genero==0){	
	$("#psTitulo102").append("<td><h4><b>" +" Sistemas de produccion por Municipio" + "</b></h3></td>" );
	
	$.get('index.php?r=maca/GetSistemasMunicipio&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	



	////////////////////
	    var row = $("<tr />");
		$("#psgrafico102").append(row); 
		row.append($("<td width=60%><h5 align='center'><b>Municipio</b></h5></td>"));
		row.append($("<td width=40%><h5 align='center'><b>Tareas</b></h5></td>"));
		row.append($("<th></th>"));
		//var row = $("<tr />");
		$("#psgrafico102").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			var row = $("<tr>");
			$("#psgrafico102").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			//row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5 >" + data3[i].municipio.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5 align='right' >" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("</tr>");
			
			$("#psgrafico102").append(row); 
			
		}
		
	
	})
	}
	
	//Evaluacion de sistemas......
	$("#psTitulo94").empty();
	$("#psgrafico94").empty();
	if (genero==0){	
		$("#psTitulo94").append("<td><h4><b>" +"Evaluación de Sistemas Agroforestales basado en Macadamia" + "</b></h3></td>" );
		$("#psgrafico94").empty();
			//row.append($("<th></th>"));
			 var row = $("<tr />");
			$("#psgrafico94").append(row); 
			
			
			row.append($("<td width=35%><h5 align='center'><b>Variedad</b></h5></td>"));
			row.append($("<td width=33%><h5 align='center'><b>Plantas utilizadas</b></h5></td>"));
			row.append($("<td width=33%><h5 align='center'><b>Por ciento</b></h5></td>"));
			row.append($("<th></th>"));
			//var row = $("<tr />");
			$("#psgrafico94").append(row); 
		

		$.get('index.php?r=maca/GetSumaCalificacion&criterio='+criterio, function (data4){
			data4 = JSON.parse(data4)
				j=1;
				$.get('index.php?r=maca/GetCalificacion&criterio='+criterio+'&variedad='+j, function (data3){
					data3 = JSON.parse(data3);	
					var totalSup = 0;
					var totalNum = 0;
					var row = $("<tr />");
					var i = 0;
					var c = 0, s =0;
					for (var i=0; i <data3.length; i++){
							var row = $("<tr />");
							var a = j+1;
							$("#psgrafico94").append(row); 
							row.append($("<td ><h5 align='left'> 1.-" +data3[i].estado.toLocaleString('en-EN') + "</td>"));
							row.append($("<td><h5 align='right'>" + data3[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							 totalsup= totalsup+data3[i].cantidad;
							row.append($("<td ><h5 align='right'>" + ((data3[i].cantidad*100)/data4[0].cantidad).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</td>"));
							$("#psgrafico94").append(row);
					}
					j=2;
				$.get('index.php?r=maca/GetCalificacion&criterio='+criterio+'&variedad='+j, function (data3){
					data3 = JSON.parse(data3);	
					var totalSup = 0;
					var totalNum = 0;
					var row = $("<tr />");
					var i = 0;
					var c = 0, s =0;
					for (var i=0; i <data3.length; i++){
							var row = $("<tr />");
							var a = j+1;
							$("#psgrafico94").append(row); 
							row.append($("<td ><h5 align='left'>2.-" +data3[i].estado.toLocaleString('en-EN') + "</td>"));
							row.append($("<td><h5 align='right'>" + data3[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							 totalsup= totalsup+data3[i].cantidad;
							row.append($("<td ><h5 align='right'>" + ((data3[i].cantidad*100)/data4[0].cantidad).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</td>"));
							$("#psgrafico94").append(row);
					}
					
					j=3;
				$.get('index.php?r=maca/GetCalificacion&criterio='+criterio+'&variedad='+j, function (data3){
					data3 = JSON.parse(data3);	
					var totalSup = 0;
					var totalNum = 0;
					var row = $("<tr />");
					var i = 0;
					var c = 0, s =0;
					for (var i=0; i <data3.length; i++){
							var row = $("<tr />");
							var a = j+1;
							$("#psgrafico94").append(row); 
							row.append($("<td ><h5 align='left'>3.-"+data3[i].estado.toLocaleString('en-EN') + "</td>"));
							row.append($("<td><h5 align='right'>" + data3[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							 totalsup= totalsup+data3[i].cantidad;
							row.append($("<td ><h5 align='right'>" + ((data3[i].cantidad*100)/data4[0].cantidad).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</td>"));
							$("#psgrafico94").append(row);
					}
						
					j=4;
				$.get('index.php?r=maca/GetCalificacion&criterio='+criterio+'&variedad='+j, function (data3){
					data3 = JSON.parse(data3);	
					var totalSup = 0;
					var totalNum = 0;
					var row = $("<tr />");
					var i = 0;
					var c = 0, s =0;
					for (var i=0; i <data3.length; i++){
							var row = $("<tr />");
							var a = j+1;
							$("#psgrafico94").append(row); 
							row.append($("<td ><h5 align='left'>4.-"+data3[i].estado.toLocaleString('en-EN') + "</td>"));
							row.append($("<td><h5 align='right'>" + data3[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							 totalsup= totalsup+data3[i].cantidad;
							row.append($("<td ><h5 align='right'>" + ((data3[i].cantidad*100)/data4[0].cantidad).toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</td>"));
							$("#psgrafico94").append(row);
					}
						
						var row = $("<tr />");
						$("#psgrafico94").append(row); 
						row.append($("<td><h5><b style='color:darkred;'>"+ "TOTAL" +"</b></h5></td>"));
						row.append($("<td><h5 align='right'><b style='color:darkred;'>" + data4[0].cantidad.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));	
						row.append($("<td><h5 align='right'><b style='color:darkred;'>100.00</b></h5></td>"));	
						var row = $("<tr />");
						$("#psgrafico94").append(row); 
				
					
					
			})})})})
			
			
				
			
		
		})
	}
	
	//Produccion
	
	$("#psTitulo94C").empty();
	$("#psgrafico94C").empty();
	if (genero==0){	
	$("#psTitulo94C").append("<td><h4><b>" +"Producción" + "</b></h3></td>" );
	
	$("#psgrafico94C").empty();
			//row.append($("<th></th>"));
			 var row = $("<tr />");
			$("#psgrafico94C").append(row); 
			
			
			row.append($("<td width=35%><h5 align='center'><b>Produccion/ingresos</b></h5></td>"));
			row.append($("<td width=33%><h5 align='center'><b>Producción inicial</b></h5></td>"));
			row.append($("<td width=33%><h5 align='center'><b>Producción actual</b></h5></td>"));
			row.append($("<th></th>"));
			//var row = $("<tr />");
			$("#psgrafico94C").append(row); 
			$.get('index.php?r=maca/GetProduccion&criterio='+criterio, function (data4){
			data4 = JSON.parse(data4)
							var row = $("<tr />");
							
							$("#psgrafico94C").append(row); 
							row.append($("<td ><h5 align='left'>Libras comercializadas</td>"));
							row.append($("<td><h5 align='right'>" + data4[0].lbstm.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							 
							row.append($("<td ><h5 align='right'></td>"));
							
							$("#psgrafico94C").append(row);
							
							var row = $("<tr />");
							$("#psgrafico94C").append(row); 
							row.append($("<td ><h5 align='left'>Producción cultivos asociados</td>"));
							row.append($("<td><h5 align='right'>" + data4[0].ing_cul.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							
							row.append($("<td ><h5 align='right'></td>"));
							
							$("#psgrafico94C").append(row);
							
							
							var row = $("<tr />");
							$("#psgrafico94C").append(row); 
							row.append($("<td ><h5 align='left'>Ingresos (DOP)</td>"));
							row.append($("<td><h5 align='right'>" + data4[0].ing_dop.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							
							row.append($("<td ><h5 align='right'></td>"));
							var row = $("<tr />");
							$("#psgrafico94C").append(row);
							
							
							
							
							
	
			})
	}
	
	//Condicion de la plantacion
	
	$("#psTitulo94D").empty();
	$("#psgrafico94D").empty();
	if (genero==0){	
	$("#psTitulo94D").append("<td><h4><b>" +"Condición de la plantación" + "</b></h3></td>" );
	
	$("#psgrafico94D").empty();
			//row.append($("<th></th>"));
			 var row = $("<tr />");
			$("#psgrafico94D").append(row); 
			
			
			row.append($("<td width=50%><h5 align='center'><b>Condición de la plantación</b></h5></td>"));
			row.append($("<td width=50%><h5 align='center'><b>Cantidad</b></h5></td>"));
			
			row.append($("<th></th>"));
			//var row = $("<tr />");
			$("#psgrafico94D").append(row);
			
			
			$.get('index.php?r=maca/GetCondicion&criterio='+criterio, function (data4){
			data4 = JSON.parse(data4)
					for (var i=0; i < data4.length; i++){		
							var row = $("<tr />");
							
							$("#psgrafico94D").append(row); 
							row.append($("<td ><h5 align='left'>" + data4[i].estado.toLocaleString('en-EN', {maximumFractionDigits:1}) +"</td>"));
							row.append($("<td><h5 align='right'>" + data4[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							 
							row.append($("<td ><h5 align='right'></td>"));
							
							$("#psgrafico94D").append(row);
					}
	
			})
	
	}
	
	//Riesgo de la plantacion
	
	$("#psTitulo103B").empty();
	$("#psgrafico103B").empty();
	if (genero==0){	
	$("#psTitulo103B").append("<td><h4><b>" +"Tipo de riesgo ante el cambio climático" + "</b></h3></td>" );
	
	$("#psgrafico103B").empty();
			//row.append($("<th></th>"));
			 var row = $("<tr />");
			$("#psgrafico103B").append(row); 
			
			
			row.append($("<td width=33%><h5 align='center'><b>Tipo de riesgo</b></h5></td>"));
			row.append($("<td width=33%><h5 align='center'><b>Cantidad</b></h5></td>"));
			row.append($("<td width=34%><h5 align='center'><b>Medidas previstas</b></h5></td>"));
			row.append($("<th></th>"));
			//var row = $("<tr />");
			$("#psgrafico103B").append(row);
			
			
			$.get('index.php?r=maca/GetRiesgo&criterio='+criterio, function (data4){
			data4 = JSON.parse(data4)
					for (var i=0; i < data4.length; i++){		
							var row = $("<tr />");
							
							$("#psgrafico103B").append(row); 
							row.append($("<td ><h5 align='left'>" + data4[i].estado.toLocaleString('en-EN', {maximumFractionDigits:1}) +"</td>"));
							row.append($("<td><h5 align='right'>" + data4[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							row.append($("<td><h5 align='right'>" + data4[i].medidas + "</td>"));
							 
							;
							
							$("#psgrafico103B").append(row);
					}
	
			})
	
	}
	//Capacitacion
	
	$("#psTitulo103C").empty();
	$("#psgrafico103C").empty();
	if (genero==0){	
	$("#psTitulo103C").append("<td><h4><b>" +"Capacitación" + "</b></h3></td>" );
	
	$("#psgrafico103C").empty();
			//row.append($("<th></th>"));
			 var row = $("<tr />");
			$("#psgrafico103C").append(row); 
			
			
			row.append($("<td width=25%><h5 align='center'><b>Actividad</b></h5></td>"));
			row.append($("<td width=25%><h5 align='center'><b>Realizadas</b></h5></td>"));
			row.append($("<td width=25%><h5 align='center'><b>Participantes</b></h5></td>"));
			row.append($("<td width=25%><h5 align='center'><b>Tareas Part.</b></h5></td>"));
			row.append($("<th></th>"));
			//var row = $("<tr />");
			$("#psgrafico103C").append(row);
			
			
			$.get('index.php?r=maca/GetCapacitacion&criterio='+criterio, function (data4){
			data4 = JSON.parse(data4)
					for (var i=0; i < data4.length; i++){		
							var row = $("<tr />");
							
							$("#psgrafico103C").append(row); 
							row.append($("<td ><h5 align='left'>" + data4[i].estado +"</td>"));
							row.append($("<td ><h5 align='left'></td>"));
							row.append($("<td><h5 align='right'>" + data4[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
							row.append($("<td><h5 align='right'>" + data4[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1})  + "</td>"));
							 
							;
							
							$("#psgrafico103C").append(row);
					}
	
			})
	
	}
	
	
	//DISTRIBUCIÓN DE SISTEMAS POR SUBCUENCA.
	
	$("#psTitulo94bis").empty();
	$("#psgrafico94bis").empty();
	if (genero==0){	
	$("#psTitulo94bis").append("<td><h4><b>" +"Distribución de sistemas por subcuenca" + "</b></h3></td>" );
	
	$.get('index.php?r=maca/GetSistemasSubcuenca&criterio='+criterio, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	$("#psgrafico94bis").empty();
		//row.append($("<th></th>"));
		 var row = $("<tr>");
		$("#psgrafico94").append(row); 
		
		
		row.append($("<td width=50%><h5 align='center'><b>Subcuenca</b></h5></td>"));
		//row.append($("<td width=33%><h5 align='center'><b>Cantidad de participantes</b></h5></td>"));
		row.append($("<td width=50%><h5 align='center'><b>Tareas total</b></h5></td>"));
		
		row.append($("<th></th>"));
		//var row = $("<tr />");
		$("#psgrafico94bis").append(row); 
		
			
		var totalcantidad=0;
		var totaltareas=0;
		var totalriego=0;
	for (var i=0; i < data3.length; i++){
			
			var row = $("<tr>");
			$("#psgrafico94bis").append(row); 
			row.append($("<td ><h5 align='left'>" + data3[i].cuenca.toLocaleString('en-EN') + "</td>"));
			//row.append($("<td><h5 align='right'>" + data3[i].cantidad.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			// totalcantidad= totalcantidad+data3[i].cantidad;
			 row.append($("<td><h5 align='right'>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 totaltareas= totaltareas+data3[i].tareas;
			// row.append($("<td><h5 align='right'>" + data3[i].riego.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			 //totalriego= totalriego+data3[i].riego;
			var row = $("</tr>");
			$("#psgrafico94bis").append(row); 
		
		}
		
		
			/*
			$("#psgrafico94bis").append(row); 

			row.append($("<td><h5><b style='color:darkred;'>"+ "TOTAL" +"</b></h5></td>"));
	
			
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalcantidad.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totaltareas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));
			row.append($("<td><h5 align='right'><b style='color:darkred;'>" + totalriego.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</b></h5></td>"));
			
		var row = $("</tr>");
			
			$("#psgrafico94bis").append(row); 
	*/
	
	})
	}
	
	



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