<?php
$pilih=$_GET['pilih'];

if($pilih==''){ include "selamatdatang.php";}//pagebatal
elseif($pilih==manajemenuser){ include "user/usergrid.php";}
elseif($pilih==manajemenuserdel){ include "user/userdel.php";}
elseif($pilih==manajemenuseredit){ include "user/useredit.php";}
elseif($pilih==manajemenuseraddmanajemenuserdellevel){ include "user/userlevel_add.php";}
elseif($pilih==manajemenuserresetpass){ include "user/resetpass.php";}
elseif($pilih==manajemenuserdelundo){ include "user/userundodel.php";}
elseif($pilih==manajemenuserinput){ include "user/inputuser.php";}
elseif($pilih==manajemenuserol){ include "user/userol.php";}
elseif($pilih==manajemenuserkick){ include "user/kickuser.php";}
elseif($pilih==manajemenuserperhist){ include "user/historyperuser.php";}
elseif($pilih==manajemenuserhist){ include "user/historyuser.php";}
elseif($pilih==manajemenhistbcf15){ include "user/bcf15cari.php";}


elseif($pilih==manajemenseksi){ include "seksi/seksi.php";}
elseif($pilih==manajemenseksiuser){ include "seksi/userseksi.php";}
elseif($pilih==manajemenseksiinput){ include "seksi/inputseksi.php";}
elseif($pilih==manajemenseksiedit){ include "seksi/seksiedit.php";}

elseif($pilih==manajementpp){ include "tpp/tpp.php";}
elseif($pilih==manajementppinput){ include "tpp/inputtpp.php";}
elseif($pilih==manajementppedit){ include "tpp/tppedit.php";}
elseif($pilih==manajementppdel){ include "tpp/tpp_del.php";}
elseif($pilih==manajementppfoto){ include "tpp/tppedit_tambahfoto.php";}

elseif($pilih==manajementgllibur){ include "setapp/input_tgl_libur.php";}
elseif($pilih==manajementglliburdel){ include "setapp/input_tgl_libur_del.php";}

elseif($pilih==input_notif){ include "setapp/input_notif.php";}
elseif($pilih==input_notif_del){ include "setapp/input_notif_del.php";}

elseif($pilih==dump){ include "setapp/dump.php";}
?>
