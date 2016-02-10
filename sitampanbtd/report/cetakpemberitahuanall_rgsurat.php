
<?php // aksi untuk edit
    session_start();
     include '../lib/koneksi.php';   
     include '../lib/function.php';  

    if(isset($_POST['cetakpemberitahuanall'])) // jika tombol editsubmit ditekan

            $txttgldari = $_POST['txttgldari']; 
            $txttglsampai = $_POST['txttglsampai']; 
            $suratawal = $_POST['suratawal']; 
            $suratakhir = $_POST['suratakhir']; 
            $sql = "SELECT * FROM bcf15, seksi, tp3, tpp WHERE  bcf15.idtpp=tpp.idtpp and bcf15.idseksitp3=seksi.idseksi and bcf15.idtp3=tp3.idtp3 and suratdate  between '$txttgldari' and '$txttglsampai' and suratno  between '$suratawal' and '$suratakhir' order by suratno "; // memanggil data dengan id yang ditangkap tadi
            $query = mysql_query($sql);
            
            
           
?>
<font face="arial">

<table border="0" width="100%">

<?php
while($bcf15 = mysql_fetch_array($query)){

            $notifykecil=strtolower($bcf15['notifyadrress']);
            $notify=  ucwords($notifykecil);
            $consigneekecil=strtolower($bcf15['consigneeadrress']);
            $consignee=  ucwords($consigneekecil);
            
            $kotanotifykecil=strtolower($bcf15['notifykota']);
            $kotanotify=ucwords($kotanotifykecil);
            
            $kotaconsigneekecil=strtolower($bcf15['consigneekota']);
            $kotaconsignee=ucwords($kotaconsigneekecil);
            
?>

<tr>
                                    <td colspan="5" ><?php include '../report/headersurat.html'; ?></td>

                                </tr>
                                <tr><td colspan="5"><table border="0" width="100%">
                                            <tr><td width="12%">Nomor</td><td width="1%">:</td><td width="50%">S-<?php echo $bcf15['suratno'] ?><?php echo $bcf15['kd_tp3'] ?><?php echo $bcf15['tahun'] ?></td><td align="right" colspan="2"><?php echo tglindo($bcf15['suratdate']) ?></td></tr>
                                <tr><td width="12%">Sifat</td><td width="1%">:</td><td width="50%">Segera</td><td align="right"></td></tr>
                                <tr><td width="12%" valign="top">Hal</td><td width="1%" valign="top">:</td><td width="50%" valign="top">Pemberitahuan Barang Yang Dinyatakan<br> Sebagai Barang Tidak Dikuasai</td><td align="right"></td></tr>
                                <tr><td height="4" colspan="5"></td></tr>
                                
                                <tr><td height="4" colspan="5"></td></tr>
                                <tr><td colspan="5">Yth. Pimpinan <?php if ($bcf15['consignee']=="To Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="toorder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToOrder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="To The Order") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="ToTheOrder") {echo $bcf15['notify']; } elseif ($bcf15['consignee']=="to the order") {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];};?></td></tr>
                                <tr><td colspan="3"><?php if ($bcf15['consignee']=="To Order") {echo $notify; } elseif ($bcf15['consignee']=="to order") {echo $notify; } elseif ($bcf15['consignee']=="toorder") {echo strtolower($bcf15['notifyadrress']); } elseif ($bcf15['consignee']=="ToOrder") {echo $notify; } elseif ($bcf15['consignee']=="to the order") {echo $notify; } elseif ($bcf15['consignee']=="To The Order") {echo $notify; } elseif ($bcf15['consignee']=="ToTheOrder") {echo $notify; } elseif ($bcf15['consignee']=="TO THE ORDER") {echo $notify; } else  {echo $consignee;};?></td><td width="10%"></td><td width="10%"></td></tr>
                                <tr><td colspan="3"><?php if ($bcf15['consignee']=="To Order") {echo $kotanotify; } elseif ($bcf15['consignee']=="to order") {echo $kotanotify; } elseif ($bcf15['consignee']=="toorder") {echo $kotanotify; } elseif ($bcf15['consignee']=="ToOrder") {echo $kotanotify; } elseif ($bcf15['consignee']=="To The Order") {echo $kotanotify; } elseif ($bcf15['consignee']=="to the order") {echo $kotanotify; } elseif ($bcf15['consignee']=="ToTheOrder") {echo $kotanotify; } elseif ($bcf15['consignee']=="totheorder") {echo $kotanotify; } elseif ($bcf15['consignee']=="TO THE ORDER") {echo $kotanotify; } else  {echo $kotaconsignee;};?></td></tr>
                                </table></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                <tr><td colspan="5"><p style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diberitahukan dengan hormat bahwa berdasarkan Undang-Undang Nomor 10 Tahun 1995 tentang Kepabeanan sebagaimana diubah dengan Undang-Undang Nomor 17 Tahun 2006 dan Peraturan Menteri Keuangan nomor : 62/PMK.04/2011 tentang Penyelesaian Terhadap Barang Yang Dinyatakan Tidak Dikuasai, Barang Yang Dikuasai Negara dan Barang Yang Menjadi Milik Negara maka terhadap barang impor Saudara dengan data :</p></td></tr>
                                <tr><td height="5" colspan="6"></td></tr>
                                <tr><td colspan="5"><table>
                                <tr><td >BC 1.1</td><td colspan="2"  >: <?php echo $bcf15['bc11no'] ?> / Pos <?php echo $bcf15['bc11pos'] ?> Tanggal <?php echo tglindo($bcf15['bc11tgl']) ?></td></tr>
                                <tr><td >Nama Kapal/Voy</td><td colspan="2"  valign="middle" >: <?php echo $bcf15['saranapengangkut'] ?> / <?php echo $bcf15['voy'] ?></td></tr>
                                <tr><td >BCF 1.5 / Tgl</td><td colspan="2"  valign="middle" >: <?php echo $bcf15['bcf15no'] ?> / <?php echo tglindo($bcf15['bcf15tgl']) ?></td></tr>
                                <tr><td >Lokasi Penimbunan</td><td colspan="2"  valign="middle" >: <?php echo $bcf15['nm_tpp'] ?> </td></tr>
                                <tr><td >Kontainer</td><td colspan="2"  valign="middle" >: <?php $sql="SELECT max(idbcf15), nocontainer, idsize FROM bcfcontainer where idbcf15='$bcf15[idbcf15]'"; $data=mysql_query($sql); $tampil=mysql_fetch_array($data); echo $tampil['nocontainer']; ?>  <?php  $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($rowset); $jumlah = $data2['nocontainer']; if($jumlah>0) { echo "($jumlah x 20')";} else {echo '';}  $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($rowset1); $jumlah = $data3['nocontainer']; $cek1=mysql_numrows($rowset1);if($jumlah>0) { echo "($jumlah x 40')";} else  {echo '';} ?> <?php $rowset = mysql_query("select * from bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and idbcf15=$bcf15[idbcf15]"); while($typecode = mysql_fetch_array($rowset)){ if ($typecode['idtypecode']=="3") {echo $typecode['nm_type'];} elseif ($typecode['idtypecode']=="1") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="4") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="5") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="6") {echo $typecode['nm_type'];} };?> </td></tr>
                                <tr><td >Nomor B/L</td><td colspan="2"  valign="middle" >: <?php echo $bcf15['blno'] ?> / <?php echo tglindo($bcf15['bltgl']) ?> </td></tr>
                                <tr><td >Jumlah / Jenis Barang</td><td colspan="2"  valign="middle" >: <?php echo $bcf15['amountbrg'] ?>  <?php echo strtolower($bcf15['satuanbrg']) ?>  <?php echo strtolower($bcf15['diskripsibrg']) ?> </td></tr>
                                 </table></td></tr>
                                <tr><td></td><td height="2" colspan="5"></td></tr>
                                <tr><td  valign="top" >1.</td><td colspan="4" valign="top"><p style="text-align: justify">Berdasarkan pasal 65 Undang - Undang Nomor 10 Tahun 1995 tentang Kepabeanan sebagaimana diubah dengan Undang - Undang Nomor 17 Tahun 2006 dinyatakan sebagai Barang Yang Tidak Dikuasai, karena ditimbun di Tempat Penimbunan Sementara (TPS) yang melebihi jangka waktu 30 (tiga puluh) hari sejak tanggal penimbunan di TPS.</p></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                <tr><td valign="top" >2.</td><td colspan="4" valign="top"><p style="text-align: justify">Dalam hal pemilik barang / kuasanya tidak menyelesaikan kewajiban pabeannya setelah jangka waktu 60 (enam puluh) hari sejak di simpan di Tempat Penimbunan Pabean atau tempat lain yang berfungsi sebagai Tempat Penimbunan Pabean berdasarkan pasal 4 ayat 2 Peraturan Menteri Keuangan tersebut diatas, Direktorat Jenderal Bea dan Cukai dapat melaksanakan pelelangan atas barang-barang dimaksud.</p></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                               
                                
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font >Demikian pemberitahuan ini disampaikan untuk diketahui.</font></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                <tr ><td align="left" colspan="3" valign="top" ></td><td  colspan="2" valign="top" align="right" >
                                        <table border="0"><tr><td  >a.n</td><td>Kepala Kantor</td></tr><tr><td></td><td>Kepala Bidang Pelayanan Pabean dan Cukai III</td></tr><tr><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td></tr><tr><td><?php echo $bcf15['plh'] ?></td><td>Kepala Seksi Tempat Penimbunan</td></tr><tr><td height="70"></td></tr><tr><td></td><td ><?php echo $bcf15['nm_seksi'] ?></td></tr><tr><td></td><td>NIP. <?php echo $bcf15['nip'] ?></td></tr></table></td></tr>
                                <tr><td></td><td height="2" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" colspan="5" ><p style="text-align: justify">Tembusan :</p></td></tr>
                               <tr><td align="left" valign="top" >1.&nbsp;&nbsp;&nbsp;</td><td colspan="4" valign="top"><p style="text-align: justify">Yth. Kepala Bidang PPC III;</p></td></tr>
                                <tr><td align="left" valign="top" >2.&nbsp;&nbsp;&nbsp;</td><td colspan="4" valign="top"><p style="text-align: justify">Pengusaha TPP <?php echo $bcf15['nm_tpp'] ?>;</p></td></tr>
                                <tr><td align="left" valign="top" >3.&nbsp;&nbsp;&nbsp;</td><td colspan="4" valign="top"><p style="text-align: justify">Pengusaha Pelayaran <?php error_reporting(0); $sql = "SELECT * FROM pelayaran ";$qry = @mysql_query($sql) or die ("Gagal query");while ($bcf151 =mysql_fetch_array($qry)) {if ($bcf151[idpelayaran]==$bcf15[idpelayaran]) {echo "$bcf151[nm_pelayaran]";} } ?></p></td></tr>
</tr>
<?php
};
?>
</table>
</font>
<?php 

