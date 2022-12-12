<?php 
//require('/var/www/fpdf17/fpdf.php');
//require ('C:\\MS4W/ms4w/Apache/htdocs/PlanSierra_dev/fpdf17/fpdf.php');
require('C:\MS4W\ms4w\Apache\htdocs\PlanSierra_dev\protected\views\site\webs\wordwrap.php');
include("C:\MS4W\ms4w\apps\phpmapscriptng-swig\include\mapscript.php");
//dl("C:\MS4W\ms4w\Apache\php\ext\php_mapscript.dll");

/*class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		if($this->PageNo() != 1){
			// Logo
			$this->Image('images/cliente_logo.png',10,8,33);
			// Arial bold 15
			$this->SetFont('Arial','B',15);
			// Movernos a la derecha
			$this->Cell(80);
			// Título
			//$this->Cell(30,10,'Title',1,0,'C');
			// Salto de línea
			$this->Ln(20);
		}
	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,5,utf8_decode('Pág. ').$this->PageNo().'/{nb}',0,0,'C');
		$this->Ln();
		$this->Cell(0,5,'Informe generado el ' . date("d-m-Y"),0,0,'C');
		$this->SetDrawColor(153,0,0);
		$this->Line(8,280, 200, 280);
	}
}*/
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//------------------------ PORTADA -----------------------
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(0,0,0);
//$pdf->Image('images/cliente_logo.png',65,40,80);
$pdf->Text(70, 80, utf8_decode('INFORME PLANTACIÓN '));
$pdf->Text (95,90, $_GET['parcela'] );
$pdf->SetFont('Arial','',10);
$username = "PP";//Yii::app()->user->id;

$pdf->Text (10,275,'Informe obtenido por: ' .$username );
//$pdf->Image('images/reforestacion.png',90,130,20);
$pdf->Ln(150);
//$pdf->Cell(197, 0, $_GET['parcela'] . "" . utf8_decode($hiper->nombre), 0, 0, 'C');
//$pdf->Text(60, 150, $_GET['hiper'] . "-" . $hiper->nombre);


$pdf->SetTextColor(0,0,0);


//PRIMERA PRUEBA
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
$pdf->Cell(0,0,utf8_decode('Plantación nº.-').$_GET['parcela']);
$pdf->SetFont('Arial','',10);

$pdf->Line(10,$pdf->getY()+2, 200, $pdf->getY()+2);

$pdf->Ln(60);

$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");

		
	$SQL= "SELECT 

			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_plantacion,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_control,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_cliente,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".apellido,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".cedula,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_cuenca,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_microcuenca,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".cs_destino,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".fecha::date,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".plantas,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".tareas,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".inversion_plantas,
			fac_labores_codigo_factura.coste_labores,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura
			
		FROM 
			public.\"15_Plantacion_completa_sin_geo_facturas_plus\" left join 
			public.fac_labores_codigo_factura
		on
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura = fac_labores_codigo_factura.codigo_factura
	WHERE 
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_plantacion::int=".$_GET['parcela']."
ORDER BY \"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_plantacion::int,\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura::int;";
		

$result  = pg_query($conn, $SQL);

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(20,45,  utf8_decode('Datos de plantación'));
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$linea=55;
$pas=5;
$row = pg_fetch_array($result);
//while ($row = pg_fetch_array($result)){
	$n=0;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Código de plantación'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[0]));
	$n=$n+1;
	//$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Código de control'));
	//$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[1]));
	//$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Código de cliente'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[2]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Nombre cliente'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[3]).', '.utf8_decode($row[4]));
	$n=$n+1;
	//$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Nombre'));
	//$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[4]));
	//$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Cédula'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[5]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Subcuenca, Microcuenca'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[6]).', '.utf8_decode($row[7]));
	$n=$n+1;
	//$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Microcuenca'));
	//$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[7]));
	//$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Destino'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[8]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Fecha'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[9]));
	$m=$m+1;
