<?php
require ('C:\\MS4W/ms4w/Apache/htdocs/PlanSierra_dev/fpdf17/fpdf.php');

class PDF extends FPDF
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
		$username = Yii::app()->user->id;
		$this->Cell(0,5,'Informe generado el: ' . date("d-m-Y"). ', por  el usuario: ' .$username ,0,0,'C');
		$this->SetDrawColor(153,0,0);
		$this->Line(8,280, 200, 280);
	}
function WordWrap(&$text, $maxwidth)
{
    $text = trim($text);
    if ($text==='')
        return 0;
    $space = $this->GetStringWidth(' ');
    $lines = explode("\n", $text);
    $text = '';
    $count = 0;

    foreach ($lines as $line)
    {
        $words = preg_split('/ +/', $line);
        $width = 0;

        foreach ($words as $word)
        {
            $wordwidth = $this->GetStringWidth($word);
            if ($wordwidth > $maxwidth)
            {
                // Word is too long, we cut it
                for($i=0; $i<strlen($word); $i++)
                {
                    $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                    if($width + $wordwidth <= $maxwidth)
                    {
                        $width += $wordwidth;
                        $text .= substr($word, $i, 1);
                    }
                    else
                    {
                        $width = $wordwidth;
                        $text = rtrim($text)."\n".substr($word, $i, 1);
                        $count++;
                    }
                }
            }
            elseif($width + $wordwidth <= $maxwidth)
            {
                $width += $wordwidth + $space;
                $text .= $word.' ';
            }
            else
            {
                $width = $wordwidth + $space;
                $text = rtrim($text)."\n".$word.' ';
                $count++;
            }
        }
        $text = rtrim($text)."\n";
        $count++;
    }
    $text = rtrim($text);
    return $count;
}
}
?>