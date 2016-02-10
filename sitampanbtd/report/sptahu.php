<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>report BCF 15</title>
        
        
    </head>
    <body>
<?php
function formatDate($date){
    $date = explode(" " , $date);
    $map = Array(
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    );
    return $date[0]." ".$map[$date[1]]." ".$date[2];
}
?>
                
                          
                <?php
                   include '../lib/koneksi.php';
        
                    $id = $_GET['id']; // menangkap id
                    $tahun = $_GET['tahun'];// menangkap id
                    $sql = "SELECT *,DATE_FORMAT(suratdate,'%d %M %Y') as suratdate,DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl, DATE_FORMAT(bltgl,'%d %M %Y') as bltgl FROM bcf15, seksi, tp3, tpp WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksitp3=seksi.idseksi and bcf15.idtp3=tp3.idtp3 and idbcf15='$id'"; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $notifykecil=strtolower($bcf15['notifyadrress']);
                    $notify=  ucwords($notifykecil);
                    $consigneekecil=strtolower($bcf15['consigneeadrress']);
                    $consignee=  ucwords($consigneekecil);
                    $kotaconsigneekecil=strtolower($bcf15['consigneekota']);
                    $kotaconsignee=ucwords($kotaconsigneekecil);
                        
                    // var_dump($sql);

                    ?>
                   <script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print() {
                    window.open('report/sptahusurat.php?id=<?php echo  $bcf15['idbcf15']; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
                    }
                    </script>
                    
                    <input class="button putih bigrounded " type="button"  value="Print dan Preview" onClick="popup_print()"/>
                    
                        <form method="POST">
                            <table width="100%" border="0">
                                <tr>
                                    <td colspan="5" height="5"><?php include 'report/headersurat_pre.html'; ?></td>

                                </tr>
                                <tr><td></td><td width="9%">Nomor</td><td width="1%">:</td><td width="50%">S-<?php echo $bcf15['suratno'] ?><?php echo $bcf15['kd_tp3'] ?><?php echo $bcf15['tahun'] ?></td><td align="right"><?php echo formatDate($bcf15['suratdate']); ?></td></tr>
                                <tr><td></td><td width="9%">Sifat</td><td width="1%">:</td><td width="50%">Segera</td><td align="right"></td></tr>
                                <tr><td></td><td width="9%" valign="top">Hal</td><td width="1%" valign="top">:</td><td width="50%" valign="top">Pemberitahuan Barang Yang Dinyatakan<br> Sebagai Barang Tidak Dikuasai</td><td align="right"></td></tr>
                                <tr><td></td><td height="4" colspan="5"></td></tr>
                                <tr><td></td><td height="4" colspan="5"></td></tr>
                                <tr><td></td><td colspan="5">Yth. Pimpinan <?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];};?></td></tr>
                                <tr><td></td><td colspan="5"><?php if ($bcf15['consignee']=="To Order") {echo $notify; } elseif ($bcf15['consignee']=="to order") {echo $notify; } elseif ($bcf15['consignee']=="toorder") {echo strtolower($bcf15['notifyadrress']); } elseif ($bcf15['consignee']=="ToOrder") {echo $notify; } elseif ($bcf15['consignee']=="to the order") {echo $notify; } elseif ($bcf15['consignee']=="To The Order") {echo $notify; } elseif ($bcf15['consignee']=="ToTheOrder") {echo $notify; } elseif ($bcf15['consignee']=="TO THE ORDER") {echo $notify; } else  {echo $consignee;};?></td><td width="10%"></td><td width="10%"></td></tr>
                                <tr><td></td><td colspan="5"><?php if ($bcf15['consignee']=="To Order") {echo $kotanotify; } elseif ($bcf15['consignee']=="to order") {echo $kotanotify; } elseif ($bcf15['consignee']=="toorder") {echo $kotanotify; } elseif ($bcf15['consignee']=="ToOrder") {echo $kotanotify; } elseif ($bcf15['consignee']=="To The Order") {echo $kotanotify; } elseif ($bcf15['consignee']=="to the order") {echo $kotanotify; } elseif ($bcf15['consignee']=="ToTheOrder") {echo $kotanotify; } elseif ($bcf15['consignee']=="totheorder") {echo $kotanotify; } elseif ($bcf15['consignee']=="TO THE ORDER") {echo $kotanotify; } else  {echo $kotaconsignee;};?></td></tr>
                                <tr><td></td><td height="5" colspan="4"></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font >Diberitahukan dengan hormat bahwa berdasarkan Undang-Undang Nomor 10 Tahun 1995 tentang Kepabeanan sebagaimana diubah dengan Undang-Undang Nomor 17 Tahun 2006 dan Peraturan Menteri Keuangan nomor : 62/PMK.04/2011 tentang Penyelesaian Terhadap Barang Yang Dinyatakan Tidak Dikuasai, Barang Yang Dikuasai Negara dan Barang Yang Menjadi Milik Negara maka terhadap barang impor Saudara dengan data :</font></td></tr>
                                <tr><td height="5" colspan="6"></td></tr>
                                <tr><td colspan="3">BC 1.1</td><td colspan="2"  valign="top" >: <?php echo $bcf15['bc11no'] ?> / Pos <?php echo $bcf15['bc11pos'] ?> Tanggal <?php echo formatDate($bcf15['bc11tgl']); ?></td></tr>
                                <tr><td colspan="3">Nama Kapal/Voy</td><td colspan="2"  valign="top" >: <?php echo $bcf15['saranapengangkut'] ?> / <?php echo $bcf15['voy'] ?></td></tr>
                                <tr><td colspan="3">BCF 1.5 / Tgl</td><td colspan="2"  valign="top" >: <?php echo $bcf15['bcf15no'] ?> / <?php echo formatDate($bcf15['bcf15tgl']); ?></td></tr>
                                <tr><td colspan="3">Lokasi Penimbunan</td><td colspan="2"  valign="top" >: <?php echo $bcf15['idtps'] ?> </td></tr>
                                <tr><td colspan="3">Kontainer</td><td colspan="2"  valign="top" >: <?php $sql="SELECT max(idbcf15), nocontainer, idsize FROM bcfcontainer where idbcf15='$bcf15[idbcf15]'"; $data=mysql_query($sql); $tampil=mysql_fetch_array($data); echo $tampil['nocontainer']; ?>  <?php  $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($rowset); $jumlah = $data2['nocontainer']; if($jumlah>0) { echo "($jumlah x 20')";} else {echo '';}  $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($rowset1); $jumlah = $data3['nocontainer']; $cek1=mysql_numrows($rowset1);if($jumlah>0) { echo "($jumlah x 40')";} else  {echo '';} ?> <?php $rowset = mysql_query("select * from bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and idbcf15=$bcf15[idbcf15]"); while($typecode = mysql_fetch_array($rowset)){ if ($typecode['idtypecode']=="3") {echo $typecode['nm_type'];} elseif ($typecode['idtypecode']=="1") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="4") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="5") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="6") {echo $typecode['nm_type'];} };?> </td></tr>
                                <tr><td colspan="3">Nomor B/L</td><td colspan="2"  valign="top" >: <?php echo $bcf15['blno'] ?> / <?php echo formatDate($bcf15['bltgl']); ?> </td></tr>
                                <tr><td colspan="3">Jumlah / Jenis Barang</td><td colspan="2"  valign="top" >: <?php echo $bcf15['amountbrg'] ?>  <?php echo $bcf15['satuanbrg'] ?>  <?php echo $bcf15['diskripsibrg'] ?> </td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" width="10" >1.</td><td colspan="4" valign="top"><p style="text-align: justify">Berdasarkan pasal 65 Undang - Undang Nomor 10 Tahun 1995 tentang Kepabeanan sebagaimana diubah dengan Undang - Undang Nomor 17 Tahun 2006 dinyatakan sebagai Barang Yang Tidak Dikuasai, karena ditimbun di Tempat Penimbunan Sementara (TPS) yang melebihi jangka waktu 30 (tiga puluh) hari sejak tanggal penimbunan di TPS.</p></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >2.</td><td colspan="4" valign="top"><p style="text-align: justify">Dalam hal pemilik barang / kuasanya tidak menyelesaikan kewajiban pabeannya setelah jangka waktu 60 (enam puluh) hari sejak di simpan di Tempat Penimbunan Pabean atau tempat lain yang berfungsi sebagai Tempat Penimbunan Pabean berdasarkan pasal 4 ayat 2 Peraturan Menteri Keuangan tersebut diatas, Direktorat Jenderal Bea dan Cukai dapat melaksanakan pelelangan atas barang-barang dimaksud.</p></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font >Demikian pemberitahuan ini disampaikan untuk diketahui.</font></td></tr>
                                <tr><td></td><td height="10" colspan="5"></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;an. KABID PFPC II </font></td></tr>
                                <tr><td align="left" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b. </font></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KASI PABEAN CUKAI III </font></td></tr>
                                <tr><td></td><td height="40" colspan="5"></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $bcf15['nm_seksi'] ?> </font></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP <?php echo $bcf15['nip'] ?> </font></td></tr>
                                <tr><td></td><td height="2" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" colspan="5" ><p style="text-align: justify">Tembusan :</p></td></tr>
                                <tr><td align="left" valign="top" >1.&nbsp;&nbsp;&nbsp;</td><td colspan="4" valign="top"><p style="text-align: justify">Pengusaha Pelayaran <?php $rowset = mysql_query("select * from bcf15,pelayaran where bcf15.idpelayaran=pelayaran.idpelayaran and idbcf15=$bcf15[idbcf15]"); while($pelayaran = mysql_fetch_array($rowset)){  echo $pelayaran['nm_pelayaran']; };?></p></td></tr>
                                
                            </table>
                        </form>
                    
                </div>
        </body>
        </html>