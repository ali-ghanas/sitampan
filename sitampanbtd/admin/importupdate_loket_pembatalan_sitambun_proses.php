<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Proses</title>
<!--<script type="text/javascript" 
        src="jquery-1.5.1.min.js"></script>-->
<script type="text/javascript" 
        src="lib/js/jquery-ui/js/jquery-ui-1.8.11.custom.min.js"></script>                                  
<link rel="stylesheet" type="text/css"
href="lib/js/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />        
<script type="text/javascript">
   $(document).ready(function() {
      var total = Math.floor(40 + Math.random()*40);
      var akumulasi = 0;
      $("#total").text(total);
      window.setTimeout ("cek()", 0);
   });
   
   function cek() {
      if ( typeof akumulasi == "undefined" ) {
         // Kalau belum terdefinisi
         akumulasi = 0;
         $("#kemajuan").progressbar({
            value: 0
         });         
      }   

      var total = $("#total").text();
      if (akumulasi <= total) {
         akumulasi = akumulasi + 1; 
         $("#kemajuan").progressbar({
            value: Math.floor(akumulasi/total * 100)
         });    
         window.setTimeout ("cek()", 1000);
      }   
   } 
</script>        
</head>
<body>
    <div id="info">Proses ini memakan waktu 
    <span id="total"></span> detik. 
    Persentase pemrosesan hingga saat ini:</div>
    <div id="kemajuan"></div>

<?php
// menggunakan class phpExcelReader
include "excel_reader2.php";

include "lib/koneksi.php";

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
 
// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0); 
// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;
// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
// membaca data bcf15 (kolom ke-1)
$idbcf15 = $data->val($i, 1);
$bcf15no = $data->val($i, 2);
$bcf15tgl = $data->val($i, 3);
$DokumenCode = $data->val($i, 4);
$DokumenNo = $data->val($i, 5);
$DokumenDate = $data->val($i, 6);
$Dokumen2No = $data->val($i, 7);
$Dokumen2Date = $data->val($i, 8);
$setujubatal=$data->val($i, 9);
$SetujuBatalNo = $data->val($i, 10);
$SetujuBatalDate = $data->val($i, 11);
$idseksisetujubatal = $data->val($i, 12);
$nhp_lelang = $data->val($i, 13);
$NHPLelangNo = $data->val($i, 14);
$idstatusakhir = $data->val($i, 15);
$KepLelang1No = $data->val($i, 16);
$KepLelang1Date = $data->val($i, 17);
$KepLelang2No = $data->val($i, 18);
$KepLelang2Date = $data->val($i, 19);
$KepMusnahNo = $data->val($i, 20);
$KepMusnahDate = $data->val($i, 21);
$KepBMNNo = $data->val($i, 22);
$KepBMNDate = $data->val($i, 23);
$NoKepStatus_Akhr = $data->val($i, 24);


// setelah data dibaca, sisipkan ke dalam tabel mhs
//$query = "INSERT INTO bcf15 VALUES ('$idbcf15', '$tahun', '$bcf15no','$bcf15tgl','$bc11no','$bc11tgl','$bc11pos','$bc11subpos','$blno','$bltgl','$saranapengangkut','$voy','$amountbrg','$satuanbrg','$diskripsibrg','$consignee','$consigneeadrress','$consigneekota','$notify','$notifyadrress','$notifykota','$idtps','$idtpp','$idtypecode','$DokumenCode','$suratpengantarno','$suratpengantartgl','$keterangan','$DokumenNo','$DokumenDate','$Dokumen2Code','$Dokumen2No','$Dokumen2Date','$BatalTarik','$BatalTarikNo','$BatalTarikNo2','$BatalTarikDate','$BatalTarikKet','$masuk','$bamasukno','$bamasukdate','$bamasukdatetrx','$keluar','$BAKeluarDateTrx','$pemberitahuan','$suratno','$idtp3','$suratdate','$idseksitp3','$Pelayaran','$PelayaranNo','$Pelayarandate','$perintah','$suratperintahno','$idtp2','$suratperintahdate','$idseksitp2','$CacahType','$Cacah','$NDCacahNo','$NDCacahDate','$CacahNo','$CacahDate','$NHP','$ReqBatal','$Batal','$SuratBatalNo','$SuratBatalDate','$Pemohon','$AlamatPemohon','$ndkonfirmasito','$ndkonfirmasino','$ndkonfirmasino2','$ndkonfirmasidate','$ndkonfirmasijawaban','$jawabanp2Ket','$jawabanp2','$jawabanp2date','$idp2','$segel','$ndsegelno','$ndsegeldate','$idseksitp2bukgel','$SetujuBatalNo','$SetujuBatalNo2','$SetujuBatalDate','$Date_Trx','$UserName','$UserHost','$Description_Trx','$Pecahpos','$idpelayaran','$PelayaranAddress','$PelayaranAlasan','$NoKep','$recordstatus','$idmanifest','$idseksi','$Status_Akhr','$NoKepStatus_Akhr','$BA_Pemusnahan','$TGL_Pemusnahan','$KetBA_Penarikan','$Tgl_Rekam')";
$strSQL  = ("UPDATE bcf15 SET 
                                    DokumenCode='$DokumenCode',
                                    DokumenNo='$DokumenNo',
                                    DokumenDate='$DokumenDate',
                                    Dokumen2No='$Dokumen2No',
                                    Dokumen2Date='$Dokumen2Date',
                                    SetujuBatalNo='$SetujuBatalNo',
                                    SetujuBatalDate='$SetujuBatalDate',
                                    idseksisetujubatal='$idseksisetujubatal',
                                    setujubatal='$setujubatal',
                                    nhp_lelang='$nhp_lelang',				
                                    NHPLelangNo='$NHPLelangNo',
                                    idstatusakhir='$idstatusakhir',
                                    KepLelang1No='$KepLelang1No',
                                    KepLelang2No='$KepLelang2No',
                                    KepLelang1Date='$KepLelang1Date',
                                    KepLelang2Date='$KepLelang2Date',
                                    KepMusnahNo='$KepMusnahNo',
                                    KepMusnahDate='$KepMusnahDate',
                                    KepBMNNo='$KepBMNNo',
                                    KepBMNDate='$KepBMNDate',
                                    NoKepStatus_Akhr='$NoKepStatus_Akhr'
       
WHERE idbcf15='$idbcf15' ");

  $hasil = mysql_query($strSQL)
     or die(mysql_error());


//
//$hasil = mysql_query($query);

// jika proses insert data sukses, maka counter $sukses bertambah
// jika gagal, maka counter $gagal yang bertambah
if ($hasil) $sukses++;
else $gagal++;


}

// tampilan status sukses dan gagal
echo "<h3>Proses import sedang berlangsung.</h3>";
echo "<p>Jumlah data yang akan diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
 
?>
    

</body>
</html>
