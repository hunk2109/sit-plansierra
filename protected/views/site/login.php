<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/signin.css"/>
</head>
<body>
	<div class="container">
      <div class="header">
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://argongra.com" target="_blank">Argongra</a>
		  <a class="navbar-brand" href="/sigma">Inicio</a>
           
        </div>
		</div>
	  </div>
	</div>
  
  
	<div class="container">

      <form class="form-signin" role="form" action="index.php?r=site/login" method="post">
        <h2 class="form-signin-heading">Por favor, identifíquese</h2>
        <input type="text" name="LoginForm[username]" id="LoginForm_username" class="form-control" placeholder="Usuario" required autofocus>
        <input type="password" name="LoginForm[password]" id="LoginForm_password" class="form-control" placeholder="Contraseña" required>
        <label class="checkbox">
		  <input name="LoginForm[rememberMe]" id="LoginForm_rememberMe" value="1" type="checkbox"> Recordarme
         
        </label>
		<button type="submit" class="btn btn btn-primary btn-block" name="yt0" value="Login">Aceptar</button>
        
      </form>

    </div> <!-- /container -->
</body>
</html>