<?php
include "/../lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 echo '<h1>anda harus login dulu....</h1>';
 header('location:index.php?hal="login"');
 
}
else
{
  
?>

<?php include 'report/grafik/grafikterbitbcf.php'; ?><br/>
<?php include 'report/grafik/grafik_pertpp.php'; ?>



<?php  } ?>