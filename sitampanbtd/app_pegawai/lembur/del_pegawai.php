<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete
$idlembur = $_GET['idlembur']; // menangkap id yg dikirim via url delete

// echo $id;
$del=mysql_query("DELETE FROM ndlembur_detail WHERE idndlembur_detail='$id'");


if ($del){
    $id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM ndlembur_detail WHERE idndlembur_detail=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
    echo "berhasil dihapus";

echo "<script type='text/javascript'>window.location='index.php?hal=indet_lembur&id=$idlembur'</script>";
}
?>