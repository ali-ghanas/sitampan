<?php
error_reporting(0);
session_start();
include "config.php";
$userid = $_SESSION['username'];
$pesan = mysql_query("SELECT nomor FROM pesan
    WHERE kepada='$userid' and sudahbaca='N'");
$j = mysql_num_rows($pesan);
if($j>0){
    echo $j;
}
?>