//}	


//------------------------ PAGINA 2 -----------------------
$pdf->AddPage();
$conn = pg_connect("host='localhost' port='5432' user='postgres' password='postgres' dbname='jbsoft'");

		
	$SQL= "SELECT 
		de_codigo_plantacion, 
		pr_codigo_predio,
		nombre_proyecto,
		tp_descripcio_tipo_actividad,
		pl_fecha_plantacion::DATE,
		pl_fecha_inspeccion::date,
		pr_descripcion,
		pr_tipo_tenencia_parcela,
		especie_platar,
		pr_sector,
		nombre_seccion,
		nombre_municipio,
		nombre_provincia
		FROM \"15_Plantacion_completa\" 
		WHERE de_codigo_plantacion::int= ".$_GET['parcela']."
		ORDER BY pl_fecha_inspeccion::date DESC;";


$result  = pg_query($conn, $SQL);

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(20,30,  utf8_decode('Datos de plantación'));
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$linea=40;
$pas=5;
$row = pg_fetch_array($result);
//while ($row = pg_fetch_array($result)){
	$n=0;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Código de plantación'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[0]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Código de predio'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[1]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Proyecto'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[2]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Tipo de plantación'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[3]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Fecha de plantación'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[4]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Fecha de inspección'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[5]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Descripción'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[6]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Tenencia'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[7]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Especie plantar'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[8]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Sector'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[9]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Seccion'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[10]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Municipio'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[11]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Provincia'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[12]));
	
	$m=$m+1;
//}



$SQL= "SELECT 
			 codigo_plantacion, 
			 predio, 
			 cliente, 
			 fecha_plantacion::DATE,
			 cantidad_tarea,
			 marco_de_plantacion, 
			 destiono, 
			 tipo_plantacion, 
			 proyecto,
			 actividad, 
			 dessc_plantacion , 
			 condicion, 
			 observacion, 
			 fecha_inspeccion::DATE, 
			 estatus, 
			 importe_total, 
			 balance_total, 
			 balance_inversión, 
			 sec_evaluacion, 
			 plantas_muertas, 
			 plantas_vivas, 
			 fecha_ultima_evaluacion,
			 fecha_proxima_evaluacion::DATE
			 
			FROM \"Plantacion_segunda\"  WHERE codigo_plantacion::int= ".$_GET['parcela'].";";
			
			
	$result  = pg_query($conn, $SQL);

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(20,$linea+$m+ 15*$pas,  utf8_decode('Otros datos'));
$pdf->SetFont('Arial','',8);
$linea=$linea+$m+ 17*$pas;
$pas=5;
while ($row = pg_fetch_array($result)){
	$n=0;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Cantidad de tareas'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[4]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Marco de plantación'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[5]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Destino'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[6]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Condición'));
	$imprime=WordWrap(utf8_decode($row[11]),75);
	$pdf->SetY($linea+$m+ $n*$pas -3);
	$pdf->SetX(59);
	//$pdf->Cell(0,5,Write(5,$row[11]));
	$pdf->SetMargins (59,10,10);
	$pdf->Write(4,$imprime);
	//$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[11]),30);
		
	$n=$n+3;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Observacion'));
	$imprime=WordWrap(utf8_decode($row[12]),75);
	$pdf->SetY($linea+$m+ $n*$pas -3);
	$pdf->SetX(59);
	//$pdf->Cell(0,5,Write(5,$row[11]));
	$pdf->SetMargins (59,10,10);
	$pdf->Write(4,$imprime);
	//$pdf->WordWrap(utf8_decode($row[12]),60);
	//$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[12]));
	$n=$n+3;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Fecha de inspección'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[13]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Descripción'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[10]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Tenencia'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[7]));
	$pdf->SetMargins (10,10,10);
	$m=$m+1;
}

//otra pag

