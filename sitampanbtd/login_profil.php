<!doctype html>
<?php
include "lib/koneksi.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login_SITAMPAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/custom.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="favicon.jpg" />
  </head>
  <body >
      
 

    
    
      <div class="container" style="border:#4088b8 solid 0px;">
<!--          <div id="header" style="background:#fff;min-height:100px;vertical-align: center;"><img src="images/new/sitampan.png" valign="center"/></div>-->
          <div id="nav" style="background:#425B84;min-height:50px;color:#fff"><h3 align="center" ><span ><i class="icon-th-large"></i></span>SITAMPAN<i class="icon-th-large"></i></h3></div>
          <div >
              <ul class="nav nav-tabs" style="background-color:#fff">
                  <li >
                    <a href="login.php">Home</a>
                  </li>
                  <li class="active" ><a href="login_profil.php" >Profil</a></li>
                  <li ><a href="login_20besar.php">20 Besar BCF 1.5 </a></li>
              </ul>
          </div>
          <div class="tab-content">
                      
                      
                          <div class="row" >
                              <div class="span12">
                                        <table class="table table-striped">
                                            <tr>
                                                <td><h3>Dasar Hukum</h3></td>
                                            </tr>
                                            <tr>
                                                <td><p >Pengelolaan barang yang diyatakan tidak dikuasai (BTD), barang yang dikuasai negara (BDN) dan barang yang menjadi milik negara (BMN)
                                                    berdasarkan peraturan sebagai berikut:
                                                    <ol>
                                                        <li>UU No 17 Tahun 2006 Tentang Kepabeanan</li>
                                                        <li><a href='62PMK.04_2011.pdf' target="_blank">PMK 62/PMK.04/2011</a> Tentang Penyelesaian Terhadap Barang Yang Dinyatakan Tidak Dikuasai, Barang Yang Dikuasai Negara, dan Barang Yang Mejadi Milik Negara</li>
                                                        <li><a href='PMK_240_2012.pdf' target="_blank">PMK 240/PMK.06/2012</a> Tentang Tata Cara Pengelolaan Barang Milik Negara Yang Berasal Dari Aset Eks Kepabeanan dan Cukai</li>
                                                        <li><a href='KEP-81_2013.pdf' target="_blank">KEP- 81/BC/2013</a> Tentang Pelimpahan Wewenang Kepada Direktur P2, Kepala Kanwil DJBC, Kepala KPUBC, Kepala KPPBC untuk dan atas Nama Direktur Jenderal Bea Dan Cukai Membuat dan Menandatangani Surat Penyampaian Daftar mengenai Barang Yang Menjadi Milik Negara dan Usulan Peruntukan Barang Yang Menjadi Milik Negara</li>
                                                    </ol>
                                                    </p> 

                                                </td>
                                            </tr>
                                            <tr>
                                                <td><h3>Unit Pelaksana</h3></td>
                                            </tr>
                                            <tr>
                                                <td><p >Dalam pelaksanaan penetapan dan pengelolaan atas BTD,BDN dan BMN pada kantor 
                                                        Pelayanan Utama Bea dan Cukai Tipe A Tanjung Priok berada pada unit pelaksana yang saling berkaitan satu sama lain sebagaimana diuraikan dibawah ini: 
                                                        <dl class="dl-horizontal">
                                                          <dt>S. Adm. Manifest</dt>
                                                          <dd><ol>
                                                                  <li>Melakukan Penetapan BTD/BCF 1.5</li>
                                                                  <li>Melakukan pembukaan pos atas penutupan (T4) pos BC 1.1 pada aplikasi Manifest</li>
                                                              </ol>
                                                          </dd>
                                                          <dt>S. Penimbunan 2</dt>
                                                          <dd><ol>
                                                                  <li>Membuat surat perintah penarikan BTD/BDN dari TPS ke TPP</li>
                                                                  <li>Memonitoring penarikan BTD/BDN</li>
                                                                  <li>Membatalkan Status BTD yang masih berada di TPS</li>
                                                                  <li>Menerbitkan Persetujuan pengeluaran empty container di TPP</li>
                                                              </ol>
                                                          </dd>
                                                          <dt>S. Penimbunan 3</dt>
                                                          <dd><ol>
                                                                  <li>Membuat surat pemberitahuan penetapan BTD ke consignee /importir</li>
                                                                  <li>Mengelolah BTD,BDN dan BMN yang ada diTPP</li>
                                                                  <li>Melaksanakan proses lelang BTD,BDN,BMN</li>
                                                                  <li>Melaksanakan proses Musnah BTD,BDN,BMN</li>
                                                                  <li>Melaksanakan konfirmasi status ke P2 terhadap BTD yang akan dibatalkan statusnya</li>
                                                                  <li>Membatalkan Status BTD yang masih berada di TPP</li>
                                                                  <li>Menerbitkan persetujuan stripping/stuffing container di TPP</li>
                                                              </ol>
                                                          </dd>
                                                          <dt>S. Penindakan</dt>
                                                          <dd><ol>
                                                                  <li>Melakukan pengawasan terhadap BTD,BDN di TPP</li>
                                                                  <li>Menjawab konfirmasi BTD dari Seksi Penimbunan</li>
                                                                  <li>Menetapkan Status BDN terhadap barang tegahan</li>

                                                              </ol>
                                                          </dd>
                                                        </dl>
                                                    </p> 

                                                </td>
                                            </tr>
                                            <tr>
                                                <td><h3>Daftar TPP Aktif</h3></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php 
                                                        $sqltpp = "SELECT * FROM tpp "; // memanggil data dengan id yang ditangkap tadi
                                                        $querytpp = mysql_query($sqltpp);
                                                        while($datatpp = mysql_fetch_array($querytpp)){
                                                       ?>

                                                       <ul style="background:#fff">
                                                           <li><a href="login.php?pilih=profiltpp&id=<?php echo $datatpp['idtpp']?>"><?php echo $datatpp['nm_tpp']; ?></a></li>

                                                       </ul>
                                                       <?php
                                                        };
                                                       ?>
                                                </td>
                                            </tr>

                                        </table>
                                  
                              </div>
                          </div>
                      
          </div>
	<div id="footer"  style="background: #425B84;color:#fff;border-radius:10px;">
            <p align="center"><strong>KPU BEA DAN CUKAI TIPE A TANJUNG PRIOK</strong><br/><strong>SEKSI TEMPAT PENIMBUNAN PABEAN</strong><br/><small>Hak Cipta &copy Seksi Tempat Penimbunan 2013</small><br/><a style="color:#fff;" >Powered By Nento'x</a></p>
            
        </div>
          
      </div>
      
   
  </body>
</html>