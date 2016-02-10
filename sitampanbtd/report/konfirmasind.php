<html>
    <head>
        <title>Cetak Nota Dinas Konfirmasi</title>
    </head>
    <body>
        
  
<?php session_start();?>
<?php
                     include '../lib/koneksi.php';
                      include '../lib/function.php';
                      error_reporting(0);
                    $tahun=$_GET['tahun'];
                    $nond=$_GET['nond'];
                    $id = $_GET['id']; // menangkap id
                    $sql = "SELECT * FROM bcf15, seksi, tpp, p2 WHERE bcf15.idp2=p2.idp2 and bcf15.idtpp=tpp.idtpp  and bcf15.idseksindkonfirmasi=seksi.idseksi and idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $ndkonfirmasidate=$bcf15['ndkonfirmasidate'];
                    $tahunkonf=substr($ndkonfirmasidate,0,4);

                    ?>
        <div><font face="arial">
                        <form method="POST">
                            <table width="100%" border="0">
                                <tr>
                                    <td colspan="5"><?php include '../report/headersurat.html'; ?></td>

                                </tr>
                                <tr><td colspan="5">
                       <table width="100%" border="0" >
                                <tr><td colspan="7" height="20"></td></tr>
                                <tr><td colspan="7" align="center"><strong ><font size="4">NOTA DINAS</font></strong></td></tr>
                                <tr><td colspan="7" align="center">Nomor : ND-<?php echo $bcf15['ndkonfirmasino'] ?><?php  if ($bcf15['bamasukno']=="") {echo '/KPU.01/BD.0404/'; } else {echo '/KPU.01/BD.0503/'; }  ?><?php echo $tahunkonf ?></td></tr>
                                <tr><td colspan="7" align="center" height="30"></td></tr>
                                <tr valign="top"><td colspan="2">Yth.</td><td>:</td><td colspan="3"  >Kepala Bidang Penindakan dan Penyidikan  <br /> u.b Kepala Seksi <?php echo $bcf15['nm_p2'] ?></td></tr>
                                <tr valign="top"><td  colspan="2">Dari</td><td>:</td><td colspan="3" valign="top">Kepala Bidang <?php echo $bcf15['bidang'] ?> <br/> u.b <?php echo $bcf15['plh'] ?><?php echo $bcf15['jabatan'] ?></td></tr>
                                <tr><td colspan="2">Lampiran</td><td>:</td><td colspan="3">Satu Berkas</td></tr>
                                <tr valign="top"><td  colspan="2" valign="top" >Hal</td><td>:</td><td valign="top" colspan="3">Permohonan Pembatalan BCF 1.5 an <br>  <?php if ($bcf15['consignee']=='To Order') {echo $bcf15['notify']; }elseif ($bcf15['consignee']=='to order') {echo $bcf15['notify']; }  elseif ($bcf15[consignee]=='toorder') {echo $bcf15['notify']; } elseif ($bcf15['consignee']=='ToOrder') {echo $bcf15['notify']; } elseif ($bcf15['consignee']=='To The Order') {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];} ?></td></tr>
                                <tr><td  colspan="2">Tanggal</td><td>:</td><td colspan="3"><?php echo tglindo($bcf15['ndkonfirmasidate']) ?></td></tr>
                                <tr><td colspan="7"><strong><hr size="2"></hr></strong></td></tr>
                        </table>
                            </td></tr>
                                <tr><td height="10" colspan="5"></td></tr>                                
                                <tr><td colspan="5"><p style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan surat <?php echo $bcf15['Pemohon'] ?> nomor <?php echo $bcf15['SuratBatalNo'] ?> tanggal <?php echo tglindo($bcf15['SuratBatalDate']) ?> perihal tersebut diatas, bersama ini disampaikan  :</p></td></tr>
                                
                                <tr><td  valign="top" align="center" width="10">1.</td><td colspan="4"><font size="3" >Bahwa perusahaan tersebut mengajukan permohonan pembatalan BCF 1.5 atas importasi barang dengan data-data sebagai berikut :</font></td></tr>
                                <tr><td height="3" colspan="5"></td></tr>
                                <tr><td></td><td colspan="4">
                                        <?php
                                            $sqlkon = "SELECT * FROM bcf15,  tpp WHERE bcf15.idtpp=tpp.idtpp  and ndkonfirmasino='$nond'  and tahun='$tahun'"; // memanggil data dengan id yang ditangkap tadi
                                            $query = mysql_query($sqlkon);
                                            while($bcf15 = mysql_fetch_array($query)) {
                                            $tglbcf15=tglindo($bcf15['bcf15tgl']);
                                            $tglbc11=tglindo($bcf15['bc11tgl']);
                                            $tglbl=tglindo($bcf15['bltgl']);
                                         echo "<table  border='0' cellpadding='2' cellspacing='2' width='100%'>";
                                         echo "<tr><td  >Nama Importir</td><td   >:</td><td> ";
                                         
                                         if ($bcf15['consignee']=='To Order') {echo $bcf15['notify']; }elseif ($bcf15['consignee']=='to order') {echo $bcf15['notify']; }  elseif ($bcf15[consignee]=='toorder') {echo $bcf15['notify']; } elseif ($bcf15['consignee']=='ToOrder') {echo $bcf15['notify']; } elseif ($bcf15['consignee']=='To The Order') {echo $bcf15['notify']; } else  {echo $bcf15['consignee'];}
                                         echo "</td></tr>";
                                         echo "<tr><td  width='40%' >BCF 1.5</td><td >:</td><td> $bcf15[bcf15no]          tanggal : $tglbcf15</td></tr>";
                                         echo "<tr><td  >BCF 1.1</td><td  >:</td><td>  $bcf15[bc11no]       Pos $bcf15[bc11pos]      tanggal : $tglbc11</td></tr>";
                                         echo "<tr></td><td  >Sarana Pengangkut /Voy</td><td >:</td><td>  $bcf15[saranapengangkut]  / $bcf15[voy]</td></tr>";
                                         echo "<tr></td><td  >Nomor BL</td><td >:</td><td> $bcf15[blno]    tanggal : $tglbl</td></tr>";
                                         echo "<tr valign=top></td><td  >Uraian Barang</td><td >:</td><td>  $bcf15[diskripsibrg]  </td></tr>";
                                         echo "<tr><td >Jumlah dan Satuan</td><td >:</td><td>  $bcf15[amountbrg]   $bcf15[satuanbrg]</td></tr>";
                                         $sql="SELECT max(idbcf15), nocontainer, idsize FROM bcfcontainer where idbcf15='$bcf15[idbcf15]'"; $data=mysql_query($sql); 
                                         
                                         echo "<tr><td >Nomor Container</td><td   >:</td><td> ";
                                         
                                         $tampil=mysql_fetch_array($data); echo $tampil['nocontainer'];   $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($rowset); $jumlah = $data2['nocontainer']; if($jumlah>0) { echo "($jumlah x 20')";} else {echo '';}  $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($rowset1); $jumlah = $data3['nocontainer']; $cek1=mysql_numrows($rowset1);if($jumlah>0) { echo "($jumlah x 40')";} else  {echo '';} $rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$bcf15[idbcf15] and idsize='45'") ; $data4 = mysql_fetch_array($rowset2); $jumlah = $data4['nocontainer']; $cek2=mysql_numrows($rowset2);if($jumlah>0) { echo "($jumlah x 45')";} else  {echo '';}  $rowset = mysql_query("select * from bcf15,typecode where bcf15.idtypecode=typecode.idtypecode and idbcf15=$bcf15[idbcf15]"); while($typecode = mysql_fetch_array($rowset)){ if ($typecode['idtypecode']=="3") {echo $typecode['nm_type'];} elseif ($typecode['idtypecode']=="1") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="4") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="5") {echo $typecode['nm_type'];} elseif($typecode['idtypecode']=="6") {echo $typecode['nm_type'];} };
                                         echo "</td></tr>";
                                         echo "<tr><td  >TPP</td><td >:</td><td>  $bcf15[nm_tpp]  </td></tr>";
                                         echo "<tr><td  >TPS Asal</td><td >:</td><td>  $bcf15[idtps]  </td></tr>";
                                        echo "<tr><td  >Jalur</td><td   >:</td><td> ";
                                         
                                         if ($bcf15['jalur']=='1') {echo '-'; }elseif ($bcf15['jalur']=='2') {echo 'Hijau'; }  elseif ($bcf15['jalur']=='3') {echo 'Kuning'; } elseif ($bcf15['jalur']=='4') {echo 'Mita Prioritas'; } elseif ($bcf15['jalur']=='5') {echo 'Mita Non Prioritas'; } elseif ($bcf15['jalur']=='6') {echo 'Merah'; } elseif ($bcf15['jalur']=='7') {echo 'Merah Mita Prioritas'; } elseif ($bcf15['jalur']=='8') {echo 'Merah Mita Non Prioritas'; }
                                         echo "</td></tr>";
                                        echo "<tr><td  height='10'></td></tr>";
                                         echo "</table>";
                                            }
                                               
                                        ?>
                                </td></tr>
                               
                                <tr><td align="center" valign="top" width="10">2.</td><td colspan="4"><p style="text-align: justify">Berdasarkan hal tersebut diatas, bersama ini kami teruskan permohonan perusahaan tersebut <?php if ($bcf15['bamasukno']=='') {echo ''; } else{echo "disertai Nota Hasil Pencacahan ";} ?> untuk dilakukan penelitian lebih mendalam mengenai profil, status importir dan kegiatan importir yang terkait dengan penyelesaian kewajiban kepabenanan dan tanggung jawabnya sejak saat importasi atas party barangnya tersebut. </p></td></tr>
                                <tr><td colspan="5"><p style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian disampaikan dan atas kerjasamanya diucapkan terima kasih.</p></td></tr>
                                <tr><td height="20" colspan="5"></td></tr>
                                <?php
                    
                                $sql = "SELECT * FROM bcf15, seksi, tpp,p2 WHERE bcf15.idp2=p2.idp2 and bcf15.idtpp=tpp.idtpp  and bcf15.idseksindkonfirmasi=seksi.idseksi and idbcf15='$id' "; // memanggil data dengan id yang ditangkap tadi
                                $query = mysql_query($sql);
                                $bcf15 = mysql_fetch_array($query);


                                ?>
                                <tr><td colspan="5">
                                <table width="100%" border="0">
                                <tr><td height="90" colspan="5"></td></tr>
                                <tr><td colspan="4" width="50%"></td><td  ></td><td><?php echo $bcf15['nm_seksi'] ?> </font></td></tr>
                                <tr><td colspan="4"></td><td  ></td><td>NIP <?php echo $bcf15['nip'] ?> </font></td></tr>
                                <tr><td height="8" colspan="5"></td></tr>
                                </table></td></tr>
                                
                            </table>
                        </form>
            </font></div>
          </body>
</html>