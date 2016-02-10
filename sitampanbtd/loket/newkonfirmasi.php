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
                                    <td><font color="red" ><b><a href=index.php?hal=newkonfirmasi&pilihloket=new_konf><img src="images/new/mtk.png" width="20"/>Browse BCF 1.5</a> </td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" ><b><a href=index.php?hal=newkonfirmasi&pilihloket=new_konsep><img src="images/new/mtk.png" width="20"/>Konsep </a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konsep'  ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>
                                    <tr>
                                    <td><font color="red"><b><a href=index.php?hal=newkonfirmasi&pilihloket=new_hardcopy><img src="images/new/mtk.png" width="20"/>Kirim Hard Copy Ke P2</a>  <?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_hardcopy' and konf_manualhc='0'   ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>
                                    
                                    
                                    
                                    
                                </table>
                            </td>
                            <td>
                                <table class="data isitabel" bgcolor="#eeefff">
                                    
                                    <tr>
                                    <td><font color="red" ><b><a href=index.php?hal=newkonfirmasi&pilihloket=new_terkirim><img src="images/new/mtk.png" width="20"/>Konfirmasi Terkirim </a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_system' or  konf_statusakhir='konf_hardcopy' or  konf_statusakhir='konf_jawabok'");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>

                                    <tr>
                                    <td><font color="red" ><b><a href=index.php?hal=newkonfirmasi&pilihloket=new_setuju><img src="images/new/mtk.png" width="20"/>Konfirmasi Setuju Batal</a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_jawabok'");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" ><b><a href=index.php?hal=newkonfirmasi&pilihloket=new_hardcopy_terkirim><img src="images/new/mtk.png" width="20"/>Konfirmasi Hardcopy terkirim</a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_hardcopy' and konf_manualhc='1'");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /></td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" ><b><a href=index.php?hal=pagekonfirmasi&pilihloket=edit_konf><img src="images/new/mtk.png" width="20"/>Penyampaian Hasil Pencacahan Ke Manifest</a></td>
                                    </tr>
                                    <tr>
                                    <td><font color="red" ><b><a href=index.php?hal=newkonfirmasi&pilihloket=rekap_laporan><img src="images/new/mtk.png" width="20"/>Rekap Laporan</a></td>
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
