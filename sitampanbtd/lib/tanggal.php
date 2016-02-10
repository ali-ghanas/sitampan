<?php
// menugbah dari yyyy-mm-dd menjadi dd/mm/yyyy
function my_ke_tgl ($tanggal) {
    $y =substr($tanggal,0,4);
    $m=substr($tangal,5,2);
    $d=substr($tangal,8,2);
    
    return "$d/$m/$y";
}
// merubah dari yyyy-mm-dd ke dd nama bulan yyyy
function my_ke_tgl2 ($tanggal) {
    global $nama_bulan;
    $y = (integer) substr($tanggal,0,4);
    $m=(integer) substr($tangal,5,2);
    $d=(integer) substr($tangal,8,2);
    
    return "$d $nama_bulan[$m] $y";
}
function tgl_ke_my($tg, $bl, $th) {
    $y= (int) $th;
    $m= (int) $bl;
    $d=(int) $tg;
    return sprintf("%04d-%02d-%02d", $y, $m, $d);
}

?>
<?php $nama_bulan=array ("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        
    function pilihan_tanggal($nama_tg,$nama_bl,$namath,$tg_awal,$th_akhir,$tg_bawaan,$bl_bawaan,$th_bawaan){
        global $nama_bulan;
        //Tanggal
        print("<select name=\"$nama_tg\">\n");
                
        $ada_selected = false;
                for($tg=1;$tg <= 31; $tg++)
                {
                if ($tg_bawaan==$tg)
                {
                $selected ="selected";
                    $ada_selected=True;
                }
                else
                $selected ="";
                    print("<option value=\"$tg\" $selected>$tg</option>\n");
    }
    if ($ada_selected ==false)
        print ("<option value=\"0\" $selected>$tg</option>\n");
    print ("</select>\n");
    
    //Bulan
        print("<select name=\"$nama_bl\">\n");
                
        $ada_selected = false;
                for($bl=1;$bl <= 12; $bl++)
                {
                if ($bl_bawaan==$bl)
                {
                $selected ="selected";
                    $ada_selected=True;
                }
                else
                $selected ="";
                    print("<option value=\"$bl\" $selected>" .
                "$nama_bulan($bl)</option>\n");
    }
    if ($ada_selected ==false)
        print ("<option value=\"0\" $selected></option>\n");
    print ("</select>\n");
    //Tahun
        print("<select name=\"$nama_th\">\n");
                
        $ada_selected = false;
                for($th=$th_awal; $th <= $th_akhir; $th++)
                {
                if ($th_bawaan==$th)
                {
                $selected ="selected";
                    $ada_selected=True;
                }
                else
                $selected ="";
                    print("<option value=\"$th\" $selected>$th</option>\n");
    }
    if ($ada_selected ==false)
        print ("<option value=\"0\" $selected></option>\n");
    print ("</select>\n");
    }

?> 