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
$myfile = fopen($dir."loadedCE/testfile.txt", "w");
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
			if($ti[0] == "EC"){
				
				$uploadfile = $dir . $file;


				$inputFileType = PHPExcel_IOFactory::identify($uploadfile);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);

				$objPHPExcel = $objReader->load($uploadfile);

				$todos = explode("_", $fileSinExt);

				
				$sheet = $objPHPExcel->getSheet(0); 

				$highestRow = $sheet->getHighestRow();

				$tipos = array("B"=>"P1", "C"=>"P2", "D"=>"P3");

				foreach($tipos as $tipo){
					
					$celda = array_search($tipo, $tipos);
					for($i = 2; $i<$highestRow; $i++){
						$fecha = $sheet->getCell('A'.$i)->getValue();
						$id_hiper = $sheet->getCell('B'.$i)->getValue();
						$cp = $sheet->getCell('C'.$i)->getValue();
						$cv = $sheet->getCell('D'.$i)->getValue();
						$tipo_entrega = $sheet->getCell('E'.$i)->getValue();
						$num_pedidos = $sheet->getCell('F'.$i)->getValue();
						$clientes_unicos = $sheet->getCell('G'.$i)->getValue();
						
						//$tipo = "P1";

						
						$model = new TblEcom();
						$model->fecha = $fecha;
						$model->id_hiper = $id_hiper;
						$model->cp = $cp;
						$model->cv = $cv;
						$model->tipo_entrega = $tipo_entrega;
						$model->num_pedidos = $num_pedidos;
						$model->clientes_unicos = $clientes_unicos;
						
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