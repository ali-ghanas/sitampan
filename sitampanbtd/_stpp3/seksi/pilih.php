<?php
$pilih=$_GET['pilih'];

if($pilih==Masukdariloket){ include "browsekonfirmasi.php";}
elseif($pilih==inbox){ include "daftarkonfirmasiview.php";}
elseif($pilih==outbox){ include "daftarkonfirmasibelumdijawabp2.php";}

elseif($pilih==validasiview){ include "validasiview.php";}
elseif($pilih==validasiedit){ include "validasiedit.php";}

?>
