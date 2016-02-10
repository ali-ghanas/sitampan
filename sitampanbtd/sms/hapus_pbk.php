<?php
include "koneksi/koneksi.php";

mysql_query("delete from pbk where ID = '$_GET[ID]'");
header('location: master.php?module=phonebook');
?>