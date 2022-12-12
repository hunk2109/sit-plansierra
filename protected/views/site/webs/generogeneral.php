 <head>
    <title>Measure</title>
    <link rel="stylesheet" href="https://openlayers.org/en/v5.3.0/css/ol.css" type="text/css">
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
	<!--<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>-->
	
<link rel="stylesheet"  href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
   <link rel="stylesheet" href="path/to/file/picker.min.css">
<script type="text/javascript" src="path/to/file/picker.min.js"></script>


<!-- estaos tres enlaces los introduje para que SELECTPICKER tuviera tosas sus funciones 2919-09-15-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>

<style>
.sucess{
	background:lightgrey;
    color:black;}
</style>
<style>
.agenciaforestal{
  background-color:#ffcccc;
  color: #ffcccc;
  padding: 0px;
  border-style: solid;
  border-width: 3px 3px 3px 3px;
}
</style>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #666;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border:1px solid #666;
  outline:10px ;
  cursor: pointer;
  padding: 1px 10px;
  transition: 0.3s;
  font-size: 12px;
}
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #666;
  background-color: #f1f1f1;
}

/* Change background color of buttons on hover */
.tab button:hover {
	font-color: #fff;
  background-color: #ccc;
}

/* Create an active/current tablink class */
.tab button.active {
	font-color: #fff;
  background-color: #fff;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border:1px solid #ccc;
  border-top: none;
}

  .ol-popup {
	display: none;
	position: absolute;
	background-color: white;
	-moz-box-shadow: 0 1px 4px rgba(0,0,0,0.2);
	-webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
	filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
	padding: 15px;
	border-radius: 10px;
	border: 1px solid #cccccc;
	bottom: 12px;
	left: -50px;
  }
  .ol-popup:after, .ol-popup:before {
	top: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
  }
  .ol-popup:after {
	border-top-color: white;
	border-width: 10px;
	left: 48px;
	margin-left: -10px;
  }
  .ol-popup:before {
	border-top-color: #cccccc;
	border-width: 11px;
	left: 48px;
	margin-left: -11px;
  }
  .ol-popup-closer {
	text-decoration: none;
	position: absolute;
	top: 2px;
	right: 8px;
  }
  .ol-popup-closer:after {
	content: "✖";
  }
   
</style>

 <div class="pane ui-layout-north">
	<div class="row">	
											
		<div class="col-md-10">	
			 <h4 id="Titulo_1_1" width="100%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
		</div>	
		<div class="col-md-1">
			 <a id="generarexcel" type="button" class="btn btn-primay" title="Hojaexcel" href="index.php?r=site/hojaexcel&criterio=">Excel 
							<img width=22 src="images/concentricos.png" alt="Excel"> </a>
			
		</div>		
		<div class="col-md-1">
			 <table id="Control_1_1" class="table-striped bg-danger text-white" width="100%"></table>
		</div>
	</div>
	
	 <br/>
  <br/>
	<div class="row">  
		<div class="col-md-12">	
		   <div class="card bg_light mb-3">
				<div class="card-body">
					<table id="Grafico_1_1" class="table table-bordered" width="10%">
						<thead>
							<tr>
								<th>ord</th>
								<th>Sig</th>
								<th>Plan.</th>
								<th>Cont.</th>
								<th>Clie.</th>
								<th>Apellido</th>
								<th>Nombre</th>
								<th>Cedula</th>
								<th>Sub.</th>
								<th>Microc.</th>
								<th>Destino</th>
								<th>Fecha</th>
								<th>Plantas</th>
								<th>T. Plantc.</th>
								<th>Activ.</th>
									
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>	
	</div>

</div>

<div class="pane ui-layout-south">
	<div class="col-md-2">
	<div id="layertree"  class="tree"></div>
	</div>
<div class="col-md-6"> 
	<div id="map" style="height:100%; width:100%; margin-right=0px">
		<div id="navTool" class="div-navTool">
			<div id='butInfoWMS' title="Información de las capas"><img height=48 src="images/reforestacion.png"/></div>
			<div id='butInfo' title="Información geográfica"><img height=48 src="images/informacionpais.png"/></div>
			<div id='butMedirDistancia' title="Medir distancia"><img height=48 src="images/medirdistancia.png"/></div>
			<div id='butMedirArea' title="Medir area"><img height=48 src="images/medirarea.png"/></div>
			
		</div>
		
		 <div id="popupMapa" class="ol-popup">
			<a href="#" id="popup-closer" class="ol-popup-closer"></a>
			<div id="popup-content"></div>
		</div>
		
		
		<!-- Aqui se ponen las corrdenadas que aparecen en la esquina inferior izquierda-->
		<div style="width: 170px; height: 100px"  id="coord" class="div-coordenadas"></div>
		
		<div id="dialog-form"></div>
		</div>
	</div>
