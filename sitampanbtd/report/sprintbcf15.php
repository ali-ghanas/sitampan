<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        
        <title>report BCF 15</title>
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function() {
              $("#sprint").tabs({event:"mouseover"}).find(".ui-tabs-nav").sortable();
           });
        </script>
        
    </head>
    <body>
        
        
        <div id="sprint">
            
                <ul>
                <li><a href="#tabs-1">Surat Perintah</a></li>
                <li><a href="#tabs-2">Lampiran</a></li>
                </ul>
                
                <div id="tabs-1">
                    
                    <?php
                   
                   include 'lib/function.php';
                    $id = $_GET['id']; // menangkap id
                    
                    $sql = "SELECT * FROM bcf15, seksi, tp2, tpp WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and idbcf15=$id  "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);


                    ?>
                    
                                <script type="text/javascript">
                                var s5_taf_parent = window.location;
                                function popup_print() {
                                window.open('report/sprintsurat.php?sprint=<?php echo  $bcf15['suratperintahno']; ?> & tahun=<?php echo  $bcf15['tahun']; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
                                }
                                </script>
                    
                                <input class="button putih bigrounded " type="button"  value="Print Surat" onClick="popup_print()"/><img src="images/printer.png"></img>
                                
                        
                    
                      
                        <hr><form method="POST">
                            <table width="100%" border="0">
                                <tr>
                                    <td colspan="5"><?php include 'report/headersurat_pre.html'; ?></td>

                                </tr>
                                <tr><td></td><td width="9%">Nomor</td><td width="1%">:</td><td width="50%">PRINT-<?php echo $bcf15['suratperintahno'] ?><?php echo $bcf15['kd_tp2'] ?><?php echo $bcf15['tahun'] ?></td><td align="right"><?php echo tglindo($bcf15['suratperintahdate']) ?></td></tr>
                                <tr><td></td><td width="9%">Sifat</td><td width="1%">:</td><td width="50%">Segera</td><td align="right"></td></tr>
                                <tr><td></td><td width="9%">Lampiran</td><td width="1%">:</td><td width="50%">Satu Lembar</td><td align="right"></td></tr>
                                <tr><td></td><td width="9%">Hal</td><td width="1%">:</td><td width="50%">Perintah Pemindahan Barang Yang Dinyatakan Tidak Dikuasai</td><td align="right"></td></tr>
                                <tr><td></td><td height="17" colspan="5"></td></tr>
                                <tr><td></td><td colspan="5">Yth. Pejabat TPP <?php echo $bcf15['nm_tpp'] ?></td></tr><!-- 
                                <tr><td></td><td colspan="5"><?php //echo $bcf15['alamat_tpp'] ?></td></tr>
                                <tr><td></td><td colspan="5"><?php //echo $bcf15['kota_tpp'] ?></td></tr> -->
                                <tr><td></td><td height="50" colspan="4"></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Sehubungan dengan penanganan Barang yang Dinyatakan Tidak Dikuasai di Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam, dapat Kami sampaikan hal-hal sebagai berikut :</font></td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >1.&nbsp;&nbsp;&nbsp;</td><td colspan="4"><font size="3" >Bahwa barang-barang sebagaimana daftar terlampir telah dinyatakan sebagai Barang Tidak Dikuasai karena masa penimbunannya di Tempat Penimbunan Sementara (TPS) didalam area pelabuhan telah melebihi batas waktu 30 (tigapuluh) hari.</font></td></tr>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >2.&nbsp;&nbsp;&nbsp;</td><td colspan="4"><font size="3" >Sesuai Pasal 65 ayat (2) UU Nomor 10 Tahun 1995 tentang Kepabeanan sebagaimana telah diubah dengan UU Nomor 17 Tahun 2006, menyatakan bahwa Barang Yang Dinyatakan Tidak Dikuasai disimpan di Tempat Penimbunan Pabean dan dipungut sewa gudang yang ditetapkan oleh Menteri.</font></td></tr>
                                <tr><td></td><td height="12" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" >3.&nbsp;&nbsp;&nbsp;</td><td colspan="4"><font size="3" >Berdasarkan hal-hal tersebut diatas, diperintahkan kepada Saudara untuk segera memindahkan barang yang dimaksud butir 1 (satu) ke Tempat Penimbunan Pabean <?php echo $bcf15['nm_tpp'] ?>.</font></td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">Demikian disampaikan untuk dilaksanakan dengan penuh rasa tanggung jawab.</font></td></tr>
                                <tr><td></td><td height="20" colspan="5"></td></tr>
                                
                                <tr><td colspan="4" align="right">an. </td><td>Kepala Kantor </font></td></tr>
                                <tr><td colspan="4" align="right"></td><td>KABID PFPC II </font></td></tr>
                                <tr><td colspan="4" align="right"></td><td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b. </td></tr>
                                <!-- <tr><td colspan="4" align="right"><?php //echo $bcf15['plh'] ?></td> <td><?php //echo $bcf15['jabatan'] ?> </font></td></tr> -->
                                <tr><td colspan="4" align="right"></td><td>KASI PABEAN DAN CUKAI III</font></td></tr>                                
                                <tr><td></td><td height="45" colspan="5"></td></tr>
                                <tr><td colspan="4" align="left"></td><td><?php echo $bcf15['nm_seksi'] ?> </td></tr>
                                <tr><td colspan="4" align="left"></td><td>NIP <?php echo $bcf15['nip'] ?> </font></td></tr>
                                
                                <tr><td></td><td height="8" colspan="5"></td></tr>
                                <tr><td align="left" valign="top" colspan="5" ><font size="3" ><p style="text-align: justify">Tembusan :</p></font></td></tr>
                                <tr><td align="left" valign="top" >1.</td><td colspan="4"><font size="3" >Korlap TPS <?php echo $bcf15['idtps'] ?>.</font></td></tr>
                                <tr><td align="left" valign="top" >2.</td><td colspan="4"><font size="3" >Kepala Seksi Penindakan</font></td></tr>
                               
                            </table>
                        </form>
                </div>
            
                <div id="tabs-2">
                    
                    
                  <?php
                                    
                   include '../lib/koneksi.php';
                   
                   $id = $bcf15['suratperintahno']; // menangkap id
                   $tahun=$bcf15['tahun'];
                    $sql = "SELECT * FROM bcf15, seksi, tp2, tpp WHERE bcf15.idtpp=tpp.idtpp and bcf15.idseksitp2=seksi.idseksi and bcf15.idtp2=tp2.idtp2 and suratperintahno=$id and tahun=$tahun    "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>
                    <script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print1() {
                    window.open('report/sprintlampiran.php?sprint=<?php echo  $bcf15['suratperintahno']; ?> & tahun=<?php echo  $bcf15['tahun']; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
                    }
                    </script>
                     <input class="button putih bigrounded " type="button"  value="Print Lampiran" onClick="popup_print1()"/> 	
                    <img src="images/printer.png"></img>
                    <hr><table border="0" width="100%">
                        <tr><td colspan="4" width="60%" ></td><td colspan="2">Lampiran Surat</td></tr>
                        <tr><td colspan="4"></td><td colspan="2">KASI PABEAN DAN CUKAI III</td></tr>
                        <tr><td colspan="4"></td><td align="left">Nomor</td><td> : S-<?php echo $bcf15['suratperintahno'] ?><?php echo $bcf15['kd_tp2'] ?><?php echo $bcf15['tahun'] ?></td></tr>
                        <tr><td colspan="4"></td><td align="left">Tanggal</td><td> : <?php echo tglindo($bcf15['suratperintahdate']) ?></td></tr>
                        <tr><td></td><td height="20" colspan="5"></td></tr>
                        <tr><td colspan="6" align="center"><b>DAFTAR BARANG YANG DINYATAKAN TIDAK DIKUASAI</b></td></tr>
                        <tr><td></td><td height="30" colspan="6"></td></tr>
                    </table>
                    <table class="data">
                        
                           <tr><th class="judultabel" >No</th>
                            <th class="judultabel">BCF 15</th>
                            <th class="judultabel">Container</th>
                            <th class="judultabel">Eks. Kapal</th>
                            <th class="judultabel">Jumlah dan Jenis Barang</th>
                            <th class="judultabel">Pemilik</th>
                            
                            </tr>

                    <?php
                    
                    
                                        
                    $awal='1';
                    while($data = mysql_fetch_array($query)){

                    if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                            echo "<tr class=highlight1>";
                                            $j++;
                                            }
                            else
                                            {
                                            echo "<tr class=highlight2>";
                                            $j--;
                                            }

                    ?>
                    <td align="center" class="isitabel" valign="top"><?php echo  $awal++; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['bcf15no']; ?> /<?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel" valign="top"><table cellspacing="0" cellpadding="0">
                    
                                        <?php
                                            include '../lib/koneksi.php';
                                           
                                            $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
                                             while($bcfcont = mysql_fetch_array($rowset)){


                                      ?>
                                    <tr>
                                        <td ><?php echo $bcfcont['nocontainer'];?></td>
                                        <td ><?php if ($bcfcont['idsize']=='0') {echo "";} else{echo "/";}?></td>
                                        <td ><?php if ($bcfcont['idsize']=='0') {echo "";} else{echo $bcfcont['idsize'];}?></td>

                                    </tr>
                                    <?php };?>
                                </table>
                    </td>
                    <td class="isitabel" valign="top"><?php echo  $data['saranapengangkut']; ?> voy <?php echo  $data['voy']; ?></td>
                    <td class="isitabel" valign="top"><?php echo  $data['amountbrg']; ?>&nbsp;<?php echo  $data['satuanbrg']; ?>&nbsp;<?php echo  $data['diskripsibrg']; ?></td>
                    <td class="isitabel" valign="top"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    
                    </tr>
                    <?php
                    };
                    
                    ?>
                    </table>
                    <table border="0" width="100%">
                                <tr><td></td><td height="40" colspan="5"></td></tr>
                                <tr><td colspan="4" width="60%" align="right">an. </td><td>Kepala Kantor </font></td></tr>
                                <tr><td colspan="4" align="right"></td><td>KABID PFPC II</font></td></tr>
                                <tr><td colspan="4" align="right"></td><td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b. </font></td></tr>
                                <tr><td colspan="4" align="right"></td><td>KASI PABEAN DAN CUKAI III</font></td></tr>
                                <tr><td></td><td height="45" colspan="5"></td></tr>
                                <tr><td colspan="4" align="right"></td><td><?php echo $bcf15['nm_seksi'] ?> </font></td></tr>
                                <tr><td colspan="4" align="right"></td><td>NIP <?php echo $bcf15['nip'] ?> </font></td></tr>
                    </table>
                
                </div>
      </div>
    </body>
</html>
