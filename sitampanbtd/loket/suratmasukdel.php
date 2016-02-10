
<?php
session_start();
require_once 'lib/function.php';
$id1 = $_GET['id']; // menangkap id
$id=balik_teks($id1);

// echo $id;
mysql_query("DELETE FROM suratmasuk WHERE idsuratmasuk='$id'");

echo '<script type="text/javascript">window.location="index.php?hal=suratmasukok&act=2"</script>';
?>