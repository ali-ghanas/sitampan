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

// koneksi ke mysql
// koneksi ke mysql
$host = "localhost";
$user = "sitampan";
$pwd = "sitampan";
$conn = mysql_connect ($host, $user, $pwd)
         or die ("Koneksi Gagal, karena " . mysql_error());
mysql_select_db("sitampan",$conn);

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
// membaca data nim (kolom ke-1)
$idbcf15 = $data->val($i, 1);
$tahun = $data->val($i, 2);
$bcf15no = $data->val($i, 3);
$bcf15tgl = $data->val($i, 4);
$bc11no = $data->val($i, 5);
$bc11tgl = $data->val($i, 6);
$bc11pos = $data->val($i, 7);
$bc11subpos = $data->val($i, 8);
$blno = $data->val($i, 9);
$bltgl = $data->val($i, 10);
$saranapengangkut = $data->val($i, 11);
$voy = $data->val($i, 12);
$amountbrg = $data->val($i, 13);
$satuanbrg = $data->val($i, 14);
$diskripsibrg = $data->val($i, 15);
$consignee = $data->val($i, 16);
$consigneeadrress = $data->val($i, 17);
$consigneekota = $data->val($i, 18);
$notify = $data->val($i, 19);
$notifyadrress = $data->val($i, 20);
$notifykota = $data->val($i, 21);
$idtps = $data->val($i, 22);
$idtpp = $data->val($i, 23);
$idtypecode = $data->val($i, 24);
$DokumenCode = $data->val($i, 25);
$suratpengantarno = $data->val($i, 26);
$suratpengantartgl = $data->val($i, 27);
$keterangan = $data->val($i, 28);
$DokumenNo = $data->val($i, 29);
$DokumenDate = $data->val($i, 30);
$Dokumen2Code = $data->val($i, 31);
$Dokumen2No = $data->val($i, 32);
$Dokumen2Date = $data->val($i, 33);
$BatalTarik = $data->val($i, 34);
$BatalTarikNo = $data->val($i, 35);
$BatalTarikNo2 = $data->val($i, 36);
$BatalTarikDate = $data->val($i, 37);
$BatalTarikKet = $data->val($i, 38);
$masuk = $data->val($i, 39);
$bamasukno = $data->val($i, 40);
$bamasukdate = $data->val($i, 41);
$bamasukdatetrx = $data->val($i, 42);
$keluar = $data->val($i, 43);
$BAKeluarDateTrx = $data->val($i, 44);
$pemberitahuan = $data->val($i, 45);
$suratno = $data->val($i, 46);
$idtp3 = $data->val($i, 47);
$suratdate = $data->val($i, 48);
$idseksitp3 = $data->val($i, 49);
$Pelayaran = $data->val($i, 50);
$PelayaranNo = $data->val($i, 51);
$Pelayarandate = $data->val($i, 52);
$perintah = $data->val($i, 53);
$suratperintahno = $data->val($i, 54);
$idtp2 = $data->val($i, 55);
$suratperintahdate = $data->val($i, 56);
$idseksitp2 = $data->val($i, 57);
$CacahType = $data->val($i, 58);
$Cacah = $data->val($i, 59);
$NDCacahNo = $data->val($i, 60);
$NDCacahDate = $data->val($i, 61);
$CacahNo = $data->val($i, 62);
$CacahDate = $data->val($i, 63);
$NHP = $data->val($i, 64);
$ReqBatal = $data->val($i, 65);
$Batal = $data->val($i, 66);
$SuratBatalNo = $data->val($i, 67);
$SuratBatalDate = $data->val($i, 68);
$Pemohon = $data->val($i, 69);
$AlamatPemohon = $data->val($i, 70);
$ndkonfirmasito = $data->val($i, 71);
$ndkonfirmasino = $data->val($i, 72);
$ndkonfirmasino2 = $data->val($i, 73);
$ndkonfirmasidate = $data->val($i, 74);
$idseksindkonfirmasi = $data->val($i, 75);
$ndkonfirmasijawaban = $data->val($i, 76);
$jawabanp2Ket = $data->val($i, 77);
$jawabanp2 = $data->val($i, 78);
$jawabanp2date = $data->val($i, 79);
$idseksip2ndkonfjwb = $data->val($i, 80);
$jawabanndkonfirmasi= $data->val($i, 81);
$idp2 = $data->val($i, 82);
$segel = $data->val($i, 83);
$ndsegelno = $data->val($i, 84);
$ndsegeldate = $data->val($i, 85);
$idseksitp2bukgel = $data->val($i, 86);
$SetujuBatalNo = $data->val($i, 87);
$SetujuBatalNo2 = $data->val($i, 88);
$SetujuBatalDate = $data->val($i, 89);
$Date_Trx = $data->val($i, 89);
$UserName = $data->val($i, 91);
$UserHost = $data->val($i, 92);
$Description_Trx = $data->val($i, 93);
$Pecahpos = $data->val($i, 94);
$idpelayaran = $data->val($i, 95);
$PelayaranAddress = $data->val($i, 96);
$PelayaranAlasan = $data->val($i, 97);
$recordstatus = $data->val($i, 98);
$idmanifest = $data->val($i, 99);
$idseksi = $data->val($i, 100);
$Status_Akhr = $data->val($i, 101);
$NoKepStatus_Akhr = $data->val($i, 102);
$BA_Pemusnahan = $data->val($i, 103);
$TGL_Pemusnahan = $data->val($i, 104);
$KetBA_Penarikan = $data->val($i, 105);
$jalur = $data->val($i, 106);
$NHPLelangNo = $data->val($i, 107);
$NHPLelangDate = $data->val($i, 108);
$CacahLelangNo = $data->val($i, 109);
$CacahLelangNo2 = $data->val($i, 110);
$CacahLelangDate = $data->val($i, 111);
$BalaiLelangCode = $data->val($i, 112);
$KepLelang1No = $data->val($i, 113);
$KepLelang1Date = $data->val($i, 114);
$KepLimit1No = $data->val($i, 115);
$KepLimit1Date = $data->val($i, 116);
$SuratSewaGudang1No = $data->val($i, 117);
$SuratSewaGudang1Date = $data->val($i, 118);
$JawabanSewaGudang1No = $data->val($i, 119);
$JawabanSewaGudang1Date = $data->val($i, 120);
$StatusLelang1Code = $data->val($i, 121);
$StatusLelang1Date = $data->val($i, 122);
$KepLelang2No = $data->val($i, 123);
$KepLelang2Date = $data->val($i, 124);
$KepLimit2No = $data->val($i, 125);
$KepLimit2Date = $data->val($i, 126);
$SuratSewaGudang2No = $data->val($i, 127);
$SuratSewaGudang2Date = $data->val($i, 128);
$JawabanSewaGudang2No = $data->val($i, 129);
$JawabanSewaGudang2Date = $data->val($i, 130);
$StatusLelang2Code = $data->val($i, 131);
$StatusLelang2Date = $data->val($i, 132);
$SuratKePusatNo = $data->val($i, 133);
$SuratKePusatDate = $data->val($i, 134);
$UsulanKePusatCode = $data->val($i, 135);
$JawabanPusatNo = $data->val($i, 136);
$JawabanPusatDate = $data->val($i, 137);
$JawabanPusatCode = $data->val($i, 138);
$PersetujuanMenkeuNo = $data->val($i, 139);
$PersetujuanMenkeuDate = $data->val($i, 140);
$PersetujuanMenkeuCode = $data->val($i, 141);
$KepMusnahNo = $data->val($i, 142);
$KepMusnahDate = $data->val($i, 143);
$TempatMusnah = $data->val($i, 144);
$PenanggungJawabBiaya = $data->val($i, 145);
$SuratTugasNo = $data->val($i, 146);
$SuratTugasDate = $data->val($i, 147);
$KepBMNNo = $data->val($i, 148);
$KepBMNDate = $data->val($i, 149);
$ApraisalNo = $data->val($i, 150);
$ApraisalDate = $data->val($i, 151);
$JawabanApraisalNo = $data->val($i, 152);
$JawabanApraisalDate = $data->val($i, 153);
$NilaiApraisal = $data->val($i, 154);
$SuratSewaTempatNo = $data->val($i, 155);
$SuratSewaTempatDate = $data->val($i, 156);
$JawabanSewaTempatNo = $data->val($i, 157);
$JawabanSewaTempatDate = $data->val($i, 158);
$UsulanBMNKePusatNo = $data->val($i, 159);
$UsulanBMNKePusatDate = $data->val($i, 160);
$UsulanBMNKePusatCode = $data->val($i, 161);
$JawabanBMNPusatNo = $data->val($i, 162);
$JawabanBMNPusatDate = $data->val($i, 163);
$JawabanBMNPusatCode = $data->val($i, 164);
$PersetujuanMKNo = $data->val($i, 165);
$PersetujuanMKDate = $data->val($i, 166);
$PersetujuanMKCode = $data->val($i, 167);
$idseksisetujubatal = $data->val($i, 168);
$setujubatal = $data->val($i, 169);
$ndkonfirmasi = $data->val($i, 170);

