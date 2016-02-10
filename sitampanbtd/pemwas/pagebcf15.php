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
                                
                                <tr valign="top">
                                    <td width="50%" class="isitabel">
                                        <table border="0"  >
                                       
                                            <tr>
                                                <td> <a href=index.php?hal=pagebcf15pemwas&pilih=update_status><img src="images/new/mtk.png"  title="Update Status" /></td>
                                                <td></a><font face="arial" >Update Status BCF 1.5</font> </td>
                                            </tr>
                                            <tr>
                                                <td> <a href="?hal=pagebcf15pemwas&pilih=doknhp"><img src="images/new/download.jpg"  title="Download" /></td>
                                                <td></a><font face="arial" >Dokumen NHP Lelang, Skep (BMN, Lelang,Musnah,dll) </font> </td>
                                            </tr>
                                            <tr>
                                                <td> <a href="?hal=pagebcf15pemwas&pilih=browsestrip"><img src="images/I.png" width="50"  title="Browse Striping Container" /></td>
                                                <td></a><font face="arial" >Stripping Container </font> </td>
                                            </tr>
                                            
                                            
                                        </table>
                                       
                                    </td>
                                    <td width="50%"  class="isitabel">
                                        <table border="0" >
                                            
<!--                                            <tr>
                                                <td> <a href=index.php?hal=pagebcf15pemwas&pilih=saldobtd><img src="images/new/tambahmtk.png"  title="Input BCF 1.5" /></a></td>
                                                <td><a href=index.php?hal=saldobcf15><font face="arial"  >Saldo BTD</font> </a></td>
                                                    
                                            </tr>-->
                                            <tr>
                                                <td> <a href="?hal=pagebcf15pemwas&pilih=bcfatensi"><img src="images/icon/png-2072.png" width="50" title="Atensi" /></td>
                                                <td></a><font face="arial" >BCF 1.5 Yang diatensi</font> </td>
                                            </tr>
                                            <tr>
                                                <td> <a href="?hal=pagebcf15pemwas&pilih=browsebtdtdklakulelang2"><img src="images/new/mtk.png" width="50" title="Atensi" /></td>
                                                <td></a><font face="arial" >BTD Tidak Laku Lelang 2</font> </td>
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
                                                echo "Monitoring Barang Tidak Dikuasai";
                                                }
                                                elseif($_GET['pilih']=='saldobtd'){
                                                echo "Browse Saldo BCF 1.5";
                                                }
                                                elseif($_GET['pilih']=='newsp'){
                                                echo "Buat Surat Pengantar";
                                                }
                                                elseif($_GET['pilih']=='querybcf15'){
                                                echo "Daftar BCF 1.5";
                                                }
                                                elseif($_GET['pilih']=='bcf15baru'){
                                                echo "Daftar BCF 1.5 Yang Belum Divalidasi Oleh Seksi";
                                                }
                                                elseif($_GET['pilih']=='editsp'){
                                                echo "Edit Surat Pengantar";
                                                }
                                                
                                                elseif($_GET['pilih']=='help'){
                                                echo "Petunjuk Penggunaan";
                                                }

                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    <td align="left" colspan="4"><font face=arial size=2><?php include "pemwas/pilih.php";?></font></td>
                                    </tr>
                                    
                            </table><br></br>
                            
                    </div>
    </body>
</html>
