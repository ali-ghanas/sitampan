<?
include "../lib/koneksi.php";
include "../lib/function.php";
error_reporting(0);

	       
$suratperintahno=$_POST['suratperintahno'];
$suratperintahdate =$_POST['suratperintahdate'];
$bcf15no=$_POST['bcf15no'];
$bcf15tgl=$_POST['bcf15tgl'];
$blno=$_POST['blno'];
$bltgl=$_POST['bltgl'];
$saranapengangkut=$_POST['saranapengangkut'];
$voy=$_POST['voy'];
$nm_tpp=$_POST['nm_tpp'];
$jmlCont=$_POST['jmlCont'];
$bc11no=$_POST['bc11no'];
$bc11pos=$_POST['bc11pos'];
$bc11subpos=$_POST['bc11subpos'];
$bc11tgl=$_POST['bc11tgl'];
$kd_tpsol=$_POST['kd_tpsol'];
$idbcf15=$_POST['idbcf15'];



//$ip_entry= $_SERVER['REMOTE_ADDR'];
//$sekarang2 = date('Y-m-d g:i:s');
//$setiah2 = date("Y");
?>

<?



$ambildata=mysql_query("select idbcf15,tahun,bcf15no,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,saranapengangkut,voy,amountbrg,satuanbrg,idtps,bcf15.idtpp,nm_tpp,tpp.idtpp,npwp_tpp,kirim_tpsol,jmlCont,nip_rekam,status,kd_tpsol,suratperintahno,suratperintahdate,amountbrg,satuanbrg
        from bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15='$idbcf15'");
while ($databcf15 = mysql_fetch_array($ambildata)) {
$bcf15no=$databcf15['bcf15no'];
$bcf15tgl=$databcf15['bcf15tgl'];
$bc11no=$databcf15['bc11no'];
$bc11tgl=$databcf15['bc11tgl'];
$bc11pos=$databcf15['bc11pos'];
$bc11subpos=$databcf15['bc11subpos'];
$blno=$databcf15['blno'];
$bltgl=$databcf15['bltgl'];
$saranapengangkut=$databcf15['saranapengangkut'];
$voy=$databcf15['voy'];
$amountbrg=$databcf15['amountbrg'];
$satuanbrg=$databcf15['satuanbrg'];
$npwp_tpp=$databcf15['npwp_tpp'];
$nm_tpp=$databcf15['nm_tpp'];
$jmlCont=$databcf15['jmlCont'];
$kd_tpsol=$databcf15['kd_tpsol'];
$suratperintahno=$databcf15['suratperintahno'];
$kdsuratperintah='/KPU.01/BD.0404/';
$suratperintahdate=$databcf15['suratperintahdate'];
$kd_tpsol=$databcf15['kd_tpsol'];

$merk_kms='-';
  }
  
mysql_free_result($ambildata);

$tglDokKeluar=tgl_ws($suratperintahdate);
$bc11tglws=tgl_ws($bc11tgl);
$bltglws=tgl_ws($bltgl);
$suratperintahlengkap=$suratperintahno;
$bc11possubpos=$bc11pos.$bc11subpos;
$contjenis='';
$contbruto='';

echo "Jumlah Container =$jmlCont";
echo "No Pos BC 1.1 = $bc11possubpos";
echo "No Surat Perintah= $suratperintahlengkap";

////INSERT KE WEB SERVICE PUSAT JANGAN COBA2 ENTRY DISINI

        // define $client sebagai soap client
        $client = new SoapClient('http://10.0.16.116/PIBKSiap/PIBKSiap?WSDL', array('trace' => 1));

        // define param bernama dkh
        $param = new stdClass();
        $param->dkh = new stdClass();
        $param->dkh->kdKantor = "040300";
        $param->dkh->jnsDok = "9";
        $param->dkh->asalDok = "9";
        $param->dkh->noDokKeluar = "tes";
        $param->dkh->tglDokKeluar = "$tglDokKeluar";

        $param->dkh->noDokLain = "-";
        $param->dkh->tglDokLain = "-";
        $param->dkh->noDokMohon = "-";
        $param->dkh->tglDokMohon = "-";
        $param->dkh->npwp = "tes";

        $param->dkh->nmPerusahaan = "tes";
        $param->dkh->kdTPS = "JICT";
        $param->dkh->kdGudang = "JICT";
        $param->dkh->jmlCont = $jmlCont;
        $param->dkh->noBC11 = "$bc11no";

        $param->dkh->tglBC11 = "$bc11tglws";
        $param->dkh->noPosBC11 = "$bc11possubpos";
        $param->dkh->noBLAWB = "$blno";
        $param->dkh->tglBLAWB = "$bltglws";
        $param->dkh->nmAngkut = "$saranapengangkut";

        $param->dkh->noVoyFlight = "$voy";
        $param->dkh->catatan = "-";
        $param->dkh->status = "3";
        $param->dkh->npwpPPJK = "-";
        $param->dkh->nmPPJK = "-";

        // invoke method saveDokumenHeader dan tampung hasilnya dalam array $return
        $return = $client->saveDokumenHeader($param);

        print_r($return);
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
            $query = "select * from bcfcontainer where idbcf15=$idbcf15";
                                                $result = mysql_query($query);
                                                
                                                $num_rows = mysql_num_rows($result);
                                                
                                                
                                                for($i = 0; $i < $num_rows; $i++) {
                                                $row = mysql_fetch_array($result);
                                                $conti=$row[nocontainer];
                                                $contuk=$row[idsize];
                                                
                                                
                                                
		
$paramcon = array(
	array("seqId" => $return->return, "noCont" => "$conti", "ukCont" => "$contuk", "jnsCont" => "$contjenis", "bruto" => $contbruto),);

 }
            // invoke method saveDokumenContainer
            $returncon = $client->saveDokumenContainer($paramcon);
            echo "Hasil save container = " . $returncon->return;
            
            echo "<br/><br/>";
            
            // simpan kemasan
            // create daftar kemasan misal ada 3 kemasan
            $paramkms = array(
                array("seqId" => $return->return, "jmlKms" => "$amountbrg", "jnsKms" => "$satuanbrg", "merkKms" => "$merk_kms"),
            );
            
            // invoke method saveDokumenKemasan
            $returnkms = $client->saveDokumenKemasan($paramkms);
            echo "Hasil save kemasan = " . $returnkms->return;
        }

echo "<br><br><div style='font-size:18px;font-weight:bold;'><a href='../index.php?hal=pagetpp2&pilih=kon_tpsol_view&id=$idbcf15'><< Kembali</a></div>";
        
?>
