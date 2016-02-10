<?php 
error_reporting(0);
switch($_REQUEST['pilih'])
{


case 'lupapassproses':$page=  include 'lupapassproses.php';break;
case 'kirimulangpass':$page=  include 'kirimpass.php';break;


};
?>