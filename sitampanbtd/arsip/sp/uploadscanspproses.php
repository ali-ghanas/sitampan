<?php

// setting nama folder tempat upload
$uploaddir = 'suratpengantar/';

// membaca nama file yang diupload
$fileName = $_FILES['userfile']['name'];     

// nama file temporary yang akan disimpan di server
$tmpName  = $_FILES['userfile']['tmp_name']; 

// membaca ukuran file yang diupload
$fileSize = $_FILES['userfile']['size'];

// membaca jenis file yang diupload
$fileType = $_FILES['userfile']['type'];


// koneksi ke mysql
mysql_connect('localhost','sitampan','sitampan');
mysql_select_db('sitampan');

// menyimpan properti atau informasi file ke tabel upload dalam db
// dengan terlebih dahulu mengecek ada tidaknya nama file dalam tabel

$idarsip_sp_detail=$_POST['idarsip_sp_detail'];

$sql = "SELECT * FROM arsip_sp_detail where idarsip_sp_detail='$idarsip_sp_detail'";
$query = mysql_query($sql);
$cek=mysql_numrows($query);
                 

if ($cek > 0)
{
   $query = "UPDATE arsip_sp_detail SET size = '$fileSize',name='$fileName',type='$fileType' WHERE idarsip_sp_detail='$idarsip_sp_detail'";
}
else {echo "Gagal Upload karena belum direkam no spnya";}

mysql_query($query);

// menggabungkan nama folder dan nama file
$uploadfile = $uploaddir . $fileName;

// proses upload file ke folder 'data'
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File telah diupload";
    echo "<script type='text/javascript'>window.location='../../index.php?hal=page_arsip&pilih=upload_sp&id=$idarsip_sp_detail'</script>";
} else {
    echo "File gagal diupload";
     
}

?>
