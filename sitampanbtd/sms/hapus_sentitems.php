<?php
include "koneksi/koneksi.php";

$masuk = mysql_query("delete from sentitems where ID = '$_GET[ID]'");
header('location: master.php?module=sentitems');
?>