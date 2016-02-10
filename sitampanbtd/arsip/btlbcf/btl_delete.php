<?php

    mysql_connect('localhost','sitampan','sitampan');
    mysql_select_db('sitampan');

    // membaca id file yang akan dihapus
    $id      = $_GET['id'];

    // membaca nama file yang akan dihapus berdasarkan id
    $query   = "SELECT * FROM arsip_btl_detail WHERE idarsip_btl_detail = '$id'";
    $hasil   = mysql_query($query);
    $data    = mysql_fetch_array($hasil);
    $namaFile = $data['name'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM arsip_btl_detail WHERE idarsip_btl_detail = $id";
    mysql_query($query);

    // menghapus file dalam folder sesuai namanya
    unlink("batalbcf15/".$namaFile);
    echo "File telah dihapus";
    echo "<script type='text/javascript'>window.location='../../index.php?hal=page_arsip&pilih=input_btl&id=$data[idbcf15]'</script>";

?>
