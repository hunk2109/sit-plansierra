<?php

include("/var/www/PHPMailer/class.phpmailer.php"); 
include("/var/www/PHPMailer/class.smtp.php");

$c2 = ssh2_connect('sigma.argongra.com', 2222);
ssh2_auth_password($c2, 'sigma', 'bXLprRV3MD');

//ssh2_scp_recv($c2, '/CL_2016_10.txt', '/home/argongra/sigma/CL_2016_10.txt');
$stream = ssh2_sftp($c2);
$remoteDir = '/';
$dir = opendir("ssh2.sftp://{$stream}{$remoteDir}");
$localDir = '/home/argongra/sigma/';

while (false !== ($file = readdir($dir)))
{
    if ($file == "." || $file == "..")
        continue;
	$files[] = $file;	
}

foreach ($files as $file)
{
    echo "Copying file: $file\n";
    if (!$remote = @fopen("ssh2.sftp://{$stream}/{$remoteDir}{$file}", 'r'))
    {
        echo "Unable to open remote file: $file\n";
        continue;
    }

    if (!$local = @fopen($localDir . $file, 'w'))
    {
        echo "Unable to create local file: $file\n";
        continue;
    }

    $read = 0;
    $filesize = filesize("ssh2.sftp://{$stream}/{$remoteDir}{$file}");
    while ($read < $filesize && ($buffer = fread($remote, $filesize - $read)))
    {
        $read += strlen($buffer);
        if (fwrite($local, $buffer) === FALSE)
        {
            echo "Unable to write to local file: $file\n";
            break;
        }
    }
    fclose($local);
    fclose($remote);
}

$connection = ssh2_connect('localhost', 22);
ssh2_auth_password($connection, 'sigma', 'CtvsL@ez');
$sftp = ssh2_sftp($connection);

if ($dh = opendir($localDir)) {
	while (($file = readdir($dh)) !== false) {
		ssh2_sftp_rename($sftp, $localDir.$file, '/home/sigma/'.$file);
	}
}

$dir = "/home/sigma/";

$mensaje = "";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            $a = explode(".", $file);
			$fileSinExt = $a[0];
			
			$tipo = explode("_", $fileSinExt);
			//echo "estoy en zipcode " . $tipo . "<br>";
			if($tipo[0] == "ZC"){
				if($tipo[count($tipo)-1] == "cab"){
					exec("php /var/www/sigma/js/loadZipcodeCab.php " . $file);
					ssh2_sftp_rename($sftp, '/home/sigma/'.$file, '/home/sigma/loaded/'.$file);
					$mensaje .= "<p> Cargada Cabecera Zipcode </p>";
				}
			}			
        }
        closedir($dh);    }
}

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            $a = explode(".", $file);
			$fileSinExt = $a[0];
			
			$tipo = explode("_", $fileSinExt);
			//echo "estoy en zipcode " . $tipo . "<br>";
			if($tipo[0] == "ZC"){
				if($tipo[count($tipo)-1] == "cab"){
					exec("php /var/www/sigma/js/loadZipcodeCab.php " . $file);
					ssh2_sftp_rename($sftp, '/home/sigma/'.$file, '/home/sigma/loaded/'.$file);
					
					$mensaje .= "<p> Cargada Cabecera Zipcode </p>";
				}else{
					exec("php /var/www/sigma/js/loadZipcode.php " . $file);
					ssh2_sftp_rename($sftp, '/home/sigma/'.$file, '/home/sigma/loaded/'.$file);
					
					$mensaje .= "<p> Cargado Zipcode </p>";
				}
			}
			if($tipo[0] == "ZCM"){
				exec("php /var/www/sigma/js/loadZipcodeMercados.php " . $file);
				ssh2_sftp_rename($sftp, '/home/sigma/'.$file, '/home/sigma/loaded/'.$file);
				
					$mensaje .= "<p> Cargado Zipcode mercados </p>";
			}
			if($tipo[0] == "EC"){
				exec("php /var/www/sigma/js/loadEcom.php " . $file);
				ssh2_sftp_rename($sftp, '/home/sigma/'.$file, '/home/sigma/loadedEC/'.$file);
				
					$mensaje .= "<p> Cargado Ecom </p>";
			}
			if($tipo[0] == "Fuentes"){
				exec("php /var/www/sigma/js/loadFuentes.php " . $file);
				ssh2_sftp_rename($sftp, '/home/sigma/'.$file, '/home/sigma/loadedFuentes/'.$file);
				
				$mensaje .= "<p> Cargadas Fuentes </p>";
			}
			if($tipo[0] == "CL"){
				exec("php /var/www/sigma/js/loadCliente.php " . $file);
				ssh2_sftp_rename($sftp, '/home/sigma/'.$file, '/home/sigma/loadedCL/'.$file);
				
				$mensaje .= "<p> Cargado Clientes </p>";
			}
			if($tipo[0] == "TL"){
				exec("php /var/www/sigma/js/loadRegistros.php " . $file);
				ssh2_sftp_rename($sftp, '/home/sigma/'.$file, '/home/sigma/loadedTL/'.$file);
				
				$mensaje .= "<p> Cargados Registros </p>";
			}
        }
        closedir($dh);
    }
}

$mensaje .= "<img src='http://wikout.com/animado.gif'></img>";
$mail = new PHPMailer();
$mail->AddAddress('jmcornejo@argongra.com', "Jose María Cornejo"); 
$mail->AddAddress('iordas.argongra@gmail.com', "Iria Ordás"); 
$mail->AddAddress('egil@argongra.es', "Esther Gil"); 

//ADJUNTAR PDF EN MAIL
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "TLS"; 
$mail->Host = "mail.argongra.es"; 
$mail->Port = 25; 
$mail->Username = "sisac@argongra.es"; 
$mail->Password = "m8g9TuxU";
$mail->From = "sisac@argongra.es"; 
$mail->FromName = "SIGMA"; 
$mail->Subject = "Datos mensuales cargados "; 
$mail->AltBody = "Datos mensuales cargados"; 
$mail->MsgHTML($mensaje); 
//$mail->MsgHTML("<a href='http://80.28.200.188/sis'><img src='images/logo.png'/></a>"); 
$mail->IsHTML(true);

if(!$mail->Send()) { 
	echo "Error: " . $mail->ErrorInfo; 
} else { 
	echo "Mensaje enviado correctamente"; 
}

?>