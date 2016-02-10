<?php
$pilih=$_GET['pilihp2'];

if($pilih==newkonf){ include "konfirmasi.php";}
elseif($pilih==newkonf_penindakan1){ include "konfirmasi_penindakan1.php";}
elseif($pilih==newkonf_penindakan2){ include "konfirmasi_penindakan2.php";}
elseif($pilih==newkonf_penindakan3){ include "konfirmasi_penindakan3.php";}
elseif($pilih==setuju){ include "konfsetuju.php";}
elseif($pilih==jwb_konf){ include "konfirmasiproses.php";}
elseif($pilih==hardcopy){ include "konftidaksetuju.php";}
elseif($pilih==masukhardcopy){ include "konfhardcopy.php";}
elseif($pilih==jawabhardcopy){ include "konfjawabmanual.php";}
elseif($pilih==masukhardcopykembali){ include "konfhardcopykembali.php";}
elseif($pilih==jawabhardcopy_kembali){ include "konfjawabmanual_kembali.php";}
elseif($pilih==view){ include "konfview.php";}

//grafik
elseif($pilih==''){ include "report/lap_kinerja/chart_garis_newkonfirmasibcf15.php";}

//rekap lap
elseif($pilih==rekap_lap){ include "rekap_konf.php";}
?>
