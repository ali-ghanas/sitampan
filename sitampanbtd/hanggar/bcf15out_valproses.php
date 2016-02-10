<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete

$tgl_upload=date('Y-m-d');
$tgl_upload_now=date('Y-m-d H:i:s');
$user=$_SESSION['nm_lengkap'];

$updatebcf15  = ("UPDATE bcf15_batalbcf SET 

                    
                    update_sitampan='selesai',
                    tgl_update='$tgl_upload_now',
                    nm_update='$user'
                    
                             
                    WHERE idbcf15_batalbcf='$id' ");
                    
                     $hasil = mysql_query($updatebcf15)
                         or die(mysql_error());


if ($updatebcf15){
    

echo "<script type='text/javascript'>window.location='index.php?hal=upload_out_valid'</script>";
}
?>