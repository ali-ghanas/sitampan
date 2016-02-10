<html>
    <head>
    <title>Ubah BCF 15</title>
    <!--       jquery anytimes -->
        
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.metadata.js"></script>
        <script type="text/javascript" src="lib/js/jquery.media.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("a.dasarhukum").media({
                    
                });
            });
        </script>
        
       
    </head>
    <body>
       
                <?php
                session_start();
                if (isset($_SESSION['level']) && isset ($_SESSION['nm_lengkap'])) {


                    if ($_SESSION['level']=='admin') {
                        echo "<p>Hiiii :".$_SESSION['nm_lengkap']."</p>"; 

                    }
                    elseif ($_SESSION['level']=='manifest') {
                        echo "<p>Hiiii :".$_SESSION['nm_lengkap']."</p>";
                        echo "Silahkan Input BCF 1.5 di sini "; echo "[ <a href=?hal=bcf15>BCF 1.5</a> ]</b>";

                    }
                    elseif ($_SESSION['level']=='tpp3') {
                        echo "<p>Hiiii :".$_SESSION['nm_lengkap']."</p>"; 
                        echo "<p>Anda Adalah user dengan level akses adalah user pada seksi penimbunan  ".$_SESSION['level']." tugas pokok anda andalah : pembuatan surat pemberitahuan ke consignee, cetak dan kirim surat pemberitahuan, </p>";
                        
                    }
                    elseif ($_SESSION['level']=='tpp2') {
                        echo "<p>Hiiii :".$_SESSION['nm_lengkap']."</p>";

                    }
                    elseif ($_SESSION['level']=='p2') {
                        echo "<h1>Hiiii :".$_SESSION['nm_lengkap']."</h1>";   

                    }
                    elseif ($_SESSION['level']=='adminmanifest') {
                        echo "<h1>Hiiii :".$_SESSION['nm_lengkap']."</h1>";   

                    }
                    elseif ($_SESSION['level']=='seksimanifest') {
                        echo "<h1>Selamat Datang User:".$_SESSION['nm_lengkap']."</h1>";   

                    }
                    elseif ($_SESSION['level']=='seksitpp2') {
                        echo "<h1>Selamat Datang User:".$_SESSION['nm_lengkap']."</h1>";   

                    }
                    elseif ($_SESSION['level']=='pemwastpp') {
                        echo "<h1>Selamat Datang User:".$_SESSION['nm_lengkap']."</h1>";   

                    }
                   else {
                       echo "Maaf anda Tak Punya Hak Akses Lagi. Hub Admin";

                   }

                }
                else {
                    echo "<font size='12' color='#800000'></font>";
                    include 'login.php' ;

                }
                ?>
<!--    <field>
        <span>
                <a class="dasarhukum" href="page/dasarhukum/62PMK.04_2011.pdf">PMK 62/PMK.04/2011</a>
        </span>     
    </field>     -->
        </BODY>
        </HTML>
	
