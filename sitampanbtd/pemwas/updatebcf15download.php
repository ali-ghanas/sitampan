<?php

    mysql_connect('localhost','sitampan','sitampan');
    mysql_select_db('sitampan');

    // membaca id file dari link
    $id = $_GET['id'];
    $jenis_dok=$_GET['jenis_dok'];

    // membaca informasi file dari tabel berdasarkan id nya
    $query  = "SELECT * FROM arsip_dok_pemeriksa WHERE idarsip_dok_pemeriksa = '$id'";
    $hasil  = mysql_query($query);
    $data = mysql_fetch_array($hasil);
    

    // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=".$data['name']);

    // header yang menunjukkan ukuran file yang akan didownload
    header("Content-length: ".$data['size']);

    // header yang menunjukkan jenis file yang akan didownload
    header("Content-type: ".$data['type']);

   // proses membaca isi file yang akan didownload dari folder 'data'
   if($jenis_dok=='1'){$fp  = fopen("arsip\NHP/".$data['name'], 'r');}
   elseif($jenis_dok=='2'){$fp  = fopen("arsip\BMN/".$data['name'], 'r');}
   elseif($jenis_dok=='3'){$fp  = fopen("arsip\BTDLelang/".$data['name'], 'r');}
   elseif($jenis_dok=='4'){$fp  = fopen("arsip\Musnah/".$data['name'], 'r');}
   elseif($jenis_dok=='5'){$fp  = fopen("arsip\Lainnya/".$data['name'], 'r');}
   
   if($jenis_dok=='1'){$content = fread($fp, filesize('arsip\NHP/'.$data['name']));}
   elseif($jenis_dok=='2'){$content = fread($fp, filesize('arsip\BMN/'.$data['name']));}
   elseif($jenis_dok=='3'){$content = fread($fp, filesize('arsip\BTDLelang/'.$data['name']));}
   elseif($jenis_dok=='4'){$content = fread($fp, filesize('arsip\Musnah/'.$data['name']));}
   elseif($jenis_dok=='5'){$content = fread($fp, filesize('arsip\Lainnya/'.$data['name']));}
   fclose($fp);

   // menampilkan isi file yang akan didownload
   echo $content;

   exit;
?>