$pdf->AddPage();
$m=0;
$SQL= "SELECT 
		de_codigo_plantacion, 
		sp_codigo_control,
		tp_descripcion_tipo_plantacion,
		cd_fecha_inspeccion::date,
		cs_condicion_de_la_plantacion

		FROM \"15_Plantacion_completa\" 
		WHERE de_codigo_plantacion::int= ".$_GET['parcela'].";";


$result  = pg_query($conn, $SQL);

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(20,30,  utf8_decode('Códigos de control de la plantación'));
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$linea=40;
$pas=5;
//$row = pg_fetch_array($result);
while ($row = pg_fetch_array($result)){
	$n=0;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Código de plantación'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[0]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Código de control'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[1]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Tipo de plantacion'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[2]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Fecha inspeccion'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[3]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Condición de la plantación'));
	$imprime=WordWrap(utf8_decode($row[4]),70);
	$pdf->SetY($linea+$m+ $n*$pas -3);
	$pdf->SetX(59);
	//$pdf->Cell(0,5,Write(5,$row[11]));
	$pdf->SetMargins (59,10,10);
	$pdf->Write(4,$imprime);
	//$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[4]));
	$pdf->SetMargins (10,10,10);
	$m=$m+40;
}
//otra pagina
$pdf->AddPage();

$pdf->SetFont('Arial','B',14);

$pdf->SetFont('Arial','B',12);

$m=0;
$SQL="SELECT 
		codigo_plantacion AS codigo,
		sum(cantidad::int) AS cantidad_total,
		nombre_articulo
		
		FROM \"Plantacion_Especie_Clasificacion\" 
		WHERE codigo_plantacion::int= ".$_GET['parcela']."
		GROUP BY  nombre_articulo,codigo_plantacion 
		ORDER BY sum(cantidad::int) DESC;";			   		
$result  = pg_query($conn, $SQL);

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(20,30,  utf8_decode('Número de plantas utilizadas por especie'));
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$linea=40;
$pas=5;
//$row = pg_fetch_array($result);
$n=0;
$pdf->SetFont('Arial','B',10);
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Nombre'));
	$pdf->Text(90,$linea+$m+ $n*$pas,  utf8_decode('Número de plantas'));
	$m=$m+8;
	$pdf->SetFont('Arial','',8);
while ($row = pg_fetch_array($result)){
	
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode($row[2]));
	$pdf->Text(90,$linea+$m+ $n*$pas,  utf8_decode($row[1]));
	

	$pdf->SetMargins (10,10,10);
	$m=$m+5;
}



//OTRA PAGINA

$pdf->AddPage();



$pdf->SetFont('Arial','B',8);


$SQL="SELECT 
codigo_plantacion,
codigo_predio,
descripcion,
apellido,
nombre,
subcuenca,
microcuenca,
paraje,
municipio,
provincia,
seccion,
comentario,
tipo_tenencia_parcela,
tipo_suelo,
altura_sobre_nivel_mar,
promedio_pendiente_finca,
nombre_fuente_agua,
propuesta_reordenamiento_ecologico_finca,
tarea_intervenir,
colindantes_norte,
colindantes_sur,
colindantes_este,
colindantes_oeste,
especie_platar,
pendiente_area_intervenir,
codigo_tipo_actividad,
latitud,
longitud,
relieve,
exposicion,
distancia_fuente_agua,
codigo_cliente

			 
			FROM \"Plantacion_Predio\" 
			WHERE codigo_plantacion::int= ".$_GET['parcela'].";";
$result  = pg_query($conn, $SQL);			
$row = pg_fetch_array($result);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(20,30,  utf8_decode('Predio'));
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);