<div class="col-md-4">
	<div>
		<div id="popup2" >
			<!--a href="#" id="popup-closer" class="ol-popup-closer"></a-->
			<div id="popup-content">
				<div id="tabs">
				  <ul>
					<li><a href="#tabs-1">Plantacion</a></li>
					<li><a href="#tabs-2">Datos generales</a></li>
					<li><a href="#tabs-4">Datos técnicos</a></li>
					<li><a href="#tabs-3">Especies</a></li>
					<li><a href="#tabs-6">Especies_detallado</a></li>	
					<li><a href="#tabs-7">Labores</a></li>
					<li><a href="#tabs-5">Predios</a></li>
					<li><a href="#tabs-8">Cliente</a></li>
					<li><a href="#tabs-A" >Informe</a></li>
					<li><a href="#tabs-9">Cuencas y otros</a></li>
				  </ul>
				  <!--div id="tabs-1">
					<div id="infoEdad"></div>
					<div id="infoExtr"></div>
				  </div-->
				  <div id="tabs-1">
					<table id="infoCompeEns1" class="infoTabla"></table><br><br>
					<table id="infoCompeSup1" class="infoTabla"></table>
				  </div>
				  <div id="tabs-2">
					<div style="font-size:12px;font-style: italic;color: grey;" id="totalPob"></div>
					<table id="infoCV" class="infoTabla"></table>
					<table id="infoPobM" class="infoTabla"></table><br><br>
					<table id="infoPobD" class="infoTabla"></table><br><br>
					<table id="infoPobS" class="infoTabla"></table><br><br>
				  </div>
				  <div id="tabs-3">
					<table id="infoCompeEns3" class="infoTabla"></table><br><br>
					<table id="infoCompeSup3" class="infoTabla"></table>
				  </div>
				   <div id="tabs-4">
					<table id="infoCompeEns4" class="infoTabla"></table><br><br>
					<table id="infoCompeSup4" class="infoTabla"></table>
				  </div>
				   <div id="tabs-5">
					<table id="infoCompeEns5" class="infoTabla"></table><br><br>
					<table id="infoCompeSup5" class="infoTabla"></table>
				  </div> 
				  <div id="tabs-7">
					<table id="infoCompeEns1" class="infoTabla"></table><br><br>
					<table id="infoCompeSup1" class="infoTabla"></table>
				  </div> 
				  <div id="tabs-8">
					<table id="infoCompeEns8" class="infoTabla"></table><br><br>
					<table id="infoCompeSup8" class="infoTabla"></table>
				  </div> 
				   <div id="tabs-6">
				   	<table id="infoPlantacion" class="infoTabla"></table><br><br>
					<table id="infoReplantacion" class="infoTabla"></table><br><br>
					<table id="infoMantenimiento" class="infoTabla"></table>
				 </div>
				  <div id="tabs-9">
					<table id="infoCompeEns9" class="infoTabla"></table><br><br>
					<table id="infoCompeEns9B" class="infoTabla"></table><br><br>
					<table id="infoCompeEns10" class="infoTabla"></table>
				  </div>
				  <div id="tabs-A" style="font-size:16px;"width="100%"  >
					<div class="row" >
						<div class="col-md-2">
							<a id="informeparcelapdf" type="button" class="btn btn-primay" title="informe" target="_blank"  href="index.php?r=site/informeparcelapdf&parcela=">Informe pdf
							<img width=22 src="images/concentricos.png" alt="PDF"> </a>
						</div>	
					</div>
				  </div>
				</div>
			</div>
			
		</div>
			
	</div>

</div>

</div>
<div class="pane ui-layout-east">

</div>



