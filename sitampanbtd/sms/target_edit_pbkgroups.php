<?php
include "koneksi/koneksi.php";
$nama = $_POST['nama'];

mysql_query("update pbk_groups set Name = '$nama' WHERE ID = '$_POST[ID]'");
header('location: master.php?module=phonebook');
?>