$m=0;
$linea=40;
$pas=5;
//while ($row = pg_fetch_array($result)){
	$n=0;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Código de predio'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[1]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Comentario'));
	$imprime=WordWrap(utf8_decode($row[11]),75);
	$pdf->SetY($linea+$m+ $n*$pas -3);
	$pdf->SetX(59);
	//$pdf->Cell(0,5,Write(5,$row[11]));
	$pdf->SetMargins (59,10,10);
	$pdf->Write(4,$imprime);
	//$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[11]));
	$n=$n+3;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Tipo de suelo'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[13]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Altura sobre nivel mar'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[14]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Propuesta'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[17]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Tareas a intervenir'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[18]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Pendiente area a intervenir'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[24]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Relieve'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[28]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Exposición'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[29]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Fuente de agua '));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[16]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Distancia a agua '));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[30]));
	
	$pdf->SetMargins (10,10,10);
	$m=$m+80;
	
	
	
	
	
	$SQL="SELECT 
codigo_plantacion,
codigo_predio,
nombre,
apellido,
cedula,
apodo,
direccion,
seccion,
sector,
telefono_1,
correo_electronico,
fecha_creacion,
limite_de_credito,
balance_pendiente,
cuenta_de_ingreso,
fecha_ultima_venta

			 
			FROM \"Plantacion_Cliente\"  WHERE codigo_plantacion::int= ".$_GET['parcela'].";";
$result  = pg_query($conn, $SQL);			
$row = pg_fetch_array($result);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(20,$linea+$m,  utf8_decode('Cliente'));
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);

//while ($row = pg_fetch_array($result)){
	$n=2;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Nombre'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[2]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Apellido'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[3]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Cedula'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[4]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Direccion'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[6]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Teléfono'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[9]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Sector'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[8]));
	$n=$n+1;
	
	
	$pdf->SetMargins (10,10,10);
	$m=$m+30;


//}

//OTRA PAGINA

$pdf->AddPage();



$pdf->SetFont('Arial','B',8);
$m=0;
$linea=40;
$pas=5;

$SQL="SELECT 

			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_plantacion,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_control,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_cliente,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".apellido,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".cedula,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_cuenca,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_microcuenca,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".cs_destino,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".fecha::date,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".plantas,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".tareas,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".inversion_plantas,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura,
		    fac_labores_codigo_factura.coste_labores
		FROM 
			public.\"15_Plantacion_completa_sin_geo_facturas_plus\" left join 
			public.fac_labores_codigo_factura
		on
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura = fac_labores_codigo_factura.codigo_factura
	WHERE 
			 \"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_plantacion::int=".$_GET['parcela']."
ORDER BY \"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_plantacion::int,\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura::int;";
	
	
	$result  = pg_query($conn, $SQL);			
//$row = pg_fetch_array($result);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(20,$linea+$m,  utf8_decode('Facturas por plantacion'));
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);	

while ($row = pg_fetch_array($result)){
	$n=2;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Factura'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[13]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Codigo de control'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[1]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Codigo de cliente'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[2]));
	$codigocliente=$row[2];
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Apellido'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[3]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Nombre'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[4]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Cedula'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[5]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Fecha'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[9]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Plantas'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[10]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Tareas'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[11]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Inversión Plantas'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[12]));
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Inversión Labores'));
	$pdf->Text(60,$linea+$m+ $n*$pas,  utf8_decode($row[14]));
	$n=$n+1;
	
	
	$pdf->SetMargins (10,10,10);
	$m=$m+60;


}
//OTRA PAGINA

$pdf->AddPage();



$pdf->SetFont('Arial','B',8);
$m=0;
$linea=40;
$pas=5;

$SQL="SELECT 

			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_plantacion,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_control,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_cliente,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".apellido,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".cedula,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_cuenca,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".nombre_microcuenca,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".cs_destino,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".fecha::date,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".plantas,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".tareas,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".inversion_plantas,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura,
		    fac_labores_codigo_factura.coste_labores,
			\"15_Plantacion_completa_sin_geo_facturas_plus\".pr_codigo_predio
		FROM 
			public.\"15_Plantacion_completa_sin_geo_facturas_plus\" left join 
			public.fac_labores_codigo_factura
		on
			\"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_factura = fac_labores_codigo_factura.codigo_factura
	WHERE 
			 \"15_Plantacion_completa_sin_geo_facturas_plus\".codigo_cliente='".$codigocliente."'
