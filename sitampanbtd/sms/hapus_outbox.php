<?php
include "koneksi/koneksi.php";

$masuk = mysql_query("delete from outbox where ID = '$_GET[ID]'");
header('location: master.php?module=outbox');
?>