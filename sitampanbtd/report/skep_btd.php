<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        
        <title>Skep BTD Lelalng I</title>
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
                <li><a href="#tabs-1">Skep</a></li>
                <li><a href="#tabs-2">Lampiran</a></li>
                </ul>
                
                <div id="tabs-1">
                    
                    <?php
                   
                   include 'lib/function.php';
                    $no_skep = $_GET['no_skep']; // menangkap id
                    $tgl = $_GET['tgl']; 
                    $sql = "SELECT * FROM bcf15,tpp,kepala_kantor WHERE bcf15.idkepala_kantor_skep_btd=kepala_kantor.idkepala_kantor and bcf15.idtpp=tpp.idtpp and KepLelang1No='$no_skep' and KepLelang1Date='$tgl'  "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $bcf15 = mysql_fetch_array($query);
                    $bulankini=date('M');
                    
                    //untuk tanggal bahasa indonesia
                    $engDate=date("l F d, Y H:i:s A");
                         $thn=date('Y');
                        switch (date("w")) {
                         case "0" : $hari="Minggu";break;
                          case "1" : $hari="Senin";break;
                          case "2" : $hari="Selasa"; break; 
                          case "3" : $hari="Rabu";break;
                          case "4" : $hari="Kamis";break;
                          case "5" : $hari="Jumat";break;
                          case "6" : $hari="Sabtu";break;
                        }
                        switch (date("m")) {
                          case "1" : $bulan="Januari";break;
                          case "2" : $bulan="Februari";break;
                          case "3" : $bulan="Maret";break;
                          case "4" : $bulan="April";break;
                          case "5" : $bulan="Mei";break;
                          case "6" : $bulan="Juni";break;
                          case "7" : $bulan="Juli";break;
                          case "8" : $bulan="Agustus";break;
                          case "9" : $bulan="September"; break  ;
                          case "10" : $bulan="Oktober";break;
                          case "11" : $bulan="November";break;
                          case "12" : $bulan="Desember";break;
                        }

                        $indDate="$bulan $thn";
                     


                    ?>
                    
                                <script type="text/javascript">
                                var s5_taf_parent = window.location;
                                function popup_print() {
                                window.open('report/skep_btd_cons.php?no_skep=<?php echo  $bcf15['KepLelang1No']; ?> & tgl=<?php echo  $bcf15['KepLelang1Date']; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
                                }
                                </script>
                    
                                <input class="button putih bigrounded " type="button"  value="Print Kep" onClick="popup_print()"/><img src="images/printer.png"></img>
                                
                        
                    
                      
                        <hr><form method="POST">
                            <table width="100%" border="0">
                                <tr >
                                    <td colspan="2">
                                        <table width="100%" border="0" >
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</b></font></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="3"><b>DIREKTORAT JENDERAL BEA DAN CUKAI</b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>KEPUTUSAN KEPALA KANTOR PELAYANAN UTAMA BEA DAN CUKAI</b></font></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>TIPE B BATAM</b></font></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>NOMOR : KEP-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/KPU.01/<?php echo $thn;?></b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>TENTANG</b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>PENETAPAN BARANG YANG DINYATAKAN TIDAK DIKUASAI</b></font></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>UNTUK SEGERA DILAKSANAKAN PELELANGANNYA</b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr align="center">
                                                <td><font face="arial" size="4"><b>KEPALA KANTOR PELAYANAN UTAMA BEA DAN CUKAI TIPE B BATAM</b></font></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr >
                                   <td colspan="2" >
                                        <table width="100%" border="0" >
                                            <tr valign="top">
                                                <td>Menimbang</td><td>:</td><td>a.</td><td><p style="text-align: justify">bahwa terdapat barang-barang di Tempat Penimbunan Pabean <?php echo "$bcf15[nm_tpp]"; ?> yang telah ditetapkan menjadi Barang Yang Dinyatakan Tidak Dikuasai dan memenuhi syarat untuk dilelang;</p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td>b.</td><td><p style="text-align: justify">bahwa barang tidak dikuasai tersebut huruf a pengurusannya memerlukan biaya tinggi sehingga harus segera dilakukan pelelangan dengan memberitahukan secara tertulis kepada pemiliknya;</p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td>c.</td><td ><p style="text-align: justify">bahwa berdasarkan pertimbangan sebagaimana dimaksud dalam huruf a dan b menetapkan Keputusan Kepala Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam tentang Penetapan Barang-barang Yang Dinyatakan Tidak Dikuasai Yang Sudah Memenuhi Syarat Untuk Segera Dilaksanakan Pelelangannya.</p></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>Mengingat</td><td>:</td><td>1.</td><td><p style="text-align: justify">Undang-Undang Nomor 10 Tahun 1995 tentang Kepabeanan (Lembaran Negara Republik Indonesia Tahun 1995 Nomor 75, Tambahan Lembaran Negara Republik Indonesia Nomor 3612) sebagaimana diubah dengan Undang-Undang Nomor 17 Tahun 2006 (Lembaran Negara Republik Indonesia Tahun 2006 Nomor 93, Tambahan Lembaran Negara Republik Indonesia Nomor 4661); </p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td>2.</td><td><p style="text-align: justify">Peraturan Menteri Keuangan Republik Indonesia Nomor 62/PMK.04/2011 tentang Penyelesaian Terhadap Barang Yang Dinyatakan Tidak Dikuasai, Barang Yang Dikuasai Negara, dan Barang Yang Menjadi Milik Negara.</p></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr align="center">
                                                <td colspan="5"><font face="arial" size="4"><b>M E M U T U S K A N</b></font></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>Menetapkan </td><td>:</td><td></td><td><p style="text-align: justify">KEPUTUSAN KEPALA KANTOR PELAYANAN UTAMA BEA DAN CUKAI TIPE A TAJUNG PRIOK TENTANG PENETAPAN BARANG YANG DINYATAKAN TIDAK DIKUASAI UNTUK SEGERA DILAKSANAKAN PELELANGANNYA. </p></td>
                                            </tr>
                                             <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>PERTAMA </td><td>:</td><td></td><td><p style="text-align: justify">Barang-barang impor yang telah melampaui jangka waktu penimbunannya dan tidak diselesaikan kewajiban kepabeanannya oleh pemilik barang atau kuasanya sebagaimana tercantum dalam lampiran surat keputusan ini ditetapkan sebagai barang - barang yang dinyatakan tidak dikuasai untuk segera dilaksanakan pelelangannya. </p></td>
                                            </tr>
                                            
                                             <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>KEDUA </td><td>:</td><td></td><td><p style="text-align: justify">Pelaksanaan lelang terhadap Barang Yang Dinyatakan Tidak Dikuasai tersebut diktum PERTAMA dilaksanakan oleh Panitia Lelang Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam, dengan perantara Kantor Pelayanan Kekayaan Negara dan Lelang Jakarta II. </p></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>KETIGA </td><td>:</td><td></td><td><p style="text-align: justify">Surat Keputusan ini disampaikan kepada Kepala Bidang Pelayanan Pabean dan Cukai untuk dapat dipergunakan sebagaimana mestinya sesuai ketentuan yang berlaku. </p></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td>KEEMPAT </td><td>:</td><td></td><td><p style="text-align: justify">Keputusan ini mulai berlaku sejak tanggal ditetapkan dan apabila di kemudian hari terdapat kekeliruan akan diadakan perbaikan seperlunya. </p></td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td></td><td><p style="text-align: justify">Salinan keputusan ini disampaikan kepada Yth:</p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td></td><td><p style="text-align: justify">1. Direktur Jenderal Bea dan Cukai; </p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td></td><td><p style="text-align: justify">2. Panitia Lelang KPU Bea dan Cukai Tipe B Batam; </p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td></td><td><p style="text-align: justify">3. Pimpinan <?php echo $bcf15['nm_tpp'] ?>; </p></td>
                                            </tr>
                                            <tr valign="top">
                                                <td></td><td></td><td></td><td><p style="text-align: justify">4. Kasi Administrasi Manifest Bidang PPC III. </p></td>
                                            </tr>
                                            
                                        </table>
                                    </td> 
                                </tr>
                                
                                
                                
                               
                               
                            </table>
                            <table width="100%" border="0" >
                                
                                <tr>
                                    <td width="50%">
                                        
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                
                                                     <td>Ditetapkan di </td>
                                                      <td>:</td><td>Jakarta</td>
                                            </tr>
                                            <tr>
                                                
                                                     <td>Pada tanggal </td>
                                                      <td>:</td> <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $indDate ?> </td>
                                            </tr>
                                            <tr>
                                                
                                                     <td COLSPAN="3"><font ><b>KEPALA KANTOR,</b></font></td>
                                                      
                                            </tr>
                                             <tr>
                                                <td height="90"></td>
                                            </tr>
                                            <tr>
                                                
                                                     <td COLSPAN="3"><b><?php echo "$bcf15[nm_kepala_kantor]"; ?></b></td>
                                                     
                                            </tr>
                                            <tr>
                                                
                                                     <td COLSPAN="3"><b><?php echo "NIP $bcf15[nip_kepala_kantor]"; ?></b></td>
                                                     
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </form>
                </div>
            
                <div id="tabs-2">
                    
                    
                  <?php
                                    
                   include '../lib/koneksi.php';
                   
                   $no_skep = $_GET['no_skep']; // menangkap id
                    $tgl = $_GET['tgl']; 
                    $sql = "SELECT * FROM bcf15,tpp,kepala_kantor WHERE bcf15.idkepala_kantor_skep_btd=kepala_kantor.idkepala_kantor and bcf15.idtpp=tpp.idtpp and KepLelang1No='$no_skep' and KepLelang1Date='$tgl'  "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $tahun=date('Y');
                     //untuk tanggal bahasa indonesia
                    $engDate=date("l F d, Y H:i:s A");
                         $thn=date('Y');
                        switch (date("w")) {
                         case "0" : $hari="Minggu";break;
                          case "1" : $hari="Senin";break;
                          case "2" : $hari="Selasa"; break; 
                          case "3" : $hari="Rabu";break;
                          case "4" : $hari="Kamis";break;
                          case "5" : $hari="Jumat";break;
                          case "6" : $hari="Sabtu";break;
                        }
                        switch (date("m")) {
                          case "1" : $bulan="Januari";break;
                          case "2" : $bulan="Februari";break;
                          case "3" : $bulan="Maret";break;
                          case "4" : $bulan="April";break;
                          case "5" : $bulan="Mei";break;
                          case "6" : $bulan="Juni";break;
                          case "7" : $bulan="Juli";break;
                          case "8" : $bulan="Agustus";break;
                          case "9" : $bulan="September"; break  ;
                          case "10" : $bulan="Oktober";break;
                          case "11" : $bulan="November";break;
                          case "12" : $bulan="Desember";break;
                        }

                        $indDate="$bulan $thn";
                     
                   

//                    $id = $_GET['sprint']; // menangkap id
//                    $sql = "SELECT bcf15no, bcf15tgl, saranapengangkut, voy, amountbrg, satuanbrg, diskripsibrg, consignee, notify, perintah, suratperintahno, idtp2, suratperintahdate, idseksitp2 form bcf15 where  suratperintahno=$id "; // memanggil data dengan id yang ditangkap tadi
//                    $query = mysql_query($sql);
//                    $bcf15 = mysql_fetch_array($query);


                    ?>
                    <script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print1() {
                    window.open('report/skep_btd_lamp.php?no_skep=<?php echo  $bcf15['KepLelang1No']; ?> & tgl=<?php echo  $bcf15['KepLelang1Date']; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
                    }
                    </script>
                     <input class="button putih bigrounded " type="button"  value="Print Lampiran" onClick="popup_print1()"/> 	
                    <img src="images/printer.png"></img>
                    <hr><table border="0" width="100%">
                        <tr>
                            <td width="50%">
                                <table width="100%">
                                    <tr>
                                        <td><font size="2">KEMENTRIAN KEUANGAN REPUBLIK INDONESIA</font></td>
                                    </tr>
                                    <tr>
                                        <td><font size="2">DIREKTORAT JENDERAL BEA DAN CUKAI </font></td>
                                    </tr>
                                    <tr>
                                        <td><font size="2">KANTOR PELAYANAN UTAMA BEA DAN CUKAI TIPE B BATAM </font></td>
                                    </tr>
                                </table>
                            </td>
                            <td valign="top" width="50%">
                                <table width="100%" border="0">
                                    <tr >
                                        <td colspan="3"><font size="1">Keputusan Kepala Kantor Pelayanan Utama Bea dan Cukai Tipe B Batam</font></td>
                                    </tr>
                                    <tr >
                                        <td width="10%" ><font size="1">Nomor </font></td><td width="1"><font size="1">: </font></td><td ><font size="1">Kep-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /KPU.01/<?php echo $tahun ?> </font></td>
                                    </tr >
                                    <tr >
                                        <td ><font size="1">Tanggal </font></td><td><font size="1">: </font></td><td><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $indDate;?>  </font></td>
                                    </tr >
                                </table>
                            </td>
                            
                        </tr>
                        <tr>
                                                <td height="15"></td>
                         </tr>
                        <tr>
                            <td colspan="2" align="center"><font size="3"><b>DAFTAR BARANG YANG DINYATAKAN TIDAK DIKUASAI UNTUK SEGERA DILAKSANAKAN PELELANGANNYA</b></font></td>
                        </tr>
                        <tr>
                                                <td height="10"></td>
                         </tr>
                    </table>
                    <table class="data">
                        
                           <tr><th class="judultabel" rowspan="2" >No</th>
                            <th class="judultabel" colspan="2">Dokumen</th>
                            <th class="judultabel" colspan="3">Uraian Barang</th>
                            <th class="judultabel" rowspan="2">Container</th>
                            <th class="judultabel" rowspan="2">Consignee</th>
                            <th class="judultabel" rowspan="2">Lokasi TPP</th>
                            
                            </tr>
                            
                            <tr>
                            <th class="judultabel">Nomor</th>
                            <th class="judultabel">Tanggal</th>
                            <th class="judultabel">Jumlah</th>
                            <th class="judultabel">Jenis</th>
                            <th class="judultabel">Kondisi</th>
                            
                            
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
                    <td class="isitabel" valign="top"><?php echo  "BCF 1.5  $data[bcf15no]"; ?> </td>
                    <td class="isitabel" valign="top"> <?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel" valign="top" > 
                    
                                        <?php
                                           
                                           
                                            $rowset = mysql_query("select * from nhp where idbcf15=$data[idbcf15]");
                                             while($bcfnhp = mysql_fetch_array($rowset)){

                                                 ?>
                                    
                        <table border="0" width="100%">
                            <tr class="isitabel">
                                <td><?php echo $bcfnhp[jumlah] ?></td>
                            </tr>
                        </table>          
                                        

                                   
                                   <?php };?>
                    </td>
                    <td class="isitabel" valign="top" > 
                    
                                        <?php
                                           
                                           
                                            $rowset = mysql_query("select * from nhp where idbcf15=$data[idbcf15]");
                                             while($bcfnhp = mysql_fetch_array($rowset)){

                                                 ?>
                                    
                        <table border="0" width="100%">
                            <tr class="isitabel">
                                <td><?php echo $bcfnhp[jenisbrg] ?></td>
                            </tr>
                        </table>          
                                        

                                   
                                   <?php };?>
                    </td>
                    <td class="isitabel" valign="top" > 
                    
                                        <?php
                                           
                                           
                                            $rowset = mysql_query("select * from nhp where idbcf15=$data[idbcf15]");
                                             while($bcfnhp = mysql_fetch_array($rowset)){

                                                 ?>
                                    
                        <table border="0" width="100%">
                            <tr class="isitabel">
                                <td><?php echo $bcfnhp[kondisi] ?></td>
                            </tr>
                        </table>          
                                        

                                   
                                   <?php };?>
                    </td>
                    <td class="isitabel" valign="top">
                    
                                        <?php
                                           
                                           
                                            $rowset = mysql_query("select * from bcfcontainer where idbcf15=$data[idbcf15]");
                                             while($bcfcont = mysql_fetch_array($rowset)){


                                    
                                     echo $bcfcont['nocontainer'];?> <?php if ($bcfcont['idsize']=='0') {echo "";} else{echo "/";}?> <?php if ($bcfcont['idsize']=='0') {echo "";} else{echo $bcfcont['idsize'];}?>
                                        

                                   
                                    <?php };?>
                                
                    </td>
                    <td class="isitabel" valign="top"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    
                    <td class="isitabel" valign="top"><?php echo  $data['nm_tpp']; ?></td>
                    
                    
                    
                    </tr>
                    <?php
                    };
                    
                    ?>
                    </table>
                    <table border="0" width="100%">
                                <tr><td></td><td height="40" colspan="5"></td></tr>
                                <tr><td colspan="4" width="60%" align="right"><b><?php echo $bcf15['plh'] ?></b></td><td><b>Kepala Kantor</b></td></tr>
                                <tr><td></td><td height="90" colspan="5"></td></tr>
                                <tr><td colspan="4" align="right"></td><td><b><?php echo $bcf15['nm_kepala_kantor'] ?></b></td></tr>
                                <tr><td colspan="4" align="right"></td><td><b>NIP <?php echo $bcf15['nip_kepala_kantor'] ?> </b></td></tr>
                    </table>
                
                </div>
      </div>
    </body>
</html>
