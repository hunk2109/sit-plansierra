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



<div class="pane ui-layout-south">
	<div id="loading">
	  <img id="loading-image" width=75 src="images/logo3_75_75.gif" alt="Loading..." />
	</div>

	<div id="map" style="height:100%; margin-right=0px">
		<div id="navTool" class="div-navTool">
			<div id='butInfoWMS' title="Información de las capas"><img height=24 src="images/info.png"/></div>
			<div id='butInfo' title="Información sociodemográfica"><img height=24 src="images/people_color.png"/></div>
			<div id='butUnselect' title="Limpiar selección"><img height=24 src="images/people.png"/></div>
		</div>
		
		
		
		<!-- Aqui se ponen las corrdenadas que aparecen en la esquina inferior izquierda-->
		<div style="width: 170px; height: 100px"  id="coord" class="div-coordenadas"></div>
		
		<div id="dialog-form"></div>
			</div>
</div>
<div class="pane ui-layout-east">
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
				 
				</div>
			</div>
			
		</div>
			
	</div>
</div>



<!--div class="pane ui-layout-north">North</div-->
<div class="pane ui-layout-center" id="center">
	<!--<div style="width: 50%; height: 100%; float:left" id="grafico1"></div>
	<div style="width: 50%; height: 100%; float:right" >
		
		<div id="grafico2" style ="height: 100%"></div>-->
		
		 <ul class="nav nav-pills" >
		 <li class="active"><a data-toggle="tab" href="#menu0">Plan Sierra</a></li>
			<li><a data-toggle="tab" href="#menu1">Subcuenca</a></li>
			<li><a data-toggle="tab" href="#menu2">Microcuenca</a></li>
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
											<div class="col-md-2">
											</div>
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
											
											<div class="col-md-6">
											    <h4 id="psTitulo92" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico92" class="table-striped bg-danger text-white" ></table>
												</div>
												
											</div>
											
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
											</div>
										</div>
										<div class="row">	
											<div class="col-md-12">
											    <h4 id="psTitulo94" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<h4 id="psTitulo94sub" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico94" class="table-striped bg-danger text-white" ></table>
												</div>
												<div class="table">
													<table id="psgrafico94B" class="table-striped bg-danger text-white" ></table>
												</div>
												<h4 id="psTitulo94bis" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												
												
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico94bis" class="table-striped bg-danger text-white" ></table>
												</div>
												
											</div>
										
											
											
											
											
											<div class="row">	
											  <div class="col-md-12">
											    <h4 id="psTitulo95" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												
												<div class="table">
													<table id="psgrafico95" class="table-striped bg-danger text-white" ></table>
												</div>
										      </div>
												
											</div>
											
										
										</div>
										
										<div class="row">	
											<div class="col-md-6">
											    <h4 id="psTitulo102" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico102" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											<div class="col-md-6">
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
											
											<div class="col-md-8">
											    <h4 id="psTitulo105" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="psgrafico105" class="table-striped bg-danger text-white" ></table>
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
											
											<div class="col-md-5">
											    <h4 id="Titulo92" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico92" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
											<div class="col-md-7">
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
											<div class="col-md-12">
											    <h4 id="Titulo96" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<h4 id="Titulo96sub" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico96" class="table-striped bg-danger text-white" ></table>
												</div>
												<div class="table">
													<table id="grafico96B" class="table-striped bg-danger text-white" ></table>
												</div>
												<h4 id="Titulo96bis" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												
												
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico96bis" class="table-striped bg-danger text-white" ></table>
												</div>
												
											</div>
										</div>
										<div class="row">	
											<div class="col-md-12">
											    <h4 id="Titulo97" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<h4 id="Titulo97sub" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico97" class="table-striped bg-danger text-white" ></table>
												</div>
												<div class="table">
													<table id="grafico97B" class="table-striped bg-danger text-white" ></table>
												</div>
												<h4 id="Titulo97bis" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												
												
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico97bis" class="table-striped bg-danger text-white" ></table>
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
											
											<div class="col-md-8">
											    <h4 id="Titulo105" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico105" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										
										</div>
										
										<div class="row">	
											<div class="col-md-12">
											    <h4 id="Titulo106" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<h4 id="Titulo106sub" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico106" class="table-striped bg-danger text-white" ></table>
												</div>
												<div class="table">
													<table id="grafico106B" class="table-striped bg-danger text-white" ></table>
												</div>
												<h4 id="Titulo106bis" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												
												
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico106bis" class="table-striped bg-danger text-white" ></table>
												</div>
												
											</div>
										</div>
										<div class="row">	
											<div class="col-md-12">
											    <h4 id="Titulo107" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<h4 id="Titulo107sub" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico107" class="table-striped bg-danger text-white" ></table>
												</div>
												<div class="table">
													<table id="grafico107B" class="table-striped bg-danger text-white" ></table>
												</div>
												<h4 id="Titulo107bis" width="74%" class="p-3 mb-2 bg-secondary   text-white  ".bg-success></h4>
												
												
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="grafico107bis" class="table-striped bg-danger text-white" ></table>
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
											
											<div class="col-md-6">
											    <h4 id="mTitulo92" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgrafico92" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										</div>	
										
										<div class="row">		
											
											<div class="col-md-6">
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
											<div class="col-md-8">
											    <h4 id="mTitulo104" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgrafico104" class="table-striped bg-danger text-white" ></table>
												</div>
											</div>
										
										</div>
										<div class="row">
											
											<div class="col-md-8">
											    <h4 id="mTitulo105" width="74%" class="p-3 mb-2 bg-danger   text-white  ".bg-success></h4>
												<!--<div id="grafico92"></div>-->
												<div class="table">
													<table id="mgrafico105" class="table-striped bg-danger text-white" ></table>
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
		
				<button type="button" class="btn btn-primay" title="Calcular" onclick="recargarGraficos()">Buscar 
								<img width=22 src="images/concentricos.png" alt="Cacular"/>
				</button>
			
				<br/><br/>
		
		</div>	
		
		<div id="layertree"  class="tree"></div>
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
<!--inserta la libreria de cambio de coordenadas
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>

<script type="text/javascript">


$("#tabCuenca").addClass("active");

//defino la proyeccoin 32619 que es WGS 84 UTM 19N
//
proj4.defs("EPSG:32619","+proj=utm +zone=19 +ellps=WGS84 +datum=WGS84 +units=m +no_defs");


//******************************************
// DEFINICION DE VARIABLES Y EVENTOS
//****************************************++
var groupCapas, groupSociodemo;
var tools = {socio:false};
var cpSelected = [], nacionalidad = ["RESTO", "EUROPA", "ASIA", "AMERICA", "AFRICA"], edades = [{capa:"POB_6599", titulo:"Población > 65"}, {capa:"POB_2965", titulo:"Población 29-65"}, {capa:"POB_2029", titulo:"Población 20-29"}, {capa:"POB_1519", titulo:"Población 15-19"}, {capa:"POB_0514", titulo:"Población 5-14"},{capa:"POB_0005", titulo:"Población 0-5"}];
var iso1, iso2, iso3, iso4, iso5, plantaciones_ano_en_curso, microcuencas_selected, plantaciones_cuencas_selected, parcelas, arg_cuencas, ensenas, loc = null, idAlcampo, idEncuesta, cuencas, microcuenca;
var sel, selLayer, osm, google, google_carto,parcelassel,sal,salid,codigobuscado,solo_plantaciones,dataano,dataespecie,xmed,ymed,xmin,xmax,ymin,ymax;
var comp = [[7,"7.- Híper > 9000"], [6, "6.- Híper 6000-8999"], [5,"5.- Híper 3500-5999"], [4,"4.- Mini Híper 2500-3499"], [3,"3.- Súper 1000-2499"], [2, "2.- Súper 400-999"], [1,"1.- Súper < 400"] ];
var myLayout;
var infoCV;
cuencas =99;
idAlcampo=99;
tipoactividad=1;
var f = new Date();

    var ffinal ="\'"+(f.getFullYear()+ "-" + (f.getMonth()+1 ) + "-" + f.getDate() )+"\'";
	var ffinal2 =f.getDate() + "-" + (f.getMonth()+1 ) + "-" + f.getFullYear();
var fi = new Date();
    //var fechafinal =+(fi.getDate() + "-" + (fi.getMonth() +1) + "-" + fi.getFullYear());
	var finicial ="\'"+((fi.getFullYear())+ "-" + 1+ "-" + 1)+"\'";
	var finicial2 =(1+ "-" + 1+ "-" + (fi.getFullYear()));
	

var nombreactividad="Todas SPSO";


//**********************************
// EVENTOS
//**********************************


$(document).ready(function () {
	myLayout = $('#content').layout({
		west__size:	'20%',
		east__size:	'35%',
		south__size:'70%',
		east__initClosed: true, 
		south__initClosed: true, 
		onresize: function () {
			map.updateSize();//alert('whenever anything on layout is redrawn.') 
		}	
	});
	
	$( "#butInfo" )
		.button()
		.click(function( event ) {
			//$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			$("#map").css({'cursor': 'pointer'});
			tools.capa = false;
			tools.socio = true;
			//alert ( 'estoy aqui en butInfo');
	});
		
	$( "#tabs" ).tabs();
	
	$( "#butInfoWMS" )
		.button()
		.click(function( event ) {
			$("#map").css({'cursor': 'url(https://cdn1.iconfinder.com/data/icons/CrystalClear/32x32/actions/contexthelp.png), default'});
			//$("#map").css({'cursor': 'url(https://cdn3.iconfinder.com/data/icons/bluecoral/Cursor.png), default'});
			tools.socio = false;
			tools.capa = true;
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
		
			//tipoactividad=2;
			var f = new Date();
    var ano = f.getFullYear() ;
			
			
			
			//CENTRO MAPA EN CUENCA
			
			




$.get("index.php?r=Puntos/GetPlantacionBoxSubcuenca&cuenca="+idAlcampo, function( data10 ) {

	  	data10=JSON.parse(data10);


	
	var xmin= parseFloat(9999999999.0);
	var xmax=parseFloat(-9999999999.0);
	var ymin=9999999999.0;
	var ymax=-9999999999.0;
	 
	//alert (xmin+'  x  '+ xmax);
	 
	// alert ('ahora el doble '+data10.length*19);
	 
	    for (i=0;i<data10.length;i++) {
			
			if (xmin>data10[i].xmin) {xmin=parseFloat(data10[i].xmin)};
			if (xmax<data10[i].xmax) {xmax=parseFloat(data10[i].xmax)};
			if (ymin>data10[i].ymin) {ymin=parseFloat(data10[i].ymin)};
			if (ymax<data10[i].ymax) {ymax=parseFloat(data10[i].ymax)};
			
	
		} 
			
		 var xmed=(parseFloat(xmin)+parseFloat(xmax))/2;
		 var ymed=(parseFloat(ymax)+parseFloat(ymin))/2;
	
		//alert (xmed +'   '+ymed);
	;
	 var cormin=ol.proj.transform([parseFloat(xmin),parseFloat(ymin)], 'EPSG:4326', 'EPSG:3857');
         var sal=ol.proj.transform([xmed,ymed], 'EPSG:4326', 'EPSG:3857');
	     var cormax=ol.proj.transform([parseFloat(xmax),parseFloat(ymax)], 'EPSG:4326', 'EPSG:3857');
	//alert (sal[0] +'   '+sal[1]);
	
	//var myExtent = [xmin,ymin,xmax,ymax];	
	var myExtent = [cormin[0],cormin[1],cormax[0],cormax[1]];
	map.getView().fitExtent(myExtent , map.getSize());
	
map.setView(new ol.View({
            center:[sal[0],sal[1]],
            zoom: 11
     }));


})



cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas="+idAlcampo);
		
		    
			cargarGraficoAnoCuenca();
		
			
			
<?php

//AQUI RELLENO EL DESPLEGABLE DE MICROCUENCA; ESTE EVENTO SE DISPARA CUANDO YA HE SELECCIONADO UNA CUENCA ?
			
		    $mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
            $rs4 = array();
//ss_micro_cuencas tiene todas las microcuencas consideradas en SPSO y cada microcuenca tiene un ID diferente
			$username =Yii::app()->user->id;
            foreach($mbd->query('SELECT 
  ss_micro_cuenca.descripcion as descripcion, 
  ss_micro_cuenca.codigo_micro_cuenca as codigo_micro_cuenca, 
  ss_micro_cuenca.codigo_cuenca as codigo_cuenca
 
FROM 
  public.users, 
  public.ss_micro_cuenca, 
  public.sig_users_cuencas
 
WHERE 
  users.id = sig_users_cuencas."user" AND
  
  sig_users_cuencas.micro_cuenca = ss_micro_cuenca.codigo_micro_cuenca and
   users.username=\''.$username.'\';') as $fila4) {
				 
				 
                   $c = null;								
                   $c['id'] =(int)$fila4['codigo_micro_cuenca'];
                   $c['nombre'] =$fila4['descripcion'];
				   $c['cuenca']= (int)$fila4['codigo_cuenca'];
                   array_push($rs4, $c);

              }


?>


data = <?php echo json_encode($rs4);?>;
 
	
	if (data.length == 0){
		<?php
			
			$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

            $rs4 = array();
//ss_micro_cuencas tiene todas las microcuencas consideradas en SPSO y cada microcuenca tiene un ID diferente
			$username =Yii::app()->user->id;
             foreach($mbd->query('SELECT 
				  ss_micro_cuenca.descripcion as descripcion, 
				  ss_micro_cuenca.codigo_micro_cuenca as codigo_micro_cuenca,
				  ss_micro_cuenca.codigo_cuenca as codigo_cuenca 
				  
				 
				FROM 
				 
				  public.ss_micro_cuenca
				
				 
				;') as $fila4) {
				 
				 
                   $c = null;								
                   $c['id'] =(int)$fila4['codigo_micro_cuenca'];
                   $c['nombre'] =$fila4['descripcion'];
				   $c['cuenca']= (int)$fila4['codigo_cuenca'];
                   array_push($rs4, $c);

              }

		?>
		
		data = <?php echo json_encode($rs4);?>;

	}
		$("#microcuenca").empty();
	     //data = <?php echo json_encode($rs4);?>;
	     var a = "<option value=999>microcuencas</option>";
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
	
	//se pinta la microcuenca seleccionada
	        microcuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas="+microcuenca);
	
$.get("index.php?r=Puntos/GetBoxMicrocuenca&x="+microcuenca, function( data10 ) {

	  	 data10=JSON.parse(data10);


	
	var xmin= (9999999999.0);
	var xmax=(-9999999999.0);
	var ymin=9999999999.0;
	var ymax=-9999999999.0;
	 
	//alert (xmax+'  xmax  '+ xmin);
	 
	// alert ('ahora el doble '+data10.length*19);
	 
	    for (i=0;i<data10.length;i++) {
			
			if (xmin>data10[i].xmin) {xmin=data10[i].xmin};
			if (xmax<data10[i].xmax) {xmax=data10[i].xmax};
			if (ymin>data10[i].ymin) {ymin=data10[i].ymin};
			if (ymax<data10[i].ymax) {ymax=data10[i].ymax};
	
		} 
			//alert (xmin+'  xmax  '+ xmax);
			//alert (ymin+'  xmax  '+ ymax);
		 var xmed=(parseFloat(xmin)+parseFloat(xmax))/2;
		 var ymed=(parseFloat(ymax)+parseFloat(ymin))/2;
	
		
		//alert (xmed+' ymed  '+ymed);
		
    
	
				//alert ((ymin+ymax)/2);
	map.setView(new ol.View({
            center:[xmed,ymed],
            zoom: 11
     }));

	})
 



	


		
	
	





	
			
	//se pinta las parcelas	de la microcuenca seleccionada	
			plantaciones_cuencas_selected.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel="+microcuenca);
			//parcelas.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map");
			
			//map.getLayersByName('Rios')[0].setVisibility(true);	
			
			var length=0;
			
			//var group= map.getLayerGroup();
			

			var layers = map.getLayerGroup();
			 //alert (layers.getLength());
			 
			var root= layers.getLayers();
			 var length = root.getLength();
			 
			  //alert (length);
			  var element = root.item(3);
			 // alert (element.Length);
			  var name=element.get('name');
			  //alert (name);
			  var layerssub=element.getLayers();
			   var length = layerssub.getLength();
			   //alert ('layersub  '+length);
			   //hacen no visibles las parcelas no seleccionadas
			   var element = layerssub.item(2);
			  //alert ('layersub2  '+element.Length);
			  var name=element.get('name');
			  //alert ('name  '+name);
			 element.setVisible(false);
			 //hacen no visibles la informacionpuntual.
			 var element = layerssub.item(4);
			  //alert ('layersub2  '+element.Length);
			  var name=element.get('name');
			  //alert ('name  '+name);
			 element.setVisible(false);
			 
	      }
	});
	
	
//***********************************************	
//RELLENAR COMBO DE CUENCA
//**********************************************
	
<?php
//DESPLEGABLE DE LA CUENCA
//primer desplegable originalemente hiper alcampo. Se mira en la base de datos a las cuencas que puede acceder el usuario

//OJO HE INTRODUCIDO MODIFICACIONE PORQUE NO FUNCIONABA
//BUSCO DIRECTAMENTE EN LA BASE DE DATOS SIN USAR LAS HERRAMIENTAS DE Yii


//CONEXION DIRECTA A LA BASE DE DATOS
$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

$rs3 = array();

$username =Yii::app()->user->id;

$query='SELECT 
  ss_cuenca.descripcion, 
  ss_cuenca.codigo_cuenca

FROM 
  public.users, 
  public.ss_cuenca, 
  public.sig_users_cuencas
WHERE 
  users.id = sig_users_cuencas."user" AND
  sig_users_cuencas.cuenca = ss_cuenca.codigo_cuenca and username=\''.$username.'\' group by ss_cuenca.descripcion, 
  ss_cuenca.codigo_cuenca;';

foreach($mbd->query($query) as $fila3) {
	$c = null;								
	$c['id'] =(int)$fila3['codigo_cuenca'];
	$c['nombre'] =$fila3['descripcion'];

	array_push($rs3, $c);

}


?>
		 $("#hiperAlcampo").empty();
	data = <?php echo json_encode($rs3);?>;
	//codigo_usuario = '<?php echo Yii::app()->user->name; ?>';
	//alert ('numero de cuencas '+ codigo_usuario);
	
	if (data.length == 0){
				<?php
			
			//$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

			$rs4 = array();
			
			
			$query2='SELECT 
			  ss_cuenca.codigo_cuenca, 
			  ss_cuenca.descripcion 
			 			FROM 
			 
			  public.ss_cuenca;';


			foreach($mbd->query($query2) as $fila4) {
				$c = null;								
				$c['id'] =(int)$fila4['codigo_cuenca'];
				$c['nombre'] =$fila4['descripcion'];

				array_push($rs4, $c);

			}


			?>	
			data = <?php echo json_encode($rs4);?>;
			}
	
	var a = "<option value=999></option>";
	$("#hiperAlcampo").append(a);
	for(var i = 0; i < data.length; i++){
		$('#hiperAlcampo').append($('<option>', {
				value: data[i].id,
				text: data[i].id+ '- '+ data[i].nombre
			}));
		
	}
	
	

//---------------------------------------------
//---------------------------------------------
//
//relleno desplegable del año
//
//---------------------------------------------
//---------------------------------------------
<?php

$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');

$rs3 = array();
	
foreach($mbd->query('SELECT ano FROM ano ORDER by ano DESC;') as $fila3) {


//SELECT ano FROM Estadisticas_plantacion GROUP BY ani  order by ano asc;') as $fila30) {
$c = null;								
$c['id'] =(int)$fila3['ano'];
$c['nombre']=$fila3['ano'];

array_push($rs3, $c);

}
	



?>

	

	

	
	
	
	
	//**********************************************
	//CARGAR MAPA epsg:25830
	//AQUI SE DEFINEN DIVERSAS CAPAS
	//
	//*************************************************
	
	
	
	//DEFINICION DEL SISTEMA DE PROYECCION UTILIZADO EN LA REPRESENTACION 
	//EPSG:3857 erts89 HUSO 30
	//OTROS POSIBLES
	//EPSG:4326 WGS84 GEOGRAFICA
	//EPSG:32619 WGS84 UTM ZONE 19N
	//EPSG:3857 WGS84 PSEUDO MERCATOR
	//OJO creo que no estan definidos en OpenLayers algunas proyecciones
	
	//*******************
	cargarGraficoAnoPlansierra();
	var projection = new ol.proj.Projection({
	  //ojo esto es muy importante aantes estaba en 3857 y daba problemas
	  code: 'EPSG:32619',
	  //code: 'EPSG:3857',
	  //NO SE SI A ESTO SE LE HACE CASO
	  // The extent is used to determine zoom level 0. Recommended values for a
	  // projection's validity extent can be found at http://epsg.io/.
	  //extent: [485869.5728, 76443.1884, 837076.5648, 299941.7864],
	  units: 'm'
	});


//DEFINICION DE CAPAS DE GOOGLE SATELITE O MAPA
//**********************************************
//me lo he llevado mas abajo para que puedan estar en el arbol


	
	//ol.proj.addProjection(projection);
	var layers = [];
	
	
//OSM
/*	 
var osm = new ol.layer.Tile({
	              name:'OSM',
                  source: new ol.source.OSM()
          });   
	 layers.push(osm); 	
	 
//GOOGLE	

 var google = new ol.layer.Tile({
            source: new ol.source.XYZ({
				
              //IMAGEN
			  
			  url: 'http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}'
			  
			 // mapa direccion URL y opacidad
			 //'https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}'
			 //opacity=08
            }),
			name:'Google',
			visible :true,
			opacity: 0.5
          });
	layers.push(google);
	*/
/*	
var parcelas = new ol.layer.Tile({
	name:'parcelas',
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map',
		params: {
			'LAYERS': 'PARCELAS', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true
			
		},
		//tileGrid: tileGrid
	})
});	
	 layers.push(parcelas);
*/
//djalsdlkas


/*
	var cuencas_selected = new ol.layer.Tile({
	name:'CUENCAS_SELECT',
	//visible: true,
	source: new ol.source.TileWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas='+idAlcampo,
		params: {
			'LAYERS': 'CUENCAS_SELECT', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true
			
		},
		//tileGrid: tileGrid
	})
});
layers.push(cuencas_selected);

*/
/*
var microcuencas_selected = new ol.layer.Tile({
	name:'MICROCUENCAS_SELECTED',
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&&cuencas='+idAlcampo,
		params: {
			'LAYERS': 'MICROCUENCAS_SELECT', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true
		},
		//tileGrid: tileGrid
	})
});

layers.push(microcuencas_selected);

*/





	 
/*
	var ign = new ol.layer.Tile({
		//extent: extent,
		id: 'wms_ign',
		name: "Mapa carreteras",
		url: 'images/ignbase_todo.png',
		source: new ol.source.TileWMS({
			url: 'http://www.ign.es/wms-inspire/ign-base?',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'IGNBaseTodo', 'SRS': 3857, viewparams: "par:data;par:data" }
			})
	})

	layers.push(ign);

	var pnoa = new ol.layer.Tile({
		//extent: extent,
		id:'wms_pnoa',
		name: "Mapa satélite",
		visible:false, 
		//url: 'images/ignbase_todo.png',
		source: new ol.source.TileWMS({
			url: 'http://www.ign.es/wms-inspire/pnoa-ma?',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'OI.OrthoimageCoverage', 'SRS': 3857, viewparams: "par:data;par:data" }
			})
	})

	layers.push(pnoa);
	*/
/*	
	var cod_postal = new ol.layer.Image({
		//extent: extent,
		id:'cod_postal',
		name: "Códigos postales",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=cod_postal_layer',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'cod_postal_layer', 'SRS': 3857 }
			})
	})

	layers.push(cod_postal);
	
	var municipios = new ol.layer.Image({
		//extent: extent,
		id:'municipios',
		name: "Municipios",
		visible:false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=municipios',
		source: new ol.source.ImageWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'municipios', 'SRS': 3857 }
			})
	})

	layers.push(municipios);
	
	
*/	
	
	//CAPAS SOCIO-DEMOGRÁFICAS
	/*var pob = [];
	
	$.each(nacionalidad, function(index, value){
		layer = new ol.layer.Tile({
			//extent: extent,
			id: 'nacionalidad'+index,
			name: value,
			visible: false,
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=' + value,
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
				crossorigin: 'anonymous',
					params: {'LAYERS': value, 'SRS': "EPSG:3857" }
				})
		})
	
		pob.push(layer);
	})
	var edad = [];
	
	$.each(edades, function(index, value){
		layer = new ol.layer.Tile({
			//extent: extent,
			id: value.capa,
			name: value.titulo,
			visible: false,
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=' + value.capa,
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
				crossorigin: 'anonymous',
					params: {'LAYERS': value.capa, 'SRS': "EPSG:3857" }
				})
		})
	
		edad.push(layer);
	})
	poblacion = new ol.layer.Tile({
		//extent: extent,
		id: 'poblacion',
		name: "POBLACION",
		visible: false,
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&zc=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=POBLACION',
		source: new ol.source.TileWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'POBLACION', 'SRS': "EPSG:3857"}
			})
	})
	
	//pob.push(poblacion);
	
	nacion = new ol.layer.Group({
		id: 'nacionalidad',
		name: 'Nacionalidad',
		layers: pob
	});
	
	ed = new ol.layer.Group({
		id:'edad',
		name: 'Edad',
		layers: edad
	});
	
	groupSociodemo = new ol.layer.Group({
		id:'sociodemografia',
		name: 'Sociodemografía',
		layers: [ed, nacion, poblacion]
	});
	layers.push(groupSociodemo);
	*/
	//---------------------------------------------------
	
	//*************************
	//ESTOAS CAPAS LAS NECESITO MIENTRAS HAGA PRUEBAS CON SIGMA
	//DESPUES LAS PUEDO QUITAR
	//********************************
/*	
	sel = new ol.layer.Image({
		//extent: extent,
		id: 'sel',
		name: "Seleccion",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO_POLYGON',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO_POLYGON', 'SRS': "EPSG:3857" }
		})
	})
	
	
*/	
//**************************
//variables relacionadas con la actualizacion de los mapas
//
//*********************************

	/*
	iso1 = new ol.layer.Image({
		//extent: extent,
		id: 'iso1',
		name: "Isocrona 1: 0-2",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO1',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO1', 'SRS': "EPSG:3857" }
		})
	})
	
	iso2 = new ol.layer.Image({
		//extent: extent,
		id: 'iso2',
		name: "Isocrona 2: 2-5",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO2',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO2', 'SRS': "EPSG:3857" }
		})
	})
	
	iso3 = new ol.layer.Image({
		//extent: extent,
		id: 'iso3',
		name: "Isocrona 3: 5-8",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO3',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO3', 'SRS': "EPSG:3857" }
		})
	})
	
	iso4 = new ol.layer.Image({
		//extent: extent,
		id: 'iso4',
		name: "Isocrona 4: 8-12",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO4',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO4', 'SRS': "EPSG:3857" }
		})
	})
	
	iso5 = new ol.layer.Image({
		//extent: extent,
		id: 'iso5',
		name: "Isocrona 5: 12-20",
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=ISO5',
		source: new ol.source.ImageWMS({
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&alcampo=1',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'ISO5', 'SRS': "EPSG:3857" }
		})
	})
	
	*/

	
	//***********************************
	//MUY IMPORTANTE COMPROBAR QUE ESTAN DEFINIDAS TODAS LAS VARIABLES Y LOS NOMBRE BIEN PUESTOS
	//
	// ESTA PARTE DEL PROGRAMA SOMBREA LA CUENCA SELECCIONADA
	//
	//*********************************
	
	cuencas_selected = new ol.layer.Image({
		//extent: extent,
		id: 'Cuenca-seleccionada',
		name: "Subcuenca seleccionada",
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas=99&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=CUENCAS_SELECT3',
		source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas=99',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'CUENCAS_SELECT3', 'SRS': "EPSG:3857" }
		})
	})
	
	
	
	microcuencas_selected = new ol.layer.Image({
		//extent: extent,
		id: 'Microcuenca-seleccionada',
		name: "Microcuenca seleccionada",
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas=99&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=MICROCUENCAS_SELECTED2',
		source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&cuencas=99',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'MICROCUENCAS_SELECTED2', 'SRS': "EPSG:3857" }
		})
	})
	
	
	//prueba de cartografia de parcelas
	plantaciones_cuencas_selected = new ol.layer.Image({
		//extent: extent,
		id: 'Plantaciones de Cuenca-seleccionada',
		name: "Plantaciones de Cuenca seleccionada",
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel=99&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_CUENCAS_SELECTED',
		source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&parcelassel=99',
		crossorigin: 'anonymous',
			params: {'LAYERS': 'plantaciones_cuencas_selected', 'SRS': "EPSG:3857" }
		})
	})
	
	
	
	
	
	
	
	
    arg_cuencas= new ol.layer.Image({
	id:'Subcuencas',
	name:'Subcuencas',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=CUENCAS_SELECT2',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'CUENCAS_SELECT2', 'SRS': "EPSG:3857"}
		
	})
})	
	
	parcelas = new ol.layer.Image({
	id: 'parcelas',
	name:'Parcelas',
	opacity :'0.45',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=TODAS_LAS_PLANTACIONES',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'todas_las_plantaciones', 'SRS': "EPSG:3857" }
	})
})	

		

