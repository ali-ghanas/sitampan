<?php
include "koneksi/koneksi.php";
$nama = $_POST['nama'];
$hp	= $_POST['hp'];
$group = $_POST['group'];

mysql_query("update pbk set GroupID = '$group', Name = '$nama', Number = '$hp' WHERE ID = '$_POST[ID]'");
header('location: master.php?module=phonebook');
?>