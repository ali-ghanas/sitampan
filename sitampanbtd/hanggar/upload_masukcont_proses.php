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
$tg_masuk1 = $data->val($i, 4);
$tg_masuk=exc_ke_sql($tg_masuk1);

$tgl_input_masuk1 = $data->val($i, 5);
$tgl_input_masuk=exc_ke_sql($tgl_input_masuk1);

$tglvalidasi1 = $data->val($i, 6);
$tglvalidasi=exc_ke_sql($tglvalidasi1);

$nm_petugas_masuk = $data->val($i, 7);
$nipstafhgr = $data->val($i, 8);
$statusupload = $data->val($i, 9);


$tgl_upload=date('Y-m-d');
$tgl_upload_now=date('Y-m-d H:i:s');
$user=$_SESSION['nm_lengkap'];

if($statusupload=='CONTMASUK'){
     $updatebcf15  = ("UPDATE bcfcontainer SET 

                    tg_masuk='$tg_masuk',
                    tgl_input_masuk='$tgl_input_masuk',
                    nm_petugas_masuk='$nm_petugas_masuk',
                    ip_petugas_masuk='$nipstafhgr'
                    
                             
                    WHERE idcontainer='$idcontainer' ");
                    
                     $hasil = mysql_query($updatebcf15)
                         or die(mysql_error());
}
else{
                    echo '<script type="text/javascript">
                    alert("Anda Salah memilih excellnya.");</script>';           
                    echo "<script type='text/javascript'>window.location='index.php?hal=upload_cont'</script>";
}
                   
 }
         
                if ($hasil) {$sukses++;}
                else {$gagal++;}
  

// tampilan status sukses dan gagal
echo "<h3>Upload Container Masuk</h3>";
echo "<p>Sukses Terupdate  : ".$sukses."<br>";
echo "Gagal update : ".$gagal."</p>";
 echo "<br/>";
 
 echo "<script type='text/javascript'>window.location='index.php?hal=upload_hgr'</script>";

echo "<script type='text/javascript'>window.location='index.php?hal=upload_cont'</script>";
?>
    

</body>
</html>
