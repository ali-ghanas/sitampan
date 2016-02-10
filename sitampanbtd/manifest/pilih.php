<?php
$pilih=$_GET['pilih'];

if($pilih==newsp){ include "suratpengantar.php";}
elseif($pilih==editsp){ include "suratpengantarproses.php";}
elseif($pilih==editsp_proses){ include "suratpengantarproses_editproses.php";}

elseif($pilih==editspproses){ include "suratpengantaredit.php";}
elseif($pilih==addbcf15){ include "addbcf15.php";}
elseif($pilih==querybcf15){ include "query_bcf15.php";}
elseif($pilih==delbcf15){ include "bcf15del.php";}
elseif($pilih==help){ include "helpmanifest.php";}
elseif($pilih==bcf15cont){ include "cobainputcont.php";}
elseif($pilih==bcf15baru){ include "bcf15.php";}

elseif($pilih==cet_bcf15all){ include "cetakbcf15all.php";}

elseif($pilih==bukaposbc11ceisa){ include "bukaposbc11ceisa.php";}
elseif($pilih==daf_bukaposbc11ceisa){ include "daf_bukaposbc11ceisa.php";}
elseif($pilih==input_bukaposbc11ceisa){ include "daf_bukaposbc11ceisa_input.php";}
elseif($pilih==query_bukaposbc11ceisa){ include "daf_bukaposbc11ceisa_que.php";}
elseif($pilih==view_bukaposbc11ceisa){ include "daf_bukaposbc11ceisa_view.php";}
elseif($pilih==downexc_bukaposbc11ceisa){ include "daf_bukaposbc11ceisa_downexc.php";}

elseif($pilih==grafik_bukapos){ include "/report/lap_kinerja/chart_garis_bukaposbc11.php";}

elseif($pilih==pilihtpp){ include "suratpengantar_pilihtpp.php";}

?>
