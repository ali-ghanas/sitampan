<?php
$sub=$_GET['sub'];
if($sub==lapmasuk){ include "lap_masuk.php";}//pagebatal
elseif($sub==laptdkmsk){ include "lap_belummasuk.php";}
elseif($sub==lapbatal){ include "lap_telahbatalbcf15.php";}
?>
