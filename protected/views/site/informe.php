<?php
require('/var/www/fpdf17/fpdf.php');

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		if($this->PageNo() != 1){
			// Logo
			$this->Image('images/sigma_icon.png',10,8,33);
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
		$this->Cell(0,5,'Pág. '.$this->PageNo().'/{nb}',0,0,'C');
		$this->Ln();
		$this->Cell(0,5,'Informe generado automáticamente ' . date("d-m-Y"),0,0,'C');
		$this->SetDrawColor(153,0,0);
		$this->Line(8,280, 200, 280);
	}
}

$comprZipCode = explode(",", $_GET['cod_zipcode']);
		
foreach($comprZipCode as $c){
	$c = str_replace ("'", "", $c);
	if(!is_numeric($c))
	exit("Error");
}

$comprZipCode2 = explode(",", $_GET['zipcode']);
		
foreach($comprZipCode2 as $c){
	$c = str_replace ("'", "", $c);
	if(!is_numeric($c))
	exit("Error");
}

$comprHiper = explode(",", $_GET['hiper']);
		
foreach($comprHiper as $c){
	$c = str_replace ("'", "", $c);
	if(!is_numeric($c))
	exit("Error");
}
if(!empty($_GET['id_encuesta'])){
	$comprEncuesta = explode(",", $_GET['id_encuesta']);
			
	foreach($comprEncuesta as $c){
		$c = str_replace ("'", "", $c);
		if(!is_numeric($c))
		exit("Error");	
	}
}
 $model = new TblZc();
 $Criteria = new CDbCriteria();
 $Criteria->select = "date_part('year', fecha_ini) as fecha_ini";
 $Criteria->condition = "cod_zipcode = ".$_GET['zipcode'];
 $f = $model->find($Criteria);
 $fecha_ini = $f->fecha_ini;
 
  $model = new TblZc();
 $Criteria = new CDbCriteria();
 $Criteria->select = "date_part('year', fecha_ini) as fecha_ini";
 $Criteria->condition = "cod_zipcode = ".$_GET['cod_zipcode'];
 $f = $model->find($Criteria);
 $fecha_iniZC = $f->fecha_ini;
 
 
$model = new TblHiperAlcampo();
$Criteria = new CDbCriteria();
$Criteria->condition = "id_hiper_alcampo = ".$_GET['hiper'];
$hiper = $model->find($Criteria);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//------------------------ PORTADA -----------------------
$pdf->SetFont('Arial','B',32);
$pdf->SetTextColor(150,150,150);
$pdf->Text(80, 80, 'INFORME');
$pdf->Image('images/sigma_icon.png',35,100,130);
$pdf->Image('images/isolines.png',35,180,130);
$pdf->Ln(150);
$pdf->Cell(197, 0, $_GET['hiper'] . "-" . utf8_decode($hiper->nombre), 0, 0, 'C');
//$pdf->Text(60, 150, $_GET['hiper'] . "-" . $hiper->nombre);


$pdf->SetTextColor(0,0,0);
//----------------------- ISOCRONAS -----------------------


$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'ISOCRONAS');
$pdf->SetFont('Arial','B',12);
$pdf->Text(150, 278,  'Año: '.$fecha_ini);
$pdf->Line(8,$pdf->getY()+6, 200, $pdf->getY()+6);

$pdf->Ln(10);


$pdf->SetFont('Arial','I',10);
//$pdf->Cell(0,5, $_GET['hiper'] . "-" . $hiper->nombre);
$pdf->Text(130,$pdf->getY()-6, $_GET['hiper'] . "-" . utf8_decode($hiper->nombre));



$map = ms_newMapObj("c:\\datos/sigma/maps/sigma.map");
$map->selectOutputFormat('png');
$map->setSize(1050, 504);

//CAPAS ISOCRONAS
$lyr = $map->getLayerByName("ISO1");
$lyr->data = "geom FROM (SELECT 
		  gid ,
		  iso, 
		  geom
		FROM 
		  public.geo_isolines
		WHERE id_hiper = ".$_GET['hiper']." AND iso = 1)
	as subquery USING UNIQUE gid USING srid=25830";
$lyr->set('status',MS_ON);

$lyr = $map->getLayerByName("ISO2");
$lyr->data = "geom FROM (SELECT 
		  gid ,
		  iso, 
		  geom
		FROM 
		  public.geo_isolines
		WHERE id_hiper = ".$_GET['hiper']." AND iso = 2)
	as subquery USING UNIQUE gid USING srid=25830";
$lyr->set('status',MS_ON);

$lyr = $map->getLayerByName("ISO3");
$lyr->data = "geom FROM (SELECT 
		  gid ,
		  iso, 
		  geom
		FROM 
		  public.geo_isolines
		WHERE id_hiper = ".$_GET['hiper']." AND iso = 3)
	as subquery USING UNIQUE gid USING srid=25830";
$lyr->set('status',MS_ON);

$lyr = $map->getLayerByName("ISO4");
$lyr->data = "geom FROM (SELECT 
		  gid ,
		  iso, 
		  geom
		FROM 
		  public.geo_isolines
		WHERE id_hiper = ".$_GET['hiper']." AND iso = 4)
	as subquery USING UNIQUE gid USING srid=25830";
$lyr->set('status',MS_ON);

$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);


$lyr = $map->getLayerByName("ISO5");
$lyr->data = "geom FROM (SELECT 
		  gid ,
		  iso, 
		  geom
		FROM 
		  public.geo_isolines
		WHERE id_hiper = ".$_GET['hiper']." AND iso = 5)
	as subquery USING UNIQUE gid USING srid=25830";
$lyr->set('status',MS_ON);



//WMS IGN

$l = ms_newLayerObj($map);
$l->set("name", "WMS_IGN");
$l->set("status", MS_ON);
$l->set("startindex", 0);
$l->set("type", MS_LAYER_RASTER);
$l->setConnectionType(MS_WMS);
$l->set('connection', "http://www.ign.es/wms-inspire/ign-base?SERVICE=WMS");
$l->setMetaData("wms_srs", "epsg:25830");
$l->setMetaData("wms_name", "IGNBaseTodo");
$l->setMetaData("wms_format", "image/jpeg");
$l->setMetaData("wms_server_version", "1.1.1");

$map->removeLayer($map->numlayers-1);
$map->insertLayer($l, 0);

$ref = $map->draw();
$ran = rand ();
$t1 = '/var/tmp/t1_'.$ran.'.png';

$ref->saveImage($t1);

$pdf->Ln(10);
$pdf->SetX(30);
$pdf->Image($t1,$pdf->GetX(),$pdf->GetY(),156,75);

$pdf->Ln(85);
$pdf->SetFont('Arial','',8);

$pdf->SetDrawColor(0, 0, 255);
$pdf->Line(30,$pdf->getY()+3, 37, $pdf->getY()+3);
$pdf->Cell(28);
$pdf->Cell(0, 5, "Isocrona 0-2'");

$pdf->SetDrawColor(255,150,50);
$pdf->Line(60,$pdf->getY()+3, 67, $pdf->getY()+3);
$pdf->Text(69, $pdf->getY()+4, "Isocrona 2-5'");

$pdf->SetDrawColor(255,0, 255);
$pdf->Line(90,$pdf->getY()+3, 97, $pdf->getY()+3);
$pdf->Text(99, $pdf->getY()+4, "Isocrona 5-8'");

$pdf->SetDrawColor(0,255, 0);
$pdf->Line(120,$pdf->getY()+3, 127, $pdf->getY()+3);
$pdf->Text(129, $pdf->getY()+4, "Isocrona 8-12'");

$pdf->SetDrawColor(255,255,100);
$pdf->Line(150,$pdf->getY()+3, 157, $pdf->getY()+3);
$pdf->Text(159, $pdf->getY()+4, "Isocrona 12-20'");

$pdf->SetDrawColor(0,0,0);
$pdf->Rect(20, $pdf->getY(), 170, 8);
//GRAFICO 1

 include("/var/www/pChart2.1.3/class/pData.class.php"); 
 include("/var/www/pChart2.1.3/class/pDraw.class.php"); 
 include("/var/www/pChart2.1.3/class/pPie.class.php");
 include("/var/www/pChart2.1.3/class/pImage.class.php"); 

 define("FONT_PATH", "/var/www/pChart2.1.3/fonts"); 
  
  /* Create the pData object with some random values*/ 
$model = new TblIsoPob();
$Criteria = new CDbCriteria();
$Criteria->select = 'sum(p1) as p1, sum(p2) as p2, sum(p3) as p3, sum(p4) as p4, sum(p5) as p5';
$Criteria->condition = "id_encuesta_zc =".$_GET['zipcode'];// . $id;
$poblacion = $model->find($Criteria);
$pob = array((float)$poblacion->p1, (float)$poblacion->p2, (float)$poblacion->p3, (float)$poblacion->p4, (float)$poblacion->p5);
$maxPob = max($pob);

$modelCV = new TblIsoCv();
$Criteria = new CDbCriteria();
$Criteria->condition = "id_encuesta_zc = ".$_GET['zipcode'];// . $id;
$Criteria->order = "iso";
$cvs = $modelCV->findAll($Criteria);


$cifra = array();
$k = 0;
foreach($cvs as $cv){
	$k = $cv->cv;
	array_push($cifra, (float)$k);
}	
$mxCV = max($cifra);		

 $MyData = new pData();  
 $MyData->addPoints($pob,"Poblacion"); 
 $MyData->addPoints($cifra,"CV"); 
 $MyData->setSerieTicks("CV",4); 
 $MyData->addPoints(array("Isocrona 0-2'","Isocrona 2-5'","Isocrona 5-8'","Isocrona 8-12'","Isocrona 12-20'","Residual"),"Labels"); 
 $MyData->setAbscissa("Labels"); 
 $MyData->setSerieOnAxis("Poblacion",0);
 $MyData->setSerieOnAxis("CV",1);

 $MyData->setAxisName(0, "Población");
 $MyData->setAxisColor(0,array("R"=>51,"G"=>153,"B"=>255));
 $MyData->setAxisName(1, "% Cifra de venta");
 $MyData->setAxisColor(1,array("R"=>0,"G"=>102,"B"=>0));
 $MyData->setAxisPosition(1, AXIS_POSITION_RIGHT);

 $MyData->setPalette("Poblacion",array("R"=>51,"G"=>153,"B"=>255));
 $MyData->setPalette("CV",array("R"=>0,"G"=>102,"B"=>0));
 //$MyData->setSerieWeight("CV",2);
 
 /* Create the pChart object */ 
 $myPicture = new pImage(980,322,$MyData); 
 $myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>15)); 
 /* Turn on antialiasing */ 
 $myPicture->Antialias = FALSE; 

 /* Draw the scale */ 
 $myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>8)); 
 $myPicture->setGraphArea(65,60,938,266); 
 $AxisBoundaries = array(0=>array("Min"=>0,"Max"=>$maxPob),1=>array("Min"=>0,"Max"=>$mxCV));
 $myPicture->drawScale(array("Mode"=>SCALE_MODE_MANUAL, "ManualScale"=>$AxisBoundaries)); 

 /* Graph title */ 
 $myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>18)); 
 //$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
 $myPicture->drawText(100,52,"% de Cifra de Venta por Isocrona",array("FontSize"=>14,"Align"=>TEXT_ALIGN_BOTTOMLEFT)); 

 /* Draw the bar chart chart */ 
 $myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>8)); 
 $MyData->setSerieDrawable("CV",FALSE); 

 $myPicture->drawBarChart(); 

 /* Turn on antialiasing */ 
 $myPicture->Antialias = TRUE; 

 /* Draw the line and plot chart */ 
 $MyData->setSerieDrawable("CV",TRUE); 
 $MyData->setSerieDrawable("Poblacion",FALSE); 
 //$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
 $myPicture->drawSplineChart(); 

 $myPicture->setShadow(FALSE); 
 $myPicture->drawPlotChart(array("PlotSize"=>2,"PlotBorder"=>TRUE,"BorderSize"=>2,"BorderAlpha"=>5)); 

 /* Make sure all series are drawable before writing the scale */ 
 $MyData->drawAll(); 

 /* Write the legend */ 
