<?php
include '../lib/koneksi.php';
include '../lib/function.php';

$id = $_GET['id'];
        $sql = "SELECT * FROM cuti WHERE idcuti='$id'";
        $query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        

$tgl_cuti_awal = tglindo($data['tgl_cuti_awal']);
$tgl_cuti_akhir = tglindo($data['tgl_cuti_akhir']);
$alasan_cuti = $data['alasan_cuti'];
$kota_cuti = $data['kota_cuti'];
$nmatasanlangsung = $data['nmatasanlangsung'];
$nipatasanlangsung = $data['nipatasanlangsung'];
$jabatanatasanlangsung = $data['jabatanatasanlangsung'];
$nmpejabatberwenang = $data['nmpejabatberwenang'];
$nippejabatberwenang = $data['nippejabatberwenang'];
$jabatanpejabatberwenang = $data['jabatanpejabatberwenang'];
$tahuncuti = $data['tahuncuti'];
$lamacuti = $data['lamacuti'];
$tglinput = tglindo($data['tglinput']);
$iduser = $data['iduser'];
$seksi = $data['seksi'];
$bidang = $data['bidang'];


        $sql1 = "SELECT * FROM user WHERE iduser='$iduser'";
        $query1 = mysql_query($sql1);
	$data1 = mysql_fetch_array($query1);
        
$nm_lengkap=$data1['nm_lengkap'];
$nip_baru=$data1['nip_baru'];
$jabatan=$data1['jabatan'];
$pangkat=$data1['pangkat'];
$gol=$data1['gol'];


$document = file_get_contents("mintacuti.rtf");

$document = str_replace("%%nm_lengkap%%", $nm_lengkap, $document);
$document = str_replace("%%nip_baru%%", $nip_baru, $document);
$document = str_replace("%%jabatan%%", $jabatan, $document);
$document = str_replace("%%pangkat%%", $pangkat, $document);
$document = str_replace("%%gol%%", $gol, $document);

$document = str_replace("%%tgl_cuti_awal%%", $tgl_cuti_awal, $document);
$document = str_replace("%%tgl_cuti_akhir%%", $tgl_cuti_akhir, $document);
$document = str_replace("%%alasan_cuti%%", $alasan_cuti, $document);
$document = str_replace("%%kota_cuti%%", $kota_cuti, $document);
$document = str_replace("%%nmatasanlangsung%%", $nmatasanlangsung, $document);
$document = str_replace("%%nipatasanlangsung%%", $nipatasanlangsung, $document);
$document = str_replace("%%jabatanatasanlangsung%%", $jabatanatasanlangsung, $document);
$document = str_replace("%%nmpejabatberwenang%%", $nmpejabatberwenang, $document);
$document = str_replace("%%nippejabatberwenang%%", $nippejabatberwenang, $document);
$document = str_replace("%%jabatanpejabatberwenang%%", $jabatanpejabatberwenang, $document);
$document = str_replace("%%tahuncuti%%", $tahuncuti, $document);
$document = str_replace("%%lamacuti%%", $lamacuti, $document);
$document = str_replace("%%tglinput%%", $tglinput, $document);
$document = str_replace("%%seksi%%", $seksi, $document);
$document = str_replace("%%bidang%%", $bidang, $document);


header("Content-type: application/msword");
header("Content-disposition: inline; filename=permohonancuti.rtf");
header("Content-length: " . strlen($document));
echo $document;



?>



