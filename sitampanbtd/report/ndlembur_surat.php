                    <?php
                   include '../lib/koneksi.php';
                   include '../lib/function.php';
                   error_reporting(0);
        
                    $id = $_GET['id']; // menangkap id
                    $sql = "SELECT * FROM ndlembur,seksi WHERE ndlembur.idseksi=seksi.idseksi and idndlembur='$id'"; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $tahunkini=date(Y);


                    ?><div><font face="arial">
                            <form method="POST">
                            <table width="100%" border="0">
                                <tr>
                                    <td colspan="5"><?php include '../report/headersurat.html'; ?></td>

                                </tr>
                                <tr><td colspan="5" height="20"></td></tr>
                                <tr><td colspan="5" align="center"><strong ><font size="4">NOTA DINAS</font></strong></td></tr>
                                <tr><td colspan="5" align="center">Nomor : ND-<?php echo $bcf15['nond'] ?><?php if($bcf15[kdseksi]=='tpp3'){echo "/KPU.01/BD.0503/";} elseif ($bcf15[kdseksi]=='tpp2'){echo "/KPU.01/BD.0404/";}?><?php echo $tahunkini; ?></td></tr>
                                <tr><td colspan="5" align="center" height="30"></td></tr>
                                <tr><td width="9%">Kepada</td><td width="1%">:</td><td width="50%">Pegawai Tersebut dibawah ini</td><td align="right"></td></tr>
                                <tr><td width="9%">Dari</td><td width="1%">:</td><td width="50%">Kepala Seksi Tempat Penimbunan</td><td align="right"></td></tr>
                                <tr><td width="9%">Lampiran</td><td width="1%">:</td><td width="50%">Satu Lembar</td><td align="right"></td></tr>
                                <tr><td width="9%">Hal</td><td width="1%">:</td><td width="50%">Penunjukan petugas lembur</td><td align="right"></td></tr>
                                <tr><td width="9%">Tanggal</td><td width="1%">:</td><td width="50%"><?php echo tglindo($bcf15['tglnd']) ?></td><td align="right"></td></tr>
                                <tr><td colspan="5"><strong><hr size="2"></hr></strong></td></tr>
                            </table>
                                <table>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                
                                <tr><td><p style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menindaklanjuti Nota Dinas Kepala Bagian Umum Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam nomor : ND-470/KPU.01/BG.01/2008 tanggal 01 Desember 2008, kepada pegawai yang tersebut dalam lampiran nota dinas ini untuk lembur pada tanggal <?php echo tglindo($bcf15[waktu_lembur])?>.</p></td></tr>
                                <tr><td><p style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian disampaikan untuk dilaksanakan sebaik-baiknya dengan penuh rasa tanggung jawab.</p></td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                
                                <tr><td></td><td height="40" colspan="5"></td></tr>
                                <tr><td colspan="5">
                                <table border="0">
                                <tr><td align="left" colspan="3" width="70%" valign="top" ></td><td  colspan="4" valign="top" align="right" >
                                <table border="0"><tr><td height="70"></td></tr><tr><td></td><td ><?php echo $bcf15['nm_seksi'] ?></td></tr><tr><td></td><td>NIP. <?php echo $bcf15['nip'] ?></td></tr></table></td></tr>
                                </table>
                                    </td></tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td colspan="2">
                                                    Tembusan:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1.</td>
                                                <td>Kepala Sub Bagian SDM</td>   

                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Kepala Bidang Pelayanan Pabean dan Cukai III</td>   

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                
                            </table>
                        </form></font></div>