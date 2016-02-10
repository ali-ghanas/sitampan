<html>
    <head>
    <title>SITAMPAN</title>
    <!--       jquery anytimes -->
       <?php include "lib/koneksi.php" ?>
        
        
        
        
    
    </head>
    <body>
        <div>
                    <table border="0" width="100%" align="center" cellpadding=0 cellspacing=0>
                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagekonfirmasi&pilihloket=perlukonfcacah><img src="images/new/mtk.png"/></a>Cacah + Konfirmasi  <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where perlukonf='1' and recordstatuskonf='0' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>
<!--                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagekonfirmasi&pilihloket=perlukonf><img src="images/new/mtk.png"/></a>Konfirmasi <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where jalur='6' and Batal='1' and recordstatuskonf='0' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>-->
<!--                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagekonfirmasi&pilihloket=helpkonf><img src="images/new/help_1.jpg"/></a> Help </font><br /></td>
                                    </tr>-->
                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagekonfirmasi&pilihloket=edit_konf><img src="images/new/mtk.png"/></a>Browse Konfirmasi</td>
                                    </tr>
                                    <tr>
                                        <td height="30"></td>
                                    </tr>
                                    <tr>
                                        <td class="judulbreadcrumb" colspan="4" >
                                            <?php
                                                
                                                if($_GET['pilihloket']==''){
                                                echo "SILAHKAN PILIH MENU KONFIRMASI BCF 1.5 DIATAS";
                                                }
                                                elseif($_GET['pilihloket']=='perlukonfcacah'){
                                                echo "Daftar BCF 1.5 Yang Harus di Cacah dan Konfirmasi Ke P2";
                                                }
                                                elseif($_GET['pilihloket']=='perlukonf'){
                                                echo "Daftar BCF 1.5 Yang Harus Dikonfirmasi Ke P2";
                                                }
                                                elseif($_GET['pilihloket']=='helpkonf'){
                                                echo "Petunjuk Aplikasi ";
                                                }
                                               
                                                
                                                
                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    <td align="left"><font face=arial size=2><?php include "loket/pilihloket.php";?></font></td>

                                    </tr>
                                    
                            </table><br></br>
        
             </div>
      
    </body>
</html>
