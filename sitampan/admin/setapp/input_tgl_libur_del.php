<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete

// echo $id;
$del=mysql_query("DELETE FROM konfirmasi_p2_tgllibur WHERE idkonfirmasi_p2_tgllibur='$id'");


if ($del){
    echo "<h3>libur berhasil dihapus</h3>";

echo '<script type="text/javascript">window.location="index.php?hal=settapp&pilih=manajementgllibur"</script>';
}
else{
    echo "tidak berhasil";
}
?>