
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link type="text/css" rel="stylesheet" href="css/layout-default.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" />
	
	
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>		
	
	<title>SIGMA</title>
	
	<style>
		#tbl-zc-form {
			width: 100%;
			margin: 0 auto;
		}
		
		#logo {
			margin: 0 auto;
		}
	</style>
</head>

<body>
<div id="header">
	<div id="logo"><a href='index.php'><img src="images/sigma_icon.png" width='10%'></img></a>
</div>
</div><!-- header -->
<br/>
<div class="well">
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ZIP CODE</th>
            <th>FECHA INICIO</th>
            <th>FECHA FIN</th>
            <th>ALCAMPO</th>
            <th>CIFRA DE VENTA</th>
            <th>TIPO ZIP CODE</th>
        </tr>
    </thead>
    <tbody>
      
    </tbody>
</table>
</div>
<div id="dialog-form" title="Actualizar ZIP CODE">
 
  <form id="tbl-zc-form" action="/sigma/index.php?r=tblZc/update&amp;id=" method="post">
    
  </form>
</div>

<script>
$(document).ready(function(){
	var table;
	 $.get('index.php?r=tblZc/getAll', function(data){
		table = $('#myTable').DataTable( {
			data: data,
			iDisplayLength: 50,
			columns: [
				{ data: 'cod_zipcode' },
				{ data: 'fecha_ini' },
				{ data: 'fecha_fin' },
				{ data: 'id_alcampo' },
				{ data: 'cv' },
				{ data: 'tipo_zc' },
			]
		} );
	});
	
	$('#myTable tbody').on( 'click', 'tr', function () {
		var d = table.row( this ).data();
			dialog = $( "#dialog-form" ).dialog({
			  autoOpen: false,
			  height: 450,
			  width: 400,
			  modal: true,
			  buttons: {
				Cancel: function() {
				  dialog.dialog( "close" );
				}
			  }
			});
			$('#tbl-zc-form').empty();
			$('#tbl-zc-form').get(0).setAttribute('action', '/sigma/index.php?r=tblZc/update&id='+d.cod_zipcode);
			$('#tbl-zc-form').append('<label>ZIP CODE</label>');
			$('#tbl-zc-form').append('<input name="TblZc[cod_zipcode]" id="TblZc_cod_zipcode" class="form-control" type="text" value="'+d.cod_zipcode+'" readonly />');
			$('#tbl-zc-form').append('<label>Fecha de inicio</label>');
			$('#tbl-zc-form').append('<input name="TblZc[fecha_ini]" id="TblZc_fecha_ini" class="form-control" type="date" value="'+d.fecha_ini+'" readonly />');
			$('#tbl-zc-form').append('<label>Fecha de fin</label>');
			$('#tbl-zc-form').append('<input name="TblZc[fecha_fin]" id="TblZc_fecha_fin" class="form-control" type="date" value="'+d.fecha_fin+'" readonly />');
			$('#tbl-zc-form').append('<label>Cifra de venta</label>');
			if(d.cv!=null)
				$('#tbl-zc-form').append('<input name="TblZc[cv]" id="TblZc_cv" class="form-control" type="numeric" value="'+d.cv+'" />');
			else
				$('#tbl-zc-form').append('<input name="TblZc[cv]" id="TblZc_cv" class="form-control" type="numeric" />');
			$('#tbl-zc-form').append('<label>Tipo Zip Code</label>');
			if(d.tipo_zc!=null)
				$('#tbl-zc-form').append('<input name="TblZc[tipo_zc]" id="TblZc_tipo_zc" class="form-control" type="numeric" value="'+d.tipo_zc+'" />');
			else
				$('#tbl-zc-form').append('<input name="TblZc[tipo_zc]" id="TblZc_tipo_zc" class="form-control" type="numeric" />');
			$('#tbl-zc-form').append('<input type="submit" name="yt0" value="Save" />');
			dialog.dialog('open');
		
	} );
	
})

</script>
</body>
</html>
