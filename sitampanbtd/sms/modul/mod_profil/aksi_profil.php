<?php
session_start();
include "../../../koneksi/koneksi.php";

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
$dateTime	 = date('Y-m-d H:i:s');

// Apabila tidak ada gambar yang diupload
if (empty($lokasi_file)){
	mysql_query("UPDATE tprofile SET Content = '$_POST[Content]',UserId = '$_POST[UserId]',Time = '$dateTime' WHERE IdProfile = '1'");
}
else{
	move_uploaded_file($lokasi_file,"../../../gambar/profiles/$nama_file");
	mysql_query("UPDATE tprofile SET Content = '$_POST[Content]',
									 Image	 = '$nama_file',
									 UserId	 = '$_POST[UserId]',
									 Time	 = '$dateTime'
									 WHERE IdProfile = '1'");

}
header('location:../../master.php?module=profil');
?>
