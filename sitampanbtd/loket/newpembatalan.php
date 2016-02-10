<html>
    <head>
    <title>SITAMPAN</title>
    <!--       jquery anytimes -->
       <?php include "lib/koneksi.php" ?>
        
        
        
        
    
    </head>
    <body>
        <div>
                    <table border="0"  width="100%" align="center" cellpadding=0 cellspacing=0>
                        <tr valign="top">
                            <td>
                                <table class="data isitabel" bgcolor="#eeefff">
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=newpembatalan&pilihloket=new_batalmita><img src="images/new/mtk.png" width="20"/>Browse BCF 1.5 (MITA)</a> </td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" ><b><a href=index.php?hal=newpembatalan&pilihloket=new_batalsoft><img src="images/new/mtk.png" width="20"/> Jawaban P2 SoftCopy</a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_jawabok' and konf_manualhc='0' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>
                                    <tr>
                                    <td><font color="blue"><b><a href=index.php?hal=newpembatalan&pilihloket=new_batalhard><img src="images/new/mtk.png" width="20"/>Jawaban P2 HardCopy *</a>  <?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_hardcopy' and konf_manualhc='1' and konf_jwabanmanualhc='1'  ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>
                                    
                                    
                                    
                                    
                                </table>
                            </td>
                            <td>
                                <table class="data isitabel" bgcolor="#eeefff">
                                    <tr>
                                    <td><font color="red" ><b><a href=index.php?hal=newpembatalan&pilihloket=new_batalmita_que><img src="images/new/mtk.png" width="20"/>Pembatalan BCF 1.5 MITA/Non MITA</a></td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" ><b><a href=index.php?hal=newpembatalan&pilihloket=new_batalsoft_que><img src="images/new/mtk.png" width="20"/>Pembatalan BCF 1.5 (Konf Soft Copy) </a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where  konf_statusakhir='konf_selesai' and konf_manualhc='0'");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>

                                    <tr>
                                    <td><font color="red" ><b><a href=index.php?hal=newpembatalan&pilihloket=new_batalhard_que><img src="images/new/mtk.png" width="20"/>Pembatalan BCF 1.5 (Konf Hardcopy)</a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_selesai' and konf_manualhc='1'");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>
                                    
                                    
                                </table>
                            </td>
                        </tr>
                                    
                                    <tr>
                                        <td height="30"></td>
                                    </tr>
                                    <tr>
                                        <td class="judultabel" colspan="2" >
                                            <?php
                                                
                                                if($_GET['pilihloket']==''){
                                                echo "SILAHKAN PILIH MENU PMEBATALAN BCF 1.5 DIATAS";
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
                                                elseif($_GET['pilihloket']=='new_konf'){
                                                echo "Browse BCF 1.5 untuk dilakukan Konfirmasi By System Ke P2 ";
                                                }
                                                elseif($_GET['pilihloket']=='new_kirimtpp'){
                                                echo "Konsep dan Kirim Data By Sistem ";
                                                }
                                                elseif($_GET['pilihloket']=='new_setuju'){
                                                echo "Daftar KOnfirmasi Yang Dapat Segera di Batalkan Status BCF 1.5 nya ";
                                                }
                                               
                                                
                                              
                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table border="0" class="data isitabel">
                                                <tr>
                                                    <td >
                                                    <font face=arial size=2><?php include "loket/pilihloket.php";?></font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    
                            </table><br></br>
        
             </div>
      
    </body>
</html>
