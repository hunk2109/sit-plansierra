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
		<center><h2>Sistema Información Mercados</h2></center><br/>
	</div>
	
	<div class="col-md-12">
		<center>
			<label>Seleccione región:</label>
			<select id="region" name="region"></select>
			&nbsp;&nbsp;
			<label>Seleccione año:</label>
			<select id="anno" name="anno"></select>
		</center>
		<br/>
	</div>
	<div class="col-md-12">
		<!--<center><h2>Demo <kbd>SIMCO</kbd> (Sistema Información Mercados)</h2></center>-->
		<center>
			<div id="radio" class="ui-buttonset">
				<input type="radio" id="mercados" name="radio" checked="checked" class="ui-helper-hidden-accessible">
				<label class="btn btn-info btn-xs ui-state-active ui-button ui-widget ui-state-default ui-button-text-only ui-corner-left" for="mercados" style="margin:0 5px;" role="button">
					<span class="ui-button-text">Mercados</span>
				</label>
				
				<input type="radio" id="progresionCV" name="radio" class="ui-helper-hidden-accessible">
				<label class="btn btn-default btn-xs ui-button ui-widget ui-state-default ui-button-text-only" data-toggle="modal" data-target="#myModal" for="progresionCV" style="margin:0 5px;" role="button">
					<span class="ui-button-text">Progresión CV</span>
				</label>
				
				<input type="radio" id="numArticulos" name="radio" class="ui-helper-hidden-accessible">
				<label class="btn btn-default btn-xs ui-button ui-widget ui-state-default ui-button-text-only" data-toggle="modal" data-target="#myModal" for="numArticulos" style="margin:0 5px;" role="button">
					<span class="ui-button-text">Nº Artículos</span>
				</label>
				
				<input type="radio" id="progresionArticulos" name="radio" class="ui-helper-hidden-accessible">
				<label class="btn btn-default btn-xs ui-button ui-widget ui-state-default ui-button-text-only" data-toggle="modal" data-target="#myModal" for="progresionArticulos" style="margin:0 5px;" role="button">
					<span class="ui-button-text">Progresión Articulos</span>
				</label>
				
				<input type="radio" id="promociones" name="radio" class="ui-helper-hidden-accessible">
				<label class="btn btn-default btn-xs ui-button ui-widget ui-state-default ui-button-text-only" data-toggle="modal" data-target="#myModal" for="promociones" style="margin:0 5px;" role="button">
					<span class="ui-button-text">Promociones</span>
				</label>
			</div>
		</center>
		<br/>		
	</div>
	<br/>
	<center><div id="seleccion"></div></center>
	<br/>
	<div class="col-md-1"></div>		
	<div class="col-md-10" id="grafico1" style="min-width: 400px; max-width: auto; margin: 0 auto;"></div>
	<div class="col-md-1"></div>
	
</div>

</div>
</div>

<script type="text/javascript">
	var region, anno;	

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
				$('#grafico1').empty();				
				$('#anno').empty();
				$.get('index.php?r=TblZc/GetPeriodos', function(data2){
					
					for(var i2 = 0; i2 < data2.length; i2++){
						var opt = $('<option/>', {
							value: data2[i2].id,
							text: data2[i2].id
						});

						opt.appendTo("#anno");
					}
						anno = $("#anno").val();
						$("#anno option:first").attr('selected','selected');
						$("#anno").selectmenu("refresh");		
						$("#anno").trigger("change");							
						cargarGrafico1(region, anno);							
				})
			}
		});
		
		$('#anno').selectmenu({
			change: function( event, data ) {
				anno = data.item.value;
				cargarGrafico1(region, anno);				
			}
		});
		
		//RELLENAR COMBO DE HIPER ALCAMPO
		$.get('index.php?r=tblHiperAlcampo/getRegion', function(data){
			$('#region').append($('<option>', {
					value: 0,
					text: ''
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
	anno = $("#anno").val();
	
	function cargarGrafico1(region, anno){
		$.get('index.php?r=TblMercado/panelMercado&region='+region+'&anno='+anno, function(data){
			
			series = [];
			f = [];
			b = [];
			comprobar = [];
			$.each(data, function(index, value){
				sector=value.sector;
				if(comprobar.indexOf(sector) === -1){
					f = {
							id: value.sector,
							name: value.sector,
							color: value.color
						}
					b =	{
							name: value.mercado,
							parent: value.sector,
							value: Math.round(value.cv)
						}
					series.push(f,b);
				}
				else{
					b = {
							name: value.mercado,
							parent: value.sector,
							value: Math.round(value.cv)
						}
					series.push(b);
				}				
				comprobar.push(value.sector);
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
						// Edit chart spacing
						spacingBottom: 5,
						spacingTop: 5,
						spacingLeft: 5,
						spacingRight: 5,

						// Explicitly tell the width and height of a chart
						//width: null,
						height: 500
				},
				plotOptions: {
					series: {
						dataLabels: {
							useHTML: true,
							formatter: function () {
								if(this.key == "Bazar" || this.key == "P.G.C" || this.key == "Perecederos" || this.key == "Hogar" || this.key == "Textil"){
									return '<div class=dataLabelContainer><div style="position: absolute; top: -1px; left: 1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; top: 1px; left: 1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; top: 1px; left: -1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; top: -1px; left: -1px; color: #000; font-size:20px;">'+this.key+'</div><div style="position: absolute; color: #fff; font-size:20px;">'+this.key+'</div></div><div style="color: #fff; font-size:20px;">'+this.key+'</div></div>';
								}else{
									return '<div class=dataLabelContainer><div style="position: absolute; top: -1px; left: 1px; color: #000;">'+this.key+'</div><div style="position: absolute; top: 1px; left: 1px; color: #000;">'+this.key+'</div><div style="position: absolute; top: 1px; left: -1px; color: #000;">'+this.key+'</div><div style="position: absolute; top: -1px; left: -1px; color: #000;">'+this.key+'</div><div style="position: absolute; color: #fff;">'+this.key+'</div></div><div style="color: #fff;">'+this.key+'</div></div>';
								}
							},
							enabled: true,
							align: 'center',
							style: {
								fontSize: '11px',
								//color: '#FFFFFF',
								//textShadow: "0 0 3px #000, 0 0 3px #000",
							}
						}
					}
				},  			
				series: [{
					type: "treemap",
					layoutAlgorithm: 'squarified',
					alternateStartingDirection: true,
					levels: [{
						level: 3,
						layoutAlgorithm: 'sliceAndDice',
						dataLabels: {
							enabled: true,
							align: 'left',
							//verticalAlign: 'top',
							style: {
								fontSize: '15px',
								fontWeight: 'bold'
							}
						}
					}],
					allowDrillToNode: true,
					data: series
				}],
				title: {
					text: 'Mercados'
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
				}			
			 })
		})	
		
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