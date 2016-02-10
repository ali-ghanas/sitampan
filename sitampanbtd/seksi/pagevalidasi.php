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
        
                    
                    
                    <div align=left>
                            <table border="0"  width="100%" align="center" cellpadding="3" cellspacing="3">
                                
                               
                                <tr>
                                    <td width="50%">
                                        <table border="0" id="groupmodul1" >
                                            
                                          
                                            <tr>
                                                <td ><a href=index.php?hal=pagevalidasi&pilih=newbcf15><img src="images/new/mtk.png" /></a> </td>
                                                <td><font face="arial" size="4">Daftar BCF 1.5 Baru <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where recordstatus='1' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)<br></font></td>
                                            </tr>
                                            
                                            
                                        </table>
                                       
                                    </td>
                                   
                                </tr> 
                                    <tr>
                                        <td height="30"></td>
                                    </tr>
                                    <tr >
                                        <td class="judulbreadcrumb" colspan="4" >
                                            <?php
                                                
                                                if($_GET['pilih']==''){
                                                echo "SILAHKAN PILIH MENU SEKSI DIATAS";
                                                }
                                                elseif($_GET['pilih']=='newbcf15'){
                                                echo "BCF 1.5 yang baru di terbit";
                                                }
                                                

                                                ?>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                    <td align=left><font face=arial size=2><?php include "seksi/pilih.php";?></font></td>
                                    </tr>
                           
                            </table><br></br>
                            
                    
      
    </body>
</html>
