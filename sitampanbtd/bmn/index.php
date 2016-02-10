<?php
include "../lib/koneksi.php";
include "../lib/paginate.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 echo 'Admin : Mohon Login Dulu'; 
     header('location:../index.php');
 
}
elseif($_SESSION['level']=="tpp2") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
 elseif($_SESSION['level']=="tpp3") {
 
     echo 'Admin : Anda tak punya otoritas ini'; 
     header('location:../index.php');
      
 }
// elseif($_SESSION['level']=="pemwastpp") {
// 
//      echo 'Admin : Anda tak punya otoritas ini'; 
//     header('location:../index.php');
// }
 elseif($_SESSION['level']=="p2") {
 
      echo 'Admin : Anda tak punya otoritas ini'; 
     header('location:../index.php');
 }
 elseif($_SESSION['level']=="loket") {
 
      echo 'Admin : Anda tak punya otoritas ini'; 
     header('location:../index.php');
 }
else
{
    ?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title></title>
        <link type="text/css" href="css/bmn.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    </head>
    <body>
        
        <div id="page_pembungkus">
            <div id="page_header">
                <h1>SITAMPAN 2 - BARANG MILIK NEGARA(BMN)</h1>
                <ul>
                    <li><a href="?hal=home">Home</a></li>
                    <li><a href="?hal=browsebmn">Input BMN</a></li>
                    <li><a href="?hal=home">Cari BMN</a></li>
                </ul>
            </div>
            
            <div id="page_kanan">
                <div class="bingkai"><span><?php include 'loader.php' ?></span></div>
            </div>
            
            <div id="page_footer">
                SITAMPAN 2 - BMN
            </div>
        </div>
        
    </body>
</html>
<?php
};
?>