<?php
session_start();
$jam = date("H:i:s");
$user = $_SESSION['username'];
$tglkini = date('Y-m-d');

$log = mysql_query("UPDATE log SET jamout='$jam',status='offline'
                     WHERE username='$user' AND jamout='logged' AND status='online'");

/*
// mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,nama_user,nip_user,userdiupdate,nipuserdiupdate)VALUES('logout','$tglkini','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
echo '<script type="text/javascript">window.location="login.php"</script>';
session_destroy();
session_unset();*/
header('location:../../siap/logmu.php');

?>
