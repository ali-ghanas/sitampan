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
                          <div align="left"><font size="3" face="tahoma">Laporan Capaian  Kinerja Versi Database</font><hr color=#CCCCFF></div></td>
                        </tr>
                      </table>
                    <div align=right>
                            <table border="0" width="100%" align="center" cellpadding=0 cellspacing=0>
                                    <tr valign="top">
                                        <td>
                                            
                                            » <a href=index.php?hal=lap_data&pilih=lap_tap>Penetapan BCF 1.5 </a><br/>                                        
                                            » <a href=index.php?hal=lap_data&pilih=lap_batal>Surat Persetujuan Batal BCF 1.5 </a><br/> 
                                            » <a href=index.php?hal=lap_data&pilih=lap_tpp>Jumlah Container / LCL  </a><br/> 
                                            » <a href=index.php?hal=lap_data&pilih=lap_masuk>Ditarik Ke TPP </a><br/> 
                                            » <a href=index.php?hal=lap_data&pilih=lap_bataltarik>Batal Tarik </a><br/> 
                                            » <a href=index.php?hal=lap_data&pilih=lap_sprint>Surat Perintah </a><br/> 
                                            » <a href=index.php?hal=lap_data&pilih=lap_sptahu>Surat Pemberitahuan </a><br/> 
                                           
                                        <td >
                                            <table>
                                                <tr >
                                                <td align="right"><font face=arial size=2><?php include "report/lap_kinerja/pilih.php";?></font></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    
                            </table>
                    </div>    
                    
      
    </body>
</html>
