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
                          <div align="left"><font size="3" face="arial">Proses Segera</font><hr color=#CCCCFF></div></td>
                        </tr>
                      </table>
                    <div align=right>
                            <table border="0" width="100%" align="center" cellpadding=0 cellspacing=0>
                                    <tr>
                                    <td width="10"><a href=index.php?hal=pagetpp3&pilih=newbcf15><img src="images/new/tambahmtk.png" width="20"/></a></td><td>Surat Pemberitahuan <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where pemberitahuan='2' and recordstatus='2' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)<br></font></td>
                                    </tr>
                                    <tr ><td ><a href="?hal=pagetpp3&pilih=sptahusim" title="Input Secara Simultan"><img src="images/new/mtk.png" width="20"/></a></td><td>Input Surat Pemberitahuan Secara Simultan<?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where pemberitahuan='2' and recordstatus='2' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)</font></td></tr>
                                    <tr ><td ><a href="?hal=pagetpp3&pilih=daf_bcf15" title="Edit BCF 1.5"><img src="images/new/mtk.png" width="20"/></a></td><td>Edit BCF 1.5</td></tr>
                                    <tr>
                                        <td height="30"></td>
                                    </tr>
                                    <tr>
                                        <td class="judulbreadcrumb" colspan="4" >
                                            <?php
                                                
                                                if($_GET['pilih']==''){
                                                echo "SILAHKAN PILIH MENU SURAT PEMBERITAHUAN BCF 1.5 DIATAS";
                                                }
                                                elseif($_GET['pilih']=='newbcf15'){
                                                echo "Input Surat Pemberitahuan BCF 1.5 Ke Consignee";
                                                }
                                                elseif($_GET['pilih']=='sptahusim'){
                                                echo "Input Surat Pemberitahuan BCF 1.5 Ke Consignee Secara Simultan";
                                                }
                                                elseif($_GET['pilih']=='sptahusim_formedit'){
                                                echo "Input Surat Pemberitahuan";
                                                }
                                                elseif($_GET['pilih']=='daf_bcf15'){
                                                echo "Edit BCF 1.5";
                                                }
                                                
                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    <td colspan="4"><font face=arial size=2><?php include "_stpp3/pilih.php";?></font></td>
                                    </tr>
                                    
                            </table><br></br>
                            
                    
      
    </body>
</html>