//tipoactividad=2;

plantaciones_puntos = new ol.layer.Image({
	id: 'Puntos',
	name:'Puntos',
	opacity :'0.75',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad+'&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_PUNTOS_ACTIVIDAD_ANO',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/puntos.map&tipoactividad='+tipoactividad,
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Plantaciones_puntos_actividad_ano', 'SRS': "EPSG:3857" }
	})
})	
	fecha = new Date()
	ano=fecha.getFullYear();;
	doy=366;
	plantaciones_ano_en_curso = new ol.layer.Image({
		//extent: extent,
		id: 'Plantaciones de año en curso',
		name: "Plantaciones de año en curso",
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&ano='+ano+'&doy='+doy+'&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=PLANTACIONES_ANO_EN_CURSO',
		source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&ano='+ano+'&doy='+doy,
		crossorigin: 'anonymous',
			params: {'LAYERS': 'plantaciones_ano_en_curso', 'SRS': "EPSG:3857" }
		})
	})
	

	
	
	
	

	
//*************************************************
//AÑADO LA CAPA DE CUENCAS DEL PLAN SIERRA
//**************************************************	
	
	
	
	var cuencas_select = new ol.layer.Tile({
	name:'CUENCAS',
	visible: true,
	source: new ol.source.TileWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/catastro.map',
		params: {
			'LAYERS': 'CUENCAS', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true
		},
		//tileGrid: tileGrid
	})
});



//******************************************
//
//AQUI AÑADO LAS CARTOGGRSFIAS DE BASE propia
//
//********************************************************************


// ASOCIADAS A MDT


var mdt_srtm_sombreado = new ol.layer.Image({
	id: 'mdt_srtm_sombreado',
	name:'mdt_srtm_sombreado',
	opacity :'0.5',
	
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=mdt_srtm_sombreado',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map',
		crossorigin: 'anonymous',
		params: {
			'LAYERS': 'mdt_srtm_sombreado', 
			
			//'VERSION': '1.3.0',
			//'FORMAT': 'image/png',
			//'TILED': true,
			'SRS': "EPSG:32619" 
		},
		//tileGrid: tileGrid
	})
});

var mdt_srtm = new ol.layer.Image({
	id:'mdt_srtm',
	name:'mdt_srtm',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=mdt_srtm',
	
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map',
		crossorigin: 'anonymous',
		params: {
			'LAYERS': 'mdt_srtm', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true,
			'SRS': "EPSG:32619" 
		},
		//tileGrid: tileGrid
	})
});


var mdt_pendiente = new ol.layer.Image({
	id:'mdt_pendiente',
	name:'mdt_pendiente',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=mdt_pendiente',
	
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/raster.map',
		params: {
			'LAYERS': 'mdt_pendiente', 
			'VERSION': '1.3.0',
			'FORMAT': 'image/png',
			'TILED': true,
			'SRS': "EPSG:32619" 
		},
		//tileGrid: tileGrid
	})
});


//******************************************
//
//AQUI AÑADO LAS CARTOGRAFIAS DE BASE topografica
//
//********************************************************************


plan_sierra = new ol.layer.Image({
	id: 'Plan_Sierra',
	name:'Plan_Sierra',
	opacity :'1',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Plan_Sierra',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Plan_Sierra', 'SRS': "EPSG:32619" }
	})
})		
	

	

rios_principales = new ol.layer.Image({
	id: 'Rios_principales',
	name:'Rios_principales',
	opacity :'1',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Rios_principales',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Rios_principales', 'SRS': "EPSG:32619" }
	})
})		
		
		
rios = new ol.layer.Image({
	id: 'Rios',
	name:'Rios',
	opacity :'1',
	visible: false,
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Rios',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Rios', 'SRS': "EPSG:32619" }
	})
})			
		
cuencas_plan_sierra = new ol.layer.Image({
	id: 'Cuencas',
	name:'Cuencas',
	opacity :'0.3',
	visible: false,
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Cuencas_plan_sierra',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Cuencas_plan_sierra', 'SRS': "EPSG:32619" }
	})
})			
			
		

embalses_general = new ol.layer.Image({
	id: 'Embalses',
	name:'Embalses',
	opacity :'1',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Embalses_general',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/Basetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'Embalses_general', 'SRS': "EPSG:32619" }
	})
})			

osm_viario = new ol.layer.Image({
	id: 'OSM_viario',
	name:'OSM_viario',
	opacity :'0.75',
	
	url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/OSMBasetopografica.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=osm_viario',
	source: new ol.source.ImageWMS({
		url: 'http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/OSMBasetopografica.map',
		crossorigin: 'anonymous',
		params: {'LAYERS': 'osm_viario', 'SRS': "EPSG:32619" }
	})
})		





//******************************************
//
//AQUI AÑADO LAS CARTOGRAFIAS DE BASE OSM, Y GOOGLE POR EL MOMENTO
//
//********************************************************************
	 
 osm = new ol.layer.Tile({
	              name:'OSM',
				 
				  source: new ol.source.OSM({
					  params: { 'SRS': "EPSG:3857" }
					  
				  })
          });   
	 	
	 
//GOOGLE	

 google = new ol.layer.Tile({
            source: new ol.source.XYZ({
				
              //IMAGEN
			  
			  url: 'http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}'
			  
			 // mapa direccion URL y opacidad
			 //'https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}'
			 //opacity=08
            }),
			name:'Google',
			//visible :false,
			//opacity: 1
          });
	
google_carto = new ol.layer.Tile({
            source: new ol.source.XYZ({
				             			  
			  url: 'https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}'
			 
            }),
			name:'Google_carto',
			//visible :false,
			//opacity: 1
          });


//********************
//
//DEFINE ARBOLES DE LA LEYENDA//
//***********************
	groupCapas21 = new ol.layer.Group({
		id: 'Plan Sierra',
		name: 'Plan Sierra',
		layers: [plan_sierra]
	});
	//layers.push(groupCapas21);
	
	
	groupCapas2 = new ol.layer.Group({
		id: 'OSM',
		name: 'OSM',
		visible: false,
		layers: [osm]
	});
	//layers.push(groupCapas2);
	
	
	
	groupCapas3 = new ol.layer.Group({
		id: 'Imagen Google',
		name: 'Imagen Google',
		visible: false,
		layers: [google]
	});
	//layers.push(groupCapas3);
	
	groupCapas4 = new ol.layer.Group({
		id: 'Cartografía Google',
		name: 'Cartografía Google',
		visible: true,
		layers: [google_carto]
	});
	//layers.push(groupCapas4);
	
	groupCapas20 = new ol.layer.Group({
		id: 'Cartografia  base externa',
		name: 'Cartografía base externa',
		layers: [groupCapas2,groupCapas3,groupCapas4]
	});
	layers.push(groupCapas20);
	
	
	groupCapas1 = new ol.layer.Group({
		id: 'MDT',
		name: 'MDT',
		layers: [mdt_pendiente, mdt_srtm,mdt_srtm_sombreado]
	});
	layers.push(groupCapas1);
	

	
	groupCapas30 = new ol.layer.Group({
		id: 'Varios',
		name: 'Varios',
		layers: [ plan_sierra, osm_viario, rios_principales, rios, embalses_general, cuencas_plan_sierra]
	});
	
	layers.push(groupCapas30);
	
		
	
	
	
	groupCapas = new ol.layer.Group({
		id: 'Plantaciones',
		name: 'Plantaciones',
		layers: [cuencas_selected ,microcuencas_selected,arg_cuencas, parcelas, plantaciones_cuencas_selected,plantaciones_ano_en_curso, plantaciones_puntos ]
	});
	
	layers.push(groupCapas);
	

	
	
	
	//COMPETENCIA
	var competencia=[];
	$.each(comp, function(index, element){
		layer = new ol.layer.Tile({
			//extent: extent,
			id: 'ensenas'+element[0],
			name: element[1],
			visible: false, 
			source: new ol.source.TileWMS({
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&tipo='+element[0],
				crossorigin: 'anonymous',
					params: {'LAYERS': 'COMPETENCIA_1', 'SRS': 3857 }
				})
		})
		
		competencia.push(layer);
	});
		
	tamano = new ol.layer.Group({
		id:'tamano',
		name: 'Tamaño',
		layers: competencia
	});
	
	
	//ENSEÑAS
	var ensenas=[];
	$.ajax(
	{url: 'index.php?r=tblEtiqueta/getAll', 
	async: false,
	success: function (data){
		$.each(data, function(index, element){
			var visi = false;
			if(element.id == 1)
				visi = true;
			
			layer = new ol.layer.Tile({
				//extent: extent,
				id: 'ensenas_'+element.id,
				name: element.etiqueta,
				url: 'http://<?php echo Yii::app()->params['servidor'];?>/sigma/images/logos2/'+element.etiqueta+'.png',
				visible: visi, 
				source: new ol.source.TileWMS({
					url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&etiqueta='+element.id,
					crossorigin: 'anonymous',
						params: {'LAYERS': 'COMPETENCIA_2', 'SRS': 3857 }
					})
			})
			
			ensenas.push(layer);
		});
		
		
	}});
	/*
	groupEnsena = new ol.layer.Group({
		id:'ensenas',
		name: 'Enseñas',
		layers: ensenas
	});
		//layers.push(groupEnsena);
	
	
	
	groupCompe = new ol.layer.Group({
		id:'competencia',
		name: 'Competencia',
		layers: [groupEnsena, tamano]
	});
	layers.push(groupCompe);
	
	*/
	//---------------------------------------
	
	/*ensenas = new ol.layer.Tile({
		//extent: extent,
		id: 'ensenas',
		name: "Enseñas",
		visible: false, 
		url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map&SERVICE=WMS&VERSION=1.3.0&REQUEST=GetLegendGraphic&FORMAT=image/png&SLD_VERSION=1.1.0&LAYER=Ensenas',
		source: new ol.source.TileWMS({
			url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sigma/maps/sigma_3857.map',
			crossorigin: 'anonymous',
				params: {'LAYERS': 'Ensenas', 'SRS': 3857 }
			})
	})
	
	layers.push(ensenas);*/
	
	//**********************************************
	//
	//AQUI ESTA DEFINIDO EL CENTRO Y ZOOM DEL MAPA DE PARTIDA
	//
	//***************************************************
	
	map = new ol.Map({
		target: 'map',
		layers: layers,
		logo:'images/flechas.png',
		view: new ol.View({
		  //projection: projection,419322, 4941215
		  center: [-7910000, 2200000],
		  zoom: 10
		})
	});
	
	//NNOMBRE DE LA LEYENDA
	
	map.getLayerGroup().set('name', 'CAPAS DE INFORMACIÓN');
	
	
	
	//??????
	popupContainer = document.getElementById('popupInfo');
		var closerInfo = document.getElementById('popup-closer-medida');
		popupInfo = new ol.Overlay({
		  element: popupContainer
		});
		closerInfo.onclick = function() {
		  popupContainer.style.display = 'none';
		  //closer.blur();
		  return false;
	};
	map.addOverlay(popupInfo);
	tabs = $( "#popup-content-info" ).tabs();
	
	//*****************
	//
	//FUNCIONES QUE TIENEN QUE VER CON EL MAPA
	//
	//********************************
	
	
	//COORDENADAS QUE APARECEN EN PANTALLA CUANDO SE MUEVE EL CURSOSR
	
	
	map.on('pointermove', function(event) {
		var coord = event.coordinate;
		sal=ol.proj.transform( coord, 'EPSG:3857', 'EPSG:4326');
		//HAY UN PROBLEMA DE CONVERSIONA WGS84 UTM 19N POR ESO ESTA COMENTADA LA SIGUINETE LINEA Y NO APARECE EN PANTALLA
		salid=ol.proj.transform( sal, 'EPSG:4326', 'EPSG:32619');
		$('#coord').html(ol.coordinate.toStringXY(coord, 2) + "<br> WGS 84  PseudoMercator<br> " +ol.coordinate.toStringXY(sal, 6) + "<br> WGS 84  Geograficas<br>" +ol.coordinate.toStringXY(salid, 0) + "<br> WGS 84  UTM 19N<br>");	
	});
 
 
	
	//PINCHAR EN UN LA PANTALLA
	
	map.on('singleclick', function(event) {
		if(tools.socio){
			
			/*$('#tabs-1').empty();
			$('#tabs-2').empty();
			$('#tabs-3').empty();
			$('#tabs-4').empty();		
			$('#tabs-5').empty();
		
			$('#tabs-7').empty();
			$('#tabs-8').empty();
			$('#tabs-9').empty();*/
			myLayout.close('east');
			 
			//alert ('estoy aqui');
			var x = event.coordinate[0];
			var y = event.coordinate[1];
			//alert (x+'   '+y);
			var resolution = map.getView().getResolution();
			var content = document.getElementById('popup-content');
			lastCoords = event.coordinate;
			map.getLayers().getArray()[1].getLayers().getArray()[0];
			//Alertas para vigilancia
			//alert (x +" - "+y);
			
			
	         sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:32619');
			//alert ('X  '+sal[0]+'  Y  '+sal[1]);
			
			
			
			
//PRUBAS DE PREGUNTA leeo el model digital del terreno


	$.get("index.php?r=CartoBase/GetElevacion&x="+sal[0]+"&y="+sal[1], function( data10 ) {

	  	 data10=JSON.parse(data10);
		 
	    
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			//alert ('Altitud  '+data10[0].Altitud);
			
			 $('#infoCompeEns10').empty();
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data10[0], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#infoCompeEns10');
					}	)		
			
               myLayout.open('east');
	})
			
			$.get("index.php?r=CartoBase/GetPendiente&x="+sal[0]+"&y="+sal[1], function( data10 ) {

	  	 data10=JSON.parse(data10);
		 
	    
			 //solo escojo las microcuencas de la cuenca ya seleccionada
			//alert ('Altitud  '+data10[0].Altitud);
			
			 //$('#infoCompeEns10').empty();
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data10[0], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#infoCompeEns10');
					}	)		
			
               myLayout.open('east');
	})				
			
	
