<?php
$svg = $_POST['svg'];
//$svg="/var/www/sigma/js/kk1.svg";
//echo $svg;

$image = new IMagick();

$image->readImageBlob('<?xml version="1.0"?>'.$svg);
$image->setImageFormat("png24");
//$image->writeImage('cylinder.png');


ob_start();
$fp = fopen('php://output', 'w+');
$image->writeimagefile($fp); // or writeImagesFile for multipage PDF
fclose($fp);
$out = ob_get_clean();
header('Content-Description: File Transfer');
header("Content-Type: application/force-download");
header('Content-Type: application/octet-stream');
header("Content-Type: application/download");
header('Content-Disposition: attachment; filename=grafico.png');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header("Content-Type: image/png");
header('Content-Length: '.strlen($out));
echo $out;
?>