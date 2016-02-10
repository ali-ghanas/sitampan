<html>
    <head>
    <title>SITAMPAN</title>
    <!--       jquery anytimes -->
       <?php include "lib/koneksi.php" ?>
        
        
        
        
    
    </head>
    <body>
        
                    <div>
                    <table border="0" width="100%" align="center" cellpadding=0 cellspacing=0>
                       
<!--                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagebatal&pilihloket=newp2><img src="images/new/mtk.png"/></a>Jawaban Konfirmasi P2 <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where (recordstatuskonf='3' or recordstatuskonf='2' ) and setujubatal='2' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)<br></td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagebatal&pilihloket=tanpakonf><img src="images/new/mtk.png"/></a>Segera Batal Tanpa Konfirmasi <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where ((jalur='1' or  jalur='2' or jalur='3' or jalur='4' or jalur='5') and recordstatuskonf='0' and batal='1' and perlukonf='0' and setujubatal='2'  )");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)<br></td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagebatal&pilihloket=dafbatal><img src="images/new/mtk.png"/></a>Daftar Persetujuan Pembatalan <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where  Batal='1'  and setujubatal='1'  ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)<br></td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagebatal&pilihloket=helpbatal><img src="images/new/help_1.jpg"/></a> Help </font><br /></td>
                                    </tr>-->
                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagebatal&pilihloket=newp2><img src="images/new/mtk.png"/></a>Pembatalan Dengan Konfirmasi <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where (recordstatuskonf='3' or recordstatuskonf='2' or recordstatuskonf='1' ) and setujubatal='2' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)<br></td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagebatal&pilihloket=tanpakonf><img src="images/new/mtk.png"/></a>Pembatalan Tanpa Konfirmasi <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where ((jalur='1' or  jalur='2' or jalur='3' or jalur='4' or jalur='5') and recordstatuskonf='0' and batal='1' and perlukonf='0' and setujubatal='2'  )");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)<br></td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" size="4"><b><a href=index.php?hal=pagebatal&pilihloket=edit_batal><img src="images/new/mtk.png"/></a>Browse Pembatalan</td>
                                    </tr>
                                    <tr>
                                        <td height="30"></td>
                                    </tr>
                                    <tr>
                                        <td class="judulbreadcrumb" colspan="4" >
                                            <?php
                                                
                                                if($_GET['pilihloket']==''){
                                                echo "SILAHKAN PILIH MENU PEMBATALAN  BCF 1.5 DIATAS";
                                                }
                                                elseif($_GET['pilihloket']=='newp2'){
                                                echo "Daftar BCF 1.5 Yang Harus Segera Di Batalkan ";
                                                }
                                                elseif($_GET['pilihloket']=='tanpakonf'){
                                                echo "Daftar BCF 1.5 Yang Harus Segera di Batalkan Tanpa Proses Konfirmasi";
                                                }
                                                elseif($_GET['pilihloket']=='dafbatal'){
                                                echo "Daftar BCF 1.5 Yang Telah Setuju DIbatalkan";
                                                }
                                                elseif($_GET['pilihloket']=='edit_batal'){
                                                echo "Browse Setuju Batal BCF 1.5 ";
                                                }
                                                elseif($_GET['pilihloket']=='helpbatal'){
                                                echo "Petunjuk Aplikasi ";
                                                }
                                               
                                                
                                                
                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    <td align="left" id="groupmodul1"><font face=arial size=2 ><?php include "loket/pilihloket.php";?></font></td>

                                    </tr>
                                    
                            </table><br></br>
        
             </div>
      
        
                   
      
    </body>
</html>
