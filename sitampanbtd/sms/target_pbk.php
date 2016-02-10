<?php
include "koneksi/koneksi.php";
$nama = $_POST['nama'];
$hp	= $_POST['hp'];
$group = $_POST['group'];

mysql_query("insert into pbk (GroupID,Name,Number) values('$group','$nama','$hp')");
header('location: master.php?module=phonebook');
?>