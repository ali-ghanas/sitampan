<html>
    <head>
    <title>SITAMPAN</title>
    <!--       jquery anytimes -->
       <?php 
       include "../lib/koneksi.php" ;
       include "../lib/function.php" ;
       ?>
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        
    
    </head>
    <body>
       
                    <div>
                    <table border="0"  width="100%" align="center" cellpadding=0 cellspacing=0>
                        <tr valign="top">
                            <td>
                                <table class="data isitabel" bgcolor="#eeefff">
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=newkonf><img src="images/new/mtk.png" width="20"/>Inbox (Konfirmasi Masuk)</a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_system'  ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /> </td>
                                    </tr>
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=masukhardcopy><img src="images/new/mtk.png" width="20"/>Inbox (Perlu Hardcopy)</a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_hardcopy' and konf_manualhc='1' and konf_jwabanmanualhc='0'  ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /> </td>
                                    </tr>
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=masukhardcopykembali><img src="images/new/mtk.png" width="20"/>Inbox (Konf kembali Status NHI/Segel/Blokir)</a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konfkembali_hardcopy' and konf_manualhc='1' and konf_jwabanmanualhc='1'  ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><img src="images/new2.gif" /><br /> </td>
                                    </tr>
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=newkonf_penindakan1><img src="images/new/mtk.png" width="20"/>Penindakan I </a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no,ndkonfirmasito FROM kofirmasi_p2,bcf15 where bcf15.idbcf15=kofirmasi_p2.idbcf15 and konf_statusakhir='konf_system' and ndkonfirmasito='1' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /> </td>
                                    </tr>
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=newkonf_penindakan2><img src="images/new/mtk.png" width="20"/>Penindakan II </a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no,ndkonfirmasito FROM kofirmasi_p2,bcf15 where bcf15.idbcf15=kofirmasi_p2.idbcf15 and konf_statusakhir='konf_system' and ndkonfirmasito='2' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /> </td>
                                    </tr>
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=newkonf_penindakan3><img src="images/new/mtk.png" width="20"/>Penindakan III </a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no,ndkonfirmasito FROM kofirmasi_p2,bcf15 where bcf15.idbcf15=kofirmasi_p2.idbcf15 and konf_statusakhir='konf_system' and ndkonfirmasito='3' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /> </td>
                                    </tr>
                                    
                                   
                                    
                                    
                                </table>
                            </td>
                            <td>
                                <table class="data isitabel" bgcolor="#eeefff">
                                    
                                    
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=setuju><img src="images/new/mtk.png" width="20"/>Konfirmasi Terkirim</a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_jawabok' or konf_statusakhir='konf_selesai'");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /> </td>
                                    </tr>
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=hardcopy><img src="images/new/mtk.png" width="20"/>Konfirmasi Permintaan Hardcopy </a><?php session_start(); $sql = mysql_query ("SELECT konf_bcf15no FROM kofirmasi_p2 where konf_statusakhir='konf_hardcopy'  ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font><br /> </td>
                                    </tr>
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=daftarconf><img src="images/new/mtk.png" width="20"/>Grafik Konfirmasi</a></td>
                                    </tr>
                                    <tr >
                                    <td><font color="red" ><b><a href=index.php?hal=daftarconf&pilihp2=rekap_lap><img src="images/new/mtk.png" width="20"/>Rekap Laporan</a></td>
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
                                                
                                                if($_GET['pilihp2']==''){
                                                echo "SILAHKAN PILIH MENU KONFIRMASI BCF 1.5 DIATAS";
                                                }
                                                elseif($_GET['pilihp2']=='jwb_konf'){
                                                echo "Konfirmasi BCF 1.5 dari Seksi Tempat Penimbunan";
                                                }
                                                elseif($_GET['pilihp2']=='newkonf'){
                                                echo "Inbox Konfirmasi Masuk dari Seksi Tempat Penimbunan";
                                                }
                                                elseif($_GET['pilihp2']=='setuju'){
                                                echo "Konfirmasi BCF 1.5 yang terkirim (Konfirmasi yang telah dijawab dan telah di batalkan BCF 1.5)";
                                                }
                                                elseif($_GET['pilihp2']=='hardcopy'){
                                                echo "Konfirmasi yang dimintakan Hardcopy Konfirmasi Pembatalan";
                                                }
                                                elseif($_GET['pilihp2']=='jawabhardcopy'){
                                                echo "Balas Nota Dinas Konfirmasi Pembatalan BCF 1.5";
                                                }
                                                elseif($_GET['pilihp2']=='masukhardcopy'){
                                                echo "Inbox Jawaban Permintaan Hardcopy Konfirmasi dari Seksi Tempat Penimbunan";
                                                }
                                                elseif($_GET['pilihp2']=='newkonf_penindakan1'){
                                                echo "<font size='4'><b>INBOX PENINDAKAN I</b></font>";
                                                }
                                                elseif($_GET['pilihp2']=='newkonf_penindakan2'){
                                                echo "<font size='4'><b>INBOX PENINDAKAN II</b></font>";
                                                }
                                                elseif($_GET['pilihp2']=='newkonf_penindakan3'){
                                                echo "<font size='4'><b>INBOX PENINDAKAN III</b></font>";
                                                }
                                                                                                
                                              
                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table border="0" class="data isitabel">
                                                <tr>
                                                    <td >
                                                    <font face=arial size=2><?php include "penindakan/pilihp2.php";?></font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    
                            </table><br></br><br></br>
        
             </div> 
                     
      
    </body>
</html>
