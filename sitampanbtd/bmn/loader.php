<?php 
error_reporting(0);

switch($_REQUEST['hal'])
{
case '':$page = include 'bmnhome.html';break;//default
case 'home':$page = include 'bmnhome.html';break;//default
case 'browsebmn':$page = include 'browsebmn.php';break;//browse data bmn
case 'uploadbmn':$page = include 'uploadbmn.php';break;//upload BMN
case 'uploadbmnproses':$page = include 'uploadbmnproses.php';break;//upload BMN

};
?>

