<?php
$pilih=$_GET['pilih'];

if($pilih==saldobtd){ include "pemwas/dashboard_btd.php";}



//nhp
elseif($pilih==innhp){ include "inputnhp.php";}

//updatestatus
elseif($pilih==update_status){ include "updatebcf15.php";}
elseif($pilih==update_status_proses){ include "updatebcf15proses.php";}

//downloadnhp,skep
elseif($pilih==doknhp){ include "dokumennhp.php";}

//downloadnhp,skep
elseif($pilih==bcfatensi){ include "bcf15atensi.php";}

//striiping
elseif($pilih==browsestrip){ include "striping_browse.php";}
elseif($pilih==formstriping){ include "stripping_form.php";}
elseif($pilih==formstriping_setstrip){ include "stripping_form_setstrip.php";}
elseif($pilih==caricont_stripping){ include "striping_caricont.php";}
elseif($pilih==caricont_hasil){ include "stripping_hasilcari.php";}

//penutupan bcf15
elseif($pilih==bcf15tutuppos){ include "tutupposbtd.php";}

//btd tidak laku lelang 2
elseif($pilih==btdtdklakulelang2){ include "btd_tdklakulelang2/updatetdklaku.php";}
elseif($pilih==browsebtdtdklakulelang2){ include "btd_tdklakulelang2/browsetdklaku.php";}
elseif($pilih==btdtdklakulelang2_mk){ include "btd_tdklakulelang2/updatetdklaku_mk.php";}
elseif($pilih==btdtdklakulelang2_tutup){ include "btd_tdklakulelang2/updatetdklaku_tutup.php";}
?>
