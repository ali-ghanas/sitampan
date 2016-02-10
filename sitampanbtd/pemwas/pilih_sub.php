<?php
$pilih=$_GET['sub_pilih'];

if($pilih==innhp){ include "saldobcf15.php";}
elseif($pilih==bro_saldo_bcf){ include "bcf15saldo.html";}
elseif($pilih==nhp){ include "inputnhp.php";}
elseif($pilih==editnhp_brg){ include "editnhp.php";}
elseif($pilih==nhp_brg){ include "input_nhp_brg.php";}
elseif($pilih==nhp_brg_edit){ include "input_nhp_brg_edit.php";}
elseif($pilih==editbrg){ include "edituraianbrgnhp.php";}
elseif($pilih==delbrg){ include "delete_uraian_brg_nhp.php";}
elseif($pilih==kon_skep_btd){ include "konsep_skep_btd.php";}
elseif($pilih==kon_skep_btd_bro){ include "konsep_skep_btd_browse.php";}




?>
