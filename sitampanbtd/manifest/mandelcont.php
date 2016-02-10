
<?php
session_start();
require_once 'lib/function.php';
$id = $_GET['id']; // menangkap id
$id2 = $_GET['id2'];
       

// echo $id;
mysql_query("DELETE FROM bcfcontainer WHERE idcontainer='$id'");
echo "<meta http-equiv='refresh' content='0; url=?hal=bcfedit&id=$id2'>";
//echo '<script type="text/javascript">window.location="index.php?hal=bcfedit&id='$id2'"</script>';
?>