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
for ($i=2; $i<=$baris; $i++)
{
// membaca data bcf15 (kolom ke-1)
$idcontainer = $data->val($i, 1);
$nocontainer = $data->val($i, 2);
$idsize = $data->val($i, 3);
$tgl_keluar1 = $data->val($i, 4);
$tgl_keluar=exc_ke_sql($tgl_keluar1);

$tglinput_keluar1 = $data->val($i, 5);
$tglinput_keluar=exc_ke_sql_time($tglinput_keluar1);

$tglvalidasi1 = $data->val($i, 6);
$tglvalidasi=exc_ke_sql($tglvalidasi1);

$nm_petugas_keluar = $data->val($i, 7);
$nipstafhgr = $data->val($i, 8);
$statusupload = $data->val($i, 9);


$tgl_upload=date('Y-m-d');
$tgl_upload_now=date('Y-m-d H:i:s');
$user=$_SESSION['nm_lengkap'];

if($statusupload=='CONTOUT'){
        $updatecont  = ("UPDATE bcfcontainer SET 

                    tgl_keluar='$tgl_keluar',
                    tglinput_keluar='$tglinput_keluar',
                    nm_petugas_keluar='$nm_petugas_keluar',
                    ip_petugas_keluar='$nipstafhgr',
                    statuspintu='OUT'
                             
                    WHERE idcontainer='$idcontainer' ");
                    
                     $hasil = mysql_query($updatecont)
                         or die(mysql_error());
}
else{
                    echo '<script type="text/javascript">
                    alert("Anda Salah memilih excellnya.");</script>';           
                    echo "<script type='text/javascript'>window.location='index.php?hal=upload_contout'</script>";
}
                    
 }
         
                if ($hasil) {$sukses++;}
                else {$gagal++;}
  

// tampilan status sukses dan gagal
echo "<h3>Upload Container Masuk</h3>";
echo "<p>Sukses Terupdate  : ".$sukses."<br>";
echo "Gagal update : ".$gagal."</p>";
 echo "<br/>";
 
 

echo "<script type='text/javascript'>window.location='index.php?hal=upload_out_valid'</script>";
?>
    

</body>
</html>
