<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

// initiate FPDI
$pdf = new FPDI();
$file = $_GET['file'];

// get the page count
$jml_hal    = $pdf->setSourceFile('file/'.$file);
$jml_swop = floor ($jml_hal/16);
for ($swop=1; $swop <= $jml_swop; $swop++){
        
        //echo "Halaman Baru<br />";
            $hal1 = (($swop-1)*16)+1;
            $hal2 = (($swop-1)*16)+2;
            $hal3 = (($swop-1)*16)+3;
            $hal4 = (($swop-1)*16)+4;
            $hal5 = (($swop-1)*16)+5;
            $hal6 = (($swop-1)*16)+6;
            $hal7 = (($swop-1)*16)+7;
            $hal8 = (($swop-1)*16)+8;
            $hal9 = (($swop-1)*16)+9;
            $hal10 = (($swop-1)*16)+10;
            $hal11 = (($swop-1)*16)+11;
            $hal12 = (($swop-1)*16)+12;
            $hal13 = (($swop-1)*16)+13;
            $hal14 = (($swop-1)*16)+14;
            $hal15 = (($swop-1)*16)+15;
            $hal16 = (($swop-1)*16)+16;



            $templateId1 = $pdf->importPage($hal1);
            $templateId2 = $pdf->importPage($hal2);
            $templateId3 = $pdf->importPage($hal3);
            $templateId4 = $pdf->importPage($hal4);
            $templateId5 = $pdf->importPage($hal5);
            $templateId6 = $pdf->importPage($hal6);
            $templateId7 = $pdf->importPage($hal7);
            $templateId8 = $pdf->importPage($hal8);
		 $templateId9 = $pdf->importPage($hal9);
            $templateId10 = $pdf->importPage($hal10);
            $templateId11 = $pdf->importPage($hal11);
            $templateId12 = $pdf->importPage($hal12);
            $templateId13 = $pdf->importPage($hal13);
            $templateId14 = $pdf->importPage($hal14);
            $templateId15 = $pdf->importPage($hal15);
            $templateId16 = $pdf->importPage($hal16);

            // get the size of the imported page
            $size = $pdf->getTemplateSize($templateId1);
            $lebar = 150;
            $tinggi = 115;
            $x_point1 = 10;
            $x_point2 = 160;
            $y_point1 = 5;
            $y_point2 = 120;
		 $y_point3 = 235;
            $y_point4 = 350;

            
            $pdf->addPage('P',array(470,320)); 
            $pdf->useTemplate($templateId3, $x_point1, $y_point1, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId1, $x_point2, $y_point1, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId7, $x_point1, $y_point2, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId5, $x_point2, $y_point2, $lebar, $tinggi, true);
		 $pdf->useTemplate($templateId11, $x_point1, $y_point3, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId9, $x_point2, $y_point3, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId16, $x_point1, $y_point4, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId13, $x_point2, $y_point4, $lebar, $tinggi, true);

            $pdf->addPage('P',array(470,320)); 
            $pdf->useTemplate($templateId2, $x_point1, $y_point1, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId4, $x_point2, $y_point1, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId6, $x_point1, $y_point2, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId8, $x_point2, $y_point2, $lebar, $tinggi, true);
		 $pdf->useTemplate($templateId10, $x_point1, $y_point3, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId12, $x_point2, $y_point3, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId14, $x_point1, $y_point4, $lebar, $tinggi, true);
            $pdf->useTemplate($templateId15, $x_point2, $y_point4, $lebar, $tinggi, true);

}

$pdf->Output();
