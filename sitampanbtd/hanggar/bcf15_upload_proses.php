<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Proses</title>
<!--<script type="text/javascript" 
        src="jquery-1.5.1.min.js"></script>-->
    
</head>
<body>
    
<?php
// menggunakan class phpExcelReader
include "excel_reader2.php";
include "lib/koneksi.php";
include "lib/function.php";

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
 
// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0); 
// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;
// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=3; $i<=$baris; $i++)
{
// membaca data bcf15 (kolom ke-1)
$idbcf15 = $data->val($i, 1);
$bcf15no = $data->val($i, 2);
$tahun = $data->val($i, 3);
$masuk = $data->val($i, 4);
$bamasukno = $data->val($i, 5);
$bamasukdate1 = $data->val($i, 6);
$bamasukdate=exc_ke_sql($bamasukdate1);

$stafhgr = $data->val($i, 7);
$nipstafhgr = $data->val($i, 8);
$tglrekam1 = $data->val($i, 9);
$tglrekam=exc_ke_sql($tglrekam1);
$keterangan = $data->val($i, 10);
$statusupload = $data->val($i, 11);

$tgl_upload=date('Y-m-d');
$tgl_upload_now=date('Y-m-d H:i:s');
$user=$_SESSION['nm_lengkap'];


// setelah data dibaca, sisipkan ke dalam tabel mhs
//$query = "INSERT INTO bcf15 VALUES ('$idbcf15', '$tahun', '$bcf15no','$bcf15tgl','$bc11no','$bc11tgl','$bc11pos','$bc11subpos','$blno','$bltgl','$saranapengangkut','$voy','$amountbrg','$satuanbrg','$diskripsibrg','$consignee','$consigneeadrress','$consigneekota','$notify','$notifyadrress','$notifykota','$idtps','$idtpp','$idtypecode','$DokumenCode','$suratpengantarno','$suratpengantartgl','$keterangan','$DokumenNo','$DokumenDate','$Dokumen2Code','$Dokumen2No','$Dokumen2Date','$BatalTarik','$BatalTarikNo','$BatalTarikNo2','$BatalTarikDate','$BatalTarikKet','$masuk','$bamasukno','$bamasukdate','$bamasukdatetrx','$keluar','$BAKeluarDateTrx','$pemberitahuan','$suratno','$idtp3','$suratdate','$idseksitp3','$Pelayaran','$PelayaranNo','$Pelayarandate','$perintah','$suratperintahno','$idtp2','$suratperintahdate','$idseksitp2','$CacahType','$Cacah','$NDCacahNo','$NDCacahDate','$CacahNo','$CacahDate','$NHP','$ReqBatal','$Batal','$SuratBatalNo','$SuratBatalDate','$Pemohon','$AlamatPemohon','$ndkonfirmasito','$ndkonfirmasino','$ndkonfirmasino2','$ndkonfirmasidate','$ndkonfirmasijawaban','$jawabanp2Ket','$jawabanp2','$jawabanp2date','$idp2','$segel','$ndsegelno','$ndsegeldate','$idseksitp2bukgel','$SetujuBatalNo','$SetujuBatalNo2','$SetujuBatalDate','$Date_Trx','$UserName','$UserHost','$Description_Trx','$Pecahpos','$idpelayaran','$PelayaranAddress','$PelayaranAlasan','$NoKep','$recordstatus','$idmanifest','$idseksi','$Status_Akhr','$NoKepStatus_Akhr','$BA_Pemusnahan','$TGL_Pemusnahan','$KetBA_Penarikan','$Tgl_Rekam')";
if($statusupload=='BAMASUK'){
    $sql = "SELECT * FROM bcf15_masuktpp where (idbcf15='$idbcf15')";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    $updatebcf15  = ("UPDATE bcf15 SET 

                    masuk='$masuk',
                    bamasukno='$bamasukno',
                    bamasukdate='$bamasukdate',
                    bamasukdatetrx='$tglrekam'
                            
                    WHERE idbcf15='$idbcf15' ");
                    
                     $hasilbtlpech1 = mysql_query($updatebcf15)
                         or die(mysql_error());
                   
                }
                 else
                {
                    $strSQL  = "INSERT INTO bcf15_masuktpp (
                idbcf15,
                nobcf15,
                tahun,
                masuk,
                bamasukno,
                bamasukdate,
                tglinputba,
                nmuser,
                nipuser
                     
                
             ) 

            VALUES 
            ( 
            '$idbcf15',
            '$bcf15no',
            '$tahun',
            '$masuk',
            '$bamasukno',
            '$bamasukdate',
            '$tglrekam',
            '$stafhgr',
            '$nipstafhgr'

        );";
                     $updatebcf15  = ("UPDATE bcf15 SET 

                    masuk='$masuk',
                    bamasukno='$bamasukno',
                    bamasukdate='$bamasukdate',
                    bamasukdatetrx='$tglrekam'
                            
                    WHERE idbcf15='$idbcf15' ");
                    
                     $hasilbtlpech1 = mysql_query($updatebcf15)
                         or die(mysql_error());

          $hasil = mysql_query($strSQL)
             or die(mysql_error());
          
                }
                if ($hasil) {$sukses++;}
                else {$gagal++;}
}
else{
                     echo '<script type="text/javascript">
                    alert("Anda Salah memilih excellnya.");</script>';           
                    echo "<script type='text/javascript'>window.location='index.php?hal=upload_hgr'</script>";
}
                
   }

// tampilan status sukses dan gagal
echo "<h3>Upload Berita Acara Penarikan BCF 1.5..</h3>";
echo "<p>Sukses Terupdate  : ".$sukses."<br>";
echo "Gagal update : ".$gagal."</p>";
 echo "<br/>";
 
 

echo "<script type='text/javascript'>window.location='index.php?hal=upload_cont'</script>";
?>
    

</body>
</html>
