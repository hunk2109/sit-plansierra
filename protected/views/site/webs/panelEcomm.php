<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Mensaje</h4>
	  </div>
	  <div class="modal-body">
		<p>Funcionalidad no desarrollada.</p>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
	  </div>
	</div>

  </div>
</div>

<div class="pane ui-layout-center" style="display:none;"></div>

<div class="row">		
	<div class="col-md-12">
		<center><h2>Demo <kbd>SIECO</kbd> (Sistema Información E-commerce)</h2></center>
	</div>	
	<div class="col-md-12">
		<br/>
		<center><label>Seleccione región:</label>
		<select id="region" name="region"></select><br/><br/></center>
	</div>
	<br/><br/>
	<center><div id="seleccion"></div></center>
	<br/><br/>
	<div class="col-md-1"></div>		
	<div class="col-md-10" id="grafico1"></div>
	<div class="col-md-1"></div>
	
</div>

</div>
</div>

<script type="text/javascript">
	var region;	

	$(document).ready(function () {
		myLayout = $('#content').layout({
			south__size:'100%',
			east__initClosed: true, 
			onresize: function () {
				map.updateSize();//alert('whenever anything on layout is redrawn.') 
			}	
		});
					
		$( "#tabs" ).tabs();
		
		$('#region').selectmenu({
			change: function( event, data ) {
				region = data.item.value;			
				cargarGrafico1(true);				
			}
		});
		
		//RELLENAR COMBO DE HIPER ALCAMPO
		$.get('index.php?r=tblHiperAlcampo/getRegion', function(data){
			$('#region').append($('<option>', {
					value: "0",
					text: ''
				}));
			$('#region').append($('<option>', {
					value: "TOTAL",
					text: 'Total'
				}));
			for(var i = 0; i < data.length; i++){
				$('#region').append($('<option>', {
					value: data[i].id,
					text: data[i].nombre
				}));
			}
			
		})
		
	});
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 1
	* -----------------------------------------------------------------------------------
	*/
	region = $("#region").val();
		
	function cargarGrafico1(cv){
		if(cv){			
			$.get('index.php?r=TblEcom/panelCV&region='+region, function(data){
				series = [];
				$.each(data, function(index, element){
					vis = true;
					if(element.nombre == "Total" && region != "TOTAL")
						vis = false;
					var f = {
						type: 'spline',
						name: element.nombre,
						data: element.dato,
						visible:vis
					}
					series.push(f);
				});
				
				Highcharts.setOptions({
					global: {
						useUTC: false,
						
					},
					lang: {
					  decimalPoint: ',',
					  thousandsSep: '.'
					}
				});
				
				$('#grafico1').highcharts({
					chart: {
						zoomType: 'x'
					},
					title: {
						text: 'Evolución CV'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.y:.0f} €</b>'
					},
					xAxis: {
						type: 'datetime',
						minRange: 360 * 24 * 3600000 
					},
					yAxis: {
						title: {
							text: 'Cifra de venta (€)'
						}
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
						enabled:false,
						url: 'http://sit.plansierra.org/sigma/js/exportToPNG.php'
					},
					legend: {
						align: 'right',
						verticalAlign: 'top',
						layout: 'vertical',
						x: 0,
						y: 20
					},
					series: series
				 })
				
				$("#seleccion").empty();
				var radioSet = $('<div id="radio">');
				radioSet.appendTo('#seleccion');
				var radioBtn = $('<input type="radio" id="cv" name="radio" checked="checked">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-info btn-xs" for="cv" style="margin:0 5px;">Total mensual</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="cvAcum" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-info btn-xs" for="cvAcum" style="margin:0 5px;">Total acumulado año</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="alimentacion" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="alimentacion" style="margin:0 5px;">Alimentación</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="granElectro" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="granElectro" style="margin:0 5px;">Gran Electro</label><br/><br/>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="juguetes" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="juguetes" style="margin:0 5px;">Juguetes</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="articulosLinea" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="articulosLinea">Artículos por linea</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="cvServicios" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="cvServicios" style="margin:0 5px;">CV Servicios</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="rupturas" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="rupturas" style="margin:0 5px;">Rupturas</label>');
				radioLbl.appendTo('#radio');				
				
				$( "#radio" ).buttonset().change(function( event ) {
					if(event.target.id=='cv'){
						cargarGrafico1(true);
					}else{
						cargarGrafico1(false);
					}
					//alert(event.target.id);
					//alert($("#radio :radio:checked + label").text());
				});
			})
		}else{
			$.get('index.php?r=TblEcom/panelCVAcum&region='+region, function(data){
				series = [];
				$.each(data, function(index, element){
					vis = true;
					if(element.nombre == "Total" && region != "TOTAL")
						vis = false;
					var f = {
						type: 'spline',
						name: element.nombre,
						data: element.dato,
						visible:vis
					}
					series.push(f);
				});
				
				Highcharts.setOptions({
					global: {
						useUTC: false,
						
					},
					lang: {
					  decimalPoint: ',',
					  thousandsSep: '.'
					}
				});				
				
				$('#grafico1').highcharts({
					chart: {
						zoomType: 'x'
					},
					title: {
						text: 'Evolución CV Acumulado Año'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.y:.0f} €</b>'
					},
					xAxis: {
						type: 'datetime',
						minRange: 360 * 24 * 3600000 
					},
					yAxis: {
						title: {
							text: 'Cifra de venta (€)'
						}
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
						enabled:false,
						url: 'http://sit.plansierra.org/sigma/js/exportToPNG.php'
					},
					legend: {
						align: 'right',
						verticalAlign: 'top',
						layout: 'vertical',
						x: 0,
						y: 20
					},
					series: series
				 })
				
				$("#seleccion").empty();
				var radioSet = $('<div id="radio">');
				radioSet.appendTo('#seleccion');
				var radioBtn = $('<input type="radio" id="cv" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-info btn-xs" for="cv" style="margin:0 5px;">Total mensual</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="cvAcum" name="radio" checked="checked">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-info btn-xs" for="cvAcum" style="margin:0 5px;">Total acumulado año</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="alimentacion" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="alimentacion" style="margin:0 5px;">Alimentación</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="granElectro" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="granElectro" style="margin:0 5px;">Gran Electro</label><br/><br/>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="juguetes" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="juguetes" style="margin:0 5px;">Juguetes</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="articulosLinea" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="articulosLinea">Artículos por linea</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="cvServicios" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="cvServicios" style="margin:0 5px;">CV Servicios</label>');
				radioLbl.appendTo('#radio');
				
				var radioBtn = $('<input type="radio" id="rupturas" name="radio">');
				radioBtn.appendTo('#radio');
				var radioLbl = $('<label class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" for="rupturas" style="margin:0 5px;">Rupturas</label>');
				radioLbl.appendTo('#radio');
				
				$( "#radio" ).buttonset().change(function( event ) {
					if(event.target.id=='cv'){
						cargarGrafico1(true);
					}else{
						cargarGrafico1(false);
					}
					//alert(event.target.id);
					//alert($("#radio :radio:checked + label").text());
				});
			})
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