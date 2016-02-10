<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <ul>Yang belum selesai :
            
            
            <li>cetak Surat perintah</li>
            
            <li>Daftar BCF 1.5 masih di TPS</li>
            <li>Input Surat Pembatalan BCF 15 TPS</li>
        </ul>
    </body>
</html>
<?php
};
?>