<?php
session_start();
include "../../lib/function.php";
// setting nama folder tempat upload
$uploaddir = 'setujureekspor/';

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
$no_dok=$_POST['no_dok'];

$tgl_dok=sql($_POST['tgl_dok']);
$tgl_upload=date('Y-m-d H:i:s');
$iduser=$_SESSION['iduser'];
$jenis_dok='2'; //Jenis dokumen 1= Persetujuan Pembatalan BCF 1.5, 2=Persetujuan Reekspor
$sql = "SELECT * FROM arsip_loket_pembatalan where idbcf15='$id' and jenis_dok='2'";
$query = mysql_query($sql);
$cek=mysql_numrows($query);
                 

if ($cek > 0)
{
   $query = "UPDATE arsip_loket_pembatalan SET size = '$fileSize',name='$fileName',type='$fileType' WHERE idbcf15='$id' and jenis_dok='2'";
}
else $query = "INSERT INTO arsip_loket_pembatalan 
                            (
                            idbcf15,
                            jenis_dok,
                            no_dok,
                            tgl_dok,
                            name, 
                            size, 
                            type,
                            tgl_upload,
                            iduser) VALUES 
                            ('$id',
                             '$jenis_dok',
                             '$no_dok',
                             '$tgl_dok',
                             '$fileName', 
                             '$fileSize',
                             '$fileType',
                             '$tgl_upload',
                             '$iduser')";

mysql_query($query);

// menggabungkan nama folder dan nama file
$uploadfile = $uploaddir . $fileName;

// proses upload file ke folder 'data'
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File telah diupload";
    echo "<script type='text/javascript'>window.location='../../index.php?hal=set_reeks_input&id=$id'</script>";
} else {
    echo "File gagal diupload";
     
}

?>
