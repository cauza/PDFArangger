<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

// initiate FPDI
$pdf = new FPDI();
$file = $_GET['file'];

// get the page count
$jml_hal    = $pdf->setSourceFile('file/'.$file);
$jml_swop = floor ($jml_hal/8);
for ($swop=1; $swop <= $jml_swop; $swop++){
        
        //echo "Halaman Baru<br />";
            $hal1 = (($swop-1)*8)+1;
            $hal2 = (($swop-1)*8)+2;
            $hal3 = (($swop-1)*8)+3;
            $hal4 = (($swop-1)*8)+4;
            $hal5 = (($swop-1)*8)+5;
            $hal6 = (($swop-1)*8)+6;
            $hal7 = (($swop-1)*8)+7;
            $hal8 = (($swop-1)*8)+8;


            $templateId1 = $pdf->importPage($hal1);
            $templateId2 = $pdf->importPage($hal2);
            $templateId3 = $pdf->importPage($hal3);
            $templateId4 = $pdf->importPage($hal4);
            $templateId5 = $pdf->importPage($hal5);
            $templateId6 = $pdf->importPage($hal6);
            $templateId7 = $pdf->importPage($hal7);
            $templateId8 = $pdf->importPage($hal8);

            // get the size of the imported page
            $size = $pdf->getTemplateSize($templateId1);
            $lebar = 210;
            $tinggi = 150;
            $x_center = 235; //160
            $y_center = 160; //235
            $x_point1 = 25;
            $y_point1 = 10;
            $x_point2 = 235;
            $y_point2 = 160;
            
            $pdf->addPage('L',array(470,320)); 
            $pdf->useTemplate($templateId8, $x_point1, $y_point1, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId3, $x_point2, $y_point1, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId6, $x_point1, $y_point2, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId1, $x_point2, $y_point2, $lebar, $tinggi, true);

            $pdf->addPage('L',array(470,320)); 
            $pdf->useTemplate($templateId4, $x_point1, $y_point1, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId7, $x_point2, $y_point1, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId2, $x_point1, $y_point2, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId5, $x_point2, $y_point2, $lebar, $tinggi, true);
}

$pdf->Output();