/* $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
 $myPicture->drawLegend(580,35,array("Style"=>LEGEND_ROUND,"Alpha"=>20,"Mode"=>LEGEND_HORIZONTAL)); 
*/
 /* Render the picture (choose the best way) */ 
 $ran = rand ();
 $t1 = '/var/tmp/t1_'.$ran.'.jpg';
 $myPicture->render($t1); 

 $pdf->Ln(15);
 
 $pdf->SetX(20);
$pdf->Image($t1,$pdf->GetX(),$pdf->GetY(),170,55);

$pdf->Ln(60);
$pdf->SetDrawColor(0, 102, 0);
$pdf->Line(60,$pdf->getY(), 67, $pdf->getY());
$pdf->Text(70, $pdf->getY(), "% Cifra de Venta");
$pdf->SetDrawColor(51,153,255);
$pdf->Line(100,$pdf->getY(), 107, $pdf->getY());
$pdf->Text(110, $pdf->getY(), "Población (hab.)");

//TABLA DE POBLACIÓN POR ISOCRONAS

//HOGARES
$hogares1 = 0;
$hogares2 = 0;
$hogares3 = 0;
$hogares4 = 0;
$hogares5 = 0;

$sql="SELECT ST_Area(ST_Intersection(geo_isopolygon.geom, geo_prov.geom))/ST_Area(geo_isopolygon.geom) as porc, cod_prov, personas 
	FROM geo_isopolygon, geo_prov, tbl_hogares 
	WHERE id_hiper = ".$_GET['hiper']." AND 
	iso = 1 AND
	tbl_hogares.cpro = geo_prov.cod_prov AND
	ST_Intersects(geo_isopolygon.geom, geo_prov.geom)";
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>false
));

$datos = $dataProvider->getData();
foreach($datos as $d){
	$hogares1 += $d['porc']*$pob[0]/$d['personas'];
}

$sql="SELECT ST_Area(ST_Intersection(geo_isopolygon.geom, geo_prov.geom))/ST_Area(geo_isopolygon.geom) as porc, cod_prov, personas 
	FROM geo_isopolygon, geo_prov, tbl_hogares 
	WHERE id_hiper = ".$_GET['hiper']." AND 
	iso = 2 AND
	tbl_hogares.cpro = geo_prov.cod_prov AND
	ST_Intersects(geo_isopolygon.geom, geo_prov.geom)";
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>false
));

$datos = $dataProvider->getData();
foreach($datos as $d){
	$hogares2 += $d['porc']*$pob[1]/$d['personas'];
}

$sql="SELECT ST_Area(ST_Intersection(geo_isopolygon.geom, geo_prov.geom))/ST_Area(geo_isopolygon.geom) as porc, cod_prov, personas 
	FROM geo_isopolygon, geo_prov, tbl_hogares 
	WHERE id_hiper = ".$_GET['hiper']." AND 
	iso = 3 AND
	tbl_hogares.cpro = geo_prov.cod_prov AND
	ST_Intersects(geo_isopolygon.geom, geo_prov.geom)";
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>false
));

$datos = $dataProvider->getData();
foreach($datos as $d){
	$hogares3 += $d['porc']*$pob[2]/$d['personas'];
}

$sql="SELECT ST_Area(ST_Intersection(geo_isopolygon.geom, geo_prov.geom))/ST_Area(geo_isopolygon.geom) as porc, cod_prov, personas 
	FROM geo_isopolygon, geo_prov, tbl_hogares 
	WHERE id_hiper = ".$_GET['hiper']." AND 
	iso = 4 AND
	tbl_hogares.cpro = geo_prov.cod_prov AND
	ST_Intersects(geo_isopolygon.geom, geo_prov.geom)";
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>false
));

$datos = $dataProvider->getData();
foreach($datos as $d){
	$hogares4 += $d['porc']*$pob[3]/$d['personas'];
}

$sql="SELECT ST_Area(ST_Intersection(geo_isopolygon.geom, geo_prov.geom))/ST_Area(geo_isopolygon.geom) as porc, cod_prov, personas 
	FROM geo_isopolygon, geo_prov, tbl_hogares 
	WHERE id_hiper = ".$_GET['hiper']." AND 
	iso = 5 AND
	tbl_hogares.cpro = geo_prov.cod_prov AND
	ST_Intersects(geo_isopolygon.geom, geo_prov.geom)";
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>false
));

$datos = $dataProvider->getData();
foreach($datos as $d){
	$hogares5 += $d['porc']*$pob[4]/$d['personas'];
}

 $pdf->Ln(10);
$columns = array();
   
