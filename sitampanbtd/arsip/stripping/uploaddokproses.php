<?php
session_start();
$idbcf15=$_POST['idbcf15'];
$idsuratmasukstripping=$_POST['idsuratmasukstripping'];
$jenis_dok=$_POST['jenis_dok'];


if($jenis_dok==''){
    echo '<script type="text/javascript">
          alert("Anda belum menentukan jenis dokumennya.");</script>';
      echo "<meta http-equiv='refresh' content='0; url=../?hal=uploadstrip&id=$idbcf15'>";
}
else{

        if($jenis_dok=='1'){$uploaddir = "arsip\NHP/";}
        elseif($jenis_dok=='2'){$uploaddir = "arsip\Stripping/";}
        elseif($jenis_dok=='3'){$uploaddir = "arsip\Empty/";}
        elseif($jenis_dok=='4'){$uploaddir = "arsip\Lainnya/";}

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


            $input=mysql_query("INSERT INTO arsip_stripping(
                                                        idsuratmasukstripping,
							idbcf15,
							jenis_dok,
							name,
                                                        type,
                                                        size,
                                                        tgl_upload,
                                                        iduser
                                                       
                        ) value (
                                                        '$idsuratmasukstripping',
							'$idbcf15',
							'$jenis_dok',
							'$fileName',
                                                        '$fileType',
                                                        '$fileSize',
                                                        '$tglupload',
                                                        '$iduser'
                                                        
                                                        
                        )");
                        

        if($input){
        // menggabungkan nama folder dan nama file
        $uploadfile = $uploaddir . $fileName;

        // proses upload file ke folder 'data'
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                echo "File telah diupload";
                echo "<script type='text/javascript'>window.location='../../index.php?hal=uploadstrip&id=$idbcf15'</script>";
            } else {
                echo "File gagal diupload";

            }
        }
        
        else{
            echo "Tidak Berhasil";
        }
} 
?>
