<html>
<head>
<!-- NOMBRE DE LA PAGINA
    ================================================== -->
<title>PLAN SIERRA</title>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/carousel.css"/>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script src="https://code.highcharts.com/modules/treemap.js"></script>
<div id="container">
 <script src="js/bootstrap.min.js"></script>
</head>


    <!-- Carousel
    ================================================== -->
    <div class="row">
	<div class="col-lg-2">
	</div>
	  <div class="col-lg-8">
	
	<div id="myCarousel" class="carousel slide"   data-ride="carousel" width="100%" height="30%">
      <!-- Indicators -->
	 
	  
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="images/carrusel_1.jpg" width="100%"  alt="First slide" >
          <div class="container">
            <div class="carousel-caption">
			
			
			<!-- LOGO SOBRe FOTOGRAFIA
			================================================== -->
			
              <p><h1>Sistema de Información Territorial </h1><img src="images/cliente_logo.png" alt="First slide" width='40%'></p> 
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/carrusel_2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <!--h1>Another example headline.</h1-->
              <!--p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p-->
              <p><h1>Sistema de Información Territorial de</h1><img src="images/cliente_logo.png" alt="First slide" width='40%'></p> 
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/carrusel_3.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <!--h1>One more for good measure.</h1-->
              <!--p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p-->
               <p><h1>Sistema de Información Territorial de</h1><img src="images/cliente_logo.png" alt="First slide" width='40%'></p>  
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Atrás</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div><!-- /.carousel -->
	</div>
	 <div class="col-lg-2">
	</div>
		</div>
	<div class="row">
	 <div class="col-lg-12">
	 <h2>  -  </h2>
	   </div>
	<div>
	<?php 
	
	//<!-- LOGIN
    //================================================== -->
	if (Yii::app()->user->isGuest) { ?>
	 <center>
	  <div class="col-lg-2">
	   </div>
	    <div class="col-lg-8">
		
		 <form class="input-group" role="form" action="index.php?r=site/login" method="post" style="text-align:center;">
			<h1 class="form-signin-heading">Acceso al SIT del Plan Sierra</h2>
			
			<input type="text" autocomplete="off" name="LoginForm[username]" id="LoginForm_username" class="form-control" placeholder="Usuario" required autofocus>
			<input type="password" autocomplete="off" name="LoginForm[password]" id="LoginForm_password" class="form-control" placeholder="Contraseña" required>
			<!--<label class="checkbox">-->
				<input name="LoginForm[rememberMe]" id="LoginForm_rememberMe" value="1" type="checkbox"> Recordar		 
			<!--</label>-->
			<br/><br/>
			<button type="submit" class="btn btn btn-primary btn-block" name="yt0" value="Login">Aceptar</button>			
		  </form>
		  </div>
		 <div class="col-lg-2">
	   </div> 
	  </center>
	<?php } else{ ?>
	 <center>
		<!--<div class="well" style="width:30%">-->
		<div  style="width:25%">
		 <h3><?php if (Yii::app()->user->name !== 'jartieda') { ?>
				<a href="index.php?r=site/logout">
					<img class="img-square" src="images/logout.png" alt="Logout" align="right" style="width:50px; height: 50px;">
				</a>
			<?php } ?>
			
		
			<h3><?php if (Yii::app()->user->name == 'jartieda') { ?>
			
				<a href="index.php?r=site/logout">
					<img class="img-square" src="images/logout.png" alt="Logout" align="right" style="width:30px; height: 30px;">
				</a>
			<?php } ?>
			
			Bienvenido al SIT usuario    <?php echo Yii::app()->user->name; ?>
		</h3>
		
		
		</div>
	  </center>
	
	   <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content.


Aqui se cambia muchas cosas de la portada y de los accesos	-->



   <!-- SE ESCOGEN LOS MENUS POSIBLES PARA CADA TIPO DE USUARIO
    ================================================== -->


    <div class="container marketing">

		<!-- Three columns of text below the carousel -->
		<div class="row well">
		<center>
			 <!-- SE ESCOGEN LOS MENUS POSIBLES PARA CADA TIPO DE USUARIO
			SELECCION DIRECTA -->
		<center>	
		  <!--</div>-->
		<?php } ?>
			<?php if (Yii::app()->user->name == 'jlA') { ?>
			<!--<div class="row">-->
			
		</div><!-- /.row -->
		<?php } ?>
		
		
		<?php if (Yii::app()->user->name == 'admin22') { ?>
			<!--<div class="row">-->
			
		</div><!-- /.row -->
		
		<div class="row alert alert-danger">
			
			
					
		</div><!-- /.row -->
		<?php } ?>
		
		<!--AQUI SE DEFINEN los iconos accesibles segn el tipo de usuario segun recoge GROUP
		
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
		

			<!-- Puessto el control a traves de la base de datos PARA GRUPO TEST-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
			
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'test') !== false) {?>
			<div class="row">
			<center>
			<div class="col-lg-3">
			
			
				<a  href="index.php?r=site/cuencas"><img class="img-square" width="40%" src="images/reforestacion.png" </a>
				<h2>Reforestación</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de reforestación.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cuencas" role="button">Acceder</a></p>
			</div>
			
			<div class="col-lg-3">
				<a  href="index.php?r=site/cafegeneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Café</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de cafe.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cafegeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/sistemasfamiliaresgeneral"><img class="img-square" width="40%" src="images/sistemas_fam.png" </a>
				<h2>S. Familiares</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de sistemas familiares.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/sistemasfamiliaresgeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/macadamiageneral"><img class="img-square" width="40%" src="images/macadamia.png" </a>
				<h2>Macadamia</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Macadamia.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/macadamiageneral" role="button">Acceder</a></p>
			</div>
		</div>
		<div class="row">
			
			<div class="col-lg-3">
				<a  href="index.php?r=site/plantacionguamageneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Plantación de guama</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Reforestacion con Guama.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/plantacionguamageneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/generosfgeneral"><img class="img-square" width="40%" src="images/genero.png" </a>
				<h2>Género</h2>
				<p>Acceso a las tablas de Género y otras Sociales.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/generosfgeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
			
				<a href="index.php?r=site/ganaderia"><img class="img-square" width="40%" src="images/ganaderia.png" </a>
				<h2>Silvopastoriles</h2>
				<p>Acceso a las herramienta de visualización de datos de sistemas Silvopastoriles</p>
				<p><a class="btn btn-primary" href="index.php?r=site/ganaderia" role="button">Acceder</a></p>
				
			</div>
			
			<div class="col-lg-3">
				<a href="index.php?r=tblZc/actualiza"><img class="img-square" width="40%" src="images/acueducto.png" </a>
				<h2>Acueductos</h2>
				<p>Acceso al segumiento de parametros e indices de gestion del Plan Sierra</p>
				<p><a class="btn btn-primary" href="index.php?r=tblZc/actualiza" role="button">Acceder</a></p>
			</div>
				<div class="col-lg-3">
				</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				</div>
			<div class="col-lg-3">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>	
			<div class="col-lg-3">
				<a href="index.php?r=site/seguimiento"><img class="img-square" width="40%" src="images/seguimiento.png" alt="Generic placeholder image"></a>
				<h2>Seguimiento</h2>
				<p>Acceso al segumiento de parametros e indices de gestion del Plan Sierra</p>
				<p><a class="btn btn-primary" href="index.php?r=site/seguimiento" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
			</div>
		</div>
			
			
			
			
			
			
			
			
			<div class="row">
			
		</div>
		<?php } ?>
		
		
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
		

			<!-- Puessto el control a traves de la base de datos PARA GRUPO DIRECCION-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
		
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'direccion') !== false) {?>
			<div class="row">
			<center>
			<div class="col-lg-3">
			
			
				<a  href="index.php?r=site/cuencas"><img class="img-square" width="40%" src="images/reforestacion.png" </a>
				<h2>Reforestación</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de reforestación.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cuencas" role="button">Acceder</a></p>
			</div>
			
			<div class="col-lg-3">
				<a  href="index.php?r=site/cafegeneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Café</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de cafe.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cafegeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/sistemasfamiliaresgeneral"><img class="img-square" width="40%" src="images/sistemas_fam.png" </a>
				<h2>S. Familiares</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de sistemas familiares.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/sistemasfamiliaresgeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/macadamiageneral"><img class="img-square" width="40%" src="images/macadamia.png" </a>
				<h2>Macadamia</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Macadamia.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/macadamiageneral" role="button">Acceder</a></p>
			</div>
		</div>
		<div class="row">
			
			<div class="col-lg-3">
				<a  href="index.php?r=site/plantacionguamageneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Plantación de guama</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Reforestacion con Guama.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/plantacionguamageneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/generosfgeneral"><img class="img-square" width="40%" src="images/genero.png" </a>
				<h2>Género</h2>
				<p>Acceso a las tablas de Género y otras Sociales.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/generosfgeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
			
				<a href="index.php?r=site/ganaderia"><img class="img-square" width="40%" src="images/ganaderia.png" </a>
				<h2>Silvopastoriles</h2>
				<p>Acceso a las herramienta de visualización de datos de sistemas Silvopastoriles</p>
				<p><a class="btn btn-primary" href="index.php?r=site/ganaderia" role="button">Acceder</a></p>
				
			</div>
			
			<div class="col-lg-3">
				<a href="index.php?r=tblZc/actualiza"><img class="img-square" width="40%" src="images/acueducto.png" </a>
				<h2>Acueductos</h2>
				<p>Acceso al segumiento de parametros e indices de gestion del Plan Sierra</p>
				<p><a class="btn btn-primary" href="index.php?r=tblZc/actualiza" role="button">Acceder</a></p>
			</div>
				<div class="col-lg-3">
				</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				</div>
			<div class="col-lg-3">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>	
			<div class="col-lg-3">
				<a href="index.php?r=site/seguimiento"><img class="img-square" width="40%" src="images/seguimiento.png" alt="Generic placeholder image"></a>
				<h2>Seguimiento</h2>
				<p>Acceso al segumiento de parametros e indices de gestion del Plan Sierra</p>
				<p><a class="btn btn-primary" href="index.php?r=site/seguimiento" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
			</div>
		</div>
			
			
			
			
			
			
			
			
			<div class="row">
			
		</div>
		<?php } ?>
		
		<!-- Peusto el control a traves de la base de datos, USUARIOS admin-->
		
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
		

			<!-- Puessto el control a traves de la base de datos PARA GRUPO CAFE-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
		
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'Cafe') !== false) {?>
			<div class="row">
			<center>
			
			
			<div class="col-lg-4">
				<a  href="index.php?r=site/cafegeneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Café</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de cafe.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cafegeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-4">
				<a  href="index.php?r=site/plantacionguamageneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Plantación de guama</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Reforestacion con Guama.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/plantacionguamageneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-4">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>	
		</div>
		
		
		
		
		<?php } ?>	
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
		

			<!-- Puessto el control a traves de la base de datos PARA GRUPO Responsable de CUENCA-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
		
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'rcuenca') !== false) {?>
			<div class="row">
			<center>
			<div class="col-lg-4">
			
			
				<a  href="index.php?r=site/cuencas"><img class="img-square" width="40%" src="images/reforestacion.png" </a>
				<h2>Reforestación</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de reforestación.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cuencas" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-4">
				<a  href="index.php?r=site/plantacionguamageneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Plantación de guama</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Reforestacion con Guama.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/plantacionguamageneral" role="button">Acceder</a></p>
			</div>
			
			<div class="col-lg-4">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>	
			
		</div>
		
		<?php } ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
		

			<!-- Puessto el control a traves de la base de datos PARA GRUPO SISTEMAS FAMILIARES-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
		
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'Sisfam') !== false) {?>
			<div class="row">
			<center>
			<div class="col-lg-3">
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/sistemasfamiliaresgeneral"><img class="img-square" width="40%" src="images/sistemas_fam.png" </a>
				<h2>S. Familiares</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de sistemas familiares.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/sistemasfamiliaresgeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
			</div>
			
		</div>
		
			
			
			
			
			
			
			
			
			<div class="row">
			
		</div>
		<?php } ?>
		
		<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
		

			<!-- Puessto el control a traves de la base de datos PARA GRUPO AGENCIA FORESTAL-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
		
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'AgenciaF') !== false) {?>
			<div class="row">
			<center>
			
			<div class="col-lg-3">
			
			
				<a  href="index.php?r=site/cuencas"><img class="img-square" width="40%" src="images/reforestacion.png" </a>
				<h2>Reforestación</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de reforestación.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cuencas" role="button">Acceder</a></p>
			</div>
			
			
			<div class="col-lg-3">
				<a  href="index.php?r=site/macadamiageneral"><img class="img-square" width="40%" src="images/macadamia.png" </a>
				<h2>Macadamia</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Macadamia.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/macadamiageneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/plantacionguamageneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Plantación de guama</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Reforestacion con Guama.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/plantacionguamageneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>	
		</div>
			
		
		<?php } ?>
		
		<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
		

			<!-- Puessto el control a traves de la base de datos PARA GRUPO SILVOPASTORILES-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
		
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'SilvoP') !== false) {?>
			<div class="row">
			<center>
			
		<div class="row">
			<div class="col-lg-3">
			</div>
			<div class="col-lg-3">
			
				<a href="index.php?r=site/ganaderia"><img class="img-square" width="40%" src="images/ganaderia.png" </a>
				<h2>Silvopastoriles</h2>
				<p>Acceso a las herramienta de visualización de datos de sistemas Silvopastoriles</p>
				<p><a class="btn btn-primary" href="index.php?r=site/ganaderia" role="button">Acceder</a></p>
				
			</div>
			<div class="col-lg-3">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>
		<div class="col-lg-3">
			</div>
			
		<?php } ?>
	
		<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
		

			<!-- Puessto el control a traves de la base de datos PARA ESTABLECIMIENTO DE PLANTACIONES FORESTALES-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
		
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'Pepf') !== false) {?>
			<div class="row">
			<center>
			<div class="col-lg-4">
			
			
				<a  href="index.php?r=site/cuencas"><img class="img-square" width="40%" src="images/reforestacion.png" </a>
				<h2>Reforestación</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de reforestación.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cuencas" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-4">
				<a  href="index.php?r=site/plantacionguamageneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Plantación de guama</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Reforestacion con Guama.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/plantacionguamageneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-4">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>	
		</div>
		
		
		<?php } ?>
	
		<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
		

			<!-- Puessto el control a traves de la base de datos PARA GRUPO PROGRAMA DE MEJORA DE BOSQUES-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
		
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'Planes') !== false) {?>
			<div class="row">
			<center>
			<div class="col-lg-4">
			
			
				<a  href="index.php?r=site/cuencas"><img class="img-square" width="40%" src="images/reforestacion.png" </a>
				<h2>Reforestación</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de reforestación.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cuencas" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-4">
				<a  href="index.php?r=site/plantacionguamageneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Plantación de guama</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Reforestacion con Guama.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/plantacionguamageneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-4">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>
		</div>
		
		
		<?php } ?>
	
		
		<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
		

			<!-- Puessto el control a traves de la base de datos PARA GRUPO PRODUCCION DE PLANTAS-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
		
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'Prodplanta') !== false) {?>
			<div class="row">
			<center>
			<div class="col-lg-3">
			
			
				<a  href="index.php?r=site/cuencas"><img class="img-square" width="40%" src="images/reforestacion.png" </a>
				<h2>Reforestación</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de reforestación.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cuencas" role="button">Acceder</a></p>
			</div>
			
			<div class="col-lg-3">
				<a  href="index.php?r=site/cafegeneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Café</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de cafe.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cafegeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/macadamiageneral"><img class="img-square" width="40%" src="images/macadamia.png" </a>
				<h2>Macadamia</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Macadamia.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/macadamiageneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/plantacionguamageneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Plantación de guama</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Reforestacion con Guama.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/plantacionguamageneral" role="button">Acceder</a></p>
			</div>
		</div>
		
		<div class="row">
			<center>	
			<div class="col-lg-3">
			</div>	
			<div class="col-lg-3">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>	
		</div>	
		
		
		
		<?php } ?>
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->	
		
	

			<!-- Puessto el control a traves de la base de datos PARA GRUPO ADMINISTRACION-->
			
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////-->			
	
		
		
		
		
		
		
		 <?php   if (strpos(Yii::app()->user->getState('grupo'), 'admin') !== false) {?>
			<div class="row">
			<center>
			<div class="col-lg-3">
				<a  href="index.php?r=site/cuencas"><img class="img-square" width="40%" src="images/reforestacion.png" </a>
				<h2>Reforestación</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de reforestación.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cuencas" role="button">Acceder</a></p>
			</div>
			
			<div class="col-lg-3">
				<a  href="index.php?r=site/cafegeneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Café</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de cafe.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/cafegeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/sistemasfamiliaresgeneral"><img class="img-square" width="40%" src="images/sistemas_fam.png" </a>
				<h2>S. Familiares</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de sistemas familiares.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/sistemasfamiliaresgeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
				<a  href="index.php?r=site/macadamiageneral"><img class="img-square" width="40%" src="images/macadamia.png" </a>
				<h2>Macadamia</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Macadamia.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/macadamiageneral" role="button">Acceder</a></p>
			</div>
		</div>
		<div class="row">
			
			<div class="col-lg-3">
				<a  href="index.php?r=site/plantacionguamageneral"><img class="img-square" width="40%" src="images/cafe2.png" </a>
				<h2>Plantación de guama</h2>
				<p>Acceso a las herramienta de visualización de datos del programa de Reforestacion con Guama.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/plantacionguamageneral" role="button">Acceder</a></p>
			</div>
		<div class="col-lg-3">
				<a  href="index.php?r=site/generosfgeneral"><img class="img-square" width="40%" src="images/genero.png" </a>
				<h2>Género</h2>
				<p>Acceso a las tablas de Género y otras Sociales.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/generosfgeneral" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
			
				<a href="index.php?r=site/ganaderia"><img class="img-square" width="40%" src="images/ganaderia.png" </a>
				<h2>Silvopastoriles</h2>
				<p>Acceso a las herramienta de visualización de datos de sistemas Silvopastoriles</p>
				<p><a class="btn btn-primary" href="index.php?r=site/ganaderia" role="button">Acceder</a></p>
				
			</div>
			
			<div class="col-lg-3">
				<a href="index.php?r=tblZc/actualiza"><img class="img-square" width="40%" src="images/acueducto.png" </a>
				<h2>Acueductos</h2>
				<p>Acceso al segumiento de parametros e indices de gestion del Plan Sierra</p>
				<p><a class="btn btn-primary" href="index.php?r=tblZc/actualiza" role="button">Acceder</a></p>
			</div>
				<div class="col-lg-3">
				</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				</div>
			<div class="col-lg-3">
				<a href="index.php?r=site/visor2"><img class="img-square" width="40%"src="images/visor.png" alt="Generic placeholder image"></a>
				<h2>Visor general</h2>
				<p>Aplicacion para acceder al visor general del Plan Sierra etc.</p>
				<p><a class="btn btn-primary" href="index.php?r=site/visor2" role="button">Acceder</a></p>
			</div>	
			<div class="col-lg-3">
				<a href="index.php?r=site/seguimiento"><img class="img-square" width="40%" src="images/seguimiento.png" alt="Generic placeholder image"></a>
				<h2>Seguimiento</h2>
				<p>Acceso al segumiento de parametros e indices de gestion del Plan Sierra</p>
				<p><a class="btn btn-primary" href="index.php?r=site/seguimiento" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
			</div>
			<div class="col-lg-3">
				<a href="index.php?r=site/actualizar"><img class="img-square" width="40%" src="images/actualizar.png" alt="Generic placeholder image"></a>
				<h2>Gestión de la WEB</h2>
				<p>Aplicacion para la gestion de la aplicacion, actualizacion de bbdd..</p>
				<p><a class="btn btn-primary" href="index.php?r=site/actualizar" role="button">Acceder</a></p>
			</div><!-- /.col-lg-4 -->
			
			<div class="col-lg-3">
				<a href="index.php?r=users/index"><img class="img-square" width="40%" src="images/claves.png" alt="Generic placeholder image"></a>
				<h2>Códigos acceso</h2>
				<p>Aplicacion para dar codigos de acceso a los usuarios.</p>
				<p><a class="btn btn-primary" href="index.php?r=users/index" role="button">Acceder</a></p>
			</div>
			<div class="col-lg-3">
			</div>
			
		</div>
		
			</center>
			</div>
			<div class="row">
			<div class="col-lg-12">
					<h2>  -  </h2>
				
			</div><!-- /.col-lg-4 -->
			</div>
			<div class="row">
			<center>
		
			

		<?php } ?>	
		
	</div>
	  
</body>
</html>
<script src="js/bootbox.js"></script>
<script>
	$(document).ready(function() {
		$('#btnLoadEncuesta').click(function() {
			bootbox.confirm("¿Realmente deseas ejecutar la carga de datos?", function(result) {
				if(result==true){					
					location.href='index.php?r=tblEncuestaInfluencia/loadEncuesta';
				}
			});
		});
		$('#btnLoadISO').click(function() {
			bootbox.confirm("¿Realmente deseas ejecutar la carga de datos?", function(result) {
				if(result==true){					
					location.href='index.php?r=tblIsoCv/loadIso';
				}
			});
		});
		$('#btnLoadAllZC').click(function() {
			bootbox.confirm("¿Realmente deseas ejecutar la carga de datos?", function(result) {
				if(result==true){					
					location.href='js/loadAllZC.php';
				}
			});
		});
	});
	
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
	ga('create', 'UA-153869615-1', 'auto');
	ga('send', 'pageview');
	
	
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75788227-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-75788227-2');
</script>