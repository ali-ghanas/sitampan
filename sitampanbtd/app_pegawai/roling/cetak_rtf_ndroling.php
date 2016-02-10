<?php
include '../../lib/koneksi.php';
include '../../lib/function.php';

$id = $_GET['id'];
        $sql = "SELECT * FROM ndroling WHERE idndroling='$id'";
        $query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        

$hal_roling = $data['hal_roling'];
$kepada = $data['kepada'];
$darind = $data['darind'];
$idseksi = $data['idseksi'];
$tmt_roling = tglindo($data['tmt_roling']);
$tglinput_roling=tglindo($data['tglinput_roling']);
$tahun=date('Y');


        $sql1 = "SELECT * FROM seksi WHERE idseksi='$idseksi'";
        $query1 = mysql_query($sql1);
	$data1 = mysql_fetch_array($query1);
        
$nm_seksi=$data1['nm_seksi'];
$nip=$data1['nip'];
$jabatan=$data1['jabatan'];
$plh=$data1['plh'];


$document = file_get_contents("ndroling.rtf");

$document = str_replace("%%hal_roling%%", $hal_roling, $document);
$document = str_replace("%%kepada%%", $kepada, $document);
$document = str_replace("%%darind%%", $darind, $document);
$document = str_replace("%%tmt_roling%%", $tmt_roling, $document);
$document = str_replace("%%tglinput_roling%%", $tglinput_roling, $document);
$document = str_replace("%%tahun%%", $tahun, $document);


$document = str_replace("%%nm_seksi%%", $nm_seksi, $document);
$document = str_replace("%%nip%%", $nip, $document);
$document = str_replace("%%jabatan%%", $jabatan, $document);
$document = str_replace("%%plh%%", $plh, $document);


header("Content-type: application/msword");
header("Content-disposition: inline; filename=NotaDinas.rtf");
header("Content-length: " . strlen($document));
echo $document;



?>



