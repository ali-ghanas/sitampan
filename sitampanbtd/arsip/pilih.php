<?php
$pilih=$_GET['pilih'];

if($pilih==browse_sp){ include "sp/daf_sp.php";}//pagebatal
elseif($pilih==input_sp){ include "sp/sp_input.php";}
elseif($pilih==upload_sp){ include "sp/uploadscansp.php";}

elseif($pilih==edit_sp){ include "sp/sp_edit.php";}

//arsip pembatalan
elseif($pilih==browse_btl){ include "btlbcf/daf_btl.php";}//pagebatal
elseif($pilih==input_btl){ include "btlbcf/btl_input.php";}
elseif($pilih==form_mass_upload_btl){ include "btlbcf/form_mass_upload_btl.php";}
elseif($pilih==form_mass_upload_file_btl){ include "btlbcf/form_mass_upload_file_btl.php";}
elseif($pilih==edit_btl){ include "btlbcf/btl_edit.php";}
elseif($pilih==uploadscanspprosesbtl){ include "btlbcf/uploadscanspproses.php";}
elseif($pilih==btlviewupload){ include "btlbcf/daf_btl_view.php";}

//arsip pemberitahuan
elseif($pilih==browse_sptahu){ include "pemberitahuan/daf_sptahu.php";}
elseif($pilih==browse_sptahuview){ include "pemberitahuan/daf_sptahu_view.php";}
elseif($pilih==input_sptahu){ include "pemberitahuan/sptahu_input.php";}
elseif($pilih==upload_sptahu){ include "pemberitahuan/uploadscansptahu.php";}
elseif($pilih==edit_sptahu){ include "pemberitahuan/sptahu_edit.php";}
?>
