<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete

// echo $id;
$del=mysql_query("DELETE FROM pbk WHERE ID='$id'");


if ($del){
    

echo "<script type='text/javascript'>window.location='index.php?hal=sms_piket'</script>";
}
?>