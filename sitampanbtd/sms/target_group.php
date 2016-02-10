<?php
include "koneksi/koneksi.php";
$nama = $_POST['nama'];

$masuk = mysql_query("insert into pbk_groups (Name) values('$nama')");
header('location: master.php?module=phonebook');
?>