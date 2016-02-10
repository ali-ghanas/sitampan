
<?php
session_start();
include'lib/function.php';
$id = $_GET['id']; // menangkap id
        $sql = "SELECT * FROM bcfcontainer WHERE idcontainer=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        $idbcf15=$data['idbcf15'];

// echo $id;
$del=mysql_query("DELETE FROM bcfcontainer WHERE idcontainer='$id'");
if($del){
    
    echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15&pilih=editbcf15&id=$idbcf15'</script>";
}
else{
    echo "tidak terdelete";
}


?>