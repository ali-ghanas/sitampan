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
                  <li ><a href="login_profil.php">Profil</a></li>
                  <li class="active"><a href="login_20besar.php">20 Besar BCF 1.5 </a></li>
              </ul>
          </div>
          
                  <div class="row" >
                      <div class="span12">
                          
                             
                              <?php error_reporting(0); include "lap_per_importir.php" ?>
                         
                      </div>
                  </div>
                  
         </div>
	<div id="footer"  style="background: #425B84;color:#fff;border-radius:10px;">
            <p align="center"><strong>KPU BEA DAN CUKAI TIPE A TANJUNG PRIOK</strong><br/><strong>SEKSI TEMPAT PENIMBUNAN PABEAN</strong><br/><small>Hak Cipta &copy Seksi Tempat Penimbunan 2013</small><br/><a style="color:#fff;" >Powered By Nento'x</a></p>
            
        </div>
          
      </div>
      
   
  </body>
</html>