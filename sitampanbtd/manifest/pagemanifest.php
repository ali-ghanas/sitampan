<html>
    <head>
    <title>SITAMPAN</title>
    <!--       jquery anytimes -->
       <?php include "lib/koneksi.php" ?>
        
        
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
                            <table border="0" width="100%"  align="center" cellpadding="3" cellspacing="3">
                                
                                <tr valign="top" bgcolor="#aed4f9">
                                    <td width="50%" class="isitabel" >Modul Inputan
                                        <table border="0" >
                                            
                                            <tr>
                                                <td> <a href=index.php?hal=pagemanifest&pilih=addbcf15><img src="images/new/tambahmtk.png" width="20" title="Input BCF 1.5" /> Input BCF 1.5</a></td>
                                               
                                            </tr>
                                            <tr>
                                                <td> <a href=index.php?hal=pagemanifest&pilih=pilihtpp><img src="images/new/mtk.png" width="20" title="Buat Surat Pengantar" />Buat Surat Pengantar <?php session_start(); $sql = mysql_query ("SELECT idbcf15,bcf15.idtpp,tpp.idtpp,nm_tpp,recordstatus FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and recordstatus='1' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</a></td>
                                               
                                            </tr>
                                            <tr>
                                                <td> <a href=index.php?hal=pagemanifest&pilih=editsp><img src="images/new/mtk.png" width="20" title="Edit Surat Pengantar" />Edit Surat Pengantar</a></td>
                                                
                                            </tr>
                                            <tr>
                                                <td> <a href=index.php?hal=pagemanifest&pilih=daf_bukaposbc11ceisa><img src="images/new/mtk.png" width="20" title="Buka Pos BC 1.1 Ceisa" />Buka Pos BC 1.1</a></td>
                                                
                                            </tr>
                                            
                                        </table>
                                       
                                    </td>
                                    <td width="50%" class="isitabel">Modul View
                                        <table border="0" >
                                            
                                          
                                            <tr>
                                                <td ><a href='?hal=pagemanifest&pilih=querybcf15'><img src="images/new/mtk.png" width="20" title="Daftar BCF 1.5"/>Daftar BCF 1.5</a></td>
                                                
                                            </tr>
                                            <tr>
                                                <td ><a href='?hal=pagemanifest&pilih=cet_bcf15all'><img src="images/new/mtk.png" width="20" title="Cetak BCF 1.5"/>Cetak BCF 1.5 All</a></td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                <td><a href='?hal=pagemanifest&pilih=help'><img src="images/new/help_1.jpg" width="20" title="Bantuan"/>Help</a></td>
                                               
                                            </tr>
                                            
                                        </table>
                                    
                                    </td>
                                </tr>
                                
                                
                                    
                                    
                                    <tr>
                                        <td class="judulbreadcrumb" colspan="4" >
                                            <?php
                                                
                                                if($_GET['pilih']==''){
                                                echo "SILAHKAN PILIH MENU STAF MANIFEST DIATAS";
                                                }
                                                elseif($_GET['pilih']=='addbcf15'){
                                                echo "Perekaman BCF 1.5";
                                                }
                                                elseif($_GET['pilih']=='newsp'){
                                                echo "Perekaman Surat Pengantar";
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
                                    <td align="left" colspan="4" class="isitabel"><?php include "manifest/pilih.php";?></td>
                                    </tr>
                                    
                            </table><br></br>
                            
                    </div>
    </body>
</html>
