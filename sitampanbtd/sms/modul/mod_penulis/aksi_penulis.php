<?php
session_start();
include "../../../koneksi/koneksi.php";

$dateTime	 = date('Y-m-d H:i:s');

mysql_query("UPDATE tmenjadi_penulis SET isi = '$_POST[Content]',id_user = '$_POST[UserId]',datetime = '$dateTime' WHERE id_penulis = '1'");
header('location:../../master.php?module=menjadi-penulis');
?>