//fin de pregunta a raster	


	
			sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:4326');
			//alert (sal[0]+'    '+sal[1]);
			//problemas con la proyeccion en 
			//sal[0]=280604;
			//sal[1]=2142553;
			//interrogar al modelo digital del terreno grupo 1 capa 1
			/*
			var length=0;
			
			//var group= map.getLayerGroup();
			

			var layers = map.getLayerGroup();
			 //alert (layers.getLength());
			 
			var root= layers.getLayers();
			 var length = root.getLength();
			 
			// alert (length);
			  var element = root.item(1);
			 // alert (element.Length);
			  var name=element.get('name');
			 // alert (name);
			  var layerssub=element.getLayers();
			   var length = layerssub.getLength();
			 //  alert ('layersub  '+length);
			   //hacen no visibles las parcelas no seleccionadas
			   var element = layerssub.item(1);
			  //alert ('layersub2  '+element.Length);
			  var name=element.get('name');
			 // alert ('name  '+name);
			 element.setVisible(false); 
			// alert ('sas  '+event.coordinate[0]+'   '+event.coordinate[1]);
			// //var coord2[];
			 var coord2=element.getPixelFromCoordinate(event.coordinate);
			
			// alert ('sasass  '+coord2);
			 
			*/
			sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:4326');
			//alert (sal[0]+'    '+sal[1]);
			
			$.get( "index.php?r=puntos/GetSelectMicrocuenca&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data10 ) {
			
				
				data10=JSON.parse(data10);
				//ert ('Cuenca = ' +data10[0].sub_cuenca+' - '+data10[0].mic_cuenca);	
				//
                $('#infoCompeEns9').empty();
				for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data10[j], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#infoCompeEns9');
			})			
		}	
               //myLayout.open('east');
				})
				
	$.get( "index.php?r=areas/GetSelectParaje&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data11 ) {
			
				
				data11=JSON.parse(data11);
				//ert ('Cuenca = ' +data10[0].sub_cuenca+' - '+data10[0].mic_cuenca);	
				//
                $('#infoCompeEns9B').empty();
				for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data11[j], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#infoCompeEns9B');
			})			
		}	
               myLayout.open('east');
				})		
				
				
			/*
			var url = sel.getSource().getGetFeatureInfoUrl(evt.coordinate,map.getView().getResolution()*10, map.getView().getProjection(),
                        {
							'INFO_FORMAT': 'text/plain'
                        }
                    );
			$.get(url, function (data){
			   var f = data.split('Feature ');
			   cod = f[1].replace(/(\r\n|\n|\r|\:|\s)/gm,"");
			   if(cod.length == 6)
				   cod = '0'+cod;
			   cpSelected.push(cod);
					selLayer = new ol.layer.Image({
						//extent: extent,
						id: 'sel',
						name: "Seleccion",
						source: new ol.source.ImageWMS({
						url: 'http://<?php echo Yii::app()->params['servidor'];?>/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/maps/puntos.map',
						crossorigin: 'anonymous',
							params: {'LAYERS': 'Plantaciones_puntoss', 'SRS': "EPSG:3857" }
						})
					})
					
					map.addLayer(selLayer);
			   infoCP();
		   })*/
		}
		
		
		
		//primer  icono del mapa
		//
		//
		//______________________________________________________
		
		
		if(tools.capa){
			//se determina donde se ha pinchado. devuleve las coordenada en Pseudomercator y se convierten a geograficas
			var x = event.coordinate[0];
			var y = event.coordinate[1];
			var resolution = map.getView().getResolution();
			var content = document.getElementById('popup-content');
			lastCoords = event.coordinate;
			map.getLayers().getArray()[1].getLayers().getArray()[0];
			//Alertas para vigilancia
			//alert (x +" - "+y);
			
		
			sal=ol.proj.transform([x,y], 'EPSG:3857', 'EPSG:4326');
			
			//Alerta para comprobar cambio de coprdenada a geografica
			//alert ('Lon = ' +sal[0] +"   Lat = "+sal[1]);
			
			
			//Aqui se hace la consulta a la base de datos . Se está utilizando la consulta a punto de medi-ambient
			
			
		
			//aqui preguntamos por el poligono. OJO esto tiene que devolver tan solo los numeros de plantacion. filtarados para que solo haya uno
			
			
			$.get( "index.php?r=puntos/GetSelectPlantacion&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data ) {
			
				
				data=JSON.parse(data);
				
			
				console.info(data);
				var datos=[];
				//alert ('Longitud = ' +data.length );
				var codigo_old=0;
				for(var i=0; i < data.length; i++){
					var dato={
						gid:data[i].gid,
						codigo:data[i].codigo,
						//tipo:data[i].tipo,
						//especie:data[i].Especie	,
						//ano:data[i].Año_plantación
					}
						
					//if (codigo_old!=data[i].codigo)	{
					datos.push(dato);
					//alert (' lo meto');
					//}
					//alert (codigo_old +'   '+data[i].codigo);
					codigo_old=data[i].codigo;
				}	
				for(var i=0; i < data.length; i++){
				//alert ('Parcela = ' +datos[i].codigo);
				}
				//EN PRUEBAS
				
				if(data.length >1){
						$( "#dialog-form" ).empty();
						dialog = $( "#dialog-form" ).dialog({
							title: "Parcelas en el area",
							autoOpen: false,
							// height: 300,
							// width: 350,
							modal: true,
							buttons: {
								"Ver información": function(){
									dialog.dialog( "close" );
									var coordenadas = "vacio";
									var idMuestra = "vacio";
									var idPunto = "vacio";
									verGrafico(data, event, coordenadas, idMuestra, idPunto);
								},
									"Cancelar": function() {
									dialog.dialog( "close" );
								}
							},
							/*close: function() {
							//form[ 0 ].reset();
							allFields.removeClass( "ui-state-error" );
							}*/
						}
						);
						
						
						var $select = $('<select id="featuresFound">').appendTo("#dialog-form");
						var codigo_old=0;
						for(var j=0; j < datos.length; j++){
							//esto es para que no duplique codigos de plantacion
							//if (datos[j].codigo != codigo_old ){
							$("<option />", {value: datos[j].gid, text:( datos[j].codigo ) }).appendTo($select);
							codigo_old=datos[j].codigo ;
						//}
						}
						dialog.dialog( "open" );
				
				}else{
						var coordenadas = "vacio";
						var idMuestra = "vacio";
						var idPunto = "vacio";
						
						verGrafico(data, event, coordenadas, idMuestra, idPunto);
					}
				
				//FIN DE PRUEBAS
				
				
				
				
				
				

				
					/*if(data.length >1){
						$( "#dialog-form" ).empty();
						dialog = $( "#dialog-form" ).dialog({
							title: "Puntos disponibles",
							autoOpen: false,
							// height: 300,
							// width: 350,
							modal: true,
							buttons: {
								"Ver información": function(){
									dialog.dialog( "close" );
									var coordenadas = "vacio";
									var idMuestra = "vacio";
									var idPunto = "vacio";
									verGrafico(data, event, coordenadas, idMuestra, idPunto);
								},
									"Cancelar": function() {
									dialog.dialog( "close" );
								}
							},
							
						});
						var $select = $('<select id="featuresFound">').appendTo("#dialog-form");
						for(var i=0; i < data.length; i++){
							$("<option />", {value: data[i].id, text: data[i]['Nom llarg']}).appendTo($select);
						}
						dialog.dialog( "open" );
					}else{
						var coordenadas = "vacio";
						var idMuestra = "vacio";
						var idPunto = "vacio";
						
						verGrafico(data, event, coordenadas, idMuestra, idPunto);
					}*/
				})
			
			
			
			
			
			
			
			
			
			//ESTO ES ANTIGUO
			/*visibles = [];
			getActiveLayers(map.getLayerGroup());
			tabs.find( ".ui-tabs-nav" ).empty();
			//tabs.find( ".ui-tabs-nav" ).empty();
			//$(".ui-tabs-nav").empty();
			$.each(visibles, function(index, value){
				var url = value.getSource().getGetFeatureInfoUrl(evt.coordinate, map.getView().getResolution()*5, map.getView().getProjection(), {
                            'INFO_FORMAT': 'text/html'
                        }
                    );
				
				$.get(url, function(data){
					
					if(data.toString()!="[object XMLDocument]" && data.toString()!=""){
						popupInfo.setPosition(evt.coordinate);
						popupContainer.style.display = 'block';
						var label = value.get('name');
						id = "tabs-"+value.get('id');
						if(id!="tabs-wms_ign"){
							$("#"+id).empty();
							//tabs = $("#popup-content-info");
							
							li = "<li><a href='#"+id+"'>"+label+"</a></li>";
							var tabContentHtml =data.toString();
							
							$("#"+id).text('');
							$("#"+id).remove();
							tabs.find( ".ui-tabs-nav" ).append( li );
							tabs.tabs({ active: 0 });
							tabs.append( "<div id='" + id + "'>" + tabContentHtml + "</div>" );
							tabs.tabs('refresh');
						}
					}else{
						id = "tabs-"+value.get('id');
						$("#"+id).empty();
						$("#"+id).text('');
						$("#"+id).remove();
					}
					
				})
			})
			
			 var pan = ol.animation.pan({
				duration: 1000,
				source: /** @type {ol.Coordinate} */ 
				
				/*(map.getView().getCenter())
			 });
			 map.beforeRender(pan);
			 map.getView().setCenter(evt.coordinate);
			  */
			  
			//map.getView().setCenter(evt.coordinate);
		}
		
	})
	
	
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
		
		
});

