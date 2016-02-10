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
        
                    
                    
                    <div align=right>
                            <table border="0" width="100%" align="center" cellpadding=0 cellspacing=0>
                                <tr valign="top" bgcolor="#bcd6f0">
                                    <td width="50%" class="isitabel">
                                        <table border="0" cellpadding="2" cellspacing="2">
                                            <tr>
                                                <td><a href=index.php?hal=pagemonitoring&pilih=segel><img src="images/new/mtk.png" width="25"/></a></td><td>Nota Dinas Permohonan Buka Segel </td>
                                            </tr>
                                            <tr>
                                                <td><a href=index.php?hal=pagemonitoring&pilih=bapenarikan><img src="images/new/mtk.png" width="25"/></a></td><td>Input BA Penarikan  </td>
                                            </tr>
                                            <tr>
                                                <td><a href=index.php?hal=pagemonitoring&pilih=bataltarik><img src="images/new/mtk.png" width="25"/></a></td><td>Input Permohonan Batal Tarik <br></td>
                                            </tr>
                                            <tr>
                                                <td><a href=index.php?hal=pagemonitoring&pilih=pecahpos><img src="images/new/mtk.png" width="25" /></a></td><td>Pecah Pos BCF 1.5</td>
                                            </tr>
                                            
                                        </table>
                                    </td>
                                    <td width="50%">
                                        <table >
                                            
                                            
                                            
                                            <tr >
                                                <td><a href=index.php?hal=lap_progres_penarikan><img src="images/new/mtk.png" width="25"/></a>Progres Penarikan <br></td>
                                            </tr>
                                            
                                             <tr >
                                                <td><a href=index.php?hal=pagemonitoring&pilih=updatelongstay><img src="images/new/mtk.png" width="25"/></a>Update Longstay <br></td>
                                            </tr>
                                            
                                        </table>
                                    </td>
                                </tr>
                                <tr><td colspan="2"><?php session_start();$tgl_now=date('Y-m-d');$tahun_now=substr($tgl_now,0,4);  $sql = mysql_query ("SELECT idbcf15,bcf15no,tahun,batal,masuk,setujubatal FROM bcf15 where batal='2' and masuk='2' and setujubatal='2' and tahun='$tahun_now'  ");$jumlah1 = mysql_num_rows ($sql); $sql2 = mysql_query ("SELECT bcf15no,tahun FROM bcf15 where tahun='$tahun_now' ");$jumlah2 = mysql_num_rows ($sql2); $persentasemasuk=$jumlah1/$jumlah2*100?> <font size="" face="arial" color="red"><b>Saat ini Jumlah BCF 1.5 tahun <?php echo $tahun_now ?> yang masih di TPS adalah :<?php echo "$jumlah1 Dok BCF 1.5 dari Total BCF 1.5 yang terbit $jumlah2 Dok BCF 1.5";?></b></font></td></tr>
                                                                 
                                    
                                    
                                    <tr>
                                        <td height="30" colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td class="judulbreadcrumb" colspan="4" >
                                            <?php
                                                
                                                if($_GET['pilih']==''){
                                                echo "Monitoring BCF 1.5 Yang Masih di TPS";
                                                }
                                                elseif($_GET['pilih']=='bapenarikan'){
                                                echo "Input Berita Acara Penarikan BCF 1.5 dari TPS ke TPP";
                                                }
                                                elseif($_GET['pilih']=='bataltarik'){
                                                echo "Input Permohonan Batal Tarik";
                                                }
                                                elseif($_GET['pilih']=='bataltarik_sim'){
                                                echo "Input Permohonan Batal Tarik Secara Simultan";
                                                }
                                                elseif($_GET['pilih']=='daf_konf_p2'){
                                                echo "Daftar ND Konfirmasi Ke P2";
                                                }
                                                elseif($_GET['pilih']=='segel'){
                                                echo "Cetak Nota Dinas Permohonan Pembukaa Segel Ke Bidang P2";
                                                }
                                                elseif($_GET['pilih']=='sprint_sim'){
                                                echo "Pilih Parameter Inputan";
                                                }
                                               
                                                
                                                
                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    <td colspan="4"><font face=arial size=2><?php include "_stpp2/pilih.php";?></font></td>
                                    </tr>
                                    
                            </table><br></br>
                            
                    </div>
      
    </body>
</html>
