<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete

// echo $id;
$del=mysql_query("DELETE FROM ndlembur WHERE idndlembur='$id'");


if ($del){
    echo "berhasil dihapus";

echo '<script type="text/javascript">window.location="index.php?hal=in_lembur"</script>';
}
?>