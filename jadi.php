<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

// initiate FPDI
$pdf = new FPDI();

// get the page count
$jml_hal  = $pdf->setSourceFile('ror2.pdf');
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
            $lebar = $size['w'];
            $tinggi = $size['h'];
            $x_center = 160;
            $y_center = 235;
            
            $pdf->addPage('P',array(320,470)); 
            $pdf->useTemplate($templateId8, 0, 0, $x_center, $y_center, true);
            $pdf->useTemplate($templateId3, 160, 0, $x_center, $y_center, true);
            $pdf->useTemplate($templateId6, 0, 235, $x_center, $y_center, true);
            $pdf->useTemplate($templateId1, 160, 235, $x_center, $y_center, true);

            $pdf->addPage('P',array(320,470)); 
            $pdf->useTemplate($templateId4, 0, 0, $x_center, $y_center, true);
            $pdf->useTemplate($templateId7, 160, 0, $x_center, $y_center, true);
            $pdf->useTemplate($templateId2, 0, 235, $x_center, $y_center, true);
            $pdf->useTemplate($templateId5, 160, 235, $x_center, $y_center, true);
            //echo "Halaman $hal | lebar = $x_center | tinggi = $y_center | x = $lebar | y = $tinggi<br />";
}

$pdf->Output();

?>