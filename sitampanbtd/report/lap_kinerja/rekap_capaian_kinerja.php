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
                          <div align="left"><font size="3" face="tahoma">Laporan Capaian  Kinerja </font><hr color=#CCCCFF></div></td>
                        </tr>
                      </table>
                    <div align=right>
                            <table border="0" width="100%" align="center" cellpadding=0 cellspacing=0>
                                    <tr valign="top">
                                        <td>
                                            
                                            » <a href=index.php?hal=rekap_capaian_kinerja&pilih=tapbcf15>Penetapan BCF 1.5 </a><br/>                                        
                                            » <a href=index.php?hal=rekap_capaian_kinerja&pilih=sprint>Surat Perintah Penarikan </a><br/> 
                                            » <a href=index.php?hal=rekap_capaian_kinerja&pilih=sptahu>Surat Pemberitahuan </a><br/> 
                                            » <a href=index.php?hal=rekap_capaian_kinerja&pilih=progres>Progres Penarikan Ke TPP </a><br/> 
                                            » <a href=index.php?hal=rekap_capaian_kinerja&pilih=pembatalan>Kegiatan Pembatalan BCF 1.5 </a><br/> 
                                            » <a href=index.php?hal=rekap_capaian_kinerja&pilih=btd_lelang>BTD Lelang </a><br/> 
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
