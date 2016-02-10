<?php
$pilih=$_GET['pilih'];

if($pilih==tapbcf15){ include "chart_garis_tapbcf15.php";}//pagebatal
elseif($pilih==sprint){ include "chart_garis_sprint.php";}
elseif($pilih==sptahu){ include "chart_garis_sptahu.php";}
elseif($pilih==progres){ include "chart_garis_progrespenarikan.php";}
elseif($pilih==pembatalan){ include "chart_garis_progrespembatalan.php";}//pagebatal
elseif($pilih==btd_lelang){ include "chart_garis_btd_lelang.php";}
elseif($pilih==helpkonf){ include "helpkonf.php";}
elseif($pilih==helpbatal){ include "helpbatal.php";}
elseif($pilih==dafbatal){ include "daftarbatal.php";}


//resume dari data base
elseif($pilih==lap_tap){ include "lap_tap_bcf15.php";}
elseif($pilih==lap_batal){ include "lap_tap_batal.php";}
elseif($pilih==lap_tpp){ include "lap_tap_pertpp.php";}
elseif($pilih==lap_masuk){ include "lap_tap_masuk.php";}
elseif($pilih==lap_bataltarik){ include "lap_tap_bataltarik.php";}
elseif($pilih==lap_sprint){ include "lap_tap_sprint.php";}
elseif($pilih==lap_sptahu){ include "lap_tap_sptahu.php";}
?>