function infoCP(){
	console.log(cpSelected.toString());
	/*$.get('index.php?r=GeoSecciones/infoExtranjerosISO&id=' + cpSelected.toString(), function (data3){
	

  myLayout.open('east');
   $('#infoExtr').empty();
	
   $('#infoExtr').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			width: 300,
			type: 'pie'
		},
		title:{text:''},
		subtitle: {
			text: 'Total extranjeros: ' + data3[0][1][1].toFixed(0)
		},
		credits:{enabled:false},
		exporting:{enabled:false},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			//type: 'pie',
			name: 'Total',
			size: '60%',
			data: data3[0]
		},{
			//type: 'pie',
			 size: '80%',
			 innerSize: '60%',
			name: 'Nacionalidad',
			data: data3[1]
		}]
	});
})*/
myLayout.open('east');

$.get('index.php?r=geoCp/getCompeISO&id='+ cpSelected.toString(), function (data3){
	$("#infoCompeEns").empty();
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />")
	$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th>Enseña</th>"));
	row.append($("<th>Superficie</th>"));
	row.append($("<th>Número</th>"));
	var i = 0;
	var c = 0, s =0;
	$.each(data3, function(index, value){
		if(i<10){
			var row = $("<tr />")
			$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td style='text-align:left'>" + value.ensena + "</td>"));
			row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
			totalSup += value.superficie;
			totalNum += value.total;
		}else{
			c += value.total;
			s += value.superficie;
			totalSup += value.superficie;
			totalNum += value.total;
		}
			
			i++;
	});
	var row = $("<tr />");
	$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<td style='text-align:left'>Resto</td>"));
	row.append($("<td>" + s.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
	row.append($("<td>" + c.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
	
	var row = $("<tr />");
	$("#infoCompeEns").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th><b>Total</b></th>"));
	row.append($("<th>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</th>"));
	row.append($("<th>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</th>"));
 });
$.get('index.php?r=geoCp/getCompeSupISO&id='+ cpSelected.toString(), function (data3){
	$("#infoCompeSup").empty();
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />")
	$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th>Tipo</th>"));
	row.append($("<th>Superficie</th>"));
	row.append($("<th>Número</th>"));
	$.each(data3, function(index, value){
			var row = $("<tr />")
			$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td  style='text-align:left'>" + value.tipo + "</td>"));
			row.append($("<td>" + value.superficie.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td>" + value.total.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</td>"));
			totalSup += value.superficie;
			totalNum += value.total;
	});
	var row = $("<tr />");
	$("#infoCompeSup").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th><b>Total</b></th>"));
	row.append($("<th>" + totalSup.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</th>"));
	row.append($("<th>" + totalNum.toLocaleString('es-ES', {maximumFractionDigits:0}) + "</th>"));
 });

/*
$.get('index.php?r=tblIsoPob/getPobIso&id_encuesta='+idEncuesta+'&id='+cpSelected.toString()+'&tipo=m', function(data){
		$("#infoPobM").empty();
		var row = $("<tr />")
		$("#infoPobM").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th>Municipio</th>"));
		row.append($("<th>Población</th>"));
		row.append($("<th>Hogares</th>"));
		var tot = 0;
	  $.each(data, function(index, value){
		  $.each(value, function(i, val){
				total = 0;
				totalH = 0;
				sufix = ": 0-2'";
				if(i==2)
					sufix = ": 2-5'";
				if(i==3)
					sufix = ": 5-8'";
				if(i==4)
					sufix = ": 8-12'";
				if(i==5)
					sufix = ": 12-20'";
				$.each(val,function(m, n){total+=parseFloat(n.pob);totalH+=parseFloat(n.hog);});
				var row = $("<tr />")
				$("#infoPobM").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				row.append($("<th>Isocrona "+i+ sufix +"</th>"));
				row.append($("<th>"+total.toLocaleString('es-ES', {maximumFractionDigits:0})+"</th>"));
				row.append($("<th>"+totalH.toLocaleString('es-ES', {maximumFractionDigits:0})+"</th>"));
				$.each(val, function(k, v){
					var row = $("<tr />")
					$("#infoPobM").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td>"+k+"</td>"));
					row.append($("<td>"+v.pob.toLocaleString('es-ES', {maximumFractionDigits:0})+"</td>"));
					row.append($("<td>"+v.hog.toLocaleString('es-ES', {maximumFractionDigits:0})+"</td>"));
				})
				tot+=total;
		  })
		 
	  })
	  $("#totalPob").text("Población total: " + tot.toLocaleString('es-ES', {maximumFractionDigits:0}));
	  //$('#infoPobS')
	
})
/*
$.get('index.php?r=tblIsoPob/getPobIso&id_encuesta='+idEncuesta+'&id='+cpSelected.toString()+'&tipo=d', function(data){
		$("#infoPobD").empty();
		var row = $("<tr />")
		$("#infoPobD").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th>Distrito</th>"));
		row.append($("<th>Población</th>"));
		row.append($("<th>Hogares</th>"));
	  $.each(data, function(index, value){
		  $.each(value, function(i, val){
				sufix = ": 0-2'";
				if(i==2)
					sufix = ": 2-5'";
				if(i==3)
					sufix = ": 5-8'";
				if(i==4)
					sufix = ": 8-12'";
				if(i==5)
					sufix = ": 12-20'";
				var row = $("<tr />");
				$("#infoPobD").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
				var total = 0;
				var totalH = 0;
				$.each(val,function(m, n){total+=parseFloat(n.pob);totalH+=parseFloat(n.hog);});
				row.append($("<th>Isocrona "+i+sufix+"</th>"));
				row.append($("<th>"+total.toLocaleString('es-ES', {maximumFractionDigits:0})+"</th>"));
				row.append($("<th>"+totalH.toLocaleString('es-ES', {maximumFractionDigits:0})+"</th>"));
				$.each(val, function(k, v){
					var row = $("<tr />")
					$("#infoPobD").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td>"+k+"</td>"));
					row.append($("<td>"+v.pob.toLocaleString('es-ES', {maximumFractionDigits:0})+"</td>"));
					row.append($("<td>"+v.hog.toLocaleString('es-ES', {maximumFractionDigits:0})+"</td>"));
				})
			   console.log(i);
		  })
		 
	  })
	  //$('#infoPobS')
	  
	
})
*/
/*$.get('index.php?r=tblIsoPob/getPobIso&id_encuesta='+idEncuesta+'&id='+cpSelected.toString(), function(data){
		$("#infoPobS").empty();
		var row = $("<tr />")
		$("#infoPobS").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		row.append($("<th>Distrito</th>"));
		row.append($("<th>Población</th>"));
	  $.each(data, function(index, value){
		  $.each(value, function(i, val){
				var row = $("<tr />")
				$("#infoPobS").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into i
				row.append($("<th>Isocrona "+i+"</th>"));
				$.each(val, function(k, v){
					var row = $("<tr />")
					$("#infoPobS").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td>"+k+"</td>"));
					row.append($("<td>"+v+"</td>"));
				})
			   console.log(i);
		  })
		 
	  })
	  //$('#infoPobS')
	
})*/
}


//****************************************
//
// FUNCIONES DE CARGA DE GRAFICOS.
//
//***********************************+


//PRIMER GRAFICO TARTA ESPECIES


//function para las subcuencas
function cargarGraficoAnoCuenca(){
	//plantaciones_ano_en_curso.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&ano=2018&doy=161");
		
	$('#grafico80').empty();
	
	var f = new Date();
    var dia =(f.getDate() + "-" + (f.getMonth() +1) + "-" + f.getFullYear());
	var fecha = new Date();
	var id2 = fecha.getFullYear();
	var ano =id2;
	
	

   
	
	
	
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
	subcuenca =idAlcampo;
	
	$.get('index.php?r=Quest/GetSubcuenca&subcuenca='+subcuenca, function (datacuenca){
	
	
	datacuenca= JSON.parse(datacuenca);
	
	var nombrecuenca=datacuenca[0].respuesta;
	//alert (datacuenca[0].respuesta);
	$("#grafico80").append("</td>   <td ><h3><b>&nbsp  Subcuenca: "+nombrecuenca+"</h3><h4>&nbsp; Fecha de consulta :&nbsp; " +dia+ ", (desde: " +finicial2+"&nbsp; a&nbsp;: "+ffinal2+"&nbsp ) </b></h4></td> " );
	
})



	//$("#grafico80_A").html('<img id="loading-image" width=200 src="images/logo3_75_75.gif" alt="Loading..." />');
		$('#grafico90').empty();
		$('#grafico91').empty();
		$('#grafico92').empty();
		$('#grafico93').empty();
		$('#grafico93').empty();
		$('#Grafico94').empty();
		$('#Grafico94B').empty();
		$('#grafico100').empty();
		$('#grafico101').empty();
		$('#grafico102').empty();
		$('#grafico103').empty();
		$('#grafico104').empty();
		$('#graficoA2').empty();
		$('#graficoA3').empty();
		//$("#grafico101").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
		//$("#grafico91").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	  $('#pobEdad0').empty();
		$('#pobEdad1').empty();
		$('#pobEdad2').empty();
		$('#pobEdad3').empty();
		$('#pobEdad4').empty();
		$('#Titulo0').empty();
		$('#Titulo1').empty();
		$('#Titulo2').empty();
		$('#Titulo3').empty();
		$('#Titulo4').empty();
		$('#TituloA2').empty();
		$('#TituloA3').empty();
		$('#grafico2').empty();
		$('#grafico21').empty();
		$('#grafico22').empty();
		$('#Titulo94').empty();
		$('#Titulo94B').empty();
		$('#infoTablaCorta').empty();
	    $('#infoTablaLarga').empty();
     	$('#infoTablaLarga2').empty();
    	$('#infoTablaLarga3').empty();
		

		
		//$("#grafico101").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	//$("#grafico90").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	

///	 
   
if (document.getElementById("checkfecha").checked != true ) {   
   
$.get('index.php?r=Meteoro/GetMesAnoMedio', function (data){
	$.get('index.php?r=Meteoro/GetMesAnoActual', function (data1){
	
	
	data = JSON.parse(data);			
	data1 = JSON.parse(data1);
	
$('#grafico101').empty();	
$('#grafico101').highcharts({

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
/*
if (document.getElementById("checkfecha").checked != true ) {   
//$.get('index.php?r=Poa/GetAvanceSubcuenca&tipoactividad='+tipoactividad+'&ano='+ano+'&subcuenca='+idAlcampo, function (data){
$.get('index.php?r=Poa/GetAvanceSubcuenca2&tipoactividad='+tipoactividad+'&ano='+ano+'&subcuenca='+idAlcampo, function (data){

	data = JSON.parse(data);
	categorias=[];
	serie1=[];
	serie2=[];
	serie3=[];
	for (i=0; i<data.length; i++){
		categorias.push(data[i].plantacion);
		serie1.push(data[i].tareasejecutadas);
		serie2.push(data[i].tareasprevano);
		serie3.push((data[i].tareasejecutadas/data[i].tareasprevano)*100);
		
	}
	//tareas trabajadas	
	 	
$('#grafico90').empty();
	
$('#grafico90').highcharts({

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

	//tanto por ciento de objetivos cumplidos
		
	$('#grafico91').empty();
	
$('#grafico91').highcharts({

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

	$("#TituloA2").empty();
	
	$('#graficoA2').empty();	
	//tabla de avances	
	$("#TituloA2").append("<td><h4><b>" +"Actividad de reforestación:  Avance / Meta = % de cumplimiento" + "</b></h4></td>" );
		
		
	 var row = $("<tr />");
		$("#graficoA2").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=25%><h4><b>Tipo de actividad.</b></h4></td>"));
		
		row.append($("<td width=25%><h4><b>Meta</b></h4></td>"));
		row.append($("<td width=30%><h4><b>Avance</b></h4></td>"));
		row.append($("<td width=30%><h4><b>% Cumplimiento</b></h4></td>"));
			var row = $("<tr />")	
			$("#graficoA2").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data.length; i++){
			
			
			$("#graficoA2").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data[i].plantacion.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data[i].tareasprevano.toLocaleString('en-EN', {maximumFractionDigits:2}) + "</td>"));
			row.append($("<td><h5>" + data[i].tareasejecutadas.toLocaleString('en-EN', {maximumFractionDigits:2}) + "</td>"));
			if (data[i].tareasprevano ==0) {
			row.append($("<td><h5> 100.00</td>"));
			}else{
				 porce=(data[i].tareasejecutadas/data[i].tareasprevano)*100;
			row.append($("<td><h5>" + porce.toLocaleString('en-EN', {maximumFractionDigits:2}) + "</td>"));
			}
			var row = $("<tr />");
			
			$("#graficoA2").append(row); 
		
		}	
     

		
})
}*/

////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('#grafico90').empty();
	$('#grafico91').empty();
	$("#TituloA2").empty();
	$("#graficoA2").empty();
subcuenca=idAlcampo;

$("#grafico92").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	$.get('index.php?r=Poa/GetActividadTodaActividadPorSubcuenca&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){
	data3 = JSON.parse(data3);	

	$.get('index.php?r=Poa/GetActividadPoa&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data5){
				//+'&subcuenca='+cuenca+'&microcuenca='+microcuenca
			data5 = JSON.parse(data5);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#TituloA2").empty();
	$("#TituloA2").append("<td><h4><b>" +" Tipo de actividad de reforestación</b></h4><h5>*(Realizadas entre fechas, Planificadas años completos)</h5></td>" );
	$('#graficoA2').empty();
	 var row = $("<tr />");
		$("#graficoA2").append(row); 
		row.append($("<th></th>"));
		//row.append($("<td width=30%><h5><b>Actividad</b></h5></td>"));
		row.append($("<td width=40%><h4><b>Actividad</b></h4></td>"))	
		row.append($("<td width=30%><h4><b>Realizadas</b></h4></td>"));
		row.append($("<td width=30%><h4><b>Planificadas</b></h4></td>"));
		var row = $("<tr />");	
		$("#graficoA2").append(row); 
			
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
				$("#graficoA2").append(row); 
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
					
				$("#graficoA2").append(row); 
			}
			
		
			})
		row.append($("<th></th>"));
	})






//////////////////////////////////////////////////////////////////////////////////////////////////////////

	subcuenca=idAlcampo;
    $('#grafico92').empty();
	$("#grafico92").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	$.get('index.php?r=Poa/GetActividadTodaActividadPorSubcuenca&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$('#Titulo92').empty();
		$("#Titulo92").append("<td><h4><b>" +" Tipo de actividad de reforestacion "+"</b></h4></td>" );
	 $('#grafico92').empty();	
	
	 var row = $("<tr />");
		$("#grafico92").append(row); 
		row.append($("<th></th>"));
		//row.append($("<td width=30%><h5><b>Actividad</b></h5></td>"));
		row.append($("<td width=40%><h4><b>Fase</b></h4></td>"));
		
		row.append($("<td width=30%><h4><b>Plantaciones</b></h4></td>"));
		row.append($("<td width=30%><h4><b>Tareas</b></h4></td>"));
			var row = $("<tr />")	
			$("#grafico92").append(row); 
			
		var totalsup=0;
		var sumatotales=[];
		sumatotales[0]=0;
		sumatotales[1]=0;
		for (var i=0; i < data3.length; i++){
			
			if (data3[i].tipo != 'Otros1'){
			$("#grafico92").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			//row.append($("<td><h5>" + data3[i].actividad.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			sumatotales[0]=sumatotales[0]+data3[i].plantas;
			sumatotales[1]=sumatotales[1]+data3[i].tareas;
			var row = $("<tr />");
			
			$("#grafico92").append(row); 
			}
		}
		
	})
	
	
	$.get('index.php?r=Poa/GetActividadTodaActividadSubcuencaListadoParcelas&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca,  function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#Titulo100").empty();
	$('#grafico100').empty();
		$("#Titulo100").append("<td><h4>" +" Control de digitalizacion de plantaciones" + "</h4></td>" );
	
	 var row = $("<tr />");
		$("#grafico100").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=10%><h5><b>Cod. Plant.</b></h5></td>"));
		row.append($("<td width=10%><h5><b>Cod. Control</b></h5></td>"));
		row.append($("<td width=20%><h5><b>T. Actividad</b></h5></td>"));
		row.append($("<td width=40%><h5><b>T. Plantación</b></h5></td>"));
		row.append($("<td width=20%><h5><b>SIG</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico100").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			if (data3[i].file == null ) {
				//$("#grafico100").append(row); 
				//alert (actividad01.toLocaleString('de-DE'));
				
				row.append($("<td>" +  "</td>"));
				
				row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
				row.append($("<td><h5>" + data3[i].control.toLocaleString('en-EN') + "</td>"));
				row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN') + "</td>"));
				row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN') + "</td>"));
				row.append($("<td><h5>  no existe </td>"));
				var row = $("<tr />");
				
				$("#grafico100").append(row); 
			}
		else
		{
			//$("#grafico100").append(row); 
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].control.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].file.toLocaleString('en-EN') + "</td>"));
			var row = $("<tr />");
			
			$("#grafico100").append(row);
		}
		
		}
	})
	
	
	
	
	
	//$.get('index.php?r=Poa/GetActividadActividadMicrocuencas&tipoactividad='+tipoactividad+'&ano='+ano+'&subcuenca='+idAlcampo, function (data3){
	$('#Titulo93').empty();
	$("#grafico93").empty();
	
	$("#grafico93").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	$("#Titulo93").append("<td><h4><b><c>" +"Tipo de actividad por Microcuenca (Tareas)" + "</c></b></h4></td>" );
	var subcuenca=idAlcampo;
	$.get('index.php?r=Poa/GetActividadTodaActividadSubcuencasMicrocuencas&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var sumatotales =[];
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
//primera actividad
	

	$.get('index.php?r=Poa/GetActividadTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetMicrocuenca&subcuenca='+subcuenca, function (data5){
			data5 = JSON.parse(data5);

	
		//$("#Titulo93sub").append("<td><h5>" +data4[0].actividad+ "</h5></td>" );
	 $('#grafico93').empty();
	 var row = $("<tr />");
		$("#grafico93").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=40%<h5><b>Subcuenca</b></h5></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%><h5><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h5></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			//row.append($("<td width=20%><h5><b>Total</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico93").append(row); 
			
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
					//row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
				$("#grafico93").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#grafico93").append(row); 
			
			row.append($("<th></th>"));
			row.append($("<td><h4><b>"+ "TOTAL" +"</b></h4></td>"));
			for (var j=0; j < data4.length; j++){
			row.append($("<td><h4><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#grafico93").append(row); 
		
	   })
	  })
	})
	/////////////////////////////////////////////////////////////////////////////////////////////
	
	
	$.get('index.php?r=Poa/GetEspecieTodaActividadSubcuenca&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#Titulo104").empty();
	$("#Titulo104").append("<td><h4><b>" +"Salidas de plantas del vivero por especie" + "</b></h4></td>" );
	
	$.get('index.php?r=Poa/GetActividadTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		//$.get('index.php?r=Poa/GetEspecieUtilizadasActividad&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data5){
		$.get('index.php?r=Poa/GetEspecieSalidasViveroTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);

	
	//$("#Titulo104sub").append("<td><h5> Plantas</h5></td>" );
		
	
		 var row = $("<tr />");
		$("#grafico104").append(row); 
		 
	
		row.append($("<td width=25% class=sucess colspan=1></td>"));
		row.append($("<td width=75% class=sucess colspan=5 ><h4><b> Plantas </b></h4></td>"));
		row.append($("<th></th>"));
		
		var row = $("<tr />");
		$("#grafico104").append(row); 
		row.append($("<td width=25% ><h4><b>Especies</b></h4></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%  ><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=15% ><h4><b>" + "Total salidas" + "</b></h4></td>"));
		
			
			var row = $("<tr />")	
			$("#grafico104").append(row); 
			
		var totalsup=0;
	 
	 var sumatotales=[];
	 
	 //---------------NUEVO
		// bucle de especies
	 
	 for (var l=0; l < data4.length+1;l++){
		 sumatotales[l]=0
	 }
	
		for (var i=0; i < data5.length; i++){
					//row.append($("<td>" +  "</td>"));
					
					//bucle de tipo de plantacion
					
				if (data5[i].familia == 'Café' || data5[i].familia == 'Otros materiales' ) {
					nose=1;
				} else {
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
					
					
					
				$("#grafico104").append(row); 
				
				var row = $("<tr />");
				
				}
				
		}
				
						
			var row = $("<tr />");
			
			$("#grafico104").append(row); 
		
			
			//row.append($("<th></th>"));
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			for (var j=0; j < data4.length+1; j++){
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#grafico104").append(row); 
	
	})
	})
})
	
	///////////////////////////////////////////////////////////////////////////

// EVALUACION DE SUPERVIVENCIA

///////////////////////////////////////////////////////////////////////////
	$("#Titulo105").empty();
	$("#grafico105").empty();
	$("#Titulo105").append("<td><h4><b>" +"Evaluacion de supervivencia </b></h4></td>" );
	
	 var row = $("<tr />");
		$("#grafico105").append(row); 
		 
	
		row.append($("<td width=50% ></td>"));
		row.append($("<td width=50% ><h4><b> Resultado </b></h4></td>"));
		row.append($("<th></th>"));
		
		var row = $("<tr />");
		$("#grafico105").append(row); 
	
$.get('index.php?r=Poa/GetSupervivenciaSubcuenca&finicial='+finicial+'&ffinal='+ffinal+"&subcuenca="+subcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
		
			var row = $("<tr />")	
			$("#grafico105").append(row); 
			
		var totalsup=0;
		
			
			
			$("#grafico105").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			if (data3[i].tareas == null) {
				
				data3[i].tareas = 0;
				}
			row.append($("<td><h5>Tareas evaluadas</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#grafico105").append(row); 
			
			row.append($("<td><h5>Cantidad de plantas plantadas</td>"));
			row.append($("<td><h5>" + data3[i].plantadas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#grafico105").append(row); 
			
			row.append($("<td><h5>Cantidad de plantas sobrevivientes</td>"));
			row.append($("<td><h5>" + data3[i].sobrevivientes.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#grafico105").append(row);
		
	
			row.append($("<td><h5>Por ciento de sobrevivencia</td>"));
			row.append($("<td><h5>" + data3[i].porcentaje.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#grafico105").append(row);
			
			row.append($("<td><h5>Cantidad de tareas que requieren replantación</td>"));
			row.append($("<td><h5>" + data3[i].areplantar.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#grafico105").append(row);
			
			
			
	})
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/*
	$.get('index.php?r=Poa/GetEspecieActividadSubcuenca&tipoactividad='+tipoactividad+'&ano='+ano+'&subcuenca='+idAlcampo, function (data3){
	
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#Titulo104").empty();
	$("#grafico104").empty(); 
		$("#Titulo104").append("<td><h5>" +"Grupo de especie (salidas vivero)" + "</h5></td>" );
	
	 var row = $("<tr />");
		$("#grafico104").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=40%><h5><b>Tipo</b></h5></td>"));
			row.append($("<td width=40%><h5><b>Grupo</b></h5></td>"));
		row.append($("<td width=20%><h5><b>Plantas</b></h5></td>"));
			var row = $("<tr />")	
			$("#grafico104").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#grafico104").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		row.append($("<td><h5>" + data3[i].familia.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			
			$("#grafico104").append(row); 
		
		}
		
	
	})
	*/
	////////////////////////////////////////////////////
	
	$.get('index.php?r=Poa/GetMunicipioTodaActividadSubcuenca&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){
		
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#Titulo102").empty();
		$("#Titulo102").append("<td><h4><b>" +" Superficie reforestada por Municipio" + "<b></h4></td>" );
	
	    var row = $("<tr />");
		$("#grafico102").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h4><b>Municipio</b></h4></td>"));
		
		row.append($("<td width=40%><h4><b>Tareas</b></h4></td>"));
			var row = $("<tr />")	
			$("#grafico102").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#grafico102").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			totalsup=totalsup+data3[i].tareas
			$("#grafico102").append(row); 
		
		}
		$("#grafico102").append(row); 
		row.append($("<td>" +  "</td>"));
		row.append($("<td><h4 style='color:darkred;' ><b><i><b>TOTAL </b></h4></td>"));
		
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));
	$("#grafico102").append(row);
		
	})
	
	///////////////////////////////////////////////////////////////////////////////////////
	
	
	////////////////////////////////////////////////////////////////////////////
	
	//especies plantadas
	$("#Titulo94").empty();
	$("#Titulo94B").empty();
	$("#grafico94").empty();
	$("#grafico94B").empty();
	$("#Titulo94").append("<td><h4><b><center>"+"&nbsp;    Especies Plantadas en la actividad de Reforestación "+"</b></h4></td>" );
	
	$.get('index.php?r=Poa/GetEspecieTodaActividadPlantadasSubcuenca&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	$.get('index.php?r=Poa/GetActividadTodaActividad&finicial=\'1900-01-01\'&ffinal='+ffinal, function (data4){
		data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetEspecieUtilizadasTodaActividad&finicial=\'1900-01-01\'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);
	
		var row = $("<tr />");
		$("#grafico94B").append(row); 
		
		row.append($("<td width=10% class=sucess colspan=1></td>"));
		row.append($("<td width=45% class=sucess colspan=3 ><h4><b> Tareas </b></h4></td>"));
		row.append($("<td width=45% class=sucess colspan=3 ><h4><b> Plantas </b></h4></td>"));
		row.append($("<th></th>"));
		var row = $("<tr />");
		 $("#grafico94B").append(row); 
		
		row.append($("<td width=22%><h4><b>Especies</b></h4></td>"));
		
		//columnas de tareas
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=13%><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
			
		}
			//ojo quitado por alf_jim
			//row.append($("<td width=15%><h4><b>" + "Total tareas" + "</b></h4></td>"));	
		//columnas de plantas (quito mantenimiento pues no debe haber plantas en mantenimiento)	
		for (var i=0; i< data4.length; i++){
			
			//ojo se quita a materiales de plantas por orden de alf_jim
		  if ( data4[i].tipo == 'Plantación' ||  data4[i].tipo == 'Replantación'){
			row.append($("<td width=13%><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
		  }	
		}
			row.append($("<td width=13%><h4><b>" + "Total plantas" + "</b></h4></td>"));		
			
			var row = $("<tr />")	
			$("#grafico94B").append(row); 
			
		var totalsup=0;
	
	
		
		
		//---------------NUEVO
		// bucle de subcuenca
		var sumatotales=[];
		for (var l=0; l < (4+2*data4.length);l++){
			sumatotales[l]=0;
		}
		//titulos
		
		//Por Familia
			for (var i=0; i < data5.length; i++){
					
					// ojo se quita cafe y otros materiales por orden de Alf_jim
					
				if (data5[i].familia == 'Café' || data5[i].familia == 'Otros materiales'|| data5[i].familia == 'Semillas' || data5[i].familia == 'Obsoletos') {
					nose=1;
				} else {
					row.append($("<td><h5>" + data5[i].familia.toLocaleString('en-EN') + "</h5></td>"));
					var suma=0;
					
			
					
					//tareas
					
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].familia ==  data3[j].familia){
							if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></td>"));
								suma =suma + data3[j].tareas;
								sumatotales[l+1]=sumatotales[l+1]+data3[j].tareas;
								sumatotales[1+data4.length]=sumatotales[1+data4.length]+data3[j].tareas;
							}
						}
						}
						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					
					//ojo quito la siguinete linea para no tener osççel sumatorio de tareas por especie
					//row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					//plantas
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						
						//ojo este if se introduuce por orden s¡de alfredo_jim
						//if ( data4[l].tipo == 'Plantación' ||  data4[l].tipo == 'Replantación'){
					
						  for (var j=0; j < data3.length; j++){
						
						
						    if (data5[i].familia ==  data3[j].familia){
							  if (data4[l].tipo ==  data3[j].tipo){
								
								if ( data3[j].tipo == 'Plantación' ||  data3[j].tipo == 'Replantación'){
								   row.append($("<td><h5>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></td>"));
								   nulo = nulo+1;
								
								   suma =suma + data3[j].plantas;
								   sumatotales[l+2+data4.length]=sumatotales[l+2+data4.length]+data3[j].plantas;
								   sumatotales[2+2*data4.length]=sumatotales[2+2*data4.length]+data3[j].plantas;
								} 
							 }
						    }
						  }
						
						
						
					if ( data4[l].tipo == 'Plantación' ||  data4[l].tipo == 'Replantación'){
						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
					}
						//}
					}
					
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					
				$("#grafico94B").append(row); 
				
				var row = $("<tr />");
				}
				
			}
				
				
				
						
			var row = $("<tr />");
			
			$("#grafico94B").append(row); 
		
		var row = $("<tr />");
			
			$("#grafico94B").append(row); 
			
			//row.append($("<th></th>"));
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			
			//modificado el 03 de sep donde pone 1+ 1*data4.length hntes ponia 2+2*dat4.length
			for (var j=1; j < (3+2*data4.length); j++){
				
				//ojo esto se introduce por orden
				if (j==4 || j==6) {
				} else {					
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
			}
		var row = $("<tr />");
			
			$("#grafico94B").append(row); 
		
	
	})
	})
	
	
	})
	
