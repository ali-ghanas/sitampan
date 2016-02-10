<?php
$id = $_GET['id']; // menangkap id yg dikirim via url delete

$tgl_upload=date('Y-m-d');
$tgl_upload_now=date('Y-m-d H:i:s');
$user=$_SESSION['nm_lengkap'];

$updatecont  = ("UPDATE bcfcontainer SET 

                    
                    statuspintu='selesai',
                    tgl_upload='$tgl_upload_now',
                    nm_upload='$user'
                    
                             
                    WHERE idcontainer='$id' ");
                    
                     $hasil = mysql_query($updatecont)
                         or die(mysql_error());


if ($updatecont){
    

echo "<script type='text/javascript'>window.location='index.php?hal=upload_out_valid'</script>";
}
?>