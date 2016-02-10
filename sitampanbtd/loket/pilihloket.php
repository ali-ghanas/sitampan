<?php
$pilih=$_GET['pilihloket'];

if($pilih==newp2){ include "browsekonfirmasi.php";}//pagebatal
elseif($pilih==perlukonf){ include "perlukonfirmasi.php";}
elseif($pilih==edit_konf){ include "bro_edit_konfir.php";}
elseif($pilih==perlukonfcacah){ include "perlukonfirmasicacah.php";}
elseif($pilih==tanpakonf){ include "langsungbatal.php";}//pagebatal
elseif($pilih==edit_batal){ include "bro_edit_pembatalan.php";}
elseif($pilih==helpkonf){ include "helpkonf.php";}
elseif($pilih==helpbatal){ include "helpbatal.php";}
elseif($pilih==dafbatal){ include "daftarbatal.php";}

//newkonfirmasi
elseif($pilih==new_konf){ include "newkonfirmasi_browsebcf15.php";}
elseif($pilih==new_kirimtpp){ include "newkonfirmasi_kirimtpp.php";}
elseif($pilih==new_kirimtpp_lengkap){ include "newkonfirmasi_kirimtpp_lengkap.php";}

elseif($pilih==new_terkirim){ include "newkonfirmasi_terkirim.php";}
elseif($pilih==new_konsep){ include "newkonfirmasi_konsep.php";}
elseif($pilih==new_hardcopy){ include "newkonfirmasi_hardcopy.php";}
elseif($pilih==new_hardcopy_kirim){ include "newkonfirmasi_hardcopykirim.php";}
elseif($pilih==new_setuju){ include "newkonfirmasi_setujup2.php";}
elseif($pilih==new_hardcopy_terkirim){ include "newkonfirmasi_terkirim_hardcopy.php";}
elseif($pilih==new_viewkonf){ include "newkonfirmasi_view.php";}

//newpembatalan
elseif($pilih==new_batalmita){ include "newpembatalan_browsebcf15.php";}
elseif($pilih==new_batalsoft){ include "newpembatalan_setujup2.php";}
elseif($pilih==new_batalhard){ include "newpembatalan_hardcopy.php";}
elseif($pilih==new_batalhard_proses){ include "newpembatalan_batalhard_proses.php";}
elseif($pilih==new_batalhardkonf_proses){ include "newpembatalan_konfbatalhard_proses.php";}//konfirmasi dilakukan kembali jika ragu status nhi sudah dicabut ataubelum
elseif($pilih==new_batalsoft_proses){ include "newpembatalan_batalsoft_proses.php";}
elseif($pilih==new_batalsoft_que){ include "newpembatalan_softcopy_que.php";}
elseif($pilih==new_batalhard_que){ include "newpembatalan_hardcopy_que.php";}
elseif($pilih==new_batalmita_que){ include "newpembatalan_browsebcf15mita.php";}
elseif($pilih==new_viewbatal){ include "newpembatalan_view.php";}
elseif($pilih==new_editbatal){ include "newpembatalan_editbatal_proses.php";}
//grafik
elseif($pilih==''){ include "report/lap_kinerja/chart_garis_newkonfirmasibcf15.php";}

//rekap laporan
elseif($pilih==rekap_laporan){ include "rekap_konf.php";}
?>
