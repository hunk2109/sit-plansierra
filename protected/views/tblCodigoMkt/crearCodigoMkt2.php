
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
		#tbl-codigomkt-form {
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
            <th>CÓDIGO</th>
            <th>TIPO</th>
            <th>NIELSSEN</th>
            <th>ETIQUETA</th>
            <th>OBSERV</th>
        </tr>
    </thead>
    <tbody>
      
    </tbody>
</table>
</div>
<div id="dialog-form" title="Actualizar CÓDIGO MKT"> 
	<form id="tbl-codigomkt-form" action="/sigma/index.php?r=tblCodigoMkt/update&amp;id=" method="post"></form>
</div>

<script>
$(document).ready(function(){
	var table;
	 $.get('index.php?r=tblCodigoMkt/getAll', function(data){
		table = $('#myTable').DataTable( {
			data: data,
			iDisplayLength: 50,
			columns: [
				{ data: 'codigo' },
				{ data: 'tipo' },
				{ data: 'nielssen' },
				{ data: 'etiqueta' },
				{ data: 'observ' },
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
			$('#tbl-codigomkt-form').empty();
			$('#tbl-codigomkt-form').get(0).setAttribute('action', '/sigma/index.php?r=tblCodigoMkt/update&id='+d.codigo);
			$('#tbl-codigomkt-form').append('<label>CODIGO</label>');
			$('#tbl-codigomkt-form').append('<input name="TblCodigoMkt[codigo]" id="TblCodigoMkt_codigo" class="form-control" type="text" value="'+d.codigo+'" />');
			
			$('#tbl-codigomkt-form').append('<label>TIPO</label>');
			$('#tbl-codigomkt-form').append('<input name="TblCodigoMkt[tipo]" id="TblCodigoMkt_tipo" class="form-control" type="text" value="'+d.tipo+'"  />');
			
			$('#tbl-codigomkt-form').append('<label>NIELSSEN</label>');
			if(d.tipo=="1"){
				$('#tbl-codigomkt-form').append('<input name="TblCodigoMkt[nielssen]" id="TblCodigoMkt_nielssen" class="form-control" type="text" value="'+d.nielssen+'"  />');
			}else{
				$('#tbl-codigomkt-form').append('<input name="TblCodigoMkt[nielssen]" id="TblCodigoMkt_nielssen" class="form-control" type="text"  readonly/>');
			}
			
			$('#tbl-codigomkt-form').append('<label>ETIQUETA</label>');
			if(d.cv!=null){
				$('#tbl-codigomkt-form').append('<input name="TblCodigoMkt[etiqueta]" id="TblCodigoMkt_etiqueta" class="form-control" type="text" value="'+d.etiqueta+'"  />');
			}else{
				$('#tbl-codigomkt-form').append('<input name="TblCodigoMkt[etiqueta]" id="TblCodigoMkt_etiqueta" class="form-control" type="text" />');
			}	
			
			$('#tbl-codigomkt-form').append('<label>OBSERV</label>');
			$('#tbl-codigomkt-form').append('<input name="TblCodigoMkt[observ]" id="TblCodigoMkt_observ" class="form-control" type="text" value="'+d.observ+'"  />');			
			
			$('#tbl-codigomkt-form').append('<input type="submit" name="yt0" value="Save" />');
			dialog.dialog('open');
		
	} );
	
})

</script>
</body>
</html>