/////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////

//especeis plantadas por  microcuenca dentro de una cuenca.	


	$("#Titulo96").empty();
	$("#Titulo96B").empty();
	$("#grafico96").empty();
	$("#grafico96B").empty();
	$("#Titulo96").append("<td><h4><b><center>"+"&nbsp;    Superficie plantada por especie y microcuenca"+"</b></h4></td>" );
	
	$.get('index.php?r=Poa/GetEspeciePlantadaSubcuencaMicrocuenca&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	$.get('index.php?r=Poa/GetMicrocuenca&subcuenca='+subcuenca, function (data4){
		data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetEspecieUtilizadasTodaActividad&finicial=\'1900-01-01\'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);
	
		var row = $("<tr />");
		$("#grafico96B").append(row); 
		
		row.append($("<td width=22%><h4><b>Especies</b></h4></td>"));
		
		//columnas de tareas
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=13%><h5><b>" + data4[i].nombre.toLocaleString('en-EN') + "</b></h5></td>"));	
			
		}
			
		for (var i=0; i< data4.length; i++){
			
			
		}
			row.append($("<td width=13%><h4><b>" + "Total tareas" + "</b></h4></td>"));		
			
			var row = $("<tr />")	
			$("#grafico96B").append(row); 
			
		var totalsup=0;
	
	
		
		
		//---------------NUEVO
		// bucle por especie
		
		//se inicalizan sumatorios por microcuenca
		var sumatotales=[];
		for (var l=0; l < data4.length;l++){
			sumatotales[l]=0;
		}
		//titulos
		
		//Por Familia de especies
			for (var i=0; i < data5.length; i++){
					
					// ojo se quita cafe y otros materiales por orden de Alf_jim
					
				if (data5[i].familia == 'Café' || data5[i].familia == 'Otros materiales'|| data5[i].familia == 'Semillas' || data5[i].familia == 'Obsoletos') {
					nose=1;
				} else {
					row.append($("<td><h5>" + data5[i].familia.toLocaleString('en-EN') + "</h5></td>"));
					var suma=0;
					
			
					
					//tareas
					//por microcuenca
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].familia ==  data3[j].familia){
							if (data4[l].codigo ==  data3[j].microcuenca){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].tareas.toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</h5></td>"));
								suma =suma + data3[j].tareas;
								sumatotales[l]=sumatotales[l]+data3[j].tareas;
								
							}
						}
						}
						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</h5></b></td>"));
					
					var suma=0;
					
					
					var suma=0;
					
					
				$("#grafico96B").append(row); 
				
				var row = $("<tr />");
				}
				
			}
				
				
				
						
			var row = $("<tr />");
			
			$("#grafico96B").append(row); 
		
		var row = $("<tr />");
			
			$("#grafico96B").append(row); 

			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			suma=0;

			for (var j=0; j < data4.length; j++){

			suma = suma +sumatotales[j]						
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</b></h4></td>"));	
			
			}
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1,minimumFractionDigits:1}) + "</b></h4></td>"));	
			
		var row = $("<tr />");
			
			$("#grafico96B").append(row); 
		
	
	})
	})
	
	
	})

/////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////

//salida de plantas de vicero por  microcuenca dentro de una cuenca.	


	$("#Titulo106").empty();
	$("#Titulo106B").empty();
	$("#grafico106").empty();
	$("#grafico106B").empty();
	$("#Titulo106").append("<td><h4><b><center>"+"&nbsp;    Salida de de plantas de vivero  por especie y microcuenca"+"</b></h4></td>" );
	
	$.get('index.php?r=Poa/GetEspecieViveroCuencaMicrocuenca&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	$.get('index.php?r=Poa/GetMicrocuenca&subcuenca='+subcuenca, function (data4){
		data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetEspecieUtilizadasTodaActividad&finicial=\'1900-01-01\'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);
	
		var row = $("<tr />");
		$("#grafico106B").append(row); 
		
		row.append($("<td width=22%><h4><b>Especies</b></h4></td>"));
		
		//columnas de tareas
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=13%><h5><b>" + data4[i].nombre.toLocaleString('en-EN') + "</b></h5></td>"));	
			
		}
			
		for (var i=0; i< data4.length; i++){
			
			
		}
			row.append($("<td width=13%><h4><b>" + "Total plantas" + "</b></h4></td>"));		
			
			var row = $("<tr />")	
			$("#grafico106B").append(row); 
			
		var totalsup=0;
	
	
		
		
		//---------------NUEVO
		// bucle por especie
		
		//se inicalizan sumatorios por microcuenca
		var sumatotales=[];
		for (var l=0; l < data4.length;l++){
			sumatotales[l]=0;
		}
		//titulos
		
		//Por Familia de especies
			for (var i=0; i < data5.length; i++){
					
					// ojo se quita cafe y otros materiales por orden de Alf_jim
					
				if (data5[i].familia == 'Café' || data5[i].familia == 'Otros materiales'|| data5[i].familia == 'Semillas' || data5[i].familia == 'Obsoletos') {
					nose=1;
				} else {
					row.append($("<td><h5>" + data5[i].familia.toLocaleString('en-EN') + "</h5></td>"));
					var suma=0;
					
			
					
					//tareas
					//por microcuenca
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].familia ==  data3[j].familia){
							if (data4[l].codigo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0}) + "</h5></td>"));
								suma =suma + data3[j].plantas;
								sumatotales[l]=sumatotales[l]+data3[j].plantas;
								
							}
						}
						}
						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0}) + "</h5></b></td>"));
					
					var suma=0;
					
					
					var suma=0;
					
					
				$("#grafico106B").append(row); 
				
				var row = $("<tr />");
				}
				
			}
				
				
				
						
			var row = $("<tr />");
			
			$("#grafico106B").append(row); 
		
		var row = $("<tr />");
			
			$("#grafico106B").append(row); 

			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			suma=0;

			for (var j=0; j < data4.length; j++){

			suma = suma +sumatotales[j]						
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0}) + "</b></h4></td>"));	
			
			}
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:0,minimumFractionDigits:0}) + "</b></h4></td>"));	
			
		var row = $("<tr />");
			
			$("#grafico106B").append(row); 
		
	
	})
	})
	
	
	})
	
	
	
/////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////

//Plantaciones mensuales.	


	$("#Titulo107").empty();
	$("#Titulo107B").empty();
	$("#grafico107").empty();
	$("#grafico107B").empty();
	$("#Titulo107").append("<td><h4><b><center>"+"&nbsp;    Actividad por mes (suma del periodo indicado)"+"</b></h4></td>" );
	
	$.get('index.php?r=Poa/GetActividadTodaActividadPorSubcuencaMes&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	$.get('index.php?r=Poa/GetActividadTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data4){
		data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetMestodos', function (data5){
			data5 = JSON.parse(data5);
	
		var row = $("<tr />");
		$("#grafico107B").append(row); 
		
		row.append($("<td width=22%><h4><b>Mes</b></h4></td>"));
		
		//columnas de tareas
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=13%><h5><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h5></td>"));	
			
		}
			
		for (var i=0; i< data4.length; i++){
			
			
		}
			row.append($("<td width=13%><h4><b>" + "Total tareas" + "</b></h4></td>"));		
			
			var row = $("<tr />")	
			$("#grafico107B").append(row); 
			
		var totalsup=0;
	
	
		
		
		//---------------NUEVO
		// bucle por especie
		
		//se inicalizan sumatorios por microcuenca
		var sumatotales=[];
		for (var l=0; l < data4.length;l++){
			sumatotales[l]=0;
		}
		//titulos
		
		//Por Familia de especies
			for (var i=0; i < data5.length; i++){
					
					// ojo se quita cafe y otros materiales por orden de Alf_jim
					
				if (data5[i].tipo == 'Café' ) {
					nose=1;
				} else {
					row.append($("<td><h5>" + data5[i].nombre.toLocaleString('en-EN') + "</h5></td>"));
					var suma=0;
					
			
					
					//tareas
					//por microcuenca
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].codigo ==  data3[j].mes){
							if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].tareas.toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</h5></td>"));
								suma =suma + data3[j].tareas;
								sumatotales[l]=sumatotales[l]+data3[j].tareas;
								
							}
						}
						}
						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</h5></b></td>"));
					
					var suma=0;
					
					
					var suma=0;
					
					
				$("#grafico107B").append(row); 
				
				var row = $("<tr />");
				}
				
			}
				
				
				
						
			var row = $("<tr />");
			
			$("#grafico107B").append(row); 
		
		var row = $("<tr />");
			
			$("#grafico107B").append(row); 

			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			suma=0;

			for (var j=0; j < data4.length; j++){

			suma = suma +sumatotales[j]						
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</b></h4></td>"));	
			
			}
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</b></h4></td>"));	
			
		var row = $("<tr />");
			
			$("#grafico107B").append(row); 
		
	
	})
	})
	
	
	})

/////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////

//tareas por proyecto   microcuenca dentro de una cuenca.	


	$("#Titulo97").empty();
	$("#Titulo97B").empty();
	$("#grafico97").empty();
	$("#grafico97B").empty();
	$("#Titulo97").append("<td><h4><b><center>"+"&nbsp;    Superficie plantada por proyecto y microcuenca"+"</b></h4></td>" );
	
	$.get('index.php?r=Poa/GetProyectoSubcuencaMicrocuenca&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
	$.get('index.php?r=Poa/GetMicrocuenca&subcuenca='+subcuenca, function (data4){
		data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetProyectotodos', function (data5){
			data5 = JSON.parse(data5);
	
		var row = $("<tr />");
		$("#grafico97B").append(row); 
		
		row.append($("<td width=22%><h4><b>Proyecto</b></h4></td>"));
		
		//columnas de tareas
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=13%><h5><b>" + data4[i].nombre.toLocaleString('en-EN') + "</b></h5></td>"));	
			
		}
			
		for (var i=0; i< data4.length; i++){
			
			
		}
			row.append($("<td width=13%><h4><b>" + "Total tareas" + "</b></h4></td>"));		
			
			var row = $("<tr />")	
			$("#grafico96B").append(row); 
			
		var totalsup=0;
	
	
		
		
		//---------------NUEVO
		// bucle por especie
		
		//se inicalizan sumatorios por microcuenca
		var sumatotales=[];
		for (var l=0; l < data4.length;l++){
			sumatotales[l]=0;
		}
		//titulos
		
		//Por Familia de especies
			for (var i=0; i < data5.length; i++){
					
					// ojo se quita cafe y otros materiales por orden de Alf_jim
					
				if (data5[i].nombre == 'Café' || data5[i].nombre == 'Otros materiales'|| data5[i].nombre == 'Semillas' || data5[i].nombre == 'Obsoletos') {
					nose=1;
				} else {
					row.append($("<td><h5>" + data5[i].nombre.toLocaleString('en-EN') + "</h5></td>"));
					var suma=0;
					
			
					
					//tareas
					//por microcuenca
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].codigo ==  data3[j].codigo){
							if (data4[l].codigo ==  data3[j].microcuenca){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].tareas.toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</h5></td>"));
								suma =suma + data3[j].tareas;
								sumatotales[l]=sumatotales[l]+data3[j].tareas;
								
							}
						}
						}
						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</h5></b></td>"));
					
					var suma=0;
					
					
					var suma=0;
					
					
				$("#grafico97B").append(row); 
				
				var row = $("<tr />");
				}
				
			}
				
				
				
						
			var row = $("<tr />");
			
			$("#grafico97B").append(row); 
		
		var row = $("<tr />");
			
			$("#grafico97B").append(row); 

			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			suma=0;

			for (var j=0; j < data4.length; j++){

			suma = suma +sumatotales[j]						
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:2,minimumFractionDigits:2}) + "</b></h4></td>"));	
			
			}
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1,minimumFractionDigits:1}) + "</b></h4></td>"));	
			
		var row = $("<tr />");
			
			$("#grafico97B").append(row); 
		
	
	})
	})
	
	
	})



































































	
	//por proyecto
	//////////////////////////////////////////////////////////////////////////////
	
	$.get('index.php?r=Poa/GetProyectoTodoActividadSubcuenca&finicial='+finicial+'&ffinal='+ffinal+'&subcuenca='+subcuenca, function (data3){data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#Titulo103").empty();
		$("#Titulo103").append("<td><h4><b>" +"Superficie de reforestación por Fondo" + "</b></h4></td>" );
	
	 var row = $("<tr />");
		$("#grafico103").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h4><b>Proyecto</b></h4></td>"));
		
		row.append($("<td width=40%><h4><b>Tareas</b></h4></td>"));
			var row = $("<tr />")	
			$("#grafico103").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#grafico103").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			totalsup=totalsup+data3[i].plantas
			$("#grafico103").append(row); 
		
		}
		$("#grafico103").append(row); 
		row.append($("<td>" +  "</td>"));
		row.append($("<td><h4><h4 style='color:darkred;' ><b><i>TOTAL </b></h4></td>"));
		
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));
	$("#grafico103").append(row);
	
	})
	
	//////////////////////////////////////////////////////////////////////////////
	
	
	
	


	
}




// FUNCIO PARA MICROCUENCAS

function cargarGraficoAnoMicroCuenca(){
	//plantaciones_ano_en_curso.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&ano=2018&doy=161");
		
	$('#mgrafico80').empty();
	
	var f = new Date();
    var dia =(f.getDate() + "-" + (f.getMonth() +1) + "-" + f.getFullYear());
	var fecha = new Date();
	var id2 = fecha.getFullYear();
	var ano =id2;
	//var tipoactividad=1	;
	var microcuenca=$("#microcuenca").val();
	
	
	
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
	
		$.get('index.php?r=Quest/GetMicrocuenca&microcuenca='+microcuenca, function (datacuenca){
	
	
	datacuenca= JSON.parse(datacuenca);
	
	var nombrecuenca=datacuenca[0].respuesta;
	//alert (datacuenca[0].respuesta);
	$("#mgrafico80").empty();
	$("#mgrafico80").append("</td>   <td ><h3><b>&nbsp;Microcuenca: "+nombrecuenca+",</h3><h4> &nbsp Fecha de consulta :&nbsp; " +dia+ ", (desde: " +finicial2+"&nbsp; a&nbsp;: "+ffinal2+"&nbsp  ) </b></h4></td> " );
	
})
	
	
	//$("#mgrafico80").append("</td>   <td ><h4><b>Fecha  : " +dia+ "    Año " +id2+ "   Microcuenca : "+microcuenca+" , Reforestación  de : "+ finicial2+ " a:  "+ ffinal2+"</b></h4></td> " );
	    $('#mgrafico90').empty();
		$('#mgrafico91').empty();
		$('#mgrafico92').empty();
		$('#mgrafico93').empty();
		$('#mgrafico93').empty();
		$('#mgrafico100').empty();
		$('#mgrafico101').empty();
		$('#mgrafico102').empty();
		$('#mgrafico103').empty();
		$('#mgrafico104').empty();
		$("#mgraficoA2").empty();
		$("#mTituloA2").empty();
		
		//$("#mgrafico102").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	//$("#mgrafico90").html('<img id="loading-image" width=80 src="images/logo3_75_75.gif" alt="Loading..." />');
	  
   


if (document.getElementById("checkfecha").checked != true ){

//$.get('index.php?r=Poa/GetAvanceSubcuenca&tipoactividad='+tipoactividad+'&ano='+ano+'&subcuenca='+idAlcampo, function (data){
$.get('index.php?r=Poa/GetAvanceMicrocuenca2&tipoactividad='+tipoactividad+'&ano='+ano+'&microcuenca='+microcuenca, function (data){

	data = JSON.parse(data);
	categorias=[];
	serie1=[];
	serie2=[];
	serie3=[];
	for (i=0; i<data.length; i++){
		categorias.push(data[i].plantacion);
		serie1.push(data[i].tareasejecutadas);
		serie2.push(data[i].tareasprevano);
		serie3.push((data[i].tareasejecutadas/data[i].tareasprevano)*100);
		
	}
	//tareas trabajadas	
	 	
$('#mgrafico90').empty();
	
$('#mgrafico90').highcharts({

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

	//tanto por ciento de objetivos cumplidos
		
	$('#mgrafico91').empty();
	
$('#mgrafico91').highcharts({

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
		
     $("#mTituloA2").append("<td><h4><b>" +"Actividad de reforestación:  Avance / Meta = % de cumplimiento" + "</b></h4></td>" );
		
		$('#mgraficoA2').empty();
	 var row = $("<tr />");
		$("#mgraficoA2").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=25%><h4><b>Tipo de actividad.</b></h4></td>"));
		
		row.append($("<td width=25%><h4><b>Meta</b></h4></td>"));
		row.append($("<td width=30%><h4><b>Avance</b></h4></td>"));
		row.append($("<td width=30%><h4><b>% Cumplimiento</b></h4></td>"));
			var row = $("<tr />")	
			$("#mgraficoA2").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data.length; i++){
			
			
			$("#mgraficoA2").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data[i].plantacion.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data[i].tareasprevano.toLocaleString('en-EN', {maximumFractionDigits:2}) + "</td>"));
			row.append($("<td><h5>" + data[i].tareasejecutadas.toLocaleString('en-EN', {maximumFractionDigits:2}) + "</td>"));
			if (data[i].tareasprevano ==0) {
			row.append($("<td><h5> 100.00</td>"));
			}else{
				 porce=(data[i].tareasejecutadas/data[i].tareasprevano)*100;
			row.append($("<td><h5>" + porce.toLocaleString('en-EN', {maximumFractionDigits:2}) + "</td>"));
			}
			var row = $("<tr />");
			
			$("#mgraficoA2").append(row); 
		
		}	
     

		
})

}
   $.get('index.php?r=Poa/GetActividadTodaActividadPorMicrocuenca&finicial='+finicial+'&ffinal='+ffinal+'&microcuenca='+microcuenca,  function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$('#mTitulo92').empty();
		$("#mTitulo92").append("<td><h4><b>" +" Tipo de actividad de reforestación "+"</b></h4></td>" );
	$('#mgrafico92').empty();
	 var row = $("<tr />");
		$("#mgrafico92").append(row); 
		row.append($("<th></th>"));
		//row.append($("<td width=30%><h5><b>Actividad</b></h5></td>"));
		row.append($("<td width=40%><h4><b>Fase</b></h4></td>"));
		
		row.append($("<td width=30%><h4><b>Plantaciones</b></h4></td>"));
		row.append($("<td width=30%><h4><b>Tareas</b></h4></td>"));
			var row = $("<tr />")	
			$("#mgrafico92").append(row); 
			
		var totalsup=0;
		var sumatotales=[];
		sumatotales[0]=0;
		sumatotales[1]=0;
		for (var i=0; i < data3.length; i++){
			
			if (data3[i].tipo != 'Otros1'){
			$("#mgrafico92").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			//row.append($("<td><h5>" + data3[i].actividad.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			sumatotales[0]=sumatotales[0]+data3[i].plantas;
			sumatotales[1]=sumatotales[1]+data3[i].tareas;
			var row = $("<tr />");
			
			$("#mgrafico92").append(row); 
			}
		}
		
	
	})
	
	$.get('index.php?r=Poa/GetMicrocuencaListadoParcelasFechas&finicial='+finicial+'&ffinal='+ffinal+'&microcuenca='+microcuenca,  function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#mTitulo100").empty();
	$('#mgrafico100').empty();
		$("#mTitulo100").append("<td><h4>" +" Control de digitalizacion de plantaciones" + "</h4></td>" );
	
	 var row = $("<tr />");
		$("#mgrafico100").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=10%><h5><b>Cod. Plant.</b></h5></td>"));
		row.append($("<td width=10%><h5><b>Cod. Control</b></h5></td>"));
		row.append($("<td width=20%><h5><b>T. Actividad</b></h5></td>"));
		row.append($("<td width=40%><h5><b>T. Plantación</b></h5></td>"));
		row.append($("<td width=20%><h5><b>SIG</b></h5></td>"));
			var row = $("<tr />")	
			$("#mgrafico100").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			if (data3[i].file == null ) {
				//$("#grafico100").append(row); 
				//alert (actividad01.toLocaleString('de-DE'));
				
				row.append($("<td>" +  "</td>"));
				
				row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
				row.append($("<td><h5>" + data3[i].control.toLocaleString('en-EN') + "</td>"));
				row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN') + "</td>"));
				row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN') + "</td>"));
				row.append($("<td><h5>  no existe </td>"));
				var row = $("<tr />");
				
				$("#mgrafico100").append(row); 
			}
		else
		{
			//$("#grafico100").append(row); 
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].control.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].file.toLocaleString('en-EN') + "</td>"));
			var row = $("<tr />");
			
			$("#mgrafico100").append(row);
		}
		
		}
	})
	
	/*
	$.get('index.php?r=Poa/GetActividadActividadMicrocuencas&tipoactividad='+tipoactividad+'&ano='+ano+'&subcuenca='+idAlcampo, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
		$("#mTitulo93").empty();
		$("#mTitulo93").append("<td><h5>" +"Tipo de Plantacion por Microcuenca" + "</h5></td>" );
	 var row = $("<tr />");
		$("#mgrafico93").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=20%<h5><b>Microcuenca.</b></h5></td>"));
		row.append($("<td width=60%><h5><b>Tipo</b></h5></td>"));	
		row.append($("<td width=20%><h5><b>Tareas</b></h5></td>"));
			var row = $("<tr />")	
			$("#mgrafico93").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#mgrafico93").append(row); 
			
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].microcuenca.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			
			var row = $("<tr />");
			
			$("#mgrafico93").append(row); 
		
		}
		
	
	})*/
	
	
	//plantas por vivero
	
	$.get('index.php?r=Poa/GetEspecieTodaActividadMicrocuenca&finicial='+finicial+'&ffinal='+ffinal+'&microcuenca='+microcuenca, function (data3){
	
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#mTitulo104").empty();
	$("#mTitulo104").append("<td><h4><b>" +"Salidas de plantas del vivero por especie" + "</b></h4></td>" );
	
	$.get('index.php?r=Poa/GetActividadTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		//$.get('index.php?r=Poa/GetEspecieUtilizadasActividad&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data5){
		$.get('index.php?r=Poa/GetEspecieSalidasViveroTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);

	
	//$("#Titulo104sub").append("<td><h5> Plantas</h5></td>" );
		
	
		 var row = $("<tr />");
		$("#mgrafico104").append(row); 
		 
	
		row.append($("<td width=25% class=sucess colspan=1></td>"));
		row.append($("<td width=75% class=sucess colspan=5 ><h4><b> Plantas </b></h4></td>"));
		row.append($("<th></th>"));
		
		var row = $("<tr />");
		$("#mgrafico104").append(row); 
		row.append($("<td width=25% ><h4><b>Especies</b></h4></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%  ><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=15% ><h4><b>" + "Total salidas" + "</b></h4></td>"));
		
			
			var row = $("<tr />")	
			$("#mgrafico104").append(row); 
			
		var totalsup=0;
	 
	 var sumatotales=[];
	 
	 //---------------NUEVO
		// bucle de especies
	 
	 for (var l=0; l < data4.length+1;l++){
		 sumatotales[l]=0
	 }
	
		for (var i=0; i < data5.length; i++){
					//row.append($("<td>" +  "</td>"));
					
					//bucle de tipo de plantacion
					
				if (data5[i].familia == 'Café' || data5[i].familia == 'Otros materiales' ) {
					nose=1;
				} else {
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
					
					
					
				$("#mgrafico104").append(row); 
				
				var row = $("<tr />");
				
				}
				
		}
				
						
			var row = $("<tr />");
			
			$("#mgrafico104").append(row); 
		
			
			//row.append($("<th></th>"));
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			for (var j=0; j < data4.length+1; j++){
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#mgrafico104").append(row); 
	
	})
	})
		
	
	})
	
	

