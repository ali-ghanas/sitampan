<?php
include '../../lib/koneksi.php';
include '../../lib/function.php';
                    //ambil no nota dinas
                    
                    $id = $_GET['id']; // menangkap id
                    $sql = "SELECT * FROM bcf15, seksi, tpp,p2 WHERE bcf15.idp2=p2.idp2 and bcf15.idtpp=tpp.idtpp  and bcf15.idseksindkonfirmasi=seksi.idseksi and idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $now=date('Y-m-d');
                    $nowtglindo=tglindo($now);
                    $tahunnow=date('Y');

if ($bcf15['ndkonfirmasito']=="1") {$kop1='/KPU.01/BD.0903/'; } elseif ($bcf15['ndkonfirmasito']=="2") {$kop1='/KPU.01/BD.0904/'; } elseif ($bcf15['ndkonfirmasito']=="3") {$kop1='/KPU.01/BD.0905/'; }
if ($bcf15['bamasukno']=="") {$kop='/KPU.01/BD.0404/'; } else {$kop='/KPU.01/BD.0503/'; }

if ($bcf15['jawabanp2']==""){$jawabanp2='';}else {$jawabanp2=$bcf15['jawabanp2'];}
if ($bcf15['jawabanp2']==""){$jawabanp2date=$nowtglindo;}else {$jawabanp2date=tglindo($bcf15['jawabanp2date']);}

$jawabanp2date1=$bcf15['jawabanp2date'];
if ($bcf15['jawabanp2']==""){$tahunjwbkonf=$tahunnow;}else {$tahunjwbkonf=substr($jawabanp2date1,0,4);}

if ($bcf15['bamasukno']=='') {$PPC='II'; } else{$PPC= "III";}

$ndkonfirmasidate=$bcf15['ndkonfirmasidate'];
$tahunkonf=substr($ndkonfirmasidate,0,4);
$nond=$bcf15['ndkonfirmasino'];
$p2=$bcf15['nm_p2'];
$bidang=$bcf15['bidang'];
$plh=$bcf15['plh'];
$jabatan=$bcf15['jabatan'];
$pemohon=$bcf15['Pemohon'];
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
if ($bcf15['bamasukno']=="") {$posisibrg="TPS $tps"; } else {$posisibrg="TPP $tpp"; }
if ($bcf15['jalur']=='1') {$jalur= '-'; }elseif ($bcf15['jalur']=='2') {$jalur= 'Hijau'; }  elseif ($bcf15['jalur']=='3') {$jalur= 'Kuning'; } elseif ($bcf15['jalur']=='4') {$jalur= 'Mita Prioritas'; } elseif ($bcf15['jalur']=='5') {$jalur= 'Mita Non Prioritas'; } elseif ($bcf15['jalur']=='6') {$jalur= 'Merah'; } elseif ($bcf15['jalur']=='7') {$jalur= 'Merah Mita Prioritas'; } elseif ($bcf15['jalur']=='8') {$jalur= 'Merah Mita Non Prioritas'; } 
if ($bcf15['bamasukno']=='') {$notapencacahan=''; } else{$notapencacahan= "disertai Nota Hasil Pencacahan ";}
$tps=$bcf15['idtps'];

$DokumenCode=$bcf15['DokumenCode'];
$DokumenNo=$bcf15['DokumenNo'];
$DokumenDate=tglindo($bcf15['DokumenDate']);
$Dokumen2No=$bcf15['Dokumen2No'];
$Dokumen2Date=tglindo($bcf15['Dokumen2Date']);
if ($DokumenCode=='27') {$dokumen1="Dokumen  Ekspor BC 1.2 nomor  : $Dokumen2No tanggal $Dokumen2Date dan telah diterbitkan persetujuan re eksport nomor : $DokumenNo tanggal $DokumenDate  "; }
elseif ($DokumenCode=='4') {$dokumen1="telah diajukan  BC 2.3 dengan mendapatkan nomor pendaftaran  : $DokumenNo tanggal $DokumenDate dan telah diterbitkan SPPB nomor : $Dokumen2No tanggal $Dokumen2Date  "; }
elseif ($DokumenCode=='5') {$dokumen1="telah diajukan  BC 3.0 nomor  : $DokumenNo tanggal $DokumenDate dan telah diterbitkan persetujuan re eksport nomor : $Dokumen2No tanggal $Dokumen2Date  "; }
elseif ($DokumenCode=='12') {$dokumen1="telah diajukan PIB dengan mendapatkan nomor pendaftaran  : $DokumenNo tanggal $DokumenDate dengan mendapatkan penetapan jalur $jalur dengan status gate dan telah diterbitkan SPPB nomor : $Dokumen2No tanggal $Dokumen2Date  "; }
elseif ($DokumenCode=='13') {$dokumen1="telah diajukan PIBK nomor  : $DokumenNo tanggal $DokumenDate dan telah diterbitkan SPPB nomor : $Dokumen2No tanggal $Dokumen2Date  "; }
elseif ($DokumenCode=='11') {$dokumen1="dengan nota dinas Kepala Seksi Ad. Manifest nomor  : $Dokumen2No tanggal $Dokumen2Date perihal permohonan pengeluaran returnable package "; }
elseif ($DokumenCode=='30') {$dokumen1="dengan nota dinas Kepala Seksi Ad. Manifest nomor  : $Dokumen2No tanggal $Dokumen2Date perihal permohonan pengeluaran returnable package "; }

                                $sqlseksi = "SELECT * FROM bcf15, seksi, tpp, p2 WHERE bcf15.idp2=p2.idp2 and bcf15.idtpp=tpp.idtpp  and bcf15.idseksip2ndkonfjwb=seksi.idseksi and idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                                $queryseksi = mysql_query($sqlseksi);
                                $bcf15seksi = mysql_fetch_array($queryseksi);
                                
