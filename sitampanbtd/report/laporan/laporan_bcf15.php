<html>
    <head>
    <title>SITAMPAN</title>
    <!--       jquery anytimes -->
       
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
                                                <td class="judulform"><a href='?hal=laporan&cetak=lap_per_tpp'><img src="images/new/mtk.png" title="Laporan Per TPP"/></a></td>
                                                <td><font face="arial" size="4" color="red">Per TPP</font></td>
                                            </tr>
                                            <tr>
                                                <td class="judulform"><a href='?hal=laporan&cetak=lap_per_tps'><img src="images/new/mtk.png" title="Laporan Per TPS"/></a></td>
                                                <td><font face="arial" size="4" color="red">PER TPS</font></td>
                                            </tr>
                                            <tr>
                                                <td class="judulform"><a href='?hal=laporan&cetak=lap_per_tahunbcf'><img src="images/new/mtk.png" title="Laporan Per TPS"/></a></td>
                                                <td><font face="arial" size="4" color="red">PER Tahun</font></td>
                                            </tr>
                                            
                                        </table>
                                    </td>
                                    <td width="50%">
                                        <table border="0" >
                                            
                                          
                                            <tr>
                                                <td class="judulform"><a href='?hal=laporan&cetak=lap_per_importir'><img src="images/new/mtk.png" title="Laporan Per TPP"/></a></td>
                                                <td><font face="arial" size="4" color="red">Per Importir</font></td>
                                            </tr>
                                            <tr>
                                                <td class="judulform"><a href='?hal=laporan&cetak=lap_per_barang'><img src="images/new/mtk.png" title="Laporan Per TPS"/></a></td>
                                                <td><font face="arial" size="4" color="red">PER Nama Barang</font></td>
                                            </tr>
                                            <tr>
                                                <td class="judulform"><a href='?hal=laporan&cetak=iku'><img src="images/new/mtk.png" title="Laporan Per TPS"/></a></td>
                                                <td><font face="arial" size="4" color="red">IKU</font></td>
                                            </tr>
                                            
                                        </table>
                                    </td>
                                   
                                    <tr>
                                        <td class="judulbreadcrumb" colspan="4" >
                                            <?php
                                                
                                                if($_GET['cetak']==''){
                                                echo "SILAHKAN PILIH MENU LAPORAN DIATAS";
                                                }
                                                elseif($_GET['cetak']=='lap_per_tpp'){
                                                echo "Laporan BCF 1.5 Per TPP";
                                                }
                                                elseif($_GET['cetak']=='lap_per_tps'){
                                                echo "Laporan BCF 1.5 Per TPS";
                                                }
                                                elseif($_GET['cetak']=='lap_per_importir'){
                                                echo "Laporan BCF 1.5 Per Importir";
                                                }
                                                elseif($_GET['cetak']=='lap_per_tahunbcf'){
                                                echo "Laporan BCF 1.5 Per Tahun";
                                                }
                                                elseif($_GET['cetak']=='lap_per_barang'){
                                                echo "Laporan BCF 1.5 Per Barang";
                                                }
                                                ?>
                                            
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                    <td align="left" width="100%" colspan="2"><font face=tahoma size=2><?php include "report/laporan/cetak.php";?></font></td>
                                    </tr>
                                   
                                    
                            </table><br></br>
                            
                    
                    </div>
    </body>
</html>