///////////////////////////////////////////////////////////////////////////

// EVALUACION DE SUPERVIVENCIA

///////////////////////////////////////////////////////////////////////////
	$("#mTitulo105").empty();
	$("#mgrafico105").empty();
	$("#mTitulo105").append("<td><h4><b>" +"Evaluacion de supervivencia </b></h4></td>" );
	
	 var row = $("<tr />");
		$("#mgrafico105").append(row); 
		 
	
		row.append($("<td width=50% ></td>"));
		row.append($("<td width=50% ><h4><b> Resultado </b></h4></td>"));
		row.append($("<th></th>"));
		
		var row = $("<tr />");
		$("#mgrafico105").append(row); 

$.get('index.php?r=Poa/GetSupervivenciaMicrocuenca&finicial='+finicial+'&ffinal='+ffinal+"&microcuenca="+microcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
		
			var row = $("<tr />")	
			$("#mgrafico105").append(row); 
			
		var totalsup=0;
		
			
			
			$("#mgrafico105").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			if (data3[i].tareas == null) {
				
				data3[i].tareas = 0;
				}
			row.append($("<td><h5>Tareas evaluadas</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#mgrafico105").append(row); 
			
			row.append($("<td><h5>Cantidad de plantas plantadas</td>"));
			row.append($("<td><h5>" + data3[i].plantadas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#mgrafico105").append(row); 
			
			row.append($("<td><h5>Cantidad de plantas sobrevivientes</td>"));
			row.append($("<td><h5>" + data3[i].sobrevivientes.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#mgrafico105").append(row);
		
	
			row.append($("<td><h5>Por ciento de sobrevivencia</td>"));
			row.append($("<td><h5>" + data3[i].porcentaje.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#mgrafico105").append(row);
			
			row.append($("<td><h5>Cantidad de tareas que requieren replantación</td>"));
			row.append($("<td><h5>" + data3[i].areplantar.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#mgrafico105").append(row);
			
			
			
	})












	
	
	
	
	
	$.get('index.php?r=Poa/GetMunicipioTodaActividadMicrocuenca&finicial='+finicial+'&ffinal='+ffinal+'&microcuenca='+microcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#mTitulo102").empty();
		$("#mTitulo102").append("<td><h4><b>" +" Superficie reforestada por Municipio" + "<b></h4></td>" );
	
	    var row = $("<tr />");
		$("#mgrafico102").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h4><b>Municipio</b></h4></td>"));
		
		row.append($("<td width=40%><h4><b>Tareas</b></h4></td>"));
			var row = $("<tr />")	
			$("#mgrafico102").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#mgrafico102").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			totalsup=totalsup+data3[i].tareas
			$("#mgrafico102").append(row); 
		
		}
		$("#mgrafico102").append(row); 
		row.append($("<td>" +  "</td>"));
		row.append($("<td><h4 style='color:darkred;' ><b><i><b>TOTAL </b></h4></td>"));
		
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));
	$("#mgrafico102").append(row);
		
	
	})
	
	$.get('index.php?r=Poa/GetEspecieTodaActividadPlantadasMicrocuenca&finicial='+finicial+'&ffinal='+ffinal+'&microcuenca='+microcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#mTitulo94").empty();
	$("#mgrafico94B").empty();
	$("#mTitulo94").append("<td><h4><b><center>"+"&nbsp;    Especies Plantadas en la actividad de Reforestación "+"</b></h4></td>" );
	$.get('index.php?r=Poa/GetActividadTodaActividad&finicial=\'1900-01-01\'&ffinal='+ffinal, function (data4){
		data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetEspecieUtilizadasTodaActividad&finicial=\'1900-01-01\'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);
	
		var row = $("<tr />");
		$("#mgrafico94B").append(row); 
		
		row.append($("<td width=10% class=sucess colspan=1></td>"));
		row.append($("<td width=45% class=sucess colspan=3 ><h4><b> Tareas </b></h4></td>"));
		row.append($("<td width=45% class=sucess colspan=3 ><h4><b> Plantas </b></h4></td>"));
		row.append($("<th></th>"));
		var row = $("<tr />");
		 $("#mgrafico94B").append(row); 
		
		row.append($("<td width=22%><h4><b>Especies</b></h4></td>"));
		
		//columnas de tareas
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=13%><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
			
		}
			//ojo quitado por alf_jim
			//row.append($("<td width=15%><h4><b>" + "Total tareas" + "</b></h4></td>"));	
		//columnas de plantas (quito mantenimiento pues no debe haber plantas en mantenimiento)	
		for (var i=0; i< data4.length; i++){
			
			//ojo se quita a materiales de plantas por orden de alf_jim
		  if ( data4[i].tipo == 'Plantación' ||  data4[i].tipo == 'Replantación'){
			row.append($("<td width=13%><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
		  }	
		}
			row.append($("<td width=13%><h4><b>" + "Total plantas" + "</b></h4></td>"));		
			
			var row = $("<tr />")	
			$("#mgrafico94B").append(row); 
			
		var totalsup=0;
	
	
		
		
		//---------------NUEVO
		// bucle de subcuenca
		var sumatotales=[];
		for (var l=0; l < (4+2*data4.length);l++){
			sumatotales[l]=0;
		}
		//titulos
		
		//Por Familia
			for (var i=0; i < data5.length; i++){
					
					// ojo se quita cafe y otros materiales por orden de Alf_jim
					
				if (data5[i].familia == 'Café' || data5[i].familia == 'Otros materiales'|| data5[i].familia == 'Semillas' || data5[i].familia == 'Obsoletos') {
					nose=1;
				} else {
					row.append($("<td><h5>" + data5[i].familia.toLocaleString('en-EN') + "</h5></td>"));
					var suma=0;
					
			
					
					//tareas
					
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].familia ==  data3[j].familia){
							if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></td>"));
								suma =suma + data3[j].tareas;
								sumatotales[l+1]=sumatotales[l+1]+data3[j].tareas;
								sumatotales[1+data4.length]=sumatotales[1+data4.length]+data3[j].tareas;
							}
						}
						}
						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					
					//ojo quito la siguinete linea para no tener osççel sumatorio de tareas por especie
					//row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					//plantas
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						
						//ojo este if se introduuce por orden s¡de alfredo_jim
						//if ( data4[l].tipo == 'Plantación' ||  data4[l].tipo == 'Replantación'){
					
						  for (var j=0; j < data3.length; j++){
						
						
						    if (data5[i].familia ==  data3[j].familia){
							  if (data4[l].tipo ==  data3[j].tipo){
								
								if ( data3[j].tipo == 'Plantación' ||  data3[j].tipo == 'Replantación'){
								   row.append($("<td><h5>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></td>"));
								   nulo = nulo+1;
								
								   suma =suma + data3[j].plantas;
								   sumatotales[l+2+data4.length]=sumatotales[l+2+data4.length]+data3[j].plantas;
								   sumatotales[2+2*data4.length]=sumatotales[2+2*data4.length]+data3[j].plantas;
								} 
							 }
						    }
						  }
						
						
						
					if ( data4[l].tipo == 'Plantación' ||  data4[l].tipo == 'Replantación'){
						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
					}
						//}
					}
					
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					
				$("#mgrafico94B").append(row); 
				
				var row = $("<tr />");
				}
				
			}
				
				
				
						
			var row = $("<tr />");
			
			$("#mgrafico94B").append(row); 
		
		var row = $("<tr />");
			
			$("#mgrafico94B").append(row); 
			
			//row.append($("<th></th>"));
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			
			//modificado el 03 de sep donde pone 1+ 1*data4.length hntes ponia 2+2*dat4.length
			for (var j=1; j < (3+2*data4.length); j++){
				
				//ojo esto se introduce por orden
				if (j==4 || j==6) {
				} else {					
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
			}
		var row = $("<tr />");
			
			$("#mgrafico94B").append(row); 
		
	
	})
	})
	
	
	})
	
	//por proyecto
	
	$.get('index.php?r=Poa/GetProyectoTodoActividadMicrocuenca&finicial='+finicial+'&ffinal='+ffinal+'&microcuenca='+microcuenca, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#mTitulo103").empty();
		$("#mTitulo103").append("<td><h4><b>" +"Superficie de reforestación por Fondo" + "</b></h4></td>" );
	
	 var row = $("<tr />");
		$("#mgrafico103").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h4><b>Proyecto</b></h4></td>"));
		
		row.append($("<td width=40%><h4><b>Tareas</b></h4></td>"));
			var row = $("<tr />")	
			$("#mgrafico103").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#mgrafico103").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			totalsup=totalsup+data3[i].plantas
			$("#mgrafico103").append(row); 
		
		}
		$("#mgrafico103").append(row); 
		row.append($("<td>" +  "</td>"));
		row.append($("<td><h4><h4 style='color:darkred;' ><b><i>TOTAL </b></h4></td>"));
		
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));
	$("#mgrafico103").append(row);
		
	
	})
	



	
}



























//-------------------------------------------------------------
//-------------------------------------------------------------
//-------------------------------------------------------------
//-------------------------------------------------------------
//funcion para las microcuencas

function cargarGraficoAno(){
	
//var id2 = parseInt($("#ano").val());

var fecha = new Date();
var id2 = fecha.getFullYear();
//alert('El año actual es: '+ano);



	
	
	
	
$.get('index.php?r=Graficos/GetCuencaAno&ano='+id2+ "&miccuenca="+microcuenca, function (data){
	//$.get('index.php?r=Graficos/GetAno&id='+id2, function (data){
	
	data = JSON.parse(data);
	//alert('sali');

	$('#grafico1').highcharts({
	
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: 'black',
    plotShadow: true,
    type: 'pie'
  },
  title: {
    text: 'Superfice ' +id2 
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
	  showInLegend: false,
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
	  name: '% de la superfice anual',
    data: 	data
  }]
  
  
});

//tabla
			/*
			//	 Basico
			for(var j=0; j < data.length; j++){	
			   $.each(data[j], function(i, item) {
				   //if (i == 'codigo_control' || i=='actividad' || i=='apellido' || i=='actividad' || i=='fecha_de_inspeccion'|| i=='observacion'|| i=='condicion_de_la_plantacion'){
				var $td = $('<tr>').append(
				  $('<td>').text(i),
				  $('<td>').text(item)
				  ).appendTo('#grafico2');
				  // }
			    })
				
			}
			
		*/
			/*
			//en forma de tabla
			$("#grafico2").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#grafico2").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	    row.append($("<th Width='200 px'>Especie</th>"));
		row.append($("<th Width='150 px'>Tareas</th>"));
	$.each(data, function(index, value){
			
					var row = $("<tr />");
					$("#grafico2").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.name + "</td>"));
					row.append($("<td>" + value.y + "</td>"));
					
			
	});

*/


})


//segunda fila
$.get('index.php?r=Graficos/GetCuenca&miccuenca='+microcuenca, function (data){
	//$.get('index.php?r=Graficos/GetAno&id='+id2, function (data){
	
	data = JSON.parse(data);
	//alert('sali');

	$('#grafico2').highcharts({
	
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: 'black',
    plotShadow: true,
    type: 'pie'
  },
  title: {
    text: 'Superfice total zona (no anual)'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
	  showInLegend: false,
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
	  name: '% de la superficie total',
    data: 	data
  }]
  
  
});


	
	
	
	
	
	
	//fin cuarto
	


//tabla
			/*
			//	 Basico
			for(var j=0; j < data.length; j++){	
			   $.each(data[j], function(i, item) {
				   //if (i == 'codigo_control' || i=='actividad' || i=='apellido' || i=='actividad' || i=='fecha_de_inspeccion'|| i=='observacion'|| i=='condicion_de_la_plantacion'){
				var $td = $('<tr>').append(
				  $('<td>').text(i),
				  $('<td>').text(item)
				  ).appendTo('#grafico2');
				  // }
			    })
				
			}
			
		*/
		/*	
			//en forma de tabla
			$("#grafico20").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#grafico20").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	    row.append($("<th Width='200 px'>Especie</th>"));
		row.append($("<th Width='150 px'>Tareas</th>"));
	$.each(data, function(index, value){
			
					var row = $("<tr />");
					$("#grafico20").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.name + "</td>"));
					row.append($("<td>" + value.y + "</td>"));
					
			
	});

*/


})	

//tercero

$.get('index.php?r=Graficos/GetCuencaanoex&miccuenca='+microcuenca, function (data1){
	dataano = JSON.parse(data1);	
		
  
});

$.get('index.php?r=Graficos/GetCuencaEspecies&miccuenca='+microcuenca, function (data2){
	dataespecie = JSON.parse(data2);
});



$.get('index.php?r=Graficos/GetCuencaanoEspecies&miccuenca='+microcuenca, function (data){
	//$.get('index.php?r=Graficos/GetAno&id='+id2, function (data){
	
	data = JSON.parse(data);
	//alert('sali');

	  //alert ('año minimo  '+dataano[0].ano + '  Especie mas frecuente  '+dataespecie[0].especie);
		
	
	
	//alert('sali');
	;
    var datos=[];
	
//bucle para todas las especies

//bucle para todos los años

   
	
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
	//alert (datosespecie);
	//alert (datosespecie[4]);
	 var dato=[];
	
	var dato={
						name:dataespecie[l].especie,
						data:datosespecie,
						
					}
					//alert ( +data[i].ano+'    '+data[i].especie+'    '+data[i].cantidad);
					
					
					datos.push(dato);
					
				
	}
					
	
	
$('#container10').highcharts({


    title: {
        text: 'Evolución anual superficie plantada'
    },

    subtitle: {
        text: '   '
    },

    yAxis: {
        title: {
            text: 'Tareas'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },
	
	

    series: datos,

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});


//cuarto

	
$('#container11').highcharts({
    chart: {
        type: 'area'
    },
    title: {
        text: 'Evolucion historica de la superficie plantada segun principales especies'
    },
    subtitle: {
        text: 'Fuente SPSO'
    },
    xAxis: {
        categories: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017','2018'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Percent'
        }
    },
	legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} Tareas)<br/>',
        split: true
    },
    plotOptions: {
        area: {
            stacking: 'percent',
            lineColor: '#ffffff',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#ffffff'
            }
        }
    },
    series: datos,
});

//quinto

$('#container12').highcharts({
    chart: {
        type: 'area'
    },
    title: {
        text: 'Superfice en Traeas '
    },
    subtitle: {
        text: 'Fuente: Plan Sierra'
    },
    xAxis: {
        categories: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Tareas'
        },
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
	legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    tooltip: {
        split: true,
        valueSuffix: ' Tareas'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
     series: datos,
});




//fin de quinto


});	

//fin tercero
	

	
}	
	
	


