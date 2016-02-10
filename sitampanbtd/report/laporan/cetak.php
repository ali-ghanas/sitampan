<?php
$cetak=$_GET['cetak'];

if($cetak==lap_per_tpp){ include "lap_per_tpp.php";}
elseif($cetak==lap_per_tps){ include "lap_per_tps.php";}
elseif($cetak==lap_per_importir){ include "lap_per_importir.php";}
elseif($cetak==lap_per_tahunbcf){ include "lap_per_tahunbcf.php";}
elseif($cetak==lap_per_barang){ include "lap_per_barang.php";}
elseif($cetak==iku){ include "lap_iku.php";}



?>
