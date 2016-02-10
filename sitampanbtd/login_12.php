<!doctype html>
<?php
include "lib/koneksi.php";
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="themes/main.css" />
    <meta charset="utf8">
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
    <title>login</title>
    <link rel="stylesheet" href="lib/js/dropdownlogin/css/style.css" />

  <script src="lib/js/jquery-ui-1.9.1/js/jquery-1.8.2.js"></script>
<!--  <script src="lib/js/jquery-1.4.js"></script>-->
    <script src="lib/js/jquery-ui-1.9.1/js/jquery-ui-1.9.1.custom.js"></script>
    
   <script>
	$(function() {
		$( document ).tooltip({
			position: {
				my: "center bottom-20",
				at: "center top",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
						.addClass( "arrow" )
						.addClass( feedback.vertical )
						.addClass( feedback.horizontal )
						.appendTo( this );
				}
			}
		});
	});
	</script>
	<style>
        
            label {
		display: inline-block; width: 1em;
	}
	
	
	.ui-tooltip, .arrow:after {
		background: #124578;
		border: 2px solid white;
               
	}
	.ui-tooltip {
		padding: 10px 20px;
		color: white;
                width: 300px;
                font-size: 6pt;
		border-radius: 10px;
		font: bold 12px "Helvetica Neue", Sans-Serif;
		text-transform: uppercase;
		box-shadow: 0 0 7px black;
                
	}
	.arrow {
		width: 50px;
		height: 16px;
		overflow: hidden;
		position: absolute;
		left: 50%;
		margin-left: -35px;
		bottom: -16px;
	}
	.arrow.top {
		top: -16px;
		bottom: auto;
	}
	.arrow.left {
		left: 20%;
	}
	.arrow:after {
		content: "";
		position: absolute;
		left: 20px;
		top: -20px;
		width: 25px;
		height: 25px;
		box-shadow: 2px 5px 9px -9px black;
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		tranform: rotate(45deg);
	}
	.arrow.top:after {
		bottom: -20px;
		top: auto;
	}
        
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
        <script type="text/javascript">
            $(document).ready(function(){
                if ($('#loginForm').size()) {
                        $.getScript(
                            'lib/js/jquery.passroids.min.js',
                        function() {
                        $('form').passroids({
                         main : "#password"
                                             });
                            }
                    );
                    }
            });
</script>
   
</head>
<body >
    <?php 
    $act = $_GET['act'];
    
                if($act=="1"){echo "<script>alert ('Anda tidak aktif lebih dari satu jam, demi keamanan silahkan login kembali')</script>";};
                if($act=="2"){echo "<script>alert ('Terima Kasih')</script>";};
                if($act=="3"){echo "Penambahan Berhasil";};
    ?>
    <div >
        <table border="0" align="center">
            <tr align="center">
                <td colspan="2">
                    <table border="0" width="70%" valign="center">
                        
                        <tr>
                            <td class="judulbreadcrumb" align="center"><h3>Selamat Datang Pada Aplikasi SITAMPAN</h3></td>
                        </tr>
                        <tr>
                            <td class="isitabel">
                                <a><p><h4>Aplikasi SITAMPAN merupakan aplikasi pengelolaan barang yang dinyatakan sebagai Barang Yang Tidak Dikuasai, Barang Yang Dikuasai negara dan barang yang menjadi milik negara, yang bertujuan memudahkan administrasi atas barang barang tersebut. </p>
                                <p>Untuk dapat mengakses aplikasi silahkan menghubungi administrator masing-masing bidang terkait pelayanan BCF 1.5</p>
                                <p>Salam Admin</h4></p></a>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td height="50"></td></tr>
            <tr align="center">
                <td align="center">
                    <table width="100%" border="0" align="center">
                        <tr align="center">
                            <td>
                                <form  id="loginForm" method="post" action="loginsubmit.php">

                                    <fieldset id="body">

                                        <legend>Silahkan Login</legend>
                                        <table border="0" width="100%" cellpadding="2" cellspacing="2">
                                            <tr>
                                                <td class="judulform">Username</td><td>:</td><td><input type="text" size="80" name="username" class="username" title="Masukan username" id="username" value="" /></td>
                                            </tr>
                                            <tr>
                                                <td class="judulform">Password</td><td>:</td><td ><input type="password"  size="80" name="pass" title="Masukan Password" class="password" id="password" value="" /></td>
                                            </tr>
                                            
                                            <tr>
                                                <td height="40"></td><td colspan="2"><input type="submit" title="Ok" id="login" value="Sign in" name="login"/></td>
                                            </tr>
                                               
                                                
                                        </table>
                                       
                                    </fieldset>

                                </form>
                        </td>
                    </tr>
                       </table>
                 </td>
        </tr>
        <tr><td height="50"></td></tr>
        </table>
</div>
    <div>
    <table border="0" width="70%" align="center" class="isiform">
            <tr ><td   ><font color="#808080"  size="3pt">Sistem Informasi Tempat Penimbunan Pabean </font><font color="red" title="Aplikasi ini merupakan pengembangan dari aplikasi SITAMPAN versi 1.0">V.02 Beta 2012</font></td></tr>
            <tr><td   ><font color="#808080" size="3">Seksi Tempat Penimbunan</font> </td></tr>
            <tr ><td   ><font color="blue" size="3" title="Gunakan Mozilla Firefox untuk tampilan terbaik">Powered by Tim IT Penimbunan</font></td></tr>
            <tr ><td   ><font  size="3"><a href="#" title="1. Aplikasi ini hanya untuk mempermudah pegawai dalam mengakses data.<br/> 2. Programer tidak bertanggung jawab atas segala sesuatu yang di input oleh user.<br/>3. untuk dapat mengakses aplikasi ini silahkan hub Admin Seksi penimbunan.<br/>  ">Disclaimer</a></font></td></tr>
            
    </table>
    </div>      
        
</body>
</html>