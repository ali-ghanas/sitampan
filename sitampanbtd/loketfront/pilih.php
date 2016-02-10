<?php
$pilih=$_GET['pilih'];

if($pilih==permohonanbatal){ include "permohonanbatal.php";}//pagebatal
elseif($pilih==permohonanbatal_cont){ include "permohonanbatal_cont.php";}
elseif($pilih==inputpermohonan){ include "inppermhnbtlbcf15.php";}
elseif($pilih==daftardoklengkap){ include "daftardoklengkap.php";}
elseif($pilih==distribusi){ include "edtpermhnbtlbcf15.php";}
elseif($pilih==daftarselesai){ include "daftarselesai.php";}

elseif($pilih==belumjadi){ include "belumjadi.php";}


//striiping
elseif($pilih==browsestrip){ include "stripping_browse.php";}
elseif($pilih==formstriping){ include "stripping_form.php";}
?>
