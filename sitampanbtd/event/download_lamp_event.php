<?php

    mysql_connect('localhost','sitampan','sitampan');
    mysql_select_db('sitampan');

    // membaca id file dari link
    $id = $_GET['id'];

    // membaca informasi file dari tabel berdasarkan id nya
    $query  = "SELECT * FROM eventlamp WHERE ideventlamp = '$id'";
    $hasil  = mysql_query($query);
    $data = mysql_fetch_array($hasil);

    // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=".$data['name']);

    // header yang menunjukkan ukuran file yang akan didownload
    header("Content-length: ".$data['size']);

    // header yang menunjukkan jenis file yang akan didownload
    header("Content-type: ".$data['type']);

   // proses membaca isi file yang akan didownload dari folder 'data'
    $fp  = fopen("lamp/".$data['name'], 'r');
   $content = fread($fp, filesize('lamp/'.$data['name']));
   fclose($fp);
   
   // menampilkan isi file yang akan didownload
   echo $content;

   exit;
?>
