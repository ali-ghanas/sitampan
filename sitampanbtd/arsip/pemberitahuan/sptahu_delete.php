<?php

    mysql_connect('localhost','sitampan','sitampan');
    mysql_select_db('sitampan');

    // membaca id file yang akan dihapus
    $id      = $_GET['id'];

    // membaca nama file yang akan dihapus berdasarkan id
    $query   = "SELECT * FROM arsip_sptahu WHERE idarsip_sptahu = '$id'";
    $hasil   = mysql_query($query);
    $data    = mysql_fetch_array($hasil);
    $namaFile = $data['name'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM arsip_sptahu WHERE idarsip_sptahu = $id";
    mysql_query($query);

    // menghapus file dalam folder sesuai namanya
    unlink("pemberitahuan/".$namaFile);
    echo "File telah dihapus";

?>
