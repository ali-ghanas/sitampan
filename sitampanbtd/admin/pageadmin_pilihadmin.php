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
elseif($pilih==tppedit){ include "tppedit.php";}
elseif($pilih==tppedit_tambahfoto){ include "tppedit_tambahfoto.php";}
elseif($pilih==tppedit_fotoket){ include "tppedit_fotoket.php";}

elseif($pilih==importdata){ include "importdata.php";}
elseif($pilih==importupdatedata){ include "importupdatedata.php";}
elseif($pilih==importdatacont){ include "importdatacont.php";}
//upload pelayaran
elseif($pilih==importpelayaran){ include "importdatapelayaran.php";}
elseif($pilih==importpelayaranproses){ include "importdatapelayaranproses.php";}


//upload insert perhari
elseif($pilih==importdatabcf15hariini){ include "impor_bcf15baru_manifest.php";}
elseif($pilih==importdatabcf15hariiniproses){ include "impor_bcf15baru_manifest_proses.php";}
elseif($pilih==importdataconthariini){ include "importdatacont_barumanifest.php";}
elseif($pilih==importdataconthariiniproses){ include "importdatacontbaru_manifest_proses.php";}

//upload update perhari
elseif($pilih==updateprintdantahu){ include "importupdate_sprint_sptahu.php";}
elseif($pilih==updateprintdantahuproses){ include "importupdate_sprint_sptahu_proses.php";}
elseif($pilih==updatekonfirmasi){ include "importupdate_loket_konfirmasi.php";}
elseif($pilih==updatekonfirmasiproses){ include "importupdate_loket_konfirmasi_proses.php";}
elseif($pilih==updatepembatalanbcf15){ include "importupdate_loket_pembatalan.php";}
elseif($pilih==updatepembatalanbcf15proses){ include "importupdate_loket_pembatalan_proses.php";}

//upload update pelayara di bcf 15
elseif($pilih==updatepelayaran_tpp3){ include "importupdate_tpp3_pelayaran.php";}
elseif($pilih==updatepelayaran_tpp3_proses){ include "importupdate_tpp3_pelayaran_proses.php";}

//upload update batal tarik bcf 15
elseif($pilih==updatebataltarik){ include "importupdate_bataltarik.php";}
elseif($pilih==updatebataltarik_proses){ include "importupdate_bataltarik_proses.php";}

//upload update penarikan bcf 15
elseif($pilih==updatebapenarikan){ include "importupdate_bapenarikan.php";}
elseif($pilih==updatebapenarikan_proses){ include "importupdate_bapenarikan_proses.php";}

//upload update ND buka segel bcf 15
elseif($pilih==updatendbukasegel){ include "importupdate_ndbukasegel.php";}
elseif($pilih==updatendbukasegel_proses){ include "importupdate_ndbukasegel_proses.php";}

//upload data sitambun
elseif($pilih==importdatasitambun){ include "impor_bcf15baru_sitambun.php";}
elseif($pilih==importdatasitambunproses){ include "impor_bcf15baru_sitambun_proses.php";}

//update data sitambun
elseif($pilih==updatedatasitambun){ include "importupdate_loket_pembatalan_sitambun.php";}
elseif($pilih==updatedatasitambunproses){ include "importupdate_loket_pembatalan_sitambun_proses.php";}

?>
