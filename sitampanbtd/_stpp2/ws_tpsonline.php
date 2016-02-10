<?
include "lib/koneksi.php";
include "lib/function.php";

$id=$_POST['id6'];
$nip_kasi =$_POST['nip_kasi'];
$tgl_sppb=$_POST['tgl_sppb'];
$no_pibt=$_POST['no_pibt6'];
$tgl_pibt=$_POST['tgl_pibt6'];
$nip_entry=$_POST['nip_entry6'];
$nama_entry=$_POST['nama_entry6'];
$ip_entry= $_SERVER['REMOTE_ADDR'];
$sekarang2 = date('Y-m-d g:i:s');
$setiah2 = date("Y");
?>
<?
$sqlnomor=mysql_query("select MAX(no_sppb) as nomorsaiki, left(tgl_sppb,4) as tahunee from pibt_data WHERE left(tgl_sppb,4)=$setiah2 group by left(tgl_sppb,4)",$koneksi_db);
while ($data = mysql_fetch_array($sqlnomor)) {
$nomorsaiki=$data[nomorsaiki];
$tahune=$data[tahunee];
  }
mysql_free_result($sqlnomor);
?>
<?
$no_sppb = $nomorsaiki+1;
?>
<?

mysql_query("insert into pibt_update(id_pibt,nip,nama,ip,ket) values('$id','$nip_entry','$nama_entry','$ip_entry','Rekam SPPB')");
mysql_query("UPDATE pibt_data SET nip_kasi='$nip_kasi',no_sppb='$no_sppb',tgl_sppb='$tgl_sppb', status='Selesai Rekam SPPB', tgl_status='$sekarang2' WHERE id='$id'");
mysql_query("UPDATE pibt_wk SET wksppb='$sekarang2' WHERE id_pibt='$id'");


$ambildata=mysql_query("select * from pibt_data WHERE id='$id'",$koneksi_db);
while ($data = mysql_fetch_array($ambildata)) {
$nip_entry=$data[nip_entry];
$tgl_entry=$data[tgl_entry];
$ip_entry=$data[ip_entry];
$no_pibt=$data[no_pibt];
$tgl_pibt=$data[tgl_pibt];
$npwp_imp=$data[npwp_imp];
$nm_imp=$data[nm_imp];
$npwp_pemb=$data[npwp_pemb];
$nm_pemb=$data[nm_pemb];
$no_bl=$data[no_bl];
$tgl_bl=tgl_ws($data[tgl_bl]);
$no_bc11=$data[no_bc11];
$tgl_bc11=tgl_ws($data[tgl_bc11]);
$posbc11=$data[posbc11];
$jns_kms=$data[jns_kms];
$jml_kms=$data[jml_kms];
$merk_kms=$data[merk_kms];
$netto=$data[netto];
$bruto=$data[bruto];
$ur_brg=$data[ur_brg];
$jml_cont=$data[jml_cont];
$contjns=$data[contjns];
$cont=$data[cont];
$contuk=$data[contuk];
$contbruto=$data[contbruto];
$contjns2=$data[contjns2];
$cont2=$data[cont2];
$contuk2=$data[contuk2];
$contbruto2=$data[contbruto2];
$contjns3=$data[contjns3];
$cont3=$data[cont3];
$contuk3=$data[contuk3];
$contbruto3=$data[contbruto3];
$contjns4=$data[contjns4];
$cont4=$data[cont4];
$contuk4=$data[contuk4];
$contbruto4=$data[contbruto4];
$contjns5=$data[contjns5];
$cont5=$data[cont5];
$contuk5=$data[contuk5];
$contbruto5=$data[contbruto5];
$na=$data[na];
$shipper=$data[shipper];
$al_shipper=$data[al_shipper];
$sarkut=$data[sarkut];
$voy=$data[voy];
$manif=$data[manif];
$cat_manif=$data[cat_manif];
$nip_pemeriksa1=$data[nip_pemeriksa1];
$nip_pemeriksa2=$data[nip_pemeriksa2];
$tk_periksa=$data[tk_periksa];
$cat_kasi=$data[cat_kasi];
$periksa=$data[periksa];
$lhp=$data[lhp];
$bayar=$data[bayar];
$cat_bayar=$data[cat_bayar];
$tgl_lunas=$data[tgl_lunas];
$nip_kasi=$data[nip_kasi];
$no_sppb=$data[no_sppb];
$tgl_sppb=$data[tgl_sppb];
$lok_brg=$data[lok_brg];
$tps=$data[tps];
$status=$data[status];
$tgl_status=$data[tgl_status];
$cetakiplhp=$data[cetakiplhp];
$cetaksppb=$data[cetaksppb];
$bm=$data[bm];
$ppn=$data[ppn];
$pph=$data[pph];
$ppnbm=$data[ppnbm];
$cukai=$data[cukai];
$jumlah=$data[jumlah];
$cif=$data[cif];
$devisa=$data[devisa];
$denda=$data[denda];
$bunga=$data[bunga];
$no_sptnp=$data[no_sptnp];
$tgl_sptnp=$data[tgl_sptnp];
$no_sspcp=$data[no_sspcp];
$tgl_sspcp=$data[tgl_sspcp];
$npbl=$data[npbl];
$cat_npbl=$data[cat_npbl];
$npblp2=$data[npblp2];
$cat_npblp2=$data[cat_npblp2];
$ket=$data[ket];
  }
