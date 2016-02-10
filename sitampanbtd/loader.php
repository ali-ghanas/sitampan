<?php 
session_start();

switch($_REQUEST['hal'])
{
case '':$page = include 'awalhome.html';break;//default
case 'home':$page = include 'awalhome.html';break;//default
case '':$page = include 'awalhome.html';break;//default

};
?>

