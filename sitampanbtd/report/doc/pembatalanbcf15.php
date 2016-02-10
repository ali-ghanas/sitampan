<?php
include '../../lib/koneksi.php';
include '../../lib/function.php';
                    //ambil no nota dinas
                    
                    $id = $_GET['id']; // menangkap id
                    $sql = "SELECT * FROM bcf15, seksi, tp3, tpp WHERE  bcf15.idtpp=tpp.idtpp  and bcf15.idtp3=tp3.idtp3 and bcf15.idseksisetujubatal=seksi.idseksi and idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
        

if ($bcf15['bamasukno']=="") {$kop='/KPU.01/BD.0404/'; } else {$kop='/KPU.01/BD.0503/'; }
if ($bcf15['bamasukno']=="") {$bidang='Kabid Pelayanan Pabean dan Cukai II'; } else {$bidang='Kabid Pelayanan Pabean dan Cukai III'; }
$SetujuBatalDate=$bcf15['SetujuBatalDate'];
$tahunbtl=substr($SetujuBatalDate,0,4);
$SetujuBatalNo=$bcf15['SetujuBatalNo'];
$SetujuBatalDate=tglindo($bcf15['SetujuBatalDate']);


$plh=$bcf15['plh'];
$jabatan=$bcf15['jabatan'];
$pemohon=$bcf15['Pemohon'];
$AlamatPemohon=$bcf15['AlamatPemohon'];
$SuratBatalNo=$bcf15['SuratBatalNo'];
$SuratBatalDate=tglindo($bcf15['SuratBatalDate']);

$tglkonf=tglindo($bcf15['ndkonfirmasidate']);
$surat=$bcf15['SuratBatalNo'];
$tglsurat=tglindo($bcf15['SuratBatalDate']);
$consignee=$bcf15['consignee'];
$notify=$bcf15['notify'];
if ($consignee=='To Order') {$pemilik=$notify; }elseif ($consignee=='to order') {$pemilik=$notify;; }  elseif ($consignee=='TO THE ORDER') { $pemilik=$notify;; } elseif ($consignee=='ToOrder') {$pemilik=$notify;; } elseif ($consignee=='To The Order') {$pemilik=$notify; } else  {$pemilik=$consignee;}
$bcf15no=$bcf15['bcf15no'];
$bcf15tgl=tglindo($bcf15['bcf15tgl']);
$bc11no=$bcf15['bc11no'];
$bc11tgl=tglindo($bcf15['bc11tgl']);
$bc11pos=$bcf15['bc11pos'];
$bc11subpos=$bcf15['bc11subpos'];
$bc11subpos=$bcf15['bc11subpos'];
$blno=$bcf15['blno'];
$bltgl=tglindo($bcf15['bltgl']);
$saranapengangkut=$bcf15['saranapengangkut'];
$voy=$bcf15['voy'];
$amountbrg=$bcf15['amountbrg'];
$satuanbrg=$bcf15['satuanbrg'];
$diskripsibrg=$bcf15['diskripsibrg'];
$satuanbrg=$bcf15['satuanbrg'];
$tps=$bcf15['idtps'];
$tpp=$bcf15['nm_tpp'];
if ($bcf15['jalur']=='1') {$jalur= '-'; }elseif ($bcf15['jalur']=='2') {$jalur= 'Hijau'; }  elseif ($bcf15['jalur']=='3') {$jalur= 'Kuning'; } elseif ($bcf15['jalur']=='4') {$jalur= 'Mita Prioritas'; } elseif ($bcf15['jalur']=='5') {$jalur= 'Mita Non Prioritas'; } elseif ($bcf15['jalur']=='6') {$jalur= 'Merah'; } elseif ($bcf15['jalur']=='7') {$jalur= 'Merah Mita Prioritas'; } elseif ($bcf15['jalur']=='8') {$jalur= 'Merah Mita Non Prioritas'; } 
if ($bcf15['bamasukno']=='') {$notapencacahan=''; } else{$notapencacahan= "disertai Nota Hasil Pencacahan ";}
$tps=$bcf15['idtps'];

$DokumenCode=$bcf15['DokumenCode'];
$DokumenNo=$bcf15['DokumenNo'];
$DokumenDate=tglindo($bcf15['DokumenDate']);
$Dokumen2No=$bcf15['Dokumen2No'];
$Dokumen2Date=tglindo($bcf15['Dokumen2Date']);
if ($DokumenCode=='27') {$dokumen1="Dokumen  Ekspor BC 1.2 nomor  : $Dokumen2No tanggal $Dokumen2Date dan telah diterbitkan persetujuan re eksport nomor : $DokumenNo tanggal $DokumenDate  "; }
elseif ($DokumenCode=='4') {$dokumen1="Dokumen  BC 2.3 nomor  : $DokumenNo tanggal $DokumenDate dan telah diterbitkan SPPB nomor : $Dokumen2No tanggal $Dokumen2Date  "; }
elseif ($DokumenCode=='5') {$dokumen1="Dokumen   BC 3.0 nomor  : $DokumenNo tanggal $DokumenDate dan telah diterbitkan persetujuan re eksport nomor : $Dokumen2No tanggal $Dokumen2Date  "; }
elseif ($DokumenCode=='12') {$dokumen1="Dokumen  Pemberitahuan PIB nomor  : $DokumenNo tanggal $DokumenDate dan telah diterbitkan SPPB nomor : $Dokumen2No tanggal $Dokumen2Date  "; }
elseif ($DokumenCode=='13') {$dokumen1="Dokumen  Pemberitahuan PIBK nomor  : $DokumenNo tanggal $DokumenDate dan telah diterbitkan SPPB nomor : $Dokumen2No tanggal $Dokumen2Date  "; }
elseif ($DokumenCode=='11') {$dokumen1="dengan nota dinas Kepala Seksi Ad. Manifest nomor  : $Dokumen2No tanggal $Dokumen2Date perihal permohonan pengeluaran returnable package "; }
elseif ($DokumenCode=='30') {$dokumen1="dengan nota dinas Kepala Seksi Ad. Manifest nomor  : $Dokumen2No tanggal $Dokumen2Date perihal permohonan pengeluaran returnable package "; }


                                $sqlseksi = "SELECT * FROM bcf15, seksi WHERE bcf15.idseksisetujubatal=seksi.idseksi and idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                                $queryseksi = mysql_query($sqlseksi);
                                $bcf15seksi = mysql_fetch_array($queryseksi);
