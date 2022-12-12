
<p></p>

<p>Esta aplicacion permite el acceso a la a la principal información del Plan Sierra</p>
<p>La información se representa en forma de graficos y mapas</p>


<p>Para mas información de esta aplicación, lea por favor
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
En caso de duda <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script src="http://openlayers.org/en/v5.0.0/build/ol.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://openlayers.org/en/v5.0.0/css/ol.css" type="text/css">

<! --esto es un comentario -->



<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div id="container1">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<div id="container2">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<div id="map" style="width:1000px">
		</div>
	</div>
</div>


<?php
//CONEXIÓN A LA BASE DE DATOS POSTGRES RECORDAR MODICIAR LO DE OSGEO4W/BIN/PHP.INI
$mbd = new PDO('pgsql:host=192.168.1.201;port=5432;dbname=jbsoft', 'web', 'web');

$rs = array();
foreach($mbd->query('SELECT especie, sum(cantidad_plantas) as cantidad FROM "11_especie" GROUP BY especie ORDER BY cantidad desc') as $fila) {
								
$b = null;
	$b['name'] = $fila['especie'];
	$b['y'] = (float)$fila['cantidad'];
	array_push($rs, $b);
			
}	

?>



<script>
//AQUI SE DIBUJA EL GRAFICO. ESTO ES JAVASCRIPT
Highcharts.chart('container1', {

  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: 'black',
    plotShadow: true,
	width: 1000,
	height: 600,
    type: 'pie'
  },
  title: {
    text: 'Plantas por especie'
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
	  name: 'Numero de plantass',
    data: <?php echo json_encode($rs);?>
  }]
});


</script>

<?php

$mbd = new PDO('pgsql:host=192.168.1.201;port=5432;dbname=jbsoft', 'web', 'web');

$rs = array();
foreach($mbd->query('SELECT codigo_articulo, sum(tarea_plantada) as tarea FROM ss_detalle_especie GROUP BY codigo_articulo ORDER BY tarea desc') as $fila) {
								
$b = null;
$b['name'] = $fila['codigo_articulo'];
$b['y'] = (double)$fila['tarea'];
array_push($rs, $b);
			
}	

?>



<script>

Highcharts.chart('container2', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: true,
	width: 1000,
	height: 600,
    type: 'pie'
  },
  title: {
    text: 'Cantidad de arboles por especie'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
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
	  name: 'Cantidad arboles',
    data: <?php echo json_encode($rs);?>
  }]
});


</script>

 <script>

	
	var controls = ol.control.defaults().extend( [
			new ol.control.Attribution(),
			new ol.control.ZoomSlider(),
			new ol.control.ScaleLine(),
			new ol.control.MousePosition(),
			new ol.control.FullScreen(),
			new ol.control.OverviewMap(),
		]);
		
	
       var osm = new ol.layer.Tile({
                  source: new ol.source.OSM()
            });   
	  
	var wmslayer = 	new ol.layer.Image({
				source: new ol.source.ImageWMS({
					url: 'http://localhost/cgi-bin/mapserv.exe?map=/ms4w/Apache/htdocs/sierra/prueba.map&layer=sierra&mode=map',
				})
			});
                                   

       var map = new ol.Map({
		    controls: controls,
            layers: [osm, wmslayer],
            target: 'map',
            renderer: 'canvas',
            view: new ol.View({
                center: ol.proj.transform([-71, 19.5], 'EPSG:4326', 'EPSG:4326'),
				zoom: 9
                })
        });
        
		
		
		
		
    </script>