<!--div class="pane ui-layout-north">North</div-->
<div class="pane ui-layout-center" id="center">
	<!--<div style="width: 50%; height: 100%; float:left" id="grafico1"></div>
	<div style="width: 50%; height: 100%; float:right" >
		
		<div id="grafico2" style ="height: 100%"></div>-->
		
		 <ul class="nav nav-pills" >
		 <li class="active"><a data-toggle="tab" href="#menu0">Plan Sierra</a></li>
			<!--<li><a data-toggle="tab" href="#menu1">Subcuenca</a></li>-->
			<!--<li><a data-toggle="tab" href="#menu2">Microcuenca</a></li>-->
			<!--<li><a data-toggle="tab" href="#menu3">Subcuenca reforestacion</a></li>-->
		</ul>

					<div class="tab-content">
						<div id="menu0" class="tab-pane fade in active">
							  <div class="row">
										<div class="agenciaforestal" id="psgrafico79" border="none" >
												
										</div>	
											
										<div class="row">
											<div class="col-md-11" >
												<div id="psgrafico80"></div>
											</div>
											<div class="col-md-1" >
												<div id="psgrafico80_A"></div>
											</div>
										</div>	
										<div class="row">
											
											<div class="col-md-6">
													<div id="psgrafico90"></div>
											</div>

											<div class="col-md-6">
											    <div id="psgrafico91"></div>	
											</div>
											
										</div>	
										<div class="row">	
											
											<div class="col-md-8">
											    <h4 id="psTituloA2" width="100%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgraficoA2" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											
											<div class="col-md-2">
											    <h4 id="psTituloA3" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgraficoA3" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>
										
										<div class="row">	
											
											<div class="col-md-8">
											    <h4 id="psTitulo92" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico92" class="table-striped bg-danger text-white" ></table>
												</div>
												
											</div>
										</div>
										
										<div class="row">	
											<div class="col-md-6">
											    <h4 id="psTitulo93" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<h4 id="psTitulo93sub" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<div class="table">
													<table id="psgrafico93" class="table-striped bg-danger text-white" ></table>
												</div>
												 <h4 id="psTitulo93bis" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico93bis" class="table-striped bg-danger text-white" ></table>
												</div>
												 <h4 id="psTitulo93a" width="74%" class="p-3 mb-2 bg-danger  text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico93a" class="table-striped bg-danger text-white" ></table>
												</div>
												 <h4 id="psTitulo93b" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico93b" class="table-striped bg-danger text-white" ></table>
												</div>
												
												 <h4 id="psTitulo93c" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico93c" class="table-striped bg-danger text-white" ></table>
												</div>
												
											</div>
										</div>
										<div class="row">	
											<div class="col-md-6">
											    <h4 id="psTitulo94" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<h4 id="psTitulo94sub" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico94" class="table-striped bg-danger text-white" ></table>
												</div>
												<div class="table">
													<table id="psgrafico94B" class="table-striped bg-danger text-white" ></table>
												</div>
												<h4 id="psTitulo94bis" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												
												
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico94bis" class="table-striped bg-danger text-white" ></table>
												</div>
												<div class="col-md-6">
												</div>
											</div>
										</div>	
										<div class="row">	
											  <div class="col-md-6">
											    <h4 id="psTitulo95" width="100%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												
												<div class="table">
													<table id="psgrafico95" class="table-striped bg-danger text-white" ></table>
												</div>
										    </div>
												
										</div>
											
										
									
										
										<div class="row">	
											<div class="col-md-6">
											    <h4 id="psTitulo102" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												
												<div class="table">
													<table id="psgrafico102" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>
											
										
									
										
										<div class="row">	
											
											<div class="col-md-8">
											    <h4 id="psTitulo103" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico103" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12">
											    <h4 id="psTitulo104" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<h4 id="psTitulo104sub" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico104" class="table-striped bg-danger text-white" ></table>
												</div>
												 <h4 id="psTitulo104bis" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico104bis" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										
										</div>
											
										
										
										<div class="row">
											
											<div class="col-md-12">
											    <h4 id="psTitulo104" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico104" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										
										</div>
										<div class="row">
											<div class="col-md-12">
											    <div id="psgrafico100"></div>	
											</div>
										</div>

				 
										<div class="row">
											<div class="col-md-12" >
													<div id="psgrafico101" ></div>
											</div>
										</div>
										
										
										
							  
							</div>
						</div>
								
								<div id="menu1" class="tab-pane fade ">
								 
										<div class="row">
											<div class="col-md-11" >
												<div id="grafico80"></div>
											</div>
											<div class="col-md-1" >
												<div id="grafico80_A"></div>
											</div>
										</div>	
										
										<div class="row">
											
											<div class="col-md-6">
													<div id="grafico90"></div>
											</div>

											<div class="col-md-6">
											    <div id="grafico91"></div>	
											</div>
											
										</div>	
										<div class="row">	
											<div class="col-md-2">
											</div>
											<div class="col-md-8">
											    <h4 id="TituloA2" width="100%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="graficoA2" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											
											<div class="col-md-2">
											    <h4 id="TituloA3" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="graficoA3" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>
										
										<div class="row">	
											
											<div class="col-md-12">
											    <h4 id="Titulo92" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico92" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											
											</div>
										
										<div class="row">
											<div class="col-md-12">
											    <h4 id="Titulo93" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico93" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>	
										
										<div class="row">	
											<div class="col-md-12">
											    <h4 id="Titulo94" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<h4 id="Titulo94sub" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico94" class="table-striped bg-danger text-white" ></table>
												</div>
												<div class="table">
													<table id="grafico94B" class="table-striped bg-danger text-white" ></table>
												</div>
												<h4 id="Titulo94bis" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												
												
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico94bis" class="table-striped bg-danger text-white" ></table>
												</div>
												
											</div>
											<div class="col-md-12">
											    <h4 id="Titulo95" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												
												<div class="table">
													<table id="grafico95" class="table-striped bg-danger text-white" ></table>
												</div>
										
												
											</div>
											
										
										</div>
										
										<div class="row">	
											<div class="col-md-6">
											    <h4 id="Titulo102" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico102" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											<div class="col-md-6">
											    <h4 id="Titulo103" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico103" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>
										
										<div class="row">
											
											<div class="col-md-12">
											    <h4 id="Titulo104" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico104" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										
										</div>
										<div class="row">
											<div class="col-md-12">
											    <div id="grafico101"></div>	
											</div>
										</div>

				 
										<div class="row">
											<div class="col-md-12" >
												<h4 id="Titulo100" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												
												<div class="table">
													<table id="grafico100" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>
				  
								
								
								</div>
								<div id="menu2" class="tab-pane fade">
								  <div class="row">
											<div class="col-md-11" >
												<div id="mgrafico80"></div>
											</div>
											<div class="col-md-1" >
												<div id="mgrafico80_A"></div>
											</div>
										</div>	
										
										<div class="row">
											
											<div class="col-md-6">
													<div id="mgrafico90"></div>
											</div>

											<div class="col-md-6">
											    <div id="mgrafico91"></div>	
											</div>
											
										</div>	
										<div class="row">	
											<div class="col-md-2">
											</div>
											<div class="col-md-8">
											    <h4 id="mTituloA2" width="100%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgraficoA2" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											
											<div class="col-md-2">
											    <h4 id="mTituloA3" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgraficoA3" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>
										<div class="row">	
											
											<div class="col-md-12">
											    <h4 id="mTitulo92" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgrafico92" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>	
										
										<div class="row">		
											
											<div class="col-md-12">
											    <h4 id="mTitulo93" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgrafico93" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>
										<div class="row">	
											<div class="mcol-md-12">
											    <h4 id="mTitulo94" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgrafico94" class="table-striped bg-danger text-white" ></table>
												</div><div class="table">
													<table id="mgrafico94B" class="table-striped bg-danger text-white" ></table>
												</div>
												<h4 id="Titulo94bis" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
											</div>
										
										</div>
										
										<div class="row">	
											<div class="col-md-6">
											    <h4 id="mTitulo102" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgrafico102" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											<div class="col-md-6">
											    <h4 id="mTitulo103" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgrafico103" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
											    <h4 id="mTitulo104" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgrafico104" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										
										</div>
										<div class="row">
											
											
											<div class="col-md-12">
											    <div id="mgrafico101"></div>	
											</div>
											
										</div>
										<div class="row">	
											
											<div class="col-md-12" >
												<h4 id="mTitulo100" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgrafico100" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>
								</div>
								
								<div id="menu3" class="tab-pane fade in active">
								</div>
		</div>
									
		
		
		
