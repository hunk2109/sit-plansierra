<script type="text/javascript">
//Actualiza una tabla

var cuencaele='ss_cuenca';
alert ( 'ahora ' +cuencaele);

$.get('index.php?r=Actualizar/GetActualizaUnaTabla&Tablaactualizar=' +cuencaele, function (data){
})

alert ( 'ahora 2  ' +cuencaele);

</script>