if ($bcf15seksi['nm_seksi']==''){$seksi='Isikan Nama Seksi';} else{$seksi=$bcf15seksi['nm_seksi'];}
if ($bcf15seksi['nm_seksi']==''){$nip='isikan NIP seksinya';}else{$nip=$bcf15seksi['nip'];}
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
    $sqlkonfp2 = "SELECT * FROM kofirmasi_p2 WHERE idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
    $querykonfp2 = mysql_query($sqlkonfp2);
    $bcf15konfp2 = mysql_fetch_array($querykonfp2);
    if ($bcf15konfp2['konf_stsblokir']=="Blokir") {$konf_stsblokir= "dalam pemblokiran";} elseif ($bcf15konfp2['konf_stsblokir']=="Tidak"){$konf_stsblokir= "tidak dalam pemblokiran";}elseif($bcf15konfp2['konf_stsblokir']==""){$konf_stsblokir= "tidak dalam pemblokiran";}
    if ($bcf15konfp2['konf_stssegel']=="Segel") {$konf_stssegel= "dilakukan penegahan dan/atau penyegelan";} elseif ($bcf15konfp2['konf_stssegel']=="Tidak"){$konf_stssegel= "tidak dilakukan penegahan dan/atau penyegelan";} elseif ($bcf15konfp2['konf_stssegel']==""){$konf_stssegel= "tidak dilakukan penegahan dan/atau penyegelan";}
    if ($bcf15konfp2['konf_stsnhi']=="NHI") {$konf_stsnhi= "NHI";} elseif ($bcf15konfp2['konf_stsnhi']=="Tidak"){$konf_stsnhi= "tidak NHI";}  elseif ($bcf15konfp2['konf_stsnhi']==""){$konf_stsnhi= "tidak NHI";}
    
    
    
    
$document = file_get_contents("jawabanndkonfirmasip2.rtf");
$document = str_replace("%%nondjwbkonf%%", $jawabanp2, $document);
$document = str_replace("%%tglndjwbkonf%%", $jawabanp2date, $document);
$document = str_replace("%%tahunjwb%%", $tahunjwbkonf, $document);
$document = str_replace("%%ppc%%", $PPC, $document);

$document = str_replace("%%nond%%", $nond, $document);
$document = str_replace("%%kop%%", $kop, $document);
$document = str_replace("%%tahun%%", $tahunkonf, $document);
$document = str_replace("%%p2%%", $p2, $document);
$document = str_replace("%%bidang%%", $bidang, $document);
$document = str_replace("%%plh%%", $plh, $document);
$document = str_replace("%%jabatan%%", $jabatan, $document);
$document = str_replace("%%pemohon%%", $pemohon, $document);
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

$document = str_replace("%%tps%%", $tps, $document);
$document = str_replace("%%tpp%%", $tpp, $document);
$document = str_replace("%%posisibarang%%", $posisibrg, $document);

$document = str_replace("%%konf_stsblokir%%", $konf_stsblokir, $document);
$document = str_replace("%%konf_stssegel%%", $konf_stssegel, $document);
$document = str_replace("%%dokumen1%%", $dokumen1, $document);

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
header("Content-disposition: inline; filename=jawabanndkonfirmasip2.rtf");
header("Content-length: " . strlen($document));
echo $document;



?>



