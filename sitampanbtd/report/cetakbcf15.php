<?php
require('../pdf/fpdf.php');
require '../lib/koneksi.php';

        $id = $_GET['id']; // menangkap id
	$sql = "SELECT
                idbcf15,
                tahun,
                bcf15no,
                bcf15tgl,
                bc11no,
                bc11tgl,
                bc11pos,
                bc11subpos,
                blno,
                bltgl,
                saranapengangkut,
                voy,
                amountbrg,
                satuanbrg,
                diskripsibrg,
                consignee,
                consigneeadrress,
                consigneekota,
                notify,
                notifyadrress,
                notifykota,
                idtps,
                tpp.idtpp,
                nm_tpp,
                idtypecode,
                manifest.idmanifest,
                kd_manifest,
                seksi.idseksi,
                nm_seksi,
                nip,
                plh,
                jabatan

                FROM bcf15, manifest,seksi,tpp WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and  bcf15.idmanifest=manifest.idmanifest and bcf15.idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	
        $hasil =mysql_query($sql);
        if (!$hasil)
            die("salah SQLNYA");
        
        $baris=mysql_fetch_row($hasil);
        if(empty($baris))
            die("kode $id tidak dikenal");

$pdf=new FPDF('L','mm','A4');
$pdf->SetMargins(2,2,2 );//lebar margin
$pdf->SetAutoPageBreak(true,30);
$pdf->AddPage();

                $idbcf15=$baris['0'];
                $tahun=$baris['1'];
                $bcf15no=$baris['2'];
                $bcf15tgl=$baris['3'];
                $bc11no=$baris['4'];
                $bc11tgl=$baris['5'];
                $bc11pos=$baris['6'];
                $bc11subpos=$baris['7'];
                $blno=$baris['8'];
                $bltgl=$baris['9'];
                $saranapengangkut=$baris['10'];
                $voy=$baris['11'];
                $amountbrg=$baris['12'];
                $satuanbrg=$baris['13'];
                $diskripsibrg=$baris['14'];
                $consignee=$baris['15'];
                $consigneeadrress=$baris['16'];
                $consigneekota=$baris['17'];
                $notify=$baris['18'];
                $notifyadrress=$baris['19'];
                $notifykota=$baris['20'];
                $idtps=$baris['21'];
                $idtpp=$baris['24'];
                $nm_tpp=$baris['25'];
                $idtypecode=$baris['26'];
                $idmanifest=$baris['27'];
                $kd_manifest=$baris['28'];
                $idseksi=$baris['29'];
                $nm_seksi=$baris['30'];
                $nip=$baris['31'];
                $plh=$baris['32'];
                $jabatan=$baris['33'];

$pdf->SetFont('Arial','',9);
$pdf->text(250,4,'BCF 1.5');

$header1 = "Kementrian Keuangan Republik Indonesia\nDirektorat Jenderal Bea dan Cukai\nKantor Pelayanan Utama Tipe B Batam.";
$pdf->Line(10, 17, 83, 17);
$pdf->setX(10);
$pdf->MultiCell(70,5,$header1,1,'C');
$pdf->Ln(3);

$header2 = "DAFTAR BARANG-BARANG IMPOR\nYANG DINYATAKAN SEBAGAI BARANG YANG\nTIDAK DIKUASAI";
$pdf->Line(10, 17, 83, 17);
$pdf->setX(100);
$pdf->MultiCell(100,4,$header2,0,'C');
$pdf->Ln(5);


$pdf->cell(15,5,'Nomor :', 0,0,'L',0);
$pdf->cell(11,5,$bcf15no, 0,0,'L',0);
$pdf->cell(20,5,$kd_manifest, 0,0,'L',0);
$pdf->Ln(5);


$pdf->cell(10,20,'No', 1,0,'C',0);

$posisi_x=$pdf->GetX();
$pdf->cell(60,10,'BC 1.1',1,1,'C',0);
$pdf->setX($posisi_x);
$pdf->Cell(20, 10, 'No', 1, 0);
$pdf->Cell(30, 10, 'Tanggal', 1, 0);
$pdf->Cell(10, 10, 'Pos', 1, 1);

$pdf->setY(42);
$pdf->setX(72);
$pdf->multicell(32,10,'Nama Sarana Pengangkut', 1,'C');

$pdf->setY(42);
$pdf->setX(104);
$posisi_x=$pdf->GetX();
$pdf->cell(30,10,'Jumlah dan jenis',1,1,'C',0);
$pdf->setX($posisi_x);
$pdf->Cell(15, 10, 'Jumlah', 1, 0);
$pdf->Cell(15, 10, 'Jenis', 1, 0);

$pdf->setY(42);
$pdf->setX(134);
$pdf->multicell(32,10,'Nomor dan Merk Kemasan /Petikemas', 1,'C');

$pdf->setY(42);
$pdf->setX(166);
$pdf->cell(42,20,'Uraian Barang', 1,1,'C');

$pdf->setY(42);
$pdf->setX(208);
$pdf->cell(52,20,'Keterangan',1, 1,'C');

$pdf->setY(42);
$pdf->setX(260);
$pdf->cell(32,20,'Gudang',1, 1,'C');




$pdf->cell(10,10,'1',1, 0,'');
$pdf->Cell(20, 10, $bc11no, 1, 0);
$pdf->Cell(30, 10, $bc11tgl, 1, 0);
$pdf->Cell(10, 10, $bc11pos, 1, 0);
$pdf->multicell(32,10,$saranapengangkut, 1,'L');
$pdf->setY(62);
$pdf->setX(95);
$pdf->multicell(9,10,$voy, 1,'L');


$pdf->cell(10,10,'Voy :', 0,'L');
$pdf->cell(10,10,$voy, 0,'L');



//$header3 = "Nama Sarana\nPengangkut";
//$pdf->Line(10, 17, 83, 17);
//$pdf->setY(42);
//$pdf->setX(47);
//$pdf->MultiCell(30,10,$header3,1,'C');
//$pdf->Ln(10);
//$header4 = "Jumlah dan Jenis\n";
//$pdf->Line(10, 17, 83, 17);
//$pdf->setY(42);
//$pdf->setX(77);
//$pdf->MultiCell(30,5,$header4,1,'C');
//$pdf->Ln(10);



//$pdf->setY(42);
//$pdf->setX(72);
//$pdf->cell(42,20,'Nama Sarana\nPengangkut', 1,0,'C',0);
//$posisi_x=$pdf->GetX();
//$pdf->cell(60,10,'BC 1.1',1,1,'C',0);
//$pdf->setX($posisi_x);
//$pdf->Cell(20, 10, 'No', 1, 0);
//$pdf->Cell(20, 10, 'Tanggal', 1, 0);
//$pdf->Cell(20, 10, 'Pos', 1, 1);




//$pdf->cell(30,20,'No Urt', 1,0,'L',0);
//$posisi1_x=$pdf->GetX();
//$pdf->cell(40,10,'BC 1.1',1,1,'C',0);
//$pdf->setX($posisi1_x);
//$pdf->Cell(20, 10, 'No', 1, 0);
//$pdf->Cell(20, 10, 'Tanggal', 1, 0);
//$pdf->Cell(20, 10, 'Pos', 1, 0);






$pdf->Output();










?>
