<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete
$iduser = $_GET['iduser'];
// echo $id;
$del=mysql_query("DELETE FROM userhak WHERE iduserhak='$id'");


if ($del){
    

echo "<script type='text/javascript'>window.location='index.php?hal=addlevel&id=$iduser'</script>";
}
?>