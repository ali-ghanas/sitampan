<?php 
switch($_REQUEST['hal'])
{
case '':$page = include 'selamatdatang.php';break;//default
case 'user':$page=  include 'pageuser.php';break;
case 'settapp':$page=  include 'pagesettingapp.php';break;
case 'seksi':$page=  include 'pageseksi.php';break;
};
?>

