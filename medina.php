<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

// initiate FPDI
$pdf = new FPDI();
$file = $_GET['file'];

// get the page count
$jml_hal    = $pdf->setSourceFile('file/'.$file);
$jml_swop = floor ($jml_hal/4);
for ($swop=1; $swop <= $jml_swop; $swop++){
        
        //echo "Halaman Baru<br />";
            $hal1 = (($swop-1)*2)+1;
            $hal2 = (($swop-1)*2)+2;
            $hal7 = $jml_hal-(($swop-1)*2)-1;
            $hal8 = $jml_hal-(($swop-1)*2);


            $templateId1 = $pdf->importPage($hal8);
            $templateId2 = $pdf->importPage($hal7);
            $templateId3 = $pdf->importPage($hal1);
            $templateId4 = $pdf->importPage($hal2);

            // get the size of the imported page
            $size = $pdf->getTemplateSize($templateId1);
            $lebar = 210;
            $tinggi = 300;
            $x_point1 = 25;
            $y_point1 = 10;
            $x_point2 = 235;
            $y_point2 = 160;
            
            $pdf->addPage('L',array(470,320)); 
            $pdf->useTemplate($templateId1, $x_point1, $y_point1, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId3, $x_point2, $y_point1, $lebar, $tinggi, true);

            $pdf->addPage('L',array(470,320)); 
            $pdf->useTemplate($templateId4, $x_point1, $y_point1, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId2, $x_point2, $y_point1, $lebar, $tinggi, true);
}

$pdf->Output();
