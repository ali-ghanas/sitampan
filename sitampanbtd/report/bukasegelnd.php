                    <?php
                   include '../lib/koneksi.php';
                   include '../lib/function.php';
                   error_reporting(0);
        
                    $no = $_GET['no']; // menangkap id
                    $tahun = $_GET['tahun']; // menangkap id
                    $sql = "SELECT *  FROM bcf15, seksi, tp2, tpp, p2 WHERE bcf15.idp2=p2.idp2 and bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2bukgel=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and ndsegelno=$no and bcf15.tahun='$tahun' "; // memanggil data dengan id yang ditangkap tadi
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
                                <tr><td colspan="5" align="center">Nomor : ND-<?php echo $bcf15['ndsegelno'] ?><?php echo $bcf15['kd_tp2'] ?><?php echo $tahunkini; ?></td></tr>
                                <tr><td colspan="5" align="center" height="30"></td></tr>
                                <tr><td width="9%">Yth.</td><td width="1%">:</td><td width="50%">Kepala Seksi <?php echo $bcf15['nm_p2'] ?></td><td align="right"></td></tr>
                                <tr><td width="9%">Dari</td><td width="1%">:</td><td width="50%"><?php echo $bcf15['plh'] ?> <?php echo $bcf15['jabatan'] ?></td><td align="right"></td></tr>
                                <tr><td width="9%">Lampiran</td><td width="1%">:</td><td width="50%">Satu Berkas</td><td align="right"></td></tr>
                                <tr><td width="9%">Hal</td><td width="1%">:</td><td width="50%">Permohonan Pembukaan Segel untuk <br>Pemindahan Barang dari TPS ke TPP</td><td align="right"></td></tr>
                                <tr><td width="9%">Tanggal</td><td width="1%">:</td><td width="50%"><?php echo tglindo($bcf15['ndsegeldate']) ?></td><td align="right"></td></tr>
                                <tr><td colspan="5"><strong><hr size="2"></hr></strong></td></tr>
                            </table>
                                <table>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                
                                <tr><td colspan="5"><font >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan pengelolaan barang yang dinyatakan tidak dikuasai, barang yang dikuasai negara, dan barang milik negara dilingkungan Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam, dapat disampaikan hal-hal sebagai berikut :</p></font></td></tr>
                                
                                <tr><td align="left" valign="top" >1.</td><td colspan="4" valign="top"><p  style="text-align: justify">Bahwa Kepala Seksi Administrasi Manifest pada Bidang Pelayanan Pabean dan Cukai III telah menerbitkan Daftar Barang-barang yang Dinyatakan sebagai Barang Tidak Dikuasai dan harus segera dipindahkan ke Tempat Penimbunan Pabean (TPP).</p></td></tr>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >2.</td><td colspan="4" valign="top"><p style="text-align: justify">Bahwa atas barang sebagaimana tersebut dalam daftar terlampir setelah dilakukan penelitian lebih lanjut ternyata terkena segel merah.</p></td></tr>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >3.</td><td colspan="4" valign="top"><p style="text-align: justify">Berdasarkan hal-hal tersebut diatas, mohon untuk dapat dilakukan pembukaan segel untuk proses pemindahan barang tersebut dari TPS <?php echo $bcf15['idtps'] ?> ke TPP <?php echo $bcf15['nm_tpp'] ?> .</p></td></tr>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >4.</td><td colspan="4" valign="top" ><p style="text-align: justify">Diharapkan konfirmasi permohonan pembukaan segel ini dapat kami terima dalam jangka waktu yang tidak terlalu lama.</p></td></tr>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Demikian disampaikan dan atas kerjasama yang baik kami sampaikan terima kasih.</font></td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                
                                <tr><td></td><td height="90" colspan="5"></td></tr>
                                <tr><td colspan="5">
                                <table border="0" width="100%">
                                <tr><td align="left" colspan="3" width="20%" valign="top" ></td><td  colspan="4" valign="top" width="40%" align="center">
                                <table border="0" ><tr><td height="70"></td></tr><tr><td></td><td ><?php echo $bcf15['nm_seksi'] ?></td></tr><tr><td></td><td>NIP. <?php echo $bcf15['nip'] ?></td></tr></table></td></tr>
                                </table>
                                    </td></tr>
                                
                                
                            </table>
                        </form></font></div>