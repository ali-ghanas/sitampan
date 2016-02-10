<?php

//print_r($_POST);
//echo '<br>';
//print_r($_FILES);
//exit();


error_reporting(0);
include "../../lib/koneksi.php";
if (isset($_POST['submit'])) {

    //cek kesiapan data
    $jumlah = $_POST['jumlah'];

    $propertyidbcf = array();

    for ($i = 1; $i < ($jumlah + 1); $i++) {
        $idbcf15 = $_POST['idbcf15ke' . $i];

        array_push($propertyidbcf, $idbcf15);
    }
    

    if (count($propertyidbcf) == count($_FILES)) {        
        $direktori = 'batalbcf15/'; //Folder penyimpanan file
        $max_size = 1000000 * 10; //Ukuran file maximal 10mb

        for ($i = 0; $i < $jumlah; $i++) {

            
            $nama_file = $_FILES['fileke'.($i+1)]['name']; //Nama file yang akan di Upload
            $file_size = $_FILES['fileke'.($i+1)]['size']; //Ukuran file yang akan di Upload
            $nama_tmp = $_FILES['fileke'.($i+1)]['tmp_name']; //Nama file sementara
            $fileType = $_FILES['fileke'.($i+1)]['type']; // membaca jenis file yang diupload
            $upload = $direktori . $nama_file; //Memposisikan direktori penyimpanan dan file
            //Proses akan dimulai apabila File telah dipilih sebelumnya 
            if ($nama_file == "") {
                echo "File Gagal di Upload karena anda tidak memilih file apapun!";
            } else {
                //Proses upload file jika ukuran lebih kecil dari yang di tentukan
                if ($file_size <= $max_size) {
                    if (move_uploaded_file($nama_tmp, $upload)) {
                        echo "File Berhasil diupload ke Direktori: " . $direktori . $nama_file . "<br>";
                        $sql = "select idbcf15,bcf15no,bcf15tgl,idtpp,SetujuBatalNo,SetujuBatalDate FROM bcf15 where  idbcf15=".$propertyidbcf[$i]; // memanggil data dengan id yang ditangkap tadi
                        $query = mysql_query($sql) or die('error 0');
                        $bcf15 = mysql_fetch_array($query);
                        $bcf15no = $bcf15['bcf15no'];
                        $bcf15tgl = $bcf15['bcf15tgl'];
                        $idtpp = $bcf15['idtpp'];
                        $SetujuBatalNo = $bcf15['SetujuBatalNo'];
                        $SetujuBatalDate = $bcf15['SetujuBatalDate'];
                        $iduser = $_SESSION['iduser'];
                        $tahun_btl = substr($SetujuBatalDate, 0, 4);
                        $bulan_btl = substr($SetujuBatalDate, 5, 2);
                        $now = date('Y-m-d H:i:s');
                        $sql1 = "select *  FROM arsip_btl_detail where  idbcf15=".$propertyidbcf[$i]; // memanggil data dengan id yang ditangkap tadi
                        $query1 = mysql_query($sql1);

                        $cek1 = mysql_numrows($query1);
                        if ($cek1 > 0) {
                            $query = "UPDATE arsip_btl_detail SET size = '$file_size',name='$nama_file',type='$fileType' WHERE idbcf15='$propertyidbcf[$i]'";
                            mysql_query($query);
                            //echo "<script type='text/javascript'>window.location='index.php?hal=btl_input&id=$propertyidbcf[$i]'</script>";
                        } else {
                            $query = "INSERT INTO arsip_btl_detail (
            idbcf15,
            bcf15no,
            nobtl,
            tglbtl,
            name,
            size, 
            type,
            idtpp,
            tglinput,
            iduser,
            tahun_btl,
            bulan_btl) VALUES 
            ('$propertyidbcf[$i]',
            '$bcf15no',
            '$SetujuBatalNo',
            '$SetujuBatalDate',
            '$nama_file',
            '$file_size', 
            '$fileType',
            '$idtpp',
            '$now',
            '$iduser',
            '$tahun_btl',
            '$bulan_btl')";
                            mysql_query($query) or die ('error1');
                            //echo "<script type='text/javascript'>window.location='index.php?hal=btl_input&id=$idbcf15'</script>";
                        }
                    } else {
                        echo "File " . $nama_file . " Gagal diupload, karena berbagai macam alasan!";
                    }
                } else {
                    //Jika ukuran file lebih besar dari yang ditentukan
                    echo "File " . $nama_file . " Gagal di Upload, karena terlalu besar, batas yang ditentukan adalah : " . $max_size . " bait.";
                }
            }
        }
        echo '<a href=../../index.php?hal=page_arsip&pilih=btlviewupload>Back to Browse</a>';
    }
} else {
    echo "Harus melalui Form Upload sebelum ke halaman ini!";
}
?>  
