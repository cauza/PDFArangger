<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

// initiate FPDI
$pdf = new FPDI();

// get the page count
$jml_hal    = $pdf->setSourceFile('A4.pdf');
$jml_swop = floor ($jml_hal/4);
for ($swop=10; $swop <= $jml_swop; $swop++){
        
        //echo "Halaman Baru<br />";
            $hal1 = (($swop-1)*4)+1;
            $hal2 = (($swop-1)*4)+2;
            $hal3 = (($swop-1)*4)+3;
            $hal4 = (($swop-1)*4)+4;


            $templateId1 = $pdf->importPage($hal1);
            $templateId2 = $pdf->importPage($hal2);
            $templateId3 = $pdf->importPage($hal3);
            $templateId4 = $pdf->importPage($hal4);

            // get the size of the imported page
            $size = $pdf->getTemplateSize($templateId1);
            $lebar = $size['w'];
            $tinggi = $size['h'];
            
            $pdf->addPage('L',array(420,297)); 
            $pdf->useTemplate($templateId1, 0, 7, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId3, 210,7, $lebar, $tinggi, true);

            $pdf->addPage('L',array(420,297)); 
            $pdf->useTemplate($templateId4, 0, 7, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId2, 210,7, $lebar, $tinggi, true);
            //echo "Halaman $hal | lebar = $x_center | tinggi = $y_center | x = $lebar | y = $tinggi<br />";
}

$pdf->Output();

?>