mysql_free_result($ambildata);

$tglDokKeluar=tgl_ws($tgl_sppb);

//INSERT KE WEB SERVICE PUSAT JANGAN COBA2 ENTRY DISINI

        // define $client sebagai soap client
        $client = new SoapClient('http://10.0.16.116/PIBKSiap/PIBKSiap?WSDL', array('trace' => 1));

        // define param bernama dkh
        $param = new stdClass();
        $param->dkh = new stdClass();
        $param->dkh->kdKantor = "040300";
        $param->dkh->jnsDok = "1";
        $param->dkh->asalDok = "1";
        $param->dkh->noDokKeluar = "$no_sppb";
        $param->dkh->tglDokKeluar = "$tglDokKeluar";

        $param->dkh->noDokLain = "-";
        $param->dkh->tglDokLain = "-";
        $param->dkh->noDokMohon = "-";
        $param->dkh->tglDokMohon = "-";
        $param->dkh->npwp = "$npwp_imp";

        $param->dkh->nmPerusahaan = "$nm_imp";
        $param->dkh->kdTPS = "$lok_brg";
        $param->dkh->kdGudang = "$lok_brg";
        $param->dkh->jmlCont = $jml_cont;
        $param->dkh->noBC11 = "$no_bc11";

        $param->dkh->tglBC11 = "$tgl_bc11";
        $param->dkh->noPosBC11 = "$posbc11";
        $param->dkh->noBLAWB = "$no_bl";
        $param->dkh->tglBLAWB = "$tgl_bl";
        $param->dkh->nmAngkut = "$sarkut";

        $param->dkh->noVoyFlight = "$voy";
        $param->dkh->catatan = "-";
        $param->dkh->status = "SPP BCF 1.5";
        $param->dkh->npwpPPJK = "$npwp_pemb";
        $param->dkh->nmPPJK = "$nm_pemb";

        // invoke method saveDokumenHeader dan tampung hasilnya dalam array $return
        $return = $client->saveDokumenHeader($param);

        //print_r($return);
        // cek apakah ada return error
        echo "<b>Respon Pengiriman Data ke Kantor Pusat:</b><br><br>";
		if (substr($return->return, 0, 5) == "Error") {
            // terjadi error
            echo $return->return;
        } else {
            // save container atau kemasan
            // $return->return adalah nilai seqId yang akan dipakai pada proses simpan container atau kemasan
            echo "Hasil save header = seqId bernilai " . $return->return;
            
            echo "<br/><br/>";

            // simpan container
            // create daftar kontainer jika misal ada 2 kontainer
if(strlen($cont)>7){			
$paramcon = array(
	array("seqId" => $return->return, "noCont" => "$cont", "ukCont" => "$contuk", "jnsCont" => "$contjns", "bruto" => $contbruto),);}
if(strlen($cont2)>7){			
$paramcon = array(
	array("seqId" => $return->return, "noCont" => "$cont2", "ukCont" => "$contuk2", "jnsCont" => "$contjns2", "bruto" => $contbruto2),);}
if(strlen($cont3)>7){
$paramcon = array(
	array("seqId" => $return->return, "noCont" => "$cont3", "ukCont" => "$contuk3", "jnsCont" => "$contjns3", "bruto" => $contbruto3),);}
if(strlen($cont4)>7){
$paramcon = array(
	array("seqId" => $return->return, "noCont" => "$cont4", "ukCont" => "$contuk4", "jnsCont" => "$contjns4", "bruto" => $contbruto4),);}
if(strlen($cont5)>7){
$paramcon = array(
	array("seqId" => $return->return, "noCont" => "$cont5", "ukCont" => "$contuk5", "jnsCont" => "$contjns5", "bruto" => $contbruto5),);}

            // invoke method saveDokumenContainer
            $returncon = $client->saveDokumenContainer($paramcon);
            echo "Hasil save container = " . $returncon->return;
            
            echo "<br/><br/>";
            
            // simpan kemasan
            // create daftar kemasan misal ada 3 kemasan
            $paramkms = array(
                array("seqId" => $return->return, "jmlKms" => $jml_kms, "jnsKms" => "$jns_kms", "merkKms" => "$merk_kms"),
            );
            
            // invoke method saveDokumenKemasan
            $returnkms = $client->saveDokumenKemasan($paramkms);
            echo "Hasil save kemasan = " . $returnkms->return;
        }

echo "<br><br><div style='font-size:18px;font-weight:bold;'><a href='index2.php?pilih=pibt_daftar'><< Kembali</a></div>";
?>
