<?php 
error_reporting(0);
switch($_REQUEST['pilih'])
{
case 'infolayanan':$page = include 'info_layanan.php';break;//default
case '':$page = include 'info_layanan.php';break;//default
case 'layananmandiri':$page=  include 'login_layanan_mandiri.php';break;
case 'layananmandirihasil':$page=  include 'login_layanan_mandiri_hasil.php';break;

case 'info_lelang':$page=  include 'event/infolelang.php';break;
case 'info_lelang_detail':$page=  include 'event/infolelang_detail.php';break;
case 'info_musnah':$page=  include 'event/infomusnah.php';break;
case 'info_musnah_detail':$page=  include 'event/infomusnah_detail.php';break;

case 'lupapassproses':$page=  include 'lupapassproses.php';break;

};
?>