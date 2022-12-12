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
	/*
$('#typedigitalizacion').selectmenu({
		change: function( event, data ) {	
	

	 map.removeInteraction(draw);
        addInteraction();
	
		}
});
*/