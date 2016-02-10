<?php
require('../pdf/fpdf.php');
require '../lib/koneksi.php';

if(isset($_POST['cetakpemberitahuanallamplop'])) // jika tombol editsubmit ditekan

           $txttgldari = $_GET['txttgldari']; // menangkap id
           $txttglsampai = $_GET['txttglsampai']; 
	$sql = "SELECT idbcf15, tahun, suratno, suratdate, consignee, notify, bcf15.idtp3, kd_tp3 FROM bcf15,tp3 where bcf15.idtp3=tp3.idtp3  and suratdate='$_GET[txttgldari]'"; // memanggil data dengan id yang ditangkap tadi
           $hasil =mysql_query($sql);
        if (!$hasil)
            die("salah SQLNYA");
        
        $baris=mysql_fetch_row($hasil);
        if(empty($baris))
            die("kode $txttgldari tidak dikenal");

$pdf=new FPDF('L','mm','A4');
$pdf->SetMargins(2,2,2 );//lebar margin
$pdf->SetAutoPageBreak(true,30);
$pdf->AddPage();

                $idbcf15=$baris['0'];
                $tahun=$baris['1'];
                $suratno=$baris['2'];
                $suratdate=$baris['3'];
                $consignee=$baris['4'];
                $notify=$baris['5'];
                $idtp3=$baris['6'];
                $kdtp3=$baris['7'];
               

$pdf->SetFont('Arial','',12);

$pdf->cell(15,5,'', 0,0,'L',0);
$pdf->cell(10,5,$suratno, 0,0,'L',0);
$pdf->cell(35,5,$kdtp3, 0,0,'L',0);
$pdf->cell(10,5,$tahun, 0,0,'L',0);
$pdf->Ln(5);








$pdf->Output();










?>
