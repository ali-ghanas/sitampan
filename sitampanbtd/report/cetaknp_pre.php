                    <?php
                   include '../lib/koneksi.php';
                   include '../lib/function.php';
                   error_reporting(0);
        
                    $id = $_GET['id']; // menangkap id
                    $sqlsurat = "select * FROM suratmasukpembatalanbcf15 WHERE noidbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                    $querybcfsurat = mysql_query($sqlsurat);
                    $bcfsurat = mysql_fetch_array($querybcfsurat);


                    ?>
                    <div><font face="arial">
                            <form method="POST">
                            <table width="100%" border="0">
                                <tr>
                                    <td colspan="5"><?php include '../report/headersurat.html'; ?></td>

                                </tr>
                                
                                <tr><td width="9%">Nomor</td><td width="1%">:</td><td width="50%">NP-<?php echo $bcfsurat['noagenda'] ?></td><td align="right"></td></tr>
                                <tr><td width="9%">Tanggal </td><td width="1%">:</td><td width="50%"><?php echo tglindo($bcfsurat['tglagenda']) ?></td><td align="right"></td></tr>
                                <tr><td height="20"></td></tr>
                                
                            </table>
                             <table>
                                
                                <tr><td></td><td colspan="5">Yth. Pimpinan <?php echo $bcfsurat['asalsurat'] ?></td></tr>
                                
                            </table>
                                
                             <table>
                                 <tr>
                                     <td>
                                         Kekurangan Syarat
                                     </td>
                                 </tr>
                                
                                </table>
                                   
                                
                                
                            
                        </form></font></div>