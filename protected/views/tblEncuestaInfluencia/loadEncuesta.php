<?php 

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('memory_limit', '5000M');
ini_set('max_execution_time', 0);
date_default_timezone_set('Europe/London');

/*$connection = ssh2_connect('localhost', 22);
ssh2_auth_password($connection, 'sigma', 'CtvsL@ez');

$sftp = ssh2_sftp($connection);

*/
/** Include PHPExcel */
require_once '/var/www/PHPExcel_1.8.0/Classes/PHPExcel.php';

$dir = "/home/sigma/";
$myfile = fopen($dir."loadedZI/testfile.txt", "w");
$txt = "Fecha;";
$txt .= "Alcampo;";
$txt .= "LOC;";
$txt .= "CP;";
$txt .= "Hiper;";
$txt .= "ERROR\n";
fwrite($myfile, $txt);
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            $a = explode(".", $file);
			$fileSinExt = $a[0];
			
			$ti = explode("_", $fileSinExt);
			//echo "estoy en zipcode " . $tipo . "<br>";
			if($ti[0] == "ZI"){
				
				$uploadfile = $dir . $file;


				$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);

				$objPHPExcel = $objReader->load($uploadfile);

				$todos = explode("_", $fileSinExt);

				$modelId = new TblIdEncuesta();

				$modelId->fecha_encuesta = $todos[2];
				$modelId->id_alcampo = $todos[1];
				$modelId->save();

				$criteria=new CDbCriteria;
				$criteria->select='max(id_encuesta) AS id_encuesta';
				$row = $modelId->model()->find($criteria);
				$id_encuesta = $row['id_encuesta'];
				
				$sheet = $objPHPExcel->getSheet(0); 

				$highestRow = $sheet->getHighestRow();

				$tipos = array("B"=>"P1", "C"=>"P2", "D"=>"P3");

				foreach($tipos as $tipo){
					
					$celda = array_search($tipo, $tipos);
					for($i = 2; $i<=$highestRow; $i++){
						$registro_encuesta = $sheet->getCell('A'.$i)->getValue();
						$cp = $sheet->getCell('G'.$i)->getValue();
						if(strlen($cp)==4)
							$cp = "0".$cp;
						$loc_mkt = $sheet->getCell('I'.$i)->getFormattedValue();
						$ponderacion = $sheet->getCell('H'.$i)->getValue();
						$p = $sheet->getCell($celda.$i)->getValue();
						//$tipo = "P1";

						
						$model = new TblEncuestaInfluencia();
						$model->id_encuesta = $id_encuesta;
						$model->registro_encuesta = $registro_encuesta;
						$model->cp = $cp;
						$model->loc_mkt = $loc_mkt;
						$model->ponderacion = $ponderacion;
						$model->p = $p;
						$model->tipo = $tipo;
						
						
						if($cp == '' && $loc_mkt == '' && $ponderacion == ''  && $p == '')
							continue;
						try {
							$model->save();
						} catch (Exception $e) {
							//echo "ID_ALCAMPO: " . $todos[1] . "<br>";
							//echo $e->getMessage() . "<br>";
							
							$txt = $todos[2]. ";";
							$txt .= $todos[1]. ";";
							$txt .= $loc_mkt. ";";
							$txt .= $cp. ";";
							$txt .= $p. ";";
							$txt .= $e->getMessage(). "\n";
							fwrite($myfile, $txt);
						}
						

					}
				}

				//rename($dir.$file, '/home/sigma/loadedZI/'.$file);	
			}	
					
        }
        closedir($dh);
    }
}




?>