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

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            $a = explode(".", $file);
			$fileSinExt = $a[0];
			
			$ti = explode("_", $fileSinExt);
			//echo "estoy en zipcode " . $tipo . "<br>";
			if($ti[0] == "ISO"){
				
				$uploadfile = $dir . $file;


				$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);

				$objPHPExcel = $objReader->load($uploadfile);

				$todos = explode("_", $fileSinExt);
				$idEncuesta = $todos[1];
				$sheet = $objPHPExcel->getSheetByName('4_ISO_CV');
				
				for($i=2; $i<8; $i++){
					$model = new TblIsoCv();
				
					$model->id_encuesta_zc = $idEncuesta;
					if(is_numeric( $sheet->getCell('A'.$i)->getValue()))
						$model->iso = $sheet->getCell('A'.$i)->getValue();
					else
						$model->iso = 6;
					$model->cv = $sheet->getCell('C'.$i)->getCalculatedValue();
					try {
						$model->save();
					}
					catch(CDbException $e) {
							echo $e->getMessage()."<br>";
					}
				}
				
				$sheet = $objPHPExcel->getSheetByName('8_SECC_POB');
				$highestRow = $sheet->getHighestRow();
				
				for($i=2; $i<$highestRow; $i++){
					if($sheet->getCell('B'.$i)->getCalculatedValue()== 0)
						continue;
					$model = new TblIsoPob();
					$model->id_encuesta_zc = $idEncuesta;
					$model->secc =$sheet->getCell('B'.$i)->getCalculatedValue();
					$model->p1 = $sheet->getCell('H'.$i)->getCalculatedValue();
					$model->p2 = $sheet->getCell('I'.$i)->getCalculatedValue();
					$model->p3 = $sheet->getCell('J'.$i)->getCalculatedValue();
					$model->p4 = $sheet->getCell('K'.$i)->getCalculatedValue();
					$model->p5 = $sheet->getCell('L'.$i)->getCalculatedValue();
					$model->p_secc = $sheet->getCell('N'.$i)->getCalculatedValue();
					try {
						$model->save();
					}
					catch(CDbException $e) {
							echo $e->getMessage()."<br>";
					}
				}
				
				
				//rename($dir.$file, $dir.'loadedISO/'.$file);	
			}	
					
        }
        closedir($dh);
    }
}




?>