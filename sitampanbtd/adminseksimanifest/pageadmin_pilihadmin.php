<?php
$pilih=$_GET['pilih'];

if($pilih==adduser){ include "inputuser.php";}//pagebatal
elseif($pilih==addseksi){ include "inputseksi.php";}
elseif($pilih==addtpp){ include "inputtpp.php";}
elseif($pilih==addtps){ include "inputtps.php";}
elseif($pilih==user){ include "user.php";}
elseif($pilih==seksi){ include "seksi.php";}
elseif($pilih==tps){ include "tps.php";}
elseif($pilih==tpp){ include "tpp.php";}

elseif($pilih==importdata){ include "importdata.php";}
elseif($pilih==importupdatedata){ include "importupdatedata.php";}
elseif($pilih==importdatacont){ include "importdatacont.php";}

elseif($pilih==seksiedit){ include "seksiedit.php";}
elseif($pilih==userdel){ include "userdel.php";}
elseif($pilih==seksidel){ include "seksidel.php";}

//daftar bcf15
elseif($pilih==disbcf15){ include "distribusibcf15.php";}
elseif($pilih==editdisbcf15){ include "distribusibcf15_edit.php";}
elseif($pilih==editbcf15){ include "bcfedit.php";}
elseif($pilih==cetakbcf15all){ include "cetakbcf15all.php";}
elseif($pilih==delbcf15){ include "bcf15del.php";}


//container
elseif($pilih==editcon){ include "editcontainer.php";}
elseif($pilih==delcon){ include "delcontainer.php";}
elseif($pilih==insert_cont){ include "insertcontainer.php";}

//lapbul
elseif($pilih==lapbul){ include "lapbul/index.php";}
elseif($pilih==lapbul_tdkmsk){ include "lapbul/.php";}
?>
