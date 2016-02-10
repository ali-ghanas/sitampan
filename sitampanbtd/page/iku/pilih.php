<?php

session_start();
switch ($_REQUEST['pilih']) {
    
    //summary
    case '':$page = include 'iku.php';
        break; //default
    case 'BATarik':$page = include 'detailbatarik.php';
        break;
    case 'SPrint':$page = include 'detailsprint.php';
        break;
    case 'Stahu':$page = include 'detailstahu.php';
        break;
    case 'Sbatal':$page = include 'detailsbatal.php';
        break;
    case 'bataltarik':$page = include 'detailbataltarik.php';
        break;
    
}
?>