$seksi=$bcf15seksi['nm_seksi'];
$nip=$bcf15seksi['nip'];
//        $sql1 = "SELECT * FROM user WHERE iduser='$iduser'";
//        $query1 = mysql_query($sql1);
//	$data1 = mysql_fetch_array($query1);
//        
$sql="SELECT max(idbcf15), nocontainer, idsize FROM bcfcontainer where idbcf15='$bcf15[idbcf15]'"; $data=mysql_query($sql); 
$tampil=mysql_fetch_array($data); 
$cont= $tampil['nocontainer']; 

$rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($rowset); 
$jumlah = $data2['nocontainer']; 
if($jumlah>0) { $jumlah20= "($jumlah x 20')";} else {$jumlah20= '';}  
$rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($rowset1);
$jumlah = $data3['nocontainer']; $cek1=mysql_numrows($rowset1);
if($jumlah>0) { $jumlah40= "($jumlah x 40')";} else  {$jumlah40= '';} 
$rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='45'") ; $data4 = mysql_fetch_array($rowset2); 
$jumlah = $data4['nocontainer']; $cek2=mysql_numrows($rowset2);
if($jumlah>0) { $jumlah45= "($jumlah x 45')";} else  {$jumlah45= '';}  
$rowset = mysql_query("select * from bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and idbcf15=$bcf15[idbcf15]"); while($typecode = mysql_fetch_array($rowset)){
    if ($typecode['idtypecode']=="3") {$typecodecont= $typecode['nm_type'];} elseif ($typecode['idtypecode']=="1") {$typecodecont= $typecode['nm_type'];} elseif($typecode['idtypecode']=="4") {$typecodecont= $typecode['nm_type'];} elseif($typecode['idtypecode']=="5") {$typecodecont= $typecode['nm_type'];} elseif($typecode['idtypecode']=="6") {$typecodecont= $typecode['nm_type'];} elseif($typecode['idtypecode']=="7") {$typecodecont= $typecode['nm_type'];} elseif($typecode['idtypecode']=="2") {$typecodecont= "";} };

    
$document = file_get_contents("suratpembatalanbcf15.rtf");
$document = str_replace("%%SetujuBatalNo%%", $SetujuBatalNo, $document);
$document = str_replace("%%SetujuBatalDate%%", $SetujuBatalDate, $document);
$document = str_replace("%%kop%%", $kop, $document);
$document = str_replace("%%bidang%%", $bidang, $document);
$document = str_replace("%%tahun%%", $tahunbtl, $document);

$document = str_replace("%%plh%%", $plh, $document);
$document = str_replace("%%jabatan%%", $jabatan, $document);
$document = str_replace("%%pemohon%%", $pemohon, $document);
$document = str_replace("%%alamat%%", $AlamatPemohon, $document);
$document = str_replace("%%SuratBatalNo%%", $SuratBatalNo, $document);
$document = str_replace("%%SuratBatalDate%%", $SuratBatalDate, $document);

$document = str_replace("%%tglkonf%%", $tglkonf, $document);
$document = str_replace("%%surat%%", $surat, $document);
$document = str_replace("%%tglsurat%%", $tglsurat, $document);
$document = str_replace("%%pemilik%%", $pemilik, $document);
$document = str_replace("%%bcf15no%%", $bcf15no, $document);
$document = str_replace("%%bcf15tgl%%", $bcf15tgl, $document);
$document = str_replace("%%bc11no%%", $bc11no, $document);
$document = str_replace("%%bc11tgl%%", $bc11tgl, $document);
$document = str_replace("%%bc11pos%%", $bc11pos, $document);
$document = str_replace("%%bc11subpos%%", $bc11subpos, $document);
$document = str_replace("%%blno%%", $blno, $document);
$document = str_replace("%%bltgl%%", $bltgl, $document);
$document = str_replace("%%saranapengangkut%%", $saranapengangkut, $document);
$document = str_replace("%%voy%%", $voy, $document);
$document = str_replace("%%jumlah%%", $amountbrg, $document);
$document = str_replace("%%satuan%%", $satuanbrg, $document);
$document = str_replace("%%uraian%%", $diskripsibrg, $document);
$document = str_replace("%%dokumen1%%", $dokumen1, $document);


$document = str_replace("%%tps%%", $tps, $document);
$document = str_replace("%%tpp%%", $tpp, $document);
$document = str_replace("%%jalur%%", $jalur, $document);
$document = str_replace("%%ket%%", $notapencacahan, $document);
$document = str_replace("%%nocont%%", $cont, $document);
$document = str_replace("%%jumlah20%%", $jumlah20, $document);
$document = str_replace("%%jumlah40%%", $jumlah40, $document);
$document = str_replace("%%jumlah45%%", $jumlah45, $document);
$document = str_replace("%%typecont%%", $typecodecont, $document);
$document = str_replace("%%seksi%%", $seksi, $document);
$document = str_replace("%%nip%%", $nip, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=SuratPembatalanBCF15.rtf");
header("Content-length: " . strlen($document));
echo $document;



?>



