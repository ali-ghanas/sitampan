
<?php
session_start();
require_once 'lib/function.php';
$id = $_GET['id']; // menangkap id

        
         $sql = "SELECT * FROM nhp WHERE idnhp=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
         
        
        $idbcf15=$data['idbcf15'];
        $bcf15no=$data['bcf15no'];
        $tahun=$data['tahun'];
        $jumlah=$data['jumlah'];
        $jenisbrg=$data['jenisbrg'];
        
        
       


// echo $id;
$delete=mysql_query("DELETE FROM nhp WHERE idnhp='$id'");
if ($delete)
{
       echo "<img src=images/new/indicator.gif /><br/>";
        echo "<font color=red size=5pt>Proses Penghapusan $jumlah $jenisbrg sedang berlangsung</font>";
        echo "<meta http-equiv='refresh' content='0; url=?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=editnhp_brg&id=$idbcf15'>";
}
else {echo "belum didelete";}



?>