<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

class PDF extends FPDI { 

    public $angle = 0; 

    function Rotate($angle,$x=-1,$y=-1) { 

        if($x==-1) 
            $x=$this->x; 
        if($y==-1) 
            $y=$this->y; 
        if($this->angle!=0) 
            $this->_out('Q'); 
        $this->angle=$angle; 
        if($angle!=0) 

        { 
            $angle*=M_PI/180; 
            $c=cos($angle); 
            $s=sin($angle); 
            $cx=$x*$this->k; 
            $cy=($this->h-$y)*$this->k; 
             
            $this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy)); 
        } 
    } 
}


class PDFR extends PDF
{
function RotatedText($x,$y,$txt,$angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
    //Image rotated around its upper-left corner
    $this->Rotate($angle,$x,$y);
    $this->Image($file,$x,$y,$w,$h);
    $this->Rotate(0);
}
} 

// initiate FPDI
$pdf = new PDFR();

// get the page count
$jml_hal    = $pdf->setSourceFile('test.pdf');
$pdf->addPage();
$templateId = $pdf->importPage(1);
$file = $pdf->useTemplate($templateId, 0, 0, 90);
$pdf->RotatedImage($templateId,0,0,90,45,180);

//$pdf=new PDF(); 
//$pdf->AddPage(); 
//$pdf->SetFont('Arial','',10); 
//$pdf->Write(20,'this text is straight'); 
//$pdf->Rotate(10); 
//$pdf->Write(20,'this text is crooked'); 
//$pdf->Rotate(0); 
//$pdf->Write(20,'this text is straight again'); 
$pdf->Output();

?>