<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        
        <title>report BCF 15</title>
       
        
    </head>
    <body>
        
       
                    
                    <?php
                     include '../lib/koneksi.php';
                     include '../lib/function.php';
                    $id = $_GET['id']; // menangkap id
                    $sql = "SELECT * FROM bcf15, seksi, tp3, tpp,jalur WHERE bcf15.jalur=jalur.idjalur and bcf15.idtpp=tpp.idtpp  and bcf15.idtp3=tp3.idtp3 and bcf15.idseksisetujubatal=seksi.idseksi and idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $tahunsurat=$bcf15['SetujuBatalDate'];
                    $y =substr($tahunsurat,0,4);

                    ?>
        <div ><font face="arial" size="2">
                        <form method="POST">
                            <table width="100%" border="0"  cellspacing="2">
                                <tr>
                                    <td colspan="8"><?php include '../report/headersurat.html'; ?></td>

                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <table border="0">
                                           <tr><td width="1%" >Nomor</td><td width="1%">:</td><td width="50%">S-<?php echo $bcf15['SetujuBatalNo'] ?><?php if($bcf15['bamasukno']=='') {echo "/KPU.01/BD.0404/";} else{echo "/KPU.01/BD.0503/";} ?><?php echo $y ?></td><td align="right"><?php echo tglindo($bcf15['SetujuBatalDate']) ?></td></tr>
                                            <tr><td width="1%" >Sifat</td><td width="1%">:</td><td width="50%">Segera</td><td align="right"></td></tr>
                                            <tr><td width="1%" >Lampiran</td><td width="1%">:</td><td width="50%">Satu Berkas</td><td align="right"></td></tr>
                                            <tr valign="top"><td width="1%" valign="top" >Hal</td><td width="1%" valign="top">:</td><td width="50%" valign="top">Persetujuan Pembatalan Status Barang <br /> Yang Dinyatakan Tidak Dikuasai</td><td align="right"></td></tr> 
                                        </table>
                                    </td>
                                </tr>
                                
                                <tr><td height="30" ></td></tr>
                                <tr><td colspan="5">Yth. Pimpinan <?php echo $bcf15['Pemohon'] ?></td></tr>
                                <tr><td colspan="5"><?php echo $bcf15['AlamatPemohon'] ?></td></tr>
                                
                                <tr><td></td><td height="30" colspan="6"></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font >Sehubungan dengan surat permohonan <?php echo $bcf15['Pemohon'] ?> nomor : <?php echo $bcf15['SuratBatalNo'] ?> tanggal <?php echo tglindo($bcf15['SuratBatalDate']) ?> perihal Permohonan Pembatalan BCF 1.5 , dapat Kami sampaikan hal-hal sebagai berikut :</font></td></tr>
                                <tr><td></td><td height="5" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >1.</td><td colspan="4"  valign="top" ><?php echo $bcf15['Pemohon'] ?> bermaksud menyelesaikan formalitas kepabeanan atas barang impor yang telah dinyatakan sebagai Barang yang Tidak Dikuasai, dengan data-data sebagai berikut :</td></tr>
                                <tr><td align="left" valign="top" ></td><td colspan="4"  valign="top" ><table border="0" width="100%"><tr><td>Nomor BCF 1.5</td><td>:</td><td><?php echo $bcf15['bcf15no'] ?>  </td><td>Tgl : <?php echo tglindo($bcf15['bcf15tgl']) ?> </td></tr>
                                                                                                                                      <tr><td>Nomor BC 1.1</td><td>:</td><td><?php echo $bcf15['bc11no'] ?>  </td><td>Tgl : <?php echo tglindo($bcf15['bc11tgl']) ?>  Pos : <?php echo $bcf15['bc11pos'] ?> </td></tr>        
                                                                                                                                      <tr><td>Nomor BL</td><td>:</td><td><?php echo $bcf15['blno'] ?>  </td><td>Tgl : <?php echo tglindo($bcf15['bltgl']) ?> </td></tr>
                                                                                                                                      <tr><td>Pemilik Barang</td><td>:</td><td colspan="2" ><?php if ($bcf15['consignee']=="to order") {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];;};?>  </td></tr>
                                                                                                                                      <tr><td>Jumlah / Jenis Barang</td><td>:</td><td colspan="2" ><?php echo $bcf15['amountbrg']  ?>  <?php echo $bcf15['satuanbrg']  ?>  <?php echo $bcf15['diskripsibrg']  ?> </td></tr>
                                                                                                                                      <tr><td>Peti Kemas</td><td>:</td><td colspan="2" ><?php $sql="SELECT max(idbcf15), nocontainer, idsize FROM bcfcontainer where idbcf15='$bcf15[idbcf15]'"; $data=mysql_query($sql); $tampil=mysql_fetch_array($data); echo $tampil['nocontainer']; ?>  <?php  $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($rowset); $jumlah = $data2['nocontainer']; if($jumlah>0) { echo "($jumlah x 20')";} else {echo '';}  $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($rowset1); $jumlah = $data3['nocontainer']; $cek1=mysql_numrows($rowset1);if($jumlah>0) { echo "($jumlah x 40')";} else  {echo '';} $rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='45'") ; $data4 = mysql_fetch_array($rowset2); $jumlah = $data4['nocontainer']; $cek2=mysql_numrows($rowset2);if($jumlah>0) { echo "($jumlah x 45')";} else  {echo '';} ?> <?php $rowset = mysql_query("select * from bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and idbcf15=$bcf15[idbcf15]"); while($typecode = mysql_fetch_array($rowset)){ if ($typecode['idtypecode']=="3") {echo $typecode['nm_type'];} elseif ($typecode['idtypecode']=="1") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="4") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="5") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="6") {echo $typecode['nm_type'];} };?> </td></tr>        
                                                                                                                                      <tr><td>Jalur</td><td>:</td><td colspan="2" ><?php echo $bcf15['jalur']  ?>  </td></tr>
                                </table></td></tr> 
                                <tr><td></td><td height="10" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >2.</td><td colspan="4"  valign="top" >Terhadap barang tersebut telah diselesaikan formalitas kepabeanannya dengan  
                                                                                                                                      <?php if ($bcf15['DokumenCode']=="12") {
                                                                                                                                                echo "dokumen  pemberitahuan PIB nomor $bcf15[DokumenNo]"; echo " tanggal "; echo tglindo($bcf15['DokumenDate']); 
                                                                                                                                                if ($bcf15['Dokumen2Code']=="1") {
                                                                                                                                                    echo ' dan telah diterbitkan SPPB nomor '; echo "$bcf15[Dokumen2No] " ;echo " tanggal "; echo tglindo($bcf15['Dokumen2Date']);  
                                                                                                                                                    
                                                                                                                                                    } 
                                                                                                                                                elseif ($bcf15['Dokumen2Code']=="27")  {
                                                                                                                                                        echo 'dan telah diterbitkan Surat Persetujuan Re-Ekspor nomor '; echo $bcf15['Dokumen2No']; echo " tanggal "; echo tglindo($bcf15['Dokumen2Date']);
                                                                                                                                                        
                                                                                                                                                        } 
                                                                                                                                                
                                                                                                                                                } 
                                                                                                                                            elseif ($bcf15['DokumenCode']=="2")  {
                                                                                                                                                echo "dokumen pemberitahuan    Re - ekspor  barang BC 1.2 nomor  $bcf15[DokumenNo]"; echo " tanggal "; echo tglindo($bcf15['DokumenDate']);
                                                                                                                                                if ($bcf15['Dokumen2Code']=="1") {
                                                                                                                                                    echo ' dan telah diterbitkan SPPB nomor '; echo "$bcf15[Dokumen2No] " ;echo " tanggal "; echo tglindo($bcf15['Dokumen2Date']);  
                                                                                                                                                    
                                                                                                                                                    } 
                                                                                                                                                elseif ($bcf15['Dokumen2Code']=="27")  {
                                                                                                                                                        echo ' dan telah diterbitkan Surat Persetujuan Re-Ekspor nomor '; echo $bcf15['Dokumen2No']; echo " tanggal "; echo tglindo($bcf15['Dokumen2Date']);
                                                                                                                                                        
                                                                                                                                                        }  
                                                                                                                                                }  
                                                                                                                                            elseif($bcf15['DokumenCode']=="4")  {
                                                                                                                                                echo "dokumen pemberitahuan BC 2.3 nomor $bcf15[DokumenNo] "; echo "tanggal "; echo tglindo($bcf15['DokumenDate']);
                                                                                                                                                if ($bcf15['Dokumen2Code']=="1") {
                                                                                                                                                    echo ' dan telah diterbitkan SPPB nomor '; echo "$bcf15[Dokumen2No] " ;echo " tanggal "; echo tglindo($bcf15['Dokumen2Date']);  
                                                                                                                                                    
                                                                                                                                                    } 
                                                                                                                                                elseif ($bcf15['Dokumen2Code']=="27")  {
                                                                                                                                                        echo ' dan telah diterbitkan Surat Persetujuan Re-Ekspor nomor '; echo $bcf15['Dokumen2No']; echo " tanggal "; echo tglindo($bcf15['Dokumen2Date']);
                                                                                                                                                        
                                                                                                                                                        } 
                                                                                                                                                }
                                                                                                                                            elseif($bcf15['DokumenCode']=="5")  {
                                                                                                                                                echo " dokumen pemberitahuan ekspor barang BC 3.0 nomor $bcf15[DokumenNo] "; echo "tanggal "; echo tglindo($bcf15['DokumenDate']);
                                                                                                                                                if ($bcf15['Dokumen2Code']=="1") {
                                                                                                                                                    echo ' dan telah diterbitkan SPPB nomor '; echo "$bcf15[Dokumen2No] " ;echo " tanggal "; echo tglindo($bcf15['Dokumen2Date']);  
                                                                                                                                                    
                                                                                                                                                    } 
                                                                                                                                                elseif ($bcf15['Dokumen2Code']=="27")  {
                                                                                                                                                        echo ' dan telah diterbitkan surat persetujuan ekspor nomor '; echo $bcf15['Dokumen2No']; echo " tanggal "; echo tglindo($bcf15['Dokumen2Date']);
                                                                                                                                                        
                                                                                                                                                        } 
                                                                                                                                                }
                                                                                                                                            elseif($bcf15['DokumenCode']=="11")  {
                                                                                                                                                echo " nota dinas Kepala Seksi Adm. Manifest  nomor $bcf15[DokumenNo] "; echo "tanggal "; echo tglindo($bcf15['DokumenDate']); echo " perihal permohonan pengeluaran returnable package";
                                                                                                                                                
                                                                                                                                                }
                                                                                                                                      ;?> 
                                                                                                                                               .</td></tr>
                                <tr><td></td><td height="10" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >3.</td><td colspan="4"  valign="top" >Berdasarkan hal-hal tersebut diatas, maka permohonan pembatalan BCF 1.5 an. <?php echo $bcf15['Pemohon'] ?> <b><i><u>dapat disetujui</u></i></b> .</td></tr>
                                <tr><td></td><td height="10" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" ></td><td colspan="4"  valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian disampaikan untuk dapat dipergunakan sebagaimana mestinya.</td></tr>
                                <tr><td></td><td height="15" colspan="5"></td></tr>
                                <tr><td align="left" colspan="3" valign="top" ></td><td  colspan="2" valign="top" align="right" >
                                        <table border="0"><tr><td>an.</td><td>Kepala Kantor</td></tr><tr><td></td><td><?php if($bcf15['bamasukno']==''){ echo "Kepala Bidang Pelayanan Pabean dan Cukai II";} else {echo "Kepala Bidang Pelayanan Pabean dan Cukai III";}  ?></td></tr><tr><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td></tr><tr><td><?php echo $bcf15['plh'] ?></td><td>Kepala Seksi Tempat Penimbunan</td></tr><tr><td height="70"></td></tr><tr><td></td><td ><?php echo $bcf15['nm_seksi'] ?></td></tr><tr><td></td><td>NIP. <?php echo $bcf15['nip'] ?></td></tr></table></td></tr>
                                <tr><td colspan="5">Tembusan :</td> </tr>
                                <tr><td align="left" valign="top" colspan="5" >1.Kepala Seksi Administrasi Manifest</td></tr>
                                <tr><td align="left" valign="top" colspan="5" >2.Korlak Pemeriksa TPP <?php echo $bcf15['nm_tpp'] ?></td></tr>
                                <tr><td align="left" valign="top" colspan="5" >3.Pengusaha TPP <?php echo $bcf15['nm_tpp'] ?></td></tr>
                            </table>
                        </form>
            </font></div> 
    </body>
</html>
