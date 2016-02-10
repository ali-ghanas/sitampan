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
                                  <div class="span3" >
                                      <h3>Layanan Mandiri <a href="#myModal12" role="button" class="btn btn-info" data-toggle="modal">??</a></h3>
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
                                  <fieldset>
                                        <legend>Masukan Kata Kunci</legend>
                                            <form method="post" action="layanan_mandiri.php?pilih=layananmandiri">
                                                 <select name="cmb_cari">
                                                  <option  value="bc11" >No BC 1.1</option>
                                                  <option value="cont">No Container</option>
<!--                                                  <option value="bebas">Pencarian Bebas</option>-->

                                                </select>
                                                
                                                <input type="text" name="katakunci"   placeholder="no bc 1.1 /  no. contianer" tittle="asasa" /> 
                                                <input type="text" name="subkatakunci"   placeholder="pos bc 1.1" tittle="asasa" />
                                                <input type="text" name="tahun" placeholder="Tahun BC 1.1 Mis:2012"/><br/>
                                               <i class="icon-search"></i> <input type="submit" class="btn btn-primary" name="cari" value="Cari"/>  <input name="mode" type="hidden" id="mode" value="cari" />
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="layanan_mandiri.php?pilih=infolayanan" class="btn btn-primary"> <i class="icon-home"></i> <a href=""></a>
                                            </form>
                                            

                                    </fieldset>
                                      <fieldset>
                                       <legend>Hot Events</legend>
                                       <ol>
                                           <li><a href="?pilih=info_lelang">Lelang</a></li>
<!--                                           <li><a href="?pilih=info_musnah">Musnah</a></li>
                                           <li>Hibah</li>-->
                                       </ol>
                                </fieldset> 
                                     
                                  </div>
                                  <div class="span9" >
                                       <?php include "login_loader.php";?>
                                  </div>


                          </div>
                      </div>
                      
          </div>
	<div id="footer"  style="background: #335270;color:#fff;border-radius:10px;">
            <p align="center"><strong>KPU BEA DAN CUKAI TIPE A TANJUNG PRIOK</strong><br/><strong>SEKSI TEMPAT PENIMBUNAN PABEAN</strong><br/><small>Hak Cipta</small><br/><a>&copyTIM IT KPU TIPE A TANJUNG PRIOK</a></p>
            
        </div>
          
      </div>
      
   
  </body>
</html>