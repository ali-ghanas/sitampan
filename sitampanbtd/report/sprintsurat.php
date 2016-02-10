<?php
include '../lib/koneksi.php';
include '../lib/function.php';

?>
<html>
<head>
<title>Print Preview </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<script type="text/javascript">
function cetak()
{
window.print();
window.close();
}
</script>

</head>

<body onLoad="window.print()">

<?php
                   
        
                    $id = $_GET['sprint']; // menangkap id
                    $tahun = $_GET['tahun'];// menangkap id
                    $sql = "SELECT * FROM bcf15, seksi,tp2, tpp WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and suratperintahno=$id and tahun='$tahun' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);

                    ?>
   
    <div><font face="arial" >
                        <form method="POST">
                            <table width="100%" border="0" >
                                <tr>
                                    <td colspan="5" height="5"><?php include '../report/headersurat.html'; ?></td>

                                </tr>
                            </table>
                            <table>
                                <tr><td></td><td width="9%">Nomor</td><td width="1%">:</td><td width="50%">S-<?php echo $bcf15['suratperintahno'] ?><?php echo $bcf15['kd_tp2'] ?><?php echo $bcf15['tahun'] ?></td><td align="right"><?php echo tglindo($bcf15['suratperintahdate']) ?></td></tr>
                                <tr><td></td><td width="9%">Sifat</td><td width="1%">:</td><td width="50%">Segera</td><td align="right"></td></tr>
                                <tr><td></td><td width="9%">Lampiran</td><td width="1%">:</td><td width="50%">Satu Lembar</td><td align="right"></td></tr>
                                <tr><td></td><td width="9%" valign="top">Hal</td><td width="1%" valign="top">:</td><td width="50%" valign="top">Perintah Pemindahan Barang Yang Dinyatakan Tidak Dikuasai</td><td align="right"></td></tr>
                            </table>
                            <table>
                                <tr><td></td><td height="20"  colspan="5"></td></tr>
                                <tr><td></td><td colspan="5">Yth. pejabat TPP <?php echo $bcf15['nm_tpp'] ?></td></tr><!-- 
                                <tr><td></td><td colspan="5"></td></tr>
                                <tr><td></td><td colspan="5"></td></tr> -->
                            </table>
                            <table>
                                <tr><td></td><td height="50" colspan="4"></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font >Sehubungan dengan penanganan Barang yang Dinyatakan Tidak Dikuasai di Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam, dapat Kami sampaikan hal-hal sebagai berikut :</font></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >1.</td><td colspan="4"  valign="top" ><p style="text-align: justify">Bahwa barang-barang sebagaimana daftar terlampir telah dinyatakan sebagai Barang Tidak Dikuasai karena masa penimbunannya di Tempat Penimbunan Sementara (TPS) didalam area pelabuhan telah melebihi batas waktu 30 (tigapuluh) hari.</p></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >2.</td><td colspan="4" valign="top"><p style="text-align: justify">Sesuai Pasal 65 ayat (2) UU Nomor 10 Tahun 1995 tentang Kepabeanan sebagaimana telah diubah dengan UU Nomor 17 Tahun 2006, menyatakan bahwa Barang Yang Dinyatakan Tidak Dikuasai disimpan di Tempat Penimbunan Pabean dan dipungut sewa gudang yang ditetapkan oleh Menteri.</p></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >3.</td><td colspan="4" valign="top"><p style="text-align: justify">Berdasarkan hal-hal tersebut diatas, diperintahkan kepada Saudara untuk segera memindahkan barang yang dimaksud butir 1 (satu) ke Tempat Penimbunan Pabean <?php echo $bcf15['nm_tpp'] ?>.</p></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font >Demikian disampaikan untuk dilaksanakan dengan penuh rasa tanggung jawab.</font></td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                <tr><td colspan="5" align="right"><table>
                                <tr><td colspan="4" align="right">an. </td><td>Kepala Kantor </font></td></tr>
                                <tr><td colspan="4" align="right"></td><td>KABID PFPC II </font></td></tr>
                                <tr><td colspan="4" align="right"></td><td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b. </td></tr>
                                <!-- <tr><td colspan="4" align="right"><?php //echo $bcf15['plh'] ?></td> <td><?php //echo $bcf15['jabatan'] ?> </font></td></tr> -->
                                <tr><td colspan="4" align="right"></td><td>KASI PABEAN DAN CUKAI III</font></td></tr>                                
                                <tr><td></td><td height="45" colspan="5"></td></tr>
                                <tr><td colspan="4" align="left"></td><td><?php echo $bcf15['nm_seksi'] ?> </td></tr>
                                <tr><td colspan="4" align="left"></td><td>NIP <?php echo $bcf15['nip'] ?> </font></td></tr>
                                        </table></td></tr>
                                <tr><td></td><td height="8" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" colspan="5" ><font size="3" ><p style="text-align: justify">Tembusan :</p></font></td></tr>
                                <tr><td align="left" valign="top" >1.</td><td colspan="4"><font size="3" >Korlak TPS <?php echo $bcf15['idtps'] ?>.</font></td></tr>
                                <tr><td align="left" valign="top" >2.</td><td colspan="4"><font size="3" >Kepala Seksi Penindakan</font></td></tr>
                                </table>
                        </form>
        </font></div>
    
    </body>
</html>