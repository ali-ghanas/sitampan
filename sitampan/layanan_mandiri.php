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
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
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
            <div id="nav" style="background:#335270;min-height:50px;color:#fff"><h3 align="center" ><span ><i class='fa fa fa-search-plus fa-3x' ></i> </span>LAYANAN MANDIRI SITAMPAN BTD <i class='fa fa fa-search-minus fa-3x' ></i></h3></div>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row" >
                        <div class="span3" >
                            <h3> Layanan Mandiri <a href="#myModal12" role="button" class="btn btn-info" data-toggle="modal">??</a></h3>
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
                                <legend>Masukan Kata Kunci <i class='fa fa fa-pencil fa-3x' ></i></legend>
                                <form method="post" action="layanan_mandiri.php?hal=layananmandiri">
                                    <select name="cmb_cari">
                                        <option  value="bcf15" >No BCF 1.5</option>
                                        <option value="cont">No Container</option>
                                        <!--                                                  <option value="bebas">Pencarian Bebas</option>-->

                                    </select>

                                    <input type="text" name="katakunci"   placeholder="Kata Kunci" tittle="asasa" />  <input type="text" name="tahun" placeholder="Tahun BCF 1.5 Mis:2012"/><br/>
                                    <i class="icon-search"></i> <input type="submit" class="btn btn-primary" name="cari" value="Cari"/>  <input name="mode" type="hidden" id="mode" value="cari" />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="layanan_mandiri.php?pilih=infolayanan" class="btn btn-primary"> <i class="icon-home"></i> <a href=""></a>
                                </form>

                        </div>
                        <div class="span9" >
                            <?php include "loader.php"; ?>
                        </div>


                    </div>
                </div>

            </div>
            <div id="footer"  style="background: #335270;color:#fff;border-radius:10px;">
                <p align="center"><strong>KPU BEA DAN CUKAI TIPE A TANJUNG PRIOK</strong><br/><strong>SEKSI TEMPAT PENIMBUNAN PABEAN</strong><br/><small>Hak Cipta &copy Seksi Tempat Penimbunan 2013</small><br/><a>Powered By TIM IT KPU</a></p>

            </div>

        </div>


    </body>
</html>