</div>
<div class="pane ui-layout-west">
	<div>
	
	<label>Seguimiento por Cuenca</label>
	
		<br/>
		<br/>
	
				<label>Seleccione  Cuenca</label>
				<br/>
				<select id="hiperAlcampo" name="hiperAlcampo" onchange="cargarGraficoAnoCuenca()"></select>
				<a href="javascript:document.location.reload();">       Refrescar</a>
				<br/>
				<label>Seleccione  Micro Cuenca</label>
				<br/>
				<select id="microcuenca" name="microcuenca"></select>
				
		<br/>
		
		<br/>
		<div class="row">
			<div class="row" >
				<input type="checkbox" id="checkfecha" name="checkfecha" value= 0><label>  Fecha</label>
			</div>
			
				<label>Seleccione Fecha Inicial</label>
				<input  type="date" id="fechaini" name="fechaini" value="2019-01-01"  >
				
			
				<label>Seleccione Fecha Final</label>
				<input type="date" id="fechafin" name="fechafin" value="<?php echo date("Y-m-d");?>" >
			
				<br/>
		<br/>
		
				<button type="button" class="btn btn-primay" title="Calcular" onclick="cargarGraficoAno(1)">Buscar 
								<img width=22 src="images/concentricos.png" alt="Cacular"/>
				</button>
			
				<br/><br/>
		
		</div>	
		
		
	</div>
</div>
			
	</div>
</div>
	

</div>
</div>

<div id="popupInfo" class="ol-popup" style="width:400px">
	<a href="#" id="popup-closer-medida" class="ol-popup-closer"></a>
	<div id="popup-content-info">
		<ul></ul>
	</div>
	
	
