<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

// initiate FPDI
$pdf = new FPDI();
$file = $_GET['file'];

// get the page count
$jml_hal    = $pdf->setSourceFile('file/' . $file);
$jml_swop = floor($jml_hal / 4);
for ($swop = 1; $swop <= $jml_swop; $swop++) {

    //echo "Halaman Baru<br />";
    $hal1 = (($swop - 1) * 4) + 1;
    $hal2 = (($swop - 1) * 4) + 2;
    $hal3 = (($swop - 1) * 4) + 3;
    $hal4 = (($swop - 1) * 4) + 4;


    $templateId1 = $pdf->importPage($hal1);
    $templateId2 = $pdf->importPage($hal2);
    $templateId3 = $pdf->importPage($hal3);
    $templateId4 = $pdf->importPage($hal4);

    // get the size of the imported page
    $size = $pdf->getTemplateSize($templateId1);
    $lebar = 300;
    $tinggi = 210;
    $x_point1 = 10;
    $y_point1 = 25;
    $x_point2 = 10;
    $y_point2 = 235;

    $pdf->addPage('P', array(470, 320));
    $pdf->useTemplate($templateId1, $x_point1, $y_point1, $lebar, $tinggi, true);
    $pdf->useTemplate($templateId3, $x_point2, $y_point2, $lebar, $tinggi, true);

    $pdf->addPage('P', array(470, 320));
    $pdf->useTemplate($templateId2, $x_point1, $y_point1, $lebar, $tinggi, true);
    $pdf->useTemplate($templateId4, $x_point2, $y_point2, $lebar, $tinggi, true);
}

$pdf->Output();
