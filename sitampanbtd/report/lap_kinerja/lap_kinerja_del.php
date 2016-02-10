<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete

// echo $id;
$del=mysql_query("DELETE FROM lap_kinerja WHERE idlap_kinerja='$id'");


if ($del){
    echo "berhasil dihapus";

echo '<script type="text/javascript">window.location="index.php?hal=lap_kinerja&act=1"</script>';
}
?>