</div>
<!--inserta la libreria de cambio de coordenadas-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>
<script src="js/cargaractividadmic.js" type="text/javascript"></script>
<script src="js/cargaractividadcue.js" type="text/javascript"></script>
<script src="js/cargarsistemafamiliarpsi.js" type="text/javascript"></script>
<script src="js/informacionparcelas.js" type="text/javascript"></script>
<script src="js/treelayers.js" type="text/javascript"></script>
<script src="js/busquedaactividad.js" type="text/javascript"></script>
<script type="text/javascript">


//AQUI COLOREO TAB
$("#tabsfgeneral").addClass("active");


//defino la proyeccoin 32619 que es WGS 84 UTM 19N
//
proj4.defs("EPSG:32619","+proj=utm +zone=19 +ellps=WGS84 +datum=WGS84 +units=m +no_defs");



//******************************************
// DEFINICION DE VARIABLES Y EVENTOS
//****************************************++
var groupCapas, groupSociodemo;
var tools = {socio:false};
var cpSelected = [], nacionalidad = ["RESTO", "EUROPA", "ASIA", "AMERICA", "AFRICA"], edades = [{capa:"POB_6599", titulo:"Población > 65"}, {capa:"POB_2965", titulo:"Población 29-65"}, {capa:"POB_2029", titulo:"Población 20-29"}, {capa:"POB_1519", titulo:"Población 15-19"}, {capa:"POB_0514", titulo:"Población 5-14"},{capa:"POB_0005", titulo:"Población 0-5"}];
var iso1, iso2, iso3, iso4, iso5, microcuencas_selected, plantaciones_cuencas_selected, plantaciones_ano_en_curso,parcelas, arg_cuencas, ensenas, loc = null, idAlcampo, idEncuesta, cuencas, microcuenca;
var sel, selLayer, osm, google, google_carto,parcelassel,sal,salid,codigobuscado,solo_plantaciones,dataano,dataespecie, dataanocu, datacuenca;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
var myLayout;
var infoCV;
var tabla;
cuencas =99;
idAlcampo=99;




//REFORESTACION
var tipoactividad=4;
var tipoactividadsec=0;
var nombreactividad="Sistema Familiar";


;


//**********************************
// EVENTOS
//**********************************
	

