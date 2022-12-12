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
		<center><h2>Tipologías Habits</h2></center><br/>
	</div>
	
	<div class="col-md-12">
		<center>
			<label>Seleccione Provincia</label>			
			<select id="provincia" name="provincia"></select>			
			&nbsp;&nbsp;
			<label>Seleccione Municipio</label>			
			<select id="municipio" name="municipio"></select>			
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
		
		$('#provincia').selectmenu({
			change: function( event, data ) {
				provincia = data.item.value;				
				$('#grafico1').empty();
				$('#municipio').empty();

				$.get('index.php?r=TblPoblaAis/getMunicipios&provincia='+provincia, function(data2){
									
					$('#municipio').append($('<option>', {
						value: 0,
						text: ''
					}));
					for(var i2 = 0; i2 < data2.length; i2++){
						var opt = $('<option/>', {
							value: data2[i2].cod_mun,
							text: data2[i2].cod_prov
						});
											
						opt.appendTo("#municipio");
					}
					municipio = $("#municipio").val();
					$("#municipio option:first").attr('selected','selected');
					$("#municipio").selectmenu("refresh");		
					$("#municipio").trigger("change");
					//cargarGrafico1(provincia, municipio);	
				})
			}
		});
		
		$('#municipio').selectmenu({
			change: function( event, data ) {

				provincia = $("#provincia").val();				
				municipio = data.item.value;
				cargarGrafico1(provincia, municipio);
			}
		});
		
		//RELLENAR COMBO DE PROVINCIAS
		$.get('index.php?r=TblPoblaAis/getProvincias', function(data){
			$('#provincia').append($('<option>', {
					value: 0,
					text: ''
				}));
			for(var i = 0; i < data.length; i++){
				$('#provincia').append($('<option>', {
					value: data[i].cod_prov,
					text: data[i].cod_mun
				}));
			}		
		})
	});
	
	/*
	* -----------------------------------------------------------------------------------
	* GRÁFICO 1
	* -----------------------------------------------------------------------------------
	*/
	
	provincia = $("#provincia").val();
	municipio = $("#municipio").val();

	
	function cargarGrafico1(region, municipio){
		$.get('index.php?r=TblPoblaAis/panelHabits&provincia='+provincia+'&municipio='+municipio, function(data){
			
			series = [];
			f = [];
			b = [];
			comprobar = [];
			$.each(data, function(index, value){
				a=value.a;
				b=value.b;
				c=value.c;
				d=value.d;
				e=value.e;
				f=value.f;
				g=value.g;
				h=value.h;
				i=value.i;
				j=value.j;
				k=value.k;
				l=value.l;
				m=value.m;
				n=value.n;
				o=value.o;
				p=value.p;
				q=value.q;
				r=value.r;				
				/*if(comprobar.indexOf(sector) === -1){
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
				comprobar.push(value.sector);*/
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
								fontSize: '12px',
								//color: '#FFFFFF',
								//textShadow: "0 0 3px #000, 0 0 3px #000",
							}
						}
					}
				},
				series: [{
					type: "treemap",
					layoutAlgorithm: 'squarified',
					/*alternateStartingDirection: true,
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
					allowDrillToNode: true,*/
					data: [
						{
							name: 'Alta con adolescentes',
							value: a,
							color: '#074521'
						}, {
							name: 'Alta con jóvenes',
							value: b,
							color: '#00973F'
						}, {
							name: 'Alta con niños',
							value: c,
							color: '#928C52'
						}, {
							name: 'Semi-pensionistas alta',
							value: d,
							color: '#A2D250'
						}, {
							name: 'DINK clase alta',
							value: e,
							color: 'yellow'
						}, {
							name: 'Baja con adolescentes',
							value: f,
							color: '#FFCC00'
						}, {
							name: 'Baja con jóvenes',
							value: g,
							color: '#FFB600'
						}, {
							name: 'Baja con niños',
							value: h,
							color: '#FF8A00'
						}, {
							name: 'DINK clase baja',
							value: i,
							color: 'red'
						}, {
							name: 'Hogares de nueva creación',
							value: j,
							color: '#751F1F'
						}, {
							name: 'Semi-pensionistas baja',
							value: k,
							color: '#B3FDFF'
						}, {
							name: 'Pensionistas alta',
							value: l,
							color: '#00F265'
						}, {
							name: 'Solitarios',
							value: m,
							color: '#FFB3FD'
						}, {
							name: 'Amas de casa y estudiantes',
							value: n,
							color: '#FF2AF9'
						}, {
							name: 'Desempleados',
							value: o,
							color: '#FF7D9B'
						}, {
							name: 'Pareja pensionistas baja',
							value: p,
							color: '#15D7FF'
						}, {
							name: 'Pensionista baja',
							value: q,
							color: '#002CFF'
						}, {
							name: 'Inmigrantes',
							value: r,
							color: '#8029AE'
						}
					]
				}],
				title: {
					text: ''
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