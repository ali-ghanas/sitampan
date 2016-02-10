<?php 
            //localhost, user, pass
$test=mysql_connect("localhost","sitampan","sitampan");
if (!$test) 
    die ("koneksi server gagal");
mysql_select_db("sitampan");
//if($test) {echo "koneksi Berhasil";};


?>