$(document).ready(function () {
	myLayout = $('#content').layout({
		west__size:	'20%',
		east__size:	'35%',
		north__size:'50%',
		south__size:'50%',
		east__initClosed: true, 
		south__initClosed: true,
		north__initClosed: true,
		onresize: function () {
			map.updateSize();//alert('whenever anything on layout is redrawn.') 
		}	
	});

	$( "#butInfo" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'url(http://sit.plansierra.org/PlanSierra/images/cpais.png), help'});
			//$("#map").css({'cursor': 'pointer'});
			tools.socio = true;
			tools.capa = false;
			tools.refo =false;
			tools.busq =false;
			tools.dist = false;
			tools.area = false;
			sourcevect.clear();
			 map.removeInteraction(draw);
			//alert ( 'estoy aqui en butInfo');
	});
		
	$( "#tabs" ).tabs();
	
	$( "#butInfoWMS" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'url(http://sit.plansierra.org/PlanSierra/images/cforestal.png), help'});
			//$("#map").css({'cursor': 'url(https://cdn3.iconfinder.com/data/icons/bluecoral/Cursor.png), default'});
			tools.socio = false;
			tools.capa = true;
			tools.refo =false;
			tools.busq =false;
			tools.dist = false;
			tools.area = false;
			sourcevect.clear();
			 map.removeInteraction(draw);
			  //interaction.setActive(false);
			//alert ( 'estoy aqui en butInfoWMS');
	});
	$( "#butUnselect" )
		.button()
		.click(function( event ) {
			tools.socio = false;
			$("#map").css({'cursor': 'default'});
			cpSelected = [];
			$("#infoEdad").empty();
			$("#infoExtr").empty();
			$("#infoCV").empty();
			$("#totalPob").empty();
			$("#infoPobM").empty();
			$("#infoPobD").empty();
			$("#infoPobS").empty();
			$("#infoCompeEns").empty();
			$("#infoCompeSup").empty();
			var capas = map.getLayers().getArray();
			for(var i = capas.length-1; i>=0; i--){
				var nombre = capas[i].get('name');
				if(nombre == 'Seleccion'){
					map.removeLayer(capas[i]);
				}
			}
		});
			
	//********************************
    //SELECCION DE CUENCAS 
    //********************************	

	
	$('#hiperAlcampo').selectmenu({
		change: function( event, data ) {
			
			idAlcampo = data.item.value;
			idAlcampo = data.item.value;
		    cargarGraficoAnoCuenca();
			
			//$('#grafico1').empty();
			//$('#grafico2').empty();
			//$('#seleccion').empty();
	
			//QUITOS ESTO PARA PROBAR CON PLANSIERRA
			//iso1.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso2.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso3.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso4.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso5.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//sel.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			
			
			//microcuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas="+idAlcampo);
			//plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel="+idAlcampo);
			//parcelas.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map");
			
<?php

//AQUI RELLENO EL DESPLEGABLE DE MICROCUENCA; ESTE EVENTO SE DISPARA CUANDO YA HE SELECCIONADO UNA CUENA ?
			
		     $mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

            $rs4 = array();
//ss_micro_cuencas tiene todas las microcuencas consideradas en SPSO y cada microcuenca tiene un ID diferente

             foreach($mbd->query('SELECT codigo_micro_cuenca, descripcion, codigo_cuenca FROM ss_micro_cuenca  order by codigo_micro_cuenca::int asc;') as $fila4) {
				 
				 
                   $c = null;								
                   $c['id'] =(int)$fila4['codigo_micro_cuenca'];
                   $c['nombre'] =$fila4['descripcion'];
				   $c['cuenca']= (int)$fila4['codigo_cuenca'];
                   array_push($rs4, $c);

              }


?>	
	     data = <?php echo json_encode($rs4);?>;
	     var a = "<option value=999>Todas las subcuencas</option>";		 
		$("#microcuenca").append(a);
	     for(var i = 0; i < data.length; i++){
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			if (data[i].cuenca == idAlcampo) {
		      $('#microcuenca').append($('<option>', {
				   value: data[i].id,
				   text: data[i].id+ '- '+ data[i].nombre + '  (' +data[i].cuenca+' )'+ idAlcampo
		     	}));
			}
	    }
	
			
			
	//fecha de la encuesta o año
	
			$('#idEncuesta').empty();
			$.get('index.php?r=tblIsoCv/getIsoFechas&idAlcampo='+idAlcampo, function(data2){
			
				/*ESTA PARTE ES PARA CENTRAR EL DMAPA. AHORA NO LO HACEMOS
				//***************************************************
				$.get('index.php?r=tblHiperAlcampo/getCoords&epsg=3857&id='+idAlcampo, function (d){
					map.getView().setCenter([parseFloat(d[0].x), parseFloat(d[0].y)]);
					map.getView().setZoom(10);
				});
				*/
				//***************************************************
				//
				//AQUI SE LLAMAN A LOS DOS GRAFICOS QUE INCLUYE LA PAGINA A 21-02-2019
				//
				//
				//***************************************************
				//cargarGrafico1(idAlcampo);
				
				//cargarGrafico1(data2[0].id_encuesta);
				cargarGrafico2(false);
				for(var i2 = 0; i2 < data2.length; i2++){
					var opt = $('<option/>', {
						//value: data2[i2].id_encuesta,
						value: data2[i2].fecha_encuesta,
						text: data2[i2].fecha_encuesta
					});
					
					//$('#zipCode').append(opt);
					opt.appendTo("#idEncuesta");
				}
					idEncuesta = $("#idEncuesta").val();
					$("#idEncuesta option:first").attr('selected','selected');
				 	$("#idEncuesta").selectmenu("refresh");		
					$("#idEncuesta").trigger("change");
				
				
		
	
			
			})
			
			
      }
	});
	
	$('#idEncuesta').selectmenu({
		change: function( event, data ) {
			idEncuesta = data.item.value;
			cargarGrafico1(data.item.value);
			//cargarGrafico1(idEncuesta);
			//iso1.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso2.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso3.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso4.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//iso5.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			//sel.getSource().setUrl("http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&hiper="+idAlcampo);
			
			
      }
	});
	
	$('#microcuenca').selectmenu({
		change: function( event, data ) {
			$( "#butUnselect" ).trigger('click');
			microcuenca = data.item.value;
			$('#grafico1').empty();
			$('#grafico2').empty();
			$('#seleccion').empty();
			cargarGraficoAnoMicroCuenca();
	        microcuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas="+microcuenca);
			plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel="+microcuenca);
			parcelas.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map");
			//plantaciones_puntos.getSource().setUrl("'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad="+tipoactividad);
	      }
	});
	
	
//***********************************************	
//RELLENAR COMBO DE HIPER ALCAMPO
//**********************************************
	
<?php



//DESPLEGABLE DE LA CUENCA
//primer desplegable originalemente hiper alcampo

//OJO HE INTRODUCIDO MODIFICACIONE PORQUE NO FUNCIONABA
//BUSCO DIRECTAMENTE EN LA BASE DE DATOS SIN USAR LAS HERRAMIENTAS DE Yii


//CONEXION DIRECTA A LA BASE DE DATOS
$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

