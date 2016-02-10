<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete

// echo $id;
$del=mysql_query("DELETE FROM sms_kegiatan_tpp WHERE idsms_kegiatan_tpp='$id'");


if ($del){
    

echo "<script type='text/javascript'>window.location='index.php?hal=sms_piketbrowse'</script>";
}
?>