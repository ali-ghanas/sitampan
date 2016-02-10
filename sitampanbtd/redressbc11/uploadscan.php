<?php

// setting nama folder tempat upload
$uploaddir = 'Redress/';

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

$id=$_POST['id'];
$bcf15no=$_POST['bcf15no'];
$bcf15tgl=$_POST['bcf15tgl'];
$tahun=$_POST['tahun'];
$uraianredress=$_POST['uraianredress'];
$sql = "SELECT idbcf15,bcf15no,tahun FROM bcf15redress where idbcf15='$id'";
$query = mysql_query($sql);
$cek=mysql_numrows($query);
                 

if ($cek > 0)
{
   $query = "UPDATE bcf15redress SET size = '$fileSize',name='$fileName',type='$fileType' WHERE idbcf15='$id'";
}
else $query = "INSERT INTO bcf15redress (idbcf15,bcf15no,bcf15tgl,tahun,name, size, type,uraian_redress) VALUES ('$id','$bcf15no','$bcf15tgl','$tahun','$fileName', '$fileSize', '$fileType','$uraianredress')";

mysql_query($query);

// menggabungkan nama folder dan nama file
$uploadfile = $uploaddir . $fileName;

// proses upload file ke folder 'data'
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File telah diupload";
    echo "<script type='text/javascript'>window.location='../index.php?hal=redressinput&id=$id'</script>";
} else {
    echo "File gagal diupload";
     
}

?>
