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
  <script type="text/javascript">

          function ajax()
          {
          if (window.XMLHttpRequest)
          {
             xmlhttp=new XMLHttpRequest();
          }
          else
          {
             xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
          }

          xmlhttp.open("GET","sms/piket/run_piket.php");
          xmlhttp.send();
          setTimeout("ajax()", 5000);
          }
          </script>
  <body onload="ajax()">
      
 

    <script type="text/javascript">
            $(document).ready(function(){
                if ($('#loginForm').size()) {
                        $.getScript(
                            'lib/js/jquery.passroids.min.js',
                        function() {
                        $('form').passroids({
                         main : "#inputPassword"
                                             });
                            }
                    );
                    }
            });
    </script>
<style type="text/css">
    
    #psr_score {
	    background: transparent;
	    display: block;
	    margin: 0;
	    padding: 0;
	    width: 200px;	
    }
    
	.psr_Lemah,
	.psr_Sedang,
	.psr_Kuat,
	.psr_Sempurna {
		background: transparent url(images/new/bg-password-strength.png) no-repeat 0 0;
		display: block;
		margin: 0.5em 0 0.2em 5px;
		padding: 10px 0 0;
	}
	
	.psr_Sedang {
		background-position: 0 -50px;
	}
	
	.psr_Kuat {
		background-position: 0 -100px;
	}
	
	.psr_Sempurna {
		background-position: 0 -150px;
	}
</style>
<script>
  $('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
  
})
var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
$.fn.bootstrapBtn = bootstrapButton            // give $().bootstrapBtn the bootstrap functionality
$('#element').tooltip('show');
</script>
    
      <div class="container" style="border:#4088b8 solid 0px;">
<!--          <div id="header" style="background:#fff;min-height:100px;vertical-align: center;"><img src="images/new/sitampan.png" valign="center"/></div>-->
          <div id="nav" style="background:#425B84;min-height:50px;color:#fff"><h3 align="center" ><span ><i class="icon-th-large"></i></span>SITAMPAN<i class="icon-th-large"></i></h3></div>
          <div >
              <ul class="nav nav-tabs" style="background-color:#fff">
                  <li class="active">
                    <a href="login.php">Home</a>
                  </li>
                  <li><a href="login_profil.php">Profil</a></li>
                  <li><a href="login_20besar.php">20 Besar BCF 1.5 </a></li>
              </ul>
          </div>
          <div class="tab-content">
                     
                            <div class="row" >
                                  <div class="span3" style="border:#4088b8 solid 0px;" >
                                      <fieldset>
                                          <legend>Login</legend>
                                            <form class="form-horizontal" id="loginForm" method="post" action="loginsubmit.php">
                                              <div class="control-group" >
                                                  <input type="text" name="username"   id="inputEmail"  placeholder="Username">
                                              </div>
                                              <div class="control-group">
                                                <input type="password" name="pass" id="inputPassword" placeholder="Password">
                                               </div>
                                                  <div class="control-group">
                                                     <button type="submit"  class="btn btn-primary" data-loading-text="Loading..."><i class="icon-ok-sign"></i> Sign in</button>
                                                     <button type="reset" class="btn btn-danger"><i class="icon-remove"></i> Reset</button>
                                                  </div>
                                                    <div class="control-group">
                                                        <a href="lupapass.php">Lupa user dan password ?</a>
                                                     
                                                    </div>
                                                <tr>
                           
                                            </form>
                                    </fieldset>
                                     <fieldset>
                                          <legend>Layanan Mandiri <a href="#myModal12" role="button" class="btn btn-info" data-toggle="modal">??</a></legend>
                                          
                                               <div id="myModal12" class="modal hide fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                        <h3 id="myModalLabel">Info</h3>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>
                                                            Layanan Mandiri Seksi Tempat Penimbunan merupakan layanan mandiri mencari informasi status BCF 1.5 yang sedang atau dalam proses pembatalan BCF 1.5.
                                                        </p>

<!--                                                        <div class="alert alert-block">
                                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                          <h4>Belum Selesai Nich</h4>
                                                          Maaf Layanan ini sedang dalam tahap penyempurnaan.belum bisa digunakan
                                                        </div>-->
                                                      </div>
                                                      <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

                                                      </div>
                                            </div>
                                          <a href="layanan_mandiri.php?pilih=infolayanan" class="btn btn-large btn-primary"><i class="icon-search"></i> Ke Layanan</a>
                                       </fieldset>
                                      <br />

                                <fieldset>
                                       <legend>Hot Events</legend>
                                       <ol>
                                           <li><a href="?pilih=info_lelang">Lelang</a></li>
                                           <li><a href="?pilih=info_musnah">Musnah</a></li>
                                           <li><a href="?pilih=info_hibah">Hibah</a></li>
                                           <li><a href="?pilih=info_ppkp">P2KP S.Penimbunan</a></li>
<!--                                           <li><a href="?pilih=info_famgat">Gathering</a></li>-->
                                           <li><a href="?pilih=info_lainnya">Umum</a></li>
                                           
                                       </ol>
                                </fieldset> 
                                <fieldset>
                                       <legend>Profil TPP</legend>
                                       <?php 
                                        $sqltpp = "SELECT * FROM tpp "; // memanggil data dengan id yang ditangkap tadi
                                        $querytpp = mysql_query($sqltpp);
                                        while($datatpp = mysql_fetch_array($querytpp)){
                                       ?>
                                       
                                       <ul style="background:#fff">
                                           <li><a href="?pilih=profiltpp&id=<?php echo $datatpp['idtpp']?>"><?php echo $datatpp['nm_tpp']; ?></a></li>
                                                                                    
                                       </ul>
                                       <?php
                                        };
                                       ?>
                                </fieldset> 
                                
                                  </div>
                                  <div class="span9" style="border:#4088b8 solid 0px;min-height: 200px;">
                                      <?php include "login_loader_home.php";?>

                                  </div>
                                 

                               
                      </div>
                      
                      
              
          </div>
	<div id="footer"  style="background: #425B84;color:#fff;border-radius:10px;">
            <p align="center"><strong>KPU BEA DAN CUKAI TIPE A TANJUNG PRIOK</strong><br/><strong>SEKSI TEMPAT PENIMBUNAN PABEAN</strong><br/><small>Hak Cipta &copy Seksi Tempat Penimbunan 2013</small><br/><a style="color:#fff;" >Powered By Nento'x</a></p>
            
        </div>
          
      </div>
      
   
  </body>
</html>