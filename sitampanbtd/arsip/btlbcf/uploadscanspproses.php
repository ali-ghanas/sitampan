<?php
session_start();

// setting nama folder tempat upload
$uploaddir = 'batalbcf15/';

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

$idbcf15=$_POST['idbcf15'];


$sql = "select idbcf15,bcf15no,bcf15tgl,idtpp,SetujuBatalNo,SetujuBatalDate FROM bcf15 where  idbcf15=$idbcf15"; // memanggil data dengan id yang ditangkap tadi
$query = mysql_query($sql);

$bcf15 = mysql_fetch_array($query);

$bcf15no=$bcf15['bcf15no'];
$bcf15tgl=$bcf15['bcf15tgl'];
$idtpp=$bcf15['idtpp'];
$SetujuBatalNo=$bcf15['SetujuBatalNo'];
$SetujuBatalDate=$bcf15['SetujuBatalDate'];
$iduser=$_SESSION['iduser'];
$tahun_btl=substr($SetujuBatalDate,0,4);
$bulan_btl=substr($SetujuBatalDate,5,2);
$now=date('Y-m-d H:i:s');

                 
$sql1 = "select *  FROM arsip_btl_detail where  idbcf15=$idbcf15"; // memanggil data dengan id yang ditangkap tadi
$query1 = mysql_query($sql1);
$cek1=mysql_numrows($query1);
if ($cek1 > 0)
{
   $query = "UPDATE arsip_btl_detail SET size = '$fileSize',name='$fileName',type='$fileType' WHERE idbcf15='$idbcf15'";
    mysql_query($query);

    // menggabungkan nama folder dan nama file
    $uploadfile = $uploaddir . $fileName;

    // proses upload file ke folder 'data'
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "File telah diupload";
        echo "<script type='text/javascript'>window.location='../../index.php?hal=page_arsip&pilih=input_btl&id=$idbcf15'</script>";
    } else {
        echo "File gagal diupload";

    }

}
else {
    
    
    $query = "INSERT INTO arsip_btl_detail (idbcf15,bcf15no,nobtl,tglbtl,name, size, type,idtpp,tglinput,iduser,tahun_btl,bulan_btl) VALUES ('$idbcf15','$bcf15no','$SetujuBatalNo','$SetujuBatalDate','$fileName', '$fileSize', '$fileType','$idtpp','$now','$iduser','$tahun_btl','$bulan_btl')";
   mysql_query($query);

    // menggabungkan nama folder dan nama file
    $uploadfile = $uploaddir . $fileName;

    // proses upload file ke folder 'data'
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "File telah diupload";
        echo "<script type='text/javascript'>window.location='../../index.php?hal=page_arsip&pilih=input_btl&id=$idbcf15'</script>";
    } else {
        echo "File gagal diupload";

    }
}


?>
