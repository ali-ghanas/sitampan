<?php
session_start();
$idbcf15=$_POST['idbcf15'];
$jenis_dok=$_POST['jenis_dok'];
echo "$jenis_dok";
$tahun=date('Y');
if($jenis_dok==''){
    echo '<script type="text/javascript">
          alert("Anda belum menentukan jenis dokumennya.");</script>';
      echo "<meta http-equiv='refresh' content='0; url=../?hal=pagebcf15pemwas&pilih=update_status_proses&id=$idbcf15'>";
}
else{

        if($jenis_dok=='1'){$uploaddir = "arsip\NHP/";}
        elseif($jenis_dok=='2'){$uploaddir = "arsip\BMN/";}
        elseif($jenis_dok=='3'){$uploaddir = "arsip\BTDLelang/";}
        elseif($jenis_dok=='4'){$uploaddir = "arsip\Musnah/";}
        elseif($jenis_dok=='5'){$uploaddir = "arsip\Lainnya/";}

        // setting nama folder tempat upload



        // membaca nama file yang diupload
        $fileName = $_FILES['userfile']['name'];


        // nama file temporary yang akan disimpan di server
        $tmpName  = $_FILES['userfile']['tmp_name']; 

        // membaca ukuran file yang diupload
        $fileSize = $_FILES['userfile']['size'];

        // membaca jenis file yang diupload
        $fileType = $_FILES['userfile']['type'];


        // koneksi ke mysql
        mysql_connect('localhost','sitampan','sitampan');
        mysql_select_db('sitampan');

        // menyimpan properti atau informasi file ke tabel upload dalam db
        // dengan terlebih dahulu mengecek ada tidaknya nama file dalam tabel



        $tglupload=date('Y-m-d H:i:s');
        $iduser=$_SESSION['iduser'];


            mysql_query("INSERT INTO arsip_dok_pemeriksa(
                                size,
                                name, 
                                type,
                                idbcf15,
                                jenis_dok,
                                tglupload,
                                iduser)
                    VALUES(
                                '$fileSize',
                                '$fileName', 
                                '$fileType', 
                                '$idbcf15',
                                '$jenis_dok',
                                '$tglupload',
                                '$iduser')");

        $sql = "SELECT * FROM arsip_dok_pemeriksa where idbcf15='$idbcf15' and jenis_dok='$jenis_dok'";

        mysql_query($sql);

        // menggabungkan nama folder dan nama file
        $uploadfile = $uploaddir . $fileName;

        // proses upload file ke folder 'data'
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "File telah diupload";
            echo "<script type='text/javascript'>window.location='../index.php?hal=pagebcf15pemwas&pilih=update_status_proses&id=$idbcf15'</script>";
        } else {
            echo "File gagal diupload";

        }
}
?>