// setelah data dibaca, sisipkan ke dalam tabel mhs
//$query = "INSERT INTO bcf15 VALUES ('$idbcf15', '$tahun', '$bcf15no','$bcf15tgl','$bc11no','$bc11tgl','$bc11pos','$bc11subpos','$blno','$bltgl','$saranapengangkut','$voy','$amountbrg','$satuanbrg','$diskripsibrg','$consignee','$consigneeadrress','$consigneekota','$notify','$notifyadrress','$notifykota','$idtps','$idtpp','$idtypecode','$DokumenCode','$suratpengantarno','$suratpengantartgl','$keterangan','$DokumenNo','$DokumenDate','$Dokumen2Code','$Dokumen2No','$Dokumen2Date','$BatalTarik','$BatalTarikNo','$BatalTarikNo2','$BatalTarikDate','$BatalTarikKet','$masuk','$bamasukno','$bamasukdate','$bamasukdatetrx','$keluar','$BAKeluarDateTrx','$pemberitahuan','$suratno','$idtp3','$suratdate','$idseksitp3','$Pelayaran','$PelayaranNo','$Pelayarandate','$perintah','$suratperintahno','$idtp2','$suratperintahdate','$idseksitp2','$CacahType','$Cacah','$NDCacahNo','$NDCacahDate','$CacahNo','$CacahDate','$NHP','$ReqBatal','$Batal','$SuratBatalNo','$SuratBatalDate','$Pemohon','$AlamatPemohon','$ndkonfirmasito','$ndkonfirmasino','$ndkonfirmasino2','$ndkonfirmasidate','$ndkonfirmasijawaban','$jawabanp2Ket','$jawabanp2','$jawabanp2date','$idp2','$segel','$ndsegelno','$ndsegeldate','$idseksitp2bukgel','$SetujuBatalNo','$SetujuBatalNo2','$SetujuBatalDate','$Date_Trx','$UserName','$UserHost','$Description_Trx','$Pecahpos','$idpelayaran','$PelayaranAddress','$PelayaranAlasan','$NoKep','$recordstatus','$idmanifest','$idseksi','$Status_Akhr','$NoKepStatus_Akhr','$BA_Pemusnahan','$TGL_Pemusnahan','$KetBA_Penarikan','$Tgl_Rekam')";
$strSQL  = ("UPDATE bcf15 SET 


bcf15no='$bcf15no',
bcf15tgl='$bcf15tgl',
bc11no='$bc11no',
bc11tgl='$bc11tgl',
bc11pos='$bc11pos',
bc11subpos='$bc11subpos',
blno='$blno',
bltgl='$bltgl',
saranapengangkut='$saranapengangkut',
voy='$voy',
amountbrg='$amountbrg',
satuanbrg='$satuanbrg',
diskripsibrg='$diskripsibrg',
consignee='$consignee',
consigneeadrress='$consigneeadrress',
consigneekota='$consigneekota',
notify='$notify',
notifyadrress='$notifyadrress',
notifykota='$notifykota',
idtps='$idtps',
idtpp='$idtpp',
idtypecode='$idtypecode',
DokumenCode='$DokumenCode',
suratpengantarno='$suratpengantarno',
suratpengantartgl='$suratpengantartgl',
keterangan='$keterangan',
DokumenNo='$DokumenNo',
DokumenDate='$DokumenDate',
Dokumen2Code='$Dokumen2Code',
Dokumen2No='$Dokumen2No',
Dokumen2Date='$Dokumen2Date',
BatalTarik='$BatalTarik',
BatalTarikNo='$BatalTarikNo',
BatalTarikNo2='$BatalTarikNo2',
BatalTarikDate='$BatalTarikDate',
BatalTarikKet='$BatalTarikKet',
masuk='$masuk',
bamasukno='$bamasukno',
bamasukdate='$bamasukdate',
bamasukdatetrx='$bamasukdatetrx',
keluar='$keluar',
BAKeluarDateTrx='$BAKeluarDateTrx',
pemberitahuan='$pemberitahuan',
suratno='$suratno',
idtp3='$idtp3',
suratdate='$suratdate',
idseksitp3='$idseksitp3',
Pelayaran='$Pelayaran',   
PelayaranNo='$PelayaranNo',
Pelayarandate='$Pelayarandate',
perintah='$perintah',
suratperintahno='$suratperintahno',  
idtp2='$idtp2',
suratperintahdate='$suratperintahdate',
idseksitp2='$idseksitp2',
CacahType='$CacahType',
Cacah='$Cacah',
NDCacahNo='$NDCacahNo',
NDCacahDate='$NDCacahDate',
CacahNo='$CacahNo',
CacahDate='$CacahDate',
NHP='$NHP',
ReqBatal='$ReqBatal',
Batal='$Batal',
SuratBatalNo='$SuratBatalNo',
SuratBatalDate='$SuratBatalDate',
Pemohon='$Pemohon',
AlamatPemohon='$AlamatPemohon', 
ndkonfirmasito='$ndkonfirmasito',
ndkonfirmasino='$ndkonfirmasino',
ndkonfirmasino2='$ndkonfirmasino2',
ndkonfirmasidate='$ndkonfirmasidate',
idseksindkonfirmasi='$idseksindkonfirmasi',
ndkonfirmasijawaban='$ndkonfirmasijawaban', 
jawabanp2Ket='$jawabanp2Ket',
jawabanp2='$jawabanp2',
jawabanp2date='$jawabanp2date',
idseksip2ndkonfjwb='$idseksip2ndkonfjwb',
jawabanndkonfirmasi='$jawabanndkonfirmasi',
idp2='$idp2',
segel='$segel',
ndsegelno='$ndsegelno',
ndsegeldate='$ndsegeldate',
idseksitp2bukgel='$idseksitp2bukgel',
SetujuBatalNo='$SetujuBatalNo',
SetujuBatalNo2='$SetujuBatalNo2',
SetujuBatalDate='$SetujuBatalDate',
Date_Trx='$Date_Trx',
UserName='$UserName',
UserHost='$UserHost',
Description_Trx='$Description_Trx',  
Pecahpos='$Pecahpos',
idpelayaran='$idpelayaran',
PelayaranAddress='$PelayaranAddress',
PelayaranAlasan='$PelayaranAlasan',
NHPLelangNo='$NHPLelangNo',
NHPLelangDate='$NHPLelangDate',
CacahLelangNo='$CacahLelangNo',
CacahLelangNo2='$CacahLelangNo2',
CacahLelangDate='$CacahLelangDate',
BalaiLelangCode='$BalaiLelangCode',
KepLelang1No='$KepLelang1No',
KepLelang1Date='$KepLelang1Date',
KepLimit1No='$KepLimit1No',
KepLimit1Date='$KepLimit1Date',
SuratSewaGudang1No='$SuratSewaGudang1No',
SuratSewaGudang1Date='$SuratSewaGudang1Date',
JawabanSewaGudang1No='$JawabanSewaGudang1No',
JawabanSewaGudang1Date='$JawabanSewaGudang1Date',
StatusLelang1Code='$StatusLelang1Code',
StatusLelang1Date='$StatusLelang1Date',
KepLelang2No='$KepLelang2No',
KepLelang2Date='$KepLelang2Date',
KepLimit2No='$KepLimit2No',
KepLimit2Date='$KepLimit2Date',
SuratSewaGudang2No='$SuratSewaGudang2No',
SuratSewaGudang2Date='$SuratSewaGudang2Date',
JawabanSewaGudang2No='$JawabanSewaGudang2No',
JawabanSewaGudang2Date='$JawabanSewaGudang2Date',
StatusLelang2Code='$StatusLelang2Code',
StatusLelang2Date='$StatusLelang2Date', 
SuratKePusatNo='$SuratKePusatNo',
SuratKePusatDate='$SuratKePusatDate',
UsulanKePusatCode='$UsulanKePusatCode',
JawabanPusatNo='$JawabanPusatNo',
JawabanPusatDate='$JawabanPusatDate',
JawabanPusatCode='$JawabanPusatCode',
PersetujuanMenkeuNo='$PersetujuanMenkeuNo',
PersetujuanMenkeuDate='$PersetujuanMenkeuDate',
PersetujuanMenkeuCode='$PersetujuanMenkeuCode',
KepMusnahNo='$KepMusnahNo',
KepMusnahDate='$KepMusnahDate',
TempatMusnah='$TempatMusnah',
PenanggungJawabBiaya='$PenanggungJawabBiaya',
SuratTugasNo='$SuratTugasNo',
SuratTugasDate='$SuratTugasDate',
KepBMNNo='$KepBMNNo',
KepBMNDate='$KepBMNDate',
ApraisalNo='$ApraisalNo',
ApraisalDate='$ApraisalDate',
JawabanApraisalNo='$JawabanApraisalNo',
JawabanApraisalDate='$JawabanApraisalDate',
NilaiApraisal='$NilaiApraisal',
SuratSewaTempatNo='$SuratSewaTempatNo',
SuratSewaTempatDate='$SuratSewaTempatDate',
JawabanSewaTempatNo='$JawabanSewaTempatNo',
JawabanSewaTempatDate='$JawabanSewaTempatDate',
UsulanBMNKePusatNo='$UsulanBMNKePusatNo',
UsulanBMNKePusatDate='$UsulanBMNKePusatDate',
UsulanBMNKePusatCode='$UsulanBMNKePusatCode',
JawabanBMNPusatNo='$JawabanBMNPusatNo', 
JawabanBMNPusatDate='$JawabanBMNPusatDate',
JawabanBMNPusatCode='$JawabanBMNPusatCode',
PersetujuanMKNo='$PersetujuanMKNo',
PersetujuanMKDate='$PersetujuanMKDate',
PersetujuanMKCode='$PersetujuanMKCode',
idseksisetujubatal='$idseksisetujubatal',
setujubatal='$setujubatal',
ndkonfirmasi='$ndkonfirmasi'
WHERE idbcf15='$idbcf15' and tahun='$tahun'");


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
