<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete

// echo $id;
$del=mysql_query("DELETE FROM tpp WHERE idtpp='$id'");


if ($del){
    mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,nama_user,nip_user,dokupdate)VALUES('Hapus TPP','$now','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','idtpp :$id')");

echo '<script type="text/javascript">window.location="index.php?hal=pageadminman&pilih=tpp"</script>';
}
?>