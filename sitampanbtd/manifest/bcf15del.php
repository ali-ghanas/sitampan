<?php
session_start();
$id = $_GET['id']; // menangkap id yg dikirim via url delete

// echo $id;

mysql_query("DELETE FROM bcf15 WHERE idbcf15='$id'");
mysql_query("DELETE FROM bcfcontainer WHERE idbcf15='$id'");

echo '<script type="text/javascript">window.location="index.php?hal=pagemanifest&pilih=querybcf15&act=2"</script>';
?>