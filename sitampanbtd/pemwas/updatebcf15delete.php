<?php

    mysql_connect('localhost','sitampan','sitampan');
    mysql_select_db('sitampan');

    // membaca id file yang akan dihapus
    $id      = $_GET['id'];
    $jenis_dok=$_GET['jenis_dok'];

    // membaca nama file yang akan dihapus berdasarkan id
    $query   = "SELECT * FROM arsip_dok_pemeriksa WHERE idarsip_dok_pemeriksa = '$id'";
    $hasil   = mysql_query($query);
    $data    = mysql_fetch_array($hasil);
    $namaFile = $data['name'];

    // query untuk menghapus informasi file berdasarkan id
    $query = "DELETE FROM arsip_dok_pemeriksa WHERE idarsip_dok_pemeriksa = $id";
    mysql_query($query);

    // menghapus file dalam folder sesuai namanya
    if($jenis_dok=='1'){unlink("arsip\NHP/".$namaFile);}
    elseif($jenis_dok=='2'){unlink("arsip\BMN/".$namaFile);}
    elseif($jenis_dok=='3'){unlink("arsip\BTDLelang/".$namaFile);}
    elseif($jenis_dok=='4'){unlink("arsip\Musnah/".$namaFile);}
    elseif($jenis_dok=='5'){unlink("arsip\Lainnya/".$namaFile);}
    echo "File telah dihapus";

    echo "<script type='text/javascript'>window.location='../index.php?hal=pagebcf15pemwas&pilih=update_status_proses&id=$data[idbcf15]'</script>";
?>
