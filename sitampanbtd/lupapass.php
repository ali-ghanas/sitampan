<!doctype html>
<?php
include "lib/koneksi.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Layanan Mandiri SITAMPAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/custom.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="favicon.jpg" />
    <script>
      
    $('#element').tooltip('show');
    </script>
    
  </head>
  <body >
      
    
      <div class="container" >
<!--          <div id="header" style="background:#fff;min-height:100px;vertical-align: center;"><img src="images/new/sitampan.png" valign="center"/></div>-->
          <div id="nav" style="background:#335270;min-height:50px;color:#fff"><h3 align="center" ><span ><i class="icon-th-large"></i></span>Seksi Tempat Penimbunan Pabean Bid PPC III<i class="icon-th-large"></i></h3></div>
          <div class="tab-content">
                      <div class="tab-pane active" id="home">
                            <div class="row" >
                                  <div class="span12" >
                                      <h3>Lupa Username dan Password Anda ? <a href="#myModal12" role="button" class="btn btn-info" data-toggle="modal">??</a></h3>
                                      <div id="myModal12" class="modal hide fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                        <h3 id="myModalLabel">Info</h3>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>
                                                            Layanan Mandiri Seksi Tempat Penimbunan merupakan layanan mencari informasi status BCF 1.5 yang sedang atau dalam proses pembatalan BCF 1.5.
                                                        </p>

                                                        <div class="alert alert-block">
                                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                          <h4>Ready</h4>
                                                          
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

                                                      </div>
                                            </div>
                                      <div span="6" align="center">
                                              <fieldset>
                                                <legend>Isikan formulir dibawah ini untuk mendapatkan sms balasan ke Handphone Anda</legend>
                                                <span class="muted">Pastikan sebelumnya Anda telah mengupdate nomor HP di menu update user, <a href="lupass_cara.php">Klik Sini</a></span>
                                                    <form method="post" action="lupapass.php?pilih=lupapassproses">

                                                        <input type="text" name="nip"   placeholder="NIP Baru Anda" title="Isikan nip baru secara lengkap" /> <br/> 
                                                        <input type="text" name="nohp"   placeholder="No HP Yang Tersimpan di DB" title="isikan no hp yang tersimpan di data base" /> <br/> 
                                                        
                                                       <i class="icon-repeat"></i> <input type="submit" class="btn btn-primary" name="kirim" value="Kirim"/>  <input name="mode" type="hidden" id="mode" value="kirim" />
                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php" class="btn btn-primary"> <i class="icon-home"></i> <a href=""></a>
                                                    </form>


                                            </fieldset>
                                      </div>
                                      <div class="span6" >
                                       <?php include "lupapass/loader.php";?>
                                      </div>
                                  
                                      
                                     
                                  </div>
                                  


                          </div>
                      </div>
                      
          </div>
	<div id="footer"  style="background: #335270;color:#fff;border-radius:10px;">
            <p align="center"><strong>KPU BEA DAN CUKAI TIPE A TANJUNG PRIOK</strong><br/><strong>SEKSI TEMPAT PENIMBUNAN PABEAN</strong><br/><small>Hak Cipta &copy Seksi Tempat Penimbunan 2013</small><br/><a>Powered By Nento'x</a></p>
            
        </div>
          
      </div>
      
   
  </body>
</html>