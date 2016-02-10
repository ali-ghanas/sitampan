<?php
$pilih=$_GET['pilih'];

if($pilih==newbcf15){ include "suratpemberitahuan_input.php";}
elseif($pilih==sptahusim){ include "input_sptahu_simultan.php";}
elseif($pilih==sptahusim_formedit){ include "input_sptahu_formeditsimultan.php";}
elseif($pilih==daf_bcf15){ include "query_bcf15.php";}
elseif($pilih==edit_bcf15){ include "bcfedit.php";}
elseif($pilih==edit_cont){ include "editcontainer.php";}
elseif($pilih==del_cont){ include "delcontainer.php";}
elseif($pilih==insert_cont){ include "insertcontainer.php";}

//edit sptahu secara simultan
elseif($pilih==edit_sptahu_sim){ include "edit_sptahu_simultan.php";}
elseif($pilih==edit_sptahu_sim_proses){ include "edit_sptahu_formeditsimultan.php";}

//input surat umum kirim ke RT
elseif($pilih==inputsurmum){ include "ekpedisisuratkeluarumum.php";}
?>
