<?php
require('/var/www/fpdf17/fpdf.php');

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		if($this->PageNo() != 1){
			// Logo
			//$this->Image('images/sigma_icon.png',10,8,33);
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
		//$this->Cell(0,5,'Pág. '.$this->PageNo().'/{nb}',0,0,'C');
		$this->Cell(0,5,'/{nb}',0,0,'C');
		$this->Ln();
		$this->Cell(0,5,'Informe generado automáticamente ' . date("d-m-Y") . " (ALCAMPO: ".$_GET['id_alcampo'] . " ENCUESTA: " . $_GET['id_encuesta'] . ")" ,0,0,'C');
		$this->SetDrawColor(153,0,0);
		$this->Line(8,280, 200, 280);
	}
}

//OLD ENCUESTA

$old_encuesta= -1;
$sql = "select id_encuesta from tbl_id_encuesta where id_alcampo = ".$_GET['id_alcampo']." AND id_encuesta <> ".$_GET['id_encuesta']." order by fecha_encuesta DESC";
$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
$result = array();
$encuesta = $dataProvider->getData();
//$codigo = json_encode($codigo);
if(count($encuesta)>0){
	$old_encuesta = $encuesta[0]['id_encuesta'];//['codigo'];
}

//CODIGO MKT
$sql = "select codigo from tbl_codigo_mkt, tbl_hiper_alcampo where nielssen = cod_nielssen and id_hiper_alcampo = ".$_GET['id_alcampo'];
$dataProvider=new CSqlDataProvider($sql, array(
			'pagination'=>false
		));
$result = array();
$codigo = $dataProvider->getData();
//$codigo = json_encode($codigo);
$codigo_mkt = $codigo[0]['codigo'];//['codigo'];


$pdf = new PDF();
$pdf->SetAuthor("Argongra");

$pdf->AliasNbPages();
$pdf->AddPage("L");

$map = ms_newMapObj("c:\\datos/sigma/maps/sigma_ZI.map");
$map->selectOutputFormat('png');
//$map->setSize(1050, 504);
$lyr = $map->getLayerByName("ZI");
$lyr->data = "geom FROM (SELECT 
		  geo_zona_influencia.geom, 
		  geo_zona_influencia.gid,
		  id_tipo_zi,
		  descripcion description
		FROM
		  geo_zona_influencia, tbl_zona_influencia
		WHERE 
		   geo_zona_influencia.loc = tbl_zona_influencia.loc AND id_hiper_alcampo = ".$_GET['id_alcampo'].")
		as subquery USING UNIQUE gid USING srid=25830";
//$lyr->set('classitem', 'id_tipo_zi');

//$lyr->updateFromString('LAYER CLASS EXPRESSION ([id_tipo_zi] = 1) STYLE COLOR 255 255 0 END END END');
/*$class = ms_newClassObj($lyr);


//$class = $lyr->getClass(0);
$class->set('name', '""');
$class->setExpression("[id_tipo_zi] = 2");
$novoestilo = ms_newStyleObj($class);
$ncor = $novoestilo->color;
$ncor->setrgb(255, 0, 0);*/
$lyr->set('status',MS_ON);

//CALCULAR EXTENT
if($_GET['z_prin'] == -1){
	$map->setExtent($lyr->getExtent()->minx, $lyr->getExtent()->miny, $lyr->getExtent()->maxx, $lyr->getExtent()->maxy);
}else{
	$sql = "SELECT ST_Extent(ST_Buffer(geom, ".$_GET['z_prin'].")) as geom FROM geo_nielssen where codigo_nielssen in (select cod_nielssen from tbl_hiper_alcampo where id_hiper_alcampo = ".$_GET['id_alcampo'] .")";
	$dataProvider=new CSqlDataProvider($sql, array(
				'pagination'=>false
			));
	$result = array();
	$extent = $dataProvider->getData();
	$extent = $extent[0]['geom'];//['codigo'];
	$extent = str_replace("BOX(", "", $extent);
	$extent = str_replace(")", "", $extent);
	$bordes = explode(",", $extent);
	$minimos = explode(" ",$bordes[0]);
	$maximos = explode(" ",$bordes[1]);

	$map->setExtent($minimos[0], $minimos[1], $maximos[0], $maximos[1]);
}

