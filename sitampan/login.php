<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Login SITAMPAN</title>
         
        <link href="css/custom.css" rel="stylesheet" media="screen">
        <link href="bootstrap3.1/css/bootstrap.min.css" rel="stylesheet" media="screen">
        
         <link href="bootstrap3.1/css/bootstrap.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="bootstrap3.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="favicon.jpg" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <link href="css/login.css" rel="stylesheet" media="screen">
<!--        <script src="js/login.js"></script>-->
</head>

<body>
    <?php
    session_start();
        if (empty($_SESSION['username']) AND empty($_SESSION['password']))
        {
            include 'notifikasiadminsiap.php';
    ?>
    
  <div class="container">  
     
      
      
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div >
            
            <h1 class="text-center login-title">SIGN IN TO CONTINUE TO SITAMPAN</h1>
            
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     
                    
                    <div style="padding-top:30px" class="panel-body" >
                        <div >
                            <marquee direction="left"onmouseover="this.stop()" onmouseout="this.start()" scrollamount="8" scrolldelay="100">
                                <a>Selamat datang pada SITAMPAN, aplikasi pengelolaan Barang Yang Dinyatakan Tidak Dikuasai, Barang Dikuaai Negara dan Barang Yang Menjadi Milik Negara</a>
                            </marquee>
                        </div>

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="post" action="loginsubmit.php">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="pass" placeholder="password">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button type="submit"  class="btn btn-primary" data-loading-text="Loading..."><i class="icon-ok-sign"></i> Sign in</button>
                                      <button type="reset" class="btn btn-danger"><i class="icon-remove"></i> Reset</button>
                                      

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                           Sekilas tentang SITAMPAN
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Click Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
     </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">SITAMPAN</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <h3 class="text-center login-title">APLIKASI SITAMPAN</h3>
                            <p>
                                merupakan aplikasi pengelolaan Barang Yang Dinyatakan Tidak Dikuasai, Barang Dikuasai Negara dan Barang Yang Menjadi Milik Negara.
                                Aplikasi ini dibuat untuk menjembatani aplikasi ceisa yang belum meng-support secara penuh terhadap pengelolaan BTD,BDN dan BMN, dimana 
                                secara penuh pengelolaannya dibawah Seksi Tempat Penimbunan Bidang PPC III.
                                
                            </p>
                            <p>
                                Dengan adanya aplikasi ini diharapkan mempermudah pengelolaan serta administrasi terhadap dokumen BTD, BDN dan BMN.
                            </p>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
    
<?php
        }
        else {
?>
        <div class="container">
	<div class="login-container">
            <div id="output"></div>
            <div class="avatar" style="background-image: url(../../../sitampanbtd/images/photo/<?php echo $_SESSION['avatar']?>)"></div>
            <div class="form-box">
                <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Selamat Datang  <?php echo $_SESSION['nm_lengkap']; ?></h3>
                            </div>
                            <div class="panel-body">
                                <a href="index.php?hal=home"><i class="icon-home"></i>Home</a>
                            </div>
                            <div class="panel-footer">
                                <?php if($_SESSION['appadmin']=='1'){
                                                echo "   <a href='admin/index.php?hal=user'><button class='btn btn-small btn-inverse' type='button'><img src='image/5.png' width='20px'/>ADMIN</button></a>   ";
                                            } 
                                            else {}
                                          
                                          if($_SESSION['appoa']=='1'){
                                                echo "  <a href='#'><button class='btn btn-small btn-info' type='button'><img src='image/4.png' width='20px'/>OA</button></a>  ";
                                            } 
                                            else {}
                                          if($_SESSION['appbtd']=='1'){
                                                echo "  <a href='../sitampanbtd/index.php' target='_blank'><button class='btn btn-small btn-success' type='button'><img src='image/3.png' width='20px'/>BTD</button></a>  ";
                                            } 
                                            else {}
                                         if($_SESSION['appbdn']=='1'){
                                                echo "  <a href='#'><button class='btn btn-small btn-warning' type='button'><img src='image/2.png' width='20px'/>BDN</button></a>  ";
                                            } 
                                            else {}
                                        if($_SESSION['appbmn']=='1'){
                                                echo " <a href='#'><button class='btn btn-small btn-danger' type='button'><img src='image/1.png' width='20px'/>BMN</button></a> ";
                                            } 
                                            else {}
                                    ?>
                            </div>
                </div>
                <h3></h3>
                
                <br/>
                <div >
                                    
                                        
                                   
                                        
                                        
                                        
                                        
                                </div>   
            </div>
        </div>
        
    </div>
    
    <?php 
    
        };
    ?>
</body>
</html>