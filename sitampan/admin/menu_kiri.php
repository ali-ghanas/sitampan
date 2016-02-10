
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title></title>
        
</head>
<body>

<?php 



if($_SESSION['level']=="admin") {
    if($_REQUEST['hal']=='user'){
        echo "<ul class='nav nav-list'>
                    <li class='nav-header'>Manajemen User</li>
                    <li ><a href='?hal=user&pilih=manajemenuser'>Manajemen User</a></li>
                    <li ><a href='?hal=user&pilih=manajemenuserol'>User Online</a></li>
                    <li ><a href='?hal=user&pilih=manajemenuserhist'>History Akses</a></li>
                    <li ><a href='?hal=user&pilih=manajemenhistbcf15'>History Update BCF 1.5</a></li>

          </ul>";
    }
    
    elseif($_REQUEST['hal']=='settapp'){
        echo "<ul class='nav nav-list'>
            <li class='nav-header'>Setting Aplikasi</li>
                    <li ><a href='?hal=settapp&pilih=manajementpp'>Manajemen TPP</a></li>
                    <li ><a href='?hal=settapp&pilih=manajementgllibur'>Tanggal Libur</a></li>
                    <li ><a href='?hal=settapp&pilih='>Daftar Event</a></li>
                    <li ><a href='?hal=settapp&pilih='>Update Tabel</a></li>
                    <li ><a href='?hal=settapp&pilih=dump'>Backup DB SITAMPAN</a></li>
                    
            <li class='nav-header'>Pemberitahuan Admin</li>
                    <li ><a href='?hal=settapp&pilih=input_notif'>Pemberitahuan</a></li>
                    
                    
           <li class='nav-header'>Daftar Aplikasi</li>
                    <li ><a href='?hal=settapp&pilih='>Office Otomation (OA)</a></li>
                    <li ><a href='../../sitampanbtd/index.php' target='_blank'>Barang Tidak Dikuasai (BTD)</a></li>
                    <li ><a href='?hal=settapp&pilih='>Barang Dikuasai Negara (BDN)</a></li>
                    <li ><a href='?hal=settapp&pilih='>Barang Milik Negara (BMN)</a></li>
          </ul>";
    }
    elseif($_REQUEST['hal']=='seksi'){
        echo "<ul class='nav nav-list'>
            
            <li class='nav-header'>Penandatangan Dok</li>
                    <li ><a href='?hal=seksi&pilih=manajemenseksi'>Seksi Penandatangan</a></li>
                    <li ><a href='?hal=seksi&pilih=manajemenseksiuser'>User Terdaftar</a></li>

          </ul>";
    }
        
}




?>




</body>

</html>


