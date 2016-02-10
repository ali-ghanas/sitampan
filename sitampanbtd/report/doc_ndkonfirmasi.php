<?php
include '../lib/koneksi.php';
//include 'lib/function.php';

$id = $_GET['id'];

$sql = "SELECT * FROM bcf15, seksi, tp2, tpp WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and idbcf15=$id  "; // memanggil data dengan id yang ditangkap tadi
$query = mysql_query($sql);
$data = mysql_fetch_array($query);


$ndkonfirmasino=$data['ndkonfirmasino'];
$tahun=$data['tahun'];
$Pemohon=$data['Pemohon'];
$bcf15no = $data['bcf15no'];
$bcf15tgl = $data['bcf15tgl'];
$bc11no=$data['bc11no'];
$bc11tgl=$data['bc11tgl'];
$bc11pos=$data['bc11pos'];
$blno=$data['blno'];
$bltgl=$data['bltgl'];
$saranapengangkut=$data['saranapengangkut'];
$voy=$data['voy'];
$amountbrg=$data['amountbrg'];
$satuanbrg=$data['satuanbrg'];
$diskripsibrg=$data['diskripsibrg'];
//jika toorder maka yang muncul Notify
if ($data['consignee']=="To Order")  {$pemilik=$data['notify'];} elseif($data['consignee']=="ToOrder") {$pemilik=$data['notify'];} elseif($data['consignee']=="toorder") {$pemilik=$data['notify'];} elseif($data['consignee']=="to order") {$pemilik=$data['notify'];} else{$pemilik=$data['consignee'];} 



//ambil nomor kontainer
$sql="SELECT max(idbcf15), nocontainer, idsize FROM bcfcontainer where idbcf15='$data[idbcf15]'"; $data=mysql_query($sql); $tampil=mysql_fetch_array($data); 
$nocontainer = $tampil['nocontainer'];

//ambil nomor kontainer 20'
$rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15='$data[idbcf15]' and idsize='20'") ; 
$data2 = mysql_fetch_array($rowset2); 
$jumlah2 = $data2['nocontainer']; 
if($jumlah2>0) { $cont20=$jumlah2;}

//ambil nomor kontainer 40'
$rowset3 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15='$data[idbcf15]' and idsize='40'") ; 
$data3 = mysql_fetch_array($rowset3); $jumlah3 = $data3['nocontainer']; 
if($jumlah3>0) { $cont40=$jumlah3;}

//ambil nomor kontainer 45'
$rowset4 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15='$data[idbcf15]' and idsize='45'") ; 
$data4 = mysql_fetch_array($rowset4);
$jumlah4 = count($data4['nocontainer']); 

//
//// AMBIL NAMA DAN NIP PETUGAS
//$ambildata = mysql_query ("SELECT * FROM nama_petugas where petugas like '$petugas_kembali'");
//$datapetugas = mysql_fetch_array ($ambildata);
//$petugas_kembali = $datapetugas['petugas'];
//$nip_kembali = $datapetugas['nip'];

$document = file_get_contents("../report/suratperintah.rtf");

$document = str_replace('bcf15no', $bcf15no, $document);
$document = str_replace('bcf15tgl', $bcf15tgl, $document);
$document = str_replace('pemilik', $pemilik, $document);
$document = str_replace('ndkonfirmasino', $ndkonfirmasino, $document);
$document = str_replace('tahun', $tahun, $document);
$document = str_replace('Pemohon',$Pemohon, $document);
$document = str_replace('tahun', $tahun, $document);
$document = str_replace('tahun', $tahun, $document);
$document = str_replace('cont', $jumlah4, $document);



header("Content-type: application/msword");
header("Content-disposition: inline; filename=suratperintah.rtf");
header("Content-length: " . strlen($document));
echo $document;

?>