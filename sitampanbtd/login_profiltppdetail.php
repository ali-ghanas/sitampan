<!doctype html>
<?php
include "lib/koneksi.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Info Lelang</title>
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
      <?php 
        $id = $_GET['id']; // menangkap id
        $sql = "select * FROM tpp WHERE idtpp='$id'"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
               
       ?>
    <table width="100%">
    <caption><h2 ><?php echo $data['nm_tpp']; ?></h2> </caption>
        <tr>
            <td class="text-error">Nama</td><td>:</td><td class="text-info"><?php echo $data['nm_tpp']; ?> /  <?php echo $data['npwp_tpp']; ?> </td>
        </tr>
        <tr>
            <td class="text-error">Alamat</td><td>:</td><td class="text-info"><?php echo $data['alamat_tpp']; ?> /  <?php echo $data['kota_tpp']; ?> 
             <a href="#myModalpeta" role="button" class="btn btn-info" data-toggle="modal">Peta Lokasi</a>
                <div id="myModalpeta" class="modal hide fade" tabindex="-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                        <h3 id="myModalLabel">Loading.....</h3>
                                                        <small>Pastikan Anda terkoneksi dengan internet.</small>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>
                                                            <?php include "login_profiltpp_map.php" ?>
                                                        </p>

                                                        <div class="alert alert-block">
                                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                          
                                                          Maaf layanan ini maksimal dengan koneksi internet yang cepat.
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

                                                      </div>
                                            </div>
            </td>
        </tr>
        <tr>
            <td class="text-error">Pimpinan</td><td>:</td><td class="text-info"><?php echo $data['nm_pemilik']; ?> </td>
        </tr>
        
               
            
        <tr>
            <td colspan="4" class="text-info">
                <?php echo $data['ket_lainnya']; ?>
            </td>
        </tr>
        <tr>
        <td colspan="4">
            <ul class="thumbnails" style="background-color: transparent;">
            <?php
                $sqlfoto = "SELECT * FROM tppfoto WHERE  idtpp=$data[idtpp]"; // memanggil data dengan id yang ditangkap tadi
                $queryfoto= mysql_query($sqlfoto);
                while($datafoto = mysql_fetch_array($queryfoto)){
            ?>
                
                    <li class="span4">
                    <div class="thumbnail">
                        <img src="admin/fototpp/<?php echo $datafoto['name'] ?>" alt="<?php echo $datafoto['keterangan_gbr']  ?>" /><a href="#myModalphoto<?php echo $datafoto['idtppfoto'] ?>" role="button" class="btn btn-info" data-toggle="modal">Perbesar</a>
                        
                        <small class="muted"><?php echo  $datafoto['tglupload']   ?></small>
                        <p class="muted"><?php echo  $datafoto['keterangan_gbr']   ?></p>
                    </div>
                      
                                    <div id="myModalphoto<?php echo $datafoto['idtppfoto'] ?>" class="modal hide fade" tabindex="-4" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                        <h3 id="myModalLabel"></h3>
                                                        
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>
                                                            <img src="admin/fototpp/<?php echo $datafoto['name'] ?>" alt="<?php echo $datafoto['keterangan_gbr']  ?>" />
                                                        </p>

                                                      </div>
                                                      <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

                                                      </div>
                                            </div>
                    </li>
                
                
            <?php }; ?>
           </ul>
        </td>
    </tr>
    </table>
        
          
      
  </body>
</html>                                