$col = array();
$col[] = array('text' => 'ISOCRONAS', 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'POBLACIÓN (hab)', 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => 'HOGARES', 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => 'CIFRA VENTA (%)', 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;

// header col
$col = array();
$col[] = array('text' => 'Isocrona 0-2\'', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($pob[0], 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($hogares1,0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($cifra[0],1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   $col = array();
$col[] = array('text' => 'Isocrona 2 - 5\'', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($pob[1], 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($hogares2,0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($cifra[1],1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   $col = array();
$col[] = array('text' => 'Isocrona 5 - 8\'', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($pob[2], 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($hogares3,0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($cifra[2],1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   $col = array();
$col[] = array('text' => 'Isocrona 8 - 12\'', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($pob[3], 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($hogares4,0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($cifra[3],1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   $col = array();
$col[] = array('text' => 'Isocrona 12 - 20\'', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($pob[4], 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($hogares5,0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($cifra[4], 1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   
$col = array();
$col[] = array('text' => 'Total', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($pob[0]+$pob[1]+$pob[2]+$pob[3]+$pob[4], 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($hogares1+$hogares2+$hogares3+$hogares4+$hogares5,0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($cifra[0]+$cifra[1]+$cifra[2]+$cifra[3]+$cifra[4], 1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   
 
// Draw Table   
$pdf->SetLeftMargin(45);
$pdf->WriteTable($columns);
$pdf->SetLeftMargin(20);

//------------------------------ SOCIODEMOGRAFÍA -----------------------------

$pdf->AddPage();

$sql="SELECT
  sum(geo_secciones.pob_0005*(tbl_iso_pob.p1+tbl_iso_pob.p2+tbl_iso_pob.p3+tbl_iso_pob.p4+tbl_iso_pob.p5)/(tbl_iso_pob.p_secc)) as a,
  sum(geo_secciones.pob_0514*(tbl_iso_pob.p1+tbl_iso_pob.p2+tbl_iso_pob.p3+tbl_iso_pob.p4+tbl_iso_pob.p5)/(tbl_iso_pob.p_secc)) as b,
  sum(geo_secciones.pob_1519*(tbl_iso_pob.p1+tbl_iso_pob.p2+tbl_iso_pob.p3+tbl_iso_pob.p4+tbl_iso_pob.p5)/(tbl_iso_pob.p_secc)) as c,
  sum(geo_secciones.pob_2029*(tbl_iso_pob.p1+tbl_iso_pob.p2+tbl_iso_pob.p3+tbl_iso_pob.p4+tbl_iso_pob.p5)/(tbl_iso_pob.p_secc)) as d,
  sum(geo_secciones.pob_2965*(tbl_iso_pob.p1+tbl_iso_pob.p2+tbl_iso_pob.p3+tbl_iso_pob.p4+tbl_iso_pob.p5)/(tbl_iso_pob.p_secc)) as e,
  sum(geo_secciones.pob_6599*(tbl_iso_pob.p1+tbl_iso_pob.p2+tbl_iso_pob.p3+tbl_iso_pob.p4+tbl_iso_pob.p5)/(tbl_iso_pob.p_secc)) as f
FROM
  public.geo_secciones,
  public.tbl_iso_pob
WHERE
  geo_secciones.cod_secc = tbl_iso_pob.secc and tbl_iso_pob.id_encuesta_zc = ".$_GET['zipcode'];
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>false
));

$poblacion = $dataProvider->getData();
$pobTotal = $poblacion[0]['a'] + $poblacion[0]['b'] + $poblacion[0]['c'] + $poblacion[0]['d'] + $poblacion[0]['e'] + $poblacion[0]['f'];
error_log($pobTotal);
$pobZona = array($poblacion[0]['a']*100/$pobTotal, $poblacion[0]['b']*100/$pobTotal, $poblacion[0]['c']*100/$pobTotal, $poblacion[0]['d']*100/$pobTotal, $poblacion[0]['e']*100/$pobTotal, $poblacion[0]['f']*100/$pobTotal);

$sql="SELECT 
  sum(geo_secciones.pob_0005) as a, 
  sum(geo_secciones.pob_0514) as b, 
  sum(geo_secciones.pob_1519) as c, 
  sum(geo_secciones.pob_2029) as d, 
  sum(geo_secciones.pob_2965) as e, 
  sum(geo_secciones.pob_6599) as f
FROM 
  public.geo_secciones";
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>false
));

$pobEspana = $dataProvider->getData();
$pobTotalEspana = $pobEspana[0]['a'] + $pobEspana[0]['b'] + $pobEspana[0]['c'] + $pobEspana[0]['d'] + $pobEspana[0]['e'] + $pobEspana[0]['f'];


$pobNacional = array($pobEspana[0]['a']*100/$pobTotalEspana, $pobEspana[0]['b']*100/$pobTotalEspana, $pobEspana[0]['c']*100/$pobTotalEspana, $pobEspana[0]['d']*100/$pobTotalEspana, $pobEspana[0]['e']*100/$pobTotalEspana, $pobEspana[0]['f']*100/$pobTotalEspana);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'SOCIODEMOGRAFÍA');
$pdf->Line(8,$pdf->getY()+6, 200, $pdf->getY()+6);

$pdf->Ln(10);
$pdf->SetFont('Arial','I',10);
//$pdf->Cell(0,5, $_GET['hiper'] . "-" . $hiper->nombre);
$pdf->Text(130,$pdf->getY()-6, $_GET['hiper'] . "-" . utf8_decode($hiper->nombre));



$pdf->SetFont('Arial','',12);
$pdf->Cell(0,5,'Población en la zona de estudio');

$MyData = new pData();  
$MyData->addPoints($pobZona,"Poblacion zona");
$MyData->addPoints($pobNacional,"Poblacion nacional");
//$MyData->addPoints(array(2,7,5,18,19,22),"Frontend #3");
$MyData->setAxisName(0,"Habitantes (%)");
$MyData->setAxisName(1,"Rango edad");
$MyData->addPoints(array("0-4", "5-14", "15-19", "20-29", "30-65", ">65"),"Labels");
$MyData->setAbscissa("Labels");
$MyData->setPalette("Poblacion zona",array("R"=>204,"G"=>0,"B"=>204));
$MyData->setPalette("Poblacion nacional",array("R"=>0,"G"=>0,"B"=>0));
 

$myPicture = new pImage(980,420,$MyData);
//$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
//$myPicture->drawGradientArea(0,0,700,230,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
 

$myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>11)); 


$MyData->setSerieDrawable("Poblacion nacional",FALSE); 
$myPicture->setGraphArea(65,20,952,380);
$myPicture->drawScale(array("DrawSubTicks"=>TRUE,"Mode"=>SCALE_MODE_ADDALL_START0));
$myPicture->setShadow(FALSE);
$myPicture->drawBarChart(array("Surrounding"=>-15,"InnerSurrounding"=>15));
 

 $MyData->setSerieDrawable("Poblacion nacional",TRUE); 
 $MyData->setSerieDrawable("Poblacion zona",FALSE); 
 //$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
 $myPicture->drawSplineChart(); 

 $myPicture->setShadow(FALSE); 
 $myPicture->drawPlotChart(array("PlotSize"=>3,"PlotBorder"=>TRUE,"BorderSize"=>3,"BorderAlpha"=>5)); 

 
 $ran = rand ();
 $t1 = '/var/tmp/t1_'.$ran.'.jpg';
 $myPicture->render($t1); 

 $pdf->Ln(15);
 
 $pdf->SetX(20);
 $pdf->Image($t1,$pdf->GetX(),$pdf->GetY(),170,73);
 
$pdf->SetFont('Arial','',8);
$pdf->Ln(75);
$pdf->SetFillColor(204, 0, 204);
$pdf->Rect(50,$pdf->getY()-3, 7, 4, 'F');
$pdf->Text(60, $pdf->getY(), "% Población en la zona");
$pdf->SetDrawColor(0,0,0);
$pdf->Line(100,$pdf->getY(), 107, $pdf->getY());
$pdf->Text(110, $pdf->getY(), "% Población nacional");
 
 $columns = array();
 
 $col = array();
$col[] = array('text' => 'Edad', 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Población zona', 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => 'Población nacional', 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   
 $col = array();
$col[] = array('text' => '0 - 4', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($poblacion[0]['a']*100/$pobTotal, 0, ",",".") ."% (".number_format($poblacion[0]['a'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($pobEspana[0]['a']*100/$pobTotalEspana,0, ",", ".") ."% (".number_format($pobEspana[0]['a'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   
 $col = array();
$col[] = array('text' => '5 - 14', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($poblacion[0]['b']*100/$pobTotal, 0, ",","."). "% (".number_format($poblacion[0]['b'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($pobEspana[0]['b']*100/$pobTotalEspana,0, ",", ".") ."% (".number_format($pobEspana[0]['b'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   
 $col = array();
$col[] = array('text' => '15 - 19', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($poblacion[0]['c']*100/$pobTotal, 0, ",","."). "% (".number_format($poblacion[0]['c'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($pobEspana[0]['c']*100/$pobTotalEspana,0, ",", ".") ."% (".number_format($pobEspana[0]['c'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   
 $col = array();
$col[] = array('text' => '20 - 29', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($poblacion[0]['d']*100/$pobTotal, 0, ",","."). "% (".number_format($poblacion[0]['d'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($pobEspana[0]['d']*100/$pobTotalEspana,0, ",", ".") ."% (".number_format($pobEspana[0]['d'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   
 $col = array();
$col[] = array('text' => '30 - 65', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($poblacion[0]['e']*100/$pobTotal, 0, ",","."). "% (".number_format($poblacion[0]['e'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($pobEspana[0]['e']*100/$pobTotalEspana,0, ",", ".") ."% (".number_format($pobEspana[0]['e'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   
 $col = array();
$col[] = array('text' => '>65', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($poblacion[0]['f']*100/$pobTotal, 0, ",","."). "% (".number_format($poblacion[0]['f'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($pobEspana[0]['f']*100/$pobTotalEspana,0, ",", ".") ."% (".number_format($pobEspana[0]['f'], 0, ",",".")." hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   
 
 $col = array();
$col[] = array('text' => 'TOTAL', 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($pobTotal, 0, ",","."), 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($pobTotalEspana,0, ",", ".") , 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
   
 
// Draw Table   
$pdf->Ln(10);
$pdf->SetLeftMargin(45);
$pdf->WriteTable($columns);
$pdf->SetLeftMargin(20);


$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'SOCIODEMOGRAFÍA');
$pdf->Line(8,$pdf->getY()+6, 200, $pdf->getY()+6);
$pdf->Ln(10);

$pdf->SetFont('Arial','I',10);
//$pdf->Cell(0,5, $_GET['hiper'] . "-" . $hiper->nombre);
$pdf->Text(130,$pdf->getY()-6, $_GET['hiper'] . "-" . utf8_decode($hiper->nombre));



$pdf->SetFont('Arial','',12);
$pdf->Cell(0,5,'Extranjeros en la zona de estudio');

$pdf->Ln(15);

$model = new GeoSecciones();
$Criteria = new CDbCriteria();
$Criteria->select = 'sum(pob_0005+pob_0514+pob_1519+pob_2029+pob_2965+pob_6599) as pob_0005';
$p = $model->find($Criteria);
$pobEspana = $p->pob_0005;
	
$sql="SELECT sum (poblacion) as total
FROM tbl_extranjeros, tbl_aux_extranjeros 
WHERE id_nacionalidad = nacionalidad AND 
tipo = 0";
  
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>false
));

$tee = $dataProvider->getData();
$totalExtranjerosEspana = $tee[0]['total'];


$sql="SELECT
  sum(poblacion*(p1+p2+p3+p4+p5)/p_secc) as pob
FROM
  public.geo_secciones,
  public.tbl_iso_pob,
  tbl_extranjeros,
  tbl_aux_extranjeros
WHERE
  tbl_aux_extranjeros.id_nacionalidad = tbl_extranjeros.nacionalidad AND 
  geo_secciones.cod_secc = tbl_iso_pob.secc AND 
  tbl_extranjeros.seccion = tbl_iso_pob.secc AND 
  tbl_iso_pob.id_encuesta_zc = ".$_GET['zipcode'];
  
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>false
));

$pobE = $dataProvider->getData();
$pobExtr = $pobE[0]['pob'];


$sql="SELECT
  sum(poblacion*(p1+p2+p3+p4+p5)/p_secc) as pob,
  desc_nacionalidad,
  id_nacionalidad
FROM
  public.geo_secciones,
  public.tbl_iso_pob,
  tbl_extranjeros,
  tbl_aux_extranjeros
WHERE
  tbl_aux_extranjeros.id_nacionalidad = tbl_extranjeros.nacionalidad AND 
  geo_secciones.cod_secc = tbl_iso_pob.secc AND 
  tbl_extranjeros.seccion = tbl_iso_pob.secc AND 
  tbl_iso_pob.id_encuesta_zc = ".$_GET['zipcode']." AND
  grupo <> -1
GROUP BY 
  desc_nacionalidad, id_nacionalidad
ORDER BY 
  pob DESC";
  
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>false
));

$extranjeros = $dataProvider->getData();

$extr = array();
$desc_extr = array();
$ext_nacio = array();

$model = new TblExtranjeros();

for($r=0; $r<10;$r++){
	array_push($extr, $extranjeros[$r]['pob']);
	array_push($desc_extr, $extranjeros[$r]['desc_nacionalidad']);
	$id_nac = $extranjeros[$r]['id_nacionalidad'];
	$Criteria = new CDbCriteria();
	$Criteria->select = 'sum(poblacion) as poblacion';
	$Criteria->condition = "nacionalidad =".$id_nac;// . $id;
	$p = $model->find($Criteria);
	array_push($ext_nacio, $p->poblacion);
}

$MyData = new pData();   
$MyData->addPoints($extr,"ScoreA");  
$MyData->setSerieDescription("ScoreA","Application A");
 
/* Define the absissa serie */
$MyData->addPoints($desc_extr,"Labels");
$MyData->setAbscissa("Labels");
 
/* Create the pChart object */
$myPicture = new pImage(980,420,$MyData);

//$myPicture->drawText(10,13,"drawPieLegend - Draw pie charts legend",array("R"=>255,"G"=>255,"B"=>255));
 
/* Set the default font properties */ 
$myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>12)); 
 
/* Enable shadow computing */ 
$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>100));
 
$myPicture->setGraphArea(65,20,952,320);
$myPicture->drawScale(array("DrawSubTicks"=>FALSE, 'LabelRotation'=>25));
$myPicture->drawBarChart(array("DisplayColor"=>DISPLAY_AUTO,"Rounded"=>FALSE,"Surrounding"=>60));
/* Create the pPie object */ 
//$PieChart = new pPie($myPicture,$MyData);
 
/* Draw two AA pie chart */ 
//$PieChart->draw2DPie(200,200,array("Border"=>TRUE, "Radius"=>200));
// $PieChart->drawPieLegend(550,70, array("BoxSize"=>10, "Style"=>LEGEND_NOBORDER ));
/* Render the picture to a file */
$ran = rand ();
$t1 = '/var/tmp/t1_'.$ran.'.jpg';
$myPicture->render($t1); 
$pdf->SetX(20);
$pdf->Image($t1,$pdf->GetX(),$pdf->GetY(),170,73);

$columns = array();

$col = array();
$col[] = array('text' => 'Nacionalidad', 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => "Población extranjera (hab.)", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "% Extranjeros", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "% Extranjeros en España", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
  
for($k = 0; $k< count($extr); $k++) {
	$col = array();
	$col[] = array('text' => utf8_decode($desc_extr[$k]), 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => number_format($extr[$k], 0, ",","."), 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	//$col[] = array('text' => number_format($extr[$k]*100/$pobTotal, 1, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => number_format($extr[$k]*100/$pobExtr , 1, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => number_format($ext_nacio[$k]*100/$totalExtranjerosEspana, 1, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$columns[] = $col;
}

$col = array();
$col[] = array('text' => "Resto", 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($pobExtr - array_sum($extr), 0, ",", "."), 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format(($pobExtr - array_sum($extr))*100/$pobTotal, 1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
//$col[] = array('text' => number_format(($pobExtr - array_sum($extr))*100/$pobExtr, 1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format(($totalExtranjerosEspana - array_sum($ext_nacio))*100/$pobEspana, 1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;

$col = array();
$col[] = array('text' => "TOTAL", 'width' => '30', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($pobExtr , 0, ",", "."), 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($pobExtr*100/$pobTotal , 1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => number_format($totalExtranjerosEspana*100/$pobEspana , 1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;
 
// Draw Table   
$pdf->Ln(80);
$pdf->SetLeftMargin(45);
$pdf->WriteTable($columns);
$pdf->SetLeftMargin(20);

//------------------------------ COMPETENCIA -----------------------------

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'COMPETENCIA');
$pdf->Line(8,$pdf->getY()+6, 200, $pdf->getY()+6);

$pdf->SetFont('Arial','I',10);
//$pdf->Cell(0,5, $_GET['hiper'] . "-" . $hiper->nombre);
$pdf->Text(130,$pdf->getY()+3, $_GET['hiper'] . "-" . utf8_decode($hiper->nombre));

$pdf->SetFont('Arial','I',8);
$pdf->Text(20, 279,  '* Incluidos datos del hipermercado seleccionado');

$pdf->SetFont('Arial','I',8);
$pdf->Text(150, 279,  'Nielssen último año disponible');

$pdf->Ln(10);
$map->setSize(1050, 504);

$lyr = $map->getLayerByName("Ensenas1000");
$lyr->set('status',MS_ON);


$lyr = $map->getLayerByName("ISO3");
$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);


$ref = $map->draw();
$ran = rand ();
$t1 = '/var/tmp/t1_'.$ran.'.png';

$ref->saveImage($t1);

$pdf->Ln(10);
$pdf->SetX(30);
$pdf->Image($t1,$pdf->GetX(),$pdf->GetY(),156,75);

$pdf->Ln(85);
$pdf->SetFont('Arial','',8);

$pdf->SetDrawColor(0, 0, 255);
$pdf->Line(30,$pdf->getY()+3, 37, $pdf->getY()+3);
$pdf->Cell(20);
$pdf->Cell(0, 5, "Isocrona 0-2'");

$pdf->SetDrawColor(255,150,50);
$pdf->Line(60,$pdf->getY()+3, 67, $pdf->getY()+3);
$pdf->Text(69, $pdf->getY()+4, "Isocrona 2-5'");

$pdf->SetDrawColor(255,0, 255);
$pdf->Line(90,$pdf->getY()+3, 97, $pdf->getY()+3);
$pdf->Text(99, $pdf->getY()+4, "Isocrona 5-8'");

$pdf->SetDrawColor(0,255, 0);
$pdf->Line(120,$pdf->getY()+3, 127, $pdf->getY()+3);
$pdf->Text(129, $pdf->getY()+4, "Isocrona 8-12'");

$pdf->SetDrawColor(255,255,100);
$pdf->Line(150,$pdf->getY()+3, 157, $pdf->getY()+3);
$pdf->Text(159, $pdf->getY()+4, "Isocrona 12-20'");

$pdf->SetDrawColor(0,0,0);
$pdf->Rect(20, $pdf->getY(), 170, 8);

$pdf->Ln(10);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,5,'Competencia hasta 8 minutos');
$pdf->Ln(10);

$sql = "SELECT rotulo as ensena, count(*) as total, sum(sala_ventas)  as superficie
	FROM geo_isopolygon, geo_nielssen , tbl_rotulo 
	WHERE tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
	ST_Intersects(geo_isopolygon.geom, geo_nielssen.geom) AND 
	geo_isopolygon.id_hiper = ".$_GET['hiper']." AND
	geo_isopolygon.iso IN (1,2,3) AND
	fecha_baja is null
	GROUP BY rotulo  
	ORDER BY sum(sala_ventas) DESC";
	
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>array(
		'pageSize'=>100,
)));


$m = $dataProvider->getData();
$columns = array();
$sup = 0;
$tot = 0;

$superficieTotal = 0;
$totalTotal = 0;

$col = array();
$col[] = array('text' => "Enseña *", 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => "Superficie (m2)", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "Número", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;	  
		
for($p=0; $p<count($m); $p++){
	if($p<10){
		$col = array();
		$col[] = array('text' => $m[$p]["ensena"], 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
		$col[] = array('text' => number_format($m[$p]["superficie"], 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
		$col[] = array('text' => $m[$p]["total"], 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
		$columns[] = $col;	   
	}else{
		$sup+= $m[$p]["superficie"];
		$tot+= $m[$p]["total"];
	}
	$superficieTotal += $m[$p]["superficie"];
	$totalTotal += $m[$p]["total"];
}

$col = array();
$col[] = array('text' => "Resto", 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' =>  number_format($sup, 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => $tot, 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;	 
  
$col = array();
$col[] = array('text' => "TOTAL", 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' =>  number_format($superficieTotal, 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => $totalTotal, 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;	   

// Draw Table   
$pdf->SetLeftMargin(50);
$pdf->WriteTable($columns);
$pdf->SetLeftMargin(20);

$sql = "SELECT descr as tipo, count(*) as total , sum(sala_ventas)  as superficie
	FROM geo_isopolygon, geo_nielssen , tbl_tipo_estab 
	WHERE tbl_tipo_estab.tipo = geo_nielssen.tipo AND
	ST_Intersects(geo_isopolygon.geom,  geo_nielssen.geom) AND 
	geo_isopolygon.id_hiper = ".$_GET['hiper']." AND
	geo_isopolygon.iso IN (1,2,3) and
	fecha_baja is null
	GROUP BY descr  
	ORDER BY descr ASC";

$dataProvider=new CSqlDataProvider($sql);

$pdf->Ln(10);
$m = $dataProvider->getData();
$columns = array();
$sup = 0;
$tot = 0;
$superficieTotal = 0;
$totalTotal = 0;

$col = array();
$col[] = array('text' => "Tipo *", 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => "Superficie (m2)", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "Número", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;	  
		
for($p=0; $p<count($m); $p++){
	$col = array();
	$col[] = array('text' => utf8_decode($m[$p]["tipo"]), 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => number_format($m[$p]["superficie"], 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => $m[$p]["total"], 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$columns[] = $col;		
	$superficieTotal += $m[$p]["superficie"];
	$totalTotal += $m[$p]["total"];
}

$col = array();
$col[] = array('text' => "TOTAL", 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => number_format($superficieTotal, 0, ",","."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => $totalTotal, 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;	 

// Draw Table   
$pdf->SetLeftMargin(50);
$pdf->WriteTable($columns);
$pdf->SetLeftMargin(20);

$pdf->AddPage();

//--------------------COMPETENCIA HASTA 12 MINUTOS -------------------
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'COMPETENCIA');
$pdf->Line(8,$pdf->getY()+6, 200, $pdf->getY()+6);

$pdf->SetFont('Arial','I',10);
//$pdf->Cell(0,5, $_GET['hiper'] . "-" . $hiper->nombre);
$pdf->Text(130,$pdf->getY()+3, $_GET['hiper'] . "-" . utf8_decode($hiper->nombre));

$pdf->SetFont('Arial','I',8);
$pdf->Text(20, 279,  '* Incluidos datos del hipermercado seleccionado');

$pdf->SetFont('Arial','I',8);
$pdf->Text(150, 279,  'Nielssen último año disponible');

$pdf->Ln(10);

$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,5,'Competencia hasta 12 minutos');
$pdf->Ln(10);

$sql = "SELECT rotulo as ensena, count(*) as total, sum(sala_ventas)  as superficie
	FROM geo_isopolygon, geo_nielssen , tbl_rotulo 
	WHERE tbl_rotulo.id_rotulo = geo_nielssen.id_rotulo AND
	ST_Intersects(geo_isopolygon.geom, geo_nielssen.geom) AND 
	geo_isopolygon.id_hiper = ".$_GET['hiper']." AND
	geo_isopolygon.iso IN (1,2,3,4) and
	fecha_baja is null
	GROUP BY rotulo  
	ORDER BY sum(sala_ventas) DESC";
	
$dataProvider=new CSqlDataProvider($sql, array(
	'pagination'=>array(
		'pageSize'=>100,
)));


$m = $dataProvider->getData();
$columns = array();
$sup = 0;
$tot = 0;
$superficieTotal = 0;
$totalTotal = 0;

$col = array();
$col[] = array('text' => "Enseña *", 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => "Superficie (m2)", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "Número", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;	  
		
for($p=0; $p<count($m); $p++){
	if($p<10){
		$col = array();
		$col[] = array('text' => $m[$p]["ensena"], 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
		$col[] = array('text' => number_format($m[$p]["superficie"], 0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
		$col[] = array('text' => $m[$p]["total"], 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
		$columns[] = $col;	   
	}else{
		$sup+= $m[$p]["superficie"];
		$tot+= $m[$p]["total"];
	}
	$superficieTotal += $m[$p]["superficie"];
	$totalTotal += $m[$p]["total"];
}

$col = array();
$col[] = array('text' => "Resto", 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' =>  number_format($sup, 0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => $tot, 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;	   

$col = array();
$col[] = array('text' => "TOTAL", 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' =>  number_format($superficieTotal, 0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => $totalTotal, 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;	   

// Draw Table   
$pdf->SetLeftMargin(50);
$pdf->WriteTable($columns);
$pdf->SetLeftMargin(20);

$sql = "SELECT descr as tipo, count(*) as total , sum(sala_ventas)  as superficie
	FROM geo_isopolygon, geo_nielssen , tbl_tipo_estab 
	WHERE tbl_tipo_estab.tipo = geo_nielssen.tipo AND
	ST_Intersects(geo_isopolygon.geom,  geo_nielssen.geom) AND 
	geo_isopolygon.id_hiper = ".$_GET['hiper']." AND
	geo_isopolygon.iso IN (1,2,3,4) and
	fecha_baja is null
	GROUP BY descr  
	ORDER BY descr ASC";

$dataProvider=new CSqlDataProvider($sql);

$pdf->Ln(10);
$m = $dataProvider->getData();
$columns = array();
$sup = 0;
$tot = 0;
$superficieTotal = 0;
$totalTotal = 0;

$col = array();
$col[] = array('text' => "Tipo *", 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => "Superficie (m2)", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "Número", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;	  
		
for($p=0; $p<count($m); $p++){
	$col = array();
	$col[] = array('text' => utf8_decode($m[$p]["tipo"]), 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' =>  number_format($m[$p]["superficie"], 0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => $m[$p]["total"], 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$columns[] = $col;		
	
	$superficieTotal += $m[$p]["superficie"];
	$totalTotal += $m[$p]["total"];
}

$col = array();
$col[] = array('text' => "TOTAL", 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' =>  number_format($superficieTotal, 0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => $totalTotal, 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$columns[] = $col;

// Draw Table   
$pdf->SetLeftMargin(50);
$pdf->WriteTable($columns);
$pdf->SetLeftMargin(20);



// -------------------------- ZIPCODE -----------------------------

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'ZIPCODE');
$pdf->Line(8,$pdf->getY()+6, 200, $pdf->getY()+6);
$pdf->Ln(10);

// Logo NEW
$pdf->Image('images/new.gif',180,8,15);
// Arial bold 15
$pdf->SetFont('Arial','B',10);
// Movernos a la derecha
$pdf->Cell(350);
// Título
//$this->Cell(30,10,'Title',1,0,'C');
// Salto de línea
$pdf->Ln(0);

$pdf->SetFont('Arial','I',10);
//$pdf->Cell(0,5, $_GET['hiper'] . "-" . $hiper->nombre);
$pdf->Text(130,$pdf->getY()-6, $_GET['hiper'] . "-" . utf8_decode($hiper->nombre));
$pdf->SetFont('Arial','B',12);
$pdf->Text(150, 278,  'Año: '.$fecha_iniZC);

$map = ms_newMapObj("c:\\datos/sigma/maps/sigma.map");
$map->selectOutputFormat('jpeg');
$map->setSize(1050, 504);

//CAPAS ZIPCODE
$lyr = $map->getLayerByName("EnsenaZC");
$lyr->data = "geom FROM (SELECT 
						  geo_nielssen.geom, 
						  tbl_rotulo.rotulo, 
						  tbl_etiqueta.etiqueta, 
						  tbl_etiqueta.logo2,
						  codigo_nielssen as gid
						FROM 
						  public.geo_nielssen, 
						  public.tbl_rotulo, 
						  public.tbl_etiqueta
						WHERE 
						  geo_nielssen.fecha_baja is null and geo_nielssen.id_rotulo = tbl_rotulo.id_rotulo AND
						  tbl_etiqueta.id_etiqueta = tbl_rotulo.id_etiqueta AND
						  geo_nielssen.id_rotulo = 62)
	as subquery USING UNIQUE gid USING srid=25830";
$lyr->set('status',MS_ON);

$lyr = $map->getLayerByName("Zonas_CV");

/*$lyr->data = "geom FROM (SELECT 
	  (tbl_zc_consolidado.venta_si+
	  tbl_zc_consolidado.venta_no+
	  tbl_zc_consolidado.venta_ns)*100/c.total as cv ,
	  tbl_zc_consolidado.cp, 
	  tbl_zc_consolidado.cod_zipcode,
	  geom, gid
	FROM 
	  public.tbl_zc_consolidado, (
		SELECT 
		  sum (tbl_zc_consolidado.venta_si+
		  tbl_zc_consolidado.venta_no+
		  tbl_zc_consolidado.venta_ns) as total
		FROM 
		  public.tbl_zc_consolidado
		WHERE cod_zipcode = ".$_GET['cod_zipcode']." 
		GROUP BY cod_zipcode
	  )as c, geo_cp 
	WHERE cod_zipcode = ".$_GET['cod_zipcode']." AND geo_cp.cp = tbl_zc_consolidado.cp AND
		(tbl_zc_consolidado.venta_si+
		tbl_zc_consolidado.venta_no+
		tbl_zc_consolidado.venta_ns)*100/c.total >=1) 
as subquery USING UNIQUE cp USING srid=25830";*/

$lyr->data = "geom FROM (SELECT 
							geo_cp.cp, 
							geo_cp.geom, 
							gid
						FROM 
							public.tbl_zona_zipcode, 
							public.geo_cp 
						WHERE 
							tbl_zona_zipcode.id_hiper_alcampo = ".$_GET['hiper']." AND 
							geo_cp.cp = tbl_zona_zipcode.cp)
as subquery USING UNIQUE cp USING srid=25830";
		 
$lyr->set('status',MS_ON);
$lyr->set('opacity',70);
$class = $lyr->getClass(0);
$label = $class->getLabel(0);
$label->set('size', 12);
$label->color->setRGB(50,50,50);
$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);

//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------
//WMS IGN
//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------

$l = ms_newLayerObj($map);
$l->set("name", "WMS_IGN");
$l->set("status", MS_ON);
$l->set("startindex", 0);
$l->set("type", MS_LAYER_RASTER);
$l->setConnectionType(MS_WMS);
$l->set('connection', "http://www.ign.es/wms-inspire/ign-base?SERVICE=WMS");
$l->setMetaData("wms_srs", "epsg:25830");
$l->setMetaData("wms_name", "IGNBaseTodo");
$l->setMetaData("wms_format", "image/jpeg");
$l->setMetaData("wms_server_version", "1.1.1");

$map->removeLayer($map->numlayers-1);
$map->insertLayer($l, 0);

$ref = $map->draw();
$ran = rand ();
$t1 = '/var/tmp/t1_'.$ran.'.jpg';

$ref->saveImage($t1);

$pdf->Ln(10);
$pdf->SetX(30);
$pdf->Image($t1,$pdf->GetX(),$pdf->GetY(),156,75);

//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------
//GRAFICO ZIPCODE Y DATOS PARA LA TABLA CÓDIGOS POSTALES
//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------

$model=new TblZcConsolidado;
$Criteria = new CDbCriteria();
$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si, sum(folleto_si + folleto_no + folleto_ns) as folleto_si";
$Criteria->condition = "cod_zipcode = ".$_GET['cod_zipcode'];
$Criteria->group = "cod_zipcode";
$cifra_venta = $model->find($Criteria);
$cifra=array();
$cifraOtros=array();
$cps = array();
$cpsOtros = array();
$folletos = array();

$cifraOld=array();
$folletosOld = array();

if($cifra_venta ){
	$CV = $cifra_venta->venta_si;
	$FOLL = $cifra_venta->folleto_si;
		
		
	$Criteria = new CDbCriteria();
	$Criteria->select = "(venta_si + venta_no + venta_ns) as venta_si, cp, folleto_si, folleto_no, folleto_ns";
	$Criteria->condition = "cod_zipcode = ".$_GET['cod_zipcode'];
	$Criteria->order = "venta_si DESC";
	//$Criteria->limit = 10;
	$cod = $model->findAll($Criteria);
	$suma = 0;
	$k = 0;
	$sumFoll = 0;
	$sumFollSI = 0;
	foreach($cod as $c){
		//$r['cod_zipcode'] = $c->cod_zipcode;
		//$r['cv'] = $c->venta_si*100/$CV;
		if($k<10){
			$F = $c->folleto_si + $c->folleto_no + $c->folleto_ns;
			array_push($folletos, number_format($c->folleto_si*100/$F, 1, ".", ","));
			array_push($cifra, $c->venta_si*100/$CV);
			array_push($cps, $c->cp);
		}else{
			$suma = $suma + $c->venta_si;
			$sumFoll = $sumFoll + $c->folleto_si + $c->folleto_no + $c->folleto_ns;
			$sumFollSI = $sumFollSI + $c->folleto_si;
			array_push($cpsOtros, $c->cp);
		}
		
		$k++;
	}
	
	array_push($cps, "Otros");
	array_push($cifra, $suma*100/$CV);
	array_push($cifraOtros, $suma*100/$CV);
	error_log($cifraOtros[0]);
	array_push($folletos, $sumFollSI*100/$sumFoll);
	
	//SACAR EL ZIPCODE ANTERIOR Y VARIACION
	
	$model=new TblZc;
	$Criteria = new CDbCriteria();
	$Criteria->condition = "cod_zipcode = ".$_GET['cod_zipcode'];
	$m = $model->find($Criteria);	
	$fecha_ini = $m->fecha_ini;	
	$euros = $m->cv;
	
	$Criteria = new CDbCriteria();
	$Criteria->condition = "tipo_zc = 1 AND id_alcampo = ".$_GET['hiper'] . " AND fecha_ini < '".$fecha_ini."'";
	$Criteria->order = "fecha_ini DESC";
	$m = $model->find($Criteria);
	
	if($m && $euros >0){
		$new_zc = $m->cod_zipcode;
		$new_euros = $m->cv;
		
		$model=new TblZcConsolidado;
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si";
		$Criteria->condition = "cod_zipcode = ".$new_zc;
		$Criteria->group = "cod_zipcode";
		$cifra_venta = $model->find($Criteria);
		$new_CV = $cifra_venta->venta_si;
		
		
		$k = 0;
		$suma = 0;
		$suma_old = 0;				
		foreach($cps as $c){
			//error_log($c);
			$Criteria = new CDbCriteria();
			//$Criteria->select = "(venta_si + venta_no + venta_ns) as venta_si";
			$Criteria->condition = "cod_zipcode = ".$new_zc . " AND cp = '".$c."'" ;
			$cod_old = $model->find($Criteria);
			if($cod_old){
				//if($k<10){
					$valor_euros = $new_euros*($cod_old->venta_si+$cod_old->venta_no+$cod_old->venta_ns)/$new_CV;				
					$valor_euros_old = $euros*$cifra[$k]/100;
					//error_log("valor_euros: ".$valor_euros);
					//error_log("valor_euros_old: ".$valor_euros_old);
					
					$variacion = 100*($valor_euros_old-$valor_euros)/$valor_euros;
					//$r = array($c->cp,  $variacion);
					array_push($cifraOld, $variacion);
					$suma = $suma + $valor_euros;
					$suma_old = $suma_old + $valor_euros_old;
					
					//array_push($cifraOld, number_format(100*($k->venta_si+$k->venta_no+$k->venta_ns)/$new_CV, 1));
				/*}
				if($c="Otros"){
					error_log("Entro");
					foreach($cpsOtros as $cO){
						$Criteria = new CDbCriteria();
						$Criteria->select = "(venta_si + venta_no + venta_ns) as venta_si";
						$Criteria->condition = "cod_zipcode = ".$new_zc . " AND cp IN ('".$cO."')" ;
						$cod_old2 = $model->find($Criteria);
						$valor_euros = $new_euros*($cod_old2->venta_si)/$new_CV;				
						$valor_euros_old = $euros*$cifraOtros[$k]/100;
						error_log("valor_euros: ".$valor_euros);
						error_log("valor_euros_old: ".$valor_euros_old);
						
						$variacion = 100*($valor_euros_old-$valor_euros)/$valor_euros;
						//$r = array($c->cp,  $variacion);
						array_push($cifraOld, $variacion);
						$suma = $suma + $valor_euros;
						$suma_old = $suma_old + $valor_euros_old;
					}
				}*/
			}else{
				//array_push($cifraOld, 0);						
			}
			$k++;	
			
		}
		array_push($cifraOld, 100*($suma_old-$suma)/$suma);
		
	}
	
}		
$cifraGrafico=array();
foreach($cifra as $v){
	array_push($cifraGrafico,number_format($v,1));
}

//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------
//TABLA ZONAS ZC
//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------

//Saco los códigos postales correspondientes a la Zona ZC
$model=new TblZonaZipcode;
$Criteria = new CDbCriteria();
$Criteria->select = "cp";
$Criteria->condition = "id_hiper_alcampo = ".$_GET['hiper'];
$codigosPostalesZC = $model->findAll($Criteria);
$arr= array();
$texto="";
//Preparo un string con los códigos postales separados por comillas simples y comas para añadir al SQL
foreach($codigosPostalesZC as $c){
	$texto.="'".$c->cp."',";
}
$texto=substr($texto, 0, -1);
error_log($texto);

//Se calcula la CV y los folletos totales del código zipcode anual.
$model=new TblZcConsolidado;
$Criteria = new CDbCriteria();
$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si, sum(folleto_si + folleto_no + folleto_ns) as folleto_si";
$Criteria->condition = "cod_zipcode = ".$_GET['cod_zipcode'];
$Criteria->group = "cod_zipcode";
$cifra_ventaZC = $model->find($Criteria);

$cifraZC=array();
$cpsZC = array();
$folletosZC = array();
$cifraOldZC=array();
$folletosOldZC = array();

if($cifra_ventaZC ){
	//Guardamos en variables la CV y los folletos totales del código zipcode anual.
	$CV_ZC = $cifra_ventaZC->venta_si;
	$FOLL_ZC = $cifra_ventaZC->folleto_si;
	
	
	//Con los CP de la Zona ZC, sacamos la CV y los folletos.
	$model=new TblZcConsolidado;
	$Criteria = new CDbCriteria();
	$Criteria->select = "(venta_si + venta_no + venta_ns) as venta_si, folleto_si, folleto_no, folleto_ns";
	$Criteria->condition = "cod_zipcode = ".$_GET['cod_zipcode']." AND cp IN(".$texto.")";
	$Criteria->order = "venta_si DESC";
	//$Criteria->limit = 10;
	$codZC = $model->findAll($Criteria);
	
	$sumaZC = 0;
	$y = 0;
	$sumFollZC = 0;
	$sumFollSIZC = 0;
	
	//Recorremos cada CP de la Zona ZC para sacar la CV y los folletos y sumar los valores.
	foreach($codZC as $b){		
		$sumaZC = $sumaZC + $b->venta_si;			
		$sumFollZC = $sumFollZC + $b->folleto_si + $b->folleto_no + $b->folleto_ns;
		$sumFollSIZC = $sumFollSIZC + $b->folleto_si;
	}
		
	array_push($cifraZC, $sumaZC*100/$CV_ZC);
	array_push($folletosZC, $sumFollSIZC*100/$sumFollZC);
	
	//----------------------------------------------
	//SACAR EL ZC ANTERIOR Y SU VARIACIÓN
	//----------------------------------------------
	
	//Sacamos la CV total del ZC Nacional de este año y su fecha con los códigos postales de la Zona ZC
	$model=new TblZc;
	$Criteria = new CDbCriteria();
	$Criteria->condition = "cod_zipcode = ".$_GET['cod_zipcode'];
	$m = $model->find($Criteria);
	$fecha_ini = $m->fecha_ini;	
	$eurosZC = $m->cv;
			
	//Buscamos los anteriores ZC Nacionales
	$Criteria = new CDbCriteria();
	$Criteria->condition = "tipo_zc = 1 AND id_alcampo = ".$_GET['hiper'] . " AND fecha_ini < '".$fecha_ini."'";
	$Criteria->order = "fecha_ini DESC";
	$m = $model->find($Criteria);
	
	if($m && $eurosZC >0){
		//cod_zipcode anterior
		$new_zc = $m->cod_zipcode;
		//CV total anterior
		$new_eurosZC = $m->cv;
		
		//CV total del ZC anterior
		$model=new TblZcConsolidado;
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si";
		$Criteria->condition = "cod_zipcode = ".$new_zc;
		$Criteria->group = "cod_zipcode";
		$cifra_venta_oldZC = $model->find($Criteria);
		$new_CV = $cifra_venta_oldZC->venta_si;
		
		
		$sumaZC = 0;
		$suma_NewZC = 0;				
		
		//CV total del ZC anterior de los CP de la Zona ZC
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(venta_si + venta_no + venta_ns) as venta_si";
		$Criteria->condition = "cod_zipcode = ".$new_zc . " AND cp IN(".$texto.")";			
		$cod_oldZC = $model->find($Criteria);
		
		if($cod_oldZC){
			$valor_eurosZC = $new_eurosZC*($cod_oldZC->venta_si)/$new_CV;
			error_log("valor_eurosZC: ".$valor_eurosZC);
			$valor_euros_NewZC = $eurosZC*$cifraZC[0]/100;				
			error_log("valor_euros_NewZC: ".$valor_euros_NewZC);
			
			$variacionZC = 100*($valor_euros_NewZC-$valor_eurosZC)/$valor_eurosZC;				
			//array_push($cifraOldZC, $variacionZC);
			$pepe=($valor_eurosZC-$valor_euros_NewZC)*100/$valor_euros_NewZC;
			error_log("Pepe: ".$pepe);
			$sumaZC = $sumaZC + $valor_eurosZC;
			$suma_NewZC = $suma_NewZC + $valor_euros_NewZC;						
			array_push($cifraOldZC, 100*($suma_NewZC-$sumaZC)/$sumaZC);
		}
		
	}
	
}

 $model = new TblZc();
 $Criteria = new CDbCriteria();
 $Criteria->condition = "cod_zipcode = ".$_GET['cod_zipcode'];
 $S = $model->find($Criteria);
 $cifra_totalZC = $S->cv;
 $columns = array();
 
 $col = array();
$col[] = array('text' => "", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => "% Cifra Venta", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "Cifra Venta (€)", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "Evolución Cifra Venta", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "% Folletos", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$columns[] = $col;

for($p=0; $p<=0; $p++){		
	$col = array();
	$col[] = array('text' => "Zonas ZC", 'width' => '20', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => number_format($cifraZC[$p], 1, ",", "."), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => number_format($cifraZC[$p]*$cifra_totalZC/100, 0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	if(count($cifraOldZC)>0){
		if(isset($cifraOldZC[$p])){
			$col[] = array('text' => number_format($cifraOldZC[$p], 1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
		}else{
			$col[] = array('text' => "--", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
		}	
	}else{
		$col[] = array('text' => "--", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	}
	$col[] = array('text' => number_format($folletosZC[$p], 1, ",", "."), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$columns[] = $col;		
}


// Draw Table  
$pdf->Ln(80) ;
$pdf->SetLeftMargin(50);
$pdf->WriteTable($columns);
$pdf->SetLeftMargin(20);	



//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------
//GRAFICO ZIPCODE
//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------
		
 $MyData = new pData();  
 $MyData->addPoints($cifraGrafico,"Cifra de venta"); 
 //$MyData->addPoints($cifra,"CV"); 
 //$MyData->setSerieTicks("CV",4); 
 $MyData->addPoints($cps,"Labels"); 
 $MyData->setAbscissa("Labels"); 

 $MyData->setAxisName(0, "% Cifra de Venta");

 $MyData->setPalette("Cifra de venta",array("R"=>0,"G"=>153,"B"=>76));
 
 /* Create the pChart object */ 
 $myPicture = new pImage(980,322,$MyData); 
 $myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>15)); 
 /* Turn on antialiasing */ 
 $myPicture->Antialias = FALSE; 

 /* Draw the scale */ 
 $myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>9)); 
 $myPicture->setGraphArea(65,60,938,266); 
 //$myPicture->drawFilledRectangle(50,60,670,190,array("R"=>255,"G"=>255,"B"=>255,"Surrounding"=>-200,"Alpha"=>10)); 
 //$AxisBoundaries = array(0=>array("Min"=>0,"Max"=>$maxPob),1=>array("Min"=>0,"Max"=>$mxCV));
 //$myPicture->drawScale(array("CycleBackground"=>TRUE, "Mode"=>SCALE_MODE_MANUAL, "ManualScale"=>$AxisBoundaries)); 
 $myPicture->drawScale(); 

 /* Graph title */ 
 $myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>18)); 
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
 $myPicture->drawText(130,52,"% Cifra de Venta ",array("FontSize"=>14,"Align"=>TEXT_ALIGN_BOTTOMLEFT)); 

 /* Draw the bar chart chart */ 
 $myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>9, "R"=>0, "G"=>153, "B"=>0)); 
 $MyData->setSerieDrawable("Cifra de venta",TRUE); 
 $myPicture->drawBarChart(array("DisplayValues"=>TRUE)); 

 /* Turn on antialiasing */ 
 $myPicture->Antialias = TRUE; 

 /* Make sure all series are drawable before writing the scale */ 
 $MyData->drawAll(); 

 /* Write the legend */ 
/* $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
 $myPicture->drawLegend(580,35,array("Style"=>LEGEND_ROUND,"Alpha"=>20,"Mode"=>LEGEND_HORIZONTAL)); 
*/
 /* Render the picture (choose the best way) */ 
 $ran = rand ();
 $t1 = '/var/tmp/t1_'.$ran.'.jpg';
 $myPicture->render($t1); 

 $pdf->Ln(1);
 
 $pdf->SetX(20);
 $pdf->Image($t1,$pdf->GetX(),$pdf->GetY(),170,50);

//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------
//TABLA CÓDIGOS POSTALES
//---------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------

 $model = new TblZc();
 $Criteria = new CDbCriteria();
 $Criteria->condition = "cod_zipcode = ".$_GET['cod_zipcode'];
 $f = $model->find($Criteria);
 $cifra_total = $f->cv;
 $columns = array();
 
 $col = array();
$col[] = array('text' => "CP", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => "% Cifra Venta", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "Cifra Venta (€)", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "Evolución Cifra Venta", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
$col[] = array('text' => "% Folletos", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$columns[] = $col;	  
		
//Versión Antigua	
/*for($p=0; $p<count($cps); $p++){
	$col = array();
	$col[] = array('text' => ($cps[$p]), 'width' => '20', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => number_format($cifra[$p], 1, ",", "."), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => number_format($cifra[$p]*$cifra_total/100, 0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	if(count($cifraOld)>0)
		$col[] = array('text' => number_format($cifraOld[$p], 1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else
		$col[] = array('text' => "--", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => number_format($folletos[$p], 1, ",", "."), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$columns[] = $col;		
}*/
for($p=0; $p<count($cps); $p++){
	$col = array();
	$col[] = array('text' => ($cps[$p]), 'width' => '20', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => number_format($cifra[$p], 1, ",", "."), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => number_format($cifra[$p]*$cifra_total/100, 0, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	if(count($cifraOld)>0){
		if(isset($cifraOld[$p])){
			$col[] = array('text' => number_format($cifraOld[$p], 1, ",", "."), 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
		}else{
			$col[] = array('text' => "--", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
		}	
	}else{
		$col[] = array('text' => "--", 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	}
	$col[] = array('text' => number_format($folletos[$p], 1, ",", "."), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$columns[] = $col;		
}


// Draw Table  
$pdf->Ln(50) ;
$pdf->SetLeftMargin(50);
$pdf->WriteTable($columns);
$pdf->SetLeftMargin(20);
 

 // ---------------------- ZONA DE INFLUENCIA ---------------------
 if(!empty($_GET['id_encuesta'])){
	 $pdf->AddPage();
	 
	 $pdf->SetFont('Arial','B',16);
	 $pdf->Cell(0,5,'ZONA DE INFLUENCIA');
	 $pdf->Line(8,$pdf->getY()+6, 200, $pdf->getY()+6);
	 $pdf->Ln(10);
	 
	 
	$pdf->SetFont('Arial','I',10);
	//$pdf->Cell(0,5, $_GET['hiper'] . "-" . $hiper->nombre);
	$pdf->Text(130,$pdf->getY()-6, $_GET['hiper'] . "-" . utf8_decode($hiper->nombre));

	$model = new TblIdEncuesta;
	$Criteria = new CDbCriteria();
	$Criteria->select = "date_part('year', fecha_encuesta) as fecha_encuesta";
	$Criteria->condition = "id_encuesta = ".$_GET['id_encuesta'];
	$c = $model->find($Criteria);
	$fecha = $c->fecha_encuesta;


	$pdf->SetFont('Arial','B',12);
	$pdf->Text(160, 279,  'Año: '.$fecha);

	 $map = ms_newMapObj("c:\\datos/sigma/maps/sigma.map");
	$map->selectOutputFormat('png');
	$map->setSize(1050, 504);

	//CAPAS ZIPCODE
	$lyr = $map->getLayerByName("ZONAS_INFLUENCIA");

	$lyr->data = "geom FROM (SELECT 
				  geo_zona_influencia.gid, 
				  geo_zona_influencia.geom, 
				  geo_zona_influencia.loc, 
				  tbl_zona_influencia.id_tipo_zi as tipo,
				  geo_zona_influencia.descripcion
				FROM 
				  public.geo_zona_influencia, 
				  public.tbl_zona_influencia
				WHERE 
				  geo_zona_influencia.loc = tbl_zona_influencia.loc AND
				  tbl_zona_influencia.id_hiper_alcampo = ".$_GET['hiper'].")
			as subquery USING UNIQUE loc USING srid=25830";
	$lyr->set('status',MS_ON);
	$lyr->set('opacity',30);
	$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);


	//WMS IGN

	$l = ms_newLayerObj($map);
	$l->set("name", "WMS_IGN");
	$l->set("status", MS_ON);
	$l->set("startindex", 0);
	$l->set("type", MS_LAYER_RASTER);
	$l->setConnectionType(MS_WMS);
	$l->set('connection', "http://www.ign.es/wms-inspire/ign-base?SERVICE=WMS");
	$l->setMetaData("wms_srs", "epsg:25830");
	$l->setMetaData("wms_name", "IGNBaseTodo");
	$l->setMetaData("wms_format", "image/jpeg");
	$l->setMetaData("wms_server_version", "1.1.1");

	$map->removeLayer($map->numlayers-1);
	$map->insertLayer($l, 0);

	$ref = $map->draw();
	$ran = rand ();
	$t1 = '/var/tmp/t1_'.$ran.'.png';

	$ref->saveImage($t1);

	$pdf->Ln(10);
	$pdf->SetX(30);
	$pdf->Image($t1,$pdf->GetX(),$pdf->GetY(),156,75);

	$pdf->Ln(80);
	 $pdf->SetFont('Arial','',8);
	 
	$pdf-> SetFillColor(0, 0, 255);
	$pdf->Rect(60, $pdf->getY()+3, 7, 4, 'F');
	$pdf->Text(69, $pdf->getY()+6, "Zona principal");

	$pdf-> SetFillColor(255, 153, 51);
	$pdf->Rect(100, $pdf->getY()+3, 7, 4, 'F');
	$pdf->Text(109, $pdf->getY()+6, "Zona intermedia");

	$pdf-> SetFillColor(0, 255, 0);
	$pdf->Rect(140, $pdf->getY()+3, 7, 4, 'F');
	$pdf->Text(149, $pdf->getY()+6, "Resto");

	$pdf->Rect(30, $pdf->getY(), 155, 10);

	 // GRAFICO DE CLIENTES
	 
	  /* Create and populate the pData object */

	$model=new TblEncuestaInfluencia;
	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(ponderacion) as ponderacion";
	$Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND tipo = 'P1'";
	$total1 = $model->find($Criteria);
	$total = $total1->ponderacion;

	$Criteria = new CDbCriteria();
	$Criteria->select = "sum(ponderacion) as ponderacion, p as p";
	$Criteria->condition = " id_encuesta = ".$_GET['id_encuesta']." AND t.tipo = 'P1'";
	$Criteria->group = "p";
	$Criteria->order = "sum(ponderacion) DESC";
	$clientes = $model->findAll($Criteria);

	$ensenas = array();
	$temp = array();
	$principales = array();
	$totales = array();
	$totalesPrev = array();
	$i = 0;
	foreach($clientes as $cliente){
		if($cliente->p0->observ!=null && $cliente->p0->observ != "NS/NC"){
			array_push($principales, 100*$cliente->ponderacion/$total);
			array_push($ensenas, $cliente->p0->observ);
			array_push($temp, $cliente->p);
			$i++;
		}
		if($i == 10)
			break;
	}

	foreach($temp as $t){
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(ponderacion) as ponderacion";
		$Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND p = " . $t;
		$clientes2 = $model->find($Criteria);
		array_push($totales, 100*$clientes2->ponderacion/$total);
	}

	$totalesRep = array();
	for($k = 0; $k<count($totales); $k++){
		array_push($totalesRep, $totales[$k]-$principales[$k]);
	}
		
	//CLIENTES TOTALES AÑO ANTERIOR
	$model = new TblIdEncuesta;
	$Criteria = new CDbCriteria();
	$Criteria->condition = "id_encuesta = ".$_GET['id_encuesta'];
	$c = $model->find($Criteria);
	$idAlcampo = $c->id_alcampo;
	$fecha = $c->fecha_encuesta;


	$model = new TblIdEncuesta;
	$Criteria = new CDbCriteria();
	$Criteria->condition = "id_alcampo = ".$idAlcampo . " AND id_encuesta <> ".$_GET['id_encuesta']." AND fecha_encuesta < '" . $fecha . "'";
	$Criteria->order = "fecha_encuesta";
	$c = $model->find($Criteria);

	$oldEncuesta = -999;
	$totalOld = -999;
	if($c){
		$oldEncuesta = $c->id_encuesta;
		$model=new TblEncuestaInfluencia;
		$Criteria = new CDbCriteria();
		$Criteria->select = "sum(ponderacion) as ponderacion";
		$Criteria->condition = "id_encuesta = " . $oldEncuesta . " AND tipo = 'P1'";
		$total1 = $model->find($Criteria);
		$totalOld = $total1->ponderacion;
		
		foreach($temp as $t){
			$Criteria = new CDbCriteria();
			$Criteria->select = "sum(ponderacion) as ponderacion";
			$Criteria->condition = "id_encuesta = ".$oldEncuesta." AND p = " . $t;
			$clientes2 = $model->find($Criteria);
			array_push($totalesPrev, 100*$clientes2->ponderacion/$totalOld);
		}
		
	}
		
	$MyData = new pData();  
	$MyData->addPoints($principales,"Clientes principales");
	$MyData->addPoints($totalesRep,"Clientes totales");
	if(count($totalesPrev)>0)
		$MyData->addPoints($totalesPrev,"Clientes totales año anterior");
	//else
	//	$MyData->addPoints(array(),"Clientes totales año anterior");
	//$MyData->addPoints(array(2,7,5,18,19,22),"Frontend #3");
	$MyData->setAxisName(0,"Clientes (%)");
	$MyData->addPoints($ensenas,"Labels");
	$MyData->setSerieDescription("Labels","Enseñas");
	$MyData->setAbscissa("Labels");
	$MyData->setPalette("Clientes totales",array("R"=>153,"G"=>0,"B"=>0));
	$MyData->setPalette("Clientes principales",array("R"=>255,"G"=>153,"B"=>153));
	$MyData->setPalette("Clientes totales año anterior",array("R"=>0,"G"=>0,"B"=>0));
	 
	/* Create the pChart object */
	$myPicture = new pImage(980,420,$MyData);
	//$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
	//$myPicture->drawGradientArea(0,0,700,230,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
	 
	/* Set the default font properties */
	$myPicture->setFontProperties(array("FontName"=>FONT_PATH."/verdana.ttf","FontSize"=>11)); 
	 $myPicture->drawText(300,52,"Clientes en la zona de influencia del híper",array("FontSize"=>14,"Align"=>TEXT_ALIGN_BOTTOMLEFT)); 
	 
	/* Draw the scale and the chart */
	$MyData->setSerieDrawable("Clientes totales año anterior",FALSE); 
	$myPicture->setGraphArea(65,20,952,224);
	$myPicture->drawScale(array("DrawSubTicks"=>TRUE,"Mode"=>SCALE_MODE_ADDALL_START0, 'LabelRotation'=>25));
	$myPicture->setShadow(FALSE);
	$myPicture->drawStackedBarChart(array("Surrounding"=>-15,"InnerSurrounding"=>15));
	 
	 /* Draw the line and plot chart */ 
	 $MyData->setSerieDrawable("Clientes totales año anterior",TRUE); 
	 $MyData->setSerieDrawable("Clientes totales",FALSE); 
	 $MyData->setSerieDrawable("Clientes principales",FALSE); 
	 //$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
	 $myPicture->drawSplineChart(); 

	 $myPicture->setShadow(FALSE); 
	 $myPicture->drawPlotChart(array("PlotSize"=>2,"PlotBorder"=>TRUE,"BorderSize"=>2,"BorderAlpha"=>5)); 

	 
	/* Write the chart legend */
	//$myPicture->drawLegend(480,210,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

	 $ran = rand ();
	 $t1 = '/var/tmp/t1_'.$ran.'.jpg';
	 $myPicture->render($t1); 

	 $pdf->Ln(15);
	 
	 $pdf->SetX(20);
	 $pdf->Image($t1,$pdf->GetX(),$pdf->GetY(),163,70);
	 
	 $pdf->Ln(70);
	 
	$pdf-> SetFillColor(153, 0, 0);
	$pdf->Rect(40, $pdf->getY()+3, 7, 4, 'F');
	$pdf->Text(49, $pdf->getY()+6, "Clientes totales");

	$pdf-> SetFillColor(255, 153, 153);
	$pdf->Rect(80, $pdf->getY()+3, 7, 4, 'F');
	$pdf->Text(89, $pdf->getY()+6, "Clientes principales");

	$pdf->Line(120, $pdf->getY()+5, 129, $pdf->getY()+5);
	$pdf->Text(129, $pdf->getY()+6, "Clientes totales encuesta anterior");

	$pdf->Rect(30, $pdf->getY(), 155, 10);
	 
	 // TABLA CON LA INFORMACIÓN DE ALCAMPO
	 
	 //$total -> Total encuesta actual
	 //$oldEncuesta -> Encuesta anterior (si -999, no hay encuesta anterior)
	 //$totalOld -> Total encuesta anterior (si -999, no hay encuesta anterior)
	 
	 //LOC ZONA PRINCIPAL
	 
	 $model = new TblZonaInfluencia();
	 $Criteria = new CDbCriteria();
	 $Criteria->condition = "id_hiper_alcampo = ".$_GET['hiper']." AND id_tipo_zi = 1";
	 $zp = $model->findAll($Criteria);
	 $zonasp = array();
	foreach($zp as $z){
		array_push($zonasp, "'".$z->loc."'");
	}
	 //LOC ZONA INTERMEDIA
	 $Criteria = new CDbCriteria();
	 $Criteria->condition = "id_hiper_alcampo = ".$_GET['hiper']." AND id_tipo_zi = 2";
	 $zp = $model->findAll($Criteria);
	 $zonasi = array();
	foreach($zp as $z){
		array_push($zonasi, "'".$z->loc."'");
	}
	 //LOC RESTO
	 $Criteria = new CDbCriteria();
	 $Criteria->condition = "id_hiper_alcampo = ".$_GET['hiper']." AND id_tipo_zi = 3";
	 $zp = $model->findAll($Criteria);
	 $zonasr = array();
	foreach($zp as $z){
		array_push($zonasr, "'".$z->loc."'");
	}

	if(strlen($idAlcampo)==1){
		$idAlcampo = "0".$idAlcampo;
	}
	//ENCUESTA ACTUAL
	 $model = new TblEncuestaInfluencia();
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasp).")";
	 $c = $model->find($Criteria);
	 $total = $c->ponderacion;
	 error_log("id_encuesta = ".$_GET['id_encuesta']." AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasp).")");
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND p = 10".$idAlcampo . " AND loc_mkt IN (".implode(",", $zonasp).")";
	 $c = $model->find($Criteria);
	 $ctp = 0;
	 if($total>0)
		$ctp = 100*$c->ponderacion/$total;
	 
	 $model = new TblEncuestaInfluencia();
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND p = 10".$idAlcampo . " AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasp).")";
	 $c = $model->find($Criteria);
	 $cpp = 0;
	 if($total>0)
		$cpp = 100*$c->ponderacion/$total;

	 $model = new TblEncuestaInfluencia();
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasi).")";
	 $c = $model->find($Criteria);
	 $total = $c->ponderacion; 

	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND p = 10".$idAlcampo . " AND loc_mkt IN (".implode(",", $zonasi).")";
	 $c = $model->find($Criteria);
	 $cti = 0;
	 if($total>0)
		$cti = 100*$c->ponderacion/$total;
	 
	 $model = new TblEncuestaInfluencia();
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND p = 10".$idAlcampo . " AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasi).")";
	 $c = $model->find($Criteria);
	 $cpi = 0;
	 if($total>0)
		$cpi = 100*$c->ponderacion/$total;

	 $model = new TblEncuestaInfluencia();
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasr).")";
	 $c = $model->find($Criteria);
	 $total = $c->ponderacion;
	 
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND p = 10".$idAlcampo . " AND loc_mkt IN (".implode(",", $zonasr).")";
	 $c = $model->find($Criteria);
	 $ctr = 0;
	 if($total>0)
		$ctr = 100*$c->ponderacion/$total;
	 
	 $model = new TblEncuestaInfluencia();
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND p = 10".$idAlcampo . " AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasr).")";
	 $c = $model->find($Criteria);
	 $cpr = 0;
	 if($total>0)
		$cpr = 100*$c->ponderacion/$total;
	 
	 $model = new TblEncuestaInfluencia();
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND tipo = 'P1'";
	 $c = $model->find($Criteria);
	 $total = $c->ponderacion;
	 
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND p = 10".$idAlcampo;
	 $c = $model->find($Criteria);
	 $cttotal = 100*$c->ponderacion/$total;
	 
	 $model = new TblEncuestaInfluencia();
	 $Criteria = new CDbCriteria();
	 $Criteria->select = "sum(ponderacion) as ponderacion";
	 $Criteria->condition = "id_encuesta = ".$_GET['id_encuesta']." AND p = 10".$idAlcampo . " AND tipo = 'P1'";
	 $c = $model->find($Criteria);
	 $cptotal = 100*$c->ponderacion/$total;

	//ENCUESTA ANTERIOR
	$ctpOld = -999;
	$cppOld = -999;
	$ctiOld = -999;
	$cpiOld = -999;
	$ctrOld = -999;
	$cprOld = -999;
	$cptotalOld = -999;
	$cttotalOld = -999;

	if($oldEncuesta!=-999){
		 $model = new TblEncuestaInfluencia();
		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasp).")";
		 $c = $model->find($Criteria);
		 $totalOld = $c->ponderacion;
		 
		  $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND p = 10".$idAlcampo . " AND loc_mkt IN (".implode(",", $zonasp).")";
		 $c = $model->find($Criteria);
		 if($totalOld >0)
			$ctpOld = 100*$c->ponderacion/$totalOld;
		 else
			$ctpOld = 0;
		 
		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND p = 10".$idAlcampo . " AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasp).")";
		 $c = $model->find($Criteria);
		 if($totalOld >0)
			$cppOld = 100*$c->ponderacion/$totalOld;
		 else
			$cppOld = 0;
		 
		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasi).")";
		 $c = $model->find($Criteria);
		 $totalOld = $c->ponderacion;
		 
		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND p = 10".$idAlcampo . " AND loc_mkt IN (".implode(",", $zonasi).")";
		 $c = $model->find($Criteria);
		 if($totalOld >0)
			$ctiOld = 100*$c->ponderacion/$totalOld;
		 else
			$ctiOld = 0;
		 
		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND p = 10".$idAlcampo . " AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasi).")";
		 $c = $model->find($Criteria);
		 if($totalOld >0)
			$cpiOld = 100*$c->ponderacion/$totalOld;
		 else
			$ctiOld = 0;

		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasr).")";
		 $c = $model->find($Criteria);
		 $totalOld = $c->ponderacion;
		 
		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND p = 10".$idAlcampo . " AND loc_mkt IN (".implode(",", $zonasr).")";
		 $c = $model->find($Criteria);
		 if($totalOld >0)
			$ctrOld = 100*$c->ponderacion/$totalOld;
		  else
			$ctrOld = 0;
		
		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND p = 10".$idAlcampo . " AND tipo = 'P1' AND loc_mkt IN (".implode(",", $zonasr).")";
		 $c = $model->find($Criteria);
		 if($totalOld >0)
			$cprOld = 100*$c->ponderacion/$totalOld;
		 else
			$ctrOld = 0;
		
		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND tipo = 'P1'";
		 $c = $model->find($Criteria);
		 $totalOld = $c->ponderacion;
		 
		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND p = 10".$idAlcampo;
		 $c = $model->find($Criteria);
		 if($totalOld >0)
			$cttotalOld = 100*$c->ponderacion/$totalOld;
		 else
			$cttotalOld = 0;
		
		 $Criteria = new CDbCriteria();
		 $Criteria->select = "sum(ponderacion) as ponderacion";
		 $Criteria->condition = "id_encuesta = ".$oldEncuesta." AND p = 10".$idAlcampo . " AND tipo = 'P1'";
		 $c = $model->find($Criteria);
		 if($totalOld >0)
			$cptotalOld = 100*$c->ponderacion/$totalOld;
		 else
			$cttotalOld = 0;
	}
	 

	 $columns = array();
	 
	$col = array();

	$col[] = array('text' => "", 'width' => '18', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => '');
	$col[] = array('text' => "Zona principal", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => "Zona Intermedia", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => "Resto", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => "Total", 'width' => '40', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$columns[] = $col;	  

	$col = array();
	$col[] = array('text' => "", 'width' => '18', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => '');
	$col[] = array('text' => "Encuesta actual", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => "Dif. Encuesta anterior", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => "Encuesta actual", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => "Dif. Encuesta anterior", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => "Encuesta actual", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => "Dif. Encuesta anterior", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => "Encuesta actual", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => "Dif. Encuesta anterior", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$columns[] = $col;	  
		
	$col = array();
	$col[] = array('text' => "Clientes principales", 'width' => '18', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => number_format($cpp, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	if($cppOld == -999)
		$col[] = array('text' => "--", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cpp - $cppOld > 0)
		$col[] = array('text' => "+".number_format($cpp - $cppOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,255,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cpp - $cppOld < 0)
		$col[] = array('text' => number_format($cpp - $cppOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '255,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => number_format($cpi, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	if($cpiOld == -999)
		$col[] = array('text' => "--", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cpi - $cpiOld > 0)
		$col[] = array('text' => "+".number_format($cpi - $cpiOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,255,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cpi - $cpiOld < 0)
		$col[] = array('text' => number_format($cpi - $cpiOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '255,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => number_format($cpr, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	if($cprOld == -999)
		$col[] = array('text' => "--", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cpr - $cprOld > 0)
		$col[] = array('text' => "+".number_format($cpr - $cprOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,255,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cpr - $cprOld < 0)
		$col[] = array('text' => number_format($cpr - $cprOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '255,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => number_format($cptotal, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	if($cptotalOld == -999)
		$col[] = array('text' => "--", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cptotal - $cptotalOld > 0)
		$col[] = array('text' => "+".number_format($cptotal - $cptotalOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,255,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cptotal - $cptotalOld < 0)
		$col[] = array('text' => number_format($cptotal - $cptotalOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '255,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$columns[] = $col;	  
		
	 $col = array();
	$col[] = array('text' => "Clientes totales", 'width' => '18', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '224,224,224', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	$col[] = array('text' => number_format($ctp,1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	if($ctpOld == -999)
		$col[] = array('text' => "--", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($ctp - $ctpOld > 0)
		$col[] = array('text' => "+".number_format($ctp - $ctpOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,255,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($ctp - $ctpOld < 0)
		$col[] = array('text' => number_format($ctp - $ctpOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '255,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	$col[] = array('text' => number_format($cti,1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	if($ctiOld == -999)
		$col[] = array('text' => "--", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cti - $ctiOld > 0)
		$col[] = array('text' =>  "+".number_format($cti - $ctiOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,255,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cti - $ctiOld < 0)
		$col[] = array('text' =>number_format($cti - $ctiOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '255,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');   
	$col[] = array('text' => number_format($ctr,1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	if($ctrOld == -999)
		$col[] = array('text' => "--", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($ctr - $ctrOld > 0)
		$col[] = array('text' =>  "+".number_format($ctr - $ctrOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,255,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($ctr - $ctrOld < 0)
		$col[] = array('text' =>number_format($ctr - $ctrOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '255,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');   
	$col[] = array('text' => number_format($cttotal,1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
	if($ctrOld == -999)
		$col[] = array('text' => "--", 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cttotal - $cttotalOld > 0)
		$col[] = array('text' =>  "+".number_format($cttotal - $cttotalOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,255,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');  
	else if ($cttotal - $cttotalOld < 0)
		$col[] = array('text' =>number_format($cttotal - $cttotalOld, 1), 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '255,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');   
	$columns[] = $col;	  
		
	 
		
	$pdf->Ln(15) ;
	$pdf->Cell(190,5, "Clientes totales y principales de ALCAMPO " . utf8_decode($hiper->nombre), 0, 0 ,'C');
	$pdf->Ln(10) ;
	$pdf->SetLeftMargin(20);
	$pdf->WriteTable($columns);
	$pdf->SetLeftMargin(20);

	$pdf->SetTextColor(0,0,0);
 }
	$pdf->Output();
	
?>