<?php 
error_reporting(0);

switch($_REQUEST['hal'])
{
case '':$page = include 'info_layanan.php';break;//default
case 'home':$page = include 'bmnhome.html';break;//default
case 'layananmandiri':$page=  include 'login_layanan_mandiri.php';break;//layanan mandiri
case 'layananmandirihasil':$page=  include 'login_layanan_mandiri_hasil.php';break;



};
?>

