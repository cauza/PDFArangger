<?php
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

// ambil data file
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "file/";
$acak           = rand(1, 999999);
$nama_file_unik = $acak . $namaFile; 

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$nama_file_unik);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    if ($_POST['pilihan']=='1') {
        echo "Convert ke A3 : <a href='/pdf/a5toa3lanscape.php?file=".$nama_file_unik."'>".$nama_file_unik."</a>";
    } else {
        echo "Convert ke A3 : <a href='/pdf/a4toa3lanscape.php?file=".$nama_file_unik."'>".$nama_file_unik."</a>";
    }
} else {
    echo "Upload Gagal!";
}

?>