<?php
session_start();

$jam = date("H:i:s");
$tglkini=date('Y-m-d');
$sql1 = "SELECT * FROM log where status='online' and  tanggal < '$tglkini' ";
$query1 = mysql_query($sql1);
$cek1=mysql_numrows($query1);
                  
 if ($cek1>0){
             mysql_query("UPDATE log SET jamout='$jam',
                              status='offline'");
// mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,nama_user,nip_user,userdiupdate,nipuserdiupdate)VALUES('logout','$tglkini','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");

                  
}





?>
