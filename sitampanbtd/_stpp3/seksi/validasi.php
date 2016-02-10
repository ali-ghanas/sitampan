<html>
    <head>
    <title>SITAMPAN</title>
    <!--       jquery anytimes -->
       <?php include "lib/koneksi.php" ?>
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
        <div align="left">
                            <table border="0" width="100%" align="center" cellpadding="3" cellspacing="3">
                                
                               
                                <tr>
                                    <td width="50%">
                                        <table border="0" >
                                            
                                          
                                            <tr>
                                                <td class="judulform"><a href=index.php?hal=validasitpp3&pilih=Masukdariloket><img src="images/new/mtk.png" title="Validasi Konfirmasi"/></a></td>
                                                <td><font face="arial" size="4">Perlu Divalidasi<?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15, seksi where bcf15.idseksindkonfirmasi=seksi.idseksi and seksi.nip like $_SESSION[nip_baru] and   recordstatuskonf='1'");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;  ?>)</font></td>
                                            </tr>
                                            
                                            
                                        </table>
                                       
                                    </td>
                                    <td width="50%">
                                        <table border="0" >
                                            
                                          
                                            <tr>
                                                <td class="judulform"><a href=index.php?hal=validasitpp3&pilih=inbox><img src="images/new/mtk.png" title="tambah seksi"/></a></td>
                                                <td><font face="arial" size="4">Daftar Validasi <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15, seksi where bcf15.idseksindkonfirmasi=seksi.idseksi and seksi.nip=$_SESSION[nip_baru] and   (recordstatuskonf='1' or   recordstatuskonf='2' or   recordstatuskonf='3')");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font></td>
                                            </tr>
                                            <tr>
                                                <td class="judulform"><a href=index.php?hal=validasitpp3&pilih=outbox><img src="images/new/mtk.png" title="tambah TPP"/></a></td>
                                                <td><font face="arial" size="4">Daftar Validasi (belum dijawab P2)<?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15, seksi where bcf15.idseksindkonfirmasi=seksi.idseksi and seksi.nip=$_SESSION[nip_baru] and   recordstatuskonf='2'");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font></td>
                                            </tr>
                                            
                                        </table>
                                    
                                    </td>
                                </tr>
                                
                                
                                
                                    
                                    <tr>
                                        <td height="30"></td>
                                    </tr>
                                    <tr>
                                        <td class="judulbreadcrumb" colspan="4" >
                                            <?php
                                                
                                                if($_GET['pilih']==''){
                                                echo "SILAHKAN PILIH MENU Validasi DIATAS";
                                                }
                                                elseif($_GET['pilih']=='Masukdariloket'){
                                                echo "Konfirmasi BCF 1.5 Yang Perlu Di Validasi";
                                                }
                                                elseif($_GET['pilih']=='inbox'){
                                                echo "Daftar Konfirmasi Yang telah Di Validasi";
                                                }
                                                elseif($_GET['pilih']=='outbox'){
                                                echo "Daftar Konfirmasi Yang Belum Dijawab Oleh P2";
                                                }
                                                elseif($_GET['pilih']=='validasiview'){
                                                echo "Konfirmasi Yang Telah Divalidasi Oleh Seksi Penimbunan";
                                                }

                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    <td align="left" colspan="4"><font face=arial size=2><?php include "_stpp3/seksi/pilih.php";?></font></td>
                                    </tr>
                                    
                            </table><br></br>
                            
                    </div>
        
      
    </body>
</html>
