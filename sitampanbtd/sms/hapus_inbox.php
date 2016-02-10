<?php
include "koneksi/koneksi.php";

mysql_query("delete from inbox where ID = '$_GET[ID]'");
header('location: master.php?module=inbox');
?>