<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete

// echo $id;
$del=mysql_query("DELETE FROM konfirmasi_p2_tgllibur WHERE idkonfirmasi_p2_tgllibur='$id'");


if ($del){
    echo "berhasil dihapus";

echo '<script type="text/javascript">window.location="index.php?hal=inputtgllibur"</script>';
}
else{
    echo "tidak berhasil";
}
?>