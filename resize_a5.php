<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

// initiate FPDI
$pdf = new FPDI();

// get the page count
$pageCount = $pdf->setSourceFile('adsense.pdf');
// iterate through all pages
for ($pageNo = 201; $pageNo <= 432; $pageNo++) {
    // import a page
    $templateId = $pdf->importPage($pageNo);
    // get the size of the imported page
    $size = $pdf->getTemplateSize($templateId);
	$lebar_jadi = 150;
    $lebar = $size['w'];
	$skala = $lebar / $lebar_jadi;
    $tinggi = $size ['h'];
    $tinggi_jadi = $tinggi / $skala;
  

    $pdf->addPage('P',array($lebar_jadi,$tinggi_jadi)); 
    // place the imported page of the first document:
    $pdf->useTemplate($templateId,0,0,$lebar_jadi,$tinggi_jadi);

}
 //tambah halaman kosong
 //$pdf->addPage('P',array($lebar_jadi,$tinggi_jadi)); 
 //$pdf->addPage('P',array($lebar_jadi,$tinggi_jadi)); 
 //$pdf->addPage('P',array($lebar_jadi,$tinggi_jadi)); 
 //$pdf->addPage('P',array($lebar_jadi,$tinggi_jadi)); 
 //$pdf->addPage('P',array($lebar_jadi,$tinggi_jadi)); 

$pdf->Output();

?>
