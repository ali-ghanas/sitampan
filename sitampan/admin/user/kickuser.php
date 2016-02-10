<?php
session_start();
$logid=$_GET['id'];
$jam = date("H:i:s");
$tglkini=date('Y-m-d');

mysql_query("UPDATE log SET jamout='$jam',
                              status='offline'
  WHERE  idlog='$logid'");
// mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,nama_user,nip_user,userdiupdate,nipuserdiupdate)VALUES('logout','$tglkini','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
echo '<script type="text/javascript">window.location="?hal=user&pilih=manajemenuserol"</script>';

?>
