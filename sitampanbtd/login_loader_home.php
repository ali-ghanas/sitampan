<?php 
error_reporting(0);
switch($_REQUEST['pilih'])
{


//login_home
case '':$page=  include 'login_home.php';break;    
case 'home':$page=  include 'login_home.php';break;
case 'info_lelang':$page=  include 'event/infolelang.php';break;
case 'info_lelang_detail':$page=  include 'event/infolelang_detail.php';break;
case 'info_musnah':$page=  include 'event/infomusnah.php';break;
case 'info_musnah_detail':$page=  include 'event/infomusnah_detail.php';break;
case 'info_hibah':$page=  include 'event/infohibah.php';break;
case 'info_hibah_detail':$page=  include 'event/infohibah_detail.php';break;
case 'info_ppkp':$page=  include 'event/infoppkp.php';break;
case 'info_ppkp_detail':$page=  include 'event/infoppkp_detail.php';break;
case 'info_famgat':$page=  include 'event/infofamgat.php';break;
case 'info_famgat_detail':$page=  include 'event/infofamgat_detail.php';break;
case 'info_lainnya':$page=  include 'event/infolainnya.php';break;
case 'info_lainnya_detail':$page=  include 'event/infolainnya_detail.php';break;
case 'info_eventall':$page=  include 'event/infoeventall.php';break;
case 'info_eventall_detail':$page=  include 'event/infoeventall_detail.php';break;

case 'profiltpp':$page=  include 'login_profiltppdetail.php';break;

};
?>