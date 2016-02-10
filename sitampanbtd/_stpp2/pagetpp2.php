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
        
                    
                    <table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="30"> 
                          <div align="left"><font  face="arial">Proses Segera</font><hr color=#CCCCFF></div></td>
                        </tr>
                      </table>
                    
                            <table  width="100%" align="center" cellpadding=0 cellspacing=0>
                                <tr valign="top" >
                                    <td width="50%" class="isitabel" bgcolor="#ecf2f8">
                                        <table   >
                                            <tr>
                                            <td><a  href=index.php?hal=pagetpp2&pilih=sprint_sim><img src="images/new/mtk.png" width="20"/>Buat Surat Perintah Segera <?php session_start(); $sql = mysql_query ("SELECT idbcf15,bcf15no,tahun,validasibcf15baru FROM bcf15 where validasibcf15baru='2' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</a> </td>
                                            </tr>
                                            <tr>
                                            <td><a  href=index.php?hal=pagetpp2&pilih=daf_bcf15><img src="images/new/mtk.png" width="20"/>Edit BCF 1.5</a> </td>
                                            </tr>
                                            <tr>
                                            <td><a  href=index.php?hal=pagetpp2&pilih=daf_sprint><img src="images/new/mtk.png" width="20"/>Edit Surat Perintah</a></td>
                                            </tr>
                                            <tr>
                                            <td><a  href=index.php?hal=pagetpp2&pilih=kon_tpsol><img src="images/new/mtk.png" width="20"/>TPS Online</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="50%" class="isitabel" bgcolor="#ecf2f8">
                                        <table border="0"   >
                                            <tr>
                                            <td><a  href=index.php?hal=pagetpp2&pilih=tegassprint><img src="images/new/mtk.png" width="20"/>Surat Penegasan Sprint </a> </td>
                                            </tr>
                                            <tr>
                                            <td><a  href=index.php?hal=pagetpp2&pilih=tegassprintbrowse><img src="images/new/mtk.png" width="20"/>Daftar Surat Penegasan</a> </td>
                                            </tr>
                                            <tr>
                                            <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                            <td>&nbsp;</td>
                                            </tr>
                                            
                                            
                                        </table>
                                    </td>
                                </tr>
                                    
                                    
                                    
                                    <tr>
                                        <td class="judulbreadcrumb" colspan="4" >
                                            <?php
                                                
                                                if($_GET['pilih']==''){
                                                echo "SILAHKAN PILIH MENU SURAT PERINTAH BCF 1.5 DIATAS";
                                                }
                                                elseif($_GET['pilih']=='newbcf15'){
                                                echo "Input Surat Perintah Penarikan BCF 1.5 Ke TPP";
                                                }
                                                elseif($_GET['pilih']=='daf_sprint'){
                                                echo "Daftar Surat Perintah Penarikan BCF 1.5";
                                                }
                                                elseif($_GET['pilih']=='sprint_sim'){
                                                echo "Pilih Parameter Inputan";
                                                }
                                                elseif($_GET['pilih']=='daf_bcf15'){
                                                echo "Edit BCF 1.5";
                                                }
                                               
                                                
                                                
                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    <td colspan="2"><font face=arial size=2><?php include "_stpp2/pilih.php";?></font></td>
                                    </tr>
                                    
                            </table><br></br>
                            
                  
      
    </body>
</html>