$rs3 = array();
//foreach($mbd->query('SELECT gid, objectid, id, nom_cuenca, sub_cuenca, shape_leng, shape_area, geom FROM geo_subcuencas order by gid asc;') as $fila3) {
foreach($mbd->query('SELECT codigo_cuenca, descripcion FROM ss_cuenca order by codigo_cuenca asc;') as $fila3) {
$c = null;								
$c['id'] =(int)$fila3['codigo_cuenca'];
$c['nombre'] =$fila3['descripcion'];

array_push($rs3, $c);

}


?>
		 $("#hiperAlcampo").empty();
	data = <?php echo json_encode($rs3);?>;
	var a = "<option value=999>Todas las subcuencas</option>";
		$("#hiperAlcampo").append(a);
	for(var i = 0; i < data.length; i++){
		$('#hiperAlcampo').append($('<option>', {
				value: data[i].id,
				text: data[i].id+ '- '+ data[i].nombre
			}));
		
	}
	
	$( "#butMedirDistancia" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'url(http://sit.plansierra.org/PlanSierra/images/cdistancia.png), help'});
			//$("#map").css({'cursor': 'pointer'});
			tools.socio = false;
			tools.capa = false;
			tools.refo =false;
			tools.busq =false;
			tools.dist = true;
			tools.area = false;
			
			
		// var pointerMoveHandler = function(evt) {
       /* if (evt.dragging) {
          return;
        }*/
        /** @type {string} */
        sourcevect.clear();
        // alert ('estoy en la linea 2425  0');  
      //var typeSelect = document.getElementById('typedigitalizacion');
		var geometryFunction = function(coordinates, geometry) {
				if (!geometry) {
				  geometry = new ol.geom.Polygon(null);
				  
				}
				var start = coordinates[0];
				var end = coordinates[1];
				geometry.setCoordinates([
				  [start, [start[0], end[1]], end, [end[0], start[1]], start]
				]);
				//alert ('estoy en la linea 2436   1');
				return geometry;
			  }
     // global so we can remove it later
	  //alert ('estoy en la linea 2440   2');
     //function addInteraction() {
        //var value = typeSelect.value;
        //if (value !== 'None') {
          draw = new ol.interaction.Draw({
            source: sourcevect,
            //maxPoints: 2,
			type: 'LineString',
			//geometryFunction : geometryFunction
          });
		   //alert ('estoy en la linea 2450   3');
          map.addInteraction(draw);
		
		  //alert ('estoy en la linea 2452   3b');
      //  }
     //}
 			draw.on('drawend', function (k){
				//alert('termino    linea 2456   4');
				//alert(k.feature.getGeometry().getLength());
				
				var coordinate = k.feature.getGeometry().getLastCoordinate();
			  var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
				  coordinate, 'EPSG:3857', 'EPSG:4326'));


				$( "#dialog-form" ).empty();
					dialog = $( "#dialog-form" ).dialog({
						title: "Medida longitud",
						autoOpen: false,
						// height: 300,
						// width: 350,
						modal: true,
						buttons: {
							"Cancelar": function() {
								dialog.dialog( "close" );
								sourcevect.clear();
			           map.removeInteraction(draw);
							}
						},
						/*close: function() {
						//form[ 0 ].reset();
						allFields.removeClass( "ui-state-error" );
						}*/
					}
					);
					
					
					$('<p>You clicked here:</p><code>' + hdms +
			  '</code><p>Longitud: '+k.feature.getGeometry().getLength().toLocaleString('en-EN', {maximumFractionDigits:2})+'  m</p>').appendTo("#dialog-form");
					
					dialog.dialog( "open" );
						
						
			  
  
				//map.removeInteraction(draw);
				
				
			});
			draw.on('drawstart', function (k){
				//alert('empiezo linea 2462  5');
				sourcevect.clear();
				
			});
			
			
	});
	
	$( "#butMedirArea" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'url(http://sit.plansierra.org/PlanSierra/images/carea.png), help'});
			//$("#map").css({'cursor': 'pointer'});
			tools.socio = false;
			tools.capa = false;
			tools.refo =false;
			tools.busq =false;
			tools.dist = false;
			tools.area = true;
			
			
			
		// var pointerMoveHandler = function(evt) {
       /* if (evt.dragging) {
          return;
        }*/
        /** @type {string} */
        sourcevect.clear();
        // alert ('estoy en la linea 2425  0');  
      //var typeSelect = document.getElementById('typedigitalizacion');
		var geometryFunction = function(coordinates, geometry) {
				if (!geometry) {
				  geometry = new ol.geom.Polygon(null);
				  
				}
				var start = coordinates[0];
				var end = coordinates[1];
				geometry.setCoordinates([
				  [start, [start[0], end[1]], end, [end[0], start[1]], start]
				]);
				//alert ('estoy en la linea 2436   1');
				return geometry;
			  }
     // global so we can remove it later
	  //alert ('estoy en la linea 2440   2');
     //function addInteraction() {
        //var value = typeSelect.value;
        //if (value !== 'None') {
          draw = new ol.interaction.Draw({
            source: sourcevect,
            //maxPoints: 2,
			type: 'Polygon',
			//geometryFunction : geometryFunction
          });
		   //alert ('estoy en la linea 2450   3');
          map.addInteraction(draw);
		
		  //alert ('estoy en la linea 2452   3b');
      //  }
     //}
 			draw.on('drawend', function (k){
				//alert('termino    linea 2456   4');
				//alert(k.feature.getGeometry().getLength());
				
				
				var coordinate = k.feature.getGeometry().getLastCoordinate();
			  var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
				  coordinate, 'EPSG:3857', 'EPSG:4326'));


				$( "#dialog-form" ).empty();
					dialog = $( "#dialog-form" ).dialog({
						title: "Medida de area",
						autoOpen: false,
						// height: 300,
						// width: 350,
						modal: true,
						buttons: {
							"Cancelar": function() {
								dialog.dialog( "close");
								sourcevect.clear();
								map.removeInteraction(draw);
							}
						},
						
						
						
						/*close: function() {
						//form[ 0 ].reset();
						allFields.removeClass( "ui-state-error" );
						}*/
					}
					);
					
					
					$('<p>You clicked here:</p><code>' + hdms +
			  '</code><p><h4>Area: '+k.feature.getGeometry().getArea().toLocaleString('en-EN', {maximumFractionDigits:2})+' m2</p>').appendTo("#dialog-form");
					var tareas= ( k.feature.getGeometry().getArea())/628.86;
					$('<p></code><p><h4>Area: '+tareas.toLocaleString('en-EN', {maximumFractionDigits:2})+' Tareas</p>').appendTo("#dialog-form");	
					dialog.dialog( "open" );
						
						
			  
  
				//map.removeInteraction(draw);
				
				
			});
			draw.on('drawstart', function (k){
				//alert('empiezo linea 2462  5');
				sourcevect.clear();
				
			});
			
			
	});
	
	

});

	 $('#grafico80_A').empty();
 cargarGraficoAno(1);
