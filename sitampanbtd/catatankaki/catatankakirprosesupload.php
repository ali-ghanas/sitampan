<?php

// setting nama folder tempat upload
$uploaddir = 'G:\arsip\atensi/';

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

$idbcf15=$_POST['id'];

$sql = "SELECT * FROM catatan_kaki where idbcf15='$idbcf15'";
$query = mysql_query($sql);
$cek=mysql_numrows($query);
$now=date('Y-m-d H:i:s');
                 

if ($cek > 0)
{
   $query = "UPDATE catatan_kaki SET size = '$fileSize',name='$fileName',type='$fileType',tglupload='$now' WHERE idbcf15='$idbcf15' and idstatusakhir='15'";
}
else {echo "Gagal Upload ";}

mysql_query($query);

// menggabungkan nama folder dan nama file
$uploadfile = $uploaddir . $fileName;

// proses upload file ke folder 'data'
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File telah diupload";
    echo "<script type='text/javascript'>window.location='../index.php?hal=cat_petugas&id=$idbcf15'</script>";
} else {
    echo "File gagal diupload";
     
}

?>
