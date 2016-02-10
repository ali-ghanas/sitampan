<html>
    <head>
    <title>SITAMPAN</title>
    <!--       jquery anytimes -->
       <?php include "lib/koneksi.php" ?>
        
        
        
        
    
    </head>
    <body>
        
                    
                    <table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="30""> 
                          <div align="left"><font size="3" face="tahoma">Inbox Konfirmasi</font><hr color=#CCCCFF></div></td>
                        </tr>
                      </table>
                    <div align=right>
                            <table border="0" width="100%" align="center" cellpadding=0 cellspacing=0>
                                    <tr>
                                    <td>
                                        
                                    » <a href=index.php?hal=pageloket&pilihloket=newp2>Konfirmasi Baru (balasan P2) </a> <?php session_start(); $sql = mysql_query ("SELECT * FROM bcf15 where recordstatuskonf='3' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >(<?php echo $jumlah1;?>)<br>
                                    
                                   
                                    
                                                                        
                                    </font></td>
                                    </tr>
                                    <tr>
                                    <td align="right"><font face=arial size=2><?php include "loket/pilihloket.php";?></font></td>
                                    </tr>
                                    
                            </table><br></br>
                    </div>    
                    
      
    </body>
</html>
