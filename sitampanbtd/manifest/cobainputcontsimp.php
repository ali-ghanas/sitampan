    <?php
    //file simpan-album.php
    if(!$_POST){
    die('Tidak ada data yang disimpan!');
    }
    //koneksi ke database
//    $conn = mysql_connect("localhost","sitampan","sitampan");
//    mysql_select_db("sitampan");
    
    include 'lib/koneksi.php';
    
    
   
    //menyimpan data ke tabel lagu
    foreach($_POST['nocont'] as $key => $nocont){
    $sql = "insert into bcfcontainer(idbcf15, nocont,idsize)
    values ('{$idbcf15}','$nocont','{$_POST['size'][$key]}')";
    mysql_query($sql);
    }
    echo 'Data telah disimpan';
    
    ?>