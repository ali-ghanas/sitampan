<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete

// echo $id;
$del=mysql_query("DELETE FROM app_notifikasi WHERE idapp_notifikasi='$id'");


if ($del){
    echo "<h3>notifkasi berhasil dihapus</h3>";

echo '<script type="text/javascript">window.location="index.php?hal=settapp&pilih=input_notif"</script>';
}
else{
    echo "tidak berhasil";
}
?>