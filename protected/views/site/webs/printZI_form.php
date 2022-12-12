<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Obtener informe</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link type="text/css" rel="stylesheet" href="css/layout-default.css" />	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/signin.css"/>
	<style type="text/css">
		#loading
		{
			display:none;
			position:fixed;
			left:0;
			top:0;
			width:100%;
			height:100%;
			background:rgba(255,255,255,0.8);
			z-index:1000;
		}
	  
		#loadingcontent
		{
			display:table;
			position:fixed;
			left:0;
			top:0;
			width:100%;
			height:100%;
		}
	  
		#loadingspinner
		{
			display: table-cell;
			vertical-align:middle;
			width: 100%;
			text-align: center;
			font-size:larger;
			padding-top:80px;
		}
	</style>

	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/spin.min.js"></script>	
	
</head>
<a href="index.php?r=site/zipCode"><img src="images/back.png"></img></a>
<form target="_blank" class="form-signin" id="#form1">
<input class="form-control" type="hidden" name="r" value="site/printZI"></input>
<label>Seleccione hiper Alcampo</label><br>
<select class="form-control" id="id_alcampo" name="id_alcampo"></select><br>
<label>Seleccione Año de Encuesta</label><br>
<select class="form-control" id="id_encuesta" name="id_encuesta"></select><br><br>
<input type="radio" name="zoom" id="zExtent" value="zExtent" checked> Zoom estándar<br>
<input type="radio" name="zoom" id="zCustom" value="zCustom"> Zoom personalizado<br>
<br><br>
<div id="opciones">
	<input class="form-control" type="hidden" name="z_prin" value="-1"></input>
	<input class="form-control" type="hidden" name="zp" value="-1"></input>
	<input class="form-control" type="hidden" name="zs" value="-1"></input>
	<input class="form-control" type="hidden" name="zr" value="-1"></input>
</div><br><br><br>
<button id="aceptar" class="btn btn btn-primary btn-block" type="submit">OBTENER INFORME</button>
</form>

<div id="loading">
    <div id="loadingcontent">
        <p id="loadingspinner">
            Generando informe...
        </p>
    </div>
</div>
<script>
$(document).ready(function(){
	$('#id_alcampo').selectmenu({
		change: function( event, data ) {
			idAlcampo = data.item.value;
			
			$('#id_encuesta').empty();
			$.get('index.php?r=tblIdEncuesta/getAll&id='+idAlcampo, function(data2){
				
				for(var i2 = 0; i2 < data2.length; i2++){
					var opt = $('<option/>', {
						value: data2[i2].id_encuesta,
						text: data2[i2].fecha_encuesta
					});
					
					//$('#zipCode').append(opt);
					opt.appendTo("#id_encuesta");
				}
					idEncuesta = $("#id_encuesta").val();
					$("#id_encuesta option:first").attr('selected','selected');
				 	$("#id_encuesta").selectmenu("refresh");		
					$("#id_encuesta").trigger("change");
			})
			
			
      }
	});
	$('#id_encuesta').selectmenu();
	
	//RELLENAR COMBO DE HIPER ALCAMPO
	$.get('index.php?r=tblHiperAlcampo/getHiperAlcampo', function(data){
		$('#id_alcampo').append($('<option>', {
				value: 0,
				text: ''
			}));
		for(var i = 0; i < data.length; i++){
			$('#id_alcampo').append($('<option>', {
				value: data[i].id,
				text: data[i].nombre
			}));
		}
		
		
	})
	
	$("#aceptar").click(function() {
         /*$("#loading").fadeIn();
            var opts = {
                lines: 12, // The number of lines to draw
                length: 7, // The length of each line
                width: 4, // The line thickness
                radius: 10, // The radius of the inner circle
                color: '#000', // #rgb or #rrggbb
                speed: 1, // Rounds per second
                trail: 60, // Afterglow percentage
                shadow: false, // Whether to render a shadow
                hwaccel: false // Whether to use hardware acceleration
            };
            var target = document.getElementById('loading');
            var spinner = new Spinner(opts).spin(target);*/
    });
	$("#zExtent").change(function(v){
		if(v.target.checked){
			$("#opciones").empty();
			$("#opciones").append('<input class="form-control" type="hidden" name="z_prin" value="-1"></input>');
			$("#opciones").append('<input class="form-control" type="hidden" name="zp" value="-1"></input>');
			$("#opciones").append('<input class="form-control" type="hidden" name="zs" value="-1"></input>');
			$("#opciones").append('<input class="form-control" type="hidden" name="zr" value="-1"></input>');
		}
		//alert("custom");
		
	})
	$("#zCustom").change(function(v){
		if(v.target.checked){
			$("#opciones").empty();
			$("#opciones").append('<label>Zoom mapa guía</label><input class="form-control" type="number" name="z_prin" value="12000"></input>');
			$("#opciones").append('<label>Zoom zona principal</label><input class="form-control" type="number" name="zp" value="2000"></input>');
			$("#opciones").append('<label>Zoom zona secundaria</label><input class="form-control" type="number" name="zs" value="6000"></input>');
			$("#opciones").append('<label>Zoom zona resto</label><input class="form-control" type="number" name="zr" value="12000"></input>');
		}
	})
	
})

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-64660106-1', 'auto');
  ga('send', 'pageview');
 
</script>

</html>