ORDER BY \"15_Plantacion_completa_sin_geo_facturas_plus\".fecha::date desc";
	
	
	$result  = pg_query($conn, $SQL);			
//$row = pg_fetch_array($result);
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Text(20,$linea+$m,  utf8_decode('Facturas por Cliente (').$codigocliente. ')');
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(0,0,0);	

$n=2;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode('Factura'));
	$pdf->Text(45,$linea+$m+ $n*$pas,  utf8_decode('Plantación'));
	$pdf->Text(65,$linea+$m+ $n*$pas,  utf8_decode('Control'));
	$pdf->Text(85,$linea+$m+ $n*$pas,  utf8_decode('Fecha'));
	$pdf->Text(105,$linea+$m+ $n*$pas,  utf8_decode('Plantas'));
	$pdf->Text(125,$linea+$m+ $n*$pas,  utf8_decode('Tareas'));
	$pdf->Text(145,$linea+$m+ $n*$pas,  utf8_decode('I. Plantas'));
	$pdf->Text(165,$linea+$m+ $n*$pas,  utf8_decode('I. labores'));
	$pdf->Text(185,$linea+$m+ $n*$pas,  utf8_decode('Predio'));
$pdf->SetFont('Arial','',8);
while ($row = pg_fetch_array($result)){
	
	$n=$n+1;
	$pdf->Text(25,$linea+$m+ $n*$pas,  utf8_decode($row[13]));
	$pdf->Text(45,$linea+$m+ $n*$pas,  utf8_decode($row[0]));
	$pdf->Text(65,$linea+$m+ $n*$pas,  utf8_decode($row[1]));
	$pdf->Text(85,$linea+$m+ $n*$pas,  utf8_decode($row[9]));
	$pdf->Text(105,$linea+$m+ $n*$pas,  utf8_decode($row[10]));
	$pdf->Text(125,$linea+$m+ $n*$pas,  utf8_decode($row[11]));
	$pdf->Text(145,$linea+$m+ $n*$pas,  utf8_decode($row[12]));
	$pdf->Text(165,$linea+$m+ $n*$pas,  utf8_decode($row[14]));
	$pdf->Text(185,$linea+$m+ $n*$pas,  utf8_decode($row[15]));
	$pdf->SetMargins (10,10,10);
	


}

//otra pag
$pdf->AddPage();

$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,5,utf8_decode('Plantación nº.-').$_GET['parcela']);
$pdf->SetFont('Arial','B',12);

$pdf->Line(8,$pdf->getY()+6, 200, $pdf->getY()+6);

$pdf->Ln(10);


$pdf->SetFont('Arial','I',10);
//$pdf->Cell(0,5, $_GET['hiper'] . "-" . $hiper->nombre);


$map2 = new mapObj("c:\\datos/sierra/catastro_print.map");
$map2->selectOutputFormat('png');
$map2->setSize(2100, 1008);
$lyr = $map2->getLayerByName("PARCELAS");

$map2->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);

$t1 =$lyr->getExtent()->minx;
$pdf->Text(25,40,$t1);
$t2 =$lyr->getExtent()->miny;
$pdf->Text(25,45,$t2);
$t3 =$lyr->getExtent()->maxx;
$pdf->Text(25,50,$t3);
$t4 =$lyr->getExtent()->maxy;
$pdf->Text(25,55,$t4);


$ref = $map2->draw();
$ran = rand ();
$t1 = 'C:\\datos/tmp/t1_'.$ran.'.png';
//header('Content-Type: image/png');
$ref->saveImage($t1);
//$ref->saveWebImage();

//header('');




$pdf->Ln(10);
$pdf->SetX(30);
//$pdf->Image($t1,$pdf->GetX(),$pdf->GetY(),156,75);



$pdf->Output();
?>	
	