//$("#grafico80").append("<agenciaforestal td width=1200px><h2	 align='left' style='color:darkred;'> <b><i >&nbsp;Actividad&nbsp"+nombreactividad+"&nbsp("+tipoactividad+")&nbsp </i></b></h2></td> ");

</script>


<!--AQUI DEFINIMOS EL MAPA QUE SE VA AREPRESENTAR EN EL SUR-->
<?php

include 'mapaactividadv01.php';

?>


<!--AQUI EFECTUAMOS LA BUSQUEDA DE PARCELAS Y SE GENRAN EL PANEL NOTER, SE PUEDE GENERAL EL EXCEL Y SE ACTUALIZA RL MAPA SUR CON EL CRITERIO DE BUSQUEDA SELECCIONADO.-->
<?php
include 'busquedaactividad.php';
?>
<script>

//DE AQUI ABAJO QUITE LA DEFINION DEL MAPA 964 a 1700 aprox

	
	
	//ARBOL DE CAPAS
	initializeTree();
	  
	$('#loading').hide();
	  
	$('input.opacity').slider().on('slide', function(ev) {
		var layername = $(this).closest('li').data('layerid');
		var layer = findBy(map.getLayerGroup(), 'name', layername);

		layer.setOpacity(ev.value);
	});
	

	// Handle visibility control
	
	
	$('i').on('click', function() {
		var layername = $(this).closest('li').data('layerid');
		var layer = findBy(map.getLayerGroup(), 'name', layername);

		layer.setVisible(!layer.getVisible());

		if (layer.getVisible()) {
			$(this).removeClass('glyphicon-unchecked').addClass('glyphicon-check');
		} else {
			$(this).removeClass('glyphicon-check').addClass('glyphicon-unchecked');
		}
	});
		
		
//});

//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************
//*************************************************************************************************************************************************************


/**
 * Finds recursively the layer with the specified key and value.
 * @param {ol.layer.Base} layer
 * @param {String} key
 * @param {any} value
 * @returns {ol.layer.Base}
 */
 
 //ESTA FUNCION DISPARA TODO EL PROCESO UNA VEZ SE DA EL VOTON DE CLCULLO
 function recargarGraficos(){
	 
	hacerBusqueda();
	cargarGraficoAnoCuenca();
	cargarGraficoAnoMicroCuenca();
	cargarGraficoAno(1);

}
 


//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

</script>
<script>

//FUNCION PARA GOOGLE ANALYTICS
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-64660106-1', 'auto');
  ga('send', 'pageview');
 
</script>