function cargarGrafico2(euros){
	
	$.get('index.php?r=TblIsoCv/getEvolucion&idAlcampo='+idAlcampo+"&euros="+euros, function(d){
		etiqueta = "%";
		if(euros==true){
			etiqueta = "mill €";
		}
		
		Highcharts.setOptions({
					global: {
						useUTC: false,
						
					},
					lang: {
					  decimalPoint: ',',
					  thousandsSep: '.'
					}
				});
				
		$('#grafico2').highcharts({
			chart: {
				zoomType: 'x'
			},
			title: {
				text: 'Evolución cifra de ventas por isocrona'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.y:.2f} </b>'
			},
			xAxis: {
				/*type: 'datetime',
				minRange: 360 * 24 * 3600000 // fourteen days*/
				 categories: d.fechas
			},
			yAxis: {
				title: {
					text: "Evolución (" + etiqueta + ")"
				}
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.y:.2f} '+etiqueta+'</b>'
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
				//enabled:false,
				url: 'http://sit.plansierra.org/sigma/js/exportToPNG.php'
			},
			legend: {
				align: 'right',
				verticalAlign: 'top',
				layout: 'vertical',
				x: 0,
				y: 20
			},
			series: [
				{name:"Isocrona 0-2'",
				color: "#2626FF",
				data: d.iso1},
				{name:"Isocrona 2-5'",
				color: "#FF8000",
				data: d.iso2},
				{name:"Isocrona 5-8'",
				color: "#FF00FF",
				data: d.iso3},
				{name:"Isocrona 8-12'",
				color: "#00B32D",
				data: d.iso4},
				{name:"Isocrona 12-20'",
				color: "#FFFF00",
				data: d.iso5},
				{name:"Residual",
				color: "#000000",
				data: d.resto},
				
			]
		 })
		 
		$("#seleccion").empty();
		var radioSet = $('<div id="radio">');
		radioSet.appendTo('#seleccion');
		var radioBtn = $('<input type="radio" id="euros" name="radio" checked="checked">');
		if(!euros)
			radioBtn = $('<input type="radio" id="euros" name="radio">');
		radioBtn.appendTo('#radio');
		var radioLbl = $('<label for="euros">Euros</label>');
		radioLbl.appendTo('#radio');
		
		var radioBtn = $('<input type="radio" id="porc" name="radio">');
		if(!euros)
			radioBtn = $('<input type="radio" id="porc" name="radio" checked="checked">');
		radioBtn.appendTo('#radio');
		var radioLbl = $('<label for="porc">% Cifra venta</label>');
		radioLbl.appendTo('#radio');
		
		$( "#radio" ).buttonset()
			.change(function( event ) {
				e = false;
				if(event.target.id == "euros")
					e = true;
				cargarGrafico2(e);
			});
	})
}


//todo el plan sierra

function cargarGraficoAnoPlansierra(){	
	
	
		//plantaciones_ano_en_curso.getSource().setUrl("http://sit.plansierra.org/cgi-bin/mapserv.exe?MAP=c:\\datos/sierra/especies.map&ano=2018&doy=161");
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
	

		
	$("#psgrafico79").append("<agenciaforestal td width=1200px><h2	 align='left' style='color:darkred;'> <b><i >&nbsp;       Agencia Forestal&nbsp;</i></b></h2></td> ");
	$("#psgrafico80").append("</td>   <td ><h3><b>&nbsp; Fecha de consulta:  Del &nbsp; " +finicial2+"&nbsp; a la fecha &nbsp; "+ffinal2+"&nbsp; </b></h3></td> " );
	//$("#psgrafico80_A").html('<img id="loading-image" width=200 src="images/logo3_75_75.gif" alt="Loading..." />');
		
		
       var id2 = parseInt($("#ano").val());
	   
	   $('#psgrafico101').empty();	
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
	
	
	
	/*
	
	$.get('index.php?r=Poa/GetTecnicoActividad&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec, function (data){

	data = JSON.parse(data);			
	
	$('#psgrafico100').empty();
$('#psgrafico100').highcharts({
	chart: {
				type: 'spline',
				zoomType: 'xy'
			},


    title: {
        text: 'Supervisiones por técnico'
    },

    

    yAxis: {
        title: {
            text: 'Supervisiones'
        }
    },
	xAxis: {
        title: {
            text: 'Numero de técnico (relativo)'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0
        }
    },

    series: [{
        name: 'Supervisiones por técnico',
		color: 'rgba(255, 30, 30, 1)',
        data: data
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

})
	})	
	
	*/
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













///////////////////////////////////////////////////











	
	
	$.get('index.php?r=Poa/GetActividadTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$("#psTitulo92").empty();
	$("#psTitulo92").append("<td><h4><b>" +" Tipo de actividad de reforestación  </b></h4></td>" );
	$('#psgrafico92').empty();
	 var row = $("<tr />");
		$("#psgrafico92").append(row); 
		row.append($("<th></th>"));
		//row.append($("<td width=30%><h5><b>Actividad</b></h5></td>"));
		row.append($("<td width=40%><h4><b>Actividad</b></h4></td>"));
		
		row.append($("<td width=30%><h4><b>Plantaciones</b></h4></td>"));
		row.append($("<td width=30%><h4><b>Tareas</b></h4></td>"));
			var row = $("<tr />")	
			$("#psgrafico92").append(row); 
			
		var totalsup=0;
		var sumatotales=[];
		sumatotales[0]=0;
		sumatotales[1]=0;
		for (var i=0; i < data3.length; i++){
			
			if (data3[i].tipo != 'Otros1'){
			$("#psgrafico92").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			//row.append($("<td><h5>" + data3[i].actividad.toLocaleString('en-EN') + "</td>"));
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			sumatotales[0]=sumatotales[0]+data3[i].plantas;
			sumatotales[1]=sumatotales[1]+data3[i].tareas;
			var row = $("<tr />");
			
			$("#psgrafico92").append(row); 
			}
		}
		row.append($("<th></th>"));
		
		
	
	})
	
	$("#psTitulo93").empty();
	$("#psgrafico93").empty();
	$("#psTitulo93").append("<td><h4><b><c>" +"Tipo de actividad por Subcuenca (Tareas)</c></b></h4></td>" );
	
	$.get('index.php?r=Poa/GetActividadTodaActividadSubcuencas&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var sumatotales =[];
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	
//primera actividad


	$.get('index.php?r=Poa/GetActividadTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetSubcuencas', function (data5){
			data5 = JSON.parse(data5);

	
		//$("#Titulo93sub").append("<td><h5>" +data4[0].actividad+ "</h5></td>" );
	
	 var row = $("<tr />");
		$("#psgrafico93").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=25%><h4><b>Subcuenca</b></h4></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=25%><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			//OJO eleiminado por orden de alf_jim
			//row.append($("<td width=20%><h5><b>Total</b></h5></td>"));
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
					//ojo quitado por orden de alf_jim
					//row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
				$("#psgrafico93").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico93").append(row); 
			
			row.append($("<th></th>"));
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			//ojomodificado bucle por orden de alf_jim
			//for (var j=0; j < data4.length+1; j++){
			for (var j=0; j < data4.length; j++){
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#psgrafico93").append(row); 
		
	   })
	  })
	})
	
	/*
	$.get('index.php?r=Poa/GetActividadActividadSubcuencas&tipoactividad=0&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var sumatotales =[];
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	  
	  //segunda actividad
	  
	 $.get('index.php?r=Poa/GetActividadActividad&tipoactividad=0&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetSubcuencasActividad&tipoactividad=0&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);

	
		$("#psTitulo93bis").append("<td><h5>" +data4[0].actividad+ "</h5></td>" );
	
	 var row = $("<tr />");
		$("#psgrafico93bis").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=20%<h5><b>Subcuenca</b></h5></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%><h5><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h5></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=20%><h5><b>Total</b></h5></td>"));
			var row = $("<tr />")	
			$("#psgrafico93bis").append(row); 
			
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
				$("#psgrafico93bis").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico93bis").append(row); 
			
			row.append($("<th></th>"));
			row.append($("<td><h4><b>"+ "TOTAL" +"</b></h4></td>"));
			for (var j=0; j < data4.length+1; j++){
			row.append($("<td><h4><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#grafico93bis").append(row); 
		
	   })
	  }) 
	  
	})
	*/
	$("#psTitulo104").empty();
	$("#psgrafico104").empty();
	$("#psTitulo104").append("<td><h4><b>" +"Salidas de plantas del vivero por especie </b></h4></td>" );
	
	$.get('index.php?r=Poa/GetEspecieTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$.get('index.php?r=Poa/GetActividadTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		//$.get('index.php?r=Poa/GetEspecieUtilizadasActividad&tipoactividad='+tipoactividad+'&tipoactividadsec='+tipoactividadsec+'&finicial='+finicial+'&ffinal='+ffinal, function (data5){
		$.get('index.php?r=Poa/GetEspecieSalidasViveroTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);

	
	//$("#Titulo104sub").append("<td><h5> Plantas</h5></td>" );
		
	
		 var row = $("<tr />");
		$("#psgrafico104").append(row); 
		 
	
		row.append($("<td width=25% class=sucess colspan=1></td>"));
		row.append($("<td width=75% class=sucess colspan=5 ><h4><b> Plantas </b></h4></td>"));
		row.append($("<th></th>"));
		
		var row = $("<tr />");
		$("#psgrafico104").append(row); 
		row.append($("<td width=25% ><h4><b>Especies</b></h4></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%  ><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=15% ><h4><b>" + "Total salidas" + "</b></h4></td>"));
		
			
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
					//row.append($("<td>" +  "</td>"));
					
					//bucle de tipo de plantacion
					
				if (data5[i].familia == 'Café' || data5[i].familia == 'Otros materiales' ) {
					nose=1;
				} else {
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
				
		}
				
						
			var row = $("<tr />");
			
			$("#psgrafico104").append(row); 
		
			
			//row.append($("<th></th>"));
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			for (var j=0; j < data4.length+1; j++){
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#psgrafico104").append(row); 
	
	})
	})
})

///////////////////////////////////////////////////////////////////////////

// EVALUACION DE SUPERVIVENCIA

///////////////////////////////////////////////////////////////////////////
	$("#psTitulo105").empty();
	$("#psgrafico105").empty();
	$("#psTitulo105").append("<td><h4><b>" +"Evaluacion de supervivencia </b></h4></td>" );
	
	 var row = $("<tr />");
		$("#psgrafico105").append(row); 
		 
	
		row.append($("<td width=50% ></td>"));
		row.append($("<td width=50% ><h4><b> Resultado </b></h4></td>"));
		row.append($("<th></th>"));
		
		var row = $("<tr />");
		$("#psgrafico105").append(row); 
	
