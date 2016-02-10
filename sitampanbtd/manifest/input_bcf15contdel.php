<?php
session_start();
$id = $_GET['id']; // menangkap id yg dikirim via url delete

// echo $id;
mysql_query("DELETE FROM bcfcontainer WHERE idcontainer='$id'");

echo '<script type="text/javascript">window.location="index.php?hal=bcf15cont"</script>';
?>