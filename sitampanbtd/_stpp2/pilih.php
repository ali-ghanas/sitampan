<?php
$pilih=$_GET['pilih'];

if($pilih==newbcf15){ include "browsebcf15baru.php";}
elseif($pilih==sprint_sim){ include "input_sprint_simultan.php";}
elseif($pilih==daf_sprint){ include "suratperintah.php";}
elseif($pilih==daf_bcf15){ include "query_bcf15.php";}

elseif($pilih==edit_bcf15){ include "bcfedit.php";}
elseif($pilih==edit_cont){ include "editcontainer.php";}
elseif($pilih==del_cont){ include "delcontainer.php";}
elseif($pilih==insert_cont){ include "insertcontainertpp.php";}

//page monitoring
elseif($pilih==segel){ include "browsebukasegel.php";}
elseif($pilih==bapenarikan){ include "bapenarikanbrowse.php";}
elseif($pilih==bapenarikaninput){ include "bapenarikan.php";}
elseif($pilih==bataltarik){ include "bataltarik.php";}
elseif($pilih==bataltarik_hapus){ include "bataltarik_hapus.php";}
elseif($pilih==bataltarik_sim){ include "bataltarik_sim.php";}
elseif($pilih==bataltarik_sim_pro){ include "bataltarik_sim_proses.php";}
elseif($pilih==pecahpos){ include "pecahposbcf15browse.php";}
elseif($pilih==updatelongstay){ include "updatelongstay.php";}
elseif($pilih==updatelongstay_proses){ include "updatelongstayproses.php";}


//konfirmasi ke p2
elseif($pilih==daf_konf_p2){ include "konfirmasi_p2.php";}
elseif($pilih==input_konf_p2){ include "ndkonfirmasi.php";}

//web services kp djbc 
elseif($pilih==kon_tpsol){ include "ws_tpsonline_form.php";}
elseif($pilih==kon_tpsol_view){ include "ws_tpsonline_view.php";}
elseif($pilih==kon_tpsol_kirim){ include "ws_tpsonline_kirim.php";}

//tegasspritn
elseif($pilih==tegassprint){ include "tegas_sprint.php";}
elseif($pilih==tegassprintproses){ include "tegas_sprint_proses.php";}
elseif($pilih==tegassprintbrowse){ include "tegas_sprint_browse.php";}

//
?>