$.get('index.php?r=Poa/GetSupervivencia&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
		
			var row = $("<tr />")	
			$("#psgrafico105").append(row); 
			
		var totalsup=0;
		
			
			
			$("#psgrafico105").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			
			row.append($("<td><h5>Tareas evaluadas</td>"));
			row.append($("<td><h5>" + data3[i].tareas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#psgrafico105").append(row); 
			
			row.append($("<td><h5>Cantidad de plantas plantadas</td>"));
			row.append($("<td><h5>" + data3[i].plantadas.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#psgrafico105").append(row); 
			
			row.append($("<td><h5>Cantidad de plantas sobrevivientes</td>"));
			row.append($("<td><h5>" + data3[i].sobrevivientes.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#psgrafico105").append(row);
		
	
			row.append($("<td><h5>Por ciento de sobrevivencia</td>"));
			row.append($("<td><h5>" + data3[i].porcentaje.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#psgrafico105").append(row);
			
			row.append($("<td><h5>Cantidad de tareas que requieren replantación</td>"));
			row.append($("<td><h5>" + data3[i].areplantar.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</td>"));
			var row = $("<tr />");
			$("#psgrafico105").append(row);
			
			
			
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

	
	$("#psTitulo104bis").append("<td><h5>" +data4[0].actividad+ "</h5></td>" );
		
	
		 var row = $("<tr />");
		$("#psgrafico104bis").append(row); 
		 
		row.append($("<th></th>"));
		row.append($("<td width=20%<h5><b>Especies</b></h5></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%><h5><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h5></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=20%><h5><b>" + "Total salidas." + "</b></h5></td>"));
		
			
			var row = $("<tr />")	
			$("#psgrafico104bis").append(row); 
			
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
					
					
					
				$("#psgrafico104bis").append(row); 
				
				var row = $("<tr />");
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico104bis").append(row); 
		
			
			row.append($("<th></th>"));
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			for (var j=0; j < data4.length+1; j++){
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#psgrafico104bis").append(row); 
	
	})
	})
})

*/

	
	$.get('index.php?r=Poa/GetMunicipioTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
		$("#psTitulo102").empty();
		$("#psgrafico102").empty();
		$("#psTitulo102").append("<td><h4><b>" +" Superficie reforestada por Municipio" + "<b></h4></td>" );
	
	    var row = $("<tr />");
		$("#psgrafico102").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h4><b>Municipio</b></h4></td>"));
		
		row.append($("<td width=40%><h4><b>Tareas</b></h4></td>"));
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
			totalsup=totalsup+data3[i].tareas
			$("#psgrafico102").append(row); 
		
		}
		$("#psgrafico102").append(row); 
		row.append($("<td>" +  "</td>"));
		row.append($("<td><h4 style='color:darkred;' ><b><i><b>TOTAL </b></h4></td>"));
		
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));
	$("#psgrafico102").append(row);
	})
	
	
	//especies plantadas
	$("#psTitulo94").empty();
	$("#psgrafico94B").empty();
	$("#psTitulo94").append("<td><h4><b><center>"+"&nbsp;    Especies plantadas en la actividad de reforestación</b></h4></td>" );
	
	$.get('index.php?r=Poa/GetEspecieTodaActividadPlantadas&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
	$.get('index.php?r=Poa/GetActividadTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data4){
	data4 = JSON.parse(data4);
		$.get('index.php?r=Poa/GetEspecieUtilizadasTodaActividad&finicial='+finicial+'&ffinal='+ffinal, function (data5){
			data5 = JSON.parse(data5);

	
		var row = $("<tr />");
		$("#psgrafico94B").append(row); 
		
		row.append($("<td width=10% class=sucess colspan=1></td>"));
		row.append($("<td width=45% class=sucess colspan=3 ><h4><b> Tareas </b></h4></td>"));
		row.append($("<td width=45% class=sucess colspan=3 ><h4><b> Plantas </b></h4></td>"));
		row.append($("<th></th>"));
		
		var row = $("<tr />");
		 $("#psgrafico94B").append(row); 
		
		row.append($("<td width=22%><h4><b>Especies</b></h4></td>"));
		
		
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=13%><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
			
		}
			//ojo quitado por alf_jim
			//row.append($("<td width=15%><h4><b>" + "Total tareas" + "</b></h4></td>"));	
			
		for (var i=0; i< data4.length; i++){
			
			//ojo se quita a materiales de plantas por orden de alf_jim
		if ( data4[i].tipo !='Mantenimiento'){
			row.append($("<td width=13%><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
		}	
		}
			row.append($("<td width=13%><h4><b>" + "Total plantas" + "</b></h4></td>"));		
			
			var row = $("<tr />")	
			$("#psgrafico94B").append(row); 
			
		var totalsup=0;
	
	
		
		
		//---------------NUEVO
		// bucle de subcuenca
		var sumatotales=[];
		for (var l=0; l < (4+2*data4.length);l++){
			sumatotales[l]=0;
		}
		//titulos
				for (var i=0; i < data5.length; i++){
					
					// ojo se quita cafe y otros materiales por orden de Alf_jim
					
				if (data5[i].familia == 'Café' || data5[i].familia == 'Otros materiales' ) {
					nose=1;
				} else {
					row.append($("<td><h5>" + data5[i].familia.toLocaleString('en-EN') + "</h5></td>"));
					var suma=0;
					
			
					
					
					
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						for (var j=0; j < data3.length; j++){
						
						if (data5[i].familia ==  data3[j].familia){
							if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].tareas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></td>"));
								suma =suma + data3[j].tareas;
								sumatotales[l+1]=sumatotales[l+1]+data3[j].tareas;
								sumatotales[1+data4.length]=sumatotales[1+data4.length]+data3[j].tareas;
							}
						}
						}
						
						

						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						
					}
					
					//ojo quito la siguinete linea para no tener osççel sumatorio de tareas por especie
					//row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					for (var l=0; l < data4.length;l++){
						var nulo = 0;
						
						//ojo este if se introduuce por orden s¡de alfredo_jim
						if ( data4[l].tipo != 'Mantenimiento'){
						  for (var j=0; j < data3.length; j++){
						
						
						    if (data5[i].familia ==  data3[j].familia){
							  if (data4[l].tipo ==  data3[j].tipo){
								nulo = nulo+1;
								row.append($("<td><h5>" + data3[j].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></td>"));
								suma =suma + data3[j].plantas;
								sumatotales[l+2+data4.length]=sumatotales[l+2+data4.length]+data3[j].plantas;
								sumatotales[2+2*data4.length]=sumatotales[2+2*data4.length]+data3[j].plantas;
							 }
						}
							}
						
						
						

						if (nulo==0){
							row.append($("<td><h5>" + "--" + "</td>"));
						}
						}
					}
					
					row.append($("<td><h5><b>" + suma.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</h5></b></td>"));
					var suma=0;
					
					
				$("#psgrafico94B").append(row); 
				
				var row = $("<tr />");
				}
				
				}
				
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico94B").append(row); 
		
		var row = $("<tr />");
			
			$("#psgrafico94B").append(row); 
			
			//row.append($("<th></th>"));
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			
			//modificado el 03 de sep donde pone 1+ 1*data4.length hntes ponia 2+2*dat4.length
			for (var j=1; j < (3+2*data4.length); j++){
				
				//ojo esto se introduce por oredn
				if (j==4 || j==7) {
				} else {					
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
			}
		var row = $("<tr />");
			
			$("#psgrafico94B").append(row); 
		
	
	})
	})
	})
	//POR DESTINO
	$("#psTitulo95").empty();
	$("#psgrafico95").empty();
	$("#psTitulo95").append("<td witdht=100%><h4><b>Superficie de reforestación segun el destino de la reforestación" + "</center></b></h4></td>" );
	//////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////
	
	$.get('index.php?r=Poa/GetEspecieTodaActividadDestino&finicial='+finicial+'&ffinal='+ffinal, function (data3){
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
		
		 
		
		row.append($("<td width=40%><h4><b>Especies</b></h4></td>"));
		for (var i=0; i< data4.length; i++){
			row.append($("<td width=20%><h4><b>" + data4[i].tipo.toLocaleString('en-EN') + "</b></h4></td>"));	
			//row.append($("<td width=100><h5><b>Re</b></h5></td>"));
			//row.append($("<td width=20%><h5><b>Ma</b></h5></td>"));
		}
			row.append($("<td width=20%><h4><b>" + "Total plantas" + "</b></h4></td>"));
			
		
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
					if (data5[i].familia == 'Café' || data5[i].familia == 'Otros materiales' ) {
					nose=1;
				} else {
				
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
				}
				
				
						
			var row = $("<tr />");
			
			$("#psgrafico95").append(row); 
		
		var row = $("<tr />");
			
			$("#psgrafico95").append(row); 
			
				
			
			
			
		
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>"+ "TOTAL" +"</b></h4></td>"));
			

			for (var j=0; j < (1+1*data4.length); j++){
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + sumatotales[j].toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));	
			}
		var row = $("<tr />");
			
			$("#psgrafico95").append(row); 
		
		
		
		
		
		
			
				
				
				
						
		
	
	})
	})
	})
	
	
	
	//////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////
	
	//por proyecto
	
	$.get('index.php?r=Poa/GetProyectoTodoActividad&finicial='+finicial+'&ffinal='+ffinal, function (data3){
	data3 = JSON.parse(data3);	
	var totalSup = 0;
	var totalNum = 0;
	var row = $("<tr />");
	var i = 0;
	var c = 0, s =0;
		$("#psTitulo103").empty();
		$("#psgrafico103").empty();
		$("#psTitulo103").append("<td><h4><b>" +"Superficie de reforestación por Fondo" + "</b></h4></td>" );
	
	 var row = $("<tr />");
		$("#psgrafico103").append(row); 
		row.append($("<th></th>"));
		row.append($("<td width=60%><h4><b>Proyecto</b></h4></td>"));
		
		row.append($("<td width=40%><h4><b>Tareas</b></h4></td>"));
			var row = $("<tr />")	
			$("#psgrafico103").append(row); 
			
		var totalsup=0;
		for (var i=0; i < data3.length; i++){
			
			
			$("#psgrafico103").append(row); 
			//alert (actividad01.toLocaleString('de-DE'));
		    
			row.append($("<td>" +  "</td>"));
			
			row.append($("<td><h5>" + data3[i].tipo.toLocaleString('en-EN') + "</td>"));
		
			row.append($("<td><h5>" + data3[i].plantas.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</td>"));
			var row = $("<tr />");
			totalsup=totalsup+data3[i].plantas
			$("#psgrafico103").append(row); 
		
		}
		$("#psgrafico103").append(row); 
		row.append($("<td>" +  "</td>"));
		row.append($("<td><h4><h4 style='color:darkred;' ><b><i>TOTAL </b></h4></td>"));
		
			row.append($("<td><h4 style='color:darkred;' ><b><i><b>" + totalsup.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</b></h4></td>"));
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

	

//fin tercero


	
}
	

//fin tercero

	
	
/**
 * Build a tree layer from the map layers with visible and opacity 
 * options.
 * 
 * @param {type} layer
 * @returns {String}
 */
function buildLayerTree(layer) {
	var elem;
	var name = layer.get('id') ? layer.get('name') : "Group";
	var div;
	if(layer.get('name')){
		if(layer.get('visible')){
			div = "<li data-layerid='" + name + "'>" +
				"<span><i class='glyphicon glyphicon-check'></i>" + layer.get('name') + "</span>" +
				" ";
		}else{
			div = "<li data-layerid='" + name + "'>" +
				"<span><i class='glyphicon glyphicon-unchecked'></i>" + layer.get('name') + "</span>" +
				" ";
		}
		if(!layer.getLayers){
				if(layer.get('url')){
					url = layer.get('url');
					div += "<br><img src='" + url +"'></img>";
					
				}
			}
	}
			//div += "<input style='width:80px;' class='opacity' type='text' value='' data-slider-min='0' data-slider-max='1' data-slider-step='0.1' data-slider-tooltip='hide'>";
		if (layer.getLayers) {
			var sublayersElem = ''; 
			var layers = layer.getLayers().getArray(),
					len = layers.length;
			for (var i = len - 1; i >= 0; i--) {
				sublayersElem += buildLayerTree(layers[i]);
			}
			elem = div + " <ul class='parent_li'>" + sublayersElem + "</ul></li>";
		} else {
			elem = div + " </li>";
		}
	
	return elem;
}

/**
 * Initialize the tree from the map layers
 * @returns {undefined}
 */
function initializeTree() {

	var elem = buildLayerTree(map.getLayerGroup());
	$('#layertree').empty().append(elem);

	$('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
	$('.tree li.parent_li > span').on('click', function(e) {
		var children = $(this).parent('li.parent_li').find(' > ul > li');
		if (children.is(":visible")) {
			children.hide('fast');
			$(this).attr('title', 'Expand this branch').find(' > i').addClass('glyphicon-plus').removeClass('glyphicon-minus');
		} else {
			children.show('fast');
			$(this).attr('title', 'Collapse this branch').find(' > i').addClass('glyphicon-minus').removeClass('glyphicon-plus');
		}
		e.stopPropagation();
	});
	
	//$('li[data-layerid=Competencia]')[0].hide('fast');
	$('#layertree > li > ul ').find(' > li > ul > li').hide('fast');
}
//--------------------------------------------------------------------
//
//
//
//AQUI escribe la informacion sacarda de pantalla en la ventada del este
//
//
//
//
//----------------------------------------------------------------
function verGrafico(data, event, coordenadas, idMuestra){
			
			$('#tabs-1').empty();
			$('#tabs-2').empty();
			$('#tabs-3').empty();
			$('#tabs-4').empty();		
			$('#tabs-5').empty();
		
			$('#tabs-7').empty();
			$('#tabs-8').empty();
			//$('#tabs-9').empty();
			var idPuntos = data[0].gid;
			
			if(data.length>1){
				idPuntos = $("#featuresFound")[0].selectedOptions[0].value;
				//alert ('puntos  '+idPuntos);
			}
			
			//alert ('prueba' +idPuntos)
			
			
			var selectedIndex = 0;
			if(data.length>1){
				selectedIndex = $("#featuresFound")[0].selectedIndex;
				
				
			}
			
			//alert ('index  '+selectedIndex);




			
			
// TAB-3-			
			
			
			var codigobuscado=data[selectedIndex].codigo;
			//alert( 'test   ' + codigobuscado);
	
			
	$.get( "index.php?r=puntos/GetPlantacionEspecieSumatorio&plantacion="+codigobuscado, function( data5 ) {
							
				data5=JSON.parse(data5);
				var datosplantacion=[];
				
	//FORMA DE TABLA COMPLETA			
	$("#tabs-3").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#tabs-3").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>  Especie</th>"));
	row.append($("<th Width='150 px'> Cantidad de Plantas</th>"));
	
	$.each(data5, function(index, value){
			
					var row = $("<tr />");
					$("#tabs-3").append(row);
					//this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
		});
	var row = $("<tr />");
	$("#tabs-3").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	myLayout.open('east');			
			
		})

			
//PRUEBA TABS_1
		
		//	$.get( "index.php?r=puntos/GetPointsIntersect&x="+sal[0]+"&y="+sal[1]+"&resolution="+resolution, function( data ) {
			$.get( "index.php?r=puntos/GetPlantacion&planta="+codigobuscado, function( data2 ) {
							
				data1=JSON.parse(data2);
				var datosplantacion=[];
				//alert ('linea 1935  Longitud = ' +data1.length );
				for(var j=0; j < data1.length; j++){	
		           //alert (' linea 1937 bucle  '+j +'   ' +data1[j].Plantacion +'     ' +data1[j].Predio );
				}
				for(var i=0; i < data.length; i++){
					var dato={
						Plantacion:data[i].Plantacion,
						Predio:data[i].Predio
						
					}
					datosplantacion.push(dato);
				}	
			
		
// TAB-1-	

		
			for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data1[j], function(i, item) {
				
					var $tr = $('<tr>').append(
						//
						
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-1');
				
				
			})
			}

	
			
			
			
			})
			
	
	
	
	

	var codigobuscado=data[selectedIndex].codigo;
			//alert( 'test   ' + codigobuscado);
			
	// TAB-4-			
	$.get( "index.php?r=puntos/GetActividad&plantacion="+codigobuscado, function( data20 ) {
							
				data20=JSON.parse(data20);
				var datosplantacion=[];
				
				
				

				//Cabecera
				
			for(var j=0; j < data20.length; j++){	
			   $.each(data20[j], function(i, item) {
				   //if (i == 'codigo_control' || i=='actividad' || i=='apellido' || i=='actividad' || i=='fecha_de_inspeccion'|| i=='observacion'|| i=='condicion_de_la_plantacion'){
				var $td = $('<tr>').append(
				  $('<td>').text(i),
				  $('<td>').text(item)
				  ).appendTo('#tabs-4');
				  // }
			    })
				
			}
			
			
			$('<tr>').appendTo('#tabs-4');		
			
			//llena tabla
			/*
			for(var j=0; j < data20.length; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
				$.each(data20[j], function(i, item) {
					 if (i == 'codigo_control' || i=='actividad' || i=='apellido' || i=='actividad' || i=='fecha_de_inspeccion'|| i=='observacion'|| i=='condicion_de_la_plantacion'){
				
					var $td = $('<td>').append(
						//$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-4');
					 }
				})
				$('<tr>').appendTo('#tabs-4');	
			}

		*/
				
				
	
		
		})		
			
			

// TAB-2-			
	$.get( "index.php?r=puntos/GetPlantacionSegunda&plantacion="+codigobuscado, function( data6 ) {
							
				data6=JSON.parse(data6);
				var datosplantacion=[];
				
	for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data6[j], function(i, item) {
				
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-2');
				
				
			})		
			
		}
		
		})
		
	//TABS-7

    $.get( "index.php?r=puntos/GetLabor&plantacion="+codigobuscado, function( data8 ) {
							
				data8=JSON.parse(data8);
				var datosplantacion=[];
				for(var j=0; j < data8.length; j++){
				$.each(data8[j], function(i, item) {
				
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-7');
				
				})
			}
	} )		
			
	//TABS-5
	
	
$.get( "index.php?r=puntos/GetPredio&plantacion="+codigobuscado, function( data7 ) {
							
				data7=JSON.parse(data7);
				var datosplantacion=[];
				
	for(var j=0; j < 1; j++){
			
		     //alert (' fuera del bucle linea 1953' +data1[j].Plantacion +'     ' +data1[j].Predio );
			$.each(data7[j], function(i, item) {
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-5');
			})			
		}
		})

		
		//TABS-8

  $.get( "index.php?r=puntos/GetCliente&plantacion="+codigobuscado, function( data9 ) {
							
				data9=JSON.parse(data9);
				var datosplantacion=[];
				for(var j=0; j < data9.length; j++){
				$.each(data9[j], function(i, item) {
				
					var $tr = $('<tr>').append(
						$('<td>').text(i),
						$('<td>').text(item)
					).appendTo('#tabs-8');
				
				})
			}
	} )		
		
		
		
	
//			
//PRUEBA DE OTRA FORMA DE CARGAR LOS DATOS
//		
//TAB -6-
	

//Plantacion	

$.get( "index.php?r=puntos/GetPlantacionEspecie&plantacion="+codigobuscado, function( data4 ) {
							
				data4=JSON.parse(data4);
				var datosplantacion=[];
				//alert ('linea 1935  Longitud = ' +data1.length );
				for(var j=0; j < data4.length; j++){	
		           //alert (' linea 2281 bucle  '+j +'   ' +data1[j].Plantacion +'     ' +data1[j].Predio );
				}
				/*
				for(var i=0; i < data4.length; i++){
					var dato={
						Plantacion:data4[i].Plantacion,
						Predio:data4[i].Predio
						
					}
					datosplantacion.push(dato);
				}	
			
		*/
			
			
			//llena tabla
			

	
	$("#infoPlantacion").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#infoPlantacion").append(row); 
	//this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>Especie</th>"));
	row.append($("<th Width='150 px'>Cantidad de Plantas</th>"));
	row.append($("<th Width='150 px'>Tareas plantadas</th>"));
	row.append($("<th Width='150 px'>Tipo de plantación</th>"));
	$.each(data4, function(index, value){
			
			if (value.Tipo_de_plantacion == "Plantación (Reforestación)") {
					var row = $("<tr />");
					$("#infoPlantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
					row.append($("<td>" + value.Tarea_plantada + "</td>"));
					row.append($("<td>" + value.Tipo_de_plantacion + "</td>"));
					row.append($("<td>" + value.Año_plantación + "</td>"));
					totalSup += value.Cantidad_plantas;
					totalNum += value.Tarea_plantada;
			}
	});
	var row = $("<tr />");
	$("#infoPlantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th><b>Total</b></th>"));
	row.append($("<th style='text-align:center' >" + totalSup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</th>"));
	row.append($("<th  style='text-align:center'>" + totalNum.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</th>"));
	
	
	
	
//REPLANTACION			
			
			myLayout.open('east');	
			$("#infoReplantacion").empty();
	var totalSup = 0;
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#infoReplantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>  Especie</th>"));		
	row.append($("<th Width='150 px'> Cantidad de Plantas</th>"));
	row.append($("<th Width='150 px'>Tareas Replantadas</th>"));
	row.append($("<th Width='150 px'>Tipo de plantación</th>"));
	$.each(data4, function(index, value){
			
			if (value.Tipo_de_plantacion == "Replantación  (Reforestación)") {
					var row = $("<tr />");
					$("#infoReplantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
					row.append($("<td>" + value.Tarea_plantada + "</td>"));
					row.append($("<td>" + value.Tipo_de_plantacion + "</td>"));
					row.append($("<td>" + value.Año_plantación + "</td>"));
					totalSup += value.Cantidad_plantas;
					totalNum += value.Tarea_plantada;
			}
	});
	var row = $("<tr />");
	$("#infoReplantacion").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th><b>Total</b></th>"));
	row.append($("<th style='text-align:center' >" + totalSup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</th>"));
	row.append($("<th  style='text-align:center'>" + totalNum.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</th>"));
		

	
//MANTENIMIENTO
	

var totalSup = 0;
$("#infoMantenimiento").empty();
	var totalNum = 0.0;
	var row = $("<tr />")
	$("#infoMantenimiento").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th Width='200 px'>  Especie</th>"));		
	row.append($("<th Width='150 px'> Cantidad de Plantas</th>"));
	row.append($("<th Width='150 px'>Tareas Mantenida</th>"));
	row.append($("<th Width='150 px'>Tipo de plantación</th>"));
	
	
	$.each(data4, function(index, value){
			
			if (value.Tipo_de_plantacion == "Mantenimiento  (Reforestación)") {
					var row = $("<tr />");
					$("#infoMantenimiento").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
					row.append($("<td  style='text-align:left'>" + value.Especie + "</td>"));
					row.append($("<td>" + value.Cantidad_plantas + "</td>"));
					row.append($("<td>" + value.Tarea_plantada + "</td>"));
					row.append($("<td>" + value.Tipo_de_plantacion + "</td>"));
					row.append($("<td>" + value.Año_plantación + "</td>"));
					totalSup += value.Cantidad_plantas;
					totalNum += value.Tarea_plantada;
			}
	});
	var row = $("<tr />");
	$("#infoMantenimiento").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
	row.append($("<th><b>Total</b></th>"));
	row.append($("<th style='text-align:center' >" + totalSup.toLocaleString('en-EN', {maximumFractionDigits:0}) + "</th>"));
	row.append($("<th  style='text-align:center'>" + totalNum.toLocaleString('en-EN', {maximumFractionDigits:1}) + "</th>"));
		var row = $("<tr />");
	$("#tabs-6").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
		
	
			
			//fin de prueba
			myLayout.open('east');			
			
// fin Prueb tabs_5
			
			
		}	)

		
			
			/*
			var $select = $('<select id="param">').appendTo("#tabs-2");
			$("<option />", {value: '', text: ''}).appendTo($select);		
			var espacio = $("<p id='borrar'><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></p>").appendTo("#tabs-2");
			
			$tr = $('<tr border: "1px solid black">').append(
				$('<td>').text("Parámetro"),
				$('<td>').text("Número datos"),
				$('<td>').text("Primera fecha fecha muestreo"),
				$('<td>').text("Última fecha muestreo")
				
			).appendTo('#tabs-3');
			
			$tr = $('<tr border: "1px solid black">').append(
				$('<td>').text("Parámetro"),
				$('<td>').text("Valor"),			
				$('<td>').text("Última fecha muestreo")			
			).appendTo('#tabs-5');
			
			$.get( "index?r=muestras/getParametersUltimoValor&id="+idPuntos, function( data2 ) {
				for(var i = 0; i<data2.length; i++){
					$tr = $('<tr>').append(
						$('<td>').text(data2[i].desc_parametro),
						$('<td>').text(data2[i].valor),
						$('<td>').text(data2[i].fecha)
					).appendTo('#tabs-5');
				}
			});
			
			//Condición para mostrar en el modal INFO los datos de la muestra a través de la búsqueda
			if (idMuestra != "vacio") {
				$('#tabBusqueda1').show();
				$('#tabBusqueda2').show();
				$('#tabs-6').empty();
				
				$tr = $('<tr border: "1px solid black">').append(
					$('<td>').text("Parámetro"),
					$('<td>').text("Valor"),			
					$('<td>').text("Última fecha muestreo")			
				).appendTo('#tabs-6');
				
				$.get( "index?r=muestras/getParametersIDMuestra&id="+idMuestra, function( data2 ) {
					for(var i = 0; i<data2.length; i++){
						$tr = $('<tr>').append(
							$('<td>').text(data2[i].desc_parametro),
							$('<td>').text(data2[i].valor),
							$('<td>').text(data2[i].fecha)
						).appendTo('#tabs-6');
					}
				});
			}			
			
			$.get( "index?r=muestras/getParameters&id="+idPuntos, function( data2 ) {
				for(var i = 0; i<data2.length; i++){
					$("<option />", {value: data2[i].id_parametro+'-'+data2[i].desc_unidad, text: data2[i].desc_parametro}).appendTo($select);
					$tr = $('<tr>').append(
						$('<td>').text(data2[i].desc_parametro),
						$('<td>').text(data2[i].total),
						$('<td>').text(data2[i].min_fecha),
						$('<td>').text(data2[i].fecha_muestreo)
					).appendTo('#tabs-3');
				}
				
				var r= $('<input type="button" class="btn btn-primary" id="botonScholler" value="Cargar gráfico"/>');
				$("#tabs-4").append(r);			
				$('#botonScholler').click(function(evt){
					$('#botonScholler').show();
					$.getJSON( "index?r=Muestras/getSchollerBerckaloff&id="+idPuntos, function( data3 ) {
						var series = [];
						if(data3.length==0){
							$('<p>').text("No disponible").appendTo("#tabs-4");
							$('#botonScholler').hide();
						}
						else{
							for (var i = 0; i<data3.length; i++){
								var h = {
									name: data3[i][0],
									data: data3[i][1]
								}
								series.push(h);
							}
							$('#tabs-4').highcharts({
								chart:{
									height:280,
									width: 340
								},
								title: {
									text: ''					
								},
								credits:{
									enabled:false
								},
								exporting: {
									enabled: false
								},
								xAxis: {
									categories: ['Calcio', 'Ion cloruro', 'Magnesio', 'Potasio', 'Sodio', 'Ion sulfato']
								},
								yAxis: {
									title: {
										enabled: false
									},
									plotLines: [{
										value: 0,
										width: 1,
										color: '#808080'
									}]
								},
								tooltip: {
									valueSuffix: ' meq'
								},
								legend: {
									
									enabled:false
								},
								series: series
							});
							$('#botonScholler').hide();
						}
					});
				});	
				$('#param').change(function(evt){
				// alert($('#param').find(":selected").text());
					document.getElementById("borrar").innerHTML="";
					var id_param = $('#param').find(":selected")[0].value.split("-")[0];
					var unidad = $('#param').find(":selected")[0].value.split("-")[1];
					var desc_param = $('#param').find(":selected")[0].text;			
					var $div = $('<div id="chartParam">').appendTo("#tabs-2");
					$('.highcharts-data-table').empty();
					
					$.get( "index.php?r=muestras/getAnalytic&id="+idPuntos+"&parametro="+id_param, function( data ) {
						
						
						
						for(key in data){
							if(key=="id")
								continue;
							if(key=="color")
								continue;
							if(key=="id_param")
								continue;
							if(key=="nombre")
								continue;
							
							$('#chartParam').highcharts('StockChart', {
								chart:{
									height:280,
									width: 340
								},
								credits:{
									enabled:false
								},
								rangeSelector : {
									enabled : false
								},
								subtitle : {
									text : key + ' (' + unidad + ')'
								},
								xAxis: {
									ordinal: false
								},
								title : {
									text : ''
								},
								plotOptions:{
									line:{
										color: '#999999',
									},
								},
								exporting: {
									enabled: true
								},
								navigator:{
									height: 20,
									maskFill: 'rgba(200, 200, 200, 0.45)',
									series: {
										type: 'areaspline',
										color: '#999999',
										fillOpacity: 0.05,
										dataGrouping: {
											smoothed: true
										},
										lineWidth: 1,
										marker: {
											enabled: false
										}
									}
								},
								series : [{
									turboThreshold: 5000,
									name : key ,
									data : data[key],
									tooltip: {
										valueDecimals: 2
									}
								}]
							});
							var $butExp = $('<button>', {text: 'Exportar', class: 'btn btn-primary'}).appendTo("#chartParam");
							$butExp.click(exporta);
							
							
							
						}
					});
				 });
			})
			
			if (event != "undefined" || event != "vacio") {
				popup.setPosition(event.coordinate);
			}
			if (coordenadas != "vacio") {
				popup.setPosition(coordenadas);
			}		
			popupContainer.style.display = 'block';
		*/
}
function recargarGraficos(){
	cargarGraficoAnoCuenca();
	cargarGraficoAnoMicroCuenca();
	cargarGraficoAnoPlansierra();
}

// fin pruebas
/**
 * Finds recursively the layer with the specified key and value.
 * @param {ol.layer.Base} layer
 * @param {String} key
 * @param {any} value
 * @returns {ol.layer.Base}
 */
function findBy(layer, key, value) {

	if (layer.get(key) === value) {
		return layer;
	}

	// Find recursively if it is a group
	if (layer.getLayers) {
		var layers = layer.getLayers().getArray(),
				len = layers.length, result;
		for (var i = 0; i < len; i++) {
			result = findBy(layers[i], key, value);
			if (result) {
				return result;
			}
		}
	}

	return null;
}

function getActiveLayers(layers){
	//var layers = map.getLayerGroup();
	

	if(layers.getLayers){
		var group = layers.getLayers();
		
		for(var i = 0; i < group.getArray().length; i++){
			getActiveLayers(group.getArray()[i]);
		}
	}else{
		if(layers.getVisible())
			visibles.push(layers);//console.log(layers.get('id'));
	}
	
}

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-153869615-1', 'auto');
  ga('send', 'pageview');
 
</script>