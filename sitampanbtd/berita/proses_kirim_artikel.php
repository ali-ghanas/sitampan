<?php
 include '../lib/koneksi.php';
 
 if($ses!==""){
     if($judul!==""||$isi!==""){
         $judul=str_replace("\\","",$judul);
         $judul=str_replace("\n","", $judul);
         $isi=str_replace("","<br>", $isi);
         $judul=str_replace("<","&lt", $judul);
         $judul=str_replace(">","&gt", $judul);
         $isi=str_replace("<","&lt", $isi);
         $isi=str_replace(">","&gt", $isi);
         $isi=str_replace("&lt;br&gt;","<br>", $isi);
         $isi=str_replace("<br><br>","<br>", $isi);
         $isi=str_replace("\\","", $isi);
         $p=explode("",$isi);
         $kop="$p[0] $p[1] $p[2] $p[3] $p[4] $p[5] $p[6] $p[7] $p[8] $p[9] $p[10] $p[11] $p[12] $p[13] $p[14] $p[15] $p[16] $p[17] $p[18] $p[19] $p[20] $p[21] $p[22] $p[23] $p[24] $p[25] $p[26] $p[27] $p[28] $p[29] $p[30]";
         $j="$k1 $k2 $k3";
         
         if($gbr=="ada" && $file!==""){
             $gb="<img border=\"0\" src=\"./gambar/$file_name\" width=\"80\" heigth=\"270\" align=\"right\">";
             copy($file,"c:\\xampp\htdocs\sitampan\images\\".$file_name);
             
         }else{
             $gb="";
             $gb2="";
         }
     }      $df=date("dmy-his");
            $dat=fopen("../data-artikel/$df.txt","w+");
            $ad=fputs($dat,$isi);
            fclose($dat);
            $tambah=mysql_query("insert into berita(jenis,tanggal,judul,kop,isi,user,ses,gbr,gbr2)values('$j','$tanggal','$jam','$judul','$kop','$df','$user','$ses','$gb','$gb2')");
 }

?>
