<?php
include '../../lib/koneksi.php';
include '../../lib/function.php';
                    //ambil no nota dinas
                   
                    $id = $_GET['id']; // menangkap id
                    $sql = "SELECT * FROM bcf15,  tpp WHERE bcf15.idtpp=tpp.idtpp  and  idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
        

if ($bcf15['bamasukno']=="") {$kop='/KPU.01/BD.0404/'; } else {$kop='/KPU.01/BD.0503/'; }

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

$amountbrg=$bcf15['amountbrg'];
$satuanbrg=$bcf15['satuanbrg'];
$diskripsibrg=$bcf15['diskripsibrg'];
$satuanbrg=$bcf15['satuanbrg'];
$tps=$bcf15['idtps'];
$tpp=$bcf15['nm_tpp'];
$alamat_tpp=$bcf15['alamat_tpp'];
$kota_tpp=$bcf15['kota_tpp'];
$suratperintahno=$bcf15['suratperintahno'];
$suratperintahdate=tglindo($bcf15['suratperintahdate']);
$tahun=$bcf15['tahun'];
$tahunkini=date('Y');




                                $sqlseksi = "SELECT * FROM bcf15_suratperintah_tegas, seksi WHERE bcf15_suratperintah_tegas.idseksitpp2=seksi.idseksi and idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                                $queryseksi = mysql_query($sqlseksi);
                                $bcf15seksi = mysql_fetch_array($queryseksi);
$seksi=$bcf15seksi['nm_seksi'];
$nip=$bcf15seksi['nip'];
$no_surat=$bcf15seksi['no_surat'];
$tgl_surat=tglindo($bcf15seksi['tgl_surat']);

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
    if ($typecode['idtypecode']=="3") {$typecodecont= $typecode['nm_type'];} elseif ($typecode['idtypecode']=="1") {$typecodecont= $typecode['nm_type'];} elseif($typecode['idtypecode']=="4") {$typecodecont= $typecode['nm_type'];} elseif($typecode['idtypecode']=="5") {$typecodecont= $typecode['nm_type'];} elseif($typecode['idtypecode']=="6") {$typecodecont= $typecode['nm_type'];} elseif($typecode['idtypecode']=="2") {$typecodecont= "";} };

    
$document = file_get_contents("suratpenegasansprint.rtf");

$document = str_replace("%%pemilik%%", $pemilik, $document);
$document = str_replace("%%bcf15no%%", $bcf15no, $document);
$document = str_replace("%%bcf15tgl%%", $bcf15tgl, $document);
$document = str_replace("%%bc11no%%", $bc11no, $document);
$document = str_replace("%%bc11tgl%%", $bc11tgl, $document);
$document = str_replace("%%bc11pos%%", $bc11pos, $document);
$document = str_replace("%%bc11subpos%%", $bc11subpos, $document);
$document = str_replace("%%blno%%", $blno, $document);
$document = str_replace("%%bltgl%%", $bltgl, $document);

$document = str_replace("%%jumlah%%", $amountbrg, $document);
$document = str_replace("%%satuan%%", $satuanbrg, $document);
$document = str_replace("%%uraian%%", $diskripsibrg, $document);

$document = str_replace("%%tps%%", $tps, $document);
$document = str_replace("%%tpp%%", $tpp, $document);
$document = str_replace("%%alamat_tpp%%", $alamat_tpp, $document);
$document = str_replace("%%kota_tpp%%", $kota_tpp, $document);

$document = str_replace("%%suratperintahno%%", $suratperintahno, $document);
$document = str_replace("%%suratperintahdate%%", $suratperintahdate, $document);
$document = str_replace("%%tahun%%", $tahun, $document);
$document = str_replace("%%no_surat%%", $no_surat, $document);
$document = str_replace("%%tgl_surat%%", $tgl_surat, $document);
$document = str_replace("%%tahunkini%%", $tahunkini, $document);

$document = str_replace("%%nocont%%", $cont, $document);
$document = str_replace("%%jumlah20%%", $jumlah20, $document);
$document = str_replace("%%jumlah40%%", $jumlah40, $document);
$document = str_replace("%%jumlah45%%", $jumlah45, $document);
$document = str_replace("%%typecont%%", $typecodecont, $document);
$document = str_replace("%%seksi%%", $seksi, $document);
$document = str_replace("%%nip%%", $nip, $document);

header("Content-type: application/msword");
header("Content-disposition: inline; filename=suratpenegasansprint.rtf");
header("Content-length: " . strlen($document));
echo $document;



?>