$map->setSize(1060, 750);

$lyr = $map->getLayerByName('Ensenas');
$lyr->set('status', MS_ON);

// $image=$map->draw();
//    $image_url=$image->saveWebImage();
$ref = $map->draw();
$ran = rand ();
$t1 = '/var/tmp/t1_'.$ran.'.png';

$ref->saveImage($t1);

$pdf->Ln(10);
$pdf->SetX(30);
$pdf->Image($t1,10,10,277,190);

//LEYENDA
/*
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',10);
$pdf->Text(220, 50,  'ZONA PRINCIPAL');
$pdf->Text(220, 60,  'ZONA INTERMEDIA');
$pdf->Text(220, 70,  'ZONA RESTO');
$pdf->SetFillColor(150, 200, 240);
$pdf->Rect(200, 46, 15, 5, 'F');
$pdf->SetFillColor(255, 100, 100);
$pdf->Rect(200, 56, 15, 5, 'F');
$pdf->SetFillColor(135, 214, 135);
$pdf->Rect(200, 66, 15, 5, 'F');
*/

//----------------------------------------------------- ZONA PRINCIPAL -----------------------------------------------------
$pdf->AddPage("L");

$lyr = $map->getLayerByName("ZI");
$lyr->set('status', MS_OFF);
crearCapa($map, $old_encuesta, $codigo_mkt, $pdf, 1, "ZONA_PRINCIPAL", $_GET['zp']);

/*
//LEYENDA
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0, 0, 204);
$pdf->Text(30, 50, 'Clientes totales');
$pdf->SetTextColor(51, 153, 255);
$pdf->Text(30, 55,  'Clientes principales');
$pdf->SetTextColor(0, 0, 0);
$pdf->Text(30, 60,  'Evolución (puntos porcentuales)');
*/
//----------------------------------------------------- ZONA SECUNDARIA -----------------------------------------------------
$pdf->AddPage("L");

$map->setSize(750, 750);
$lyr = $map->getLayerByName("ZI");
$lyr->set('status', MS_OFF);
$layers = $map->getAllLayerNames();
for($i = 0; $i < count($layers); $i++){
	$name = $layers[$i];
	if($name == "ZONA_PRINCIPAL"){
		$l = $map->getLayer($i);
		$l->set('status', MS_OFF);
	}
}
crearCapa($map, $old_encuesta, $codigo_mkt, $pdf, 2, "ZONA_SECUNDARIA", $_GET['zs']);

/*
//LEYENDA
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(208, 0, 0);
$pdf->Text(30, 50,  'Clientes totales');
$pdf->SetTextColor(255, 133, 133);
$pdf->SetFont('Arial','B',8);
$pdf->Text(30, 55,  'Clientes principales');
$pdf->SetTextColor(0, 0, 0);
$pdf->Text(30, 60,  'Evolución (puntos porcentuales)');
*/
//----------------------------------------------------- ZONA TERCICARIA -----------------------------------------------------

$pdf->AddPage("L");

//$map3 = ms_newMapObj("c:\\datos/sigma/maps/sigma_ZI3.map");
$layers = $map->getAllLayerNames();
for($i = 0; $i < count($layers); $i++){
	$name = $layers[$i];
	if($name == "ZONA_SECUNDARIA"){
		$l = $map->getLayer($i);
		$l->set('status', MS_OFF);
	}
}
crearCapa($map, $old_encuesta, $codigo_mkt, $pdf, 3, "ZONA_TERCIARIA", $_GET['zr']);
/*
//LEYENDA
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(71, 137, 87);
$pdf->Text(30, 50,  'Clientes totales');
$pdf->SetTextColor(124, 210, 140);
$pdf->SetFont('Arial','B',8);
$pdf->Text(30, 55,  'Clientes principales');
$pdf->SetTextColor(0, 0, 0);
$pdf->Text(30, 60,  'Evolución (puntos porcentuales)');
*/
$pdf->Output();

