<?php
session_start(); //memulai session
include "lib/koneksi.php";
include "lib/function.php";
$nipsiap = $_SESSION['nipsiap'];
$jam = date("H:i:s");
$tgl = date("Y-m-d");

$simpan=mysql_query("INSERT INTO log(username,
                                 tanggal,
                                 jamin,
                                 jamout,
                                 status)
                           VALUES('$nipsiap',
                                '$tgl',
                                '$jam',
                                'logged',
                                'online')");


                        
if($simpan){
    echo "berhasil";
}
else{
    echo "tidakberhasil";
}
?>
