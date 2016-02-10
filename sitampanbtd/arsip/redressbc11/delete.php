<?php

    mysql_connect('localhost','sitampan','sitampan');
    mysql_select_db('sitampan');

    // membaca id file yang akan dihapus
    $id      = $_GET['id'];

    // membaca nama file yang akan dihapus berdasarkan id
    $query   = "SELECT * FROM bcf15redress WHERE idbcf15 = '$id'";
    $hasil   = mysql_query($query);
    $data    = mysql_fetch_array($hasil);
    $namaFile = $data['name'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM bcf15redress WHERE idbcf15 = $id";
    mysql_query($query);

    // menghapus file dalam folder sesuai namanya
    unlink("Redress/".$namaFile);
    echo "File telah dihapus";

?>