function crearCapa($map, $old_encuesta, $codigo_mkt, $pdf, $tipo_zona, $zona, $zoom){
	//LOCS
	$sql = "SELECT loc FROM tbl_zona_influencia WHERE id_hiper_alcampo = ".$_GET["id_alcampo"]." AND id_tipo_zi = " . $tipo_zona;
	$dataProvider=new CSqlDataProvider($sql, array(
				'pagination'=>false
			));
	$result = array();
	$locs = $dataProvider->getData();
	$id_loc = "";
	$minx = 0;
	$maxx = 0;
	$miny = 0;
	$maxy = 0;
	$id_loc_total = '';
	foreach($locs as $loc){
		$id_loc .= "'".$loc['loc']."',";
		$id_loc_total .= "'".$loc['loc']."',";


		$id_loc = substr($id_loc, 0, strlen($id_loc)-1);

		//ENCUESTA ANTERIOR
		$total_old = "--";
		$clientes_total_old = "--";
		$clientes_principal_old = "--";
		
		if($old_encuesta != -1){
			//TOTAL
			$sql = "SELECT sum(ponderacion) as pond FROM tbl_encuesta_influencia WHERE id_encuesta = ".$old_encuesta." AND tipo = 'P1' AND loc_mkt IN (".$id_loc.")";
			$dataProvider=new CSqlDataProvider($sql, array(
						'pagination'=>false
					));
			$result = array();
			$total_old = $dataProvider->getData();
			//$codigo = json_encode($codigo);
			$total_old = $total_old[0]['pond'];//['codigo'];
			
			$sql = "SELECT round(100*sum(ponderacion)/".$total_old.", 1) as pond
				FROM tbl_encuesta_influencia, geo_zona_influencia 
				WHERE id_encuesta = ".$old_encuesta." AND p = ".$codigo_mkt."  AND loc_mkt = loc AND loc_mkt IN (".$id_loc.") ";
				
			$dataProvider=new CSqlDataProvider($sql, array(
						'pagination'=>false
					));
			$result = array();
			$clientes_total_old_ = $dataProvider->getData();
			//$codigo = json_encode($codigo);
			if(count($clientes_total_old_)>0)
				$clientes_total_old = $clientes_total_old_[0]['pond'];//['codigo'];
			
			$sql = "SELECT round(100*sum(ponderacion)/".$total_old.", 1) as pond
				FROM tbl_encuesta_influencia, geo_zona_influencia 
				WHERE id_encuesta = ".$old_encuesta." AND p = ".$codigo_mkt."  AND loc_mkt = loc AND tipo = 'P1' AND loc_mkt IN (".$id_loc.") ";
			
			$dataProvider=new CSqlDataProvider($sql, array(
						'pagination'=>false
					));
			$result = array();
			$clientes_principal_old_ = $dataProvider->getData();
			//$codigo = json_encode($codigo);
			if(count($clientes_principal_old_)>0)
				$clientes_principal_old = $clientes_principal_old_[0]['pond'];//['codigo'];
		}
		
		//ENCUESTA ACTUAL
		$total = "--";
		$clientes_total = "--";
		$clientes_principal = "--";
		
		//TOTAL
		$sql = "SELECT sum(ponderacion) as pond FROM tbl_encuesta_influencia WHERE id_encuesta = ".$_GET['id_encuesta']." AND tipo = 'P1' AND loc_mkt IN (".$id_loc.")";
		$dataProvider=new CSqlDataProvider($sql, array(
					'pagination'=>false
				));error_log($id_loc . " " .$sql); 
		$result = array();
		$total_old_ = $dataProvider->getData();
		//$codigo = json_encode($codigo);
		$total = $total_old_[0]['pond'];//['codigo'];
		
		$sql = "SELECT round(100*sum(ponderacion)/".$total.", 1) as pond
			FROM tbl_encuesta_influencia, geo_zona_influencia 
			WHERE id_encuesta = ".$_GET['id_encuesta']." 
			AND p = ".$codigo_mkt."  
			AND loc_mkt = loc AND loc_mkt IN (".$id_loc.") ";
			
		$dataProvider=new CSqlDataProvider($sql, array(
					'pagination'=>false
				));
		$result = array();
		$clientes_total_old_ = $dataProvider->getData();
		//$codigo = json_encode($codigo);
		if(count($clientes_total_old_)>0)
			$clientes_total = $clientes_total_old_[0]['pond'];//['codigo'];
		
		$sql = "SELECT round(100*sum(ponderacion)/".$total.", 1) as pond
			FROM tbl_encuesta_influencia, geo_zona_influencia 
			WHERE id_encuesta = ".$_GET['id_encuesta']." AND p = ".$codigo_mkt."  AND loc_mkt = loc AND tipo = 'P1' AND loc_mkt IN (".$id_loc.") ";
		
		$dataProvider=new CSqlDataProvider($sql, array(
					'pagination'=>false
				));
		$result = array();
		$clientes_principal_old_ = $dataProvider->getData();
		//$codigo = json_encode($codigo);
		if(count($clientes_principal_old_)>0)
			$clientes_principal = $clientes_principal_old_[0]['pond'];//['codigo'];
		if(gettype($clientes_principal) == "NULL" )
			$clientes_principal = "--";
		error_log (gettype($clientes_principal));
		//CREAR LA CAPA
		$l = $map->getLayerByName($zona);
		
		$lyr2 = ms_newLayerObj($map, $l);
		$lyr2->set('name', $zona);
		$variacion_principal = "--";
		if($clientes_principal != "--" && $clientes_principal_old != "--"){
			$variacion_principal = $clientes_principal-$clientes_principal_old;
		}else if($clientes_principal == "--" && $clientes_principal_old != "--"){
			$variacion_principal =-$clientes_principal_old;
		}
		
		$variacion_total = "--";
		if($clientes_total != "--" && $clientes_total_old != "--"){
			$variacion_total = $clientes_total-$clientes_total_old;
		}else if ($clientes_total == "--" && $clientes_total_old != "--")
			$variacion_total = -$clientes_total_old;
		
		$lyr2->data = "geom FROM (SELECT gid, descripcion, geom, '".$clientes_principal."' as pond, '".$clientes_total."' as totales, '".$variacion_total."' as variacion_total, '".$variacion_principal."' as variacion_principal FROM geo_zona_influencia WHERE loc = (".$id_loc.")) as subquery USING UNIQUE gid USING srid=25830";
		//error_log("SELECT gid, descripcion, geom, ".$clientes_principal." as pond, ".$clientes_total." as totales, '".$variacion_total."' as variacion_total, '".$variacion_principal."' as variacion_principal FROM geo_zona_influencia WHERE loc = (".$id_loc.")");
		//CALCULAR EXTENT
		
		if($zoom == -1){
			
			//error_log($lyr2->getExtent()->minx);
			if($minx == 0)
				$minx = $lyr2->getExtent()->minx;
			if($lyr2->getExtent()->minx < $minx){
				$minx = $lyr2->getExtent()->minx;
			}
			if($miny == 0)
				$miny = $lyr2->getExtent()->miny;
			if($lyr2->getExtent()->miny < $miny){
				$miny = $lyr2->getExtent()->miny;
			}
			if($maxx == 0)
				$maxx = $lyr2->getExtent()->maxx;
			if($lyr2->getExtent()->maxx > $maxx){
				$maxx = $lyr2->getExtent()->maxx;
			}
			if($maxy == 0)
				$maxy = $lyr2->getExtent()->maxy;
			if($lyr2->getExtent()->maxy > $maxy){
				$maxy = $lyr2->getExtent()->maxy;
			}
		
		}else{
			$sql = "SELECT ST_Extent(ST_Buffer(geom, ".$zoom.")) as geom FROM geo_nielssen where codigo_nielssen in (select cod_nielssen from tbl_hiper_alcampo where id_hiper_alcampo = ".$_GET['id_alcampo'] .")";
			$dataProvider=new CSqlDataProvider($sql, array(
						'pagination'=>false
					));
			$result = array();
			$extent = $dataProvider->getData();
			$extent = $extent[0]['geom'];//['codigo'];
			$extent = str_replace("BOX(", "", $extent);
			$extent = str_replace(")", "", $extent);
			$bordes = explode(",", $extent);
			$minimos = explode(" ",$bordes[0]);
			$maximos = explode(" ",$bordes[1]);
			$minx=$minimos[0];
			$miny = $minimos[1];
			$maxx=$maximos[0];
			$maxy = $maximos[1];
			
		}
		$lyr2->set('status',MS_ON);
		//$lyr2->data = "geom FROM (SELECT gid, descripcion, geom, ".$clientes_principal." as pond, ".$clientes_total." as totales, '".$variacion_total."' as variacion_total, '".$variacion_principal."' as variacion_principal, p, loc_mkt FROM tbl_encuesta_influencia, geo_zona_influencia WHERE id_encuesta = ".$_GET['id_encuesta']." AND p = ".$codigo_mkt."  AND loc_mkt = loc AND tipo = 'P1' AND loc_mkt IN (".$id_loc.") GROUP BY p, loc_mkt, geom, gid) as subquery USING UNIQUE gid USING srid=25830";
		
		/*
		//TOTAL
		$sql = "SELECT sum(ponderacion) as pond FROM tbl_encuesta_influencia WHERE id_encuesta = ".$_GET['id_encuesta']." AND tipo = 'P1' AND loc_mkt IN (".$id_loc.")";
		$dataProvider=new CSqlDataProvider($sql, array(
					'pagination'=>false
				));
		$result = array();
		$total = $dataProvider->getData();
		//$codigo = json_encode($codigo);
		$total = $total[0]['pond'];//['codigo'];
		
		$sql = "SELECT round(100*sum(ponderacion)/".$total.", 1) as pond
			FROM tbl_encuesta_influencia, geo_zona_influencia 
			WHERE id_encuesta = ".$_GET['id_encuesta']." AND p = ".$codigo_mkt."  AND loc_mkt = loc AND loc_mkt IN (".$id_loc.") ";
			
		$dataProvider=new CSqlDataProvider($sql, array(
					'pagination'=>false
				));
		$result = array();
		$clientes_total = $dataProvider->getData();
		//$codigo = json_encode($codigo);
		$clientes_total = $clientes_total[0]['pond'];//['codigo'];

		$l = $map->getLayerByName($zona);
		
		$lyr2 = ms_newLayerObj($map, $l);
		$lyr2->set('name', $zona);
		$u = 1;
		if($clientes_total_old == "--"){
			$lyr2->data = "geom FROM (SELECT gid, descripcion, geom, round(100*sum(ponderacion)/".$total." , 1) as pond, ".$clientes_total." as totales, '--' as variacion_total, '--' as variacion_principal, p, loc_mkt FROM tbl_encuesta_influencia, geo_zona_influencia WHERE id_encuesta = ".$_GET['id_encuesta']." AND p = ".$codigo_mkt."  AND loc_mkt = loc AND tipo = 'P1' AND loc_mkt IN (".$id_loc.") GROUP BY p, loc_mkt, geom, gid)
				as subquery USING UNIQUE gid USING srid=25830";
		}else{
			$u = 2;
			$lyr2->data = "geom FROM (SELECT gid, descripcion, geom, round(100*sum(ponderacion)/".$total." , 1) as pond, ".$clientes_total." as totales, '".($clientes_total - $clientes_total_old)."' as variacion_total, round(100*sum(ponderacion)/".$total." , 1) - ".$clientes_principal_old." as variacion_principal, p, loc_mkt FROM tbl_encuesta_influencia, geo_zona_influencia WHERE id_encuesta = ".$_GET['id_encuesta']." AND p = ".$codigo_mkt."  AND loc_mkt = loc AND tipo = 'P1' AND loc_mkt IN (".$id_loc.") GROUP BY p, loc_mkt, geom, gid)
				as subquery USING UNIQUE gid USING srid=25830";
				
		}
		//CHECK LAYER
		$sql = "SELECT gid, geom, round(100*sum(ponderacion)/".$total." , 1) as pond, p, loc_mkt FROM tbl_encuesta_influencia, geo_zona_influencia WHERE id_encuesta = ".$_GET['id_encuesta']." AND p = ".$codigo_mkt."  AND loc_mkt = loc AND tipo = 'P1' AND loc_mkt IN (".$id_loc.") GROUP BY p, loc_mkt, geom, gid";
		if($u ==2){
			$sql = "SELECT gid, descripcion, geom, round(100*sum(ponderacion)/".$total." , 1) as pond, ".$clientes_total." as totales, '".($clientes_total - $clientes_total_old)."' as variacion_total, round(100*sum(ponderacion)/".$total." , 1) - ".$clientes_principal_old." as variacion_principal, p, loc_mkt FROM tbl_encuesta_influencia, geo_zona_influencia WHERE id_encuesta = ".$_GET['id_encuesta']." AND p = ".$codigo_mkt."  AND loc_mkt = loc AND tipo = 'P1' AND loc_mkt IN (".$id_loc.") GROUP BY p, loc_mkt, geom, gid";
		}
		
		if(is_numeric ($clientes_principal_old )){
			$dataProvider=new CSqlDataProvider($sql, array(
						'pagination'=>false
					));
			$result = array();
			$capa = $dataProvider->getData();
			if(count($capa)==0){
				if($clientes_total_old == "--"){
					$lyr2->data = "geom FROM (SELECT gid, descripcion, geom, 0 as pond, 0 as totales, '--' as variacion_total, '--' as variacion_principal FROM geo_zona_influencia WHERE loc IN (".$id_loc.") )
						as subquery USING UNIQUE gid USING srid=25830";
				}else{
					$lyr2->data = "geom FROM (SELECT gid, descripcion, geom, 0 as pond, 0 as totales, '--' as variacion_total, '--' as variacion_principal FROM geo_zona_influencia WHERE loc IN (".$id_loc.") )
						as subquery USING UNIQUE gid USING srid=25830";
						
				}
			}
		}else{
			$lyr2->data = "geom FROM (SELECT gid, descripcion, geom, 0 as pond, 0 as totales, '--' as variacion_total, '--' as variacion_principal FROM geo_zona_influencia WHERE loc IN (".$id_loc.") )
						as subquery USING UNIQUE gid USING srid=25830";
		}
		$lyr2->set('status',MS_ON);
		
		//CALCULAR EXTENT
		
		if($zoom == -1){
			
			//error_log($lyr2->getExtent()->minx);
			if($minx == 0)
				$minx = $lyr2->getExtent()->minx;
			if($lyr2->getExtent()->minx < $minx){
				$minx = $lyr2->getExtent()->minx;
			}
			if($miny == 0)
				$miny = $lyr2->getExtent()->miny;
			if($lyr2->getExtent()->miny < $miny){
				$miny = $lyr2->getExtent()->miny;
			}
			if($maxx == 0)
				$maxx = $lyr2->getExtent()->maxx;
			if($lyr2->getExtent()->maxx > $maxx){
				$maxx = $lyr2->getExtent()->maxx;
			}
			if($maxy == 0)
				$maxy = $lyr2->getExtent()->maxy;
			if($lyr2->getExtent()->maxy > $maxy){
				$maxy = $lyr2->getExtent()->maxy;
			}
		
		}else{
			$sql = "SELECT ST_Extent(ST_Buffer(geom, ".$zoom.")) as geom FROM geo_nielssen where codigo_nielssen in (select cod_nielssen from tbl_hiper_alcampo where id_hiper_alcampo = ".$_GET['id_alcampo'] .")";
			$dataProvider=new CSqlDataProvider($sql, array(
						'pagination'=>false
					));
			$result = array();
			$extent = $dataProvider->getData();
			$extent = $extent[0]['geom'];//['codigo'];
			$extent = str_replace("BOX(", "", $extent);
			$extent = str_replace(")", "", $extent);
			$bordes = explode(",", $extent);
			$minimos = explode(" ",$bordes[0]);
			$maximos = explode(" ",$bordes[1]);
			$minx=$minimos[0];
			$miny = $minimos[1];
			$maxx=$maximos[0];
			$maxy = $maximos[1];
			
		}
		*/

		
		$id_loc = "";
	}
	$map->setSize(1060, 750);
	$map->setExtent($minx, $miny, $maxx, $maxy);

	//PONER LOS HIPER LA PRIMERA
	$layers = $map->getAllLayerNames();
	for($i = 0; $i < count($layers); $i++){
		$name = $layers[$i];
		if($name == "Ensenas"){
			$map->moveLayerDown($i);
		}
	}
	$ref = $map->draw();
	$ran = rand ();
	$t2 = '/var/tmp/t1_'.$ran.'.png';

	$ref->saveImage($t2);
	$pdf->Image($t2,10,10,277,190);
	
	return $id_loc_total;
}
?>